<?php
/* Gutenberg support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'birdily_gutenberg_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'birdily_gutenberg_theme_setup9', 9 );
	function birdily_gutenberg_theme_setup9() {

		add_filter( 'birdily_filter_merge_styles', 'birdily_gutenberg_merge_styles' );
		add_filter( 'birdily_filter_merge_styles_responsive', 'birdily_gutenberg_merge_styles_responsive' );
		add_action( 'enqueue_block_editor_assets', 'birdily_gutenberg_editor_scripts' );

		if ( is_admin() ) {
			add_filter( 'birdily_filter_tgmpa_required_plugins', 'birdily_gutenberg_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'birdily_gutenberg_tgmpa_required_plugins' ) ) {
	
	function birdily_gutenberg_tgmpa_required_plugins( $list = array() ) {
		if ( birdily_storage_isset( 'required_plugins', 'gutenberg' ) ) {
			$list[] = array(
				'name'     => birdily_storage_get_array( 'required_plugins', 'gutenberg' ),
				'slug'     => 'gutenberg',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if Gutenberg is installed and activated
if ( ! function_exists( 'birdily_exists_gutenberg' ) ) {
	function birdily_exists_gutenberg() {
		return function_exists( 'the_gutenberg_project' ) && function_exists( 'register_block_type' );
	}
}

// Return true if Gutenberg exists and current mode is preview
if ( ! function_exists( 'birdily_gutenberg_is_preview' ) ) {
	function birdily_gutenberg_is_preview() {
		return false;
	}
}

// Merge custom styles
if ( ! function_exists( 'birdily_gutenberg_merge_styles' ) ) {
	
	function birdily_gutenberg_merge_styles( $list ) {
		if ( birdily_exists_gutenberg() ) {
			$list[] = 'plugins/gutenberg/_gutenberg.scss';
		}
		return $list;
	}
}

// Merge responsive styles
if ( ! function_exists( 'birdily_gutenberg_merge_styles_responsive' ) ) {
	
	function birdily_gutenberg_merge_styles_responsive( $list ) {
		if ( birdily_exists_gutenberg() ) {
			$list[] = 'plugins/gutenberg/_gutenberg-responsive.scss';
		}
		return $list;
	}
}


// Load required styles and scripts for Gutenberg Editor mode
if ( ! function_exists( 'birdily_gutenberg_editor_scripts' ) ) {
	
	function birdily_gutenberg_editor_scripts() {
		// Links to selected fonts
		$links = birdily_theme_fonts_links();
		if ( count( $links ) > 0 ) {
			foreach ( $links as $slug => $link ) {
				wp_enqueue_style( sprintf( 'birdily-font-%s', $slug ), $link, array(), null );
			}
		}

		// Font icons styles must be loaded before main stylesheet
		wp_enqueue_style( 'fontello-style', birdily_get_file_url( 'css/font-icons/css/fontello-embedded.css' ), array(), null );
		
		// Editor styles
		wp_enqueue_style( 'birdily-editor-styles', birdily_get_file_url( 'plugins/gutenberg/gutenberg-editor-style.css' ), array(), null );
	}
}

// Save CSS with custom colors and fonts to the gutenberg-editor-style.css
if ( ! function_exists( 'birdily_gutenberg_save_css' ) ) {
	add_action( 'birdily_action_save_options', 'birdily_gutenberg_save_css', 20 );
	add_action( 'trx_addons_action_save_options', 'birdily_gutenberg_save_css', 20 );
	function birdily_gutenberg_save_css() {
		$msg = '/* ' . esc_html__( "ATTENTION! This file was generated automatically! Don't change it!!!", 'birdily' )
				. "\n----------------------------------------------------------------------- */\n";
		// Save CSS with custom fonts and vars to the __custom.css
		$css = birdily_customizer_get_css(
			array(
				'colors' => false,
			)
		);
		// Add context class to each selector
		$context = '.edit-post-visual-editor';
		$css = trim( $context . ' '
						. birdily_str_replace_once(
							array(
								'}body{',
								'body{',
								'}body.',
								'}body ',
								'}',
								',body{',
								',body.',
								',body ',
								',',
								'h1,'
							),
							array(
								'}' . $context . ',' . $context . ' p{',
								$context . ',' . $context . ' p{',
								'}' . $context . '.',
								'}' . $context . ' ',
								'}' . $context . ' ',
								',' . $context . ',' . $context . ' p{',
								',' . $context . '.',
								',' . $context . ' ',
								',' . $context . ' ',
								'h1, .editor-post-title__block .editor-post-title__input,',
							),
							$css
						)
					);
		$css = str_replace( array( '",' . $context ), array( '",' ), $css );
		if ( substr( $css, -strlen( $context ) ) == $context ) {
			$css = substr( $css, 0, strlen( $css ) - strlen( $context ) );
		}
		// Save styles to the file
		birdily_fpc( birdily_get_file_dir( 'plugins/gutenberg/gutenberg-editor-style.css' ), $msg . $css );
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( birdily_exists_gutenberg() ) {
	require_once BIRDILY_THEME_DIR . 'plugins/gutenberg/gutenberg-styles.php';
}
