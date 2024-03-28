<?php

/**
 * Template Name: Single Product
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
<section class="section-page-header relative -mt-[136px] bg-cover bg-center">
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
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">For your cat</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<!--  Profile -->
<section class="relative">
  <div class="relative pt-12 lg:pt-20 xl:pt-20 pb-12 lg:pb-20 xl:pb-20">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="flex gap-x-10">
        <div class="w-1/2">
          <div class="aspect-1 rounded-lg border border-slate-300 overflow-clip">
            <img src="<?php echo cpsv_asset('/images/products/product-01.jpg') ?>" alt="">
          </div>
          <div class="grid grid-cols-6 gap-x-3 mt-4">
            <div class="aspect-1 rounded border border-slate-300 overflow-clip">
              <img src="<?php echo cpsv_asset('/images/products/product-01.jpg') ?>" alt="">
            </div>
            <div class="aspect-1 rounded border border-slate-300 overflow-clip">
              <img src="<?php echo cpsv_asset('/images/products/product-01.jpg') ?>" alt="">
            </div>
            <div class="aspect-1 rounded border border-slate-300 overflow-clip">
              <img src="<?php echo cpsv_asset('/images/products/product-01.jpg') ?>" alt="">
            </div>
          </div>
        </div>
        <div class="w-1/2">
          <h1 class="text-brand-dark-blue font-medium text-4xl leading-tight tracking-tight mb-6">Cat Carrier Backpack, Expandable Pet Backpack for cats</h1>
          <div class="flex gap-x-1 items-center text-base"><?php echo cpsv_icon(array('icon' => 'star', 'group' => 'utilities', 'size' => '96', 'class' => 'w-8 h-8 text-yellow-500')); ?> <span class="font-medium">4.6</span> <span>(139 Reviews)</span></div>
          <div class="py-8 my-8 border-t border-b border-slate-300">
            <div class="text-[54px] font-semibold tracking-tighter">$69.99</div>
          </div>
          <div class="flex gap-x-4">
            <button type="button" class="btn btn-secondary btn-lg px-10">Add to cart <?php echo cpsv_icon(array('icon' => 'cart2', 'group' => 'utilities', 'size' => '96', 'class' => 'ml-1 w-6 h-6')); ?></button>
            <button type="button" class="btn btn-square btn-lg bg-brand-blue/10 border-brand-blue/10 text-brand-blue hover:bg-brand-blue/20 hover:border-brand-blue/20"><?php echo cpsv_icon(array('icon' => 'heart-line', 'group' => 'utilities', 'size' => '96', 'class' => 'w-6 h-6')); ?></button>
            <button type="button" class="btn btn-square btn-lg bg-brand-blue/10 border-brand-blue/10 text-brand-blue hover:bg-brand-blue/20 hover:border-brand-blue/20"><?php echo cpsv_icon(array('icon' => 'share', 'group' => 'utilities', 'size' => '96', 'class' => 'w-6 h-6')); ?></button>
          </div>
        </div>
      </div>
    </div>
    <div class="container mx-auto max-w-screen-2xl">
      <div role="tablist" class="tabs tabs-bordered mt-20">
        <input type="radio" name="my_tabs_1" role="tab" class="tab h-12 text-xl font-semibold rounded-none checked:bg-none checked:bg-transparent focus:bg-transparent hover:checked:bg-transparent hover:focus:bg-transparent border-t-0 border-x-0" aria-label="Description" checked />
        <div role="tabpanel" class="tab-content py-10">
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none mb-10">
            <ul>
              <li>Only halinfer guarantees you the authentic product!!! We will not support customer service for the order not purchased from halinfer.TRANSPARENT BUBBLE FRONT + EXPANDABLE BACK. Increase your pet’s visual space via front transparent hard shell, gives more room and play time inside by expandable back panel. The real ever bigger expandable cat backpack.</li>
              <li>BREATHABLE SPACE CAPSULE CAT BACKPACK. Extra 9 vent holes around this carrier backpack and two side windows to perform great air circulation inside. Expanded back panel to be a giant tent bed for your furry friends to enjoy outdoor time with nature and sunshine well without feeling stuffiness in the backpac, the best ventilation ever.</li>
              <li>ECO-FRIENDLY AND NON-TOXIC PET-SAFE MATERIALS. Light weight and super wear-resistant shell perfectly against biting and scratching by pets. Entire backpack is less than 3 lbs only, suggest for cats from 1-12lbs and small dogs from 1-10lbs to leave enough room inside to turn around. Airline Approved.</li>
              <li>TWO CARRYING WAYS. Portable and Wearable shoulder pet carrier backpack with adjustable chest buckle for travel and hiking outdoor activity, the real travel backpack for cats.</li>
              <li>Adhere to Amazon’s return policy and prompt customer service in 24 hours by 7 days.</li>
            </ul>
          </div>
        </div>

        <input type="radio" name="my_tabs_1" role="tab" class="tab h-12 text-xl font-semibold rounded-none checked:bg-none checked:bg-transparent focus:bg-transparent border-t-0 border-x-0" aria-label="Specification" />
        <div role="tabpanel" class="tab-content py-10">Tab content 2</div>

      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>