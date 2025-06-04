<?php
# DEFINES
// define('DEFAULT_PATH', get_template_directory());
// define('DEFAULT_URL', get_template_directory_uri());
define("THEME_TD", get_bloginfo('title'));

# REQUIRES

# ACTIONS
// add_action('admin_enqueue_scripts', 'ds_admin_theme_style');
// add_action('login_enqueue_scripts', 'ds_admin_theme_style');
add_action('wp_enqueue_scripts', 'theme_enqueue_jquery');
// add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

# FILTERS
add_filter('wp_page_menu_args', 'home_page_menu_args');
add_filter('post_thumbnail_html', 'remove_thumbnail_dimension', 10);
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10);
add_filter('the_content', 'remove_thumbnail_dimensions', 10);
add_filter('the_content', 'add_image_responsive_class');
// add_filter('upload_mimes', 'cc_mime_types');
add_filter('use_block_editor_for_post', '__return_false');
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
// add_filter('acf/settings/save_json', 'my_acf_json_save_point');
// add_filter('acf/settings/load_json', 'my_acf_json_load_point');


#ADMIN PANELS CUSTOMIZATION
// add_filter('custom_menu_order', 'custom_menu_order');
// add_filter('menu_order', 'custom_menu_order');
// add_action('admin_menu', 'wpdocs_remove_menus');
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');
// add_action('wp_enqueue_scripts', 'enqueue_custom_map_script');
add_action('admin_init', 'disable_editor_on_specific_pages');

# THEME SUPPORTS
add_theme_support('menus');
add_theme_support('post-thumbnails'); // array for post-thumbnail support on certain post-types.

# IMAGE SIZES
add_image_size('default-thumbnail', 128, 128, true); // true: hard crop or empty if soft crop

set_post_thumbnail_size(128, 128, true);

# FUNCTIONS
register_nav_menus([
  'main-menu' => __('Main menu', THEME_TD),
]);


function wpdocs_remove_menus()
{
  remove_menu_page('index.php'); //Dashboard
  // remove_menu_page('edit.php'); //Posts
  remove_menu_page('upload.php'); //Media
  // remove_menu_page('edit.php?post_type=page'); //Pages
  remove_menu_page('edit-comments.php'); //Comments
  // remove_menu_page('themes.php'); //Appearance
  // remove_menu_page('plugins.php'); //Plugins
  // remove_menu_page('users.php'); //Users
  // remove_menu_page('tools.php'); //Tools
  // remove_menu_page('options-general.php'); //Settings
  // remove_menu_page('edit.php?post_type=project'); //Project
}

function disable_editor_on_specific_pages()
{
  // Replace 123 and 456 with the IDs of the pages where you want to disable the editor
  $disabled_pages = array(2);

  foreach ($disabled_pages as $page_id) {
    remove_post_type_support('page', 'editor', $page_id);
  }
}
function enqueue_custom_admin_styles()
{
  wp_enqueue_style('custom-admin-styles', get_template_directory_uri() . '/stylesheets/admin/style.css', false, '1.0', 'all');
}

function custom_menu_order($menu_ord)
{
  if (!$menu_ord)
    return true;

  return array(
    'edit.php?post_type=page', // Pages
    'edit.php?post_type=woningen', // Woningen
    'edit.php', // Posts
    'upload.php', // Media
    // Add or reorder other items as needed
  );
}

function theme_enqueue_jquery()
{
  wp_enqueue_script('jquery');
}

function enqueue_custom_styles()
{
  // Enqueue your custom stylesheet
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/sass/style.css', array(), '1.0', 'all');
}

function my_acf_json_save_point($path)
{
  // update path
  $path = get_stylesheet_directory() . '/acf';

  // return
  return $path;
}

function my_acf_json_load_point($paths)
{

  // remove original path (optional)
  unset($paths[0]);


  // append path
  $paths[] = get_stylesheet_directory() . '/acf';


  // return
  return $paths;
}


function home_page_menu_args($args)
{
  $args['show_home'] = true;
  return $args;
}

function remove_thumbnail_dimensions($html)
{
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

function remove_width_attribute($html)
{
  $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
  return $html;
}

function add_image_responsive_class($content)
{
  global $post;
  $pattern = "/<img(.*?)class=\"(.*?)\"(.*?)>/i";
  $replacement = '<img$1class="$2 img-responsive"$3>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

function ds_admin_theme_style()
{
  if (!current_user_can('manage_options')) {
    echo '<style>.update-nag, .updated, .error, .is-dismissible { display: none; }</style>';
  }
}

function print_pre($print)
{
  echo '<pre>';
  print_r($print);
  echo '</pre>';
}

// Method 1: Filter.
function my_acf_google_map_api($api)
{
  $api['key'] = 'AIzaSyBGV9e4PJY_jDfxttGQewqlVtxJ9tluRno';
  return $api;
}

function enqueue_custom_map_script()
{
  wp_enqueue_script('custom-map', get_template_directory_uri() . '/js/custom-map.js', array(), null, true);
  wp_localize_script('custom-map', 'theme_data', array('template_directory_uri' => get_template_directory_uri()));
}

# Random code

// add editor the privilege to edit theme
// get the the role object
$role_object = get_role('editor');
// add $cap capability to this role object
$role_object->add_cap('edit_theme_options');

if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_page();
  acf_add_options_sub_page('Footer');
  //     acf_add_options_sub_page( 'Side Menu' );
}