<?php
/**
 * Title: Post Layout with Left Sidebar
 * Slug: mizzou/post-layout--left-sidebar
 * Description:
 * Categories: pages
 * Block Types: core/template-part
 * Post Types: post
 * Keywords: layout, content, aside, sidebar
 * Inserter: no
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

<!-- wp:post-featured-image {"align":"wide"} /-->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p>Published on </p>
			<!-- /wp:paragraph -->

			<!-- wp:post-date {"textAlign":"left","format":"M j, Y","style":{"layout":{"selfStretch":"fit","flexSize":null},"typography":{"fontStyle":"normal","fontWeight":"400"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p>Modified on </p>
			<!-- /wp:paragraph -->

			<!-- wp:post-date {"format":"M j, Y","displayType":"modified","style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p>By </p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"placeholder":"Author Name"} -->
			<p></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p>Categories: </p>
			<!-- /wp:paragraph -->

			<!-- wp:post-terms {"term":"category","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"layout":{"selfStretch":"fit","flexSize":null}}} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph -->
			<p>Tags: </p>
			<!-- /wp:paragraph -->

			<!-- wp:post-terms {"term":"post_tag"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
