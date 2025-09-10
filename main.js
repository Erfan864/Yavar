import "./style.css";
import { setupCounter } from "./lib/main.js";
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle'; 

// Wait for DOM to be fully loaded
document.addEventListener("DOMContentLoaded", function () {
  // Initialize counter if element exists
  const counterElement = document.querySelector("#counter");
  if (counterElement) {
    setupCounter(counterElement);
  }

  // Initialize Swiper slider
  const swiperElement = document.querySelector('.swiper');
  if (swiperElement) {
    const swiper = new Swiper('.swiper', {
      direction: 'horizontal',
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      // Responsive breakpoints
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 0, // فاصله بین اسلایدها حذف شده
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

// Theme switch functionality
const themeSwitch = document.getElementById("theme-switch");

const setDarkMode = () => {
  document.body.setAttribute("data-theme", "dark");
  localStorage.setItem("theme", "dark");
};

const setLightMode = () => {
  document.body.setAttribute("data-theme", "light");
  localStorage.setItem("theme", "light");
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