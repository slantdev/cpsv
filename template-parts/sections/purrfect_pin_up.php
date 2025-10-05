<?php
include get_template_directory() . '/template-parts/global/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_id = $section_id ? 'id="' . $section_id . '"' : '';

$purrfect_pin_up = get_sub_field('purrfect_pin_up') ?: []; // Group
$winners = $purrfect_pin_up['winners'] ?? []; // Moved here

$heading_text = $purrfect_pin_up['heading']['heading_text'] ?? '';
$text_area = $purrfect_pin_up['text_area']['text_area'] ?? '';
$show_search_bar = $purrfect_pin_up['show_search_bar'] ?? '';
$show_sort = $purrfect_pin_up['show_sort'] ?? '';
$card_background_color = $purrfect_pin_up['card_background_color'] ?? '#f4efea';
$posts_per_page = $purrfect_pin_up['posts_per_page'] ?? '-1';
$show_pagination = $purrfect_pin_up['show_pagination'] ?? 'false';
$popup_settings = $purrfect_pin_up['popup_settings'] ?? ''; //Group
$popup_headline = $popup_settings['popup_headline'] ?? '';
$popup_description = $popup_settings['popup_description'] ?? '';
$popup_button = $popup_settings['popup_button_link'] ?? '';
$popup_button_link = $popup_settings['popup_button_link']['url'] ?? '';
$popup_button_title = $popup_settings['popup_button_link']['title'] ?? 'Donate Now';
$popup_button_target = $popup_settings['popup_button_link']['target'] ?? '_self';

$uniqid = uniqid();
$section_purrfect_pin_up_class = 'section-purrfect_pin_up-' . $uniqid;

if ($card_background_color) {
  $section_style .= '--ff-card-bg: ' . $card_background_color;
}

?>
<style>
  .frm_form_field:not(.frm_compact) .frm_dropzone {
    width: 100%;
  }
</style>
<section <?php echo $section_id ?> class="<?php echo $section_purrfect_pin_up_class ?> section-wrapper relative" style="<?php echo $section_style ?>" data-posts-per-page="<?php echo esc_attr($posts_per_page); ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-2xl">
        <?php
        if ($heading_text) {
          echo '<div class="mb-4">';
          get_template_part('template-parts/components/heading', '', array('field' => $purrfect_pin_up, 'align' => 'text-left', 'size' => 'text-4xl xl:text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
          echo '</div>';
        }
        ?>
        <?php
        if ($text_area) {
          echo '<div class="w-full xl:w-2/3">';
          get_template_part('template-parts/components/textarea', '', array('field' => $purrfect_pin_up, 'align' => 'text-left', 'weight' => 'font-medium'));
          echo '</div>';
        }
        ?>
      </div>
      <div class="container mx-auto max-w-screen-2xl">
        <div class="ff-toolbox flex flex-col gap-4 md:flex-row md:justify-between mb-4 lg:mb-8">
          <?php if ($show_sort) : ?>
            <div class="ff-sort order-2 md:order-1">
              <div class="ff-sort-buttons flex gap-2">
                <button class="sort-btn active" data-sort="newest">Newest</button>
                <button class="sort-btn" data-sort="oldest">Oldest</button>
                <button class="sort-btn" data-sort="highest_votes">Highest Votes</button>
              </div>
            </div>
          <?php endif; ?>
          <?php if ($show_search_bar) : ?>
            <div class="ff-search order-1 md:order-2 lg:w-96">
              <form class="ff-search-form">
                <div class="bg-white rounded-full px-1 py-1 shadow-[inset_0_2px_4px_0px_rgba(0,0,0,0.3)] flex gap-1 lg:justify-between w-full">
                  <input type="search" name="feline_search" class="ff-search-input border-none min-w-0 w-full lg:max-w-64 bg-transparent rounded-full focus:ring-0 focus:border-0" placeholder="Cat's name...">
                  <button type="submit" class="ff-search-btn grow-0 bg-brand-blue text-white rounded-full px-8 py-2 font-semibold w-auto">Search</button>
                </div>
              </form>
            </div>
          <?php endif; ?>
        </div>
        <div class="relative">
          <div class="ff-loader-container" style="display: none;">
            <div class="ff-loader"></div>
          </div>
          <div id="ff-grid-container">
            <?php
            if (!is_admin()) {
              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

              if (!empty($winners)) {
                $winner_ids = wp_list_pluck($winners, 'ID');
                $args = array(
                  'post_type' => 'famous-feline',
                  'post_status' => 'publish',
                  'posts_per_page' => -1,
                  'post__in' => $winner_ids,
                  'orderby' => 'post__in',
                );
              } else {
                $args = array(
                  'post_type' => 'famous-feline',
                  'post_status' => 'publish',
                  'posts_per_page' => $posts_per_page,
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'paged' => $paged,
                );
              }
            } else {
              $args = array(
                'post_type' => 'famous-feline',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
              );
            }

            $felines_query = new WP_Query($args);

            if ($felines_query->have_posts()) :
            ?>
              <?php if (!is_admin()) : ?>
                <div class="ff-masonry">
                  <div class="gutter-sizer"></div>
                  <?php
                  while ($felines_query->have_posts()) : $felines_query->the_post();
                    echo get_feline_card_html(get_the_ID(), empty($winners));
                  endwhile;
                  ?>
                </div>
              <?php else : ?>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-8">
                  <?php
                  while ($felines_query->have_posts()) : $felines_query->the_post();
                    echo get_feline_card_html(get_the_ID(), empty($winners));
                  endwhile;
                  ?>
                </div>
              <?php endif; ?>
            <?php
              // Pagination is now handled outside this container
              wp_reset_postdata();
            else :
              echo '<p class="text-center col-span-full">No contestants found. Be the first to enter!</p>';
            endif;
            ?>
          </div>
          <div id="ff-pagination-container" class="ff-pagination mt-8">
            <?php
            if ($show_pagination && isset($felines_query) && $felines_query->max_num_pages > 1) {
              echo paginate_links(array(
                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format' => '?paged=%#%',
                'current' => max(1, $paged),
                'total' => $felines_query->max_num_pages,
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
                'type' => 'list',
              ));
            }
            ?>
          </div>
        </div>
      </div>

    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
  <?php if ($popup_headline && $popup_description) : ?>
    <div id="vote-popup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center px-4">
      <div class="relative bg-white rounded-lg shadow-lg p-8 max-w-screen-sm w-full">
        <h3 class="text-2xl font-bold mb-4 text-primary-text lg:text-3xl"><?php echo esc_html($popup_headline); ?></h3>
        <div class="mb-6 text-secondary-text"><?php echo wp_kses_post($popup_description); ?></div>
        <?php if ($popup_button_link) : ?>
          <a class="btn btn-lg btn-primary" href="<?php echo $popup_button_link ?>" target="<?php echo $popup_button_target ?>"><?php echo $popup_button_title ?></a>
        <?php endif; ?>
        <button id="close-vote-popup" class="btn btn-circle btn-sm btn-outline text-2xl font-normal absolute right-6 top-6">&times;</button>
      </div>
    </div>
  <?php endif; ?>

  <div id="feline-popup-shell" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 overflow-y-auto">
    <div class="feline-popup-wrapper flex items-center justify-center min-h-screen p-4">
      <div class="feline-popup-container bg-white rounded-lg shadow-lg w-full max-w-3xl relative">
        <button id="feline-popup-close" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-3xl z-10">&times;</button>
        <div id="feline-popup-content" class="p-8">
          <div class="feline-popup-loader"></div>
        </div>
      </div>
    </div>

    <button id="feline-popup-prev" class="absolute top-1/2 left-4 -translate-y-1/2 text-white text-4xl bg-black/20 hover:bg-black/50 rounded-full w-12 h-12 flex items-center justify-center">&lt;</button>
    <button id="feline-popup-next" class="absolute top-1/2 right-4 -translate-y-1/2 text-white text-4xl bg-black/20 hover:bg-black/50 rounded-full w-12 h-12 flex items-center justify-center">&gt;</button>
  </div>

  <div id="vote-confirm-popup" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center px-4">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
      <h3 class="text-2xl font-bold mb-4 text-primary-text">Change your vote?</h3>
      <p class="mb-6 text-secondary-text">Are you sure you want to change your vote?</p>
      <div class="flex justify-center gap-4">
        <button id="vote-confirm-cancel" class="btn btn-lg btn-outline">Cancel</button>
        <button id="vote-confirm-yes" class="btn btn-lg btn-primary">Yes, Change Vote</button>
      </div>
    </div>
  </div>
</section>