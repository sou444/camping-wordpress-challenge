<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_revslider_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_revslider_theme_setup9', 9 );
	function birdily_revslider_theme_setup9() {

		add_filter( 'birdily_filter_merge_styles', 'birdily_revslider_merge_styles' );

		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_revslider_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_revslider_tgmpa_required_plugins' ) ) {
	
	function birdily_revslider_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'revslider' ) && birdily_is_theme_activated() ) {
			$path = birdily_get_plugin_source_path( 'plugins/revslider/revslider.zip' );
			if ( ! empty( $path ) || birdily_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => birdily_storage_get_array( 'required_plugins', 'revslider' ),
					'slug'     => 'revslider',
					'version'  => '6.6.11',
					'source'   => ! empty( $path ) ? $path : 'upload://revslider.zip',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if RevSlider installed and activated
if ( ! function_exists( 'birdily_exists_revslider' ) ) {
	function birdily_exists_revslider() {
		return function_exists( 'rev_slider_shortcode' );
	}
}

// Merge custom styles
if ( ! function_exists( 'birdily_revslider_merge_styles' ) ) {
	
	function birdily_revslider_merge_styles( $list ) {
		if ( birdily_exists_revslider() ) {
			$list[] = 'plugins/revslider/_revslider.scss';
		}
		return $list;
	}
}

