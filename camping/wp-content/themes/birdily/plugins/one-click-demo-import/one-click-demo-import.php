<?php
/* One Click Demo Import support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_ocdi_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_ocdi_theme_setup9', 9 );
	function birdily_ocdi_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_ocdi_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_ocdi_tgmpa_required_plugins' ) ) {
	
	function birdily_ocdi_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'one-click-demo-import' ) ) {
			$list[] = array(
				'name'     => birdily_storage_get_array( 'required_plugins', 'one-click-demo-import' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin is installed and activated
if ( ! function_exists( 'birdily_exists_ocdi' ) ) {
	function birdily_exists_ocdi() {
		return class_exists( 'OCDI_Plugin' );
	}
}

