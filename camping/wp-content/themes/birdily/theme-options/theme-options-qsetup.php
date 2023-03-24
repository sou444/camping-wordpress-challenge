<?php
/**
 * Quick Setup Section in the Theme Panel
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.48
 */


// Load required styles and scripts for admin mode
if ( ! function_exists( 'birdily_options_qsetup_add_scripts' ) ) {
	add_action("admin_enqueue_scripts", 'birdily_options_qsetup_add_scripts');
	function birdily_options_qsetup_add_scripts() {
		if ( ! BIRDILY_THEME_FREE ) {
			$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
			if ( is_object( $screen ) && ! empty( $screen->id ) && false !== strpos($screen->id, 'page_trx_addons_theme_panel') ) {
				wp_enqueue_style( 'fontello-style', birdily_get_file_url( 'css/font-icons/css/fontello-embedded.css' ), array(), null );
				wp_enqueue_script( 'jquery-ui-tabs', false, array( 'jquery', 'jquery-ui-core' ), null, true );
				wp_enqueue_script( 'jquery-ui-accordion', false, array( 'jquery', 'jquery-ui-core' ), null, true );
				wp_enqueue_script( 'birdily-options', birdily_get_file_url( 'theme-options/theme-options.js' ), array( 'jquery' ), null, true );
				wp_localize_script( 'birdily-options', 'birdily_dependencies', birdily_get_theme_dependencies() );
			}
		}
	}
}


// Add step to the 'Quick Setup'
if ( ! function_exists( 'birdily_options_qsetup_theme_panel_steps' ) ) {
	add_filter( 'trx_addons_filter_theme_panel_steps', 'birdily_options_qsetup_theme_panel_steps' );
	function birdily_options_qsetup_theme_panel_steps( $steps ) {
		if ( ! BIRDILY_THEME_FREE ) {
			$steps = birdily_array_merge( $steps, array( 'qsetup' => esc_html__( 'Start customizing your theme.', 'birdily' ) ) );
		}
		return $steps;
	}
}


// Add tab link 'Quick Setup'
if ( ! function_exists( 'birdily_options_qsetup_theme_panel_tabs' ) ) {
	add_filter( 'trx_addons_filter_theme_panel_tabs', 'birdily_options_qsetup_theme_panel_tabs' );
	function birdily_options_qsetup_theme_panel_tabs( $tabs ) {
		if ( ! BIRDILY_THEME_FREE ) {
			$tabs = birdily_array_merge( $tabs, array( 'qsetup' => esc_html__( 'Quick Setup', 'birdily' ) ) );
		}
		return $tabs;
	}
}

// Add accent colors to the 'Quick Setup' section in the Theme Panel
if ( ! function_exists( 'birdily_options_qsetup_add_accent_colors' ) ) {
	add_filter( 'birdily_filter_qsetup_options', 'birdily_options_qsetup_add_accent_colors' );
	function birdily_options_qsetup_add_accent_colors( $options ) {
		return birdily_array_merge(
			array(
				'colors_info'        => array(
					'title'    => esc_html__( 'Theme Colors', 'birdily' ),
					'desc'     => '',
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'info',
				),
				'colors_text_link'   => array(
					'title'    => esc_html__( 'Accent color 1', 'birdily' ),
					'desc'     => wp_kses_data( __( "Color of the links", 'birdily' ) ),
					'std'      => '',
					'val'      => birdily_get_scheme_color( 'text_link' ),
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'color',
				),
				'colors_text_hover'  => array(
					'title'    => esc_html__( 'Accent color 1 (hovered state)', 'birdily' ),
					'desc'     => wp_kses_data( __( "Color of the hovered state of the links", 'birdily' ) ),
					'std'      => '',
					'val'      => birdily_get_scheme_color( 'text_hover' ),
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'color',
				),
				'colors_text_link2'  => array(
					'title'    => esc_html__( 'Accent color 2', 'birdily' ),
					'desc'     => wp_kses_data( __( "Color of the accented areas", 'birdily' ) ),
					'std'      => '',
					'val'      => birdily_get_scheme_color( 'text_link2' ),
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'color',
				),
				'colors_text_hover2' => array(
					'title'    => esc_html__( 'Accent color 2 (hovered state)', 'birdily' ),
					'desc'     => wp_kses_data( __( "Color of the hovered state of the accented areas", 'birdily' ) ),
					'std'      => '',
					'val'      => birdily_get_scheme_color( 'text_hover2' ),
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'color',
				),
				'colors_text_link3'  => array(
					'title'    => esc_html__( 'Accent color 3', 'birdily' ),
					'desc'     => wp_kses_data( __( "Color of the another accented areas", 'birdily' ) ),
					'std'      => '',
					'val'      => birdily_get_scheme_color( 'text_link3' ),
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'color',
				),
				'colors_text_hover3' => array(
					'title'    => esc_html__( 'Accent color 3 (hovered state)', 'birdily' ),
					'desc'     => wp_kses_data( __( "Color of the hovered state of the another accented areas", 'birdily' ) ),
					'std'      => '',
					'val'      => birdily_get_scheme_color( 'text_hover3' ),
					'qsetup'   => esc_html__( 'General', 'birdily' ),
					'type'     => 'color',
				),
			),
			$options
		);
	}
}

// Display 'Quick Setup' section in the Theme Panel
if ( ! function_exists( 'birdily_options_qsetup_theme_panel_section' ) ) {
	add_action( 'trx_addons_action_theme_panel_section', 'birdily_options_qsetup_theme_panel_section', 10, 2);
	function birdily_options_qsetup_theme_panel_section( $tab_id, $theme_info ) {
		if ( 'qsetup' !== $tab_id ) return;
		?>
		<div id="trx_addons_theme_panel_section_<?php echo esc_attr($tab_id); ?>" class="trx_addons_tabs_section">

			<?php do_action('trx_addons_action_theme_panel_section_start', $tab_id, $theme_info); ?>
			
			<div class="trx_addons_theme_panel_qsetup">

				<?php do_action('trx_addons_action_theme_panel_before_section_title', $tab_id, $theme_info); ?>

				<h1 class="trx_addons_theme_panel_section_title">
					<?php esc_html_e( 'Quick Setup', 'birdily' ); ?>
				</h1>

				<?php do_action('trx_addons_action_theme_panel_after_section_title', $tab_id, $theme_info); ?>
				
				<div class="trx_addons_theme_panel_section_info">
					<p>
						<?php
						echo wp_kses_data( __( 'Here you can customize the basic settings of your website.', 'birdily' ) )
							. ' '
							. wp_kses_data( sprintf(
								__( 'For a detailed customization, go to %s.', 'birdily' ),
								'<a href="' . esc_url(admin_url() . 'customize.php') . '">' . esc_html__( 'Customizer', 'birdily' ) . '</a>'
								. ( BIRDILY_THEME_FREE 
									? ''
									: ' ' . esc_html__( 'or', 'birdily' ) . ' ' . '<a href="' . esc_url( get_admin_url( null, 'admin.php?page=trx_addons_theme_panel' ) ) . '">' . esc_html__( 'Theme Options', 'birdily' ) . '</a>'
									)
								)
							);
						?>
					</p>
					<p><?php echo wp_kses_data( __( "<b>Note:</b> If you've imported the demo data, you may skip this step, since all the necessary settings have already been applied.", 'birdily' ) ); ?></p>
				</div>

				<?php
				do_action('trx_addons_action_theme_panel_before_qsetup', $tab_id, $theme_info);

				birdily_options_qsetup_show();

				do_action('trx_addons_action_theme_panel_after_qsetup', $tab_id, $theme_info);
				?>

			</div>

			<?php do_action('trx_addons_action_theme_panel_section_end', $tab_id, $theme_info); ?>

		</div>
		<?php
	}
}


// Display options
if ( ! function_exists( 'birdily_options_qsetup_show' ) ) {
	function birdily_options_qsetup_show() {
		$tabs_titles  = array();
		$tabs_content = array();
		$options      = apply_filters( 'birdily_filter_qsetup_options', birdily_storage_get( 'options' ) );
		// Show fields
		$cnt = 0;
		foreach ( $options as $k => $v ) {
			if ( empty( $v['qsetup'] ) ) {
				continue;
			}
			if ( is_bool( $v['qsetup'] ) ) {
				$v['qsetup'] = esc_html__( 'General', 'birdily' );
			}
			if ( ! isset( $tabs_titles[ $v['qsetup'] ] ) ) {
				$tabs_titles[ $v['qsetup'] ]  = $v['qsetup'];
				$tabs_content[ $v['qsetup'] ] = '';
			}
			if ( 'info' !== $v['type'] ) {
				$cnt++;
				if ( ! empty( $v['class'] ) ) {
					$v['class'] = str_replace( array( 'birdily_column-1_2', 'birdily_new_row' ), '', $v['class'] );
				}
				$v['class'] = ( ! empty( $v['class'] ) ? $v['class'] . ' ' : '' ) . 'birdily_column-1_2' . ( $cnt % 2 == 1 ? ' birdily_new_row' : '' );
			} else {
				$cnt = 0;
			}
			$tabs_content[ $v['qsetup'] ] .= birdily_options_show_field( $k, $v );
		}
		if ( count( $tabs_titles ) > 0 ) {
			?>
			<div class="birdily_options birdily_options_qsetup">
				<form action="<?php echo esc_url( get_admin_url( null, 'admin.php?page=trx_addons_theme_panel' ) ); ?>" class="trx_addons_theme_panel_section_form" name="trx_addons_theme_panel_qsetup_form" method="post">
					<input type="hidden" name="qsetup_options_nonce" value="<?php echo esc_attr( wp_create_nonce( admin_url() ) ); ?>" />
					<?php
					if ( count( $tabs_titles ) > 1 ) {
						?>
						<div id="birdily_options_tabs" class="birdily_tabs">
							<ul>
								<?php
								$cnt = 0;
								foreach ( $tabs_titles as $k => $v ) {
									$cnt++;
									?>
									<li><a href="#birdily_options_<?php echo esc_attr( $cnt ); ?>"><?php echo esc_html( $v ); ?></a></li>
									<?php
								}
								?>
							</ul>
							<?php
							$cnt = 0;
							foreach ( $tabs_content as $k => $v ) {
								$cnt++;
								?>
								<div id="birdily_options_<?php echo esc_attr( $cnt ); ?>" class="birdily_tabs_section birdily_options_section">
									<?php birdily_show_layout( $v ); ?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					} else {
						?>
						<div class="birdily_options_section">
							<?php birdily_show_layout( birdily_array_get_first( $tabs_content, false ) ); ?>
						</div>
						<?php
					}
					?>
					<div class="birdily_options_buttons trx_buttons">
						<input type="button" class="birdily_options_button_submit button button-action" value="<?php  esc_attr_e( 'Save Options', 'birdily' ); ?>">
					</div>
				</form>
			</div>
			<?php
		}
	}
}


// Save quick setup options
if ( ! function_exists( 'birdily_options_qsetup_save_options' ) ) {
	add_action( 'after_setup_theme', 'birdily_options_qsetup_save_options', 4 );
	function birdily_options_qsetup_save_options() {

		if ( ! isset( $_REQUEST['page'] ) || 'trx_addons_theme_panel' != $_REQUEST['page'] || '' == birdily_get_value_gp( 'qsetup_options_nonce' ) ) {
			return;
		}

		// verify nonce
		if ( ! wp_verify_nonce( birdily_get_value_gp( 'qsetup_options_nonce' ), admin_url() ) ) {
			trx_addons_set_admin_message( esc_html__( 'Bad security code! Options are not saved!', 'birdily' ), 'error', true );
			return;
		}

		// Check permissions
		if ( ! current_user_can( 'manage_options' ) ) {
			trx_addons_set_admin_message( esc_html__( 'Manage options is denied for the current user! Options are not saved!', 'birdily' ), 'error', true );
			return;
		}

		// Prepare colors for Theme Options
		if ( '' != birdily_get_value_gp( 'birdily_options_field_colors_text_link' ) ) {
			$scheme_storage = get_theme_mod( 'scheme_storage' );
			if ( empty( $scheme_storage ) ) {
				$scheme_storage = birdily_get_scheme_storage();
			}
			if ( ! empty( $scheme_storage ) ) {
				$schemes = birdily_unserialize( $scheme_storage );
				if ( is_array( $schemes ) ) {
					$color_scheme = get_theme_mod( 'color_scheme' );
					if ( empty( $color_scheme ) ) {
						$color_scheme = birdily_array_get_first( $schemes );
					}
					if ( ! empty( $schemes[ $color_scheme] ) ) {
						// Get posted data
						$schemes[ $color_scheme][ 'colors' ][ 'text_link' ]        = birdily_get_value_gp( 'birdily_options_field_colors_text_link' );
						$schemes[ $color_scheme][ 'colors' ][ 'text_hover' ]       = birdily_get_value_gp( 'birdily_options_field_colors_text_hover' );
						$schemes[ $color_scheme][ 'colors' ][ 'text_link2' ]       = birdily_get_value_gp( 'birdily_options_field_colors_text_link2' );
						$schemes[ $color_scheme][ 'colors' ][ 'text_hover2' ]      = birdily_get_value_gp( 'birdily_options_field_colors_text_hover2' );
						$schemes[ $color_scheme][ 'colors' ][ 'text_link3' ]       = birdily_get_value_gp( 'birdily_options_field_colors_text_link3' );
						$schemes[ $color_scheme][ 'colors' ][ 'text_hover3' ]      = birdily_get_value_gp( 'birdily_options_field_colors_text_hover3' );
						// Calculate 'alter' colors
						$schemes[ $color_scheme][ 'colors' ][ 'alter_link' ]       = $schemes[ $color_scheme][ 'colors' ][ 'text_hover' ];
						$schemes[ $color_scheme][ 'colors' ][ 'alter_hover' ]      = $schemes[ $color_scheme][ 'colors' ][ 'text_link' ];
						$schemes[ $color_scheme][ 'colors' ][ 'alter_link2' ]      = $schemes[ $color_scheme][ 'colors' ][ 'text_hover2' ];
						$schemes[ $color_scheme][ 'colors' ][ 'alter_hover2' ]     = $schemes[ $color_scheme][ 'colors' ][ 'text_link2' ];
						$schemes[ $color_scheme][ 'colors' ][ 'alter_link3' ]      = $schemes[ $color_scheme][ 'colors' ][ 'text_hover3' ];
						$schemes[ $color_scheme][ 'colors' ][ 'alter_hover3' ]     = $schemes[ $color_scheme][ 'colors' ][ 'text_link3' ];
						// Calculate 'extra' colors
						$schemes[ $color_scheme][ 'colors' ][ 'extra_link' ]       = $schemes[ $color_scheme][ 'colors' ][ 'text_link' ];
						$schemes[ $color_scheme][ 'colors' ][ 'extra_hover' ]      = $schemes[ $color_scheme][ 'colors' ][ 'text_hover' ];
						$schemes[ $color_scheme][ 'colors' ][ 'extra_link2' ]      = $schemes[ $color_scheme][ 'colors' ][ 'text_link2' ];
						$schemes[ $color_scheme][ 'colors' ][ 'extra_hover2' ]     = $schemes[ $color_scheme][ 'colors' ][ 'text_hover2' ];
						$schemes[ $color_scheme][ 'colors' ][ 'extra_link3' ]      = $schemes[ $color_scheme][ 'colors' ][ 'text_link3' ];
						$schemes[ $color_scheme][ 'colors' ][ 'extra_hover3' ]     = $schemes[ $color_scheme][ 'colors' ][ 'text_hover3' ];
						// Calculate 'inverse' colors
						$hsb                                                       = birdily_hex2hsb( $schemes[ $color_scheme][ 'colors' ][ 'text_link' ] );
						$hsb['b']                                                  = max( 0, $hsb['b'] - 10 );
						$schemes[ $color_scheme][ 'colors' ][ 'inverse_bd_color' ] = birdily_hsb2hex( $hsb );
						$hsb['b']                                                  = max( 0, $hsb['b'] - 10 );
						$schemes[ $color_scheme][ 'colors' ][ 'inverse_bd_hover' ] = birdily_hsb2hex( $hsb );
						// Put new values to the POST
						$_POST['birdily_options_field_scheme_storage']             = serialize( $schemes );
					}
				}
			}
		}

		// Save options
		birdily_options_update( null, 'birdily_options_field_' );

		// Return result
		trx_addons_set_admin_message( esc_html__( 'Options are saved', 'birdily' ), 'success', true );
		wp_redirect( get_admin_url( null, 'admin.php?page=trx_addons_theme_panel#trx_addons_theme_panel_section_qsetup' ) );
		exit();
	}
}
