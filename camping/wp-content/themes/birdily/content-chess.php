<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_template_args = get_query_var( 'birdily_template_args' );
if ( is_array( $birdily_template_args ) ) {
	$birdily_columns    = empty( $birdily_template_args['columns'] ) ? 1 : max( 1, min( 3, $birdily_template_args['columns'] ) );
	$birdily_blog_style = array( $birdily_template_args['type'], $birdily_columns );
} else {
	$birdily_blog_style = explode( '_', birdily_get_theme_option( 'blog_style' ) );
	$birdily_columns    = empty( $birdily_blog_style[1] ) ? 1 : max( 1, min( 3, $birdily_blog_style[1] ) );
}
$birdily_expanded    = ! birdily_sidebar_present() && birdily_is_on( birdily_get_theme_option( 'expand_content' ) );
$birdily_post_format = get_post_format();
$birdily_post_format = empty( $birdily_post_format ) ? 'standard' : str_replace( 'post-format-', '', $birdily_post_format );
$birdily_animation   = birdily_get_theme_option( 'blog_animation' );

?><article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item'
										. ' post_layout_chess'
										. ' post_layout_chess_' . esc_attr( $birdily_columns )
										. ' post_format_' . esc_attr( $birdily_post_format )
										. ( ! empty( $birdily_template_args['slider'] ) ? ' slider-slide swiper-slide' : '' )
									);
									echo ( ! birdily_is_off( $birdily_animation ) && empty( $birdily_template_args['slider'] ) ? ' data-animation="' . esc_attr( birdily_get_animation_classes( $birdily_animation ) ) . '"' : '' );
									?>
	>

	<?php
	// Add anchor
	if ( 1 == $birdily_columns && ! is_array( $birdily_template_args ) && shortcode_exists( 'trx_sc_anchor' ) ) {
		echo do_shortcode( '[trx_sc_anchor id="post_' . esc_attr( get_the_ID() ) . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" icon="' . esc_attr( birdily_get_post_icon() ) . '"]' );
	}

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	$birdily_hover = ! empty( $birdily_template_args['hover'] ) && ! birdily_is_inherit( $birdily_template_args['hover'] )
						? $birdily_template_args['hover']
						: birdily_get_theme_option( 'image_hover' );
	birdily_show_post_featured(
		array(
			'class'         => 1 == $birdily_columns && ! is_array( $birdily_template_args ) ? 'birdily-full-height' : '',
			'singular'      => false,
			'hover'         => $birdily_hover,
			'no_links'      => ! empty( $birdily_template_args['no_links'] ),
			'show_no_image' => true,
			'thumb_ratio'   => '1:1',
			'thumb_bg'      => true,
			'thumb_size'    => birdily_get_thumb_size(
				strpos( birdily_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( 1 < $birdily_columns ? 'huge' : 'original' )
										: ( 2 < $birdily_columns ? 'big' : 'huge' )
			),
		)
	);

	?>
	<div class="post_inner"><div class="post_inner_content"><div class="post_header entry-header">
		<?php
			do_action( 'birdily_action_before_post_title' );

			// Post title
		if ( empty( $birdily_template_args['no_links'] ) ) {
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		} else {
			the_title( '<h3 class="post_title entry-title">', '</h3>' );
		}

			do_action( 'birdily_action_before_post_meta' );

			// Post meta
			$birdily_components = birdily_array_get_keys_by_value( birdily_get_theme_option( 'meta_parts' ) );
			$birdily_counters   = birdily_array_get_keys_by_value( birdily_get_theme_option( 'counters' ) );
			$birdily_post_meta  = empty( $birdily_components ) || in_array( $birdily_hover, array( 'border', 'pull', 'slide', 'fade' ) )
										? ''
										: birdily_show_post_meta(
											apply_filters(
												'birdily_filter_post_meta_args', array(
													'components' => $birdily_components,
													'counters' => $birdily_counters,
													'seo'  => false,
													'echo' => false,
												), $birdily_blog_style[0], $birdily_columns
											)
										);
			birdily_show_layout( $birdily_post_meta );
			?>
		</div><!-- .entry-header -->

		<div class="post_content entry-content">
		<?php
		if ( empty( $birdily_template_args['hide_excerpt'] ) ) {
			?>
				<div class="post_content_inner">
				<?php
				if ( has_excerpt() ) {
					the_excerpt();
				} elseif ( strpos( get_the_content( '!--more' ), '!--more' ) !== false ) {
					the_content( '' );
				} elseif ( in_array( $birdily_post_format, array( 'link', 'aside', 'status' ) ) ) {
					the_content();
				} elseif ( 'quote' == $birdily_post_format ) {
					$quote = birdily_get_tag( get_the_content(), '<blockquote>', '</blockquote>' );
					if ( ! empty( $quote ) ) {
						birdily_show_layout( wpautop( $quote ) );
					} else {
						the_excerpt();
					}
				} elseif ( substr( get_the_content(), 0, 4 ) != '[vc_' ) {
					the_excerpt();
				}
				?>
				</div>
				<?php
		}
			// Post meta
		if ( in_array( $birdily_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			birdily_show_layout( $birdily_post_meta );
		}
			// More button
		if ( empty( $birdily_template_args['no_links'] ) && ! in_array( $birdily_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
			?>
				<p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'read more', 'birdily' ); ?></a></p>
				<?php
		}
		?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!
