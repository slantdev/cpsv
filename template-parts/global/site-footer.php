<?php

$site_logo = get_stylesheet_directory_uri() . '/assets/images/logo/logo-cpsv.svg';

?>

<!-- Subscribe -->
<?php
$section_id = 'section-subscribe-' . uniqid();
?>
<section class="relative bg-brand-blue <?php echo $section_id ?>">
  <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
    <div class="relative container mx-auto max-w-screen-xl">
      <div class="text-center text-white max-w-prose mx-auto">
        <h3 class="mb-4 font-semibold text-4xl -tracking-[0.0125em] leading-tight">Subscribe to our Newsletter</h3>
        <div class="mt-4 text-xl">We’d love to keep in touch. Stay up to date with CPSV</div>
      </div>
    </div>
    <div class="relative container mx-auto max-w-screen-xl mt-16">
      <div class="flex gap-x-6">
        <div class="grow">
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text text-white">First Name</span>
            </div>
            <input type="text" placeholder="" class="input bg-white w-full rounded-full" />
          </label>
        </div>
        <div class="grow">
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text text-white">Last Name</span>
            </div>
            <input type="text" placeholder="" class="input bg-white w-full rounded-full" />
          </label>
        </div>
        <div class="grow">
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text text-white">Email Address</span>
            </div>
            <input type="text" placeholder="" class="input bg-white w-full rounded-full" />
          </label>
        </div>
        <div class="flex-none">
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text text-white">&nbsp;</span>
            </div>
            <button type="button" class="btn btn-primary text-lg rounded-full px-16 hover:brightness-110 hover:shadow-lg transition duration-300">Submit</button>
          </label>

        </div>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="bg-white py-24">
    <div class="container max-w-screen-2xl">
      <div class="flex gap-x-20 items-center pb-12 border-b border-slate-300">
        <div class="w-1/2">
          <div class="site-logo">
            <a href="<?php echo site_url() ?>"><img src="<?php echo $site_logo ?>" alt="<?php echo get_bloginfo('name'); ?>" class="h-20 xl:h-[128px] w-auto"></a>
          </div>
        </div>
        <div class="w-1/2">
          <div class="text-2xl">
            <strong>75 Years of Unwavering Love</strong> - Ensuring every Cat finds a loving, safe & healthy home.
          </div>
        </div>
      </div>
    </div>
    <div class="container max-w-screen-2xl pt-12">
      <div class="flex gap-x-20">
        <div class="w-1/2 flex flex-col">
          <div class="leading-loose max-w-[42ch]">
            We acknowledge Aboriginal and Torres Strait Islander people as the traditional custodians of this land and pay our respects to their history, their living culture and to Elders past and present.
          </div>
          <div class="flex gap-x-4 mt-auto">
            <img src="<?php echo cpsv_asset('/images/content/flag-1.png') ?>" class="h-[48px] w-auto" />
            <img src="<?php echo cpsv_asset('/images/content/flag-2.png') ?>" class="h-[48px] w-auto" />
            <img src="<?php echo cpsv_asset('/images/content/flag-3.png') ?>" class="h-[48px] w-auto" />
          </div>
        </div>
        <div class="w-1/2">
          <div class="flex gap-x-10">
            <div class="w-1/3">
              <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
              <ul class="flex flex-col gap-y-3">
                <li><a href="#" class="hover:underline">Adopt a Cat</a></li>
                <li><a href="#" class="hover:underline">Foster Care</a></li>
                <li><a href="#" class="hover:underline">Vet Clinic</a></li>
                <li><a href="#" class="hover:underline">Support us</a></li>
                <li><a href="#" class="hover:underline">Help & Advice</a></li>
                <li><a href="#" class="hover:underline">Shop</a></li>
              </ul>
            </div>
            <div class="w-1/3">
              <h4 class="text-lg font-semibold mb-4">About Us</h4>
              <ul class="flex flex-col gap-y-3">
                <li><a href="#" class="hover:underline">Our Vision</a></li>
                <li><a href="#" class="hover:underline">Our History</a></li>
                <li><a href="#" class="hover:underline">Meet The Board</a></li>
                <li><a href="#" class="hover:underline">Annual Reports</a></li>
              </ul>
            </div>
            <div class="w-1/3">
              <h4 class="text-lg font-semibold mb-4">Get in Touch</h4>
              <ul class="flex flex-col gap-y-3">
                <li><a href="#" class="hover:underline">Contact Us</a></li>
                <li><a href="#" class="hover:underline">Subscribe</a></li>
                <li><a href="#" class="hover:underline">Book an Appointment with Adoption Shelter</a></li>
                <li><a href="#" class="hover:underline">Book an Appointment with Vet Clinic</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-brand-light-gray py-4">
    <div class="container max-w-screen-2xl">
      <div class="flex gap-x-20">
        <div class="w-1/2">
          <span class="text-sm">@2023 Cat Protection Society Victoria</span>
        </div>
        <div class="w-1/2">
          <div class="flex justify-between">
            <div class="flex gap-x-8 text-sm">
              <a href="#" class="text-sm hover:underline">Terms and Conditions</a>
              <a href="#" class="text-sm hover:underline">Privacy Policy</a>
              <a href="#" class="text-sm hover:underline">Sitemap</a>
            </div>
            <ul class="social-link flex gap-x-1 px-6">
              <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-brand-blue')); ?></a></li>
              <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'instagram', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-brand-blue')); ?></a></li>
              <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'tiktok', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-brand-blue')); ?></a></li>
              <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-brand-blue')); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>