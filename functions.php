<?php
define('GOOGLE_MAPS_API', 'AIzaSyALa7CVVKAaAPSw9-zopXMh2C7wcn6Zo10');

// Define Formidable API Credentials
define('FORMIDABLE_API_USERNAME', 'QDTD-C70F-JARK-4YHI');
define('FORMIDABLE_API_PASSWORD', 'x');

/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Disable Gutenberg
 */
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
  // Use your post type key instead of 'product'
  if ($post_type === 'post' || $post_type === 'page' || $post_type === 'where-are-they' || $post_type === 'faq' || $post_type === 'christmas-wish') return false;
  return $current_status;
}

function get_give_email_images()
{
  $images = get_stylesheet_directory_uri() . '/give/emails/img/';

  return $images;
}


add_action('wp_ajax_load_messages', 'load_messages');
add_action('wp_ajax_nopriv_load_messages', 'load_messages'); // Allow unauthenticated access if needed

function load_messages()
{
  // Add your API fetching logic here, securely using the stored credentials.
  $username = 'QDTD-C70F-JARK-4YHI';
  //$username = '1CT1-9K1M-KGG1-N6AB';
  $password = 'x';

  // Set the API endpoint
  //$api_url = 'http://cpsvdev.local/wp-json/frm/v2/forms/3/entries?order=DESC';
  //$api_url = 'https://catprotection.com.au/wp-json/frm/v2/forms/32/entries?order=DESC';
  $api_url = 'http://cpsvdev.local/wp-json/wp/v2/christmas-wish?status=publish';
  //$api_url = 'https://catprotection.com.au/wp-json/wp/v2/christmas-wish?status=publish';


  // Prepare an authorization header
  $response = wp_remote_get($api_url, [
    // 'headers' => [
    //   'Authorization' => 'Basic ' . base64_encode("$username:$password"),
    // ],
  ]);

  // Check if the request was successful
  if (is_wp_error($response)) {
    wp_send_json_error('API request failed: ' . $response->get_error_message());
    wp_die(); // Terminate the script
  }

  // Decode the JSON response
  $data = json_decode(wp_remote_retrieve_body($response), true);

  // Return the data as a JSON response
  wp_send_json_success($data);
  wp_die(); // Properly terminate the AJAX request
}
