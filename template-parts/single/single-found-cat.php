<?php

$page_header_settings = $page_header['page_header_settings'] ?? ''; // Group
$breadcrumbs_settings = $page_header_settings['breadcrumbs'] ?? '';
$show_breadcrumbs = true;
$breadcrumbs_text_color = '#020044';
$separator_color = '#FF6347';
$breadcrumbs_style = '';
if ($breadcrumbs_text_color) {
  $breadcrumbs_style .= '--breadcrumbs-text-color:' . $breadcrumbs_text_color . ';';
}
if ($separator_color) {
  $breadcrumbs_style .= '--breadcrumbs-separator-color:' . $separator_color . ';';
}

$title = get_the_title();
$title_color = '#020044';
$title_style = '';
if ($title_color) {
  $title_style .= 'color:' . $title_color . ';';
}

$description = '';
$description_color = '#020044';
$description_style = '';
if ($description_color) {
  $description_style .= 'color:' . $description_color . ';';
}

$buttons = isset($page_header_settings['buttons']) ? $page_header_settings['buttons'] : '';

$background = '';
$background_image = isset($background['background_image']) ? $background['background_image'] : '';
$background_position = isset($background['background_position']) ? $background['background_position'] : '';
$background_overlay = '#F3F1EF';
$bg_image_class = '';
if ($background_position) {
  $bg_image_class = ' object-' . $background_position;
}
?>

<section class="section-page-header relative -mt-[136px]">
  <?php if ($background_image) : ?>
    <div class="absolute inset-0 z-0">
      <img class="object-cover w-full h-full <?php echo $bg_image_class ?>" src="<?php echo $background_image['url'] ?>" alt="">
    </div>
  <?php endif; ?>
  <div class="relative z-auto pt-44">
    <?php if ($background_overlay) : ?>
      <div class="absolute inset-0 z-0">
        <div class="h-full w-full" style="background-color: <?php echo $background_overlay ?>;"></div>
      </div>
    <?php endif; ?>
    <div class="container max-w-screen-2xl relative z-auto">
      <div class="flex pt-28 pb-20 items-end">
        <div class="w-full xl:w-3/5">
          <?php if ($show_breadcrumbs) : ?>
            <?php
            if (function_exists('yoast_breadcrumb')) {
              yoast_breadcrumb('<div class="breadcrumbs mb-6" style="' . $breadcrumbs_style . '">', '</div>');
            }
            ?>
          <?php endif; ?>
          <?php if ($title) : ?>
            <h1 class="text-3xl xl:text-[56px] leading-[1.1em] font-semibold -ml-1" style="<?php echo $title_style ?>"><?php echo $title ?></h1>
          <?php endif; ?>
          <?php if ($description) : ?>
            <div class="text-sm xl:text-xl xl:leading-snug font-medium mt-4" style="<?php echo $description_style ?>">
              <?php echo $description ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<?php
$found_cat_data = get_field('found_cat_data');
$cat_name = get_the_title();
$gender = $found_cat_data['gender'] ?? '';
$age = $found_cat_data['approximate_age'] ?? '';
$date_of_arrival = $found_cat_data['date_of_arrival'] ?? '';
$where_found = $found_cat_data['where_found'] ?? '';


$cat_data = array(
  [
    'name' => 'Gender',
    'value' => $gender
  ],
  [
    'name' => 'Approximate Age',
    'value' => $age
  ],
  [
    'name' => 'Date of Arrival in CPSV',
    'value' => $date_of_arrival
  ],
  [
    'name' => 'Where Found',
    'value' => $where_found
  ],
);

$cat_photos = get_field('cat_photos');
$cat_gallery = $cat_photos['cat_photos'] ?? '';
$featured_thumbnail = $cat_photos['featured_thumbnail'] ?? '';
$cat_description = get_field('cat_description')['cat_description'] ?? '';
$components = $cat_description['components'] ?? '';
?>
<section class="relative">
  <div class="relative pt-12 lg:pt-20 xl:pt-20 pb-12 lg:pb-20 xl:pb-20">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative">
        <!-- <?php if ($cat_name) : ?>
          <h3 class="text-brand-tomato font-semibold text-5xl leading-tight mb-6"><?php echo $cat_name ?></h3>
        <?php endif; ?> -->
      </div>
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12">
        <div class="xl:w-3/5 order-1">
          <div class="catPhoto mb-8">
            <style>
              .catThumbSwiper .swiper-slide-thumb-active {
                opacity: 1;
              }
            </style>
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff; --swiper-navigation-size: 24px" class="swiper catPhotoSwiper rounded-lg overflow-clip">
              <div class="swiper-wrapper">
                <?php foreach ($cat_gallery as $gallery) : ?>
                  <div class="swiper-slide rounded-lg overflow-clip">
                    <div class="aspect-w-16 aspect-h-9">
                      <img class="object-cover w-full h-full" src="<?php echo $gallery['url'] ?>" alt="">
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper catThumbSwiper mt-3">
              <div class="swiper-wrapper">
                <?php foreach ($cat_gallery as $gallery) : ?>
                  <div class="swiper-slide w-1/5 opacity-40 hover:cursor-pointer">
                    <div class="aspect-w-16 aspect-h-9 rounded-md overflow-clip">
                      <img class="object-cover w-full h-full" src="<?php echo $gallery['url'] ?>" alt="">
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <script>
              var catThumbSwiper = new Swiper(".catThumbSwiper", {
                //loop: true,
                spaceBetween: 12,
                slidesPerView: 6,
                //freeMode: true,
                watchSlidesProgress: true,
              });
              var catPhotoSwiper = new Swiper(".catPhotoSwiper", {
                //loop: true,
                grabCursor: true,
                spaceBetween: 0,
                navigation: {
                  nextEl: ".catPhotoSwiper .swiper-button-next",
                  prevEl: ".catPhotoSwiper .swiper-button-prev",
                },
                thumbs: {
                  swiper: catThumbSwiper,
                },
              });
            </script>
          </div>
          <div class="py-6 mb-10 border-t border-b border-slate-300">
            <h2 class="font-bold mb-2 text-2xl">Details:</h2>
            <ul class="text-lg">
              <?php foreach ($cat_data as $data) : ?>
                <?php if ($data['value']) : ?>
                  <li><strong><?php echo $data['name'] ?>:</strong> <?php echo $data['value'] ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
          <div>
            <?php get_template_part('template-parts/components/components', '', array('field' => $components)); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>