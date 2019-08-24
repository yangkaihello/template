/**
 * Created by yangkai on 2019/8/24.
 */

$(".search-box form a").click(function (e){
    $(this).parents("form").submit();
});