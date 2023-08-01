<?php
/**
 * Title: Gallery (Title and Caption)
 * Slug: mizzou/gallery--title-caption
 * Description:
 * Block Types: core/template
 * Categories: gallery
 * Keywords: image, title, caption
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

<!-- wp:group {"tagName":"section","layout":{"type":"default"}} -->
<section class="wp-block-group">
	<!-- wp:media-text -->
	<div class="wp-block-media-text is-stacked-on-mobile">
		<figure class="wp-block-media-text__media"></figure>
		<div class="wp-block-media-text__content">
			<!-- wp:heading {"placeholder":"Add a title...","level":3,"lock":{"move":true,"remove":true}} -->
			<h3 class="wp-block-heading"></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"placeholder":"Content…"} -->
			<p></p>
			<!-- /wp:paragraph -->
		</div>
	</div>
	<!-- /wp:media-text -->
</section>
<!-- /wp:group -->
