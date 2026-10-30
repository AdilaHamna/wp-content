<?php
/**
 * Kottakkal Editorial Custom Footer Template
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri  = get_stylesheet_directory_uri();
$contact    = kottakkal_get_contact_info();
$treatments = kottakkal_get_treatments();
?>
</main><!-- /#main -->

<footer class="foot" id="foot">
	<div class="wrap">
		<div class="foot-cta">
			<h2 data-split><?php esc_html_e( 'Begin with a', 'oceanwp' ); ?> <em><?php esc_html_e( 'consultation.', 'oceanwp' ); ?></em></h2>
			<a class="orb mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
				<?php esc_html_e( 'Book an', 'oceanwp' ); ?><br><?php esc_html_e( 'appointment', 'oceanwp' ); ?>
			</a>
		</div>

		<div class="foot-grid">
			<div>
				<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Home', 'oceanwp' ); ?>">
					<img src="<?php echo esc_url( $theme_uri . '/assets/img/brand/logo-green.png' ); ?>" alt="Kottakkal Green Life Ayurvedic Center L.L.C., Igniting Life with Nature" width="657" height="380" style="height:160px; width:auto;" loading="lazy">
				</a>
				<p class="intro-t">
					<?php esc_html_e( 'Classical Ayurvedic therapies and personalised care under the supervision of DHA-certified Ayurvedic doctors, in Al Qusais, Dubai.', 'oceanwp' ); ?>
				</p>
				<div class="socials">
					<a href="<?php echo esc_url( $contact['ig'] ); ?>" target="_blank" rel="noopener" aria-label="Instagram">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.3" cy="6.7" r=".8" fill="currentColor"/></svg>
					</a>
					<a href="<?php echo esc_url( $contact['fb'] ); ?>" target="_blank" rel="noopener" aria-label="Facebook">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><path d="M14 21v-8h3l.5-3.5H14V7.6c0-1 .3-1.7 1.8-1.7h1.8V2.8A24 24 0 0 0 15 2.6c-2.6 0-4.3 1.6-4.3 4.4v2.5H8V13h2.7v8"/></svg>
					</a>
				</div>
			</div>

			<div>
				<h4><?php esc_html_e( 'Explore', 'oceanwp' ); ?></h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About us', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>"><?php esc_html_e( 'Treatments', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/specialties/' ) ); ?>"><?php esc_html_e( 'Care pathways', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>"><?php esc_html_e( 'Our doctors', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/wellness/' ) ); ?>"><?php esc_html_e( 'Wellness', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact', 'oceanwp' ); ?></a></li>
				</ul>
			</div>

			<div>
				<h4><?php esc_html_e( 'Therapies', 'oceanwp' ); ?></h4>
				<ul class="foot-cols">
					<?php foreach ( $treatments as $t ) :
						$t_link = ! empty( $t['link'] ) ? $t['link'] : home_url( '/treatments/' . $t['slug'] . '/' );
					?>
						<li><a href="<?php echo esc_url( $t_link ); ?>"><?php echo esc_html( $t['name'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div>
				<h4><?php esc_html_e( 'Visit', 'oceanwp' ); ?></h4>
				<ul>
					<li><?php echo esc_html( $contact['addr1'] ); ?><br><?php echo esc_html( $contact['addr2'] ); ?></li>
					<li><a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></li>
					<li><a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></li>
					<li><?php echo esc_html( $contact['hours'] ); ?></li>
				</ul>
			</div>
		</div>

		<div class="foot-badges" role="region" aria-label="<?php esc_attr_e( 'Trust Badges', 'oceanwp' ); ?>">
			<div class="foot-badge-capsule">
				<img class="fbc-icon fbc-leaf" src="<?php echo esc_url( $theme_uri . '/assets/img/badges/icon-leaf-mint.png' ); ?>" alt="" width="52" height="52" aria-hidden="true" loading="lazy">
				<span class="fbc-divider" aria-hidden="true"></span>
				<div class="fbc-text">
					<span class="fbc-val">100%</span>
					<span class="fbc-sub"><?php esc_html_e( 'Natural & Herbal', 'oceanwp' ); ?></span>
				</div>
			</div>
			<div class="foot-badge-capsule">
				<img class="fbc-icon fbc-mortar" src="<?php echo esc_url( $theme_uri . '/assets/img/badges/icon-mortar-mint.png' ); ?>" alt="" width="56" height="52" aria-hidden="true" loading="lazy">
				<span class="fbc-divider" aria-hidden="true"></span>
				<div class="fbc-text">
					<span class="fbc-val">5000</span>
					<span class="fbc-sub"><?php esc_html_e( 'Years of Heritage', 'oceanwp' ); ?></span>
				</div>
			</div>
			<div class="foot-badge-capsule foot-badge-dha">
				<img class="fbc-icon fbc-seal" src="<?php echo esc_url( $theme_uri . '/assets/img/badges/icon-dha-seal.png' ); ?>" alt="<?php esc_attr_e( 'Approved', 'oceanwp' ); ?>" width="50" height="50" loading="lazy">
				<span class="fbc-divider" aria-hidden="true"></span>
				<div class="fbc-text">
					<span class="fbc-val fbc-ar" dir="rtl" lang="ar">هيئة الصحة بدبي</span>
					<span class="fbc-sub">DUBAI HEALTH AUTHORITY</span>
				</div>
			</div>
		</div>

		<p class="disc">
			<?php esc_html_e( 'Medical disclaimer: information on this website is general and is not a diagnosis. Ayurvedic treatment complements medical care and does not replace it. Results vary between individuals. Please continue any treatment prescribed by your medical doctor.', 'oceanwp' ); ?>
		</p>

		<div class="legal-row">
			<span>© <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'oceanwp' ); ?></span>
			<nav aria-label="<?php esc_attr_e( 'Legal', 'oceanwp' ); ?>">
				<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy policy', 'oceanwp' ); ?></a>
				<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms and disclaimer', 'oceanwp' ); ?></a>
			</nav>
		</div>
	</div>

	<div class="wordmark" aria-hidden="true">Kottakkal</div>
</footer>

<div class="cursor-dot" id="cdot" aria-hidden="true"><?php esc_html_e( 'View', 'oceanwp' ); ?></div>

<div class="mbar" id="mbar">
	<a class="btn btn-solid" href="<?php echo esc_url( home_url( '/book/' ) ); ?>"><?php esc_html_e( 'Book an Appointment', 'oceanwp' ); ?></a>
	<a class="btn btn-line" href="tel:<?php echo esc_attr( $contact['tel'] ); ?>" aria-label="<?php esc_attr_e( 'Call the centre', 'oceanwp' ); ?>"><?php esc_html_e( 'Call', 'oceanwp' ); ?></a>
</div>

<?php wp_footer(); ?>
</body>
</html>
