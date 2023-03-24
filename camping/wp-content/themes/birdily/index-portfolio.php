<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

birdily_storage_set( 'blog_archive', true );

get_header();

if ( have_posts() ) {

	birdily_blog_archive_start();

	$birdily_stickies   = is_home() ? get_option( 'sticky_posts' ) : false;
	$birdily_sticky_out = birdily_get_theme_option( 'sticky_style' ) == 'columns'
							&& is_array( $birdily_stickies ) && count( $birdily_stickies ) > 0 && get_query_var( 'paged' ) < 1;

	// Show filters
	$birdily_cat          = birdily_get_theme_option( 'parent_cat' );
	$birdily_post_type    = birdily_get_theme_option( 'post_type' );
	$birdily_taxonomy     = birdily_get_post_type_taxonomy( $birdily_post_type );
	$birdily_show_filters = birdily_get_theme_option( 'show_filters' );
	$birdily_tabs         = array();
	if ( ! birdily_is_off( $birdily_show_filters ) ) {
		$birdily_args           = array(
			'type'         => $birdily_post_type,
			'child_of'     => $birdily_cat,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'hierarchical' => 0,
			'taxonomy'     => $birdily_taxonomy,
			'pad_counts'   => false,
		);
		$birdily_portfolio_list = get_terms( $birdily_args );
		if ( is_array( $birdily_portfolio_list ) && count( $birdily_portfolio_list ) > 0 ) {
			$birdily_tabs[ $birdily_cat ] = esc_html__( 'All', 'birdily' );
			foreach ( $birdily_portfolio_list as $birdily_term ) {
				if ( isset( $birdily_term->term_id ) ) {
					$birdily_tabs[ $birdily_term->term_id ] = $birdily_term->name;
				}
			}
		}
	}
	if ( count( $birdily_tabs ) > 0 ) {
		$birdily_portfolio_filters_ajax   = true;
		$birdily_portfolio_filters_active = $birdily_cat;
		$birdily_portfolio_filters_id     = 'portfolio_filters';
		?>
		<div class="portfolio_filters birdily_tabs birdily_tabs_ajax">
			<ul class="portfolio_titles birdily_tabs_titles">
				<?php
				foreach ( $birdily_tabs as $birdily_id => $birdily_title ) {
					?>
					<li><a href="<?php echo esc_url( birdily_get_hash_link( sprintf( '#%s_%s_content', $birdily_portfolio_filters_id, $birdily_id ) ) ); ?>" data-tab="<?php echo esc_attr( $birdily_id ); ?>"><?php echo esc_html( $birdily_title ); ?></a></li>
					<?php
				}
				?>
			</ul>
			<?php
			$birdily_ppp = birdily_get_theme_option( 'posts_per_page' );
			if ( birdily_is_inherit( $birdily_ppp ) ) {
				$birdily_ppp = '';
			}
			foreach ( $birdily_tabs as $birdily_id => $birdily_title ) {
				$birdily_portfolio_need_content = $birdily_id == $birdily_portfolio_filters_active || ! $birdily_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr( sprintf( '%s_%s_content', $birdily_portfolio_filters_id, $birdily_id ) ); ?>"
					class="portfolio_content birdily_tabs_content"
					data-blog-template="<?php echo esc_attr( birdily_storage_get( 'blog_template' ) ); ?>"
					data-blog-style="<?php echo esc_attr( birdily_get_theme_option( 'blog_style' ) ); ?>"
					data-posts-per-page="<?php echo esc_attr( $birdily_ppp ); ?>"
					data-post-type="<?php echo esc_attr( $birdily_post_type ); ?>"
					data-taxonomy="<?php echo esc_attr( $birdily_taxonomy ); ?>"
					data-cat="<?php echo esc_attr( $birdily_id ); ?>"
					data-parent-cat="<?php echo esc_attr( $birdily_cat ); ?>"
					data-need-content="<?php echo ( false === $birdily_portfolio_need_content ? 'true' : 'false' ); ?>"
				>
					<?php
					if ( $birdily_portfolio_need_content ) {
						birdily_show_portfolio_posts(
							array(
								'cat'        => $birdily_id,
								'parent_cat' => $birdily_cat,
								'taxonomy'   => $birdily_taxonomy,
								'post_type'  => $birdily_post_type,
								'page'       => 1,
								'sticky'     => $birdily_sticky_out,
							)
						);
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		birdily_show_portfolio_posts(
			array(
				'cat'        => $birdily_cat,
				'parent_cat' => $birdily_cat,
				'taxonomy'   => $birdily_taxonomy,
				'post_type'  => $birdily_post_type,
				'page'       => 1,
				'sticky'     => $birdily_sticky_out,
			)
		);
	}

	birdily_blog_archive_end();

} else {

	if ( is_search() ) {
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'content', 'none-search' ), 'none-search' );
	} else {
		get_template_part( apply_filters( 'birdily_filter_get_template_part', 'content', 'none-archive' ), 'none-archive' );
	}
}

get_footer();
