document.addEventListener('smartphoneCreated', ()=>{
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