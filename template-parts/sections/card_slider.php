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
$card_slider = get_sub_field('card_slider') ?: [];
$heading_text = $card_slider['heading']['heading_text'] ?? '';
$text_area = $card_slider['text_area']['text_area'] ?? '';
$card_slides = $card_slider['card_slider'] ?? '';
$section_card_class = 'section-cards-' . uniqid();

?>
<section <?php echo $section_id ?> class="<?php echo $section_card_class ?> relative section-wrapper" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="intro-container relative container mx-auto max-w-screen-2xl">
      <div class="detect-position h-0 w-0 invisible"></div>
      <?php
      if ($heading_text) {
        echo '<div class="mb-4">';
        get_template_part('template-parts/components/heading', '', array('field' => $card_slider, 'align' => 'text-left', 'size' => 'text-4xl xl:text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
        echo '</div>';
      }
      ?>
      <?php
      if ($text_area) {
        echo '<div class="w-full xl:w-2/3">';
        get_template_part('template-parts/components/textarea', '', array('field' => $card_slider, 'align' => 'text-left', 'weight' => 'font-medium'));
        echo '</div>';
      }
      ?>
    </div>
    <div class="swiper-container relative mt-8 mb-8 xl:mt-16 xl:mb-12">
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php foreach ($card_slides as $card) : ?>
            <?php
            $title = $card['title'] ?? '';
            $text = $card['text'] ?? '';
            $background_image = $card['background_image']['url'] ?? '';
            $overlay = $card['overlay'] ?? '';
            $link = $card['link']['url'] ?? '#';

            $overlay_style = '';
            if ($overlay) {
              $overlay_style = '--tw-gradient-stops: ' . $overlay . ' 0%, transparent 100%;';
            }
            ?>
            <div class="swiper-slide max-w-[418px]" style="<?php echo $overlay_style ?>">
              <div class="pr-4 lg:pr-0">
                <a href="<?php echo $link ?>" class="group block bg-slate-100 rounded-xl overflow-clip transition-all duration-300">
                  <div class="aspect-w-4 aspect-h-5">
                    <img src="<?php echo $background_image ?>" class="object-cover h-full w-full transition-all duration-500 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t bg-blend-multiply flex flex-col justify-end">
                      <div class="p-4 xl:p-8 text-white">
                        <h4 class="text-[34px] font-medium"><?php echo $title ?></h4>
                        <div class="mt-2 text-base font-medium"><?php echo $text ?></div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="swiper-slide max-w-[328px] hidden lg:block">
            <div class="pr-4 lg:pr-0">
              <div class="aspect-w-4 aspect-h-5">
                <div class="p-4 bg-transparent rounded-xl"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="absolute inset-0">
        <div class="container max-w-screen-2xl relative h-full">
          <button type="button" class="swiper-btn-prev absolute z-10 left-auto lg:-left-20 xl:-left-32 top-auto -bottom-12 right-14 lg:top-1/2 lg:bottom-auto lg:right-auto lg:-translate-y-1/2 w-8 h-8 xl:w-16 xl:h-16 flex items-center justify-center text-slate-400 lg:text-slate-300 hover:text-brand-tomato transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'arrow-circle-left', 'group' => 'utilities', 'size' => '96', 'class' => 'w-16 h-16')); ?>
          </button>
          <button type="button" class="swiper-btn-next absolute z-10 right-4 xl:-right-32 top-auto -bottom-12 lg:top-1/2 lg:bottom-auto lg:-translate-y-1/2 w-8 h-8 xl:w-16 xl:h-16 flex items-center justify-center text-slate-400 lg:text-slate-300 hover:text-brand-tomato transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'arrow-circle-right', 'group' => 'utilities', 'size' => '96', 'class' => 'w-16 h-16')); ?>
          </button>
        </div>
      </div>
      <div class="absolute left-0 -bottom-10 right-24 lg:-bottom-10 lg:right-0">
        <div class="container max-w-screen-2xl px-4 xl:px-8">
          <div class="relative">
            <div class="swiper-scrollbar !h-1.5 bg-brand-tomato/20 [&>.swiper-scrollbar-drag]:bg-brand-tomato"></div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      jQuery(function($) {
        let xPos = $(".<?php echo $section_card_class ?> .detect-position").offset().left;
        $(".<?php echo $section_card_class ?> .swiper-container").css("padding-left", xPos);
        new Swiper('.<?php echo $section_card_class ?> .swiper', {
          slidesPerView: 'auto',
          spaceBetween: 16,
          loop: false,
          watchOverflow: true,
          //centerInsufficientSlides: true,
          scrollbar: {
            el: ".<?php echo $section_card_class ?> .swiper-scrollbar",
            hide: false,
          },
          navigation: {
            nextEl: '.<?php echo $section_card_class ?> .swiper-btn-next',
            prevEl: '.<?php echo $section_card_class ?> .swiper-btn-prev',
          },
          breakpoints: {
            768: {
              slidesPerView: 'auto',
              spaceBetween: 24
            },
            1280: {
              slidesPerView: 'auto',
              spaceBetween: 30
            }
          }
        });
      });
    </script>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>