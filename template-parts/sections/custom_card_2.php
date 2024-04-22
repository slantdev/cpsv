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

$custom_cards_2 = get_sub_field('custom_cards_2') ?: []; // Group

$heading_text = $custom_cards_2['heading']['heading_text'] ?? '';
$text_area = $custom_cards_2['text_area']['text_area'] ?? '';
$button_url = $custom_cards_2['button']['button_link']['url'] ?? '';
$cards_settings = $custom_cards_2['cards_settings'] ?? []; // Group
$cards = $cards_settings['cards'] ?? []; // Repeater
// $select_post_type = $posts_settings['select_post_type'] ?? '';
// $select_category = $posts_settings['select_category'] ?? '';
// $posts_per_page = $posts_settings['posts_per_page'] ?? '';
// $show_pagination = $posts_settings['show_pagination'] ?? '';

$uniqid = uniqid();
$section_class = 'section-custom_cards_2-' . $uniqid;

?>

<section <?php echo $section_id ?> class="<?php echo $section_class ?> section-wrapper relative" style="<?php echo $section_style ?>">
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'top', 'active' => $top_separator, 'color' => $top_separator_color, 'class' => '')); ?>
  <div class="section-spacing relative <?php echo $section_padding_top . ' ' . $section_padding_bottom ?>">
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'top', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
    <div class="section-content">
      <div class="intro-container relative container mx-auto max-w-screen-2xl">
        <div class="flex gap-x-20 items-end">
          <div class="w-full xl:w-2/3">
            <?php
            if ($heading_text) {
              echo '<div class="mb-4">';
              get_template_part('template-parts/components/heading', '', array('field' => $custom_cards_2, 'align' => 'text-left', 'size' => 'text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
              echo '</div>';
            }
            ?>
            <?php
            if ($text_area) {
              echo '<div class="w-full">';
              get_template_part('template-parts/components/textarea', '', array('field' => $custom_cards_2, 'align' => 'text-left', 'weight' => 'font-medium'));
              echo '</div>';
            }
            ?>
          </div>
          <?php
          if ($button_url) {
            echo '<div class="w-full xl:w-1/3 flex justify-end">';
            get_template_part('template-parts/components/button', '', array('field' => $custom_cards_2['button'], 'align' => 'text-left', 'weight' => 'font-medium'));
            echo '</div>';
          }
          ?>
        </div>
      </div>
      <?php if ($cards) : ?>
        <div class="custom_cards_2-container relative container max-w-screen-2xl my-8 xl:my-12">
          <div class="cards-grid-<?php echo $uniqid ?>">
            <div class="grid grid-cols-1 gap-3 lg:grid-cols-3 lg:gap-5 mt-12">
              <?php
              foreach ($cards as $card) :
                $title = $card['title'] ?? '';
                $image = $card['card_image']['url'] ?? '';
                $image_alt = $card['card_image']['alt'] ?? '';
                $link = $card['link']['url'] ?? '';
                $link_target = $card['link']['target'] ?? '_self';
              ?>
                <div class="relative block">
                  <a href="<?php echo $link ?>" target="<?php echo $link_target ?>" class="block group">
                    <div class="aspect-w-16 aspect-h-10 overflow-hidden rounded-lg lg:rounded-xl">
                      <?php if ($image) : ?>
                        <img class="object-cover transition duration-300 group-hover:scale-110" src="<?php echo $image ?>" alt="<?php echo $image_alt ?>">
                      <?php else : ?>
                        <div class="w-full h-full bg-slate-50"></div>
                      <?php endif; ?>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0">
                      <div class="mb-4 ml-4 mr-4">
                        <div class="inline-block bg-white rounded lg:rounded-md py-2 px-3 lg:py-3 lg:px-4 text-sm lg:text-base font-bold"><?php echo $title ?></div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>