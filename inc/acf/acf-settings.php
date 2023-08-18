<?php
/**
 * ACF Functions & Settings
 *
 * @package WordPress
 * @subpackage Theme
 * @category functions
 * @author Travis Cook, Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

if ( class_exists( 'ACF' ) ) {
	// ACF is installed and active so we need to remove the disabling of default custom fields.
	add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );

	/**
	 * Enable modifications to the TinyMCE editor for ACF wysiwyg editors
	 *
	 * @param ary $ary_tiny_mce TinyMCE settings.
	 */
	add_filter(
		'acf/fields/wysiwyg/toolbars',
		function ( $ary_tiny_mce ) {
			// Customize toolbars.
			$ary_tiny_mce['Full'][1] = array( 'formatselect', 'styleselect', 'bold', 'italic', 'link', 'unlink', 'bullist', 'numlist', 'blockquote', 'outdent', 'indent', 'hr', 'table', 'pastetext', 'removeformat', 'charmap', 'code', 'undo', 'redo', 'spellchecker', 'wp_fullscreen' );
			$ary_tiny_mce['Full'][2] = array();

			return $ary_tiny_mce;
		}
	);

	// Restrict Decoration Location to 2 Options.
	// add_filter(
	// 'acf/validate_value/name=decoration_location',
	// function ( $valid, $value, $field, $input ) {
	// if ( count( $value ) > 1 ) {
	// $valid = 'Only Select 1';
	// }
	// return $valid;
	// },
	// 20,
	// 4
	// );

	$ary_acf_fields_import = array();
	$str_ds                = DIRECTORY_SEPARATOR;
	$str_import_folder     = 'definitions';

	$str_definition_location = $str_ds . 'inc' . $str_ds . 'acf' . $str_ds . $str_import_folder . $str_ds;
	$str_parent              = get_template_directory();
	$str_maybe_child         = get_stylesheet_directory();
	if ( $str_maybe_child !== $str_parent ) {
		$str_child = $str_maybe_child;
	}

	$ary_dirs = array( $str_parent . $str_definition_location );
	if ( isset( $str_child ) && file_exists( $str_child . $str_definition_location ) ) {
		$ary_dirs[] = $str_child . $str_definition_location;
	}

	// load all of the acf field definition files.
	foreach ( $ary_dirs as $str_dir ) {
		foreach ( scandir( $str_dir ) as $str_file ) {
			$str_file = $str_dir . $str_file;
			if ( is_file( $str_file ) ) {
				require_once $str_file;
			}
		}
	}

	// Add Nav Menu Field.
	$nav_menu_field = $str_parent . $str_ds . 'inc' . $str_ds . 'acf' . $str_ds . 'fields' . $str_ds . 'class-acf-field-nav-menu.php';
	include_once $nav_menu_field;
}
