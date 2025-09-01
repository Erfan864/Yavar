<?php

/**
 * Yavar Theme Functions
 * 
 * This file contains all the core functionality for the Yavar WordPress theme.
 * It includes theme setup, enqueue scripts and styles, and various WordPress hooks.
 * 
 * @package Yavar
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
 * 
 * This function sets up all the basic WordPress theme features including
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
    'footer' => __('Footer Menu', 'yavar'),    // Secondary navigation in footer
  ));
}
// Hook the theme setup function to run after theme is loaded
add_action('after_setup_theme', 'yavar_theme_setup');

// ============================================================================
// STYLES AND SCRIPTS ENQUEUE FUNCTION
// ============================================================================
/**
 * Enqueue theme stylesheets and JavaScript files
 * 
 * This function loads all the necessary CSS and JS files for the theme.
 * It uses filemtime() for cache busting to ensure updated files are loaded.
 * All files are loaded in the proper order with dependencies.
 */
function yavar_enqueue_styles()
{
  // Enqueue IranYekan font (Persian web font)
  // This font is used for Persian text display
  wp_enqueue_style(
    'IranYekan-webfont',                              // Handle name for the font
    get_template_directory_uri() . "/assets/font/IranYekan/fontiran.css", // Font CSS file path
  );

  // Enqueue Pahlavan font (Persian web font)
  // This font is used as the primary font for the theme
  wp_enqueue_style(
    'Pahlavan-webfont',                               // Handle name for the font
    get_template_directory_uri() . "/assets/font/Pahlavan/pahlavan.css", // Font CSS file path
  );


  // Enqueue main theme stylesheet
  $style_file = get_template_directory() . '/style.css';
  wp_enqueue_style(
    'yavar-style',                                    // Handle name for the stylesheet
    $style_file,                                      // Path to the stylesheet
    array(),                                          // Dependencies (none in this case)
    $style_file                                    // Version number for cache busting
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


  // Enqueue the compiled JavaScript file from Vite build process
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
    array(),                                          // Dependencies (none in this case)
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

/* function custom_nav_menu_li_classes($classes, $item, $args)
{
  if ($args->theme_location == 'Header') {
    $classes = array_filter($classes, function ($class) {
      return !in_array($class, ['menu-item', 'menu-item-type-post_type', 'menu-item-object-page']);
    });
    $normal = ' text-primary hover:text-secondary px-4 py-2';
    $active = ' bg-gray-100 dark:bg-gray-800';
    $yavarClasses = $item->current ? $active : $normal;
    $classes[] = $yavarClasses;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'custom_nav_menu_li_classes', 50, 3); */

function add_tailwind_classes_to_menu_links($atts, $page){
  $normal = ' text-primary hover:text-secondary px-4 py-2';
  $active = ' bg-red-500 dark:bg-gray-800';
  $yavarClasses = (get_the_ID() == $page->ID) ? $active : $normal;
  // Check if 'class' key exists and is not null
  if (!isset($atts['class'])) {
      $atts['class'] = '';
  }
  // Append the classes to the existing class string
  $atts['class'] .= $yavarClasses;
  return $atts;
}
add_filter('page_menu_link_attributes', 'add_tailwind_classes_to_menu_links', 10, 2);