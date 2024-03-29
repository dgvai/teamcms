(function($) {
	"use strict"
	$(window).on('load', function() {
		$("#preloader").delay(600).fadeOut();
	});

	$('body').scrollspy({
		target: '#nav',
		offset: $(window).height() / 2
	});

	$('#back-to-top').on('click', function(){
		$('body,html').animate({
			scrollTop: 0
		}, 600);
	});


	$('#nav .nav-collapse').on('click', function() {
		$('#nav').toggleClass('open');
	});


	$('.has-dropdown a').on('click', function() {
		$(this).parent().toggleClass('open-drop');
	});

	$(window).on('scroll', function() {
		var wScroll = $(this).scrollTop();

		// Fixed nav
		wScroll > 1 ? $('#nav').addClass('fixed-nav') : $('#nav').removeClass('fixed-nav');

		// Back To Top Appear
		wScroll > 700 ? $('#back-to-top').fadeIn() : $('#back-to-top').fadeOut();
	});

	$('.work').magnificPopup({
		delegate: '.lightbox',
		type: 'image'
	});

})(jQuery);

$(()=> {
	$("body").tooltip({ selector: '[data-toggle=tooltip]' });
})
