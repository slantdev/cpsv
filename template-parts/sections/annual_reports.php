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

$annual_reports_grid = get_sub_field('annual_reports_grid') ?: []; // Group

$heading_text = $annual_reports_grid['heading']['heading_text'] ?? '';
$text_area = $annual_reports_grid['text_area']['text_area'] ?? '';
$posts_settings = $annual_reports_grid['posts_settings'] ?? [];
$posts_per_page = $posts_settings['posts_per_page'] ?? '-1';
$show_pagination = $posts_settings['show_pagination'] ?? '';

$uniqid = uniqid();
$section_class = 'section-annual_reports_grid-' . $uniqid;

//preint_r($select_category);

?>

<section <?php echo $section_id ?> class="<?php echo $section_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-2xl">
        <div class="flex flex-col gap-4 lg:flex-row xl:gap-x-20 items-end">
          <div class="w-full xl:w-2/3">
            <?php
            if ($heading_text) {
              echo '<div class="mb-4">';
              get_template_part('template-parts/components/heading', '', array('field' => $annual_reports_grid, 'align' => 'text-left', 'size' => 'text-4xl xl:text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
              echo '</div>';
            }
            ?>
            <?php
            if ($text_area) {
              echo '<div class="w-full">';
              get_template_part('template-parts/components/textarea', '', array('field' => $annual_reports_grid, 'align' => 'text-left', 'weight' => 'font-medium'));
              echo '</div>';
            }
            ?>
          </div>
        </div>
      </div>
      <div class="annual_reports_grid-container relative container max-w-screen-2xl my-8 xl:my-12">
        <div class="reports-grid-<?php echo $uniqid ?>">
        </div>
        <div class="posts-loader absolute inset-0 bg-white bg-opacity-80 z-10 transition-all duration-500 hidden">
          <div class="h-full w-full flex justify-center">
            <svg class="animate-spin h-8 w-8 text-brand-sea opacity-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="color: var(--section-link-color)">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          let ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

          function load_posttypes_<?php echo $uniqid ?>(page) {
            $('.reports-grid-<?php echo $uniqid ?>').next('.posts-loader').show();
            let pagination = '<?php echo $show_pagination ?>';
            let data = {
              page: page,
              per_page: <?php echo $posts_per_page ?>,
              pagination: pagination,
              action: 'pagination_load_reportsgrid',
            };
            //console.log(data);
            $.post(ajaxurl, data, function(response) {
              //console.log(response);
              $('.reports-grid-<?php echo $uniqid ?>').html('').prepend(response);
              $('.reports-grid-<?php echo $uniqid ?>').next('.posts-loader').hide();
            });
          }
          load_posttypes_<?php echo $uniqid ?>(1);

          $(document).on(
            'click',
            '.reports-grid-<?php echo $uniqid ?> .posts-pagination li.active',
            function() {
              $('html').animate({
                  scrollTop: $(".reports-grid-<?php echo $uniqid ?>").offset().top - 100,
                },
                800
              );
              let page = $(this).data('page');
              load_posttypes_<?php echo $uniqid ?>(page);
            }
          );

        });
      </script>
    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>