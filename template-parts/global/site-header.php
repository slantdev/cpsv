<?php
$top_navigation = get_field('top_navigation', 'option')['top_navigation'];
$top_links = $top_navigation['top_links'] ?? '';
$social_links = $top_navigation['social_links'] ?? '';
$sign_in_register = $top_navigation['sign_in_register'] ?? '';
$donate_button = $top_navigation['donate_button'] ?? '';
?>
<div class="top-header hidden lg:block relative z-50 bg-brand-dark-blue py-3 print:hidden">
  <div class="container max-w-screen-5xl">
    <div class="flex items-center justify-end">
      <?php if ($top_links) : ?>
        <ul class="top-nav flex gap-x-6 text-sm 4xl:text-base leading-tight">
          <?php
          foreach ($top_links as $link) :
            $link_url = $link['link']['url'] ?? '';
            $link_title = $link['link']['title'] ?? '';
            $link_target = $link['link']['target'] ?? '_self';
          ?>
            <?php if ($link_url) : ?>
              <li><a href="<?php echo $link_url ?>" target="<?php echo $link_target ?>" class="text-white font-medium hover:opacity-75"><?php echo $link_title ?></a></li>
            <?php endif; ?>
          <?php endforeach ?>
        </ul>
      <?php endif; ?>
      <?php if ($social_links) : ?>
        <ul class="social-link flex gap-x-1 px-6">
          <?php
          foreach ($social_links as $link) :
            $social_media_link = $link['social_media_link'] ?? '';
            $social_media_icon = $link['social_media_icon'] ?? '';
          ?>
            <li><a href="<?php echo $social_media_link ?>" target="_blank" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => $social_media_icon, 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-white')); ?></a></li>
          <?php endforeach ?>
        </ul>
      <?php endif; ?>
      <?php
      $sign_in_register_url = $sign_in_register['url'] ?? '';
      $sign_in_register_title = $sign_in_register['title'] ?? '';
      $sign_in_register_target = $sign_in_register['target'] ?? '_self';
      if ($sign_in_register_url) :
      ?>
        <div class="pl-6 border-l border-white border-solid hidden">
          <a href="<?php echo $sign_in_register_url ?>" target="<?php echo $sign_in_register_target ?>" class="flex items-center gap-x-2 text-sm 4xl:text-base leading-tight text-white font-medium hover:opacity-75">
            <div>
              <?php echo cpsv_icon(array('icon' => 'account', 'group' => 'utilities', 'size' => '24', 'class' => 'w-6 h-6 text-white')); ?>
            </div>
            <div><?php echo $sign_in_register_title ?></div>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php
$header_logo = get_field('header_logo', 'option');
$site_logo = $header_logo['site_logo']['url'] ?? get_stylesheet_directory_uri() . '/assets/images/logo/logo-cpsv.svg';
//preint_r($header_logo);
?>
<header class="fixed z-50 w-full top-0 left-0 bg-white xl:bg-transparent xl:static print:hidden">
  <div class="main-header">
    <div class="container max-w-screen-5xl">
      <div class="relative xl:flex xl:justify-between">
        <div class="flex justify-between items-center xl:justify-normal xl:w-1/4">
          <div class="site-logo py-3 xl:py-6">
            <a href="<?php echo site_url() ?>"><img src="<?php echo $site_logo ?>" alt="<?php echo get_bloginfo('name'); ?>" class="!h-12 xl:!h-16 3xl:!h-20 5xl:!h-[88px] !w-auto"></a>
          </div>
          <button type="button" aria-label="Toggle navigation" id="primary-menu-toggle" class="menu-open-btn xl:hidden">
            <svg viewBox="0 0 20 20" class="inline-block w-5 h-5" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                <g id="icon-shape">
                  <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
                </g>
              </g>
            </svg>
          </button>
        </div>
        <div class="flex items-start xl:w-3/4 xl:justify-end">
          <?php get_template_part('template-parts/components/megamenu'); ?>
          <div class="header-buttons relative hidden lg:flex">
            <?php
            if ($donate_button) :
              $donate_url = $donate_button['url'] ?? '#';
              $donate_title = $donate_button['title'] ?? 'Donate Now';
              $donate_target = $donate_button['target'] ?? '_self';
            ?>
              <a href="<?php echo $donate_url; ?>" target="<?php echo $donate_target; ?>" class="bg-brand-tomato text-white flex items-center px-4 py-[26px] 5xl:px-7 5xl:py-8 text-sm 3xl:text-[15px] 4xl:text-base 5xl:text-lg font-bold uppercase leading-tight whitespace-nowrap hover:brightness-110"><?php echo $donate_title; ?></a>
            <?php endif; ?>
            <button type="button" class="menu-search-btn bg-brand-blue text-white flex items-center px-4 5xl:px-7 py-4 hover:brightness-110">
              <?php echo cpsv_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '36', 'class' => 'w-6 h-6 5xl:w-9 5xl:h-9 text-white')); ?>
            </button>
            <button type="button" class="bg-brand-yellow text-white items-center px-4 5xl:px-7 py-4 hover:brightness-110 hidden">
              <?php echo cpsv_icon(array('icon' => 'cart', 'group' => 'utilities', 'size' => '36', 'class' => 'w-6 h-6 5xl:w-9 5xl:h-9 text-white')); ?>
            </button>
            <div id="search-form-container" class="absolute bg-brand-light-gray">
              <div class="px-4 py-4 flex items-center w-full h-full">
                <div class="flex w-full gap-x-4 items-center">
                  <form id="header-searchform" class="relative grow" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input id="header-searchform-input" type="text" class="w-full border-gray-300 shadow-inner !rounded-full bg-white !px-6 !py-2.5 2xl:!py-3 focus:border-brand-blue focus:ring-brand-blue" name="s" placeholder="Search" value="">
                    <button type="submit" class="absolute right-4 top-3">
                      <?php echo cpsv_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '24', 'class' => 'text-brand-sea w-5 h-5 2xl:w-6 2xl:h-6')); ?>
                    </button>
                  </form>
                  <div class="flex-none">
                    <button id="close-searchform">
                      <?php echo cpsv_icon(array('icon' => 'close', 'group' => 'utilities', 'size' => '24', 'class' => 'w-6 h-6 text-brand-purple')); ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="menu-overlay"></div>
</header>