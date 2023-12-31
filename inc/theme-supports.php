<?php
/**
 * Theme Supports
 *
 * @package WordPress
 * @subpackage Theme
 * @category functions
 * @author Travis Cook, Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

// Switch default core markup to output valid HTML5.
add_theme_support(
	'html5',
	array(
		'gallery',
		'caption',
		'style',
		'script',
	)
);

// Add Responsive Embeds.
add_theme_support( 'responsive-embeds' );

// Add menu support.
add_theme_support( 'menus' );

// Add post thumbnail support and set size.
add_theme_support( 'post-thumbnails' );

// Enqueue editor styles.
add_theme_support( 'editor-styles' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

// Add support for block templates.
add_theme_support( 'block-templates' );

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );

// Add support for block styles.
add_theme_support( 'wp-block-styles' );

// Starter Content.
add_theme_support(
	'starter-content',
	array(
		'posts'     => array(
			'home'     => array(
				'post_type'    => 'page',
				'post_name'    => 'home',
				'post_title'   => 'Home',
				'menu_order'   => -1,
				'post_content' => '',
			),
			'calendar' => array(
				'post_type'    => 'page',
				'post_title'   => 'Calendar',
				'menu_order'   => 0,
				'post_content' => '<!-- wp:mizzou/events-collection {"count":10,"term":"research"} /-->',
			),
			'news'     => array(
				'post_type'    => 'page',
				'post_name'    => 'news',
				'post_title'   => 'News',
				'menu_order'   => 0,
				'post_content' => '',
			),
			'search'   => array(
				'post_type'    => 'page',
				'post_name'    => 'search',
				'post_title'   => 'Search',
				'menu_order'   => 0,
				'post_content' => '<!-- wp:html --><gcse:search gname="sitesearch" queryParameterName="q"></gcse:search><!-- /wp:html -->',
			),
		),
		'nav_menus' => array(
			'primary'  => array(
				'name'  => __( 'Primary', 'miz-hybrid-base' ),
				'items' => array(
					'page_home',
				),
			),
			'tactical' => array(
				'name'  => __( 'Tactical', 'miz-hybrid-base' ),
				'items' => array(),
			),
		),
		'options'   => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
		),
	)
);

add_action( 'after_switch_theme', 'mizStarterPages' );
function mizStarterPages() {
	$starter_pages = array(
		'home'     => array(
			'post_type'    => 'page',
			'post_name'    => 'home',
			'post_title'   => 'Home',
			'menu_order'   => -1,
			'post_content' => '',
		),
		'calendar' => array(
			'post_type'    => 'page',
			'post_title'   => 'Calendar',
			'menu_order'   => 0,
			'post_content' => '<!-- wp:mizzou/events-collection {"count":10,"term":"research"} /-->',
		),
		'news'     => array(
			'post_type'    => 'page',
			'post_name'    => 'news',
			'post_title'   => 'News',
			'menu_order'   => 0,
			'post_content' => '',
		),
		'search'   => array(
			'post_type'    => 'page',
			'post_name'    => 'search',
			'post_title'   => 'Search',
			'menu_order'   => 0,
			'post_content' => '<!-- wp:html --><gcse:search gname="sitesearch" queryParameterName="q"></gcse:search><!-- /wp:html -->',
		),
	);

	foreach ( $starter_pages as $starter_page ) {
		if ( is_null( get_page_by_title( $starter_page['post_title'], OBJECT, $starter_page['post_type'] ) ) ) {
			$ary_page_params = array(
				'post_title'     => $starter_page['post_title'],
				'post_status'    => 'publish',
				'post_type'      => $starter_page['post_type'],
				'menu_order'     => $starter_page['menu_order'],
				'comment_status' => 'closed',
				'ping_status'    => 'closed',
				'post_content'   => $starter_page['post_content'],
			);

			wp_insert_post( $ary_page_params );
		}
	}

	$homepage = get_page_by_title( 'Home', OBJECT, 'page' );
	if ( $homepage ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $homepage->ID );
	}
}
