<?php
/**
 * Title: By the Numbers (Default)
 * Slug: mizzou/by-the-numbers
 * Description: A full-width component used to showcase three facts.
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
			<!-- wp:mizzou/by-the-numbers -->
			<div class="wp-block-mizzou-by-the-numbers miz-by-the-numbers__row">
				<!-- wp:mizzou/number-column -->
				<div class="miz-by-the-numbers__column">
					<p class="miz-by-the-numbers__number miz-text--black"></p>
					<p class="miz-by-the-numbers__text"></p>
				</div>
				<!-- /wp:mizzou/number-column -->

				<!-- wp:mizzou/number-column -->
				<div class="miz-by-the-numbers__column">
					<p class="miz-by-the-numbers__number miz-text--black"></p>
					<p class="miz-by-the-numbers__text"></p>
				</div>
				<!-- /wp:mizzou/number-column -->

				<!-- wp:mizzou/number-column -->
				<div class="miz-by-the-numbers__column">
					<p class="miz-by-the-numbers__number miz-text--black"></p>
					<p class="miz-by-the-numbers__text"></p>
				</div>
				<!-- /wp:mizzou/number-column -->
			</div>
			<!-- /wp:mizzou/by-the-numbers -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
