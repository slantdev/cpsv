<?php

$site_logo = get_stylesheet_directory_uri() . '/assets/images/logo/logo-cpsv.svg';
$about = get_field('about', 'option');
$logo = $about['logo'] ?? '';
$slogan = $about['slogan'] ?? '';
$address = $about['address'] ?? '';
$phone = $about['phone'] ?? '';
$email = $about['email'] ?? '';

$acknowledgement = get_field('acknowledgement', 'option');
$acknowledgement_flags = $acknowledgement['flags'] ?? ''; // Gallery
$acknowledgement_text = $acknowledgement['acknowledgement_text'] ?? '';

$quick_links = get_field('quick_links', 'option');
$quick_links_heading = $quick_links['heading'] ?? '';
$quick_links_links = $quick_links['links'] ?? ''; // Repeater

$about_us = get_field('about_us', 'option');
$about_us_heading = $about_us['heading'] ?? '';
$about_us_links = $about_us['links'] ?? ''; // Repeater

$get_in_touch = get_field('get_in_touch', 'option');
$get_in_touch_heading = $get_in_touch['heading'] ?? '';
$get_in_touch_links = $get_in_touch['links'] ?? ''; // Repeater

$copyright_info = get_field('copyright_info', 'option');
$copyright_site_name = $copyright_info['copyright_site_name'] ?? '';
$copyright_links = $copyright_info['copyright_links'] ?? '';

$top_navigation = get_field('top_navigation', 'option')['top_navigation'];
$social_links = $top_navigation['social_links'] ?? '';

$subscribe = get_field('subscribe', 'option')['subscribe'] ?? '';
$subscribe_heading = $subscribe['heading'] ?? '';
$subscribe_desciption = $subscribe['description'] ?? '';
$subscribe_form_shortcode = $subscribe['form_shortcode'] ?? '';
$subscribe_colors = $subscribe['subscribe_colors'] ?? '';
$subscribe_background_color = $subscribe_colors['background_color'] ?? '';
$subscribe_text_color = $subscribe_colors['text_color'] ?? '';
$subscribe_style = '';
if ($subscribe_background_color) {
  $subscribe_style .= 'background-color: ' . $subscribe_background_color . ';';
}
if ($subscribe_text_color) {
  $subscribe_style .= 'color: ' . $subscribe_text_color . ';';
}

$term_id = '';
if (is_archive()) {
  $term_id = get_queried_object()->term_id;
}
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$disable_subscribe = get_field('disable_subscribe', $the_id);

?>

<!-- Subscribe -->
<?php
$section_id = 'section-subscribe-' . uniqid();
?>

<?php
if ($subscribe && !$disable_subscribe) :
  $section_id = 'section-subscribe-' . uniqid();
?>
  <section class="<?php echo $section_id ?> relative bg-brand-blue print:hidden" style="<?php echo $subscribe_style ?>">
    <div class="relative pt-12 lg:pt-20 xl:pt-36 pb-12 lg:pb-20 xl:pb-36">
      <?php if ($subscribe_heading || $subscribe_desciption) : ?>
        <div class="relative container mx-auto max-w-screen-xl">
          <div class="text-center text-white max-w-prose mx-auto">
            <?php if ($subscribe_heading) : ?>
              <h3 class="mb-4 font-semibold text-4xl -tracking-[0.0125em] leading-tight"><?php echo $subscribe_heading ?></h3>
            <?php endif ?>
            <?php if ($subscribe_desciption) : ?>
              <div class="mt-4 text-xl"><?php echo $subscribe_desciption ?></div>
            <?php endif ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($subscribe_form_shortcode) : ?>
        <div class="relative container mx-auto max-w-screen-xl mt-16">
          <?php echo do_shortcode($subscribe_form_shortcode) ?>
        </div>
      <?php else : ?>
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
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

<footer class="print:hidden">
  <div class="bg-white py-24">
    <div class="container max-w-screen-2xl">
      <div class="flex gap-x-20 items-center pb-12 border-b border-slate-300">
        <div class="w-1/2">
          <?php if ($logo) : ?>
            <div class="site-logo">
              <a href="<?php echo site_url() ?>"><img src="<?php echo $logo['url'] ?>" alt="<?php echo get_bloginfo('name'); ?>" class="h-20 xl:h-[128px] w-auto"></a>
            </div>
          <?php endif ?>
        </div>
        <div class="w-1/2">
          <?php if ($slogan) : ?>
            <div class="text-2xl">
              <?php echo $slogan ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
    <div class="container max-w-screen-2xl pt-12">
      <div class="flex gap-x-20">
        <div class="w-1/2 flex flex-col">
          <?php if ($copyright_site_name) : ?>
          <?php endif; ?>
          <?php if ($address || $phone || $email) : ?>
            <div class="flex flex-col gap-y-0.5">
              <?php if ($address) {
                echo '<div>Visit: ' . $address . '</div>';
              } ?>
              <?php if ($phone) {
                $phone_link = $phone['url'] ?? '';
                echo '<div>Phone: <a href="' . $phone_link . '" class="underline hover:no-underline">' . $phone['title'] . '</a></div>';
              } ?>
              <?php if ($email) {
                $email_link = $email['url'] ?? '';
                echo '<div>Email: <a href="' . $email_link . '" class="underline hover:no-underline">' . $email['title'] . '</a></div>';
              } ?>
            </div>
          <?php endif; ?>
          <?php if ($acknowledgement_text || $acknowledgement_flags) : ?>
            <div class="mt-auto">
              <?php
              if ($acknowledgement_text) {
                echo '<div class="max-w-[42ch] text-sm leading-normal mt-8">';
                echo $acknowledgement_text;
                echo '</div>';
              }
              ?>
              <?php
              if ($acknowledgement_flags) {
                echo '<div class="flex gap-x-4 mt-4">';
                foreach ($acknowledgement_flags as $flag) {
                  $flag_url = $flag ?? '#';
                  echo '<img src="' . $flag . '" class="h-[36px] w-auto" />';
                }
                echo '</div>';
              }
              ?>
            </div>
          <?php endif ?>
        </div>
        <div class="w-1/2">
          <div class="flex gap-x-10">
            <?php if ($quick_links_links) : ?>
              <div class="w-1/3">
                <?php if ($quick_links_heading) {
                  echo '<h4 class="text-lg font-semibold mb-4">' . $quick_links_heading . '</h4>';
                } ?>
                <ul class="flex flex-col gap-y-3">
                  <?php foreach ($quick_links_links as $link) {
                    $link_url = $link['link']['url'] ?? '#';
                    $link_target = $link['link']['target'] ?? '_self';
                    $link_title = $link['link']['title'] ?? '';
                    echo '<li><a href="' . $link_url . '" target="' . $link_target . '" class="hover:underline">' . $link_title . '</a></li>';
                  } ?>
                </ul>
              </div>
            <?php endif; ?>
            <?php if ($about_us_links) : ?>
              <div class="w-1/3">
                <?php if ($about_us_heading) {
                  echo '<h4 class="text-lg font-semibold mb-4">' . $about_us_heading . '</h4>';
                } ?>
                <ul class="flex flex-col gap-y-3">
                  <?php foreach ($about_us_links as $link) {
                    $link_url = $link['link']['url'] ?? '#';
                    $link_target = $link['link']['target'] ?? '_self';
                    $link_title = $link['link']['title'] ?? '';
                    echo '<li><a href="' . $link_url . '" target="' . $link_target . '" class="hover:underline">' . $link_title . '</a></li>';
                  } ?>
                </ul>
              </div>
            <?php endif; ?>
            <?php if ($get_in_touch_links) : ?>
              <div class="w-1/3">
                <?php if ($get_in_touch_heading) {
                  echo '<h4 class="text-lg font-semibold mb-4">' . $get_in_touch_heading . '</h4>';
                } ?>
                <ul class="flex flex-col gap-y-3">
                  <?php foreach ($get_in_touch_links as $link) {
                    $link_url = $link['link']['url'] ?? '#';
                    $link_target = $link['link']['target'] ?? '_self';
                    $link_title = $link['link']['title'] ?? '';
                    echo '<li><a href="' . $link_url . '" target="' . $link_target . '" class="hover:underline">' . $link_title . '</a></li>';
                  } ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-brand-light-gray py-4">
    <div class="container max-w-screen-2xl">
      <div class="flex gap-x-20">
        <div class="w-1/2">
          <?php if ($copyright_site_name) : ?>
            <span class="text-sm"><?php echo $copyright_site_name ?></span>
          <?php endif; ?>
        </div>
        <div class="w-1/2">
          <div class="flex justify-between">
            <?php if ($copyright_links) : ?>
              <div class="flex gap-x-8 text-sm">
                <?php
                foreach ($copyright_links as $link) :
                ?>
                  <a href="<?php echo $link['link']['url'] ?>" class="text-sm hover:underline"><?php echo $link['link']['title'] ?></a>
                <?php endforeach ?>
              </div>
            <?php endif; ?>

            <?php if ($social_links) : ?>
              <ul class="social-link flex gap-x-1 px-6">
                <?php
                foreach ($social_links as $link) :
                  $social_media_link = $link['social_media_link'] ?? '';
                  $social_media_icon = $link['social_media_icon'] ?? '';
                ?>
                  <li><a href="<?php echo $social_media_link ?>" target="_blank" class="text-white font-medium hover:opacity-75"><?php echo cpsv_icon(array('icon' => $social_media_icon, 'group' => 'social', 'size' => '24', 'class' => 'w-6 h-6 text-brand-blue')); ?></a></li>
                <?php endforeach ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>