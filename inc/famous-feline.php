<?php

//add_filter('frm_load_dropzone', 'stop_dropzone');
function stop_dropzone($load_it)
{
  // if (is_page(1650)) {
  //   $load_it = false;
  // }
  if (is_page(13933)) {
    $load_it = false;
  }
  return $load_it;
}

add_action("wp_ajax_handle_vote", "handle_vote");
add_action("wp_ajax_nopriv_handle_vote", "handle_vote");

function handle_vote()
{
  if (!isset($_POST['post_id'])) {
    wp_send_json_error('Missing post ID.');
  }

  $post_id = intval($_POST['post_id']);
  $user_ip = $_SERVER['REMOTE_ADDR'];

  $voted_ips = get_post_meta($post_id, 'voted_ips', true);
  if (!is_array($voted_ips)) {
    $voted_ips = array();
  }

  $action_performed = '';
  $current_votes = intval(get_field('vote_count', $post_id));

  if (in_array($user_ip, $voted_ips)) {
    // User has voted, so unvote
    $voted_ips = array_diff($voted_ips, array($user_ip));
    $new_votes = $current_votes - 1;
    $action_performed = 'unvoted';
  } else {
    // User has not voted, so vote
    $voted_ips[] = $user_ip;
    $new_votes = $current_votes + 1;
    $action_performed = 'voted';
  }

  if ($new_votes < 0) {
    $new_votes = 0;
  }

  update_post_meta($post_id, 'voted_ips', $voted_ips);
  update_field('vote_count', $new_votes, $post_id);

  wp_send_json_success(array('new_count' => $new_votes, 'action' => $action_performed));

  wp_die();
}

add_action('wp_ajax_sort_famous_felines', 'sort_famous_felines');
add_action('wp_ajax_nopriv_sort_famous_felines', 'sort_famous_felines');

function sort_famous_felines()
{
  $sort_by = sanitize_text_field($_POST['sort_by']);
  $search_term = sanitize_text_field($_POST['search_term']);

  $args = array(
    'post_type' => 'famous-feline',
    'post_status' => 'publish',
    'posts_per_page' => -1,
  );

  if (!empty($search_term)) {
    $args['s'] = $search_term;
  }

  switch ($sort_by) {
    case 'oldest':
      $args['orderby'] = 'date';
      $args['order'] = 'ASC';
      break;
    case 'highest_votes':
      $args['meta_key'] = 'vote_count';
      $args['orderby'] = 'meta_value_num';
      $args['order'] = 'DESC';
      break;
    default:
      $args['orderby'] = 'date';
      $args['order'] = 'DESC';
      break;
  }

  $felines_query = new WP_Query($args);

  if ($felines_query->have_posts()) :
    ob_start();
?>
    <div class="ff-masonry">
      <div class="gutter-sizer"></div>
      <?php
      while ($felines_query->have_posts()) : $felines_query->the_post();
        echo get_feline_card_html(get_the_ID());
      endwhile;
      ?>
    </div>
  <?php
    wp_reset_postdata();
    $html = ob_get_clean();
    wp_send_json_success($html);
  else :
    wp_send_json_error('<p class="text-center col-span-full">No contestants found.</p>');
  endif;

  wp_die();
}

function get_feline_card_html($post_id)
{
  $cat_photo = get_field('cat_photo', $post_id);
  $cat_photo_url = $cat_photo ? $cat_photo['url'] : 'https://placehold.co/600x600';
  $cat_name = get_the_title($post_id);
  $cat_age = get_field('cat_age', $post_id);
  $cat_description = get_field('cat_description', $post_id);
  $vote_count = get_field('vote_count', $post_id) ? get_field('vote_count', $post_id) : 0;
  $post_slug = get_post_field('post_name', $post_id);

  $voted_ips = get_post_meta($post_id, 'voted_ips', true);
  if (!is_array($voted_ips)) {
    $voted_ips = array();
  }
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $voted_class = in_array($user_ip, $voted_ips) ? 'voted' : '';

  // Generate all icons and popover HTML as variables.
  $icon_facebook = cpsv_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6'));
  $icon_twitter = cpsv_icon(array('icon' => 'x', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6'));
  $icon_linkedin = cpsv_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6'));
  $icon_copy = '<svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" /></svg>';

  $share_popover_html = "
    <div class=\"share-popover hidden absolute z-10 w-40 bg-white rounded-lg shadow-lg right-0 top-10\">
        <div class=\"py-1 text-sm\">
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"facebook\"><div class=\"inline-flex gap-2 items-center\">{$icon_facebook}<div>Facebook</div></div></a>
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"twitter\"><div class=\"inline-flex gap-2 items-center\">{$icon_twitter}<div>X (Twitter)</div></div></a>
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"linkedin\"><div class=\"inline-flex gap-2 items-center\">{$icon_linkedin}<div>LinkedIn</div></div></a>
            <button class=\"copy-url-btn block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100\"><div class=\"inline-flex gap-2 items-center\">{$icon_copy}<div class=\"copy-text\">Copy URL</div></div></button>
        </div>
    </div>
  ";

  // Create a caption-safe version by replacing double quotes with single quotes.
  $share_popover_html_for_caption = str_replace('"', "'", $share_popover_html);

  ob_start();
  ?>
  <div class="ff-grid-item">
    <div class="ff-card p-4 rounded-lg shadow-md flex flex-col" style="background-color: var(--ff-card-bg)">
      <div class="ff-card--image">
        <a href="<?php echo esc_url($cat_photo_url); ?>"
          data-fancybox="feline-gallery"
          data-caption="<div class='ff-card--header'>
                        <div class='flex justify-between items-center py-3 mb-3 border-b border-slate-300'>
                          <div class='ff-card--name'>
                            <h3 class='font-semibold text-2xl'><?php echo esc_html($cat_name); ?></h3>
                            <?php if ($cat_age) : ?><p class='font-semibold mt-2'><?php echo esc_html($cat_age); ?></p><?php endif; ?>
                          </div>
                          <div class='ff-card--action flex items-center'>
                            <div class='share-container relative'>
                              <button class='share-btn p-2 rounded-full hover:bg-slate-100' data-post-slug='<?php echo $post_slug; ?>' data-post-title='<?php echo esc_attr($cat_name); ?>'>
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6'><path fill-rule='evenodd' d='M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z' clip-rule='evenodd' /></svg>
                              </button>
                              <?php echo $share_popover_html_for_caption; ?>
                            </div>
                            <button class='vote-btn flex items-center gap-2 p-2 rounded-full hover:bg-slate-100 relative <?php echo $voted_class; ?>' data-post-id='<?php echo $post_id; ?>'>
                              <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-10 h-10 text-slate-600'><path d='m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z' /></svg>
                              <div class='absolute inset-0 flex items-center justify-center'>
                                <div class='vote-loader' style='display: none;'></div>
                                <div class='vote-count font-semibold text-xs text-white'><?php echo esc_html($vote_count); ?></div>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class='ff-card--description'><?php echo wp_kses_post($cat_description); ?></div>"
          data-slug="<?php echo $post_slug; ?>">
          <img src="<?php echo esc_url($cat_photo_url); ?>" alt="<?php echo esc_attr($cat_name); ?>" class="rounded-lg w-full h-auto aspect-square object-cover">
        </a>
      </div>
      <div class="ff-card--content flex flex-col">
        <div class="ff-card--header">
          <div class="flex justify-between items-center py-3 mb-3 border-b border-slate-300">
            <div class="ff-card--name">
              <h3 class="font-semibold text-2xl">
                <?php echo esc_html($cat_name); ?>
              </h3>
              <?php if ($cat_age) : ?>
                <p class="font-semibold mt-2">
                  <?php echo esc_html($cat_age); ?>
                </p>
              <?php endif; ?>
            </div>
            <div class="ff-card--action flex items-center">
              <div class="share-container relative">
                <button class="share-btn p-2 rounded-full hover:bg-slate-100" data-post-slug="<?php echo $post_slug; ?>" data-post-title="<?php echo esc_attr($cat_name); ?>">
                  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6'>
                    <path fill-rule='evenodd' d='M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z' clip-rule='evenodd' />
                  </svg>
                </button>
                <?php echo $share_popover_html; ?>
              </div>
              <button class="vote-btn flex items-center gap-2 p-2 rounded-full hover:bg-slate-100 relative <?php echo $voted_class; ?>" data-post-id='<?php echo $post_id; ?>'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-10 h-10 text-slate-600'>
                  <path d='m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z' />
                </svg>
                <div class='absolute inset-0 flex items-center justify-center'>
                  <div class='vote-loader' style='display: none;'></div>
                  <div class='vote-count font-semibold text-xs text-white'><?php echo esc_html($vote_count); ?></div>
                </div>
              </button>
            </div>
          </div>
        </div>
        <div class="ff-card--description">
          <?php echo wp_kses_post($cat_description); ?>
        </div>
      </div>
    </div>
  </div>
<?php
  return ob_get_clean();
}
