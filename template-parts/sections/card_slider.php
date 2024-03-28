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

$card_slider = get_sub_field('card_slider');
$headline = isset($card_slider['headline']) ? $card_slider['headline'] : '';
$headline_color = isset($card_slider['headline_color']) ? $card_slider['headline_color'] : '';
$headline_style = '';
if ($headline_color) {
  $headline_style .= 'color:' . $headline_color . ';';
}
$description = isset($card_slider['description']) ? $card_slider['description'] : '';
$description_color = isset($card_slider['description_color']) ? $card_slider['description_color'] : '';
$description_style = '';
if ($description_color) {
  $description_style .= 'color:' . $description_color . ';';
}

$card_slides = isset($card_slider['card_slider']) ? $card_slider['card_slider'] : '';

//preint_r($card_slides);

$section_card_id = 'section-cards-' . uniqid();

function card_slide($args)
{
  //preint_r($args);
  $title = isset($args['title']) ? $args['title'] : '';
  $text = isset($args['text']) ? $args['text'] : '';
  $image = isset($args['image']) ? $args['image'] : '';
  $link = isset($args['link']) ? $args['link'] : '#';

  echo '<a href="' . $link . '" class="group block bg-slate-100 rounded-xl overflow-clip transition-all duration-300">';
  echo '<div class="aspect-w-4 aspect-h-5">';
  //echo '<div class="relative">';
  echo '<img src="' . $image . '" class="object-cover h-full w-full" />';
  echo '<div class="absolute inset-0 bg-gradient-to-t from-black bg-blend-multiply flex flex-col justify-end">';
  echo '<div class="p-4 xl:p-8 text-white">';
  echo '<h4 class="text-[34px] font-medium">' . $title . '</h4>';
  echo '<div class="mt-2 text-base font-medium">' . $text . '</div>';
  echo '</div>';
  echo '</div>';
  echo '<div class="absolute inset-0 bg-transparent rounded-xl transition-all duration-300 group-hover:shadow-[0_0px_0px_16px_rgba(0,0,0,0.24)_inset]"></div>';
  //echo '</div>';
  echo '</div>';
  echo '</a>';
}

?>

<section <?php echo $section_id ?> class="relative <?php echo $section_card_id ?>" style="<?php echo $section_style ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <div class="intro-container relative container mx-auto max-w-screen-2xl">
      <div class="detect-position h-0 w-0 invisible"></div>
      <?php if ($headline) : ?>
        <div>
          <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight" style="<?php echo $headline_style ?>"><?php echo $headline ?></h3>
        </div>
      <?php endif ?>
      <?php if ($description) : ?>
        <div class="w-full xl:w-2/3">
          <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium" style="<?php echo $description_style ?>">
            <?php echo $description ?>
          </div>
        </div>
      <?php endif ?>
    </div>
    <div class="swiper-container relative mt-8 mb-8 xl:mt-16 xl:mb-12">
      <?php
      $content = array(
        [
          'title' => 'Adopt a cat',
          'text' => 'Adopting a cat with CPSV not only brings a furry companion into your life but also helps support their mission of finding loving homes for feline friends in need.',
          'image' => site_url() . '/wp-content/uploads/2024/03/617278.jpg',
          'link' => '#'
        ],
        [
          'title' => 'Visit the Vet Clinic',
          'text' => 'Visiting the vet clinic at CPSV ensures your beloved pet receives top-notch care and attention from experienced professionals dedicated to their well-being.',
          'image' => site_url() . '/wp-content/uploads/2024/03/747795.jpg',
          'link' => '#'
        ],
        [
          'title' => 'Support us',
          'text' => 'Supporting CPSV means making a positive impact on the lives of countless animals by contributing to their rescue, rehabilitation, and rehoming efforts.',
          'image' => site_url() . '/wp-content/uploads/2024/03/1543793.jpg',
          'link' => '#'
        ],
        [
          'title' => 'Help & Advice',
          'text' => 'The dedicated work of CPSV encompasses the rescue, care, and placement of homeless cats, ensuring they find loving homes and receive the support they deserve.',
          'image' => site_url() . '/wp-content/uploads/2024/03/1644602.jpg',
          'link' => '#'
        ],
        [
          'title' => 'Lorem Ipsum Dolor',
          'text' => 'In ac felis quis tortor malesuada pretium. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Fusce convallis metus.',
          'image' => site_url() . '/wp-content/uploads/2024/03/1981158.jpg',
          'link' => '#'
        ],
      );
      ?>
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php foreach ($card_slides as $card) : ?>
            <?php
            $title = isset($card['title']) ? $card['title'] : '';
            $text = isset($card['text']) ? $card['text'] : '';
            $background_image = isset($card['background_image']['url']) ? $card['background_image']['url'] : '';
            $link = isset($card['link']) ? $card['link'] : '#';
            ?>
            <div class="swiper-slide max-w-[418px]">
              <a href="<?php echo $link ?>" class="group block bg-slate-100 rounded-xl overflow-clip transition-all duration-300">
                <div class="aspect-w-4 aspect-h-5">
                  <img src="<?php echo $background_image ?>" class="object-cover h-full w-full" />
                  <div class="absolute inset-0 bg-gradient-to-t from-black bg-blend-multiply flex flex-col justify-end">
                    <div class="p-4 xl:p-8 text-white">
                      <h4 class="text-[34px] font-medium"><?php echo $title ?></h4>
                      <div class="mt-2 text-base font-medium"><?php echo $text ?></div>
                    </div>
                    <div class="absolute inset-0 bg-transparent rounded-xl transition-all duration-300 group-hover:shadow-[0_0px_0px_16px_rgba(0,0,0,0.24)_inset]"></div>';
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
          <div class="swiper-slide max-w-[328px]">
            <div class="aspect-w-4 aspect-h-5">
              <div class="p-4 bg-transparent rounded-xl"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="absolute inset-0">
        <div class="container max-w-screen-2xl relative h-full">
          <button type="button" class="swiper-btn-prev absolute z-10 left-0 xl:-left-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-16 xl:h-16 flex items-center justify-center text-slate-300 hover:text-brand-tomato transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'arrow-circle-left', 'group' => 'utilities', 'size' => '96', 'class' => 'w-16 h-16')); ?>
          </button>
          <button type="button" class="swiper-btn-next absolute z-10 right-0 xl:-right-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-16 xl:h-16 flex items-center justify-center text-slate-300 hover:text-brand-tomato transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'arrow-circle-right', 'group' => 'utilities', 'size' => '96', 'class' => 'w-16 h-16')); ?>
          </button>
        </div>
      </div>
      <div class="absolute -bottom-10 left-0 right-0">
        <div class="container max-w-screen-2xl px-4 xl:px-8">
          <div class="relative">
            <div class="swiper-scrollbar !h-1.5 bg-brand-tomato/20 [&>.swiper-scrollbar-drag]:bg-brand-tomato"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    jQuery(function($) {
      let xPos = $(".<?php echo $section_card_id ?> .detect-position").offset().left;
      $(".<?php echo $section_card_id ?> .swiper-container").css("padding-left", xPos);
      new Swiper('.<?php echo $section_card_id ?> .swiper', {
        slidesPerView: 'auto',
        spaceBetween: 32,
        loop: false,
        watchOverflow: true,
        //centerInsufficientSlides: true,
        scrollbar: {
          el: ".<?php echo $section_card_id ?> .swiper-scrollbar",
          hide: false,
        },
        navigation: {
          nextEl: '.<?php echo $section_card_id ?> .swiper-btn-next',
          prevEl: '.<?php echo $section_card_id ?> .swiper-btn-prev',
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
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>