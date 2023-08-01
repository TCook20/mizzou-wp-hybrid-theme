<?php
/**
 * Title: Mizzou News Card (Dark Variant)
 * Slug: mizzou/query-news-card--dark
 * Description:
 * Block Types: core/post-template
 * Categories: query
 * Inserter: yes
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

<!-- wp:query {"queryId":3,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"default"}} -->
<div class="wp-block-query">
	<!-- wp:post-template -->
		<!-- wp:mizzou/card {"brand":true,"theme":"dark","className":"miz-news-card"} -->
		<div class="miz-card miz-card--brand miz-card--dark wp-block-mizzou-card miz-news-card">
			<!-- wp:mizzou/card-part {"type":"media"} -->
			<figure class="miz-card__media wp-block-mizzou-card-part"><!-- wp:post-featured-image {"className":"miz-news-card__thumb-container"} /--></figure>
			<!-- /wp:mizzou/card-part -->

			<!-- wp:mizzou/card-part {"type":"body"} -->
			<div class="miz-card__body wp-block-mizzou-card-part">
				<!-- wp:post-title {"isLink":true,"className":"miz-card__title"} /-->

				<!-- wp:post-excerpt /-->
			</div>
			<!-- /wp:mizzou/card-part -->
		</div>
		<!-- /wp:mizzou/card -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination -->
	<!-- wp:query-pagination-previous /-->

	<!-- wp:query-pagination-numbers /-->

	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
	<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
	<p></p>
	<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
