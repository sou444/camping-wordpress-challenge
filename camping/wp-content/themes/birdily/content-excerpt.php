<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_template_args = get_query_var('birdily_template_args');
if (is_array($birdily_template_args)) {
	$birdily_columns = empty($birdily_template_args['columns']) ? 2 : max(2, $birdily_template_args['columns']);
	$birdily_blog_style = array($birdily_template_args['type'], $birdily_columns);
	if (!empty($birdily_template_args['slider'])) {
		?><div class="slider-slide swiper-slide"><?php
	} else if ($birdily_columns > 1) {
		?><div class="column-1_<?php echo esc_attr($birdily_columns); ?>"><?php
	}
}
$birdily_expanded = !birdily_sidebar_present() && birdily_is_on(birdily_get_theme_option('expand_content'));
$birdily_post_format = get_post_format();
$birdily_post_format = empty($birdily_post_format) ? 'standard' : str_replace('post-format-', '', $birdily_post_format);
$birdily_animation = birdily_get_theme_option('blog_animation');
$birdily_hover = !empty($birdily_template_args['hover']) && !birdily_is_inherit($birdily_template_args['hover'])
					? $birdily_template_args['hover'] 
					: birdily_get_theme_option('image_hover');
$birdily_components = birdily_array_get_keys_by_value(birdily_get_theme_option('meta_parts'));
$birdily_counters = birdily_array_get_keys_by_value(birdily_get_theme_option('counters'));

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($birdily_post_format) ); ?>
	<?php echo (!birdily_is_off($birdily_animation) && empty($birdily_template_args['slider']) ? ' data-animation="'.esc_attr(birdily_get_animation_classes($birdily_animation)).'"' : ''); ?>
	>
	<div class="post_article_wrap"><?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$has_thumb = has_post_thumbnail();
	$post_format = str_replace('post-format-', '', get_post_format());
	if ($has_thumb && $post_format != 'gallery' && $post_format != 'video') {
			$birdily_hover = ! empty( $birdily_template_args['hover'] ) && ! birdily_is_inherit( $birdily_template_args['hover'] )
						? $birdily_template_args['hover']
						: birdily_get_theme_option( 'image_hover' );
		birdily_show_post_featured(array(
										'singular' => false,
										'no_links' => !empty($birdily_template_args['no_links']),
										'hover' => $birdily_hover,
										'thumb_size' => birdily_get_thumb_size( strpos(birdily_get_theme_option('body_style'), 'full')!==false ? 'full' : ($birdily_expanded ? 'blogthumb' : 'blogthumb') ) 
										));
	} elseif  ($has_thumb && $post_format == 'gallery' || $post_format == 'video') {
			$birdily_hover = ! empty( $birdily_template_args['hover'] ) && ! birdily_is_inherit( $birdily_template_args['hover'] )
						? $birdily_template_args['hover']
						: birdily_get_theme_option( 'image_hover' );
		birdily_show_post_featured(array(
										'singular' => false,
										'no_links' => !empty($birdily_template_args['no_links']),
										'hover' => $birdily_hover,
										'thumb_size' => birdily_get_thumb_size( strpos(birdily_get_theme_option('body_style'), 'full')!==false ? 'full' : ($birdily_expanded ? 'bloggallery' : 'bloggallery') ) 
										));
	} else {
			$birdily_hover = ! empty( $birdily_template_args['hover'] ) && ! birdily_is_inherit( $birdily_template_args['hover'] )
							? $birdily_template_args['hover']
							: birdily_get_theme_option( 'image_hover' );
		birdily_show_post_featured(
			array(
				'singular'   => false,
				'no_links'   => ! empty( $birdily_template_args['no_links'] ),
				'hover'      => $birdily_hover,
				'thumb_size' => birdily_get_thumb_size( strpos( birdily_get_theme_option( 'body_style' ), 'full' ) !== false ? 'full' : ( $birdily_expanded ? 'huge' : 'big' ) ),
			)
		);
	}
	// Add categories to posts with media
	$has_thumb = has_post_thumbnail();
	$post_format = str_replace('post-format-', '', get_post_format());
	if ($has_thumb || $post_format == 'gallery' || $post_format == 'video' || is_sticky()) {
		if (in_array('date',explode(',', $birdily_components))) {
			$birdily_post_meta = empty($birdily_components) || in_array($birdily_hover, array('border', 'pull', 'slide', 'fade'))
											? '' 
											: birdily_show_post_meta(apply_filters('birdily_filter_post_meta_args', array(
													'components' => 'date',
													'counters' => '',
													'seo' => false,
													'echo' => false
													), !empty($birdily_blog_style[0])  ? $birdily_blog_style[0] : '', !empty($birdily_columns)  ? $birdily_columns : '')
												);
			echo "<div class='post_header_categories'>";
			birdily_show_layout($birdily_post_meta); 
			echo "</div>";
		}
	}

	// Title and post meta
	if (get_the_title() != '' && $post_format != 'quote' ) {
		?>
		<div class="post_header entry-header">
			<?php

			do_action('birdily_action_before_post_meta'); 

			// Post meta
			if ($has_thumb || $post_format == 'gallery' || $post_format == 'video' || is_sticky()) {
				if (in_array('date',explode(',', $birdily_components))) {
					$birdily_components = str_replace('date', '', $birdily_components);
				}
			}
			if (!empty($birdily_components) && !in_array($birdily_hover, array('border', 'pull', 'slide', 'fade')))
				birdily_show_post_meta(apply_filters('birdily_filter_post_meta_args', array(
					'components' => $birdily_components,
					'counters' => $birdily_counters,
					'seo' => false
					), 'excerpt', 1)
				);

			// Post title
			do_action('birdily_action_before_post_title'); 
			if (empty($birdily_template_args['no_links']))
				the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			else
				the_title( '<h2 class="post_title entry-title">', '</h2>' );
			?>
		</div><!-- .post_header --><?php
	}
	
	// Post content
	if (empty($birdily_template_args['hide_excerpt'])) {

		?><div class="post_content entry-content"><?php
			if (birdily_get_theme_option('blog_content') == 'fullpost') {
				// Post content area
				?><div class="post_content_inner"><?php
					the_content( '' );
				?></div><?php
				// Inner pages
				wp_link_pages( array(
					'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'birdily' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'birdily' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			} else {
				// Post content area
				?><div class="post_content_inner"><?php
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
				?></div><?php
				// More button
				if ( empty($birdily_template_args['no_links']) && !in_array($birdily_post_format, array('link', 'aside', 'status', 'quote')) ) {
					?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('read more', 'birdily'); ?></a></p><?php
				}
			}
		?></div><!-- .entry-content --><?php
	}

	

?></div></article><?php

if (is_array($birdily_template_args)) {
	if (!empty($birdily_template_args['slider']) || $birdily_columns > 1) {
		?></div><?php
	}
}
?>