document.addEventListener('articleCreated', ()=>{
  window.scrollTo(0,0);
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

// window.addEventListener('scroll', function() {
//   let current = window.pageYOffset;
//   if (prev < current) {
//     navLogo.classList.add('hide');}
//     else{
//       navLogo.classList.remove('hide');
//     }
//     prev = current;
// })

window.onscroll = function(){
  if (document.body.scrollTop > 85 || document.documentElement.scrollTop > 85){
    navLogo.classList.add('d-none');
    subNav.classList.add('navbar-down');
    
  } else {
    navLogo.classList.remove('d-none');
    subNav.classList.remove('navbar-down');
  }
}

