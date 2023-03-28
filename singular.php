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
	$ary_context['page']->sub_navigation = MizzouHybridBase::getMenu( $ary_context['page']->sub_navigation );
}

// Page or post.
if ( ( isset( $ary_context['page']->post_type ) ) && ( 'page' === $ary_context['page']->post_type ) ) {
	$str_template_prefix = 'page';

	// News.
	$ary_context['news'] = Timber::get_posts(
		array(
			'posts_per_page' => 3,
			'orderby'        => 'date',
			'tax_query'      => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => 'featured',
					'operator' => 'NOT IN',
				),
			),
		)
	);

	if ( have_rows( 'layout-pre' ) || have_rows( 'layout-post' ) ) {

		// Loop through rows.
		while ( have_rows( 'layout-post' ) ) {
			the_row();

			// Case: Events.
			if ( 'events' === get_row_layout() ) {
				$obj_calendar = new CalendarModel();

				$ary_calendar_options = array(
					'method'                   => get_field( 'method', 'option' ),
					'term'                     => get_field( 'term', 'option' ),
					'calendar_exception_email' => get_field( 'calendar_exception_email', 'option' ),
				);

				if ( isset( $ary_calendar_options['method'] ) && isset( $ary_calendar_options['term'] ) ) {
					$ary_return = $obj_calendar->retrieveCalendarItems( $ary_calendar_options );
					$ary_events = $ary_return['events'];
				}

				$ary_context['events'] = $ary_events;
			}
		}
	}

	/**
	 * Setup custom sort for staff
	 */
	function customStaffSort() {
		$orderby_statement = "menu_order DESC, RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
		return $orderby_statement;
	}

	add_filter( 'posts_orderby', 'customStaffSort' );

	$ary_staff_params = array(
		'post_type'      => 'staff',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'DESC',
			'title'      => 'ASC',
		),
	);

	$ary_context['staffList'] = Timber::get_posts( $ary_staff_params );

	remove_filter( 'posts_orderby', 'customStaffSort' );

	if ( is_front_page() ) {

		// Could use is_home(), but wanted to catch the search condition.
		$ary_context['page']->is_homepage = true;

		// Set current page to base URL.
		$ary_context['page']->current_page = $ary_context['site']->base_url;

		// Feature story.
		$ary_context['feature'] = Timber::get_posts(
			array(
				'posts_per_page' => 3,
				'tax_query'      => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => 'featured',
						'operator' => 'IN',
					),
				),
			)
		);

		$str_template_prefix = 'front-page';
	} else {
		// Map existing Timber option for permalink to alias.
		$ary_context['page']->current_page = $ary_context['page']->link;
	}
} elseif ( ( isset( $ary_context['page']->post_type ) ) && ( 'event' === $ary_context['page']->post_type ) ) {
	$str_template_prefix = 'single-event';

	// Map existing Timber option for permalink to alias.
	$ary_context['page']->current_page = $ary_context['page']->link;
} elseif ( ( isset( $ary_context['page']->post_type ) ) && ( 'staff' === $ary_context['page']->post_type ) ) {
	$str_template_prefix = 'single-staff';

	// Map existing Timber option for permalink to alias.
	$ary_context['page']->current_page = $ary_context['page']->link;
} else {
	$str_template_prefix = 'post';

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

// Custom post type template.
if ( ( isset( $ary_context['page']->post_type ) ) && ( ! in_array( $ary_context['page']->post_type, array( 'post', 'page' ) ) ) ) {
	$ary_templates[] = $str_template_prefix . '-' . $ary_context['page']->post_type . '.twig';
}

// Default.
$ary_templates[] = 'site-' . $str_template_prefix . '.twig';
$ary_templates[] = $str_template_prefix . '.twig';

// Render view.
Timber::render( $ary_templates, $ary_context );
