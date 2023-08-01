<?php
/**
 * Title: Social (Gold Variant)
 * Slug: mizzou/social--gold
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

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"miz-gold","className":"miz-layer miz-layer\u002d\u002dbrand","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull miz-layer miz-layer--brand has-miz-gold-background-color has-background">
	<!-- wp:group {"lock":{"move":true,"remove":true},"className":"miz-container","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group miz-container">
		<!-- wp:group {"lock":{"move":false,"remove":true},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"placeholder":"Get more M-I-Z in your newsfeed","textColor":"miz-black","className":"miz-layer__title"} -->
			<h2 class="wp-block-heading miz-layer__title has-miz-black-color has-text-color"></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"lock":{"move":true,"remove":true},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group">
			<!-- wp:social-links {"iconColor":"miz-black","iconColorValue":"#222222","size":"has-huge-icon-size","style":{"spacing":{"blockGap":{"left":"1rem"}}},"className":"is-style-logos-only"} -->
			<ul class="wp-block-social-links has-huge-icon-size has-icon-color is-style-logos-only"></ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
