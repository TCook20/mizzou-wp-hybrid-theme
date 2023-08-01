<?php
/**
 * Title: Featured News (Dynamic Posts)
 * Slug: mizzou/featured-news--dynamic
 * Description:
 * Block Types: core/template
 * Categories: layer
 * Keywords:
 * Inserter: yes
 *
 * @package WordPress
 * @subpackage Mizzou Hybrid Theme
 * @category theme
 * @category block pattern
 * @category Timber
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2023 Curators of the University of Missouri
 */

?>

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"miz-white","className":"miz-layer miz-layer\u002d\u002dbrand miz-main-grid__full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull miz-layer miz-layer--brand miz-main-grid__full has-miz-white-background-color has-background">
	<!-- wp:group {"className":"miz-container","layout":{"type":"default"}} -->
	<div class="wp-block-group miz-container">
		<!-- wp:group {"tagName":"header","className":"miz-layer__header miz-layer__header\u002d\u002dcenter","layout":{"type":"default"}} -->
		<header class="wp-block-group miz-layer__header miz-layer__header--center">
			<!-- wp:paragraph {"placeholder":"Add a kicker...","className":"miz-layer__kicker"} -->
			<p class="miz-layer__kicker"></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"placeholder":"Add a title...","className":"miz-layer__title"} -->
			<h2 class="wp-block-heading miz-layer__title"></h2>
			<!-- /wp:heading -->
		</header>
		<!-- /wp:group -->

		<!-- wp:group {"className":"miz-layer__content miz-layer__content\u002d\u002dcenter","layout":{"type":"default"}} -->
		<div class="wp-block-group miz-layer__content miz-layer__content--center">
			<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
			<div class="wp-block-query">
				<!-- wp:post-template {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"grid","columnCount":3}} -->
					<!-- wp:mizzou/card {"brand":true,"className":"miz-news-card"} -->
					<div class="miz-card miz-card--brand wp-block-mizzou-card miz-news-card">
						<!-- wp:mizzou/card-part {"type":"media"} -->
						<figure class="miz-card__media wp-block-mizzou-card-part">
							<!-- wp:post-featured-image {"className":"miz-news-card__thumb-container"} /-->
						</figure>
						<!-- /wp:mizzou/card-part -->

						<!-- wp:mizzou/card-part {"type":"body"} -->
						<div class="miz-card__body wp-block-mizzou-card-part">
							<!-- wp:post-title {"isLink":true,"className":"miz-card__title"} /-->

							<!-- wp:post-excerpt /-->
						</div>
						<!-- /wp:mizzou/card-part -->
					</div>
					<!-- /wp:mizzou/card -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
