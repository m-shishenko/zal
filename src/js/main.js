document.addEventListener("DOMContentLoaded", () => {
  "use strict";
  function showTab() {
    let slideIndex = 1;
    const slides = document.querySelectorAll(".workouts__slider-item"),
      prev = document.querySelector(".workouts__row-btns-l"),
      next = document.querySelector(".workouts__row-btns-r");

    showSlides(slideIndex);

    function showSlides(n) {
      if (n > slides.length) {
        slideIndex = 1;
      }
      if (n < 1) {
        slideIndex = slides.length;
      }

      slides.forEach((item) => {
        item.classList.remove("show", "fade");
        item.classList.add("hide");
      });
      slides[slideIndex - 1].classList.remove("hide");
      slides[slideIndex - 1].classList.add("show", "fade");
    }

    function plusSlides(n) {
      showSlides((slideIndex += n));
    }

    prev.addEventListener("click", function () {
      plusSlides(-1);
    });

    next.addEventListener("click", function () {
      plusSlides(1);
    });
  }
  showTab();

  function slider() {
    const slides = document.querySelectorAll(".season__item"),
      prev = document.querySelectorAll(".season__btns-l"),
      next = document.querySelectorAll(".season__btns-r"),
      slidesWrapper = document.querySelector(".season__item"),
      width = window.getComputedStyle(slidesWrapper).width,
      slidesField = document.querySelector(".season__list"),
      elementBody = document.querySelector(".season__body"),
      widthElementBody = window.getComputedStyle(elementBody).width;
    let slideIndex = 1,
      offset = 0;

    slidesField.style.width = 100 * slides.length + "%";

    const arrSlides = new Array(slides);

    arrSlides.forEach((slide) => {
      slide[0].classList.add("active");
    });

    prev.forEach((item) => {
      item.addEventListener("click", () => {
        if (offset == 0) {
          offset = +width.slice(0, width.length - 2) * (slides.length - 1);
        } else {
          offset -= +width.slice(0, width.length - 2);
        }

        slidesField.style.transform = `translateX(-${offset}px)`;

        if (slideIndex == 1) {
          slideIndex = slides.length;
        } else {
          slideIndex--;
        }

        slides.forEach((item) => {
          item.classList.remove("active");
        });
        slides[slideIndex - 1].classList.add("active");
      });
    });

    next.forEach((item) => {
      item.addEventListener("click", () => {
        if (offset == +width.slice(0, width.length - 2) * (slides.length - 1)) {
          offset = 0;
        } else {
          offset += +width.slice(0, width.length - 2);
        }

        slidesField.style.transform = `translateX(-${offset}px)`;

        if (slideIndex == slides.length) {
          slideIndex = 1;
        } else {
          slideIndex++;
        }

        slides.forEach((item) => {
          item.classList.remove("active");
        });
        slides[slideIndex - 1].classList.add("active");
      });
    });
  }
  slider();

  function showMenu() {
    const btnOpen = document.querySelector(".header__wrapper-btn"),
      btnClose = document.querySelector(".popup-menu__close"),
      body = document.querySelector("body"),
      popupMenu = document.querySelector(".popup-menu");

    btnOpen.addEventListener("click", () => {
      popupMenu.classList.remove("hide", "fade-hide");
      popupMenu.classList.add("show", "fade-show");
      body.style.overflow = "hidden";
    });

    btnClose.addEventListener("click", () => {
      popupMenu.classList.remove("show", "fade-show");
      popupMenu.classList.add("hide", "fade-hide");
      body.style.overflow = "";
    });
  }
  showMenu();

  new Swiper(".swiper-container", {
    // Optional parameters
    // direction: "horizontal",
    slidesPerView: 4,
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      // when window width is >= 480px
      375: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      // when window width is >= 640px
      600: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 20,
      },
    },
  });
});
