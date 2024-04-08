<?php

// Load Posts
add_action('wp_ajax_pagination_load_posttypes', 'pagination_load_posttypes');
add_action('wp_ajax_nopriv_pagination_load_posttypes', 'pagination_load_posttypes');
function pagination_load_posttypes()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $page = sanitize_text_field($_POST['page']);
    $post_type = sanitize_text_field($_POST['post_type']);
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

    $all_posts = new WP_Query(
      array(
        'post_type'         => $post_type,
        'post_status '      => 'publish',
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'posts_per_page'    => $per_page,
        'offset'            => $start
      )
    );
    $count = new WP_Query(
      array(
        'post_type'         => $post_type,
        'post_status '      => 'publish',
        'posts_per_page'    => -1
      )
    );

    // if ($terms) {
    //   $all_posts = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'orderby'           => 'post_date',
    //       'order'             => 'DESC',
    //       'posts_per_page'    => $per_page,
    //       'offset'            => $start,
    //       'tax_query' => array(
    //         array(
    //           'taxonomy' => 'category',
    //           'field' => 'id',
    //           'terms' => $terms,
    //         ),
    //       ),
    //     )
    //   );
    //   $count = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'posts_per_page'    => -1,
    //       'tax_query' => array(
    //         array(
    //           'taxonomy' => 'category',
    //           'field' => 'id',
    //           'terms' => $terms,
    //         ),
    //       ),
    //     )
    //   );
    // } else {
    //   $all_posts = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'orderby'           => 'post_date',
    //       'order'             => 'DESC',
    //       'posts_per_page'    => $per_page,
    //       'offset'            => $start
    //     )
    //   );
    //   $count = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'posts_per_page'    => -1
    //     )
    //   );
    // }

    $count = $count->post_count;
    if ($all_posts->have_posts()) {
      $postCount = 0;
      echo '<div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-6">';
      while ($all_posts->have_posts()) {
        $postCount++;
        $all_posts->the_post();
        $the_id = get_the_ID();
        $page_header = get_field('page_header', $the_id);
        $image = $page_header['page_header_settings']['background']['background_image']['url'] ?? '';
        if (has_post_thumbnail($the_id)) {
          $image = get_the_post_thumbnail_url($the_id, 'large');
        }
        $title =  get_the_title();
        // $date =  get_the_date();
        // $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 30, $more = null);
        $link = get_the_permalink();
        if ($postCount == 1) { ?>
          <div class="col-span-3">
            <div class="card-wrapper">
              <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
                <div class="aspect-w-16 aspect-h-6">
                  <?php if ($image) : ?>
                    <img class="featured-image object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
                  <?php else : ?>
                    <div class="w-full h-full bg-slate-50"></div>
                  <?php endif; ?>
                </div>
                <div class="absolute inset-0 bg-gradient-to-l from-black/80 via-transparent bg-blend-multiply"></div>
                <div class="absolute right-4 bottom-4 text-white">
                  <?php echo cpsv_icon(array('icon' => 'plus-circle', 'group' => 'utilities', 'size' => '64', 'class' => 'w-16 h-16')); ?>
                </div>
                <div class="absolute inset-0">
                  <div class="w-full h-full flex justify-end items-end">
                    <div class="w-2/5 px-12 py-8">
                      <h4 class="text-3xl leading-tight font-semibold text-white"><?php echo $title ?></h4>
                      <div class="text-lg text-white underline mt-24">Read More</div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } else { ?>
          <div class="card-wrapper">
            <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
              <div class="aspect-1">
                <?php if ($image) : ?>
                  <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
                <?php else : ?>
                  <div class="w-full h-full bg-slate-50"></div>
                <?php endif; ?>
              </div>
              <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent bg-blend-multiply"></div>
              <div class="absolute right-4 bottom-4 text-white">
                <?php echo cpsv_icon(array('icon' => 'plus-circle', 'group' => 'utilities', 'size' => '64', 'class' => 'w-16 h-16')); ?>
              </div>
            </a>
            <div class="py-4">
              <h4><a href="<?php echo $link ?>" class="text-2xl leading-tight font-semibold text-brand-dark-blue hover:underline"><?php echo $title ?></a></h4>
            </div>
          </div>
      <?php }
      }
      echo '</div>';
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
      <div class='posts-pagination mt-10 pt-4 border-t border-slate-200'>
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

// Load Posts Grid
add_action('wp_ajax_pagination_load_postgrid', 'pagination_load_postgrid');
add_action('wp_ajax_nopriv_pagination_load_postgrid', 'pagination_load_postgrid');
function pagination_load_postgrid()
{
  global $wpdb;
  // Set default variables
  $msg = '';
  if (isset($_POST['page'])) {
    // Sanitize the received page
    $page = sanitize_text_field($_POST['page']);
    $post_type = sanitize_text_field($_POST['post_type']);
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

    $all_posts = new WP_Query(
      array(
        'post_type'         => $post_type,
        'post_status '      => 'publish',
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'posts_per_page'    => $per_page,
        'offset'            => $start
      )
    );
    $count = new WP_Query(
      array(
        'post_type'         => $post_type,
        'post_status '      => 'publish',
        'posts_per_page'    => -1
      )
    );

    // if ($terms) {
    //   $all_posts = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'orderby'           => 'post_date',
    //       'order'             => 'DESC',
    //       'posts_per_page'    => $per_page,
    //       'offset'            => $start,
    //       'tax_query' => array(
    //         array(
    //           'taxonomy' => 'category',
    //           'field' => 'id',
    //           'terms' => $terms,
    //         ),
    //       ),
    //     )
    //   );
    //   $count = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'posts_per_page'    => -1,
    //       'tax_query' => array(
    //         array(
    //           'taxonomy' => 'category',
    //           'field' => 'id',
    //           'terms' => $terms,
    //         ),
    //       ),
    //     )
    //   );
    // } else {
    //   $all_posts = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'orderby'           => 'post_date',
    //       'order'             => 'DESC',
    //       'posts_per_page'    => $per_page,
    //       'offset'            => $start
    //     )
    //   );
    //   $count = new WP_Query(
    //     array(
    //       'post_type'         => 'post',
    //       'post_status '      => 'publish',
    //       'posts_per_page'    => -1
    //     )
    //   );
    // }

    $count = $count->post_count;
    if ($all_posts->have_posts()) {
      $postCount = 0;
      echo '<div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">';
      while ($all_posts->have_posts()) {
        $postCount++;
        $all_posts->the_post();
        $the_id = get_the_ID();
        $page_header = get_field('page_header', $the_id);
        $image = $page_header['page_header_settings']['background']['background_image']['url'] ?? '';
        if (has_post_thumbnail($the_id)) {
          $image = get_the_post_thumbnail_url($the_id, 'large');
        }
        $title =  get_the_title();
        // $date =  get_the_date();
        $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 20, $more = null);
        $link = get_the_permalink();
      ?>
        <div class="card-wrapper rounded-xl overflow-clip shadow-lg bg-white flex flex-col">
          <a href="<?php echo $link ?>" class="group block relative rounded-t-xl overflow-clip">
            <div class="aspect-w-16 aspect-h-9">
              <?php if ($image) : ?>
                <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
              <?php else : ?>
                <div class="w-full h-full bg-slate-50"></div>
              <?php endif; ?>
            </div>
          </a>
          <div class="p-4 xl:p-6 bg-white grow flex flex-col">
            <h4 class="mb-4"><a href="<?php echo $link ?>" class="text-2xl leading-tight font-semibold text-brand-dark-blue hover:underline" style="color: var(--section-link-color)"><?php echo $title ?></a></h4>
            <div class="mb-6 text-sm"><?php echo $excerpt ?></div>
            <div class="mt-auto"><a href="<?php echo $link ?>" class="font-semibold text-brand-dark-blue uppercase underline hover:no-underline" style="color: var(--section-link-color)">Learn More</a></div>
          </div>
        </div>
      <?php }
      echo '</div>';
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
      <div class='posts-pagination mt-10 pt-4 border-t border-slate-200'>
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
