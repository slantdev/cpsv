<?php

/**
 * Template Name: Vet
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
<section class="section-page-header relative -mt-[136px] bg-cover bg-center" style="background-image: url(<?php echo site_url() . '/wp-content/uploads/2024/03/2355519.jpg' ?>);">
  <div class="bg-brand-light-gray bg-opacity-60 pt-44">
    <div class="container max-w-screen-2xl">
      <div class="flex pt-28 pb-20 items-end">
        <div class="w-full">
          <div class="breadcrumbs mb-6 [&_li]:before:!border-brand-tomato [&_li]:before:!opacity-100 last:[&_ul>li]:font-bold">
            <ul>
              <li><a>Home</a></li>
              <li>Vet Clinic</li>
            </ul>
          </div>
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Vet Clinic</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<!-- Image + Text -->
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
        <div class="xl:w-2/5">
          <div class="aspect-1 rounded-xl overflow-clip">
            <img class="object-cover w-full h-full" src="<?php echo site_url() . '/wp-content/uploads/2024/03/794590.jpg' ?>" alt="">
          </div>
        </div>
        <div class="xl:w-3/5">
          <h3 class="text-brand-teal font-semibold text-5xl leading-tight mb-6">Internationally recognized Cat Friendly Clinic</h3>
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none">
            <p class="lead">The Cat Protection Society of Victoria aim to provide a second chance at love, health and happiness to the thousands of stray and abandoned cats and kittens that seek refuge at our Shelter every year.</p>
            <p>Every cat and kitten adopted from our Society has been behaviourally assessed, desexed, microchipped, vaccinated and treated for worms and fleas and comes with 2 weeks health cover for additional peace of mind (conditions apply).</p>

            <p>To meet the cats and kittens available for adoption, visit our Adoption Shelter during our opening hours. During Winter and Spring, there is no need to make an appointment.</p>

            <p>From 1st December 2023- 31st January 2024 appointments are strongly recommended, with customers who have completed an adoption application form and booked a meet and greet appointment given priority access to our adoption shelter.</p>
            <p><em>Please note, our website features only some of the cats and kittens available for adoption. You will have the opportunity to meet all of the cats and kittens available during your visit.</em></p>
          </div>
          <div class="mt-16 flex gap-x-4">
            <a href="#" class="btn bg-brand-teal text-white rounded-full text-xl leading-tight px-10 h-auto">Our Services</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<!-- What We Do -->
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
<section class="relative bg-brand-teal <?php echo $section_id ?>">
  <?php if ($top_separator) : ?>
    <div class="absolute h-12 w-px top-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $top_separator_style ?>"></div>
  <?php endif; ?>
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="intro-container relative container max-w-screen-2xl">
      <div class="flex gap-x-20 items-end">
        <div class="w-full xl:w-2/3">
          <div>
            <h3 class="mb-4 text-white font-semibold text-5xl -tracking-[0.0125em] leading-tight">What we do</h3>
          </div>
          <div class="w-full">
            <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium text-white">
              Our cat exclusive Veterinary Clinic offers a full range of services in our state-of-the-art facility including:
            </div>
          </div>
        </div>
        <div class="w-full xl:w-1/3 flex justify-end">
          <!-- <select class="select bg-white rounded-none border-t-0 border-x-0 border-b border-slate-500 text-lg font-semibold pl-0 w-full max-w-xs focus:outline-0">
            <option disabled selected>Filter</option>
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
            <option>Option 4</option>
            <option>Option 5</option>
          </select> -->
        </div>
      </div>
    </div>
    <div class="relative container max-w-screen-2xl my-8 xl:my-12">
      <div class="grid grid-cols-3 gap-6">
        <?php
        $link = '#';
        $text = 'Preventative Care';
        $excerpt = 'Aside from preventing accidental litters of kittens, there are many health and behavioural benefits to desexing your companion animal';
        $image = site_url() . '/wp-content/uploads/2024/03/2942325.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Medical care';
        $excerpt = 'Our comprehensive medical care for cats includes essential services such as desexing procedures, dentistry, X-rays, blood tests, and soft tissue surgery, ensuring their overall well-being.';
        $image = site_url() . '/wp-content/uploads/2024/03/2814000.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Wellbeing services';
        $excerpt = 'Our well-being services for cats encompass grooming under sedation and behavioral consultations, ensuring their physical and emotional health is nurtured.';
        $image = site_url() . '/wp-content/uploads/2024/03/2558605.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
      </div>
    </div>
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