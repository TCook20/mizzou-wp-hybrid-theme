<?php
/**
 * Title: Gallery (2 Columns with No Caption)
 * Slug: mizzou/gallery--columns
 * Description:
 * Block Types: core/template
 * Categories: gallery
 * Keywords: image, gallery
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
	<!-- wp:columns {"templateLock":"insert","lock":{"move":false,"remove":true},"style":{"spacing":{"blockGap":{"top":"1rem"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"66.66%"} -->
		<div class="wp-block-column" style="flex-basis:66.66%">
			<!-- wp:image {"aspectRatio":"2/3","scale":"cover","sizeSlug":"full","linkDestination":"none","lock":{"move":false,"remove":true}} -->
			<figure class="wp-block-image size-full"><img alt="" style="aspect-ratio:2/3;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%","lock":{"move":false,"remove":false}} -->
		<div class="wp-block-column" style="flex-basis:33.33%">
			<!-- wp:group {"lock":{"move":true,"remove":true},"style":{"spacing":{"blockGap":"1.5rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none","lock":{"move":false,"remove":true}} -->
				<figure class="wp-block-image size-large"><img alt style="aspect-ratio:3/4;object-fit:cover"/></figure>
				<!-- /wp:image -->

				<!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none","lock":{"move":false,"remove":true}} -->
				<figure class="wp-block-image size-large"><img alt style="aspect-ratio:3/4;object-fit:cover"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
