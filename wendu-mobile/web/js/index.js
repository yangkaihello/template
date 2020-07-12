// index.js
// 
// 
$(function() {
  var mySwiper = new Swiper ('.swiper-container', {
    loop: true,
    // 如果需要分页器
    pagination: '.swiper-pagination',
    // 如果需要前进后退按钮
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    autoplay: 2000,
    speed: 600
  })
})
