<?php get_header() ?>
<main id="main" class="site-main min-h-screen bg-gray-50">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <h1 class="text-4xl font-bold text-amber-600"><?php the_title(); ?></h1>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer()?>