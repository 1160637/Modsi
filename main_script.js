//Navigation

const dropdownItems = document.querySelectorAll(".dropdown-hover");

dropdownItems.forEach((dropdownItem) => {
  dropdownItem.addEventListener("mouseover", () => {
    dropdownItem.lastElementChild.style.cssText =
      "opacity: 1; visibility:visible";
    document.querySelector(".navbar-wrapper").style.background = "transparent";
    document.querySelector(".navbar-wrapper").style.borderBottom =
      "0.1rem solid #fff";
  });
});

dropdownItems.forEach((dropdownItem) => {
  dropdownItem.addEventListener("mouseout", () => {
    dropdownItem.lastElementChild.style.cssText =
      "opacity: 1; visibility: hidden";
    document.querySelector(".navbar-wrapper").style.background = "none";
    document.querySelector(".nav-list-item").style.borderBottom = "none";
  });
});

//Fim Navigation

Array.from(document.querySelectorAll(".navigation-button")).forEach((item) => {
  item.onclick = () => {
    item.parentElement.parentElement.classList.toggle("change");
  };
});

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
