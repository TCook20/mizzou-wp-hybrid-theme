<?php
/**
 * Title: Standard Header
 * Slug: mizzou/header-pattern
 * Block Types: core/template-part/header
 * Categories: header
 * Post Types: wp_template_part
 *
 * @package WordPress
 * @subpackage Mizzou Block Theme
 * @category theme
 * @category block pattern
 * @category Timber
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

?>

<!-- wp:mizzou/header {"title":"<?php echo get_bloginfo( 'name' ); ?>","url":"<?php echo get_bloginfo( 'url' ); ?>"} -->
<header class="miz-header wp-block-mizzou-header">
	<!-- wp:mizzou/header-section {"fillColor":"black"} -->
	<div class="wp-block-mizzou-header-section miz-fill--black">
		<div class="miz-container">
			<!-- wp:mizzou/ribbon -->
			<div class="miz-ribbon wp-block-mizzou-ribbon">
				<!-- wp:mizzou/ribbon-section {"className":"miz-ribbon__signature"} -->
				<div class="wp-block-mizzou-ribbon-section miz-ribbon__signature">
					<!-- wp:mizzou/signature {"reverse":true} -->
					<div class="mu-sig-24 reverse">
						<p class="logo"><a href="https://missouri.edu">MU Logo</a></p>
						<h1 class="wordmark"><a href="https://missouri.edu">University of Missouri</a></h1>
					</div>
					<!-- /wp:mizzou/signature -->
				</div>
				<!-- /wp:mizzou/ribbon-section -->

				<!-- wp:mizzou/ribbon-section {"className":"miz-ribbon__search"} -->
				<div class="wp-block-mizzou-ribbon-section miz-ribbon__search">
					<!-- wp:mizzou/search -->
					<form action="/search/" method="get" class="miz-input-group"><label for="search-input" class="miz-label--hidden">Search</label><input type="text" class="miz-input" id="search-input" placeholder="Search this site" name="q"/><button class="miz-button miz-button--primary miz-button--small miz-button--icon miz-button--square-sm miz-input-group__button"><i class="miz-icon material-icons miz-icon--button miz-icon--md">search</i></button></form>
					<!-- /wp:mizzou/search -->
				</div>
				<!-- /wp:mizzou/ribbon-section -->
			</div>
			<!-- /wp:mizzou/ribbon -->
		</div>
	</div>
	<!-- /wp:mizzou/header-section -->

	<!-- wp:mizzou/header-section {"fillColor":"white"} -->
	<div class="wp-block-mizzou-header-section miz-fill--white">
		<div class="miz-container">
			<!-- wp:mizzou/masthead {"title":"<?php echo get_bloginfo( 'name' ); ?>","link":"<?php echo get_bloginfo( 'url' ); ?>"} /-->
		</div>
	</div>
	<!-- /wp:mizzou/header-section -->

	<!-- wp:mizzou/header-section {"fillColor":"gold"} -->
	<div class="wp-block-mizzou-header-section miz-fill--gold">
		<div class="miz-container">
			<!-- wp:mizzou/primary-navigation /-->
		</div>
	</div>
	<!-- /wp:mizzou/header-section -->
</header>
<!-- /wp:mizzou/header -->
