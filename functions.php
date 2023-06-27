<?php
/**
 * Functions and Definitions
 *
 * @package WordPress
 * @subpackage Mizzou Base Theme
 * @category theme
 * @category functions
 * @category Timber
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
// Timber is required: http://upstatement.com/timber.
if ( ! class_exists( 'Timber' ) ) {
	add_action(
		'admin_notices',
		function() {
			printf( '<div class="error"><p>Timber not activated. Make sure you <a href="%s">activate the Mizzou Blocks plugin</a>.</p></div>', esc_url( admin_url( 'plugins.php#mizzou-blocks' ) ) );
		}
	);

	return;
}

/**
 * We're going to configure our theme inside of a subclass of MizzouBlocks
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class MizzouHybridBase extends MizzouBlocks {
	/** Add timber support. */
	public function __construct() {
		// Add configuration variables.
		add_filter( 'timber_context', array( $this, 'siteConfiguration' ) );

		// Setup menu locations.
		add_action( 'init', array( $this, 'customMenuLocation' ) );
		add_filter( 'hidden_meta_boxes', array( $this, 'show_hidden_meta_boxes' ), 10, 2 );

		// Setup post types and taxonomies.
		add_action( 'init', array( $this, 'customPostTypes' ) );
		add_action( 'init', array( $this, 'customTaxonomies' ) );
		add_post_type_support( 'page', 'excerpt' );

		// Edit Dashboard Menu.
		add_action( 'admin_menu', array( $this, 'customDashboardMenu' ) );
		add_action( 'admin_bar_menu', array( $this, 'add_toolbar_items' ), 100 );
		add_action( 'init', array( $this, 'customPostsName' ) );
		add_action(
			'init',
			function () {
				remove_post_type_support( 'post', 'comments' );
				remove_post_type_support( 'page', 'comments' );
			}
		);

		// Adjust template location.
		Timber::$dirname = array( 'views' );

		add_filter(
			'timber/loader/loader',
			function( $loader ) {
				$loader->addPath( __DIR__ . '/views', 'miz' );
				$loader->addPath( get_template_directory() . '/views' ?? plugin_dir_path( __DIR__ ) . '/miz-wordpress-blocks/views', 'parent' );
				return $loader;
			}
		);

		// Remove unnecessary junk from wp_head.
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'rel_canonical' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		remove_action( 'wp_head', 'rest_output_link_wp_head' );
		add_action( 'wp_head', array( $this, 'customMizHead' ) );
		add_action( 'wp_head', array( $this, 'mizHeadOpenGraph' ) );
		add_action( 'wp_head', array( $this, 'mizHeadTwitter' ) );
		add_action( 'wp_head', array( $this, 'mizHeadGTM' ) );
		add_action( 'wp_head', array( $this, 'mizHeadGCSE' ) );
		add_action( 'wp_head', array( $this, 'mizHeadScripts' ) );

		add_action(
			'after_setup_theme',
			function () {
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
				add_theme_support( 'title-tag' );
				add_theme_support( 'wp-block-styles' );
			}
		);

		// Add Starter Pages.
		add_action( 'after_switch_theme', array( $this, 'mizStarterPages' ) );

		// Twig additions.
		add_filter( 'timber/twig', array( $this, 'twigAdditions' ) );

		// Handle Timber Uploads Issue on Platform Multisite.
		add_filter(
			'timber/image/new_url',
			function ( $url ) {
				if ( strpos( $url, '-content/uploads' ) === 0 ) {
					$url = str_replace( '-content/uploads', '/wp-content/uploads', $url );
				}
				return $url;
			}
		);
		add_filter(
			'timber/URLHelper/url_to_file_system/path',
			function( $path ) {
				if ( strpos( $path, '/wp-content/uploads' ) === 0 ) {
					$path = str_replace( '/wp-content/uploads', '/../wp-content/uploads', $path );
				}
				return $path;
			}
		);

		// Register Scripts and Styles.
		add_action(
			'init',
			function () {
				$theme      = wp_get_theme( 'miz-hybrid-base' );
				$ds_version = '3.2';

				// Register Styles.
				wp_register_style( 'mizDS-fonts', get_template_directory_uri() . '/assets/css/miz-fonts.css', null, $ds_version );
				wp_register_style( 'mizDS-base', get_template_directory_uri() . '/assets/css/miz.css', null, $ds_version );
				wp_register_style( 'mizDS-brand', get_template_directory_uri() . '/assets/css/miz-brand.css', 'mizDS-base', $ds_version );
				wp_register_style( 'miz-theme', get_template_directory_uri() . '/style.css', null, $theme->get( 'Version' ) );
				// wp_enqueue_style( 'miz-light', get_template_directory_uri() . '/assets/css/light.css', null, $theme->get( 'Version' ), '(prefers-color-scheme: no-preference), (prefers-color-scheme: light)' );
				// wp_enqueue_style( 'miz-dark', get_template_directory_uri() . '/assets/css/dark.css', null, $theme->get( 'Version' ), '(prefers-color-scheme: dark)' );

				// Register Scripts.
				wp_register_script( 'svg4everybody', 'https://jonneal.dev/svg4everybody/svg4everybody.min.js', array(), $theme->get( 'Version' ), false );
				wp_register_script( 'dropdownJS', get_template_directory_uri() . '/assets/js/dropdown.js', array(), $theme->get( 'Version' ), true );
				wp_register_script( 'expandJS', get_template_directory_uri() . '/assets/js/expand.js', array(), $theme->get( 'Version' ), true );
				wp_register_script( 'primaryNavJS', get_template_directory_uri() . '/assets/js/primaryNavigation.js', array(), $theme->get( 'Version' ), true );
				wp_register_script( 'toggleJS', get_template_directory_uri() . '/assets/js/toggle.js', array(), $theme->get( 'Version' ), true );
			}
		);

		/* Enqueue Styling and Scripts */
		add_action(
			'wp_enqueue_scripts',
			function () {
				wp_enqueue_style( 'miz-theme' );
				wp_enqueue_style( 'mizDS-base' );
				wp_enqueue_style( 'mizDS-brand' );

				wp_enqueue_script( 'svg4everybody' );
				wp_enqueue_script( 'svg', 'https://cdnjs.cloudflare.com/ajax/libs/svg.js/2.7.1/svg.min.js', array(), '2.7.1', false );

				if ( ! get_field( 'header_part', 'option' ) && wp_get_nav_menu_object( 'Primary' ) ) {
					wp_enqueue_script( 'expandJS' );
					wp_enqueue_script( 'primaryNavJS' );
				}
			}
		);

		// Add Editor Styles.
		add_editor_style( '/assets/css/editor.css' );
		add_editor_style( '/assets/css/miz.css' );
		add_editor_style( '/assets/css/miz-brand.css' );

		// Remove emoji support.
		add_action( 'init', array( $this, 'disableEmoji' ) );

		// Setup shortcodes.
		add_shortcode( 'home_url', array( $this, 'homeURLShortCode' ) );
		add_shortcode( 'menu', array( $this, 'menuShortCode' ) );

		// Add SVG to mime types.
		add_filter( 'upload_mimes', array( $this, 'customMimeTypes' ) );

		// Media Filters.
		add_filter( 'img_caption_shortcode_width', array( $this, '__return_zero' ) );

		// Disable XML-RPC.
		add_filter( 'xmlrpc_enabled', '__return_false' );

		// Prevent remote attackers from enumerating user names.
		add_filter( 'redirect_canonical', array( $this, 'scanForEnumerationAttempt' ), 10, 2 );

		// Remove the author archives from sitemap.
		add_filter(
			'wp_sitemaps_add_provider',
			function( $provider, $str_name ) {
				if ( 'users' === $str_name ) {
					return false;
				}

				return $provider;
			},
			10,
			2
		);

		/**
		 * Add object, embed and iframe to list of allowed html elements in posts
		 *
		 * @param array $ary_allowed_post_tags list of allowed html elements and attributes
		 * @param string $str_context The context for which to retrieve tags. post|strip|data|entities|user_description|pre_user_description
		 * @return array aryAllowedposttags adjusted list of allowed html elements and attributes
		 */
		add_filter(
			'wp_kses_allowed_html',
			function ( $ary_allowed_post_tags, $str_context ) {
				if ( 'post' === $str_context ) {
					// Adjust allowed post tags to allow objects/embeds.
					$ary_allowed_post_tags['object'] = array(
						'height' => array(),
						'width'  => array(),
					);

					$ary_allowed_post_tags['param'] = array(
						'name'  => array(),
						'value' => array(),
					);

					$ary_allowed_post_tags['embed'] = array(
						'src'               => array(),
						'type'              => array(),
						'allowfullscreen'   => array(),
						'allowscriptaccess' => array(),
						'height'            => array(),
						'width'             => array(),
					);

					$ary_allowed_post_tags['iframe'] = array(
						'src'               => array(),
						'scrolling'         => array(),
						'allowfullscreen'   => array(),
						'allowscriptaccess' => array(),
						'height'            => array(),
						'width'             => array(),
					);
				}

				return $ary_allowed_post_tags;
			},
			10,
			2
		);

		/**
		 * Block Editor Overrides and Settings
		*/
		add_action(
			'after_setup_theme',
			function () {
				add_filter( 'should_load_remote_block_patterns', '__return_false' );

				add_filter(
					'body_class',
					function ( $classes ) {
						$classes[] = 'miz-body';
						return $classes;
					}
				);

				// Removes the default Site Icon as the favicon.
				remove_action( 'wp_head', 'wp_site_icon', 99 );

				// Remove Core Block Patterns.
				remove_theme_support( 'core-block-patterns' );

				// Only load block styles of used blocks.
				add_filter( 'should_load_separate_core_block_assets', '__return_true' );
			}
		);

		// Enqueue Editor Scripts/Styles.
		add_action(
			'enqueue_block_editor_assets',
			function () {
				$theme = wp_get_theme( 'mizzou-block-theme' );

				wp_enqueue_style( 'miz-theme' );
				wp_enqueue_style( 'mizDS-base' );
				wp_enqueue_style( 'mizDS-brand' );
			}
		);

		// Set allowed blocks.
		add_filter( 'allowed_block_types_all', array( $this, 'mizAllowedBlocks' ), 10, 2 );

		// Last User Login.
		add_action(
			'init',
			function () {
				$str_ds            = DIRECTORY_SEPARATOR;
				$str_parent        = get_template_directory();
				$str_file_location = $str_ds . 'inc' . $str_ds;
				$str_filename      = 'last-user-login.php';
				$str_file          = $str_parent . $str_file_location . $str_filename;

				require_once $str_file;
			}
		);

		// Block Patterns.
		add_action( 'init', array( $this, 'mizCustomPatternCategories' ), 9 );

		// ACF Settings.
		add_action(
			'init',
			function () {
				$str_ds            = DIRECTORY_SEPARATOR;
				$str_parent        = get_template_directory();
				$str_file_location = $str_ds . 'inc' . $str_ds . 'acf' . $str_ds;
				$str_filename      = 'acf-settings.php';
				$str_file          = $str_parent . $str_file_location . $str_filename;

				require_once $str_file;
			}
		);

		// TinyMCE Settings.
		add_action(
			'init',
			function () {
				$str_ds            = DIRECTORY_SEPARATOR;
				$str_parent        = get_template_directory();
				$str_file_location = $str_ds . 'inc' . $str_ds;
				$str_filename      = 'tinymce.php';
				$str_file          = $str_parent . $str_file_location . $str_filename;

				require_once $str_file;
			}
		);

		// Continue on.
		// parent::__construct();
	}

	/**
	 * Setup configuration variables for site
	 *
	 * @param array $ary_context Parent context variable.
	 * @return Updated $ary_context.
	 */
	public function siteConfiguration( $ary_context ) {
		// Media Location.
		$upload_dir                    = wp_upload_dir();
		$ary_context['site']->mediaUrl = $upload_dir['baseurl'] . '/';

		// Map existing Timber options to aliases.
		$ary_context['site']->assetUrl = $ary_context['site']->theme->link . '/';
		// $ary_context['site']->ParentThemeURL = $ary_context['site']->theme->parent->link . '/' ?? $ary_context['site']->theme->link . '/';
		$ary_context['site']->baseURL = $ary_context['site']->url . '/';

		// Standard configuration options.
		$ary_context['site']->detected_hostname      = $_SERVER['HTTP_HOST'];
		$ary_context['site']->search_action_path     = 'search';
		$ary_context['site']->search_enabled         = true;
		$ary_context['site']->search_field_name      = 'q';
		$ary_context['site']->search_form_field_name = 'q';
		$ary_context['site']->viewport               = 'width=device-width, initial-scale=1.0, shrink-to-fit=no';
		$ary_context['site']->year                   = date( 'Y' );

		// Site specific configuration options.

		// Navigation.
		$ary_context['site']->primary_navigation  = $this->getMenu( 'primary-navigation' );
		$ary_context['site']->footer_navigation   = $this->getMenu( 'footer-navigation' );
		$ary_context['site']->tactical_navigation = $this->getMenu( 'tactical-navigation' );

		// Options.
		$ary_context['option'] = get_fields( 'option' );

		// Continue on.
		return $ary_context;
	}

	/**
	 * Custom Dashboard Menu
	 */
	public function customDashboardMenu() {
		// Remove Comments Menu.
		remove_menu_page( 'edit-comments.php' );

		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
		// remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	}

	/**
	 * Change default Post name to News
	 */
	public function customPostsName() {
		$get_post_type              = get_post_type_object( 'post' );
		$labels                     = $get_post_type->labels;
		$labels->name               = 'News';
		$labels->singular_name      = 'News';
		$labels->add_new            = 'Add News';
		$labels->add_new_item       = 'Add News';
		$labels->edit_item          = 'Edit News';
		$labels->new_item           = 'News';
		$labels->view_item          = 'View News';
		$labels->search_items       = 'Search News';
		$labels->not_found          = 'No News found';
		$labels->not_found_in_trash = 'No News found in Trash';
		$labels->all_items          = 'All News';
		$labels->menu_name          = 'News';
		$labels->name_admin_bar     = 'News';
	}

	/**
	 * Adjust Items in Admin Toolbar
	 *
	 * @param ary $admin_bar items in toolbar.
	 */
	public function add_toolbar_items( $admin_bar ) {
		$admin_bar->add_menu(
			array(
				'id'    => 'ds-request',
				'title' => 'Make a Web Request',
				'href'  => 'https://mizzou.us/DSRequest',
				'meta'  => array(
					'title'  => __( 'Make a Web Request' ),
					'target' => '_blank',
					'class'  => 'miz-button miz-button--primary',
				),
			)
		);
		$admin_bar->remove_menu( 'comments' );
		$admin_bar->remove_menu( 'site-editor' );
	}

	/**
	 * Starter Content
	 */
	public function mizStarterPages() {
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

	/**
	 * Set Allowed Blocks
	 *
	 * @param ary $allowed_block_types Array of allowed block types.
	 * @return ary $allowed_block_types.
	 */
	public function mizAllowedBlocks( $allowed_block_types ) {
		$wp_block = array( 'core/block' );

		$text_blocks = array(
			'core/code',
			'core/column',
			'core/freeform',
			'core/heading',
			'core/list',
			'core/list-item',
			'core/paragraph',
			'core/preformatted',
			'core/pullquote',
			'core/quote',
			'core/table',
			'core/verse',
		);

		$media_blocks = array(
			'core/audio',
			'core/cover',
			'core/file',
			'core/gallery',
			'core/image',
			'core/media-text',
			'core/video',
		);

		$design_blocks = array(
			'core/columns',
			'core/group',
			'core/home-link',
			'core/navigation-link',
			'core/navigation-submenu',
			'core/separator',
			'core/spacer',
			// 'core/more', 'core/nextpage',
		);

		$widget_blocks = array(
			'core/archives',
			'core/calendar',
			'core/categories',
			'core/html',
			'core/latest-posts',
			'core/page-list',
			'core/rss',
			// 'core/search',
			'core/shortcode',
			'core/social-link',
			'core/social-links',
			'core/tag-cloud',
		);

		$embed_blocks = array(
			'core/embed',
			'core-embed/facebook',
			'core-embed/instagram',
			'core-embed/vimeo',
			'core-embed/youtube',
		);

		$theme_blocks = array(
			'core/avatar',
			'core/loginout',
			'core/navigation',
			'core/pattern',
			'core/post-author',
			'core/post-author-biography',
			'core/post-author-name',
			'core/post-content',
			'core/post-date',
			'core/post-excerpt',
			'core/post-featured-image',
			'core/post-navigation-link',
			'core/post-template',
			'core/post-terms',
			'core/post-title',
			'core/query',
			'core/query-no-results',
			'core/query-pagination',
			'core/query-pagination-next',
			'core/query-pagination-numbers',
			'core/query-pagination-previous',
			'core/query-title',
			'core/read-more',
			'core/site-logo',
			'core/site-tagline',
			'core/site-title',
			'core/template-part',
			'core/term-description',
			// 'core/post-comments-count', 'core/post-comments-form', 'core/post-comments-link', 'core/comment-author-name', 'core/comment-content', 'core/comment-date', 'core/comment-edit-link',
			// 'core/comment-reply-link', 'core/comments-query-loop', 'core/comments-pagination', 'core/comments-pagination-next', 'core/comments-pagination-numbers', 'core/comments-pagination-previous', 'core/comments-title',
		);

		return array_unique( array_merge( $wp_block, $text_blocks, $media_blocks, $design_blocks, $widget_blocks, $embed_blocks, $theme_blocks ) );
	}

	/**
	 * Set up Custom Head
	 */
	public function customMizHead() {
		// Base meta
		echo "<meta charset='UTF-8'>\n" .
		"<meta http-equiv='x-ua-compatible' content='ie=edge'>\n" .
		"<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>\n" .
		"<meta name='format-detection' content='telephone=no'>\n" .
		"<meta name='robots' content='index,follow'>";

		// Add favicon.
		echo ' <!-- Favicon -->' . "<link rel='shortcut icon' href='" . get_template_directory_uri() . "/assets/images/favicons/favicon.ico' />\n";

		// Add in Meta Icons.
		echo '<!-- Apple Touch Icons -->' .
		"<link href='" . get_template_directory_uri() . "/assets/images/favicons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'/>\n" .
		"<meta content='' name='apple-mobile-web-app-title'/>\n" .
		"<link rel='mask-icon' href='" . get_template_directory_uri() . "/assets/images/favicons/mu-safari-icon.svg' color='black'>";

		echo '<!-- Microsoft Windows 8+ Tiles -->' .
		"<meta content='' name='application-name'/>\n" .
		"<meta content='" . get_template_directory_uri() . "/assets/images/favicons/apple-touch-icon.png' name='msapplication-TileImage'/>\n" .
		"<meta content='#F1B82D' name='msapplication-TileColor'/>";

		// Page Information.
		if ( is_single() || is_page() ) {
			if ( get_the_excerpt() ) {
				echo "<meta name='description' content='" . htmlspecialchars( get_the_excerpt() ) . "'>";
			} else {
				echo "<meta name='description' content='" . htmlspecialchars( get_bloginfo( 'description' ) ) . "'>";
			}
		} elseif ( is_archive() ) {
			if ( get_the_archive_description() ) {
				echo "<meta name='description' content='" . htmlspecialchars( get_the_archive_description() ) . "'>";
			}
		} else {
			echo "<meta name='description' content='" . htmlspecialchars( get_bloginfo( 'description' ) ) . "'>";
		}
	}

	/**
	 * Add Open Graph Metadata to Head
	 */
	public function mizHeadOpenGraph() {
		// Open Graph.
		echo '<!-- Open Graph -->';
		echo "<meta property='og:site_name' content='" . htmlspecialchars( get_bloginfo( 'name' ) ) . "' />";
		if ( is_single() || is_page() ) {
			echo "<meta property='og:url' content='" . get_the_permalink() . "' />";
			echo "<meta property='og:title' content='" . htmlspecialchars( get_the_title() ) . "' />";

			if ( get_the_excerpt() ) {
				echo "<meta property='og:description' content='" . htmlspecialchars( get_the_excerpt() ) . "' />";
			}
		} elseif ( is_home() ) {
			echo "<meta property='og:title' content='" . htmlspecialchars( get_queried_object()->post_title ) . "' />";
			echo "<meta property='og:description' content='" . htmlspecialchars( get_queried_object()->post_excerpt ) . "' />";
		} elseif ( is_archive() ) {
			echo "<meta property='og:url' content='" . htmlspecialchars( get_post_type_archive_link( get_queried_object()->name ) ) . "' />";
			echo "<meta property='og:title' content='" . htmlspecialchars( get_queried_object()->labels->name ?? get_queried_object()->name ) . "' />";

			if ( get_the_archive_description() ) {
				echo "<meta property='og:description' content='" . htmlspecialchars( get_the_archive_description() ) . "' />";
			}
		}

		if ( get_the_post_thumbnail() ) {
			echo "<meta property='og:image:url' content='" . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . "' />";
			echo "<meta property='og:image:alt' content='" . get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) . "' />";
		} elseif ( get_option( 'options_social_media_image_default' ) ) {
			echo "<meta property='og:image:url' content='" . wp_get_attachment_image_src( get_option( 'options_social_media_image_default' ), 'full' )[0] . "' />";
			echo "<meta property='og:image:alt' content='" . get_post_meta( get_option( 'options_social_media_image_default' ), '_wp_attachment_image_alt', true ) . "' />";
		} else {
			echo "<meta property='og:image:url' content='" . get_template_directory_uri() . "/assets/images/social/twitter/shared-image.png' />";
			echo "<meta property='og:image:alt' content='A University of Missouri website' />";
		}
		echo '<!-- End Open Graph -->';
	}

	/**
	 * Add Twitter Metadata to Head
	 */
	public function mizHeadTwitter() {
		echo '<!-- Twitter Cards -->';
		echo "<meta property='twitter:card' content='summary' />";
		echo "<meta property='twitter:site' content='@Mizzou' />";
		if ( is_single() || is_page() ) {
			echo "<meta property='twitter:title' content='" . htmlspecialchars( get_the_title() ) . "' />";

			if ( get_the_excerpt() ) {
				echo "<meta property='twitter:description' content='" . htmlspecialchars( get_the_excerpt() ) . "' />";
			}
		} elseif ( is_home() ) {
			echo "<meta property='twitter:title' content='" . htmlspecialchars( get_queried_object()->post_title ) . "' />";
			echo "<meta property='twitter:description' content='" . htmlspecialchars( get_queried_object()->post_excerpt ) . "' />";
		} elseif ( is_archive() ) {
			echo "<meta property='twitter:title' content='" . htmlspecialchars( get_queried_object()->labels->name ?? get_queried_object()->name ) . "' />";

			if ( get_the_archive_description() ) {
				echo "<meta property='twitter:description' content='" . htmlspecialchars( get_the_archive_description() ) . "' />";
			}
		}

		if ( get_the_post_thumbnail() ) {
			echo "<meta property='twitter:image' content='" . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . "' />";
			echo "<meta property='twitter:image:alt' content='" . get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) . "' />";
		} elseif ( get_option( 'options_social_media_image_default' ) ) {
			echo "<meta property='twitter:image' content='" . wp_get_attachment_image_src( get_option( 'options_social_media_image_default' ), 'full' )[0] . "' />";
			echo "<meta property='twitter:image:alt' content='" . get_post_meta( get_option( 'options_social_media_image_default' ), '_wp_attachment_image_alt', true ) . "' />";
		} else {
			echo "<meta property='twitter:image' content='" . get_template_directory_uri() . "/assets/images/social/twitter/shared-image.png' />";
			echo "<meta property='twitter:image:alt' content='A University of Missouri website' />";
		}
		echo '<!-- End Twitter Cards -->';
	}

	/**
	 * Add Google Tag Manager to Head
	 */
	public function mizHeadGTM() {
		if ( get_option( 'options_google_tag_manager_id' ) ) {
			echo '<!-- Google Tag Manager -->' . "\n" .
			"<script>(function(w,d,s,l,i) {w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','" . get_option( 'options_google_tag_manager_id' ) . "' );</script>\n" .
			'<!-- End Google Tag Manager -->';
		}
	}

	/**
	 * Add Google Custom Search to Head
	 */
	public function mizHeadGCSE() {
		if ( get_option( 'options_google_cse_id' ) && ( is_search() || is_page_template( 'template-search' ) || is_page( 'search' ) ) ) {
			echo '<!-- Google Custom Search -->' . "\n" .
			"<script>
                ( function () {
                    var cx = '" . get_option( 'options_google_cse_id' ) . "';
                    var gcse = document.createElement( 'script' );
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName( 'script' )[ 0 ];
                    s.parentNode.insertBefore( gcse, s );
                } )();
            </script>" . "\n" .
			'<!-- End Google Custom Search -->';
		}
	}

	/**
	 * Add Custom JavaScript to Head
	 */
	public function mizHeadScripts() {
		// SVG.
		echo '<script>svg4everybody();</script>' . "\n";
	}

	/**
	 * Register Custom Categories for Block Patterns
	 */
	public function mizCustomPatternCategories() {
		$block_pattern_categories = array(
			'footer'  => array(
				'label'         => __( 'Footer', 'miz-hybrid-base' ),
				'categoryTypes' => array( 'mizzou' ),
			),
			'general' => array(
				'label'         => __( 'General', 'miz-hybrid-base' ),
				'categoryTypes' => array( 'mizzou' ),
			),
			'header'  => array(
				'label'         => __( 'Header', 'miz-hybrid-base' ),
				'categoryTypes' => array( 'mizzou' ),
			),
			'layout'  => array(
				'label'         => __( 'Layout', 'miz-hybrid-base' ),
				'categoryTypes' => array( 'mizzou' ),
			),
			'layer'   => array(
				'label'         => __( 'Layer', 'miz-hybrid-base' ),
				'categoryTypes' => array( 'mizzou' ),
			),
			'page'    => array(
				'label'         => __( 'Page', 'miz-hybrid-base' ),
				'categoryTypes' => array( 'mizzou' ),
			),
			'query'   => array(
				'label'         => __( 'Query', 'miz-hybrid-base' ),
				'categoryTypes' => array( 'mizzou' ),
			),
		);

		foreach ( $block_pattern_categories as $name => $properties ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Show Excerpt
	 *
	 * @param ary $hidden List of hidden fields.
	 * @param ary $screen List of screens.
	 * @return Updated $hidden.
	 */
	public function show_hidden_meta_boxes( $hidden, $screen ) {
		if ( 'post' === $screen->base ) {
			foreach ( $hidden as $key => $value ) {
				if ( 'postexcerpt' === $value ) {
					unset( $hidden[ $key ] );
					break;
				}
			}
		}

		return $hidden;
	}

	/**
	 * Setup custom menu locations
	 */
	public function customMenuLocation() {
		register_nav_menu( 'primary-navigation', __( 'Primary Navigation' ) );
		register_nav_menu( 'tactical-navigation', __( 'Tactical Navigation' ) );
		register_nav_menu( 'footer-navigation', __( 'Footer Navigation' ) );
	}

	/**
	 * Get menu title and items
	 *
	 * @param string $str_menu_name Name of menu.
	 * @return array Associative array with the following properties:
	 *      - (string) name Name of the menu or empty string.
	 *      - (array) items Collection of Timber\MenuItem objects or empty array.
	 */
	public static function getMenu( $str_menu_name ) {
		$str_menu_title = '';
		$ary_menu_items = array();

		if ( is_nav_menu( $str_menu_name ) ) {
			$obj_menu       = new Timber\Menu( $str_menu_name );
			$str_menu_title = $obj_menu->title;
			$ary_menu_items = $obj_menu->get_items();
		} elseif ( has_nav_menu( $str_menu_name ) ) {
			$obj_menu       = new Timber\Menu( $str_menu_name );
			$str_menu_title = $obj_menu->title;
			$ary_menu_items = $obj_menu->get_items();
		}

		return array(
			'name'  => $str_menu_title,
			'items' => $ary_menu_items,
		);
	}

	/**
	 * Adds functions or extensions to Twig
	 *
	 * @param object $obj_twig Existing Twig object.
	 * @return object Updated Twig object.
	 */
	public function twigAdditions( $obj_twig ) {
		$obj_twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$obj_twig->addFilter( new Timber\Twig_Filter( 'date_ap_style', array( $this, 'dateToAPStyle' ) ) );
		$obj_twig->addFilter( new Timber\Twig_Filter( 'menu_flatten_hierarchy', array( $this, 'menuFlattenHierarchy' ) ) );
		$obj_twig->addFilter( new Timber\Twig_Filter( 'menu_item_link_list', array( $this, 'menuItemLinkList' ) ) );
		$obj_twig->addFilter( new Timber\Twig_Filter( 'menu_previous_next_page', array( $this, 'menuPreviousAndNextPage' ) ) );
		$obj_twig->addFilter( new Timber\Twig_Filter( 'menu_url_in_link_list', array( $this, 'menuUrlInLinkList' ) ) );
		$obj_twig->addFilter( new Timber\Twig_Filter( 'htmlentities', 'htmlentities', array( 'is_safe' => array( 'html' ) ) ) );
		return $obj_twig;
	}

	/**
	 * Creates an AP-style date
	 *
	 * @param string $str_date Date string.
	 * @return string Date in AP format.
	 */
	public function dateToAPStyle( $str_date ) {
		$str_ap_style_date = '';
		$str_timestamp     = strtotime( $str_date );
		if ( false !== $str_timestamp ) {
			$str_ap_style_date = date( 'M. j, Y', $str_timestamp );

			// Fix months.
			$str_ap_style_date = str_replace( 'Mar.', 'March', $str_ap_style_date );
			$str_ap_style_date = str_replace( 'Apr.', 'April', $str_ap_style_date );
			$str_ap_style_date = str_replace( 'May.', 'May', $str_ap_style_date );
			$str_ap_style_date = str_replace( 'Jun.', 'June', $str_ap_style_date );
			$str_ap_style_date = str_replace( 'Jul.', 'July', $str_ap_style_date );
		}

		return $str_ap_style_date;
	}

	/**
	 * Flattens a nav item array so it isn't hierarchical
	 *
	 * @param array   $ary_menu Associative array of menu items (Timber\Menu objects).
	 * @param boolean $bool_include_child_links (Optional) Whether to recursively search child links. Defaults to true.
	 * @return array Menu items without hierarchy.
	 */
	public function menuFlattenHierarchy( $ary_menu, $bool_include_child_links = true ) {
		$ary_link_list = array();

		if ( ! empty( $ary_menu ) ) {
			foreach ( $ary_menu as $obj_menu_item ) {
				$ary_link_list[] = $obj_menu_item;

				// Pull in child links.
				$ary_children = $obj_menu_item->children();
				if ( ( true === $bool_include_child_links ) && ( ! empty( $ary_children ) ) ) {
					$ary_child_link_list = $this->menuFlattenHierarchy( $ary_children );
					$ary_link_list       = array_merge( $ary_link_list, $ary_child_link_list );
				}
			}
		}

		return $ary_link_list;
	}

	/**
	 * Creates a list of URLs used by a menu link and any child links it might have, with infinite depth
	 *
	 * @param obj $obj_menu_item Menu item.
	 * @return array List of URLs.
	 */
	public function menuItemLinkList( $obj_menu_item ) {
		$ary_link_list = array();

		$str_link = $obj_menu_item->link();
		if ( '' !== trim( $str_link ) ) {
			$ary_link_list[] = $str_link;

			// Recursively process child links.
			$ary_children = $obj_menu_item->children();
			if ( ( $ary_children ) && ( ! empty( $ary_children ) ) ) {
				foreach ( $ary_children as $obj_child_menu_item ) {
					$ary_link_list = array_merge( $ary_link_list, $this->menuItemLinkList( $obj_child_menu_item ) );
				}
			}
		}

		return array_unique( $ary_link_list );
	}

	/**
	 * Determine previous and next page in navigation
	 *
	 * @param array   $ary_menu Collection of Timber\MenuItem objects.
	 * @param string  $str_current_page Current page url. $ary_menu will be searched for this to determine the previous/next link.
	 * @param boolean $bool_include_child_links (Optional) Whether to search child links too. Defaults to true.
	 * @return array With two keys, 'previous' and 'next', containing the menu item array for each.
	 */
	public function menuPreviousAndNextPage( $ary_menu, $str_current_page, $bool_include_child_links = true ) {
		$ary_next_menu_item     = null;
		$ary_previous_menu_item = $ary_next_menu_item;

		if ( ! empty( $ary_menu ) ) {

			// Start by flattening the menu array so it's no longer hierarchical.
			$ary_link_list = $this->menuFlattenHierarchy( $ary_menu, $bool_include_child_links );

			// Find the current page.
			for ( $i = 0; $i < count( $ary_link_list ); $i++ ) {

				$str_link = $ary_link_list[ $i ]->link();
				if ( ( '' !== trim( $str_link ) ) && ( $str_link === $str_current_page ) ) {
					if ( isset( $ary_link_list[ $i - 1 ] ) ) {
						$ary_previous_menu_item = $ary_link_list[ $i - 1 ];
					}

					if ( isset( $ary_link_list[ $i + 1 ] ) ) {
						$ary_next_menu_item = $ary_link_list[ $i + 1 ];
					}
					break;
				}
			}
		}

		return array(
			'previous' => $ary_previous_menu_item,
			'next'     => $ary_next_menu_item,
		);
	}

	/**
	 * Checks to see if a given URL is present in a menu
	 *
	 * @param obj $ary_menu Menu.
	 * @param str $st_url URL to check.
	 * @return boolean Whether or not the URL is in the menu.
	 */
	public function menuUrlInLinkList( $ary_menu, $st_url ) {
		$ary_link_list = array();

		foreach ( $ary_menu as $obj_menu_item ) {
			$ary_link_list = array_merge( $ary_link_list, $this->menuItemLinkList( $obj_menu_item ) );
		}

		$ary_link_list = array_unique( $ary_link_list );

		// Check to see if $st_url is in the list.
		return in_array( $st_url, $ary_link_list );
	}

	/**
	 * Removes emoji support from WordPress 4.2+
	 */
	public function disableEmoji() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	}

	/**
	 * Setup custom taxonomies
	 */
	public function customTaxonomies() {}

	/**
	 * Setup custom post types
	 */
	public function customPostTypes() {
		add_filter(
			'rest_prepare_event',
			function( $response ) {
				$response->data['acf'] = get_fields( $response->data['id'] );
				return $response;
			}
		);
	}

	/**
	 * Enables a shortcode for the home URL
	 *
	 * Usage:
	 * [home_url]
	 *
	 * @return string Home URL.
	 */
	public function homeURLShortCode() {
		return get_bloginfo( 'url' );
	}

	/**
	 * Add SVG to the list of acceptable mime-types
	 *
	 * @param array $ary_mime_types Mime types.
	 * @return array Updated $ary_mime_types.
	 */
	public function customMimeTypes( $ary_mime_types ) {
		$ary_mime_types['svg'] = 'image/svg+xml';

		// Disallow file types.
		unset( $ary_mime_types['csv'] );
		unset( $ary_mime_types['doc'] );
		unset( $ary_mime_types['docx'] );
		unset( $ary_mime_types['ppt'] );
		unset( $ary_mime_types['pptx'] );
		unset( $ary_mime_types['pps'] );
		unset( $ary_mime_types['ppsx'] );
		unset( $ary_mime_types['odt'] );
		unset( $ary_mime_types['pdf'] );
		unset( $ary_mime_types['xls'] );
		unset( $ary_mime_types['xlsx'] );

		return $ary_mime_types;
	}

	/**
	 * Prevent remote attackers from enumerating user names
	 *
	 * @param string $str_redirection_url Redirection URL.
	 * @param string $str_requested_url Requested URL.
	 * @return string (Possibly altered) Redirection URL.
	 */
	public function scanForEnumerationAttempt( $str_redirection_url, $str_requested_url ) {
		if ( 1 === preg_match( '/\?author=([\d]*)/', $str_requested_url ) ) {
			$str_redirection_url = false;
		}

		return $str_redirection_url;
	}

	/**
	 * Setup custom sort for staff
	 */
	public function customStaffSort() {
		$orderby_statement = "menu_order DESC, RIGHT(post_title, LOCATE( ' ', REVERSE(post_title)) - 1) ASC";
		return $orderby_statement;
	}
}


// Create object.
new MizzouHybridBase();

// Add Option Pages.
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title' => 'Theme Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'manage_options',
			'redirect'   => false,
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Footer Settings',
			'menu_title'  => 'Footer',
			'parent_slug' => 'theme-general-settings',
			'capability'  => 'edit_theme_options',
		)
	);
}
