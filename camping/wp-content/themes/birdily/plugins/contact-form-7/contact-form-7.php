<?php
/* Contact Form 7 support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_cf7_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_cf7_theme_setup9', 9 );
	function birdily_cf7_theme_setup9() {

		add_filter( 'birdily_filter_merge_scripts', 'birdily_cf7_merge_scripts' );
		add_filter( 'birdily_filter_merge_styles', 'birdily_cf7_merge_styles' );

		if ( birdily_exists_cf7() ) {
			add_action( 'wp_enqueue_scripts', 'birdily_cf7_frontend_scripts', 1100 );
		}

		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_cf7_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_cf7_tgmpa_required_plugins' ) ) {
	
	function birdily_cf7_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'contact-form-7' ) ) {
			// CF7 plugin
			$list[] = array(
				'name'     => birdily_storage_get_array( 'required_plugins', 'contact-form-7' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			);
		}
		return $list;
	}
}



// Check if cf7 installed and activated
if ( ! function_exists( 'birdily_exists_cf7' ) ) {
	function birdily_exists_cf7() {
		return class_exists( 'WPCF7' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'birdily_cf7_frontend_scripts' ) ) {
	
	function birdily_cf7_frontend_scripts() {
		if ( birdily_exists_cf7() ) {
			if ( birdily_is_on( birdily_get_theme_option( 'debug_mode' ) ) ) {
				$birdily_url = birdily_get_file_url( 'plugins/contact-form-7/contact-form-7.js' );
				if ( '' != $birdily_url ) {
					wp_enqueue_script( 'birdily-cf7', $birdily_url, array( 'jquery' ), null, true );
				}
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'birdily_cf7_merge_scripts' ) ) {
	
	function birdily_cf7_merge_scripts( $list ) {
		if ( birdily_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/contact-form-7.js';
		}
		return $list;
	}
}

// Merge custom styles
if ( ! function_exists( 'birdily_cf7_merge_styles' ) ) {
	
	function birdily_cf7_merge_styles( $list ) {
		if ( birdily_exists_cf7() ) {
			$list[] = 'plugins/contact-form-7/_contact-form-7.scss';
		}
		return $list;
	}
}

