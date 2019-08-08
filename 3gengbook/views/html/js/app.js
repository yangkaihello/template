$(function() {
  $(".login-form").validate({
    rules: {
      username: {
        required: true,
        minlength: 2,
        maxlength: 6
      }
    },
    messages: {
      username: {
        required: "用户名不能为空",
        minlength: "用户长度应在2~6个字符之间(验证规则在app.js里面修改)",
        maxlength: "用户长度应在2~6个字符之间(验证规则在app.js里面修改)"
      },
      userpwd: {
        required: "密码不能为空"
      }
    }
  });
  $(".register-form").validate({
    rules: {
      username: {
        required: true,
        minlength: 2,
        
      },
      phone: {
        required: true,
        isMobile: true
      },
      password: {
        required: true,
        isPwd: true
      },
      password_again: {
        equalTo: "#password"
      }
    },
    messages: {
      username: {
        required: "用户名不能为空",
        minlength: "用户长度应在2~6个字符之间(规则在app.js里面修改)",
        maxlength: "用户长度应在2~6个字符之间(规则在app.js里面修改)"
      },
      code: {
        required: "验证码不能为空"
      },
      phone: {
        required: "手机号不能为空"
      },
      password: {
        required: "密码不能为空",
        isPwd: "以字母开头，长度在6-12之间(规则在app.js里面修改)"
      },
      password_again: {
        equalTo: "两次密码输入不一样！"
      },
      phone: {
        required: "手机号不能为空"
      }
    }
  });
  $(".login_flag").click(function() {
    $("#LoginModal")
      .find("label.error")
      .remove();
    $('#LoginModal a[href="#login"]').click();
  });
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
