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

global $post, $wp_query;

$req_path   = trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
$is_privacy = ( $post && $post->post_name === 'privacy-policy' ) || strpos( $req_path, 'privacy' ) !== false;

if ( $is_privacy ) {
	$page_title = ( $post && ! empty( $post->post_title ) ) ? $post->post_title : __( 'Privacy policy', 'oceanwp' );
	$page_flag  = __( 'Official Privacy Policy & Data Protection', 'oceanwp' );
} else {
	$page_title = ( $post && ! empty( $post->post_title ) ) ? $post->post_title : __( 'Terms and medical disclaimer', 'oceanwp' );
	$page_flag  = __( 'Official Policy & Medical Disclaimer', 'oceanwp' );
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
			<span aria-current="page"><?php echo esc_html( $page_title ); ?></span>
		</nav>
		<h1><?php echo esc_html( $page_title ); ?></h1>
		<span class="flag"><?php echo esc_html( $page_flag ); ?></span>
	</div>
</section>

<!-- Content -->
<section class="section" style="padding-top:0">
	<div class="wrap">
		<div class="legal">
		<?php
		$has_custom_content = false;
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				$raw_content = get_the_content();
				$is_wp_boilerplate = strpos( $raw_content, 'privacy-policy-tutorial' ) !== false || strpos( $raw_content, 'Suggested text:' ) !== false;
				if ( ! empty( trim( strip_tags( $raw_content ) ) ) && ! $is_wp_boilerplate ) {
					the_content();
					$has_custom_content = true;
				}
			}
		}

		if ( ! $has_custom_content ) :
			if ( $is_privacy ) :
		?>
				<h2><?php esc_html_e( '1. Introduction & Overview', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'Kottakkal Green Life Ayurvedic Center LLC ("Kottakkal Green Life", "we", "our", or "the clinic") operates the website located at kottakkalgreenlife.com and provides traditional Ayurvedic clinical consultations, holistic therapies, and wellness care in Dubai, United Arab Emirates. We are committed to maintaining the confidentiality, privacy, and integrity of your personal information and health records in accordance with Dubai Health Authority (DHA) clinical regulations and applicable UAE data protection laws.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '2. Information We Collect', 'oceanwp' ); ?></h2>
				<p><?php esc_html_e( 'We collect personal and health information that you voluntarily provide to us when using our website or visiting our clinic in Dubai:', 'oceanwp' ); ?></p>
				<ul>
					<li><strong><?php esc_html_e( 'Contact & Identification Details:', 'oceanwp' ); ?></strong> <?php esc_html_e( 'Full name, telephone number, WhatsApp contact number, email address, and country of residence.', 'oceanwp' ); ?></li>
					<li><strong><?php esc_html_e( 'Appointment & Consultation Requests:', 'oceanwp' ); ?></strong> <?php esc_html_e( 'Preferred dates, preferred times, chosen physician or care pathway, and any preliminary health concerns you choose to communicate.', 'oceanwp' ); ?></li>
					<li><strong><?php esc_html_e( 'Medical & Clinical Records:', 'oceanwp' ); ?></strong> <?php esc_html_e( 'Health history, current medications, diagnosed medical conditions, pulse diagnosis (Nadi Pariksha) assessments, and doctor-prescribed treatment regimens recorded during your clinical consultations.', 'oceanwp' ); ?></li>
					<li><strong><?php esc_html_e( 'Technical & Browsing Data:', 'oceanwp' ); ?></strong> <?php esc_html_e( 'Anonymized server logs, browser type, device information, and interaction timestamps collected solely for system stability, security, and performance.', 'oceanwp' ); ?></li>
				</ul>

				<h2><?php esc_html_e( '3. Purpose of Processing Your Data', 'oceanwp' ); ?></h2>
				<p><?php esc_html_e( 'We process your personal information exclusively for the following lawful healthcare and administrative purposes:', 'oceanwp' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Scheduling, confirming, and managing your medical consultations and Ayurvedic therapeutic sessions.', 'oceanwp' ); ?></li>
					<li><?php esc_html_e( 'Enabling our DHA-certified Ayurvedic doctors and licensed therapists to deliver safe, personalized, and effective healthcare plans.', 'oceanwp' ); ?></li>
					<li><?php esc_html_e( 'Communicating appointment reminders, preparation instructions (such as dietary recommendations before Panchakarma), and follow-up care guidelines.', 'oceanwp' ); ?></li>
					<li><?php esc_html_e( 'Fulfilling legal, clinical, and regulatory obligations established by the Dubai Health Authority (DHA) and UAE healthcare governing bodies.', 'oceanwp' ); ?></li>
				</ul>

				<h2><?php esc_html_e( '4. Confidentiality & Non-Disclosure', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'We respect the confidentiality of your health data. Kottakkal Green Life does not sell, rent, lease, or trade personal or clinical information to any third parties or marketing agencies. Patient records are accessible solely to authorized clinical practitioners, treating therapists, and essential administrative staff bound by strict healthcare confidentiality obligations.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '5. Data Security & Storage', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'We implement rigorous technical, administrative, and physical safeguards to prevent unauthorized access, accidental alteration, disclosure, or destruction of your personal data. All online consultation requests submitted via our website are transmitted using Secure Socket Layer (SSL/TLS) encryption.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '6. Medical Record Retention & Patient Rights', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'Clinical documentation and consultation records are securely retained in compliance with UAE statutory medical recordkeeping standards. You retain the right to request access to your contact information, request corrections to inaccurate records, or seek clarification on our privacy practices at any time.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '7. Contact Our Privacy & Administrative Team', 'oceanwp' ); ?></h2>
				<p><?php esc_html_e( 'If you have any questions, concerns, or requests regarding this Privacy Policy or your personal health information, please reach out to us:', 'oceanwp' ); ?></p>
				<p>
					<strong><?php esc_html_e( 'Kottakkal Green Life Ayurvedic Center LLC', 'oceanwp' ); ?></strong><br>
					<?php echo esc_html( $contact['addr'] ); ?><br>
					<?php esc_html_e( 'Email:', 'oceanwp' ); ?> <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a><br>
					<?php esc_html_e( 'Phone / WhatsApp:', 'oceanwp' ); ?> <a href="<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a>
				</p>

				<div class="legal-nav-switch" style="margin-top:40px; padding:20px; background:var(--surface-3, #f5f8f6); border-radius:8px; border-left:3px solid var(--gold, #C5A059);">
					<p style="margin:0; font-size:0.92rem; color:var(--fg-2, #556);">
						<?php esc_html_e( 'Looking for clinic guidelines and medical terms? Please review our', 'oceanwp' ); ?>
						<a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>" style="color:var(--forest, #173F32); font-weight:600; text-decoration:underline;"><?php esc_html_e( 'Terms and medical disclaimer', 'oceanwp' ); ?></a>.
					</p>
				</div>

			<?php else : ?>

				<h2><?php esc_html_e( '1. Medical Disclaimer', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'The information, articles, treatment outlines, and dietary suggestions presented on this website are provided solely for general educational and informational purposes. Nothing contained on this site should be construed as medical advice, clinical diagnosis, or a guaranteed treatment outcome.', 'oceanwp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Ayurvedic healthcare is a complementary medical discipline designed to support natural healing and constitutional balance; it does not replace conventional medical treatment, emergency intervention, or specialist medical diagnoses. Individual results from Ayurvedic treatments and herbal preparations vary from person to person based on age, bodily constitution (Prakriti), health status, and adherence to prescribed routines.', 'oceanwp' ); ?>
				</p>
				<p>
					<strong><?php esc_html_e( 'Important:', 'oceanwp' ); ?></strong> <?php esc_html_e( 'Never discontinue, modify, or delay any prescription medication or conventional medical treatment prescribed by your licensed medical doctor without direct consultation with your attending healthcare physician.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '2. Appointment Requests & Booking Policy', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'Submitting an appointment request or consultation inquiry through our online booking form does not constitute a confirmed appointment or a binding contract. Once your request is received, our reception desk will contact you via telephone or WhatsApp to verify availability, review your preferred consultation slot, and confirm your scheduled visit.', 'oceanwp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'If you need to reschedule or cancel an appointment, we kindly ask that you provide at least 24 hours advance notice so that we may accommodate other patients in need of clinical attention.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '3. Clinical Consultations & Patient Disclosure', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'All clinical evaluations and therapies at Kottakkal Green Life Ayurvedic Center are supervised by licensed, DHA-certified Ayurvedic practitioners. For your personal safety, you are required to disclose your complete medical history, including any pre-existing chronic conditions, heart disorders, hypertension, skin allergies, ongoing pharmaceuticals, and pregnancy status before commencing any therapies (such as Panchakarma, Kizhi, or Shirodhara).', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '4. Website Content & Intellectual Property', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'All content, including text, photographs, botanical artwork, brand emblems, and custom code on this website, is the exclusive intellectual property of Kottakkal Green Life Ayurvedic Center LLC. Unauthorized reproduction, modification, distribution, or commercial exploitation without prior written consent is strictly prohibited.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '5. Limitation of Liability', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'While Kottakkal Green Life Ayurvedic Center endeavors to ensure the information on this website is accurate and current, we provide the website on an "as is" and "as available" basis without warranties of any kind. Under no circumstances shall Kottakkal Green Life Ayurvedic Center, its directors, physicians, or staff be liable for any direct, indirect, incidental, or consequential damages resulting from the use of, or inability to use, this website.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '6. Governing Law & Jurisdiction', 'oceanwp' ); ?></h2>
				<p>
					<?php esc_html_e( 'These terms and disclaimers are governed by and construed in accordance with the laws of the Emirate of Dubai and the applicable Federal Laws of the United Arab Emirates. Any dispute arising in connection with the use of this website or clinic services shall be subject to the exclusive jurisdiction of the competent courts of Dubai, UAE.', 'oceanwp' ); ?>
				</p>

				<h2><?php esc_html_e( '7. Inquiries & Feedback', 'oceanwp' ); ?></h2>
				<p><?php esc_html_e( 'For questions or feedback regarding our website terms, appointment policies, or medical disclaimers, please contact our clinic:', 'oceanwp' ); ?></p>
				<p>
					<strong><?php esc_html_e( 'Kottakkal Green Life Ayurvedic Center LLC', 'oceanwp' ); ?></strong><br>
					<?php echo esc_html( $contact['addr'] ); ?><br>
					<?php esc_html_e( 'Email:', 'oceanwp' ); ?> <a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a><br>
					<?php esc_html_e( 'Phone / WhatsApp:', 'oceanwp' ); ?> <a href="<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a>
				</p>

				<div class="legal-nav-switch" style="margin-top:40px; padding:20px; background:var(--surface-3, #f5f8f6); border-radius:8px; border-left:3px solid var(--gold, #C5A059);">
					<p style="margin:0; font-size:0.92rem; color:var(--fg-2, #556);">
						<?php esc_html_e( 'Want to know how we handle your personal data? Read our', 'oceanwp' ); ?>
						<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" style="color:var(--forest, #173F32); font-weight:600; text-decoration:underline;"><?php esc_html_e( 'Privacy policy', 'oceanwp' ); ?></a>.
					</p>
				</div>

			<?php endif; ?>
		<?php endif; ?>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
