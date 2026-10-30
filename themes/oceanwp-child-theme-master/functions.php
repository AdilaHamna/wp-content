<?php
/**
 * OceanWP Child Theme Functions
 * Kottakkal Green Life Ayurvedic Center Custom Theme
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. Load Modular Inclusions
require_once get_stylesheet_directory() . '/inc/helpers.php';
require_once get_stylesheet_directory() . '/inc/cpt.php';
require_once get_stylesheet_directory() . '/inc/cf7.php';

/**
 * Enqueue Parent and Child Stylesheets & Scripts
 */
function kottakkal_enqueue_scripts() {
	$theme_uri = get_stylesheet_directory_uri();
	$version   = wp_get_theme()->get( 'Version' );

	// Google Fonts: Fraunces (display/wordmarks), Inter (standard content body & UI), Playfair Display
	wp_enqueue_style( 'kottakkal-google-fonts', 'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300..600&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap', array(), null );

	// Parent OceanWP stylesheet
	wp_enqueue_style( 'oceanwp-style', get_template_directory_uri() . '/style.css' );

	// Child Theme Main CSS (Core tokens, components, botanical plates, header, footer)
	wp_enqueue_style( 'kottakkal-main', $theme_uri . '/assets/css/main.css', array( 'oceanwp-style' ), $version );

	// Booking Wizard CSS (Multi-step interactive wizard styles)
	wp_enqueue_style( 'kottakkal-booking-wizard', $theme_uri . '/assets/css/booking-wizard.css', array( 'kottakkal-main' ), $version );

	// Separate CSS per page template / post type
	$template = get_page_template_slug();

	// Home Page
	if ( is_front_page() || is_page_template( 'templates/page-home.php' ) ) {
		wp_enqueue_style( 'kottakkal-home', $theme_uri . '/assets/css/home.css', array( 'kottakkal-main' ), $version );
		wp_enqueue_script( 'kottakkal-home-js', $theme_uri . '/assets/js/home.js', array( 'kottakkal-main-js', 'gsap', 'gsap-scroll-trigger' ), $version, true );
		wp_enqueue_style( 'kottakkal-cf7', $theme_uri . '/assets/css/cf7.css', array( 'kottakkal-main' ), $version );
	}

	// About Us Page
	if ( is_page_template( 'templates/page-about.php' ) || is_page( 'about-us' ) ) {
		wp_enqueue_style( 'kottakkal-about', $theme_uri . '/assets/css/about.css', array( 'kottakkal-main' ), $version );
	}

	// Treatments Archive / Directory
	if ( is_page_template( 'templates/page-treatments.php' ) || is_post_type_archive( 'treatment' ) || is_page( 'treatments' ) ) {
		wp_enqueue_style( 'kottakkal-treatments', $theme_uri . '/assets/css/treatments.css', array( 'kottakkal-main' ), $version );
	}

	// Single Treatment
	if ( is_singular( 'treatment' ) || is_page_template( 'templates/single-treatment.php' ) || get_query_var( 'treatment' ) ) {
		wp_enqueue_style( 'kottakkal-single-treatment', $theme_uri . '/assets/css/single-treatment.css', array( 'kottakkal-main' ), $version );
	}

	// Care Pathways Archive
	if ( is_page_template( 'templates/page-specialties.php' ) || is_post_type_archive( 'pathway' ) || is_page( 'specialties' ) ) {
		wp_enqueue_style( 'kottakkal-specialties', $theme_uri . '/assets/css/specialties.css', array( 'kottakkal-main' ), $version );
	}

	// Single Care Pathway
	if ( is_singular( 'pathway' ) || is_page_template( 'templates/single-pathway.php' ) || get_query_var( 'pathway' ) ) {
		wp_enqueue_style( 'kottakkal-single-pathway', $theme_uri . '/assets/css/single-pathway.css', array( 'kottakkal-main' ), $version );
	}

	// Doctors Archive
	if ( is_page_template( 'templates/page-doctors.php' ) || is_post_type_archive( 'doctor' ) || is_page( 'doctors' ) ) {
		wp_enqueue_style( 'kottakkal-doctors', $theme_uri . '/assets/css/doctors.css', array( 'kottakkal-main' ), $version );
	}

	// Single Doctor
	if ( is_singular( 'doctor' ) || is_page_template( 'templates/single-doctor.php' ) || get_query_var( 'doctor' ) ) {
		wp_enqueue_style( 'kottakkal-single-doctor', $theme_uri . '/assets/css/single-doctor.css', array( 'kottakkal-main' ), $version );
	}

	// Wellness Page
	if ( is_page_template( 'templates/page-wellness.php' ) || is_page( 'wellness' ) ) {
		wp_enqueue_style( 'kottakkal-wellness', $theme_uri . '/assets/css/wellness.css', array( 'kottakkal-main' ), $version );
	}

	// Contact Us Page
	if ( is_page_template( 'templates/page-contact.php' ) || is_page( 'contact-us' ) ) {
		wp_enqueue_style( 'kottakkal-contact', $theme_uri . '/assets/css/contact.css', array( 'kottakkal-main' ), $version );
		wp_enqueue_style( 'kottakkal-cf7', $theme_uri . '/assets/css/cf7.css', array( 'kottakkal-main' ), $version );
	}

	// Book Appointment Page
	if ( is_page_template( 'templates/page-book.php' ) || is_page( 'book' ) ) {
		wp_enqueue_style( 'kottakkal-book', $theme_uri . '/assets/css/book.css', array( 'kottakkal-main' ), $version );
		wp_enqueue_style( 'kottakkal-cf7', $theme_uri . '/assets/css/cf7.css', array( 'kottakkal-main' ), $version );
	}

	// Legal / Policy Pages
	if ( is_page_template( 'templates/page-legal.php' ) || is_page( array( 'privacy-policy', 'terms' ) ) ) {
		wp_enqueue_style( 'kottakkal-legal', $theme_uri . '/assets/css/legal.css', array( 'kottakkal-main' ), $version );
	}

	// GSAP Core & ScrollTrigger for animations
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
	wp_enqueue_script( 'gsap-scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array( 'gsap' ), '3.12.5', true );

	// Global interactions script
	wp_enqueue_script( 'kottakkal-main-js', $theme_uri . '/assets/js/main.js', array( 'gsap', 'gsap-scroll-trigger' ), $version, true );

	// Booking Wizard JavaScript (Multi-step flow, validation, review & AJAX submission)
	wp_enqueue_script( 'kottakkal-booking-js', $theme_uri . '/assets/js/booking-wizard.js', array( 'kottakkal-main-js' ), $version, true );

	$contact = kottakkal_get_contact_info();
	wp_localize_script( 'kottakkal-booking-js', 'kottakkal_ajax', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => wp_create_nonce( 'kottakkal_booking_nonce' ),
		'phone'    => $contact['phone'],
		'tel'      => $contact['tel'],
		'email'    => $contact['email'],
	) );
}
add_action( 'wp_enqueue_scripts', 'kottakkal_enqueue_scripts' );

/**
 * Filter Template Include for Custom Post Types & Archives
 */
function kottakkal_template_include( $template ) {
	$theme_dir = get_stylesheet_directory();

	// Single Treatment
	if ( is_singular( 'treatment' ) ) {
		$file = $theme_dir . '/templates/single-treatment.php';
		if ( file_exists( $file ) ) return $file;
	}

	// Archive Treatment
	if ( is_post_type_archive( 'treatment' ) ) {
		$file = $theme_dir . '/templates/page-treatments.php';
		if ( file_exists( $file ) ) return $file;
	}

	// Single Pathway
	if ( is_singular( 'pathway' ) ) {
		$file = $theme_dir . '/templates/single-pathway.php';
		if ( file_exists( $file ) ) return $file;
	}

	// Archive Pathway
	if ( is_post_type_archive( 'pathway' ) ) {
		$file = $theme_dir . '/templates/page-specialties.php';
		if ( file_exists( $file ) ) return $file;
	}

	// Single Doctor
	if ( is_singular( 'doctor' ) ) {
		$file = $theme_dir . '/templates/single-doctor.php';
		if ( file_exists( $file ) ) return $file;
	}

	// Archive Doctor
	if ( is_post_type_archive( 'doctor' ) ) {
		$file = $theme_dir . '/templates/page-doctors.php';
		if ( file_exists( $file ) ) return $file;
	}

	// Fallback routing for custom single pages if CPT permalinks collide with pages
	$req_path = trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

	// 1. Doctors
	if ( preg_match( '#^doctors/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_docs = kottakkal_get_doctors();
		foreach ( $all_docs as $d ) {
			if ( $d['slug'] === $slug || $d['id'] === $slug ) {
				status_header( 200 );
				set_query_var( 'doctor', $slug );
				kottakkal_setup_virtual_doctor_post( $d );
				$file = $theme_dir . '/templates/single-doctor.php';
				if ( file_exists( $file ) ) return $file;
			}
		}
	}

	// 2. Care Pathways / Specialties
	if ( preg_match( '#^specialties/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_paths = kottakkal_get_pathways();
		foreach ( $all_paths as $p ) {
			if ( $p['slug'] === $slug || $p['id'] === $slug ) {
				status_header( 200 );
				set_query_var( 'pathway', $slug );
				kottakkal_setup_virtual_pathway_post( $p );
				$file = $theme_dir . '/templates/single-pathway.php';
				if ( file_exists( $file ) ) return $file;
			}
		}
	}

	// 3. Treatments
	if ( preg_match( '#^treatments/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_treats = kottakkal_get_treatments();
		foreach ( $all_treats as $t ) {
			if ( $t['slug'] === $slug || $t['id'] === $slug ) {
				status_header( 200 );
				set_query_var( 'treatment', $slug );
				kottakkal_setup_virtual_treatment_post( $t );
				$file = $theme_dir . '/templates/single-treatment.php';
				if ( file_exists( $file ) ) return $file;
			}
		}
	}

	return $template;
}
add_filter( 'template_include', 'kottakkal_template_include', 99 );

/**
 * Setup a proper WP_Post and WP_Query state for doctor profile pages
 */
function kottakkal_setup_virtual_doctor_post( $doctor_data ) {
	global $wp_query, $post;
	if ( ! $wp_query ) return;

	$wp_query->is_404        = false;
	$wp_query->is_attachment = false;
	$wp_query->is_single     = true;
	$wp_query->is_singular   = true;
	$wp_query->is_page       = false;
	$wp_query->is_archive    = false;

	$db_post = null;
	if ( ! empty( $doctor_data['post_id'] ) ) {
		$db_post = get_post( $doctor_data['post_id'] );
	}
	if ( ! $db_post ) {
		$posts = get_posts( array(
			'post_type'   => 'doctor',
			'name'        => $doctor_data['slug'],
			'post_status' => 'any',
			'numberposts' => 1,
		) );
		if ( ! empty( $posts ) ) {
			$db_post = $posts[0];
		}
	}

	if ( $db_post instanceof WP_Post ) {
		$wp_query->post              = $db_post;
		$wp_query->queried_object    = $db_post;
		$wp_query->queried_object_id = $db_post->ID;
		$wp_query->posts             = array( $db_post );
		$wp_query->post_count        = 1;
		$post                        = $db_post;
		setup_postdata( $db_post );
		return $db_post;
	}

	$mock = new stdClass();
	$mock->ID                    = 999900 + ( abs( crc32( $doctor_data['id'] ?? 'doc' ) ) % 1000 );
	$mock->post_author           = 1;
	$mock->post_date             = current_time( 'mysql' );
	$mock->post_date_gmt         = current_time( 'mysql', 1 );
	$mock->post_content          = implode( "\n\n", $doctor_data['bio'] ?? array() );
	$mock->post_title            = $doctor_data['name'] ?? 'Doctor';
	$mock->post_excerpt          = $doctor_data['short'] ?? '';
	$mock->post_status           = 'publish';
	$mock->comment_status        = 'closed';
	$mock->ping_status           = 'closed';
	$mock->post_password         = '';
	$mock->post_name             = $doctor_data['slug'] ?? 'doctor';
	$mock->to_ping               = '';
	$mock->pinged                = '';
	$mock->post_modified         = current_time( 'mysql' );
	$mock->post_modified_gmt     = current_time( 'mysql', 1 );
	$mock->post_content_filtered = '';
	$mock->post_parent           = 0;
	$mock->guid                  = home_url( '/doctors/' . ( $doctor_data['slug'] ?? '' ) . '/' );
	$mock->menu_order            = 0;
	$mock->post_type             = 'doctor';
	$mock->post_mime_type        = '';
	$mock->comment_count         = 0;
	$mock->filter                = 'raw';

	$wp_post = new WP_Post( $mock );
	$wp_query->post              = $wp_post;
	$wp_query->queried_object    = $wp_post;
	$wp_query->queried_object_id = $wp_post->ID;
	$wp_query->posts             = array( $wp_post );
	$wp_query->post_count        = 1;
	$post                        = $wp_post;
	setup_postdata( $wp_post );

	return $wp_post;
}

/**
 * Setup a proper WP_Post and WP_Query state for pathway/specialty pages
 */
function kottakkal_setup_virtual_pathway_post( $pathway_data ) {
	global $wp_query, $post;
	if ( ! $wp_query ) return;

	$wp_query->is_404        = false;
	$wp_query->is_attachment = false;
	$wp_query->is_single     = true;
	$wp_query->is_singular   = true;
	$wp_query->is_page       = false;
	$wp_query->is_archive    = false;

	$db_post = null;
	if ( ! empty( $pathway_data['post_id'] ) ) {
		$db_post = get_post( $pathway_data['post_id'] );
	}
	if ( ! $db_post ) {
		$posts = get_posts( array(
			'post_type'   => 'pathway',
			'name'        => $pathway_data['slug'],
			'post_status' => 'any',
			'numberposts' => 1,
		) );
		if ( ! empty( $posts ) ) {
			$db_post = $posts[0];
		}
	}

	if ( $db_post instanceof WP_Post ) {
		$wp_query->post              = $db_post;
		$wp_query->queried_object    = $db_post;
		$wp_query->queried_object_id = $db_post->ID;
		$wp_query->posts             = array( $db_post );
		$wp_query->post_count        = 1;
		$post                        = $db_post;
		setup_postdata( $db_post );
		return $db_post;
	}

	$mock = new stdClass();
	$mock->ID                    = 999800 + abs( crc32( $pathway_data['slug'] ?? 'p' ) % 99 );
	$mock->post_author           = 1;
	$mock->post_date             = current_time( 'mysql' );
	$mock->post_date_gmt         = current_time( 'mysql', 1 );
	$mock->post_content          = $pathway_data['overview'] ?? '';
	$mock->post_title            = $pathway_data['name'] ?? 'Care Pathway';
	$mock->post_excerpt          = $pathway_data['intro'] ?? '';
	$mock->post_status           = 'publish';
	$mock->comment_status        = 'closed';
	$mock->ping_status           = 'closed';
	$mock->post_password         = '';
	$mock->post_name             = $pathway_data['slug'] ?? 'pathway';
	$mock->to_ping               = '';
	$mock->pinged                = '';
	$mock->post_modified         = current_time( 'mysql' );
	$mock->post_modified_gmt     = current_time( 'mysql', 1 );
	$mock->post_content_filtered = '';
	$mock->post_parent           = 0;
	$mock->guid                  = home_url( '/specialties/' . ( $pathway_data['slug'] ?? '' ) . '/' );
	$mock->menu_order            = 0;
	$mock->post_type             = 'pathway';
	$mock->post_mime_type        = '';
	$mock->comment_count         = 0;
	$mock->filter                = 'raw';

	$wp_post = new WP_Post( $mock );
	$wp_query->post              = $wp_post;
	$wp_query->queried_object    = $wp_post;
	$wp_query->queried_object_id = $wp_post->ID;
	$wp_query->posts             = array( $wp_post );
	$wp_query->post_count        = 1;
	$post                        = $wp_post;
	setup_postdata( $wp_post );

	return $wp_post;
}

/**
 * Setup a proper WP_Post and WP_Query state for treatment pages
 */
function kottakkal_setup_virtual_treatment_post( $treatment_data ) {
	global $wp_query, $post;
	if ( ! $wp_query ) return;

	$wp_query->is_404        = false;
	$wp_query->is_attachment = false;
	$wp_query->is_single     = true;
	$wp_query->is_singular   = true;
	$wp_query->is_page       = false;
	$wp_query->is_archive    = false;

	$db_post = null;
	if ( ! empty( $treatment_data['post_id'] ) ) {
		$db_post = get_post( $treatment_data['post_id'] );
	}
	if ( ! $db_post ) {
		$posts = get_posts( array(
			'post_type'   => 'treatment',
			'name'        => $treatment_data['slug'],
			'post_status' => 'any',
			'numberposts' => 1,
		) );
		if ( ! empty( $posts ) ) {
			$db_post = $posts[0];
		}
	}

	if ( $db_post instanceof WP_Post ) {
		$wp_query->post              = $db_post;
		$wp_query->queried_object    = $db_post;
		$wp_query->queried_object_id = $db_post->ID;
		$wp_query->posts             = array( $db_post );
		$wp_query->post_count        = 1;
		$post                        = $db_post;
		setup_postdata( $db_post );
		return $db_post;
	}

	$mock = new stdClass();
	$mock->ID                    = 999700 + abs( crc32( $treatment_data['slug'] ?? 't' ) % 99 );
	$mock->post_author           = 1;
	$mock->post_date             = current_time( 'mysql' );
	$mock->post_date_gmt         = current_time( 'mysql', 1 );
	$mock->post_content          = $treatment_data['procedure'] ?? '';
	$mock->post_title            = $treatment_data['name'] ?? 'Treatment';
	$mock->post_excerpt          = $treatment_data['short'] ?? '';
	$mock->post_status           = 'publish';
	$mock->comment_status        = 'closed';
	$mock->ping_status           = 'closed';
	$mock->post_password         = '';
	$mock->post_name             = $treatment_data['slug'] ?? 'treatment';
	$mock->to_ping               = '';
	$mock->pinged                = '';
	$mock->post_modified         = current_time( 'mysql' );
	$mock->post_modified_gmt     = current_time( 'mysql', 1 );
	$mock->post_content_filtered = '';
	$mock->post_parent           = 0;
	$mock->guid                  = home_url( '/treatments/' . ( $treatment_data['slug'] ?? '' ) . '/' );
	$mock->menu_order            = 0;
	$mock->post_type             = 'treatment';
	$mock->post_mime_type        = '';
	$mock->comment_count         = 0;
	$mock->filter                = 'raw';

	$wp_post = new WP_Post( $mock );
	$wp_query->post              = $wp_post;
	$wp_query->queried_object    = $wp_post;
	$wp_query->queried_object_id = $wp_post->ID;
	$wp_query->posts             = array( $wp_post );
	$wp_query->post_count        = 1;
	$post                        = $wp_post;
	setup_postdata( $wp_post );

	return $wp_post;
}

// Clean body classes on custom single pages
add_filter( 'body_class', function( $classes ) {
	if ( get_query_var( 'doctor' ) || is_singular( 'doctor' ) ) {
		$classes = array_diff( $classes, array( 'attachment', 'attachmentid-', 'attachment-' ) );
		$classes[] = 'single';
		$classes[] = 'single-doctor';
	}
	if ( get_query_var( 'pathway' ) || is_singular( 'pathway' ) ) {
		$classes = array_diff( $classes, array( 'attachment', 'attachmentid-', 'attachment-' ) );
		$classes[] = 'single';
		$classes[] = 'single-pathway';
	}
	if ( get_query_var( 'treatment' ) || is_singular( 'treatment' ) ) {
		$classes = array_diff( $classes, array( 'attachment', 'attachmentid-', 'attachment-' ) );
		$classes[] = 'single';
		$classes[] = 'single-treatment';
	}
	return array_values( array_unique( $classes ) );
}, 99 );

// Prevent 404 for virtual doctor, pathway and treatment profile routes
add_filter( 'pre_handle_404', function( $preempt, $wp_query ) {
	$req_path = trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

	// Doctors
	if ( preg_match( '#^doctors/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_docs = kottakkal_get_doctors();
		foreach ( $all_docs as $d ) {
			if ( $d['slug'] === $slug || $d['id'] === $slug ) {
				status_header( 200 );
				set_query_var( 'doctor', $slug );
				kottakkal_setup_virtual_doctor_post( $d );
				return true;
			}
		}
	}

	// Care Pathways / Specialties
	if ( preg_match( '#^specialties/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_paths = kottakkal_get_pathways();
		foreach ( $all_paths as $p ) {
			if ( $p['slug'] === $slug || $p['id'] === $slug ) {
				status_header( 200 );
				set_query_var( 'pathway', $slug );
				kottakkal_setup_virtual_pathway_post( $p );
				return true;
			}
		}
	}

	// Treatments
	if ( preg_match( '#^treatments/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_treats = kottakkal_get_treatments();
		foreach ( $all_treats as $t ) {
			if ( $t['slug'] === $slug || $t['id'] === $slug ) {
				status_header( 200 );
				set_query_var( 'treatment', $slug );
				kottakkal_setup_virtual_treatment_post( $t );
				return true;
			}
		}
	}

	return $preempt;
}, 10, 2 );

// Ensure query state is set during early template redirect
add_action( 'template_redirect', function() {
	$req_path = trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );

	if ( preg_match( '#^doctors/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_docs = kottakkal_get_doctors();
		foreach ( $all_docs as $d ) {
			if ( $d['slug'] === $slug || $d['id'] === $slug ) {
				kottakkal_setup_virtual_doctor_post( $d );
				return;
			}
		}
	}

	if ( preg_match( '#^specialties/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_paths = kottakkal_get_pathways();
		foreach ( $all_paths as $p ) {
			if ( $p['slug'] === $slug || $p['id'] === $slug ) {
				kottakkal_setup_virtual_pathway_post( $p );
				return;
			}
		}
	}

	if ( preg_match( '#^treatments/([^/]+)$#', $req_path, $matches ) ) {
		$slug = sanitize_title( $matches[1] );
		$all_treats = kottakkal_get_treatments();
		foreach ( $all_treats as $t ) {
			if ( $t['slug'] === $slug || $t['id'] === $slug ) {
				kottakkal_setup_virtual_treatment_post( $t );
				return;
			}
		}
	}
}, 1 );

// Add top-priority rewrite rules for CPT single routes to avoid page collisions
add_action( 'init', function() {
	add_rewrite_tag( '%pathway%', '([^&/]+)' );
	add_rewrite_tag( '%treatment%', '([^&/]+)' );
	add_rewrite_tag( '%doctor%', '([^&/]+)' );

	add_rewrite_rule( '^specialties/([^/]+)/?$', 'index.php?pathway=$matches[1]', 'top' );
	add_rewrite_rule( '^treatments/([^/]+)/?$', 'index.php?treatment=$matches[1]', 'top' );
	add_rewrite_rule( '^doctors/([^/]+)/?$', 'index.php?doctor=$matches[1]', 'top' );
}, 1 );

/**
 * Auto-ensure doctors CPT posts exist in the database with published status
 */
function kottakkal_ensure_doctors_exist() {
	if ( ! post_type_exists( 'doctor' ) ) {
		return;
	}

	$default_doctors = kottakkal_get_default_doctors();
	$created_any     = false;

	foreach ( $default_doctors as $d ) {
		$existing = get_posts( array(
			'post_type'   => 'doctor',
			'name'        => $d['slug'],
			'post_status' => 'any',
			'numberposts' => 1,
		) );

		if ( empty( $existing ) ) {
			$pid = wp_insert_post( array(
				'post_title'   => $d['name'],
				'post_name'    => $d['slug'],
				'post_content' => implode( "\n\n", $d['bio'] ),
				'post_excerpt' => $d['short'],
				'post_status'  => 'publish',
				'post_type'    => 'doctor',
			) );

			if ( $pid && ! is_wp_error( $pid ) ) {
				update_post_meta( $pid, '_kottakkal_role', $d['role'] );
				update_post_meta( $pid, '_kottakkal_mono', $d['mono'] );
				update_post_meta( $pid, '_kottakkal_tone', $d['tone'] );
				update_post_meta( $pid, '_kottakkal_creds', $d['creds'] );
				update_post_meta( $pid, '_kottakkal_specs', $d['specs'] );
				$created_any = true;
			}
		}
	}

	if ( $created_any ) {
		flush_rewrite_rules( false );
	}
}
add_action( 'init', 'kottakkal_ensure_doctors_exist', 25 );

/**
 * One-Click Setup & Content Seeder (Pages, CPT Posts & Settings)
 */
function kottakkal_setup_site_content() {
	// Only run on admin request or if first activation
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// 1. Create standard pages with templates
	$pages_to_create = array(
		'home' => array(
			'title'    => 'Home',
			'template' => 'templates/page-home.php',
		),
		'about-us' => array(
			'title'    => 'About us',
			'template' => 'templates/page-about.php',
		),
		'treatments' => array(
			'title'    => 'Treatments',
			'template' => 'templates/page-treatments.php',
		),
		'specialties' => array(
			'title'    => 'Care pathways',
			'template' => 'templates/page-specialties.php',
		),
		'doctors' => array(
			'title'    => 'Our doctors',
			'template' => 'templates/page-doctors.php',
		),
		'wellness' => array(
			'title'    => 'Wellness',
			'template' => 'templates/page-wellness.php',
		),
		'contact-us' => array(
			'title'    => 'Contact',
			'template' => 'templates/page-contact.php',
		),
		'book' => array(
			'title'    => 'Book an appointment',
			'template' => 'templates/page-book.php',
		),
		'privacy-policy' => array(
			'title'    => 'Privacy policy',
			'template' => 'templates/page-legal.php',
		),
		'terms' => array(
			'title'    => 'Terms and medical disclaimer',
			'template' => 'templates/page-legal.php',
		),
	);

	foreach ( $pages_to_create as $slug => $pdata ) {
		$existing = get_page_by_path( $slug );
		if ( ! $existing ) {
			$page_id = wp_insert_post( array(
				'post_title'   => $pdata['title'],
				'post_name'    => $slug,
				'post_status'  => 'publish',
				'post_type'    => 'page',
			) );

			if ( $page_id && ! is_wp_error( $page_id ) ) {
				update_post_meta( $page_id, '_wp_page_template', $pdata['template'] );

				if ( 'home' === $slug ) {
					update_option( 'show_on_front', 'page' );
					update_option( 'page_on_front', $page_id );
				}
			}
		} else {
			// Update template if not set
			update_post_meta( $existing->ID, '_wp_page_template', $pdata['template'] );
			if ( 'home' === $slug ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $existing->ID );
			}
		}
	}

	// 2. Seed Default Treatments CPT
	$default_treatments = kottakkal_get_default_treatments();
	foreach ( $default_treatments as $t ) {
		$existing = get_posts( array(
			'post_type'   => 'treatment',
			'name'        => $t['slug'],
			'post_status' => 'any',
			'numberposts' => 1,
		) );

		if ( empty( $existing ) ) {
			$pid = wp_insert_post( array(
				'post_title'   => $t['name'],
				'post_name'    => $t['slug'],
				'post_content' => $t['process'],
				'post_excerpt' => $t['short'],
				'post_status'  => 'publish',
				'post_type'    => 'treatment',
			) );

			if ( $pid && ! is_wp_error( $pid ) ) {
				update_post_meta( $pid, '_kottakkal_alt', $t['alt'] );
				if ( ! empty( $t['meaning'] ) ) update_post_meta( $pid, '_kottakkal_meaning', $t['meaning'] );
				update_post_meta( $pid, '_kottakkal_ing', $t['ing'] );
				update_post_meta( $pid, '_kottakkal_ill', $t['ill'] );
				update_post_meta( $pid, '_kottakkal_tone', $t['tone'] );
				update_post_meta( $pid, '_kottakkal_purpose', $t['purpose'] );
				update_post_meta( $pid, '_kottakkal_facts', $t['facts'] );
				update_post_meta( $pid, '_kottakkal_paths', $t['paths'] );
				if ( ! empty( $t['caution'] ) ) update_post_meta( $pid, '_kottakkal_caution', $t['caution'] );
			}
		}
	}

	// 3. Seed Default Care Pathways CPT
	$default_pathways = kottakkal_get_default_pathways();
	foreach ( $default_pathways as $p ) {
		$existing = get_posts( array(
			'post_type'   => 'pathway',
			'name'        => $p['slug'],
			'post_status' => 'any',
			'numberposts' => 1,
		) );

		if ( empty( $existing ) ) {
			$pid = wp_insert_post( array(
				'post_title'   => $p['name'],
				'post_name'    => $p['slug'],
				'post_content' => $p['overview'],
				'post_excerpt' => $p['intro'],
				'post_status'  => 'publish',
				'post_type'    => 'pathway',
			) );

			if ( $pid && ! is_wp_error( $pid ) ) {
				update_post_meta( $pid, '_kottakkal_short', $p['short'] );
				update_post_meta( $pid, '_kottakkal_need', $p['need'] );
				update_post_meta( $pid, '_kottakkal_approach', $p['approach'] );
				update_post_meta( $pid, '_kottakkal_tone', $p['tone'] );
				update_post_meta( $pid, '_kottakkal_ill', $p['ill'] );
				update_post_meta( $pid, '_kottakkal_therapies', $p['therapies'] );
				update_post_meta( $pid, '_kottakkal_docs', $p['docs'] );
			}
		}
	}

	// 4. Seed Default Doctors CPT
	$default_doctors = kottakkal_get_default_doctors();
	foreach ( $default_doctors as $d ) {
		$existing = get_posts( array(
			'post_type'   => 'doctor',
			'name'        => $d['slug'],
			'post_status' => 'any',
			'numberposts' => 1,
		) );

		if ( empty( $existing ) ) {
			$pid = wp_insert_post( array(
				'post_title'   => $d['name'],
				'post_name'    => $d['slug'],
				'post_content' => implode( "\n\n", $d['bio'] ),
				'post_excerpt' => $d['short'],
				'post_status'  => 'publish',
				'post_type'    => 'doctor',
			) );

			if ( $pid && ! is_wp_error( $pid ) ) {
				update_post_meta( $pid, '_kottakkal_role', $d['role'] );
				update_post_meta( $pid, '_kottakkal_mono', $d['mono'] );
				update_post_meta( $pid, '_kottakkal_tone', $d['tone'] );
				update_post_meta( $pid, '_kottakkal_creds', $d['creds'] );
				update_post_meta( $pid, '_kottakkal_specs', $d['specs'] );
			}
		}
	}

	// Flush rewrite rules
	flush_rewrite_rules();
}

// Hook setup into admin
add_action( 'admin_init', function() {
	if ( isset( $_GET['kottakkal_seed_content'] ) && '1' === $_GET['kottakkal_seed_content'] ) {
		kottakkal_setup_site_content();
		wp_safe_redirect( admin_url( 'edit.php?post_type=treatment&seeded=1' ) );
		exit;
	}

	// Auto check on admin init if treatments exist
	$treatments = get_posts( array( 'post_type' => 'treatment', 'numberposts' => 1 ) );
	if ( empty( $treatments ) ) {
		kottakkal_setup_site_content();
	}
} );

/**
 * Admin Notice for Content Seeding Status
 */
add_action( 'admin_notices', function() {
	if ( isset( $_GET['seeded'] ) && '1' === $_GET['seeded'] ) {
		echo '<div class="notice notice-success is-dismissible"><p><strong>Kottakkal Theme:</strong> All sample pages, treatments, care pathways, and doctor profiles have been successfully created! You can now edit any post type in the backend.</p></div>';
	}
} );
