jQuery( document ).ready( function( $ ) {

	 /**
	  * make placeholder image height the same as the thumbnails - update as the window resizes
	  */
	 function placeholderSize(){
	 	var imgheight = $('.home main article .thumb').height() ;
	 	$('.placeholder').css({
	 		'height': imgheight + 'px'
	 	});

	 	var articleheight =  $('.home main article').height() ;
	 	$('.home main article').css({
	 		'height': articleheight + 'px'
	 	});
	 }
	 placeholderSize(); 
	 $(".home main article h1").dotdotdot();
	 $( window ).resize(function(){
	 	//reset the height
	 	$('.home main article').css("height", "auto");
	 	 $(".home main article h1").dotdotdot(); 
	 	 placeholderSize();	
	 	

	 });


});


