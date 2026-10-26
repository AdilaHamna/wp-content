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
						<input id="bk-name" type="text" autocomplete="name" aria-describedby="e-name" placeholder="">
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
							<input id="bk-phone" type="tel" inputmode="tel" autocomplete="tel-national" aria-labelledby="l-phone" aria-describedby="e-phone" placeholder="50 123 4567">
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

	// 2. Email Notification to Clinic Admin & Staff
	$recipients = array( $admin_email );
	if ( ! empty( $contact['email'] ) && $contact['email'] !== $admin_email ) {
		$recipients[] = $contact['email'];
	}
	$to = apply_filters( 'kottakkal_booking_notification_emails', $recipients, $ref );

	$subject = sprintf( '[%s] New Appointment Request: %s (%s)', $ref, $service, $name );
	$body    = "New Appointment Request Received:\n\n" .
		"Reference ID: {$ref}\n" .
		"Service: {$service}\n" .
		"Preferred Date: {$date}\n" .
		"Preferred Time Window: {$time}\n\n" .
		"Client Name: {$name}\n" .
		"Phone Number: {$phone}\n" .
		"Email Address: {$email}\n\n" .
		"Message / Notes:\n" . ( $message ? $message : 'None provided' ) . "\n\n" .
		"View in WordPress Dashboard: " . admin_url( 'edit.php?post_type=kottakkal_booking' ) . "\n\n" .
		"--\nKottakkal GreenLife Ayurvedic Center Website";

	$headers = array(
		'From: Kottakkal GreenLife <' . $admin_email . '>',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	wp_mail( $to, $subject, $body, $headers );

	// 3. Confirmation Email to Client / Patient
	$client_subject = sprintf( 'Your Appointment Request: %s (Ref: %s)', $service, $ref );
	$client_body    = "Dear {$name},\n\n" .
		"Thank you for contacting Kottakkal Green Life Ayurvedic Center.\n\n" .
		"We have received your appointment request for:\n" .
		"• Service: {$service}\n" .
		"• Preferred Date: {$date}\n" .
		"• Preferred Time: {$time}\n" .
		"• Reference Number: {$ref}\n\n" .
		"Our team will contact you promptly on {$phone} to confirm your exact appointment schedule.\n\n" .
		"If you need immediate assistance or wish to reschedule, please call or WhatsApp us:\n" .
		"Telephone: {$contact['phone']}\n" .
		"Email: {$contact['email']}\n" .
		"Address: {$contact['addr1']}, {$contact['addr2']}\n" .
		"Hours: {$contact['hours']}\n\n" .
		"Warm regards,\n" .
		"Kottakkal Green Life Ayurvedic Center LLC";

	wp_mail( $email, $client_subject, $client_body, array( 'From: Kottakkal GreenLife <' . $admin_email . '>' ) );

	wp_send_json_success( array(
		'ref'     => $ref,
		'name'    => $name,
		'service' => $service,
		'date'    => $date,
		'time'    => $time,
		'phone'   => $contact['phone'],
		'tel'     => $contact['tel'],
	) );
}
add_action( 'wp_ajax_kottakkal_submit_booking', 'kottakkal_handle_ajax_booking' );
add_action( 'wp_ajax_nopriv_kottakkal_submit_booking', 'kottakkal_handle_ajax_booking' );
