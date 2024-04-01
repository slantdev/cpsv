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
$section_faqs = 'section-faqs-' . uniqid();

$faqs = get_sub_field('faqs') ?? [];

$intro_component = $faqs['intro'] ?? '';
$heading_component = $faqs['intro']['heading'] ?? '';
$description_component = $faqs['intro']['text_area'] ?? '';
$show_filter = $faqs['faqs_settings']['show_filter'] ?? '';
$select_faq_category = $faqs['faqs_settings']['select_faq_category'] ?? '';

$uniqid = uniqid();
$faqs_id = $uniqid;

//preint_r($faqs);

?>

<section <?php echo $section_id ?> class="<?php echo $section_faqs ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>

    <div class="section-content animation-wrapper">
      <div class="relative mx-auto z-[1] <?php echo $entrance_animation_class ?>">
        <div class="intro-container relative container mx-auto max-w-screen-lg mb-20">
          <?php
          if ($heading_component) {
            echo '<div class="mb-4">';
            get_template_part('template-parts/components/heading', '', array('field' => $intro_component, 'align' => 'text-center'));
            echo '</div>';
          }
          ?>
          <?php
          if ($description_component) {
            echo '<div class="mt-6">';
            get_template_part('template-parts/components/textarea', '', array('field' => $intro_component, 'align' => 'text-center'));
            echo '</div>';
          }
          ?>
        </div>
        <?php if ($show_filter) : ?>
          <div class="faqs-filter-<?php echo $faqs_id ?> relative max-w-prose mx-auto z-10 mb-8 xl:mb-12">
            <div class="dropdown dropdown-end w-full">
              <label tabindex="0" class="my-1 relative flex justify-between items-center w-full text-lg bg-white border border-solid border-zinc-300 rounded-full py-4 px-8">
                <span class="faq-filter-selected-text">Select Category</span>
                <div>
                  <?php echo cpsv_icon(array('icon' => 'chevron-down', 'group' => 'utilities', 'size' => '20', 'class' => 'text-zinc-400')); ?>
                </div>
              </label>
              <?php if ($select_faq_category) : ?>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-zinc-50 text-lg rounded-box w-full">
                  <?php foreach ($select_faq_category as $term_id) : ?>
                    <?php
                    $term = get_term($term_id, 'faq-category');
                    ?>
                    <li><button type="button" class="faq-filter-btn" data-id="<?php echo $faqs_id ?>" data-term="<?php echo $term_id ?>"><?php echo $term->name ?></button></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
        <div id="faqs-<?php echo $faqs_id ?>" class="relative pb-20">
          <div class="relative container max-w-screen-lg mx-auto">
            <div class="faqs-accordion-<?php echo $faqs_id ?>">
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
        </div>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            let ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

            function load_faqs_<?php echo $faqs_id ?>(page) {
              $('.faqs-accordion-<?php echo $faqs_id ?>').next('.posts-loader').show();
              let select_category = <?php echo json_encode($select_faq_category) ?>;
              let terms = '';
              let pagination = '';
              if (select_category) {
                terms = JSON.stringify(select_category);
              }
              console.log(terms);
              let data = {
                faq_id: '<?php echo $faqs_id ?>',
                page: page,
                per_page: '-1',
                terms: terms,
                pagination: pagination,
                action: 'pagination_load_faqs',
              };
              console.log(data);
              $.post(ajaxurl, data, function(response) {
                //console.log(response);
                $('.faqs-accordion-<?php echo $faqs_id ?>').html('').prepend(response);
                $('.faqs-accordion-<?php echo $faqs_id ?>').next('.posts-loader').hide();
              });
            }
            load_faqs_<?php echo $faqs_id ?>(1);

            $(document).on(
              'click',
              '.faqs-accordion-<?php echo $faqs_id ?> .faq-radio-btn',
              function() {
                setTimeout(() => {
                  $('html, body').animate({
                    scrollTop: $(this).offset().top - 100
                  }, 200);
                }, 400);
                //let page = $(this).data('page');
                //load_faqs_<?php echo $faqs_id ?>(page);
              }
            );

            $('.faqs-filter-<?php echo $faqs_id ?> .faq-filter-btn').on('click', function(event) {
              //event.preventDefault();              
              let faq_term_text = $(this).text();
              $('.faqs-filter-<?php echo $faqs_id ?> .faq-filter-selected-text').text(faq_term_text);
              //$(this).addClass('filter-active');
              event.target.blur();
              let faq_id = $(this).data('id');
              let faq_term = $(this).data('term');
              $.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'html',
                data: {
                  action: 'filter_faqs',
                  faq_id: faq_id,
                  faq_term: faq_term,
                  per_page: '-1',
                },
                beforeSend: function() {
                  $('.faqs-accordion-<?php echo $faqs_id ?>').next('.posts-loader').show();
                },
                success: function(res) {
                  $('.faqs-accordion-<?php echo $faqs_id ?>').html(res);
                  $('.faqs-accordion-<?php echo $faqs_id ?>').next('.posts-loader').hide();
                },
              });
            });

          });
        </script>
      </div>
    </div>

    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>