$(function() {
  $(".register-form #tongyi").change(function() {
    if (!$(this).is(":checked")) {
      $(".register-form button[type='submit']").attr("disabled", true);
      $(".register-form button[type='submit']").addClass("ds");
    } else {
      $(".register-form button[type='submit']").removeClass("ds");
      $(".register-form button[type='submit']").attr("disabled", false);
    }
  });
  function black_top() {
    var backButton = $(".back-top");
    function backToTop() {
      $("html,body").animate(
        {
          scrollTop: 0
        },
        800
      );
      return false;
    }
    backButton.on("click", backToTop);
    $(window).on("scroll", function() {
      if ($(window).scrollTop() > 400) backButton.fadeIn();
      else backButton.fadeOut();
    });
    $(window).trigger("scroll");
  }
  black_top();
});
