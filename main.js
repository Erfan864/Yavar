import "./style.css";
import { setupCounter } from "./lib/main.js";
// import Swiper from "swiper/bundle";
// import "swiper/css/bundle";

// متغیرها را در بالاترین سطح تعریف کنید، اما مقداردهی را به داخل DOMContentLoaded منتقل کنید
var mapType, mapContainer, mapContainerAbout;

//API_KEY
/* با مراجعه به پنل کاربری خود می توانید کلید دسترسی لازم برای نمایش نقشه را ایجاد نمائید
 * توجه فرمائید کلید دسترسی ای که در پنل خود برای نمایش نقشه ایجاد میکنید حتما از نوع نمایش نقشه وب باشد
 *
 * https://platform.neshan.org/panel/api-key
 *
 * */
const API_KEY = "web.1ef4ffe0fb294b229fcc45a82686f32a";

/* رنگ آیکون مرکز نقشه */
const neshanMarkerColor = "#EB5E60";

/* موقعیت مرکز نقشه برای نمایش به کاربر و افزودن آیکون بر روی آن
 *
 * برای بدست آوردن مختصات مورد نظر خود می توانید به نقشه وب نشان مراجعه کنید با کلیک راست کردن بر روی محل مورد نظرتان گزینه "کپی مختصات این نقطه" انتخاب کنید
 * تا برای شما مختصات در حافظه کپی شود و سپس مقادیر کپی شده را در قسمت زیر الصاق کنید
 *
 * https://neshan.org/maps
 *
 * */
const mapCenterLocation = [59.515385299958695, 36.3219370667782]; //latitude,longitude

// show poi and traffic on map
/* در صورتی که میخواید بر روی نقشه خود اطلاعات ترافیکی به همراه مکان های مختلف مثل مغازه ها، مجتمع ها، فروشگاه ها، بیمارستان ها و ... نیز نمایش داده شوند کافیست مقادیر را مانند زیر تغییر نمائید */

//نمایش مکان های منتخب:
const poi = true;
//عدم نمایش مکان های منتخب:
//const poi = false;

//نمایش ترافیک
//const traffic= true;
//عدم نمایش ترافیک
const traffic = false;

/* میزان زوم نقشه بر روی محل مرکز نقشه هر چقدر این مقدار بزرگ تر باشد به معنی این است که به سطح زمین نزدیکتر هستیم و محدوده کوچکتری را مشاهده میکنیم در نقشه */
const mapZoom = 13;

// Create map object
const createMapObj = (container, TypeControllerStatus) => {
  // بررسی کنید که container مقداردهی شده باشد
  if (container) {
    let map = new nmp_mapboxgl.Map({
      mapType: mapType,
      container: container,
      zoom: mapZoom,
      pitch: 0,
      center: mapCenterLocation,
      minZoom: 2,
      maxZoom: 21,
      trackResize: true,
      mapKey: API_KEY,
      poi: poi,
      traffic: traffic,
      mapTypeControllerStatus: {
        show: TypeControllerStatus,
        position: "bottom-right",
      },
    });

    // get user location on map
    /* در صورتی که نیازی ندارید که موقعیت کاربر را دریافت کنید میتوانید کد های این قسمت را پاک نماید */
    map.addControl(
      new nmp_mapboxgl.GeolocateControl({
        positionOptions: { enableHighAccuracy: true },
        trackUserLocation: true,
        showUserHeading: true,
      })
    );
    /* پایان قسمت کد های گرفتن موقعیت کاربر  */

    // add marker to the map
    /* در صورتی که نیازی به افزودن مارکر بر روی نقشه خود ندارید می توانید کد های این قسمت را پاک نمائید  */
    const marker = new nmp_mapboxgl.Marker({
      color: neshanMarkerColor,
      draggable: false,
    })
      .setLngLat(mapCenterLocation)
      .addTo(map);
    /* پایان قسمت کد های افزودن مارکر به نقشه  */
  }
};

// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
  // اینجا mapContainer را مقداردهی کنید
  mapContainer = document.getElementById("neshanMapContainer");
  mapContainerAbout = document.getElementById("neshanMapContainerAbout");

  // Initialize counter if element exists
  const counterElement = document.querySelector("#counter");
  if (counterElement) {
    setupCounter(counterElement);
  }

  // Initialize Swiper slider
  const swiperElement = document.querySelector(".swiper");
  if (swiperElement) {
    const swiper = new Swiper(swiperElement, {
      direction: "horizontal",
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        1024: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
      },
    });
  }

  // Theme Mode Switcher
  document.documentElement.classList.toggle(
    "dark",
    localStorage.theme === "dark" ||
      (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
  );

  // Add smooth scrolling for anchor links
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  anchorLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Add mobile menu toggle functionality
  const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
  const mobileMenu = document.querySelector(".mobile-menu");

  if (mobileMenuToggle && mobileMenu) {
    mobileMenuToggle.addEventListener("click", function () {
      mobileMenu.classList.toggle("active");
      this.classList.toggle("active");
    });
  }

  // Add scroll effects for header
  window.addEventListener("scroll", function () {
    const header = document.querySelector(".site-header");
    if (header) {
      if (window.scrollY > 100) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    }
  });

  // Initialize service-specific functionality
  initializeServices();

  // Theme switch functionality
  const themeSwitch = document.getElementById("theme-switch");

  const setDarkMode = () => {
    document.body.setAttribute("data-theme", "dark");
    localStorage.setItem("theme", "dark");
    mapType = nmp_mapboxgl.Map.mapTypes.neshanVectorNight;
    createMapObj(mapContainer, false);
    createMapObj(mapContainerAbout, true);
  };

  const setLightMode = () => {
    document.body.setAttribute("data-theme", "light");
    localStorage.setItem("theme", "light");
    mapType = nmp_mapboxgl.Map.mapTypes.neshanVector;
    createMapObj(mapContainer, false);
    createMapObj(mapContainerAbout, true);
  };

  const switchTheme = localStorage.getItem("theme");
  if (switchTheme === "dark") {
    setDarkMode();
  } else if (
    !switchTheme &&
    window.matchMedia("(prefers-color-scheme: dark)").matches
  ) {
    setDarkMode();
  } else {
    setLightMode();
  }

  themeSwitch.addEventListener("click", () => {
    const currentTheme = document.body.getAttribute("data-theme");
    if (currentTheme === "dark") {
      setLightMode();
    } else {
      setDarkMode();
    }
  });

  window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", (e) => {
      if (!localStorage.getItem("theme")) {
        e.matches ? setDarkMode() : setLightMode();
      }
    });
});

// Service-specific functionality
function initializeServices() {
  const serviceCards = document.querySelectorAll(".service-card");
  serviceCards.forEach((card) => {
    card.addEventListener("click", function () {
      console.log("Service card clicked:", this.dataset.service);
    });
  });

  const contactForm = document.querySelector("#contact-form");
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();
      console.log("Contact form submitted");
    });
  }
}
