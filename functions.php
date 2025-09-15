<?php

/**
 * Yavar Theme Functions
 * * This file contains all the core functionality for the Yavar WordPress theme.
 * It includes theme setup, enqueue scripts and styles, and various WordPress hooks.
 * * @package Yavar
 * @version 1.0.0
 * @author Erfan Saeedi
 */

// @phpstan-ignore-file

// Prevent direct access to this file for security
if (!defined('ABSPATH')) {
  exit;
}

// ============================================================================
// WOOCOMMERCE INTEGRATION SECTION
// ============================================================================
// Note: Currently commented out - uncomment to use WooCommerce hooks approach
// include('functions-woohooks.php');

// WooCommerce template overrides for custom product display
// Remove default WooCommerce product link wrapper to customize product display
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close');

// Disable default WooCommerce styles to use custom styling
add_filter('woocommerce_enqueue_styles', '__return_false');

// ============================================================================
// THEME SETUP FUNCTION
// ============================================================================
/**
 * Initialize theme features and support
 * * This function sets up all the basic WordPress theme features including
 * title tag support, post thumbnails, custom logo, HTML5 markup, and navigation menus.
 * It runs after the theme is loaded using the 'after_setup_theme' hook.
 */
function yavar_theme_setup()
{
  // Add theme support for automatic title tag generation
  add_theme_support('title-tag');

  // Enable featured images (post thumbnails) for posts and pages
  add_theme_support('post-thumbnails');

  // Enable custom logo upload in WordPress Customizer
  add_theme_support('custom-logo');

  // Enable HTML5 markup for various WordPress elements
  add_theme_support('html5', array(
    'search-form',      // Better search form markup
    'comment-form',     // Better comment form markup
    'comment-list',     // Better comment list markup
    'gallery',          // Better gallery markup
    'caption',          // Better image caption markup
  ));

  // Register navigation menu locations
  // These menus can be managed in WordPress Admin > Appearance > Menus
  register_nav_menus(array(
    'header' => __('Header Menu', 'yavar'),    // Main navigation in header
    'footer_menu_1' => __('Footer Menu 1', 'yavar'),
    'footer_menu_2' => __('Footer Menu 2', 'yavar'),
  ));
}
// Hook the theme setup function to run after theme is loaded
add_action('after_setup_theme', 'yavar_theme_setup');

// ============================================================================
// STYLES AND SCRIPTS ENQUEUE FUNCTION
// ============================================================================
/**
 * Enqueue theme stylesheets and JavaScript files
 * * This function loads all the necessary CSS and JS files for the theme.
 * It uses filemtime() for cache busting to ensure updated files are loaded.
 * All files are loaded in the proper order with dependencies.
 */
function yavar_enqueue_styles()
{
  // Enqueue Map
  wp_enqueue_style(
    'Neshan',                              // Neshan Map
    "https://static.neshan.org/sdk/mapboxgl/v1.13.2/neshan-sdk/v1.0.8/index.css", // Map CSS file path
  );

  // Enqueue Icon
  wp_enqueue_style(
    'tabler',                              // tabler
    "https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css", // Icon CSS file path
  );

  // Enqueue IranYekan font (Persian web font)
  // This font is used for Persian text display
  wp_enqueue_style(
    'IranYekan-webfont',                              // FontIran
    get_template_directory_uri() . "/assets/font/IranYekan/fontiran.css", // Font CSS file path
  );

  // Enqueue Script font (English font)
  // This font is used as the primary font for the theme
  wp_enqueue_style(
    'Script-font',                               // Script
    get_template_directory_uri() . "/assets/font/Script/script.css", // Font CSS file path
  );

  // Enqueue main theme stylesheet
  $style_path = get_template_directory_uri() . '/style.css';  // استفاده از URI به جای مسیر فایل
  $style_version = filemtime(get_template_directory() . '/style.css');  // نسخه درست برای cache busting
  wp_enqueue_style(
    'yavar-style',                // Handle
    $style_path,                  // URL درست
    array(),                      // Dependencies
    $style_version                // Version درست
  );

  // This is the compiled CSS file that includes Tailwind CSS and custom styles
  // Fallback system: If compiled CSS doesn't exist, use source CSS
  $src_style_file = get_template_directory() . '/dist/styles.css';
  $style_path = get_template_directory_uri() . '/dist/styles.css';
  $style_version = file_exists($src_style_file) ? filemtime($src_style_file) : '1.0.0';

  wp_enqueue_style(
    'TailwindCSS',                                    // TailwindCSS
    $style_path,                                      // Path to the stylesheet
    array(),                                          // Dependencies (none in this case)
    $style_version                                    // Version number for cache busting
  );

  // Enqueue Swiper CSS
  wp_enqueue_style(
    'swiper-css',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
    array(),
    '11.0.0'
  );

  // Enqueue Swiper JS (اگر bundled نیست)
  wp_enqueue_script(
    'swiper-js',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    array(),
    '11.0.0',
    true
  );

  // Enqueue the compiled JavaScript file from Vite build process

  wp_enqueue_script(
    'neshan-script',                                   // Handle name for the script
    'https://static.neshan.org/sdk/mapboxgl/v1.13.2/neshan-sdk/v1.0.8/index.js',                                        // Path to the compiled JS file
    array(),                                          // Dependencies (none in this case)
    '1.0.0',                                      // Version number for cache busting
    true                                              // Load in footer for better performance
  );

  // This file contains all the interactive functionality for the theme
  // Fallback system: If compiled JS doesn't exist, use source JS
  $js_file = get_template_directory() . '/dist/main.js';
  $src_js_file = get_template_directory() . '/main.js';

  // Check if compiled JS exists, otherwise use source JS
  // This prevents errors when the build process hasn't been run yet
  if (file_exists($js_file)) {
    $js_path = get_template_directory_uri() . '/dist/main.js';
    $js_version = filemtime($js_file);
  } else {
    $js_path = get_template_directory_uri() . '/main.js';
    $js_version = file_exists($src_js_file) ? filemtime($src_js_file) : '1.0.0';
  }

  wp_enqueue_script(
    'yavar-script',                                   // Handle name for the script
    $js_path,                                        // Path to the compiled JS file
    array('neshan-script', 'swiper-js'),                                          // Dependencies (none in this case)
    $js_version,                                      // Version number for cache busting
    true                                              // Load in footer for better performance
  );
}


add_action('wp_enqueue_scripts', 'yavar_enqueue_styles');

function yavar_custom_logo_attributes($attr, $custom_logo_id)
{
  unset($attr['width']);
  unset($attr['height']);
  $attr['class'] = 'w-12 h-auto rounded-lg hover:scale-105 transition-transform duration-300';
  $attr['alt']   = 'لوگوی سفارشی سایت';
  return $attr;
}
add_filter('get_custom_logo_image_attributes', 'yavar_custom_logo_attributes', 10, 2);

function add_tailwind_classes_to_menu_links($atts, $item, $args, $depth)
{
  if ($args->theme_location == 'header') {
    $normal = ' px-4 py-2 hover:text-primary dark:hover:text-beige-300';
    $active = ' px-4 py-2 bg-primary/70 rounded-lg';
    if (!isset($atts['class'])) {
      $atts['class'] = '';
    }
    $menu_classes = $item->classes;
    $yavarClasses = (in_array('current-menu-item', $menu_classes) || in_array('current_page_item', $menu_classes)) ? $active : $normal;
    $atts['class'] .= $yavarClasses;
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_tailwind_classes_to_menu_links', 10, 4);

function register_slide_post_type()
{
  $labels = array(
    'name'                  => __('Slides', 'textdomain'),
    'singular_name'         => __('Slide', 'textdomain'),
    'menu_name'             => __('Slides', 'textdomain'),
    'add_new'               => __('Add New Slide', 'textdomain'),
    'add_new_item'          => __('Add New Slide', 'textdomain'),
    'edit_item'             => __('Edit Slide', 'textdomain'),
    'new_item'              => __('New Slide', 'textdomain'),
    'view_item'             => __('View Slide', 'textdomain'),
    'search_items'          => __('Search Slides', 'textdomain'),
    'not_found'             => __('No slides found', 'textdomain'),
    'not_found_in_trash'    => __('No slides found in Trash', 'textdomain'),
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'has_archive'           => false,
    'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
    'menu_icon'             => 'dashicons-slides',
    'show_in_rest'          => false,
  );

  register_post_type('slide', $args);
}
add_action('init', 'register_slide_post_type');

function register_slider_taxonomy()
{
  $labels = array(
    'name'                       => __('Slider Groups', 'textdomain'),
    'singular_name'              => __('Slider Group', 'textdomain'),
    'search_items'               => __('Search Slider Groups', 'textdomain'),
    'all_items'                  => __('All Slider Groups', 'textdomain'),
    'edit_item'                  => __('Edit Slider Group', 'textdomain'),
    'update_item'                => __('Update Slider Group', 'textdomain'),
    'add_new_item'               => __('Add New Slider Group', 'textdomain'),
    'new_item_name'              => __('New Slider Group Name', 'textdomain'),
    'menu_name'                  => __('Slider Groups', 'textdomain'),
  );

  $args = array(
    'hierarchical'               => false,
    'labels'                     => $labels,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'query_var'                  => true,
    'show_in_rest'               => true,
    'rewrite'                    => array('slug' => 'slider_group'),
  );

  register_taxonomy('slider_group', array('slide'), $args);
}
add_action('init', 'register_slider_taxonomy');

add_action('customize_register', function ($wp_customize) {
  // Section
  $wp_customize->add_section('yavar_social_links', [
    'title' => __('آدرس شبکه های اجتماعی', 'yavar'),
    'priority' => 30,
  ]);
});

add_action('customize_register', function ($wp_customize) {
  $wp_customize->add_setting('yavar_facebook', [
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw',
  ]);

  $wp_customize->add_setting('yavar_twitter', [
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw',
  ]);

  $wp_customize->add_setting('yavar_linkedin', [
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw',
  ]);

  $wp_customize->add_setting('yavar_instagram', [
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw',
  ]);

  $wp_customize->add_setting('yavar_github', [
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url_raw',
  ]);
});

add_action('customize_register', function ($wp_customize) {
  // ...
  $wp_customize->add_control('yavar_facebook', [
    'label' => __('Facebook URL', 'yavar'),
    'section' => 'yavar_social_links',
    'type' => 'url',
  ]);

  $wp_customize->add_control('yavar_twitter', [
    'label' => __('Twitter URL', 'yavar'),
    'section' => 'yavar_social_links',
    'type' => 'url',
  ]);

  $wp_customize->add_control('yavar_linkedin', [
    'label' => __('LinkedIn URL', 'yavar'),
    'section' => 'yavar_social_links',
    'type' => 'url',
  ]);

  $wp_customize->add_control('yavar_instagram', [
    'label' => __('Instagram URL', 'yavar'),
    'section' => 'yavar_social_links',
    'type' => 'url',
  ]);

  $wp_customize->add_control('yavar_github', [
    'label' => __('Github URL', 'yavar'),
    'section' => 'yavar_social_links',
    'type' => 'url',
  ]);
});

function register_club_post_type()
{
  $labels = array(
    'name'                  => _x('Clubs', 'Post Type General Name', 'yavar'),
    'singular_name'         => _x('Club', 'Post Type Singular Name', 'yavar'),
    'menu_name'             => __('Clubs', 'yavar'),
    'name_admin_bar'        => __('Club', 'yavar'),
    'add_new'               => __('Add New', 'yavar'),
    'add_new_item'          => __('Add New Club', 'yavar'),
    'new_item'              => __('New Club', 'yavar'),
    'edit_item'             => __('Edit Club', 'yavar'),
    'view_item'             => __('View Club', 'yavar'),
    'all_items'             => __('All Clubs', 'yavar'),
    'search_items'          => __('Search Clubs', 'yavar'),
    'not_found'             => __('No clubs found', 'yavar'),
    'not_found_in_trash'    => __('No clubs found in Trash', 'yavar'),
  );

  $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => array('slug' => 'club'),
    'capability_type'       => 'post',
    'has_archive'           => true,
    'hierarchical'          => false,
    'menu_position'         => 5,
    'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
    'show_in_rest'          => false, // برای سازگاری با گوتنبرگ
  );

  register_post_type('club', $args);
}
add_action('init', 'register_club_post_type');

function register_club_taxonomies()
{
  $labels_type = array(
    'name'              => _x('Club Types', 'taxonomy general name', 'yavar'),
    'singular_name'     => _x('Club Type', 'taxonomy singular name', 'yavar'),
    'search_items'      => __('Search Club Types', 'yavar'),
    'all_items'         => __('All Club Types', 'yavar'),
    'parent_item'       => __('Parent Club Type', 'yavar'),
    'parent_item_colon' => __('Parent Club Type:', 'yavar'),
    'edit_item'         => __('Edit Club Type', 'yavar'),
    'update_item'       => __('Update Club Type', 'yavar'),
    'add_new_item'      => __('Add New Club Type', 'yavar'),
    'new_item_name'     => __('New Club Type Name', 'yavar'),
    'menu_name'         => __('Club Types', 'yavar'),
  );
  $args_type = array(
    'hierarchical'      => true, // مانند دسته‌ها
    'labels'            => $labels_type,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'club-type'),
  );
  register_taxonomy('club_type', array('club'), $args_type);

  // تاکسونومی برای شهرها
  $labels_city = array(
    'name'              => _x('Cities', 'taxonomy general name', 'yavar'),
    'singular_name'     => _x('City', 'taxonomy singular name', 'yavar'),
    'search_items'      => __('Search Cities', 'yavar'),
    'all_items'         => __('All Cities', 'yavar'),
    'edit_item'         => __('Edit City', 'yavar'),
    'update_item'       => __('Update City', 'yavar'),
    'add_new_item'      => __('Add New City', 'yavar'),
    'new_item_name'     => __('New City Name', 'yavar'),
    'menu_name'         => __('Cities', 'yavar'),
  );
  $args_city = array(
    'hierarchical'      => false, // مانند برچسب‌ها
    'labels'            => $labels_city,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'city'),
  );
  register_taxonomy('city', array('club'), $args_city);
}
add_action('init', 'register_club_taxonomies');
