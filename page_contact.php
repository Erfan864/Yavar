<?php
/**
 * ============================================================================
 * INDEX.PHP - MAIN TEMPLATE FILE
 * ============================================================================
 * 
 * This is the main template file for the Yavar WordPress theme.
 * It serves as the fallback template when no other specific template exists.
 * 
 * Template Hierarchy:
 * - If a specific template exists (single.php, page.php, etc.), it will be used
 * - If no specific template exists, this index.php file will be used
 * 
 * @package Yavar
 * @version 1.0.0
 */

// Include the header template
// This loads the HTML head, navigation, and opening body tag
get_header() ?>

<!-- ============================================================================
     MAIN CONTENT AREA
     ============================================================================
     
     This is the primary content area of the page.
     It uses Tailwind CSS classes for styling and layout.
-->
<main id="main" class="site-main min-h-screen">
    <?= do_shortcode('[contact-form-7 id="45b8039" title="ارتباط با ما"]'); ?>
 </main>




<!-- Include the footer template -->
<!-- This loads the closing body tag, footer content, and WordPress footer hooks -->
<?php get_footer()?>