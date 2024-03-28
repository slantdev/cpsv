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

$two_columns = get_sub_field('two_columns');
$left_column_components = isset($two_columns['left_column_components_components']) ? $two_columns['left_column_components_components'] : '';
$right_column_components = isset($two_columns['right_column_components_components']) ? $two_columns['right_column_components_components'] : '';
// preint_r($two_columns);
// preint_r($left_column_components);
// preint_r($right_column_components);

?>

<section <?php echo $section_id ?> style="<?php echo $section_style ?>" class="relative">

  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="container mx-auto max-w-screen-2xl animation-wrapper">
      <!-- <div class="relative mx-auto h-1 z-0">
          <div class="absolute top-0 left-0 text-brand-orange text-brand-light-gray -translate-x-1/2 -translate-y-1/4">
            <?php echo cpsv_svg(array('svg' => 'cpsv', 'group' => 'shapes', 'size' => false, 'class' => 'w-[180px] xl:w-[480px] h-auto')); ?>
          </div>
        </div> -->
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12 2xl:gap-x-24 <?php echo $entrance_animation_class ?>">
        <div class="xl:w-1/2">
          <?php get_template_part('template-parts/components/components', '', array('field' => $left_column_components)); ?>
        </div>
        <div class="xl:w-1/2">
          <?php get_template_part('template-parts/components/components', '', array('field' => $right_column_components)); ?>
        </div>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>

</section>