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

	add_filter( 'acf/fields/wysiwyg/toolbars', 'acf_custom_format_tiny_mce' );
}

/**
 * Enable modifications to the TinyMCE editor for ACF wysiwyg editors
 *
 * @param ary $ary_tiny_mce TinyMCE settings.
 */
function acf_custom_format_tiny_mce( $ary_tiny_mce ) {
	// Customize toolbars.
	$ary_tiny_mce['Full'][1] = array( 'formatselect', 'styleselect', 'bold', 'italic', 'link', 'unlink', 'bullist', 'numlist', 'blockquote', 'outdent', 'indent', 'hr', 'table', 'pastetext', 'removeformat', 'charmap', 'code', 'undo', 'redo', 'spellchecker', 'wp_fullscreen' );
	$ary_tiny_mce['Full'][2] = array();

	return $ary_tiny_mce;
}

$ary_acf_options_settings = array(
	'acf-ds-layer-definitions',
	'acf-miz-wp-base-contact-information-footer',
	'acf-miz-wp-base-footer',
	'acf-miz-wp-base-settings',
	'acf-miz-wp-base-social-media-image-site-wide',
);

foreach ( $ary_acf_options_settings as $str_acf_options_setting ) {
	$str_ds            = DIRECTORY_SEPARATOR;
	$str_parent        = get_template_directory( __FILE__ );
	$str_location      = $str_ds . 'inc' . $str_ds . 'acf' . $str_ds . 'group-definitions' . $str_ds;
	$str_settings_file = $str_acf_options_setting . '.php';
	$str_file          = $str_parent . $str_location . $str_settings_file;

	if ( is_file( $str_file ) ) {
		require_once $str_file;
	}
}
