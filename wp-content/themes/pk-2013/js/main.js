jQuery( document ).ready( function( $ ) {

	 /**
	  * make placeholder image height the same as the thumbnails - update as the window resizes
	  */
	 function placeholderSize(){
	 	var imgheight = $('.home main article .thumb').height() ;
	 	$('.placeholder').css({
	 		'height': imgheight + 'px'
	 	});

	 	//var articleheight =  $('.home main article').height() ;
	 	//$('.home main article').css({
	 	//	'height': articleheight + 'px'
	 	//});
	 }
	 placeholderSize(); 
	 $(".home main article .entry-title").dotdotdot();
	 $( window ).resize(function(){
	 	//reset the height
	 	$('.home main article').css("height", "auto");
	 	 $(".home main .entry-title").dotdotdot(); 
	 	 placeholderSize();	
	 	

	 });
	 //MENU TOGGLE
	 $('body').addClass('js');
 	var $menu = $('#toggle-menu'),
 	$menulink = $('.nav-toggle');
 	

 	$menulink.click(function() {
 		$menulink.toggleClass('active');
 		$menu.toggleClass('active');
  		return false;
	});


});



