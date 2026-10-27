<?php
/**
 * Kottakkal Theme - Appointment Booking Wizard & CF7 Integration
 *
 * Implements the 4-step appointment booking wizard matching the reference website:
 * 1. SERVICE (Doctor consultation, Care Pathways, Classical Therapies)
 * 2. DATE & TIME (21-day horizontal date selector & time windows)
 * 3. DETAILS (Full Name, Phone with Country Code dropdown, Email, Message, Privacy consent)
 * 4. REVIEW (Review summary definition list with inline edit triggers)
 * 5. CONFIRMATION (Checkmark, Reference ID, Direct call link)
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the 4-Step Appointment Booking Wizard
 *
 * @param string $selected_service Optional pre-selected service/pathway slug.
 */
function kottakkal_render_booking_wizard( $selected_service = '' ) {
	$contact   = kottakkal_get_contact_info();
	$pathways  = kottakkal_get_default_pathways();
	$treatments = kottakkal_get_default_treatments();

	// Generate 21 days starting today
	$days = array();
	$today = new DateTime( 'now', new DateTimeZone( 'Asia/Dubai' ) );
	for ( $i = 0; $i < 21; $i++ ) {
		$d = clone $today;
		$d->modify( "+{$i} day" );
		$days[] = array(
			'iso'     => $d->format( 'Y-m-d' ),
			'day_num' => $d->format( 'j' ),
			'weekday' => $i === 0 ? esc_html__( 'Today', 'oceanwp' ) : $d->format( 'D' ),
			'month'   => $d->format( 'M' ),
			'full'    => $d->format( 'D j M' ),
		);
	}
	?>
	<div class="kottakkal-wizard" id="kottakkalWizard" data-sel="<?php echo esc_attr( $selected_service ); ?>">
		<!-- Top Progress Stepper (4 Steps) -->
		<ol class="progress" aria-label="<?php esc_attr_e( 'Booking progress', 'oceanwp' ); ?>">
			<li data-pi="0" class="cur" aria-current="step">
				<i></i>
				<span><?php esc_html_e( '1. Service', 'oceanwp' ); ?></span>
			</li>
			<li data-pi="1">
				<i></i>
				<span><?php esc_html_e( '2. Date & Time', 'oceanwp' ); ?></span>
			</li>
			<li data-pi="2">
				<i></i>
				<span><?php esc_html_e( '3. Details', 'oceanwp' ); ?></span>
			</li>
			<li data-pi="3">
				<i></i>
				<span><?php esc_html_e( '4. Review', 'oceanwp' ); ?></span>
			</li>
		</ol>

		<form class="stepper" id="bkForm" novalidate>
			<!-- STEP 1: SERVICE -->
			<fieldset class="step on" data-st="0">
				<legend>
					<h3><?php esc_html_e( 'What would you like to book?', 'oceanwp' ); ?></h3>
				</legend>
				<p class="sub"><?php esc_html_e( 'Choose a consultation, a care pathway or a specific therapy.', 'oceanwp' ); ?></p>

				<div class="opts" role="radiogroup" aria-label="<?php esc_attr_e( 'Service selection', 'oceanwp' ); ?>">
					<!-- Wide Doctor Consultation Card -->
					<button type="button" class="opt wide" role="radio" aria-checked="false" tabindex="0" data-svc="consult">
						<b><?php esc_html_e( 'Consultation with a doctor', 'oceanwp' ); ?></b>
						<small><?php esc_html_e( 'Start here if you are unsure. Your doctor recommends a plan.', 'oceanwp' ); ?></small>
					</button>

					<!-- Care Pathway Cards -->
					<?php foreach ( $pathways as $p ) : ?>
						<button type="button" class="opt" role="radio" aria-checked="false" tabindex="-1" data-svc="<?php echo esc_attr( $p['id'] ); ?>">
							<b><?php echo esc_html( $p['name'] ); ?></b>
							<small><?php echo esc_html( $p['intro'] ); ?></small>
						</button>
					<?php endforeach; ?>
				</div>

				<!-- Classical Therapy Select Dropdown -->
				<div class="flds">
					<div class="fld full">
						<label for="bk-ther">
							<?php esc_html_e( 'Or a specific therapy', 'oceanwp' ); ?>
							<span class="opt-l"><?php esc_html_e( '(optional)', 'oceanwp' ); ?></span>
						</label>
						<select id="bk-ther" name="therapy_select">
							<option value=""><?php esc_html_e( 'Choose a therapy', 'oceanwp' ); ?></option>
							<?php foreach ( $treatments as $t ) : ?>
								<option value="<?php echo esc_attr( $t['id'] ); ?>">
									<?php echo esc_html( $t['name'] . ' · ' . $t['alt'] ); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<p class="bk-err" data-err="0" role="alert"></p>
			</fieldset>

			<!-- STEP 2: DATE & TIME -->
			<fieldset class="step" data-st="1">
				<legend>
					<h3><?php esc_html_e( 'When suits you?', 'oceanwp' ); ?></h3>
				</legend>
				<p class="sub"><?php esc_html_e( 'Choose a preferred day and time. We will confirm the exact time, subject to availability.', 'oceanwp' ); ?></p>

				<!-- 21-Day Horizontal Scroll Strip -->
				<div class="dates" role="radiogroup" aria-label="<?php esc_attr_e( 'Preferred date', 'oceanwp' ); ?>">
					<?php foreach ( $days as $i => $d ) : ?>
						<button type="button" class="date" role="radio" aria-checked="false" tabindex="<?php echo $i === 0 ? '0' : '-1'; ?>" data-date="<?php echo esc_attr( $d['iso'] ); ?>" aria-label="<?php echo esc_attr( $d['full'] ); ?>">
							<small><?php echo esc_html( $d['weekday'] ); ?></small>
							<b><?php echo esc_html( $d['day_num'] ); ?></b>
							<small><?php echo esc_html( $d['month'] ); ?></small>
						</button>
					<?php endforeach; ?>
				</div>

				<!-- Time Window Options -->
				<div class="times" role="radiogroup" aria-label="<?php esc_attr_e( 'Preferred time', 'oceanwp' ); ?>">
					<button type="button" class="opt" role="radio" aria-checked="false" tabindex="0" data-time="Morning, 9 am – 12 pm">
						<b><?php esc_html_e( 'Morning', 'oceanwp' ); ?></b>
						<small><?php esc_html_e( '9 am – 12 pm', 'oceanwp' ); ?></small>
					</button>
					<button type="button" class="opt" role="radio" aria-checked="false" tabindex="-1" data-time="Afternoon, 12 – 4 pm">
						<b><?php esc_html_e( 'Afternoon', 'oceanwp' ); ?></b>
						<small><?php esc_html_e( '12 – 4 pm', 'oceanwp' ); ?></small>
					</button>
					<button type="button" class="opt" role="radio" aria-checked="false" tabindex="-1" data-time="Evening, 4 – 9 pm">
						<b><?php esc_html_e( 'Evening', 'oceanwp' ); ?></b>
						<small><?php esc_html_e( '4 – 9 pm', 'oceanwp' ); ?></small>
					</button>
				</div>

				<p class="bk-err" data-err="1" role="alert"></p>
			</fieldset>

			<!-- STEP 3: DETAILS (Exact match to User Screenshot) -->
			<fieldset class="step" data-st="2">
				<legend>
					<h3><?php esc_html_e( 'Your details', 'oceanwp' ); ?></h3>
				</legend>
				<p class="sub"><?php esc_html_e( 'So our team can contact you to confirm.', 'oceanwp' ); ?></p>

				<div class="flds">
					<!-- Full Name Field -->
					<div class="fld full">
						<label for="bk-name"><?php esc_html_e( 'FULL NAME', 'oceanwp' ); ?></label>
						<input id="bk-name" type="text" autocomplete="name" aria-describedby="e-name" placeholder="" maxlength="60">
						<span class="err" id="e-name"></span>
					</div>

					<!-- Phone with Country Code Select -->
					<div class="fld">
						<span class="lbl" id="l-phone"><?php esc_html_e( 'PHONE', 'oceanwp' ); ?></span>
						<div class="phone">
							<select id="bk-cc" aria-label="<?php esc_attr_e( 'Country code', 'oceanwp' ); ?>" autocomplete="tel-country-code">
								<option value="+971" selected>UAE +971</option>
								<option value="+91">India +91</option>
								<option value="+966">KSA +966</option>
								<option value="+968">Oman +968</option>
								<option value="+974">Qatar +974</option>
								<option value="+973">Bahrain +973</option>
								<option value="+965">Kuwait +965</option>
								<option value="+44">UK +44</option>
								<option value="+1">US/CA +1</option>
								<option value="">Other</option>
							</select>
							<input id="bk-phone" type="tel" inputmode="numeric" pattern="[0-9]*" maxlength="10" autocomplete="tel-national" aria-labelledby="l-phone" aria-describedby="e-phone" placeholder="50 123 4567">
						</div>
						<span class="err" id="e-phone"></span>
					</div>

					<!-- Email Field -->
					<div class="fld">
						<label for="bk-email"><?php esc_html_e( 'EMAIL', 'oceanwp' ); ?></label>
						<input id="bk-email" type="email" autocomplete="email" aria-describedby="e-email" placeholder="">
						<span class="err" id="e-email"></span>
					</div>

					<!-- Optional Message Field -->
					<div class="fld full">
						<label for="bk-msg">
							<?php esc_html_e( 'MESSAGE', 'oceanwp' ); ?>
							<span class="opt-l"><?php esc_html_e( '(optional)', 'oceanwp' ); ?></span>
						</label>
						<textarea id="bk-msg" placeholder="<?php esc_attr_e( 'Anything you would like the doctor to know before your visit', 'oceanwp' ); ?>"></textarea>
					</div>

					<!-- Honeypot anti-spam field -->
					<div class="hp" aria-hidden="true" style="display:none;">
						<label for="bk-web"><?php esc_html_e( 'Website', 'oceanwp' ); ?></label>
						<input id="bk-web" tabindex="-1" autocomplete="off">
					</div>

					<!-- Privacy Policy Consent Checkbox -->
					<div class="fld full">
						<label class="consent" for="bk-consent">
							<input id="bk-consent" type="checkbox" aria-describedby="e-consent">
							<span>
								<?php
								printf(
									/* translators: %s: privacy policy link */
									esc_html__( 'I agree that Kottakkal GreenLife may use these details to contact me about my appointment, as set out in the %s.', 'oceanwp' ),
									'<a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '" target="_blank">' . esc_html__( 'privacy policy', 'oceanwp' ) . '</a>'
								);
								?>
							</span>
						</label>
						<span class="err" id="e-consent"></span>
					</div>
				</div>
			</fieldset>

			<!-- STEP 4: REVIEW -->
			<fieldset class="step" data-st="3">
				<legend>
					<h3><?php esc_html_e( 'Review your request', 'oceanwp' ); ?></h3>
				</legend>
				<p class="sub"><?php esc_html_e( 'Check the details, then send your request.', 'oceanwp' ); ?></p>
				<dl class="review" id="bk-review"></dl>
				<p class="bk-err" data-err="3" role="alert"></p>
			</fieldset>

			<!-- STEP 5: CONFIRMATION / DONE -->
			<div class="step" data-st="4" id="bk-done" tabindex="-1"></div>
		</form>

		<!-- Action Footer: Back Button, Step Indicator Note, Continue/Submit Button -->
		<div class="bk-actions" id="bk-actions">
			<button type="button" class="btn btn-line" id="bk-back" style="visibility:hidden;">
				<?php esc_html_e( 'Back', 'oceanwp' ); ?>
			</button>
			<span class="note" id="bk-note">
				<?php esc_html_e( 'Step 1 of 4', 'oceanwp' ); ?>
			</span>
			<button type="button" class="btn btn-solid" id="bk-next">
				<span class="btn-text"><?php esc_html_e( 'Continue', 'oceanwp' ); ?></span>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true">
					<path d="M1 8h13M9 3l5 5-5 5"/>
				</svg>
			</button>
		</div>
	</div>
	<?php
}

/**
 * Universal Form Render Entrypoint
 */
function kottakkal_render_contact_form( $selected_service = '' ) {
	kottakkal_render_booking_wizard( $selected_service );
}
add_shortcode( 'kottakkal_booking_form', 'kottakkal_render_contact_form' );
add_shortcode( 'kottakkal_booking_wizard', 'kottakkal_render_booking_wizard' );

/**
 * AJAX Handler for Appointment Booking Submission
 */
function kottakkal_handle_ajax_booking() {
	check_ajax_referer( 'kottakkal_booking_nonce', 'nonce' );

	// Honeypot trap check
	if ( ! empty( $_POST['website'] ) ) {
		wp_send_json_error( array( 'message' => 'Spam detected.' ) );
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$service = isset( $_POST['service'] ) ? sanitize_text_field( wp_unslash( $_POST['service'] ) ) : '';
	$date    = isset( $_POST['date'] ) ? sanitize_text_field( wp_unslash( $_POST['date'] ) ) : '';
	$time    = isset( $_POST['time'] ) ? sanitize_text_field( wp_unslash( $_POST['time'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $name ) || empty( $phone ) || empty( $email ) ) {
		wp_send_json_error( array( 'message' => 'Please fill in all required fields.' ) );
	}

	// Validate Name: letters and spaces only (no hyphens, numbers or special characters)
	if ( preg_match( '/[-0-9]/', $name ) || ! preg_match( '/^[\p{L}\s]{2,60}$/u', $name ) ) {
		wp_send_json_error( array( 'message' => 'Please enter a valid full name (letters and spaces only, no hyphens or symbols).' ) );
	}

	// Validate Phone: numbers only (check digit count)
	$clean_digits = preg_replace( '/\D/', '', $phone );
	if ( empty( $clean_digits ) || strlen( $clean_digits ) < 7 || strlen( $clean_digits ) > 15 ) {
		wp_send_json_error( array( 'message' => 'Please enter a valid phone number (numbers only).' ) );
	}

	// UAE specific check if +971 prefix is provided
	if ( strpos( $phone, '+971' ) !== false || strpos( $clean_digits, '971' ) === 0 ) {
		$uae_national = preg_replace( '/^(\+?971|00971)/', '', preg_replace( '/\s+/', '', $phone ) );
		$uae_digits   = preg_replace( '/\D/', '', $uae_national );
		if ( strlen( $uae_digits ) < 8 || strlen( $uae_digits ) > 10 ) {
			wp_send_json_error( array( 'message' => 'Please enter a valid 9-digit UAE phone number (e.g. 50 123 4567).' ) );
		}
	}

	if ( ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => 'Please enter a valid email address.' ) );
	}

	// Generate Reference ID
	$ref = 'KGL-' . strtoupper( substr( md5( uniqid( (string) mt_rand(), true ) ), 0, 5 ) );

	$admin_email = get_option( 'admin_email' );
	$contact     = kottakkal_get_contact_info();

	// 1. Save into Appointments CPT (Leads Inbox in wp-admin)
	$post_id = wp_insert_post( array(
		'post_type'    => 'kottakkal_booking',
		'post_title'   => sprintf( '[%s] %s', $ref, $name ),
		'post_content' => $message,
		'post_status'  => 'publish',
	) );

	if ( $post_id && ! is_wp_error( $post_id ) ) {
		update_post_meta( $post_id, '_bk_ref', $ref );
		update_post_meta( $post_id, '_bk_name', $name );
		update_post_meta( $post_id, '_bk_phone', $phone );
		update_post_meta( $post_id, '_bk_email', $email );
		update_post_meta( $post_id, '_bk_service', $service );
		update_post_meta( $post_id, '_bk_date', $date );
		update_post_meta( $post_id, '_bk_time', $time );
		update_post_meta( $post_id, '_bk_message', $message );
		update_post_meta( $post_id, '_bk_status', 'pending' );
	}

	// 2. Prepare Formatted Details & Links
	$date_obj = DateTime::createFromFormat( 'Y-m-d', $date );
	$formatted_date = $date_obj ? $date_obj->format( 'l, j F Y' ) : $date;
	$clean_phone = preg_replace( '/[^0-9]/', '', $phone );
	$wa_link = 'https://wa.me/' . ( ! empty( $clean_phone ) ? $clean_phone : '971547051545' );
	$submitted_at = current_time( 'j M Y, g:i a' );

	$official_email  = ! empty( $contact['email'] ) ? $contact['email'] : 'info@kottakkalgreenlife.com';
	$adila_email     = 'adilahamna4@gmail.com';

	// Both Kottakkal Official Mail and adilahamna4@gmail.com receive all booking details
	$recipients = array( $official_email, $adila_email );
	if ( ! empty( $admin_email ) && ! in_array( $admin_email, $recipients, true ) ) {
		$recipients[] = $admin_email;
	}
	$to = apply_filters( 'kottakkal_booking_notification_emails', $recipients, $ref );

	// 3. Email Notification to Kottakkal Official Mail & Admin (adilahamna4@gmail.com)
	$admin_subject = sprintf( '[Kottakkal Request] New Consultation: %s - %s (Ref: %s)', $service, $name, $ref );
	$admin_body = kottakkal_build_admin_booking_email_html( array(
		'ref'          => $ref,
		'name'         => $name,
		'phone'        => $phone,
		'clean_phone'  => $clean_phone,
		'wa_link'      => $wa_link,
		'email'        => $email,
		'service'      => $service,
		'date'         => $formatted_date,
		'time'         => $time,
		'message'      => $message,
		'submitted_at' => $submitted_at,
		'post_id'      => $post_id,
		'recipients'   => $recipients,
	) );

	$admin_headers = array(
		'Content-Type: text/html; charset=UTF-8',
		'From: Kottakkal Green Life Ayurvedic Center <info@kottakkalgreenlife.com>',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	wp_mail( $to, $admin_subject, $admin_body, $admin_headers );

	// 4. Confirmation Email to Client / Patient with Full Booking Details
	$client_subject = sprintf( 'Booking Request Received - Ref: %s - Kottakkal Green Life Ayurveda', $ref );
	$client_body = kottakkal_build_client_booking_email_html( array(
		'ref'            => $ref,
		'name'           => $name,
		'phone'          => $phone,
		'email'          => $email,
		'service'        => $service,
		'date'           => $formatted_date,
		'time'           => $time,
		'message'        => $message,
		'contact'        => $contact,
		'admin_recipient'=> $official_email,
	) );

	$client_headers = array(
		'Content-Type: text/html; charset=UTF-8',
		'From: Kottakkal Green Life Ayurvedic Center <info@kottakkalgreenlife.com>',
		'Reply-To: Kottakkal Green Life <info@kottakkalgreenlife.com>',
	);

	wp_mail( $email, $client_subject, $client_body, $client_headers );

	wp_send_json_success( array(
		'ref'     => $ref,
		'name'    => $name,
		'service' => $service,
		'date'    => $formatted_date,
		'time'    => $time,
		'phone'   => $contact['phone'],
		'tel'     => $contact['tel'],
	) );
}
add_action( 'wp_ajax_kottakkal_submit_booking', 'kottakkal_handle_ajax_booking' );
add_action( 'wp_ajax_nopriv_kottakkal_submit_booking', 'kottakkal_handle_ajax_booking' );

/**
 * Filter Contact Form 7 submissions to ensure recipients include Kottakkal official mail and adilahamna4@gmail.com
 */
add_filter( 'wpcf7_mail_components', function( $components, $form, $mail ) {
	if ( is_object( $mail ) && method_exists( $mail, 'name' ) && 'mail' === $mail->name() ) {
		$components['recipient'] = 'info@kottakkalgreenlife.com, adilahamna4@gmail.com';
	}
	return $components;
}, 10, 3 );

/**
 * Build Admin Notification HTML Email
 *
 * @param array $d Booking data.
 * @return string HTML email content.
 */
function kottakkal_build_admin_booking_email_html( $d ) {
	$notes_display = ! empty( $d['message'] ) ? nl2br( esc_html( $d['message'] ) ) : '<em style="color:#888;">None provided</em>';
	$dashboard_url = admin_url( 'edit.php?post_type=kottakkal_booking' );

	return '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>New Consultation Request</title>
</head>
<body style="margin:0; padding:0; background:#0B1411; font-family:\'Segoe UI\', Roboto, -apple-system, sans-serif; color:#E5E0D4; -webkit-font-smoothing:antialiased;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#0B1411; padding:32px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" style="max-width:620px; background:#13221C; border:1px solid rgba(216,190,136,0.25); border-radius:6px; overflow:hidden; box-shadow:0 12px 36px rgba(0,0,0,0.45);">
          <!-- Header -->
          <tr>
            <td style="background:#0E1A16; padding:28px 32px; border-bottom:1px solid rgba(216,190,136,0.2);">
              <div style="font-size:12px; letter-spacing:0.2em; text-transform:uppercase; color:#D8BE88; font-weight:600; margin-bottom:6px;">Kottakkal Green Life Ayurvedic Center · Dubai</div>
              <h1 style="margin:0; font-size:22px; color:#FAF7F2; font-weight:600; letter-spacing:-0.02em;">New Consultation Request</h1>
              <div style="margin-top:8px; font-size:13px; color:#A3AA9F;">Reference ID: <strong style="color:#FAF7F2; letter-spacing:0.05em;">' . esc_html( $d['ref'] ) . '</strong> · Submitted ' . esc_html( $d['submitted_at'] ) . '</div>
            </td>
          </tr>
          <!-- Main Content -->
          <tr>
            <td style="padding:28px 32px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin-bottom:24px;">
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:12px; text-transform:uppercase; letter-spacing:0.14em; color:#D8BE88; width:140px; vertical-align:top;">Requested Service</td>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:15px; color:#FAF7F2; font-weight:600;">' . esc_html( $d['service'] ) . '</td>
                </tr>
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:12px; text-transform:uppercase; letter-spacing:0.14em; color:#D8BE88; vertical-align:top;">Preferred Date</td>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:15px; color:#FAF7F2;">' . esc_html( $d['date'] ) . '</td>
                </tr>
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:12px; text-transform:uppercase; letter-spacing:0.14em; color:#D8BE88; vertical-align:top;">Preferred Time</td>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:15px; color:#FAF7F2;">' . esc_html( $d['time'] ) . '</td>
                </tr>
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:12px; text-transform:uppercase; letter-spacing:0.14em; color:#D8BE88; vertical-align:top;">Client Name</td>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:15px; color:#FAF7F2; font-weight:600;">' . esc_html( $d['name'] ) . '</td>
                </tr>
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:12px; text-transform:uppercase; letter-spacing:0.14em; color:#D8BE88; vertical-align:top;">Phone</td>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:15px; color:#FAF7F2;">
                    <a href="tel:' . esc_attr( $d['phone'] ) . '" style="color:#FAF7F2; text-decoration:underline;">' . esc_html( $d['phone'] ) . '</a>
                    &nbsp;&middot;&nbsp;
                    <a href="' . esc_url( $d['wa_link'] ) . '" target="_blank" style="color:#D8BE88; text-decoration:underline; font-size:13px;">Chat on WhatsApp &rarr;</a>
                  </td>
                </tr>
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:12px; text-transform:uppercase; letter-spacing:0.14em; color:#D8BE88; vertical-align:top;">Email</td>
                  <td style="padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.08); font-size:15px; color:#FAF7F2;">
                    <a href="mailto:' . esc_attr( $d['email'] ) . '" style="color:#FAF7F2; text-decoration:underline;">' . esc_html( $d['email'] ) . '</a>
                  </td>
                </tr>
                <tr>
                  <td style="padding:12px 0; font-size:12px; text-transform:uppercase; letter-spacing:0.14em; color:#D8BE88; vertical-align:top;">Message / Notes</td>
                  <td style="padding:12px 0; font-size:14px; color:#E5E0D4; line-height:1.6;">' . $notes_display . '</td>
                </tr>
              </table>

              <!-- CTA Button -->
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top:16px;">
                <tr>
                  <td align="center">
                    <a href="' . esc_url( $dashboard_url ) . '" target="_blank" style="display:inline-block; background:#B79A62; color:#0E1A16; font-size:13px; font-weight:700; letter-spacing:0.12em; text-transform:uppercase; padding:12px 28px; border-radius:3px; text-decoration:none;">View in WordPress Admin &rarr;</a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- Footer -->
          <tr>
            <td style="background:#0E1A16; padding:18px 32px; border-top:1px solid rgba(255,255,255,0.08); font-size:12px; color:#A3AA9F; text-align:center;">
              Recipients: info@kottakkalgreenlife.com &middot; adilahamna4@gmail.com &middot; Kottakkal Green Life Ayurvedic Center Website
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';
}

/**
 * Build Client Confirmation HTML Email with Full Booking Details
 *
 * @param array $d Booking data.
 * @return string HTML email content.
 */
function kottakkal_build_client_booking_email_html( $d ) {
	$notes_display = ! empty( $d['message'] ) ? nl2br( esc_html( $d['message'] ) ) : '<em style="color:#888;">None provided</em>';
	$c = $d['contact'];

	return '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Your Appointment Request Received</title>
</head>
<body style="margin:0; padding:0; background:#F5F2EA; font-family:\'Segoe UI\', Roboto, -apple-system, sans-serif; color:#272B27; -webkit-font-smoothing:antialiased;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#F5F2EA; padding:32px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" style="max-width:620px; background:#FFFFFF; border:1px solid #E5DFD1; border-radius:6px; overflow:hidden; box-shadow:0 12px 36px rgba(0,0,0,0.06);">
          <!-- Brand Header -->
          <tr>
            <td style="background:#0E1A16; padding:32px; text-align:center;">
              <div style="font-size:12px; letter-spacing:0.22em; text-transform:uppercase; color:#D8BE88; font-weight:600; margin-bottom:8px;">Kottakkal Green Life Ayurvedic Center L.L.C.</div>
              <h1 style="margin:0; font-size:24px; color:#FAF7F2; font-weight:500; font-family:Georgia, serif; letter-spacing:-0.02em;">Appointment Request Received</h1>
              <div style="margin-top:10px; font-size:13px; color:#A3AA9F;">Classical Kerala Ayurveda &middot; Al Qusais, Dubai</div>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="padding:32px;">
              <p style="font-size:16px; line-height:1.6; color:#272B27; margin:0 0 16px 0;">
                Dear <strong>' . esc_html( $d['name'] ) . '</strong>,
              </p>
              <p style="font-size:15px; line-height:1.65; color:#4A514B; margin:0 0 24px 0;">
                Thank you for contacting Kottakkal Green Life Ayurvedic Center. We have safely received your consultation booking request. Our medical coordinator is reviewing your preferred schedule and will contact you promptly to confirm your consultation slot.
              </p>

              <!-- Booking Summary Box -->
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#FBF9F4; border:1px solid #E8E2D5; border-radius:4px; margin-bottom:28px;">
                <tr>
                  <td style="padding:20px 24px; border-bottom:1px solid #E8E2D5;">
                    <span style="font-size:11px; letter-spacing:0.16em; text-transform:uppercase; color:#B79A62; font-weight:700;">Booking Reference</span>
                    <div style="font-size:20px; font-weight:700; color:#0E1A16; margin-top:4px; letter-spacing:0.04em;">' . esc_html( $d['ref'] ) . '</div>
                  </td>
                </tr>
                <tr>
                  <td style="padding:16px 24px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="padding:8px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.12em; color:#788075; width:140px;">Service</td>
                        <td style="padding:8px 0; font-size:15px; font-weight:600; color:#0E1A16;">' . esc_html( $d['service'] ) . '</td>
                      </tr>
                      <tr>
                        <td style="padding:8px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.12em; color:#788075;">Preferred Date</td>
                        <td style="padding:8px 0; font-size:15px; color:#0E1A16;">' . esc_html( $d['date'] ) . '</td>
                      </tr>
                      <tr>
                        <td style="padding:8px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.12em; color:#788075;">Preferred Time</td>
                        <td style="padding:8px 0; font-size:15px; color:#0E1A16;">' . esc_html( $d['time'] ) . '</td>
                      </tr>
                      <tr>
                        <td style="padding:8px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.12em; color:#788075;">Contact Phone</td>
                        <td style="padding:8px 0; font-size:15px; color:#0E1A16;">' . esc_html( $d['phone'] ) . '</td>
                      </tr>
                      <tr>
                        <td style="padding:8px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.12em; color:#788075;">Contact Email</td>
                        <td style="padding:8px 0; font-size:15px; color:#0E1A16;">' . esc_html( $d['email'] ) . '</td>
                      </tr>
                      <tr>
                        <td style="padding:8px 0; font-size:13px; text-transform:uppercase; letter-spacing:0.12em; color:#788075; vertical-align:top;">Notes</td>
                        <td style="padding:8px 0; font-size:14px; color:#4A514B; line-height:1.5;">' . $notes_display . '</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

              <!-- Next Steps -->
              <h2 style="font-size:16px; font-weight:600; color:#0E1A16; margin:0 0 12px 0;">What to Expect Next:</h2>
              <ol style="margin:0 0 28px 0; padding-left:20px; font-size:14px; line-height:1.7; color:#4A514B;">
                <li style="margin-bottom:8px;"><strong>Confirmation Call:</strong> Our clinic coordinator will call or WhatsApp you at <strong>' . esc_html( $d['phone'] ) . '</strong> to confirm the exact consultation time slot.</li>
                <li style="margin-bottom:8px;"><strong>Medical History:</strong> Please feel free to bring along any recent laboratory investigations, doctor prescriptions or scan reports for your doctor to review.</li>
                <li><strong>Arrival:</strong> We are conveniently located in Mozna Building #205, adjacent to Al Nahda Metro Station in Al Qusais 1, Dubai.</li>
              </ol>

              <!-- Clinic Contact Card -->
              <div style="background:#F6F8F6; border-left:3px solid #173F32; padding:18px 20px; border-radius:2px; font-size:14px; line-height:1.6; color:#272B27;">
                <strong>Need immediate assistance or wish to reschedule?</strong><br>
                Telephone: <a href="tel:' . esc_attr( $c['tel'] ) . '" style="color:#173F32; font-weight:600; text-decoration:underline;">' . esc_html( $c['phone'] ) . '</a><br>
                WhatsApp: <a href="' . esc_url( $c['whatsapp'] ) . '" target="_blank" style="color:#173F32; text-decoration:underline;">Click to message us on WhatsApp</a><br>
                Address: ' . esc_html( $c['addr1'] . ', ' . $c['addr2'] ) . '<br>
                Hours: ' . esc_html( $c['hours'] ) . '
              </div>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background:#FAFAF7; padding:20px 32px; border-top:1px solid #EAE6DC; font-size:12px; color:#788075; text-align:center; line-height:1.6;">
              &copy; ' . esc_html( date( 'Y' ) ) . ' Kottakkal Green Life Ayurvedic Center L.L.C. All rights reserved.<br>
              <a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '" style="color:#788075; text-decoration:underline;">Privacy Policy</a> &middot;
              <a href="' . esc_url( home_url( '/contact-us/' ) ) . '" style="color:#788075; text-decoration:underline;">Contact Us</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';
}

