<?php
/**
 * Template Name: Kottakkal - About Us
 * Description: About us page template matching reference website.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$contact = kottakkal_get_contact_info();
?>

<!-- About Page Header -->
<section class="phead">
	<div class="wrap ph2">
		<div>
			<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php esc_html_e( 'About us', 'oceanwp' ); ?></span>
			</nav>
			<span class="label"><?php esc_html_e( 'About Kottakkal GreenLife', 'oceanwp' ); ?></span>
			<h1><?php esc_html_e( 'Igniting life', 'oceanwp' ); ?> <em><?php esc_html_e( 'with nature', 'oceanwp' ); ?></em></h1>
			<p class="lede">
				<?php esc_html_e( 'An Ayurvedic centre in the heart of Dubai, founded on a family’s Ayurvedic lineage and run by DHA-certified doctors and experienced therapists.', 'oceanwp' ); ?>
			</p>
			<div class="ph-acts">
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
					<?php esc_html_e( 'Book an appointment', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
				<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>">
					<?php esc_html_e( 'Meet our doctors', 'oceanwp' ); ?>
				</a>
			</div>
		</div>

		<div>
			<?php echo kottakkal_render_plate( 'about', 'leafy', 'forest', 'Herbs of the Kerala tradition', null ); ?>
		</div>
	</div>
</section>

<!-- Content & Sticky Sidebar Navigation -->
<section class="section" style="padding-top:0">
	<div class="wrap dgrid">
		<nav class="toc" aria-label="<?php esc_attr_e( 'On this page', 'oceanwp' ); ?>">
			<a href="#a1"><?php esc_html_e( 'Who we are', 'oceanwp' ); ?></a>
			<a href="#a2"><?php esc_html_e( 'Our CEO', 'oceanwp' ); ?></a>
			<a href="#a3"><?php esc_html_e( 'Where we are', 'oceanwp' ); ?></a>
		</nav>

		<div>
			<div class="dsec" id="a1">
				<h2><?php esc_html_e( 'Who we are', 'oceanwp' ); ?></h2>
				<p class="lede">
					<?php esc_html_e( 'Kottakkal Green Life Ayurvedic Center LLC is a centre for comprehensive Ayurvedic care in Al Qusais 1, Dubai, beside Al Nahda Metro Station.', 'oceanwp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Our services are built around each person: therapies are recommended only after a thorough patient review, under the supervision of DHA-certified Ayurvedic doctors. We offer personalised counselling and treatment for stress, detoxification and cleansing, relaxation and weight management, alongside a range of classical massage therapies.', 'oceanwp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Our care covers musculoskeletal and joint pain, postnatal care, injury recovery, degenerative and auto-immune conditions, and beauty, hair and eye care, using natural, toxin-free therapies in a calm and private setting.', 'oceanwp' ); ?>
				</p>
			</div>

			<div class="dsec" id="a2">
				<h2><?php esc_html_e( 'A message from our CEO', 'oceanwp' ); ?></h2>
				<p class="lede">
					<?php esc_html_e( 'Somarajan AR describes a centre inspired by his family’s Ayurvedic lineage and its contributions to Ayurveda, brought to the heart of Dubai.', 'oceanwp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'He speaks of authentic treatment methods drawn from the classical texts, practised with honesty and care, and credits the centre’s doctors and therapists as the heart of its work. His message is published in English and Arabic.', 'oceanwp' ); ?>
				</p>
				<p dir="rtl" lang="ar" class="muted">
					<?php esc_html_e( 'رسالة من الرئيس التنفيذي، سوماراجان أ.ر.', 'oceanwp' ); ?>
				</p>
			</div>

			<div class="dsec" id="a3">
				<h2><?php esc_html_e( 'Where we are', 'oceanwp' ); ?></h2>
				<div class="ct-grid">
					<dl class="ct-list" data-stagger>
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
							<g class="route">
								<path id="routePath" d="M150 300C200 290 260 280 300 240S340 190 348 175" stroke="currentColor" stroke-width="2.4" stroke-dasharray="6 8"/>
							</g>
						</svg>
						<span class="lab" style="left:calc(25% - 30px); top:calc(65% + 22px)"><?php esc_html_e( 'Al Nahda Metro', 'oceanwp' ); ?></span>
						<span class="pin" aria-hidden="true"></span>
						<span class="lab" style="left:calc(58% + 22px); top:calc(38% - 6px)"><?php esc_html_e( 'Mozna Building', 'oceanwp' ); ?></span>
						<div class="card">
							<b><?php esc_html_e( 'Beside Al Nahda Metro Station', 'oceanwp' ); ?></b>
							<p><?php esc_html_e( 'Illustrative map. Use directions for the exact route.', 'oceanwp' ); ?></p>
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
		</div>
	</div>
</section>

<!-- Action Band -->
<section class="band">
	<div class="wrap">
		<h2><?php esc_html_e( 'Begin with a', 'oceanwp' ); ?> <em><?php esc_html_e( 'consultation', 'oceanwp' ); ?></em></h2>
		<div style="display:flex; flex-wrap:wrap; gap:12px">
			<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
				<?php esc_html_e( 'Book an appointment', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">
				<?php esc_html_e( 'Contact our team', 'oceanwp' ); ?>
			</a>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
