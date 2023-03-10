<?php
/**
 * 404 Errors
 *
 * @package WordPress
 * @subpackage theme
 * @category Timber
 * @category template
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

// Setup Timber
$ary_context = Timber::context();

// Set page title
$ary_context['page']['title'] = 'Page could not be found';

// Render view
Timber::render( array( 'site-404.twig', '404.twig' ), $ary_context );
