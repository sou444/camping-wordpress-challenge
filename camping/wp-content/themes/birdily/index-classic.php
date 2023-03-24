<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

birdily_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	birdily_blog_archive_start();

	$birdily_classes    = 'posts_container '
						. ( substr( birdily_get_theme_option( 'blog_style' ), 0, 7 ) == 'classic'
							? 'columns_wrap columns_padding_bottom'
							: 'masonry_wrap'
							);
	$birdily_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$birdily_sticky_out = birdily_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $birdily_stickies ) && count( $birdily_stickies ) > 0 && get_query_var( 'paged' ) < 1;
	if ( $birdily_sticky_out ) {
		?>
		<div class="sticky_wrap columns_wrap">
		<?php
	}
	if ( ! $birdily_sticky_out ) {
		if ( birdily_get_theme_option( 'first_post_large' ) && ! is_paged() && ! in_array( birdily_get_theme_option( 'body_style' ), array( 'fullwide', 'fullscreen' ) ) ) {
			the_post();
			get_template_part( apply_filters( 'birdily_filter_get_template_part', 'content', 'excerpt' ), 'excerpt' );
		}

		?>
		<div class="<?php echo esc_attr( $birdily_classes ); ?>">
		<?php
	}
	while ( have_posts() ) {
		the_post();
		if ( $birdily_sticky_out && ! is_sticky() ) {
			$birdily_sticky_out = false;
			?>
			</div><div class="<?php echo esc_attr( $birdily_classes ); ?>">
			<?php
		}
		$birdily_part = $birdily_sticky_out && is_sticky() ? 'sticky' : 'classic';
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'content', $birdily_part ), $birdily_part );
	}

	?>
	</div>
	<?php

	birdily_show_pagination();

	birdily_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
