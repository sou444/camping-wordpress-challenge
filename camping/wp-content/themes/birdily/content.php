<?php
/**
 * The default template to display the content of the single post, page or attachment
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

$birdily_seo = birdily_is_on( birdily_get_theme_option( 'seo_snippets' ) );
?>

<article id="post-<?php the_ID(); ?>" 
									<?php
									post_class(
										'post_item_single post_type_' . esc_attr( get_post_type() )
												. ' post_format_' . esc_attr( str_replace( 'post-format-', '', get_post_format() ) )
									);
									if ( $birdily_seo ) {
										?>
			itemscope="itemscope" 
			itemprop="articleBody" 
			itemtype="//schema.org/<?php echo esc_attr( birdily_get_markup_schema() ); ?>"
			itemid="<?php echo esc_url( get_the_permalink() ); ?>"
			content="<?php the_title_attribute(); ?>"
										<?php
									}
									?>
>
<?php

	do_action( 'birdily_action_before_post_data' );

	// Structured data snippets
if ( $birdily_seo ) {
	get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/seo' ) );
}

	// Featured image
if ( birdily_is_off( birdily_get_theme_option( 'hide_featured_on_single' ) )
			&& ! birdily_sc_layouts_showed( 'featured' )
			&& strpos( get_the_content(), '[trx_widget_banner]' ) === false ) {
	do_action( 'birdily_action_before_post_featured' );
	birdily_show_post_featured();
	do_action( 'birdily_action_after_post_featured' );
} elseif ( has_post_thumbnail() ) {
	?>
		<meta itemprop="image" itemtype="//schema.org/ImageObject" content="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>">
		<?php
}

	// Title and post meta
if ( ( ! birdily_sc_layouts_showed( 'title' ) || ! birdily_sc_layouts_showed( 'postmeta' ) ) && ! in_array( get_post_format(), array( 'link', 'aside', 'status', 'quote' ) ) ) {
	do_action( 'birdily_action_before_post_title' );
	?>
		<div class="post_header post_header_single entry-header">
		<?php
		// Post title
		if ( ! birdily_sc_layouts_showed( 'title' ) ) {
			the_title( '<h3 class="post_title entry-title"' . ( $birdily_seo ? ' itemprop="headline"' : '' ) . '>', '</h3>' );
		}
		// Post meta
		if ( ! birdily_sc_layouts_showed( 'postmeta' ) && birdily_is_on( birdily_get_theme_option( 'show_post_meta' ) ) ) {
			birdily_show_post_meta(
				apply_filters(
					'birdily_filter_post_meta_args', array(
						'components' => birdily_array_get_keys_by_value( birdily_get_theme_option( 'meta_parts' ) ),
						'counters'   => birdily_array_get_keys_by_value( birdily_get_theme_option( 'counters' ) ),
						'seo'        => birdily_is_on( birdily_get_theme_option( 'seo_snippets' ) ),
					), 'single', 1
				)
			);
		}
		?>
		</div><!-- .post_header -->
		<?php
		do_action( 'birdily_action_after_post_title' );
}

	do_action( 'birdily_action_before_post_content' );

	// Post content
?>
	<div class="post_content post_content_single entry-content" itemprop="mainEntityOfPage">
		<?php
		the_content();

		do_action( 'birdily_action_before_post_pagination' );

		wp_link_pages(
			array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'birdily' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="navpost-text">' . esc_html__( 'Page', 'birdily' ) . ' </span>%',
				'separator'   => '<span class="navpost-text">, </span>',
			)
		);

		// Taxonomies and share
		if ( is_single() && ! is_attachment() ) {

			do_action( 'birdily_action_before_post_meta' );

			// Post rating
			do_action(
				'trx_addons_action_post_rating', array(
					'class'                => 'single_post_rating',
					'rating_text_template' => esc_html__( 'Post rating: {{X}} from {{Y}} (according {{V}})', 'birdily' ),
				)
			);

			?>
			<div class="post_meta post_meta_single">
			<?php

				// Post taxonomies
				

					// Share
			if ( birdily_is_on( birdily_get_theme_option( 'show_tags' ) ) ) {
				the_tags('<span class="post_meta_item post_tags"><span class="post_meta_label">' . esc_html__( 'Tags:', 'birdily' ) . '</span> ', ', ', '</span>' );
			}

				// Share
			if ( birdily_is_on( birdily_get_theme_option( 'show_share_links' ) ) ) {
				birdily_show_share_links(
					array(
						'type'    => 'block',
						'caption' => '',
						'before'  => '<span class="post_meta_item post_share">',
						'after'   => '</span>',
					)
				);
			}
			?>
			</div>
			<?php

			do_action( 'birdily_action_after_post_meta' );
		}
		?>
	</div><!-- .entry-content -->

	<?php
	do_action( 'birdily_action_after_post_content' );

	// Author bio
	if ( birdily_get_theme_option( 'show_author_info' ) == 1 && is_single() && ! is_attachment() && get_the_author_meta( 'description' ) ) { 
		do_action( 'birdily_action_before_post_author' );
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'templates/author-bio' ) );
		do_action( 'birdily_action_after_post_author' );
	}

	do_action( 'birdily_action_after_post_data' );
	?>
</article>
