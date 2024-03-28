<?php
include get_template_directory() . '/template-parts/global/section_settings.php';
/*
 * Available section variables
 * $section_id
 * $section_style
 * $section_padding_top
 * $section_padding_bottom
*/
$section_id = 'section-campaign-' . uniqid();
function card_campaign($args)
{
  //preint_r($args);
  $title = isset($args['title']) ? $args['title'] : '';
  $image = isset($args['image']) ? $args['image'] : '';
  $link = isset($args['link']) ? $args['link'] : '#';
  $type = isset($args['type']) ? $args['type'] : '';
?>
  <?php if ($type == 'featured') : ?>
    <div class="col-span-3">
      <div class="card">
        <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
          <div class="aspect-w-16 aspect-h-6">
            <?php if ($image) : ?>
              <img class="featured-image object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
            <?php else : ?>
              <div class="w-full h-full bg-slate-50"></div>
            <?php endif; ?>
          </div>
          <div class="absolute inset-0 bg-gradient-to-l from-black/80 via-transparent bg-blend-multiply"></div>
          <div class="absolute right-4 bottom-4 text-white">
            <?php echo cpsv_icon(array('icon' => 'plus-circle', 'group' => 'utilities', 'size' => '64', 'class' => 'w-16 h-16')); ?>
          </div>
          <div class="absolute inset-0">
            <div class="w-full h-full flex justify-end items-end">
              <div class="w-2/5 px-12 py-8">
                <h4 class="text-3xl leading-tight font-semibold text-white"><?php echo $title ?></h4>
                <div class="text-lg text-white underline mt-24">Read More</div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  <?php else : ?>
    <div class="card">
      <a href="<?php echo $link ?>" class="group block relative rounded-xl overflow-clip">
        <div class="aspect-1">
          <?php if ($image) : ?>
            <img class="object-cover w-full h-full transition-all duration-300 group-hover:scale-105" src="<?php echo $image ?>" alt="">
          <?php else : ?>
            <div class="w-full h-full bg-slate-50"></div>
          <?php endif; ?>
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent bg-blend-multiply"></div>
        <div class="absolute right-4 bottom-4 text-white">
          <?php echo cpsv_icon(array('icon' => 'plus-circle', 'group' => 'utilities', 'size' => '64', 'class' => 'w-16 h-16')); ?>
        </div>
      </a>
      <div class="py-4">
        <h4><a href="<?php echo $link ?>" class="text-2xl leading-tight font-semibold text-brand-dark-blue hover:underline"><?php echo $title ?></a></h4>
      </div>
    </div>
  <?php endif; ?>
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
            <h3 class="mb-4 text-brand-dark-blue font-semibold text-5xl -tracking-[0.0125em] leading-tight">Our latest campaign</h3>
          </div>
          <div class="w-full">
            <div class="prose max-w-none xl:prose-lg mr-auto text-left font-medium">
              To help you navigate and find the right information, choose one of the options below.
            </div>
          </div>
        </div>
        <div class="w-full xl:w-1/3 flex justify-end">
          <a href="#" class="btn btn-primary btn-outline rounded-full text-base px-16">View all</a>
        </div>
      </div>
    </div>
    <div class="relative container max-w-screen-2xl my-8 xl:my-12">
      <?php
      $content = array(
        [
          'title' => 'Let this Christmas be the cat’s whiskers with a gift from CPSV',
          'image' => site_url() . '/wp-content/uploads/2024/03/1828874.jpg',
          'link' => '#',
          'type' => 'featured'
        ],
        [
          'title' => 'Mental Health Benefits of Pet Ownership | Episode 10',
          'image' => site_url() . '/wp-content/uploads/2024/03/1900747-300x300.jpg',
          'link' => '#',
          'type' => 'card'
        ],
        [
          'title' => 'Planning on adopting this Christmas?',
          'image' => site_url() . '/wp-content/uploads/2024/03/1931367-300x300.jpg',
          'link' => '#',
          'type' => 'card'
        ],
        [
          'title' => 'Let this Christmas be the cat’s whiskers with a gift from CPSV',
          'image' => site_url() . '/wp-content/uploads/2024/03/1644602-300x300.jpg',
          'link' => '#',
          'type' => 'card'
        ],
      );
      ?>
      <div class="grid grid-cols-3 gap-6">
        <?php foreach ($content as $card) : ?>
          <?php echo card_campaign($card) ?>
        <?php endforeach; ?>
      </div>
    </div>
    <?php if ($bottom_separator) : ?>
      <div class="absolute h-12 w-px bottom-0 left-1/2 border-l border-solid border-slate-300" style="<?php echo $bottom_separator_style ?>"></div>
    <?php endif; ?>
</section>