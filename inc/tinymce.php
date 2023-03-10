<?php
/**
 * TinyMCE
 *
 * @package WordPress
 * @subpackage Theme
 * @category functions
 * @author Travis Cook, Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

// Modify Tiny_MCE init.
add_filter( 'tiny_mce_before_init', 'custom_format_tiny_mce' );

// Remove emoji support.
add_filter( 'tiny_mce_plugins', 'disable_tiny_mce_emoji' );

/**
 * Remove emoji from TinyMCE
 *
 * @param array $ary_plugins Plugins list.
 * @return array Updated plugin list.
 */
function disable_tiny_mce_emoji( $ary_plugins ) {
	return array_diff( $ary_plugins, array( 'wpemoji' ) );
}

/**
 * Modifications to the TinyMCE editor
 *
 * @param ary $ary_tiny_mce A list of all TinyMCE settings.
 */
function custom_format_tiny_mce( $ary_tiny_mce ) {
	// Setup custom classes.
	$ary_custom_formats = array(

		array(
			'title' => 'Buttons',
			'items' => array(
				array(
					'title'    => 'Small Button',
					'selector' => 'a, button',
					'classes'  => 'miz-button miz-button--small',
				),
				array(
					'title'    => 'Large Button',
					'selector' => 'a, button',
					'classes'  => 'miz-button miz-button--lg',
				),
				array(
					'title'    => 'Primary Button',
					'selector' => 'a, button',
					'classes'  => 'miz-button miz-button--primary',
				),
				array(
					'title'    => 'Secondary Button',
					'selector' => 'a, button',
					'classes'  => 'miz-button miz-button--secondary',
				),
				array(
					'title'    => 'Ghost Button',
					'selector' => 'a, button',
					'classes'  => 'miz-button miz-button--ghost',
				),
				array(
					'title'    => 'Gold Ghost Button',
					'selector' => 'a, button',
					'classes'  => 'miz-button miz-button--ghost---gold',
				),
			),
		),

		array(
			'title' => 'Text Styles',
			'items' => array(
				array(
					'title'   => 'All Caps Text (Appearance Only)',
					'inline'  => 'span',
					'classes' => 'miz-text--transform-upper',
				),
				array(
					'title'   => 'Small Caps Text (Appearance Only)',
					'inline'  => 'span',
					'classes' => 'miz-text--small-caps',
				),
				array(
					'title'   => 'No Word Wrap',
					'inline'  => 'span',
					'classes' => 'no-break',
				),
				array(
					'title'    => 'Material Icon',
					'selector' => 'i',
					'classes'  => 'miz-icon material-icons',
				),
			),
		),
	);

	// Prevents formats dropdown from emulating the style each item represents.
	$ary_tiny_mce['preview_styles'] = 'font-family font-size font-weight text-decoration text-transform background-color color';

	// Insert styles, JSON encoded, into 'style_formats'.
	$ary_tiny_mce['style_formats'] = json_encode( $ary_custom_formats );

	// Fix block formats.
	$ary_tiny_mce['block_formats'] = 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6';

	// Customize toolbars.
	$ary_tiny_mce['toolbar1']             = 'formatselect, styleselect, bold, italic, link, unlink, bullist, numlist, alignleft, aligncenter, alignright, alignjustify, blockquote, outdent, indent, hr, table, pastetext, removeformat, charmap, code, undo, redo, spellchecker, wp_fullscreen';
	$ary_tiny_mce['toolbar2']             = '';
	$ary_tiny_mce['wordpress_adv_hidden'] = false;

	return $ary_tiny_mce;
}
