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
$show_search_bar = $adopt_cats['show_search_bar'] ?? '';
$show_filter = $adopt_cats['show_filter'] ?? '';
$style = $adopt_cats['style'] ?? '';
$posts_per_page = $adopt_cats['posts_per_page'] ?? '-1';
$show_pagination = $adopt_cats['show_pagination'] ?? 'false';

$uniqid = uniqid();
$section_adoptcats_class = 'section-adopt-cats-' . $uniqid;

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
        <?php if ($show_search_bar) : ?>
          <div class="adopt-search-<?php echo $uniqid ?>">
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
        <?php endif; ?>
        <?php if ($show_filter) : ?>
          <div class="adopt-filter-<?php echo $uniqid ?> adopt-filter-container mt-8">
            <div class="flex justify-between gap-x-24 border-b border-t-0 border-x-0 border-solid border-slate-300">
              <div class="max-w-[180px]">
                <a href="!#" role="button" data-id="cats" class="adopt-filter-btn group block relative pb-6">
                  <div class="adopt-filter-icon flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                    <div class="flex-none">
                      <?php echo cpsv_icon(array('icon' => 'filter-cat', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                    </div>
                    <div class="text-sm">
                      Can live with other cats
                    </div>
                  </div>
                  <div class="adopt-filter-indicator absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                    <div class="adopt-filter-inactive w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                    <div class="adopt-filter-active">
                      <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-blue')); ?>
                    </div>
                  </div>
                </a>
              </div>
              <div class="max-w-[180px]">
                <a href="!#" role="button" data-id="dogs" class="adopt-filter-btn group block relative pb-6">
                  <div class="adopt-filter-icon flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                    <div class="flex-none">
                      <?php echo cpsv_icon(array('icon' => 'filter-dog', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                    </div>
                    <div class="text-sm">
                      Can live with dogs
                    </div>
                  </div>
                  <div class="adopt-filter-indicator absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                    <div class="adopt-filter-inactive w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                    <div class="adopt-filter-active">
                      <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-blue')); ?>
                    </div>
                  </div>
                </a>
              </div>
              <div class="max-w-[180px]">
                <a href="!#" role="button" data-id="children" class="adopt-filter-btn group block relative pb-6">
                  <div class="adopt-filter-icon flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                    <div class="flex-none">
                      <?php echo cpsv_icon(array('icon' => 'filter-children', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                    </div>
                    <div class="text-sm">
                      Can live with children
                    </div>
                  </div>
                  <div class="adopt-filter-indicator absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                    <div class="adopt-filter-inactive w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                    <div class="adopt-filter-active">
                      <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-blue')); ?>
                    </div>
                  </div>
                </a>
              </div>
              <div class="max-w-[180px]">
                <a href="!#" role="button" data-id="older" class="adopt-filter-btn group block relative pb-6">
                  <div class="adopt-filter-icon flex gap-x-4 items-center text-slate-500 group-hover:brightness-125">
                    <div class="flex-none">
                      <?php echo cpsv_icon(array('icon' => 'filter-mature', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                    </div>
                    <div class="text-sm">
                      Quiet, mature home
                    </div>
                  </div>
                  <div class="adopt-filter-indicator absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                    <div class="adopt-filter-inactive w-4 h-4 bg-white border-slate-300 border-solid border-2 rounded-full"></div>
                    <div class="adopt-filter-active">
                      <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-blue')); ?>
                    </div>
                  </div>
                </a>
              </div>
              <div class="flex-none w-[144px]">
                <button type="button" class="adopt-filter-clear btn btn-ghost hover:bg-base-100">
                  Clear Filters
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="adopt-card-container relative container mx-auto max-w-screen-2xl mt-8 mb-8 xl:mt-16 xl:mb-12">
        <div class="adopt-card-<?php echo $uniqid ?>">
        </div>
        <div class="posts-loader absolute inset-0 bg-white bg-opacity-80 z-10 transition-all duration-500 hidden">
          <div class="h-full w-full flex justify-center">
            <svg class="animate-spin h-8 w-8 text-brand-sea opacity-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="color: var(--section-link-color)">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          let ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

          function load_adopt_cat_<?php echo $uniqid ?>(page) {
            $('.adopt-card-<?php echo $uniqid ?>').next('.posts-loader').show();
            let data = {
              page: page,
              per_page: '<?php echo $posts_per_page ?>',
              style: '<?php echo $style ?>',
              show_pagination: '<?php echo $show_pagination ?>',
              section_class: '<?php echo $section_adoptcats_class ?>',
              action: 'load_adopt_cat',
            };
            //console.log(data);
            $.post(ajaxurl, data, function(response) {
              //console.log(response);
              $('.adopt-card-<?php echo $uniqid ?>').html('').prepend(response);
              $('.adopt-card-<?php echo $uniqid ?>').next('.posts-loader').hide();
            });
          }
          load_adopt_cat_<?php echo $uniqid ?>(1);


          let activeFilters_<?php echo $uniqid ?> = []; // Array to store active filter data-ids

          // Function to update the UI based on active filters
          function updateUI_<?php echo $uniqid ?>(page) {
            if (activeFilters_<?php echo $uniqid ?>.length > 0) {
              $('.adopt-filter-<?php echo $uniqid ?>').addClass('has_active');
            } else {
              $('.adopt-filter-<?php echo $uniqid ?>').removeClass('has_active');
            }
            //console.log(activeFilters_<?php echo $uniqid ?>);
            $('.adopt-card-<?php echo $uniqid ?>').next('.posts-loader').show();

            let meta_array = '';
            if (activeFilters_<?php echo $uniqid ?>) {
              meta_array = JSON.stringify(activeFilters_<?php echo $uniqid ?>);
            }

            //console.log(meta_array)
            let data = {
              page: page,
              per_page: '<?php echo $posts_per_page ?>',
              style: '<?php echo $style ?>',
              show_pagination: '<?php echo $show_pagination ?>',
              section_class: '<?php echo $section_adoptcats_class ?>',
              meta_array: meta_array,
              action: 'filter_adopt_cat',
            };
            //console.log(data);
            $.post(ajaxurl, data, function(response) {
              console.log(response);
              $('.adopt-card-<?php echo $uniqid ?>').html('').prepend(response);
              $('.adopt-card-<?php echo $uniqid ?>').next('.posts-loader').hide();
            });
          }

          // Click event for '.adopt-filter-btn'
          $('.adopt-filter-<?php echo $uniqid ?> .adopt-filter-btn').click(function(e) {
            e.preventDefault();
            let dataId = $(this).data('id'); // Get data-id of clicked button

            // Toggle 'active' class and update activeFilters array
            if ($(this).hasClass('active')) {
              $(this).removeClass('active');
              let index = activeFilters_<?php echo $uniqid ?>.indexOf(dataId);
              if (index !== -1) {
                activeFilters_<?php echo $uniqid ?>.splice(index, 1);
              }
            } else {
              $(this).addClass('active');
              activeFilters_<?php echo $uniqid ?>.push(dataId);
            }

            updateUI_<?php echo $uniqid ?>(1); // Update UI
          });

          // Click event for '.adopt-filter-clear'
          $('.adopt-filter-<?php echo $uniqid ?> .adopt-filter-clear').click(function(e) {
            e.preventDefault();
            $('.adopt-filter-<?php echo $uniqid ?> .adopt-filter-btn').removeClass('active');
            activeFilters_<?php echo $uniqid ?> = []; // Clear activeFilters array
            updateUI_<?php echo $uniqid ?>(1); // Update UI
          });

        });
      </script>

    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>