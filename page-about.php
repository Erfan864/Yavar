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
<main id="mainForAboutUs" class="site-main min-h-screen py-15">


  <section class="text-justify py-10 px-6">
    <div class="max-w-6xl mx-auto grid grid-cols-2 gap-8 items-start">
      <div class=" leading-relaxed">
        <h2 class="text-2xl font-bold mb-4">
          یاور، همراه همیشگی ورزشکاران
        </h2>
        <p>
          یاور کار خودش را با هدف ساده‌کردن مسیر ورزشکاران و علاقه‌مندان به تناسب‌اندام آغاز کرد.
          با همکاری مربیان تخصصی، متخصصان تغذیه و باشگاه‌های ورزشی، یاور امروز به پرطرفدارترین
          سامانه‌ی دسترسی به مربیان خصوصی، برنامه‌های غذایی و تمرین شخصی‌سازی‌شده و رزرو آنلاین
          باشگاه‌ها و سالن‌های ورزشی با ساده‌‎ترین تجربه، تبدیل شده است.
          یاور تحت پلتفرم‌ها و سرویس‌های فناوری‌های نوین ورزش فعالیت می‌کند و تلاش دارد تجربه‌ای
          ورزشی و سلامتی را برای همه لذت‌بخش، شفاف‌تر و در دسترس‌تر سازد.
        </p>
      </div>
      <div class="bg-[url('../assets/img/2.png')] dark:bg-[url('../assets/img/3.png')] rounded-lg  w-full h-70 bg-cover bg-center bg-no-repeat pt-0">
      </div>
    </div>
  </section>


  <div class="content relative bg-[url(../assets/img/1.jpg)] bg-cover bg-no-repeat bg-center flex flex-col justify-center items-center py-10 bg-fixed  z-1 h-90 backdrop-blur-md">
    <div class="absolute right-2 bottom-2">
      <?php if (function_exists("the_custom_logo")) {
        the_custom_logo();
      } ?>
    </div>
  </div>

  <section class="py-10 px-6 ">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-8">
        بخشی از تیم ما
      </h2>
      <div class="flex justify-center gap-30">
        <div class="text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/5.jpg" alt="Web Designer" class="rounded-full mx-auto mb-4 w-40 h-40 object-cover">
          <p class=" font-semibold">عرفان سعیدی</p>
          <p class="">Web Developer</p>
        </div>
        <div class="text-center">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/4.jpg" alt="Web Developer" class="rounded-full mx-auto mb-4 w-40 h-40 object-cover">
          <p class=" font-semibold">عرفان قره باغی</p>
          <p class="">Web Designer</p>
        </div>
      </div>
    </div>
  </section>

</main>




<!-- Include the footer template -->
<!-- This loads the closing body tag, footer content, and WordPress footer hooks -->
<?php get_footer() ?>