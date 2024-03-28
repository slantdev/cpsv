<?php

/**
 * Template Name: Articles
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
<section class="section-page-header relative -mt-[136px] bg-cover bg-[50%_30%]" style="background-image: url(<?php echo site_url() . '/wp-content/uploads/2024/03/1543793.jpg' ?>);">
  <div class="bg-brand-light-gray bg-opacity-60 pt-44">
    <div class="container max-w-screen-2xl">
      <div class="flex pt-28 pb-20 items-end">
        <div class="w-full">
          <div class="breadcrumbs mb-6 [&_li]:before:!border-brand-tomato [&_li]:before:!opacity-100 last:[&_ul>li]:font-bold">
            <ul>
              <li><a>Home</a></li>
              <li>Foster Care</li>
            </ul>
          </div>
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Cat care & advice</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<!-- Articles -->
<?php
$top_separator = false;
$bottom_separator = true;
$section_id = 'section-articles-' . uniqid();

function card_article($link = '#', $text = null, $excerpt = null, $image = null)
{ ?>
  <div class="card group relative bg-white shadow-lg rounded-xl overflow-clip hover:shadow-xl transition-all duration-300">
    <div class="aspect-w-16 aspect-h-9">
      <a href="<?php echo $link ?>" class="w-full h-full overflow-clip">
        <?php if ($image) : ?>
          <img class="object-cover w-full h-full transition-all duration-300" src="<?php echo $image ?>" alt="" />
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
        $image = site_url() . '/wp-content/uploads/2024/03/542502.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Should you invest in Pet Insurance?';
        $excerpt = 'Nearly two thirds of Australian households own a pet and according to research by Finder in 2018 they spend a collective $1.3 billion annually at the vet. Yet only six per cent of them invest in pet insurance.';
        $image = site_url() . '/wp-content/uploads/2024/03/545560.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'The popular floral toxin that can be harmful to cats';
        $excerpt = 'Wondering if you’ll lose your Disability Support Pension (DSP) if you start working? Want to find a job but not sure how many hours you can work and still receive the full DSP.?';
        $image = site_url() . '/wp-content/uploads/2024/03/599492.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'New Year Cat Checklist';
        $excerpt = 'With the goal that every Victorian cat has the opportunity to be happy, healthy and feel safe and loved in the year ahead, our team at The Cat Protection Society of Victoria have put together our “New Year Cat Checklist” to kick start 2024 in the most feline friendly way possible';
        $image = site_url() . '/wp-content/uploads/2024/03/617278.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Should you invest in Pet Insurance?';
        $excerpt = 'Nearly two thirds of Australian households own a pet and according to research by Finder in 2018 they spend a collective $1.3 billion annually at the vet. Yet only six per cent of them invest in pet insurance.';
        $image = site_url() . '/wp-content/uploads/2024/03/747795.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'The popular floral toxin that can be harmful to cats';
        $excerpt = 'Wondering if you’ll lose your Disability Support Pension (DSP) if you start working? Want to find a job but not sure how many hours you can work and still receive the full DSP.?';
        $image = site_url() . '/wp-content/uploads/2024/03/794590.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'New Year Cat Checklist';
        $excerpt = 'With the goal that every Victorian cat has the opportunity to be happy, healthy and feel safe and loved in the year ahead, our team at The Cat Protection Society of Victoria have put together our “New Year Cat Checklist” to kick start 2024 in the most feline friendly way possible';
        $image = site_url() . '/wp-content/uploads/2024/03/951336.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Should you invest in Pet Insurance?';
        $excerpt = 'Nearly two thirds of Australian households own a pet and according to research by Finder in 2018 they spend a collective $1.3 billion annually at the vet. Yet only six per cent of them invest in pet insurance.';
        $image = site_url() . '/wp-content/uploads/2024/03/979278.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'The popular floral toxin that can be harmful to cats';
        $excerpt = 'Wondering if you’ll lose your Disability Support Pension (DSP) if you start working? Want to find a job but not sure how many hours you can work and still receive the full DSP.?';
        $image = site_url() . '/wp-content/uploads/2024/03/1038914.jpg';
        echo card_article($link, $text, $excerpt, $image);
        ?>
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
        <h3 class="mb-4 text-brand-tomato font-semibold text-5xl -tracking-[0.0125em] leading-tight">Frequently asked questions</h3>
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