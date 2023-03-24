<?php
/* Itineraries support functions
------------------------------------------------------------------------------- */

if ( ! defined( 'WP_TRAVEL_POST_TYPE' ) ) {
	define( 'WP_TRAVEL_POST_TYPE', 'itineraries' );
}

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if ( ! function_exists( 'birdily_wp_travel_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'birdily_wp_travel_theme_setup1', 1 );
	function birdily_wp_travel_theme_setup1() {
		add_filter( 'birdily_filter_list_posts_types', 	'birdily_wp_travel_list_post_types' );
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'birdily_wp_travel_theme_setup3' ) ) {
	
	function birdily_wp_travel_theme_setup3() {
		if ( birdily_exists_wp_travel() ) {
			// Section 'WP Travel'
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'itineraries' => array(
							'title' => esc_html__( 'WP Travel', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the travel pages', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_options_get_list_cpt_options( 'itineraries' )
				)
			);
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_wp_travel_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_wp_travel_theme_setup9', 9 );
	function birdily_wp_travel_theme_setup9() {

		add_filter( 'birdily_filter_merge_styles', 'birdily_wp_travel_merge_styles' );
		add_filter( 'birdily_filter_merge_styles_responsive', 'birdily_wp_travel_merge_styles_responsive' );
		if ( birdily_exists_wp_travel() ) {			
			add_filter( 'birdily_filter_post_type_taxonomy', 'birdily_wp_travel_post_type_taxonomy', 10, 2 );
			if ( ! is_admin() ) {
				add_filter( 'birdily_filter_detect_blog_mode', 'birdily_wp_travel_detect_blog_mode' );
			}
		}
		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_wp_travel_tgmpa_required_plugins' );
		}		
	}
}

// WP settings
if ( ! function_exists( 'birdily_wp_travel_wp_setup' ) ) {
	add_action( 'wp', 'birdily_wp_travel_wp_setup' );
	function birdily_wp_travel_wp_setup() {
		// Sidebar position:
		// Replace last parameter with one of values: none | left | right
		if(birdily_is_wp_travel_page()) {
			birdily_storage_set_array( 'options', 'sidebar_position', 'val', 'none' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_wp_travel_tgmpa_required_plugins' ) ) {
	
	function birdily_wp_travel_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'wp-travel' ) && birdily_is_theme_activated() ) {
			$path = birdily_get_plugin_source_path( 'plugins/wp-travel/wp-travel.zip' );
			if ( ! empty( $path ) || birdily_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'	 => birdily_storage_get_array( 'required_plugins', 'wp-travel' ),
					'slug'	 => 'wp-travel',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if itineraries installed and activated
if ( ! function_exists( 'birdily_exists_wp_travel' ) ) {
	function birdily_exists_wp_travel() {
		 return class_exists('WP_Travel');
	}
}

// Return true, if current page is any itineraries page
if ( ! function_exists( 'birdily_is_wp_travel_page' ) ) {
	function birdily_is_wp_travel_page() {
		$rez = false;
		if ( birdily_exists_wp_travel() ) {
			$rez = ( is_single() && in_array(
				get_query_var( 'post_type' ),
				array( WP_TRAVEL_POST_TYPE )
			) )
					|| WP_Travel::is_page('archive');
		}
		return $rez;
	}
}

// Detect current blog mode
if ( ! function_exists( 'birdily_wp_travel_detect_blog_mode' ) ) {
	
	function birdily_wp_travel_detect_blog_mode( $mode = '' ) {
		if ( birdily_is_wp_travel_page() ) {
			$mode = 'itineraries';
		}
		return $mode;
	}
}


// Return taxonomy for current post type
if ( ! function_exists( 'birdily_wp_travel_post_type_taxonomy' ) ) {
	
	function birdily_wp_travel_post_type_taxonomy( $tax = '', $post_type = '' ) {
		if ( birdily_exists_wp_travel() ) {
			if ( WP_TRAVEL_POST_TYPE == $post_type ) {
				$tax = BIRDILY_WP_TRAVEL_TAX_TOUR_CATEGORY;
			}
		}
		return $tax;
	}
}

// Add 'itineraries' to the list of the supported post-types
if ( ! function_exists( 'birdily_wp_travel_list_post_types' ) ) {
	
	function birdily_wp_travel_list_post_types( $list = array() ) {
		if ( birdily_exists_wp_travel() ) {
			$list[ WP_TRAVEL_POST_TYPE ] = esc_html__( 'WP Travel', 'birdily' );
		}
		return $list;
	}
}

// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'birdily_wp_travel_get_list_choises' ) ) {
	add_filter( 'birdily_filter_options_get_list_choises', 'birdily_wp_travel_get_list_choises', 10, 2 );
	function birdily_wp_travel_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'wp_travel_itinerariess_page' ) === 0 ) {
				$list = birdily_get_list_posts(
					false, array(
						'post_type'	=> 'page',
						'not_selected' => true,
						'orderby'	  => 'title',
						'order'		=> 'ASC',
					)
				);
			}
		}
		return $list;
	}
}


// Return id of the 'itinerariess_page'
if ( ! function_exists( 'birdily_wp_travel_get_all_posts_page_id' ) ) {
	add_filter( 'trx_addons_filter_get_all_posts_page_id', 'birdily_wp_travel_get_all_posts_page_id', 10, 2 );
	function birdily_wp_travel_get_all_posts_page_id( $id, $slug ) {
		if ( 0 == $id && 'itineraries' == $slug ) {
			$id = birdily_get_theme_option( 'wp_travel_itinerariess_page' );
		}
		return $id;
	}
}

// Merge custom styles
if ( ! function_exists( 'birdily_wp_travel_merge_styles' ) ) {
	
	function birdily_wp_travel_merge_styles( $list ) {
		if ( birdily_exists_wp_travel() ) {
			$list[] = 'plugins/wp-travel/_wp-travel.scss';
		}
		return $list;
	}
}

if ( ! function_exists( 'birdily_wp_travel_merge_styles_responsive' ) ) {
	
	function birdily_wp_travel_merge_styles_responsive( $list ) {
		if ( birdily_exists_wp_travel() ) {
			$list[] = 'plugins/wp-travel/_wp-travel-responsive.scss';
		}
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( birdily_exists_wp_travel() ) {
	require_once BIRDILY_THEME_DIR . 'plugins/wp-travel/wp-travel-styles.php'; }


	// Enqueue WP Travel custom scripts
if ( !function_exists( 'birdily_wp_travel_frontend_scripts' ) ) {
	
	function birdily_wp_travel_frontend_scripts() {
		
			if (birdily_is_on(birdily_get_theme_option('debug_mode')) && birdily_get_file_dir('plugins/wp-travel/wp-travel.js')!='')
				wp_enqueue_script( 'birdily-wp-travel', birdily_get_file_url('plugins/wp-travel/wp-travel.js'), array('jquery'), null, true );
	}
}

// Merge custom scripts
if ( ! function_exists( 'birdily_wp_travel_merge_scripts' ) ) {
	
	function birdily_wp_travel_merge_scripts( $list ) {
		if ( birdily_exists_wp_travel() ) {
			$list[] = 'plugins/wp-travel/wp-travel.js';
		}
		return $list;
	}
}

// Check plugin in the required plugins
if ( !function_exists( 'birdily_wp_travel_importer_required_plugins' ) ) {
	if (is_admin()) add_filter( 'birdily_filter_importer_required_plugins', 'birdily_wp_travel_importer_required_plugins', 10, 2 );
	function birdily_wp_travel_importer_required_plugins($not_installed='', $list='') {
		if (strpos($list, 'wp-travel')!==false && !birdily_exists_wp_travel() )
			$not_installed .= '<br>' . esc_html__('WP travel', 'birdily');
		return $not_installed;
	}
}

// Add checkbox to the one-click importer
if ( !function_exists( 'birdily_wp_travel_importer_show_params' ) ) {
	if (is_admin()) add_action( 'trx_addons_action_importer_params',  'birdily_wp_travel_importer_show_params', 10, 1 );
	function birdily_wp_travel_importer_show_params($importer) {
		if ( birdily_exists_wp_travel() && in_array('wp-travel', $importer->options['required_plugins']) ) {
			$importer->show_importer_params(array(
				'slug' => 'wp-travel',
				'title' => esc_html__('Import WP travel', 'birdily'),
				'part' => 1
			));
		}
	}
}