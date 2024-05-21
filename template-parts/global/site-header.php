<?php
$top_navigation = get_field('top_navigation', 'option')['top_navigation'];
$top_links = $top_navigation['top_links'] ?? '';
$social_links = $top_navigation['social_links'] ?? '';
$sign_in_register = $top_navigation['sign_in_register'] ?? '';
?>
<div class="top-header relative z-50 bg-brand-dark-blue py-3 print:hidden">
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
<header class="z-50 print:hidden">
  <div class="main-header">
    <div class="container max-w-screen-5xl">
      <div class="relative xl:flex xl:justify-between">
        <div class="flex items-center xl:w-1/4">
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
            <a href="<?php echo site_url() ?>"><img src="<?php echo $site_logo ?>" alt="<?php echo get_bloginfo('name'); ?>" class="h-16 3xl:h-20 5xl:h-[88px] w-auto"></a>
          </div>
        </div>
        <div class="flex items-start xl:w-3/4 xl:justify-end">
          <?php get_template_part('template-parts/components/megamenu'); ?>
          <div class="flex">
            <a href="make-a-donation" class="bg-brand-tomato text-white flex items-center px-4 py-[26px] 5xl:px-7 5xl:py-8 text-sm 3xl:text-[15px] 4xl:text-base 5xl:text-lg font-bold uppercase leading-tight whitespace-nowrap hover:brightness-110">Donate Now</a>
            <button type="button" class="bg-brand-blue text-white flex items-center px-4 5xl:px-7 py-4 hover:brightness-110">
              <?php echo cpsv_icon(array('icon' => 'search', 'group' => 'utilities', 'size' => '36', 'class' => 'w-6 h-6 5xl:w-9 5xl:h-9 text-white')); ?>
            </button>
            <button type="button" class="bg-brand-yellow text-white hidden items-center px-4 5xl:px-7 py-4 hover:brightness-110">
              <?php echo cpsv_icon(array('icon' => 'cart', 'group' => 'utilities', 'size' => '36', 'class' => 'w-6 h-6 5xl:w-9 5xl:h-9 text-white')); ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>