<?php
/**
 * Template Name: Kottakkal - Contact Us
 * Description: Contact us page template with map and Contact Form 7.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$contact = kottakkal_get_contact_info();
?>

<!-- Header -->
<section class="phead">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php esc_html_e( 'Contact', 'oceanwp' ); ?></span>
		</nav>
		<span class="label"><?php esc_html_e( 'Contact', 'oceanwp' ); ?></span>
		<h1><?php esc_html_e( 'Visit, call or', 'oceanwp' ); ?> <em><?php esc_html_e( 'write to us', 'oceanwp' ); ?></em></h1>
		<p class="lede"><?php printf( esc_html__( 'Consultations %s.', 'oceanwp' ), esc_html( $contact['hours'] ) ); ?></p>
	</div>
</section>

<!-- Contact Details & Map Card -->
<section class="section" style="padding-top:0">
	<div class="wrap">
		<div class="ct-grid">
			<dl class="ct-list">
				<div class="ct-row">
					<dt><?php esc_html_e( 'Visit', 'oceanwp' ); ?></dt>
					<dd>
						<span class="big"><?php echo esc_html( $contact['addr1'] ); ?></span><br>
						<span class="muted"><?php echo esc_html( $contact['addr2'] ); ?></span>
					</dd>
					<span></span>
				</div>
				<div class="ct-row">
					<dt><?php esc_html_e( 'Call', 'oceanwp' ); ?></dt>
					<dd><a class="big" href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></dd>
					<button class="copy" type="button" data-copy="<?php echo esc_attr( $contact['phone'] ); ?>"><?php esc_html_e( 'Copy', 'oceanwp' ); ?></button>
				</div>
				<div class="ct-row">
					<dt><?php esc_html_e( 'Write', 'oceanwp' ); ?></dt>
					<dd><a class="big" href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></dd>
					<button class="copy" type="button" data-copy="<?php echo esc_attr( $contact['email'] ); ?>"><?php esc_html_e( 'Copy', 'oceanwp' ); ?></button>
				</div>
				<div class="ct-row">
					<dt><?php esc_html_e( 'Hours', 'oceanwp' ); ?></dt>
					<dd><?php printf( esc_html__( 'Consultations %s', 'oceanwp' ), esc_html( $contact['hours'] ) ); ?></dd>
					<span></span>
				</div>
			</dl>

			<div class="map" id="map">
				<svg class="streets" viewBox="0 0 600 460" preserveAspectRatio="xMidYMid slice" fill="none" stroke="currentColor" aria-hidden="true">
					<path d="M-20 330L640 250" stroke-width="16" stroke-opacity=".35"/>
					<path d="M-20 330L640 250" stroke-dasharray="10 10"/>
					<path d="M230 -20L330 480" stroke-width="7"/>
					<path d="M-20 140L640 100" stroke-width="4"/>
					<path d="M470 -20L520 480" stroke-width="4"/>
					<path d="M90 -20L130 480" stroke-width="3"/>
					<path d="M-20 420L640 380" stroke-width="3"/>
					<path d="M380 100L400 260" stroke-width="2"/>
					<rect x="128" y="300" width="40" height="18" rx="9" fill="currentColor" fill-opacity=".5"/>
					<g class="route"><path id="routePath" d="M150 300C200 290 260 280 300 240S340 190 348 175" stroke="currentColor" stroke-width="2.4" stroke-dasharray="6 8"/></g>
				</svg>
				<span class="lab" style="left:calc(25% - 30px); top:calc(65% + 22px)"><?php esc_html_e( 'Al Nahda Metro', 'oceanwp' ); ?></span>
				<span class="pin" aria-hidden="true"></span>
				<span class="lab" style="left:calc(58% + 22px); top:calc(38% - 6px)"><?php esc_html_e( 'Mozna Building', 'oceanwp' ); ?></span>
				<div class="card">
					<b><?php esc_html_e( 'Beside Al Nahda Metro Station', 'oceanwp' ); ?></b>
					<p><?php esc_html_e( 'Convenient location in Al Qusais 1, Dubai with easy metro and road access.', 'oceanwp' ); ?></p>
					<div style="display:flex; flex-wrap:wrap; gap:18px">
						<a class="link" href="<?php echo esc_url( $contact['dir'] ); ?>" target="_blank" rel="noopener">
							<?php esc_html_e( 'Get directions', 'oceanwp' ); ?>
							<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
						</a>
						<a class="link" href="<?php echo esc_url( $contact['maps'] ); ?>" target="_blank" rel="noopener">
							<?php esc_html_e( 'Open in Maps', 'oceanwp' ); ?>
							<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Appointment Booking Section (CF7) -->
<section class="booking dark section" id="booking" aria-labelledby="bk-h">
	<div class="wrap bk-grid">
		<div class="bk-copy">
			<span class="label"><?php esc_html_e( 'Appointments', 'oceanwp' ); ?></span>
			<h2 id="bk-h"><?php esc_html_e( 'Your journey to wellbeing', 'oceanwp' ); ?> <em><?php esc_html_e( 'begins here.', 'oceanwp' ); ?></em></h2>
			<p class="lede">
				<?php esc_html_e( 'Connect with our team to discuss your needs and arrange a consultation. It takes about a minute.', 'oceanwp' ); ?>
			</p>

			<dl class="bk-facts">
				<div><dt><?php esc_html_e( 'Hours', 'oceanwp' ); ?></dt><dd><?php echo esc_html( $contact['hours'] ); ?></dd></div>
				<div><dt><?php esc_html_e( 'Telephone', 'oceanwp' ); ?></dt><dd><a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></dd></div>
				<div><dt><?php esc_html_e( 'Email', 'oceanwp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></dd></div>
				<div><dt><?php esc_html_e( 'Visit', 'oceanwp' ); ?></dt><dd><?php echo esc_html( $contact['addr1'] . ', ' . $contact['addr2'] ); ?></dd></div>
			</dl>
		</div>

		<div class="panel" id="bkPanel">
			<?php kottakkal_render_contact_form(); ?>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
