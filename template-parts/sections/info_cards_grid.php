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

$info_cards_grid = get_sub_field('info_cards_grid') ?: []; // Group

$heading_text = $info_cards_grid['heading']['heading_text'] ?? '';
$text_area = $info_cards_grid['text_area']['text_area'] ?? '';
$info_cards_settings = $info_cards_grid['info_cards_settings'] ?? [];
$grid_columns = $info_cards_settings['grid_columns'] ?? '2';
$info_cards_repeater = $info_cards_settings['info_cards_repeater'] ?? [];
//$show_pagination = $posts_settings['show_pagination'] ?? '';

$uniqid = uniqid();
$section_class = 'section-info_cards_grid-' . $uniqid;

//preint_r($select_category);

?>

<section <?php echo $section_id ?> class="<?php echo $section_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-2xl">
        <div class="flex gap-x-20 items-end">
          <div class="w-full xl:w-2/3">
            <?php
            if ($heading_text) {
              echo '<div class="mb-4">';
              get_template_part('template-parts/components/heading', '', array('field' => $info_cards_grid, 'align' => 'text-left', 'size' => 'text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
              echo '</div>';
            }
            ?>
            <?php
            if ($text_area) {
              echo '<div class="w-full">';
              get_template_part('template-parts/components/textarea', '', array('field' => $info_cards_grid, 'align' => 'text-left', 'weight' => 'font-medium'));
              echo '</div>';
            }
            ?>
          </div>
        </div>
      </div>
      <?php if ($info_cards_repeater) : ?>
        <div class="info_cards_grid-container relative container max-w-screen-2xl my-8 xl:my-12">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 lg:gap-8">
            <?php
            foreach ($info_cards_repeater as $card) :
              $info_card = $card['info_card'] ?? '';
              //preint_r($info_card);
              if ($info_card) {
                echo get_template_part('template-parts/components/info_card', '', array('field' => $info_card));
              }
            ?>
            <?php endforeach ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>