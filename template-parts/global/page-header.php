<?php
/*
 * Page Settings
 */
$term_id = get_queried_object()->term_id ?? null;
$the_id = $term_id ? 'term_' . $term_id : get_the_ID();

$breadcrumbs = ($args['breadcrumbs'] === true);

$page_header = get_field('page_header', $the_id);
$enable_page_header = isset($page_header['enable_page_header']) ? $page_header['enable_page_header'] : '';
//preint_r($page_header);
//preint_r($enable_page_header);

if ($enable_page_header) :
  $page_header_settings = $page_header['page_header_settings'] ?? ''; // Group
  $breadcrumbs_settings = $page_header_settings['breadcrumbs'] ?? '';
  $show_breadcrumbs = isset($breadcrumbs_settings['show_breadcrumbs']) ? $breadcrumbs_settings['show_breadcrumbs'] : '';
  $breadcrumbs_text_color = isset($breadcrumbs_settings['breadcrumbs_text_color']) ? $breadcrumbs_settings['breadcrumbs_text_color'] : '';
  $separator_color = isset($breadcrumbs_settings['separator_color']) ? $breadcrumbs_settings['separator_color'] : '';
  $breadcrumbs_style = '';
  if ($breadcrumbs_text_color) {
    $breadcrumbs_style .= '--breadcrumbs-text-color:' . $breadcrumbs_text_color . ';';
  }
  if ($separator_color) {
    $breadcrumbs_style .= '--breadcrumbs-separator-color:' . $separator_color . ';';
  }

  $title = isset($page_header_settings['title']['title']) ? $page_header_settings['title']['title'] : '';
  $title_color = isset($page_header_settings['title']['title_color']) ? $page_header_settings['title']['title_color'] : '';
  $title_style = '';
  if ($title_color) {
    $title_style .= 'color:' . $title_color . ';';
  }
  if (!$title) {
    if (is_tax()) {
      $title = get_term($the_id)->name;
    } else {
      $title = get_the_title();
    }
  }

  $description = isset($page_header_settings['description']['description']) ? $page_header_settings['description']['description'] : '';
  $description_color = isset($page_header_settings['description']['description_color']) ? $page_header_settings['description']['description_color'] : '';
  $description_style = '';
  if ($description_color) {
    $description_style .= 'color:' . $description_color . ';';
  }

  $buttons = isset($page_header_settings['buttons']) ? $page_header_settings['buttons'] : '';

  $background = isset($page_header_settings['background']) ? $page_header_settings['background'] : '';
  $background_image = isset($background['background_image']) ? $background['background_image'] : '';
  $background_position = isset($background['background_position']) ? $background['background_position'] : '';
  $background_overlay = isset($background['background_overlay']) ? $background['background_overlay'] : '';
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
              <h2 class="text-3xl xl:text-[64px] leading-[1.1em] font-semibold" style="<?php echo $title_style ?>"><?php echo $title ?></h2>
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
<?php endif; ?>