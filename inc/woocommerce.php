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
