<?php

$site_logo = get_stylesheet_directory_uri() . '/assets/images/logo/logo-cpsv.svg';

?>
<div class="top-header bg-brand-dark-blue py-3">
  <div class="container max-w-screen-5xl">
    <div class="flex justify-end">
      <ul class="top-nav flex gap-x-6">
        <li><a href="#" class="text-white font-medium hover:opacity-75">About Us</a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75">What we do</a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75">What’s on</a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75">News & Media</a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75">Careers</a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75">Contact us</a></li>
      </ul>
      <ul class="social-link flex gap-x-1 px-6">
        <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'facebook', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-white')); ?></a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'instagram', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-white')); ?></a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'tiktok', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-white')); ?></a></li>
        <li><a href="#" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => 'linkedin', 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-white')); ?></a></li>
      </ul>
      <div class="pl-6 border-l border-white border-solid">
        <button type="button" class="flex items-center gap-x-2 text-white font-medium hover:opacity-75">
          <div>
            <?php echo cpsv_icon(array('icon' => 'account', 'group' => 'utilities', 'size' => '24', 'class' => 'w-6 h-6 text-white')); ?>
          </div>
          <div>Sign in / Register</div>
        </button>
      </div>
    </div>
  </div>
</div>
<header class="z-50">
  <div class="main-header">
    <div class="container max-w-screen-5xl">
      <div class="xl:flex xl:justify-between">
        <div class="flex items-center">
          <button type="button" aria-label="Toggle navigation" id="primary-menu-toggle" class="xl:hidden">
            <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                <g id="icon-shape">
                  <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                </g>
              </g>
            </svg>
          </button>
          <div class="site-logo py-4 xl:py-6">
            <a href="<?php echo site_url() ?>"><img src="<?php echo $site_logo ?>" alt="<?php echo get_bloginfo('name'); ?>" class="h-20 xl:h-[88px] w-auto"></a>
          </div>
        </div>
        <div class="flex items-start">
          <div class="bg-white px-8 py-8">
            <ul class="main-nav flex items-center gap-x-10">
              <li><a href="/adopt-a-cat" class="text-lg font-medium text-brand-dark-blue">ADOPT A CAT</a></li>
              <li><a href="/foster-care" class="text-lg font-medium text-brand-dark-blue">FOSTER CARE</a></li>
              <li><a href="/vet-clinic" class="text-lg font-medium text-brand-dark-blue">VET CLINIC</a></li>
              <li><a href="/support-us" class="text-lg font-medium text-brand-dark-blue">SUPPORT US</a></li>
              <li><a href="/help-advice" class="text-lg font-medium text-brand-dark-blue">HELP & ADVICE</a></li>
              <li><a href="/shop" class="text-lg font-medium text-brand-dark-blue">SHOP</a></li>
            </ul>
          </div>
          <div class="flex">
            <a href="make-a-donation" class="bg-brand-tomato text-white flex items-center px-7 py-8 text-lg font-bold uppercase hover:brightness-110">Donate Now</a>
            <button type="button" class="bg-brand-blue text-white flex items-center px-7 py-4 hover:brightness-110">
              <?php echo cpsv_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '36', 'class' => 'w-9 h-9 text-white')); ?>
            </button>
            <button type="button" class="bg-brand-yellow text-white flex items-center px-7 py-4 hover:brightness-110">
              <?php echo cpsv_icon(array('icon' => 'cart', 'group' => 'utilities', 'size' => '36', 'class' => 'w-9 h-9 text-white')); ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>