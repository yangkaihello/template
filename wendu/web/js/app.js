/**
 * Created by yangkai on 2020/5/3.
 */

$(".login a").click(function (e){
    $(".shade_box").show();
    $(".login_box").show();
});

$("#force-login").click(function (e){
    $(".login a").click();
});


