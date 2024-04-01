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
$section_testimonial = 'section-testimonial-' . uniqid();

$testimonial = get_sub_field('testimonial') ?? [];

$heading_component = $testimonial['intro']['heading'] ?? '';
$description_component = $testimonial['intro']['description'] ?? '';

$dynamic_custom = $testimonial['testimonial_settings']['settings']['dynamic_custom'] ?? '';
$arrow_normal = $testimonial['testimonial_settings']['settings']['more_settings']['arrow_normal'] ?? '';
$arrow_hover = $testimonial['testimonial_settings']['settings']['more_settings']['arrow_hover'] ?? '';
$select_testimonial_categories = $testimonial['testimonial_settings']['select_testimonial_categories'] ?? [];
$choose_testimonial = $testimonial['testimonial_settings']['choose_testimonial'] ?? [];

$testimonial_array = [];

if ($dynamic_custom) {
  if ($dynamic_custom == 'custom' && $choose_testimonial) {
    foreach ($choose_testimonial as $testimony) {
      $testimonial_post = get_field('testimonial_post', $testimony->ID) ?? [];
      $testimonial_name = $testimonial_post['name'] ?? '';
      $testimonial_source = $testimonial_post['source'] ?? '';
      $testimonial_content = $testimonial_post['content'] ?? '';

      $testimonial_array[] = [
        'name' => $testimonial_name,
        'source' => $testimonial_source,
        'content' => $testimonial_content,
      ];
    }
  } elseif ($dynamic_custom == 'dynamic' && $select_testimonial_categories) {
    $args = [
      'post_type'      => 'testimonial',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
      'tax_query'      => [
        [
          'taxonomy' => 'testimonial-category',
          'field'    => 'term_id',
          'terms'    => $select_testimonial_categories,
          'operator' => 'IN',
        ],
      ],
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $testimonial_post = get_field('testimonial_post', get_the_ID()) ?? [];
        $testimonial_name = $testimonial_post['name'] ?? '';
        $testimonial_source = $testimonial_post['source'] ?? '';
        $testimonial_content = $testimonial_post['content'] ?? '';

        $testimonial_array[] = [
          'name' => $testimonial_name,
          'source' => $testimonial_source,
          'content' => $testimonial_content,
        ];
      }
      wp_reset_postdata();
    }
  }
}

?>

<section <?php echo $section_id ?> class="<?php echo $section_testimonial ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>

    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-lg mb-20">
        <?php
        if ($heading_component) {
          get_template_part('template-parts/components/heading', '', array('field' => $heading_component, 'align' => 'text-center'));
        }
        ?>
        <?php
        if ($description_component) {
          get_template_part('template-parts/components/textarea', '', array('field' => $description_component, 'align' => 'text-center'));
        }
        ?>
      </div>
      <?php if ($testimonial_array) : ?>
        <div class="testimonial-container relative container mx-auto max-w-screen-2xl">
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php foreach ($testimonial_array as $testimonial) : ?>
                <div class="swiper-slide">
                  <div class="container max-w-screen-xl">
                    <?php if ($testimonial['content']) : ?>
                      <div class="testimonial-text text-4xl leading-tight font-light text-center text-slate-500">
                        <?php echo $testimonial['content'] ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($testimonial['name']) : ?>
                      <div class="testimonial-name max-w-screen-md mx-auto text-center pt-16 mt-16 border-t border-slate-300">
                        <div class="text-3xl font-bold"><?php echo $testimonial['name'] ?></div>
                        <?php if ($testimonial['source']) : ?>
                          <div class="text-lg font-medium"><?php echo $testimonial['source'] ?></div>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
          <div class="absolute bottom-0 left-0 right-0">
            <div class="container max-w-screen-sm relative h-full">
              <button type="button" class="swiper-btn-prev absolute z-10 left-0 xl:left-16 bottom-6 w-9 h-9 xl:w-6 xl:h-6 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
                <?php echo cpsv_icon(array('icon' => 'chevron-left', 'group' => 'utilities', 'size' => '96', 'class' => 'w-6 h-6')); ?>
              </button>
              <button type="button" class="swiper-btn-next absolute z-10 right-0 xl:right-16 bottom-6 w-9 h-9 xl:w-6 xl:h-6 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
                <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '96', 'class' => 'w-6 h-6')); ?>
              </button>
            </div>
          </div>
          <?php if ($arrow_normal || $arrow_hover) : ?>
            <style>
              <?php
              if ($arrow_normal) {
                echo '.' . $section_testimonial . ' .swiper-btn-prev,';
                echo '.' . $section_testimonial . ' .swiper-btn-next';
                echo '{';
                echo 'color:' . $arrow_normal . ';';
                echo '}';
              }
              ?><?php
                if ($arrow_hover) {
                  echo '.' . $section_testimonial . ' .swiper-btn-prev:hover,';
                  echo '.' . $section_testimonial . ' .swiper-btn-next:hover';
                  echo '{';
                  echo 'color:' . $arrow_hover . ';';
                  echo '}';
                }
                ?>
            </style>
          <?php endif ?>
          <script type="text/javascript">
            jQuery(function($) {
              new Swiper('.<?php echo $section_testimonial ?> .swiper', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                speed: 500,
                autoHeight: true,
                watchOverflow: true,
                //centerInsufficientSlides: true,
                autoplay: {
                  speed: 8000
                },
                navigation: {
                  nextEl: '.<?php echo $section_testimonial ?> .swiper-btn-next',
                  prevEl: '.<?php echo $section_testimonial ?> .swiper-btn-prev',
                },
                breakpoints: {
                  768: {
                    slidesPerView: 1,
                    spaceBetween: 0
                  },
                  1280: {
                    slidesPerView: 1,
                    spaceBetween: 0
                  }
                }
              });
            });
          </script>
        </div>
      <?php endif ?>
    </div>

    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>