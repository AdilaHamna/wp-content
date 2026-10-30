<?php
/**
 * Kottakkal Theme Helper Functions & Default Seed Data
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Clinic Contact Constants & Settings
 */
function kottakkal_get_contact_info() {
	return array(
		'phone'    => '+971 54 705 1545',
		'tel'      => '+971547051545',
		'email'    => 'info@kottakkalgreenlife.com',
		'addr1'    => '#205 Mozna Building',
		'addr2'    => 'Near Al Nahda Metro Station, Al Qusais 1, Dubai',
		'hours'    => '9 am to 9 pm, Monday to Sunday',
		'maps'     => 'https://www.google.com/maps/search/?api=1&query=Kottakkal%20Green%20Life%20Ayurvedic%20Center%20LLC%20Al%20Mozna%20Building%20Al%20Qusais%20Dubai',
		'dir'      => 'https://www.google.com/maps/dir/?api=1&destination=Kottakkal%20Green%20Life%20Ayurvedic%20Center%20LLC%2C%20Al%20Mozna%20Building%2C%20Al%20Qusais%2C%20Dubai',
		'fb'       => 'https://www.facebook.com/kottakkalgreenlifeayurveda/',
		'ig'       => 'https://www.instagram.com/kottakkalgreenlifeayurveda/',
		'whatsapp' => 'https://wa.me/971547051545',
	);
}

/**
 * Default Treatments Data
 */
function kottakkal_get_default_treatments() {
	return array(
		array(
			'id'      => 'abhyangam',
			'slug'    => 'abhyangam',
			'name'    => 'Abhyangam',
			'alt'     => 'Ayurvedic oil massage',
			'ing'     => 'Medicated herbal oil',
			'ill'     => 'drop',
			'tone'    => 'oil',
			'short'   => 'A full-body massage with warm medicated herbal oils, worked in slow, rhythmic strokes.',
			'purpose' => 'A traditional Kerala massage used to ease muscle tension and physical and mental strain, support circulation and bring the doshas into balance. Under a physician’s guidance the oils can be chosen to support plans for joint and muscle complaints, injuries and degenerative conditions.',
			'process' => 'After your consultation, your therapist warms the medicated oil chosen for you and works the whole body with slow, gentle strokes.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Medium', 'Medicated herbal oils' ),
			),
			'paths'   => array( 'joint', 'relax', 'degenerative' ),
			'img'     => 'assets/img/t-abhyangam.jpg',
		),
		array(
			'id'      => 'pottali-sweda',
			'slug'    => 'pottali-sweda',
			'name'    => 'Pottali Sweda',
			'alt'     => 'Herbal pouch sudation',
			'ing'     => 'Fresh herbal leaves',
			'ill'     => 'pouch',
			'tone'    => 'forest',
			'short'   => 'Warm cotton pouches of medicinal leaves, powders and oil, pressed over the body to induce gentle sweating.',
			'purpose' => 'A form of sudation therapy often recommended for persistent muscular and joint pain, and used in plans for body rejuvenation.',
			'process' => 'Fresh herbal leaves and medicinal powders are mixed with a prepared oil and tied in cotton cloth to form a kizhi. The pouches are heated and applied with measured pressure so the herbs are absorbed through the skin.',
			'facts'   => array(
				array( 'Medium', 'Herbs, powders and oil in cloth pouches' ),
			),
			'paths'   => array( 'joint' ),
			'img'     => 'assets/img/t-pottali-sweda.jpg',
		),
		array(
			'id'      => 'shirodara',
			'slug'    => 'shirodara',
			'name'    => 'Shirodhara',
			'alt'     => 'Continuous oil stream',
			'meaning' => 'Shiro, the head · Dhara, a flow',
			'ing'     => 'Lukewarm herbal oil',
			'ill'     => 'stream',
			'tone'    => 'saffron',
			'short'   => 'A steady, rhythmic stream of lukewarm herbal oil poured across the forehead.',
			'purpose' => 'Valued for deep relaxation, and traditionally used in plans for stress, anxiety, poor sleep and migraine.',
			'process' => 'You lie comfortably while lukewarm medicated oil, often sesame oil processed with Ayurvedic herbs, flows in a steady stream onto the forehead. The liquid and the length of the session are tailored to you.',
			'facts'   => array(
				array( 'Duration', '30 to 90 minutes' ),
				array( 'Medium', 'Lukewarm medicated oil' ),
			),
			'paths'   => array( 'relax' ),
			'img'     => 'assets/img/t-shirodara.jpg',
		),
		array(
			'id'      => 'njavara-kizhi',
			'slug'    => 'njavara-kizhi',
			'name'    => 'Njavara Kizhi',
			'alt'     => 'Shashtikashali Pinda Sweda',
			'meaning' => 'Njavara, a rice that grows in sixty days',
			'ing'     => 'Njavara rice',
			'ill'     => 'rice',
			'tone'    => 'ivory',
			'short'   => 'Boluses of Njavara rice, cooked in herbal preparations and dipped in medicated oil, massaged over the body.',
			'purpose' => 'A nourishing (brimhana) therapy, traditionally used for joint stiffness and back conditions such as sciatica, scoliosis and kyphosis, for arthritis, and to support skin and muscle tone.',
			'process' => 'The treatment moves through preparation, the main procedure and aftercare, working through seven standard positions, and closes with an herbal oil massage.',
			'facts'   => array(
				array( 'Medium', 'Medicated Njavara rice' ),
				array( 'Positions', 'Seven standard postures' ),
			),
			'paths'   => array( 'joint', 'degenerative' ),
			'img'     => 'assets/img/t-njavara-kizhi.jpg',
		),
		array(
			'id'      => 'kativasthi',
			'slug'    => 'kativasthi',
			'name'    => 'Kativasthi',
			'alt'     => 'Lower-back oil therapy',
			'ing'     => 'Black gram ring, warm oil',
			'ill'     => 'ring',
			'tone'    => 'clay',
			'short'   => 'Warm medicated oil held over the lower back inside a ring of black gram dough.',
			'purpose' => 'Used for lower-back complaints including lumbar spondylosis, intervertebral disc prolapse, lumbago and sciatica. It is intended to ease pain and stiffness, lubricate the joints and calm vata in the lumbosacral area.',
			'process' => 'A ring of dough made from black gram or whole flour is shaped on the lower back and filled with warm herbal oil or decoction, kept at temperature through the session.',
			'facts'   => array(
				array( 'Duration', 'Around 30 minutes' ),
				array( 'Area', 'Lower back' ),
			),
			'paths'   => array( 'joint' ),
			'img'     => 'assets/img/t-kativasthi.jpg',
		),
		array(
			'id'      => 'pizhichil',
			'slug'    => 'pizhichil',
			'name'    => 'Pizhichil',
			'alt'     => 'Therapeutic oil pouring',
			'meaning' => 'Honoured in Kerala as the king of therapies',
			'ing'     => 'Medicated oil, poured',
			'ill'     => 'pour',
			'tone'    => 'night',
			'short'   => 'Streams of lukewarm medicated oil poured over the body while therapists massage in rhythm.',
			'purpose' => 'Combines oleation (snehana) and sudation (swedana). Traditionally used for muscle fatigue, long-standing body pain, stress and vata-related conditions such as arthritis and rheumatic complaints.',
			'process' => 'More than three litres of warm medicated oil are poured continuously from head to feet as the body is gently massaged. It is often part of a Panchakarma programme.',
			'facts'   => array(
				array( 'Medium', '3+ litres of medicated oil' ),
				array( 'Programme', 'Often part of Panchakarma' ),
			),
			'paths'   => array( 'joint', 'degenerative', 'relax' ),
			'img'     => 'assets/img/t-pizhichil.jpg',
		),
		array(
			'id'      => 'nasyam',
			'slug'    => 'nasyam',
			'name'    => 'Nasyam',
			'alt'     => 'Nasal therapy',
			'ing'     => 'Herbal oil drops',
			'ill'     => 'nasya',
			'tone'    => 'sage',
			'short'   => 'Medicated oils or herbal preparations administered through the nostrils.',
			'purpose' => 'One of the five Panchakarma procedures. Traditionally used for complaints of the head and neck such as headache, sinus congestion and cervical stiffness, and to support restful sleep.',
			'process' => 'A practitioner applies measured amounts of medicated oil or herbal extract into each nostril.',
			'facts'   => array(
				array( 'Programme', 'Part of Panchakarma' ),
			),
			'paths'   => array( 'relax' ),
			'img'     => 'assets/img/t-nasyam.jpg',
		),
		array(
			'id'      => 'tarpanam',
			'slug'    => 'tarpanam',
			'name'    => 'Tarpanam',
			'alt'     => 'Netra Tarpanam · eye therapy',
			'ing'     => 'Medicated ghee',
			'ill'     => 'eye',
			'tone'    => 'saffron',
			'short'   => 'A small well of dough around the eyes is filled with warm medicated ghee, bathing the eyes as you blink.',
			'purpose' => 'Used to soothe dry, tired and strained eyes, including strain from long screen time and environmental irritants.',
			'process' => 'A practitioner builds a well around each eye and fills it with medicated ghee. Lukewarm ghee or other oils may be chosen depending on your constitution.',
			'caution' => 'Netra Tarpanam is not recommended for people with cataracts or an eye infection. Your doctor will suggest an alternative.',
			'facts'   => array(
				array( 'Medium', 'Medicated ghee' ),
				array( 'Area', 'Eyes' ),
			),
			'paths'   => array( 'beauty' ),
			'img'     => 'assets/img/t-tarpanam.jpg',
		),
		array(
			'id'      => 'udhwarthanam',
			'slug'    => 'udhwarthanam',
			'name'    => 'Udwarthanam',
			'alt'     => 'Herbal powder massage',
			'ing'     => 'Herbal powders',
			'ill'     => 'powder',
			'tone'    => 'clay',
			'short'   => 'A brisk, upward massage with medicated herbal powders, followed by a bath.',
			'purpose' => 'Often part of weight management plans. Also used to improve circulation and skin tone, reduce fluid retention and support joint mobility.',
			'process' => 'Herbal powder or paste is rubbed in upward strokes with firm pressure. Any oil is chosen with your skin history and allergies in mind. It is usually advised as a course, sometimes alongside herbal steam and internal medicines.',
			'facts'   => array(
				array( 'Medium', 'Herbal powders' ),
				array( 'Format', 'Usually a course' ),
			),
			'paths'   => array( 'weight' ),
			'img'     => 'assets/img/t-udhwarthanam.jpg',
		),
		array(
			'id'      => 'thalapothichil',
			'slug'    => 'thalapothichil',
			'name'    => 'Thalapothichil',
			'alt'     => 'Herbal head covering',
			'meaning' => 'Thala, the head · Pothichil, a covering',
			'ing'     => 'Banana leaf, herbal paste',
			'ill'     => 'banana',
			'tone'    => 'forest',
			'short'   => 'A cooling herbal paste applied to the scalp and wrapped with banana leaf or cloth.',
			'purpose' => 'A cooling, nourishing therapy used for pitta imbalances of the head and mind, for stress, and for scalp and hair health.',
			'process' => 'A paste prepared from Ayurvedic herbs is massaged gently into the scalp, then the head is wrapped so the herbs can be absorbed.',
			'facts'   => array(
				array( 'Medium', 'Herbal paste, banana leaf' ),
				array( 'Area', 'Scalp and head' ),
			),
			'paths'   => array( 'beauty', 'relax' ),
			'img'     => 'assets/img/t-thalapothichil.jpg',
		),
		array(
			'id'      => 'face-pack',
			'slug'    => 'face-pack',
			'name'    => 'Face Pack',
			'alt'     => 'Ayurvedic herbal facial · Mukha Lepam',
			'ing'     => 'Turmeric and rice',
			'ill'     => 'turmeric',
			'tone'    => 'ivory',
			'short'   => 'An herbal facial of massage, rice scrub, turmeric and a face pack of selected herbs.',
			'purpose' => 'Addresses concerns such as under-eye darkness, dark spots and loss of firmness, and helps restore moisture to the skin.',
			'process' => 'The facial combines massage, a rice scrub, turmeric and a face pack prepared from herbs chosen for your skin.',
			'facts'   => array(
				array( 'Medium', 'Herbal pastes, rice, turmeric' ),
			),
			'paths'   => array( 'beauty' ),
			'img'     => 'assets/img/t-face-pack.jpg',
		),
	);
}

/**
 * Default Care Pathways Data
 */
function kottakkal_get_default_pathways() {
	return array(
		array(
			'id'        => 'joint',
			'slug'      => 'joint',
			'name'      => 'Musculoskeletal & joint care',
			'short'     => 'Joint & muscle',
			'need'      => 'Pain, stiffness and injury',
			'ill'       => 'ring',
			'tone'      => 'clay',
			'intro'     => 'For joint and muscle pain, back conditions and recovery from injury.',
			'overview'  => 'Joint and muscle pain can cause swelling, discomfort and loss of movement. Our doctors see people with conditions such as frozen shoulder, tennis elbow, heel pain, back pain and sciatica, and with injuries that are slow to settle. Marma Chikitsa, a gentle touch therapy working on vital points of the body, is also offered.',
			'approach'  => 'Your plan may combine Panchakarma procedures, detoxification, dietary adjustments and herbal medicines, chosen after consultation to address the underlying imbalance as well as the symptoms.',
			'therapies' => array( 'kativasthi', 'njavara-kizhi', 'pottali-sweda', 'pizhichil', 'abhyangam' ),
			'docs'      => array( 'naseeba', 'ajitha', 'rajesh' ),
			'img'       => 'assets/img/p-joint.jpg',
		),
		array(
			'id'        => 'relax',
			'slug'      => 'relax',
			'name'      => 'Relaxation & rejuvenation',
			'short'     => 'Rest & renewal',
			'need'      => 'Stress and renewal',
			'ill'       => 'stream',
			'tone'      => 'saffron',
			'intro'     => 'Therapies to ease tension, rest the mind and restore energy.',
			'overview'  => 'Body and mind relaxation therapy and rejuvenation therapy, led by experienced therapists, for people carrying stress and fatigue.',
			'approach'  => 'Your doctor recommends a sequence of therapies, such as Shirodhara or Abhyangam, matched to how you are feeling and to your constitution.',
			'therapies' => array( 'shirodara', 'abhyangam', 'pizhichil', 'thalapothichil', 'nasyam' ),
			'docs'      => array(),
			'img'       => 'assets/img/p-relax.jpg',
		),
		array(
			'id'        => 'beauty',
			'slug'      => 'beauty',
			'name'      => 'Beauty, hair & eye care',
			'short'     => 'Skin, hair & eyes',
			'need'      => 'Skin, hair and eyes',
			'ill'       => 'turmeric',
			'tone'      => 'ivory',
			'intro'     => 'Herbal therapies for skin, scalp and tired eyes.',
			'overview'  => 'Ayurvedic herbal packs for the skin, hair care that looks at the dosha imbalances behind concerns such as dandruff, and eye care for strain from screens and pollution, including Netra Tarpanam.',
			'approach'  => 'Treatments are matched to your skin, scalp and constitution after consultation, and may be combined with advice on diet and daily routine.',
			'therapies' => array( 'face-pack', 'thalapothichil', 'tarpanam' ),
			'docs'      => array( 'ajitha', 'naseeba' ),
			'img'       => 'assets/img/p-beauty.jpg',
		),
		array(
			'id'        => 'weight',
			'slug'      => 'weight',
			'name'      => 'Obesity management',
			'short'     => 'Weight',
			'need'      => 'Weight and metabolism',
			'ill'       => 'powder',
			'tone'      => 'oil',
			'intro'     => 'Weight management built on diet, movement and herbal therapy.',
			'overview'  => 'Our weight management plans combine Ayurvedic herbal formulations with a nourishing diet, sensible calorie reduction and yoga, aiming for steady changes you can keep.',
			'approach'  => 'After assessing your health and routine, your doctor may recommend a course of Udwarthanam with herbal steam and internal medicines, alongside diet and lifestyle guidance.',
			'therapies' => array( 'udhwarthanam' ),
			'docs'      => array( 'ajitha', 'naseeba' ),
			'img'       => 'assets/img/p-weight.jpg',
		),
		array(
			'id'        => 'postnatal',
			'slug'      => 'postnatal',
			'name'      => 'Postnatal care',
			'short'     => 'Postnatal',
			'need'      => 'After childbirth',
			'ill'       => 'leafy',
			'tone'      => 'sage',
			'intro'     => 'Traditional care for mothers in the weeks after birth.',
			'overview'  => 'Ayurvedic postnatal care focuses on nourishment and balance, supporting a mother’s physical and mental strength in the period after childbirth.',
			'approach'  => 'Care is planned by our Medical Director, who has worked in specialised postnatal care centres in India and the UAE. Your therapies are selected at consultation according to your recovery and needs.',
			'therapies' => array(),
			'docs'      => array( 'naseeba' ),
			'img'       => 'assets/img/p-postnatal.jpg',
		),
		array(
			'id'        => 'degenerative',
			'slug'      => 'degenerative',
			'name'      => 'Degenerative & auto-immune conditions',
			'short'     => 'Long-term',
			'need'      => 'Long-term conditions',
			'ill'       => 'pouch',
			'tone'      => 'forest',
			'intro'     => 'Individual plans for living better with long-term conditions.',
			'overview'  => 'For people with degenerative and auto-immune conditions, we build an individual plan aimed at managing symptoms and improving day-to-day quality of life.',
			'approach'  => 'Each plan follows a thorough review and is adjusted over time. Ayurvedic care here works alongside, not instead of, the treatment you receive from your medical doctor. Please bring details of your current medicines to your consultation.',
			'therapies' => array( 'pizhichil', 'njavara-kizhi', 'abhyangam' ),
			'docs'      => array( 'rajesh', 'naseeba' ),
			'img'       => 'assets/img/p-degenerative.jpg',
		),
	);
}

/**
 * Default Doctors Data
 */
function kottakkal_get_default_doctors() {
	return array(
		array(
			'id'     => 'naseeba',
			'slug'   => 'naseeba',
			'name'   => 'Dr. Naseeba Abdul Rafeeque',
			'mono'   => 'NR',
			'role'   => 'Medical Director',
			'tone'   => 'forest',
			'img_url' => get_stylesheet_directory_uri() . '/assets/img/doc-naseeba.jpg',
			'creds'  => array(
				'DHA- and MOH-certified Ayurvedic practitioner',
				'KMCT Ayurveda Medical College, Calicut',
				'10+ years’ clinical experience in India and the UAE',
			),
			'short'  => 'Specialises in Panchakarma, women’s health and postnatal care.',
			'specs'  => array(
				'Panchakarma',
				'Women’s health',
				'Postnatal care',
				'Endocrine & lifestyle disorders',
				'Gastrointestinal conditions',
				'Musculoskeletal disorders',
			),
			'bio'    => array(
				'Dr. Naseeba Abdul Rafeeque is a DHA- and MOH-certified Ayurvedic practitioner with more than ten years of clinical experience across India and the UAE. A graduate of KMCT Ayurveda Medical College, Calicut, she has worked in established Ayurvedic clinics and specialised postnatal care centres in both countries.',
				'She combines the classical principles of Ayurveda with modern, evidence-based wellness practice, and builds treatment plans around the root cause of each patient’s condition.',
				'She holds training certifications in Clinical Cosmetology, Orthopaedic Care and Migraine Management, with further training in preventive healthcare and lifestyle counselling.',
			),
		),
		array(
			'id'     => 'ajitha',
			'slug'   => 'ajitha',
			'name'   => 'Dr. Ajitha Babu',
			'mono'   => 'AB',
			'role'   => 'Ayurveda Practitioner',
			'tone'   => 'night',
			'img_url' => get_stylesheet_directory_uri() . '/assets/img/doc-ajitha.jpg',
			'creds'  => array(
				'SN Ayurveda Medical College, Kollam (KUHS)',
				'6+ years’ experience in India',
				'Certified yoga trainer (Yoga Alliance International, CIY)',
			),
			'short'  => 'Experienced in joint conditions, PCOD and PCOS, skin and hair care, and weight management.',
			'specs'  => array(
				'Joint conditions & arthritis',
				'PCOD & PCOS',
				'Skin care',
				'Hair care',
				'Obesity management',
				'Diet, yoga & lifestyle',
			),
			'bio'    => array(
				'Dr. Ajitha Babu is an Ayurveda practitioner with more than six years of experience in India. She graduated from SN Ayurveda Medical College, Pangode, Kollam, affiliated to the Kerala University of Health Sciences.',
				'Her experience covers joint conditions including arthritis, gynaecological conditions such as PCOD and PCOS, skin and hair care, and weight management through diet, yoga and lifestyle change.',
				'She is a certified yoga trainer and teacher, trained through Yoga Alliance International and CIY.',
			),
		),
		array(
			'id'      => 'rajesh',
			'slug'    => 'rajesh',
			'name'    => 'Dr. Rajesh Kumar',
			'mono'    => 'RK',
			'role'    => 'Consultant Ayurvedic Physician',
			'tone'    => 'clay',
			'img_url' => get_stylesheet_directory_uri() . '/assets/img/doc-rajesh.jpg',
			'creds'   => array(
				'DHA-licensed Ayurvedic Practitioner',
				'Government Ayurveda College, Trivandrum (BAMS)',
				'8+ years’ clinical practice in Kerala and Dubai',
			),
			'short'   => 'Specialises in musculoskeletal disorders, spine health, chronic pain relief, and constitutional detoxification.',
			'specs'   => array(
				'Musculoskeletal & Spine Health',
				'Panchakarma Detoxification',
				'Chronic Pain & Arthritis',
				'Digestive & Metabolic Health',
				'Stress & Insomnia Relief',
				'Preventive Wellness Counselling',
			),
			'bio'     => array(
				'Dr. Rajesh Kumar is a DHA-licensed Ayurvedic practitioner with over eight years of clinical practice in classical Kerala Ayurveda therapies and holistic patient care.',
				'A graduate of Government Ayurveda College, Trivandrum, he brings deep clinical expertise in managing musculoskeletal disorders, chronic back and neck conditions, and lifestyle-induced stress.',
				'His clinical philosophy centers on root-cause healing, combining authentic therapeutic treatments with practical diet and lifestyle guidance to achieve sustainable health and vitality.',
			),
		),
	);
}

/**
 * Fetch treatments (From CPT 'treatment' if posts exist, else fallback to defaults)
 */
function kottakkal_get_treatments() {
	$posts = get_posts( array(
		'post_type'      => 'treatment',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order title',
		'order'          => 'ASC',
	) );

	if ( ! empty( $posts ) ) {
		$items = array();
		foreach ( $posts as $p ) {
			$facts_meta = get_post_meta( $p->ID, '_kottakkal_facts', true );
			$facts = array();
			if ( is_array( $facts_meta ) ) {
				$facts = $facts_meta;
			} elseif ( ! empty( $facts_meta ) ) {
				$lines = explode( "\n", $facts_meta );
				foreach ( $lines as $line ) {
					$parts = explode( ':', $line, 2 );
					if ( count( $parts ) === 2 ) {
						$facts[] = array( trim( $parts[0] ), trim( $parts[1] ) );
					}
				}
			}

			$paths_meta = get_post_meta( $p->ID, '_kottakkal_paths', true );
			$paths = is_array( $paths_meta ) ? $paths_meta : array_filter( array_map( 'trim', explode( ',', (string) $paths_meta ) ) );

			$feat_img = get_the_post_thumbnail_url( $p->ID, 'large' );

			$items[] = array(
				'id'      => $p->post_name,
				'slug'    => $p->post_name,
				'name'    => $p->post_title,
				'alt'     => get_post_meta( $p->ID, '_kottakkal_alt', true ) ?: 'Ayurvedic therapy',
				'meaning' => get_post_meta( $p->ID, '_kottakkal_meaning', true ),
				'ing'     => get_post_meta( $p->ID, '_kottakkal_ing', true ) ?: 'Medicated herbal preparation',
				'ill'     => get_post_meta( $p->ID, '_kottakkal_ill', true ) ?: 'drop',
				'tone'    => get_post_meta( $p->ID, '_kottakkal_tone', true ) ?: 'oil',
				'short'   => $p->post_excerpt ?: wp_trim_words( $p->post_content, 20 ),
				'purpose' => get_post_meta( $p->ID, '_kottakkal_purpose', true ) ?: $p->post_excerpt,
				'process' => $p->post_content,
				'facts'   => $facts,
				'paths'   => $paths,
				'caution' => get_post_meta( $p->ID, '_kottakkal_caution', true ),
				'img_url' => $feat_img,
				'post_id' => $p->ID,
				'link'    => get_permalink( $p->ID ),
			);
		}
		return $items;
	}

	$defaults = kottakkal_get_default_treatments();
	foreach ( $defaults as &$d ) {
		$d['link'] = home_url( '/treatments/' . $d['slug'] . '/' );
	}
	return $defaults;
}

/**
 * Fetch pathways (From CPT 'pathway' if posts exist, else fallback to defaults)
 */
function kottakkal_get_pathways() {
	$posts = get_posts( array(
		'post_type'      => 'pathway',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order title',
		'order'          => 'ASC',
	) );

	if ( ! empty( $posts ) ) {
		$items = array();
		foreach ( $posts as $p ) {
			$feat_img = get_the_post_thumbnail_url( $p->ID, 'large' );
			$therapies = get_post_meta( $p->ID, '_kottakkal_therapies', true );
			$docs = get_post_meta( $p->ID, '_kottakkal_docs', true );

			$items[] = array(
				'id'        => $p->post_name,
				'slug'      => $p->post_name,
				'name'      => $p->post_title,
				'short'     => get_post_meta( $p->ID, '_kottakkal_short', true ) ?: $p->post_title,
				'need'      => get_post_meta( $p->ID, '_kottakkal_need', true ) ?: 'Individualised care',
				'ill'       => get_post_meta( $p->ID, '_kottakkal_ill', true ) ?: 'leafy',
				'tone'      => get_post_meta( $p->ID, '_kottakkal_tone', true ) ?: 'clay',
				'intro'     => $p->post_excerpt ?: wp_trim_words( $p->post_content, 20 ),
				'overview'  => get_post_meta( $p->ID, '_kottakkal_overview', true ) ?: $p->post_content,
				'approach'  => get_post_meta( $p->ID, '_kottakkal_approach', true ),
				'therapies' => is_array( $therapies ) ? $therapies : array_filter( array_map( 'trim', explode( ',', (string) $therapies ) ) ),
				'docs'      => is_array( $docs ) ? $docs : array_filter( array_map( 'trim', explode( ',', (string) $docs ) ) ),
				'img_url'   => $feat_img,
				'post_id'   => $p->ID,
				'link'      => get_permalink( $p->ID ),
			);
		}
		return $items;
	}

	$defaults = kottakkal_get_default_pathways();
	foreach ( $defaults as &$d ) {
		$d['link'] = home_url( '/specialties/' . $d['slug'] . '/' );
	}
	return $defaults;
}

/**
 * Fetch doctors (From CPT 'doctor' if posts exist, else fallback to defaults)
 */
function kottakkal_get_doctors() {
	$posts = get_posts( array(
		'post_type'      => 'doctor',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order title',
		'order'          => 'ASC',
	) );

	if ( ! empty( $posts ) ) {
		$items = array();
		foreach ( $posts as $p ) {
			$creds = get_post_meta( $p->ID, '_kottakkal_creds', true );
			$specs = get_post_meta( $p->ID, '_kottakkal_specs', true );

			// Check custom photo field first, then photo_id, then standard featured image, then local asset
			$feat_img = get_post_meta( $p->ID, '_kottakkal_photo', true );
			if ( empty( $feat_img ) ) {
				$photo_id = get_post_meta( $p->ID, '_kottakkal_photo_id', true );
				if ( ! empty( $photo_id ) ) {
					$feat_img = wp_get_attachment_image_url( $photo_id, 'large' );
				}
			}
			if ( empty( $feat_img ) ) {
				$feat_img = get_the_post_thumbnail_url( $p->ID, 'large' );
			}
			if ( empty( $feat_img ) ) {
				$theme_dir = get_stylesheet_directory();
				$theme_uri = get_stylesheet_directory_uri();
				if ( file_exists( $theme_dir . '/assets/img/doc-' . $p->post_name . '.jpg' ) ) {
					$feat_img = $theme_uri . '/assets/img/doc-' . $p->post_name . '.jpg';
				}
			}

			$items[] = array(
				'id'      => $p->post_name,
				'slug'    => $p->post_name,
				'name'    => $p->post_title,
				'mono'    => get_post_meta( $p->ID, '_kottakkal_mono', true ) ?: substr( $p->post_title, 0, 2 ),
				'role'    => get_post_meta( $p->ID, '_kottakkal_role', true ) ?: 'Ayurveda Practitioner',
				'tone'    => get_post_meta( $p->ID, '_kottakkal_tone', true ) ?: 'forest',
				'creds'   => is_array( $creds ) ? $creds : array_filter( array_map( 'trim', explode( "\n", (string) $creds ) ) ),
				'short'   => $p->post_excerpt ?: wp_trim_words( $p->post_content, 20 ),
				'specs'   => is_array( $specs ) ? $specs : array_filter( array_map( 'trim', explode( ',', (string) $specs ) ) ),
				'bio'     => array_filter( explode( "\n\n", $p->post_content ) ),
				'img_url' => $feat_img,
				'post_id' => $p->ID,
				'link'    => get_permalink( $p->ID ),
			);
		}
		return $items;
	}

	$defaults = kottakkal_get_default_doctors();
	foreach ( $defaults as &$d ) {
		$d['link'] = home_url( '/doctors/' . $d['slug'] . '/' );
	}
	return $defaults;
}

/**
 * Botanical Illustration SVG Kit Generator
 */
function kottakkal_render_svg_art( $kind ) {
	switch ( $kind ) {
		case 'drop':
			return '<g transform="translate(96 470) rotate(-28)"><path d="M0 0C62 -50.6 53.3 -179.4 0 -230C-53.3 -179.4 -62 -50.6 0 0Z" fill="currentColor" fill-opacity="0.06"/><path d="M0 6L0 -223.1" stroke-opacity="0.8"/></g>
			<g transform="translate(318 480) rotate(26)"><path d="M0 0C54 -44 46.4 -156 0 -200C-46.4 -156 -54 -44 0 0Z" fill="currentColor" fill-opacity="0.06"/><path d="M0 6L0 -194" stroke-opacity="0.8"/></g>
			<path d="M200 70C200 70 302 214 302 292A102 102 0 0 1 98 292C98 214 200 70 200 70Z" fill="currentColor" fill-opacity="0.12" stroke-width="1.3"/>
			<path d="M140 300A62 62 0 0 0 186 356" stroke-opacity="0.7"/><path d="M152 262C160 236 170 214 182 196" stroke-opacity="0.5"/>
			<path d="M296 128c0 9-12 11-12 0 0-7 6-14 6-19 0 5 6 12 6 19Z" fill="currentColor" fill-opacity="0.25"/>
			<ellipse cx="200" cy="440" rx="46" ry="8" stroke-opacity="0.7"/><ellipse cx="200" cy="440" rx="92" ry="16" stroke-opacity="0.4"/>';

		case 'pouch':
			return '<circle cx="168" cy="330" r="86" fill="currentColor" fill-opacity="0.12" stroke-width="1.3"/>
			<ellipse cx="168" cy="244" rx="16" ry="7" fill="currentColor" fill-opacity="0.3"/>
			<path d="M182 244C220 236 236 200 228 170" stroke-opacity="0.7"/>
			<circle cx="286" cy="372" r="58" fill="currentColor" fill-opacity="0.08"/>
			<ellipse cx="286" cy="312" rx="11" ry="5" fill="currentColor" fill-opacity="0.3"/>';

		case 'stream':
			return '<path d="M110 -40L150 66M290 -40L250 66M200 -40V40" stroke-opacity="0.45"/>
			<path d="M120 66Q200 160 280 66Z" fill="currentColor" fill-opacity="0.15" stroke-width="1.3"/><path d="M120 66H280"/>
			<path d="M200 128C201 210 199 300 200 404" stroke-width="2.2"/>
			<ellipse cx="200" cy="418" rx="30" ry="7" stroke-opacity="0.7"/><ellipse cx="200" cy="418" rx="60" ry="14" stroke-opacity="0.4"/>';

		case 'rice':
			return '<path d="M120 500C140 380 186 250 300 150" stroke-width="1.4"/>
			<path d="M90 500C120 360 110 270 70 190" stroke-opacity="0.6"/>
			<ellipse cx="210" cy="310" rx="8.5" ry="3.6" transform="rotate(70 210 310)" fill="currentColor" fill-opacity="0.28"/>
			<ellipse cx="230" cy="280" rx="8.5" ry="3.6" transform="rotate(65 230 280)" fill="currentColor" fill-opacity="0.28"/>
			<ellipse cx="250" cy="240" rx="8.5" ry="3.6" transform="rotate(80 250 240)" fill="currentColor" fill-opacity="0.28"/>';

		case 'ring':
			return '<ellipse cx="200" cy="270" rx="160" ry="104" fill="currentColor" fill-opacity="0.1" stroke-width="1.3"/><ellipse cx="200" cy="270" rx="112" ry="68"/>
			<ellipse cx="200" cy="272" rx="24" ry="15" stroke-opacity="0.6"/>';

		case 'pour':
			return '<circle cx="112" cy="132" r="56" fill="currentColor" fill-opacity="0.12" stroke-width="1.3"/>
			<path d="M90 78H134M112 76V60M160 112L220 92" stroke-width="1.3"/>
			<path d="M220 96C246 104 256 190 262 300C264 340 266 380 268 404" stroke-width="2"/>
			<ellipse cx="268" cy="420" rx="32" ry="8" stroke-opacity="0.6"/>';

		case 'nasya':
			return '<rect x="128" y="236" width="88" height="170" rx="14" fill="currentColor" fill-opacity="0.12" stroke-width="1.3"/>
			<path d="M146 236V214Q172 204 198 214V236"/><rect x="156" y="150" width="32" height="64" rx="16" fill="currentColor" fill-opacity="0.2"/>
			<path d="M172 110c0 8-10 9-10 0 0-6 5-11 5-15 0 4 5 9 5 15Z" fill="currentColor" fill-opacity="0.3"/>';

		case 'eye':
			return '<path d="M60 236Q200 110 340 236Q200 362 60 236Z" fill="currentColor" fill-opacity="0.1" stroke-width="1.3"/>
			<path d="M36 236Q200 82 364 236Q200 390 36 236Z" stroke-dasharray="2 6" stroke-opacity="0.7"/>
			<circle cx="200" cy="236" r="58" fill="currentColor" fill-opacity="0.14"/><circle cx="200" cy="236" r="26" fill="currentColor" fill-opacity="0.45" stroke="none"/>';

		case 'powder':
			return '<path d="M80 290A120 120 0 0 0 320 290Z" fill="currentColor" fill-opacity="0.12" stroke-width="1.3"/><path d="M66 290H334" stroke-width="1.3"/>
			<path d="M104 290Q200 186 296 290" stroke-opacity="0.6"/>';

		case 'banana':
			return '<g transform="translate(200 500) rotate(12)"><path d="M0 0C110 -120 104 -360 0 -470C-96 -360 -104 -120 0 0Z" fill="currentColor" fill-opacity="0.1" stroke-width="1.3"/><path d="M0 0L0 -462" stroke-width="1.2"/></g>';

		case 'turmeric':
			return '<circle cx="300" cy="200" r="54" fill="currentColor" fill-opacity="0.14" stroke-width="1.3"/><circle cx="300" cy="200" r="40" stroke-opacity="0.6"/><circle cx="300" cy="200" r="24" fill="currentColor" fill-opacity="0.22"/>';

		case 'leafy':
		default:
			return '<path d="M200 500C200 360 170 180 200 40" stroke-width="1.2"/>
			<path d="M200 350C140 310 110 240 100 170" stroke-opacity="0.6"/>
			<path d="M200 260C260 220 290 150 300 80" stroke-opacity="0.6"/>';
	}
}

/**
 * Render Botanical Plate Component (Matches reference website layout)
 */
function kottakkal_render_plate( $key, $ill, $tone = 'oil', $cap = '', $ratio = '', $extra = '', $custom_img = '' ) {
	$theme_uri = get_stylesheet_directory_uri();
	$theme_dir = get_stylesheet_directory();

	$photo_url = '';
	if ( ! empty( $custom_img ) ) {
		$photo_url = $custom_img;
	} else {
		// Map known keys to local assets
		$map = array(
			'about'           => 'assets/img/about.jpg',
			'intro-a'         => 'assets/img/intro-a.jpg',
			'intro-b'         => 'assets/img/intro-b.jpg',
			'p-beauty'        => 'assets/img/p-beauty.jpg',
			'p-degenerative'  => 'assets/img/p-degenerative.jpg',
			'p-joint'         => 'assets/img/p-joint.jpg',
			'p-postnatal'     => 'assets/img/p-postnatal.jpg',
			'p-relax'         => 'assets/img/p-relax.jpg',
			'p-weight'        => 'assets/img/p-weight.jpg',
			'ritual-1'        => 'assets/img/ritual-1.jpg',
			'ritual-2'        => 'assets/img/ritual-2.jpg',
			'ritual-3'        => 'assets/img/ritual-3.jpg',
			't-abhyangam'     => 'assets/img/t-abhyangam.jpg',
			't-face-pack'     => 'assets/img/t-face-pack.jpg',
			't-kativasthi'    => 'assets/img/t-kativasthi.jpg',
			't-nasyam'        => 'assets/img/t-nasyam.jpg',
			't-njavara-kizhi' => 'assets/img/t-njavara-kizhi.jpg',
			't-pizhichil'     => 'assets/img/t-pizhichil.jpg',
			't-pottali-sweda' => 'assets/img/t-pottali-sweda.jpg',
			't-shirodara'     => 'assets/img/t-shirodara.jpg',
			't-tarpanam'      => 'assets/img/t-tarpanam.jpg',
			't-thalapothichil' => 'assets/img/t-thalapothichil.jpg',
			't-udhwarthanam'  => 'assets/img/t-udhwarthanam.jpg',
			'doc-naseeba'     => 'assets/img/doc-naseeba.jpg',
			'doc-ajitha'      => 'assets/img/doc-ajitha.jpg',
			'doc-rajesh'      => 'assets/img/doc-rajesh.jpg',
			'doc-arun'        => 'assets/img/doc-arun.jpg',
		);

		if ( isset( $map[ $key ] ) && file_exists( $theme_dir . '/' . $map[ $key ] ) ) {
			$photo_url = $theme_uri . '/' . $map[ $key ];
		}
	}

	$lite = ( empty( $photo_url ) && ( $tone === 'ivory' || $tone === 'sage' ) ) ? ' lite' : '';
	$ratio_attr = ! empty( $ratio ) ? ' style="aspect-ratio:' . esc_attr( $ratio ) . '"' : '';

	$inner = '';
	if ( ! empty( $photo_url ) ) {
		if ( ! empty( $cap ) ) {
			$cap = 'Illustrative image';
		}
		$inner = '<img src="' . esc_url( $photo_url ) . '" alt="' . esc_attr( $cap ) . '" loading="lazy" decoding="async">';
	} else {
		$inner = '<svg class="ill" viewBox="0 0 400 500" preserveAspectRatio="xMidYMid meet" aria-hidden="true">' . kottakkal_render_svg_art( $ill ) . '</svg>';
	}

	$cap_html = ! empty( $cap ) ? '<span class="cap">' . esc_html( $cap ) . '</span>' : '';
	$doc_cls  = ( str_starts_with( (string) $key, 'doc-' ) || $ill === 'doc' ) ? ' plate-doctor plate-' . sanitize_html_class( $key ) : '';

	return '<div class="plate p-' . esc_attr( $tone ) . $lite . $doc_cls . '"' . $ratio_attr . '><div class="art">' . $inner . '</div>' . $extra . $cap_html . '</div>';
}
