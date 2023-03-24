<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'birdily_wp_travel_get_css' ) ) {
	add_filter( 'birdily_filter_get_css', 'birdily_wp_travel_get_css', 10, 2 );
	function birdily_wp_travel_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
.wp-travel-itinerary-items .wptravel-price-wrap .trip-price .person-count,
.wp-travel-itinerary-items .wptravel-price-wrap .trip-price .person-count span,
.wptravel-price-wrap .trip-price, .wptravel-price-wrap .trip-price .person-count ins span, .post-type-archive h4.entry-title a,
.post-type-archive.wp-travel-grid-mode .wp-travel-itinerary-items .wp-travel-post-item-wrapper h4.post-title a, .ws-theme-cart-page .product-price .wp-travel-trip-price,
.ws-theme-cart-page .ws-theme-cart-list tr .product-subtotal .item_cart span, .ws-theme-cart-list.table-total-info th .total, 
.wp-travel-checkout-review-order-table tr.cart_item td.product-total, .wp-travel-checkout-review-order-table tr.order-total td.text-right,
.checkout-page-wrap .number-accordion .panel-heading h4.panel-title {
	{$fonts['h1_font-family']}
}
.wp-travel-trip-duration, .wp-travel-trip-time span, .wp-travel-post-info .post-title a, .wp-travel-default-article .entry-title a,
.wp-travel.trip-headline-wrapper a.wp-travel-send-enquiries .dashicons-editor-help:before,
.wp-travel.trip-headline-wrapper a.wp-travel-send-enquiries .wp-travel-booking-enquiry span, .single-itineraries .tour-info .tour-info-column .tour-info-item,
.timeline-contents .tc-heading.left h4, .timeline-contents .tc-heading.left h3, .timeline-contents .tc-heading.right,
.timeline-contents .tc-heading.right h4, .timeline-contents .tc-heading.right h3, .timeline-contents .tc-content.right, .timeline-contents .tc-content.right h3,
.timeline-contents .tc-content.left h3, .timeline-contents .tc-content.left, .wp-travel-filter-by-heading h4, .post-type-archive .wp-travel-default-article .wp-travel-article-image-wrap .wp-travel-offer span, .checkout-page-wrap .number-accordion h4, .wp-travel-checkout-review-order-table tr.cart_item td.product-name,
.dashboard-tab ul.resp-tabs-list li, .scheme_default .wp-travel-trip-meta-info .travel-info .title {
	{$fonts['h5_font-family']}
}
.wptravel-price-wrap .trip-price .person-count, .wp-travel .wp-travel-trip-code code,
.post-type-archive.wp-travel-grid-mode .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-info .trip-price .person-count,
.ws-theme-cart-page .ws-theme-cart-list tr .item_cart strong, .ws-theme-cart-page .ws-theme-cart-list tr .item_cart span, .ws-theme-cart-page input[type="number"].wp-travel-pax,
.wp-travel-trip-meta-info .travel-info .value a {
	{$fonts['p_font-family']}
}


CSS;
		}
		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			$vars         = $args['vars'];
			$css['vars'] .= <<<CSS

	.ws-theme-cart-page .st_adults span.q_inc {
			-webkit-border-radius: 0 {$vars['rad']} 0 0;
	    -ms-border-radius: 0 {$vars['rad']} 0 0;
			border-radius: 0 {$vars['rad']} 0 0;
}
 	.ws-theme-cart-page .st_adults span.q_dec {
			-webkit-border-radius: 0 0 {$vars['rad']} 0;
	    -ms-border-radius: 0 0 {$vars['rad']} 0;
			border-radius: 0 0 {$vars['rad']} 0;
}


CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

	.wp-travel-trip-time.trip-fixed-departure, .wp-travel-trip-time.trip-duration {
	color: {$colors['text_light']};
	background-color: {$colors['alter_bg_color']};
}
.wp-travel-related-posts .wp-travel-itinerary-items ul.wp-travel-itinerary-list li {
	background-color: {$colors['alter_bg_color']} !important;
	background: {$colors['alter_bg_color']} !important;
}
.wp-travel-related-posts .wp-travel-trip-time.trip-duration {
	background-color: {$colors['bg_color']};
}
.wp-travel-itinerary-items ul.wp-travel-itinerary-list li, .wp-travel-itinerary-items .wp-travel-post-wrap-bg,
.wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail, .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail a,
.wptravel-layout-v2 .wptravel-archive-wrapper li{
	background: transparent !important;
	background-color:transparent !important;
}

.slider_wrap .wp-travel-itinerary-items .wp-travel-post-item-wrapper,
.slider_wrapper.swiper-wrapper .slider-slide.swiper-slide .wp-travel-itinerary-items ul.wp-travel-itinerary-list li,
.slider_wrapper.swiper-wrapper .slider-slide.swiper-slide .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail,
.slider_wrapper.swiper-wrapper .slider-slide.swiper-slide .wp-travel-itinerary-items .wp-travel-post-wrap-bg,
.slider_wrapper.swiper-wrapper .slider-slide.swiper-slide .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail a {
	background-color: {$colors['bg_color']} !important;
	background: {$colors['bg_color']} !important;
}
.wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail,
.wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail a {
	background-color: {$colors['bg_color']};
}
.custom_class_1 .wp-travel-itinerary-items ul.wp-travel-itinerary-list li, .custom_class_1 .wp-travel-itinerary-items .wp-travel-post-wrap-bg,
.custom_class_1 .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail, 
.custom_class_1 .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail a{
	background: transparent !important;
	background-color:transparent !important;
}
.wp-travel-itinerary-items ul.wp-travel-itinerary-list li {
	border-color: {$colors['extra_bd_color']};
}
.wp-travel-trip-time.trip-fixed-departure:before, .wp-travel-trip-time.trip-duration:before, .slider_wrap .wp-travel-trip-time.trip-fixed-departure i.wt-icon-calendar-alt, .wp-travel-trip-time.trip-fixed-departure i.wt-icon-calendar-alt, .slider_wrap .wp-travel-trip-time.trip-duration i.wt-icon-clock, .wp-travel-trip-time.trip-duration i.wt-icon-clock, .wp-travel-trip-time.trip-duration i.fa-clock {
	color: {$colors['bg_color']};
	background-color: {$colors['extra_bg_color']};
}
.wp-travel-itinerary-items .wptravel-price-wrap .trip-price .person-count {
	color: transparent;
}
.wp-travel-itinerary-items .wptravel-price-wrap .trip-price .person-count ins span {
	color: {$colors['text_hover']};
}
.wptravel-price-wrap .trip-price .person-count ins span {
	color: {$colors['extra_bg_color']};
}
.wp-travel .wptravel-price-wrap .trip-price del span {
	color: {$colors['text_light']};
}
.wptravel-price-wrap .trip-price .person-count {
	color: {$colors['text']};
}
.wp-travel-average-review:before {
	color: {$colors['text_link']};
}
.wp-travel-trip-meta-info .travel-info .title {
	color: {$colors['text_dark']};
}
.wp-travel-trip-meta-info .travel-info .value a {
	color: {$colors['text']};
}
.wp-travel-trip-meta-info .travel-info .value a:hover {
	color: {$colors['text_link']};
}
.wp-travel.trip-headline-wrapper a.wp-travel-send-enquiries {
	color: {$colors['extra_link']};
}
.wp-travel.trip-headline-wrapper a.wp-travel-send-enquiries .dashicons-editor-help:before {
	background-color: {$colors['extra_bg_color']};
	color: {$colors['bg_color']};
}
.wp-travel .wp-travel-trip-code code {
	background-color:transparent;
}
.single-itineraries .tour-info .tour-info-item i {
	background-color: {$colors['text_link']};
	color: {$colors['bg_color']};
}
.single-itineraries .tour-info .tour-info-column .tour-info-item {
	color: {$colors['text']};
}
.single-itineraries .tour-info .tour-info-column .tour-info-item strong {
	color: {$colors['extra_link']};
}
.single-itineraries .wp-travel-tab-wrapper .tab-list.resp-tabs-list li.resp-tab-active,
.single-itineraries .wp-travel-tab-wrapper .tab-list.resp-tabs-list li.resp-tab-item,
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container .resp-tab-content-active,
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container h2, ul.availabily-list li > form > div.price ins {
	background-color: {$colors['extra_bg_hover']};
	color: {$colors['extra_link2']};
	border-color: {$colors['bg_color']};
}
.wp-travel-calendar-view .wp-travel-booking__pricing-wrapper .wp-travel-booking__pricing-name button {
	background-color: {$colors['text_light']};
	color: {$colors['extra_hover']};
}
.wp-travel-calendar-view .wp-travel-booking__pricing-wrapper {
	border-color: {$colors['extra_bd_color']};
}
.wp-travel-booking__trip-option-list .qty-spinner,
.wp-travel-calendar-view .wp-travel-booking__pricing-wrapper .wp-travel-booking__trip-option-list li .item-price>span {
	color: {$colors['text']};
}
.wp-travel-calendar-view .wp-travel-booking__pricing-wrapper .wp-travel-booking__trip-option-list li .item-price>span:first-child {
	color: {$colors['text_dark']};
}
.wp-travel-calendar-view .wp-travel-booking__pricing-wrapper .wp-travel-booking__pricing-name button:hover,
.wp-travel-calendar-view .wp-travel-booking__pricing-wrapper .wp-travel-booking__pricing-name button.active:not([class*='__nav-link']):not([class^='tribe-events-c-nav__'])[disabled] {
	background-color: {$colors['text_link']} !important;
	color: {$colors['extra_hover']} !important;
}
.single-itineraries .wp-travel-tab-wrapper .tab-list.resp-tabs-list li.resp-tab-active:hover,
.single-itineraries .wp-travel-tab-wrapper .tab-list.resp-tabs-list li.resp-tab-item:hover {
	background-color: {$colors['text_link']};
	color: {$colors['bg_color']};
}
.wp-travel-booking__panel-bottom .left-info p,
.wp-travel-booking__panel-bottom .right-info p,
.wp-travel-calendar-view .wp-travel-booking__pricing-wrapper .wp-travel-booking__trip-option-list li .item-price {
	color: {$colors['text']}; !important;
}
.single-itineraries .wp-travel-tab-wrapper .tab-list.resp-tabs-list li.resp-tab-active {
	border-bottom-color: {$colors['extra_bg_hover']};
}
.single-itineraries .wp-travel-tab-wrapper .tab-list.resp-tabs-list {
	background-color: {$colors['bg_color']};
}
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container h1,
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container h2,
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container h3,
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container h4 {
	color: {$colors['bg_color']};
}
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container .timeline-contents .tc-content h3,
.single-itineraries .wp-travel-tab-wrapper .resp-tabs-container .timeline-contents .tc-heading h4 {
	color: {$colors['text_hover']};
}
.single-itineraries .itenary .image {
	background-color: {$colors['extra_bg_color']};
	border-color: {$colors['extra_bg_color']};
}
.single-itineraries .itenary .tc-content {
	border-color: {$colors['extra_bg_color']};
}
.single-itineraries .availabily-wrapper .availabily-heading {
	color: {$colors['bg_color']};
}

.single-itineraries ul.availabily-list .availabily-content .btn:hover {
	color: {$colors['text_hover']};
	border-color: {$colors['text_link']};
}
.single-itineraries .wp-travel-tab-wrapper #gallery a[rel='magnific']:after:hover {
	background-color: {$colors['text_hover']};
}
.single-itineraries .wp-tab-review-inner-wrapper .commentlist li {
	background-color: {$colors['bg_color']};
	color: {$colors['text']};
}
.paxpicker .category {
	color: {$colors['text']};
}
.pax-select-container .pax-picker-minus, .pax-select-container .pax-picker-plus {
	color: {$colors['text_link']};
}
.pax-select-container .pax-picker-minus:hover, .pax-select-container .pax-picker-plus:hover {
	color: {$colors['text_hover']};
}
#faq .panel-default, .global-faq-shortcode .panel-default {
	background-color: {$colors['extra_bg_color']};
}
.wp-travel-related-posts .wp-travel-post-item-wrapper .wp-travel-post-wrap-bg,
.wp-travel-related-posts .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail a,
.wp-travel-related-posts .wp-travel-itinerary-items ul.wp-travel-itinerary-list li {
	background-color: {$colors['alter_bg_color']};
}
.post-type-archive .wp-travel-default-article, .post-type-archive.wp-travel-grid-mode .wp-travel-itinerary-items ul.wp-travel-itinerary-list li {
	border-color: {$colors['alter_bg_color']};
}
.post-type-archive .wp-travel-default-article .wp-travel-article-image-wrap .wp-travel-offer span,
.post-type-archive.wp-travel-grid-mode .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-offer span,
.wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-content + .wp-travel-offer span, .wp-travel.trip-headline-wrapper .wp-travel-offer span {
	background-color: {$colors['text_link']};
}
.post-type-archive  .wp-travel-default-article .wp-travel-entry-content-wrapper .description-right {
	border-color: {$colors['inverse_bd_color']};
}
.post-type-archive.wp-travel-grid-mode .wp-travel-itinerary-items .wptravel-price-wrap .trip-price .person-count {
	color: {$colors['text']};
}
/* Cart */
.ws-theme-cart-page .ws-theme-cart-list thead tr th {
	color: {$colors['bg_color']};
}
.ws-theme-cart-page .ws-theme-cart-list .product-remove a {
	color: {$colors['bg_color']};
	background-color: {$colors['extra_bg_color']};
}
.ws-theme-cart-page .ws-theme-cart-list .product-remove a:hover {
	color: {$colors['text_dark']};
	background-color: {$colors['text_link']};	
}
.ws-theme-cart-page .ws-theme-cart-list tr .item_cart strong {
		color: {$colors['text']};
}
.ws-theme-cart-page .product-price .wp-travel-trip-price, .ws-theme-cart-page .ws-theme-cart-list tr .product-subtotal .item_cart span {
	color: {$colors['extra_bg_color']};
}
.ws-theme-cart-page input[type="number"].wp-travel-pax {
	background-color: {$colors['bg_color']};	
}
.ws-theme-cart-list.table-total-info th strong, .ws-theme-cart-list.table-total-info th .total strong {
	color: {$colors['bg_color']};
}
.ws-theme-cart-page .coupon input[type="text"] {
	background-color: {$colors['bg_color']};
}
.ws-theme-cart-page .update-cart {
	color: {$colors['bg_color']};
	background-color: {$colors['text_link']};
}
.ws-theme-cart-page .st_adults span {
	color: {$colors['inverse_hover']};
	background-color: {$colors['extra_bg_color']};
}
.ws-theme-cart-page .st_adults span:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
/* Cart message */

.wp-travel-message {
	border-top-color:{$colors['text_dark']};
	background-color:{$colors['alter_bg_color']};
}
.wp-travel-message::before {
	color: {$colors['text_dark']};
}
/* Checkout */
.checkout-page-wrap .checkout-block h3, .checkout-page-wrap .number-accordion h4,
.wp-travel-checkout-review-order-table tr.cart_item td.product-name {
	color: {$colors['extra_link']};
}
.wp-travel-checkout-review-order-table tr.cart_item td.product-name .product-quantity {
	color: {$colors['text']};
}
.wp-travel-checkout-review-order-table tr.cart_item td.product-total {
	color: {$colors['text_hover']};
}
.wp-travel-checkout-review-order-table tr.order-total  td.text-right {
	color: {$colors['extra_dark']};
	background-color: {$colors['extra_bg_color']};
}
/* Dashboard */
.dashboard-tab ul.resp-tabs-list {
	background-color: {$colors['bg_color']};
}
.dashboard-tab ul.resp-tabs-list li {
	background-color: {$colors['text_link']};
}
.dashboard-tab ul.resp-tabs-list li.resp-tab-active {
	background-color: {$colors['alter_bg_color']};
	color: {$colors['text_dark']};
}
.dashboard-tab ul.resp-tabs-list li.resp-tab-active.resp-tab-active {
	color: {$colors['text_dark']};
}
.dashboard-tab ul.resp-tabs-list li.resp-tab-item {
	color: {$colors['bg_color']};
}
.dashboard-tab .resp-tabs-container {
	background-color: {$colors['alter_bg_color']};
}
.dashboard-tab .list-item .item {
	background-color: {$colors['bg_color']};
}
.dashboard-tab .resp-tabs-container .payment-content input[type="text"], .dashboard-tab .resp-tabs-container .payment-content .select_container select,
.dashboard-tab .resp-tabs-container .payment-content .select_container:before, .dashboard-tab .resp-tabs-container .edit-account input[type="text"],
.dashboard-tab .resp-tabs-container .edit-account input[type="email"], .dashboard-tab .resp-tabs-container .edit-account input[type="password"] {
	background-color: {$colors['bg_color']} !important;
}
.dashboard-tab .resp-tabs-container .edit-account input[type="checkbox"] + label:before {
	border:none;
}
/* Sidebar */
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget .wp-travel-itinerary-items ul.wp-travel-itinerary-list li,
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail a, .blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-thumbnail {
	background-color: {$colors['alter_bg_color']};
}
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget {
	background-color: {$colors['alter_bg_color']};
}
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget.widget_search {
	background-color: {$colors['text_link']};
}
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget.widget_search .widget_title {
	color: {$colors['bg_color']};
}
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget.widget_search input[type="submit"] {
	background-color: {$colors['text_hover']};
	color: {$colors['bg_color']};
}
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget.widget_search input[type="submit"]:after {
	color: {$colors['bg_color']};
}
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget .select_container select {
	border-color: {$colors['bg_color']} !important;
}
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget .wp-travel-itinerary-items .wp-travel-post-wrap-bg,
.blog_mode_itineraries .wp-travel-trips-has-sidebar + .wp-travel-widget-area .widget .wp-travel-itinerary-items .wp-travel-post-item-wrapper .wp-travel-post-content {
	background-color: {$colors['alter_bg_color']};
}
.wp-travel-enquiries {
	border-color: {$colors['bd_color']};
}
.wp-travel-widget-area .wp-travel-enquiries-form-wrapper .wp-travel-enquiries-form {
	background: {$colors['alter_bg_color']} !important;
}
/* Widget */
.widget_wp_travel_filter_search_widget .trip-duration-calender .calender-icon {
	background: {$colors['alter_bg_color']};

}
/* Login and rerister form */
.wp-travel-dashboard-form input[type="checkbox"] + label:before {
	border-color: #000;
}
/* Navigation */
.wp-travel-navigation.wp-paging-navigation .wp-page-numbers li a {
	color: {$colors['text_dark']};
}
.wp-travel-navigation.wp-paging-navigation .wp-page-numbers li a:not(.prev):not(.next):after {
	color: {$colors['text_dark']};
}
.wp-travel-navigation.wp-paging-navigation .wp-page-numbers li a:hover, .wp-travel-navigation.wp-paging-navigation .wp-page-numbers li a.current {
	color: {$colors['text_link']};
}
/* Slider widget */
rs-module .widget_wp_travel_filter_search_widget input[type="submit"]:hover {
	background: {$colors['text_hover']};
	color: {$colors['bg_color']};
}
.post-type-archive .wp-travel-default-article .wp-travel-entry-content-wrapper .description-right {
	border-color: {$colors['bd_color']};
}
CSS;
		}

		return $css;
	}
}

