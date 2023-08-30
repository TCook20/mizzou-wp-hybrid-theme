<?php
/**
 * ACF Options Pages
 *
 * @package WordPress
 * @subpackage Theme
 * @category functions
 * @author Travis Cook, Digital Service, University of Missouri
 * @copyright 2023 Curators of the University of Missouri
 */

if ( function_exists( 'acf_add_options_page' ) ) :

	acf_add_options_page(
		array(
			'page_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'menu_title' => 'Theme Settings',
			'position'   => '',
			'redirect'   => false,
			'capability' => 'manage_options',
			'autoload'   => true,
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Footer Settings',
			'menu_slug'   => 'acf-options-footer',
			'parent_slug' => 'theme-general-settings',
			'menu_title'  => 'Footer',
			'redirect'    => false,
			'capability'  => 'edit_theme_options',
			'autoload'    => true,
		)
	);

endif;
