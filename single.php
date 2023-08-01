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

// Setup Timber.
$ary_context         = Timber::context();
$ary_context['page'] = new Timber\Post();

// Sub-navigation.
if ( ( isset( $ary_context['page']->sub_navigation ) ) && ( false !== $ary_context['page']->sub_navigation ) ) {
	$ary_context['page']->sub_navigation = new Timber\Menu( $ary_context['page']->sub_navigation );
}

$str_template_prefix = 'single-' . $ary_context['page']->post_type;

// Map existing Timber option for permalink to alias.
$ary_context['page']->current_page = $ary_context['page']->link;

// Create template hierarchy (will load first template found in the list).
$ary_templates = array();

// Custom template.
if ( isset( $ary_context['page']->slug ) ) {
	$ary_templates[] = $str_template_prefix . '-' . $ary_context['page']->slug . '.twig';
	$ary_templates[] = $ary_context['page']->post_type . '-' . $ary_context['page']->slug . '.twig';
} elseif ( isset( $ary_context['page']->id ) ) {
	$ary_templates[] = $str_template_prefix . '-' . $ary_context['page']->id . '.twig';
	$ary_templates[] = $ary_context['page']->post_type . '-' . $ary_context['page']->id . '.twig';
}

// Custom parent template.
if ( isset( $ary_context['page']->parent->slug ) ) {
	$ary_templates[] = $str_template_prefix . '-' . $ary_context['page']->parent->slug . '.twig';
	$ary_templates[] = $ary_context['page']->post_type . '-' . $ary_context['page']->parent->slug . '.twig';
}

// Default.
$ary_templates[] = $ary_context['page']->post_type . '.twig';
$ary_templates[] = $str_template_prefix . '.twig';
$ary_templates[] = 'single-page.twig';

// Render view.
Timber::render( $ary_templates, $ary_context );
