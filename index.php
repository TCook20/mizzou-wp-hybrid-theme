<?php
/**
 * Homepage
 *
 * @package WordPress
 * @subpackage theme
 * @category Timber
 * @category template
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

// Setup Timber.
$ary_context = Timber::context();

// Could use is_home(), but wanted to catch the search condition.
$ary_context['page']['is_homepage'] = true;

// Set current page to base URL.
$ary_context['page']['current_page'] = $ary_context['site']->base_url;

// Body class.
$ary_context['page']['body_class'] = 'index';

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

// Setup standard news parameters.
$ary_news_params = array(
	'posts_per_page' => -1,
	'orderby'        => 'date',
	'tax_query'      => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => 'featured',
			'operator' => 'NOT IN',
		),
	),
);

// News.
$ary_context['news'] = Timber::get_posts( $ary_news_params );

// Events.
$ary_context['events'] = Timber::get_posts(
	array(
		'posts_per_page' => -1,
		'post_type'      => 'event',
		'meta_key'       => 'end_date',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
		'meta_query'     => array(
			array(
				'key'     => 'end_date',
				'value'   => date( 'Ymd' ),
				'compare' => '>=',
			),
		),
	)
);

// Render view.
Timber::render( array( 'site-index.twig', 'index.twig' ), $ary_context );
