<?php
/**
 * Pages and Posts
 *
 * @package WordPress
 * @subpackage theme
 * @category Timber
 * @category template
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

use Mizzou\Calendar as CalendarModel;

// Setup Timber.
$ary_context         = Timber::context();
$ary_context['page'] = new Timber\Post();

// Collect parent links.
$ary_parents = array();
$obj_parent  = $ary_context['page']->parent;
while ( $obj_parent ) {
	if ( $obj_parent ) {
		$ary_parents[] = $obj_parent->link;
		$obj_parent    = $obj_parent->parent;
	}
}
$ary_context['page']->parent_pages = $ary_parents;

// Sub-navigation.
if ( ( isset( $ary_context['page']->sub_navigation ) ) && ( false !== $ary_context['page']->sub_navigation ) ) {
	$ary_context['page']->sub_navigation = new Timber\Menu( $ary_context['page']->sub_navigation );
}

// Page or post.
if ( ( isset( $ary_context['page']->post_type ) ) && ( 'page' === $ary_context['page']->post_type ) ) {
	$str_template_prefix = 'single-page';

	// News.
	$ary_context['news'] = Timber::get_posts(
		array(
			'posts_per_page' => 3,
			'orderby'        => 'date',
		),
	);

	if ( have_rows( 'layout-pre' ) || have_rows( 'layout-post' ) ) {

		// Loop through rows.
		while ( have_rows( 'layout-post' ) ) {
			the_row();

			// Case: Events.
			if ( 'events' === get_row_layout() ) {
				$obj_calendar = new CalendarModel();

				$obj_event_fields = get_sub_field( 'eventsOptions' );

				if ( $obj_event_fields ) {
					$str_event_method = $obj_event_fields['method'];
					$str_event_term   = $obj_event_fields['term'];
				}

				$event_email = get_option( 'admin_email' ) ?? get_field( 'calendar_exception_email', 'option' );

				$ary_calendar_options = array(
					'method'                   => $str_event_method,
					'term'                     => $str_event_term,
					'calendar_exception_email' => get_option( 'admin_email' ),
				);

				if ( isset( $ary_calendar_options['method'] ) && isset( $ary_calendar_options['term'] ) ) {
					$ary_return = $obj_calendar->retrieveCalendarItems( $ary_calendar_options );
					$ary_events = $ary_return['events'];
				}

				$ary_context['events'] = $ary_events;
			}
		}
	}

	if ( is_front_page() ) {

		// Could use is_home(), but wanted to catch the search condition.
		$ary_context['page']->is_homepage = true;

		// Set current page to base URL.
		$ary_context['page']->current_page = $ary_context['site']->baseUrl;

		$str_template_prefix = 'front-page';
	} else {
		// Map existing Timber option for permalink to alias.
		$ary_context['page']->current_page = $ary_context['page']->link;
	}
} else {
	$str_template_prefix = 'single-' . $ary_context['page']->post_type;

	// Map existing Timber option for permalink to alias.
	$ary_context['page']->current_page = $ary_context['page']->link;
}

// Create template hierarchy (will load first template found in the list).
$ary_templates = array();

// Custom template.
if ( isset( $ary_context['page']->slug ) ) {
	$ary_templates[] = $str_template_prefix . '-' . $ary_context['page']->slug . '.twig';
}

// Custom parent template.
if ( isset( $ary_context['page']->parent->slug ) ) {
	$ary_templates[] = $str_template_prefix . '-' . $ary_context['page']->parent->slug . '.twig';
}

// Default.
$ary_templates[] = 'site-' . $str_template_prefix . '.twig';
$ary_templates[] = $str_template_prefix . '.twig';

// Render view.
Timber::render( $ary_templates, $ary_context );
