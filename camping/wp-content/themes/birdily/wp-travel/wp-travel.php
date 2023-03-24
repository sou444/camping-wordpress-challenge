<?php
/* WP Travel support functions
------------------------------------------------------------------------------- */
add_filter('wp_travel_itinerary_thumbnail_size', function( $post_id, $size = 'birdily-thumb-tour') {
	return $size;
}, 40, 2);
?>              
                     