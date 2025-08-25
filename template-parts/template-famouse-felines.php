<?php

/**
 * Template Name: Famous Felines
 * Template Post Type: page
 *
 */

get_header();

?>
<style>
  .fancybox__container {
    --f-carousel-slide-width: 640px;
    --f-carousel-slide-padding: 20px;
  }
</style>
<div id="famous-felines-page">
  <div class="container max-w-screen-2xl">
    <div class="ff-banner py-4 lg:py-6 xl:py-8">
      <img src="https://placehold.co/1440x720" alt="" class="rounded-lg">
    </div>
    <div class="ff-campaign-form pb-6 lg:pb-12">
      <h1 class="text-3xl lg:text-5xl tracking-tight font-semibold mt-4 mb-4 lg:mb-12">Enter our Purrfect Pin Up 2026 Calendar Competition</h1>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-10">
        <div class="prose">
          <div class="text-2xl mb-4 lg:mb-6">Is your cat ready for their close up!</div>
          <div class="text-lg">
            <p>Calling all Victorian cat lovers!</p>
            <p>Do you live with a fabulous feline? Does your marvellous moggie have the charm, style, and star power to shine? Would you love the chance to show the world just how paw-some they are?</p>
            This is your moment.
            <p>We’re on the lookout for 12 incredible cats to star in our 2026 Cat Protection Society Calendar – and your furry friend could be one of them!</p>
            <p>Not only will your cat enjoy their time in the spotlight, but every calendar sold will help support our work in caring for and rehoming Victorian cats in need.</p>
          </div>
          <div class="text-2xl mb-4 lg:mb-6">Who can Enter?</div>
          <div class="text-lg">
            <ol>
              <li>Any Victorian who has adopted a cat or kitten from The Cat Protection Society of Victoria Adoption Shelter.</li>
              <li>You must be able to bring your cat to our Greensborough Adoption Shelter for their very own private photoshoot.</li>
              <li>Your cat must be up to date with their vaccinations and you can show proof of this vaccination status prior to a scheduled photoshoot should your cat win. </li>
            </ol>
          </div>
        </div>
        <div>
          <?php echo FrmFormsController::get_form_shortcode(array('id' => 5)); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="ff-cats-grid py-8 lg:py-16 bg-brand-light-gray">
    <div class="container max-w-screen-2xl">
      <h2 class="text-3xl lg:text-5xl tracking-tight font-semibold mb-4 lg:mb-8">Meet our contestants</h2>
      <div class="ff-toolbox flex justify-between mb-4 lg:mb-8">
        <div class="ff-sort">
          <div class="ff-sort-buttons flex gap-2">
            <button class="sort-btn active" data-sort="newest">Newest</button>
            <button class="sort-btn" data-sort="oldest">Oldest</button>
            <button class="sort-btn" data-sort="highest_votes">Highest Votes</button>
          </div>
        </div>
        <div class="ff-search">
          <form class="ff-search-form">
            <div class="bg-white rounded-full px-1 py-1 shadow-inner flex gap-1">
              <input type="search" name="feline_search" class="ff-search-input border-none min-w-56 bg-transparent rounded-full" placeholder="Cat's name...">
              <button type="submit" class="ff-search-btn bg-brand-blue text-white rounded-full px-8 py-2 font-semibold">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div id="ff-grid-container">
        <?php
        $args = array(
          'post_type' => 'famous-feline',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'orderby' => 'date',
          'order' => 'DESC',
        );

        $felines_query = new WP_Query($args);

        if ($felines_query->have_posts()) :
        ?>
          <div class="ff-masonry">
            <div class="gutter-sizer"></div>
            <?php
            while ($felines_query->have_posts()) : $felines_query->the_post();
              $cat_photo = get_field('cat_photo');
              $cat_photo_url = $cat_photo ? $cat_photo['url'] : 'https://placehold.co/600x600';
              $cat_name = get_field('cat_name');
              $cat_age = get_field('cat_age');
              $cat_description = get_field('cat_description');
              $vote_count = get_field('vote_count') ? get_field('vote_count') : 0;
            ?>
              <div class="ff-card ff-grid-item p-4 rounded-lg bg-white shadow flex flex-col">
                <div class="ff-card--image">
                  <a href="<?php echo esc_url($cat_photo_url); ?>"
                    data-fancybox="feline-gallery"
                    data-caption="<div class='ff-card--header'>
                                    <div class='flex justify-between items-center py-3 mb-3'>
                                      <div class='ff-card--name'>
                                        <h3 class='font-semibold text-2xl'><?php echo esc_attr($cat_name); ?></h3>
                                        <?php if ($cat_age) : ?><p class='font-semibold mt-2'><?php echo esc_attr($cat_age); ?></p><?php endif; ?>
                                      </div>
                                      <div class='ff-card--action flex items-center gap-4'>
                                        <button class='share-btn p-2 rounded-full hover:bg-slate-100'>                                        
                                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6'>
                                              <path fill-rule='evenodd' d='M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z' clip-rule='evenodd' />
                                            </svg>
                                        </button>
                                        <button class='vote-btn flex items-center gap-2 p-2 rounded-full hover:bg-slate-100 relative' data-post-id='<?php the_ID(); ?>'>
                                          <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-10 h-10 text-slate-600'>
                                            <path d='m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z' />
                                          </svg>
                                          <div class='absolute inset-0 flex items-center justify-center'>
                                            <div class='vote-count font-semibold text-xs text-white'><?php echo esc_html($vote_count); ?></div>
                                          </div>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class='ff-card--description mt-4'><?php echo esc_html($cat_description); ?></div>"
                    data-slug="<?php echo get_post_field('post_name'); ?>">
                    <img src="<?php echo esc_url($cat_photo_url); ?>" alt="<?php echo esc_attr($cat_name); ?>" class="rounded-lg w-full h-auto aspect-square object-cover">
                  </a>
                </div>
                <div class="ff-card--content flex flex-col">
                  <div class="ff-card--header">
                    <div class="flex justify-between items-center py-3 mb-3 border-b border-slate-300">
                      <div class="ff-card--name">
                        <h3 class="font-semibold text-2xl">
                          <?php echo esc_html($cat_name); ?>
                        </h3>
                        <?php if ($cat_age) : ?>
                          <p class="font-semibold mt-2">
                            <?php echo esc_html($cat_age); ?>
                          </p>
                        <?php endif; ?>
                      </div>
                      <div class="ff-card--action flex items-center">
                        <button class="share-btn p-2 rounded-full hover:bg-slate-100">
                          <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6'>
                            <path fill-rule='evenodd' d='M15.75 4.5a3 3 0 1 1 .825 2.066l-8.421 4.679a3.002 3.002 0 0 1 0 1.51l8.421 4.679a3 3 0 1 1-.729 1.31l-8.421-4.678a3 3 0 1 1 0-4.132l8.421-4.679a3 3 0 0 1-.096-.755Z' clip-rule='evenodd' />
                          </svg>
                        </button>
                        <button class="vote-btn flex items-center gap-2 p-2 rounded-full hover:bg-slate-100 relative" data-post-id='<?php the_ID(); ?>'>
                          <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-10 h-10 text-slate-600'>
                            <path d='m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z' />
                          </svg>
                          <div class="absolute inset-0 flex items-center justify-center">
                            <div class="vote-count font-semibold text-xs text-white"><?php echo esc_html($vote_count); ?></div>
                          </div>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="ff-card--description">
                    <?php echo wp_kses_post($cat_description); ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php
          wp_reset_postdata();
        else :
          echo '<p class="text-center col-span-full">No contestants found. Be the first to enter!</p>';
        endif;
        ?>
      </div>
    </div>
  </div>
</div>

</main>

</div>

</div>

<?php get_footer(); ?>

</body>

</html>