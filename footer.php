<?php
/**
 * ============================================================================
 * FOOTER.PHP - FOOTER TEMPLATE
 * ============================================================================
 * 
 * This template contains the footer section of the website.
 * It includes WordPress footer hooks and closing HTML tags.
 * 
 * @package Yavar
 * @version 1.0.0
 */

// WordPress footer hook - loads necessary scripts and admin bar
// This is required for proper WordPress functionality
wp_footer(); ?>

<!-- ============================================================================
     FOOTER CONTENT AREA
     ============================================================================
     
     This is the main footer content area.
     It uses Tailwind CSS classes for responsive layout and styling.
-->
<footer class="flex-none flex size-full justify-center items-center py-5 bg-neutral dark:bg-zinc-950 dark:text-neutral">
    
    <!-- ============================================================================
         FOOTER TEXT
         ============================================================================
         
         Display footer text content.
         Currently shows a placeholder message in Persian.
    -->
         <div class="flex h-[20vh]">
          <div class="basis1/3">

          </div>
          <div class="basis1/3">

          </div>
          <div class="basis1/3">
               
          </div>
         </div>
</footer>

<!-- ============================================================================
     CLOSING HTML TAGS
     ============================================================================
     
     Close the body and html tags that were opened in header.php.
     These tags are essential for valid HTML structure.
-->
</body>
</html>