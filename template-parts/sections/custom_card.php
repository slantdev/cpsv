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

$custom_cards = get_sub_field('custom_cards') ?: []; // Group

$heading_text = $custom_cards['heading']['heading_text'] ?? '';
$text_area = $custom_cards['text_area']['text_area'] ?? '';
$button_url = $custom_cards['button']['button_link']['url'] ?? '';
$cards_settings = $custom_cards['cards_settings'] ?? []; // Group
$cards = $cards_settings['cards'] ?? []; // Repeater
// $select_post_type = $posts_settings['select_post_type'] ?? '';
// $select_category = $posts_settings['select_category'] ?? '';
// $posts_per_page = $posts_settings['posts_per_page'] ?? '';
// $show_pagination = $posts_settings['show_pagination'] ?? '';

$uniqid = uniqid();
$section_class = 'section-custom_cards-' . $uniqid;

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
              get_template_part('template-parts/components/heading', '', array('field' => $custom_cards, 'align' => 'text-left', 'size' => 'text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
              echo '</div>';
            }
            ?>
            <?php
            if ($text_area) {
              echo '<div class="w-full">';
              get_template_part('template-parts/components/textarea', '', array('field' => $custom_cards, 'align' => 'text-left', 'weight' => 'font-medium'));
              echo '</div>';
            }
            ?>
          </div>
          <?php
          if ($button_url) {
            echo '<div class="w-full xl:w-1/3 flex justify-end">';
            get_template_part('template-parts/components/button', '', array('field' => $custom_cards['button'], 'align' => 'text-left', 'weight' => 'font-medium'));
            echo '</div>';
          }
          ?>
        </div>
      </div>
      <?php if ($cards) : ?>
        <div class="custom_cards-container relative container max-w-screen-2xl my-8 xl:my-12">
          <div class="cards-grid-<?php echo $uniqid ?>">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
              <?php
              foreach ($cards as $card) :
                $title = $card['title'] ?? '';
                $image = $card['card_image']['url'] ?? '';
                $image_alt = $card['card_image']['alt'] ?? '';
                $excerpt = $card['card_content']['excerpt'] ?? '';
                $link = $card['card_content']['link']['url'] ?? '';
                $link_title = $card['card_content']['link']['title'] ?? 'Learn more';
                $link_target = $card['card_content']['link']['target'] ?? '_self';
              ?>
                <div class="card-wrapper rounded-xl overflow-clip shadow-lg bg-white flex flex-col">
                  <?php if ($link) {
                    echo '<a href="' . $link . '" class="group block relative rounded-t-xl overflow-clip">';
                  } else {
                    echo '<div class="block relative rounded-t-xl overflow-clip">';
                  } ?>
                  <div class="aspect-w-16 aspect-h-9">
                    <?php if ($image) : ?>
                      <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="<?php echo $image_alt ?>">
                    <?php else : ?>
                      <div class="w-full h-full bg-slate-50"></div>
                    <?php endif; ?>
                  </div>
                  <?php if ($link) {
                    echo '</a>';
                  } else {
                    echo '</div>';
                  } ?>
                  <div class="p-4 xl:p-6 bg-white grow flex flex-col">
                    <h4 class="mb-4 text-2xl leading-tight font-semibold text-brand-dark-blue" style="color: var(--section-link-color)">
                      <?php if ($link) : ?>
                        <a href="<?php echo $link ?>" target="<?php echo $link_target ?>" class="hover:underline" style="color: var(--section-link-color)">
                        <?php endif ?>
                        <?php echo $title ?>
                        <?php if ($link) : ?>
                        </a>
                      <?php endif ?>
                    </h4>
                    <div class="mb-6 text-sm"><?php echo $excerpt ?></div>
                    <?php if ($link) : ?>
                      <div class="mt-auto"><a href="<?php echo $link ?>" target="<?php echo $link_target ?>" class="font-semibold text-brand-dark-blue uppercase underline hover:no-underline" style="color: var(--section-link-color)"><?php echo $link_title ?></a></div>
                    <?php endif ?>

                  </div>
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