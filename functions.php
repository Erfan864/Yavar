<?php
/**
 * Yavar Theme Functions
 * 
 * @package Yavar
 * @version 1.0.0
 */

// @phpstan-ignore-file

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// 1. Using hooks
// include('functions-woohooks.php');
// 2. Using template override
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close');
add_filter('woocommerce_enqueue_styles', '__return_false');

/**
 * Theme Setup
 */
function yavar_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'header' => __('Header Menu', 'yavar'),
        'footer' => __('Footer Menu', 'yavar'),
    ));
}
add_action('after_setup_theme', 'yavar_theme_setup');

/**
 * Enqueue Styles and Scripts
 */
function yavar_enqueue_styles()
{
  // Enqueue the built CSS file from Vite (includes Tailwind + custom styles)
  wp_enqueue_style(
    'yavar-style',
    get_template_directory_uri() . '/dist/style.css',
    array(),
    filemtime(get_template_directory() . '/dist/style.css')
  );
  
  // Enqueue the built JS file from Vite
  wp_enqueue_script(
    'yavar-script',
    get_template_directory_uri() . '/dist/main.js',
    array(),
    filemtime(get_template_directory() . '/dist/main.js'),
    true
  );
  
  // Enqueue webfont if it exists
  if (file_exists(get_template_directory() . '/assets/fontiran.css')) {
    wp_enqueue_style(
      'yavar-webfont',
      get_template_directory_uri() . '/assets/fontiran.css'
    );
  }
}

add_action('wp_enqueue_scripts', 'yavar_enqueue_styles');