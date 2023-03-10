<?php
/**
 * Title: Card Deck with Title and Kicker
 * Slug: mizzou/layer-card-deck
 * Block Types: core/template
 * Categories: layer
 * Keywords: layer, cards
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

<!-- wp:group {"tagName":"section","align":"full","className":"miz-layer miz-layer\u002d\u002dbrand miz-stack-sandwich\u002d\u002dxlmiz-decoration miz-decoration__plus\u002d\u002dtop-left miz-main-grid__full"} -->
<section class="wp-block-group alignfull miz-layer miz-layer--brand miz-stack-sandwich--xlmiz-decoration miz-decoration__plus--top-left miz-main-grid__full">
	<!-- wp:group {"lock":{"move":false,"remove":false},"className":"miz-container"} -->
	<div class="wp-block-group miz-container">
		<!-- wp:group { "tagName":"header","templateLock":false,"lock":{"move":true,"remove":false},"className":"miz-layer__header miz-layer__header\u002d\u002dcenter","layout":{"type":"default"}} -->
		<header class="wp-block-group miz-layer__header miz-layer__header--center">
			<!-- wp:paragraph {"lock":{"move":true,"remove":false},"className":"miz-layer__kicker"} -->
			<p class="miz-layer__kicker"></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"lock":{"move":true,"remove":false},"className":"miz-layer__title"} -->
			<h2 class="miz-layer__title"></h2>
			<!-- /wp:heading -->
		</header>
		<!-- /wp:group -->

		<!-- wp:group {"lock":{"move":true,"remove":false},"className":"miz-layer__content","layout":{"type":"default"}} -->
		<div class="wp-block-group miz-layer__content">
			<!-- wp:mizzou/card-deck {"branded":true,"column":3} -->
			<div class="wp-block-mizzou-card-deck miz-card-deck--grid miz-card-deck--grid-3">
				<!-- wp:mizzou/card {"links":[],"branded":true} -->
				<div class="miz-card miz-card--brand">
					<div class="miz-card__body">
						<h2 class="miz-card__title miz-card__title--mark"></h2>
					</div>
				</div>
				<!-- /wp:mizzou/card -->

				<!-- wp:mizzou/card {"links":[],"branded":true} -->
				<div class="miz-card miz-card--brand">
					<div class="miz-card__body">
						<h2 class="miz-card__title miz-card__title--mark"></h2>
					</div>
				</div>
				<!-- /wp:mizzou/card -->

				<!-- wp:mizzou/card {"links":[],"branded":true} -->
				<div class="miz-card miz-card--brand">
					<div class="miz-card__body">
						<h2 class="miz-card__title miz-card__title--mark"></h2>
					</div>
				</div>
				<!-- /wp:mizzou/card -->
			</div>
			<!-- /wp:mizzou/card-deck -->

			<!-- wp:mizzou/button-group {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-mizzou-button-group miz-button-group">
				<!-- wp:mizzou/button {"secondary":true,"branded":true} -->
				<a class="miz-button miz-button--brand miz-button--secondary"></a>
				<!-- /wp:mizzou/button -->
			</div>
			<!-- /wp:mizzou/button-group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
