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

$hero_slider = get_sub_field('hero_slider'); // Group
$hero_slider_repeater = isset($hero_slider['hero_slider']) ? $hero_slider['hero_slider'] : '';

$stats_repeater = isset($hero_slider['stats']) ? $hero_slider['stats'] : '';

//preint_r($hero_slider);
// $headline = isset($text_center['headline']) ? $text_center['headline'] : '';
// $headline_color = isset($text_center['headline_color']) ? $text_center['headline_color'] : '';
// $headline_style = '';
// if ($headline_color) {
//   $headline_style .= 'color:' . $headline_color . ';';
// }
// $description = $text_center['description'];
// $description = isset($text_center['description']) ? $text_center['description'] : '';

// $components = isset($text_center['components']) ? $text_center['components'] : '';

?>
<section <?php echo $section_id ?> class="section-hero relative -mt-[136px]" style="<?php echo $section_style ?>">
  <?php if ($hero_slider_repeater) : ?>
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php foreach ($hero_slider_repeater as $hero) : ?>
          <?php
          $heading = isset($hero['heading']) ? $hero['heading'] : ''; // Group
          $heading_text = isset($heading['heading_text']) ? $heading['heading_text'] : '';
          $heading_color = isset($heading['heading_color']) ? $heading['heading_color'] : '';
          $background = isset($hero['background']) ? $hero['background'] : '';
          $background_image = isset($background['background_image']) ? $background['background_image'] : '';
          $background_color = isset($background['background_color']) ? $background['background_color'] : '';
          $background_position = isset($background['background_position']) ? $background['background_position'] : '';
          $background_overlay = isset($background['background_overlay']) ? $background['background_overlay'] : '';
          $background_class = '';
          if ($background_position) {
            $background_class .= 'object-' . $background_position;
          }
          ?>
          <div class="swiper-slide relative">
            <?php if ($background_image) : ?>
              <div class="absolute inset-0 z-0">
                <img class="object-cover w-full h-full <?php echo $background_class ?>" src="<?php echo $background_image['url'] ?>" alt="<?php echo $background_image['alt'] ?>">
              </div>
            <?php endif ?>
            <div class="relative pt-44">
              <?php if ($background_overlay) : ?>
                <div class="absolute inset-0 z-0" style="background-color: <?php echo $background_overlay ?>;">
                </div>
              <?php endif ?>
              <div class="relative z-auto container max-w-screen-2xl">
                <div class="flex xl:gap-x-20 py-16 items-end">
                  <div class="w-1/2">
                    <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">75 Years of Unwavering Love</h2>
                  </div>
                  <div class="w-1/2">
                    <div class="text-[44px] leading-tight font-light text-brand-dark-blue">Ensuring every Cat finds a loving, safe & healthy home.</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="h-[80vh]"></div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="absolute inset-0">
        <div class="container max-w-screen-2xl relative h-full">
          <button type="button" class="swiper-btn-prev absolute z-10 left-0 xl:-left-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-10 xl:h-10 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'chevron-left', 'group' => 'utilities', 'size' => '96', 'class' => 'w-10 h-10')); ?>
          </button>
          <button type="button" class="swiper-btn-next absolute z-10 right-0 xl:-right-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-10 xl:h-10 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '96', 'class' => 'w-10 h-10')); ?>
          </button>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      jQuery(function($) {
        new Swiper('.section-hero .swiper', {
          slidesPerView: 1,
          spaceBetween: 0,
          loop: true,
          speed: 500,
          watchOverflow: true,
          effect: 'fade',
          fadeEffect: {
            crossFade: true
          },
          autoplay: {
            delay: 5000,
          },
          navigation: {
            nextEl: '.section-hero .swiper-btn-next',
            prevEl: '.section-hero .swiper-btn-prev',
          },
        });
      });
    </script>
  <?php endif ?>
  <?php if ($stats_repeater) : ?>
    <div class="absolute bottom-0 left-0 right-0 top-auto z-10 bg-brand-blue bg-opacity-80 py-16">
      <div class="container max-w-screen-3xl">
        <div class="grid grid-cols-4 divide-x divide-white/70">
          <?php
          foreach ($stats_repeater as $stat) :
            $icon = isset($stat['icon']) ? $stat['icon'] : '';
            $number = isset($stat['number']) ? $stat['number'] : '';
            $text = isset($stat['text']) ? $stat['text'] : '';
          ?>
            <div class="text-white px-12">
              <div class="flex gap-x-6 items-center mb-4">
                <div class="flex-none">
                  <?php if ($icon) : ?>
                    <?php echo cpsv_icon(array('icon' => $icon, 'group' => 'content', 'size' => '96', 'class' => 'w-[5.5rem] h-[5.5rem] text-white')); ?>
                  <?php endif; ?>
                </div>
                <?php if ($icon) : ?>
                  <div class="font-semibold text-[44px] leading-tight"><?php echo number_format($number) ?></div>
                <?php endif; ?>
              </div>
              <?php if ($icon) : ?>
                <div class="text-2xl leading-tight"><?php echo $text ?></div>
              <?php endif; ?>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  <?php endif ?>
</section>