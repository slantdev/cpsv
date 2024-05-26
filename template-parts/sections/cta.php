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

$cta = get_sub_field('cta_banner') ?: []; // Group
$background = $cta['background'] ?? '';
$background_image = $cta['background']['background_image'] ?? '';
$content = $cta['content'] ?? [];
$components = $content['components'] ?? '';
$content_bg = $content['content_bg'] ?? '';

$section_class = 'section-cta-' . uniqid();

?>

<section <?php echo $section_id ?> class="<?php echo $section_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php
  if ($background_image) {
    get_template_part('template-parts/components/background', '', array('field' => $background));
  }
  ?>
  <?php
  if ($content_bg) {
    echo '<div class="absolute top-0 left-0 lg:left-1/2 right-0 bottom-0 lg:w-1/2 h-full" style="background-color:' . $content_bg . '"></div>';
  } else {
    echo '<div class="absolute top-0 left-0 lg:left-1/2 right-0 bottom-0 lg:w-1/2 h-full bg-gradient-to-l from-brand-yellow to-brand-yellow/80"></div>';
  }
  ?>
  <div class="relative z-10 container max-w-screen-2xl py-8 xl:py-36">
    <div class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-1/2"></div>
      <div class="w-full lg:w-1/2">
        <div class="relative pl-0 lg:pl-24 pt-6">
          <div class="absolute top-0 right-0 text-white -translate-y-1/2 hidden">
            <?php echo cpsv_svg(array('svg' => 'cpsv', 'group' => 'shapes', 'size' => false, 'class' => 'w-[128px] xl:w-[128px] h-auto text-white')); ?>
          </div>
          <?php
          if ($components) {
            get_template_part('template-parts/components/components', '', array('field' => $components));
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>