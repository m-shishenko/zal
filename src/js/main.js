document.addEventListener("DOMContentLoaded", () => {
  function showTab() {
    let slideIndex = 1;
    const slides = document.querySelectorAll(".offer__slide"),
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

      slides.forEach((item) => item.classList.add("hide"));
      slides[slideIndex - 1].classList.remove("hide");
      slides[slideIndex - 1].classList.remove("show", "fade");
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
});
