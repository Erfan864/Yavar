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
<footer class="flex-none flex size-full justify-center items-center py-5 bg-beige-300 dark:bg-sea-700/50 text-sea-600 dark:text-beige-100">

     <!-- ============================================================================
         FOOTER TEXT
         ============================================================================
         
         Display footer text content.
         Currently shows a placeholder message in Persian.
    -->
     <div class="flex md:flex-row w-full gap-2 lg:gap-4 mx-5">
          <div class="basis-1/4 flex flex-col items-center">
               <?php if (function_exists("the_custom_logo")) {
                    the_custom_logo();
               } ?>
          </div>
          <div class="basis-1/4 flex flex-col items-start gap-2">
               <h1 class="text-2xl font-bold mr-3">اطلاعات</h1>
               <?php wp_nav_menu([
                    "theme_location" => 'footer_menu_1',
                    "menu_class" => "footer-nav-1",
                    "container" => false
               ]);
               ?>
          </div>
          <div class="basis-1/4 flex flex-col items-start gap-2">
               <h1 class="text-2xl font-bold mr-3">کاربران</h1>
               <?php wp_nav_menu([
                    "theme_location" => 'footer_menu_2',
                    "menu_class" => "footer-nav-2",
                    "container" => false
               ]);
               ?>
          </div>
          <div class="basis-1/4 flex flex-col items-start gap-2">
               <h1 class="text-2xl font-bold mr-3">ارتباط با ما</h1>
               <?php
               $facebook_url = get_theme_mod('yavar_facebook');
               $twitter_url = get_theme_mod('yavar_twitter');
               $linkedin_url = get_theme_mod('yavar_linkedin');
               $instagram_url = get_theme_mod('yavar_instagram');
               $github_url = get_theme_mod('yavar_github');
               ?>
               <div class="flex flex-col items-start gap-2">
                    <div class="flex gap-1 items-center">
                         <i class="text-2xl font-bold ti ti-phone"></i>
                         <span>09944685007</span>
                    </div>
                    <div class="flex gap-1 items-start">
                         <i class="text-2xl font-bold ti ti-map-pin"></i>
                         <span>مشهد، هاشمیه 2، پلاک 10</span>
                    </div>
                    <div id="neshanMapContainer" class="h-40 w-full rounded-lg"></div>
                    <div class="social-media-links text-xl flex gap-3 self-center">
                         <?php if ($facebook_url) : ?>
                              <a href="<?php echo esc_url($facebook_url); ?>" target="_blank">
                                   <i class="text-2xl font-bold ti ti-brand-facebook"></i>
                              </a>
                         <?php endif; ?>

                         <?php if ($twitter_url) : ?>
                              <a href="<?php echo esc_url($twitter_url); ?>" target="_blank">
                                   <i class="text-2xl font-bold ti ti-brand-x"></i>
                              </a>
                         <?php endif; ?>

                         <?php if ($linkedin_url) : ?>
                              <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank">
                                   <i class="text-2xl font-bold ti ti-brand-linkedin"></i>
                              </a>
                         <?php endif; ?>

                         <?php if ($instagram_url) : ?>
                              <a href="<?php echo esc_url($instagram_url); ?>" target="_blank">
                                   <i class="text-2xl font-bold ti ti-brand-instagram"></i>
                              </a>
                         <?php endif; ?>

                         <?php if ($github_url) : ?>
                              <a href="<?php echo esc_url($github_url); ?>" target="_blank">
                                   <i class="text-2xl font-bold ti ti-brand-github"></i>
                              </a>
                         <?php endif; ?>
                    </div>
               </div>
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