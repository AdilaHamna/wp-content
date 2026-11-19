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
					<li><a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>"><?php esc_html_e( 'Testimonials', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php esc_html_e( 'Gallery', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/wellness/' ) ); ?>"><?php esc_html_e( 'Wellness', 'oceanwp' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact', 'oceanwp' ); ?></a></li>
				</ul>
			</div>

			<div>
				<h4><?php esc_html_e( 'Therapies', 'oceanwp' ); ?></h4>
				<?php
				$panchakarma_footer = array();
				foreach ( $treatments as $t ) {
					if ( ! empty( $t['paths'] ) && in_array( 'panchakarma', $t['paths'], true ) ) {
						$panchakarma_footer[] = $t;
					}
					if ( count( $panchakarma_footer ) >= 5 ) {
						break;
					}
				}
				if ( empty( $panchakarma_footer ) ) {
					$panchakarma_footer = array_slice( $treatments, 0, 5 );
				}

				$special_footer = array();
				foreach ( $treatments as $t ) {
					if ( ! empty( $t['paths'] ) && in_array( 'special', $t['paths'], true ) ) {
						$special_footer[] = $t;
					}
				}
				if ( empty( $special_footer ) ) {
					foreach ( $treatments as $t ) {
						if ( in_array( $t['slug'], array( 'post-natal-care', 'skin-hair-care' ), true ) ) {
							$special_footer[] = $t;
						}
					}
				}
				?>
				<div class="foot-therapies-wrap">
					<div class="foot-t-col">
						<ul>
							<?php foreach ( $panchakarma_footer as $t ) :
								$t_link = ! empty( $t['link'] ) ? $t['link'] : home_url( '/treatments/' . $t['slug'] . '/' );
							?>
								<li><a href="<?php echo esc_url( $t_link ); ?>"><?php echo esc_html( $t['name'] ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="foot-t-col">
						<ul>
							<?php foreach ( $special_footer as $t ) :
								$t_link = ! empty( $t['link'] ) ? $t['link'] : home_url( '/treatments/' . $t['slug'] . '/' );
							?>
								<li><a href="<?php echo esc_url( $t_link ); ?>"><?php echo esc_html( $t['name'] ); ?></a></li>
							<?php endforeach; ?>
							<li class="foot-all-link">
								<a href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>">
									<strong><?php esc_html_e( 'All 34 therapies →', 'oceanwp' ); ?></strong>
								</a>
							</li>
						</ul>
					</div>
				</div>
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
			<div class="foot-badge-capsule foot-badge-iw">
				<img class="fbc-icon fbc-iw" src="<?php echo esc_url( $theme_uri . '/assets/img/badges/badge-incredible-workplaces.png' ); ?>" alt="<?php esc_attr_e( 'Incredible Workplaces Certified 2026 UAE', 'oceanwp' ); ?>" width="46" height="42" loading="lazy">
				<span class="fbc-divider" aria-hidden="true"></span>
				<div class="fbc-text">
					<span class="fbc-val"><?php esc_html_e( 'Incredible Workplaces™', 'oceanwp' ); ?></span>
					<span class="fbc-sub"><?php esc_html_e( 'Certified 2026 · UAE', 'oceanwp' ); ?></span>
				</div>
			</div>
		</div>

		<p class="disc">
			<?php esc_html_e( 'Medical disclaimer: information on this website is general and is not a diagnosis. Ayurvedic treatment complements medical care and does not replace it. Results vary between individuals. Please continue any treatment prescribed by your medical doctor.', 'oceanwp' ); ?>
		</p>

		<div class="legal-row">
			<span>© <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> <?php esc_html_e( 'Green Life Ayurvedic Center LLC. All rights reserved.', 'oceanwp' ); ?></span>
			<span class="foot-credit"><?php esc_html_e( 'Website by', 'oceanwp' ); ?> <span class="agency-name">Creatick Marketing Solutions</span></span>
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

<!-- Floating WhatsApp Action -->
<a href="https://wa.me/971547051545" class="floating-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="<?php printf( esc_attr__( 'Chat with Kottakkal Green Life on WhatsApp (%s)', 'oceanwp' ), '+971 54 705 1545' ); ?>">
	<span class="fwa-tooltip"><?php esc_html_e( 'Chat on WhatsApp', 'oceanwp' ); ?></span>
	<span class="fwa-pulse" aria-hidden="true"></span>
	<span class="fwa-icon-wrap" aria-hidden="true">
		<svg viewBox="0 0 448 512" aria-hidden="true">
			<path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
		</svg>
	</span>
</a>

<?php wp_footer(); ?>
</body>
</html>
