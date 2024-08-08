<?php

function cpsv_woocommerce_unhook_actions()
{
  remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
}
add_action('wp_head', 'cpsv_woocommerce_unhook_actions');


add_action('template_redirect', 'cpsv_redirect_woo_pages');
function cpsv_redirect_woo_pages()
{
  if (function_exists('is_shop') && is_shop()) {
    wp_redirect(site_url('shop'));
    exit;
  }
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{
  unset($tabs['reviews']);

  return $tabs;
}

add_action('woocommerce_after_single_product', 'cpsv_review_replacing_reviews_position');
function cpsv_review_replacing_reviews_position()
{
  echo '<section class="section-review pt-12 border-t border-solid border-slate-300 mt-12">';
  echo '<h2 class="text-2xl md:text-4xl font-semibold mb-6">Product Review</h2>';
  comments_template();
  echo '</section>';
}

function cpsv_woocommerce_header_add_to_cart_fragment($fragments)
{

  ob_start();

?>

  <div class="cart-items-count hidden 4xl:flex">
    <span class="count">
      <?php echo sprintf('%d', WC()->cart->cart_contents_count); ?>
    </span>
  </div>

<?php

  $fragments['#minicart .cart-items-count .count'] = ob_get_clean();

  return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'cpsv_woocommerce_header_add_to_cart_fragment');
