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

$text_center = get_sub_field('text_center');
$headline = isset($text_center['headline']) ? $text_center['headline'] : '';
$headline_color = isset($text_center['headline_color']) ? $text_center['headline_color'] : '';
$headline_style = '';
if ($headline_color) {
  $headline_style .= 'color:' . $headline_color . ';';
}
$description = $text_center['description'];
$description = isset($text_center['description']) ? $text_center['description'] : '';

$components = isset($text_center['components']) ? $text_center['components'] : '';

// Notes:
// Columns settings doesn't work yet
$column_settings = $text_center['column_settings'];
$alignment = $column_settings['alignment'];
$max_width = $column_settings['max_width'];
?>

<section <?php echo $section_id ?> style="<?php echo $section_style ?>">
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php if ($top_separator) : ?>
      <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-brand-purple" style="<?php echo $top_separator_style ?>"></div>
    <?php endif; ?>
    <div class="container mx-auto animation-wrapper">
      <div class="max-w-screen-lg mx-auto text-center z-[1] <?php echo $entrance_animation_class ?>">
        <?php if ($headline) : ?>
          <h3 class="text-black text-2xl md:text-3xl font-bold" style="<?php echo $headline_style ?>"><?php echo $headline ?></h3>
        <?php endif; ?>
        <?php if ($description) : ?>
          <div class="mt-6 text-base md:text-lg font-medium"><?php echo $description ?></div>
        <?php endif; ?>
        <?php get_template_part('template-parts/components/components', '', array('field' => $components)); ?>
      </div>
    </div>
    <?php if ($bottom_separator) : ?>
      <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-brand-purple" style="<?php echo $bottom_separator_style ?>"></div>
    <?php endif; ?>
  </div>
</section>