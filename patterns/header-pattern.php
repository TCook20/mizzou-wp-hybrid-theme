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

<!-- wp:group {"lock":{"move":true},"className":"miz-header","tagName":"header","style":{"spacing":{"blockGap":"0rem"}}} -->
<header class="wp-block-group miz-header">
	<!-- wp:group {"lock":{"move":true,"remove":true},"className":"miz-fill\u002d\u002dblack","style":{"spacing":{"blockGap":"0rem"}}} -->
	<div class="wp-block-group miz-fill--black">
		<!-- wp:group {"className":"miz-container","style":{"spacing":{"blockGap":"0rem"}}} -->
		<div class="wp-block-group miz-container">
			<!-- wp:mizzou/ribbon -->
			<div class="miz-ribbon">
				<div class="miz-ribbon__signature">
					<div class="mu-sig-24 reverse">
						<p class="logo"><a href="https://missouri.edu">MU Logo</a></p>
						<h1 class="wordmark"><a href="https://missouri.edu">University of Missouri</a></h1>
					</div>
				</div>
				<div class="miz-ribbon__search">
					<form action="/search/" method="get" class="miz-input-group">
						<label for="search-input" class="miz-label--hidden">Search</label><input type="text" class="miz-input" id="search-input" placeholder="Search this site" name="q"/>
						<button class="miz-button miz-button--primary miz-button--small miz-button--icon miz-button--square-sm miz-input-group__button">
							<i class="miz-icon material-icons miz-icon--button miz-icon--md">search</i>
						</button>
					</form>
				</div>
			</div>
			<!-- /wp:mizzou/ribbon -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"lock":{"move":true,"remove":true},"className":"miz-fill\u002d\u002dwhite","style":{"spacing":{"blockGap":"0rem"}}} -->
	<div class="wp-block-group miz-fill--white">
		<!-- wp:group {"className":"miz-container","style":{"spacing":{"blockGap":"0rem"}}} -->
		<div class="wp-block-group miz-container">
			<!-- wp:mizzou/masthead {"title":"<?php echo get_bloginfo( 'name' ); ?>","link":"<?php echo get_bloginfo( 'url' ); ?>", "subtitle":"<?php echo get_bloginfo( 'description' ); ?>"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"lock":{"move":true,"remove":true},"className":"miz-fill\u002d\u002dgold","style":{"spacing":{"blockGap":"0rem"}}} -->
	<div class="wp-block-group miz-fill--gold">
		<!-- wp:group {"className":"miz-container","style":{"spacing":{"blockGap":"0rem"}}} -->
		<div class="wp-block-group miz-container">
			<!-- wp:mizzou/primary-navigation {"name":"primary"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</header>
<!-- /wp:group -->
