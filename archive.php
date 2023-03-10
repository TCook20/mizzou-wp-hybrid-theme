<?php
/**
 * News Archive
 *
 * @package WordPress
 * @subpackage theme
 * @category Timber
 * @category template
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

// Setup Timber.
$ary_context               = Timber::context();
$ary_context['page']       = new Timber\Term();
$ary_context['archives']   = new Timber\Archives( $args );
$ary_context['categories'] = Timber::get_terms(
	'category',
	array(
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => '1',
	)
);
$ary_context['tags']       = Timber::get_terms(
	'tag',
	array(
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => '1',
	)
);

// Map existing Timber option for permalink to alias.
$ary_context['page']->current_page = $ary_context['page']->link;

// Body class.
$ary_context['page']->body_class = 'archive';

// Set Page Title.
$ary_context['page']->title = 'Archive';

$ary_templates = array();

// Conditionals for archive type.
if ( is_day() ) {
	$ary_context['page']->title = 'Archive: ' . get_the_date( 'D M Y' );
} elseif ( is_month() ) {
	$ary_context['page']->title = 'Archive: ' . get_the_date( 'M Y' );
} elseif ( is_year() ) {
	$ary_context['page']->title = 'Archive: ' . get_the_date( 'Y' );
} elseif ( is_tag() ) {
	$ary_context['page']->title = single_tag_title( '', false );
} elseif ( is_category() ) {
	$ary_context['page']->title = single_cat_title( '', false );
	$ary_templates[]            = 'archive-' . get_query_var( 'cat' ) . '.twig';
} elseif ( is_post_type_archive() ) {
	$ary_context['page']->title = post_type_archive_title( '', false );
	$ary_templates[]            = 'archive-' . get_post_type() . '.twig';
}

$ary_context['news'] = new Timber\PostQuery();

// Pagination.
global $paged;
if ( ! isset( $paged ) || ! $paged ) {
	$paged = 1;
}

$args_pagination = array(
	'mid_size' => 1,
	'end_size' => 1,
);

query_posts( $ary_params );
$ary_context['pagination'] = Timber::get_pagination( $args_pagination );

// Render view.
$ary_templates[] = 'archive.twig';
Timber::render( $ary_templates, $ary_context );
