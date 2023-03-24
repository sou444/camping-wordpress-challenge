<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */
?>

<div class="author_info scheme_default author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php
		$birdily_mult = birdily_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 120 * $birdily_mult );
		?>
	</div><!-- .author_avatar -->

	<div class="author_description">
		<h5 class="author_title" itemprop="name">
		<?php
			// Translators: Add the author's name in the <span>
			echo wp_kses_data( sprintf( __( 'About %s', 'birdily' ), '<span class="fn">' . get_the_author() . '</span>' ) );
		?>
		</h5>

		<div class="author_bio" itemprop="description">
			<?php echo wp_kses( wpautop( get_the_author_meta( 'description' ) ), 'birdily_kses_content' ); ?>
			
			<?php do_action( 'birdily_action_user_meta' ); ?>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
