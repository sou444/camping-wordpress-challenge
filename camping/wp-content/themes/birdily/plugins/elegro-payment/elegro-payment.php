<?php
/* Elegro Crypto Payment support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_elegro_payment_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_elegro_payment_theme_setup9', 9 );
	function birdily_elegro_payment_theme_setup9() {
		if ( birdily_exists_elegro_payment() ) {
			add_action( 'wp_enqueue_scripts', 'birdily_elegro_payment_frontend_scripts', 1100 );
			add_filter( 'birdily_filter_merge_styles', 'birdily_elegro_payment_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_elegro_payment_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_elegro_payment_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('birdily_filter_tgmpa_required_plugins',	'birdily_elegro_payment_tgmpa_required_plugins');
	function birdily_elegro_payment_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'woocommerce' ) && birdily_storage_isset( 'required_plugins', 'elegro-payment' )) {
			$list[] = array(
				'name'     => birdily_storage_get_array( 'required_plugins', 'elegro-payment'),
				'slug'     => 'elegro-payment',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'birdily_exists_elegro_payment' ) ) {
	function birdily_exists_elegro_payment() {
		return class_exists( 'WC_Elegro_Payment' );
	}
}


// Enqueue styles for frontend
if ( ! function_exists( 'birdily_elegro_payment_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'birdily_elegro_payment_frontend_scripts', 1100 );
	function birdily_elegro_payment_frontend_scripts() {
		if ( birdily_is_on( birdily_get_theme_option( 'debug_mode' ) ) ) {
			$birdily_url = birdily_get_file_url( 'plugins/elegro-payment/elegro-payment.css' );
			if ( '' != $birdily_url ) {
				wp_enqueue_style( 'birdily-elegro-payment', $birdily_url, array(), null );
			}
		}
	}
}


// Merge custom styles
if ( ! function_exists( 'birdily_elegro_payment_merge_styles' ) ) {
	//Handler of the add_filter('birdily_filter_merge_styles', 'birdily_elegro_payment_merge_styles');
	function birdily_elegro_payment_merge_styles( $list ) {
		$list[] = 'plugins/elegro-payment/elegro-payment.css';
		return $list;
	}
}
