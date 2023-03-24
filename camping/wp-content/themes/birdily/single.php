<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	get_template_part( apply_filters( 'birdily_filter_get_template_part', 'content', get_post_format() ), get_post_format() );

	// Previous/next post navigation.
	?>
	<div class="nav-links-single">
		<?php
		the_post_navigation(
			array(
				'next_text' => '<span class="nav-arrow"></span>'
					. '<span class="navpost-text">Next<br>post</span> '
					. '<h6 class="post-title">%title</h6>'
					. '<span class="post_date">%date</span>',
				'prev_text' => '<span class="nav-arrow"></span>'
				. '<span class="navpost-text">Prev<br>post</span> '
					. '<h6 class="post-title">%title</h6>'
					. '<span class="post_date">%date</span>',
			)
		);
		?>
	</div>
	<?php

	// Related posts
	if ( birdily_get_theme_option( 'related_position' ) == 'below_content' ) {
		do_action( 'birdily_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
