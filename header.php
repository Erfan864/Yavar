<?php

/**
 * ============================================================================
 * HEADER.PHP - HEADER TEMPLATE
 * ============================================================================
 * 
 * This template contains the header section of the website.
 * It includes the HTML head, meta tags, and main navigation.
 * 
 * @package Yavar
 * @version 1.0.0
 */

// Prevent direct access to this file for security
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<!-- ============================================================================
     HTML DOCUMENT SETUP
     ============================================================================
     
     Set up the HTML document with proper language attributes and RTL direction
     for Persian/Arabic text support.
-->
<html <?php language_attributes(); ?> dir="rtl">

<!-- ============================================================================
     HTML HEAD SECTION
     ============================================================================
     
     Contains meta tags, character encoding, viewport settings,
     and WordPress head hooks for scripts and styles.
-->

<head>
    <!-- Character encoding for proper text display -->
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Viewport meta tag for responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- XFN (XHTML Friends Network) profile link -->
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- WordPress head hook - loads scripts, styles, and other head content -->
    <?php wp_head(); ?>
</head>

<!-- ============================================================================
     BODY ELEMENT
     ============================================================================
     
     The body element contains all visible content.
     WordPress body_class() adds dynamic CSS classes based on current page.
-->

<body <?php body_class("min-h-screen bg-neutral dark:bg-sea-600 relative flex flex-col items-stretch transition-colors ease-in-out duration-300"); ?>>
    <!-- ============================================================================
         HEADER SECTION
         ============================================================================
         
         Contains the main header content including navigation.
    -->
    <header class="sticky top-0 z-10 flex flex-shrink-0 size-full py-3 px-25 font-bold">

        <!-- ============================================================================
             MAIN NAVIGATION
             ============================================================================
             
             The primary navigation menu for the website.
        -->
        <nav class="flex justify-center items-center w-full dark:bg-sea-700/50 text-sea-600 dark:text-beige-100 bg-beige-300/90 backdrop-blur-md shadow-md shadow-sea-600 dark:shadow-beige-100 rounded-lg overflow-hidden lg:py-1">

            <!-- ============================================================================
                 NAVIGATION CONTAINER
                 ============================================================================
                 
                 Container for logo and navigation menu items.
            -->
            <div class="flex justify-between items-center w-full px-4">

                <!-- ============================================================================
                     CUSTOM LOGO
                     ============================================================================
                     
                     Display the custom logo if it exists.
                     The logo will have custom classes applied via functions.php
                -->
                <div class="flex-shrink-0">
                    <?php if (function_exists("the_custom_logo")) {
                        the_custom_logo();
                    } ?>
                </div>

                <!-- ============================================================================
                      NAVIGATION MENU ITEMS
                      ============================================================================
                -->
                <?php wp_nav_menu([
                    "theme_location" => 'header',
                    "menu_class" => "main-nav grow flex justify-center gap-3",
                    "container" => false,
                ]);
                ?>
                <div class="flex-shrink-0 flex justify-center items-center gap-2">
                    <div class="flex justify-center items-center gap-2">
                        <?php if (is_user_logged_in()) { ?>
                            <a href="<?php echo wp_logout_url(home_url()); ?>" class="header-link logout-link bg-secondary px-3 py-1.5 rounded-lg text-beige-100">خروج</a>
                        <?php } else { ?>
                            <a href="<?php echo wc_get_page_permalink('myaccount'); ?>" class="header-link login-link bg-secondary px-3 py-1.5 rounded-lg text-beige-100">ورود</a>
                            <a href="<?php echo wc_get_page_permalink('myaccount'); ?>#register" class="header-link register-link bg-secondary px-3 py-1.5 rounded-lg text-beige-100">ثبت‌نام</a>
                        <?php } ?>
                    </div>

                    <button id="theme-switch" class="size-12">
                        <div class="text-5xl block dark:hidden">
                            <i class="uil uil-sun"></i>
                        </div>
                        <div class="text-5xl dark:block hidden">
                            <i class="uil uil-moon"></i>
                        </div>
                    </button>
                </div>

            </div>

        </nav>

    </header>