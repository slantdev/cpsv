<?php

/**
 * Template Name: Support
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
<section class="section-page-header relative -mt-[136px] bg-cover bg-center" style="background-image: url(<?php echo site_url() . '/wp-content/uploads/2024/03/2942325.jpg' ?>);">
  <div class="bg-brand-light-gray bg-opacity-60 pt-44">
    <div class="container max-w-screen-2xl">
      <div class="flex pt-28 pb-20 items-end">
        <div class="w-full">
          <div class="breadcrumbs mb-6 [&_li]:before:!border-brand-tomato [&_li]:before:!opacity-100 last:[&_ul>li]:font-bold">
            <ul>
              <li><a>Home</a></li>
              <li>Support Us</li>
            </ul>
          </div>
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Support Us</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<!-- Image + Text -->
<?php
$top_separator = false;
$bottom_separator = true;
?>
<section class="relative bg-brand-light-gray">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12 2xl:gap-x-24">
        <div class="xl:w-2/5">
          <h3 class="text-brand-dark-blue font-semibold text-4xl leading-tight mb-6">The Cat Protection Society of Victoria is dedicated to making a positive impact in the lives of countless abandoned and forgotten cats each year.</h3>
        </div>
        <div class="xl:w-3/5">
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none">
            <p class="lead">Our mission is to provide a safe haven for these feline friends, offering them the love, care, and opportunity for a new forever home that they so rightfully deserve. As a non-profit organization, we do not receive ongoing government funding, which means that our ability to carry out this vital work hinges on the generous support of individuals like you.</p>
            <p>Every cat and kitten adopted from our Society has been behaviourally assessed, desexed, microchipped, vaccinated and treated for worms and fleas and comes with 2 weeks health cover for additional peace of mind (conditions apply).</p>

            <p>To meet the cats and kittens available for adoption, visit our Adoption Shelter during our opening hours. During Winter and Spring, there is no need to make an appointment.</p>

            <p>From 1st December 2023- 31st January 2024 appointments are strongly recommended, with customers who have completed an adoption application form and booked a meet and greet appointment given priority access to our adoption shelter.</p>
            <p><em>Please note, our website features only some of the cats and kittens available for adoption. You will have the opportunity to meet all of the cats and kittens available during your visit.</em></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- Card Link -->
<?php
$top_separator = true;
$bottom_separator = true;
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
        $image = site_url() . '/wp-content/uploads/2024/03/2814000.jpg';
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Become a Volunteer';
        $image = site_url() . '/wp-content/uploads/2024/03/2355519.jpg';
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Become a Foster Carer';
        $image = site_url() . '/wp-content/uploads/2024/03/2031419.jpg';
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Gifts in Will';
        $image = site_url() . '/wp-content/uploads/2024/03/1900747.jpg';
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Fundraise for Us';
        $image = site_url() . '/wp-content/uploads/2024/03/1828874.jpg';
        echo card_link($link, $text, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Corporate Partnerships';
        $image = site_url() . '/wp-content/uploads/2024/03/1825999.jpg';
        echo card_link($link, $text, $image);
        ?>
      </div>
    </div>
  </div>
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