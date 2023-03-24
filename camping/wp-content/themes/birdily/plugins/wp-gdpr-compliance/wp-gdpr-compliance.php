<?php
/* WP GDPR Compliance support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_wp_gdpr_compliance_feed_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_wp_gdpr_compliance_theme_setup9', 9 );
	function birdily_wp_gdpr_compliance_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_wp_gdpr_compliance_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_wp_gdpr_compliance_tgmpa_required_plugins' ) ) {
	
	function birdily_wp_gdpr_compliance_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'wp-gdpr-compliance' ) ) {
			$list[] = array(
				'name'     => birdily_storage_get_array( 'required_plugins', 'wp-gdpr-compliance' ),
				'slug'     => 'wp-gdpr-compliance',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'birdily_exists_wp_gdpr_compliance' ) ) {
	function birdily_exists_wp_gdpr_compliance() {
		return defined( 'WP_GDPR_C_ROOT_FILE' ) || defined( 'WPGDPRC_ROOT_FILE' );
	}
}
