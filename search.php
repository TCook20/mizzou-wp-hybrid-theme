<?php
/**
 * Search Results
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

// Body class.
$ary_context['page']['body_class'] = 'search-archive';

// Set title.
$ary_context['page']['title'] = 'Search Results';

if ( ( '' === get_option( 'google_cse_id' ) ) || ( null === get_option( 'google_cse_id' ) ) ) {

	// Must have properly set variables.
	if ( ( isset( $ary_context['site']->search_field_name ) ) && ( '' !== trim( $ary_context['site']->search_field_name ) ) && ( isset( $ary_context['site']->hostname ) ) ) {
		$ary_context['search_results'] = mizzouGSAResults( $ary_context['site']->search_field_name, $ary_context['site']->hostname );
	}
}

// Set search form value.
if ( ( isset( $ary_context['site']->search_field_name ) ) && ( isset( $_GET[ $ary_context['site']->search_field_name ] ) ) ) {
	$ary_context['search_form_value'] = $_GET[ $ary_context['site']->search_field_name ];
}

// Render view.
Timber::render( array( 'site-search.twig', 'search.twig' ), $ary_context );
