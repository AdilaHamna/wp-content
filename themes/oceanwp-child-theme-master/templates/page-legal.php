<?php
/**
 * Template Name: Kottakkal - Legal & Terms
 * Description: Privacy policy and terms/medical disclaimer template.
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
			<span aria-current="page"><?php the_title(); ?></span>
		</nav>
		<h1><?php the_title(); ?></h1>
		<span class="flag"><?php esc_html_e( 'Official policy & medical disclaimer', 'oceanwp' ); ?></span>
	</div>
</section>

<!-- Content -->
<section class="section" style="padding-top:0">
	<div class="wrap legal">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				the_content();
			endwhile;
		else :
		?>
			<h2><?php esc_html_e( 'Medical disclaimer', 'oceanwp' ); ?></h2>
			<p><?php esc_html_e( 'Information on this website is general and is not a diagnosis or a substitute for advice from your doctor. Ayurvedic treatment complements medical care and does not replace it. Results vary between individuals. Do not stop or change prescribed medicines without speaking to your medical doctor.', 'oceanwp' ); ?></p>

			<h2><?php esc_html_e( 'Appointments', 'oceanwp' ); ?></h2>
			<p><?php esc_html_e( 'Submitting a request does not confirm an appointment. Our team will contact you to confirm a time, subject to availability and to your doctor’s assessment of suitability.', 'oceanwp' ); ?></p>

			<h2><?php esc_html_e( 'Privacy & Personal Information', 'oceanwp' ); ?></h2>
			<p><?php esc_html_e( 'We handle personal information collected through this website with strict confidentiality. Details you enter when requesting an appointment (name, phone number, email address, preferred date and time, and notes) are used solely to arrange and confirm your care.', 'oceanwp' ); ?></p>
			<p><?php printf( esc_html__( 'To inquire about your data, contact our team at %s.', 'oceanwp' ), esc_html( $contact['email'] ) ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
