<?php
define('GOOGLE_MAPS_API', 'AIzaSyALa7CVVKAaAPSw9-zopXMh2C7wcn6Zo10');

// Define Formidable API Credentials
define('FORMIDABLE_API_USERNAME', 'QDTD-C70F-JARK-4YHI');
define('FORMIDABLE_API_PASSWORD', 'x');
//$api_url = 'http://cpsvdev.local/wp-json/wp/v2/volunteer-discussion?status=publish';
//$api_url = 'https://catprotection.com.au/staging/wp-json/wp/v2/volunteer-discussion?status=publish';
//define('VOLUNTEER_DISCUSSION_API', 'http://cpsvdev.local/wp-json/wp/v2/volunteer-discussion?status=publish');
//define('VOLUNTEER_DISCUSSION_API', 'https://catprotection.com.au/staging/wp-json/wp/v2/volunteer-discussion?status=publish');
define('VOLUNTEER_DISCUSSION_API', 'https://catprotection.com.au/wp-json/wp/v2/volunteer-discussion?status=publish');
define('ADMIN_AJAX_PATH', '/wp-admin/admin-ajax.php');
//define('ADMIN_AJAX_PATH', '/staging/wp-admin/admin-ajax.php');

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
require get_template_directory() . '/inc/volunteer-discussions.php';
require get_template_directory() . '/inc/famous-feline.php';


/**
 * Disable Gutenberg
 */
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
  // Use your post type key instead of 'product'
  if ($post_type === 'post' || $post_type === 'page' || $post_type === 'where-are-they' || $post_type === 'faq' || $post_type === 'christmas-wish' || $post_type === 'volunteer-discussion' || $post_type === 'famous-feline') return false;
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
  //$api_url = 'http://cpsvdev.local/wp-json/wp/v2/christmas-wish?status=publish';
  $api_url = 'https://catprotection.com.au/wp-json/wp/v2/christmas-wish?status=publish';

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
  //$api_url = 'https://catprotection.com.au/staging/wp-json/wp/v2/volunteer-discussion?status=publish';
  $api_url = VOLUNTEER_DISCUSSION_API;

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
  // if (!isset($_POST['comment_form_nonce']) || !wp_verify_nonce($_POST['comment_form_nonce'], 'comment_form')) {
  //   wp_send_json_error('Invalid nonce. Please refresh the page and try again.');
  //   wp_die();
  // }

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

function add_shortcode_body_class($classes)
{
  // Check if we're on a single post or page
  if (is_singular()) {
    global $post; // Access current post

    // Check if the post content contains the shortcode
    if (has_shortcode($post->post_content, 'volunteer_discussions')) {
      $classes[] = 'has-volunteer-discussions'; // Add your custom class
    }
  }
  return $classes;
}

// Hook into body_class filter
add_filter('body_class', 'add_shortcode_body_class');

/**
 * Modify Yoast SEO Open Graph tags for Feline pages.
 */
function custom_feline_og_url($url)
{
  if (is_page('purrfect-pin-up') && isset($_GET['cat'])) {
    $cat_slug = sanitize_title($_GET['cat']);
    if (!empty($cat_slug)) {
      return home_url('/purrfect-pin-up/?cat=' . $cat_slug);
    }
  }
  return $url;
}
add_filter('wpseo_opengraph_url', 'custom_feline_og_url', 10, 1);

function custom_feline_og_title($title)
{
  if (is_page('purrfect-pin-up') && isset($_GET['cat'])) {
    $cat_slug = sanitize_title($_GET['cat']);
    if (!empty($cat_slug)) {
      $post = get_page_by_path($cat_slug, OBJECT, 'famous-feline');
      if ($post) {
        return get_the_title($post->ID);
      }
    }
  }
  return $title;
}
add_filter('wpseo_opengraph_title', 'custom_feline_og_title', 10, 1);

function custom_feline_og_desc($desc)
{
  if (is_page('purrfect-pin-up') && isset($_GET['cat'])) {
    $cat_slug = sanitize_title($_GET['cat']);
    if (!empty($cat_slug)) {
      $post = get_page_by_path($cat_slug, OBJECT, 'famous-feline');
      if ($post) {
        if (has_excerpt($post->ID)) {
          return get_the_excerpt($post->ID);
        }
        return wp_trim_words(get_the_content(null, false, $post->ID), 30);
      }
    }
  }
  return $desc;
}
add_filter('wpseo_opengraph_desc', 'custom_feline_og_desc', 10, 1);

function custom_feline_og_image($images)
{
  if (is_page('purrfect-pin-up') && isset($_GET['cat'])) {
    $cat_slug = sanitize_title($_GET['cat']);
    if (!empty($cat_slug)) {
      $post = get_page_by_path($cat_slug, OBJECT, 'famous-feline');
      if ($post) {
        $image_url = '';
        if (function_exists('get_field') && get_field('cat_photo', $post->ID)) {
          $image_details = get_field('cat_photo', $post->ID);
          if (is_array($image_details) && isset($image_details['url'])) {
            $image_url = $image_details['url'];
          }
        } elseif (has_post_thumbnail($post->ID)) {
          $image_url = get_the_post_thumbnail_url($post->ID, 'large');
        }

        if ($image_url) {
          // Clear existing images and add our specific image
          $images = array(
            array(
              'url' => $image_url,
            )
          );
        }
      }
    }
  }
  return $images;
}
//add_filter('wpseo_add_opengraph_images', 'custom_feline_og_image', 10, 1);
add_filter('wpseo_opengraph_image', 'custom_feline_og_image');
