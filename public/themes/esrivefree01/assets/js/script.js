$(document).ready(function() {
	$(window).scroll(function() {

		var wScroll = $(this).scrollTop();
		var acaraScroll = wScroll - $('#acara').offset().top;

		$('.inner-home').css({
			transform: 'translate3d(0px, '+ wScroll /20 +'%, 0px)'
		});
		$('.inner-acara').css({
			transform: 'translate3d(0px, '+ acaraScroll /20 +'%, 0px)'
		});

		if ( wScroll > 200 ) {
			$('#back-to-top').addClass('is-showing');
		} else {
			$('#back-to-top').removeClass('is-showing');
		}
	});

	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});

});
