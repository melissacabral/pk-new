jQuery( document ).ready( function( $ ) {

	 /**
	  * make placeholder image height the same as the thumbnails - update as the window resizes
	  */
	 function placeholderSize(){
	 	var imgheight = $('.tile .thumb').height() ;
	 	$('.placeholder').css({
	 		'height': imgheight + 'px'
	 	});

	 	//var articleheight =  $('.tile').height() ;
	 	//$('.tile').css({
	 	//	'height': articleheight + 'px'
	 	//});
	 }
	 placeholderSize(); 
	 $(".tile .entry-title").dotdotdot();
	 $( window ).resize(function(){
	 	//reset the height
	 	$('.tile').css("height", "auto");
	 	 $(".tile .entry-title").dotdotdot(); 
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



