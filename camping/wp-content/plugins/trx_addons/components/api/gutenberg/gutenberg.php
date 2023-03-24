<?php
/**
 * Plugin support: Gutenberg
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.0.49
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	die( '-1' );
}


// Check if plugin 'Gutenberg' is installed and activated
// Attention! This function is used in many files and was moved to the api.php
/*
if ( !function_exists( 'trx_addons_exists_gutenberg' ) ) {
	function trx_addons_exists_gutenberg() {
		return function_exists( 'the_gutenberg_project' ) && function_exists( 'register_block_type' );
	}
}
*/

// Return true if Gutenberg exists and current mode is preview
if ( !function_exists( 'trx_addons_gutenberg_is_preview' ) ) {
	function trx_addons_gutenberg_is_preview() {
		return trx_addons_exists_gutenberg()
		       && (
			       trx_addons_gutenberg_is_block_render_action()
			       ||
			       trx_addons_is_post_edit()
			       ||
			       trx_addons_gutenberg_is_widgets_block_editor()
			       ||
			       trx_addons_gutenberg_is_site_editor()
		       );
	}
}

// Return true if current mode is "Block render"
if ( !function_exists( 'trx_addons_gutenberg_is_block_render_action' ) ) {
	function trx_addons_gutenberg_is_block_render_action() {
		return trx_addons_exists_gutenberg()
		       && trx_addons_check_url('block-renderer') && !empty($_GET['context']) && $_GET['context']=='edit';
	}
}

// Return true if current mode is "Edit post"
if ( ! function_exists( 'trx_addons_is_post_edit' ) ) {
	function trx_addons_is_post_edit() {
		return ( trx_addons_check_url( 'post.php' ) && ! empty( $_GET['action'] ) && $_GET['action'] == 'edit' )
		       ||
		       trx_addons_check_url( 'post-new.php' )
		       ||
		       ( trx_addons_check_url( '/block-renderer/trx-addons/' ) && ! empty( $_GET['context'] ) && $_GET['context'] == 'edit' )
		       ||
		       ( trx_addons_check_url( 'admin.php' ) && ! empty( $_GET['page'] ) && $_GET['page'] == 'gutenberg-edit-site' )
		       ||
		       ( trx_addons_check_url( 'site-editor.php' ) && ( empty( $_GET['postType'] ) || $_GET['postType'] == 'wp_template' ) )
		       ||
		       trx_addons_check_url( 'widgets.php' );
	}
}

// Return true if current mode is "Widgets Block Editor" (a new widgets panel with Gutenberg support)
if ( ! function_exists( 'trx_addons_gutenberg_is_widgets_block_editor' ) ) {
	function trx_addons_gutenberg_is_widgets_block_editor() {
		return is_admin()
		       && trx_addons_exists_gutenberg()
		       && version_compare( get_bloginfo( 'version' ), '5.8', '>=' )
		       && trx_addons_check_url( 'widgets.php' )
		       && function_exists( 'wp_use_widgets_block_editor' )
		       && wp_use_widgets_block_editor();
	}
}

// Return true if current mode is "Full Site Editor"
if ( ! function_exists( 'trx_addons_gutenberg_is_site_editor' ) ) {
	function trx_addons_gutenberg_is_site_editor() {
		return is_admin()
		       && trx_addons_exists_gutenberg()
		       && version_compare( get_bloginfo( 'version' ), '5.9', '>=' )
		       && trx_addons_check_url( 'site-editor.php' )
		       && function_exists( 'wp_is_block_theme' )
		       && wp_is_block_theme();
	}
}

// Check if current page is a PageBuilder preview mode
if ( ! function_exists( 'trx_addons_is_preview' ) ) {
	function trx_addons_is_preview( $builder = 'any' ) {
		return ( in_array( $builder, array( 'any', 'elm', 'elementor' ) ) && function_exists( 'trx_addons_elm_is_preview' ) && trx_addons_elm_is_preview() )
		       ||
		       ( in_array( $builder, array( 'any', 'gb', 'gutenberg' ) ) && function_exists( 'trx_addons_gutenberg_is_preview' ) && trx_addons_gutenberg_is_preview() );
	}
}

// Load required styles and scripts for Gutenberg Editor mode
if ( !function_exists( 'trx_addons_gutenberg_editor_load_scripts' ) ) {
	add_action("enqueue_block_editor_assets", 'trx_addons_gutenberg_editor_load_scripts');
	function trx_addons_gutenberg_editor_load_scripts() {
		trx_addons_load_scripts_admin(true);
		trx_addons_localize_scripts_admin();
		do_action('trx_addons_action_pagebuilder_admin_scripts');
	}
}

// Load required scripts for gutenberg Preview mode
if ( !function_exists( 'trx_addons_gutenberg_preview_load_scripts' ) ) {
	add_action("enqueue_block_assets", 'trx_addons_gutenberg_preview_load_scripts');
	function trx_addons_gutenberg_preview_load_scripts() {
		if (trx_addons_is_on(trx_addons_get_option('debug_mode'))) {
			wp_enqueue_script( 'trx_addons-gutenberg-preview', trx_addons_get_file_url(TRX_ADDONS_PLUGIN_API . 'gutenberg/gutenberg.js'), array('jquery'), null, true );
		}
		do_action('trx_addons_action_pagebuilder_preview_scripts');
	}
}

// Add shortcode's specific vars to the JS storage
if ( !function_exists( 'trx_addons_gutenberg_localize_script' ) ) {
	add_filter("trx_addons_filter_localize_script", 'trx_addons_gutenberg_localize_script');
	function trx_addons_gutenberg_localize_script($vars) {
		return $vars;
	}
}


//------------------------------------------------------------
//-- Compatibility Gutenberg and other PageBuilders
//-------------------------------------------------------------

// Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)
if ( ! function_exists( 'trx_addons_gutenberg_disable_cpt' ) ) {
	add_action( 'current_screen', 'trx_addons_gutenberg_disable_cpt' );
	function trx_addons_gutenberg_disable_cpt() {
		$safe_pb = trx_addons_get_setting( 'gutenberg_safe_mode' );
		if ( !empty($safe_pb) && trx_addons_exists_gutenberg() ) {
			$current_post_type = get_current_screen()->post_type;
			$disable = false;
			if ( !$disable && in_array('elementor', $safe_pb) && trx_addons_exists_elementor() ) {
				$post_types = get_post_types_by_support( 'elementor' );
				$disable = is_array($post_types) && in_array($current_post_type, $post_types);
			}
			if ( !$disable && in_array('vc', $safe_pb) && trx_addons_exists_vc() ) {
				$post_types = function_exists('vc_editor_post_types') ? vc_editor_post_types() : array();
				$disable = is_array($post_types) && in_array($current_post_type, $post_types);
			}
			if ( $disable ) {
				remove_filter( 'replace_editor', 'gutenberg_init' );
				remove_action( 'load-post.php', 'gutenberg_intercept_edit_post' );
				remove_action( 'load-post-new.php', 'gutenberg_intercept_post_new' );
				remove_action( 'admin_init', 'gutenberg_add_edit_link_filters' );
				remove_filter( 'admin_url', 'gutenberg_modify_add_new_button_url' );
				remove_action( 'admin_print_scripts-edit.php', 'gutenberg_replace_default_add_new_button' );
				remove_action( 'admin_enqueue_scripts', 'gutenberg_editor_scripts_and_styles' );
				remove_filter( 'screen_options_show_screen', '__return_false' );
			}
		}
	}
}
