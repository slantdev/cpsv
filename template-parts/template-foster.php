<?php

/**
 * Template Name: Foster
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
<section class="section-page-header relative -mt-[136px] bg-cover bg-center" style="background-image: url(<?php echo site_url() . '/wp-content/uploads/2024/03/1644602.jpg' ?>);">
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
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Foster Care</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<!-- Foster -->
<?php
$top_separator = false;
$bottom_separator = true;
$section_id = 'section-foster-cats-' . uniqid();
function card_foster($args)
{
  //preint_r($args);
  $name = isset($args['name']) ? $args['name'] : '';
  $description = isset($args['description']) ? $args['description'] : '1 yr old female domestic short hair';
  $image = isset($args['image']) ? $args['image'] : cpsv_asset('/images/banner/catbanner-01.jpg');
  $link = isset($args['link']) ? $args['link'] : '#';
?>
  <a href="<?php echo $link ?>" class="block bg-white rounded-xl overflow-clip transition-all duration-300 hover:shadow-lg">
    <div class="aspect-w-1 aspect-h-1">
      <img src="<?php echo $image ?>" class="object-cover h-full w-full" />
    </div>
    <div class="px-4 py-2 xl:px-12 xl:py-4">
      <div class="flex flex-col text-center">
        <div class="text-3xl text-center font-semibold text-brand-tomato"><?php echo $name ?></div>
        <div class="text-base leading-snug text-slate-500 mt-2"><?php echo $description ?></div>
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
      <div class="grid grid-cols-4 gap-8">
        <?php foreach ($content as $cat) : ?>
          <?php echo card_foster($cat) ?>
        <?php endforeach; ?>
      </div>
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
            <img class="object-cover w-full h-full" src="<?php echo site_url() . '/wp-content/uploads/2024/03/1644602.jpg' ?>" alt="">
          </div>
          <div class="mt-10 flex gap-x-4">
            <a href="#" class="btn bg-brand-tomato border-brand-tomato text-white rounded-full text-xl leading-tight px-10 h-auto">Adopt a cat</a>
          </div>
        </div>
        <div class="xl:w-3/5 order-1">
          <h3 class="text-brand-tomato font-semibold text-5xl leading-tight mb-6">How to get started?</h3>
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none mb-10">
            <p class="lead">The Cat Protection Society of Victoria aim to provide a second chance at love, health and happiness to the thousands of stray and abandoned cats and kittens that seek refuge at our Shelter every year.</p>
          </div>
          <div class="component-numbered-list relative">
            <div class="relative flex flex-col">
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-tomato flex items-center justify-center text-4xl font-bold text-white">01</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-tomato"></div>
                </div>
                <div class="prose xl:prose-lg font-medium max-w-none pb-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-tomato flex items-center justify-center text-4xl font-bold text-white">02</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-tomato"></div>
                </div>
                <div class="prose xl:prose-lg font-medium max-w-none pb-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-tomato flex items-center justify-center text-4xl font-bold text-white">03</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-tomato"></div>
                </div>
                <div class="prose xl:prose-lg font-medium max-w-none pb-10">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
              </div>
              <div class="flex gap-x-10">
                <div class="flex-none relative">
                  <div class="w-24 h-24 rounded-full bg-brand-tomato flex items-center justify-center text-4xl font-bold text-white">04</div>
                  <div class="absolute -z-10 top-0 left-12 bottom-0 border-l border-brand-tomato hidden"></div>
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