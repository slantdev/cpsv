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
        <div class="w-full xl:w-1/2">
          <?php if ($show_breadcrumbs) : ?>
            <?php
            if (function_exists('yoast_breadcrumb')) {
              yoast_breadcrumb('<div class="breadcrumbs mb-6" style="' . $breadcrumbs_style . '">', '</div>');
            }
            ?>
          <?php endif; ?>
          <?php if ($title) : ?>
            <h1 class="text-3xl xl:text-[64px] leading-[1.1em] font-semibold -ml-1" style="<?php echo $title_style ?>"><?php echo $title ?></h1>
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
$adopt_cat_data = get_field('adopt_cat_data');
$cat_name = isset($adopt_cat_data['cat_name']) ? $adopt_cat_data['cat_name'] : '';
$breed = isset($adopt_cat_data['breed']) ? $adopt_cat_data['breed'] : '';
$gender = isset($adopt_cat_data['gender']) ? $adopt_cat_data['gender'] : '';
$colour = isset($adopt_cat_data['colour']) ? $adopt_cat_data['colour'] : '';
$birth = isset($adopt_cat_data['birth']) ? $adopt_cat_data['birth'] : '';
$animal_id = isset($adopt_cat_data['animal_id']) ? $adopt_cat_data['animal_id'] : '';
$microchip_number = isset($adopt_cat_data['microchip_number']) ? $adopt_cat_data['microchip_number'] : '';
$adoption_fee = isset($adopt_cat_data['adoption_fee']) ? $adopt_cat_data['adoption_fee'] : '';
$available_since = isset($adopt_cat_data['available_since']) ? $adopt_cat_data['available_since'] : '';
$cpsv_source_number = isset($adopt_cat_data['cpsv_source_number']) ? $adopt_cat_data['cpsv_source_number'] : '';

$age = '';
if ($birth) {
  $dateString = $birth;
  $birthdate = DateTime::createFromFormat('d/m/Y', $birth);
  $currentDate = new DateTime();
  $interval = $currentDate->diff($birthdate);
  $years = $interval->y;
  $months = $interval->m;
  $ageString = "";
  if ($years > 0) {
    $ageString .= $years . " Year";
    if ($years > 1) {
      $ageString .= "s";
    }
  }
  if ($months > 0) {
    if ($years > 0) {
      $ageString .= " ";
    }
    $ageString .= $months . " Month";
    if ($months > 1) {
      $ageString .= "s";
    }
  }
  $age = $ageString;
}

$cat_data = array(
  [
    'name' => 'Breed',
    'value' => $breed
  ],
  [
    'name' => 'Gender',
    'value' => implode(", ", $gender)
  ],
  [
    'name' => 'Colour',
    'value' => $colour
  ],
  [
    'name' => 'Age',
    'value' => $age
  ],
  [
    'name' => 'Animal ID',
    'value' => $animal_id
  ],
  [
    'name' => 'Microchip Number',
    'value' => $microchip_number
  ],
  [
    'name' => 'Adoption Fee',
    'value' => '$' . $adoption_fee
  ],
  [
    'name' => 'Available for adoption since',
    'value' => $available_since
  ],
  [
    'name' => 'CPSV Source Number',
    'value' => $cpsv_source_number
  ],
);
$cat_filters = get_field('cat_filters')['cat_filters'];
$cat_filters_data = array(
  'cats' => $cat_filters && in_array('cats', $cat_filters) ? true : false,
  'dogs' => $cat_filters && in_array('dogs', $cat_filters) ? true : false,
  'children' => $cat_filters && in_array('children', $cat_filters) ? true : false,
  'older' => $cat_filters && in_array('older', $cat_filters) ? true : false,
);

$cat_photos = get_field('cat_photos');
$cat_gallery = isset($cat_photos['cat_photos']) ? $cat_photos['cat_photos'] : '';
$featured_thumbnail = isset($cat_photos['featured_thumbnail']) ? $cat_photos['featured_thumbnail'] : '';

$cat_description = get_field('cat_description')['cat_description'];
$components = isset($cat_description['components']) ? $cat_description['components'] : '';
?>
<section class="relative">
  <div class="relative pt-12 lg:pt-20 xl:pt-20 pb-12 lg:pb-20 xl:pb-20">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative">
        <?php if ($cat_name) : ?>
          <h3 class="text-brand-blue font-semibold text-5xl leading-tight mb-6"><?php echo $cat_name ?>'s Profile</h3>
        <?php endif; ?>
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
          <div class="catCategory mb-8">
            <div class="flex justify-between gap-x-8">
              <?php
              $cat_categories = array(
                [
                  'icon' => 'filter-cat',
                  'text' => 'Can live with other cats',
                  'id' => 'cats'
                ],
                [
                  'icon' => 'filter-dog',
                  'text' => 'Can live with dogs',
                  'id' => 'dogs'
                ],
                [
                  'icon' => 'filter-children',
                  'text' => 'Can live with children',
                  'id' => 'children'
                ],
                [
                  'icon' => 'filter-mature',
                  'text' => 'Likes older family',
                  'id' => 'older'
                ]
              );
              foreach ($cat_categories as $cat) :
                $active_class = $cat_filters_data[$cat['id']] ? 'bg-brand-yellow' : 'bg-brand-light-gray';
              ?>
                <div>
                  <div class="flex flex-col justify-center items-center w-36 h-36 p-6 rounded-full shadow-inner <?php echo $active_class ?>">
                    <div class="flex-none">
                      <?php echo cpsv_icon(array('icon' => $cat['icon'], 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                    </div>
                    <div class="text-sm text-center leading-tight mt-1"><?php echo $cat['text'] ?></div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
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
        <div class="xl:w-2/5 order-2">
          <?php
          $adopt_cats_settings = get_field('adopt_cats_settings', 'option');
          $quick_links = $adopt_cats_settings['quick_links'] ?? '';
          $buttons = $adopt_cats_settings['buttons'] ?? '';
          $quick_links_label = $quick_links['label'] ?? '';
          $quick_links_links = $quick_links['links'] ?? '';
          $page_url = get_permalink(get_the_ID());
          $whatsapp_text = urlencode('Check out this cat profile! ' . $page_url);
          $page_url_encode = urlencode($page_url);
          ?>
          <?php if ($quick_links) : ?>
            <div class="bg-brand-light-gray rounded-xl p-8 mb-8">
              <?php if ($quick_links_label) : ?>
                <h4 class="text-[28px] leading-tight font-bold mb-3"><?php echo $quick_links_label ?></h4>
              <?php endif; ?>

              <ul class="flex flex-col gap-y-3">
                <?php
                foreach ($quick_links_links as $link) :
                  $link_url = $link['link']['url'] ?? '';
                  $link_title = $link['link']['title'] ?? '';
                  $link_target = $link['link']['target'] ?? '_self';
                ?>
                  <li class="pt-3 border-t border-slate-300"><a href="<?php echo $link_url ?>" target="<?php echo $link_target ?>" class="text-xl flex justify-between hover:underline"><?php echo $link_title ?> <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-tomato mt-[7px]')); ?></a></li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php endif; ?>
          <div class="bg-brand-light-gray rounded-xl p-8 mb-8">
            <div class="social-link flex mb-4">
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $page_url_encode ?>" target="_blank" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode('Check out this cat! ' . $page_url) ?>" target="_blank" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'x', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $page_url_encode ?>" target="_blank" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="https://wa.me/?text=<?php echo $whatsapp_text ?>" target="_blank" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'whatsapp', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="mailto:?subject=I wanted you to see this cat profile&amp;body=Check out this page <?php echo $page_url ?>" target="_blank" title="Share by Email" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'email', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
            </div>
            <ul class="flex flex-col gap-y-3">
              <li class="pt-3 border-t border-slate-300"><button class="print-button text-xl flex justify-between hover:underline">Print profile</button></li>
              <li class="pt-3 border-t border-slate-300"><a href="mailto:?subject=I wanted you to see this cat profile&amp;body=Check out this page <?php echo $page_url ?>" target="_blank" title="Share by Email" class="text-xl flex justify-between hover:underline">Email profile link</a></li>
            </ul>
            <script>
              jQuery(document).ready(function($) {
                $(".print-button").click(function() {
                  window.print();
                });
              });
            </script>
          </div>
          <?php if ($buttons) : ?>
            <div class="mt-8 flex gap-x-4">
              <?php get_template_part('template-parts/components/buttons', '', array('field' => $buttons)); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>