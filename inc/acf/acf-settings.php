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
	$str_theme             = get_template_directory( __FILE__ );
	$str_import_folder     = 'group-definitions';

	foreach ( array_filter( glob( $str_theme . $str_ds . 'inc' . $str_ds . 'acf' . $str_ds . $str_import_folder . $str_ds . '*.php' ), 'is_file' ) as $file ) {
		// $ary_acf_fields_import[] = $file;
		require_once $file;
	}

	// Add Nav Menu Field.
	$nav_menu_field = $str_theme . $str_ds . 'inc' . $str_ds . 'acf' . $str_ds . 'fields' . $str_ds . 'class-acf-field-nav-menu.php';
	include_once $nav_menu_field;
}
