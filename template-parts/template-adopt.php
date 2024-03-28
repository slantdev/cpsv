<?php

/**
 * Template Name: Adopt
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
<section class="section-page-header relative -mt-[136px] bg-cover bg-[50%_20%]" style="background-image: url(<?php echo site_url() . '/wp-content/uploads/2024/03/1828874.jpg' ?>);">
  <div class="bg-brand-light-gray bg-opacity-60 pt-44">
    <div class="container max-w-screen-2xl">
      <div class="flex pt-28 pb-20 items-end">
        <div class="w-full">
          <div class="breadcrumbs mb-6 [&_li]:before:!border-brand-tomato [&_li]:before:!opacity-100 last:[&_ul>li]:font-bold">
            <ul>
              <li><a>Home</a></li>
              <li>Adopt a cat</li>
            </ul>
          </div>
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Adopt a cat</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<!-- Image + Text -->
<?php
$top_separator = false;
$bottom_separator = false;
?>
<section class="relative">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12 2xl:gap-x-24">
        <div class="xl:w-2/5">
          <div class="aspect-1 rounded-xl overflow-clip">
            <img class="object-cover w-full h-full" src="<?php echo site_url() . '/wp-content/uploads/2024/03/2031419.jpg' ?>" alt="">
          </div>
        </div>
        <div class="xl:w-3/5">
          <h3 class="text-brand-blue font-semibold text-5xl leading-tight mb-6">Cats available for adoption</h3>
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none">
            <p class="lead">The Cat Protection Society of Victoria aim to provide a second chance at love, health and happiness to the thousands of stray and abandoned cats and kittens that seek refuge at our Shelter every year.</p>
            <p>Every cat and kitten adopted from our Society has been behaviourally assessed, desexed, microchipped, vaccinated and treated for worms and fleas and comes with 2 weeks health cover for additional peace of mind (conditions apply).</p>

            <p>To meet the cats and kittens available for adoption, visit our Adoption Shelter during our opening hours. During Winter and Spring, there is no need to make an appointment.</p>

            <p>From 1st December 2023- 31st January 2024 appointments are strongly recommended, with customers who have completed an adoption application form and booked a meet and greet appointment given priority access to our adoption shelter.</p>
            <p><em>Please note, our website features only some of the cats and kittens available for adoption. You will have the opportunity to meet all of the cats and kittens available during your visit.</em></p>
          </div>
          <div class="mt-16 flex gap-x-4">
            <a href="#" class="btn btn-secondary btn-outline rounded-full text-xl leading-tight px-10 h-auto">Adopt a cat</a>
            <a href="#" class="btn btn-secondary rounded-full text-xl leading-tight px-10 h-auto">Book a Meet & Greet appointment</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- Adopt -->
<?php
$section_id = 'section-adopt-cats-' . uniqid();
$top_separator = true;
$bottom_separator = false;
function card_cat($args)
{
  //preint_r($args);
  $name = isset($args['name']) ? $args['name'] : '';
  $age = isset($args['age']) ? $args['age'] : '';
  $image = isset($args['image']) ? $args['image'] : '';
  $link = isset($args['link']) ? $args['link'] : '#';
?>
  <a href="<?php echo $link ?>" class="block bg-white rounded-xl overflow-clip transition-all duration-300 hover:shadow-lg">
    <div class="aspect-w-1 aspect-h-1">
      <img src="<?php echo $image ?>" class="object-cover h-full w-full" />
    </div>
    <div class="px-4 py-2 xl:px-8 xl:py-4">
      <div class="flex justify-between gap-x-4">
        <div class="text-2xl"><?php echo $name ?></div>
        <div class="text-lg text-slate-500"><?php echo $age ?></div>
      </div>
    </div>
  </a>
<?php } ?>
<section class="relative bg-brand-light-gray <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container mx-auto max-w-screen-2xl">
      <div>
        <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Looking to adopt a cat?</h3>
      </div>
      <div class="w-full xl:w-2/3">
        <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
          Discover your future companion and provide a deserving cat with a loving forever home through CPSV’s adoption program.
        </div>
      </div>
    </div>
    <div class="container mx-auto max-w-screen-2xl my-8 xl:my-16">
      <div class="adopt-search-container">
        <div class="flex gap-x-4">
          <input type="text" placeholder="Animal ID:" class="grow input input-bordered rounded-full">
          <select name="filter-shelter" id="filter-shelter" class="select select-bordered rounded-full">
            <option value="" disabled selected>Filter by time in shelter</option>
            <option value="">Option 1</option>
            <option value="">Option 2</option>
            <option value="">Option 3</option>
          </select>
          <select name="filter-age" id="filter-age" class="select select-bordered rounded-full">
            <option value="" disabled selected>Filter by age</option>
            <option value="">Option 1</option>
            <option value="">Option 2</option>
            <option value="">Option 3</option>
          </select>
          <select name="filter-gender" id="filter-gender" class="select select-bordered rounded-full">
            <option value="" disabled selected>Filter by gender</option>
            <option value="">Male</option>
            <option value="">Female</option>
          </select>
          <button type="button" class="btn btn-secondary text-base px-10 rounded-full">Search</button>
        </div>
      </div>
      <div class="adopt-filter-container mt-8">
        <div class="flex justify-between gap-x-24 border-b border-slate-300">
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-cat', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Can live with other cats
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-dog', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Can live with dogs
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-children', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Can live with children
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="max-w-[180px]">
            <a href="!#" role="button" class="adopt-filter-btn block text-slate-500 relative pb-6 hover:brightness-125">
              <div class="flex gap-x-4 items-center">
                <div class="flex-none">
                  <?php echo cpsv_icon(array('icon' => 'filter-mature', 'group' => 'content', 'size' => '48', 'class' => 'w-12 h-12')); ?>
                </div>
                <div class="text-sm">
                  Quiet, mature home
                </div>
              </div>
              <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                <?php echo cpsv_icon(array('icon' => 'check-circle', 'group' => 'utilities', 'size' => '16', 'class' => 'w-4 h-4')); ?>
              </div>
            </a>
          </div>
          <div class="flex-none">
            <button type="button" class="btn btn-ghost hover:bg-base-100">
              Clear Filters
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="relative container mx-auto max-w-screen-2xl mt-8 mb-8 xl:mt-16 xl:mb-12">
      <?php
      $content = array(
        [
          'name' => 'Cherrie',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/20787-300x300.jpg',
          'link' => site_url() . '/delilah'
        ],
        [
          'name' => 'Chang',
          'age' => '10 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/104827-300x300.jpg',
          'link' => site_url() . '/delilah'
        ],
        [
          'name' => 'Kara',
          'age' => '2 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/126407-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Jena',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/177809-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Misty',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/208805-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Ron',
          'age' => '10 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/279360-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Millie',
          'age' => '2 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/368890-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Joe',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/104827.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Cherrie',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/20787-300x300.jpg',
          'link' => site_url() . '/delilah'
        ],
        [
          'name' => 'Chang',
          'age' => '10 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/104827-300x300.jpg',
          'link' => site_url() . '/delilah'
        ],
        [
          'name' => 'Kara',
          'age' => '2 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/126407-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Jena',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/177809-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Misty',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/208805-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Ron',
          'age' => '10 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/279360-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Millie',
          'age' => '2 Yrs',
          'image' => site_url() . '/wp-content/uploads/2024/03/368890-300x300.jpg',
          'link' => '/delilah'
        ],
        [
          'name' => 'Joe',
          'age' => '6 Mths',
          'image' => site_url() . '/wp-content/uploads/2024/03/599492-300x300.jpg',
          'link' => '/delilah'
        ],
      );
      ?>
      <div class="swiper -mx-4 xl:-mx-6">
        <div class="swiper-wrapper">
          <?php foreach ($content as $cat) : ?>
            <div class="swiper-slide p-4">
              <?php echo card_cat($cat) ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="absolute inset-0">
        <div class="container max-w-screen-2xl relative h-full">
          <button type="button" class="swiper-btn-prev absolute z-10 left-0 xl:-left-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-10 xl:h-10 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'chevron-left', 'group' => 'utilities', 'size' => '96', 'class' => 'w-10 h-10')); ?>
          </button>
          <button type="button" class="swiper-btn-next absolute z-10 right-0 xl:-right-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-10 xl:h-10 flex items-center justify-center text-slate-300 hover:text-brand-blue transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'chevron-right', 'group' => 'utilities', 'size' => '96', 'class' => 'w-10 h-10')); ?>
          </button>
        </div>
      </div>
      <div class="absolute -bottom-20 left-0 right-0">
        <div class="container max-w-screen-2xl px-4 xl:px-8">
          <div class="relative">
            <div class="swiper-pagination [&>.swiper-pagination-bullet]:rounded-lg" style="--swiper-pagination-bullet-width: 80px;--swiper-pagination-color:#1068F0;"></div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      jQuery(function($) {
        new Swiper('.<?php echo $section_id ?> .swiper', {
          slidesPerView: 4,
          spaceBetween: 0,
          loop: false,
          speed: 500,
          //watchOverflow: true,
          //centerInsufficientSlides: true,
          slidesPerGroup: 2,
          grid: {
            fill: 'row',
            rows: 2,
          },
          pagination: {
            el: ".<?php echo $section_id ?> .swiper-pagination",
            clickable: true
          },
          navigation: {
            nextEl: '.<?php echo $section_id ?> .swiper-btn-next',
            prevEl: '.<?php echo $section_id ?> .swiper-btn-prev',
          },
          breakpoints: {
            768: {
              slidesPerView: 'auto',
              spaceBetween: 24
            },
            1280: {
              slidesPerView: 4,
              spaceBetween: 0
            }
          }
        });
      });
    </script>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- Testimonial -->
<?php
$top_separator = true;
$bottom_separator = true;
$section_id = 'section-testimonial-' . uniqid();
function testimonial($text = null, $name = null, $source = null)
{ ?>
  <div class="container max-w-screen-xl">
    <?php if ($text) : ?>
      <div class="testimonial-text text-4xl leading-tight font-light text-center text-slate-500">
        <?php echo $text ?>
      </div>
    <?php endif; ?>
    <?php if ($name) : ?>
      <div class="testimonial-name max-w-screen-md mx-auto text-center pt-16 mt-16 border-t border-slate-300">
        <div class="text-3xl font-bold"><?php echo $name ?></div>
        <?php if ($source) : ?>
          <div class="text-lg font-medium"><?php echo $source ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
<?php } ?>
<section class="relative bg-brand-light-gray <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="relative container mx-auto max-w-screen-2xl mb-20">
      <div class="text-center">
        <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Our success stories</h3>
      </div>
    </div>
    <div class="relative container mx-auto max-w-screen-2xl">
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <?php
            $text = 'Adopted my cat here. Process was easy and staff are kind.<br />
              We bring him back for check ups and the vets are so knowledgeable and lovely. Keep up the great work!';
            $name = 'Kat S';
            $source = 'Google Review';
            echo testimonial($text, $name, $source);
            ?>
          </div>
          <div class="swiper-slide">
            <?php
            $text = 'Adopted my cat here. Process was easy and staff are kind.<br />
              We bring him back for check ups and the vets are so knowledgeable and lovely. Keep up the great work!';
            $name = 'Kat S';
            $source = 'Google Review';
            echo testimonial($text, $name, $source);
            ?>
          </div>
          <div class="swiper-slide">
            <?php
            $text = 'Adopted my cat here. Process was easy and staff are kind.<br />
              We bring him back for check ups and the vets are so knowledgeable and lovely. Keep up the great work!<br/>
              Adopted my cat here. Process was easy and staff are kind.';
            $name = 'Kat S';
            $source = 'Google Review';
            echo testimonial($text, $name, $source);
            ?>
          </div>
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
      <script type="text/javascript">
        jQuery(function($) {
          new Swiper('.<?php echo $section_id ?> .swiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: false,
            speed: 500,
            autoHeight: true,
            //watchOverflow: true,
            //centerInsufficientSlides: true,
            navigation: {
              nextEl: '.<?php echo $section_id ?> .swiper-btn-next',
              prevEl: '.<?php echo $section_id ?> .swiper-btn-prev',
            },
            breakpoints: {
              768: {
                slidesPerView: 1,
                spaceBetween: 24
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
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!--  Text + Image -->
<?php
$top_separator = true;
$bottom_separator = true;
?>
<section class="relative">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12 2xl:gap-x-24">
        <div class="xl:w-2/5 order-2">
          <div class="aspect-1 rounded-xl overflow-clip">
            <img class="object-cover w-full h-full" src="<?php echo site_url() . '/wp-content/uploads/2024/03/1825999.jpg' ?>" alt="">
          </div>
          <div class="mt-10 flex gap-x-4">
            <a href="#" class="btn btn-secondary btn-outline rounded-full text-xl leading-tight px-10 h-auto">Adopt a cat</a>
          </div>
        </div>
        <div class="xl:w-3/5 order-1">
          <h3 class="text-brand-blue font-semibold text-5xl leading-tight mb-6">How to get started?</h3>
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none mb-10">
            <p class="lead">The Cat Protection Society of Victoria aim to provide a second chance at love, health and happiness to the thousands of stray and abandoned cats and kittens that seek refuge at our Shelter every year.</p>
          </div>
          <div class="component-numbered-list relative">
            <div class="relative flex flex-col">
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-blue flex items-center justify-center text-4xl font-bold text-white">01</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-blue"></div>
                </div>
                <div class="prose xl:prose-lg font-medium max-w-none pb-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-blue flex items-center justify-center text-4xl font-bold text-white">02</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-blue"></div>
                </div>
                <div class="prose xl:prose-lg font-medium max-w-none pb-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-blue flex items-center justify-center text-4xl font-bold text-white">03</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-blue"></div>
                </div>
                <div class="prose xl:prose-lg font-medium max-w-none pb-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-blue flex items-center justify-center text-4xl font-bold text-white">04</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-blue hidden"></div>
                </div>
                <div class="prose xl:prose-lg font-medium max-w-none pb-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- FAQ -->
<?php
$top_separator = true;
$bottom_separator = false;
$uniqid = uniqid();
$section_id = 'section-faq-' . $uniqid;
function faq($title = null, $text = null, $uniqid = null)
{ ?>
  <div class="collapse collapse-plus bg-brand-light-gray rounded-lg border border-slate-300 shadow-md mb-6">
    <input type="radio" class="faq-radio-btn w-full h-full block" name="faq-'<?php echo $uniqid ?>'" />
    <div class="collapse-title bg-white text-xl lg:text-2xl border-b border-slate-300 font-medium py-5 pl-8 pr-12 after:font-thin after:!end-8 after:text-brand-tomato after:!top-2 after:text-3xl after:lg:text-5xl">
      <?php echo $title ?>
    </div>
    <div class="collapse-content p-0">
      <div class="p-8">
        <div class="prose lg:prose-lg max-w-none">
          <?php echo $text ?>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<section class="relative bg-brand-light-gray <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="relative container mx-auto max-w-screen-2xl mb-20">
      <div class="max-w-screen-md mx-auto text-center">
        <h3 class="mb-4 text-brand-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Frequently asked questions</h3>
        <div class="text-lg mt-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="relative container max-w-screen-lg mx-auto">
      <div class="faqs-accordion">
        <?php
        $title = '1. Lorem ipsum dolor sit amet';
        $text = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
        $uniqid = $uniqid;
        echo faq($title, $text, $uniqid);
        ?>
        <?php
        $title = '2. Lorem ipsum dolor sit amet';
        $text = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
        $uniqid = $uniqid;
        echo faq($title, $text, $uniqid);
        ?>
        <?php
        $title = '3. Lorem ipsum dolor sit amet';
        $text = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
        $uniqid = $uniqid;
        echo faq($title, $text, $uniqid);
        ?>
        <?php
        $title = '2. Lorem ipsum dolor sit amet';
        $text = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
        $uniqid = $uniqid;
        echo faq($title, $text, $uniqid);
        ?>
        <?php
        $title = '5. Lorem ipsum dolor sit amet';
        $text = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
        $uniqid = $uniqid;
        echo faq($title, $text, $uniqid);
        ?>
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
    <script type="text/javascript">
      jQuery(document).ready(function($) {

        $(document).on(
          'click',
          '.<?php echo $section_id ?> .faqs-accordion .faq-radio-btn',
          function() {
            setTimeout(() => {
              $('html, body').animate({
                scrollTop: $(this).offset().top - 100
              }, 200);
            }, 400);
          }
        );

      });
    </script>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>