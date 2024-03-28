<?php

/**
 * Template Name: Shop
 * Template Post Type: page
 *
 */

get_header();

$top_separator_style = '';
$bottom_separator_style = '';
$top_separator = true;
$bottom_separator = true;

?>

<!-- Page Header -->
<section class="section-page-header relative -mt-[136px] bg-cover bg-[50%_20%]" style="background-image: url(<?php echo site_url() . '/wp-content/uploads/2024/03/1643748.jpg' ?>);">
  <div class="bg-brand-light-gray bg-opacity-60 pt-44">
    <div class="container max-w-screen-2xl">
      <div class="flex pt-28 pb-20 items-end">
        <div class="w-full">
          <div class="breadcrumbs mb-6 [&_li]:before:!border-brand-tomato [&_li]:before:!opacity-100 last:[&_ul>li]:font-bold">
            <ul>
              <li><a>Home</a></li>
              <li>Shop Online</li>
            </ul>
          </div>
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Shop Online</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<!-- Shop -->
<?php
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

<!-- Popular Products -->
<?php
$section_id = 'section-popular-products-' . uniqid();
function card_product($link = null, $title = null, $image = null, $price = null, $rating = null)
{
?>
  <a href="<?php echo $link ?>" class="block bg-white rounded-xl overflow-clip transition-all duration-300 shadow-md hover:shadow-xl">
    <div class="aspect-w-1 aspect-h-1">
      <img src="<?php echo $image ?>" class="object-cover h-full w-full" />
    </div>
    <div class="px-4 py-2 xl:px-4 xl:py-4">
      <div class="mb-4 text-lg font-medium"><?php echo $title ?></div>
      <div class="flex justify-between items-center gap-x-4">
        <div class="text-2xl font-semibold tracking-tighter"><?php echo $price ?></div>
        <div class="flex gap-x-1 items-center text-sm"><?php echo cpsv_icon(array('icon' => 'star', 'group' => 'utilities', 'size' => '96', 'class' => 'w-5 h-5 text-yellow-500')); ?> <?php echo $rating ?></div>
      </div>
    </div>
  </a>
<?php } ?>
<section class="relative bg-white <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container mx-auto max-w-screen-2xl">
      <div class="w-full xl:w-2/3">
        <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Popular Products</h3>
      </div>
      <div class="flex">
        <div class="w-full xl:w-2/3">
          <div class="prose max-w-prose xl:prose-lg mr-auto text-left font-medium">
            Our picks for you based on recent sales and market trends
          </div>
        </div>
        <div class="w-full xl:w-1/3">
        </div>
      </div>
    </div>
    <div class="relative container mx-auto max-w-screen-2xl mt-8 mb-8 xl:mt-16 xl:mb-12">
      <div class="grid grid-cols-4 gap-8">
        <?php for ($i = 0; $i < 12; $i++) { ?>
          <?php
          $link = '/single-product';
          $title = 'Cat Carrier Backpack, Expandable Pet Backpack.';
          $price = '$69.99';
          $image = cpsv_asset('/images/products/product-01.jpg');
          $rating = '4.9 (353)';
          echo card_product($link, $title, $image, $price, $rating);
          ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- CTA -->
<?php
$section_id = 'section-cta-' . uniqid();
?>
<section class="relative <?php echo $section_id ?>">
  <div class="absolute inset-0 z-0">
    <img class="object-cover w-full h-full object-bottom" src="<?php echo cpsv_asset('/images/banner/catbanner-02.jpg'); ?>" alt="">
    <div class="absolute top-0 left-1/2 right-0 bottom-0 w-1/2 h-full bg-gradient-to-l from-brand-yellow to-brand-yellow/80"></div>
  </div>
  <div class="relative z-10 container max-w-screen-2xl py-8 xl:py-36">
    <div class="flex">
      <div class="w-1/2"></div>
      <div class="w-1/2 relative">
        <div class="relative pl-24 pt-12 text-white">
          <div class="absolute top-0 right-0 text-white -translate-y-1/2">
            <?php echo cpsv_svg(array('svg' => 'cpsv', 'group' => 'shapes', 'size' => false, 'class' => 'w-[128px] xl:w-[128px] h-auto')); ?>
          </div>
          <h3 class="text-5xl font-semibold">Donate Now!</h3>
          <div class="text-xl text-white mt-8">
            Help us make a difference today by clicking ‘Donate Now’ and supporting our mission to provide a better life for cats in need.
          </div>
          <div class="mt-12">
            <a href="#" class="btn bg-white rounded-full px-10 text-base text-brand-dark-blue hover:shadow-lg hover:brightness-110 transition-all duration-300">Make a donation</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>