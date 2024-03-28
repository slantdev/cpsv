<?php

/**
 * Template Name: Single Cat
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
              <li><a>Adopt a cat</a></li>
              <li>Delilah</li>
            </ul>
          </div>
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Delilah</h2>
        </div>
      </div>
    </div>
  </div>
</section>

<!--  Profile -->
<section class="relative">
  <div class="relative pt-12 lg:pt-20 xl:pt-20 pb-12 lg:pb-20 xl:pb-20">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative">
        <h3 class="text-brand-blue font-semibold text-5xl leading-tight mb-6">Delilah's Profile</h3>
      </div>
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12">
        <div class="xl:w-3/5 order-1">
          <div class="catPhoto mb-8">
            <style>
              .catThumbSwiper .swiper-slide-thumb-active {
                opacity: 1;
              }
            </style>
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff; --swiper-navigation-size: 24px" class="swiper catPhotoSwiper rounded-lg overflow-clip">
              <div class="swiper-wrapper">
                <div class="swiper-slide rounded-lg overflow-clip">
                  <div class="aspect-w-16 aspect-h-9">
                    <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/cats/cat-01.jpg') ?>" alt="">
                  </div>
                </div>
                <div class="swiper-slide rounded-lg overflow-clip">
                  <div class="aspect-w-16 aspect-h-9">
                    <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/cats/cat-01.jpg') ?>" alt="">
                  </div>
                </div>
                <div class="swiper-slide rounded-lg overflow-clip">
                  <div class="aspect-w-16 aspect-h-9">
                    <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/cats/cat-01.jpg') ?>" alt="">
                  </div>
                </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper catThumbSwiper mt-3">
              <div class="swiper-wrapper">
                <div class="swiper-slide w-1/5 opacity-40">
                  <div class="aspect-w-16 aspect-h-9 rounded-md overflow-clip">
                    <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/cats/cat-01.jpg') ?>" alt="">
                  </div>
                </div>
                <div class="swiper-slide w-1/5 opacity-40">
                  <div class="aspect-w-16 aspect-h-9 rounded-md overflow-clip">
                    <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/cats/cat-01.jpg') ?>" alt="">
                  </div>
                </div>
                <div class="swiper-slide w-1/5 opacity-40">
                  <div class="aspect-w-16 aspect-h-9 rounded-md overflow-clip">
                    <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/cats/cat-01.jpg') ?>" alt="">
                  </div>
                </div>
              </div>
            </div>
            <script>
              var catThumbSwiper = new Swiper(".catThumbSwiper", {
                //loop: true,
                spaceBetween: 12,
                slidesPerView: 6,
                //freeMode: true,
                watchSlidesProgress: true,
              });
              var catPhotoSwiper = new Swiper(".catPhotoSwiper", {
                //loop: true,
                spaceBetween: 0,
                navigation: {
                  nextEl: ".catPhotoSwiper .swiper-button-next",
                  prevEl: ".catPhotoSwiper .swiper-button-prev",
                },
                thumbs: {
                  swiper: catThumbSwiper,
                },
              });
            </script>
          </div>
          <div class="catCategory mb-8">
            <div class="flex justify-between gap-x-8">
              <div>
                <div class="flex flex-col justify-center items-center w-36 h-36 p-6 rounded-full bg-brand-yellow shadow-inner">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-cat', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm text-center leading-tight mt-1">Can live with other cats</div>
                </div>
              </div>
              <div>
                <div class="flex flex-col justify-center items-center w-36 h-36 p-6 rounded-full bg-brand-yellow shadow-inner">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-dog', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm text-center leading-tight mt-1">Can live with dogs</div>
                </div>
              </div>
              <div>
                <div class="flex flex-col justify-center items-center w-36 h-36 p-6 rounded-full bg-brand-light-gray shadow-inner">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-children', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm text-center leading-tight mt-1">Can live with children</div>
                </div>
              </div>
              <div>
                <div class="flex flex-col justify-center items-center w-36 h-36 p-6 rounded-full bg-brand-light-gray shadow-inner">
                  <div class="flex-none">
                    <?php echo cpsv_icon(array('icon' => 'filter-mature', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                  </div>
                  <div class="text-sm text-center leading-tight mt-1">Likes older family</div>
                </div>
              </div>
            </div>
          </div>
          <div class="py-6 mb-10 border-t border-b border-slate-300">
            <h2 class="font-bold mb-2 text-2xl">Details:</h2>
            <ul class="text-lg">
              <li><strong>Breed:</strong> Domestic Short Hair (crossed)</li>
              <li><strong>Gender:</strong> Female</li>
              <li><strong>Colour:</strong> White / Tabby</li>
              <li><strong>Age:</strong> 2 years and 2 months</li>
              <li><strong>Animal ID:</strong> 1122878</li>
              <li><strong>Microchip Number:</strong> 956000016569467</li>
              <li><strong>Adoption Fee:</strong> $155.00</li>
              <li><strong>Available for adoption since:</strong> DD/MM/YY</li>
              <li><strong>CPSV Source Number:</strong> BR100404</li>
            </ul>
          </div>
          <div class="aspect-w-16 aspect-h-9 my-10">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/wE8s993ZV-8?si=V_Lf1wysE5fD6BYg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none mb-10">
            <p class="lead">Delilah is a stunning young girl who’s eager for a chance at love and trust. With her striking color and soft fur, she’s a cat lovers’ dream. However, beneath her external beauty lies a shy and timid nature that needs a soft touch and patience to navigate.</p>
            <p>She’s found the world to be a bit of a scary place, but as soon as trust is established, her blossoming personality will shine through. Capturing her heart will requires time, patience, and plenty of gentle care and affection. She needs a dependable and patient human to help her build her confidence and trust in the world around her.</p>
            <p>Delilah would thrive best in a harmonious and quiet home without young children. Her peace and serenity make her the perfect companion for those quiet evenings curled up on the couch.</p>
            <p>In the right environment, this beautiful girl will blossom and become a loving companion.</p>
          </div>
        </div>
        <div class="xl:w-2/5 order-2">
          <div class="bg-brand-light-gray rounded-xl p-8 mb-8">
            <h4 class="text-[28px] leading-tight font-bold mb-3">Quick Links</h4>
            <ul class="flex flex-col gap-y-3">
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between hover:underline">Cats for adoption search <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-tomato mt-[7px]')); ?></a></li>
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between hover:underline">Our adoption process <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-tomato mt-[7px]')); ?></a></li>
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between hover:underline">Adoption fees & FAQ’s <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-tomato mt-[7px]')); ?></a></li>
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between hover:underline">Help & advice <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-tomato mt-[7px]')); ?></a></li>
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between hover:underline">Adoption success stories <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-tomato mt-[7px]')); ?></a></li>
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between hover:underline">Ready to adopt? <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4 text-brand-tomato mt-[7px]')); ?></a></li>
            </ul>
          </div>
          <div class="bg-brand-light-gray rounded-xl p-8 mb-8">
            <div class="social-link flex mb-4">
              <a href="#" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="#" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'x', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="#" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="#" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'whatsapp', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
              <a href="#" class="text-slate-500 hover:text-black"><?php echo cpsv_icon(array('icon' => 'email', 'group' => 'social', 'size' => '24', 'class' => 'w-12 h-12')); ?></a>
            </div>
            <ul class="flex flex-col gap-y-3">
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between">Print profile</a></li>
              <li class="pt-3 border-t border-slate-300"><a href="#" class="text-xl flex justify-between">Email profile link</a></li>
            </ul>
          </div>
          <div class="mt-8 flex gap-x-4">
            <a href="/adopt-a-cat/adoption-application/" class="btn btn-secondary btn-lg rounded-full text-xl text-white leading-tight px-8 h-auto flex justify-between">Apply to adopt now <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '16', 'class' => 'ml-4 w-4 h-4 text-white')); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>