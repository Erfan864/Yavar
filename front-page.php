<?php
/**
 * ============================================================================
 * FRONT-PAGE.PHP - HOMEPAGE TEMPLATE
 * ============================================================================
 * 
 * This template is used specifically for the homepage (front page) of the website.
 * It displays when the homepage is set to display a static page in WordPress settings.
 * 
 * WordPress Settings:
 * - Go to Settings > Reading
 * - Set "Your homepage displays" to "A static page"
 * - Select a page as your homepage
 * 
 * @package Yavar
 * @version 1.0.0
 */

// Include the header template
// This loads the HTML head, navigation, and opening body tag
get_header() ?>

<!-- ============================================================================
     HOMEPAGE MAIN CONTENT AREA
     ============================================================================
     
     This is the main content area specifically for the homepage.
     It uses Tailwind CSS classes for responsive layout and styling.
-->
<main id="main" class="site-main flex size-full grow bg-gray-50 justify-center">
    
         <!-- ============================================================================
          HOMEPAGE TITLE
          ============================================================================
          
          Display the main title for the homepage.
          Uses custom theme color for consistent theming.
     -->
    <h1 class="text-4xl font-bold text-secondary">صفحه اصلی</h1>
    
</main>

<!-- Include the footer template -->
<!-- This loads the closing body tag, footer content, and WordPress footer hooks -->
<?php get_footer() ?>