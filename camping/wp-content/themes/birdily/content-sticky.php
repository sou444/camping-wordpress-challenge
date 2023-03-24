<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_columns     = max( 1, min( 3, count( get_option( 'sticky_posts' ) ) ) );
$birdily_post_format = get_post_format();
$birdily_post_format = empty( $birdily_post_format ) ? 'standard' : str_replace( 'post-format-', '', $birdily_post_format );
$birdily_animation   = birdily_get_theme_option( 'blog_animation' );

?><div class="column-1_<?php echo esc_attr( $birdily_columns ); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_' . esc_attr( $birdily_post_format ) ); ?>
	<?php echo ( ! birdily_is_off( $birdily_animation ) ? ' data-animation="' . esc_attr( birdily_get_animation_classes( $birdily_animation ) ) . '"' : '' ); ?>
	>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	birdily_show_post_featured(
		array(
			'thumb_size' => birdily_get_thumb_size( 1 == $birdily_columns ? 'big' : ( 2 == $birdily_columns ? 'med' : 'avatar' ) ),
		)
	);

	if ( ! in_array( $birdily_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			birdily_show_post_meta( apply_filters( 'birdily_filter_post_meta_args', array(), 'sticky', $birdily_columns ) );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div><?php

// div.column-1_X is a inline-block and new lines and spaces after it are forbidden
