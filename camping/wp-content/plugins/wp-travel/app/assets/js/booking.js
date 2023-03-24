jQuery(document).ready(function ($) {

	// $('input[name=wp_travel_book_now]').removeAttr('disabled');
	// $('#wp-travel-book-now').click(function () {
	// 	$(this).slideUp('slow').siblings('form').slideToggle('slow');
	// });
	$(window).on('beforeunload', function () {
		$("input[name=wp_travel_book_now]").prop("disabled", "disabled");
	});

	$('.wp-travel-booking-reset').click(function () {
		$(this).closest('form').slideUp('slow').siblings('.wp-travel-book-now').slideToggle('slow');
	});

	$(document).on('click', '.wp-travel-booknow-btn, div.wp-travel-booknow-btn a', function () {
		$(".wp-travel-booking-form").trigger("click");
		var winWidth = $(window).width();
		var tabHeight = $('.wp-travel-tab-wrapper').offset().top;
		if (winWidth < 767) {
			var tabHeight = $('.resp-accordion.resp-tab-active').offset().top;
		}
		$('html, body').animate({
			scrollTop: (tabHeight)
		}, 1200);

	});
	$(document).on('click', '.components-checkbox-control__input', function () {
		var winWidth = $(window).width();
		if (winWidth < 991) {
			var top = jQuery('#wp-travel-booking-recurring-dates').offset().top
			jQuery('html, body').animate({
				scrollTop: ( top - 20 )
			}, 1200);
		}
	});

});

function sidebarSticky() {
	setInterval(function () {
		jQuery('.container .sticky-sidebar').hcSticky({
			stickTo: jQuery('.wp-travel-minicart'),
			top:50
			});
	}, 1000)
}
jQuery(document).ready(sidebarSticky);
jQuery(window).resize(sidebarSticky);
// document.addEventListener("DOMContentLoaded", function() {
// 	sidebarSticky();
// });


//fixing pre tag issue while using shortcode
// $('.single-itineraries #trip_outline pre').each(function() {
//     document.write("hello");
// 	$(this).replaceWith($('<div>' + this.innerHTML + '</div>'));
//   });

