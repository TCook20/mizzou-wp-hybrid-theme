<?php
/**
 * Title: Site Footer with Contact Card (Dark Variant)
 * Slug: mizzou/site-footer--dark
 * Description:
 * Block Types: core/template-part/footer
 * Categories: footer
 * Post Types: wp_template_part
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

$card_title     = get_field( 'footer_contact_card_title', 'option' ) ? get_field( 'footer_contact_card_title', 'option' ) : 'Contact Us';
$site_name      = get_bloginfo( 'name' );
$email          = get_field( 'contact_email_contact_email_address', 'option' ) ? get_field( 'contact_email_contact_email_address', 'option' ) : '';
$street_address = get_field( 'contact_address_address_street', 'option' ) ? get_field( 'contact_address_address_street', 'option' ) : '';
$city           = get_field( 'contact_address_address_locality', 'option' ) ? get_field( 'contact_address_address_locality', 'option' ) : 'Columbia';
$state          = get_field( 'contact_address_address_region', 'option' ) ? get_field( 'contact_address_address_region', 'option' ) : 'MO';
$zip_code       = get_field( 'contact_address_address_postal_code', 'option' ) ? get_field( 'contact_address_address_postal_code', 'option' ) : '65211';
$phone          = get_field( 'contact_telephone', 'option' ) ? get_field( 'contact_telephone', 'option' ) : '';
?>

<!-- wp:mizzou/footer {"theme":"dark"} -->
<footer class="miz-footer miz-footer--dark wp-block-mizzou-footer">
	<!-- wp:mizzou/footer-section {"className":"miz-footer__brand"} -->
	<div class="miz-footer__layer">
		<div class="miz-container">
			<div class="wp-block-mizzou-footer-section miz-footer__brand">
				<!-- wp:mizzou/signature {"size":"medium","reverse":true} -->
				<div class="mu-sig-32 reverse">
					<p class="logo"><a href="https://missouri.edu">MU Logo</a></p>
					<h1 class="wordmark"><a href="https://missouri.edu">University of Missouri</a></h1>
				</div>
				<!-- /wp:mizzou/signature -->
			</div>
		</div>
	</div>
	<!-- /wp:mizzou/footer-section -->

	<!-- wp:mizzou/footer-section {"className":"miz-footer__information"} -->
	<div class="miz-footer__layer">
		<div class="miz-container">
			<div class="wp-block-mizzou-footer-section miz-footer__information">
				<!-- wp:mizzou/contact-card {"theme": "dark", "title": "<?php echo $card_title; ?>", "subtitle": "<?php echo $site_name; ?>", "email": "<?php echo $email; ?>", "phone": "<?php echo $phone; ?>", "address":{ "street": "<?php echo $street_address; ?>", "locality": "<?php echo $city; ?>", "region": "<?php echo $state; ?>", "postalCode": "<?php echo $zip_code; ?>"}} -->
				<div class="miz-card miz-card--dark miz-contact-card">
				<div class="miz-card__body">
						<h2 class="miz-card__title"><?php echo $card_title; ?></h2>
						<h3 class="miz-card__subtitle"><?php echo $site_name; ?></h3>
						<address class="miz-card__address" itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
							<p itemprop="streetAddress"><?php echo $street_address; ?></p>
							<p>
								<span itemprop="addressLocality"><?php echo $city; ?></span>,
								<span itemprop="addressRegion"><?php echo $state; ?></span>
								<span itemprop="postalCode"><?php echo $zip_code; ?></span>
							</p>
						</address>
						<?php if ( $email ) : ?>
						<p class="miz-card__text"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
						<?php endif; ?>

						<?php if ( $phone ) : ?>
						<p class="miz-card__text"><strong>Phone:</strong> <?php echo $phone; ?></p>
						<?php endif; ?>
					</div>
				</div>
				<!-- /wp:mizzou/contact-card -->
			</div>
		</div>
	</div>
	<!-- /wp:mizzou/footer-section -->

	<!-- wp:mizzou/footer-section {"className":"miz-footer__eeoaa"} -->
	<div class="miz-footer__layer">
		<div class="miz-container">
			<div class="wp-block-mizzou-footer-section miz-footer__eeoaa">
				<!-- wp:mizzou/eeoaa -->
				<p><small>MU is an <a href="//missouri.edu/eeo-aa/"> equal opportunity/access/affirmative action/pro-disabled and veteran employer</a> and does not discriminate on the basis of sex in our education programs or activities, pursuant to Title IX and 34 CFR Part 106. For more information, visit <a href="//missouri.edu/eeo-aa/">MU’s Nondiscrimination Policy</a> or the <a href="https://mizzou.us/equity">Office of Institutional Equity</a>.</small></p>
				<!-- /wp:mizzou/eeoaa -->
			</div>
		</div>
	</div>
	<!-- /wp:mizzou/footer-section -->

	<!-- wp:mizzou/footer-section {"darkFill":true,"className":"miz-footer__colophon"} -->
	<div class="miz-footer__layer miz-fill--black">
		<div class="miz-container">
			<div class="wp-block-mizzou-footer-section miz-footer__colophon"><!-- wp:mizzou/colophon /--></div>
		</div>
	</div>
	<!-- /wp:mizzou/footer-section -->
</footer>
<!-- /wp:mizzou/footer -->
