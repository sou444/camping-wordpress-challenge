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
	$birdily_columns    = empty( $birdily_template_args['columns'] ) ? 2 : max( 2, $birdily_template_args['columns'] );
	$birdily_blog_style = array( $birdily_template_args['type'], $birdily_columns );
} else {
	$birdily_blog_style = explode( '_', birdily_get_theme_option( 'blog_style' ) );
	$birdily_columns    = empty( $birdily_blog_style[1] ) ? 2 : max( 2, $birdily_blog_style[1] );
}
$birdily_expanded   = ! birdily_sidebar_present() && birdily_is_on( birdily_get_theme_option( 'expand_content' ) );
$birdily_animation  = birdily_get_theme_option( 'blog_animation' );
$birdily_components = birdily_array_get_keys_by_value( birdily_get_theme_option( 'meta_parts' ) );
$birdily_counters   = birdily_array_get_keys_by_value( birdily_get_theme_option( 'counters' ) );

$birdily_post_format = get_post_format();
$birdily_post_format = empty( $birdily_post_format ) ? 'standard' : str_replace( 'post-format-', '', $birdily_post_format );

?><div class="
<?php
if ( ! empty( $birdily_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( 'classic' == $birdily_blog_style[0] ? 'column' : 'masonry_item masonry_item' ) . '-1_' . esc_attr( $birdily_columns );
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
		post_class(
			'post_item post_format_' . esc_attr( $birdily_post_format )
					. ' post_layout_classic post_layout_classic_' . esc_attr( $birdily_columns )
					. ' post_layout_' . esc_attr( $birdily_blog_style[0] )
					. ' post_layout_' . esc_attr( $birdily_blog_style[0] ) . '_' . esc_attr( $birdily_columns )
		);
		echo ( ! birdily_is_off( $birdily_animation ) && empty( $birdily_template_args['slider'] ) ? ' data-animation="' . esc_attr( birdily_get_animation_classes( $birdily_animation ) ) . '"' : '' );
		?>
	>
	<?php

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
			'thumb_size' => birdily_get_thumb_size(
				'classic' == $birdily_blog_style[0]
						? ( strpos( birdily_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $birdily_columns > 2 ? 'big' : 'huge' )
								: ( $birdily_columns > 2
									? ( $birdily_expanded ? 'med' : 'small' )
									: ( $birdily_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( birdily_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $birdily_columns > 2 ? 'masonry-big' : 'full' )
								: ( $birdily_columns <= 2 && $birdily_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $birdily_hover,
			'no_links'   => ! empty( $birdily_template_args['no_links'] ),
			'singular'   => false,
		)
	);

	if ( ! in_array( $birdily_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			do_action( 'birdily_action_before_post_title' );

			// Post title
			if ( empty( $birdily_template_args['no_links'] ) ) {
				the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
			} else {
				the_title( '<h4 class="post_title entry-title">', '</h4>' );
			}

			do_action( 'birdily_action_before_post_meta' );

			// Post meta
			if ( ! empty( $birdily_components ) && ! in_array( $birdily_hover, array( 'border', 'pull', 'slide', 'fade' ) ) ) {
				birdily_show_post_meta(
					apply_filters(
						'birdily_filter_post_meta_args', array(
							'components' => $birdily_components,
							'counters'   => $birdily_counters,
							'seo'        => false,
						), $birdily_blog_style[0], $birdily_columns
					)
				);
			}

			do_action( 'birdily_action_after_post_meta' );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>

	<div class="post_content entry-content">
	<?php
	if ( empty( $birdily_template_args['hide_excerpt'] ) ) {
		?>
			<div class="post_content_inner <?php echo (is_search() && get_post_type() == "page" ? " hide" : "") ?>">
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
	if ( in_array( $birdily_post_format, array( 'link', 'aside', 'status' ) ) ) {
		if ( ! empty( $birdily_components ) ) {
			birdily_show_post_meta(
				apply_filters(
					'birdily_filter_post_meta_args', array(
						'components' => $birdily_components,
						'counters'   => $birdily_counters,
					), $birdily_blog_style[0], $birdily_columns
				)
			);
		}
	}
		// More button
	if ( false && empty( $birdily_template_args['no_links'] ) && ! in_array( $birdily_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
			<p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'read more', 'birdily' ); ?></a></p>
			<?php
	}
	?>
	</div><!-- .entry-content -->

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
