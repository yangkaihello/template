// indxe.js
// 
$(function() {
  $('.nav-item').on('click', function() {
    $(this).addClass('active').siblings().removeClass('active')
  })
})