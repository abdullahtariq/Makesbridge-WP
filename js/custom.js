$(document).ready(function(){
	// SMOOTH JUMP
	$('.smooth_jump').bind('click',function(event){
		var $anchor = $(this);

		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1000,'easeInOutQuad');
		event.preventDefault();
	});
	//tab
	$('#tab-container').easytabs();
	
}); 




	



