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

<body <?php body_class("min-h-screen relative flex flex-col items-stretch font-pahlavan"); ?>>

    <!-- ============================================================================
         HEADER SECTION
         ============================================================================
         
         Contains the main header content including navigation.
    -->
    <header class="sticky top-5 z-10 flex-none flex size-full p-4">

        <!-- ============================================================================
             MAIN NAVIGATION
             ============================================================================
             
             The primary navigation menu for the website.
        -->
        <nav class="flex justify-center items-center w-full py-6 bg-gray-300">

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
                     NAVIGATION MENU LIST
                     ============================================================================
                     
                     Unordered list containing navigation menu items.
                -->

                <!-- ============================================================================
                      NAVIGATION MENU ITEMS
                      ============================================================================
                      
                      Individual navigation links with styling.
                      Each link uses custom theme colors for consistent theming.
                 -->

                <?php wp_nav_menu([
                    "theme_location" => 'Header',
                    "menu_class" => "main-nav flex justify-center grow *:gap-3 *:flex *:*:size-max",
                    "container" => false
                ]);
                ?>
            </div>

        </nav>

    </header>