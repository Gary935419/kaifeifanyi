// JavaScript Document

$(function(){
	// var searchex_head = $(".searchex_yuan").height();
	// var searchex_center = $(".searchex_yuan_top").height();
	// var zong = searchex_head+searchex_center;
	// console.log(document.body.scrollTop);
	// if ($(document).scrollTop > zong) {
	// 	$(".searchex_yuan_fixed").addClass("searchex_yuan_on")
	// } else {
	// 	$(".searchex_yuan_fixed").removeClass("searchex_yuan_on")
	// }

  $(".spsearch_list_top_chu").click(function() {
		$(".search_list_chumodel").toggle();
		$(this).toggleClass("spsearch_list_top_current")
	});
	$(".spsearch_list_top_shai").click(function() {
		$(".spsearrch_shai_model").toggle();
	});
	$(".spsearrch_shai_close").click(function() {
		$(".spsearrch_shai_model").hide();
	});
	$(".spsearch_list_top_time").click(function() {
		$(".search_list_timemodel").toggle();
		$(this).toggleClass("spsearch_list_top_current")
	});

	$(".spsearchex_yuan_sp_menu").click(function() {
		$(".spsearchex_yuan_sp_menumodel").show();
	});
	$(".spsearchex_yuan_sp_menuclose").click(function() {
		$(".spsearchex_yuan_sp_menumodel").hide();
	});
	$(".close").click(function() {
		$(".search_list_bottom").hide();
	});
	
    $('.top').click(function(){
           $('html , body').animate({scrollTop: 0},'slow');
      });


	  




});










