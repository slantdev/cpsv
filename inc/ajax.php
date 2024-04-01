<?php

// Load FAQS
add_action('wp_ajax_pagination_load_faqs', 'pagination_load_faqs');
add_action('wp_ajax_nopriv_pagination_load_faqs', 'pagination_load_faqs');
function pagination_load_faqs()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $faq_id = sanitize_text_field($_POST['faq_id']);
    $page = sanitize_text_field($_POST['page']);
    $per_page = sanitize_text_field($_POST['per_page']);
    $pagination = sanitize_text_field($_POST['pagination']);
    $terms = sanitize_text_field($_POST['terms']);
    $terms = json_decode(stripslashes($terms));
    $cur_page = $page;
    $page -= 1;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;

    if ($terms) {
      $all_faqs = new WP_Query(
        array(
          'post_type'         => 'faq',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start,
          'tax_query' => array(
            array(
              'taxonomy' => 'faq-category',
              'field' => 'id',
              'terms' => $terms,
            ),
          ),
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'faq',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'faq-category',
              'field' => 'id',
              'terms' => $terms,
            ),
          ),
        )
      );
    } else {
      $all_faqs = new WP_Query(
        array(
          'post_type'         => 'faq',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => $per_page,
          'offset'            => $start
        )
      );
      $count = new WP_Query(
        array(
          'post_type'         => 'faq',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'ASC',
          'posts_per_page'    => -1
        )
      );
    }

    $count = $count->post_count;
    if ($all_faqs->have_posts()) {
      while ($all_faqs->have_posts()) {
        $all_faqs->the_post();
        echo '<div class="collapse collapse-plus bg-brand-light-gray rounded-lg border border-solid border-slate-300 shadow-md mb-6">';
        echo '<input type="radio" class="faq-radio-btn w-full h-full block" name="faq-' . $faq_id . '" />';
        echo '<div class="collapse-title bg-white text-xl lg:text-2xl border-t-0 border-x-0 border-b border-solid border-slate-300 font-medium py-5 pl-8 pr-12 after:font-thin after:!end-8 after:text-brand-tomato after:!top-2 after:text-3xl after:lg:text-5xl">';
        echo get_the_title();
        echo '</div>';
        echo '<div class="collapse-content p-0">';
        echo '<div class="p-8">';
        echo '<div class="prose lg:prose-lg max-w-none">';
        echo get_field('faq_post')['faq_content'];
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    }

    if ($pagination) :
      // Paginations
      $no_of_paginations = ceil($count / $per_page);
      if ($cur_page >= 7) {
        $start_loop = $cur_page - 3;
        if ($no_of_paginations > $cur_page + 3)
          $end_loop = $cur_page + 3;
        else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
          $start_loop = $no_of_paginations - 6;
          $end_loop = $no_of_paginations;
        } else {
          $end_loop = $no_of_paginations;
        }
      } else {
        $start_loop = 1;
        if ($no_of_paginations > 7)
          $end_loop = 7;
        else
          $end_loop = $no_of_paginations;
      }
      // Pagination Buttons logic
?>
      <div class='posts-pagination mt-10 pt-4 border-x-0 border-b-0 border-t border-solid border-slate-200'>
        <ul>
          <?php if ($first_btn && $cur_page > 1) { ?>
            <li data-page='1' class='active'>&laquo;</li>
          <?php } else if ($first_btn) { ?>
            <li data-page='1' class='inactive'>&laquo;</li>
          <?php } ?>
          <?php if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
          ?>
            <li data-page='<?php echo $pre; ?>' class='active'>&lsaquo;</li>
          <?php } else if ($previous_btn) { ?>
            <li class='inactive p-2'>&lsaquo;</li>
          <?php } ?>
          <?php for ($i = $start_loop; $i <= $end_loop; $i++) {
            if ($cur_page == $i) {
          ?>
              <li data-page='<?php echo $i; ?>' class='selected'><?php echo $i; ?></li>
            <?php } else { ?>
              <li data-page='<?php echo $i; ?>' class='active'><?php echo $i; ?></li>
          <?php }
          } ?>
          <?php if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1; ?>
            <li data-page='<?php echo $nex; ?>' class='active'>&rsaquo;</li>
          <?php } else if ($next_btn) { ?>
            <li class='inactive'>&rsaquo;</li>
          <?php } ?>
          <?php if ($last_btn && $cur_page < $no_of_paginations) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='active'>&raquo;</li>
          <?php } else if ($last_btn) { ?>
            <li data-page='<?php echo $no_of_paginations; ?>' class='inactive'>&raquo;</li>
          <?php } ?>
        </ul>
      </div>
<?php
    endif;
  }
  exit();
}

/* ######
 * Ajax function filter posts
 * ###### 
 */

// Filter FAQ
function filter_faqs()
{
  $faq_id = sanitize_text_field($_POST['faq_id']);
  $faq_term = sanitize_text_field($_POST['faq_term']);

  $args = array(
    'post_type'         => 'faq',
    'post_status '      => 'publish',
    'orderby'           => 'menu_order',
    'order'             => 'ASC',
    'posts_per_page'    => '-1',
    'tax_query' => array(
      array(
        'taxonomy' => 'faq-category',
        'field' => 'id',
        'terms' => $faq_term,
      ),
    ),
  );

  $ajaxposts = new WP_Query($args);

  $response = '';

  if ($ajaxposts->have_posts()) {
    while ($ajaxposts->have_posts()) {
      $ajaxposts->the_post();
      $id = get_the_ID();
      // $content = get_the_content('null', false, $id);
      // $content = apply_filters('the_content', $content);
      // $content = str_replace(']]>', ']]&gt;', $content);
      $content = get_field('faq_post', $id)['faq_content'];

      $response .= '<div class="collapse collapse-plus bg-brand-light-gray rounded-lg border border-solid border-slate-300 shadow-md mb-6">';
      $response .=  '<input type="radio" class="faq-radio-btn w-full h-full block" name="faq-' . $faq_id . '" />';
      $response .=  '<div class="collapse-title bg-white text-xl lg:text-2xl border-t-0 border-x-0 border-b border-solid border-slate-300 font-medium py-5 pl-8 pr-12 after:font-thin after:!end-8 after:text-brand-tomato after:!top-2 after:text-3xl after:lg:text-5xl">';
      $response .=  get_the_title();
      $response .=  '</div>';
      $response .=  '<div class="collapse-content p-0">';
      $response .=  '<div class="p-8">';
      $response .=  '<div class="prose lg:prose-lg max-w-none">';
      $response .= $content;
      $response .=  '</div>';
      $response .=  '</div>';
      $response .=  '</div>';
      $response .=  '</div>';
    }
  } else {
    $response = '<div class="text-center py-4 px-8">No FAQs Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_faqs', 'filter_faqs');
add_action('wp_ajax_nopriv_filter_faqs', 'filter_faqs');
