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
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
		'menu_icon'    => 'dashicons-heart',
		'show_in_rest' => true,
	) );
	add_post_type_support( 'treatment', 'thumbnail' );

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
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
		'menu_icon'    => 'dashicons-id',
		'show_in_rest' => true,
	) );
	add_post_type_support( 'doctor', 'thumbnail' );

	// 4. Testimonials CPT
	register_post_type( 'testimonial', array(
		'labels' => array(
			'name'               => __( 'Testimonials', 'oceanwp' ),
			'singular_name'      => __( 'Testimonial', 'oceanwp' ),
			'add_new'            => __( 'Add Testimonial', 'oceanwp' ),
			'add_new_item'       => __( 'Add New Testimonial', 'oceanwp' ),
			'edit_item'          => __( 'Edit Testimonial', 'oceanwp' ),
			'new_item'           => __( 'New Testimonial', 'oceanwp' ),
			'view_item'          => __( 'View Testimonial', 'oceanwp' ),
			'search_items'       => __( 'Search Testimonials', 'oceanwp' ),
			'not_found'          => __( 'No testimonials found', 'oceanwp' ),
			'not_found_in_trash' => __( 'No testimonials found in trash', 'oceanwp' ),
			'all_items'          => __( 'All Testimonials', 'oceanwp' ),
			'menu_name'          => __( 'Testimonials', 'oceanwp' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'menu_icon'    => 'dashicons-format-quote',
		'menu_position'=> 27,
		'show_in_rest' => true,
	) );
	add_post_type_support( 'testimonial', 'thumbnail' );

	// 5. Gallery Collections CPT
	register_post_type( 'gallery_album', array(
		'labels' => array(
			'name'               => __( 'Gallery Collections', 'oceanwp' ),
			'singular_name'      => __( 'Gallery Collection', 'oceanwp' ),
			'add_new'            => __( 'Add Collection / Album', 'oceanwp' ),
			'add_new_item'       => __( 'Add New Gallery Collection', 'oceanwp' ),
			'edit_item'          => __( 'Edit Gallery Collection', 'oceanwp' ),
			'new_item'           => __( 'New Gallery Collection', 'oceanwp' ),
			'view_item'          => __( 'View Gallery Collection', 'oceanwp' ),
			'search_items'       => __( 'Search Gallery Collections', 'oceanwp' ),
			'not_found'          => __( 'No collections found', 'oceanwp' ),
			'not_found_in_trash' => __( 'No collections found in trash', 'oceanwp' ),
			'all_items'          => __( 'All Collections', 'oceanwp' ),
			'menu_name'          => __( 'Gallery', 'oceanwp' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'supports'     => array( 'title', 'thumbnail', 'page-attributes' ),
		'menu_icon'    => 'dashicons-format-gallery',
		'menu_position'=> 28,
		'show_in_rest' => true,
	) );
	add_post_type_support( 'gallery_album', 'thumbnail' );

	// 6. Appointments CPT (Online Leads & Requests Inbox)
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
		'menu_position'=> 29,
		'show_in_rest' => false,
	) );
}
add_action( 'init', 'kottakkal_register_cpts' );

/**
 * Register Meta Boxes for CPTs
 */
function kottakkal_add_meta_boxes() {
	add_meta_box( 'kottakkal_treatment_meta', __( 'Treatment Details & Botanical Art', 'oceanwp' ), 'kottakkal_render_treatment_metabox', 'treatment', 'normal', 'high' );
	add_meta_box( 'kottakkal_treatment_photo_side', __( 'Treatment Image / Photo', 'oceanwp' ), 'kottakkal_render_treatment_photo_side_metabox', 'treatment', 'side', 'high' );
	add_meta_box( 'kottakkal_doctor_meta', __( 'Doctor Credentials & Specialities', 'oceanwp' ), 'kottakkal_render_doctor_metabox', 'doctor', 'normal', 'high' );
	add_meta_box( 'kottakkal_doctor_photo_side', __( 'Doctor Profile Photo', 'oceanwp' ), 'kottakkal_render_doctor_photo_side_metabox', 'doctor', 'side', 'high' );
	add_meta_box( 'kottakkal_pathway_meta', __( 'Pathway Details & Mappings', 'oceanwp' ), 'kottakkal_render_pathway_metabox', 'pathway', 'normal', 'high' );
	add_meta_box( 'kottakkal_testimonial_meta', __( 'Patient Story Details', 'oceanwp' ), 'kottakkal_render_testimonial_metabox', 'testimonial', 'normal', 'high' );
	add_meta_box( 'kottakkal_gallery_meta', __( 'Gallery Collection Content & Media', 'oceanwp' ), 'kottakkal_render_gallery_metabox', 'gallery_album', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'kottakkal_add_meta_boxes' );

/**
 * Treatment Profile / Card Photo Side Meta Box Render
 */
function kottakkal_render_treatment_photo_side_metabox( $post ) {
	$photo_url = get_post_meta( $post->ID, '_kottakkal_photo', true );
	$photo_id  = get_post_meta( $post->ID, '_kottakkal_photo_id', true );

	if ( empty( $photo_id ) ) {
		$photo_id = get_post_thumbnail_id( $post->ID );
	}
	if ( empty( $photo_url ) && $photo_id ) {
		$photo_url = wp_get_attachment_image_url( $photo_id, 'large' );
	}
	if ( empty( $photo_url ) ) {
		$slug = $post->post_name;
		$theme_dir = get_stylesheet_directory();
		$theme_uri = get_stylesheet_directory_uri();
		if ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.jpg' ) ) {
			$photo_url = $theme_uri . '/assets/img/t-' . $slug . '.jpg';
		} elseif ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.png' ) ) {
			$photo_url = $theme_uri . '/assets/img/t-' . $slug . '.png';
		}
	}
	?>
	<div class="kottakkal-photo-upload-wrap" style="text-align:center;">
		<div id="treatment_photo_side_preview_wrap" style="width:100%; aspect-ratio:4/3; max-width:220px; margin:0 auto 12px; background:#f4f6f5; border:2px dashed #b5c2ba; border-radius:6px; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative;">
			<img id="treatment_photo_side_preview" src="<?php echo esc_url( $photo_url ); ?>" style="width:100%; height:100%; object-fit:cover; <?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>" alt="Treatment Photo">
			<div id="treatment_photo_side_empty" style="<?php echo ! empty( $photo_url ) ? 'display:none;' : ''; ?> padding:20px; color:#666;">
				<span class="dashicons dashicons-format-image" style="font-size:42px; width:42px; height:42px; color:#8d9e95;"></span>
				<p style="margin:6px 0 0; font-size:12px; color:#666;"><?php esc_html_e( 'No image uploaded yet', 'oceanwp' ); ?></p>
			</div>
		</div>

		<div style="display:flex; flex-direction:column; gap:8px;">
			<button type="button" class="button button-primary button-large kottakkal-upload-photo-btn" style="width:100%; justify-content:center;">
				<span class="dashicons dashicons-upload" style="vertical-align:middle; margin-top:2px;"></span> <?php esc_html_e( 'Upload / Select Image', 'oceanwp' ); ?>
			</button>
			<button type="button" class="button button-link-delete kottakkal-remove-photo-btn" style="width:100%; text-align:center; <?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>">
				<?php esc_html_e( 'Remove Image', 'oceanwp' ); ?>
			</button>
		</div>
		<p class="description" style="font-size:11px; margin-top:10px; color:#666;">
			<?php esc_html_e( 'Select or upload an image for this treatment from your computer or WordPress Media Library. Automatically syncs with WordPress featured image.', 'oceanwp' ); ?>
		</p>
	</div>
	<?php
}

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

	$photo_url = get_post_meta( $post->ID, '_kottakkal_photo', true );
	$photo_id  = get_post_meta( $post->ID, '_kottakkal_photo_id', true );
	if ( empty( $photo_id ) ) {
		$photo_id = get_post_thumbnail_id( $post->ID );
	}
	if ( empty( $photo_url ) && $photo_id ) {
		$photo_url = wp_get_attachment_image_url( $photo_id, 'large' );
	}
	if ( empty( $photo_url ) ) {
		$slug = $post->post_name;
		$theme_dir = get_stylesheet_directory();
		$theme_uri = get_stylesheet_directory_uri();
		if ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.jpg' ) ) {
			$photo_url = $theme_uri . '/assets/img/t-' . $slug . '.jpg';
		} elseif ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.png' ) ) {
			$photo_url = $theme_uri . '/assets/img/t-' . $slug . '.png';
		}
	}
	?>
	<!-- Treatment Image Banner in Main Box -->
	<div style="background:#f4f7f5; border:1px solid #c9d8ce; border-radius:6px; padding:16px; margin-bottom:18px; display:flex; align-items:center; gap:20px;">
		<div style="width:100px; height:80px; border-radius:6px; overflow:hidden; background:#e0eae3; flex-shrink:0; border:1px solid #b5c7bc; display:flex; align-items:center; justify-content:center;">
			<img id="treatment_photo_main_preview" src="<?php echo esc_url( $photo_url ); ?>" style="width:100%; height:100%; object-fit:cover; <?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>" alt="Treatment Preview">
			<span id="treatment_photo_main_empty" class="dashicons dashicons-format-image" style="font-size:32px; width:32px; height:32px; color:#8a9c90; <?php echo ! empty( $photo_url ) ? 'display:none;' : ''; ?>"></span>
		</div>
		<div style="flex:1;">
			<div style="font-weight:600; font-size:14px; color:#173F32; margin-bottom:4px;"><?php esc_html_e( 'Treatment Image / Photo', 'oceanwp' ); ?></div>
			<p style="margin:0 0 10px; font-size:12px; color:#556;">
				<?php esc_html_e( 'Upload or select a photo for this treatment from the WordPress Media Library. This image will appear across the website cards, listings, and the single treatment page.', 'oceanwp' ); ?>
			</p>
			<div style="display:flex; gap:8px;">
				<button type="button" class="button button-primary kottakkal-upload-photo-btn">
					<span class="dashicons dashicons-upload" style="vertical-align:middle;"></span> <?php esc_html_e( 'Upload / Choose Image', 'oceanwp' ); ?>
				</button>
				<button type="button" class="button kottakkal-remove-photo-btn" style="<?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>">
					<?php esc_html_e( 'Remove Image', 'oceanwp' ); ?>
				</button>
			</div>
		</div>
	</div>

	<input type="hidden" name="_kottakkal_photo" id="_kottakkal_photo" value="<?php echo esc_attr( $photo_url ); ?>">
	<input type="hidden" name="_kottakkal_photo_id" id="_kottakkal_photo_id" value="<?php echo esc_attr( $photo_id ); ?>">
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

	<?php
	$therapy_cats = function_exists( 'kottakkal_get_therapy_categories' ) ? kottakkal_get_therapy_categories() : array();
	?>
	<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:14px;">
		<div>
			<label><strong>Key Facts (One per line, Format: Key: Value):</strong></label><br>
			<textarea name="_kottakkal_facts" rows="7" style="width:100%; margin-top:4px;" placeholder="Duration: 45 to 60 minutes&#10;Medium: Medicated herbal oils"><?php echo esc_textarea( $facts_text ); ?></textarea>
		</div>
		<div>
			<label><strong>Therapy Category & Care Pathways:</strong></label><br>
			<div style="margin-top:6px; display:grid; grid-template-columns:1fr 1fr; gap:12px; background:#fff; padding:10px; border:1px solid #d8e2dc; border-radius:4px;">
				<div>
					<strong style="font-size:11px; color:#173F32; display:block; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.04em;"><?php esc_html_e( 'Category', 'oceanwp' ); ?></strong>
					<div style="display:grid; gap:6px;">
						<?php foreach ( $therapy_cats as $cval => $cdata ) : ?>
							<label style="font-size:12px;"><input type="checkbox" name="_kottakkal_paths[]" value="<?php echo esc_attr( $cval ); ?>" <?php checked( in_array( $cval, $paths, true ) ); ?>> <?php echo esc_html( $cdata['short'] ); ?></label>
						<?php endforeach; ?>
					</div>
				</div>
				<div>
					<strong style="font-size:11px; color:#173F32; display:block; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.04em;"><?php esc_html_e( 'Pathways', 'oceanwp' ); ?></strong>
					<div style="display:grid; gap:6px;">
						<?php foreach ( $all_paths as $pval => $plbl ) : ?>
							<label style="font-size:12px;"><input type="checkbox" name="_kottakkal_paths[]" value="<?php echo esc_attr( $pval ); ?>" <?php checked( in_array( $pval, $paths, true ) ); ?>> <?php echo esc_html( $plbl ); ?></label>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Doctor Profile Photo Side Meta Box Render
 */
function kottakkal_render_doctor_photo_side_metabox( $post ) {
	$photo_url = get_post_meta( $post->ID, '_kottakkal_photo', true );
	$photo_id  = get_post_meta( $post->ID, '_kottakkal_photo_id', true );

	if ( empty( $photo_id ) ) {
		$photo_id = get_post_thumbnail_id( $post->ID );
	}
	if ( empty( $photo_url ) && $photo_id ) {
		$photo_url = wp_get_attachment_image_url( $photo_id, 'large' );
	}
	if ( empty( $photo_url ) ) {
		$slug = $post->post_name;
		$theme_dir = get_stylesheet_directory();
		$theme_uri = get_stylesheet_directory_uri();
		if ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/doc-' . $slug . '.png' ) ) {
			$photo_url = $theme_uri . '/assets/img/doc-' . $slug . '.png';
		} elseif ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/doc-' . $slug . '.jpg' ) ) {
			$photo_url = $theme_uri . '/assets/img/doc-' . $slug . '.jpg';
		}
	}
	?>
	<div class="kottakkal-photo-upload-wrap" style="text-align:center;">
		<div id="doctor_photo_side_preview_wrap" style="width:100%; aspect-ratio:4/5; max-width:200px; margin:0 auto 12px; background:#f4f6f5; border:2px dashed #b5c2ba; border-radius:6px; display:flex; align-items:center; justify-content:center; overflow:hidden; position:relative;">
			<img id="doctor_photo_side_preview" src="<?php echo esc_url( $photo_url ); ?>" style="width:100%; height:100%; object-fit:cover; <?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>" alt="Doctor Photo">
			<div id="doctor_photo_side_empty" style="<?php echo ! empty( $photo_url ) ? 'display:none;' : ''; ?> padding:20px; color:#666;">
				<span class="dashicons dashicons-camera" style="font-size:42px; width:42px; height:42px; color:#8d9e95;"></span>
				<p style="margin:6px 0 0; font-size:12px; color:#666;"><?php esc_html_e( 'No photo uploaded yet', 'oceanwp' ); ?></p>
			</div>
		</div>

		<div style="display:flex; flex-direction:column; gap:8px;">
			<button type="button" class="button button-primary button-large kottakkal-upload-photo-btn" style="width:100%; justify-content:center;">
				<span class="dashicons dashicons-upload" style="vertical-align:middle; margin-top:2px;"></span> <?php esc_html_e( 'Upload / Select Photo', 'oceanwp' ); ?>
			</button>
			<button type="button" class="button button-link-delete kottakkal-remove-photo-btn" style="width:100%; text-align:center; <?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>">
				<?php esc_html_e( 'Remove Photo', 'oceanwp' ); ?>
			</button>
		</div>
		<p class="description" style="font-size:11px; margin-top:10px; color:#666;">
			<?php esc_html_e( 'Select or upload a doctor photo. Automatically syncs with WordPress featured image.', 'oceanwp' ); ?>
		</p>
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

	$photo_url = get_post_meta( $post->ID, '_kottakkal_photo', true );
	$photo_id  = get_post_meta( $post->ID, '_kottakkal_photo_id', true );
	if ( empty( $photo_id ) ) {
		$photo_id = get_post_thumbnail_id( $post->ID );
	}
	if ( empty( $photo_url ) && $photo_id ) {
		$photo_url = wp_get_attachment_image_url( $photo_id, 'large' );
	}
	if ( empty( $photo_url ) ) {
		$slug = $post->post_name;
		$theme_dir = get_stylesheet_directory();
		$theme_uri = get_stylesheet_directory_uri();
		if ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/doc-' . $slug . '.png' ) ) {
			$photo_url = $theme_uri . '/assets/img/doc-' . $slug . '.png';
		} elseif ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/doc-' . $slug . '.jpg' ) ) {
			$photo_url = $theme_uri . '/assets/img/doc-' . $slug . '.jpg';
		}
	}
	?>
	<!-- Doctor Photo Banner in Main Box -->
	<div style="background:#f4f7f5; border:1px solid #c9d8ce; border-radius:6px; padding:16px; margin-bottom:18px; display:flex; align-items:center; gap:20px;">
		<div style="width:72px; height:84px; border-radius:4px; overflow:hidden; background:#e0eae3; flex-shrink:0; border:1px solid #b5c7bc; display:flex; align-items:center; justify-content:center;">
			<img id="doctor_photo_main_preview" src="<?php echo esc_url( $photo_url ); ?>" style="width:100%; height:100%; object-fit:cover; <?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>" alt="Doctor Preview">
			<span id="doctor_photo_main_empty" class="dashicons dashicons-format-image" style="font-size:28px; width:28px; height:28px; color:#8a9c90; <?php echo ! empty( $photo_url ) ? 'display:none;' : ''; ?>"></span>
		</div>
		<div style="flex:1;">
			<div style="font-weight:600; font-size:14px; color:#173F32; margin-bottom:4px;"><?php esc_html_e( 'Doctor Profile Photo / Image', 'oceanwp' ); ?></div>
			<p style="margin:0 0 10px; font-size:12px; color:#556;">
				<?php esc_html_e( 'Upload or select a portrait photo for this doctor from the WordPress Media Library.', 'oceanwp' ); ?>
			</p>
			<div style="display:flex; gap:8px;">
				<button type="button" class="button button-primary kottakkal-upload-photo-btn">
					<span class="dashicons dashicons-upload" style="vertical-align:middle;"></span> <?php esc_html_e( 'Upload / Choose Photo', 'oceanwp' ); ?>
				</button>
				<button type="button" class="button kottakkal-remove-photo-btn" style="<?php echo empty( $photo_url ) ? 'display:none;' : ''; ?>">
					<?php esc_html_e( 'Remove Photo', 'oceanwp' ); ?>
				</button>
			</div>
		</div>
	</div>

	<input type="hidden" name="_kottakkal_photo" id="_kottakkal_photo" value="<?php echo esc_attr( $photo_url ); ?>">
	<input type="hidden" name="_kottakkal_photo_id" id="_kottakkal_photo_id" value="<?php echo esc_attr( $photo_id ); ?>">

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

	$rating     = intval( get_post_meta( $post->ID, '_kottakkal_rating', true ) ?: 5 );
	$source     = get_post_meta( $post->ID, '_kottakkal_source', true ) ?: 'Google Reviews';
	$context    = get_post_meta( $post->ID, '_kottakkal_context', true );
	$category   = get_post_meta( $post->ID, '_kottakkal_category', true ) ?: 'pain';
	$doctor     = get_post_meta( $post->ID, '_kottakkal_doctor', true );
	$therapist  = get_post_meta( $post->ID, '_kottakkal_therapist', true );
	$duration   = get_post_meta( $post->ID, '_kottakkal_duration', true );
	$poster_rel = get_post_meta( $post->ID, '_kottakkal_poster', true );
	$poster_id  = get_post_meta( $post->ID, '_kottakkal_poster_id', true );

	if ( empty( $poster_id ) ) {
		$poster_id = get_post_thumbnail_id( $post->ID );
	}
	$poster_url = '';
	if ( $poster_id ) {
		$poster_url = wp_get_attachment_image_url( $poster_id, 'large' );
	}
	if ( empty( $poster_url ) && ! empty( $poster_rel ) ) {
		$poster_url = ( strpos( $poster_rel, 'http' ) === 0 ) ? $poster_rel : get_stylesheet_directory_uri() . '/' . ltrim( $poster_rel, '/' );
	}
	?>
	<div class="kottakkal-meta-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px;">
		<div>
			<label><strong><?php esc_html_e( 'Star Rating:', 'oceanwp' ); ?></strong></label><br>
			<select name="_kottakkal_rating" style="width:100%; margin-top:4px;">
				<option value="5" <?php selected( $rating, 5 ); ?>>★★★★★ (5 Stars - Exceptional)</option>
				<option value="4" <?php selected( $rating, 4 ); ?>>★★★★☆ (4 Stars - Very Good)</option>
				<option value="3" <?php selected( $rating, 3 ); ?>>★★★☆☆ (3 Stars - Good)</option>
				<option value="2" <?php selected( $rating, 2 ); ?>>★★☆☆☆ (2 Stars - Fair)</option>
				<option value="1" <?php selected( $rating, 1 ); ?>>★☆☆☆☆ (1 Star - Poor)</option>
			</select>
		</div>
		<div>
			<label><strong><?php esc_html_e( 'Review Category (Filter Tab):', 'oceanwp' ); ?></strong></label><br>
			<select name="_kottakkal_category" style="width:100%; margin-top:4px;">
				<option value="pain" <?php selected( $category, 'pain' ); ?>><?php esc_html_e( 'Pain Relief', 'oceanwp' ); ?></option>
				<option value="massage" <?php selected( $category, 'massage' ); ?>><?php esc_html_e( 'Massage & Therapies', 'oceanwp' ); ?></option>
				<option value="consultation" <?php selected( $category, 'consultation' ); ?>><?php esc_html_e( 'Doctor Consultation', 'oceanwp' ); ?></option>
				<option value="therapies" <?php selected( $category, 'therapies' ); ?>><?php esc_html_e( 'Special Therapies & Wellness', 'oceanwp' ); ?></option>
			</select>
		</div>
	</div>

	<div class="kottakkal-meta-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:18px;">
		<div>
			<label><strong><?php esc_html_e( 'Review Source:', 'oceanwp' ); ?></strong></label><br>
			<input type="text" name="_kottakkal_source" value="<?php echo esc_attr( $source ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Google Reviews, Direct Patient Story">
		</div>
		<div>
			<label><strong><?php esc_html_e( 'Treatment / Health Condition:', 'oceanwp' ); ?></strong></label><br>
			<input type="text" name="_kottakkal_context" value="<?php echo esc_attr( $context ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Shoulder Pain Relief, Fast Back Pain Remedy">
		</div>
	</div>

	<div class="kottakkal-meta-grid" style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-bottom:18px;">
		<div>
			<label><strong><?php esc_html_e( 'Treating Doctor (Optional):', 'oceanwp' ); ?></strong></label><br>
			<input type="text" name="_kottakkal_doctor" value="<?php echo esc_attr( $doctor ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Dr. Naseeba Abdul Rafeeque">
		</div>
		<div>
			<label><strong><?php esc_html_e( 'Treating Therapist (Optional):', 'oceanwp' ); ?></strong></label><br>
			<input type="text" name="_kottakkal_therapist" value="<?php echo esc_attr( $therapist ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. Akhil, Sunu & Sareena, Sarika">
		</div>
		<div>
			<label><strong><?php esc_html_e( 'Treatment Duration / Program:', 'oceanwp' ); ?></strong></label><br>
			<input type="text" name="_kottakkal_duration" value="<?php echo esc_attr( $duration ); ?>" style="width:100%; margin-top:4px;" placeholder="e.g. 12 Days Treatment, 8 Days Treatment">
		</div>
	</div>

	<!-- Review Poster / Certificate Image -->
	<div style="border-top:1px solid #dcdcde; padding-top:14px; margin-top:10px;">
		<label><strong><?php esc_html_e( 'Patient Review Poster / Social Card (Optional):', 'oceanwp' ); ?></strong></label>
		<p class="description" style="margin:4px 0 10px; font-size:12px; color:#666;">
			<?php esc_html_e( 'Upload or select the official review graphic card or certificate shown in the "View Card" modal.', 'oceanwp' ); ?>
		</p>

		<div style="display:flex; align-items:flex-start; gap:16px;">
			<div id="testi_poster_preview_wrap" style="width:120px; aspect-ratio:4/3; background:#f4f6f5; border:1px solid #c3c4c7; border-radius:4px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
				<img id="testi_poster_preview" src="<?php echo esc_url( $poster_url ); ?>" style="width:100%; height:100%; object-fit:cover; <?php echo empty( $poster_url ) ? 'display:none;' : ''; ?>" alt="Poster Preview">
				<span id="testi_poster_empty" class="dashicons dashicons-format-image" style="font-size:32px; width:32px; height:32px; color:#a7aaad; <?php echo ! empty( $poster_url ) ? 'display:none;' : ''; ?>"></span>
			</div>
			<div>
				<input type="hidden" name="_kottakkal_poster" id="_kottakkal_poster" value="<?php echo esc_attr( $poster_rel ?: $poster_url ); ?>">
				<input type="hidden" name="_kottakkal_poster_id" id="_kottakkal_poster_id" value="<?php echo esc_attr( $poster_id ); ?>">
				<button type="button" class="button button-secondary kottakkal-upload-testi-poster-btn">
					<span class="dashicons dashicons-upload" style="vertical-align:middle; margin-top:2px;"></span> <?php esc_html_e( 'Select / Upload Card Image', 'oceanwp' ); ?>
				</button>
				<button type="button" class="button button-link-delete kottakkal-remove-testi-poster-btn" style="margin-left:8px; <?php echo empty( $poster_url ) ? 'display:none;' : ''; ?>">
					<?php esc_html_e( 'Remove Image', 'oceanwp' ); ?>
				</button>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Gallery Collection Meta Box Render
 */
function kottakkal_render_gallery_metabox( $post ) {
	wp_nonce_field( 'kottakkal_gallery_nonce_action', 'kottakkal_gallery_nonce' );

	$type   = get_post_meta( $post->ID, '_kottakkal_gallery_type', true ) ?: 'photos';
	$images = get_post_meta( $post->ID, '_kottakkal_gallery_images', true );
	if ( ! is_array( $images ) ) {
		$images = json_decode( (string) $images, true ) ?: array();
	}
	$videos = get_post_meta( $post->ID, '_kottakkal_gallery_videos', true );
	if ( ! is_array( $videos ) ) {
		$videos = json_decode( (string) $videos, true ) ?: array();
	}

	$theme_uri = get_stylesheet_directory_uri();
	?>
	<div style="margin-bottom:18px; padding-bottom:14px; border-bottom:1px solid #dcdcde;">
		<label style="font-weight:700; margin-right:20px;"><?php esc_html_e( 'Collection Content Type:', 'oceanwp' ); ?></label>
		<label style="margin-right:16px; cursor:pointer;">
			<input type="radio" name="_kottakkal_gallery_type" value="photos" <?php checked( $type, 'photos' ); ?> class="kottakkal-gal-type-toggle">
			<strong>📷 <?php esc_html_e( 'Photo Collection (Images Grid)', 'oceanwp' ); ?></strong>
		</label>
		<label style="cursor:pointer;">
			<input type="radio" name="_kottakkal_gallery_type" value="videos" <?php checked( $type, 'videos' ); ?> class="kottakkal-gal-type-toggle">
			<strong>🎥 <?php esc_html_e( 'Television & Video Series (YouTube)', 'oceanwp' ); ?></strong>
		</label>
	</div>

	<!-- 1. PHOTOS COLLECTION SECTION -->
	<div id="kottakkal_gal_photos_sec" style="<?php echo ( $type === 'videos' ) ? 'display:none;' : ''; ?>">
		<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; flex-wrap:wrap; gap:10px;">
			<div style="display:flex; align-items:center; gap:10px;">
				<button type="button" class="button button-primary button-large" id="kottakkal_add_photos_btn">
					<span class="dashicons dashicons-plus-alt" style="vertical-align:middle; margin-top:2px;"></span> <?php esc_html_e( 'Add / Upload Photos', 'oceanwp' ); ?>
				</button>
				<button type="button" class="button button-secondary" id="kottakkal_clear_photos_btn" style="<?php echo empty( $images ) ? 'display:none;' : ''; ?>">
					<?php esc_html_e( 'Clear All Photos', 'oceanwp' ); ?>
				</button>
			</div>
			<div style="font-size:13px; font-weight:600; color:#444;" id="kottakkal_photos_counter">
				<?php printf( esc_html__( '%d Photos in this collection', 'oceanwp' ), count( $images ) ); ?>
			</div>
		</div>

		<p class="description" style="margin-bottom:14px;">
			<?php esc_html_e( 'Click "Add / Upload Photos" to select one or multiple images from your WordPress Media Library. You can remove individual photos with the (×) button on each card.', 'oceanwp' ); ?>
		</p>

		<!-- Photo Grid Container -->
		<div id="kottakkal_gal_items_grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(130px, 1fr)); gap:12px; max-height:480px; overflow-y:auto; padding:10px; background:#f9fafb; border:1px solid #c3c4c7; border-radius:6px; min-height:120px;">
			<?php if ( empty( $images ) ) : ?>
				<div id="kottakkal_empty_gal_notice" style="grid-column:1/-1; text-align:center; padding:30px 10px; color:#666;">
					<span class="dashicons dashicons-format-gallery" style="font-size:40px; width:40px; height:40px; color:#a7aaad;"></span>
					<p style="margin:8px 0 0;"><?php esc_html_e( 'No photos added yet. Click "+ Add / Upload Photos" above to add photos to this collection.', 'oceanwp' ); ?></p>
				</div>
			<?php else : ?>
				<?php foreach ( $images as $idx => $img ) :
					$img_url = ! empty( $img['url'] ) ? $img['url'] : ( ! empty( $img['relPath'] ) ? $theme_uri . '/' . $img['relPath'] : ( ! empty( $img['remoteUrl'] ) ? $img['remoteUrl'] : '' ) );
					$img_id  = $img['id'] ?? 0;
					$img_title = $img['title'] ?? ( 'Photo ' . ( $idx + 1 ) );
				?>
					<div class="kottakkal-gal-thumb-item" data-id="<?php echo esc_attr( $img_id ); ?>" data-url="<?php echo esc_url( $img_url ); ?>" data-rel="<?php echo esc_attr( $img['relPath'] ?? '' ); ?>" style="position:relative; aspect-ratio:4/3; background:#fff; border:1px solid #dcdcde; border-radius:4px; overflow:hidden; box-shadow:0 1px 2px rgba(0,0,0,0.06);">
						<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_title ); ?>" style="width:100%; height:100%; object-fit:cover; display:block;" loading="lazy">
						<button type="button" class="kottakkal-del-photo-btn" title="<?php esc_attr_e( 'Remove photo', 'oceanwp' ); ?>" style="position:absolute; top:4px; right:4px; width:22px; height:22px; border-radius:50%; background:rgba(0,0,0,0.7); color:#fff; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:14px; line-height:1; padding:0;">×</button>
						<span style="position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,0.65); color:#fff; font-size:10px; padding:2px 4px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?php echo esc_html( $img_title ); ?></span>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<!-- Hidden JSON storage -->
		<textarea name="_kottakkal_gallery_images" id="_kottakkal_gallery_images" style="display:none;"><?php echo esc_textarea( wp_json_encode( $images ) ); ?></textarea>
	</div>

	<!-- 2. VIDEOS COLLECTION SECTION -->
	<div id="kottakkal_gal_videos_sec" style="<?php echo ( $type !== 'videos' ) ? 'display:none;' : ''; ?>">
		<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
			<p class="description" style="margin:0;">
				<?php esc_html_e( 'Add YouTube video broadcasts (such as Janam TV IN FOCUS series). Provide the YouTube Video ID or URL, Title, and details.', 'oceanwp' ); ?>
			</p>
			<button type="button" class="button button-primary" id="kottakkal_add_video_btn">
				<span class="dashicons dashicons-plus-alt" style="vertical-align:middle; margin-top:2px;"></span> <?php esc_html_e( 'Add Video', 'oceanwp' ); ?>
			</button>
		</div>

		<div id="kottakkal_video_items_wrap" style="display:flex; flex-direction:column; gap:12px;">
			<?php if ( empty( $videos ) ) : ?>
				<div id="kottakkal_empty_vid_notice" style="text-align:center; padding:30px 10px; background:#f9fafb; border:1px solid #c3c4c7; border-radius:6px; color:#666;">
					<span class="dashicons dashicons-video-alt3" style="font-size:40px; width:40px; height:40px; color:#a7aaad;"></span>
					<p style="margin:8px 0 0;"><?php esc_html_e( 'No videos added yet. Click "+ Add Video" above to add YouTube broadcasts.', 'oceanwp' ); ?></p>
				</div>
			<?php else : ?>
				<?php foreach ( $videos as $v_idx => $v ) :
					$vid_id = $v['id'] ?? '';
				?>
					<div class="kottakkal-video-row" style="background:#fff; border:1px solid #c3c4c7; border-radius:6px; padding:14px; position:relative; box-shadow:0 1px 3px rgba(0,0,0,0.05);">
						<div style="display:grid; grid-template-columns:120px 1fr auto; gap:14px; align-items:flex-start;">
							<div style="aspect-ratio:16/9; background:#000; border-radius:4px; overflow:hidden; position:relative;">
								<img class="kottakkal-vid-thumb-prev" src="https://img.youtube.com/vi/<?php echo esc_attr( $vid_id ); ?>/hqdefault.jpg" style="width:100%; height:100%; object-fit:cover; display:block;" onerror="this.src='';">
							</div>
							<div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
								<div style="grid-column:1/-1;">
									<label style="font-size:11px; font-weight:600; color:#666;"><?php esc_html_e( 'YouTube URL or Video ID:', 'oceanwp' ); ?></label>
									<input type="text" class="kottakkal-vid-id-input" value="<?php echo esc_attr( $v['watch_url'] ?? ( ! empty( $vid_id ) ? 'https://www.youtube.com/watch?v=' . $vid_id : '' ) ); ?>" style="width:100%; margin-top:2px;" placeholder="e.g. https://www.youtube.com/watch?v=pYi8o-ErDJ4 or pYi8o-ErDJ4">
								</div>
								<div>
									<label style="font-size:11px; font-weight:600; color:#666;"><?php esc_html_e( 'Video Title:', 'oceanwp' ); ?></label>
									<input type="text" class="kottakkal-vid-title-input" value="<?php echo esc_attr( $v['title'] ?? '' ); ?>" style="width:100%; margin-top:2px;" placeholder="e.g. വേനലിൽ ആരോഗ്യം സൂക്ഷിക്കാം">
								</div>
								<div>
									<label style="font-size:11px; font-weight:600; color:#666;"><?php esc_html_e( 'English Subtitle:', 'oceanwp' ); ?></label>
									<input type="text" class="kottakkal-vid-sub-input" value="<?php echo esc_attr( $v['subtitle'] ?? '' ); ?>" style="width:100%; margin-top:2px;" placeholder="e.g. Summer Health Care & Heat Balancing in Ayurveda">
								</div>
								<div>
									<label style="font-size:11px; font-weight:600; color:#666;"><?php esc_html_e( 'Channel Name:', 'oceanwp' ); ?></label>
									<input type="text" class="kottakkal-vid-chan-input" value="<?php echo esc_attr( $v['channel'] ?? 'Janam TV' ); ?>" style="width:100%; margin-top:2px;" placeholder="Janam TV">
								</div>
								<div>
									<label style="font-size:11px; font-weight:600; color:#666;"><?php esc_html_e( 'Program / Series Name:', 'oceanwp' ); ?></label>
									<input type="text" class="kottakkal-vid-prog-input" value="<?php echo esc_attr( $v['program'] ?? 'INFOCUS' ); ?>" style="width:100%; margin-top:2px;" placeholder="INFOCUS">
								</div>
							</div>
							<div>
								<button type="button" class="button button-link-delete kottakkal-del-video-btn" style="color:#b32d2e;">
									<span class="dashicons dashicons-trash" style="vertical-align:middle;"></span> <?php esc_html_e( 'Delete', 'oceanwp' ); ?>
								</button>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<!-- Hidden JSON storage for videos -->
		<textarea name="_kottakkal_gallery_videos" id="_kottakkal_gallery_videos" style="display:none;"><?php echo esc_textarea( wp_json_encode( $videos ) ); ?></textarea>
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

			if ( isset( $_POST['_kottakkal_photo'] ) ) {
				$photo_url = sanitize_text_field( wp_unslash( $_POST['_kottakkal_photo'] ) );
				update_post_meta( $post_id, '_kottakkal_photo', $photo_url );
			}
			if ( isset( $_POST['_kottakkal_photo_id'] ) ) {
				$photo_id = intval( $_POST['_kottakkal_photo_id'] );
				update_post_meta( $post_id, '_kottakkal_photo_id', $photo_id );
				if ( $photo_id > 0 ) {
					set_post_thumbnail( $post_id, $photo_id );
				} elseif ( empty( $_POST['_kottakkal_photo'] ) ) {
					delete_post_thumbnail( $post_id );
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
			if ( isset( $_POST['_kottakkal_photo'] ) ) {
				$photo_url = sanitize_text_field( wp_unslash( $_POST['_kottakkal_photo'] ) );
				update_post_meta( $post_id, '_kottakkal_photo', $photo_url );
			}
			if ( isset( $_POST['_kottakkal_photo_id'] ) ) {
				$photo_id = intval( $_POST['_kottakkal_photo_id'] );
				update_post_meta( $post_id, '_kottakkal_photo_id', $photo_id );
				if ( $photo_id > 0 ) {
					set_post_thumbnail( $post_id, $photo_id );
				} elseif ( empty( $_POST['_kottakkal_photo'] ) ) {
					delete_post_thumbnail( $post_id );
				}
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
		if ( current_user_can( 'edit_post', $post_id ) ) {
			$fields = array( '_kottakkal_rating', '_kottakkal_category', '_kottakkal_source', '_kottakkal_context', '_kottakkal_doctor', '_kottakkal_therapist', '_kottakkal_duration', '_kottakkal_poster' );
			foreach ( $fields as $f ) {
				if ( isset( $_POST[ $f ] ) ) {
					update_post_meta( $post_id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) );
				}
			}

			if ( isset( $_POST['_kottakkal_poster_id'] ) ) {
				$poster_id = intval( $_POST['_kottakkal_poster_id'] );
				update_post_meta( $post_id, '_kottakkal_poster_id', $poster_id );
				if ( $poster_id > 0 ) {
					set_post_thumbnail( $post_id, $poster_id );
				} elseif ( empty( $_POST['_kottakkal_poster'] ) ) {
					delete_post_thumbnail( $post_id );
				}
			}
		}
	}

	// 5. Gallery Album / Collection
	if ( isset( $_POST['kottakkal_gallery_nonce'] ) && wp_verify_nonce( $_POST['kottakkal_gallery_nonce'], 'kottakkal_gallery_nonce_action' ) ) {
		if ( current_user_can( 'edit_post', $post_id ) ) {
			if ( isset( $_POST['_kottakkal_gallery_type'] ) ) {
				update_post_meta( $post_id, '_kottakkal_gallery_type', sanitize_text_field( wp_unslash( $_POST['_kottakkal_gallery_type'] ) ) );
			}
			if ( isset( $_POST['_kottakkal_gallery_images'] ) ) {
				$raw_images = wp_unslash( $_POST['_kottakkal_gallery_images'] );
				$decoded    = json_decode( $raw_images, true );
				if ( is_array( $decoded ) ) {
					update_post_meta( $post_id, '_kottakkal_gallery_images', $decoded );

					// Automatically set featured image if none set and photos exist
					if ( ! has_post_thumbnail( $post_id ) && ! empty( $decoded[0]['id'] ) ) {
						set_post_thumbnail( $post_id, intval( $decoded[0]['id'] ) );
					}
				}
			}
			if ( isset( $_POST['_kottakkal_gallery_videos'] ) ) {
				$raw_vids = wp_unslash( $_POST['_kottakkal_gallery_videos'] );
				$decoded_vids = json_decode( $raw_vids, true );
				if ( is_array( $decoded_vids ) ) {
					update_post_meta( $post_id, '_kottakkal_gallery_videos', $decoded_vids );
				}
			}
		}
	}
}
add_action( 'save_post', 'kottakkal_save_cpt_meta' );

/**
 * Automatically keep _kottakkal_photo & _kottakkal_photo_id in sync when standard Featured Image is set/removed for Treatments
 */
add_action( 'save_post_treatment', function( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$thumb_id = get_post_thumbnail_id( $post_id );
	if ( $thumb_id ) {
		$img_url = wp_get_attachment_image_url( $thumb_id, 'large' );
		update_post_meta( $post_id, '_kottakkal_photo_id', $thumb_id );
		if ( $img_url ) {
			update_post_meta( $post_id, '_kottakkal_photo', $img_url );
		}
	} elseif ( isset( $_POST['_thumbnail_id'] ) && (int) $_POST['_thumbnail_id'] === -1 && empty( $_POST['_kottakkal_photo'] ) ) {
		delete_post_meta( $post_id, '_kottakkal_photo_id' );
		delete_post_meta( $post_id, '_kottakkal_photo' );
	}
}, 20 );

/**
 * Display all treatments (up to 50+) on a single admin dashboard screen without pagination
 */
add_filter( 'edit_treatment_per_page', function( $per_page ) {
	return 50;
} );

add_filter( 'get_user_option_edit_treatment_per_page', function( $result ) {
	return ( ! empty( $result ) && (int) $result >= 36 ) ? $result : 50;
} );

add_action( 'pre_get_posts', function( $query ) {
	if ( is_admin() && $query->is_main_query() && $query->get( 'post_type' ) === 'treatment' ) {
		if ( empty( $_GET['posts_per_page'] ) ) {
			$query->set( 'posts_per_page', 50 );
		}
		if ( empty( $_GET['orderby'] ) ) {
			$query->set( 'orderby', 'menu_order' );
			$query->set( 'order', 'ASC' );
		}
	}
} );

/**
 * Custom Admin Columns for Treatments
 */
function kottakkal_treatment_columns( $cols ) {
	$new_cols = array(
		'cb'         => $cols['cb'],
		'image'      => __( 'Image', 'oceanwp' ),
		'title'      => __( 'Treatment Name', 'oceanwp' ),
		'group'      => __( 'Clinical Group', 'oceanwp' ),
		'alt'        => __( 'Alternate / Sanskrit', 'oceanwp' ),
		'ing'        => __( 'Key Ingredient', 'oceanwp' ),
		'tone'       => __( 'Tone', 'oceanwp' ),
		'order'      => __( 'Order', 'oceanwp' ),
		'date'       => $cols['date'],
	);
	return $new_cols;
}
add_filter( 'manage_treatment_posts_columns', 'kottakkal_treatment_columns' );

function kottakkal_treatment_column_content( $col, $post_id ) {
	if ( 'image' === $col ) {
		$img_url = get_post_meta( $post_id, '_kottakkal_photo', true );
		if ( empty( $img_url ) ) {
			$img_id = get_post_thumbnail_id( $post_id );
			if ( $img_id ) {
				$img_url = wp_get_attachment_image_url( $img_id, 'thumbnail' );
			}
		}
		if ( empty( $img_url ) ) {
			$p = get_post( $post_id );
			$slug = $p ? $p->post_name : '';
			$theme_dir = get_stylesheet_directory();
			$theme_uri = get_stylesheet_directory_uri();
			if ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.jpg' ) ) {
				$img_url = $theme_uri . '/assets/img/t-' . $slug . '.jpg';
			} elseif ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.png' ) ) {
				$img_url = $theme_uri . '/assets/img/t-' . $slug . '.png';
			}
		}

		if ( ! empty( $img_url ) ) {
			echo '<img src="' . esc_url( $img_url ) . '" style="width:52px; height:42px; object-fit:cover; border-radius:6px; border:1px solid #c8d6cd; display:block;" alt="">';
		} else {
			echo '<div style="width:52px; height:42px; border-radius:6px; background:#f4f6f5; border:1px dashed #b5c2ba; color:#8d9e95; display:grid; place-items:center;"><span class="dashicons dashicons-format-image" style="font-size:20px; width:20px; height:20px;"></span></div>';
		}
	} elseif ( 'group' === $col ) {
		$post = get_post( $post_id );
		$ord  = $post ? (int) $post->menu_order : 0;
		$grp  = 'Other Therapies';
		$color = '#475569';
		if ( $ord >= 1 && $ord <= 5 ) {
			$grp = '1. Panchakarma';
			$color = '#047857';
		} elseif ( $ord >= 6 && $ord <= 12 ) {
			$grp = '2. Bahya Basti';
			$color = '#b45309';
		} elseif ( $ord >= 13 && $ord <= 21 ) {
			$grp = '3. Abhyanga & Sweda';
			$color = '#15803d';
		} elseif ( $ord >= 22 && $ord <= 26 ) {
			$grp = '4. Shirodhara & Head';
			$color = '#0369a1';
		} elseif ( $ord >= 27 && $ord <= 29 ) {
			$grp = '5. Special Therapies';
			$color = '#7c3aed';
		} elseif ( $ord >= 30 && $ord <= 36 ) {
			$grp = '6. Other Therapies';
			$color = '#475569';
		}
		echo '<span style="display:inline-block; padding:3px 8px; border-radius:4px; font-weight:600; font-size:11px; background:' . esc_attr( $color . '18' ) . '; color:' . esc_attr( $color ) . '; border:1px solid ' . esc_attr( $color . '44' ) . '; white-space:nowrap;">' . esc_html( $grp ) . '</span>';
	} elseif ( 'alt' === $col ) {
		echo esc_html( get_post_meta( $post_id, '_kottakkal_alt', true ) );
	} elseif ( 'ing' === $col ) {
		echo esc_html( get_post_meta( $post_id, '_kottakkal_ing', true ) );
	} elseif ( 'tone' === $col ) {
		$t = get_post_meta( $post_id, '_kottakkal_tone', true );
		echo '<span style="display:inline-block; padding:2px 8px; border-radius:12px; background:#173F32; color:#fff; font-size:11px;">' . esc_html( strtoupper( $t ) ) . '</span>';
	} elseif ( 'order' === $col ) {
		$post = get_post( $post_id );
		echo '<strong style="color:#173F32;">#' . esc_html( $post ? $post->menu_order : '0' ) . '</strong>';
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

/**
 * Custom Admin Columns for Doctors
 */
function kottakkal_doctor_columns( $cols ) {
	$new_cols = array(
		'cb'    => $cols['cb'],
		'photo' => __( 'Photo', 'oceanwp' ),
		'title' => __( 'Doctor Name', 'oceanwp' ),
		'role'  => __( 'Designation / Role', 'oceanwp' ),
		'tone'  => __( 'Profile Tone', 'oceanwp' ),
		'specs' => __( 'Specialisations', 'oceanwp' ),
		'date'  => $cols['date'],
	);
	return $new_cols;
}
add_filter( 'manage_doctor_posts_columns', 'kottakkal_doctor_columns' );

function kottakkal_doctor_column_content( $col, $post_id ) {
	if ( 'photo' === $col ) {
		$img_url = get_post_meta( $post_id, '_kottakkal_photo', true );
		if ( empty( $img_url ) ) {
			$img_id = get_post_thumbnail_id( $post_id );
			if ( $img_id ) {
				$img_url = wp_get_attachment_image_url( $img_id, 'thumbnail' );
			}
		}
		if ( empty( $img_url ) ) {
			$p = get_post( $post_id );
			$slug = $p ? $p->post_name : '';
			$theme_dir = get_stylesheet_directory();
			$theme_uri = get_stylesheet_directory_uri();
			if ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/doc-' . $slug . '.png' ) ) {
				$img_url = $theme_uri . '/assets/img/doc-' . $slug . '.png';
			} elseif ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/doc-' . $slug . '.jpg' ) ) {
				$img_url = $theme_uri . '/assets/img/doc-' . $slug . '.jpg';
			}
		}

		if ( ! empty( $img_url ) ) {
			echo '<img src="' . esc_url( $img_url ) . '" style="width:48px; height:48px; object-fit:cover; border-radius:50%; border:2px solid #173F32; display:block;" alt="">';
		} else {
			$mono = get_post_meta( $post_id, '_kottakkal_mono', true ) ?: 'DR';
			echo '<div style="width:48px; height:48px; border-radius:50%; background:#173F32; color:#E39A3C; display:grid; place-items:center; font-weight:700; font-size:14px;">' . esc_html( $mono ) . '</div>';
		}
	} elseif ( 'role' === $col ) {
		echo esc_html( get_post_meta( $post_id, '_kottakkal_role', true ) ?: 'Ayurveda Practitioner' );
	} elseif ( 'tone' === $col ) {
		$t = get_post_meta( $post_id, '_kottakkal_tone', true ) ?: 'forest';
		echo '<span style="display:inline-block; padding:2px 8px; border-radius:12px; background:#173F32; color:#fff; font-size:11px;">' . esc_html( strtoupper( $t ) ) . '</span>';
	} elseif ( 'specs' === $col ) {
		$specs = get_post_meta( $post_id, '_kottakkal_specs', true );
		if ( is_array( $specs ) ) {
			echo esc_html( implode( ', ', array_slice( $specs, 0, 3 ) ) );
		} else {
			echo esc_html( $specs );
		}
	}
}
add_action( 'manage_doctor_posts_custom_column', 'kottakkal_doctor_column_content', 10, 2 );

/**
 * Custom Admin Columns for Testimonials
 */
function kottakkal_testimonial_columns( $cols ) {
	$new = array();
	$new['cb']               = $cols['cb'] ?? '<input type="checkbox" />';
	$new['poster']           = __( 'Card / Photo', 'oceanwp' );
	$new['title']            = __( 'Patient Name', 'oceanwp' );
	$new['rating']           = __( 'Rating', 'oceanwp' );
	$new['category']         = __( 'Category', 'oceanwp' );
	$new['context']          = __( 'Treatment / Condition', 'oceanwp' );
	$new['doctor_therapist'] = __( 'Doctor / Therapist', 'oceanwp' );
	$new['menu_order']       = __( 'Order', 'oceanwp' );
	$new['date']             = __( 'Date', 'oceanwp' );
	return $new;
}
add_filter( 'manage_testimonial_posts_columns', 'kottakkal_testimonial_columns' );

function kottakkal_testimonial_column_content( $col, $post_id ) {
	switch ( $col ) {
		case 'poster':
			$thumb_id   = get_post_thumbnail_id( $post_id );
			$poster_rel = get_post_meta( $post_id, '_kottakkal_poster', true );
			$img_src    = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'thumbnail' ) : ( $poster_rel ? ( strpos( $poster_rel, 'http' ) === 0 ? $poster_rel : get_stylesheet_directory_uri() . '/' . ltrim( $poster_rel, '/' ) ) : '' );
			if ( $img_src ) {
				echo '<img src="' . esc_url( $img_src ) . '" style="width:42px; height:42px; object-fit:cover; border-radius:4px; border:1px solid #ccc; display:block;" alt="">';
			} else {
				echo '<span style="color:#999; font-size:12px;">—</span>';
			}
			break;

		case 'rating':
			$r = intval( get_post_meta( $post_id, '_kottakkal_rating', true ) ?: 5 );
			$stars = str_repeat( '★', $r ) . str_repeat( '☆', max( 0, 5 - $r ) );
			echo '<span style="color:#f59e0b; font-size:14px; letter-spacing:1px;" title="' . esc_attr( $r . '/5' ) . '">' . esc_html( $stars ) . '</span> <small style="color:#666;">(' . esc_html( $r ) . '.0)</small>';
			break;

		case 'category':
			$cat = get_post_meta( $post_id, '_kottakkal_category', true ) ?: 'pain';
			$labels = array(
				'pain'         => array( 'label' => 'Pain Relief', 'bg' => '#e6f4ea', 'color' => '#137333' ),
				'massage'      => array( 'label' => 'Massage & Therapies', 'bg' => '#e8f0fe', 'color' => '#1a73e8' ),
				'consultation' => array( 'label' => 'Doctor Consultation', 'bg' => '#fef7e0', 'color' => '#b06000' ),
				'therapies'    => array( 'label' => 'Special Therapies', 'bg' => '#fce8e6', 'color' => '#c5221f' ),
			);
			$info = $labels[ $cat ] ?? array( 'label' => ucfirst( $cat ), 'bg' => '#f1f3f4', 'color' => '#3c4043' );
			echo '<span style="display:inline-block; padding:3px 8px; border-radius:12px; font-size:11px; font-weight:600; background:' . esc_attr( $info['bg'] ) . '; color:' . esc_attr( $info['color'] ) . ';">' . esc_html( $info['label'] ) . '</span>';
			break;

		case 'context':
			$ctx = get_post_meta( $post_id, '_kottakkal_context', true );
			echo ! empty( $ctx ) ? '<strong>' . esc_html( $ctx ) . '</strong>' : '<span style="color:#999;">—</span>';
			break;

		case 'doctor_therapist':
			$doc  = get_post_meta( $post_id, '_kottakkal_doctor', true );
			$ther = get_post_meta( $post_id, '_kottakkal_therapist', true );
			$out = array();
			if ( $doc ) $out[] = 'Dr: ' . esc_html( $doc );
			if ( $ther ) $out[] = 'Therapist: ' . esc_html( $ther );
			echo ! empty( $out ) ? implode( '<br>', $out ) : '<span style="color:#999;">—</span>';
			break;

		case 'menu_order':
			$p = get_post( $post_id );
			echo esc_html( $p->menu_order );
			break;
	}
}
add_action( 'manage_testimonial_posts_custom_column', 'kottakkal_testimonial_column_content', 10, 2 );

/**
 * Custom Admin Columns for Gallery Albums
 */
function kottakkal_gallery_album_columns( $cols ) {
	$new = array();
	$new['cb']         = $cols['cb'] ?? '<input type="checkbox" />';
	$new['cover']      = __( 'Cover Photo', 'oceanwp' );
	$new['title']      = __( 'Collection Title', 'oceanwp' );
	$new['type']       = __( 'Type', 'oceanwp' );
	$new['count']      = __( 'Items Count', 'oceanwp' );
	$new['slug']       = __( 'Filter Slug', 'oceanwp' );
	$new['menu_order'] = __( 'Order', 'oceanwp' );
	$new['date']       = __( 'Date', 'oceanwp' );
	return $new;
}
add_filter( 'manage_gallery_album_posts_columns', 'kottakkal_gallery_album_columns' );

function kottakkal_gallery_album_column_content( $col, $post_id ) {
	$p = get_post( $post_id );
	switch ( $col ) {
		case 'cover':
			$thumb_id = get_post_thumbnail_id( $post_id );
			$img_src  = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'thumbnail' ) : '';
			if ( ! $img_src ) {
				$images = get_post_meta( $post_id, '_kottakkal_gallery_images', true );
				if ( ! is_array( $images ) ) {
					$images = json_decode( (string) $images, true );
				}
				if ( ! empty( $images[0]['url'] ) ) {
					$img_src = $images[0]['url'];
				} elseif ( ! empty( $images[0]['relPath'] ) ) {
					$img_src = get_stylesheet_directory_uri() . '/' . $images[0]['relPath'];
				}
			}
			if ( ! $img_src ) {
				$vids = get_post_meta( $post_id, '_kottakkal_gallery_videos', true );
				if ( ! is_array( $vids ) ) {
					$vids = json_decode( (string) $vids, true );
				}
				if ( ! empty( $vids[0]['id'] ) ) {
					$img_src = 'https://img.youtube.com/vi/' . $vids[0]['id'] . '/hqdefault.jpg';
				}
			}
			if ( $img_src ) {
				echo '<img src="' . esc_url( $img_src ) . '" style="width:50px; height:38px; object-fit:cover; border-radius:4px; border:1px solid #ccc; display:block;" alt="">';
			} else {
				echo '<span style="color:#999; font-size:12px;">—</span>';
			}
			break;

		case 'type':
			$type = get_post_meta( $post_id, '_kottakkal_gallery_type', true ) ?: 'photos';
			if ( $type === 'videos' ) {
				echo '<span style="display:inline-block; padding:3px 8px; border-radius:12px; font-size:11px; font-weight:600; background:#fce8e6; color:#c5221f;">🎥 Videos & TV</span>';
			} else {
				echo '<span style="display:inline-block; padding:3px 8px; border-radius:12px; font-size:11px; font-weight:600; background:#e6f4ea; color:#137333;">📷 Photo Album</span>';
			}
			break;

		case 'count':
			$type = get_post_meta( $post_id, '_kottakkal_gallery_type', true ) ?: 'photos';
			if ( $type === 'videos' ) {
				$vids = get_post_meta( $post_id, '_kottakkal_gallery_videos', true );
				if ( ! is_array( $vids ) ) $vids = json_decode( (string) $vids, true ) ?: array();
				echo '<strong>' . count( $vids ) . '</strong> <small style="color:#666;">videos</small>';
			} else {
				$images = get_post_meta( $post_id, '_kottakkal_gallery_images', true );
				if ( ! is_array( $images ) ) $images = json_decode( (string) $images, true ) ?: array();
				echo '<strong>' . count( $images ) . '</strong> <small style="color:#666;">photos</small>';
			}
			break;

		case 'slug':
			echo '<code>' . esc_html( $p->post_name ) . '</code>';
			break;

		case 'menu_order':
			echo esc_html( $p->menu_order );
			break;
	}
}
add_action( 'manage_gallery_album_posts_custom_column', 'kottakkal_gallery_album_column_content', 10, 2 );

/**
 * Enqueue Media Uploader Scripts for Doctor, Treatment, Testimonial & Gallery edit screens
 */
add_action( 'admin_enqueue_scripts', function( $hook ) {
	global $post_type;
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ), true ) && in_array( $post_type, array( 'doctor', 'treatment', 'testimonial', 'gallery_album' ), true ) ) {
		wp_enqueue_media();
		wp_add_inline_script( 'media-editor', "
			jQuery(document).ready(function($) {
				// --- 1. Doctor & Treatment Single Image Upload ---
				var file_frame;
				var isTreatment = $('body').hasClass('post-type-treatment');
				var modalTitle  = isTreatment ? 'Select Treatment Image' : 'Select Doctor Profile Photo';
				var modalBtn    = isTreatment ? 'Use this Image' : 'Use this Photo';

				$(document).on('click', '.kottakkal-upload-photo-btn', function(e) {
					e.preventDefault();
					if (file_frame) {
						file_frame.open();
						return;
					}
					file_frame = wp.media({
						title: modalTitle,
						button: { text: modalBtn },
						multiple: false,
						library: { type: 'image' }
					});
					file_frame.on('select', function() {
						var attachment = file_frame.state().get('selection').first().toJSON();
						var fullUrl = attachment.url;
						var previewUrl = (attachment.sizes && attachment.sizes.medium) ? attachment.sizes.medium.url : fullUrl;
						$('#_kottakkal_photo').val(fullUrl);
						$('#_kottakkal_photo_id').val(attachment.id);

						$('#doctor_photo_side_preview, #doctor_photo_main_preview, #treatment_photo_side_preview, #treatment_photo_main_preview').attr('src', previewUrl).show();
						$('#doctor_photo_side_empty, #doctor_photo_main_empty, #treatment_photo_side_empty, #treatment_photo_main_empty').hide();
						$('.kottakkal-remove-photo-btn').show();

						if ($('#_thumbnail_id').length) {
							$('#_thumbnail_id').val(attachment.id);
						}
					});
					file_frame.open();
				});

				$(document).on('click', '.kottakkal-remove-photo-btn', function(e) {
					e.preventDefault();
					$('#_kottakkal_photo').val('');
					$('#_kottakkal_photo_id').val('');
					$('#doctor_photo_side_preview, #doctor_photo_main_preview, #treatment_photo_side_preview, #treatment_photo_main_preview').attr('src', '').hide();
					$('#doctor_photo_side_empty, #doctor_photo_main_empty, #treatment_photo_side_empty, #treatment_photo_main_empty').show();
					$('.kottakkal-remove-photo-btn').hide();

					if ($('#_thumbnail_id').length) {
						$('#_thumbnail_id').val('-1');
					}
				});

				// --- 2. Testimonial Poster Card Upload ---
				var testi_frame;
				$(document).on('click', '.kottakkal-upload-testi-poster-btn', function(e) {
					e.preventDefault();
					if (testi_frame) {
						testi_frame.open();
						return;
					}
					testi_frame = wp.media({
						title: 'Select Review Poster / Certificate Image',
						button: { text: 'Use this Image' },
						multiple: false,
						library: { type: 'image' }
					});
					testi_frame.on('select', function() {
						var att = testi_frame.state().get('selection').first().toJSON();
						var prev = (att.sizes && att.sizes.medium) ? att.sizes.medium.url : att.url;
						$('#_kottakkal_poster').val(att.url);
						$('#_kottakkal_poster_id').val(att.id);
						$('#testi_poster_preview').attr('src', prev).show();
						$('#testi_poster_empty').hide();
						$('.kottakkal-remove-testi-poster-btn').show();
						if ($('#_thumbnail_id').length) {
							$('#_thumbnail_id').val(att.id);
						}
					});
					testi_frame.open();
				});

				$(document).on('click', '.kottakkal-remove-testi-poster-btn', function(e) {
					e.preventDefault();
					$('#_kottakkal_poster').val('');
					$('#_kottakkal_poster_id').val('');
					$('#testi_poster_preview').attr('src', '').hide();
					$('#testi_poster_empty').show();
					$('.kottakkal-remove-testi-poster-btn').hide();
					if ($('#_thumbnail_id').length) {
						$('#_thumbnail_id').val('-1');
					}
				});

				// --- 3. Gallery Album Type Switcher ---
				$(document).on('change', '.kottakkal-gal-type-toggle', function() {
					var val = $(this).val();
					if (val === 'videos') {
						$('#kottakkal_gal_photos_sec').hide();
						$('#kottakkal_gal_videos_sec').show();
					} else {
						$('#kottakkal_gal_videos_sec').hide();
						$('#kottakkal_gal_photos_sec').show();
					}
				});

				// --- 4. Gallery Photos Manager ---
				var gal_frame;
				function serializeGalleryPhotos() {
					var items = [];
					$('#kottakkal_gal_items_grid .kottakkal-gal-thumb-item').each(function(i) {
						var \$el = $(this);
						items.push({
							id: \$el.data('id') || 0,
							url: \$el.data('url') || '',
							relPath: \$el.data('rel') || '',
							title: \$el.find('span').text() || ('Photo ' + (i + 1))
						});
					});
					$('#_kottakkal_gallery_images').val(JSON.stringify(items));
					$('#kottakkal_photos_counter').text(items.length + ' Photos in this collection');
					if (items.length > 0) {
						$('#kottakkal_clear_photos_btn').show();
						$('#kottakkal_empty_gal_notice').hide();
					} else {
						$('#kottakkal_clear_photos_btn').hide();
						if (!$('#kottakkal_empty_gal_notice').length) {
							$('#kottakkal_gal_items_grid').html('<div id=\"kottakkal_empty_gal_notice\" style=\"grid-column:1/-1; text-align:center; padding:30px 10px; color:#666;\"><span class=\"dashicons dashicons-format-gallery\" style=\"font-size:40px; width:40px; height:40px; color:#a7aaad;\"></span><p style=\"margin:8px 0 0;\">No photos added yet. Click \"+ Add / Upload Photos\" above to add photos.</p></div>');
						} else {
							$('#kottakkal_empty_gal_notice').show();
						}
					}
				}

				$(document).on('click', '#kottakkal_add_photos_btn', function(e) {
					e.preventDefault();
					gal_frame = wp.media({
						title: 'Select Gallery Photos',
						button: { text: 'Add to Collection' },
						multiple: true,
						library: { type: 'image' }
					});
					gal_frame.on('select', function() {
						var selection = gal_frame.state().get('selection');
						$('#kottakkal_empty_gal_notice').remove();
						selection.each(function(attachment) {
							var att = attachment.toJSON();
							var prev = (att.sizes && att.sizes.medium) ? att.sizes.medium.url : att.url;
							var title = att.title || att.filename || 'Photo';
							var cardHtml = '<div class=\"kottakkal-gal-thumb-item\" data-id=\"' + att.id + '\" data-url=\"' + att.url + '\" style=\"position:relative; aspect-ratio:4/3; background:#fff; border:1px solid #dcdcde; border-radius:4px; overflow:hidden; box-shadow:0 1px 2px rgba(0,0,0,0.06);\">' +
								'<img src=\"' + prev + '\" alt=\"' + title + '\" style=\"width:100%; height:100%; object-fit:cover; display:block;\" loading=\"lazy\">' +
								'<button type=\"button\" class=\"kottakkal-del-photo-btn\" title=\"Remove photo\" style=\"position:absolute; top:4px; right:4px; width:22px; height:22px; border-radius:50%; background:rgba(0,0,0,0.7); color:#fff; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:14px; line-height:1; padding:0;\">×</button>' +
								'<span style=\"position:absolute; bottom:0; left:0; right:0; background:rgba(0,0,0,0.65); color:#fff; font-size:10px; padding:2px 4px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;\">' + title + '</span>' +
								'</div>';
							$('#kottakkal_gal_items_grid').append(cardHtml);
						});
						serializeGalleryPhotos();
					});
					gal_frame.open();
				});

				$(document).on('click', '.kottakkal-del-photo-btn', function(e) {
					e.preventDefault();
					$(this).closest('.kottakkal-gal-thumb-item').remove();
					serializeGalleryPhotos();
				});

				$(document).on('click', '#kottakkal_clear_photos_btn', function(e) {
					e.preventDefault();
					if (confirm('Are you sure you want to remove all photos from this collection?')) {
						$('#kottakkal_gal_items_grid .kottakkal-gal-thumb-item').remove();
						serializeGalleryPhotos();
					}
				});

				// --- 5. Gallery Videos Manager ---
				function parseYouTubeId(input) {
					if (!input) return '';
					var clean = input.trim();
					if (clean.length === 11 && !/^[a-zA-Z0-9_-]+$/.test(clean) === false && clean.indexOf('http') === -1) {
						return clean;
					}
					var match = clean.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/i);
					return match ? match[1] : clean;
				}

				function serializeGalleryVideos() {
					var vids = [];
					$('#kottakkal_video_items_wrap .kottakkal-video-row').each(function() {
						var \$row = $(this);
						var rawUrl = \$row.find('.kottakkal-vid-id-input').val().trim();
						var ytid   = parseYouTubeId(rawUrl);
						var title  = \$row.find('.kottakkal-vid-title-input').val().trim();
						var sub    = \$row.find('.kottakkal-vid-sub-input').val().trim();
						var chan   = \$row.find('.kottakkal-vid-chan-input').val().trim() || 'Janam TV';
						var prog   = \$row.find('.kottakkal-vid-prog-input').val().trim() || 'INFOCUS';

						if (ytid || title) {
							vids.push({
								id: ytid,
								watch_url: ytid ? ('https://www.youtube.com/watch?v=' + ytid) : rawUrl,
								title: title,
								subtitle: sub,
								channel: chan,
								program: prog
							});
						}
					});
					$('#_kottakkal_gallery_videos').val(JSON.stringify(vids));
					if (vids.length === 0 && !$('#kottakkal_empty_vid_notice').length) {
						$('#kottakkal_video_items_wrap').html('<div id=\"kottakkal_empty_vid_notice\" style=\"text-align:center; padding:30px 10px; background:#f9fafb; border:1px solid #c3c4c7; border-radius:6px; color:#666;\"><span class=\"dashicons dashicons-video-alt3\" style=\"font-size:40px; width:40px; height:40px; color:#a7aaad;\"></span><p style=\"margin:8px 0 0;\">No videos added yet. Click \"+ Add Video\" above to add YouTube broadcasts.</p></div>');
					}
				}

				$(document).on('click', '#kottakkal_add_video_btn', function(e) {
					e.preventDefault();
					$('#kottakkal_empty_vid_notice').remove();
					var newRowHtml = '<div class=\"kottakkal-video-row\" style=\"background:#fff; border:1px solid #c3c4c7; border-radius:6px; padding:14px; position:relative; box-shadow:0 1px 3px rgba(0,0,0,0.05);\">' +
						'<div style=\"display:grid; grid-template-columns:120px 1fr auto; gap:14px; align-items:flex-start;\">' +
							'<div style=\"aspect-ratio:16/9; background:#000; border-radius:4px; overflow:hidden; position:relative;\">' +
								'<img class=\"kottakkal-vid-thumb-prev\" src=\"\" style=\"width:100%; height:100%; object-fit:cover; display:block;\" onerror=\"this.src=\'\';\">' +
							'</div>' +
							'<div style=\"display:grid; grid-template-columns:1fr 1fr; gap:10px;\">' +
								'<div style=\"grid-column:1/-1;\">' +
									'<label style=\"font-size:11px; font-weight:600; color:#666;\">YouTube URL or Video ID:</label>' +
									'<input type=\"text\" class=\"kottakkal-vid-id-input\" value=\"\" style=\"width:100%; margin-top:2px;\" placeholder=\"e.g. https://www.youtube.com/watch?v=pYi8o-ErDJ4\">' +
								'</div>' +
								'<div>' +
									'<label style=\"font-size:11px; font-weight:600; color:#666;\">Video Title:</label>' +
									'<input type=\"text\" class=\"kottakkal-vid-title-input\" value=\"\" style=\"width:100%; margin-top:2px;\" placeholder=\"Video title\">' +
								'</div>' +
								'<div>' +
									'<label style=\"font-size:11px; font-weight:600; color:#666;\">English Subtitle:</label>' +
									'<input type=\"text\" class=\"kottakkal-vid-sub-input\" value=\"\" style=\"width:100%; margin-top:2px;\" placeholder=\"Topic / Description\">' +
								'</div>' +
								'<div>' +
									'<label style=\"font-size:11px; font-weight:600; color:#666;\">Channel Name:</label>' +
									'<input type=\"text\" class=\"kottakkal-vid-chan-input\" value=\"Janam TV\" style=\"width:100%; margin-top:2px;\">' +
								'</div>' +
								'<div>' +
									'<label style=\"font-size:11px; font-weight:600; color:#666;\">Program / Series Name:</label>' +
									'<input type=\"text\" class=\"kottakkal-vid-prog-input\" value=\"INFOCUS\" style=\"width:100%; margin-top:2px;\">' +
								'</div>' +
							'</div>' +
							'<div>' +
								'<button type=\"button\" class=\"button button-link-delete kottakkal-del-video-btn\" style=\"color:#b32d2e;\">' +
									'<span class=\"dashicons dashicons-trash\" style=\"vertical-align:middle;\"></span> Delete' +
								'</button>' +
							'</div>' +
						'</div>' +
					'</div>';
					$('#kottakkal_video_items_wrap').append(newRowHtml);
					serializeGalleryVideos();
				});

				$(document).on('input change', '.kottakkal-vid-id-input', function() {
					var raw = $(this).val();
					var id = parseYouTubeId(raw);
					var \$row = $(this).closest('.kottakkal-video-row');
					if (id) {
						\$row.find('.kottakkal-vid-thumb-prev').attr('src', 'https://img.youtube.com/vi/' + id + '/hqdefault.jpg');
					} else {
						\$row.find('.kottakkal-vid-thumb-prev').attr('src', '');
					}
					serializeGalleryVideos();
				});

				$(document).on('input change', '.kottakkal-vid-title-input, .kottakkal-vid-sub-input, .kottakkal-vid-chan-input, .kottakkal-vid-prog-input', function() {
					serializeGalleryVideos();
				});

				$(document).on('click', '.kottakkal-del-video-btn', function(e) {
					e.preventDefault();
					$(this).closest('.kottakkal-video-row').remove();
					serializeGalleryVideos();
				});
			});
		" );
	}
} );

/**
 * Auto-seed default doctors into DB if no doctor posts exist
 */
function kottakkal_seed_doctors_to_db() {
	if ( ! is_admin() ) {
		return;
	}

	$existing = get_posts( array(
		'post_type'   => 'doctor',
		'post_status' => 'any',
		'numberposts' => 1,
	) );

	if ( ! empty( $existing ) ) {
		return;
	}

	if ( ! function_exists( 'kottakkal_get_default_doctors' ) ) {
		return;
	}

	$defaults = kottakkal_get_default_doctors();
	foreach ( $defaults as $idx => $doc ) {
		$post_id = wp_insert_post( array(
			'post_title'   => $doc['name'],
			'post_name'    => $doc['slug'],
			'post_content' => implode( "\n\n", $doc['bio'] ?? array() ),
			'post_excerpt' => $doc['short'] ?? '',
			'post_status'  => 'publish',
			'post_type'    => 'doctor',
			'menu_order'   => $idx + 1,
		) );

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, '_kottakkal_role', $doc['role'] ?? '' );
			update_post_meta( $post_id, '_kottakkal_mono', $doc['mono'] ?? '' );
			update_post_meta( $post_id, '_kottakkal_tone', $doc['tone'] ?? 'forest' );
			update_post_meta( $post_id, '_kottakkal_creds', $doc['creds'] ?? array() );
			update_post_meta( $post_id, '_kottakkal_specs', $doc['specs'] ?? array() );
			if ( ! empty( $doc['img_url'] ) ) {
				update_post_meta( $post_id, '_kottakkal_photo', $doc['img_url'] );
			}
		}
	}
}
add_action( 'admin_init', 'kottakkal_seed_doctors_to_db' );

/**
 * Synchronize Dr. Minupriya's bio, credentials, specs, and role
 */
function kottakkal_sync_minupriya_doctor() {
	$synced = get_option( 'kottakkal_minupriya_synced_v4' );
	if ( $synced ) {
		return;
	}

	$doctor_posts = get_posts( array(
		'post_type'   => 'doctor',
		'post_status' => 'any',
		'numberposts' => -1,
	) );

	$target_post = null;
	foreach ( $doctor_posts as $dp ) {
		if ( stripos( $dp->post_title, 'Minupriya' ) !== false || $dp->post_name === 'minupriya' || $dp->post_name === 'rajesh' ) {
			$target_post = $dp;
			break;
		}
	}

	$minupriya_content = "Dr. Minupriya is an experienced Ayurvedic Practitioner with over 10 years of clinical experience across India and the UAE. A graduate of Rajiv Gandhi University of Health Sciences, Bangalore, she brings extensive knowledge and expertise in providing personalized Ayurvedic care focused on holistic healing and long-term wellness.\n\nWith a patient-centered and root-cause approach, Dr. Minupriya combines classical Ayurvedic principles and authentic therapeutic practices with individualized diet and lifestyle modifications to address patients' specific health concerns and promote overall well-being.\n\n### Her Philosophy\n\nDr. Minupriya believes in holistic healing through authentic Ayurveda, compassionate care, and personalized treatment approaches. Her mission is to help patients overcome pain, restore balance, and achieve sustainable improvements in their health and quality of life through natural healing and long-term wellness practices.\n\n*Begin Your Wellness Journey with Dr. Minupriya at Kottakkal Green Life Ayurvedic Center, Dubai.*";

	$minupriya_excerpt = "Experienced Ayurvedic Practitioner with over 10 years of clinical experience across India and the UAE. Graduate of Rajiv Gandhi University of Health Sciences, Bangalore.";

	$minupriya_creds = array(
		'Ayurvedic Practitioner | 10+ Years of Clinical Experience',
		'Rajiv Gandhi University of Health Sciences, Bangalore',
		'10+ years’ clinical experience across India and the UAE',
	);

	$minupriya_specs = array(
		'Gastrointestinal disorders and digestive health',
		'Skin diseases and dermatological conditions',
		'Respiratory disorders and respiratory health',
		'Musculoskeletal disorders and pain management',
		'Lifestyle-related health conditions',
		'Personalized diet and lifestyle management',
	);

	if ( $target_post ) {
		wp_update_post( array(
			'ID'           => $target_post->ID,
			'post_title'   => 'Dr. Minupriya',
			'post_name'    => 'minupriya',
			'post_content' => $minupriya_content,
			'post_excerpt' => $minupriya_excerpt,
			'post_status'  => 'publish',
		) );

		update_post_meta( $target_post->ID, '_kottakkal_role', 'Ayurvedic Practitioner | 10+ Years of Clinical Experience' );
		update_post_meta( $target_post->ID, '_kottakkal_mono', 'MP' );
		update_post_meta( $target_post->ID, '_kottakkal_tone', 'clay' );
		update_post_meta( $target_post->ID, '_kottakkal_creds', $minupriya_creds );
		update_post_meta( $target_post->ID, '_kottakkal_specs', $minupriya_specs );
	}

	update_option( 'kottakkal_minupriya_synced_v4', 1 );
}
add_action( 'init', 'kottakkal_sync_minupriya_doctor' );

/**
 * Synchronize Doctor display order in DB: 1st Naseeba, 2nd Ajitha, 3rd Minupriya
 */
function kottakkal_sync_doctor_order() {
	$synced = get_option( 'kottakkal_doc_order_synced_v1' );
	if ( $synced ) {
		return;
	}

	$order_map = array(
		'naseeba'   => 1,
		'ajitha'    => 2,
		'minupriya' => 3,
	);

	$posts = get_posts( array(
		'post_type'      => 'doctor',
		'posts_per_page' => -1,
		'post_status'    => 'any',
	) );

	foreach ( $posts as $p ) {
		if ( isset( $order_map[ $p->post_name ] ) ) {
			wp_update_post( array(
				'ID'         => $p->ID,
				'menu_order' => $order_map[ $p->post_name ],
			) );
		}
	}

	update_option( 'kottakkal_doc_order_synced_v1', 1 );
}
add_action( 'init', 'kottakkal_sync_doctor_order' );

/**
 * Automatically create and publish Privacy Policy and Terms pages in DB
 */
function kottakkal_sync_legal_pages() {
	$synced = get_option( 'kottakkal_legal_pages_synced_v1' );
	if ( $synced ) {
		return;
	}

	// 1. Privacy Policy Page
	$privacy_page = get_page_by_path( 'privacy-policy', OBJECT, array( 'page', 'post' ) );
	if ( ! $privacy_page ) {
		// Check by core option
		$core_privacy_id = get_option( 'wp_page_for_privacy_policy' );
		if ( $core_privacy_id ) {
			$privacy_page = get_post( $core_privacy_id );
		}
	}

	if ( ! $privacy_page ) {
		$privacy_id = wp_insert_post( array(
			'post_title'   => 'Privacy policy',
			'post_name'    => 'privacy-policy',
			'post_status'  => 'publish',
			'post_type'    => 'page',
		) );
	} else {
		$privacy_id = $privacy_page->ID;
		wp_update_post( array(
			'ID'          => $privacy_id,
			'post_title'  => 'Privacy policy',
			'post_name'   => 'privacy-policy',
			'post_status' => 'publish',
		) );
	}

	if ( $privacy_id && ! is_wp_error( $privacy_id ) ) {
		update_post_meta( $privacy_id, '_wp_page_template', 'templates/page-legal.php' );
		update_option( 'wp_page_for_privacy_policy', $privacy_id );
	}

	// 2. Terms and Medical Disclaimer Page
	$terms_page = get_page_by_path( 'terms', OBJECT, array( 'page', 'post' ) );
	if ( ! $terms_page ) {
		$terms_id = wp_insert_post( array(
			'post_title'   => 'Terms and medical disclaimer',
			'post_name'    => 'terms',
			'post_status'  => 'publish',
			'post_type'    => 'page',
		) );
	} else {
		$terms_id = $terms_page->ID;
		wp_update_post( array(
			'ID'          => $terms_id,
			'post_title'  => 'Terms and medical disclaimer',
			'post_name'   => 'terms',
			'post_status' => 'publish',
		) );
	}

	if ( $terms_id && ! is_wp_error( $terms_id ) ) {
		update_post_meta( $terms_id, '_wp_page_template', 'templates/page-legal.php' );
	}

	flush_rewrite_rules( false );
	update_option( 'kottakkal_legal_pages_synced_v1', 1 );
}
add_action( 'init', 'kottakkal_sync_legal_pages' );

/**
 * Auto-seed default testimonials into DB if no testimonial posts exist
 */
function kottakkal_seed_testimonials_to_db() {
	$synced = get_option( 'kottakkal_testi_seeded_v1' );
	if ( $synced ) {
		return;
	}

	$existing = get_posts( array(
		'post_type'   => 'testimonial',
		'post_status' => 'any',
		'numberposts' => 1,
	) );

	if ( ! empty( $existing ) ) {
		update_option( 'kottakkal_testi_seeded_v1', 1 );
		return;
	}

	if ( ! function_exists( 'kottakkal_get_default_testimonials' ) ) {
		$helpers = get_stylesheet_directory() . '/inc/helpers.php';
		if ( file_exists( $helpers ) ) {
			require_once $helpers;
		}
	}

	if ( ! function_exists( 'kottakkal_get_default_testimonials' ) ) {
		return;
	}

	$defaults = kottakkal_get_default_testimonials();
	foreach ( $defaults as $idx => $t ) {
		$post_id = wp_insert_post( array(
			'post_title'   => $t['name'],
			'post_name'    => $t['id'],
			'post_content' => $t['quote'],
			'post_status'  => 'publish',
			'post_type'    => 'testimonial',
			'menu_order'   => $idx + 1,
		) );

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, '_kottakkal_rating', $t['rating'] ?? 5 );
			update_post_meta( $post_id, '_kottakkal_source', $t['source'] ?? 'Google Reviews' );
			update_post_meta( $post_id, '_kottakkal_context', $t['context'] ?? '' );
			update_post_meta( $post_id, '_kottakkal_category', $t['category'] ?? 'pain' );
			update_post_meta( $post_id, '_kottakkal_doctor', $t['doctor'] ?? '' );
			update_post_meta( $post_id, '_kottakkal_therapist', $t['therapist'] ?? '' );
			update_post_meta( $post_id, '_kottakkal_duration', $t['duration'] ?? '' );
			update_post_meta( $post_id, '_kottakkal_poster', $t['poster'] ?? '' );
		}
	}

	update_option( 'kottakkal_testi_seeded_v1', 1 );
}
add_action( 'init', 'kottakkal_seed_testimonials_to_db' );

/**
 * Auto-seed default gallery collections into DB if no gallery_album posts exist
 */
function kottakkal_seed_gallery_to_db() {
	$synced = get_option( 'kottakkal_gallery_seeded_v1' );
	if ( $synced ) {
		return;
	}

	$existing = get_posts( array(
		'post_type'   => 'gallery_album',
		'post_status' => 'any',
		'numberposts' => 1,
	) );

	if ( ! empty( $existing ) ) {
		update_option( 'kottakkal_gallery_seeded_v1', 1 );
		return;
	}

	$json_file = get_stylesheet_directory() . '/inc/gallery-data.json';
	if ( file_exists( $json_file ) ) {
		$raw = json_decode( file_get_contents( $json_file ), true );
		if ( is_array( $raw ) ) {
			foreach ( $raw as $idx => $col ) {
				$post_id = wp_insert_post( array(
					'post_title'   => $col['title'],
					'post_name'    => $col['slug'],
					'post_status'  => 'publish',
					'post_type'    => 'gallery_album',
					'menu_order'   => $idx + 1,
				) );

				if ( $post_id && ! is_wp_error( $post_id ) ) {
					update_post_meta( $post_id, '_kottakkal_gallery_type', 'photos' );
					update_post_meta( $post_id, '_kottakkal_gallery_images', $col['images'] );
				}
			}
		}
	}

	// Insert Janam TV Video Series
	if ( ! function_exists( 'kottakkal_get_gallery_videos' ) ) {
		$helpers = get_stylesheet_directory() . '/inc/helpers.php';
		if ( file_exists( $helpers ) ) {
			require_once $helpers;
		}
	}

	$videos = function_exists( 'kottakkal_get_gallery_videos' ) ? kottakkal_get_gallery_videos() : array();
	$v_id = wp_insert_post( array(
		'post_title'   => 'Featured on Janam TV IN FOCUS',
		'post_name'    => 'janam-tv-infocus',
		'post_status'  => 'publish',
		'post_type'    => 'gallery_album',
		'menu_order'   => 9,
	) );

	if ( $v_id && ! is_wp_error( $v_id ) ) {
		update_post_meta( $v_id, '_kottakkal_gallery_type', 'videos' );
		update_post_meta( $v_id, '_kottakkal_gallery_videos', $videos );
	}

	update_option( 'kottakkal_gallery_seeded_v1', 1 );
}
add_action( 'init', 'kottakkal_seed_gallery_to_db' );



