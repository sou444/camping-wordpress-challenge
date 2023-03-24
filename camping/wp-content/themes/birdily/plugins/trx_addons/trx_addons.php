<?php
/* ThemeREX Addons support functions
------------------------------------------------------------------------------- */

// Add theme-specific functions
require_once BIRDILY_THEME_DIR . 'theme-specific/trx_addons-setup.php';

// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if ( ! function_exists( 'birdily_trx_addons_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'birdily_trx_addons_theme_setup1', 1 );
	function birdily_trx_addons_theme_setup1() {
		if ( birdily_exists_trx_addons() ) {
			add_filter( 'birdily_filter_list_posts_types', 'birdily_trx_addons_list_post_types' );
			add_filter( 'birdily_filter_list_header_footer_types', 'birdily_trx_addons_list_header_footer_types' );
			add_filter( 'birdily_filter_list_header_styles', 'birdily_trx_addons_list_header_styles' );
			add_filter( 'birdily_filter_list_footer_styles', 'birdily_trx_addons_list_footer_styles' );
			add_action( 'birdily_action_load_options', 'birdily_trx_addons_add_link_edit_layout' );
			add_filter( 'trx_addons_filter_default_layouts', 'birdily_trx_addons_default_layouts' );
			add_filter( 'trx_addons_filter_load_options', 'birdily_trx_addons_default_components' );
			add_filter( 'trx_addons_cpt_list_options', 'birdily_trx_addons_cpt_list_options', 10, 2 );
			add_filter( 'trx_addons_filter_sass_import', 'birdily_trx_addons_sass_import', 10, 2 );
			add_filter( 'trx_addons_filter_override_options', 'birdily_trx_addons_override_options' );
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_trx_addons_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_trx_addons_theme_setup9', 9 );
	function birdily_trx_addons_theme_setup9() {
		if ( birdily_exists_trx_addons() ) {
			add_filter( 'trx_addons_filter_add_thumb_sizes', 'birdily_trx_addons_add_thumb_sizes' );
			add_filter( 'trx_addons_filter_get_thumb_size', 'birdily_trx_addons_get_thumb_size' );
			add_filter( 'trx_addons_filter_featured_image', 'birdily_trx_addons_featured_image', 10, 2 );
			add_filter( 'trx_addons_filter_no_image', 'birdily_trx_addons_no_image' );
			add_filter( 'trx_addons_filter_sc_blogger_template', 'birdily_trx_addons_sc_blogger_template', 10, 2 );
			add_filter( 'trx_addons_filter_get_list_icons_classes', 'birdily_trx_addons_get_list_icons_classes', 10, 2 );
			add_filter( 'trx_addons_filter_clear_icon_name', 'birdily_trx_addons_clear_icon_name' );
			add_action( 'wp_enqueue_scripts', 'birdily_trx_addons_frontend_scripts', 1100 );
			add_filter( 'birdily_filter_query_sort_order', 'birdily_trx_addons_query_sort_order', 10, 3 );
			add_filter( 'birdily_filter_merge_scripts', 'birdily_trx_addons_merge_scripts' );
			add_filter( 'birdily_filter_prepare_css', 'birdily_trx_addons_prepare_css', 10, 2 );
			add_filter( 'birdily_filter_prepare_js', 'birdily_trx_addons_prepare_js', 10, 2 );
			add_filter( 'birdily_filter_localize_script', 'birdily_trx_addons_localize_script' );
			add_filter( 'birdily_filter_get_post_categories', 'birdily_trx_addons_get_post_categories' );
			add_filter( 'birdily_filter_get_post_date', 'birdily_trx_addons_get_post_date' );
			add_filter( 'trx_addons_filter_get_post_date', 'birdily_trx_addons_get_post_date_wrap' );
			add_filter( 'birdily_filter_post_type_taxonomy', 'birdily_trx_addons_post_type_taxonomy', 10, 2 );
			add_filter( 'birdily_filter_term_name', 'birdily_trx_addons_term_name', 10, 2 );
			add_filter( 'trx_addons_filter_theme_logo', 'birdily_trx_addons_theme_logo' );
			add_filter( 'trx_addons_filter_show_site_name_as_logo', 'birdily_trx_addons_show_site_name_as_logo' );
			add_filter( 'trx_addons_filters_get_theme_info', 'birdily_trx_addons_get_theme_info', 9 );
			add_filter( 'birdily_filter_sidebar_present', 'birdily_trx_addons_sidebar_present' );
			add_filter( 'trx_addons_filter_get_theme_file_dir', 'birdily_trx_addons_get_theme_file_dir', 10, 3 );
			add_filter( 'trx_addons_filter_get_theme_folder_dir', 'birdily_trx_addons_get_theme_folder_dir', 10, 3 );
			add_filter( 'trx_addons_filter_privacy_text', 'birdily_trx_addons_privacy_text' );
			add_filter( 'trx_addons_filter_post_meta', 'birdily_trx_addons_post_meta', 10, 2 );
			add_filter( 'trx_addons_filter_post_meta_args',	'birdily_trx_addons_post_meta_args', 10, 2);
			add_filter( 'birdily_filter_post_meta_args', 'birdily_trx_addons_post_meta_args', 10, 3 );
			add_filter( 'birdily_filter_list_counters', 'birdily_trx_addons_list_counters' );
			add_filter( 'trx_addons_filter_get_list_counters', 'birdily_trx_addons_get_list_counters' );
			add_filter( 'trx_addons_filter_get_list_meta_parts', 'birdily_trx_addons_get_list_meta_parts' );
			if ( is_admin() ) {
				add_filter( 'birdily_filter_allow_override_options', 'birdily_trx_addons_allow_override_options', 10, 2 );
				add_filter( 'birdily_filter_allow_theme_icons', 'birdily_trx_addons_allow_theme_icons', 10, 2 );
				add_filter( 'trx_addons_filter_export_options', 'birdily_trx_addons_export_options' );
			} else {
				add_filter( 'trx_addons_filter_inc_views', 'birdily_trx_addons_inc_views' );
				add_filter( 'birdily_filter_related_thumb_size', 'birdily_trx_addons_related_thumb_size' );
				add_filter( 'birdily_filter_show_related_posts', 'birdily_trx_addons_show_related_posts' );
				add_filter( 'trx_addons_filter_show_related_posts_after_article', 'birdily_trx_addons_show_related_posts_after_article' );
				add_filter( 'trx_addons_filter_args_related', 'birdily_trx_addons_args_related' );
				add_filter( 'trx_addons_filter_seo_snippets', 'birdily_trx_addons_seo_snippets' );
				add_action( 'trx_addons_action_article_start', 'birdily_trx_addons_article_start', 10, 1 );
				add_filter( 'birdily_filter_get_mobile_menu', 'birdily_trx_addons_get_mobile_menu' );
				add_filter( 'birdily_filter_detect_blog_mode', 'birdily_trx_addons_detect_blog_mode' );
				add_filter( 'birdily_filter_get_blog_title', 'birdily_trx_addons_get_blog_title' );
				add_action( 'birdily_action_login', 'birdily_trx_addons_action_login' );
				add_action( 'birdily_action_cart', 'birdily_trx_addons_action_cart' );
				add_action( 'birdily_action_breadcrumbs', 'birdily_trx_addons_action_breadcrumbs' );
				add_action( 'birdily_action_show_layout', 'birdily_trx_addons_action_show_layout', 10, 1 );
				add_filter( 'birdily_filter_get_translated_layout', 'birdily_trx_addons_filter_get_translated_layout', 10, 1 );
				add_filter( 'trx_addons_filter_sc_layout_content', 'birdily_trx_addons_replace_current_year', 20, 2 );
				add_action( 'birdily_action_user_meta', 'birdily_trx_addons_action_user_meta' );
				add_action( 'birdily_action_before_post_meta', 'birdily_trx_addons_action_before_post_meta' );
				add_filter( 'trx_addons_filter_featured_image_override', 'birdily_trx_addons_featured_image_override' );
				add_filter( 'trx_addons_filter_get_current_mode_image', 'birdily_trx_addons_get_current_mode_image' );
				add_filter( 'birdily_filter_get_post_iframe', 'birdily_trx_addons_get_post_iframe', 10, 1 );
			}
		}

		// Add this filter any time: if plugin exists - load plugin's styles, if not exists - load layouts.scss instead plugin's styles
		add_action( 'wp_enqueue_scripts', 'birdily_trx_addons_layouts_styles' );
		add_filter( 'birdily_filter_merge_styles', 'birdily_trx_addons_merge_styles' );
		add_filter( 'birdily_filter_merge_styles_responsive', 'birdily_trx_addons_merge_styles_responsive' );

		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_trx_addons_tgmpa_required_plugins' );
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_trx_addons_tgmpa_required_plugins_all', 999 );
		} else {
			add_action( 'birdily_action_search', 'birdily_trx_addons_action_search', 10, 3 );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_trx_addons_tgmpa_required_plugins' ) ) {
	
	function birdily_trx_addons_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'trx_addons' ) ) {
			$path = birdily_get_plugin_source_path( 'plugins/trx_addons/trx_addons.zip' );
			if ( ! empty( $path ) || birdily_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => birdily_storage_get_array( 'required_plugins', 'trx_addons' ),
					'slug'     => 'trx_addons',
					'version'  => '1.71.49.9',
					'source'   => ! empty( $path ) ? $path : 'upload://trx_addons.zip',
					'required' => true,
				);
			}
		}
		return $list;
	}
}


/* Add options in the Theme Options Customizer
------------------------------------------------------------------------------- */

if ( ! function_exists( 'birdily_trx_addons_cpt_list_options' ) ) {
	
	function birdily_trx_addons_cpt_list_options( $options, $cpt ) {
		if ( 'layouts' == $cpt && BIRDILY_THEME_FREE ) {
			$options = array();
		} elseif ( is_array( $options ) ) {
			foreach ( $options as $k => $v ) {
				// Store this option in the external (not theme's) storage
				$options[ $k ]['options_storage'] = 'trx_addons_options';
				// Hide this option from plugin's options (only for overriden options)
				if ( in_array( $cpt, array( 'cars', 'cars_agents', 'certificates', 'courses', 'dishes', 'portfolio', 'properties', 'agents', 'resume', 'services', 'sport', 'team', 'testimonials' ) ) ) {
					$options[ $k ]['hidden'] = true;
				}
			}
		}
		return $options;
	}
}

// Return plugin's specific options for CPT
if ( ! function_exists( 'birdily_trx_addons_get_list_cpt_options' ) ) {
	function birdily_trx_addons_get_list_cpt_options( $cpt ) {
		$options = array();
		if ( 'cars' == $cpt ) {
			$options = array_merge(
				trx_addons_cpt_cars_get_list_options(),
				trx_addons_cpt_cars_agents_get_list_options()
			);
		} elseif ( 'certificates' == $cpt ) {
			$options = trx_addons_cpt_certificates_get_list_options();
		} elseif ( 'courses' == $cpt ) {
			$options = trx_addons_cpt_courses_get_list_options();
		} elseif ( 'dishes' == $cpt ) {
			$options = trx_addons_cpt_dishes_get_list_options();
		} elseif ( 'portfolio' == $cpt ) {
			$options = trx_addons_cpt_portfolio_get_list_options();
		} elseif ( 'resume' == $cpt ) {
			$options = trx_addons_cpt_resume_get_list_options();
		} elseif ( 'services' == $cpt ) {
			$options = trx_addons_cpt_services_get_list_options();
		} elseif ( 'properties' == $cpt ) {
			$options = array_merge(
				trx_addons_cpt_properties_get_list_options(),
				trx_addons_cpt_agents_get_list_options()
			);
		} elseif ( 'sport' == $cpt ) {
			$options = trx_addons_cpt_sport_get_list_options();
		} elseif ( 'team' == $cpt ) {
			$options = trx_addons_cpt_team_get_list_options();
		} elseif ( 'testimonials' == $cpt ) {
			$options = trx_addons_cpt_testimonials_get_list_options();
		}

		foreach ( $options as $k => $v ) {
			// Disable refresh the preview area on change any plugin's option
			$options[ $k ]['refresh'] = false;
			// Remove parameter 'hidden'
			if ( ! empty( $v['hidden'] ) ) {
				unset( $options[ $k ]['hidden'] );
			}
			// Add description
			if ( 'info' == $v['type'] ) {
				$options[ $k ]['desc'] = wp_kses_data( __( 'In order to see changes made by settings of this section, click "Save" and refresh the page', 'birdily' ) );
			}
		}
		return $options;
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if ( ! function_exists( 'birdily_trx_addons_setup3' ) ) {
	add_action( 'after_setup_theme', 'birdily_trx_addons_setup3', 3 );
	function birdily_trx_addons_setup3() {

		// Section 'Cars' - settings to show 'Cars' blog archive and single posts
		if ( birdily_exists_cars() ) {
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'cars' => array(
							'title' => esc_html__( 'Cars', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the cars pages.', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'cars' ),
					birdily_options_get_list_cpt_options( 'cars' ),
					array(
						'single_info_cars'        => array(
							'title' => esc_html__( 'Single car', 'birdily' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_cars' => array(
							'title' => esc_html__( 'Show related posts', 'birdily' ),
							'desc'  => wp_kses_data( __( "Show section 'Related cars' on the single car page", 'birdily' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_cars'      => array(
							'title'      => esc_html__( 'Related cars', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many related cars should be displayed on the single car page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_cars' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_cars'    => array(
							'title'      => esc_html__( 'Related columns', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related cars on the single car page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_cars' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Certificates'
		if ( birdily_exists_certificates() ) {
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'certificates' => array(
							'title' => esc_html__( 'Certificates', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display "Certificates"', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'certificates' )
				)
			);
		}

		// Section 'Courses' - settings to show 'Courses' blog archive and single posts
		if ( birdily_exists_courses() ) {

			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'courses' => array(
							'title' => esc_html__( 'Courses', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the courses pages', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'courses' ),
					birdily_options_get_list_cpt_options( 'courses' ),
					array(
						'single_info_courses'        => array(
							'title' => esc_html__( 'Single course', 'birdily' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_courses' => array(
							'title' => esc_html__( 'Show related posts', 'birdily' ),
							'desc'  => wp_kses_data( __( "Show section 'Related courses' on the single course page", 'birdily' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_courses'      => array(
							'title'      => esc_html__( 'Related courses', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many related courses should be displayed on the single course page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_courses' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_courses'    => array(
							'title'      => esc_html__( 'Related columns', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related courses on the single course page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_courses' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Dishes' - settings to show 'Dishes' blog archive and single posts
		if ( birdily_exists_dishes() ) {

			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'dishes' => array(
							'title' => esc_html__( 'Dishes', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the dishes pages', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'dishes' ),
					birdily_options_get_list_cpt_options( 'dishes' ),
					array(
						'single_info_dishes'        => array(
							'title' => esc_html__( 'Single dish', 'birdily' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_dishes' => array(
							'title' => esc_html__( 'Show related posts', 'birdily' ),
							'desc'  => wp_kses_data( __( "Show section 'Related dishes' on the single dish page", 'birdily' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_dishes'      => array(
							'title'      => esc_html__( 'Related dishes', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many related dishes should be displayed on the single dish page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_dishes' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_dishes'    => array(
							'title'      => esc_html__( 'Related columns', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related dishes on the single dish page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_dishes' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Portfolio' - settings to show 'Portfolio' blog archive and single posts
		if ( birdily_exists_portfolio() ) {
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'portfolio' => array(
							'title' => esc_html__( 'Portfolio', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the portfolio pages', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'portfolio' ),
					birdily_options_get_list_cpt_options( 'portfolio' ),
					array(
						'single_info_portfolio'        => array(
							'title' => esc_html__( 'Single portfolio item', 'birdily' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_portfolio' => array(
							'title' => esc_html__( 'Show related posts', 'birdily' ),
							'desc'  => wp_kses_data( __( "Show section 'Related portfolio items' on the single portfolio page", 'birdily' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_portfolio'      => array(
							'title'      => esc_html__( 'Related portfolio items', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many related portfolio items should be displayed on the single portfolio page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_portfolio' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_portfolio'    => array(
							'title'      => esc_html__( 'Related columns', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related portfolio on the single portfolio page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_portfolio' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Properties' - settings to show 'Properties' blog archive and single posts
		if ( birdily_exists_properties() ) {

			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'properties' => array(
							'title' => esc_html__( 'Properties', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the properties pages', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'properties' ),
					birdily_options_get_list_cpt_options( 'properties' ),
					array(
						'single_info_properties'        => array(
							'title' => esc_html__( 'Single property', 'birdily' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_properties' => array(
							'title' => esc_html__( 'Show related posts', 'birdily' ),
							'desc'  => wp_kses_data( __( "Show section 'Related properties' on the single property page", 'birdily' ) ),
							'std'   => 1,
							'type'  => 'checkbox',
						),
						'related_posts_properties'      => array(
							'title'      => esc_html__( 'Related properties', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many related properties should be displayed on the single property page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_properties' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_properties'    => array(
							'title'      => esc_html__( 'Related columns', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related properties on the single property page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_properties' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Resume'
		if ( birdily_exists_resume() ) {
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'resume' => array(
							'title' => esc_html__( 'Resume', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display "Resume"', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'resume' )
				)
			);
		}

		// Section 'Services' - settings to show 'Services' blog archive and single posts
		if ( birdily_exists_services() ) {

			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'services' => array(
							'title' => esc_html__( 'Services', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the services pages', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'services' ),
					birdily_options_get_list_cpt_options( 'services' ),
					array(
						'single_info_services'        => array(
							'title' => esc_html__( 'Single service item', 'birdily' ),
							'desc'  => '',
							'type'  => 'info',
						),
						'show_related_posts_services' => array(
							'title' => esc_html__( 'Show related posts', 'birdily' ),
							'desc'  => wp_kses_data( __( "Show section 'Related services' on the single service page", 'birdily' ) ),
							'std'   => 0,
							'type'  => 'checkbox',
						),
						'related_posts_services'      => array(
							'title'      => esc_html__( 'Related services', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many related services should be displayed on the single service page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_services' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 9 ),
							'type'       => 'select',
						),
						'related_columns_services'    => array(
							'title'      => esc_html__( 'Related columns', 'birdily' ),
							'desc'       => wp_kses_data( __( 'How many columns should be used to output related services on the single service page?', 'birdily' ) ),
							'dependency' => array(
								'show_related_posts_services' => array( 1 ),
							),
							'std'        => 3,
							'options'    => birdily_get_list_range( 1, 4 ),
							'type'       => 'select',
						),
					)
				)
			);
		}

		// Section 'Sport' - settings to show 'Sport' blog archive and single posts
		if ( birdily_exists_sport() ) {
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'sport' => array(
							'title' => esc_html__( 'Sport', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the sport pages', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'sport' ),
					birdily_options_get_list_cpt_options( 'sport' )
				)
			);
		}

		// Section 'Team' - settings to show 'Team' blog archive and single posts
		if ( birdily_exists_team() ) {
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'team' => array(
							'title' => esc_html__( 'Team', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display the team members pages.', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'team' ),
					birdily_options_get_list_cpt_options( 'team' )
				)
			);
		}

		// Section 'Testimonials'
		if ( birdily_exists_resume() ) {
			birdily_storage_merge_array(
				'options', '', array_merge(
					array(
						'testimonials' => array(
							'title' => esc_html__( 'Testimonials', 'birdily' ),
							'desc'  => wp_kses_data( __( 'Select parameters to display "Testimonials"', 'birdily' ) ),
							'type'  => 'section',
						),
					),
					birdily_trx_addons_get_list_cpt_options( 'testimonials' )
				)
			);
		}
	}
}

// Add 'layout edit' link to the 'description' in the 'header_style' and 'footer_style' parameters
if ( ! function_exists( 'birdily_trx_addons_add_link_edit_layout' ) ) {
	
	function birdily_trx_addons_add_link_edit_layout() {
		static $added = false;
		if ( $added ) {
			return;
		}
		$added   = true;
		$options = birdily_storage_get( 'options' );
		foreach ( $options as $k => $v ) {
			if ( ! isset( $v['std'] ) ) {
				continue;
			}
			$k1 = substr( $k, 0, 12 );
			if ( 'header_style' == $k1 || 'footer_style' == $k1 ) {
				$layout = birdily_get_theme_option( $k );
				if ( birdily_is_inherit( $layout ) ) {
					$layout = birdily_get_theme_option( $k1 );
				}
				if ( ! empty( $layout ) ) {
					$layout = explode( '-', $layout );
					$layout = $layout[ count( $layout ) - 1 ];
					if ( (int)$layout > 0 ) {
						birdily_storage_set_array2(
							'options', $k, 'desc', $v['desc']
												. '<br>'
												. sprintf(
													'<a href="%1$s" class="birdily_post_editor' . ( intval( $layout ) == 0 ? ' birdily_hidden' : '' ) . '" target="_blank">%2$s</a>',
													admin_url( apply_filters( 'birdily_filter_post_edit_link', sprintf( 'post.php?post=%d&amp;action=edit', $layout ), $layout ) ),
								                    esc_html__( 'Open selected layout in a new tab to edit', 'birdily' )
												)
						);
					}
				}
			}
		}
	}
}


// Setup internal plugin's parameters
if ( ! function_exists( 'birdily_trx_addons_init_settings' ) ) {
	add_filter( 'trx_addons_init_settings', 'birdily_trx_addons_init_settings' );
	function birdily_trx_addons_init_settings( $settings ) {
		$settings['socials_type']         = birdily_get_theme_setting( 'socials_type' );
		$settings['icons_type']           = birdily_get_theme_setting( 'icons_type' );
		$settings['icons_selector']       = birdily_get_theme_setting( 'icons_selector' );
		$settings['gutenberg_safe_mode']  = birdily_get_theme_setting( 'gutenberg_safe_mode' );
		$settings['subtitle_above_title'] = birdily_get_theme_setting( 'subtitle_above_title' );
		return $settings;
	}
}


// Return theme-specific data to the dashboard widget
// Attention:
// 1) To show the item in the Dashboard Widget you need specify 'link' and 'link_text'
// 2) To show the item in the Theme Dashboard you need specify 'link', 'image', 'icon' (optional), 'title', 'description' and 'button'
if ( ! function_exists( 'birdily_trx_addons_get_theme_info' ) ) {
	
	function birdily_trx_addons_get_theme_info( $theme_info ) {
		$theme_info['theme_activated']  = (int) get_option( 'birdily_theme_activated' );
		$theme_info['theme_pro_key']    = birdily_storage_get( 'theme_pro_key' );
		$theme_info['theme_plugins']    = birdily_storage_get( 'theme_plugins' );
		$theme_info['theme_categories'] = explode( ',', birdily_storage_get( 'theme_categories' ) );
		$theme_info['theme_actions']    = array(
			'demo'    => array(
				'link'        => birdily_storage_get( 'theme_demo_url' ),
				'link_text'   => esc_html__( 'Demo', 'birdily' ),
			),
			'doc'     => array(
				'link'        => birdily_storage_get( 'theme_doc_url' ),
				'link_text'   => esc_html__( 'Docs', 'birdily' ),
				'image'       => birdily_get_file_url( 'theme-specific/theme-about/images/theme-panel-doc.png' ),
				'title'       => esc_html__( 'Documentation', 'birdily' ),
				'description' => esc_html__( "Having any questions regarding theme features or installation? Find out how to use and set up your theme in the documentation.", 'birdily' ),
				'button'      => esc_html__( 'Read Documentation', 'birdily' ),
			),
			'support' => array(
				'link'        => birdily_storage_get( 'theme_support_url' ),
				'link_text'   => esc_html__( 'Support', 'birdily' ),
				'image'       => birdily_get_file_url( 'theme-specific/theme-about/images/theme-panel-support.png' ),
				'title'       => esc_html__( 'Support', 'birdily' ),
				'description' => esc_html__( "Are you stuck and need help? Don't worry, you can always submit a support ticket, and our team will help you out.", 'birdily' ),
				'button'      => esc_html__( 'Read Policy & Submit Ticket', 'birdily' ),
			),
			'options'         => array(
				'link'        => admin_url() . 'customize.php',
				'image'       => birdily_get_file_url( 'theme-specific/theme-about/images/theme-panel-options.png' ),
				'title'       => esc_html__( 'Theme Options', 'birdily' ),
				'description' => esc_html__( "That's where you can customize the appearance of your theme and disable/enable specific theme features.", 'birdily' ),
				'button'      => esc_html__( 'Go to Customizer', 'birdily' ),
			),
		);
		if ( BIRDILY_THEME_FREE ) {
			$theme_info['theme_name']          .= ' ' . esc_html__( 'Free', 'birdily' );
			$theme_info['theme_free']           = true;
			$theme_info['theme_actions']['pro'] = array(
				'link'        => birdily_storage_get( 'theme_download_url' ),
				'link_text'   => esc_html__( 'Go PRO', 'birdily' ),
				'image'       => birdily_get_file_url( 'theme-specific/theme-about/images/theme-panel-pro.png' ),
				'title'       => esc_html__( 'Go Pro', 'birdily' ),
				'description' => esc_html__( 'Get Pro version to increase power of this theme in many times!', 'birdily' ),
				'button'      => esc_html__( 'Get PRO Version', 'birdily' ),
			);
		}
		return $theme_info;
	}
}

if ( ! function_exists( 'birdily_trx_addons_tgmpa_required_plugins_all' ) ) {
	
	function birdily_trx_addons_tgmpa_required_plugins_all( $list = array() ) {
		$theme_plugins = array();
		if ( is_array( $list ) ) {
			foreach( $list as $item ) {
				$theme_plugins[ $item['slug'] ] = $item;
			}
		}
		birdily_storage_set( 'theme_plugins', $theme_plugins );
		return $list;
	}
}


// Hide sidebar on the news feed pages
if ( ! function_exists( 'birdily_trx_addons_sidebar_present' ) ) {
	
	function birdily_trx_addons_sidebar_present( $present ) {
		return get_post_type() != 'trx_feed' && $present;
	}
}

// Return text for the "I agree ..." checkbox
if ( ! function_exists( 'birdily_trx_addons_privacy_text' ) ) {
	
	function birdily_trx_addons_privacy_text( $text='' ) {
		return birdily_get_privacy_text();
	}
}



/* Plugin's support utilities
------------------------------------------------------------------------------- */

// Check if plugin installed and activated
if ( ! function_exists( 'birdily_exists_trx_addons' ) ) {
	function birdily_exists_trx_addons() {
		return defined( 'TRX_ADDONS_VERSION' );
	}
}

// Return true if cars is supported
if ( ! function_exists( 'birdily_exists_cars' ) ) {
	function birdily_exists_cars() {
		return defined( 'TRX_ADDONS_CPT_CARS_PT' );
	}
}

// Return true if certificates is supported
if ( ! function_exists( 'birdily_exists_certificates' ) ) {
	function birdily_exists_certificates() {
		return defined( 'TRX_ADDONS_CPT_CERTIFICATES_PT' );
	}
}

// Return true if courses is supported
if ( ! function_exists( 'birdily_exists_courses' ) ) {
	function birdily_exists_courses() {
		return defined( 'TRX_ADDONS_CPT_COURSES_PT' );
	}
}

// Return true if dishes is supported
if ( ! function_exists( 'birdily_exists_dishes' ) ) {
	function birdily_exists_dishes() {
		return defined( 'TRX_ADDONS_CPT_DISHES_PT' );
	}
}

// Return true if layouts is supported
if ( ! function_exists( 'birdily_exists_layouts' ) ) {
	function birdily_exists_layouts() {
		return defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' );
	}
}

// Return true if portfolio is supported
if ( ! function_exists( 'birdily_exists_portfolio' ) ) {
	function birdily_exists_portfolio() {
		return defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' );
	}
}

// Return true if properties is supported
if ( ! function_exists( 'birdily_exists_properties' ) ) {
	function birdily_exists_properties() {
		return defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' );
	}
}

// Return true if resume is supported
if ( ! function_exists( 'birdily_exists_resume' ) ) {
	function birdily_exists_resume() {
		return defined( 'TRX_ADDONS_CPT_RESUME_PT' );
	}
}

// Return true if services is supported
if ( ! function_exists( 'birdily_exists_services' ) ) {
	function birdily_exists_services() {
		return defined( 'TRX_ADDONS_CPT_SERVICES_PT' );
	}
}

// Return true if sport is supported
if ( ! function_exists( 'birdily_exists_sport' ) ) {
	function birdily_exists_sport() {
		return defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' );
	}
}

// Return true if team is supported
if ( ! function_exists( 'birdily_exists_team' ) ) {
	function birdily_exists_team() {
		return defined( 'TRX_ADDONS_CPT_TEAM_PT' );
	}
}

// Return true if testimonials is supported
if ( ! function_exists( 'birdily_exists_testimonials' ) ) {
	function birdily_exists_testimonials() {
		return defined( 'TRX_ADDONS_CPT_TESTIMONIALS_PT' );
	}
}

// Return true if rating (reviews) is supported
if ( ! function_exists( 'birdily_exists_reviews' ) ) {
	function birdily_exists_reviews() {
		return function_exists( 'trx_addons_reviews_enable' ) && trx_addons_reviews_enable();
	}
}


// Return true if it's cars page
if ( ! function_exists( 'birdily_is_cars_page' ) ) {
	function birdily_is_cars_page() {
		return function_exists( 'trx_addons_is_cars_page' ) && trx_addons_is_cars_page();
	}
}

// Return true if it's courses page
if ( ! function_exists( 'birdily_is_courses_page' ) ) {
	function birdily_is_courses_page() {
		return function_exists( 'trx_addons_is_courses_page' ) && trx_addons_is_courses_page();
	}
}

// Return true if it's dishes page
if ( ! function_exists( 'birdily_is_dishes_page' ) ) {
	function birdily_is_dishes_page() {
		return function_exists( 'trx_addons_is_dishes_page' ) && trx_addons_is_dishes_page();
	}
}

// Return true if it's properties page
if ( ! function_exists( 'birdily_is_properties_page' ) ) {
	function birdily_is_properties_page() {
		return function_exists( 'trx_addons_is_properties_page' ) && trx_addons_is_properties_page();
	}
}

// Return true if it's portfolio page
if ( ! function_exists( 'birdily_is_portfolio_page' ) ) {
	function birdily_is_portfolio_page() {
		return function_exists( 'trx_addons_is_portfolio_page' ) && trx_addons_is_portfolio_page();
	}
}

// Return true if it's services page
if ( ! function_exists( 'birdily_is_services_page' ) ) {
	function birdily_is_services_page() {
		return function_exists( 'trx_addons_is_services_page' ) && trx_addons_is_services_page();
	}
}

// Return true if it's team page
if ( ! function_exists( 'birdily_is_team_page' ) ) {
	function birdily_is_team_page() {
		return function_exists( 'trx_addons_is_team_page' ) && trx_addons_is_team_page();
	}
}

// Return true if it's sport page
if ( ! function_exists( 'birdily_is_sport_page' ) ) {
	function birdily_is_sport_page() {
		return function_exists( 'trx_addons_is_sport_page' ) && trx_addons_is_sport_page();
	}
}

// Return true if custom layouts are available
if ( ! function_exists( 'birdily_is_layouts_available' ) ) {
	function birdily_is_layouts_available() {
		return birdily_exists_trx_addons()
										&& (
											function_exists( 'birdily_exists_sop' ) && birdily_exists_sop()
											||
											function_exists( 'birdily_exists_elementor' ) && birdily_exists_elementor()
											||
											function_exists( 'birdily_exists_vc' ) && birdily_exists_vc()
											);
	}
}

// Return true if theme is activated in the Theme Panel
if ( ! function_exists( 'birdily_is_theme_activated' ) ) {
	function birdily_is_theme_activated() {
		return function_exists( 'trx_addons_is_theme_activated' ) && trx_addons_is_theme_activated();
	}
}

// Return theme activation code
if ( ! function_exists( 'birdily_get_theme_activation_code' ) ) {
	function birdily_get_theme_activation_code() {
		return function_exists( 'trx_addons_get_theme_activation_code' ) ? trx_addons_get_theme_activation_code() : '';
	}
}

// Detect current blog mode
if ( ! function_exists( 'birdily_trx_addons_detect_blog_mode' ) ) {
	
	function birdily_trx_addons_detect_blog_mode( $mode = '' ) {
		if ( birdily_is_cars_page() ) {
			$mode = 'cars';
		} elseif ( birdily_is_courses_page() ) {
			$mode = 'courses';
		} elseif ( birdily_is_dishes_page() ) {
			$mode = 'dishes';
		} elseif ( birdily_is_properties_page() ) {
			$mode = 'properties';
		} elseif ( birdily_is_portfolio_page() ) {
			$mode = 'portfolio';
		} elseif ( birdily_is_services_page() ) {
			$mode = 'services';
		} elseif ( birdily_is_sport_page() ) {
			$mode = 'sport';
		} elseif ( birdily_is_team_page() ) {
			$mode = 'team';
		}
		return $mode;
	}
}

// Disallow increment views counter on the blog archive
if ( ! function_exists( 'birdily_trx_addons_inc_views' ) ) {
	
	function birdily_trx_addons_inc_views( $allow = false ) {
		return $allow && is_page() && birdily_storage_isset( 'blog_archive' ) ? false : $allow;
	}
}

// Add team, courses, etc. to the supported posts list
if ( ! function_exists( 'birdily_trx_addons_list_post_types' ) ) {
	
	function birdily_trx_addons_list_post_types( $list = array() ) {
		if ( function_exists( 'trx_addons_get_cpt_list' ) ) {
			$cpt_list = trx_addons_get_cpt_list();
			foreach ( $cpt_list as $cpt => $title ) {
				if (
					( defined( 'TRX_ADDONS_CPT_CARS_PT' ) && TRX_ADDONS_CPT_CARS_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && TRX_ADDONS_CPT_COURSES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) && TRX_ADDONS_CPT_DISHES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) && TRX_ADDONS_CPT_PORTFOLIO_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) && TRX_ADDONS_CPT_PROPERTIES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) && TRX_ADDONS_CPT_SERVICES_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && TRX_ADDONS_CPT_COMPETITIONS_PT == $cpt )
					|| ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) && TRX_ADDONS_CPT_TEAM_PT == $cpt )
					) {
					$list[ $cpt ] = $title;
				}
			}
		}
		return $list;
	}
}

// Return taxonomy for current post type
if ( ! function_exists( 'birdily_trx_addons_post_type_taxonomy' ) ) {
	
	function birdily_trx_addons_post_type_taxonomy( $tax = '', $post_type = '' ) {
		if ( defined( 'TRX_ADDONS_CPT_CARS_PT' ) && TRX_ADDONS_CPT_CARS_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_CARS_TAXONOMY_MAKER;
		} elseif ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && TRX_ADDONS_CPT_COURSES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_COURSES_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) && TRX_ADDONS_CPT_DISHES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_DISHES_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) && TRX_ADDONS_CPT_PORTFOLIO_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_PORTFOLIO_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) && TRX_ADDONS_CPT_PROPERTIES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_PROPERTIES_TAXONOMY_TYPE;
		} elseif ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) && TRX_ADDONS_CPT_SERVICES_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_SERVICES_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && TRX_ADDONS_CPT_COMPETITIONS_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_COMPETITIONS_TAXONOMY;
		} elseif ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) && TRX_ADDONS_CPT_TEAM_PT == $post_type ) {
			$tax = TRX_ADDONS_CPT_TEAM_TAXONOMY;
		}
		return $tax;
	}
}

// Show categories of the team, courses, etc.
if ( ! function_exists( 'birdily_trx_addons_get_post_categories' ) ) {
	
	function birdily_trx_addons_get_post_categories( $cats = '' ) {

		if ( defined( 'TRX_ADDONS_CPT_CARS_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_CARS_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_CARS_TAXONOMY_TYPE );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_COURSES_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_COURSES_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_DISHES_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_DISHES_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_PORTFOLIO_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_PORTFOLIO_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_PROPERTIES_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_PROPERTIES_TAXONOMY_TYPE );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_SERVICES_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_SERVICES_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_COMPETITIONS_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_COMPETITIONS_TAXONOMY );
			}
		}
		if ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) ) {
			if ( get_post_type() == TRX_ADDONS_CPT_TEAM_PT ) {
				$cats = birdily_get_post_terms( ', ', get_the_ID(), TRX_ADDONS_CPT_TEAM_TAXONOMY );
			}
		}
		return $cats;
	}
}

// Show post's date with the theme-specific format
if ( ! function_exists( 'birdily_trx_addons_get_post_date_wrap' ) ) {
	
	function birdily_trx_addons_get_post_date_wrap( $dt = '' ) {
		return apply_filters( 'birdily_filter_get_post_date', $dt );
	}
}

// Show date of the courses
if ( ! function_exists( 'birdily_trx_addons_get_post_date' ) ) {
	
	function birdily_trx_addons_get_post_date( $dt = '' ) {

		if ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && get_post_type() == TRX_ADDONS_CPT_COURSES_PT ) {
			$meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
			$dt   = $meta['date'];
			$dt   = sprintf(
				// Translators: Add formatted date to the output
				$dt < date( 'Y-m-d' ) ? esc_html__( 'Started on %s', 'birdily' ) : esc_html__( 'Starting %s', 'birdily' ),
				date_i18n( get_option( 'date_format' ), strtotime( $dt ) )
			);

		} elseif ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && in_array( get_post_type(), array( TRX_ADDONS_CPT_COMPETITIONS_PT, TRX_ADDONS_CPT_ROUNDS_PT, TRX_ADDONS_CPT_MATCHES_PT ) ) ) {
			$meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
			$dt   = $meta['date_start'];
			$dt   = sprintf(
				// Translators: Add formatted date to the output
				$dt < date( 'Y-m-d' ) . ( ! empty( $meta['time_start'] ) ? ' H:i' : '' ) ? esc_html__( 'Started on %s', 'birdily' ) : esc_html__( 'Starting %s', 'birdily' ),
				date_i18n( get_option( 'date_format' ) . ( ! empty( $meta['time_start'] ) ? ' ' . get_option( 'time_format' ) : '' ), strtotime( $dt . ( ! empty( $meta['time_start'] ) ? ' ' . trim( $meta['time_start'] ) : '' ) ) )
			);

		} elseif ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && get_post_type() == TRX_ADDONS_CPT_PLAYERS_PT ) {
			// Uncomment (remove) next line if you want to show player's birthday in the page title block
			if ( false ) {
				$meta = get_post_meta( get_the_ID(), 'trx_addons_options', true );
				// Translators: Add formatted date to the output
				$dt = ! empty( $meta['birthday'] ) ? sprintf( esc_html__( 'Birthday: %s', 'birdily' ), date_i18n( get_option( 'date_format' ), strtotime( $meta['birthday'] ) ) ) : '';
			} else {
				$dt = '';
			}
		}
		return $dt;
	}
}

// Check if theme options is allowed
if ( ! function_exists( 'birdily_trx_addons_allow_override_options' ) ) {
	
	function birdily_trx_addons_allow_override_options( $allow, $post_type ) {
		return $allow
					|| ( function_exists( 'trx_addons_get_list_extended_taxonomy_pt_list' ) && in_array( $post_type, trx_addons_get_list_extended_taxonomy_pt_list() ) )
					|| ( defined( 'TRX_ADDONS_CPT_CARS_PT' ) && in_array(
						$post_type, array(
							TRX_ADDONS_CPT_CARS_PT,
							TRX_ADDONS_CPT_CARS_AGENTS_PT,
						)
					) )
					|| ( defined( 'TRX_ADDONS_CPT_COURSES_PT' ) && TRX_ADDONS_CPT_COURSES_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_DISHES_PT' ) && TRX_ADDONS_CPT_DISHES_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_PORTFOLIO_PT' ) && TRX_ADDONS_CPT_PORTFOLIO_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_PROPERTIES_PT' ) && in_array(
						$post_type, array(
							TRX_ADDONS_CPT_PROPERTIES_PT,
							TRX_ADDONS_CPT_AGENTS_PT,
						)
					) )
					|| ( defined( 'TRX_ADDONS_CPT_RESUME_PT' ) && TRX_ADDONS_CPT_RESUME_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_SERVICES_PT' ) && TRX_ADDONS_CPT_SERVICES_PT == $post_type )
					|| ( defined( 'TRX_ADDONS_CPT_COMPETITIONS_PT' ) && in_array(
						$post_type, array(
							TRX_ADDONS_CPT_COMPETITIONS_PT,
							TRX_ADDONS_CPT_ROUNDS_PT,
							TRX_ADDONS_CPT_MATCHES_PT,
						)
					) )
					|| ( defined( 'TRX_ADDONS_CPT_TEAM_PT' ) && TRX_ADDONS_CPT_TEAM_PT == $post_type );
	}
}

// Check if theme icons is allowed
if ( ! function_exists( 'birdily_trx_addons_allow_theme_icons' ) ) {
	
	function birdily_trx_addons_allow_theme_icons( $allow, $post_type ) {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		return $allow
					|| ( defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' ) && TRX_ADDONS_CPT_LAYOUTS_PT == $post_type )
					|| ( ! empty( $screen->id ) 
						&& ( false !== strpos($screen->id, '_page_trx_addons_options')
							|| in_array( $screen->id, array(
									'profile',
									'widgets',
									)
								)
							)
						);
	}
}

// Disable theme-specific fields in the exported options
if ( ! function_exists( 'birdily_trx_addons_export_options' ) ) {
	
	function birdily_trx_addons_export_options( $options ) {
		// ThemeREX Addons
		if ( ! empty( $options['trx_addons_options'] ) ) {
			$options['trx_addons_options']['debug_mode']             = 0;
			$options['trx_addons_options']['api_google']             = '';
			$options['trx_addons_options']['api_google_analitics']   = '';
			$options['trx_addons_options']['api_google_remarketing'] = '';
			$options['trx_addons_options']['demo_enable']            = 0;
			$options['trx_addons_options']['demo_referer']           = '';
			$options['trx_addons_options']['demo_default_url']       = '';
			$options['trx_addons_options']['demo_logo']              = '';
			$options['trx_addons_options']['demo_post_type']         = '';
			$options['trx_addons_options']['demo_taxonomy']          = '';
			$options['trx_addons_options']['demo_logo']              = '';
			$options['trx_addons_options']['demo_logo']              = '';
			unset( $options['trx_addons_options']['themes_market_referals'] );
		}
		// ThemeREX Donations
		if ( ! empty( $options['trx_donations_options'] ) ) {
			$options['trx_donations_options']['pp_account'] = '';
		}
		// WooCommerce
		if ( ! empty( $options['woocommerce_paypal_settings'] ) ) {
			$options['woocommerce_paypal_settings']['email']          = '';
			$options['woocommerce_paypal_settings']['receiver_email'] = '';
			$options['woocommerce_paypal_settings']['identity_token'] = '';
		}
		return $options;
	}
}

// Set related posts and columns for the plugin's output
if ( ! function_exists( 'birdily_trx_addons_args_related' ) ) {
	
	function birdily_trx_addons_args_related( $args ) {
		if ( ! empty( $args['template_args_name'] )
			&& in_array(
				$args['template_args_name'],
				array(
					'trx_addons_args_sc_cars',
					'trx_addons_args_sc_courses',
					'trx_addons_args_sc_dishes',
					'trx_addons_args_sc_portfolio',
					'trx_addons_args_sc_properties',
					'trx_addons_args_sc_services',
				)
			) ) {
			$args['posts_per_page']    = (int) birdily_get_theme_option( 'show_related_posts' )
												? birdily_get_theme_option( 'related_posts' )
												: 0;
			$args['columns']           = birdily_get_theme_option( 'related_columns' );
			$args['slider']            = (int) birdily_get_theme_option( 'related_slider' );
			$args['slides_space']      = birdily_get_theme_option( 'related_slider_space' );
			$args['slider_controls']   = birdily_get_theme_option( 'related_slider_controls' );
			$args['slider_pagination'] = birdily_get_theme_option( 'related_slider_pagination' );
		}
		return $args;
	}
}

// Redirect filter to the plugin
if ( ! function_exists( 'birdily_trx_addons_show_related_posts' ) ) {
	
	function birdily_trx_addons_show_related_posts( $show ) {
		return apply_filters( 'trx_addons_filter_show_related_posts', $show );
	}
}

// Return false if related posts must be showed below page
if ( ! function_exists( 'birdily_trx_addons_show_related_posts_after_article' ) ) {
	
	function birdily_trx_addons_show_related_posts_after_article( $show ) {
		return $show && birdily_get_theme_option( 'related_position' ) == 'below_content';
	}
}

// Add 'custom' to the headers types list
if ( ! function_exists( 'birdily_trx_addons_list_header_footer_types' ) ) {
	
	function birdily_trx_addons_list_header_footer_types( $list = array() ) {
		if ( birdily_exists_layouts() ) {
			$list['custom'] = esc_html__( 'Custom', 'birdily' );
		}
		return $list;
	}
}

// Add layouts to the headers list
if ( ! function_exists( 'birdily_trx_addons_list_header_styles' ) ) {
	
	function birdily_trx_addons_list_header_styles( $list = array() ) {
		if ( birdily_exists_layouts() ) {
			$layouts  = birdily_get_list_posts(
				false, array(
					'post_type'    => TRX_ADDONS_CPT_LAYOUTS_PT,
					'meta_key'     => 'trx_addons_layout_type',
					'meta_value'   => 'header',
					'orderby'      => 'ID',
					'order'        => 'asc',
					'not_selected' => false,
				)
			);
			$new_list = array();
			foreach ( $layouts as $id => $title ) {
				if ( 'none' != $id ) {
					$new_list[ 'header-custom-' . intval( $id ) ] = $title;
				}
			}
			$list = birdily_array_merge( $new_list, $list );
		}
		return $list;
	}
}

// Add layouts to the footers list
if ( ! function_exists( 'birdily_trx_addons_list_footer_styles' ) ) {
	
	function birdily_trx_addons_list_footer_styles( $list = array() ) {
		if ( birdily_exists_layouts() ) {
			$layouts  = birdily_get_list_posts(
				false, array(
					'post_type'    => TRX_ADDONS_CPT_LAYOUTS_PT,
					'meta_key'     => 'trx_addons_layout_type',
					'meta_value'   => 'footer',
					'orderby'      => 'ID',
					'order'        => 'asc',
					'not_selected' => false,
				)
			);
			$new_list = array();
			foreach ( $layouts as $id => $title ) {
				if ( 'none' != $id ) {
					$new_list[ 'footer-custom-' . intval( $id ) ] = $title;
				}
			}
			$list = birdily_array_merge( $new_list, $list );
		}
		return $list;
	}
}


// Return id of the custom header or footer for current mode
if ( ! function_exists( 'birdily_get_custom_layout_id' ) ) {
	function birdily_get_custom_layout_id($type) {
		$layout_id = 0;
		$layout_style = birdily_get_theme_option( "{$type}_style" );
		if ( strpos( $layout_style, "{$type}-custom-" ) !== false ) {
			$layout_id = str_replace( "{$type}-custom-", '', $layout_style );
			if ( 0 == (int) $layout_id ) {
				$layout_id = birdily_get_post_id(
					array(
						'name'      => $layout_id,
						'post_type' => defined( 'TRX_ADDONS_CPT_LAYOUTS_PT' ) ? TRX_ADDONS_CPT_LAYOUTS_PT : 'cpt_layouts',
					)
				);
			} else {
				$layout_id = apply_filters( 'birdily_filter_get_translated_layout', $layout_id );
			}
		}
		return $layout_id;
	}
}

if ( ! function_exists( 'birdily_get_custom_header_id' ) ) {
	function birdily_get_custom_header_id() {
		static $layout_id = -1;
		if ( -1 == $layout_id ) {
			$layout_id = birdily_get_custom_layout_id('header');
		}
		return $layout_id;
	}
}

if ( ! function_exists( 'birdily_get_custom_footer_id' ) ) {
	function birdily_get_custom_footer_id() {
		static $layout_id = -1;
		if ( -1 == $layout_id ) {
			$layout_id = birdily_get_custom_layout_id('footer');
		}
		return $layout_id;
	}
}


// Replace {{Y}} or {Y} with the current year in the layouts
if ( ! function_exists( 'birdily_trx_addons_replace_current_year' ) ) {
	
	function birdily_trx_addons_replace_current_year( $content, $post_id = 0 ) {
		return str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $content );
	}
}


// Add theme-specific layouts to the list
if ( ! function_exists( 'birdily_trx_addons_default_layouts' ) ) {
	
	function birdily_trx_addons_default_layouts( $default_layouts = array() ) {
		if ( birdily_storage_isset( 'trx_addons_default_layouts' ) ) {
			$layouts = birdily_storage_get( 'trx_addons_default_layouts' );
		} else {
			require_once BIRDILY_THEME_DIR . 'theme-specific/trx_addons-layouts.php';
			if ( ! isset( $layouts ) || ! is_array( $layouts ) ) {
				$layouts = array();
			} else {
				// Replace demo-site urls with current site url
				$old_url = birdily_storage_get( 'theme_demo_url' );
				if ( substr( $old_url, -1 ) == '/' ) {
					$old_url = substr( $old_url, 0, strlen( $old_url ) - 1 );
				}
				$site_url = get_home_url();
				if ( substr( $site_url, -1 ) == '/' ) {
					$site_url = substr( $site_url, 0, strlen( $site_url ) - 1 );
				}
				$layouts = birdily_str_replace(
					array(
						$old_url,
						birdily_remove_protocol_from_url( $old_url, false ),
						birdily_remove_protocol_from_url( $old_url, true ),
					),
					array(
						$site_url,
						birdily_remove_protocol_from_url( $site_url, false ),
						birdily_remove_protocol_from_url( $site_url, true ),
					),
					$layouts
				);
			}
			birdily_storage_set( 'trx_addons_default_layouts', $layouts );
		}
		if ( count( $layouts ) > 0 ) {
			$default_layouts = array_merge( $default_layouts, $layouts );
		}
		return $default_layouts;
	}
}


// Add theme-specific components to the plugin's options
if ( ! function_exists( 'birdily_trx_addons_default_components' ) ) {
	
	function birdily_trx_addons_default_components( $options = array() ) {
		if ( empty( $options['components_present'] ) ) {
			if ( birdily_storage_isset( 'trx_addons_default_components' ) ) {
				$components = birdily_storage_get( 'trx_addons_default_components' );
			} else {
				require_once BIRDILY_THEME_DIR . 'theme-specific/trx_addons-components.php';
				if ( ! isset( $components ) || ! is_array( $components ) ) {
					$components = array();
				}
				birdily_storage_set( 'trx_addons_default_components', $components );
			}
			$options = is_array( $options ) && count( $components ) > 0
									? array_merge( $options, $components )
									: $components;
		}
		// Turn on API of the theme required plugins
		$plugins = birdily_storage_get( 'required_plugins' );
		foreach ( $plugins as $p => $v ) {
			//Disable check, because some components can be added after the plugin's options are saved
			if ( true || isset( $options[ "components_api_{$p}" ] ) ) {
				$options[ "components_api_{$p}" ] = 1;
			}
		}
		return $options;
	}
}


// Add theme-specific options to the post's options
if ( ! function_exists( 'birdily_trx_addons_override_options' ) ) {
	
	function birdily_trx_addons_override_options( $options = array() ) {
		return apply_filters( 'birdily_filter_override_options', $options );
	}
}

// Enqueue custom styles
if ( ! function_exists( 'birdily_trx_addons_layouts_styles' ) ) {
	
	function birdily_trx_addons_layouts_styles() {
		if ( ! birdily_exists_trx_addons() ) {
			$birdily_url = birdily_get_file_url( 'plugins/trx_addons/layouts/layouts.css' );
			if ( '' != $birdily_url ) {
				wp_enqueue_style( 'birdily-trx-addons-layouts', $birdily_url, array(), null );
			}
			$birdily_url = birdily_get_file_url( 'plugins/trx_addons/layouts/layouts.responsive.css' );
			if ( '' != $birdily_url ) {
				wp_enqueue_style( 'birdily-trx-addons-layouts-responsive', $birdily_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'birdily_trx_addons_merge_styles' ) ) {
	
	function birdily_trx_addons_merge_styles( $list ) {
		$list[] = 'plugins/trx_addons/_trx_addons.scss';
		return $list;
	}
}

// Merge responsive styles
if ( ! function_exists( 'birdily_trx_addons_merge_styles_responsive' ) ) {
	
	function birdily_trx_addons_merge_styles_responsive( $list ) {
		$list[] = 'plugins/trx_addons/_trx_addons-responsive.scss';
		return $list;
	}
}

// Add theme-specific vars to the list of responsive files of ThemeREX Addons
if ( ! function_exists( 'birdily_trx_addons_sass_import' ) ) {
	
	function birdily_trx_addons_sass_import( $output = '', $file = '' ) {
		if ( strpos( $file, 'vars.scss' ) !== false ) {
			$output .= "\n" . birdily_fgc( birdily_get_file_dir( 'css/_theme-vars.scss' ) ) . "\n";
		}
		return $output;
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'birdily_trx_addons_frontend_scripts' ) ) {
	
	function birdily_trx_addons_frontend_scripts() {
		if ( birdily_exists_trx_addons() ) {
			if ( birdily_is_on( birdily_get_theme_option( 'debug_mode' ) ) ) {
				$birdily_url = birdily_get_file_url( 'plugins/trx_addons/trx_addons.js' );
				if ( '' != $birdily_url ) {
					wp_enqueue_script( 'birdily-trx-addons', $birdily_url, array( 'jquery' ), null, true );
				}
			}
		}
	}
}

// Merge custom scripts
if ( ! function_exists( 'birdily_trx_addons_merge_scripts' ) ) {
	
	function birdily_trx_addons_merge_scripts( $list ) {
		$list[] = 'plugins/trx_addons/trx_addons.js';
		return $list;
	}
}



// Plugin API - theme-specific wrappers for plugin functions
//------------------------------------------------------------------------

// Debug functions wrappers
if ( ! function_exists( 'ddo' ) ) {
	function ddo( $obj, $level = -1 ) {
		return var_dump( $obj ); }
}
if ( ! function_exists( 'dcl' ) ) {
	function dcl( $msg, $level = -1 ) {
		echo '<br><pre>' . esc_html( $msg ) . '</pre><br>'; }
}
if ( ! function_exists( 'dco' ) ) {
	function dco( $obj, $level = -1 ) {
		dcl( ddo( $obj, $level ), $level ); }
}
if ( ! function_exists( 'dcs' ) ) {
	function dcs( $level = -1 ) {
		$s = debug_backtrace();
		array_shift( $s );
		dco( $s, $level ); }
}

// Check if URL contain specified string
if ( ! function_exists( 'birdily_check_url' ) ) {
	function birdily_check_url( $val = '', $defa = false ) {
		return function_exists( 'trx_addons_check_url' )
					? trx_addons_check_url( $val )
					: $defa;
	}
}

// Check if layouts components are showed or set new state
if ( ! function_exists( 'birdily_sc_layouts_showed' ) ) {
	function birdily_sc_layouts_showed( $name, $val = null ) {
		if ( function_exists( 'trx_addons_sc_layouts_showed' ) ) {
			if ( null !== $val ) {
				trx_addons_sc_layouts_showed( $name, $val );
			} else {
				return trx_addons_sc_layouts_showed( $name );
			}
		} else {
			if ( null !== $val ) {
				birdily_storage_set_array( 'sc_layouts_components', $name, $val );
			} else {
				return birdily_storage_get_array( 'sc_layouts_components', $name );
			}
		}
	}
}

// Return image size multiplier
if ( ! function_exists( 'birdily_get_retina_multiplier' ) ) {
	function birdily_get_retina_multiplier( $force_retina = 0 ) {
		$mult = function_exists( 'trx_addons_get_retina_multiplier' ) ? trx_addons_get_retina_multiplier( $force_retina ) : 1;
		return max( 1, $mult );
	}
}

// Return slider layout
if ( ! function_exists( 'birdily_get_slider_layout' ) ) {
	function birdily_get_slider_layout( $args ) {
		return function_exists( 'trx_addons_get_slider_layout' )
					? trx_addons_get_slider_layout( $args )
					: '';
	}
}

// Return slider wrapper first part
if ( ! function_exists( 'birdily_get_slider_wrap_start' ) ) {
	function birdily_get_slider_wrap_start( $sc, $args ) {
		if ( function_exists( 'trx_addons_sc_show_slider_wrap_start' ) ) {
			trx_addons_sc_show_slider_wrap_start( $sc, $args );
		}
	}
}

// Return slider wrapper last part
if ( ! function_exists( 'birdily_get_slider_wrap_end' ) ) {
	function birdily_get_slider_wrap_end( $sc, $args ) {
		if ( function_exists( 'trx_addons_sc_show_slider_wrap_end' ) ) {
			trx_addons_sc_show_slider_wrap_end( $sc, $args );
		}
	}
}

// Return video player layout
if ( ! function_exists( 'birdily_get_video_layout' ) ) {
	function birdily_get_video_layout( $args ) {
		return function_exists( 'trx_addons_get_video_layout' )
					? trx_addons_get_video_layout( $args )
					: '';
	}
}

// Include theme-specific blog style content
if ( ! function_exists( 'birdily_trx_addons_sc_blogger_template' ) ) {
	
	function birdily_trx_addons_sc_blogger_template( $result, $args ) {
		if ( ! $result ) {
			$tpl = birdily_blog_item_get_template( $args['type'] );
			if ( '' != $tpl ) {
				$tpl = birdily_get_file_dir( $tpl . '.php' );
				if ( '' != $tpl ) {
					set_query_var( 'birdily_template_args', $args );
					include $tpl;
					$result = true;
				}
			}
		}
		return $result;
	}
}

// Return theme specific layout of the featured image block
if ( ! function_exists( 'birdily_trx_addons_featured_image' ) ) {
	
	function birdily_trx_addons_featured_image( $processed = false, $args = array() ) {
		$args['show_no_image'] = true;
		$args['singular']      = false;
		$args['hover']         = isset( $args['hover'] ) && '' == $args['hover'] 
									? '' 
									: ( isset( $args['hover'] ) && '!' == $args['hover'][0]
										? substr( $args['hover'], 1 )
										: birdily_get_theme_option( 'image_hover' ) 
									);
		birdily_show_post_featured( $args );
		return true;
	}
}

// Remove some thumb-sizes from the ThemeREX Addons list
if ( ! function_exists( 'birdily_trx_addons_add_thumb_sizes' ) ) {
	
	function birdily_trx_addons_add_thumb_sizes( $list = array() ) {
		if ( is_array( $list ) ) {
			$thumb_sizes = birdily_storage_get( 'theme_thumbs' );
			foreach ( $thumb_sizes as $v ) {
				if ( ! empty( $v['subst'] ) && isset( $list[ $v['subst'] ] ) ) {
					unset( $list[ $v['subst'] ] );
				}
			}
		}
		return $list;
	}
}

// and replace removed styles with theme-specific thumb size
if ( ! function_exists( 'birdily_trx_addons_get_thumb_size' ) ) {
	
	function birdily_trx_addons_get_thumb_size( $thumb_size = '' ) {
		$thumb_sizes = birdily_storage_get( 'theme_thumbs' );
		foreach ( $thumb_sizes as $k => $v ) {
			if ( strpos( $thumb_size, $v['subst'] ) !== false ) {
				$thumb_size = str_replace( $thumb_size, $v['subst'], $k );
				break;
			}
		}
		return $thumb_size;
	}
}

// Return theme specific 'no-image' picture
if ( ! function_exists( 'birdily_trx_addons_no_image' ) ) {
	
	function birdily_trx_addons_no_image( $no_image = '' ) {
		return birdily_get_no_image( $no_image );
	}
}

// Return theme-specific icons
if ( ! function_exists( 'birdily_trx_addons_get_list_icons_classes' ) ) {
	
	function birdily_trx_addons_get_list_icons_classes( $list, $prepend_inherit ) {
		return birdily_get_list_icons_classes( $prepend_inherit );
	}
}

// Remove 'icon-' from the name
if ( ! function_exists( 'birdily_trx_addons_clear_icon_name' ) ) {
	
	function birdily_trx_addons_clear_icon_name( $icon ) {
		return substr( $icon, 0, 5 ) == 'icon-' ? substr( $icon, 5 ) : $icon;
	}
}


// Return links to the social profiles
if ( ! function_exists( 'birdily_get_socials_links' ) ) {
	function birdily_get_socials_links( $style = 'icons' ) {
		return function_exists( 'trx_addons_get_socials_links' )
					? trx_addons_get_socials_links( $style )
					: '';
	}
}

// Return links to share post
if ( ! function_exists( 'birdily_get_share_links' ) ) {
	function birdily_get_share_links( $args = array() ) {
		return function_exists( 'trx_addons_get_share_links' )
					? trx_addons_get_share_links( $args )
					: '';
	}
}

// Display links to share post
if ( ! function_exists( 'birdily_show_share_links' ) ) {
	function birdily_show_share_links( $args = array() ) {
		if ( function_exists( 'trx_addons_get_share_links' ) ) {
			$args['echo'] = true;
			trx_addons_get_share_links( $args );
		}
	}
}

// Display tags
if ( ! function_exists( 'birdily_show_tags' ) ) {
	function birdily_show_tags( $args = array() ) {
		if ( function_exists( 'trx_addons_get_tags' ) ) {
			$args['echo'] = true;
			trx_addons_get_tags( $args );
		}
	}
}

// Return post icon
if ( ! function_exists( 'birdily_get_post_icon' ) ) {
	function birdily_get_post_icon( $post_id = 0 ) {
		return function_exists( 'trx_addons_get_post_icon' )
					? trx_addons_get_post_icon( $post_id )
					: '';
	}
}

// Show reactions in the single posts
if ( ! function_exists( 'birdily_trx_addons_action_before_post_meta' ) ) {
	
	function birdily_trx_addons_action_before_post_meta() {
		if ( trx_addons_is_on( trx_addons_get_option( 'emotions_allowed' ) ) && is_single() && ! is_attachment() ) {
			trx_addons_get_post_reactions( true );
		}
	}
}


// Return image from the category
if ( ! function_exists( 'birdily_get_category_image' ) ) {
	function birdily_get_category_image( $term_id = 0 ) {
		return function_exists( 'trx_addons_get_category_image' )
					? trx_addons_get_category_image( $term_id )
					: '';
	}
}

// Return small image (icon) from the category
if ( ! function_exists( 'birdily_get_category_icon' ) ) {
	function birdily_get_category_icon( $term_id = 0 ) {
		return function_exists( 'trx_addons_get_category_icon' )
					? trx_addons_get_category_icon( $term_id )
					: '';
	}
}

// Return string with counters items
if ( ! function_exists( 'birdily_get_post_counters' ) ) {
	function birdily_get_post_counters( $counters = 'views' ) {
		return function_exists( 'trx_addons_get_post_counters' )
					? str_replace( 'post_counters_item', 'post_meta_item post_counters_item', trx_addons_get_post_counters( $counters ) )
					: '';
	}
}

// Display custom counter
if ( ! function_exists( 'birdily_show_post_counter' ) ) {
	add_action( 'birdily_action_show_post_counter', 'birdily_show_post_counter', 10, 2 );
	function birdily_show_post_counter( $counter, $post_id ) {
		birdily_show_layout( apply_filters( 'trx_addons_filter_show_post_counter', '', $counter, $post_id ) );
	}
}


// Return list with animation effects
if ( ! function_exists( 'birdily_get_list_animations_in' ) ) {
	function birdily_get_list_animations_in() {
		return function_exists( 'trx_addons_get_list_animations_in' )
					? trx_addons_get_list_animations_in()
					: array();
	}
}

// Return classes list for the specified animation
if ( ! function_exists( 'birdily_get_animation_classes' ) ) {
	function birdily_get_animation_classes( $animation, $speed = 'normal', $loop = 'none' ) {
		return function_exists( 'trx_addons_get_animation_classes' )
					? trx_addons_get_animation_classes( $animation, $speed, $loop )
					: '';
	}
}

// Return string with the likes counter for the specified comment
if ( ! function_exists( 'birdily_get_comment_counters' ) ) {
	function birdily_get_comment_counters( $counters = 'likes' ) {
		return function_exists( 'trx_addons_get_comment_counters' )
					? trx_addons_get_comment_counters( $counters )
					: '';
	}
}

// Display likes counter for the specified comment
if ( ! function_exists( 'birdily_show_comment_counters' ) ) {
	function birdily_show_comment_counters( $counters = 'likes' ) {
		if ( function_exists( 'trx_addons_get_comment_counters' ) ) {
			trx_addons_get_comment_counters( $counters, true );
		}
	}
}

// Add query params to sort posts by views or likes
if ( ! function_exists( 'birdily_trx_addons_query_sort_order' ) ) {
	
	function birdily_trx_addons_query_sort_order( $q = array(), $orderby = 'date', $order = 'desc' ) {
		if ( 'views' == $orderby ) {
			$q['orderby']  = 'meta_value_num';
			$q['meta_key'] = 'trx_addons_post_views_count';
		} elseif ( 'likes' == $orderby ) {
			$q['orderby']  = 'meta_value_num';
			$q['meta_key'] = 'trx_addons_post_likes_count';
		}
		return $q;
	}
}

// Return theme-specific logo to the plugin
if ( ! function_exists( 'birdily_trx_addons_theme_logo' ) ) {
	
	function birdily_trx_addons_theme_logo( $logo ) {
		return birdily_get_logo_image();
	}
}

// Return true, if theme allow use site name as logo
if ( ! function_exists( 'birdily_trx_addons_show_site_name_as_logo' ) ) {
	
	function birdily_trx_addons_show_site_name_as_logo( $allow = true ) {
		return $allow && birdily_is_on( birdily_get_theme_option( 'logo_text' ) );
	}
}

// Return theme-specific post meta to the plugin
if ( ! function_exists( 'birdily_trx_addons_post_meta' ) ) {
	
	function birdily_trx_addons_post_meta( $meta, $args = array() ) {
		return birdily_show_post_meta( apply_filters( 'birdily_filter_post_meta_args', $args, 'trx_addons', 1 ) );
	}
}

// Return theme-specific post meta args
if ( ! function_exists( 'birdily_trx_addons_post_meta_args' ) ) {
	
	
	function birdily_trx_addons_post_meta_args( $args = array(), $from = '', $columns = 1 ) {
		$theme_specific = ! isset( $args['theme_specific'] ) || $args['theme_specific'];
		if ( ( is_single() && 'trx_addons' == $from && $theme_specific ) || empty( $args ) ) {
			$args['components'] = birdily_array_get_keys_by_value( birdily_get_theme_option( 'meta_parts' ) );
			$args['counters']   = birdily_array_get_keys_by_value( birdily_get_theme_option( 'counters' ) );
			$args['seo']        = birdily_is_on( birdily_get_theme_option( 'seo_snippets' ) );
		}
		return $args;
	}
}

// Add Rating to the meta parts list
if ( ! function_exists( 'birdily_trx_addons_list_counters' ) ) {
	
	function birdily_trx_addons_list_counters( $list ) {
		if ( birdily_exists_reviews() ) {
			$list['rating'] = esc_html__( 'Rating', 'birdily' );
		}
		return $list;
	}
}

// Return list of the counters
if ( ! function_exists( 'birdily_trx_addons_get_list_counters' ) ) {
	
	function birdily_trx_addons_get_list_counters( $list ) {
		return birdily_get_list_counters();
	}
}

// Return list of the meta parts
if ( ! function_exists( 'birdily_trx_addons_get_list_meta_parts' ) ) {
	
	function birdily_trx_addons_get_list_meta_parts( $list ) {
		return birdily_get_list_meta_parts();
	}
}

// Check if featured image override is allowed
if ( ! function_exists( 'birdily_trx_addons_featured_image_override' ) ) {
	
	function birdily_trx_addons_featured_image_override( $flag = false ) {
		if ( $flag ) {
			$flag = birdily_is_on( birdily_get_theme_option( 'header_image_override' ) )
					&& apply_filters( 'birdily_filter_allow_override_header_image', true );
		}		
		return $flag;
	}
}

// Return featured image for current mode (post/page/category/blog template ...)
if ( ! function_exists( 'birdily_trx_addons_get_current_mode_image' ) ) {
	
	function birdily_trx_addons_get_current_mode_image( $img = '' ) {
		return birdily_get_current_mode_image( $img );
	}
}

// Return featured image size for related posts
if ( ! function_exists( 'birdily_trx_addons_related_thumb_size' ) ) {
	
	function birdily_trx_addons_related_thumb_size( $size = '' ) {
		if ( defined( 'TRX_ADDONS_CPT_CERTIFICATES_PT' ) && get_post_type() == TRX_ADDONS_CPT_CERTIFICATES_PT ) {
			$size = birdily_get_thumb_size( 'masonry-big' );
		}
		return $size;
	}
}

// Redirect action 'get_mobile_menu' to the plugin
// Return stored items as mobile menu
if ( ! function_exists( 'birdily_trx_addons_get_mobile_menu' ) ) {
	
	function birdily_trx_addons_get_mobile_menu( $menu ) {
		return apply_filters( 'trx_addons_filter_get_mobile_menu', $menu );
	}
}

// Redirect action 'login' to the plugin
if ( ! function_exists( 'birdily_trx_addons_action_login' ) ) {
	
	function birdily_trx_addons_action_login( $args = array() ) {
		do_action( 'trx_addons_action_login', $args );
	}
}

// Redirect action 'cart' to the plugin
if ( ! function_exists( 'birdily_trx_addons_action_cart' ) ) {
	
	function birdily_trx_addons_action_cart( $args = array() ) {
		do_action( 'trx_addons_action_cart', $args );
	}
}

// Redirect action 'search' to the plugin
if ( ! function_exists( 'birdily_trx_addons_action_search' ) ) {
	
	function birdily_trx_addons_action_search( $style, $class, $ajax ) {
		if ( birdily_exists_trx_addons() ) {
			do_action( 'trx_addons_action_search', $style, $class, $ajax );
		} else {
			set_query_var( 'birdily_search_args', compact( 'style', 'class', 'ajax' ) );
			get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/search-form' ) );
			set_query_var( 'birdily_search_args', array() );
		}
	}
}

// Redirect action 'breadcrumbs' to the plugin
if ( ! function_exists( 'birdily_trx_addons_action_breadcrumbs' ) ) {
	
	function birdily_trx_addons_action_breadcrumbs() {
		do_action( 'trx_addons_action_breadcrumbs' );
	}
}

// Redirect action 'show_layout' to the plugin
if ( ! function_exists( 'birdily_trx_addons_action_show_layout' ) ) {
	
	function birdily_trx_addons_action_show_layout( $layout_id = '' ) {
		do_action( 'trx_addons_action_show_layout', $layout_id );
	}
}

// Redirect filter 'get_translated_layout' to the plugin
if ( ! function_exists( 'birdily_trx_addons_filter_get_translated_layout' ) ) {
	
	function birdily_trx_addons_filter_get_translated_layout( $layout_id = '' ) {
		return apply_filters( 'trx_addons_filter_get_translated_layout', $layout_id );
	}
}

// Show user meta (socials)
if ( ! function_exists( 'birdily_trx_addons_action_user_meta' ) ) {
	
	function birdily_trx_addons_action_user_meta() {
		do_action( 'trx_addons_action_user_meta' );
	}
}

// Redirect filter 'get_blog_title' to the plugin
if ( ! function_exists( 'birdily_trx_addons_get_blog_title' ) ) {
	
	function birdily_trx_addons_get_blog_title( $title = '' ) {
		return apply_filters( 'trx_addons_filter_get_blog_title', $title );
	}
}

// Redirect filter 'term_name' to the plugin
if ( ! function_exists( 'birdily_trx_addons_term_name' ) ) {
	
	function birdily_trx_addons_term_name( $term_name, $taxonomy ) {
		return apply_filters( 'trx_addons_filter_term_name', $term_name, $taxonomy );
	}
}

// Redirect filter 'get_post_iframe' to the plugin
if ( ! function_exists( 'birdily_trx_addons_get_post_iframe' ) ) {
	
	function birdily_trx_addons_get_post_iframe( $html = '' ) {
		return apply_filters( 'trx_addons_filter_get_post_iframe', $html );
	}
}

// Return true, if theme need a SEO snippets
if ( ! function_exists( 'birdily_trx_addons_seo_snippets' ) ) {
	
	function birdily_trx_addons_seo_snippets( $enable = false ) {
		return birdily_is_on( birdily_get_theme_option( 'seo_snippets' ) );
	}
}

// Show user meta (socials)
if ( ! function_exists( 'birdily_trx_addons_article_start' ) ) {
	
	function birdily_trx_addons_article_start( $page = '' ) {
		if ( birdily_is_on( birdily_get_theme_option( 'seo_snippets' ) ) ) {
			get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/seo' ) );
		}
	}
}

// Redirect filter 'prepare_css' to the plugin
if ( ! function_exists( 'birdily_trx_addons_prepare_css' ) ) {
	
	function birdily_trx_addons_prepare_css( $css = '', $remove_spaces = true ) {
		return apply_filters( 'trx_addons_filter_prepare_css', $css, $remove_spaces );
	}
}

// Redirect filter 'prepare_js' to the plugin
if ( ! function_exists( 'birdily_trx_addons_prepare_js' ) ) {
	
	function birdily_trx_addons_prepare_js( $js = '', $remove_spaces = true ) {
		return apply_filters( 'trx_addons_filter_prepare_js', $js, $remove_spaces );
	}
}

// Add plugin's specific variables to the scripts
if ( ! function_exists( 'birdily_trx_addons_localize_script' ) ) {
	
	function birdily_trx_addons_localize_script( $arr ) {
		$arr['trx_addons_exists'] = birdily_exists_trx_addons();
		return $arr;
	}
}

// Redirect filter 'trx_addons_filter_get_theme_file_dir' to the theme
if ( ! function_exists( 'birdily_trx_addons_get_theme_file_dir' ) ) {
	
	function birdily_trx_addons_get_theme_file_dir( $dir, $file, $return_url ) {
		return apply_filters( 'birdily_filter_get_theme_file_dir', $dir, $file, $return_url );
	}
}

// Redirect filter 'trx_addons_filter_get_theme_folder_dir' to the theme
if ( ! function_exists( 'birdily_trx_addons_get_theme_folder_dir' ) ) {
	
	function birdily_trx_addons_get_theme_folder_dir( $dir, $folder, $return_url ) {
		return apply_filters( 'birdily_filter_get_theme_file_dir', $dir, $folder, $return_url );
	}
}

// Add plugin-specific colors and fonts to the custom CSS
if ( birdily_exists_trx_addons() ) {
	require_once BIRDILY_THEME_DIR . 'plugins/trx_addons/trx_addons-styles.php'; }

