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

$heading_text = $purrfect_pin_up['heading']['heading_text'] ?? '';
$text_area = $purrfect_pin_up['text_area']['text_area'] ?? '';
$show_search_bar = $purrfect_pin_up['show_search_bar'] ?? '';
$show_sort = $purrfect_pin_up['show_sort'] ?? '';
$card_background_color = $purrfect_pin_up['card_background_color'] ?? '#f4efea';
$posts_per_page = $purrfect_pin_up['posts_per_page'] ?? '-1';
$show_pagination = $purrfect_pin_up['show_pagination'] ?? 'false';

$uniqid = uniqid();
$section_purrfect_pin_up_class = 'section-purrfect_pin_up-' . $uniqid;

if ($card_background_color) {
  $section_style .= '--ff-card-bg: ' . $card_background_color;
}

?>
<section <?php echo $section_id ?> class="<?php echo $section_purrfect_pin_up_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
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
        <div class="ff-toolbox flex justify-between mb-4 lg:mb-8">
          <?php if ($show_sort) : ?>
            <div class="ff-sort">
              <div class="ff-sort-buttons flex gap-2">
                <button class="sort-btn active" data-sort="newest">Newest</button>
                <button class="sort-btn" data-sort="oldest">Oldest</button>
                <button class="sort-btn" data-sort="highest_votes">Highest Votes</button>
              </div>
            </div>
          <?php endif; ?>
          <?php if ($show_search_bar) : ?>
            <div class="ff-search">
              <form class="ff-search-form">
                <div class="bg-white rounded-full px-1 py-1 shadow-[inset_0_2px_4px_0px_rgba(0,0,0,0.3)] flex gap-1">
                  <input type="search" name="feline_search" class="ff-search-input border-none min-w-56 bg-transparent rounded-full focus:ring-0 focus:border-0" placeholder="Cat's name...">
                  <button type="submit" class="ff-search-btn bg-brand-blue text-white rounded-full px-8 py-2 font-semibold">Search</button>
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
              $args = array(
                'post_type' => 'famous-feline',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
              );
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
                    echo get_feline_card_html(get_the_ID());
                  endwhile;
                  ?>
                </div>
              <?php else : ?>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-8">
                  <?php
                  while ($felines_query->have_posts()) : $felines_query->the_post();
                    echo get_feline_card_html(get_the_ID());
                  endwhile;
                  ?>
                </div>
              <?php endif; ?>
            <?php
              wp_reset_postdata();
            else :
              echo '<p class="text-center col-span-full">No contestants found. Be the first to enter!</p>';
            endif;
            ?>
          </div>
        </div>
      </div>

    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>