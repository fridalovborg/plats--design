(function($) {

	// MOBILE MENU
	$( '.menu-toggle' ).click(function() {

		$('body').toggleClass('menu-active');

		$('.menu').toggleClass('active');
		
		if ($( '.menu' ).hasClass( 'active' )) {

			$('.menu').fadeIn();
		} else {
			$('.menu').fadeOut();
		}
	});

	// ZOOMVIEW
	zoomView();
	
})(jQuery);