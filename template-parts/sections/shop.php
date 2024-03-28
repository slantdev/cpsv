<?php
include get_template_directory() . '/template-parts/global/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_id = 'section-shop-' . uniqid();
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
      <div class="card">
        <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
          <div class="aspect-1">
            <?php if ($image) : ?>
              <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
            <?php else : ?>
              <div class="w-full h-full bg-slate-50"></div>
            <?php endif; ?>
          </div>
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent bg-blend-multiply">
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
    <div class="card">
      <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
        <div class="aspect-1">
          <?php if ($image) : ?>
            <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
          <?php else : ?>
            <div class="w-full h-full bg-slate-50"></div>
          <?php endif; ?>
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 bg-blend-multiply">
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
<section class="relative bg-brand-light-gray <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container max-w-screen-2xl">
      <div class="flex gap-x-20 items-end">
        <div class="w-full xl:w-2/3">
          <div>
            <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Shop online</h3>
          </div>
          <div class="w-full">
            <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
              To help you navigate and find the right information, choose one of the options below.
            </div>
          </div>
        </div>
        <div class="w-full xl:w-1/3 flex justify-end">
        </div>
      </div>
    </div>
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
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>