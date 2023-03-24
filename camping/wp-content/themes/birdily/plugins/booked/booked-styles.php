<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'birdily_booked_get_css' ) ) {
	add_filter( 'birdily_filter_get_css', 'birdily_booked_get_css', 10, 2 );
	function birdily_booked_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button,
body #booked-profile-page input[type="submit"],
body #booked-profile-page button,
body .booked-list-view input[type="submit"],
body .booked-list-view button,
body table.booked-calendar input[type="submit"],
body table.booked-calendar button,
body .booked-modal input[type="submit"],
body .booked-modal button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row .bc-col .monthName,
table.booked-calendar thead tr th {
	{$fonts['h1_font-family']}
}
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row.days .bc-col,
body table.booked-calendar tr.days th, .booked-calendar-wrap .booked-appt-list h2 {
	{$fonts['h5_font-family']}
}


CSS;
		}

		if ( isset( $css['colors'] ) && isset( $args['colors'] ) ) {
			$colors         = $args['colors'];
			$css['colors'] .= <<<CSS

/* Form fields */
#booked-page-form {
	color: {$colors['text']};
	border-color: {$colors['bd_color']};
}

#booked-profile-page .booked-profile-header {
	background-color: {$colors['bg_color']} !important;
	border-color: transparent !important;
	color: {$colors['text']};
}
#booked-profile-page .booked-user h3 {
	color: {$colors['text_dark']};
}
#booked-profile-page .booked-profile-header .booked-logout-button:hover {
	color: {$colors['text_link']};
}

#booked-profile-page .booked-tabs {
	border-color: {$colors['alter_bd_color']} !important;
}

.booked-modal .bm-window p.booked-title-bar {
	color: {$colors['bg_color']} !important;
	background-color: {$colors['extra_bg_hover']} !important;
}
.booked-modal .bm-window .close i {
	color: {$colors['bg_color']};
}
.booked-modal .bm-window .booked-scrollable {
	color: {$colors['extra_text']};
	background-color: {$colors['alter_bg_color']} !important;
}
.booked-modal .bm-window #customerChoices {
	background-color: {$colors['extra_bg_hover']};
	border-color: {$colors['extra_bd_hover']};
}
.booked-form .booked-appointments {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_hover']} !important;	
}
.booked-modal .bm-window p.appointment-title {
	color: {$colors['alter_dark']};	
}

/* Profile page and tabs */
.booked-calendarSwitcher.calendar,
.booked-calendarSwitcher.calendar select,
#booked-profile-page .booked-tabs {
	background-color: {$colors['alter_bg_color']} !important;
}
#booked-profile-page .booked-tabs li a {
	background-color: {$colors['extra_bg_hover']};
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li a i {
	color: {$colors['extra_dark']};
}
#booked-profile-page .booked-tabs li.active a,
#booked-profile-page .booked-tabs li.active a:hover,
#booked-profile-page .booked-tabs li a:hover {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['extra_bg_color']} !important;
}
#booked-profile-page .booked-tab-content {
	background-color: {$colors['bg_color']};
	border-color: {$colors['alter_bd_color']};
}

/* Calendar */
table.booked-calendar thead tr {
	background-color: {$colors['extra_bg_color']} !important;
}
table.booked-calendar thead tr th {
	color: {$colors['text_dark']} !important;
	border-color: {$colors['bg_color']} !important;
	background-color: {$colors['bg_color']} !important;
}
table.booked-calendar thead th i {
	color: {$colors['extra_dark']} !important;
}
table.booked-calendar thead th .monthName a {
	color: {$colors['text_dark']};
}
table.booked-calendar thead th .monthName a:hover {
	color: {$colors['extra_hover']};
}
table.booked-calendar tr th,
table.booked-calendar tr td {
	background-color: {$colors['bg_color']} !important;
}
table.booked-calendar tbody tr {
	background-color: {$colors['alter_bg_color']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.entryBlock .bc-col,
table.booked-calendar tbody tr.entryBlock {
	background-color: {$colors['bg_color']} !important;
}
table.booked-calendar tbody tr.entryBlock td {
	background-color: {$colors['bg_color']} !important;
}


body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.entryBlock .bc-col .booked-appt-list,
table.booked-calendar tbody tr.entryBlock td .booked-appt-list {
	background-color: {$colors['alter_bg_color']} !important;
}
table.booked-calendar tbody tr td {
	color: {$colors['alter_text']} !important;
	border-color: {$colors['bg_color']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col .date,
table.booked-calendar tbody tr td span.date {
	color: {$colors['text_dark']} !important;
	background-color: {$colors['bd_color']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.next-month .date span,
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.prev-month .date span {
	color: {$colors['text_light']};
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col:hover .date,
table.booked-calendar tbody tr td span.date:hover {
	color: {$colors['bg_color']} !important;
}
body table.booked-calendar td.prev-month .date span {
	color: {$colors['text_light']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.next-month .date,
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.prev-month .date,
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col:not(.today).prev-date .date,
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col:not(.today).prev-date:hover .date,
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.blur .date,
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.blur:hover .date,
table.booked-calendar tbody tr td.prev-date span.date,
table.booked-calendar tbody tr td:not(.today):last-child span.date,
table.booked-calendar tbody tr td.next-month span.date {
	color: {$colors['text_light']} !important;
	background-color: {$colors['alter_bg_color']} !important;
}

body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.today.today .date span,
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.next-month:hover .date span {
		color: {$colors['extra_dark']} !important;

}
table.booked-calendar tbody tr td:not(.prev-date):hover {
	color: {$colors['alter_dark']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col .date:hover,
body table.booked-calendar td:not(.prev-date):hover span.date {
	background-color: {$colors['text_link']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.prev-date .date span,
body table.booked-calendar td:not(.prev-date):hover .date span {
	background-color: transparent !important;
}
table.booked-calendar tbody tr td.today.prev-date .date {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['text_link']} !important;
}
table.booked-calendar tbody tr td.prev-date:hover .date {
	background-color: {$colors['alter_bg_color']} !important;
}
table.booked-calendar tr td.today .date, body table.booked-calendar td.today.prev-date .date span  {
	color: {$colors['extra_dark']} !important;
}

body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.today .date,
table.booked-calendar tr td.today span.date, table.booked-calendar tr td.today .date span {
	background-color: {$colors['text_link']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.today .date sapn,
table.booked-calendar tbody td.today .date span {
	border-color: {$colors['alter_link']};
	color: {$colors['alter_bd_hover']} !important;
}
table.booked-calendar tbody td.today:hover .date span {
	background-color: {$colors['text_link']} !important;
	color: {$colors['inverse_link']} !important;
}
table.booked-calendar tr.week td.active .date .number {
	background: transparent;
}
body table.booked-calendar thead th .page-right, body table.booked-calendar thead th .page-left,
table.booked-calendar thead th i {
		color: {$colors['text_dark']} !important;
}
body table.booked-calendar th .page-right, body table.booked-calendar th .page-left {
	color: {$colors['text_dark']};
	background-color: {$colors['input_bg_color']};
}
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row .bc-col .page-right:hover,
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row .bc-col .page-left:hover,
body table.booked-calendar th .page-right:hover,
body table.booked-calendar th .page-left:hover {
	-webkit-box-shadow:3px 3px 6px 0px {$colors['text_light']};
	-ms-box-shadow: 3px 3px 6px 0px {$colors['text_light']};
	box-shadow: 3px 3px 6px 0px {$colors['text_light']};	
}
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row .bc-col .page-right:hover i:before,
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row .bc-col .page-left:hover i:before,
body table.booked-calendar th .page-right:hover .booked-icon:before,
body table.booked-calendar th .page-left:hover .booked-icon:before {
	color: {$colors['text_link']};
}
body table.booked-calendar tr.week td.active .date .number {
	color: {$colors['bg_color']};
}

.booked-calendar-wrap .booked-appt-list h2 {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot {
	border-color: {$colors['alter_bd_color']};	
}
.booked-calendar-wrap .booked-appt-list .timeslot:hover {
	background-color: {$colors['alter_bg_hover']};	
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-title {
	color: {$colors['text_link']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-time {
	color: {$colors['text_dark']};
}
.booked-calendar-wrap .booked-appt-list .timeslot .spots-available {
	color: {$colors['text']};
}
body table.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover {
		background-color: {$colors['text_hover']} !important;
		color: {$colors['bg_color']} !important;
}
.booked-modal button.cancel {
	background-color: {$colors['text_hover']} !important;
	color: {$colors['bg_color']} !important;
}
.booked-modal button.cancel:hover {
	background-color: {$colors['text_link']} !important;
	color: {$colors['extra_hover']} !important;
}
body .booked-modal input[type="submit"].button-primary {
	background-color: {$colors['text_link']} !important;
	color: {$colors['extra_hover']};
}
body .booked-modal input[type="submit"].button-primary:hover {
	background-color: {$colors['text_hover']} !important;
	color: {$colors['bg_color']} !important;
}
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button[disabled],
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button[disabled]:hover {
	background-color: {$colors['text_link']} !important;
	color: {$colors['bg_color']} !important;
}
#customerChoices .field .checkbox-radio-block label:hover {
	color: {$colors['bg_color']} !important;
}
.booked-modal .bm-window .close i:hover {
	color: {$colors['text_link']} !important;
}
body .booked-modal .bm-window p i.fa, body .booked-modal .bm-window a,
body .booked-appt-list .booked-public-appointment-title,
body .booked-modal .bm-window p.appointment-title {
	color: {$colors['text_hover']} !important;
}
body .booked-modal .bm-window p i.fa:hover, body .booked-modal .bm-window a:hover,
body .booked-appt-list .booked-public-appointment-title:hover,
body .booked-modal .bm-window p.appointment-title:hover {
	color: {$colors['text_link']} !important;
}


body div.booked-calendar .bc-head,
body div.booked-calendar .bc-row.days .bc-col,
body #booked-profile-page .booked-tabs {
	color: {$colors['text_dark']};
	border-color: {$colors['bg_color']};
	background-color: {$colors['bg_color']};
}
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row.days,
body div.booked-calendar .bc-head .bc-col {
	background-color: {$colors['bg_color']} !important;
}

body div.booked-calendar-wrap div.booked-calendar .bc-head {
	color: {$colors['text_dark']};
}

body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row .bc-col .page-right,
body div.booked-calendar-wrap div.booked-calendar .bc-head .bc-row .bc-col .page-left {
	color: {$colors['text_dark']} !important;
	background-color: {$colors['input_bg_color']};
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col {
	border-color: {$colors['bg_color']};
}

body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.active .date {
	background-color: {$colors['bd_color']} !important;
}
body div.booked-calendar-wrap div.booked-calendar .bc-body .bc-row.week .bc-col.active .date .number {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['text_link']} !important;
}
body .booked-calendar .booked-appt-list .timeslot button .spots-available, body .booked-calendar-wrap .booked-appt-list .timeslot button .spots-available {
	color: {$colors['extra_dark']};
}

body #booked-profile-page input[type=submit].button-primary:hover, 
body div.booked-calendar input[type=submit].button-primary:hover, 
body .booked-list-view button.button:hover, 
body .booked-list-view input[type=submit].button-primary:hover, 
body .booked-modal input[type=submit].button-primary:hover, 
body div.booked-calendar .booked-appt-list .timeslot .timeslot-people button:hover, 
body #booked-profile-page .booked-profile-header, body #booked-profile-page .appt-block .google-cal-button > a:hover {
	color: {$colors['extra_dark']} !important;
	background-color: {$colors['text_hover']} !important;
}

CSS;
		}

		return $css;
	}
}

