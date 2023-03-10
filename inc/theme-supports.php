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

// Starter Content.
add_theme_support( 'starter-content', 'miz_starter_content' );

// Add HTML5 support for gallery and caption shortcodes.
add_theme_support( 'html5', array( 'gallery', 'caption', 'style', 'script' ) );

// Add Responsive Embeds.
add_theme_support( 'responsive-embeds' );

// Add menu support.
add_theme_support( 'menus' );

// Add post thumbnail support and set size.
add_theme_support( 'post-thumbnails' );

// Theme Supports.
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'block-templates' );
add_theme_support( 'editor-styles' );
add_theme_support( 'wp-block-styles' );

/**
 * Add Starter Pages to New Site
 */
function miz_starter_content() {
	array(
		// Static front page set to Home, posts page set to Blog.
		'options'   => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{ home }}',
		),

		'nav_menus' => array(
			'primary' => array(
				'name'  => 'Primary',
				'items' => array(
					'page_home',
					'page_calendar',
					'page_news',
				),
			),
		),

		// Starter pages to include.
		'posts'     => array(
			'home'     => array(
				'post_type'    => 'page',
				'post_title'   => _x( 'Home', 'miz-block-base' ),
				'post_content' => '',
			),
			'calendar' => array(
				'post_type'    => 'page',
				'post_title'   => _x( 'Calendar', 'miz-block-base' ),
				'post_content' => '<!-- wp:group {"tagName":"article","lock":{"move":true},"className":"miz-main-grid__article","layout":{"inherit":false}} -->
                                    <article class="wp-block-group miz-main-grid__article"><!-- wp:mizzou/events-collection {"count":10,"term":"research"} /--></article>
                                    <!-- /wp:group -->
                                    <!-- wp:group {"tagName":"aside","lock":{"move":true},"className":"miz-main-grid__sidebar","layout":{"inherit":false}} -->
                                    <aside class="wp-block-group miz-main-grid__sidebar"></aside>
                                    <!-- /wp:group -->',
			),
			'news'     => array(
				'post_type'    => 'page',
				'post_title'   => _x( 'News', 'miz-block-base' ),
				'post_content' => '',
			),
			'search'   => array(
				'post_type'    => 'page',
				'post_title'   => _x( 'Search', 'miz-block-base' ),
				'post_content' => '<!-- wp:html --><gcse:search gname="sitesearch" queryParameterName="q"></gcse:search><!-- /wp:html -->',
			),
		),
	);
}
