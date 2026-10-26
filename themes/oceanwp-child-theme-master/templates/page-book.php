<?php
/**
 * Template Name: Kottakkal - Book Appointment
 * Description: Dedicated appointment booking page with Contact Form 7 integration.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$contact = kottakkal_get_contact_info();
$selected_service = isset( $_GET['service'] ) ? sanitize_text_field( wp_unslash( $_GET['service'] ) ) : '';
?>

<div class="bk-page-hero"></div>

<section class="booking-full">
	<div class="wrap bk-grid">
		<div class="bk-copy">
			<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>" style="color:var(--on-dark-2); margin-bottom:20px;">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:var(--on-dark-2);"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php esc_html_e( 'Book an appointment', 'oceanwp' ); ?></span>
			</nav>

			<span class="label"><?php esc_html_e( 'Appointments', 'oceanwp' ); ?></span>
			<h1><?php esc_html_e( 'Your journey to wellbeing', 'oceanwp' ); ?> <em><?php esc_html_e( 'begins here.', 'oceanwp' ); ?></em></h1>
			<p class="lede">
				<?php esc_html_e( 'Connect with our team to discuss your needs and arrange a consultation. Every appointment is reviewed by our DHA-certified Ayurvedic doctors.', 'oceanwp' ); ?>
			</p>

			<dl class="bk-facts">
				<div><dt><?php esc_html_e( 'Hours', 'oceanwp' ); ?></dt><dd><?php echo esc_html( $contact['hours'] ); ?></dd></div>
				<div><dt><?php esc_html_e( 'Telephone', 'oceanwp' ); ?></dt><dd><a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></dd></div>
				<div><dt><?php esc_html_e( 'Email', 'oceanwp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></dd></div>
				<div><dt><?php esc_html_e( 'Visit', 'oceanwp' ); ?></dt><dd><?php echo esc_html( $contact['addr1'] . ', ' . $contact['addr2'] ); ?></dd></div>
			</dl>
		</div>

		<div class="panel" id="bkPanel">
			<?php kottakkal_render_contact_form( $selected_service ); ?>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
