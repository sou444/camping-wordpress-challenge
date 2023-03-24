<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_link        = get_permalink();
$birdily_post_format = get_post_format();
$birdily_post_format = empty( $birdily_post_format ) ? 'standard' : str_replace( 'post-format-', '', $birdily_post_format );
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_2 post_format_' . esc_attr( $birdily_post_format ) ); ?>>
						<?php
						birdily_show_post_featured(
							array(
								'thumb_size'    => apply_filters( 'birdily_filter_related_thumb_size', birdily_get_thumb_size( (int) birdily_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'rel' ) ),
								'show_no_image' => birdily_get_theme_setting( 'allow_no_image' ),
								'singular'      => false,
							)
						);
						?>
	<div class="post_header entry-header">
	<?php
	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) &&  ($quote = birdily_get_tag(get_the_content(), '<blockquote>', '</blockquote>'))=='') {
		?>
			<span class="post_meta_item post_date"><a href="<?php echo esc_url( $birdily_link ); ?>"><?php echo wp_kses_data( birdily_get_date() ); ?></a></span>
			<div class="post_meta_item post_categories"><?php echo wp_kses( birdily_get_post_categories( '' ),'birdily_kses_content' ) ?> </div>
			<?php
	}
	?>
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $birdily_link ); ?>"><?php the_title(); ?></a></h6>
		<div class="post_content_inner"><?php
					if (has_excerpt()) {
						the_excerpt();
					} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
						the_content( '' );
					} else if (in_array($birdily_post_format, array('link', 'aside', 'status'))) {
						the_content();
					} else if ($birdily_post_format == 'quote') {
						if (($quote = birdily_get_tag(get_the_content(), '<blockquote>', '</blockquote>'))!='')
							birdily_show_layout(wpautop($quote));
						else
							the_excerpt();
					} else if (substr(get_the_content(), 0, 4)!='[vc_') {
						the_excerpt();
					}
					// More button
				if ( empty($birdily_template_args['no_links']) && !in_array($birdily_post_format, array('link', 'aside', 'status', 'quote')) ) {
					?><p><a class="more-link sc_button sc_button_default sc_button_size_small sc_button_icon_left sc_button_hover_slide_left" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'birdily'); ?></a></p><?php
				}
				?></div>
	</div>
</div>
