document.addEventListener('articleCreated', () => {
  window.scrollTo(0, 0);
})

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


const navLogo = document.getElementById('navLogo');
let prev = window.pageYOffset;
let subNav = document.getElementById('subNav');

let logos = document.querySelector('.logos');

let navbarNavDropdown = document.querySelector('#navbarNavDropdown');

// window.addEventListener('scroll', function() {
//   let current = window.pageYOffset;
//   if (prev < current) {
//     navLogo.classList.add('hide');}
//     else{
//       navLogo.classList.remove('hide');
//     }
//     prev = current;
// })


window.onscroll = function () {
  if (window.scrollY > 40) {
    // navLogo.style.animation = 'fadeOutNavBar 1s';
    logos.classList.add('d-none');
    subNav.classList.add('navbar-down', 'fixed-top');
    subNav.classList.remove('fade-in-top');
    subNav.classList.add('fade1');
    // subNav.style.animation = 'fadeInsubNav 1s';
     navbarNavDropdown.style.height = '100%';
  } else {
    // navLogo.style.animation = 'fadeInNavBar 1s';
    logos.classList.remove('d-none');
    subNav.classList.remove('navbar-down', 'fixed-top');
    subNav.classList.add('fade-in-top');
    navbarNavDropdown.style.height = 'max-content';
    subNav.classList.remove('fade1');
  }
}






