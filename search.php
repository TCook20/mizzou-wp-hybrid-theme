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

// Render view.
Timber::render( array( 'site-search.twig', 'search.twig' ), $ary_context );
