<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'birdily_tribe_events_get_css' ) ) {
	add_filter( 'birdily_filter_get_css', 'birdily_tribe_events_get_css', 10, 2 );
	function birdily_tribe_events_get_css( $css, $args ) {
		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
time.tribe-events-c-top-bar__datepicker-time span,
.tribe-events-list .tribe-events-list-event-title,
.tribe-common--breakpoint-medium.tribe-common .tribe-common-h4--min-medium,
.tribe-common--breakpoint-medium.tribe-common .tribe-events-calendar-month__header-column-title,
.tribe-common--breakpoint-medium.tribe-common .tribe-events-calendar-month__header-column-title span{
	{$fonts['h3_font-family']}
}
.tribe-common .tribe-common-h7, .tribe-common .tribe-common-h8,
.tribe-common .tribe-common-b3,
.tribe-events .tribe-events-calendar-month__calendar-event-tooltip-datetime,
.tribe-common--breakpoint-medium.tribe-events .tribe-events-calendar-day__event-description,
.tribe-common--breakpoint-medium.tribe-events .tribe-events-calendar-list__event-description{
	{$fonts['p_font-family']}
}

.tribe-events .tribe-events-calendar-list__event-date-tag-weekday,
time.tribe-events-c-top-bar__datepicker-time{
	{$fonts['h4_font-family']}
}
#tribe-events .tribe-events-button,
.tribe-events-button,
.tribe-events-cal-links a,
.tribe-events-sub-nav li a {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
#tribe-bar-form button, #tribe-bar-form a,
.tribe-events-read-more {
	{$fonts['button_font-family']}
	{$fonts['button_letter-spacing']}
}
.tribe-events-calendar td div[id*="tribe-events-daynum-"], .single-tribe_events .tribe-events-meta-group .tribe-events-single-section-title {
	{$fonts['button_font-family']}
}
.tribe-events-list .tribe-events-list-separator-month,
.tribe-events-calendar thead th,
.tribe-events-schedule, .tribe-events-schedule h2, #tribe-bar-form label {
	{$fonts['h5_font-family']}
}
#tribe-bar-form input, #tribe-events-content.tribe-events-month,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title,
#tribe-mobile-container .type-tribe_events, .tribe-events-content,
.single-tribe_events #tribe-events-content .tribe-events-event-meta dd abbr,
.single-tribe_events #tribe-events-content .tribe-events-event-meta dd a,
.single-tribe_events #tribe-events-content .tribe-events-event-meta dd,
.tribe-events-list-widget ol li .tribe-event-title, #tribe-bar-form .tribe-bar-views-toggle {
	{$fonts['p_font-family']}
}
.single-tribe_events #tribe-events .tribe_events .tribe-events-cal-links a.tribe-events-gcal.tribe-events-button, 
.single-tribe_events #tribe-events .tribe_events .tribe-events-cal-links a.tribe-events-ical.tribe-events-button, 
a.tribe-events-c-nav__prev.tribe-common-b2.tribe-common-b1--min-medium, 
a.tribe-events-c-nav__next.tribe-common-b2.tribe-common-b1--min-medium, 
a.tribe-events-c-nav__today.tribe-common-b2, 
.tribe-events .tribe-events-c-ical__link, 
button.tribe-events-c-nav__next:disabled, 
button.tribe-events-c-nav__prev:disabled, 
button.tribe-events-c-nav__next, 
button.tribe-events-c-nav__prev,
.tribe-common span,
.tribe-events-loop .tribe-event-schedule-details,
.single-tribe_events #tribe-events-content .tribe-events-event-meta dt,
#tribe-mobile-container .type-tribe_events .tribe-event-date-start,
.tribe-common.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button {
	{$fonts['info_font-family']};
}
.tribe-events .datepicker .dow,
.tribe-events .datepicker .day, 
.tribe-events .datepicker .month, 
.tribe-events .datepicker .year,
.tribe-events .tribe-events-c-ical__link,
.tribe-events .tribe-events-calendar-list__month-separator-text,
.tribe-events .tribe-events-calendar-month__multiday-event-bar-title{
	{$fonts['info_font-family']};
}
.tribe-events .datepicker .datepicker-switch,
.tribe-common .tribe-events-calendar-month__header-column-title-mobile{
	{$fonts['h3_font-family']}
}

CSS;
		}

		if ( isset( $css['vars'] ) && isset( $args['vars'] ) ) {
			$vars         = $args['vars'];
			$css['vars'] .= <<<CSS

#tribe-bar-form .tribe-bar-submit input[type="submit"],
#tribe-bar-form button,
#tribe-bar-form a,
#tribe-events .tribe-events-button,
#tribe-bar-views .tribe-bar-views-list,
.tribe-events-button,
.tribe-events-cal-links a,
#tribe-events-footer ~ a.tribe-events-ical.tribe-events-button,
.tribe-events-sub-nav li a {
	-webkit-border-radius: {$vars['rad']};
	    -ms-border-radius: {$vars['rad']};
			border-radius: {$vars['rad']};
}

CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Filters bar */
#tribe-bar-form {
	color: {$colors['text_dark']};
}
#tribe-bar-form input[type="text"] {
	color: {$colors['input_text']};
	border-color: {$colors['input_bg_color']} !important;
	background-color: {$colors['input_bg_color']};
}
#tribe-bar-form input[type="text"]:hover {
	border-color: {$colors['input_bd_hover']} !important;
}
#tribe-bar-form input[type="text"]:focus {
	border-color: {$colors['text_link']} !important;
}
.tribe-bar-views-list {
	background-color: {$colors['text_link']};
}
#tribe-bar-form .tribe-bar-views .tribe-bar-views-toggle  {
	background-color: {$colors['alter_bg_color']};
}
.datepicker thead tr:first-child th:hover, .datepicker tfoot tr th:hover {
	color: {$colors['text_link']};
	background: {$colors['text_dark']};
}
#tribe-bar-form .tribe-bar-views-toggle, #tribe-bar-form .tribe-bar-views-toggle:after,
#tribe-bar-views .tribe-bar-views-option {
	color: {$colors['input_text']};
}
.tribe-events button.tribe-common-c-btn.tribe-events-c-search__button,
.tribe-events .tribe-events-c-ical__link,
.tribe-common.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button{
	color: {$colors['inverse_link']};
	background: linear-gradient(to right,	{$colors['text_hover']} 50%, {$colors['text_link']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['text_link']} !important; 
}
.tribe-events button.tribe-common-c-btn.tribe-events-c-search__button:hover,
.tribe-events .tribe-events-c-ical__link:hover,
.tribe-common.tribe-events .tribe-events-c-subscribe-dropdown .tribe-events-c-subscribe-dropdown__button:hover{
	background-position: left bottom !important; 
	color: {$colors['bg_color']} !important; 
}
.tribe-events .tribe-events-calendar-month__day-date-link{
	color: {$colors['text_dark']};
}
.tribe-events .datepicker .day:hover, 
.tribe-events .datepicker .day:focus, 
.tribe-events .datepicker .day.focused, 
.tribe-events .datepicker .month:hover, 
.tribe-events .datepicker .month:focus, 
.tribe-events .datepicker .month.focused, 
.tribe-events .datepicker .year:hover, 
.tribe-events .datepicker .year:focus, 
.tribe-events .datepicker .year.focused,
.tribe-events .datepicker .day.active:hover, 
.tribe-events .datepicker .day.active:focus, 
.tribe-events .datepicker .day.active.focused, 
.tribe-events .datepicker .month.active:hover, 
.tribe-events .datepicker .month.active:focus, 
.tribe-events .datepicker .month.active.focused, 
.tribe-events .datepicker .year.active:hover, 
.tribe-events .datepicker .year.active:focus, 
.tribe-events .datepicker .year.active.focused{
	background-color: {$colors['text_link']};
}
.tribe-events .datepicker.dropdown-menu th{
	background-color: {$colors['text_dark']};
	color: {$colors['inverse_link']};
}
.scheme_self .tribe-events .datepicker.dropdown-menu th{
	background-color: {$colors['inverse_hover']};
}
.tribe-events .datepicker .day.active, 
.tribe-events .datepicker .month.active, 
.tribe-events .datepicker .year.active,
.tribe-events .datepicker.dropdown-menu th:hover{
	background-color: {$colors['text_link']};
}
.tribe-events .tribe-events-c-view-selector__button:before{
	background-color: {$colors['text_dark']};
}

/* Enable updated designs */
.tribe-common--breakpoint-medium.tribe-events .tribe-events-c-view-selector--tabs .tribe-events-c-view-selector__list-item--active .tribe-events-c-view-selector__list-item-link:after{
	background-color: {$colors['text_link']};
}

.tribe-events .datepicker .dow, 
.tribe-events .datepicker .day, 
.tribe-events .datepicker .month, 
.tribe-events .datepicker .year,  
.tribe-events .tribe-events-calendar-list__month-separator-text, 
.tribe-events .tribe-events-calendar-month__multiday-event-bar-title{
	color: {$colors['text_dark']};
}

time.tribe-events-c-top-bar__datepicker-time,
time.tribe-events-c-top-bar__datepicker-time span,
a.tribe-events-calendar-list__event-title-link.tribe-common-anchor-thin,
a.tribe-events-calendar-day__event-title-link.tribe-common-anchor-thin,
.tribe-common--breakpoint-medium.tribe-events .tribe-events-calendar-list__event-venue,
.tribe-common--breakpoint-medium.tribe-events .tribe-events-calendar-day__event-venue{
	color: {$colors['text_dark']};
}
.tribe-common--breakpoint-medium.tribe-events .tribe-events-calendar-day__event-description p,
.tribe-common--breakpoint-medium.tribe-events .tribe-events-calendar-list__event-description p{
	color: {$colors['text']};
}
time.tribe-events-calendar-day__event-datetime,
time.tribe-events-calendar-list__event-datetime{
	color: {$colors['text_light']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-common .tribe-events-c-view-selector__list-item a:hover span, 
.tribe-common .tribe-events-c-view-selector__list-item--active a span{
	color: {$colors['text_link']};
}
.tribe-common .tribe-events-c-top-bar__nav-list .tribe-common-c-btn-icon:before, 
.tribe-common .tribe-events-c-top-bar__nav-list .tribe-common-c-btn-icon:after{
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.tribe-common .tribe-events-c-top-bar__nav-list .tribe-common-c-btn-icon:not([disabled]):hover:before, 
.tribe-common .tribe-events-c-top-bar__nav-list .tribe-common-c-btn-icon:not([disabled]):hover:after{
	background-color: {$colors['inverse_hover']};
}
.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date, 
.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date-link,
.tribe-common .tribe-events-calendar-list__event-date-tag-daynum{
	color: {$colors['text_link']};
}
.single-tribe_events #tribe-events .tribe_events .tribe-events-cal-links a.tribe-events-gcal.tribe-events-button,
.single-tribe_events #tribe-events .tribe_events .tribe-events-cal-links a.tribe-events-ical.tribe-events-button,
.tribe-events a.tribe-events-c-nav__today.tribe-common-b2,
.tribe-events .tribe-events-c-nav__prev:not([disabled]),  
.tribe-events .tribe-events-c-nav__next:not([disabled]){
	color: {$colors['text_dark']}!important;
	background: linear-gradient(to right, {$colors['text_link']} 50%, {$colors['alter_bg_color']} 50%) no-repeat scroll right bottom / 210% 100% {$colors['alter_bg_color']} !important;
}
.single-tribe_events #tribe-events .tribe_events .tribe-events-cal-links a.tribe-events-gcal.tribe-events-button:hover,
.single-tribe_events #tribe-events .tribe_events .tribe-events-cal-links a.tribe-events-ical.tribe-events-button:hover,
.tribe-events a.tribe-events-c-nav__today.tribe-common-b2:hover,
.tribe-events .tribe-events-c-nav__prev:not([disabled]):hover, 
.tribe-events .tribe-events-c-nav__prev:not([disabled]):focus, 
.tribe-events .tribe-events-c-nav__next:not([disabled]):hover, 
.tribe-events .tribe-events-c-nav__next:not([disabled]):focus{
	background-position: left bottom !important;
}
.tribe-common .tribe-common-c-loader__dot{
	background-color: {$colors['text_link']}!important;
}
.tribe-events .tribe-events-calendar-month__day-cell.tribe-events-calendar-month__day-cell--selected,
.tribe-events .tribe-events-calendar-month__multiday-event-bar-inner{
	background-color: {$colors['text_link']};
}
.tribe-events .tribe-events-calendar-month__day-cell .tribe-events-calendar-month__day-date .tribe-events-calendar-month__day-date-daynum{
    color: {$colors['text']};
}
.tribe-events .tribe-events-calendar-month__day-cell{
    background-color: {$colors['alter_bg_color']};
}
.tribe-events .tribe-events-calendar-month__day-cell.tribe-events-calendar-month__day-cell--selected .tribe-events-calendar-month__day-date .tribe-events-calendar-month__day-date-daynum{
    color: {$colors['inverse_link']};
}
.tribe-events .tribe-events-calendar-month__multiday-event-bar-title{
	color: {$colors['inverse_link']};
}
.tribe-events-c-nav__list button[class^='tribe-events-c-nav__']:not([disabled]):hover,
.tribe-events-c-nav__list button[class^='tribe-events-c-nav__']:not([disabled]):focus{
	color: {$colors['text_link_blend']}!important;
}
time.tribe-events-calendar-month__day-date-daynum{
	color: {$colors['inverse_link']};
}
.tribe-events .tribe-events-calendar-month__mobile-events-icon--event{
	background-color: {$colors['text_dark']};
}
.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__mobile-events-icon--event{
	background-color: {$colors['alter_bg_color']};
}
button.tribe-events-c-nav__prev.tribe-common-b2.tribe-common-b1--min-medium:disabled,
button.tribe-events-c-nav__next.tribe-common-b2.tribe-common-b1--min-medium:disabled{
	color: {$colors['text_light']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-events .tribe-events-calendar-day__type-separator-text,
.tribe-events .tribe-events-c-day-marker__date,
.tribe-events .tribe-events-calendar-list__event-venue,
.tribe-events .tribe-events-calendar-day__event-venue,
.tribe-common a:hover, 
.tribe-common a:focus, 
.tribe-common a:active, 
.tribe-common a:visited{
	color: {$colors['text_dark']};
}
.scheme_self input#tribe-events-events-bar-keyword::placeholder,
.scheme_self a.tribe-common-c-btn-border.tribe-events-c-top-bar__today-button.tribe-common-a11y-hidden{
	color: {$colors['inverse_hover']};
}
/* Content */
table.tribe-events-calendar > tbody > tr > td {
	background-color: {$colors['alter_bg_color']};
}

.tribe-events-calendar thead th {
	color: {$colors['text_dark']};
	background: {$colors['bg_color']} !important;
}
.tribe-events-calendar thead th + th:before {
	background: transparent;
}
#tribe-events-content .tribe-events-calendar tbody tr {
	border-color: {$colors['bg_color']} !important;
}
#tribe-events-content .tribe-events-calendar tbody tr td {
	border-color: {$colors['bg_color']} !important;
}
#tribe-events-content .tribe-events-calendar td,
#tribe-events-content .tribe-events-calendar th {
	border-color: {$colors['bd_color']} !important;
}
.tribe-events-calendar td div[id*="tribe-events-daynum-"],
.tribe-events-calendar td div[id*="tribe-events-daynum-"] > a {
	color: {$colors['text_dark']};
}
.tribe-events-calendar td.tribe-events-othermonth {
	color: {$colors['alter_light']};
	background: {$colors['alter_bg_color']} !important;
}
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-othermonth div[id*="tribe-events-daynum-"] > a {
	color: {$colors['alter_light']};
}
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"], .tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"] > a {
	color: {$colors['extra_link']};
}
.tribe-events-calendar td.tribe-events-has-events div[id*="tribe-events-daynum-"] {
	color: {$colors['text_link']};
}
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"],
.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] > a {
	color: {$colors['extra_dark']};
}
.tribe-events-calendar td.tribe-events-present:before {
	border-color: {$colors['text_link']};
}
.tribe-events-calendar td.tribe-events-present {
	background: {$colors['text_link']};
}
.tribe-events-calendar td.tribe-events-present:hover div[id*="tribe-events-daynum-"]>a {
	color: {$colors['text_dark']};
}
.tribe-events-calendar .tribe-events-has-events:after {
	background-color: {$colors['text']};
}
.tribe-events-calendar .mobile-active.tribe-events-has-events:after {
	background-color: {$colors['bg_color']};
}
#tribe-events-content .tribe-events-calendar td,
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a {
	color: {$colors['text_dark']};
}
#tribe-events-content .tribe-events-calendar td:hover {
	background-color: {$colors['text_link']};
}
.tribe-events-calendar td.tribe-events-past div[id*="tribe-events-daynum-"]>a,
.tribe-events-calendar td div[id*="tribe-events-daynum-"]>a {
	color: {$colors['text_link']};
}
#tribe-events-content .tribe-events-calendar tbody tr td:hover div[id*="tribe-events-daynum-"]>a {
	color: {$colors['text_dark']};
}
#tribe-events-content .tribe-events-calendar div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a:hover {
	color: {$colors['text_dark']};
}
#tribe-events-content .tribe-events-calendar .tribe-events-present div[id*="tribe-events-event-"] h3.tribe-events-month-event-title a {
	color: {$colors['bg_color']};
}
#tribe-events-content .tribe-events-calendar td.mobile-active,
#tribe-events-content .tribe-events-calendar td.mobile-active:hover,
#tribe-events-content .tribe-events-calendar td.mobile-active div[id*="tribe-events-daynum-"]>a {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']} !important;
}
#tribe-events-content .tribe-events-calendar td.mobile-active div[id*="tribe-events-daynum-"] {
	color: {$colors['bg_color']};
	background-color: {$colors['text_link']};
}
#tribe-events-content .tribe-events-calendar td.tribe-events-othermonth.mobile-active div[id*="tribe-events-daynum-"] a,
.tribe-events-calendar .mobile-active div[id*="tribe-events-daynum-"] a {
	background-color: transparent;
	color: {$colors['bg_color']};
}
.events-archive.events-gridview #tribe-events-content table .type-tribe_events {
	border-color: {$colors['bd_color']};
}

/* Tooltip */
.recurring-info-tooltip,
.tribe-events-calendar .tribe-events-tooltip,
.tribe-events-week .tribe-events-tooltip,
.tribe-events-tooltip .tribe-events-arrow {
	color: {$colors['alter_text']};
	background: {$colors['alter_bg_color']};
}
#tribe-events-content .tribe-events-tooltip .summary { 
	color: {$colors['extra_dark']};
	background: {$colors['extra_bg_color']};
}
.tribe-events-tooltip .tribe-event-duration {
	color: {$colors['extra_text']};
}

/* Events list */
.tribe-events-list-separator-month {
	color: {$colors['text_dark']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-events-list-separator-month:after {
	border-color: {$colors['bd_color']};
}
.tribe-events-list .type-tribe_events + .type-tribe_events,
.tribe-events-day .tribe-events-day-time-slot + .tribe-events-day-time-slot + .tribe-events-day-time-slot {
	border-color: {$colors['bd_color']};
}
.tribe-events-list .tribe-events-event-cost span {
	color: {$colors['extra_dark']};
	border-color: {$colors['extra_bg_color']};
	background: {$colors['extra_bg_color']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta {
	color: {$colors['alter_text']};
	border-color: {$colors['alter_bd_color']};
	background-color: {$colors['alter_bg_color']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a {
	color: {$colors['alter_link']};
}
.tribe-mobile .tribe-events-loop .tribe-events-event-meta a:hover {
	color: {$colors['alter_hover']};
}
.tribe-mobile .tribe-events-list .tribe-events-venue-details {
	border-color: {$colors['alter_bd_color']};
}

.single-tribe_events #tribe-events-footer,
.tribe-events-day #tribe-events-footer,
.events-list #tribe-events-footer,
.tribe-events-map #tribe-events-footer,
.tribe-events-photo #tribe-events-footer {
	border-color: {$colors['bd_color']};	
}
/* Events day */
.tribe-events-day .tribe-events-day-time-slot h5 {
	color: {$colors['bg_color']};
	background: {$colors['text_dark']};
}

/* Single Event */
.single-tribe_events .tribe-events-schedule .tribe-events-cost {
	color: {$colors['text_dark']};
}
.single-tribe_events .type-tribe_events {
	border-color: {$colors['bd_color']};
}
.single-tribe_events .tribe_events .tribe-events-cal-links a.tribe-events-gcal.tribe-events-button,
.single-tribe_events .tribe_events .tribe-events-cal-links a.tribe-events-ical.tribe-events-button{
	color: {$colors['text_link']} !important;
}
.single-tribe_events .tribe_events .tribe-events-cal-links a.tribe-events-gcal.tribe-events-button:hover,
.single-tribe_events .tribe_events .tribe-events-cal-links a.tribe-events-ical.tribe-events-button:hover{
	color: {$colors['text_hover']} !important;
}
.tribe-events-content,
.tribe-common .tribe-common-b3,
.tooltipster-base.tribe-events-tooltip-theme .tooltipster-box .tooltipster-content {
	color: {$colors['text']};
}
.single-tribe_events .tribe-events-single .tribe-events-event-meta,
.tribe-events-meta-group .tribe-events-single-section-title,
.tribe-common .tribe-common-h7, .tribe-common .tribe-common-h8,
.tribe-events .tribe-events-calendar-month__calendar-event-tooltip-datetime {
	color: {$colors['text_dark']};
}

CSS;
		}

		return $css;
	}
}

