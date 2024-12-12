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
  if ($post_type === 'post' || $post_type === 'page' || $post_type === 'where-are-they' || $post_type === 'faq' || $post_type === 'christmas-wish' || $post_type === 'volunteer-discussion') return false;
  return $current_status;
}

function get_give_email_images()
{
  $images = get_stylesheet_directory_uri() . '/give/emails/img/';

  return $images;
}


// Ensure guest comments are allowed
add_action('init', function () {
  update_option('comment_registration', 0); // 0 = Guest comments allowed
  update_option('require_name_email', 1); // 1 = Name and Email required
});

add_action('init', function () {
  $args = get_post_type_object('christmas-wish');
  $args->supports[] = 'comments'; // Add 'comments' support if not already there
  register_post_type('christmas-wish', $args);
});

add_action('init', function () {
  $args = get_post_type_object('volunteer-discussion');
  $args->supports[] = 'comments'; // Add 'comments' support if not already there
  register_post_type('volunteer-discussion', $args);
});


add_action('wp_ajax_load_messages', 'load_messages');
add_action('wp_ajax_nopriv_load_messages', 'load_messages'); // Allow unauthenticated access if needed

function load_messages()
{
  // Set the API endpoint
  //$api_url = 'http://cpsvdev.local/wp-json/frm/v2/forms/3/entries?order=DESC';
  //$api_url = 'https://catprotection.com.au/wp-json/frm/v2/forms/32/entries?order=DESC';
  $api_url = 'http://cpsvdev.local/wp-json/wp/v2/christmas-wish?status=publish';
  //$api_url = 'https://catprotection.com.au/wp-json/wp/v2/christmas-wish?status=publish';

  $response = wp_remote_get($api_url);

  // Check if the request was successful
  if (is_wp_error($response)) {
    wp_send_json_error('API request failed: ' . $response->get_error_message());
    wp_die(); // Terminate the script
  }

  $posts = json_decode(wp_remote_retrieve_body($response), true);

  foreach ($posts as &$post) {
    $post_id = $post['id'];

    // Get comments for this post
    $comments = get_comments([
      'post_id' => $post_id,
      'status' => 'approve',
      'orderby' => 'comment_date',
      'order' => 'ASC',
    ]);

    $post['comments'] = array_map(function ($comment) {
      return [
        'id' => $comment->comment_ID,
        'author' => $comment->comment_author,
        'content' => $comment->comment_content,
        'parent' => $comment->comment_parent,
        'date' => $comment->comment_date,
      ];
    }, $comments);
  }

  wp_send_json_success($posts);
  wp_die();
}

add_action('wp_ajax_load_volunteer_messages', 'load_volunteer_messages');
add_action('wp_ajax_nopriv_load_volunteer_messages', 'load_volunteer_messages'); // Allow unauthenticated access if needed

function load_volunteer_messages()
{
  // Set the API endpoint
  //$api_url = 'http://cpsvdev.local/wp-json/wp/v2/volunteer-discussion?status=publish';
  $api_url = 'https://catprotection.com.au/wp-json/wp/v2/volunteer-discussion?status=publish';

  $response = wp_remote_get($api_url);

  // Check if the request was successful
  if (is_wp_error($response)) {
    wp_send_json_error('API request failed: ' . $response->get_error_message());
    wp_die(); // Terminate the script
  }

  $posts = json_decode(wp_remote_retrieve_body($response), true);

  foreach ($posts as &$post) {
    $post_id = $post['id'];

    // Get comments for this post
    $comments = get_comments([
      'post_id' => $post_id,
      'status' => 'approve',
      'orderby' => 'comment_date',
      'order' => 'ASC',
    ]);

    $post['comments'] = array_map(function ($comment) {
      return [
        'id' => $comment->comment_ID,
        'author' => $comment->comment_author,
        'content' => $comment->comment_content,
        'parent' => $comment->comment_parent,
        'date' => $comment->comment_date,
      ];
    }, $comments);
  }

  wp_send_json_success($posts);
  wp_die();
}

add_action('wp_ajax_comment_post', 'custom_ajax_comment_post');
add_action('wp_ajax_nopriv_comment_post', 'custom_ajax_comment_post');

function custom_ajax_comment_post()
{
  // Validate the nonce
  if (!check_ajax_referer('comment_form', '_wpnonce', false)) {
    wp_send_json_error('Invalid nonce. Please refresh the page and try again.');
  }

  // Extract form data
  $comment_data = [
    'comment_post_ID' => intval($_POST['comment_post_ID']),
    'comment_parent' => intval($_POST['comment_parent']),
    'comment_author' => sanitize_text_field($_POST['author']),
    'comment_author_email' => sanitize_email($_POST['email']),
    'comment_content' => sanitize_textarea_field($_POST['comment']),
    'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
    'comment_agent' => $_SERVER['HTTP_USER_AGENT'],
  ];

  // Attempt to insert the comment
  $comment_id = wp_insert_comment($comment_data);
  if ($comment_id) {
    wp_send_json_success(['comment_ID' => $comment_id]);
  } else {
    wp_send_json_error('Failed to insert comment. Please try again.');
  }
}
