<?php
/**
 * The template 'Style 3' to displaying related posts
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_link        = get_permalink();
$birdily_post_format = get_post_format();
$birdily_post_format = empty( $birdily_post_format ) ? 'standard' : str_replace( 'post-format-', '', $birdily_post_format );

?><div id="post-<?php the_ID(); ?>"
	<?php post_class( 'related_item related_item_style_3 post_format_' . esc_attr( $birdily_post_format ) ); ?>>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $birdily_link ); ?>"><?php the_title(); ?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<a href="<?php echo esc_url( $birdily_link ); ?>"><span class="post_date"><span class="icon-clock"></span></span><?php echo wp_kses_data( birdily_get_date() ); ?></a>
			<?php
		}
		?>
	</div>
</div>
