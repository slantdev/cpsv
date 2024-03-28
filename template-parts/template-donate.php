<?php

/**
 * Template Name: Donate
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
<section class="section-page-header relative -mt-[136px] bg-cover bg-center" style="background-image: url(<?php echo cpsv_asset('images/banner/catbanner-01.jpg') ?>);">
  <div class="bg-brand-light-gray bg-opacity-60 pt-44">
    <div class="container max-w-screen-2xl">
      <div class="flex pt-28 pb-28 items-end">
        <div class="w-full">
          <div class="breadcrumbs mb-6 [&_li]:before:!border-brand-tomato [&_li]:before:!opacity-100 last:[&_ul>li]:font-bold">
            <ul>
              <li><a>Home</a></li>
              <li><a>Support Us</a></li>
              <li>Make a donation</li>
            </ul>
          </div>
          <h2 class="text-[64px] leading-[1.1em] text-brand-dark-blue font-semibold">Make a donation</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="h-[60px]"></div>
</section>

<!--  Text + Image -->
<section class="relative -mt-[220px]">
  <div class="relative pt-12 lg:pt-0 xl:pt-0 pb-12 lg:pb-20 xl:pb-36">
    <div class="container mx-auto max-w-screen-2xl">
      <div class="relative z-10 flex flex-col xl:flex-row xl:gap-x-12 2xl:gap-x-24 xl:items-end">
        <div class="xl:w-1/2 order-1">
          <div class="prose font-medium xl:prose-lg prose-lead:xl:text-2xl prose-lead:font-normal max-w-none">
            <p class="lead">Your donation will help us promote, protect and improve the welfare of cats through shelter and clinical services, as well as public awareness and education.</p>
            <p>As a not-for-profit, our Society relies entirely on the kindness of donations, legacies and memberships for our day-to-day existence. We receive no government funding.</p>
            <p>We’ve been committed to working with the community for over 70 years to ensure that every cat has the opportunity for a loving, safe and healthy home. Your donation makes all this possible.</p>
            <p>Thank you for your kind support. We couldn’t do it without you.</p>
          </div>
        </div>
        <div class="xl:w-1/2 order-2">
          <div class="donation-box rounded-2xl overflow-clip pb-6 bg-brand-blue">
            <div class="bg-brand-blue py-10 px-10">
              <h3 class="text-5xl leading-tight text-white font-semibold">Donation Details</h3>
            </div>
            <div class="bg-brand-light-gray rounded-b-2xl">
              <div class="p-10">
                <div class="prose xl:prose-lg prose-p:text-black max-w-none font-medium">
                  <p><strong>How much do you want to donate</strong></p>
                  <p>All donations directly impact our organisation and help us further our mission.</p>
                  <div class="my-6 bg-gradient-to-r from-slate-500 from-20% to-transparent to-0% bg-bottom bg-[length:10px_2px] bg-repeat-x h-1"></div>
                </div>
                <div class="pt-6">
                  <h4 class="text-lg font-bold mb-4">Choose your donation frequency</h4>
                  <div>
                    <div class="join w-full rounded-full bg-white">
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="One time" checked />
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="Weekly" />
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="Monthly" />
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="frequency" aria-label="Quarterly" />
                    </div>
                  </div>
                  <div class="my-6 bg-gradient-to-r from-slate-500 from-20% to-transparent to-0% bg-bottom bg-[length:10px_2px] bg-repeat-x h-1"></div>
                  <h4 class="text-lg font-bold mb-4">Select an amount to donate</h4>
                  <div>
                    <div class="join w-full rounded-full bg-white">
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$25" />
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$50" checked />
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$75" />
                      <input class="join-item btn bg-transparent shadow-none !rounded-full hover:bg-transparent grow border-none checked:bg-none checked:!bg-brand-blue focus:outline-0" type="radio" name="amount" aria-label="$100" />
                    </div>
                  </div>
                  <input class="input w-full rounded-full mt-6" type="text" placeholder="Enter custom amount">
                  <div class="my-6 bg-gradient-to-r from-slate-500 from-20% to-transparent to-0% bg-bottom bg-[length:10px_2px] bg-repeat-x h-1"></div>
                  <a href="#" class="btn btn-secondary rounded-full text-xl leading-tight px-10 h-auto">Continue</a>
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

<!-- Articles -->
<?php
$section_id = 'section-articles-' . uniqid();
function card_donate($link = '#', $text = null, $excerpt = null, $image = null, $button = null)
{ ?>
  <div class="card group relative bg-white shadow-lg rounded-xl overflow-clip hover:shadow-xl transition-all duration-300">
    <div class="aspect-w-16 aspect-h-9">
      <div class="w-full h-full overflow-clip">
        <?php if ($image) : ?>
          <img class="object-cover w-full h-full transition-all duration-300" src="<?php echo $image ?>" alt="">
        <?php else : ?>
          <div class="w-full h-full bg-slate-50"></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="pt-8 px-8 pb-8 w-full h-full flex flex-col">
      <h4 class="text-2xl leading-tight font-semibold text-brand-dark-blue"><?php echo $text ?></h4>
      <div class="my-6 prose"><?php echo $excerpt ?></div>
      <?php if ($button) : ?>
        <div class="mt-6"><a href="<?php echo $link ?>" class="btn btn-secondary rounded-full text-xl leading-tight px-10 h-auto"><?php echo $button ?></a></div>
      <?php endif; ?>
    </div>
  </div>
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
            <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Donation Options</h3>
          </div>
          <div class="w-full">
            <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="relative container max-w-screen-2xl my-8 xl:my-12">
      <div class="grid grid-cols-3 gap-6">
        <?php
        $link = '#';
        $text = 'Donate online';
        $excerpt = '<p>Donate using your credit card or debit card.</p>
        <p>Your tax-deductible receipt will be emailed to you once your donation is processed.</p>';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        $button = 'Donate now';
        echo card_donate($link, $text, $excerpt, $image, $button);
        ?>
        <?php
        $link = '#';
        $text = 'Donate by post';
        $excerpt = '<p>To make a cheque donation, please make the cheque payable to The Cat Protection Society of Victoria and mail to:</p>
        <p><strong>The Cat Protection Society of Victoria<br/>
        200 Elder Street, Greensborough<br/>
        VIC 3088</strong></p>
        <p>And include a note with your return mail address or email address. Your tax-deductible receipt will be emailed or posted to you.</p>';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_donate($link, $text, $excerpt, $image);
        ?>
        <?php
        $link = '#';
        $text = 'Donate over the phone';
        $excerpt = '<p>Please call us 03 8457 6500 to make a credit card donation over the phone between 10am-4pm Monday to Friday.</p>
        <p>Your tax-deductible receipt will be emailed or posted to you.</p>';
        $image = cpsv_asset('/images/banner/catbanner-01.jpg');
        echo card_donate($link, $text, $excerpt, $image);
        ?>
      </div>
    </div>
  </div>
  <?php if ($bottom_separator) : ?>
    <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>