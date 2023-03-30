<?php
/**
 * Title: Content with Right Sidebar
 * Slug: mizzou/content-with-right-sidebar
 * Block Types: core/template-part
 * Categories: layout
 * Post Types: page
 * Keywords: layout, content, aside, sidebar
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

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"2rem"}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"66.66%"} -->
	<div class="wp-block-column" style="flex-basis:66.66%">
		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"33.33%"} -->
	<div class="wp-block-column" style="flex-basis:33.33%">
		<!-- wp:mizzou/sub-navigation {"name":"primary"} /-->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
