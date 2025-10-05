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

  $all_votes = get_option('feline_votes', array());
  $previously_voted_post_id = $all_votes[$user_ip] ?? 0;

  // Case 1: Un-voting
  if ($previously_voted_post_id === $post_id) {
    unset($all_votes[$user_ip]);
    $new_count = intval(get_field('vote_count', $post_id)) - 1;
    if ($new_count < 0) $new_count = 0;
    update_field('vote_count', $new_count, $post_id);
    update_option('feline_votes', $all_votes);

    wp_send_json_success(array(
      'action' => 'unvoted',
      'new_post_data' => array('id' => $post_id, 'count' => $new_count)
    ));
    wp_die();
  }

  // Case 2: Voting
  $old_post_data = null;
  if ($previously_voted_post_id > 0) {
    $old_count = intval(get_field('vote_count', $previously_voted_post_id)) - 1;
    if ($old_count < 0) $old_count = 0;
    update_field('vote_count', $old_count, $previously_voted_post_id);
    $old_post_data = array('id' => $previously_voted_post_id, 'count' => $old_count);
  }

  $all_votes[$user_ip] = $post_id;
  $new_count = intval(get_field('vote_count', $post_id)) + 1;
  update_field('vote_count', $new_count, $post_id);
  update_option('feline_votes', $all_votes);

  $response_data = array(
    'action' => $previously_voted_post_id > 0 ? 'moved' : 'voted',
    'new_post_data' => array('id' => $post_id, 'count' => $new_count)
  );

  if ($old_post_data) {
    $response_data['old_post_data'] = $old_post_data;
  }

  wp_send_json_success($response_data);
  wp_die();
}

add_action('wp_ajax_sort_famous_felines', 'sort_famous_felines');
add_action('wp_ajax_nopriv_sort_famous_felines', 'sort_famous_felines');

function sort_famous_felines()
{
  $sort_by = sanitize_text_field($_POST['sort_by']);
  $search_term = sanitize_text_field($_POST['search_term']);
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : -1;

  // Base arguments for the queries
  $base_args = array(
    'post_type' => 'famous-feline',
    'post_status' => 'publish',
  );
  if (!empty($search_term)) {
    $base_args['s'] = $search_term;
  }

  // Add sorting arguments
  switch ($sort_by) {
    case 'oldest':
      $base_args['orderby'] = 'date';
      $base_args['order'] = 'ASC';
      break;
    case 'highest_votes':
      $base_args['meta_key'] = 'vote_count';
      $base_args['orderby'] = 'meta_value_num';
      $base_args['order'] = 'DESC';
      break;
    default:
      $base_args['orderby'] = 'date';
      $base_args['order'] = 'DESC';
      break;
  }

  // First query: get the total count of posts matching the criteria
  $count_query = new WP_Query($base_args);
  $total_posts = $count_query->found_posts;
  wp_reset_postdata(); // Reset post data after the count query

  // Calculate total pages
  $total_pages = ($posts_per_page > 0) ? ceil($total_posts / $posts_per_page) : 1;

  // Second query: get the actual posts for the current page
  $main_query_args = $base_args;
  $main_query_args['posts_per_page'] = $posts_per_page;
  $main_query_args['paged'] = $page;

  $felines_query = new WP_Query($main_query_args);

  $response = array();

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
    $response['posts'] = ob_get_clean();

    if ($total_pages > 1) { // Use our calculated total pages
      ob_start();
      echo paginate_links(array(
        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'format' => '?paged=%#%',
        'current' => max(1, $page),
        'total' => $total_pages, // Use our calculated total pages
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'type' => 'list',
      ));
      $response['pagination'] = ob_get_clean();
    } else {
      $response['pagination'] = '';
    }

    wp_reset_postdata(); // Reset post data after the main query
    wp_send_json_success($response);
  else : 
    wp_send_json_error('<p class="text-center col-span-full">No contestants found.</p>');
  endif;

  wp_die();
}

function get_feline_card_html($post_id, $show_actions = true)
{
  $cat_photo = get_field('cat_photo', $post_id);
  $cat_photo_url = $cat_photo ? $cat_photo['url'] : 'https://placehold.co/600x600';
  $cat_name = get_the_title($post_id);
  $cat_age = get_field('cat_age', $post_id);
  $vote_count = get_field('vote_count', $post_id) ? get_field('vote_count', $post_id) : 0;
  $post_slug = get_post_field('post_name', $post_id);

  $all_votes = get_option('feline_votes', array());
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $user_voted_post_id = $all_votes[$user_ip] ?? 0;
  $voted_class = ($user_voted_post_id == $post_id) ? 'voted' : '';

  $share_popover_html = "<div class=\"share-popover hidden absolute z-10 w-40 bg-white rounded-lg shadow-lg right-0 top-10\">
        <div class=\"py-1 text-sm\">
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"facebook\"><div class=\"inline-flex gap-2 items-center\">" . cpsv_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6')) . "<div>Facebook</div></div></a>
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"twitter\"><div class=\"inline-flex gap-2 items-center\">" . cpsv_icon(array('icon' => 'x', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6')) . "<div>X (Twitter)</div></div></a>
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"linkedin\"><div class=\"inline-flex gap-2 items-center\">" . cpsv_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6')) . "<div>LinkedIn</div></div></a>
            <button class=\"copy-url-btn block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100\"><div class=\"inline-flex gap-2 items-center\"><svg class=\"w-6 h-6 text-gray-800\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\"><path stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961\" /></svg><div class=\"copy-text\">Copy URL</div></div></button>
        </div>
    </div>";

  ob_start();
  ?>
  <div class="ff-grid-item">
    <div class="ff-card p-4 rounded-lg shadow-md flex flex-col" style="background-color: var(--ff-card-bg)">
      <div class="ff-card--image">
        <a href="#<?php echo $post_slug; ?>" class="open-feline-popup" data-post-id="<?php echo $post_id; ?>" data-show-actions="<?php echo $show_actions ? 'true' : 'false'; ?>">
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
            <?php if ($show_actions) : ?>
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
            <?php endif; ?>
          </div>
        </div>
        <div class="ff-card--description">
          <?php echo wp_kses_post(get_field('cat_description', $post_id)); ?>
        </div>
      </div>
    </div>
  </div>
<?php
  return ob_get_clean();
}

function get_feline_popup_html($post_id, $show_actions = true)
{
  $cat_photo = get_field('cat_photo', $post_id);
  $cat_photo_url = $cat_photo ? $cat_photo['url'] : 'https://placehold.co/600x600';
  $cat_name = get_the_title($post_id);
  $cat_age = get_field('cat_age', $post_id);
  $cat_description = get_field('cat_description', $post_id);
  $vote_count = get_field('vote_count', $post_id) ? get_field('vote_count', $post_id) : 0;
  $post_slug = get_post_field('post_name', $post_id);

  $all_votes = get_option('feline_votes', array());
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $user_voted_post_id = $all_votes[$user_ip] ?? 0;
  $voted_class = ($user_voted_post_id == $post_id) ? 'voted' : '';

  $share_popover_html = "<div class=\"share-popover hidden absolute z-10 w-40 bg-white rounded-lg shadow-lg right-0 top-10\">
        <div class=\"py-1 text-sm\">
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"facebook\"><div class=\"inline-flex gap-2 items-center\">" . cpsv_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6')) . "<div>Facebook</div></div></a>
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"twitter\"><div class=\"inline-flex gap-2 items-center\">" . cpsv_icon(array('icon' => 'x', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6')) . "<div>X (Twitter)</div></div></a>
            <a href=\"#\" class=\"share-link block px-4 py-2 text-gray-700 hover:bg-gray-100\" data-platform=\"linkedin\"><div class=\"inline-flex gap-2 items-center\">" . cpsv_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6')) . "<div>LinkedIn</div></div></a>
            <button class=\"copy-url-btn block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100\"><div class=\"inline-flex gap-2 items-center\"><svg class=\"w-6 h-6 text-gray-800\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"none\" viewBox=\"0 0 24 24\"><path stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961\" /></svg><div class=\"copy-text\">Copy URL</div></div></button>
        </div>
    </div>";

  ob_start();
?>
  <div class="feline-popup-content-inner">
    <div class="feline-popup-image mb-4">
      <img src="<?php echo esc_url($cat_photo_url); ?>" alt="<?php echo esc_attr($cat_name); ?>" class="rounded-lg w-full h-auto">
    </div>
    <div class="feline-popup-details">
      <div class="ff-card--header">
        <div class="flex justify-between items-center py-3 mb-3 border-b border-slate-300">
          <div class="ff-card--name">
            <h3 class="font-semibold text-4xl"><?php echo esc_html($cat_name); ?></h3>
            <?php if ($cat_age) : ?><p class="font-semibold mt-2 text-lg"><?php echo esc_html($cat_age); ?></p><?php endif; ?>
          </div>
          <?php if ($show_actions) : ?>
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
          <?php endif; ?>
        </div>
      </div>
      <div class="ff-card--description">
        <?php echo wp_kses_post(get_field('cat_description', $post_id)); ?>
      </div>
    </div>
  </div>
<?php
  return ob_get_clean();
}

function get_feline_popup_content_callback()
{
  $post_id = 0;
  if (isset($_POST['post_id'])) {
    $post_id = intval($_POST['post_id']);
  } elseif (isset($_POST['post_slug'])) {
    $post_slug = sanitize_text_field($_POST['post_slug']);
    $post = get_page_by_path($post_slug, OBJECT, 'famous-feline');
    if ($post) {
      $post_id = $post->ID;
    }
  }

  if (!$post_id) {
    wp_send_json_error('Feline not found.');
  }

  $show_actions = true;
  if (isset($_POST['show_actions']) && $_POST['show_actions'] === 'false') {
    $show_actions = false;
  }

  $html = get_feline_popup_html($post_id, $show_actions);
  wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_get_feline_popup_content', 'get_feline_popup_content_callback');
add_action('wp_ajax_nopriv_get_feline_popup_content', 'get_feline_popup_content_callback');


/**
 * Send an email notification when a 'famous-feline' post is published.
 *
 * @param string  $new_status New post status.
 * @param string  $old_status Old post status.
 * @param WP_Post $post       Post object.
 */
function send_feline_publish_notification($new_status, $old_status, $post)
{
  // Check if the post type is 'famous-feline' and the new status is 'publish'
  if ('famous-feline' !== $post->post_type || 'publish' !== $new_status) {
    return;
  }

  // Prevent email on every update of a published post
  if ($old_status === 'publish') {
    return;
  }

  // Get the recipient email from the custom field
  $recipient_email = get_field('email', $post->ID);

  // Check if the email is valid
  if (!is_email($recipient_email)) {
    return;
  }

  // Get post details for the email content
  $post_title = get_the_title($post->ID);
  $post_permalink = get_permalink($post->ID);

  // Email Subject
  $subject = 'It’s Official – Your Cat is Gallery-Ready!';

  // Email Body
  $body = "<strong>It’s Official – Your Cat is Gallery-Ready!</strong>\n\n";
  $body .= "Cue the confetti and catnip – your marvellous moggie has been approved and is now strutting their stuff in our <strong>Purrfect Pin Up Contestant Gallery!</strong>\n\n";
  $body .= "Now it’s time to rally the troops.\n\n";
  $body .= "Share your cat’s profile far and wide – friends, family, neighbours, co-workers, even that barista who always draws a paw print on your coffee.\n\n";
  $body .= "Because every vote counts… and the <strong>top 10 cats with the most votes</strong> will land a spot in the 2026 CPSV Calendar, with 2 more chosen as our <strong>CPSV Choice!</strong>\n\n";
  $body .= "Ready, set… VOTE!\n\n";
  $body .= "You can view your cat's profile and share it from here: https://catprotection.com.au/purrfect-pin-up/?cat=" . $post->post_name . "

";

  // To send HTML email, you can set the Content-Type header.
  $headers = array('Content-Type: text/plain; charset=UTF-8');

  // Send the email
  wp_mail($recipient_email, $subject, $body, $headers);
}
add_action('transition_post_status', 'send_feline_publish_notification', 10, 3);

// Add custom column to the famous-feline post type
function cpsv_add_famous_feline_columns($columns) {
    // Add 'Vote Count' column after the 'title' column
    $new_columns = [];
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['vote_count'] = 'Vote Count';
        }
    }
    return $new_columns;
}
add_filter('manage_edit-famous-feline_columns', 'cpsv_add_famous_feline_columns');

// Populate the custom column with the 'vote_count' value
function cpsv_famous_feline_custom_column_content($column, $post_id) {
    if ($column === 'vote_count') {
        $vote_count = get_field('vote_count', $post_id);
        echo $vote_count ? esc_html($vote_count) : '0';
    }
}
add_action('manage_famous-feline_posts_custom_column', 'cpsv_famous_feline_custom_column_content', 10, 2);

// Make the 'Vote Count' column sortable
function cpsv_make_famous_feline_column_sortable($columns) {
    $columns['vote_count'] = 'vote_count';
    return $columns;
}
add_filter('manage_edit-famous-feline_sortable_columns', 'cpsv_make_famous_feline_column_sortable');

// Custom sorting logic for the 'vote_count' column
function cpsv_famous_feline_custom_orderby($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    $orderby = $query->get('orderby');
    if ('vote_count' === $orderby) {
        $query->set('meta_key', 'vote_count');
        $query->set('orderby', 'meta_value_num');
    }
}
add_action('pre_get_posts', 'cpsv_famous_feline_custom_orderby');