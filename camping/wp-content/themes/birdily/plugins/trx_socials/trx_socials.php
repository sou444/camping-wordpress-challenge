<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_trx_socials_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'birdily_trx_socials_theme_setup9', 9 );
    function birdily_trx_socials_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_trx_socials_tgmpa_required_plugins', 8 );
        }
    }
}


// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_trx_socials_tgmpa_required_plugins' ) ) {
    //Handler of the add_filter('birdily_filter_tgmpa_required_plugins', 'birdily_trx_socials_tgmpa_required_plugins');
    function birdily_trx_socials_tgmpa_required_plugins( $list = array() ) {
        if ( birdily_storage_isset( 'required_plugins', 'trx_socials' ) ){
            $path = birdily_get_file_dir( 'plugins/trx_socials/trx_socials.zip' );
            if ( ! empty( $path )) {
                $list[] = array(
                    'name'     => esc_html__('ThemeREX Socials', 'birdily'),
                    'slug'     => 'trx_socials',
                    'version'  => '1.4.5',
                    'source'   => ! empty( $path ) ? $path : 'upload://trx_socials.zip',
                    'required' => false,
                );
            }
        }
        return $list;
    }
}


// Check if plugin installed and activated
if ( ! function_exists( 'birdily_exists_trx_socials' ) ) {
    function birdily_exists_trx_socials() {
        return defined('TRX_SOCIALS_STORAGE');
    }
}
