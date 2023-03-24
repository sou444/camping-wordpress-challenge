<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_booked_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_booked_theme_setup9', 9 );
	function birdily_booked_theme_setup9() {
		add_filter( 'birdily_filter_merge_styles', 'birdily_booked_merge_styles' );
		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_booked_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_booked_tgmpa_required_plugins' ) ) {
	
	function birdily_booked_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'booked' ) && birdily_is_theme_activated() ) {
			$path = birdily_get_plugin_source_path( 'plugins/booked/booked.zip' );
			if ( ! empty( $path ) || birdily_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => birdily_storage_get_array( 'required_plugins', 'booked' ),
					'slug'     => 'booked',
					'source'   => ! empty( $path ) ? $path : 'upload://booked.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}


// Check if plugin installed and activated
if ( ! function_exists( 'birdily_exists_booked' ) ) {
	function birdily_exists_booked() {
		return class_exists( 'booked_plugin' );
	}
}

// Merge custom styles
if ( ! function_exists( 'birdily_booked_merge_styles' ) ) {
	
	function birdily_booked_merge_styles( $list ) {
		if ( birdily_exists_booked() ) {
			$list[] = 'plugins/booked/_booked.scss';
		}
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( birdily_exists_booked() ) {
	require_once BIRDILY_THEME_DIR . 'plugins/booked/booked-styles.php'; }

