<?php
/**
 * Title: Call to Action (Gold Variant)
 * Slug: mizzou/call-to-action--gold
 * Description: A full-width card component that highlights up to two calls to action.
 * Block Types: core/template
 * Categories: layer
 * Keywords: call to action
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

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"miz-gold","className":"miz-layer miz-layer\u002d\u002dbrand miz-cta-layer miz-main-grid__full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull miz-layer miz-layer--brand miz-cta-layer miz-main-grid__full has-miz-gold-background-color has-background">
	<!-- wp:group {"templateLock":"all","lock":{"move":true,"remove":true},"className":"miz-container","layout":{"type":"default"}} -->
	<div class="wp-block-group miz-container">
		<!-- wp:group {"backgroundColor":"miz-black","className":"miz-cta-frame","layout":{"type":"default"}} -->
		<div class="wp-block-group miz-cta-frame has-miz-black-background-color has-background">
			<!-- wp:group {"tagName":"header","className":"miz-layer__header","layout":{"type":"default"}} -->
			<header class="wp-block-group miz-layer__header">
				<!-- wp:heading {"placeholder":"Add a title...","textColor":"miz-white","className":"miz-cta-title"} -->
				<h2 class="wp-block-heading miz-cta-title has-miz-white-color has-text-color"></h2>
				<!-- /wp:heading -->
			</header>
			<!-- /wp:group -->

			<!-- wp:group {"className":"miz-layer__content miz-cta-content","layout":{"type":"default"}} -->
			<div class="wp-block-group miz-layer__content miz-cta-content">
				<!-- wp:group {"className":"miz-cta-content__body","layout":{"type":"default"}} -->
				<div class="wp-block-group miz-cta-content__body">
					<!-- wp:paragraph {"textColor":"miz-white"} -->
					<p class="has-miz-white-color has-text-color"></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"miz-cta-content__action","layout":{"type":"default"}} -->
				<div class="wp-block-group miz-cta-content__action">
					<!-- wp:mizzou/button-group {"lock":{"move":true,"remove":false},"className":"miz-cta-button-group"} -->
					<div class="wp-block-mizzou-button-group miz-button-group miz-cta-button-group">
						<!-- wp:mizzou/button {"appearance":"ghost","branded":true,"variant":"primary","lock":{"move":false,"remove":false}} -->
						<a class="miz-button miz-button--brand miz-button--ghost miz-button--ghost-gold wp-block-mizzou-button"></a>
						<!-- /wp:mizzou/button -->
					</div>
					<!-- /wp:mizzou/button-group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
