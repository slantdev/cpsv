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

$shop = get_sub_field('shop') ?: []; // Group

$heading_text = $shop['heading']['heading_text'] ?? '';
$text_area = $shop['text_area']['text_area'] ?? '';
$button_url = $shop['button']['button_link']['url'] ?? '';

$section_class = 'section-shop-' . uniqid();

function card_shop($args)
{
  //preint_r($args);
  $title = isset($args['title']) ? $args['title'] : '';
  $description = isset($args['description']) ? $args['description'] : '';
  $image = isset($args['image']) ? $args['image'] : '';
  $link = isset($args['link']) ? $args['link'] : '#';
  $type = isset($args['type']) ? $args['type'] : '';
?>
  <?php if ($type == 'featured') : ?>
    <div class="col-span-2 row-span-2">
      <div class="card-wrapper">
        <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
          <div class="aspect-1">
            <?php if ($image) : ?>
              <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
            <?php else : ?>
              <div class="w-full h-full bg-slate-50"></div>
            <?php endif; ?>
          </div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 from-0% to-transparent to-100% via-transparent bg-blend-multiply">
            <div class="w-full h-full flex flex-col justify-end">
              <div class="px-8 pb-16 pr-[30%]">
                <h4 class="text-4xl leading-tight font-semibold text-white"><?php echo $title ?></h4>
                <?php if ($description) : ?>
                  <div class="text-base text-white mt-6"><?php echo $description ?></div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  <?php else : ?>
    <div class="card-wrapper">
      <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
        <div class="aspect-1">
          <?php if ($image) : ?>
            <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
          <?php else : ?>
            <div class="w-full h-full bg-slate-50"></div>
          <?php endif; ?>
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 from-0% to-transparent to-100% bg-blend-multiply">
          <div class="w-full h-full flex flex-col justify-end">
            <div class="px-6 pt-6 pb-8">
              <h4 class="text-3xl leading-tight font-semibold text-white"><?php echo $title ?></h4>
            </div>
          </div>
        </div>
      </a>
    </div>
  <?php endif; ?>
<?php } ?>

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
              get_template_part('template-parts/components/heading', '', array('field' => $shop, 'align' => 'text-left', 'size' => 'text-4xl xl:text-5xl',  'leading' => 'leading-tight', 'weight' => 'font-semibold'));
              echo '</div>';
            }
            ?>
            <?php
            if ($text_area) {
              echo '<div class="w-full">';
              get_template_part('template-parts/components/textarea', '', array('field' => $shop, 'align' => 'text-left', 'weight' => 'font-medium'));
              echo '</div>';
            }
            ?>
          </div>
          <?php
          if ($button_url) {
            echo '<div class="w-full xl:w-1/3 flex justify-end">';
            get_template_part('template-parts/components/button', '', array('field' => $shop['button'], 'align' => 'text-left', 'weight' => 'font-medium'));
            //echo '<a href="#" class="btn btn-primary btn-outline rounded-full text-base px-16">View all</a>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
      <div class="section-shop">
        <div class="relative container max-w-screen-2xl my-8 xl:my-12">
          <?php
          $content = array(
            [
              'title' => 'For your cat',
              'description' => 'Product type: Carrier / Health & Protection / Litter Trays & Accessories / Scratchers / Beds / Feeding / Cat Toys / Collars & Harnesses / Food & Treats',
              'image' => cpsv_asset('/images/products/shop-cat.jpg'),
              'link' => '#',
              'type' => 'featured'
            ],
            [
              'title' => 'For your home',
              'description' => '',
              'image' => cpsv_asset('/images/products/shop-home.jpg'),
              'link' => '#',
              'type' => 'card'
            ],
            [
              'title' => 'Greeting cards',
              'description' => '',
              'image' => cpsv_asset('/images/products/shop-greeting.jpg'),
              'link' => '#',
              'type' => 'card'
            ],
            [
              'title' => 'Gift Certificates',
              'description' => '',
              'image' => cpsv_asset('/images/products/shop-gift.jpg'),
              'link' => '#',
              'type' => 'card'
            ],
            [
              'title' => 'Clothing & Accessories',
              'description' => '',
              'image' => cpsv_asset('/images/products/shop-clothing.jpg'),
              'link' => '#',
              'type' => 'card'
            ],
          );
          ?>
          <div class="grid grid-cols-4 gap-6">
            <?php foreach ($content as $card) : ?>
              <?php echo card_shop($card) ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="relative container max-w-screen-2xl mt-16">
          <div class="flex justify-center">
            <a href="#" class="btn btn-primary btn-outline bg-white hover:bg-brand-dark-blue rounded-full text-base px-10">Explore All Products</a>
          </div>
        </div>
      </div>
    </div>
    <?php get_template_part('template-parts/global/background_ornament', '', array('location' => 'bottom', 'shape' => $section_ornament_shape, 'color' => $section_ornament_color, 'position' => $section_ornament_position, 'class' => '')); ?>
  </div>
  <?php get_template_part('template-parts/global/separator', '', array('location' => 'bottom', 'active' => $bottom_separator, 'color' => $bottom_separator_color, 'class' => '')); ?>
</section>