<?php
define('GOOGLE_MAPS_API', 'AIzaSyALa7CVVKAaAPSw9-zopXMh2C7wcn6Zo10');

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/acf.php';
//require get_template_directory() . '/inc/post-type.php';
//require get_template_directory() . '/inc/taxonomy.php';
//require get_template_directory() . '/inc/acf-debug.php';
//require get_template_directory() . '/inc/utilities.php';
require get_template_directory() . '/inc/enqueue.php';
//require get_template_directory() . '/inc/navigation.php';
//require get_template_directory() . '/inc/breadcrumb.php';
require get_template_directory() . '/inc/ajax.php';
//require get_template_directory() . '/inc/shortcodes.php';
//require get_template_directory() . '/inc/cards.php';
//require get_template_directory() . '/inc/rest.php';

add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
  // Use your post type key instead of 'product'
  if ($post_type === 'post' || $post_type === 'page' || $post_type === 'where-are-they' || $post_type === 'faq') return false;
  return $current_status;
}
