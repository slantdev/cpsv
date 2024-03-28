<?php

/**
 * Template Name: Blocks
 * Template Post Type: page
 *
 */

get_header();

$top_separator_style = '';
$bottom_separator_style = '';
$top_separator = true;
$bottom_separator = true;

?>

<?php
get_template_part('template-parts/global/page-header', '', array('breadcrumbs' => true));
get_template_part('template-parts/page', 'builder');
?>

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
<section class="relative bg-brand-light-gray <?php echo $section_id ?>">
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
        <?php for ($i = 0; $i < 24; $i++) { ?>
          <?php
          $link = '#';
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

<!-- Foster -->
<?php
$section_id = 'section-foster-cats-' . uniqid();
function card_foster()
{
?>
  <a href="#" class="block bg-white rounded-xl overflow-clip transition-all duration-300 hover:shadow-lg">
    <div class="aspect-w-1 aspect-h-1">
      <img src="<?php echo cpsv_asset('/images/banner/catbanner-01.jpg') ?>" class="object-cover h-full w-full" />
    </div>
    <div class="px-4 py-2 xl:px-12 xl:py-4">
      <div class="flex flex-col text-center">
        <div class="text-3xl text-center font-semibold text-brand-tomato">Cherrie</div>
        <div class="text-base leading-snug text-slate-500 mt-2">1 yr old female domestic short hair</div>
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
      <div class="w-full xl:w-2/3">
        <h3 class="mb-4 text-brand-tomato font-semibold text-5xl -tracking-[0.0125em] leading-tight">Foster a cat</h3>
      </div>
      <div class="flex">
        <div class="w-full xl:w-2/3">
          <div class="prose max-w-prose xl:prose-lg mr-auto text-left font-medium">
            By fostering a cat through CPSV, you offer a nurturing temporary home, crucial for their journey to a permanent loving family.
          </div>
        </div>
        <div class="w-full xl:w-1/3">
          <div class="flex gap-x-4 justify-end">
            <select name="filter-age" id="filter-age" class="select select-bordered rounded-full">
              <option value="" disabled selected>Filter by age</option>
              <option value="">Option 1</option>
              <option value="">Option 2</option>
              <option value="">Option 3</option>
            </select>
            <select name="filter-foster" id="filter-foster" class="select select-bordered rounded-full">
              <option value="" disabled selected>Filter by foster required</option>
              <option value="">Option 1</option>
              <option value="">Option 2</option>
              <option value="">Option 3</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="relative container mx-auto max-w-screen-2xl mt-8 mb-8 xl:mt-16 xl:mb-12">
      <div class="grid grid-cols-4 gap-8">
        <?php for ($i = 0; $i < 24; $i++) { ?>
          <?php echo card_foster() ?>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- Articles -->
<?php
$section_id = 'section-articles-' . uniqid();
function card_article($link = '#', $text = null, $excerpt = null, $image = null)
{ ?>
  <div class="card group relative bg-white shadow-lg rounded-xl overflow-clip hover:shadow-xl transition-all duration-300">
    <div class="aspect-w-16 aspect-h-9">
      <a href="<?php echo $link ?>" class="w-full h-full overflow-clip">
        <?php if ($image) : ?>
          <img class="object-cover w-full h-full transition-all duration-300" src="<?php echo $image ?>" alt="">
        <?php else : ?>
          <div class="w-full h-full bg-slate-50"></div>
        <?php endif; ?>
      </a>
    </div>
    <div class="pt-4 px-6 pb-6 w-full h-full flex flex-col">
      <h4><a href="<?php echo $link ?>" class="text-2xl leading-tight font-semibold text-brand-teal hover:underline"><?php echo $text ?></a></h4>
      <div class="my-6"><?php echo wp_trim_words($excerpt, 20) ?></div>
      <div class="mt-auto"><a href="<?php echo $link ?>" class="text-brand-teal uppercase underline hover:no-underline">Learn More</a></div>
    </div>
  </div>
<?php } ?>
<section class="relative <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container max-w-screen-2xl">
      <div class="flex gap-x-20 items-end">
        <div class="w-full xl:w-2/3">
          <div>
            <h3 class="mb-4 text-brand-teal font-semibold text-5xl -tracking-[0.0125em] leading-tight">Articles & Advice</h3>
          </div>
          <div class="w-full">
            <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Ut enim ad minim veniam.
            </div>
          </div>
        </div>
        <div class="w-full xl:w-1/3 flex justify-end">
          <select class="select bg-white rounded-none border-t-0 border-x-0 border-b border-slate-500 text-lg font-semibold pl-0 w-full max-w-xs focus:outline-0">
            <option disabled selected>Filter</option>
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
            <option>Option 4</option>
            <option>Option 5</option>
          </select>
        </div>
      </div>
    </div>
    <div class="relative container max-w-screen-2xl my-8 xl:my-12">
      <div class="grid grid-cols-3 gap-6">
        <?php
        $link = '#';
        $text = 'New Year Cat Checklist';
        $excerpt = 'With the goal that every Victorian cat has the opportunity to be happy, healthy and feel safe and loved in the year ahead, our team at The Cat Protection Society of Victoria have put together our “New Year Cat Checklist” to kick start 2024 in the most feline friendly way possible';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Should you invest in Pet Insurance?';
        $excerpt = 'Nearly two thirds of Australian households own a pet and according to research by Finder in 2018 they spend a collective $1.3 billion annually at the vet. Yet only six per cent of them invest in pet insurance.';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'The popular floral toxin that can be harmful to cats';
        $excerpt = 'Wondering if you’ll lose your Disability Support Pension (DSP) if you start working? Want to find a job but not sure how many hours you can work and still receive the full DSP.?';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_article($link, $text, $excerpt, $image);
        ?>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- Card Link -->
<?php
$section_id = 'section-card-link-' . uniqid();
function card_link($link = '#', $text = null, $image = null)
{ ?>
  <div class="relative block">
    <a href="<?php echo $link ?>" class="block group">
      <div class="aspect-w-16 aspect-h-10 overflow-hidden rounded-lg lg:rounded-xl">
        <img src="<?php echo $image ?>" alt="" class="object-cover transition duration-300 group-hover:scale-110">
      </div>
      <div class="absolute bottom-0 left-0 right-0">
        <div class="mb-4 ml-4 mr-4">
          <div class="inline-block bg-white rounded lg:rounded-md py-2 px-3 lg:py-3 lg:px-4 text-sm lg:text-base font-bold"><?php echo $text ?></div>
        </div>
      </div>
    </a>
  </div>
<?php } ?>
<section>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="relative container max-w-screen-2xl">
      <div class="flex gap-x-20 items-end">
        <div class="w-full xl:w-2/3">
          <div>
            <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">How you can help</h3>
          </div>
          <div class="w-full">
            <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Ut enim ad minim veniam.
            </div>
          </div>
        </div>
        <div class="w-full xl:w-1/3 flex justify-end">
          <button type="button" class="btn btn-secondary text-lg rounded-full px-10 hover:brightness-110 hover:shadow-lg transition duration-300">Talk to us</button>
        </div>
      </div>
      <div class="grid grid-cols-1 gap-3 lg:grid-cols-3 lg:gap-5 mt-12">
        <?php
        $link = '#';
        $text = 'Make a Donation';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Become a Volunteer';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Become a Foster Carer';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Gifts in Will';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Fundraise for Us';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Corporate Partnerships';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_link($link, $text, $image);
        ?>
      </div>
    </div>
  </div>
</section>

<!-- Image + Text -->
<section class="relative">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12 2xl:gap-x-24">
        <div class="xl:w-2/5">
          <div class="aspect-1 rounded-xl overflow-clip">
            <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/banner/catbanner-01.jpg') ?>" alt="">
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

<!--  Text + Image -->
<section class="relative">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12 2xl:gap-x-24">
        <div class="xl:w-2/5 order-2">
          <div class="aspect-1 rounded-xl overflow-clip">
            <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('images/banner/catbanner-01.jpg') ?>" alt="">
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

<!-- Card Slide -->
<?php
$section_id = 'section-cards-' . uniqid();
function card_slide()
{
  echo '<a href="#" class="group block bg-slate-100 rounded-xl overflow-clip transition-all duration-300">';
  echo '<div class="aspect-w-4 aspect-h-5">';
  //echo '<div class="relative">';
  echo '<img src="' . cpsv_asset('/images/banner/catbanner-01.jpg') . '" class="object-cover h-full w-full" />';
  echo '<div class="absolute inset-0 bg-gradient-to-t from-black bg-blend-multiply flex flex-col justify-end">';
  echo '<div class="p-4 xl:p-8 text-white">';
  echo '<h4 class="text-[34px] font-medium">Adopt a cat</h4>';
  echo '<div class="mt-2 text-base font-medium">Adopting a cat with CPSV not only brings a furry companion into your life but also helps support their mission of finding loving homes for feline friends in need.</div>';
  echo '</div>';
  echo '</div>';
  echo '<div class="absolute inset-0 bg-transparent rounded-xl transition-all duration-300 group-hover:shadow-[0_0px_0px_16px_rgba(0,0,0,0.24)_inset]"></div>';
  //echo '</div>';
  echo '</div>';
  echo '</a>';
}
?>
<section class="relative <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container mx-auto max-w-screen-2xl">
      <div class="detect-position h-0 w-0 invisible"></div>
      <div>
        <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Hi, how can we help you today?</h3>
      </div>
      <div class="w-full xl:w-2/3">
        <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
          To help you navigate and find the right information, choose one of the options below.
        </div>
      </div>
    </div>
    <div class="swiper-container relative mt-8 mb-8 xl:mt-16 xl:mb-12">
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide max-w-[418px]">
            <?php echo card_slide() ?>
          </div>
          <div class="swiper-slide max-w-[418px]">
            <?php echo card_slide() ?>
          </div>
          <div class="swiper-slide max-w-[418px]">
            <?php echo card_slide() ?>
          </div>
          <div class="swiper-slide max-w-[418px]">
            <?php echo card_slide() ?>
          </div>
          <div class="swiper-slide max-w-[418px]">
            <?php echo card_slide() ?>
          </div>
          <div class="swiper-slide max-w-[418px]">
            <?php echo card_slide() ?>
          </div>
          <div class="swiper-slide max-w-[328px]">
            <div class="aspect-w-4 aspect-h-5">
              <div class="p-4 bg-transparent rounded-xl"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="absolute inset-0">
        <div class="container max-w-screen-2xl relative h-full">
          <button type="button" class="swiper-btn-prev absolute z-10 left-0 xl:-left-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-16 xl:h-16 flex items-center justify-center text-slate-300 hover:text-brand-tomato transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'arrow-circle-left', 'group' => 'utilities', 'size' => '96', 'class' => 'w-16 h-16')); ?>
          </button>
          <button type="button" class="swiper-btn-next absolute z-10 right-0 xl:-right-32 top-2 lg:top-1/2 -translate-y-1/2 w-9 h-9 xl:w-16 xl:h-16 flex items-center justify-center text-slate-300 hover:text-brand-tomato transition-all duration-200">
            <?php echo cpsv_icon(array('icon' => 'arrow-circle-right', 'group' => 'utilities', 'size' => '96', 'class' => 'w-16 h-16')); ?>
          </button>
        </div>
      </div>
      <div class="absolute -bottom-10 left-0 right-0">
        <div class="container max-w-screen-2xl px-4 xl:px-8">
          <div class="relative">
            <div class="swiper-scrollbar !h-1.5 bg-brand-tomato/20 [&>.swiper-scrollbar-drag]:bg-brand-tomato"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    jQuery(function($) {
      let xPos = $(".<?php echo $section_id ?> .detect-position").offset().left;
      $(".<?php echo $section_id ?> .swiper-container").css("padding-left", xPos);
      new Swiper('.<?php echo $section_id ?> .swiper', {
        slidesPerView: 'auto',
        spaceBetween: 32,
        loop: false,
        watchOverflow: true,
        //centerInsufficientSlides: true,
        scrollbar: {
          el: ".<?php echo $section_id ?> .swiper-scrollbar",
          hide: false,
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
            slidesPerView: 'auto',
            spaceBetween: 30
          }
        }
      });
    });
  </script>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- Adopt -->
<?php
$section_id = 'section-adopt-cats-' . uniqid();
function card_cat()
{
?>
  <a href="#" class="block bg-white rounded-xl overflow-clip transition-all duration-300 hover:shadow-lg">
    <div class="aspect-w-1 aspect-h-1">
      <img src="<?php echo cpsv_asset('/images/banner/catbanner-01.jpg') ?>" class="object-cover h-full w-full" />
    </div>
    <div class="px-4 py-2 xl:px-8 xl:py-4">
      <div class="flex justify-between gap-x-4">
        <div class="text-2xl">Cherrie</div>
        <div class="text-lg text-slate-500">6 Mths</div>
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
      <div class="swiper -mx-4 xl:-mx-6">
        <div class="swiper-wrapper">
          <?php for ($i = 0; $i < 24; $i++) { ?>
            <div class="swiper-slide p-4">
              <?php echo card_cat() ?>
            </div>
          <?php } ?>
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

<!-- Campaign -->
<?php
$section_id = 'section-campaign-' . uniqid();
function card_campaign($link = '#', $text = null, $image = null, $type = null)
{ ?>
  <?php if ($type == 'featured') : ?>
    <div class="card">
      <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
        <div class="aspect-w-16 aspect-h-6">
          <?php if ($image) : ?>
            <img class="featured-image object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
          <?php else : ?>
            <div class="w-full h-full bg-slate-50"></div>
          <?php endif; ?>
        </div>
        <div class="absolute inset-0 bg-gradient-to-l from-black/80 via-transparent bg-blend-multiply"></div>
        <div class="absolute right-4 bottom-4 text-white">
          <?php echo cpsv_icon(array('icon' => 'plus-circle', 'group' => 'utilities', 'size' => '64', 'class' => 'w-16 h-16')); ?>
        </div>
        <div class="absolute inset-0">
          <div class="w-full h-full flex justify-end items-end">
            <div class="w-2/5 px-12 py-8">
              <h4 class="text-3xl leading-tight font-semibold text-white"><?php echo $text ?></h4>
              <div class="text-lg text-white underline mt-24">Read More</div>
            </div>
          </div>
        </div>
      </a>
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
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent bg-blend-multiply"></div>
        <div class="absolute right-4 bottom-4 text-white">
          <?php echo cpsv_icon(array('icon' => 'plus-circle', 'group' => 'utilities', 'size' => '64', 'class' => 'w-16 h-16')); ?>
        </div>
      </a>
      <div class="py-4">
        <h4><a href="<?php echo $link ?>" class="text-2xl leading-tight font-semibold text-brand-dark-blue hover:underline"><?php echo $text ?></a></h4>
      </div>
    </div>
  <?php endif; ?>
<?php } ?>
<section class="relative <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container max-w-screen-2xl">
      <div class="flex gap-x-20 items-end">
        <div class="w-full xl:w-2/3">
          <div>
            <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Our latest campaign</h3>
          </div>
          <div class="w-full">
            <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
              To help you navigate and find the right information, choose one of the options below.
            </div>
          </div>
        </div>
        <div class="w-full xl:w-1/3 flex justify-end">
          <a href="#" class="btn btn-primary btn-outline rounded-full text-base px-16">View all</a>
        </div>
      </div>
    </div>
    <div class="relative container max-w-screen-2xl my-8 xl:my-12">
      <div class="grid grid-cols-3 gap-6">
        <div class="col-span-3">
          <?php
          $link = '#';
          $text = 'Mental Health Benefits of Pet Ownership | Episode 10';
          $image = cpsv_asset('/images/banner/catbanner-01.jpg');
          $type = 'featured';
          echo card_campaign($link, $text, $image, $type);
          ?>
        </div>
        <?php
        $link = '#';
        $text = 'Mental Health Benefits of Pet Ownership | Episode 10';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_campaign($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Mental Health Benefits of Pet Ownership | Episode 10';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_campaign($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Mental Health Benefits of Pet Ownership | Episode 10';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_campaign($link, $text, $image);
        ?>
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
    <img class="object-cover w-full h-full" src="<?php echo cpsv_asset('/images/banner/catbanner-01.jpg') ?>" alt="">
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

<!-- Shop -->
<?php
$section_id = 'section-shop-' . uniqid();
function card_shop($link = '#', $text = null, $description = null, $image = null, $type = null)
{ ?>
  <?php if ($type == 'featured') : ?>
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
              <h4 class="text-4xl leading-tight font-semibold text-white"><?php echo $text ?></h4>
              <?php if ($description) : ?>
                <div class="text-base text-white mt-6"><?php echo $description ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </a>
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
              <h4 class="text-3xl leading-tight font-semibold text-white"><?php echo $text ?></h4>
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
      <div class="grid grid-cols-4 gap-6">
        <div class="col-span-2 row-span-2">
          <?php
          $link = '#';
          $text = 'For your cat';
          $description = 'Product type: Carrier / Health & Protection / Litter Trays & Accessories / Scratchers / Beds / Feeding / Cat Toys / Collars & Harnesses / Food & Treats';
          $image = cpsv_asset('/images/banner/catbanner-01.jpg');
          $type = 'featured';
          echo card_shop($link, $text, $description, $image, $type);
          ?>
        </div>
        <?php
        $link = '#';
        $text = 'For your home';
        $description = '';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_shop($link, $text, $description, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Greeting cards';
        $description = '';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_shop($link, $text, $description, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Gift Certificates';
        $description = '';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_shop($link, $text, $description, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Clothing & Accessories';
        $description = '';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_shop($link, $text, $description, $image);
        ?>
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

<?php get_footer(); ?>