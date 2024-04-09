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

$adopt_cats = get_sub_field('adopt_cats') ?: []; // Group

$heading_text = $adopt_cats['heading']['heading_text'] ?? '';
$text_area = $adopt_cats['text_area']['text_area'] ?? '';

$section_adoptcats_class = 'section-adopt-cats-' . uniqid();

?>
<section <?php echo $section_id ?> class="<?php echo $section_adoptcats_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-2xl">
        <?php
        if ($heading_text) {
          echo '<div class="mb-4">';
          get_template_part('template-parts/components/heading', '', array('field' => $adopt_cats, 'align' => 'text-left', 'size' => 'text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
          echo '</div>';
        }
        ?>
        <?php
        if ($text_area) {
          echo '<div class="w-full xl:w-2/3">';
          get_template_part('template-parts/components/textarea', '', array('field' => $adopt_cats, 'align' => 'text-left', 'weight' => 'font-medium'));
          echo '</div>';
        }
        ?>
      </div>
      <div class="search-filter-container container mx-auto max-w-screen-2xl my-8 xl:my-16">
        <div class="adopt-search-container">
          <div class="flex gap-x-4">
            <input type="text" placeholder="Animal ID:" class="grow input input-bordered rounded-full">
            <select name="filter-shelter" id="filter-shelter" class="select select-bordered rounded-full">
              <option value="" disabled selected>Filter by time in shelter</option>
              <option value="">Option 1</option>
              <option value="">Option 2</option>
              <option value="">Option 3</option>
            </select>
            <select name="filter-age" id="filter-age" class="select select-bordered rounded-full">
              <option value="" disabled selected>Filter by age</option>
              <option value="">Option 1</option>
              <option value="">Option 2</option>
              <option value="">Option 3</option>
            </select>
            <select name="filter-gender" id="filter-gender" class="select select-bordered rounded-full">
              <option value="" disabled selected>Filter by gender</option>
              <option value="">Male</option>
              <option value="">Female</option>
            </select>
            <button type="button" class="!btn !btn-secondary !border-secondary !text-base !px-10 !rounded-full">Search</button>
          </div>
        </div>
        <div class="adopt-filter-container mt-8">
          <div class="flex justify-between gap-x-24 border-b border-t-0 border-x-0 border-solid border-slate-300">
            <div class="max-w-[180px]">
              <a href="!#" role="button" class="adopt-filter-btn group block relative pb-6">
                <div class="flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-cat', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm">
                    Can live with other cats
                  </div>
                </div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                  <div class="w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                  <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 hidden')); ?>
                </div>
              </a>
            </div>
            <div class="max-w-[180px]">
              <a href="!#" role="button" class="adopt-filter-btn group block relative pb-6">
                <div class="flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-dog', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm">
                    Can live with dogs
                  </div>
                </div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                  <div class="w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                  <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-blue hidden')); ?>
                </div>
              </a>
            </div>
            <div class="max-w-[180px]">
              <a href="!#" role="button" class="adopt-filter-btn group block relative pb-6">
                <div class="flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-children', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm">
                    Can live with children
                  </div>
                </div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                  <div class="w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                  <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-blue hidden')); ?>
                </div>
              </a>
            </div>
            <div class="max-w-[180px]">
              <a href="!#" role="button" class="adopt-filter-btn group block relative pb-6">
                <div class="flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-mature', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm">
                    Quiet, mature home
                  </div>
                </div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                  <div class="w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                  <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-blue hidden')); ?>
                </div>
              </a>
            </div>
            <div class="flex-none w-[144px]">
              <button type="button" class="btn btn-ghost hover:bg-base-100 hidden">
                Clear Filters
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php
      $adopt_cats_posts = new WP_Query(
        array(
          'post_type'         => 'adopt-cat',
          'post_status '      => 'publish',
          'orderby'           => 'menu_order',
          'order'             => 'DESC',
          'posts_per_page'    => -1,
        )
      );
      ?>
      <?php if ($adopt_cats_posts->have_posts()) { ?>
        <div class="adopt-card-container relative container mx-auto max-w-screen-2xl mt-8 mb-8 xl:mt-16 xl:mb-12">
          <div class="swiper -mx-4 xl:-mx-6">
            <div class="swiper-wrapper">
              <?php while ($adopt_cats_posts->have_posts()) { ?>
                <?php
                $adopt_cats_posts->the_post();
                $id = get_the_ID();
                $title =  get_the_title();
                $link = get_the_permalink();
                $adopt_cat_data = get_field('adopt_cat_data', $id);
                $birth = $adopt_cat_data['birth'] ?? '';
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
                $cat_photos = get_field('cat_photos', $id);
                $cat_gallery = $cat_photos['cat_photos'] ?? '';
                $featured_thumbnail = $cat_photos['featured_thumbnail'] ?? '';
                if ($cat_gallery) {
                  $image = $cat_gallery[0]['url'] ?? '';
                }
                if ($featured_thumbnail) {
                  $image = $featured_thumbnail['url'] ?? '';
                } else if (has_post_thumbnail($id)) {
                  $image = get_the_post_thumbnail_url($id, 'large');
                }
                ?>
                <div class="swiper-slide p-4">
                  <a href="<?php echo $link ?>" class="block bg-white rounded-xl overflow-clip transition-all duration-300 hover:shadow-lg hover:scale-[1.02]">
                    <div class="aspect-w-1 aspect-h-1 overflow-hidden">
                      <?php if ($image) : ?>
                        <img src="<?php echo $image ?>" class="object-cover h-full w-full" />
                      <?php else : ?>
                        <div class="w-full h-full bg-slate-50"></div>
                      <?php endif; ?>
                    </div>
                    <div class="px-4 py-2 xl:px-8 xl:py-4">
                      <div class="flex justify-between gap-x-4">
                        <div class="text-2xl"><?php echo $title ?></div>
                        <div class="text-lg text-slate-500 text-right"><?php echo $age ?></div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php } ?>
            </div>
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
          <div class="absolute -bottom-20 left-0 right-0">
            <div class="container max-w-screen-2xl px-4 xl:px-8">
              <div class="relative">
                <div class="swiper-pagination [&>.swiper-pagination-bullet]:rounded-lg" style="--swiper-pagination-bullet-width: 80px;--swiper-pagination-color:#1068F0;"></div>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          jQuery(function($) {
            new Swiper('.<?php echo $section_adoptcats_class ?> .swiper', {
              slidesPerView: 4,
              spaceBetween: 0,
              loop: false,
              speed: 500,
              //watchOverflow: true,
              //centerInsufficientSlides: true,
              slidesPerGroup: 2,
              grid: {
                fill: 'row',
                rows: 2,
              },
              pagination: {
                el: ".<?php echo $section_adoptcats_class ?> .swiper-pagination",
                clickable: true
              },
              navigation: {
                nextEl: '.<?php echo $section_adoptcats_class ?> .swiper-btn-next',
                prevEl: '.<?php echo $section_adoptcats_class ?> .swiper-btn-prev',
              },
              breakpoints: {
                768: {
                  slidesPerView: 'auto',
                  spaceBetween: 24
                },
                1280: {
                  slidesPerView: 4,
                  spaceBetween: 0
                }
              }
            });
          });
        </script>
      <?php } ?>
    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>