<?php
include get_template_directory() . '/template-parts/global/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/

$section_id = 'section-testimonial-' . uniqid();
function testimonial($text = null, $name = null, $source = null)
{ ?>
  <div class="container max-w-screen-xl">
    <?php if ($text) : ?>
      <div class="testimonial-text text-4xl leading-tight font-light text-center text-slate-500">
        <?php echo $text ?>
      </div>
    <?php endif; ?>
    <?php if ($name) : ?>
      <div class="testimonial-name max-w-screen-md mx-auto text-center pt-16 mt-16 border-t border-slate-300">
        <div class="text-3xl font-bold"><?php echo $name ?></div>
        <?php if ($source) : ?>
          <div class="text-lg font-medium"><?php echo $source ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
<?php } ?>
<section class="relative bg-brand-light-gray <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="relative container mx-auto max-w-screen-2xl mb-20">
      <div class="text-center">
        <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Our success stories</h3>
      </div>
    </div>
    <div class="relative container mx-auto max-w-screen-2xl">
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <?php
            $text = 'Adopted my cat here. Process was easy and staff are kind.<br />
              We bring him back for check ups and the vets are so knowledgeable and lovely. Keep up the great work!';
            $name = 'Kat S';
            $source = 'Google Review';
            echo testimonial($text, $name, $source);
            ?>
          </div>
          <div class="swiper-slide">
            <?php
            $text = 'Adopted my cat here. Process was easy and staff are kind.<br />
              We bring him back for check ups and the vets are so knowledgeable and lovely. Keep up the great work!';
            $name = 'Kat S';
            $source = 'Google Review';
            echo testimonial($text, $name, $source);
            ?>
          </div>
          <div class="swiper-slide">
            <?php
            $text = 'Adopted my cat here. Process was easy and staff are kind.<br />
              We bring him back for check ups and the vets are so knowledgeable and lovely. Keep up the great work!<br/>
              Adopted my cat here. Process was easy and staff are kind.';
            $name = 'Kat S';
            $source = 'Google Review';
            echo testimonial($text, $name, $source);
            ?>
          </div>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 right-0">
        <div class="container max-w-screen-sm relative h-full">
          <button type="button" class="swiper-btn-prev absolute z-10 left-0 xl:left-16 bottom-6 w-9 h-9 xl:w-6 xl:h-6 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'chevron-left', 'group' => 'utilities', 'size' => '96', 'class' => 'w-6 h-6')); ?>
          </button>
          <button type="button" class="swiper-btn-next absolute z-10 right-0 xl:right-16 bottom-6 w-9 h-9 xl:w-6 xl:h-6 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '96', 'class' => 'w-6 h-6')); ?>
          </button>
        </div>
      </div>
      <script type="text/javascript">
        jQuery(function($) {
          new Swiper('.<?php echo $section_id ?> .swiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: false,
            speed: 500,
            autoHeight: true,
            //watchOverflow: true,
            //centerInsufficientSlides: true,
            navigation: {
              nextEl: '.<?php echo $section_id ?> .swiper-btn-next',
              prevEl: '.<?php echo $section_id ?> .swiper-btn-prev',
            },
            breakpoints: {
              768: {
                slidesPerView: 1,
                spaceBetween: 24
              },
              1280: {
                slidesPerView: 1,
                spaceBetween: 0
              }
            }
          });
        });
      </script>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>