<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0.14
 */
$birdily_header_video = birdily_get_header_video();
$birdily_embed_video  = '';
if ( ! empty( $birdily_header_video ) && ! birdily_is_from_uploads( $birdily_header_video ) ) {
	if ( birdily_is_youtube_url( $birdily_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $birdily_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		global $wp_embed;
		if ( false && is_object( $wp_embed ) ) {
			$birdily_embed_video = do_shortcode( $wp_embed->run_shortcode( '[embed]' . trim( $birdily_header_video ) . '[/embed]' ) );
			$birdily_embed_video = birdily_make_video_autoplay( $birdily_embed_video );
		} else {
			$birdily_header_video = str_replace( '/watch?v=', '/embed/', $birdily_header_video );
			$birdily_header_video = birdily_add_to_url(
				$birdily_header_video, array(
					'feature'        => 'oembed',
					'controls'       => 0,
					'autoplay'       => 1,
					'showinfo'       => 0,
					'modestbranding' => 1,
					'wmode'          => 'transparent',
					'enablejsapi'    => 1,
					'origin'         => home_url(),
					'widgetid'       => 1,
				)
			);
			$tag = birdily_get_embed_video_tag_name();
			$birdily_embed_video  = '<' . esc_attr( $tag ) . ' src="' . esc_url( $birdily_header_video ) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></' . esc_attr( $tag ) . '>';
		}
		?>
		<div id="background_video"><?php birdily_show_layout( $birdily_embed_video ); ?></div>
		<?php
	}
}
