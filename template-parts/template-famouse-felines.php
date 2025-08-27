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

  .vote-loader {
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid #fff;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .frm_form_field:not(.frm_compact) .frm_dropzone {
    max-width: none;
  }
</style>
<div id="famous-felines-page">
  <div class="container max-w-screen-2xl">
    <div class="ff-banner py-4 lg:py-6 xl:py-8">
      <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/campaign/purrfect-pinup-banner.jpg'; ?>" alt="" class="rounded-lg">
    </div>
  </div>
  <?php
  get_template_part('template-parts/page', 'builder');
  ?>
  <div class="ff-cats-grid py-8 lg:py-16 bg-[#f8f7f6]">
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
            <div class="bg-white rounded-full px-1 py-1 shadow-[inset_0_2px_4px_0px_rgba(0,0,0,0.3)] flex gap-1">
              <input type="search" name="feline_search" class="ff-search-input border-none min-w-56 bg-transparent rounded-full focus:ring-0 focus:border-0" placeholder="Cat's name...">
              <button type="submit" class="ff-search-btn bg-brand-blue text-white rounded-full px-8 py-2 font-semibold">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="relative">
        <div class="ff-loader-container" style="display: none;">
          <div class="ff-loader"></div>
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
                echo get_feline_card_html(get_the_ID());
              endwhile;
              ?>
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
</div>
</div>

</main>

</div>

</div>

<?php get_footer(); ?>

</body>

</html>