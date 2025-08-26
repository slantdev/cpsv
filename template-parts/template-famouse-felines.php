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
          <?php /* echo FrmFormsController::get_form_shortcode(array('id' => 5)); */ ?>
          <?php echo FrmFormsController::get_form_shortcode(array('id' => 39)); ?>
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