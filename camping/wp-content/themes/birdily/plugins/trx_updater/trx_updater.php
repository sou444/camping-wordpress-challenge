<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_trx_updater_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_trx_updater_theme_setup9', 9 );
	function birdily_trx_updater_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_trx_updater_tgmpa_required_plugins', 8 );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_trx_updater_tgmpa_required_plugins' ) ) {
	function birdily_trx_updater_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'trx_updater' ) ) {
			$path = birdily_get_plugin_source_path( 'plugins/trx_updater/trx_updater.zip' );
			if ( ! empty( $path ) || birdily_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => birdily_storage_get_array( 'required_plugins', 'trx_updater' ),
					'slug'     => 'trx_updater',
					'source'   => ! empty( $path ) ? $path : 'upload://trx_updater.zip',
					'version'  => '1.9.6',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'birdily_exists_trx_updater' ) ) {
	function birdily_exists_trx_updater() {
		return defined( 'TRX_UPDATER_VERSION' );
	}
}
