<?php
/*
 * Page Settings
 */
$term_id = ($queried_object = get_queried_object()) ? $queried_object->term_id : null;
$the_id = $term_id ? 'term_' . $term_id : get_the_ID();

$breadcrumbs = $args['breadcrumbs'] ?? false;

if (is_singular('post')) :
  $enable_page_header = true;
  $title = get_the_title();
  //$background_image = $background_settings['background_image'] ?? '';
  $background_image_url = get_the_post_thumbnail_url($the_id, 'full');
  $background_position = 'center';
  $background_overlay = 'rgba(243,241,239,0.6)';
  $bg_image_class = ' object-center';
  $show_breadcrumbs = true;
  $breadcrumbs_style = '--breadcrumbs-text-color:#020044;--breadcrumbs-separator-color:#FF6347;';
  $title_style = 'color:#020044;';
  $description = false;

elseif (($page_header = get_field('page_header', $the_id)) && isset($page_header['enable_page_header'])) :
  $enable_page_header = true;
  $page_header_settings = $page_header['page_header_settings'] ?? [];
  $breadcrumbs_settings = $page_header_settings['breadcrumbs'] ?? [];
  $show_breadcrumbs = $breadcrumbs_settings['show_breadcrumbs'] ?? false;
  $breadcrumbs_text_color = $breadcrumbs_settings['breadcrumbs_text_color'] ?? '';
  $separator_color = $breadcrumbs_settings['separator_color'] ?? '';
  $breadcrumbs_style = ($breadcrumbs_text_color || $separator_color) ? '--breadcrumbs-text-color:' . $breadcrumbs_text_color . ';' . '--breadcrumbs-separator-color:' . $separator_color . ';' : '';

  $title_settings = $page_header_settings['title'] ?? [];
  $title = $title_settings['title'] ?? '';
  $title_color = $title_settings['title_color'] ?? '';
  $title_style = $title_color ? 'color:' . $title_color . ';' : '';
  if (!$title) {
    $title = is_tax() ? get_term($the_id)->name : get_the_title();
  }

  $description_settings = $page_header_settings['description'] ?? [];
  $description = $description_settings['description'] ?? '';
  $description_color = $description_settings['description_color'] ?? '';
  $description_style = $description_color ? 'color:' . $description_color . ';' : '';

  $buttons = $page_header_settings['buttons'] ?? '';

  $background_settings = $page_header_settings['background'] ?? [];
  $background_image = $background_settings['background_image'] ?? '';
  $background_image_url = $background_image['url'] ?? '';
  $background_position = $background_settings['background_position'] ?? '';
  $background_overlay = $background_settings['background_overlay'] ?? '';
  $bg_image_class = $background_position ? ' object-' . $background_position : '';

endif;
?>

<?php if ($enable_page_header) : ?>
  <section class="section-page-header relative -mt-[136px]">
    <?php if ($background_image_url) : ?>
      <div class="absolute inset-0 z-0">
        <img class="object-cover w-full h-full <?php echo $bg_image_class ?>" src="<?php echo $background_image_url ?>" alt="">
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
            <?php if ($show_breadcrumbs && function_exists('yoast_breadcrumb')) : ?>
              <?php yoast_breadcrumb('<div class="breadcrumbs mb-6" style="' . $breadcrumbs_style . '">', '</div>'); ?>
            <?php endif; ?>
            <?php if ($title) : ?>
              <h1 class="text-3xl xl:text-[64px] leading-[1.1em] font-semibold" style="<?php echo $title_style ?>"><?php echo $title ?></h1>
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
<?php endif;
