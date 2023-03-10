<?php
/**
 * Title: 404 Page
 * Slug: mizzou/404-content
 * Block Types: core/template-part
 * Categories: general
 * Keywords: error, 404
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

<!-- wp:paragraph -->
<p>Sorry, we can't seem to find that page.</p>
<!-- /wp:paragraph -->

<!-- wp:mizzou/search -->
<form action="/search/" method="get" class="miz-input-group"><label for="search-input" class="miz-label--hidden">Search</label><input type="text" class="miz-input" id="search-input" placeholder="Search this site" name="q"/><button class="miz-button miz-button--primary miz-button--small miz-button--icon miz-button--square-sm miz-input-group__button"><i class="miz-icon material-icons miz-icon--button miz-icon--md">search</i></button></form>
<!-- /wp:mizzou/search -->

<!-- wp:image {"url":"<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/campus-01-truman.jpg'; ?>"} -->
<figure class="wp-block-image"><img src="<?php echo esc_url( get_theme_file_uri() ) . '/assets/images/campus-01-truman.jpg'; ?>" alt=""/></figure>
<!-- /wp:image -->
