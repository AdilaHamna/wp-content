<?php
/**
 * Kottakkal Custom Post Types & Meta Boxes
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Types
 */
function kottakkal_register_cpts() {
	// 1. Treatments CPT
	register_post_type( 'treatment', array(
		'labels' => array(
			'name'               => __( 'Treatments', 'oceanwp' ),
			'singular_name'      => __( 'Treatment', 'oceanwp' ),
			'add_new'            => __( 'Add New Treatment', 'oceanwp' ),
			'add_new_item'       => __( 'Add New Treatment', 'oceanwp' ),
			'edit_item'          => __( 'Edit Treatment', 'oceanwp' ),
			'new_item'           => __( 'New Treatment', 'oceanwp' ),
			'view_item'          => __( 'View Treatment', 'oceanwp' ),
			'search_items'       => __( 'Search Treatments', 'oceanwp' ),
			'not_found'          => __( 'No treatments found', 'oceanwp' ),
			'not_found_in_trash' => __( 'No treatments found in trash', 'oceanwp' ),
			'menu_name'          => __( 'Treatments', 'oceanwp' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'treatments', 'with_front' => false ),
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'menu_icon'    => 'dashicons-heart',
		'show_in_rest' => true,
	) );

	// 2. Care Pathways / Specialties CPT
	register_post_type( 'pathway', array(
		'labels' => array(
			'name'               => __( 'Care Pathways', 'oceanwp' ),
			'singular_name'      => __( 'Care Pathway', 'oceanwp' ),
			'add_new'            => __( 'Add New Pathway', 'oceanwp' ),
			'add_new_item'       => __( 'Add New Care Pathway', 'oceanwp' ),
			'edit_item'          => __( 'Edit Care Pathway', 'oceanwp' ),
			'new_item'           => __( 'New Care Pathway', 'oceanwp' ),
			'view_item'          => __( 'View Care Pathway', 'oceanwp' ),
			'search_items'       => __( 'Search Pathways', 'oceanwp' ),
			'not_found'          => __( 'No pathways found', 'oceanwp' ),
			'menu_name'          => __( 'Care Pathways', 'oceanwp' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'specialties', 'with_front' => false ),
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'menu_icon'    => 'dashicons-randomize',
		'show_in_rest' => true,
	) );

	// 3. Doctors CPT
	register_post_type( 'doctor', array(
		'labels' => array(
			'name'               => __( 'Doctors', 'oceanwp' ),
			'singular_name'      => __( 'Doctor', 'oceanwp' ),
			'add_new'            => __( 'Add New Doctor', 'oceanwp' ),
			'add_new_item'       => __( 'Add New Doctor', 'oceanwp' ),
			'edit_item'          => __( 'Edit Doctor', 'oceanwp' ),
			'new_item'           => __( 'New Doctor', 'oceanwp' ),
			'view_item'          => __( 'View Doctor', 'oceanwp' ),
			'search_items'       => __( 'Search Doctors', 'oceanwp' ),
			'not_found'          => __( 'No doctors found', 'oceanwp' ),
			'menu_name'          => __( 'Our Doctors', 'oceanwp' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'doctors', 'with_front' => false ),
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		'menu_icon'    => 'dashicons-id',
		'show_in_rest' => true,
	) );

	// 4. Testimonials CPT
	register_post_type( 'testimonial', array(
		'labels' => array(
			'name'          => __( 'Testimonials', 'oceanwp' ),
			'singular_name' => __( 'Testimonial', 'oceanwp' ),
			'add_new'       => __( 'Add Testimonial', 'oceanwp' ),
			'edit_item'     => __( 'Edit Testimonial', 'oceanwp' ),
			'menu_name'     => __( 'Testimonials', 'oceanwp' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
		'menu_icon'    => 'dashicons-format-quote',
		'show_in_rest' => true,
	) );

	// 5. Appointments CPT (Online Leads & Requests Inbox)
	register_post_type( 'kottakkal_booking', array(
		'labels' => array(
			'name'               => __( 'Appointments', 'oceanwp' ),
			'singular_name'      => __( 'Appointment', 'oceanwp' ),
			'add_new'            => __( 'Add Appointment', 'oceanwp' ),
			'add_new_item'       => __( 'Add New Appointment', 'oceanwp' ),
			'edit_item'          => __( 'View / Edit Appointment', 'oceanwp' ),
			'new_item'           => __( 'New Appointment', 'oceanwp' ),
			'view_item'          => __( 'View Appointment', 'oceanwp' ),
			'search_items'       => __( 'Search Appointments', 'oceanwp' ),
			'not_found'          => __( 'No appointments found', 'oceanwp' ),
			'menu_name'          => __( 'Appointments', 'oceanwp' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'supports'     => array( 'title', 'editor', 'custom-fields' ),
		'menu_icon'    => 'dashicons-calendar-alt',
		'menu_position'=> 26,
		'show_in_rest' => false,
	) );
}
add_action( 'init', 'kottakkal_register_cpts' );

/**
 * Register Meta Boxes for CPTs
 */
function kottakkal_add_meta_boxes() {
	add_meta_box( 'kottakkal_treatment_meta', __( 'Treatment Details & Botanical Art', 'oceanwp' ), 'kottakkal_render_treatment_metabox', 'treatment', 'normal', 'high' );
	add_meta_box( 'kottakkal_doctor_meta', __( 'Doctor Credentials & Specialities', 'oceanwp' ), 'kottakkal_render_doctor_metabox', 'doctor', 'normal', 'high' );
	add_meta_box( 'kottakkal_pathway_meta', __( 'Pathway Details & Mappings', 'oceanwp' ), 'kottakkal_render_pathway_metabox', 'pathway', 'normal', 'high' );
	add_meta_box( 'kottakkal_testimonial_meta', __( 'Patient Story Details', 'oceanwp' ), 'kottakkal_render_testimonial_metabox', 'testimonial', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'kottakkal_add_meta_boxes' );

/**
 * Treatment Meta Box Render
 */
function kottakkal_render_treatment_metabox( $post ) {
	wp_nonce_field( 'kottakkal_treatment_nonce_action', 'kottakkal_treatment_nonce' );

	$alt     = get_post_meta( $post->ID, '_kottakkal_alt', true );
	$meaning = get_post_meta( $post->ID, '_kottakkal_meaning', true );
	$ing     = get_post_meta( $post->ID, '_kottakkal_ing', true );
	$ill     = get_post_meta( $post->ID, '_kottakkal_ill', true ) ?: 'drop';
	$tone    = get_post_meta( $post->ID, '_kottakkal_tone', true ) ?: 'oil';
	$purpose = get_post_meta( $post->ID, '_kottakkal_purpose', true );
	$caution = get_post_meta( $post->ID, '_kottakkal_caution', true );
	$paths   = get_post_meta( $post->ID, '_kottakkal_paths', true );
	if ( ! is_array( $paths ) ) {
		$paths = array_filter( array_map( 'trim', explode( ',', (string) $paths ) ) );
	}

	$facts = get_post_meta( $post->ID, '_kottakkal_facts', true );
	$facts_text = '';
	if ( is_array( $facts ) ) {
		foreach ( $facts as $f ) {
			$facts_text .= $f[0] . ': ' . $f[1] . "\n";
		}
	} else {
		$facts_text = (string) $facts;
	}

	$tones = array( 'oil' => 'Warm Gold (Oil)', 'forest' => 'Deep Forest (Green)', 'clay' => 'Earth Clay (Terracotta)', 'sage' => 'Light Sage (Soft Green)', 'ivory' => 'Pure Ivory (Golden)', 'saffron' => 'Saffron (Sun Amber)', 'night' => 'Deep Botanical Night' );
	$ills = array( 'drop' => 'Oil Droplet', 'pouch' => 'Herbal Kizhi Pouch', 'stream' => 'Shirodhara Stream', 'rice' => 'Njavara Rice Plant', 'ring' => 'Black Gram Dough Ring', 'pour' => 'Pizhichil Continuous Stream', 'nasya' => 'Nasya Dropper', 'eye' => 'Netra Tarpanam Eye Well', 'powder' => 'Herbal Udwarthanam Powder', 'banana' => 'Banana Leaf Wrap', 'turmeric' => 'Turmeric & Rice Pods', 'leafy' => 'Botanical Herbal Foliage' );
	$all_paths = array( 'joint' => 'Joint & Muscle (Musculoskeletal)', 'relax' => 'Rest & Renewal (Relaxation)', 'beauty' => 'Skin, Hair & Eyes (Beauty)', 'weight' => 'Weight & Metabolism (Obesity)', 'postnatal' => 'Postnatal Care', 'degenerative' => 'Long-Term & Auto-Immune' );
	?>
	<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
		<div>
			<label><strong>Alternate Name / Sanskrit Subtitle:</strong></label><br>
			<input type="text" name="_kottakkal_alt" value="<?php echo esc_attr( $alt ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Ayurvedic oil massage">
		</div>
		<div>
			<label><strong>Name Meaning (Optional):</strong></label><br>
			<input type="text" name="_kottakkal_meaning" value="<?php echo esc_attr( $meaning ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Shiro, the head · Dhara, a flow">
		</div>
	</div>

	<div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-bottom:14px;">
		<div>
			<label><strong>Key Ingredient:</strong></label><br>
			<input type="text" name="_kottakkal_ing" value="<?php echo esc_attr( $ing ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Medicated herbal oil">
		</div>
		<div>
			<label><strong>Botanical Color Tone:</strong></label><br>
			<select name="_kottakkal_tone" style="width:100%; margin-top:4px;">
				<?php foreach ( $tones as $key => $lbl ) : ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $tone, $key ); ?>><?php echo esc_html( $lbl ); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div>
			<label><strong>Botanical Illustration Type:</strong></label><br>
			<select name="_kottakkal_ill" style="width:100%; margin-top:4px;">
				<?php foreach ( $ills as $key => $lbl ) : ?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $ill, $key ); ?>><?php echo esc_html( $lbl ); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

	<div style="margin-bottom:14px;">
		<label><strong>What It Is For (Purpose summary):</strong></label><br>
		<textarea name="_kottakkal_purpose" rows="3" style="width:100%; margin-top:4px;" placeholder="Traditional use and clinical purpose..."><?php echo esc_textarea( $purpose ); ?></textarea>
	</div>

	<div style="margin-bottom:14px;">
		<label><strong>Before You Book / Caution Note:</strong></label><br>
		<textarea name="_kottakkal_caution" rows="2" style="width:100%; margin-top:4px;" placeholder="Optional caution note or contraindication..."><?php echo esc_textarea( $caution ); ?></textarea>
	</div>

	<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
		<div>
			<label><strong>Key Facts (One per line, Format: Key: Value):</strong></label><br>
			<textarea name="_kottakkal_facts" rows="4" style="width:100%; margin-top:4px;" placeholder="Duration: 45 to 60 minutes&#10;Medium: Medicated herbal oils"><?php echo esc_textarea( $facts_text ); ?></textarea>
		</div>
		<div>
			<label><strong>Associated Care Pathways:</strong></label><br>
			<div style="margin-top:6px; display:grid; gap:6px;">
				<?php foreach ( $all_paths as $pval => $plbl ) : ?>
					<label><input type="checkbox" name="_kottakkal_paths[]" value="<?php echo esc_attr( $pval ); ?>" <?php checked( in_array( $pval, $paths ) ); ?>> <?php echo esc_html( $plbl ); ?></label>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Doctor Meta Box Render
 */
function kottakkal_render_doctor_metabox( $post ) {
	wp_nonce_field( 'kottakkal_doctor_nonce_action', 'kottakkal_doctor_nonce' );

	$role  = get_post_meta( $post->ID, '_kottakkal_role', true ) ?: 'Ayurveda Practitioner';
	$mono  = get_post_meta( $post->ID, '_kottakkal_mono', true );
	$tone  = get_post_meta( $post->ID, '_kottakkal_tone', true ) ?: 'forest';
	$creds = get_post_meta( $post->ID, '_kottakkal_creds', true );
	$specs = get_post_meta( $post->ID, '_kottakkal_specs', true );

	$creds_text = is_array( $creds ) ? implode( "\n", $creds ) : (string) $creds;
	$specs_text = is_array( $specs ) ? implode( ', ', $specs ) : (string) $specs;
	?>
	<div style="display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:16px; margin-bottom:14px;">
		<div>
			<label><strong>Designation / Role:</strong></label><br>
			<input type="text" name="_kottakkal_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Medical Director">
		</div>
		<div>
			<label><strong>Monogram Letters:</strong></label><br>
			<input type="text" name="_kottakkal_mono" value="<?php echo esc_attr( $mono ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. NR">
		</div>
		<div>
			<label><strong>Profile Tone:</strong></label><br>
			<select name="_kottakkal_tone" style="width:100%; margin-top:4px;">
				<option value="forest" <?php selected( $tone, 'forest' ); ?>>Forest Green</option>
				<option value="night" <?php selected( $tone, 'night' ); ?>>Deep Botanical Night</option>
				<option value="clay" <?php selected( $tone, 'clay' ); ?>>Clay Terracotta</option>
			</select>
		</div>
	</div>

	<div style="margin-bottom:14px;">
		<label><strong>Qualifications & Credentials (One per line):</strong></label><br>
		<textarea name="_kottakkal_creds" rows="4" style="width:100%; margin-top:4px;" placeholder="DHA- and MOH-certified Ayurvedic practitioner&#10;KMCT Ayurveda Medical College, Calicut&#10;10+ years’ clinical experience"><?php echo esc_textarea( $creds_text ); ?></textarea>
	</div>

	<div style="margin-bottom:14px;">
		<label><strong>Specialisations / Focus Areas (Comma separated):</strong></label><br>
		<input type="text" name="_kottakkal_specs" value="<?php echo esc_attr( $specs_text ); ?>" style="width:100%; margin-top:4px;" placeholder="Panchakarma, Women’s health, Postnatal care, Musculoskeletal disorders">
	</div>
	<?php
}

/**
 * Pathway Meta Box Render
 */
function kottakkal_render_pathway_metabox( $post ) {
	wp_nonce_field( 'kottakkal_pathway_nonce_action', 'kottakkal_pathway_nonce' );

	$short     = get_post_meta( $post->ID, '_kottakkal_short', true );
	$need      = get_post_meta( $post->ID, '_kottakkal_need', true );
	$approach  = get_post_meta( $post->ID, '_kottakkal_approach', true );
	$tone      = get_post_meta( $post->ID, '_kottakkal_tone', true ) ?: 'clay';
	$ill       = get_post_meta( $post->ID, '_kottakkal_ill', true ) ?: 'leafy';
	$therapies = get_post_meta( $post->ID, '_kottakkal_therapies', true );
	$therapies_text = is_array( $therapies ) ? implode( ', ', $therapies ) : (string) $therapies;
	?>
	<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
		<div>
			<label><strong>Short Name for Tabs:</strong></label><br>
			<input type="text" name="_kottakkal_short" value="<?php echo esc_attr( $short ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Joint & muscle">
		</div>
		<div>
			<label><strong>Tagline / Patient Need:</strong></label><br>
			<input type="text" name="_kottakkal_need" value="<?php echo esc_attr( $need ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Pain, stiffness and injury">
		</div>
	</div>

	<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
		<div>
			<label><strong>Color Tone:</strong></label><br>
			<select name="_kottakkal_tone" style="width:100%; margin-top:4px;">
				<option value="clay" <?php selected( $tone, 'clay' ); ?>>Clay</option>
				<option value="saffron" <?php selected( $tone, 'saffron' ); ?>>Saffron</option>
				<option value="ivory" <?php selected( $tone, 'ivory' ); ?>>Ivory</option>
				<option value="oil" <?php selected( $tone, 'oil' ); ?>>Oil</option>
				<option value="sage" <?php selected( $tone, 'sage' ); ?>>Sage</option>
				<option value="forest" <?php selected( $tone, 'forest' ); ?>>Forest</option>
			</select>
		</div>
		<div>
			<label><strong>Botanical Illustration:</strong></label><br>
			<input type="text" name="_kottakkal_ill" value="<?php echo esc_attr( $ill ); ?>" style="width:100%; margin-top:4px;" placeholder="ring, stream, turmeric, powder, leafy, pouch">
		</div>
	</div>

	<div style="margin-bottom:14px;">
		<label><strong>Our Clinical Approach:</strong></label><br>
		<textarea name="_kottakkal_approach" rows="3" style="width:100%; margin-top:4px;" placeholder="Describe how treatment is approached..."><?php echo esc_textarea( $approach ); ?></textarea>
	</div>

	<div style="margin-bottom:14px;">
		<label><strong>Selected Treatment Slugs (Comma separated):</strong></label><br>
		<input type="text" name="_kottakkal_therapies" value="<?php echo esc_attr( $therapies_text ); ?>" style="width:100%; margin-top:4px;" placeholder="kativasthi, njavara-kizhi, pottali-sweda, pizhichil, abhyangam">
	</div>
	<?php
}

/**
 * Testimonial Meta Box Render
 */
function kottakkal_render_testimonial_metabox( $post ) {
	wp_nonce_field( 'kottakkal_testi_nonce_action', 'kottakkal_testi_nonce' );
	$context = get_post_meta( $post->ID, '_kottakkal_context', true );
	?>
	<div style="margin-bottom:14px;">
		<label><strong>Treatment or Context:</strong></label><br>
		<input type="text" name="_kottakkal_context" value="<?php echo esc_attr( $context ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Abhyangam & Kativasthi">
	</div>
	<?php
}

/**
 * Save Meta Box Data Handlers
 */
function kottakkal_save_cpt_meta( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// 1. Treatment
	if ( isset( $_POST['kottakkal_treatment_nonce'] ) && wp_verify_nonce( $_POST['kottakkal_treatment_nonce'], 'kottakkal_treatment_nonce_action' ) ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			$fields = array( '_kottakkal_alt', '_kottakkal_meaning', '_kottakkal_ing', '_kottakkal_tone', '_kottakkal_ill', '_kottakkal_purpose', '_kottakkal_caution' );
			foreach ( $fields as $f ) {
				if ( isset( $_POST[ $f ] ) ) {
					update_post_meta( $post_id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) );
				}
			}

			if ( isset( $_POST['_kottakkal_paths'] ) && is_array( $_POST['_kottakkal_paths'] ) ) {
				$paths = array_map( 'sanitize_text_field', $_POST['_kottakkal_paths'] );
				update_post_meta( $post_id, '_kottakkal_paths', $paths );
			} else {
				update_post_meta( $post_id, '_kottakkal_paths', array() );
			}

			if ( isset( $_POST['_kottakkal_facts'] ) ) {
				$raw_facts = sanitize_textarea_field( wp_unslash( $_POST['_kottakkal_facts'] ) );
				$facts_arr = array();
				$lines = explode( "\n", $raw_facts );
				foreach ( $lines as $line ) {
					$parts = explode( ':', $line, 2 );
					if ( count( $parts ) === 2 ) {
						$facts_arr[] = array( trim( $parts[0] ), trim( $parts[1] ) );
					}
				}
				update_post_meta( $post_id, '_kottakkal_facts', $facts_arr );
			}
		}
	}

	// 2. Doctor
	if ( isset( $_POST['kottakkal_doctor_nonce'] ) && wp_verify_nonce( $_POST['kottakkal_doctor_nonce'], 'kottakkal_doctor_nonce_action' ) ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			if ( isset( $_POST['_kottakkal_role'] ) ) {
				update_post_meta( $post_id, '_kottakkal_role', sanitize_text_field( wp_unslash( $_POST['_kottakkal_role'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_mono'] ) ) {
				update_post_meta( $post_id, '_kottakkal_mono', sanitize_text_field( wp_unslash( $_POST['_kottakkal_mono'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_tone'] ) ) {
				update_post_meta( $post_id, '_kottakkal_tone', sanitize_text_field( wp_unslash( $_POST['_kottakkal_tone'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_creds'] ) ) {
				$creds = array_filter( array_map( 'trim', explode( "\n", sanitize_textarea_field( wp_unslash( $_POST['_kottakkal_creds'] ) ) ) ) );
				update_post_meta( $post_id, '_kottakkal_creds', $creds );
			}
			if ( isset( $_POST['_kottakkal_specs'] ) ) {
				$specs = array_filter( array_map( 'trim', explode( ',', sanitize_text_field( wp_unslash( $_POST['_kottakkal_specs'] ) ) ) ) );
				update_post_meta( $post_id, '_kottakkal_specs', $specs );
			}
		}
	}

	// 3. Pathway
	if ( isset( $_POST['kottakkal_pathway_nonce'] ) && wp_verify_nonce( $_POST['kottakkal_pathway_nonce'], 'kottakkal_pathway_nonce_action' ) ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			if ( isset( $_POST['_kottakkal_short'] ) ) {
				update_post_meta( $post_id, '_kottakkal_short', sanitize_text_field( wp_unslash( $_POST['_kottakkal_short'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_need'] ) ) {
				update_post_meta( $post_id, '_kottakkal_need', sanitize_text_field( wp_unslash( $_POST['_kottakkal_need'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_approach'] ) ) {
				update_post_meta( $post_id, '_kottakkal_approach', sanitize_textarea_field( wp_unslash( $_POST['_kottakkal_approach'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_tone'] ) ) {
				update_post_meta( $post_id, '_kottakkal_tone', sanitize_text_field( wp_unslash( $_POST['_kottakkal_tone'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_ill'] ) ) {
				update_post_meta( $post_id, '_kottakkal_ill', sanitize_text_field( wp_unslash( $_POST['_kottakkal_ill'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_therapies'] ) ) {
				$therapies = array_filter( array_map( 'trim', explode( ',', sanitize_text_field( wp_unslash( $_POST['_kottakkal_therapies'] ) ) ) ) );
				update_post_meta( $post_id, '_kottakkal_therapies', $therapies );
			}
		}
	}

	// 4. Testimonial
	if ( isset( $_POST['kottakkal_testi_nonce'] ) && wp_verify_nonce( $_POST['kottakkal_testi_nonce'], 'kottakkal_testi_nonce_action' ) ) {
		if ( current_user_can( 'edit_post', $post_id ) && isset( $_POST['_kottakkal_context'] ) ) {
			update_post_meta( $post_id, '_kottakkal_context', sanitize_text_field( wp_unslash( $_POST['_kottakkal_context'] ) ) );
		}
	}
}
add_action( 'save_post', 'kottakkal_save_cpt_meta' );

/**
 * Custom Admin Columns for Treatments
 */
function kottakkal_treatment_columns( $cols ) {
	$new_cols = array(
		'cb'         => $cols['cb'],
		'title'      => __( 'Treatment Name', 'oceanwp' ),
		'alt'        => __( 'Alternate / Sanskrit', 'oceanwp' ),
		'ing'        => __( 'Key Ingredient', 'oceanwp' ),
		'tone'       => __( 'Botanical Tone', 'oceanwp' ),
		'date'       => $cols['date'],
	);
	return $new_cols;
}
add_filter( 'manage_treatment_posts_columns', 'kottakkal_treatment_columns' );

function kottakkal_treatment_column_content( $col, $post_id ) {
	if ( 'alt' === $col ) {
		echo esc_html( get_post_meta( $post_id, '_kottakkal_alt', true ) );
	} elseif ( 'ing' === $col ) {
		echo esc_html( get_post_meta( $post_id, '_kottakkal_ing', true ) );
	} elseif ( 'tone' === $col ) {
		$t = get_post_meta( $post_id, '_kottakkal_tone', true );
		echo '<span style="display:inline-block; padding:2px 8px; border-radius:12px; background:#173F32; color:#fff; font-size:11px;">' . esc_html( strtoupper( $t ) ) . '</span>';
	}
}
add_action( 'manage_treatment_posts_custom_column', 'kottakkal_treatment_column_content', 10, 2 );

/**
 * Custom Admin Columns for Appointments
 */
function kottakkal_booking_columns( $cols ) {
	$new_cols = array(
		'cb'        => $cols['cb'],
		'title'     => __( 'Reference & Client', 'oceanwp' ),
		'service'   => __( 'Service / Treatment', 'oceanwp' ),
		'pref_date' => __( 'Preferred Date & Time', 'oceanwp' ),
		'phone'     => __( 'Phone Number', 'oceanwp' ),
		'email'     => __( 'Email Address', 'oceanwp' ),
		'date'      => __( 'Received At', 'oceanwp' ),
	);
	return $new_cols;
}
add_filter( 'manage_kottakkal_booking_posts_columns', 'kottakkal_booking_columns' );

function kottakkal_booking_column_content( $col, $post_id ) {
	if ( 'service' === $col ) {
		$svc = get_post_meta( $post_id, '_bk_service', true );
		echo '<strong style="color:#173F32;">' . esc_html( $svc ) . '</strong>';
	} elseif ( 'pref_date' === $col ) {
		$d = get_post_meta( $post_id, '_bk_date', true );
		$t = get_post_meta( $post_id, '_bk_time', true );
		echo esc_html( $d . ' · ' . $t );
	} elseif ( 'phone' === $col ) {
		$ph = get_post_meta( $post_id, '_bk_phone', true );
		echo '<a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $ph ) ) . '">' . esc_html( $ph ) . '</a>';
	} elseif ( 'email' === $col ) {
		$em = get_post_meta( $post_id, '_bk_email', true );
		echo '<a href="mailto:' . esc_attr( $em ) . '">' . esc_html( $em ) . '</a>';
	}
}
add_action( 'manage_kottakkal_booking_posts_custom_column', 'kottakkal_booking_column_content', 10, 2 );

