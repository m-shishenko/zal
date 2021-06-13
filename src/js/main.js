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
    const btnOpen = document.querySelector(".button_burger"),
      btnClose = document.querySelector(".popup-menu__close-btn"),
      body = document.querySelector("body"),
      linkElement = document.querySelectorAll(".popup-menu__item > a"),
      popupMenu = document.querySelector(".popup-menu"),
      popupMenuBtn = document.querySelector(".popup-menu__inner > a");

    function openMenu() {
      popupMenu.classList.remove("close");
      popupMenu.classList.add("open");
      body.style.overflow = "hidden";
    }

    function closeMenu() {
      popupMenu.classList.remove("open");
      popupMenu.classList.add("close");
      body.style.overflow = "";
    }

    btnOpen.addEventListener("click", () => {
      openMenu();
    });

    popupMenu.addEventListener("click", (e) => {
      const target = e.target;
      if ((target && target == popupMenu) || target == btnClose) {
        closeMenu();
      }
    });

    linkElement.forEach((item) => {
      item.addEventListener("click", () => {
        closeMenu();
      });
    });

    popupMenuBtn.addEventListener("click", () => {
      closeMenu();
    });
  }
  showMenu();

  function validInputTel() {
    const input = document.querySelector("#phone");

    input.addEventListener("input", () => {
      input.value = input.value.replace(/\D/g, "");
    });
  }
  validInputTel();

  function scrolling() {
    let links = document.querySelectorAll('[href^="#"]'),
      speed = 0.3;

    links.forEach((link) => {
      link.addEventListener("click", function (event) {
        event.preventDefault();

        let widthTop = document.documentElement.scrollTop,
          hash = this.hash,
          toBlock = document.querySelector(hash).getBoundingClientRect().top,
          start = null;

        requestAnimationFrame(step);

        function step(time) {
          if (start === null) {
            start = time;
          }

          let progress = time - start,
            r =
              toBlock < 0
                ? Math.max(widthTop - progress / speed, widthTop + toBlock)
                : Math.min(widthTop + progress / speed, widthTop + toBlock);

          document.documentElement.scrollTo(0, r);

          if (r != widthTop + toBlock) {
            requestAnimationFrame(step);
          } else {
            location.hash = hash;
          }
        }
      });
    });
  }
  scrolling();

  new Swiper(".swiper-container", {
    // Optional parameters
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
