// Buttons decoration (add 'hover' class)
// Attention! Not use cont.find('selector')! Use jQuery('selector') instead!

jQuery( document ).on(
	'action.init_hidden_elements', function(e, cont) {
		"use strict";

		if (BIRDILY_STORAGE['button_hover'] && BIRDILY_STORAGE['button_hover'] != 'default') {
			jQuery(
				'button:not(.search_submit):not(.tribe-bar-views-toggle):not([class*="sc_button_hover_"]):not(.tribe-events-c-subscribe-dropdown__button-text),\
				.theme_button:not([class*="sc_button_hover_"]),\
				.sc_button:not([class*="sc_button_simple"]):not([class*="sc_button_hover_"]),\
				.sc_form_field button:not([class*="sc_button_hover_"]),\
				.post_item .more-link:not([class*="sc_button_hover_"]),\
				.trx_addons_hover_content .trx_addons_hover_links a:not([class*="sc_button_hover_"]),\
				.birdily_tabs .birdily_tabs_titles li a:not([class*="sc_button_hover_"]),\
				.hover_shop_buttons .icons a:not([class*="sc_button_hover_style_"]),\
				.mptt-navigation-tabs li a:not([class*="sc_button_hover_style_"]),\
				.edd_download_purchase_form .button:not([class*="sc_button_hover_style_"]),\
				.edd-submit.button:not([class*="sc_button_hover_style_"]),\
				.widget_edd_cart_widget .edd_checkout a:not([class*="sc_button_hover_style_"]),\
				.woocommerce #respond input#submit:not([class*="sc_button_hover_"]),\
				.woocommerce .button:not([class*="shop_"]):not([class*="view"]):not([class*="sc_button_hover_"]),\
				.woocommerce-page .button:not([class*="shop_"]):not([class*="view"]):not([class*="sc_button_hover_"]),\
				#buddypress a.button:not([class*="sc_button_hover_"]),\
				.trx_addons_popup_form_wrap input[type="submit"]:not([class*="sc_button_hover_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			if (BIRDILY_STORAGE['button_hover'] != 'arrow') {
				jQuery(
					'input[type="button"]:not([class*="sc_button_hover_"]),\
					.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:not([class*="sc_button_hover_"]),\
					.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a:not([class*="sc_button_hover_"]),\
					#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:not([class*="sc_button_hover_"]),\
					.tribe-bar-mini #tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:not([class*="sc_button_hover_"]),\
					.tribe-bar-submit input:not([class*="sc_button_hover_"]),\
					.tribe-events-sub-nav li a:not([class*="sc_button_hover_"]),\
					.isotope_filters_button:not([class*="sc_button_hover_"]),\
					.trx_addons_scroll_to_top:not([class*="sc_button_hover_"]),\
					.sc_promo_modern .sc_promo_link2:not([class*="sc_button_hover_"]),\
					.slider_container .slider_prev:not([class*="sc_button_hover_"]),\
					.slider_container .slider_next:not([class*="sc_button_hover_"]),\
					.sc_slider_controller_titles .slider_controls_wrap > a:not([class*="sc_button_hover_"]),\
					.tagcloud > a:not([class*="sc_button_hover_"]),\
					.wpcf7-submit\
					'
				).addClass( 'sc_button_hover_just_init sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			}
			// Add alter styles of buttons
			jQuery(
				'.sc_slider_controller_titles .slider_controls_wrap > a:not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_default' );
			jQuery(
				'.trx_addons_hover_content .trx_addons_hover_links a:not([class*="sc_button_hover_style_"]),\
				.single-product ul.products li.product .post_data .button:not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_inverse' );
			jQuery(
				'.post_item_single .post_content .post_meta .post_share .social_item .social_icon:not([class*="sc_button_hover_style_"]),\
				.woocommerce #respond input#submit.alt:not([class*="sc_button_hover_style_"]),\
				.woocommerce a.button.alt:not([class*="sc_button_hover_style_"]),\
				.woocommerce button.button.alt:not([class*="sc_button_hover_style_"]),\
				.woocommerce input.button.alt:not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_hover' );
			jQuery(
				'.woocommerce .woocommerce-message .button:not([class*="sc_button_hover_style_"]),\
				.woocommerce .woocommerce-info .button:not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_alter' );
			jQuery(
				'.sidebar .trx_addons_tabs .trx_addons_tabs_titles li a:not([class*="sc_button_hover_style_"]),\
				.birdily_tabs .birdily_tabs_titles li a:not([class*="sc_button_hover_style_"]),\
				.widget_tag_cloud a:not([class*="sc_button_hover_style_"]),\
				.widget_product_tag_cloud a:not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_alterbd' );
			jQuery(
				'.vc_tta-accordion .vc_tta-panel-heading .vc_tta-controls-icon:not([class*="sc_button_hover_style_"]),\
				.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a:not([class*="sc_button_hover_style_"]),\
				.sc_button.color_style_dark:not([class*="sc_button_simple"]):not([class*="sc_button_hover_style_"]),\
				.slider_prev:not([class*="sc_button_hover_style_"]),\
				.slider_next:not([class*="sc_button_hover_style_"]),\
				.trx_addons_video_player.with_cover .video_hover:not([class*="sc_button_hover_style_"]),\
				.trx_addons_tabs .trx_addons_tabs_titles li a:not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_dark' );
			jQuery(
				'.sc_price_item_link:not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init' );
			jQuery(
				'.sc_button.color_style_link2:not([class*="sc_button_simple"]):not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_link2' );
			jQuery(
				'.sc_button.color_style_link3:not([class*="sc_button_simple"]):not([class*="sc_button_hover_style_"])\
				'
			).addClass( 'sc_button_hover_just_init sc_button_hover_style_link3' );
			jQuery('.esg-navigationbutton.esg-loadmore').addClass( 'sc_button sc_button_default sc_button_size_normal sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.tribe-events-read-more').addClass( 'sc_button sc_button_default sc_button_size_small sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.ws-theme-cart-page .coupon input[type="submit"]').addClass( 'sc_button sc_button_default sc_button_size_normal sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.dashboard-tab .account-setting input[type="submit"]').addClass( 'sc_button sc_button_default sc_button_size_normal sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.dashboard-tab .payment-content input[type="submit"]').addClass( 'sc_button sc_button_default sc_button_size_normal sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.sc_widget_twitter .widget_twitter_follow').addClass( 'sc_button sc_button_default sc_button_size_small sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.sidebar .widget_shopping_cart_content .wc-forward:not(".checkout")').addClass( 'sc_button_default color_style_link2 sc_button_hover_style_link2' );
			jQuery('.single-itineraries ul.availabily-list .availabily-content .btn').addClass( 'sc_button sc_button_default sc_button_size_small sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.ws-theme-cart-page .book-now-btn').addClass( 'sc_button sc_button_default sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.checkout-page-wrap #wp-travel-book-now').addClass( 'sc_button sc_button_default sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			//jQuery('.ws-theme-cart-page button').addClass( 'sc_button sc_button_default sc_button_size_normal sc_button_hover_slide_left' );
			// Remove just init hover class
			setTimeout(
				function() {
					jQuery( '.sc_button_hover_just_init' ).removeClass( 'sc_button_hover_just_init' );
				}, 500
			);
			// Remove hover class
			jQuery(
				'.mejs-controls button,\
				.mfp-close,\
				.sc_button_bg_image,\
				.hover_shop_buttons a,\
				button.pswp__button,\
				.wp-block-search .wp-block-search__button,\
				.woocommerce-orders-table__cell-order-actions .button,\
				.sc_layouts_row_type_narrow .sc_button\
				.sc_button_player\
				'
			).removeClass( 'sc_button_hover_' + BIRDILY_STORAGE['button_hover'] );
			jQuery('.sc_button_player').removeClass('sc_button_hover_' + BIRDILY_STORAGE['button_hover']);
			jQuery('.sc_button_vertical').removeClass('sc_button_hover_' + BIRDILY_STORAGE['button_hover']);
		}

		if (jQuery("button[name='apply_coupon']").hasClass('sc_button_hover_' + BIRDILY_STORAGE['button_hover'])) {
			jQuery("button[name*='apply_coupon']").removeClass('sc_button_hover_' + BIRDILY_STORAGE['button_hover']);
		}

		if (jQuery("button[name='update_cart']").hasClass('sc_button_hover_' + BIRDILY_STORAGE['button_hover'])) {
			jQuery("button[name*='update_cart']").removeClass('sc_button_hover_' + BIRDILY_STORAGE['button_hover']);
		}

	}
);