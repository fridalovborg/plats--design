(function($) {

	// mobile menu
	$( '.menu-toggle' ).click(function() {

		$('body').toggleClass('menu-active');

		$('.menu').toggleClass('active');
		
		if ($( '.menu' ).hasClass( 'active' )) {

			$('.menu').fadeIn();
			$('header').addClass('header');
		} else {
			$('.menu').fadeOut();
		}
	});

	// zoomview
	zoomView();
	
})(jQuery);