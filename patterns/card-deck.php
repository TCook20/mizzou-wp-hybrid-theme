<?php
/**
 * Title: Card Deck
 * Slug: mizzou/card-deck
 * Description:
 * Block Types: core/template
 * Categories: layer
 * Keywords: layer, cards
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
		<!-- wp:group {"tagName":"header","templateLock":false,"lock":{"move":true,"remove":false},"className":"miz-layer__header miz-layer__header\u002d\u002dcenter","layout":{"type":"default"}} -->
		<header class="wp-block-group miz-layer__header miz-layer__header--center">
			<!-- wp:paragraph {"placeholder":"Add a kicker...","lock":{"move":true,"remove":false},"className":"miz-layer__kicker"} -->
			<p class="miz-layer__kicker"></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"placeholder":"Add a title...","lock":{"move":true,"remove":false},"className":"miz-layer__title"} -->
			<h2 class="wp-block-heading miz-layer__title"></h2>
			<!-- /wp:heading -->
		</header>
		<!-- /wp:group -->

		<!-- wp:group {"lock":{"move":true,"remove":false},"className":"miz-layer__content","layout":{"type":"default"}} -->
		<div class="wp-block-group miz-layer__content">
			<!-- wp:mizzou/card-deck {"column":3,"className":"miz-card-deck\u002d\u002dgrid miz-card-deck\u002d\u002dgrid-3"} -->
			<div class="wp-block-mizzou-card-deck miz-card-deck miz-card-deck--3 miz-card-deck--grid miz-card-deck--grid-3">
				<!-- wp:mizzou/card {"className":"miz-card\u002d\u002dbrand"} -->
				<div class="miz-card wp-block-mizzou-card miz-card--brand">
					<!-- wp:mizzou/card-part {"type":"media","lock":{"move":true}} -->
					<figure class="miz-card__media wp-block-mizzou-card-part">
						<!-- wp:image {"className":"miz-card__image"} -->
						<figure class="wp-block-image miz-card__image"><img alt=""/></figure>
						<!-- /wp:image -->
					</figure>
					<!-- /wp:mizzou/card-part -->

					<!-- wp:mizzou/card-part {"type":"body","lock":{"move":true}} -->
					<div class="miz-card__body wp-block-mizzou-card-part">
						<!-- wp:heading {"placeholder":"Card Title","lock":{"move":true},"className":"miz-card__title"} -->
						<h2 class="wp-block-heading miz-card__title"></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"placeholder":"Card Content","className":"miz-card__text"} -->
						<p class="miz-card__text"></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:mizzou/card-part -->

					<!-- wp:mizzou/card-part {"type":"footer","lock":{"move":true}} -->
					<div class="miz-card__footer wp-block-mizzou-card-part">
						<!-- wp:mizzou/card-links -->
						<div class="wp-block-mizzou-card-links miz-card__links">
							<!-- wp:mizzou/card-link -->
							<a class="wp-block-mizzou-card-link miz-card__link"></a>
							<!-- /wp:mizzou/card-link -->
						</div>
						<!-- /wp:mizzou/card-links -->
					</div>
					<!-- /wp:mizzou/card-part -->
				</div>
				<!-- /wp:mizzou/card -->

				<!-- wp:mizzou/card {"className":"miz-card\u002d\u002dbrand"} -->
				<div class="miz-card wp-block-mizzou-card miz-card--brand">
					<!-- wp:mizzou/card-part {"type":"media","lock":{"move":true}} -->
					<figure class="miz-card__media wp-block-mizzou-card-part">
						<!-- wp:image {"className":"miz-card__image"} -->
						<figure class="wp-block-image miz-card__image"><img alt=""/></figure>
						<!-- /wp:image -->
					</figure>
					<!-- /wp:mizzou/card-part -->

					<!-- wp:mizzou/card-part {"type":"body","lock":{"move":true}} -->
					<div class="miz-card__body wp-block-mizzou-card-part">
						<!-- wp:heading {"placeholder":"Card Title","lock":{"move":true},"className":"miz-card__title"} -->
						<h2 class="wp-block-heading miz-card__title"></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"placeholder":"Card Content","className":"miz-card__text"} -->
						<p class="miz-card__text"></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:mizzou/card-part -->

					<!-- wp:mizzou/card-part {"type":"footer","lock":{"move":true}} -->
					<div class="miz-card__footer wp-block-mizzou-card-part">
						<!-- wp:mizzou/card-links -->
						<div class="wp-block-mizzou-card-links miz-card__links">
							<!-- wp:mizzou/card-link -->
							<a class="wp-block-mizzou-card-link miz-card__link"></a>
							<!-- /wp:mizzou/card-link -->
						</div>
						<!-- /wp:mizzou/card-links -->
					</div>
					<!-- /wp:mizzou/card-part -->
				</div>
				<!-- /wp:mizzou/card -->

				<!-- wp:mizzou/card {"className":"miz-card\u002d\u002dbrand"} -->
				<div class="miz-card wp-block-mizzou-card miz-card--brand">
					<!-- wp:mizzou/card-part {"type":"media","lock":{"move":true}} -->
					<figure class="miz-card__media wp-block-mizzou-card-part">
						<!-- wp:image {"className":"miz-card__image"} -->
						<figure class="wp-block-image miz-card__image"><img alt=""/></figure>
						<!-- /wp:image -->
					</figure>
					<!-- /wp:mizzou/card-part -->

					<!-- wp:mizzou/card-part {"type":"body","lock":{"move":true}} -->
					<div class="miz-card__body wp-block-mizzou-card-part">
						<!-- wp:heading {"placeholder":"Card Title","lock":{"move":true},"className":"miz-card__title"} -->
						<h2 class="wp-block-heading miz-card__title"></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"placeholder":"Card Content","className":"miz-card__text"} -->
						<p class="miz-card__text"></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:mizzou/card-part -->

					<!-- wp:mizzou/card-part {"type":"footer","lock":{"move":true}} -->
					<div class="miz-card__footer wp-block-mizzou-card-part">
						<!-- wp:mizzou/card-links -->
						<div class="wp-block-mizzou-card-links miz-card__links">
							<!-- wp:mizzou/card-link -->
							<a class="wp-block-mizzou-card-link miz-card__link"></a>
							<!-- /wp:mizzou/card-link -->
						</div>
						<!-- /wp:mizzou/card-links -->
					</div>
					<!-- /wp:mizzou/card-part -->
				</div>
				<!-- /wp:mizzou/card -->

			</div>
			<!-- /wp:mizzou/card-deck -->

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
