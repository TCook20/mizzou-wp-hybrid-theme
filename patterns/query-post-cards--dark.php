<?php
/**
 * Title: Mizzou News Card - Dark
 * Slug: mizzou/query-news-card--dark
 * Block Types: core/post-template
 * Categories: query
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

<!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"flex","columns":2},"layout":{"inherit":true}} -->
<div class="wp-block-query">
	<!-- wp:post-template -->
		<!-- wp:group {"className":"miz-card miz-news-card miz-card--dark"} -->
		<div class="wp-block-group miz-card miz-news-card miz-card--dark">
			<!-- wp:post-featured-image {"className":"miz-card__image"} /-->
			<!-- wp:group {"className":"miz-card__body"} -->
			<div class="wp-block-group miz-card__body">
				<!-- wp:post-title {"isLink":true,"className":"miz-card__title"} /-->
				<!-- wp:post-excerpt {"className":"miz-card__text"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"className":"miz-pagination"} -->
	<!-- wp:query-pagination-previous /-->

	<!-- wp:query-pagination-numbers {"className":"miz-pagination__list"} /-->

	<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->
