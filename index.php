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
    
    <!-- ============================================================================
         WORDPRESS LOOP
         ============================================================================
         
         The WordPress loop displays posts/pages based on the current query.
         This is the core functionality that displays content from the database.
    -->
    <?php if (have_posts()) : ?>
        <!-- Loop through all available posts/pages -->
        <?php while (have_posts()) : the_post(); ?>
            
            <!-- ============================================================================
                 POST TITLE
                 ============================================================================
                 
                 Display the title of the current post/page.
                 Uses Tailwind CSS classes for styling with amber color theme.
            -->
            <h1 class="text-4xl font-bold text-black dark:text-white"><?php the_title(); ?></h1>
            
        <?php endwhile; ?>
    <?php endif; ?>
    
</main>

<!-- Include the footer template -->
<!-- This loads the closing body tag, footer content, and WordPress footer hooks -->
<?php get_footer()?>