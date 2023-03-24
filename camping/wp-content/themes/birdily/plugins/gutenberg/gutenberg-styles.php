<?php
// Add plugin-specific vars to the custom CSS
if ( ! function_exists( 'birdily_gutenberg_add_theme_vars' ) ) {
	add_filter( 'birdily_filter_add_theme_vars', 'birdily_gutenberg_add_theme_vars', 10, 2 );
	function birdily_gutenberg_add_theme_vars( $rez, $vars ) {
		return $rez;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'birdily_gutenberg_get_css' ) ) {
	add_filter( 'birdily_filter_get_css', 'birdily_gutenberg_get_css', 10, 2 );
	function birdily_gutenberg_get_css( $css, $args ) {

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			extract( $args['vars'] );
			$css['vars'] .= <<<CSS

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

CSS;
		}

		return $css;
	}
}

