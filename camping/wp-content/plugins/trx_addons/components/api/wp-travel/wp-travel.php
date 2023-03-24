<?php
/**
 * Plugin support: Elegro Crypto Payment (Add Crypto payments to WooCommerce)
 *
 * @package ThemeREX Addons
 * @since v1.70.3
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	die( '-1' );
}

// Check if plugin installed and activated
if ( !function_exists( 'trx_addons_exists_wp_travel' ) ) {
	function trx_addons_exists_wp_travel() {
		return class_exists('WP_Travel');
	}
}

// Check if the row will be imported
if ( !function_exists( 'trx_addons_wp_travel_importer_check_row' ) ) {
	if (is_admin()) add_filter('trx_addons_filter_importer_import_row', 'trx_addons_wp_travel_importer_check_row', 9, 4);
	function trx_addons_wp_travel_importer_check_row($flag, $table, $row, $list) {
		if ($flag || strpos($list, 'wp-travel')===false) return $flag;
		if ( trx_addons_exists_wp_travel() ) {
			if ($table == 'posts')
				$flag = $row['post_type']=='itineraries';
		}
		return $flag;
	}
}

// importer
// Set plugin's specific importer options
if ( !function_exists( 'trx_addons_wp_travel_importer_set_options' ) ) {
	if (is_admin()) add_filter( 'trx_addons_filter_importer_options',	'trx_addons_wp_travel_importer_set_options' );
	function trx_addons_wp_travel_importer_set_options($options=array()) {
		if ( trx_addons_exists_wp_travel() && in_array('wp-travel', $options['required_plugins']) ) {
			$options['additional_options'][]	= 'wp_travel_%';					// Add slugs to export options for this plugin
			$options['additional_options'][]	= 'widget_wp_travel_%';
			if (is_array($options['files']) && count($options['files']) > 0) {
				foreach ($options['files'] as $k => $v) {
					$options['files'][$k]['file_with_wp-travel'] = str_replace('name.ext', 'wp-travel.txt', $v['file_with_']);
				}
			}
		}
		return $options;
	}
}