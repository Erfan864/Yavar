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
        <div class="!relative swiper !w-4/5 !h-100 rounded-xl">
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
                        <div class="absolute lg:px-10 gap-2 inset-0 flex flex-col items-start justify-center bg-linear-to-r to-sea-600/65 via-neutral/10 from-netural-100/0 bg-zinc-900/30">
                            <h2 class="text-carrot-100 drop-shadow-sm drop-shadow-beige-300 text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold"><?php the_title(); ?></h2>
                            <div class="swiper-content">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination !left-1/2 !w-auto px-2 py-1 dark:bg-sea-700/50 bg-beige-300/50 backdrop-blur-md rounded-lg"></div>
        </div>
    <?php
        wp_reset_postdata();
    else :
        echo '<p>' . __('هیچ اسلایدی یافت نشد.', 'textdomain') . '</p>';
    endif;
    ?>

    <section class="w-full py-10">
        <div class="flex w-full flex-col justify-center items-center h-84 text-sea-600 dark:text-beige-100">
            <h1 class="text-4xl font-bold">چرا <span class="text-secondary ">یاور</span> را انتخاب کنیم؟</h1>
            <!-- Add your section content here -->
            <div class="flex justify-center gap-2 size-full px-20 text-xl">

                <div class="basis-1/3 flex flex-col h-full justify-center items-end gap-5">
                    <div dir="ltr" class="w-90 text-center py-4 px-4 bg-beige-300 dark:bg-sea-700 rounded-lg">ثبت‌نام رایگان مکان‌های ورزشی</div>
                    <div dir="ltr" class="w-90 text-center py-4 px-4 bg-beige-300 dark:bg-sea-700 rounded-lg ml-12">پرداخت امن و سریع خدمات ورزشی</div>
                    <div dir="ltr" class="w-90 text-center py-4 px-4 bg-beige-300 dark:bg-sea-700 rounded-lg">ارتباط مستقیم با مربیان و متخصصان</div>
                </div>
                <div class="w-84 flex flex-col h-full">
                    <img class="h-full object-contain drop-shadow-md drop-shadow-sea-600 dark:drop-shadow-beige-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/yavar-figure.png" alt="yavar figure" />
                </div>
                <div class="basis-1/3 flex flex-col h-full justify-center items-start gap-5">
                    <div class="w-90 text-center py-4 px-4 bg-beige-300 dark:bg-sea-700 rounded-lg">رزرو آنلاین مجموعه‌های ورزشی</div>
                    <div class="w-90 text-center py-4 px-4 bg-beige-300 dark:bg-sea-700 rounded-lg mr-12">پنل اختصاصی برای هر کاربر</div>
                    <div class="w-90 text-center py-4 px-4 bg-beige-300 dark:bg-sea-700 rounded-lg">مشاهده و مقایسه قیمت‌ها</div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full py-10 text-sea-600 dark:text-beige-100 flex justify-center items-center">
        <div class="flex flex-col items-center px-7 py-6 gap-5 w-4/5 rounded-xl bg-beige-300 dark:bg-sea-700">
            <h1 class="text-4xl font-bold">سوالات متداول</h1>
            <details class="w-full flex flex-col p-4 bg-beige-100 dark:bg-sea-600 shadow-md shadow-sea-600 dark:shadow-beige-100 rounded-lg">
                <summary class="text-lg font-bold cursor-pointer">آیا می‌تونم برنامه تمرینی و غذایی شخصی داشته باشم؟</summary>
                <div class="mr-4">
                    <p>بعد از ثبت‌نام در پنل شخصی‌تون، کافیست اطلاعات فردی خودتون (مثل قد، وزن و هدف) رو کامل کنید. دو روش پیش رو دارید: اول، می‌تونید برنامه‌های آماده سایت که بر اساس اطلاعات بدنی شما طراحی شدن رو خریداری کنید. دوم، با انتخاب مربی‌های داخل سایت و زدن دکمه "درخواست برنامه تمرینی یا غذایی"، مربی مربوطه اطلاعات شما رو بررسی کرده و نمونه اولیه برنامه رو ارسال می‌کنه. در هر دو روش، بعد از پرداخت وجه، برنامه شخصی‌تون به صورت کامل و با جزئیات در پنل شخصی قابل دسترسی خواهد بود</p>
                </div>
            </details>
            <details class="w-full flex flex-col p-4 bg-beige-100 dark:bg-sea-600 shadow-md shadow-sea-600 dark:shadow-beige-100 rounded-lg">
                <summary class="text-lg font-bold cursor-pointer">چطور می‌تونم مکان ورزشی خودم رو در یاور ثبت کنم؟</summary>
                <div class="mr-4">
                    <p>بعد از ثبت‌نام در پنل شخصی‌تون، کافیست از قسمت سایدبار گزینه "مجموعه‌ها" رو انتخاب کنید، سپس با زدن دکمه "افزودن مجموعه جدید"، اطلاعات مکان‌تون (مثل آدرس، امکانات و تعرفه‌ها) رو به‌طور کامل وارد کنید. بعد از این مرحله، تیم ما اطلاعات رو بررسی می‌کنه و پس از تأیید، مجموعه شما در سایت قابل نمایش خواهد بود!</p>
                </div>
            </details>
            <details class="w-full flex flex-col p-4 bg-beige-100 dark:bg-sea-600 shadow-md shadow-sea-600 dark:shadow-beige-100 rounded-lg">
                <summary class="text-lg font-bold cursor-pointer">هزینه عضویت در یاور چقدره؟</summary>
                <div class="mr-4">
                    <p>عضویت پایه رایگانه و فقط برای خدمات اضافی مثل برنامه‌های غذایی و تمرینی و... هزینه جداگانه ای محاسبه میشواد که جزئیاتش رو می‌تونید در بخش تعرفه‌ها ببینید</p>
                </div>
            </details>
            <details class="w-full flex flex-col p-4 bg-beige-100 dark:bg-sea-600 shadow-md shadow-sea-600 dark:shadow-beige-100 rounded-lg">
                <summary class="text-lg font-bold cursor-pointer">وقتی خریدی مثل پنل اشتراکی، برنامه تمرینی یا غذایی انجام می‌دم، چطور میتونیم رسید پراختم رو دریافت می‌کنم؟</summary>
                <div class="mr-4">
                    <p>بعد از ثبت‌نام در پنل شخصی‌تون، کافیست وجه رو از طریق کیف پول پرداخت کنید. پس از پرداخت، رسید الکترونیک به پنل شما ارسال می‌شه و خیال‌تون راحت باشه که پرداختتون به‌درستی ثبت می‌شه</p>
                </div>
            </details>
            <details class="w-full flex flex-col p-4 bg-beige-100 dark:bg-sea-600 shadow-md shadow-sea-600 dark:shadow-beige-100 rounded-lg">
                <summary class="text-lg font-bold cursor-pointer">در صورت بروز مشکل، چطور می‌تونم با پشتیبانی ارتباط بر قرار کنم؟</summary>
                <div class="mr-4">
                    <p>بعد از ثبت‌نام در صفحه "ارتباط با ما"، با تیم ما ارتباط برقرار کنید. ما با کمال خوشحالی مشکل‌تون رو در اسرع وقت پیگیری می‌کنیم!</p>
                </div>
            </details>
            <details class="w-full flex flex-col p-4 bg-beige-100 dark:bg-sea-600 shadow-md shadow-sea-600 dark:shadow-beige-100 rounded-lg">
                <summary class="text-lg font-bold cursor-pointer">چطور می‌تونم فیدبک یا پیشنهادم رو برای بهبود سایت به شما بگم؟</summary>
                <div class="mr-4">
                    <p>بعد از ثبت‌نام در پنل شخصی‌تون، کافیست به قسمت "ارتباط با ما" برید و فیدبک یا پیشنهادتون رو ارسال کنید. با کمک شما می‌تونیم سایت رو بهتر کنیم و تجربه کاربری رو بهبود بدیم!</p>
                </div>
            </details>
        </div>
    </section>

</main>

<!-- Include the footer template -->
<?php get_footer(); ?>