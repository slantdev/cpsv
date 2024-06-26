<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

get_template_part('template-parts/global/page-header', '', array('breadcrumbs' => true));

?>

<div class="section-wrapper relative">
  <div class="section-spacing relative pt-6 lg:pt-12 xl:pt-20 pb-12 lg:pb-20 xl:pb-20">
    <div class="section-content container mx-auto max-w-screen-2xl animation-wrapper">

      <?php
      /**
       * Hook: woocommerce_before_main_content.
       *
       * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
       * @hooked woocommerce_breadcrumb - 20
       * @hooked WC_Structured_Data::generate_website_data() - 30
       */
      remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
      do_action('woocommerce_before_main_content');
      ?>
      <header class="woocommerce-products-header">
        <div class="w-full">
          <div class="prose max-w-none xl:prose-lg text-left font-medium" style="color:#4b5563;">
            <?php
            /**
             * Hook: woocommerce_archive_description.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            do_action('woocommerce_archive_description');
            ?>
          </div>
        </div>
      </header>

      <div class="relative max-w-screen-2xl my-8 xl:my-12">
        <div class="flex flex-col lg:flex-row lg:gap-x-6 xl:gap-x-12">
          <div class="w-full lg:w-1/4 order-2 lg:order-1">
            <div class="mt-12 lg:mt-0">
              <?php
              if (shortcode_exists('br_filters_group')) {
                echo '<h4 class="text-xl md:text-2xl font-bold mb-4 md:mb-6">Filters</h4>';
                //echo do_shortcode('[br_filters_group group_id=1537]');
                echo do_shortcode('[br_filters_group group_id=4183]');
              }
              ?>
            </div>
          </div>
          <div class="w-full lg:w-3/4 order-1 lg:order-2">
            <?php
            if (woocommerce_product_loop()) {

              /**
               * Hook: woocommerce_before_shop_loop.
               *
               * @hooked woocommerce_output_all_notices - 10
               * @hooked woocommerce_result_count - 20
               * @hooked woocommerce_catalog_ordering - 30
               */
              do_action('woocommerce_before_shop_loop');

              woocommerce_product_loop_start();

              if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                  the_post();

                  /**
                   * Hook: woocommerce_shop_loop.
                   */
                  do_action('woocommerce_shop_loop');

                  wc_get_template_part('content', 'product');
                }
              }

              woocommerce_product_loop_end();

              /**
               * Hook: woocommerce_after_shop_loop.
               *
               * @hooked woocommerce_pagination - 10
               */
              do_action('woocommerce_after_shop_loop');
            } else {
              /**
               * Hook: woocommerce_no_products_found.
               *
               * @hooked wc_no_products_found - 10
               */
              do_action('woocommerce_no_products_found');
            }
            ?>
          </div>
        </div>

      </div>
      <?php
      /**
       * Hook: woocommerce_after_main_content.
       *
       * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
       */
      do_action('woocommerce_after_main_content');
      ?>

    </div>
  </div>
</div>

<?php
get_footer('shop');
