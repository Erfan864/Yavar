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
get_header();
?>

<!-- ============================================================================
     HOMEPAGE MAIN CONTENT AREA
     ============================================================================
     
     This is the main content area specifically for the homepage.
     It uses Tailwind CSS classes for responsive layout and styling.
-->
<main id="main" class="site-main min-h-screen size-full grow">

    <!-- ============================================================================
          HOMEPAGE SLIDER
          ============================================================================
     -->
    <?php
    $args = array(
        'post_type' => 'slide',
        'posts_per_page' => 5,
        'tax_query' => array(
            array(
                'taxonomy' => 'slider_group',
                'field'    => 'slug',
                'terms'    => 'تبلیغاتی',
            ),
        ),
    );
    $slider_query = new WP_Query($args);

    if ($slider_query->have_posts()) : ?>
        <div class="!relative swiper !w-4/5 !h-100 rounded-lg">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                    <!-- Slide -->
                    <div class="swiper-slide !m-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full">
                        <?php else : ?>
                            <img src="https://via.placeholder.com/1200x600?text=<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
                        <?php endif; ?>
                        <div class="absolute lg:px-10 gap-2 inset-0 flex flex-col items-start justify-center bg-neutral/30 dark:bg-zinc-900/30">
                            <h2 class="text-accent text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold"><?php the_title(); ?></h2>
                            <div class="swiper-content">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination !left-1/2 !w-auto px-2 py-1 bg-neutral dark:bg-zinc-900/50 rounded-lg"></div>
        </div>
    <?php
        wp_reset_postdata();
    else :
        echo '<p>' . __('هیچ اسلایدی یافت نشد.', 'textdomain') . '</p>';
    endif;
    ?>

    <section class="py-10">
        <div class="container mx-auto px-4">
            <!-- Add your section content here -->
        </div>
    </section>

</main>

<!-- Include the footer template -->
<?php get_footer(); ?>