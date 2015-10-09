// JavaScript Document

$(document).ready(function(){	
	if ($(window).width()<=660)
	{
		$(".inline").colorbox({
			inline:true,
			width:"100px"
		});
	}
	
	else
	
	{
		$(".inline").colorbox({
			inline:true,
			width:"606px"
		});
	}
	$("#click").click(function(){ 
		$('#click');
		return false;
	});
});