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

$adopt_cats = get_sub_field('adopt_cats'); // Group
$headline = isset($adopt_cats['headline']) ? $adopt_cats['headline'] : '';
$headline_color = isset($adopt_cats['headline_color']) ? $adopt_cats['headline_color'] : '';
$headline_style = '';
if ($headline_color) {
  $headline_style .= 'color : ' . $headline_color . ';';
}
$description = isset($adopt_cats['description']) ? $adopt_cats['description'] : '';
$description_color = isset($adopt_cats['description_color']) ? $adopt_cats['description_color'] : '';
$description_style = '';
if ($description_color) {
  $description_style .= 'color : ' . $description_color . ';';
}
// $select_category = isset($adopt_cats['select_category']) ? $adopt_cats['select_category'] : '';
// $card_style = isset($adopt_cats['card_style']) ? $adopt_cats['card_style'] : '';
// $posts_per_page = isset($adopt_cats['posts_per_page']) ? $adopt_cats['posts_per_page'] : '';
// $show_pagination = isset($adopt_cats['show_pagination']) ? $adopt_cats['show_pagination'] : '';
// $filter_settings = isset($adopt_cats['filter_settings']) ? $adopt_cats['filter_settings'] : '';
// $show_filter = isset($adopt_cats['show_filter']) ? $adopt_cats['show_filter'] : '';
// $filter_style = isset($adopt_cats['filter_style']) ? $adopt_cats['filter_style'] : '';
// $filter_categories = isset($adopt_cats['filter_categories']) ? $adopt_cats['filter_categories'] : '';
// $filter_tags = isset($adopt_cats['filter_tags']) ? $adopt_cats['filter_tags'] : '';

$section_id = 'section-adopt-cats-' . uniqid();

?>
<section class="relative bg-brand-light-gray <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container mx-auto max-w-screen-2xl">
      <?php if ($headline) : ?>
        <div>
          <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight" style="<?php echo $headline_style ?>"><?php echo $headline ?></h3>
        </div>
      <?php endif; ?>
      <?php if ($description) : ?>
        <div class="w-full xl:w-2/3">
          <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium" style="<?php echo $description_style ?>">
            <?php echo $description ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <div class="container mx-auto max-w-screen-2xl my-8 xl:my-16">
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
          <button type="button" class="btn btn-secondary text-base px-10 rounded-full">Search</button>
        </div>
      </div>
      <div class="adopt-filter-container mt-8">
        <div class="flex justify-between gap-x-24 border-b border-slate-300">
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-cat', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Can live with other cats
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-dog', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Can live with dogs
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-children', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Can live with children
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-mature', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Quiet, mature home
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="flex-none">
            <button type="button" class="btn btn-ghost hover:bg-base-100">
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
      <div class="relative container mx-auto max-w-screen-2xl mt-8 mb-8 xl:mt-16 xl:mb-12">
        <div class="swiper -mx-4 xl:-mx-6">
          <div class="swiper-wrapper">
            <?php while ($adopt_cats_posts->have_posts()) { ?>
              <?php
              $adopt_cats_posts->the_post();
              $id = get_the_ID();
              $image = get_the_post_thumbnail_url($id, 'large');
              $title =  get_the_title();
              $link = get_the_permalink();
              $adopt_cat_data = get_field('adopt_cat_data', $id);
              $birth = isset($adopt_cat_data['birth']) ? $adopt_cat_data['birth'] : '';
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
                // if ($months > 0) {
                //   if ($years > 0) {
                //     $ageString .= " ";
                //   }
                //   $ageString .= $months . " Month";
                //   if ($months > 1) {
                //     $ageString .= "s";
                //   }
                // }
                $age = $ageString;
              }
              ?>
              <div class="swiper-slide p-4">
                <a href="<?php echo $link ?>" class="block bg-white rounded-xl overflow-clip transition-all duration-300 hover:shadow-lg">
                  <div class="aspect-w-1 aspect-h-1">
                    <img src="<?php echo $image ?>" class="object-cover h-full w-full" />
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
          new Swiper('.<?php echo $section_id ?> .swiper', {
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
              el: ".<?php echo $section_id ?> .swiper-pagination",
              clickable: true
            },
            navigation: {
              nextEl: '.<?php echo $section_id ?> .swiper-btn-next',
              prevEl: '.<?php echo $section_id ?> .swiper-btn-prev',
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
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>