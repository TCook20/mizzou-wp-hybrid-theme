<?php
/**
 * Title: Big Message (Default)
 * Slug: mizzou/big-message--default
 * Description: A full-width component for short messages with one to two action buttons.
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

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"miz-black\u002d\u002d100","className":"miz-layer miz-layer\u002d\u002dbrand miz-decoration miz-decoration__plus miz-decoration__plus\u002d\u002dbottom-right miz-main-grid__full","layout":{"type":"default"}} -->
<section class="wp-block-group alignfull miz-layer miz-layer--brand miz-decoration miz-decoration__plus miz-decoration__plus--bottom-right miz-main-grid__full has-miz-black-100-background-color has-background">
	<!-- wp:group {"templateLock":"all","lock":{"move":true,"remove":true},"className":"miz-container","layout":{"type":"default"}} -->
	<div class="wp-block-group miz-container">
		<!-- wp:group {"className":"miz-decoration miz-decoration__corner\u002d\u002dtop-left","layout":{"type":"default"}} -->
		<div class="wp-block-group miz-decoration miz-decoration__corner--top-left">
			<!-- wp:group {"backgroundColor":"miz-white","className":"miz-big-message__frame","layout":{"type":"default"}} -->
			<div class="wp-block-group miz-big-message__frame has-miz-white-background-color has-background">
				<!-- wp:group {"tagName":"header","className":"miz-layer__header miz-layer__header\u002d\u002dcenter","layout":{"type":"default"}} -->
				<header class="wp-block-group miz-layer__header miz-layer__header--center">
					<!-- wp:heading {"placeholder":"Add a title...","className":"miz-layer__title"} -->
					<h2 class="wp-block-heading miz-layer__title"></h2>
					<!-- /wp:heading -->
				</header>
				<!-- /wp:group -->

				<!-- wp:group {"className":"miz-layer__content miz-layer__content\u002d\u002dcenter miz-big-message__content","layout":{"type":"default"}} -->
				<div class="wp-block-group miz-layer__content miz-layer__content--center miz-big-message__content">
					<!-- wp:paragraph -->
					<p></p>
					<!-- /wp:paragraph -->
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
