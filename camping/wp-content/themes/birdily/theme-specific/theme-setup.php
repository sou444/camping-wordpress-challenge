<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'BIRDILY_THEME_FREE' ) ) {
	define( 'BIRDILY_THEME_FREE', false );
}
if ( ! defined( 'BIRDILY_THEME_FREE_WP' ) ) {
	define( 'BIRDILY_THEME_FREE_WP', false );
}

// If this theme uses multiple skins
if ( ! defined( 'BIRDILY_ALLOW_SKINS' ) ) {
	define( 'BIRDILY_ALLOW_SKINS', false );
}
if ( ! defined( 'BIRDILY_DEFAULT_SKIN' ) ) {
	define( 'BIRDILY_DEFAULT_SKIN', 'default' );
}

// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
$GLOBALS['BIRDILY_STORAGE'] = array(

	// Theme required plugin's slugs
	'required_plugins'   => array_merge(

		// List of plugins for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			// Required plugins
			// DON'T COMMENT OR REMOVE NEXT LINES!
			'trx_addons'         => esc_html__( 'ThemeREX Addons', 'birdily' ),
			

			// If theme use OCDI instead (or both) ThemeREX Addons Installer
			

			// Recommended (supported) plugins for both (lite and full) versions
			// If plugin not need - comment (or remove) it
			'elementor'          => esc_html__( 'Elementor', 'birdily' ),
			'contact-form-7'     => esc_html__( 'Contact Form 7', 'birdily' ),
			'mailchimp-for-wp'   => esc_html__( 'MailChimp for WP', 'birdily' ),
			'woocommerce'        => esc_html__( 'WooCommerce', 'birdily' ),
			'wp-travel'          => esc_html__( 'WP travel', 'birdily' ),
		),
		// List of plugins for the FREE version only
		//-----------------------------------------------------
		BIRDILY_THEME_FREE
			? array(
				// Recommended (supported) plugins for the FREE (lite) version
				'siteorigin-panels' => esc_html__( 'SiteOrigin Panels', 'birdily' ),
			)

		// List of plugins for the PREMIUM version only
		//-----------------------------------------------------
			: array(
				// Recommended (supported) plugins for the PRO (full) version
				// If plugin not need - comment (or remove) it
				'bbpress'                    => esc_html__( 'BBPress and BuddyPress', 'birdily' ),
				'booked'                     => esc_html__( 'Booked Appointments', 'birdily' ),
				'envato-market'              => esc_html__( 'Envato Market', 'birdily' ),
				'essential-grid'             => esc_html__( 'Essential Grid', 'birdily' ),
				'revslider'                  => esc_html__( 'Revolution Slider', 'birdily' ),
				'the-events-calendar'        => esc_html__( 'The Events Calendar', 'birdily' ),
				'js_composer'                => esc_html__( 'WPBakery PageBuilder', 'birdily' ),
				'vc-extensions-bundle'       => esc_html__( 'WPBakery PageBuilder extensions bundle', 'birdily' ),
				'sitepress-multilingual-cms' => esc_html__( 'WPML - Sitepress Multilingual CMS', 'birdily' ),
				'wp-travel'                  => esc_html__( 'WP Travel', 'birdily' ),
				'devvn-image-hotspot'        => esc_html__( 'Image Hotspot by DevVN', 'birdily' ),
				// GDPR Support: uncomment only one of the following plugins
				'wp-gdpr-compliance'         => esc_html__( 'Cookie Information', 'birdily' ),
                'instagram-feed'             => esc_html__( 'Smash Balloon Instagram Feed', 'birdily' ),
                'trx_socials'                => esc_html__( 'TRX Socials', 'birdily' ),
				'trx_updater'                => esc_html__( 'TRX Updater', 'birdily' ),
				'elegro-payment'             => esc_html__( 'Elegro Crypto Payment', 'birdily' ),
			)
	),

	// Theme-specific blog layouts
	'blog_styles'        => array_merge(
		// Layouts for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			'excerpt' => array(
				'title'   => esc_html__( 'Standard', 'birdily' ),
				'archive' => 'index-excerpt',
				'item'    => 'content-excerpt',
				'styles'  => 'excerpt',
			),
			'classic' => array(
				'title'   => esc_html__( 'Classic', 'birdily' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'classic',
			),
		),
		// Layouts for the FREE version only
		//-----------------------------------------------------
		BIRDILY_THEME_FREE
		? array()

		// Layouts for the PREMIUM version only
		//-----------------------------------------------------
		: array(
			'masonry'   => array(
				'title'   => esc_html__( 'Masonry', 'birdily' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'masonry',
			),
			'portfolio' => array(
				'title'   => esc_html__( 'Portfolio', 'birdily' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio',
				'columns' => array( 2, 3, 4 ),
				'styles'  => 'portfolio',
			),
			'gallery'   => array(
				'title'   => esc_html__( 'Gallery', 'birdily' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio-gallery',
				'columns' => array( 2, 3, 4 ),
				'styles'  => array( 'portfolio', 'gallery' ),
			),
			'chess'     => array(
				'title'   => esc_html__( 'Chess', 'birdily' ),
				'archive' => 'index-chess',
				'item'    => 'content-chess',
				'columns' => array( 1, 2, 3 ),
				'styles'  => 'chess',
			),
		)
	),

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-axiom',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => '//birdily.axiomthemes.com/',
	'theme_doc_url'      => '//birdily.axiomthemes.com/doc',
	'theme_download_url' => '//themeforest.net/item/birdily-travel-agency-tour-booking-wordpress-theme/24692759',

	'theme_support_url'  => '//themerex.net/support',                                   // Axiom

	'theme_video_url'    => '//www.youtube.com/channel/UCBjqhuwKj3MfE3B6Hg2oA8Q',  // Axiom

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By device
		'desktop'  => array( 'min' => 1680 ),
		'notebook' => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'   => array(
			'min' => 768,
			'max' => 1279,
		),
		'mobile'   => array( 'max' => 767 ),
		// By size
		'xxl'      => array( 'max' => 1679 ),
		'xl'       => array( 'max' => 1439 ),
		'lg'       => array( 'max' => 1279 ),
		'md'       => array( 'max' => 1023 ),
		'sm'       => array( 'max' => 767 ),
		'sm_wp'    => array( 'max' => 600 ),
		'xs'       => array( 'max' => 479 ),
	),
);

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'birdily_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'birdily_customizer_theme_setup1', 1 );
	function birdily_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		birdily_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',            // none  - use separate options for the main and the child-theme
																// child - duplicate theme options from the main theme to the child-theme only
																// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',             // Refresh method for preview area in the Appearance - Customize:
																// auto - refresh preview area on change each field with Theme Options
																// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                  // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,               // Place 'comment' field after the 'name' and 'email'

				'icons_selector'         => 'internal',         // Icons selector in the shortcodes:
																// vc (default) - standard VC (very slow) or Elementor's icons selector (not support images and svg)
																// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',            // Type of icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present icons
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',            // Type of socials icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present social networks
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,               // Check if exists a .min version of .css and .js and return path to it
																// instead the path to the original file
																// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,              // Show any menu if no menu selected in the location 'main_menu'
																// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,              // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,               // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,              // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,              // Allow use image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,               // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,              // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																// In the Page Options this styles are present always
																// (can be removed if filter 'birdily_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,              // Add arrows on the single attachment page to navigate to the prev/next attachment
				
				'gutenberg_safe_mode'    => array('elementor'), // vc,elementor - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'subtitle_above_title'   => true,               // Put subtitle above the title in the shortcodes
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		
		birdily_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Glegoo',
					'family' => 'serif',
					'styles' => '400,700'   // Parameter 'style' used only for the Google fonts
				),
				// Font-face packed with theme
				array(
					'name'   => 'Archivo',
					'family' => 'sans-serif',
					'styles' => '400,400italic,500,500italic,600,600italic,700,700italic'
				),
				array(
					'name'   => 'Archivo Narrow',
					'family' => 'sans-serif',
					'styles' => '400,400italic,700,700italic'
				),
				array(
					'name'   => 'Shrikhand',
					'family' => 'sans-serif',
					'styles' => '400'
				),
				array(
					'name'   => 'Glegoo-Bold',
					'family' => 'sans-serif',
					'styles' => '200,300,400,500,600,700,800'
				)
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		birdily_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		
		
		

		birdily_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'birdily' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'birdily' ),
					'font-family'     => '"Glegoo",serif',
					'font-size'       => '1.1428rem',
					'font-weight'     => '700',
					'font-style'      => 'normal',
					'line-height'     => '1.55em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.6em'
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'birdily' ),
					'font-family'     => '"Shrikhand",sans-serif',
					'font-size'       => '5.35rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '',
					'margin-top'      => '1.75em',
					'margin-bottom'   => '0.9em'
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'birdily' ),
					'font-family'     => '"Shrikhand",sans-serif',
					'font-size'       => '4.1428em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '0.98em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1px',
					'margin-top'      => '1.39em',
					'margin-bottom'   => '0.9em'
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'birdily' ),
					'font-family'     => '"Shrikhand",sans-serif',
					'font-size'       => '3.9285rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '0.98em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '',
					'margin-top'      => '1.5em',
					'margin-bottom'   => '0.75em'
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'birdily' ),
					'font-family'     => '"Shrikhand",sans-serif',
					'font-size'       => '2.1428rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '0.98em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.1px',
					'margin-top'      => '2.1em',
					'margin-bottom'   => '1.25em'
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'birdily' ),
					'font-family'     => '"Archivo",sans-serif',
					'font-size'       => '2rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.15em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.1px',
					'margin-top'      => '1.8em',
					'margin-bottom'   => '0.9em'
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'birdily' ),
					'font-family'     => '"Archivo",sans-serif',
					'font-size'       => '1.5714rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.15em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.8em',
					'margin-bottom'   => '1.4em'
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'birdily' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'birdily' ),
					'font-family'     => '"Archivo",sans-serif',
					'font-size'       => '1.8em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px'
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'birdily' ),
					'font-family'     => '"Archivo",sans-serif',
					'font-size'       => '16px',
					'font-weight'     => '600',
					'font-style'      => 'normal',
					'line-height'     => '20px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0'
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'birdily' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'birdily' ),
					'font-family'     => '"Archivo",sans-serif',
					'font-size'       => '1em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px'
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'birdily' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'birdily' ),
					'font-family'     => 'inherit',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => ''
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'birdily' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'birdily' ),
					'font-family'     => '"Archivo",sans-serif',
					'font-size'       => '1.0714em',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px'
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'birdily' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'birdily' ),
					'font-family'     => '"Archivo",sans-serif',
					'font-size'       => '0.8667em',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px'
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		birdily_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'birdily' ),
					'description' => esc_html__( 'Colors of the main content area', 'birdily' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'birdily' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'birdily' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'birdily' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'birdily' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'birdily' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'birdily' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'birdily' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'birdily' ),
				),
			)
		);
		birdily_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'birdily' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'birdily' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'birdily' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'birdily' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'birdily' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'birdily' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'birdily' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'birdily' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'birdily' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'birdily' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'birdily' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'birdily' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'birdily' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'birdily' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'birdily' ),
					'description' => esc_html__( 'Color of the links inside this block', 'birdily' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'birdily' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'birdily' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'birdily' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'birdily' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'birdily' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'birdily' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'birdily' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'birdily' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'birdily' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'birdily' ),
				),
			)
		);
		birdily_storage_set(
			'schemes', array(
				// Color scheme: 'default'
				'default' => array(
					'title'    => esc_html__( 'Default', 'birdily' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#ffffff',
						'bd_color'         => '#dfdfdf',

						// Text and links colors
						'text'             => '#726d6b',
						'text_light'       => '#817f7e',
						'text_dark'        => '#413734',
						'text_link'        => '#ff7044',
						'text_hover'       => '#a6967c',
						'text_link2'       => '#a6967c',
						'text_hover2'      => '#ff7044',
						'text_link3'       => '#362f35',
						'text_hover3'      => '#817f7e',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#eeeeee',
						'alter_bg_hover'   => '#e4e2e2',
						'alter_bd_color'   => '#ffffff',
						'alter_bd_hover'   => '#ffffff',
						'alter_text'       => '#726d6b',
						'alter_light'      => '#817f7e',
						'alter_dark'       => '#413734',
						'alter_link'       => '#ff7044',
						'alter_hover'      => '#a6967c',
						'alter_link2'      => '#726d6b',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#eec432',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#a6967c',
						'extra_bg_hover'   => '#28272e',
						'extra_bd_color'   => '#dfdfdf',
						'extra_bd_hover'   => '#ffffff',
						'extra_text'       => '#726d6b',
						'extra_light'      => '#817f7e',
						'extra_dark'       => '#ffffff',
						'extra_link'       => '#413734',
						'extra_hover'      => '#ffffff',
						'extra_link2'      => '#d3cfcd',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#ddb837',
						'extra_hover3'     => '#eec432',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#eeeeee',
						'input_bg_hover'   => '#ffffff',
						'input_bd_color'   => '#ffffff',
						'input_bd_hover'   => '#a6967c',
						'input_text'       => '#726d6b',
						'input_light'      => '#ffffff',
						'input_dark'       => '#413734',

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#cccbca',
						'inverse_bd_hover' => '#ffffff',
						'inverse_text'     => '#ffffff',
						'inverse_light'    => '#ffffff',
						'inverse_dark'     => '#413734',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#413734',
					),
				),

				// Color scheme: 'dark'
				'dark'    => array(
					'title'    => esc_html__( 'Dark', 'birdily' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#2c2b2b',
						'bd_color'         => '#3c3c3c',

						// Text and links colors
						'text'             => '#d3cfcd',
						'text_light'       => '#c6c3c1',
						'text_dark'        => '#ffffff',
						'text_link'        => '#ff7044',
						'text_hover'       => '#c2b28a',
						'text_link2'       => '#c2b28a',
						'text_hover2'      => '#ff7044',
						'text_link3'       => '#ffffff',
						'text_hover3'      => '#817f7e',

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => '#232222',
						'alter_bg_hover'   => '#1c1b1b',
						'alter_bd_color'   => '#3c3c3c',
						'alter_bd_hover'   => '#ffffff',
						'alter_text'       => '#d3cfcd',
						'alter_light'      => '#c6c3c1',
						'alter_dark'       => '#ffffff',
						'alter_link'       => '#ff7044',
						'alter_hover'      => '#c2b28a',
						'alter_link2'      => '#c2c0bf',
						'alter_hover2'     => '#80d572',
						'alter_link3'      => '#eec432',
						'alter_hover3'     => '#ddb837',

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => '#a6967c',
						'extra_bg_hover'   => '#ffffff',
						'extra_bd_color'   => '#e5e5e5',
						'extra_bd_hover'   => '#ffffff',
						'extra_text'       => '#d3cfcd',
						'extra_light'      => '#c6c3c1',
						'extra_dark'       => '#ffffff',
						'extra_link'       => '#413734',
						'extra_hover'      => '#ffffff',
						'extra_link2'      => '#c2c0bf',
						'extra_hover2'     => '#8be77c',
						'extra_link3'      => '#ddb837',
						'extra_hover3'     => '#eec432',

						// Input fields (form's fields and textarea)
						'input_bg_color'   => '#3c3c3c',
						'input_bg_hover'   => '#3c3c3c',
						'input_bd_color'   => '#ffffff',
						'input_bd_hover'   => '#a6967c',
						'input_text'       => '#ffffff',
						'input_light'      => '#ffffff',
						'input_dark'       => '#ffffff',

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => '#ffffff',
						'inverse_bd_hover' => '#ffffff',
						'inverse_text'     => '#ffffff',
						'inverse_light'    => '#ffffff',
						'inverse_dark'     => '#ffffff',
						'inverse_link'     => '#ffffff',
						'inverse_hover'    => '#413734',
					),
				),

			)
		);

		// Simple schemes substitution
		birdily_storage_set(
			'schemes_simple', array(
				// Main color	// Slave elements and it's darkness koef.
				'text_link'   => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
					'inverse_bd_color' => 0.85,
					'inverse_bd_hover' => 0.7,
				),
				'text_hover'  => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'  => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2' => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'  => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3' => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		birdily_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Parameters to set order of schemes in the css
		birdily_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		birdily_storage_set(
			'theme_thumbs', apply_filters(
				'birdily_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'birdily-thumb-huge'        => array(
						'size'  => array( 1170, 658, true ),
						'title' => esc_html__( 'Huge image', 'birdily' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'birdily-thumb-big'         => array(
						'size'  => array( 760, 428, true ),
						'title' => esc_html__( 'Large image', 'birdily' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the blog post thumbnail feautured image (with sidebar)
					// Height is fixed
					'birdily-thumb-blogthumb'         => array(
						'size'  => array( 800, 340, true ),
						'title' => esc_html__( 'blog image', 'birdily' ),
						'subst' => 'trx_addons-thumb-blogthumb',
					),
					// Width of the image is equal to the tour archive thumbnail feautured image
					// Height is fixed
					'birdily-thumb-tour'         => array(
						'size'  => array( 330, 330, true ),
						'title' => esc_html__( 'tour thumb image', 'birdily' ),
						'subst' => 'trx_addons-thumb-tour',
					),
					// Width of the image is equal to the tour shortcode thumbnail feautured image
					// Height is fixed
					'birdily-thumb-shortcode'         => array(
						'size'  => array( 260, 260, true ),
						'title' => esc_html__( 'shortcode thumb image', 'birdily' ),
						'subst' => 'trx_addons-thumb-shortcode',
					),
					// Width of the image is equal to the tour page thumbnail feautured image
					// Height is fixed
					'birdily-thumb-fulltour'         => array(
						'size'  => array( 584, 570, true ),
						'title' => esc_html__( 'single tour thumb image', 'birdily' ),
						'subst' => 'trx_addons-thumb-fulltour',
					),
					// Width of the image is equal to the tour archive thumbnail feautured image
					// Height is fixed
					'birdily-thumb-tourarchive'         => array(
						'size'  => array( 330, 245, true ),
						'title' => esc_html__( 'tour archive thumb image', 'birdily' ),
						'subst' => 'trx_addons-thumb-tourarchive',
					),
					// Width of the image is equal to the tour archive thumbnail feautured image
					// Height is fixed
					'birdily-thumb-tourlist'         => array(
						'size'  => array( 260, 190, true ),
						'title' => esc_html__( 'tour list thumb image', 'birdily' ),
						'subst' => 'trx_addons-thumb-tourlist',
					),
					// Width of the image is equal to the blog post thumbnail gallery or video (with sidebar)
					// Height is fixed
					'birdily-thumb-bloggallery'         => array(
						'size'  => array( 800, 380, true ),
						'title' => esc_html__( 'blog gallery image', 'birdily' ),
						'subst' => 'trx_addons-thumb-bloggallery',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'birdily-thumb-med'         => array(
						'size'  => array( 370, 208, true ),
						'title' => esc_html__( 'Medium image', 'birdily' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'birdily-thumb-rel'         => array(
						'size'  => array( 386, 280, true ),
						'title' => esc_html__( 'Related post image', 'birdily' ),
						'subst' => 'trx_addons-thumb-related',
					),

					// Height is fixed
					'birdily-thumb-nws'         => array(
						'size'  => array( 326, 160, true ),
						'title' => esc_html__( 'Recent news image', 'birdily' ),
						'subst' => 'trx_addons-thumb-news',
					),

					// Height is fixed
					'birdily-thumb-blogger'         => array(
						'size'  => array( 410, 280, true ),
						'title' => esc_html__( 'Blogger shortcode image', 'birdily' ),
						'subst' => 'trx_addons-thumb-blogger',
					),

					// Height is fixed
					'birdily-thumb-event'         => array(
						'size'  => array( 588, 460, true ),
						'title' => esc_html__( 'Single event image', 'birdily' ),
						'subst' => 'trx_addons-thumb-event',
					),

					// Small square image (for avatars in comments, etc.)
					'birdily-thumb-tiny'        => array(
						'size'  => array( 90, 90, true ),
						'title' => esc_html__( 'Small square avatar', 'birdily' ),
						'subst' => 'trx_addons-thumb-tiny',
					),

					// Small square image for audio post
					'birdily-thumb-audio'        => array(
						'size'  => array( 148, 148, true ),
						'title' => esc_html__( 'Audio square avatar', 'birdily' ),
						'subst' => 'trx_addons-thumb-audio',
					),

					// Image for team shortcode
					'birdily-thumb-team'        => array(
						'size'  => array( 330, 390, true ),
						'title' => esc_html__( 'Team avatar', 'birdily' ),
						'subst' => 'trx_addons-thumb-team',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'birdily-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'birdily' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'birdily-thumb-masonry'     => array(
						'size'  => array( 370, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'birdily' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'birdily_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'birdily_importer_set_options', 9 );
	function birdily_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;
			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( birdily_get_protocol() . '://demofiles.axiomthemes.com/birdily/' );
			// Required plugins
			$options['required_plugins'] = array_keys( birdily_storage_get( 'required_plugins' ) );
			// Set number of thumbnails to regenerate when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 3;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Birdily Demo', 'birdily' );
			$options['files']['default']['domain_dev']  = esc_url( birdily_get_protocol() . '://birdily.axiomthemes.com' );       // Developers domain
			$options['files']['default']['domain_demo'] = esc_url( birdily_get_protocol() . '://birdily.axiomthemes.com' );       // Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter
			
			
			
			// Banners
			$options['banners'] = array(
				array(
					'image'        => birdily_get_file_url( 'theme-specific/theme-about/images/frontpage.png' ),
					'title'        => esc_html__( 'Front Page Builder', 'birdily' ),
					'content'      => wp_kses( __( "Create your front page right in the WordPress Customizer. There's no need in any page builder. Simply enable/disable sections, fill them out with content, and customize to your liking.", 'birdily' ),'birdily_kses_content' ),
					'link_url'     => esc_url( birdily_get_protocol(true) . '//www.youtube.com/watch?v=VT0AUbMl_KA' ),
					'link_caption' => esc_html__( 'Watch Video Introduction', 'birdily' ),
					'duration'     => 20,
				),
				array(
					'image'        => birdily_get_file_url( 'theme-specific/theme-about/images/layouts.png' ),
					'title'        => esc_html__( 'Layouts Builder', 'birdily' ),
					'content'      => wp_kses( __( 'Use Layouts Builder to create and customize header and footer styles for your website. With a flexible page builder interface and custom shortcodes, you can create as many header and footer layouts as you want with ease.', 'birdily' ),'birdily_kses_content' ),
					'link_url'     => esc_url( birdily_get_protocol(true) . '//www.youtube.com/watch?v=pYhdFVLd7y4' ),
					'link_caption' => esc_html__( 'Learn More', 'birdily' ),
					'duration'     => 20,
				),
				array(
					'image'        => birdily_get_file_url( 'theme-specific/theme-about/images/documentation.png' ),
					'title'        => esc_html__( 'Read Full Documentation', 'birdily' ),
					'content'      => wp_kses( __( 'Need more details? Please check our full online documentation for detailed information on how to use Birdily.', 'birdily' ),'birdily_kses_content' ),
					'link_url'     => esc_url( birdily_storage_get( 'theme_doc_url' ) ),
					'link_caption' => esc_html__( 'Online Documentation', 'birdily' ),
					'duration'     => 15,
				),
				array(
					'image'        => birdily_get_file_url( 'theme-specific/theme-about/images/video-tutorials.png' ),
					'title'        => esc_html__( 'Video Tutorials', 'birdily' ),
					'content'      => wp_kses( __( 'No time for reading documentation? Check out our video tutorials and learn how to customize Birdily in detail.', 'birdily' ),'birdily_kses_content' ),
					'link_url'     => esc_url( birdily_storage_get( 'theme_video_url' ) ),
					'link_caption' => esc_html__( 'Video Tutorials', 'birdily' ),
					'duration'     => 15,
				),
				array(
					'image'        => birdily_get_file_url( 'theme-specific/theme-about/images/studio.png' ),
					'title'        => esc_html__( 'Website Customization', 'birdily' ),
					'content'      => wp_kses( __( "Need a website fast? Order our custom service, and we'll build a website based on this theme for a very fair price. We can also implement additional functionality such as website translation, setting up WPML, and much more.", 'birdily' ),'birdily_kses_content' ),
					'link_url'     => esc_url( birdily_get_protocol(true) . '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash' ),
					'link_caption' => esc_html__( 'Contact Us', 'birdily' ),
					'duration'     => 25,
				),
			);
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'birdily_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'birdily_ocdi_set_options', 9 );
	function birdily_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( birdily_get_protocol() . '://demofiles.axiomthemes.com/birdily/' );
			// Required plugins
			$options['required_plugins'] = array_keys( birdily_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Birdily OCDI Demo', 'birdily' );
			$options['files']['ocdi']['domain_demo'] = esc_url( birdily_get_protocol() . '://birdily.axiomthemes.com' );
			// If theme need more demo - just copy 'default' and change required parameter
			
			
			
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'birdily_create_theme_options' ) ) {

	function birdily_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = esc_html__( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'birdily' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( birdily_storage_get( 'schemes' ) ) < 2;

		birdily_storage_set(
			'options', array(

				// 'Logo & Site Identity'
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'birdily' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'birdily' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'birdily' ) ),
					'class'    => 'birdily_column-1_2 birdily_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'birdily' ) ),
					'class'    => 'birdily_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Zoom the logo. 1 - original size. Maximum size of logo depends on the actual size of the picture', 'birdily' ) ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'birdily' ) ),
					'class'      => 'birdily_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'birdily' ) ),
					'class' => 'birdily_column-1_2 birdily_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'birdily' ) ),
					'class'      => 'birdily_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'birdily' ) ),
					'class' => 'birdily_column-1_2 birdily_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'birdily' ) ),
					'class'      => 'birdily_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_side'                     => array(
					'title' => esc_html__( 'Logo for the side menu', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu', 'birdily' ) ),
					'class' => 'birdily_column-1_2 birdily_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_side_retina'              => array(
					'title'      => esc_html__( 'Logo for the side menu on Retina', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'birdily' ) ),
					'class'      => 'birdily_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'image',
				),

				// 'General settings'
				'general'                       => array(
					'title'    => esc_html__( 'General Settings', 'birdily' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'birdily' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'birdily' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => birdily_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'birdily' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1278,
					'min'        => 1000,
					'max'        => 1400,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',         // SASS variable's name to preview changes 'on fly'
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'birdily' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'birdily' ),
					
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'birdily' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'birdily' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'birdily' ),
					),
					'dependency' => array(
						'sidebar_position' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'birdily' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'birdily' ) ),
					'std'        => 370,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'birdily' ) ),
					'std'        => 40,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'birdily' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'general_widgets_info'          => array(
					'title' => esc_html__( 'Additional widgets', 'birdily' ),
					'desc'  => '',
					'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page'            => array(
					'title'    => esc_html__( 'Widgets at the top of the page', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'birdily' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page'            => array(
					'title'    => esc_html__( 'Widgets at the bottom of the page', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'birdily' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'birdily' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'birdily' ) ),
					'std'        => '2.3em',
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'birdily' ),
					'desc'  => '',
					'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'birdily' ) ),
					'std'   => 0,
					'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'birdily'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'birdily') ),
					"std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'birdily'),'birdily_kses_content' ),
					"type"  => "text"
				),

				// 'Header'
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'birdily' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'birdily' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'std'      => 'default',
					'options'  => birdily_get_list_header_footer_types(),
					'type'     => BIRDILY_THEME_FREE || ! birdily_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'birdily' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'birdily' ),'birdily_kses_content' ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => BIRDILY_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight'             => array(
					'title'    => esc_html__( 'Header fullheight', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'std'      => 0,
					'type'     => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_zoom'                   => array(
					'title'   => esc_html__( 'Header zoom', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Zoom the header title. 1 - original size', 'birdily' ) ),
					'std'     => 1,
					'min'     => 0.3,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'slider',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_widgets_info'           => array(
					'title' => esc_html__( 'Header widgets', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Here you can place a widget slider, advertising banners, etc.', 'birdily' ) ),
					'type'  => 'info',
				),
				'header_widgets'                => array(
					'title'    => esc_html__( 'Header widgets', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select set of widgets to show in the header on each page', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
						'desc'    => wp_kses_data( __( 'Select set of widgets to show in the header on this page', 'birdily' ) ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'type'     => 'select',
				),
				'header_columns'                => array(
					'title'      => esc_html__( 'Header columns', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'dependency' => array(
						'header_type'    => array( 'default' ),
						'header_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => birdily_get_list_range( 0, 6 ),
					'type'       => 'select',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'birdily' ) ),
					'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'birdily' ),
						'left'  => esc_html__( 'Left', 'birdily' ),
						'right' => esc_html__( 'Right', 'birdily' ),
					),
					'type'     => BIRDILY_THEME_FREE || ! birdily_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'birdily' ) ),
					'std'   => 1,
					'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'birdily' ),
					'desc'  => '',
					'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'birdily' ),
					'desc'     => wp_kses_data( __( "Allow override the header image with the page's/post's/product's/etc. featured image", 'birdily' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'std'      => 0,
					'type'     => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'birdily' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'birdily' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'birdily' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'birdily' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'birdily' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'birdily' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'birdily' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'birdily' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),

				// 'Footer'
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'birdily' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'birdily' ),
					),
					'std'      => 'default',
					'options'  => birdily_get_list_header_footer_types(),
					'type'     => BIRDILY_THEME_FREE || ! birdily_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'birdily' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'birdily' ),'birdily_kses_content' ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'birdily' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => BIRDILY_THEME_FREE ? 'footer-custom-elementor-footer-default' : 'footer-custom-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'birdily' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'birdily' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => birdily_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'birdily' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'birdily' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'birdily' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'birdily' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'birdily' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! birdily_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'birdily' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by Axiomthemes. All rights reserved.', 'birdily' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),

				// 'Blog'
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'birdily' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),

				// Blog - Posts page
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'birdily' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'birdily' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'birdily' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'birdily' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'birdily' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'blog_style'     => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'birdily' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'birdily' ),
						'fullpost' => esc_html__( 'Full post', 'birdily' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'birdily' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 60,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'birdily' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'birdily' ) ),
					'std'     => 2,
					'options' => birdily_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'birdily' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'birdily' ),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'birdily' ),
						'links'    => esc_html__( 'Older/Newest', 'birdily' ),
						'more'     => esc_html__( 'Load more', 'birdily' ),
						'infinite' => esc_html__( 'Infinite scroll', 'birdily' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'birdily' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'birdily' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'birdily' ),
					'type'    => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'birdily' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'birdily' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'birdily' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'blog_widgets_info'             => array(
					'title' => esc_html__( 'Additional widgets', 'birdily' ),
					'desc'  => '',
					'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'info',
				),
				'widgets_above_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the top of the page', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'birdily' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),
				'widgets_below_page_blog'       => array(
					'title'   => esc_html__( 'Widgets at the bottom of the page', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'birdily' ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'birdily' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'birdily' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'birdily' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'birdily' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'birdily' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'birdily' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'birdily' ),
						'columns' => esc_html__( 'Mini-cards', 'birdily' ),
					),
					'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'birdily' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'birdily' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=1|author=0|share=0|edit=1',
					'options'    => birdily_get_list_meta_parts(),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters'                      => array(
					'title'      => esc_html__( 'Post counters', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if ThemeREX Addons is active', 'birdily' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'dependency' => array(
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'.components-select-control:not(.post-author-selector) select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=1|likes=1|comments=1',
					'options'    => birdily_get_list_counters(),
					'type'       => BIRDILY_THEME_FREE || ! birdily_exists_trx_addons() ? 'hidden' : 'checklist',
				),

				// Blog - Single posts
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'birdily' ) ),
					'type'  => 'section',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'birdily' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'hide_sidebar_on_single'        => array(
					'title' => esc_html__( 'Hide sidebar on the single post', 'birdily' ),
					'desc'  => wp_kses_data( __( "Hide sidebar on the single post's pages", 'birdily' ) ),
					'std'   => 0,
					'type'  => 'checkbox',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'birdily' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'birdily' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_post'               => array(
					'title'      => esc_html__( 'Post meta', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'birdily' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'birdily' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=1|author=0|share=0|edit=1',
					'options'    => birdily_get_list_meta_parts(),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters_post'                 => array(
					'title'      => esc_html__( 'Post counters', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if plugin ThemeREX Addons is active', 'birdily' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=1|likes=1|comments=1',
					'options'    => birdily_get_list_counters(),
					'type'       => BIRDILY_THEME_FREE || ! birdily_exists_trx_addons() ? 'hidden' : 'checklist',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'birdily' ) ),
					'std'   => 1,
					'type'  => ! birdily_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_tags'              => array(
					'title' => esc_html__( 'Show tags', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Display tags on the single post', 'birdily' ) ),
					'std'   => 1,
					'type'  => ! birdily_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'birdily' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'birdily' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'birdily' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'birdily' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'birdily' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'birdily' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'birdily' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => birdily_get_list_range( 1, 9 ),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'birdily' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page (from 2 to 4)?', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => birdily_get_list_range( 1, 4 ),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select style of the related posts output', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => birdily_get_list_styles( 1, 3 ),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'birdily'),
						'side'    => esc_html__('Side', 'birdily'),
						'outside' => esc_html__('Outside', 'birdily'),
						'top'     => esc_html__('Top', 'birdily'),
						'bottom'  => esc_html__('Bottom', 'birdily')
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'birdily'),
						'bottom'  => esc_html__('Bottom', 'birdily')
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'text',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'birdily' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'birdily' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'below_content' => esc_html__( 'After content', 'birdily' ),
						'below_page'    => esc_html__( 'After content & sidebar', 'birdily' ),
					),
					'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),

				// 'Colors'
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'birdily' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'birdily' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'birdily' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'birdily' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'birdily' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'birdily' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'birdily' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'menu_scheme'                   => array(
					'title'    => esc_html__( 'Sidemenu Color Scheme', 'birdily' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'birdily' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes || BIRDILY_THEME_FREE ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'birdily' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'birdily' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'birdily' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'birdily' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'birdily' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'birdily' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'birdily' ),
					'desc'        => '',
					'std'         => '$birdily_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);

		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'birdily' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'birdily' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'birdily' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'birdily' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'birdily' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'birdily' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'birdily' ) ),
				'class'   => 'birdily_column-1_3 birdily_new_row',
				'refresh' => false,
				'std'     => '$birdily_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= birdily_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( birdily_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'birdily' ), $i ) ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'birdily' ),
				'desc'    => '',
				'class'   => 'birdily_column-1_3 birdily_new_row',
				'refresh' => false,
				'std'     => '$birdily_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'birdily' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'birdily' ) )
							: '',
				'class'   => 'birdily_column-1_3',
				'refresh' => false,
				'std'     => '$birdily_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'birdily' ),
					'serif'      => esc_html__( 'serif', 'birdily' ),
					'sans-serif' => esc_html__( 'sans-serif', 'birdily' ),
					'monospace'  => esc_html__( 'monospace', 'birdily' ),
					'cursive'    => esc_html__( 'cursive', 'birdily' ),
					'fantasy'    => esc_html__( 'fantasy', 'birdily' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'birdily' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'birdily' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'birdily' ) )
							: '',
				'class'   => 'birdily_column-1_3',
				'refresh' => false,
				'std'     => '$birdily_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = birdily_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'birdily' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses( sprintf( __( 'Font settings of the "%s" tag.', 'birdily' ), $tag ),'birdily_kses_content' ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'birdily' ),
						'100'     => esc_html__( '100 (Light)', 'birdily' ),
						'200'     => esc_html__( '200 (Light)', 'birdily' ),
						'300'     => esc_html__( '300 (Thin)', 'birdily' ),
						'400'     => esc_html__( '400 (Normal)', 'birdily' ),
						'500'     => esc_html__( '500 (Semibold)', 'birdily' ),
						'600'     => esc_html__( '600 (Semibold)', 'birdily' ),
						'700'     => esc_html__( '700 (Bold)', 'birdily' ),
						'800'     => esc_html__( '800 (Black)', 'birdily' ),
						'900'     => esc_html__( '900 (Black)', 'birdily' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'birdily' ),
						'normal'  => esc_html__( 'Normal', 'birdily' ),
						'italic'  => esc_html__( 'Italic', 'birdily' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'birdily' ),
						'none'         => esc_html__( 'None', 'birdily' ),
						'underline'    => esc_html__( 'Underline', 'birdily' ),
						'overline'     => esc_html__( 'Overline', 'birdily' ),
						'line-through' => esc_html__( 'Line-through', 'birdily' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'birdily' ),
						'none'       => esc_html__( 'None', 'birdily' ),
						'uppercase'  => esc_html__( 'Uppercase', 'birdily' ),
						'lowercase'  => esc_html__( 'Lowercase', 'birdily' ),
						'capitalize' => esc_html__( 'Capitalize', 'birdily' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'birdily_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$birdily_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		birdily_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			birdily_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'birdily' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'birdily' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is 'Theme Options'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ( isset( $_REQUEST['page'] ) && in_array( $_REQUEST['page'], array( 'theme_options', 'trx_addons_theme_panel' ) ) ) ) {
			birdily_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'birdily' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'birdily' ) ),
					'class'    => 'birdily_column-1_2 birdily_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'birdily_options_get_list_cpt_options' ) ) {
	function birdily_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'birdily' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'birdily' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'birdily' ) ),
				'std'     => 'inherit',
				'options' => birdily_get_list_header_footer_types( true ),
				'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'birdily' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'birdily' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'birdily' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'birdily' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'birdily' ),
				'desc'    => wp_kses_data( __( "Allow override the header image with the post's featured image", 'birdily' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'birdily' ),
					1         => esc_html__( 'Yes', 'birdily' ),
					0         => esc_html__( 'No', 'birdily' ),
				),
				'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_widgets_{$cpt}"         => array(
				'title'   => esc_html__( 'Header widgets', 'birdily' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select set of widgets to show in the header on the %s pages', 'birdily' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'select',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'birdily' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => esc_html__( 'Sidebar position', 'birdily' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( __( 'Select position to show sidebar on the %s pages', 'birdily' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => esc_html__( 'Sidebar widgets', 'birdily' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s pages', 'birdily' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( 'left', 'right' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"hide_sidebar_on_single_{$cpt}" => array(
				'title'   => esc_html__( 'Hide sidebar on the single pages', 'birdily' ),
				'desc'    => wp_kses_data( __( 'Hide sidebar on the single page', 'birdily' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'birdily' ),
					1         => esc_html__( 'Hide', 'birdily' ),
					0         => esc_html__( 'Show', 'birdily' ),
				),
				'type'    => 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'birdily' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'birdily' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'birdily' ) ),
				'std'     => 'inherit',
				'options' => birdily_get_list_header_footer_types( true ),
				'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'birdily' ),
				'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'birdily' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => BIRDILY_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'birdily' ),
				'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'birdily' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'birdily' ),
				'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'birdily' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => birdily_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'birdily' ),
				'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'birdily' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

			"widgets_info_{$cpt}"           => array(
				'title' => esc_html__( 'Additional panels', 'birdily' ),
				'desc'  => '',
				'type'  => BIRDILY_THEME_FREE ? 'hidden' : 'info',
			),
			"widgets_above_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the top of the page', 'birdily' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'birdily' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the bottom of the page', 'birdily' ),
				'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'birdily' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => BIRDILY_THEME_FREE ? 'hidden' : 'select',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'birdily_options_get_list_choises' ) ) {
	add_filter( 'birdily_filter_options_get_list_choises', 'birdily_options_get_list_choises', 10, 2 );
	function birdily_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = birdily_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = birdily_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = birdily_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = birdily_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = birdily_get_list_sidebars( strpos( $id, 'sidebar_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = birdily_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = birdily_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = birdily_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = birdily_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = birdily_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = birdily_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = birdily_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = birdily_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = birdily_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = birdily_array_merge( array( 0 => esc_html__( '- Select category -', 'birdily' ) ), birdily_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = birdily_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = birdily_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = birdily_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
if( !function_exists('birdily_remove_parent_filters') ) {
	add_filter( 'trx_addons_filter_options', 'birdily_remove_parent_filters', 10, 1 );
	function birdily_remove_parent_filters($list){
		unset($list['api_instagram_info']);
		unset($list['api_instagram_client_id']);
		unset($list['api_instagram_client_secret']);
		unset($list['api_instagram_get_access_token']);
		unset($list['api_instagram_access_token']);
		return $list;
	}
}