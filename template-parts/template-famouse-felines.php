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

  .share-popover {
    transition: opacity 0.2s ease-in-out, visibility 0.2s ease-in-out;
  }
</style>
<div id="famous-felines-page">
  <?php
  get_template_part('template-parts/page', 'builder');
  ?>
</div>
</div>

</main>

</div>

</div>

<?php get_footer(); ?>

</body>

</html>