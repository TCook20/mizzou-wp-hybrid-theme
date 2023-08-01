<?php
/**
 * Title: Featured Events
 * Slug: mizzou/featured-events--dynamic
 * Description:
 * Block Types: core/template
 * Categories: layer
 * Keywords: layer, events, calendar
 * Inserter: yes
 *
 * @package WordPress
 * @subpackage Mizzou Hybrid Theme
 * @category theme
 * @category block pattern
 * @category Timber
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

?>

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"miz-white","className":"miz-layer miz-layer\u002d\u002dbrand miz-stack-sandwich\u002d\u002dxlmiz-decoration miz-decoration__plus\u002d\u002dtop-left miz-main-grid__full"} -->
<section class="wp-block-group alignfull miz-layer miz-layer--brand miz-stack-sandwich--xlmiz-decoration miz-decoration__plus--top-left miz-main-grid__full has-miz-white-background-color has-background">
	<!-- wp:group {"lock":{"move":false,"remove":false},"className":"miz-container"} -->
	<div class="wp-block-group miz-container">
		<!-- wp:group { "tagName":"header","templateLock":false,"lock":{"move":true,"remove":false},"className":"miz-layer__header miz-layer__header\u002d\u002dcenter","layout":{"type":"default"}} -->
		<header class="wp-block-group miz-layer__header miz-layer__header--center">
			<!-- wp:paragraph {"placeholder":"Add a kicker...","lock":{"move":true,"remove":false},"className":"miz-layer__kicker"} -->
			<p class="miz-layer__kicker"></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"placeholder":"Add a title...","lock":{"move":true,"remove":false},"className":"miz-layer__title"} -->
			<h2 class="miz-layer__title"></h2>
			<!-- /wp:heading -->
		</header>
		<!-- /wp:group -->

		<!-- wp:group {"lock":{"move":true,"remove":false},"className":"miz-layer__content","layout":{"type":"default"}} -->
		<div class="wp-block-group miz-layer__content">
			<!-- wp:mizzou/events-collection {"count":3,"column":3, "method":"search","term":"research"} /-->

			<!-- wp:mizzou/button-group {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-mizzou-button-group miz-button-group">
				<!-- wp:mizzou/button {"branded":true} -->
				<a class="miz-button miz-button--brand wp-block-mizzou-button"></a>
				<!-- /wp:mizzou/button -->
			</div>
			<!-- /wp:mizzou/button-group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
