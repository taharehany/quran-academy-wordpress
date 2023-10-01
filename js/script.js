jQuery(document).ready(function ($) {
	$('.owl-carousel').owlCarousel({
		loop: true,
		rtl: true,
		margin: 10,
		nav: true,
		dots: false,
		navContainer: '.nav-container',
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	});


	$('#custom-form').submit(function (e) {
		e.preventDefault();

		var form = $(this);
		var formData = form.serialize();
		var thankYouMessage = $('#thank-you-message');

		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			data: formData,
			success: function (response) {
				thankYouMessage.show();
				form.hide();
			}
		});
	});
});
