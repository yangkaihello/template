$(".combookitem").mouseover(function(){
	var parent = $(this).parents(".ec")
	$(parent).find(".combookitem").each(function(){
		$(this).removeClass("active") 
	}) 
	$(this).addClass("active")
})
$("#tabut span").click(function(){
	$("#tabut span").each(function(){
		$(this).removeClass("active")
	})
	$(this).addClass("active")

	var i = $(this).index()
	$(".each_conten").hide()
	$(".each_conten").eq(i).show()
})

$("#setBtn").click(function(e){
	 e.stopPropagation()  
	$(".setCon_box").show()
	$(this).find(".icon_set").addClass("active")
})
$("body").click(function(){
	$(".setCon_box").hide()
	$(this).find(".icon_set").removeClass("active")
})
$(".themeBtn").click(function(e){
	var i = $(this).index()
	$("html,body").removeClass("dark green")
	if(i == 1){
		// $("html,body").removeClass("dark green")
	}
	if(i == 2){
		$("html,body").addClass("green")
	}
	if(i == 3){
		$("html,body").addClass("dark")
	}	
	e.stopPropagation()   
})
$(".reduceBtn").click(function(e){
	e.stopPropagation()   
	var getFont = Number( $(".cTextCon").css("font-size").slice(0,2) )
	$(".cTextCon").css("font-size",getFont-1 )
	$(".fontSizes").text($(".cTextCon").css("font-size"))
})
$(".addBtn").click(function(e){
	e.stopPropagation()   
	var getFont = Number( $(".cTextCon").css("font-size").slice(0,2) )
	$(".cTextCon").css("font-size",getFont+1 )
	$(".fontSizes").text($(".cTextCon").css("font-size"))
})
$(".typefaceBtn").click(function(e){
	var i = $(this).index() 
	if( i==1 ){
		$(".cTextCon").css("font-family","微软雅黑" )
	}
	if( i==2 ){
		$(".cTextCon").css("font-family","宋体" )
	}
	if( i==3 ){
		$(".cTextCon").css("font-family","cursive" )
	}
	e.stopPropagation() 
})
$(".morenbtn").click(function(e){
	$("html,body").attr("class","")	
	$(".cTextCon").attr("style","")
	$(".fontSizes").text($(".cTextCon").css("font-size"))
	e.stopPropagation() 
})
$("#catalog").click(function(){
	$(".muluBox").slideDown(100)
})
$(".closeBtn").click(function(){
	$(".muluBox").slideUp(100)
})

$(".logcloseBtn").click(function(){
	$(".shade_box").hide();
	$(".login_box").hide();
})
function hideBox(){
	$(".shade_box").hide();
	$(".xingxingbox").hide();
}
function click_grade(){
	$(".shade_box").show();
	$(".xingxingbox").show();
}