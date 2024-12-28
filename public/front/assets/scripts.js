// ===================================Banner Swipper====================================


var swiper = new Swiper(".slide-container", {
    slidesPerView: 4, 
    spaceBetween: 2, 
   slidesPerGroup: 1,
   loop:true,
   /* centerSlide: "true",
   grabCursor: "true",
   fade: "true", */
  /* loopFillGroupWithBlank: true, */
   pagination: {
     el: ".swiper-pagination",
     clickable: true,
   },
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev",
   },
   autoplay: {
     delay: 2500,
     disableOnInteraction: false,
   },
   breakpoints: {
     "@0.00": {
       slidesPerView: 1,
       /* spaceBetween: 5, */
     },
     "@0.75": {
       slidesPerView: 2,
       /* spaceBetween: 10, */
     },
     "@1.00": {
       slidesPerView: 3,
      /*  spaceBetween: 20, */
     },
     "@1.50": {
       slidesPerView: 4,
       /* spaceBetween: 40, */
     },
   },
 });


// =================================================== ENDLESS ADVENTURE=============

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}