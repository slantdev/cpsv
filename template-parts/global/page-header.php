<?php
/*
 * Page Settings
 */
$term_id = ($queried_object = get_queried_object()) ? $queried_object->term_id : null;
$the_id = $term_id ? 'term_' . $term_id : get_the_ID();

$breadcrumbs = $args['breadcrumbs'] ?? false;
$enable_page_header = false;

if (is_singular('post')) :
  $enable_page_header = true;
  $title = get_the_title();
  $background_image_url = get_the_post_thumbnail_url($the_id, 'full');
  $background_position = 'center';
  $background_overlay = 'rgba(243,241,239,0.6)';
  $bg_image_class = ' object-center';
  $show_breadcrumbs = true;
  $breadcrumbs_style = '--breadcrumbs-text-color:#020044;--breadcrumbs-separator-color:#FF6347;';
  $title_style = 'color:#020044;';
  $description = false;

elseif (($page_header = get_field('page_header', $the_id)) && isset($page_header['enable_page_header']) && $page_header['enable_page_header']) :
  $enable_page_header = true;
  $page_header_settings = $page_header['page_header_settings'] ?? [];

  $breadcrumbs_settings = $page_header_settings['breadcrumbs'] ?? [];
  $show_breadcrumbs = $breadcrumbs_settings['show_breadcrumbs'] ?? false;
  $breadcrumbs_text_color = $breadcrumbs_settings['breadcrumbs_text_color'] ?? '';
  $separator_color = $breadcrumbs_settings['separator_color'] ?? '';
  $breadcrumbs_style = ($breadcrumbs_text_color || $separator_color) ? '--breadcrumbs-text-color:' . $breadcrumbs_text_color . ';' . '--breadcrumbs-separator-color:' . $separator_color . ';' : '';

  $title_settings = $page_header_settings['title'] ?? [];
  $show_title = $title_settings['show_title'] ?? false;
  $title = $title_settings['title'] ?? '';
  $title_color = $title_settings['title_color'] ?? '';
  $title_style = $title_color ? 'color:' . $title_color . ';' : '';
  if (!$title) {
    $title = is_tax() ? get_term($the_id)->name : get_the_title();
  }

  $description_settings = $page_header_settings['description'] ?? [];
  $show_description = $description_settings['show_description'] ?? false;
  $description = $description_settings['description'] ?? '';
  $description_color = $description_settings['description_color'] ?? '';
  $description_style = $description_color ? 'color:' . $description_color . ';' : '';

  // $buttons_settings = $page_header_settings['buttons'] ?? [];
  // $show_buttons = $buttons_settings['show_buttons'] ?? false;
  // $buttons = $buttons_settings['buttons'] ?? '';

  $background_settings = $page_header_settings['background'] ?? [];
  $background_image = $background_settings['background_image'] ?? '';
  $background_image_url = $background_image['url'] ?? '';
  $background_mobile = $background_settings['background_mobile'] ?? '';
  $background_mobile_url = $background_mobile['url'] ?? '';
  $background_position = $background_settings['background_position'] ?? '';
  $background_overlay = $background_settings['background_overlay'] ?? '';
  $bg_image_class = $background_position ? ' object-' . $background_position : '';

  $salesforce_settings = $page_header_settings['salesforce_form'] ?? [];
  $use_salesforce = $salesforce_settings['use_salesforce_form'] ?? false;
  $salesforce_form_id = $salesforce_settings['form_id'] ?? '';

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
        <div class="flex justify-end">
          <?php if ($show_breadcrumbs || $show_title || $show_description) : ?>
            <div class="w-full xl:w-2/3">
              <div class="flex pt-28 pb-20 items-end">
                <?php if ($show_breadcrumbs && function_exists('yoast_breadcrumb')) : ?>
                  <?php yoast_breadcrumb('<div class="breadcrumbs mb-6" style="' . $breadcrumbs_style . '">', '</div>'); ?>
                <?php endif; ?>
                <?php if ($show_title && $title) : ?>
                  <h1 class="text-3xl xl:text-[64px] leading-[1.1em] font-semibold" style="<?php echo $title_style ?>"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if ($show_description && $description) : ?>
                  <div class="text-sm xl:text-xl xl:leading-snug font-medium mt-4" style="<?php echo $description_style ?>">
                    <?php echo $description ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if ($use_salesforce) : ?>
            <?php if ($salesforce_form_id) : ?>
              <style>
                .npspPlusDonateDropIn {
                  position: absolute;
                  top: 0;
                  left: 0;
                  height: 100%;
                  width: 100%;
                }
              </style>
              <div class="donations-form w-[460px] h-[621px] bg-white rounded-lg overflow-y-auto overflow-x-hidden">
                <div id="salesforce_form-<?php echo $salesforce_form_id; ?>" class="salesforce-form relative w-full h-full"></div>
              </div>
              <?php
              /* $form_url = "https://dev-cpsv.cs75.force.com"; // development */
              /* $form_url = "https://cpsv.secure.force.com"; // production */
              $form_url = "https://cpsv.my.salesforce-sites.com"
              ?>
              <script src="https://js.stripe.com/v3/"></script>
              <script src="<?php echo $form_url; ?>/resource/npsp_plus__DonateDropIn/dropin.js"></script>
              <script>
                npspPlusDropIn.create({
                  donateFormURL: '<?php echo $form_url; ?>/npsp_plus__DonateDropIn?form=<?php echo $salesforce_form_id; ?>',
                  containerSelector: '#salesforce_form-<?php echo $salesforce_form_id; ?>', // CSS selector of the HTML element the drop-in iFrame will be appended (body tag by default).
                  iFrameOptions: {
                    id: 'npspPlusDonateDropIn', // HTML id of the DropIn iFrame element
                    className: 'npspPlusDonateDropIn' // HTML class name of the DropIn iFrame element.
                  }
                })
              </script>
            <?php endif; ?>

          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="h-[60px]"></div>
  </section>
<?php endif;
