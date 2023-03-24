/* global jQuery:false */
/* global BIRDILY_STORAGE:false */

(function() {
	"use strict";

	jQuery( document ).on(
		'action.ready_birdily', function() {
			jQuery('.ws-theme-cart-page input[type="number"].wp-travel-pax').append('<span class="q_inc"></span><span class="q_dec"></span>');

			alert("cool");

		}
	);
})();