<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

// Page (category, tag, archive, author) title

if ( birdily_need_page_title() ) {
	birdily_sc_layouts_showed( 'title', true );
	birdily_sc_layouts_showed( 'postmeta', false );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$birdily_blog_title           = birdily_get_blog_title();
							$birdily_blog_title_text      = '';
							$birdily_blog_title_class     = '';
							$birdily_blog_title_link      = '';
							$birdily_blog_title_link_text = '';
							if ( is_array( $birdily_blog_title ) ) {
								$birdily_blog_title_text      = $birdily_blog_title['text'];
								$birdily_blog_title_class     = ! empty( $birdily_blog_title['class'] ) ? ' ' . $birdily_blog_title['class'] : '';
								$birdily_blog_title_link      = ! empty( $birdily_blog_title['link'] ) ? $birdily_blog_title['link'] : '';
								$birdily_blog_title_link_text = ! empty( $birdily_blog_title['link_text'] ) ? $birdily_blog_title['link_text'] : '';
							} else {
								$birdily_blog_title_text = $birdily_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $birdily_blog_title_class ); ?>">
								<?php
								$birdily_top_icon = birdily_get_category_icon();
								if ( ! empty( $birdily_top_icon ) ) {
									$birdily_attr = birdily_getimagesize( $birdily_top_icon );
									?>
									<img src="<?php echo esc_url( $birdily_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'birdily' ); ?>"
										<?php
										if ( ! empty( $birdily_attr[3] ) ) {
											birdily_show_layout( $birdily_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses( $birdily_blog_title_text, 'birdily_kses_content' );
								?>
							</h1>
							<?php
							if ( ! empty( $birdily_blog_title_link ) && ! empty( $birdily_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $birdily_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $birdily_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						?>
						<div class="sc_layouts_title_breadcrumbs">
							<?php
							do_action( 'birdily_action_breadcrumbs' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
