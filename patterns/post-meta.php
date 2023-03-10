<?php
/**
 * Title: Post Meta
 * Slug: mizzou/post-meta
 * Block Types: core/template
 * Categories: page
 * Keywords: post meta, post, author
 * Post Types: post
 *
 * @package WordPress
 * @subpackage Mizzou Block Theme
 * @category theme
 * @category block pattern
 * @category Timber
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

?>

<!-- wp:spacer {"height":"0"} -->
<div style="height:0" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:separator {"opacity":"css","align":"wide","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignwide has-css-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|70"}},"fontSize":"small"} -->
	<div class="wp-block-columns alignwide has-small-font-size" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:column {"style":{"spacing":{"blockGap":"0rem"}}} -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph -->
				<p>Published</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-date /-->

				<!-- wp:paragraph -->
				<p>in</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-terms {"term":"category"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph -->
				<p>by</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"placeholder":"Author Name"} -->
				<p></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0rem"}}} -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0.5rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph -->
				<p>Tags:</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-terms {"term":"post_tag"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
