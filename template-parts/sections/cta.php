<?php
include get_template_directory() . '/template-parts/global/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_id = 'section-cta-' . uniqid();
?>
<section class="relative <?php echo $section_id ?>">
  <div class="absolute inset-0 z-0">
    <img class="object-cover w-full h-full object-bottom" src="<?php echo cpsv_asset('/images/banner/catbanner-02.jpg'); ?>" alt="">
    <div class="absolute top-0 left-1/2 right-0 bottom-0 w-1/2 h-full bg-gradient-to-l from-brand-yellow to-brand-yellow/80"></div>
  </div>
  <div class="relative z-10 container max-w-screen-2xl py-8 xl:py-36">
    <div class="flex">
      <div class="w-1/2"></div>
      <div class="w-1/2 relative">
        <div class="relative pl-24 pt-12 text-white">
          <div class="absolute top-0 right-0 text-white -translate-y-1/2">
            <?php echo cpsv_svg(array('svg' => 'cpsv', 'group' => 'shapes', 'size' => false, 'class' => 'w-[128px] xl:w-[128px] h-auto')); ?>
          </div>
          <h3 class="text-5xl font-semibold">Donate Now!</h3>
          <div class="text-xl text-white mt-8">
            Help us make a difference today by clicking ‘Donate Now’ and supporting our mission to provide a better life for cats in need.
          </div>
          <div class="mt-12">
            <a href="#" class="btn bg-white rounded-full px-10 text-base text-brand-dark-blue hover:shadow-lg hover:brightness-110 transition-all duration-300">Make a donation</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>