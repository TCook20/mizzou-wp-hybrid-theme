<?php
/**
 * Title: Dark Footer with Contact Card
 * Slug: mizzou/footer-dark-pattern
 * Block Types: core/template-part/footer
 * Categories: footer
 * Post Types: wp_template_part
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

<!-- wp:mizzou/footer {"theme":"dark"} -->
<footer class="miz-footer miz-footer--dark">
	<div class="miz-footer__layer">
		<div class="miz-footer__brand">
			<div class="miz-container">
				<div class="mu-sig-32 reverse">
					<p class="logo"><a href="https://missouri.edu">MU Logo</a></p>
					<h1 class="wordmark"><a href="https://missouri.edu">University of Missouri</a></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="miz-footer__layer">
		<div class="miz-footer__information">
			<!-- wp:mizzou/contact-card {"title":"Contact Us", "subtitle": "<?php echo get_bloginfo( 'name' ); ?>","theme":"dark"} -->
			<div class="miz-card miz-card--dark miz-contact-card">
				<div class="miz-card__body">
					<h2 class="miz-card__title">Contact Us</h2>
					<h3 class="miz-card__subtitle"><?php echo get_bloginfo( 'name' ); ?></h3>
					<address class="miz-card__address" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><p itemprop="streetAddress">228 Heinkel Building</p><p><span itemprop="addressLocality">Columbia</span>, <span itemprop="addressRegion">MO</span> <span itemprop="postalCode">65211</span></p></address>
				</div>
			</div>
			<!-- /wp:mizzou/contact-card -->
		</div>
	</div>
	<div class="miz-footer__layer">
		<div class="miz-container">
			<div class="miz-footer__eeoaa">
				<p>
					<small
					>MU is an
					<a href="//missouri.edu/eeo-aa/">
						equal opportunity/access/affirmative action/pro-disabled and veteran employer</a
					>
					and does not discriminate on the basis of sex in our education programs or activities,
					pursuant to Title IX and 34 CFR Part 106. For more information, visit
					<a href="//missouri.edu/eeo-aa/">MU’s Nondiscrimination Policy</a> or the
					<a
						href="https://mizzou.us/equity"
						>Office of Institutional Equity</a
					>.</small
					>
				</p>
			</div>
		</div>
	</div>
	<div class="miz-footer__layer miz-fill--black">
		<div class="miz-container">
			<div class="miz-footer__colophon">
				<div class="miz-colophon">
					<div class="miz-copyright">
						<p>
							<small
							>© <time datetime="2022">2022</time> — Curators of the
							<a href="//www.umsystem.edu/">University of Missouri</a>. All rights reserved.
							<a href="https://missouri.edu/copyright/">DMCA and other copyright information</a>.
							<a href="https://missouri.edu/privacy/">Privacy policy</a></small
							>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- /wp:mizzou/footer -->
