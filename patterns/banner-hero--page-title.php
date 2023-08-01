<?php
/**
 * Title: Hero (Page Title)
 * Slug: mizzou/banner-hero--page-title
 * Description:
 * Block Types: core/template
 * Categories: banner
 * Keywords: layer, hero, cover, image
 * Inserter: no
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

<!-- wp:group {"tagName":"section","align":"full","className":"miz-main-grid__full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull miz-main-grid__full">
	<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"overlayColor":"miz-black","focalPoint":{"x":0.51,"y":1},"templateLock":"all","lock":{"move":true,"remove":true},"align":"full","style":{"spacing":{"blockGap":"2rem"}},"className":"miz-hero","layout":{"type":"default"}} -->
	<div class="wp-block-cover alignfull miz-hero">
		<span aria-hidden="true" class="wp-block-cover__background has-miz-black-background-color has-background-dim"></span>

		<div class="wp-block-cover__inner-container">
			<!-- wp:group {"className":"miz-hero__content","layout":{"type":"default"}} -->
			<div class="wp-block-group miz-hero__content">
				<!-- wp:paragraph {"placeholder":"Add a kicker...","lock":{"move":true,"remove":false},"textColor":"miz-white","className":"miz-hero__overline miz-clarendon"} -->
				<p class="miz-hero__overline miz-clarendon has-miz-white-color has-text-color"></p>
				<!-- /wp:paragraph -->

				<!-- wp:post-title {"className":"miz-hero__title","fontFamily":"miz-graphik","textColor":"miz-gold"} /-->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
</section>
<!-- /wp:group -->
