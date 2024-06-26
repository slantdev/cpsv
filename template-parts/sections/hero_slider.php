<?php
include get_template_directory() . '/template-parts/global/section_settings.php';

// Set section ID attribute
$section_id_attr = $section_id ? 'id="' . $section_id . '"' : '';

// Retrieve hero slider and stats repeater
$hero_slider = get_sub_field('hero_slider') ?: [];
$hero_slider_repeater = $hero_slider['hero_slider'] ?? '';
$stats_repeater = $hero_slider['stats'] ?? '';
$disclaimer_text = $hero_slider['disclaimer_text'] ?? '';

?>
<section <?php echo $section_id_attr ?> class="section-hero relative xl:-mt-[136px]" style="<?php echo $section_style ?>">
  <?php if ($hero_slider_repeater) : ?>
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php foreach ($hero_slider_repeater as $hero) : ?>
          <?php
          $heading = $hero['heading'] ?? [];
          $heading_text = $heading['heading_text'] ?? '';
          $text_area = $hero['text_area']['text_area'] ?? '';
          $background = $hero['background'] ?? '';
          $background_image = $background['background_image'] ?? '';
          $background_overlay = $background['background_overlay'] ?? '';
          $background_position = $background['background_position'] ?? '';
          $background_class = $background_position ? 'object-' . $background_position : '';
          ?>
          <div class="swiper-slide relative">
            <?php if ($background_image) : ?>
              <div class="absolute inset-0 z-0">
                <img class="object-cover w-full h-full <?php echo $background_class ?>" src="<?php echo $background_image['url'] ?>" alt="<?php echo $background_image['alt'] ?>">
              </div>
            <?php endif ?>
            <div class="relative xl:pt-56">
              <?php if ($background_overlay) : ?>
                <div class="absolute inset-0 z-0" style="background-color: <?php echo $background_overlay ?>;"></div>
              <?php endif ?>
              <div class="relative z-auto container max-w-screen-2xl">
                <div class="flex flex-col xl:flex-row xl:gap-x-20 pt-24 pb-12 xl:py-16 xl:items-end">
                  <div class="hero-title-container w-full xl:w-1/2">
                    <?php
                    if ($heading_text) {
                      get_template_part('template-parts/components/heading', '', array('field' => $hero, 'align' => 'text-left', 'size' => 'text-3xl xl:text-[64px] mb-4 xl:mb-0',  'leading' => 'leading-[1.1em]', 'class' => 'hero-title'));
                    }
                    ?>
                  </div>
                  <div class="hero-subtitle-container w-full xl:w-1/2">
                    <?php
                    if ($text_area) {
                      get_template_part('template-parts/components/textarea', '', array('field' => $hero, 'align' => 'text-left', 'size' => 'text-xl xl:text-[42px]',  'leading' => 'leading-tight', 'weight' => 'font-light', 'class' => 'hero-subtitle'));
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="h-[80vh] xl:h-[80vh]"></div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="swiper-arrows-container absolute inset-0 hidden xl:block">
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
    <div class="absolute bottom-0 left-0 right-0 top-auto z-10 bg-brand-blue bg-opacity-80 py-0 xl:py-16">
      <div class="container max-w-screen-3xl">
        <div class="grid grid-cols-1 xl:grid-cols-4">
          <?php foreach ($stats_repeater as $key => $stat) : ?>
            <?php
            $border_class = '';
            if ($key != '0') {
              $border_class = 'border-t border-r-0 border-l-0 border-b-0 xl:border-t-0 xl:border-l border-solid border-white/20 xl:border-white/50';
            }
            ?>
            <div class="text-white px-0 py-6 xl:py-0 xl:px-12 <?php echo $border_class ?>">
              <div class="flex gap-x-4 xl:gap-x-6 items-center xl:mb-4">
                <div class="flex-none">
                  <?php if (!empty($stat['icon'])) : ?>
                    <?php echo cpsv_icon(array('icon' => $stat['icon'], 'group' => 'content', 'size' => '96', 'class' => 'w-16 h-16 xl:w-[5.5rem] xl:h-[5.5rem] text-white')); ?>
                  <?php endif; ?>
                </div>
                <div class="flex flex-col">
                  <?php if (!empty($stat['number'])) : ?>
                    <div class="font-semibold text-2xl xl:text-[44px] leading-tight"><span class="counterNumber"><?php echo number_format($stat['number']) ?></span></div>
                  <?php endif; ?>
                  <?php if (!empty($stat['text'])) : ?>
                    <div class="xl:hidden text-sm xl:text-2xl leading-tight mt-2"><?php echo $stat['text'] ?></div>
                  <?php endif; ?>
                </div>
              </div>
              <?php if (!empty($stat['text'])) : ?>
                <div class="hidden xl:block text-sm xl:text-2xl leading-tight"><?php echo $stat['text'] ?></div>
              <?php endif; ?>
            </div>
          <?php endforeach ?>
        </div>
        <?php if ($disclaimer_text) : ?>
          <div class="text-xs xl:text-sm text-center italic text-white my-8 xl:mb-0"><?php echo $disclaimer_text ?></div>
        <?php endif ?>
      </div>
    </div>
  <?php endif ?>
</section>