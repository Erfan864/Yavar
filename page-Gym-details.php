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
          <div class="!relative swiper !w-4/5 !h-65 rounded-xl">
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
     <div class="text-center py-8">
          <h1 class="font-bold text-2xl">باشگاه تناسب اندام ستاره فیت</h1>
          <p>تخصص در فیتنس و بدن‌سازی با پیشرفته‌ترین دستگاه‌های روز دنیا، </p>
     </div>

     <hr class="w-250 h-0.25 mx-auto my-4 bg-[#b1bccc] border-0 rounded-sm md:my-10 dark:bg-gray-500">
     <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-5 px-30">
     <div class=" p-4 rounded-lg text-right text-justify">
    <h1 class="font-bold">باشگاه تناسب اندام ستاره فیت</h1>
    <p class="text-justify">
    باشگاه انرژی پارس با بیش از ۸ سال سابقه در تهران، محیطی مدرن و پویا برای ورزشکاران آماتور و حرفه‌ای فراهم می‌کند. تمرکز ما روی سلامت جسمی و روانی است، با مربیان گواهی‌دار از فدراسیون ورزشی ایران و تجهیزات وارداتی از برندهای معتبر مثل Technogym. مناسب برای خانواده‌ها و افرادی که به دنبال برنامه‌های تمرینی شخصی هستند.
    </p>
  </div>
  <div class="text-right">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/map.jpg" class="w-full h-54 object-cover rounded-lg">
    <div class="flex flex-col gap-1 mt-2 text-sm ">
      <span><i class="ti ti-map-pin"></i> نشانی: خیابان ولیعصر، بالاتر از میدان ونک، پلاک ۱۵۶۰</span>
      <span><i class="ti ti-phone"></i> تلفن:09151066952</span>
      <span><i class="ti ti-calendar-week"></i> روز های فعال: شنبه تا چهارشنبه  </span>
      <span><i class="ti ti-clock-hour-3"></i>ساعات کاری: 8 صبح تا 12 شب </span>
    </div>

    <div class="flex gap-2 mt-2 items-stretch text-4xl" dir="ltr">
     <a href="#">
        <span class="hover:scale-125 transition-transform duration-200 inline-block">
        <i class="uil uil-telegram"></i>
       </span>
     </a>
     <a href="#">
        <span class="hover:scale-125 transition-transform duration-200 inline-block">
        <i class="uil uil-instagram-alt"></i>
       </span>
     </a>
   <a href="#">
        <span class="hover:scale-125 transition-transform duration-200 inline-block">
        <i class="uil uil-whatsapp-alt"></i>
       </span>
     </a>
          
     </div>
  </div>
</div>


<div class="border-solid border-2 rounded-lg w-255 mx-auto py-10 border-[#b1bccc]">
<div dir="rtl" class="text-center py-4">
  <h3 class=" font-bold text-xl ">پکیج های باشگاه زیبایی اندام ستاره فیت</h3>
  <div class="flex justify-center space-x-4 mt-2">
    <button class="bg-[#93c6df] text-white font-bold py-2 px-4 rounded-xl">  پسران<span><i class="ti ti-man"></i></span></button>
    <button class="text-[#e5b0f4] border-[#e5b0f4] border-2  font-bold py-2 px-4 rounded-xl"> <span><i class="ti ti-woman"></i></span>دختران</button>
  </div>
</div>
<div dir="ltr" class="w-150 mx-auto bg-white border-2 border-[#ffb800] rounded-lg overflow-hidden ">
  <div class="flex justify-between items-center p-4">
    <div class="bg-[#ffb800] text-[#ffffff] font-bold py-1 px-5  rounded-full w-15">vip</div>
    <h2 class=" font-bold text-xl">پکیج آسمان</h2>
  </div>
  <div dir="rtl" class="flex justify-between px-4 pb-4">
    <div class="w-1/2 pr-2">
      <ul class="list-none space-y-2">
        <li class="flex items-center"><span class="mr-2"><i class="ti ti-calendar-week"></i></span><span class="text-sm text-right">روز های سانس: روزهای فرد</span></li>
        <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">شروع سانس: 8شب </span></li>
        <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">پایان سانس:10شب</span></li>

      </ul>
    </div>
    <div class="w-1/2 pl-2">
      <ul class="list-none space-y-2">
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-wifi"></i></span><span class="text-sm text-right">وایفای رایگان</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-massage"></i></span><span class="text-sm text-right"> ماساز رایگان</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-parking-circle"></i></span><span class="text-sm text-right">پارکینگ اختصاصی</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-wifi"></i></span><span class="text-sm text-right">وایفای رایگان</span></li>

      </ul>
    </div>
  </div>
  <div class="relative p-4 pt-0 mx-auto">
    <button class="mx-auto block bg-[#3b979a] text-white font-bold py-2 px-4 rounded-xl">رزرو حالا</button>
  </div>
</div>
<div class="flex justify-center py-10 gap-5">
  <div class="w-70 gap-5 bg-white border-2 border-[#b1bccc] rounded-lg overflow-hidden">
    <div dir="ltr" class="flex justify-between items-center p-4">
      <div class="bg-[#b1bccc] text-[#ffffff] font-bold py-1 px-3 rounded">economy</div>
      <h2 class=" font-bold text-xl">پکیج ستاره</h2>
    </div>
    <ul class="list-none space-y-2 px-4">
      <li class="flex items-center"><span class=" mr-2"><i class="ti ti-calendar-week"></i></span><span class="text-sm">روز های سانس: روزهای فرد</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">شروع سانس: 8شب </span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">پایان سانس:10شب</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-wifi"></i></span><span class="text-sm text-right">وایفای رایگان</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-parking-circle"></i></span><span class="text-sm text-right">پارکینگ اختصاصی</span></li>
    </ul>
    <div class="relative p-4 pt-4">
      <button class="mx-auto block bg-[#3b979a] text-white font-bold py-2 px-4 rounded-xl">رزرو حالا</button>
    </div>
  </div>
  <div class="w-70 gap-5 bg-white border-2 border-[#b1bccc] rounded-lg overflow-hidden">
    <div dir="ltr" class="flex justify-between items-center p-4">
      <div class="bg-[#b1bccc] text-[#ffffff] font-bold py-1 px-3 rounded">economy</div>
      <h2 class=" font-bold text-xl">پکیج ستاره</h2>
    </div>
    <ul class="list-none space-y-2 px-4">
      <li class="flex items-center"><span class=" mr-2"><i class="ti ti-calendar-week"></i></span><span class="text-sm">روز های سانس: روزهای فرد</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">شروع سانس: 8شب </span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">پایان سانس:10شب</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-wifi"></i></span><span class="text-sm text-right">وایفای رایگان</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-parking-circle"></i></span><span class="text-sm text-right">پارکینگ اختصاصی</span></li>
    </ul>
    <div class="relative p-4 pt-4">
      <button class="mx-auto block bg-[#3b979a] text-white font-bold py-2 px-4 rounded-xl">رزرو حالا</button>
    </div>
  </div>
  <div class="w-70 gap-5 bg-white border-2 border-[#b1bccc] rounded-lg overflow-hidden">
    <div dir="ltr" class="flex justify-between items-center p-4">
      <div class="bg-[#b1bccc] text-[#ffffff] font-bold py-1 px-3 rounded">economy</div>
      <h2 class=" font-bold text-xl">پکیج ستاره</h2>
    </div>
    <ul class="list-none space-y-2 px-4">
      <li class="flex items-center"><span class=" mr-2"><i class="ti ti-calendar-week"></i></span><span class="text-sm">روز های سانس: روزهای فرد</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">شروع سانس: 8شب </span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-clock-hour-3"></i></span><span class="text-sm text-right">پایان سانس:10شب</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-wifi"></i></span><span class="text-sm text-right">وایفای رایگان</span></li>
      <li class="flex items-center"><span class="mr-2"><i class="ti ti-parking-circle"></i></span><span class="text-sm text-right">پارکینگ اختصاصی</span></li>
    </ul>
    <div class="relative p-4 pt-4">
      <button class="mx-auto block bg-[#3b979a] text-white font-bold py-2 px-4 rounded-xl">رزرو حالا</button>
    </div>
  </div>
</div>
</div>



<div class="mx-auto p-8  flex flex-col justify-center items-center">
  <div class="flex justify-center mb-8 pt-10">
    <button class="px-6 py-3 font-bold rounded-lg hover:text-[#55babd]" onclick="showTab('info')">اطلاعات</button>
    <button class="px-6 py-3 font-bold rounded-lg hover:text-[#55babd]" onclick="showTab('features')">امکانات</button>
    <button class="px-6 py-3 font-bold rounded-lg hover:text-[#55babd]" onclick="showTab('comments')">دیدگاه‌ها</button>
    <button class="px-6 py-3 font-bold rounded-lg hover:text-[#55babd]" onclick="showTab('rules')">قوانین</button>
  </div>

  <div id="info" class="tab-content bg-white border border-[#b1bccc] rounded-xl p-6 mx-auto w-250">
    <div class="flex justify-between items-start">
      <div class="w-3/4 pl-16">
        <h2 class="text-2xl font-bold mb-4 text-right"> <span><i class="ti ti-info-circle"></i></span>اطلاعات</h2>
        <div class="flex justify-between">
          <div class="flex flex-col gap-1 mt-2 text-sm ">
            <span><i class="ti ti-calendar-week"></i> ساعات کاری: از ۶ صبح تا ۱۱ شب </span>
            <span><i class="ti ti-calendar-off"></i> روز های تعطیل: جمعه‌ها و تعطیلات رسمی </span>
            <span><i class="ti ti-phone"></i> تلفن: 09151066952</span>
          </div>
          <div class="flex flex-col gap-1 mt-2 text-sm ">
            <span><i class="ti ti-map-pin"></i> نشانی: خیابان ولیعصر، بالاتر از میدان ونک، پلاک ۱۵۶۰</span>
          </div>
        </div>
      </div>
      <div class="text-right w-1/4">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/map.jpg" class="w-full h-38 object-cover rounded-lg">
        <div class="flex gap-2 mt-2 items-stretch text-4xl" dir="ltr">
          <a href="#">
            <span class="hover:scale-125 transition-transform duration-200 inline-block">
              <i class="uil uil-telegram"></i>
            </span>
          </a>
          <a href="#">
            <span class="hover:scale-125 transition-transform duration-200 inline-block">
              <i class="uil uil-instagram-alt"></i>
            </span>
          </a>
          <a href="#">
            <span class="hover:scale-125 transition-transform duration-200 inline-block">
              <i class="uil uil-whatsapp-alt"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="features" class="tab-content hidden bg-white border border-[#b1bccc] rounded-xl p-6 mx-auto w-250">
    <div class="w-full pl-16">
      <h2 class="text-2xl font-bold mb-4 text-right"> <span><i class="ti ti-crosshair"></i></span>  امکانات</h2>
      <div class="flex justify-between text-lg pl-5 pr-5">
          <div class="flex flex-col gap-2 mt-2 text-lg ">
            <span><i class="ti ti-massage"></i> سالن ماساژ</span>
            <span><i class="ti ti-treadmill"></i>سالن هوازی</span>
            <span><i class="ti ti-barbell"></i>سالن بدنسازی</span>
          </div>
          <div class="flex flex-col gap-2 mt-2 text-lg ">
            <span><i class="ti ti-swimming"></i>استخر</span>
            <span><i class="ti ti-parking-circle"></i>پارکینگ اختصاصی</span>
            <span><i class="ti ti-wifi"></i>وایفای رایگان</span>

          </div>
          <div class="flex flex-col gap-2 mt-2 text-lg ">
            <span><i class="ti ti-shopping-bag"></i>بوفه</span>
            <span><i class="ti ti-bath"></i>دوش </span>
            <span><i class="ti ti-coffee"></i>کافه </span>

          </div>
        </div>
    </div>
  </div>

  <div id="comments" class="tab-content hidden bg-white border border-[#b1bccc] rounded-xl p-6 mx-auto w-250">
    <h2 class="text-2xl font-bold mb-4"> <span><i class="ti ti-messages"></i></span> دیدگاه‌ها</h2>

    <?php
      if ( comments_open() || get_comments_number() ) {
       comments_template();
      }
     ?>

  </div>

  <div id="rules" class="tab-content hidden bg-white border border-[#b1bccc] rounded-xl p-6 mx-auto w-250">
    <div class="w-full pl-16">
      <h2 class="text-2xl font-bold mb-4 text-right"> <span><i class="ti ti-scale"></i></span>  قوانین</h2>
      <div class="flex flex-col gap-2 text-sm">
        <span>رعایت قوانین سایت الزامی است.</span>
        <span>عدم رعایت قوانین منجر به مسدود شدن حساب می‌شود.</span>
        <span>پشتیبانی از ساعت ۹ صبح تا ۵ عصر انجام می‌شود.</span>
        <span>کلیه حقوق این سایت محفوظ است.</span>
      </div>
    </div>
  </div>
</div>

<script>
  function showTab(tabId) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.classList.add('hidden'));
    document.getElementById(tabId).classList.remove('hidden');
  }
  // Show the default tab (info) on page load
  document.addEventListener('DOMContentLoaded', () => {
    showTab('info');
  });
</script>

</main>





<!-- Include the footer template -->
<!-- This loads the closing body tag, footer content, and WordPress footer hooks -->
<?php get_footer() ?>