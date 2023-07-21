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

// News.
$ary_context['posts'] = new Timber\PostQuery();

// Render view.
Timber::render( array( 'site-index.twig', 'index.twig' ), $ary_context );
