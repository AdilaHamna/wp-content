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
 * Default Treatments Data (Classical 34 Therapies across Categories strictly matching official center document)
 */
function kottakkal_get_default_treatments() {
	return array(
		// -------------------------------------------------------------
		// GROUP 1: PANCHAKARMA — Main 5 Shodhana (1-5)
		// -------------------------------------------------------------
		array(
			'id'      => 'vamana',
			'slug'    => 'vamana',
			'name'    => 'Vamana',
			'alt'     => 'Therapeutic Emesis · Kapha Elimination',
			'meaning' => 'Vamana, therapeutic emesis to remove excess Kapha',
			'ing'     => 'Medicated emetic decoctions',
			'ill'     => 'drop',
			'tone'    => 'clay',
			'short'   => 'Therapeutic emesis to remove excess Kapha from the respiratory and upper gastrointestinal tract.',
			'purpose' => 'Vamana is the primary Shodhana (purificatory) procedure for Kapha disorders. After preparatory oleation (Snehana) and sweating (Swedana), induced emesis eliminates deep-seated toxins from the respiratory and gastrointestinal tract.',
			'process' => 'Administered in the early morning under continuous physician supervision. The patient drinks specially prepared herbal decoctions until natural, gentle therapeutic elimination occurs, followed by dietary rehabilitation (Samsarjana Krama).',
			'facts'   => array(
				array( 'Duration', '2 to 3 hours (Procedure day)' ),
				array( 'Dosha Target', 'Aggravated Kapha dosha' ),
				array( 'Indications', 'Bronchial asthma, chronic allergies, psoriasis, obesity, hyperacidity' ),
			),
			'paths'   => array( 'panchakarma', 'weight', 'beauty', 'degenerative' ),
		),
		array(
			'id'      => 'virechana',
			'slug'    => 'virechana',
			'name'    => 'Virechana',
			'alt'     => 'Therapeutic Purgation · Pitta Elimination',
			'meaning' => 'Virechana, therapeutic purgation to eliminate excess Pitta',
			'ing'     => 'Medicated herbal purgatives',
			'ill'     => 'stream',
			'tone'    => 'saffron',
			'short'   => 'Therapeutic purgation to eliminate excess Pitta and clear heat toxins from the liver and gut.',
			'purpose' => 'The supreme purification treatment for Pitta-dominant ailments. It purges toxins from the liver, gallbladder, and small intestine, clearing internal heat, skin eruptions, and digestive inflammation.',
			'process' => 'Following preparatory internal oleation with medicated ghee and steam therapy, an individualized herbal formulation is administered. Safe, controlled elimination cleanses the gut and bloodstream, followed by restorative diet.',
			'facts'   => array(
				array( 'Duration', 'Full day protocol with physician supervision' ),
				array( 'Dosha Target', 'Aggravated Pitta dosha' ),
				array( 'Indications', 'Acidity, gastritis, dermatitis, eczema, liver sluggishness, chronic allergies' ),
			),
			'paths'   => array( 'panchakarma', 'beauty', 'weight', 'relax' ),
		),
		array(
			'id'      => 'basti',
			'slug'    => 'basti',
			'name'    => 'Basti',
			'alt'     => 'Medicated Enemas · King of Panchakarma',
			'meaning' => 'Basti, medicated enemas to balance Vata dosha',
			'ing'     => 'Herbal decoctions (Niruha) & Medicated oils (Anuvasana)',
			'ill'     => 'drop',
			'tone'    => 'oil',
			'short'   => 'Medicated enemas to balance Vata dosha for sciatica, arthritis, lower back pain, and paralysis.',
			'purpose' => 'Revered as the King of Panchakarma and Ardha Chikitsa (half of all treatment). Administered into the colon—the primary seat of Vata—it lubricates the spine, eases neuromuscular disorders, and treats joint degeneration.',
			'process' => 'Depending on the prescribed protocol, warm herbal decoctions (Niruha) or soothing medicated oils (Anuvasana / Matra Basti) are administered into the colon with gentle abdominal massage to rebuild vitality.',
			'facts'   => array(
				array( 'Variants', 'Niruha Basti (Decoction), Anuvasana (Oil), Matra (Daily oil)' ),
				array( 'Dosha Target', 'Aggravated Vata dosha' ),
				array( 'Indications', 'Sciatica, osteoarthritis, lumbar spondylosis, paralysis, constipation' ),
			),
			'paths'   => array( 'panchakarma', 'joint', 'degenerative', 'relax' ),
		),
		array(
			'id'      => 'nasyam',
			'slug'    => 'nasyam',
			'name'    => 'Nasya',
			'alt'     => 'Nasal Medicine Administration · Panchakarma Shodhana',
			'meaning' => 'Nasya, administration of medicines through the nasal route',
			'ing'     => 'Classical medicated herbal oils (Anu Thailam)',
			'ill'     => 'nasya',
			'tone'    => 'sage',
			'short'   => 'Administration of medicines through the nasal route for sinus congestion, migraine, cervical spondylosis, and hair fall.',
			'purpose' => 'One of the five classical Panchakarma procedures. Cleanses and nourishes all structures above the collarbone, relieving chronic sinusitis, migraine, cervical stiffness, hair fall, and facial paralysis.',
			'process' => 'The session begins with an invigorating facial massage with warm herbal oils and mild steam to open the sinuses. Measured drops of warm medicated oil are administered into each nostril while the patient inhales gently, followed by medicated gargling.',
			'facts'   => array(
				array( 'Duration', '30 to 45 minutes' ),
				array( 'Route', 'Nasal instillation with facial steam' ),
				array( 'Indications', 'Sinusitis, migraine, cervical stiffness, hair loss, facial palsy, tension headaches' ),
			),
			'paths'   => array( 'panchakarma', 'relax', 'beauty', 'joint' ),
			'img'     => 'assets/img/t-nasyam.jpg',
		),
		array(
			'id'      => 'raktamokshana',
			'slug'    => 'raktamokshana',
			'name'    => 'Raktamokshana',
			'alt'     => 'Controlled Bloodletting · Blood Detoxification',
			'meaning' => 'Raktamokshana, controlled bloodletting to support detoxification',
			'ing'     => 'Medicinal leeches (Jalouka) & Siravyadha',
			'ill'     => 'leafy',
			'tone'    => 'forest',
			'short'   => 'Controlled bloodletting using medicinal leeches (Jalouka) or micro-techniques to clear deep vascular toxins.',
			'purpose' => 'Controlled blood purification procedure specifically indicated for stubborn skin conditions and vascular stagnation where vitiated Pitta and Rakta accumulate in localized tissues.',
			'process' => 'Carried out under sterile clinical conditions by qualified Ayurvedic physicians. Medicinal leeches naturally extract impure blood while secreting beneficial bioactive enzymes that reduce inflammation.',
			'facts'   => array(
				array( 'Modality', 'Jalouka Avacharana (Leech therapy) & Siravyadha' ),
				array( 'Focus', 'Microvascular purification & localized anti-inflammatory action' ),
				array( 'Indications', 'Psoriasis, eczema, varicose veins, localized blood stagnation, non-healing ulcers' ),
			),
			'paths'   => array( 'panchakarma', 'beauty', 'degenerative' ),
		),

		// -------------------------------------------------------------
		// GROUP 2: TREATMENTS — Classical & External Therapies (6-32)
		// -------------------------------------------------------------
		array(
			'id'      => 'abhyangam',
			'slug'    => 'abhyangam',
			'name'    => 'Abhyangam',
			'alt'     => 'Full Body Medicated Warm Oil Massage',
			'meaning' => 'Abhyangam, full-body rhythmic warm oil massage',
			'ing'     => 'Medicated warm herbal oil',
			'ill'     => 'drop',
			'tone'    => 'oil',
			'short'   => 'A full-body massage with warm medicated herbal oils, worked in rhythmic, synchronised strokes.',
			'purpose' => 'The foundational Ayurvedic oleation therapy. Eases muscular tension, lubricates joints, stimulates lymphatic flow, improves circulation, promotes deep sleep, and pacifies Vata dosha.',
			'process' => 'Therapists apply warm medicated oils matched to your constitution, massaging from head to toe through the classical seven standard positions.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Medium', 'Medicated herbal oils matched to dosha' ),
				array( 'Indications', 'Fatigue, stress, generalized body ache, dry skin, joint stiffness, poor circulation' ),
			),
			'paths'   => array( 'abhyanga-sweda', 'joint', 'relax', 'degenerative' ),
			'img'     => 'assets/img/t-abhyangam.jpg',
		),
		array(
			'id'      => 'pottali-sweda',
			'slug'    => 'pottali-sweda',
			'name'    => 'Kizhi',
			'alt'     => 'Herbal Bolus Fomentation · Ela Kizhi & Podi Kizhi',
			'meaning' => 'Kizhi, heated herbal bolus poultice fomentation',
			'ing'     => 'Fresh medicinal leaves, herbal powders & medicated oil',
			'ill'     => 'pouch',
			'tone'    => 'forest',
			'short'   => 'Warm boluses packed with fresh medicinal leaves and herbal powders tapped across the body for pain and inflammation.',
			'purpose' => 'A revered Kerala fomentation therapy (Patra Pinda & Churna Pinda Sweda). Heated herbal pouches are rhythmicly tapped over the body to relieve acute joint inflammation, muscular spasms, and back pain.',
			'process' => 'Fresh herbal leaves or medicinal powders are fried in medicated oils, tied in cotton pouches, heated in warm herbal oil, and applied with rhythmic tapping and massage across the body.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Variants', 'Ela Kizhi (Herbal Leaves) & Podi Kizhi (Herbal Powders)' ),
				array( 'Indications', 'Osteoarthritis, cervical and lumbar spondylosis, back spasms, sports injuries' ),
			),
			'paths'   => array( 'abhyanga-sweda', 'joint', 'degenerative' ),
			'img'     => 'assets/img/t-pottali-sweda.jpg',
		),
		array(
			'id'      => 'pizhichil',
			'slug'    => 'pizhichil',
			'name'    => 'Pizhichil',
			'alt'     => 'Royal Medicated Oil Bath · Snehana & Swedana',
			'meaning' => 'Pizhichil, squeezing continuous streams of warm medicated oil',
			'ing'     => '3+ litres warm medicated herbal oil',
			'ill'     => 'pour',
			'tone'    => 'night',
			'short'   => 'Continuous stream of warm medicated oil squeezed rhythmically over the entire body by synchronised therapists.',
			'purpose' => 'Known as the King of Ayurvedic therapies and the royal bath of Kerala. Combines deep oiling with gentle sweating to restore neuromuscular vitality, hemiplegia, and severe arthritic stiffness.',
			'process' => 'Two therapists continuously squeeze warm medicated oil from cotton cloths over your entire body in synchronised rhythm, followed by a warm herbal bath.',
			'facts'   => array(
				array( 'Duration', '60 to 75 minutes' ),
				array( 'Medium', '3+ litres of continuous warm herbal oil' ),
				array( 'Indications', 'Post-stroke paralysis, hemiplegia, rheumatoid arthritis, muscle wasting, nervous debility' ),
			),
			'paths'   => array( 'abhyanga-sweda', 'joint', 'degenerative', 'relax' ),
			'img'     => 'assets/img/t-pizhichil.jpg',
		),
		array(
			'id'      => 'kati-greeva-pichu',
			'slug'    => 'kati-greeva-pichu',
			'name'    => 'Pichu',
			'alt'     => 'Medicated Oil Pad Retention Therapy',
			'meaning' => 'Pichu, sterile cotton pad soaked in warm medicated oil',
			'ing'     => 'Sterile cotton pad, warm herbal oil',
			'ill'     => 'drop',
			'tone'    => 'oil',
			'short'   => 'Oil-soaked sterile cotton pad retained over the neck, lower back, or head for prolonged absorption and soothing nerve relief.',
			'purpose' => 'A gentle and intensely soothing palliative treatment. A sterile cotton pad saturated with warm medicated oil is placed over an afflicted spinal joint, neck, lower back, or vertex to ease nerve irritation and stiffness.',
			'process' => 'A thick sterile cotton pad is submerged in hot medicated oil, placed directly over the affected spinal or neck segment, and continuously replenished with warm oil for 30 to 45 minutes.',
			'facts'   => array(
				array( 'Duration', '30 to 45 minutes' ),
				array( 'Areas', 'Neck (Greeva), Lower back (Kati), Crown (Shiro), or joints' ),
				array( 'Indications', 'Cervical pain, lumbar stiffness, sciatica nerve irritation, localized muscle spasms' ),
			),
			'paths'   => array( 'abhyanga-sweda', 'joint', 'relax' ),
		),
		array(
			'id'      => 'veshtanam',
			'slug'    => 'veshtanam',
			'name'    => 'Veshtanam',
			'alt'     => 'Herbal Bandaging & Compression Therapy',
			'meaning' => 'Veshtanam, therapeutic herbal wrapping and bandaging',
			'ing'     => 'Medicated herbal pastes, cotton wrapping & warm herbal oils',
			'ill'     => 'pouch',
			'tone'    => 'clay',
			'short'   => 'Therapeutic herbal wrapping and bandaging to stabilize painful joints, relieve edema, and reduce stiffness.',
			'purpose' => 'A classical Ayurvedic therapeutic bandaging technique. Warm medicated paste and herbal oils are applied over afflicted joints, wrapped securely with medicinal cotton bandages to provide sustained compression, reduce swelling, and immobilize painful joints.',
			'process' => 'Warm medicinal pastes prepared with classical anti-inflammatory herbs, rock salt, and oils are applied smoothly across painful joint complexes and secured with firm cotton bandages for sustained relief.',
			'facts'   => array(
				array( 'Duration', '30 to 45 minutes application, left wrapped as prescribed' ),
				array( 'Focus', 'Joint compression, pain stabilization and effusion relief' ),
				array( 'Indications', 'Joint effusion, ligament sprains, tennis elbow, chronic arthritis, localized edema' ),
			),
			'paths'   => array( 'abhyanga-sweda', 'joint', 'degenerative' ),
		),
		array(
			'id'      => 'shirodara',
			'slug'    => 'shirodara',
			'name'    => 'Shirodhara',
			'alt'     => 'Continuous Medicated Oil Stream on Forehead',
			'meaning' => 'Shirodhara, continuous stream of warm herbal oil over the forehead',
			'ing'     => 'Warm medicated herbal oil',
			'ill'     => 'stream',
			'tone'    => 'saffron',
			'short'   => 'Continuous stream of warm herbal oil poured across the forehead for anxiety, insomnia, migraine, and mental stress.',
			'purpose' => 'The world-renowned crown jewel of Ayurvedic relaxation. Harmonizes brainwaves, calms the central nervous system, regulates sleep patterns, and clears mental tension.',
			'process' => 'You lie comfortably while lukewarm medicated oil flows in a gentle, oscillating stream from a copper vessel onto the third-eye forehead area, followed by a scalp and hair wrap.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Medium', 'Medicated herbal oils' ),
				array( 'Indications', 'Anxiety, insomnia, chronic headaches, hypertension, mental fatigue, stress' ),
			),
			'paths'   => array( 'dhara-head', 'relax', 'beauty' ),
			'img'     => 'assets/img/t-shirodara.jpg',
		),
		array(
			'id'      => 'dhoomapana',
			'slug'    => 'dhoomapana',
			'name'    => 'Dhoomapanam',
			'alt'     => 'Therapeutic Herbal Smoke Inhalation',
			'meaning' => 'Dhoomapanam, inhalation of therapeutic medicinal herbal smoke',
			'ing'     => 'Medicinal herbal stick with Guggulu & Haridra',
			'ill'     => 'powder',
			'tone'    => 'clay',
			'short'   => 'Inhalation of therapeutic medicinal herbal smoke through the nostrils to clear sinuses and heavy mucus.',
			'purpose' => 'Clears accumulated phlegm from the head, opens blocked sinuses, relieves heavy head and chronic cough, and disinfects the upper respiratory tract.',
			'process' => 'A specialized medicinal herbal roll is lit inside an apparatus; the soothing medicated smoke is inhaled through one nostril at a time and strictly exhaled through the mouth.',
			'facts'   => array(
				array( 'Duration', '15 minutes' ),
				array( 'Medium', 'Medicated herbal smoking wick (Prayogika Dhooma)' ),
				array( 'Indications', 'Chronic sinusitis, heavy head, allergic rhinitis, sticky phlegm, throat congestion' ),
			),
			'paths'   => array( 'other-therapies', 'relax', 'degenerative' ),
		),
		array(
			'id'      => 'uro-basti',
			'slug'    => 'uro-basti',
			'name'    => 'Uro Vasthi',
			'alt'     => 'Chest & Heart Region Oil Pool Therapy · Hrid Basti',
			'meaning' => 'Uro Vasthi, medicated oil retention over the chest and cardiac center',
			'ing'     => 'Warm soothing herbal oils inside black gram ring',
			'ill'     => 'ring',
			'tone'    => 'forest',
			'short'   => 'Warm medicated oil pooled gently over the chest area within a dough reservoir to relieve tightness and anxiety.',
			'purpose' => 'A restorative therapy that calms emotional stress, releases chest wall tension, eases breathing, and nourishes the cardiovascular and respiratory musculature.',
			'process' => 'A dough well is positioned comfortably over the cardiac center on the chest. Lukewarm herbal oil is held in the reservoir for 25 to 30 minutes, followed by gentle, rhythmic strokes over the ribcage.',
			'facts'   => array(
				array( 'Duration', '30 minutes' ),
				array( 'Area', 'Sternum and cardiac region' ),
				array( 'Indications', 'Chest tightness, muscular spasms, anxiety, palpitations, shallow breathing' ),
			),
			'paths'   => array( 'bahya-basti', 'relax', 'degenerative' ),
		),
		array(
			'id'      => 'greeva-basti',
			'slug'    => 'greeva-basti',
			'name'    => 'Greeva Vasthi',
			'alt'     => 'Cervical Spine & Neck Oil Pool Therapy',
			'meaning' => 'Greeva Vasthi, retention of warm medicated oil on cervical spine',
			'ing'     => 'Warm medicated herbal oil inside dough well',
			'ill'     => 'ring',
			'tone'    => 'oil',
			'short'   => 'Warm medicated oil pooled at the back of the neck for cervical spondylosis, neck stiffness, and computer neck.',
			'purpose' => 'Designed for neck stiffness, cervical spondylosis, radiating arm numbness, and chronic postural strain from long desk hours.',
			'process' => 'A black gram dough reservoir is sealed over the cervical spine. Warm medicated oil is pooled and maintained at temperature for 30 minutes, loosening tight trapezius and paraspinal muscles.',
			'facts'   => array(
				array( 'Duration', '30 to 40 minutes' ),
				array( 'Area', 'Cervical spine and neck' ),
				array( 'Indications', 'Cervical spondylosis, stiff neck, shoulder radiation, tension headache, tech neck' ),
			),
			'paths'   => array( 'bahya-basti', 'joint', 'relax' ),
		),
		array(
			'id'      => 'kativasthi',
			'slug'    => 'kativasthi',
			'name'    => 'Kati Vasthi',
			'alt'     => 'Lower Back Oil Pool Therapy · Kativasthi',
			'meaning' => 'Kati Vasthi, warm medicated oil pooled over the lumbosacral spine',
			'ing'     => 'Black gram ring, warm herbal oil',
			'ill'     => 'ring',
			'tone'    => 'clay',
			'short'   => 'Warm medicated oil pooled over the lower back for sciatica, lumbar spondylosis, and chronic back pain.',
			'purpose' => 'Relieves chronic lower back pain, disc compression, lumbago, and sciatica. The continuous warm oil deeply lubricates the intervertebral discs and relaxes spinal musculature.',
			'process' => 'A ring of black gram dough is affixed over the lumbosacral region. Warm medicated oil is poured and replaced continuously to maintain a therapeutic heat level, followed by gentle lower back massage.',
			'facts'   => array(
				array( 'Duration', '30 to 45 minutes' ),
				array( 'Area', 'Lower back & lumbar spine' ),
				array( 'Indications', 'Sciatica, lumbar spondylosis, slipped disc (IVDP), muscle spasm, chronic lumbago' ),
			),
			'paths'   => array( 'bahya-basti', 'joint', 'degenerative' ),
			'img'     => 'assets/img/t-kativasthi.jpg',
		),
		array(
			'id'      => 'prishta-basti',
			'slug'    => 'prishta-basti',
			'name'    => 'Prista Vasthi',
			'alt'     => 'Full Vertebral Spine Oil Pool Therapy',
			'meaning' => 'Prista Vasthi, warm medicated oil retained along the entire vertebral column',
			'ing'     => 'Warm medicated herbal oils inside spinal dough reservoir',
			'ill'     => 'ring',
			'tone'    => 'night',
			'short'   => 'Warm medicated oil retained along the entire vertebral column for chronic back stiffness and spinal health.',
			'purpose' => 'Nourishes the entire vertebral column from the upper thoracic down to the sacrum. Deeply relaxes spinal ligaments, corrects spinal fatigue, and supports chronic postural backache.',
			'process' => 'An elongated reservoir of dough is built along the spine. Warm herbal oil is poured throughout the reservoir to bathe the spinal vertebrae simultaneously, ending with a soothing full-back massage.',
			'facts'   => array(
				array( 'Duration', '40 to 50 minutes' ),
				array( 'Area', 'Entire spinal column' ),
				array( 'Indications', 'Whole-back pain, spinal stiffness, posture fatigue, degenerative spinal changes' ),
			),
			'paths'   => array( 'bahya-basti', 'joint', 'degenerative' ),
		),
		array(
			'id'      => 'janu-basti',
			'slug'    => 'janu-basti',
			'name'    => 'Jaanu Vasthi',
			'alt'     => 'Knee Joint Oil Pool Therapy',
			'meaning' => 'Jaanu Vasthi, retention of warm medicated oil over the knee joint',
			'ing'     => 'Warm medicated herbal oil inside black gram ring',
			'ill'     => 'ring',
			'tone'    => 'clay',
			'short'   => 'Warm medicated oil retained over the knee joint inside an herbal dough reservoir for osteoarthritis and stiffness.',
			'purpose' => 'Specially formulated to relieve chronic knee pain, rebuild synovial fluid lubrication, ease osteoarthritic friction, and strengthen the patellar ligaments.',
			'process' => 'A reservoir of black gram dough is formed securely around the knee joint. Warm herbal oil is poured into the well and maintained at a constant soothing temperature for 30 minutes, followed by gentle knee mobilization.',
			'facts'   => array(
				array( 'Duration', '30 to 45 minutes' ),
				array( 'Area', 'Knee joints' ),
				array( 'Indications', 'Knee osteoarthritis, cartilage wear, ligament strain, crepitus, stiffness' ),
			),
			'paths'   => array( 'bahya-basti', 'joint', 'degenerative' ),
		),
		array(
			'id'      => 'shiro-basti',
			'slug'    => 'shiro-basti',
			'name'    => 'Shiro Vasthi',
			'alt'     => 'Crown Medicated Oil Pool Therapy',
			'meaning' => 'Shiro Vasthi, warm medicated oil pooled inside a fitted leather cap',
			'ing'     => 'Warm medicated herbal oil inside leather cap',
			'ill'     => 'stream',
			'tone'    => 'saffron',
			'short'   => 'Medicated warm oil pooled over the scalp inside a specialised cap reservoir for neurological conditions and insomnia.',
			'purpose' => 'Considered the most intensive head therapy in classical Ayurveda. Used for cranial nerve weakness, severe migraines, facial paralysis, chronic sleep disturbances, and neurological rehabilitation.',
			'process' => 'A tall, fitted cylindrical leather cap is secured around the patient\'s head and sealed with black gram paste. Medicated herbal oil is poured inside and maintained at skin temperature until therapeutic signs appear.',
			'facts'   => array(
				array( 'Duration', '30 to 45 minutes' ),
				array( 'Apparatus', 'Traditional leather crown reservoir' ),
				array( 'Indications', 'Facial palsy, trigeminal neuralgia, chronic insomnia, severe migraine, craniosacral disorders' ),
			),
			'paths'   => array( 'bahya-basti', 'relax', 'degenerative' ),
		),
		array(
			'id'      => 'ksheera-dhara',
			'slug'    => 'ksheera-dhara',
			'name'    => 'Ksheera Dhara',
			'alt'     => 'Medicated Herbal Milk Stream Therapy',
			'meaning' => 'Ksheera Dhara, continuous stream of warm medicated herbal milk',
			'ing'     => 'Cow\'s milk boiled with Dashamoola or Bala',
			'ill'     => 'stream',
			'tone'    => 'ivory',
			'short'   => 'Continuous stream of medicated milk poured over the forehead or body for Pitta headaches, insomnia, and burning sensation.',
			'purpose' => 'Combines deep relaxation with tissue nourishment. Soothes agitated cranial nerves, relieves intense burning sensations, and combats chronic sleep deprivation.',
			'process' => 'Medicated herbal milk is maintained at a comfortable lukewarm temperature and poured in an unbroken stream over the forehead or afflicted body parts, creating a deeply tranquil state.',
			'facts'   => array(
				array( 'Duration', '45 minutes' ),
				array( 'Medium', 'Cow\'s milk infused with medicinal herbs' ),
				array( 'Indications', 'Pitta headaches, severe insomnia, peripheral neuropathy burning, emotional irritability' ),
			),
			'paths'   => array( 'dhara-head', 'relax', 'degenerative' ),
		),
		array(
			'id'      => 'ksheera-dhooma',
			'slug'    => 'ksheera-dhooma',
			'name'    => 'Ksheera Dhoopanam',
			'alt'     => 'Medicated Milk Steam Therapy · Ksheera Dhooma',
			'meaning' => 'Ksheera Dhoopanam, medicated herbal milk steam therapy',
			'ing'     => 'Cow\'s milk boiled with Dashamoola and Bala',
			'ill'     => 'stream',
			'tone'    => 'ivory',
			'short'   => 'Medicated milk steam directed onto the face and neck for facial paralysis, speech disorders, and nerve stiffness.',
			'purpose' => 'Gently stimulates and rejuvenates the facial nerves and muscles without the drying effect of ordinary steam, restoring muscle tone and facial symmetry.',
			'process' => 'Medicated milk is heated in a specialized vessel; the therapeutic steam is directed through a controlled nozzle over the paralyzed or stiffened facial segments, accompanied by gentle facial marma touch.',
			'facts'   => array(
				array( 'Duration', '20 to 30 minutes' ),
				array( 'Medium', 'Medicated herbal milk vapor' ),
				array( 'Indications', 'Facial palsy (Bell\'s palsy), trigeminal neuralgia, speech disorders, cervical stiffness' ),
			),
			'paths'   => array( 'other-therapies', 'degenerative', 'relax' ),
		),
		array(
			'id'      => 'dhanyamla-dhara',
			'slug'    => 'dhanyamla-dhara',
			'name'    => 'Dhanyamla Dhara',
			'alt'     => 'Fermented Herbal Liquid Pouring',
			'meaning' => 'Dhanyamla Dhara, continuous pouring of warm fermented medicinal wash',
			'ing'     => 'Fermented infusion of cereals, horse gram, ginger',
			'ill'     => 'stream',
			'tone'    => 'saffron',
			'short'   => 'Continuous stream of warm fermented herbal liquid poured over the body to dramatically reduce deep inflammation and swelling.',
			'purpose' => 'Uniquely effective for reducing systemic inflammation, painful swelling, and metabolic stiffness where oils are contraindicated (Amavata).',
			'process' => 'Warm, tangy fermented medicinal cereal wash (Dhanyamlam) is poured in continuous streams over the affected joints or whole body by trained therapists, breaking down joint edema.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Nature', 'Anti-inflammatory, non-oily pouring' ),
				array( 'Indications', 'Rheumatoid arthritis, generalized swelling, hemiplegia, metabolic obesity, inflammatory joint pain' ),
			),
			'paths'   => array( 'dhara-head', 'joint', 'degenerative', 'weight' ),
		),
		array(
			'id'      => 'takra-dhara',
			'slug'    => 'takra-dhara',
			'name'    => 'Thakra Dhara',
			'alt'     => 'Medicated Buttermilk Stream Therapy',
			'meaning' => 'Thakra Dhara, continuous stream of cooling medicated buttermilk',
			'ing'     => 'Medicated buttermilk with Musta & Amalaki',
			'ill'     => 'stream',
			'tone'    => 'ivory',
			'short'   => 'Cooling medicated buttermilk poured over the forehead for psoriasis, headache, stress, and hair loss.',
			'purpose' => 'Specifically formulated for Pitta and heat-induced disorders. Highly cooling for the brain, nervous system, and scalp, providing intense relief for chronic skin conditions and migraines.',
			'process' => 'Fresh buttermilk churned with decoctions of Musta (nutgrass) and Amalaki (Indian gooseberry) is continuously poured over the forehead in rhythmic patterns, followed by gentle herbal hair cleansing.',
			'facts'   => array(
				array( 'Duration', '45 minutes' ),
				array( 'Nature', 'Sheeta (Deep cooling therapy)' ),
				array( 'Indications', 'Psoriasis, eczema, stress headaches, premature greying, insomnia, Pitta aggravation' ),
			),
			'paths'   => array( 'dhara-head', 'beauty', 'relax' ),
		),
		array(
			'id'      => 'sarvanga-lepanam',
			'slug'    => 'sarvanga-lepanam',
			'name'    => 'Sarvanga Lepanam',
			'alt'     => 'Full Body Medicated Herbal Application',
			'meaning' => 'Sarvanga Lepanam, whole-body application of medicinal herbal paste',
			'ing'     => 'Herbal pastes, turmeric, neem, sandalwood & Triphala',
			'ill'     => 'leafy',
			'tone'    => 'forest',
			'short'   => 'Full-body application of active medicinal herbal paste for skin detoxification, psoriasis, eczema, and inflammation.',
			'purpose' => 'A full-body therapeutic herbal paste application. Treats extensive dermatological conditions, cools systemic inflammatory heat, relieves itching and scaling in psoriasis and eczema, and restores skin barrier health.',
			'process' => 'Freshly prepared medicated herbal pastes blended with cooling botanicals are smoothed across the entire body. Left until semi-dry, it draws out dermal toxins and soothes persistent dermatitis.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Coverage', 'Full body application' ),
				array( 'Indications', 'Psoriasis, eczema, allergic dermatitis, burning skin sensations, systemic toxic heat' ),
			),
			'paths'   => array( 'other-therapies', 'beauty', 'degenerative' ),
		),
		array(
			'id'      => 'udhwarthanam',
			'slug'    => 'udhwarthanam',
			'name'    => 'Udwarthanam',
			'alt'     => 'Dry Herbal Powder Massage · Udwarthanam',
			'meaning' => 'Udwarthanam, upward dry herbal powder scrub massage',
			'ing'     => 'Medicated dry herbal powders',
			'ill'     => 'powder',
			'tone'    => 'clay',
			'short'   => 'Dry powder massage applied in upward strokes for obesity, cellulite reduction, and metabolic sluggishness.',
			'purpose' => 'Breaks down subcutaneous fat deposits, stimulates circulation, reduces cellulite, improves skin luster, and expels excess Kapha and water retention.',
			'process' => 'Therapists vigorously rub dry or paste-form herbal powders in upward, rhythmic strokes over the entire body, creating friction that stimulates fat metabolism, followed by a warm herbal bath.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Medium', 'Coarse medicinal herbal powders' ),
				array( 'Indications', 'Obesity, cellulite, fluid retention, skin dullness, sluggish metabolism' ),
			),
			'paths'   => array( 'abhyanga-sweda', 'weight', 'beauty' ),
			'img'     => 'assets/img/t-udhwarthanam.jpg',
		),
		array(
			'id'      => 'tarpanam',
			'slug'    => 'tarpanam',
			'name'    => 'Tarpanam',
			'alt'     => 'Ocular Ghee Bath · Netra Tarpanam',
			'meaning' => 'Tarpanam, revitalizing medicated ghee pool for the eyes',
			'ing'     => 'Pure medicated cow\'s ghee (Triphala Ghritam)',
			'ill'     => 'eye',
			'tone'    => 'saffron',
			'short'   => 'Warm medicated ghee pooled gently over the eyes inside dough wells for dry eyes, computer strain, and eye fatigue.',
			'purpose' => 'Soothes dry, tired, burning eyes caused by extended screen use and harsh air conditioning. Nourishes the optic nerves and clarifies vision.',
			'process' => 'Dough enclosures are crafted around both ocular orbits. Warm medicated Triphala ghee is poured over closed eyelids; the patient then blinks rhythmically under the ghee bath before the eyes are cleansed.',
			'facts'   => array(
				array( 'Duration', '25 to 30 minutes' ),
				array( 'Area', 'Eyes' ),
				array( 'Indications', 'Computer vision syndrome, dry eyes, eye fatigue, burning sensations, refractive fatigue' ),
			),
			'paths'   => array( 'other-therapies', 'beauty', 'relax' ),
			'img'     => 'assets/img/t-tarpanam.jpg',
		),
		array(
			'id'      => 'akshi-seka',
			'slug'    => 'akshi-seka',
			'name'    => 'Netra Sekam',
			'alt'     => 'Medicated Herbal Eye Wash · Akshi Seka',
			'meaning' => 'Netra Sekam, continuous gentle washing of the eyes with herbal decoctions',
			'ing'     => 'Sterile herbal decoction of Triphala and Lodhra',
			'ill'     => 'eye',
			'tone'    => 'sage',
			'short'   => 'Continuous gentle washing of the eyes with warm herbal decoctions for eye redness, discharge, and allergic strain.',
			'purpose' => 'Cleanses and cools irritated ocular tissues, clears discharge, relieves burning sensations, and reduces allergic conjunctival inflammation.',
			'process' => 'The patient lies comfortably while warm, freshly filtered sterile herbal decoction is poured in a continuous thin stream across closed and lightly open eyes from a height of few inches for 10 minutes.',
			'facts'   => array(
				array( 'Duration', '20 minutes' ),
				array( 'Area', 'Eyes' ),
				array( 'Indications', 'Conjunctivitis, ocular burning, discharge, allergic eye irritation, digital eye strain' ),
			),
			'paths'   => array( 'other-therapies', 'beauty', 'relax' ),
		),
		array(
			'id'      => 'karnapoorana',
			'slug'    => 'karnapoorana',
			'name'    => 'Karna Pooranam',
			'alt'     => 'Medicated Ear Filling Therapy',
			'meaning' => 'Karna Pooranam, filling the ear canals with warm medicated oil',
			'ing'     => 'Warm medicated herbal oils (Bilva Thailam)',
			'ill'     => 'drop',
			'tone'    => 'oil',
			'short'   => 'Gentle filling of the ear canals with warm medicated herbal oil for tinnitus, ear pain, and jaw stiffness.',
			'purpose' => 'Soothes the acoustic nerve, relieves ringing in the ears (tinnitus), eases earache, cleanses accumulated wax, and releases tension from the temporomandibular joint (TMJ).',
			'process' => 'Following gentle massage around the ears and jaw, warm medicated oil is slowly instilled into one ear canal and retained for 10 to 15 minutes before the procedure is repeated on the other side.',
			'facts'   => array(
				array( 'Duration', '20 to 30 minutes' ),
				array( 'Area', 'Ear canals and surrounding marma points' ),
				array( 'Indications', 'Tinnitus, ear dryness, jaw stiffness (TMJ), neck tension, dizziness, Vata ear disorders' ),
			),
			'paths'   => array( 'other-therapies', 'relax', 'degenerative' ),
		),
		array(
			'id'      => 'prachanam',
			'slug'    => 'prachanam',
			'name'    => 'Prachanam',
			'alt'     => 'Ayurvedic Micro-Bloodletting · Pracchana Karma',
			'meaning' => 'Prachanam, micro-bloodletting and scalp detoxification',
			'ing'     => 'Sterile surgical micro-needles & healing herbal extracts',
			'ill'     => 'leafy',
			'tone'    => 'forest',
			'short'   => 'Targeted micro-puncturing therapy for alopecia areata, stubborn localized skin lesions, and hair follicle rejuvenation.',
			'purpose' => 'A specialized para-surgical blood purification procedure (Pracchana). Induces localized micro-circulation, clears stagnant cellular toxins, stimulates dormant hair follicles in Alopecia Areata, and treats localized eczema patches.',
			'process' => 'Using specialized sterile techniques, minute superficial micro-punctures are made over the affected scalp area or localized skin patch, followed by healing herbal application.',
			'facts'   => array(
				array( 'Modality', 'Sterile classical micro-puncturing & herbal application' ),
				array( 'Focus', 'Hair follicle reactivation and localized toxic blood release' ),
				array( 'Indications', 'Alopecia Areata, patchy hair loss, localized eczema, stubborn lichenified lesions' ),
			),
			'paths'   => array( 'other-therapies', 'beauty', 'degenerative' ),
		),
		array(
			'id'      => 'njavara-kizhi',
			'slug'    => 'njavara-kizhi',
			'name'    => 'Njavara Theppu & Kizhi',
			'alt'     => 'Medicated Rice Bolus Rejuvenation & Paste Application',
			'meaning' => 'Njavara Theppu & Kizhi, 60-day medicinal rice bolus massage and paste wrap',
			'ing'     => 'Njavara rice, Bala decoction & milk',
			'ill'     => 'rice',
			'tone'    => 'ivory',
			'short'   => 'Warm boluses of cooked Njavara rice dipped in herbal milk decoction for muscle wasting, weakness, and paralysis.',
			'purpose' => 'A deeply nourishing (Brimhana) therapy. Regenerates wasted muscles, strengthens nerve conduction, improves skin texture, and restores vitality after illness.',
			'process' => 'Special Njavara rice cooked in Bala decoction and milk is tied into linen pouches, dipped in hot herbal milk, and massaged over the body, concluding with the paste applied directly to skin.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Medium', 'Medicated Njavara rice & herbal milk' ),
				array( 'Indications', 'Muscle wasting, post-stroke paralysis, neuropathy, arthritis, anti-aging rejuvenation' ),
			),
			'paths'   => array( 'abhyanga-sweda', 'joint', 'degenerative' ),
			'img'     => 'assets/img/t-njavara-kizhi.jpg',
		),
		array(
			'id'      => 'face-pack',
			'slug'    => 'face-pack',
			'name'    => 'Mukha Lepanam',
			'alt'     => 'Herbal, Fruit & Njavara Facial Therapy',
			'meaning' => 'Mukha Lepanam, authentic Ayurvedic facial pack application',
			'ing'     => 'Herbal pastes, fruit extracts, Njavara rice & turmeric',
			'ill'     => 'turmeric',
			'tone'    => 'ivory',
			'short'   => 'Authentic Ayurvedic facial therapy combining freshly blended herbs, fruit extracts, and Njavara paste for radiant skin.',
			'purpose' => 'A traditional Ayurvedic facial therapy offering three specialized variations: Herbal Lepam (for acne and blemishes), Fruit Lepam (for natural glow and rejuvenation), and Njavara Lepam (for deep nourishment and skin elasticity).',
			'process' => 'A freshly blended herbal or fruit paste matched to the skin constitution is smoothed over the face and neck, allowed to nourish the dermal layers, and gently washed with herbal hydrosols.',
			'facts'   => array(
				array( 'Duration', '45 minutes' ),
				array( 'Variants', 'Herbal, Fruit, and Njavara Rice facial formulations' ),
				array( 'Indications', 'Acne, pigmentation, dullness, fine lines, sun damage, sensitive skin' ),
			),
			'paths'   => array( 'other-therapies', 'beauty' ),
			'img'     => 'assets/img/t-face-pack.jpg',
		),
		array(
			'id'      => 'thalapothichil',
			'slug'    => 'thalapothichil',
			'name'    => 'Thalapothichil',
			'alt'     => 'Cooling Medicated Scalp Pack · Shiro Lepa',
			'meaning' => 'Thalapothichil, medicinal herbal paste wrap over the scalp',
			'ing'     => 'Amalaki herbal paste, banana leaf wrap',
			'ill'     => 'banana',
			'tone'    => 'forest',
			'short'   => 'Herbal paste pack applied over the scalp and wrapped with banana leaves for deep mental cooling, stress, and insomnia.',
			'purpose' => 'A premier Kerala therapy that brings peace to an overheated mind. Balances Pitta, soothes neurological agitation, controls scalp dermatitis, and restores deep restorative sleep.',
			'process' => 'A thick layer of freshly prepared herbal paste is applied over the scalp, covered with a banana leaf or lotus leaf, and held in place with a cotton headband for 45 minutes while medicated oil pools in the crown center.',
			'facts'   => array(
				array( 'Duration', '45 to 60 minutes' ),
				array( 'Wrap', 'Natural medicinal banana leaf' ),
				array( 'Indications', 'Severe stress, chronic insomnia, hair loss, scalp dermatitis, anxiety' ),
			),
			'paths'   => array( 'dhara-head', 'beauty', 'relax' ),
			'img'     => 'assets/img/t-thalapothichil.jpg',
		),
		array(
			'id'      => 'soundarya-wrap',
			'slug'    => 'soundarya-wrap',
			'name'    => 'Soundarya Wrap',
			'alt'     => 'Ayurvedic Herbal Beauty Body Wrap',
			'meaning' => 'Soundarya Wrap, luxury herbal beauty and body contouring wrap',
			'ing'     => 'Exotic herbal pastes, sandalwood, saffron, turmeric & milk',
			'ill'     => 'turmeric',
			'tone'    => 'saffron',
			'short'   => 'Luxurious whole-body herbal cocoon wrap with exotic botanical pastes to tone, exfoliate, and deeply revitalize the skin.',
			'purpose' => 'A signature Ayurvedic beauty and body contouring wrap. Exfoliates dead cells, tones sagging tissues, restores skin moisture, enhances complexion radiance, and promotes profound relaxation.',
			'process' => 'The body is exfoliated with delicate botanical scrubs, coated in pure sandalwood, turmeric, saffron, and herbal milk, and wrapped in warm therapeutic compresses for deep nourishment.',
			'facts'   => array(
				array( 'Duration', '60 minutes' ),
				array( 'Medium', 'Sandalwood, saffron, medicinal herbs, and natural body wrap' ),
				array( 'Indications', 'Uneven skin tone, dull skin, loss of firmness, stress exhaustion, bridal wellness' ),
			),
			'paths'   => array( 'other-therapies', 'beauty', 'relax' ),
		),

		// -------------------------------------------------------------
		// GROUP 3: SPECIAL THERAPIES (33-34)
		// -------------------------------------------------------------
		array(
			'id'      => 'post-natal-care',
			'slug'    => 'post-natal-care',
			'name'    => 'Post Natal Care (Soothika Paricharya)',
			'alt'     => 'Soothika Paricharya & Bala Cikitsa · 7, 14 & 21 Days',
			'meaning' => 'Soothika Paricharya, classical postpartum recovery and newborn care',
			'ing'     => 'Specialized postpartum herbal oils, Kashayam, and Kashaya Dhara',
			'ill'     => 'leafy',
			'tone'    => 'sage',
			'short'   => 'Comprehensive mother and baby Ayurvedic care packages spanning 07, 14, and 21 days for post-delivery recovery.',
			'purpose' => 'Dedicated maternal and newborn wellness rooted in classical Soothika Paricharya and Bala Cikitsa. Strengthens pelvic muscles, restores abdominal tone, relieves fatigue, enhances lactation, and prevents postpartum depression.',
			'process' => 'Available in dedicated 07-day, 14-day, and 21-day clinical packages under the supervision of female Ayurvedic doctors, combining Abhyangam, Kashaya Dhara, abdominal wrapping, and newborn care.',
			'facts'   => array(
				array( 'Programmes', '07 Days, 14 Days, and 21 Days Specialized Care' ),
				array( 'Focus', 'Uterine involution, abdominal tone, lactation support, joint recovery' ),
				array( 'Indications', 'Post-delivery recovery, backache, pelvic fatigue, lactation enhancement' ),
			),
			'paths'   => array( 'special', 'postnatal', 'relax', 'joint' ),
			'img'     => 'assets/img/p-postnatal.jpg',
		),
		array(
			'id'      => 'skin-hair-care',
			'slug'    => 'skin-hair-care',
			'name'    => 'Skin & Hair Care Treatments',
			'alt'     => 'Specialized Ayurvedic Care for Psoriasis, Eczema & Alopecia',
			'meaning' => 'Comprehensive Ayurvedic clinical protocols for chronic skin and scalp disorders',
			'ing'     => 'Psoriasis & eczema specific Kashayams, Thailams, Lepam & Dhara',
			'ill'     => 'leafy',
			'tone'    => 'forest',
			'short'   => 'Clinical Ayurvedic protocols for chronic skin disorders and severe hair loss, restoring dosha balance and skin health.',
			'purpose' => 'A multi-stage therapeutic clinical program specifically formulated for chronic conditions: Psoriasis, Eczema, Atopic Dermatitis, Seborrheic Dermatitis, and Alopecia Areata. Four core therapeutic pillars: 1. Deep Detoxification, 2. Restoring Dosha Balance, 3. Gentle Skin Exfoliation, 4. Restoring Normal Skin Health.',
			'process' => 'Our clinical protocol addresses root-cause vitiation of Pitta, Kapha, and Rakta through a structured 4-pillar pathway combining Takra Dhara, Sarvanga Lepanam, Prachanam, internal herbs, and dietary guidance.',
			'facts'   => array(
				array( 'Focus Conditions', 'Psoriasis, Eczema, Atopic Dermatitis, Seborrheic Dermatitis, Alopecia Areata' ),
				array( '4-Pillar Protocol', '1. Detoxification · 2. Dosha Balance · 3. Exfoliation · 4. Health Restoration' ),
				array( 'Therapies', 'Takra Dhara, Sarvanga Lepanam, Prachanam, Nasyam, Blood Cleansing' ),
			),
			'paths'   => array( 'special', 'beauty', 'degenerative' ),
			'img'     => 'assets/img/p-beauty.jpg',
		),
	);
}

/**
 * Classical Therapy Categories
 */
function kottakkal_get_therapy_categories() {
	return array(
		'panchakarma'     => array(
			'id'    => 'panchakarma',
			'name'  => __( 'Panchakarma (Main 5 Shodhana)', 'oceanwp' ),
			'short' => __( 'Panchakarma', 'oceanwp' ),
			'desc'  => __( 'The classical fivefold bio-cleansing and metabolic detoxification therapies.', 'oceanwp' ),
		),
		'bahya-basti'     => array(
			'id'    => 'bahya-basti',
			'name'  => __( 'Local Vasthi (Oil Pool Therapies)', 'oceanwp' ),
			'short' => __( 'Local Vasthi', 'oceanwp' ),
			'desc'  => __( 'External pooling of warm medicated herbal oils in specially molded dough reservoirs.', 'oceanwp' ),
		),
		'abhyanga-sweda'  => array(
			'id'    => 'abhyanga-sweda',
			'name'  => __( 'Massage, Kizhi & Body Therapies', 'oceanwp' ),
			'short' => __( 'Massage & Kizhi', 'oceanwp' ),
			'desc'  => __( 'Classical warm herbal oil massages, Kizhi pouch fomentations, Pizhichil, and therapeutic Pichu.', 'oceanwp' ),
		),
		'dhara-head'      => array(
			'id'    => 'dhara-head',
			'name'  => __( 'Dhara & Head Therapies', 'oceanwp' ),
			'short' => __( 'Dhara & Head', 'oceanwp' ),
			'desc'  => __( 'Continuous streams of medicated oils, buttermilk, and milk across the forehead and scalp packs.', 'oceanwp' ),
		),
		'other-therapies' => array(
			'id'    => 'other-therapies',
			'name'  => __( 'Eye, ENT, Lepanam & Wraps', 'oceanwp' ),
			'short' => __( 'Eye, ENT & Wraps', 'oceanwp' ),
			'desc'  => __( 'Tarpanam, Netra Sekam, Karna Pooranam, Dhoomapanam, Lepanam, and Soundarya Wrap.', 'oceanwp' ),
		),
		'special'         => array(
			'id'    => 'special',
			'name'  => __( 'Special Therapies & Programs', 'oceanwp' ),
			'short' => __( 'Special Therapies', 'oceanwp' ),
			'desc'  => __( 'Post Natal Care (Soothika Paricharya) and Specialized Skin & Hair Care programs.', 'oceanwp' ),
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
			'docs'      => array( 'naseeba', 'ajitha', 'minupriya', 'rajesh' ),
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
			'docs'      => array( 'minupriya', 'rajesh', 'naseeba' ),
			'img'       => 'assets/img/p-degenerative.jpg',
		),
		array(
			'id'        => 'injury-management',
			'slug'      => 'injury-management',
			'name'      => 'Injury Management',
			'short'     => 'Injury Management',
			'need'      => 'Pain, recovery & injury care',
			'ill'       => 'ring',
			'tone'      => 'clay',
			'intro'     => 'Holistic Ayurvedic care for managing injuries and reducing stress and inflammation.',
			'overview'  => 'Kottakkal Green Life Ayurvedic Clinic in Dubai is renowned for its expertise in managing injuries through traditional Ayurvedic treatments. Emphasizing natural remedies and dietary guidelines, our approach is holistic, addressing not just the symptoms but the underlying imbalance in the body.',
			'approach'  => 'By harnessing the power of Ayurveda we support the body\'s innate healing mechanisms, reducing stress and inflammation while promoting overall well-being. Our personalized treatments aim to restore harmony and vitality, providing patients with long-lasting relief and a renewed sense of health and wellness.',
			'therapies' => array( 'veshtanam', 'kati-greeva-pichu', 'pottali-sweda', 'abhyangam', 'kativasthi' ),
			'docs'      => array( 'minupriya', 'naseeba', 'ajitha' ),
			'img'       => 'assets/img/p-injury.jpg',
		),
		array(
			'id'        => 'marma-chikitsa',
			'slug'      => 'marma-chikitsa',
			'name'      => 'Marma Chikitsa',
			'short'     => 'Marma Chikitsa',
			'need'      => 'Vital energy points & healing touch',
			'ill'       => 'stream',
			'tone'      => 'forest',
			'intro'     => 'Ancient therapeutic touch targeting vital energy points to harmonize and rejuvenate the entire being.',
			'overview'  => 'Step into our holistic Ayurvedic Clinic in Dubai and delve into the ancient healing art of Marma Chikitsa. This Therapeutic practice offers profound benefits for both physical and mental well-being. Originating from ancient Indian tradition, Marma Chikitsa targets vital energy points in the body to harmonize and rejuvenate the entire being.',
			'approach'  => 'Experience the gentle yet powerful touch therapy, tailored to your individual needs, as our skilled practitioners guide you towards balance and vitality. Embrace this unique opportunity to restore harmony and vitality and embark on a journey towards holistic wellness at our serene clinic.',
			'therapies' => array( 'abhyangam', 'pizhichil', 'shirodara', 'nasyam' ),
			'docs'      => array( 'ajitha', 'naseeba', 'minupriya' ),
			'img'       => 'assets/img/p-marma.jpg',
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
			'img_url' => get_stylesheet_directory_uri() . '/assets/img/doc-naseeba.png',
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
			'img_url' => get_stylesheet_directory_uri() . '/assets/img/doc-ajitha.png',
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
			'id'      => 'minupriya',
			'slug'    => 'minupriya',
			'name'    => 'Dr. Minupriya',
			'mono'    => 'MP',
			'role'    => 'Ayurvedic Practitioner | 10+ Years of Clinical Experience',
			'tone'    => 'clay',
			'img_url' => get_stylesheet_directory_uri() . '/assets/img/doc-minupriya.png',
			'creds'   => array(
				'Ayurvedic Practitioner',
				'10+ Years of Clinical Experience',
				'Rajiv Gandhi University of Health Sciences, Bangalore',
				'10+ years’ clinical experience across India and the UAE',
			),
			'short'   => 'Experienced in gastrointestinal health, skin diseases, respiratory disorders, musculoskeletal pain, and lifestyle management.',
			'specs'   => array(
				'Gastrointestinal disorders and digestive health',
				'Skin diseases and dermatological conditions',
				'Respiratory disorders and respiratory health',
				'Musculoskeletal disorders and pain management',
				'Lifestyle-related health conditions',
				'Personalized diet and lifestyle management',
			),
			'bio'     => array(
				'Dr. Minupriya is an experienced Ayurvedic Practitioner with over 10 years of clinical experience across India and the UAE. A graduate of Rajiv Gandhi University of Health Sciences, Bangalore, she brings extensive knowledge and expertise in providing personalized Ayurvedic care focused on holistic healing and long-term wellness.',
				'With a patient-centered and root-cause approach, Dr. Minupriya combines classical Ayurvedic principles and authentic therapeutic practices with individualized diet and lifestyle modifications to address patients\' specific health concerns and promote overall well-being.',
				'### Her Philosophy',
				'Dr. Minupriya believes in holistic healing through authentic Ayurveda, compassionate care, and personalized treatment approaches. Her mission is to help patients overcome pain, restore balance, and achieve sustainable improvements in their health and quality of life through natural healing and long-term wellness practices.',
				'*Begin Your Wellness Journey with Dr. Minupriya at Kottakkal Green Life Ayurvedic Center, Dubai.*',
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
			if ( empty( $feat_img ) ) {
				$feat_img = get_post_meta( $p->ID, '_kottakkal_photo', true );
			}
			if ( empty( $feat_img ) ) {
				$photo_id = get_post_meta( $p->ID, '_kottakkal_photo_id', true );
				if ( $photo_id ) {
					$feat_img = wp_get_attachment_image_url( $photo_id, 'large' );
				}
			}
			if ( empty( $feat_img ) ) {
				$slug = $p->post_name;
				$theme_dir = get_stylesheet_directory();
				$theme_uri = get_stylesheet_directory_uri();
				if ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.jpg' ) ) {
					$feat_img = $theme_uri . '/assets/img/t-' . $slug . '.jpg';
				} elseif ( ! empty( $slug ) && file_exists( $theme_dir . '/assets/img/t-' . $slug . '.png' ) ) {
					$feat_img = $theme_uri . '/assets/img/t-' . $slug . '.png';
				}
			}

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

			// Prefer transparent cutout PNG from theme if available
			$theme_dir = get_stylesheet_directory();
			$theme_uri = get_stylesheet_directory_uri();
			if ( file_exists( $theme_dir . '/assets/img/doc-' . $p->post_name . '-hd.png' ) ) {
				$feat_img = $theme_uri . '/assets/img/doc-' . $p->post_name . '-hd.png';
			} elseif ( file_exists( $theme_dir . '/assets/img/doc-' . $p->post_name . '.png' ) ) {
				$feat_img = $theme_uri . '/assets/img/doc-' . $p->post_name . '.png';
			} else {
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
				if ( empty( $feat_img ) && file_exists( $theme_dir . '/assets/img/doc-' . $p->post_name . '.jpg' ) ) {
					$feat_img = $theme_uri . '/assets/img/doc-' . $p->post_name . '.jpg';
				}
			}

			$creds_list = is_array( $creds ) ? $creds : array_filter( array_map( 'trim', explode( "\n", (string) $creds ) ) );
			if ( $p->post_name === 'minupriya' ) {
				$parsed_creds = array();
				foreach ( $creds_list as $c_item ) {
					if ( str_contains( $c_item, '|' ) ) {
						$parts = array_map( 'trim', explode( '|', $c_item ) );
						foreach ( $parts as $prt ) {
							if ( ! empty( $prt ) ) $parsed_creds[] = $prt;
						}
					} else {
						$parsed_creds[] = $c_item;
					}
				}
				$creds_list = $parsed_creds;
			}

			$items[] = array(
				'id'      => $p->post_name,
				'slug'    => $p->post_name,
				'name'    => $p->post_title,
				'mono'    => get_post_meta( $p->ID, '_kottakkal_mono', true ) ?: substr( $p->post_title, 0, 2 ),
				'role'    => get_post_meta( $p->ID, '_kottakkal_role', true ) ?: 'Ayurveda Practitioner',
				'tone'    => get_post_meta( $p->ID, '_kottakkal_tone', true ) ?: 'forest',
				'creds'   => $creds_list,
				'short'   => $p->post_excerpt ?: wp_trim_words( $p->post_content, 20 ),
				'specs'   => is_array( $specs ) ? $specs : array_filter( array_map( 'trim', explode( ',', (string) $specs ) ) ),
				'bio'     => array_filter( explode( "\n\n", $p->post_content ) ),
				'img_url' => $feat_img,
				'post_id' => $p->ID,
				'link'    => get_permalink( $p->ID ),
			);
		}

		// Explicit doctor display order: 1st Naseeba, 2nd Ajitha, 3rd Minupriya
		$order_map = array(
			'naseeba'   => 1,
			'ajitha'    => 2,
			'minupriya' => 3,
		);

		usort( $items, function( $a, $b ) use ( $order_map ) {
			$score_a = $order_map[ $a['slug'] ] ?? ( $order_map[ $a['id'] ] ?? 99 );
			$score_b = $order_map[ $b['slug'] ] ?? ( $order_map[ $b['id'] ] ?? 99 );
			return $score_a <=> $score_b;
		} );

		return $items;
	}

	$defaults = kottakkal_get_default_doctors();
	foreach ( $defaults as &$d ) {
		$d['link'] = home_url( '/doctors/' . $d['slug'] . '/' );
	}
	return $defaults;
}

/**
 * Default Testimonials Data (Authentic Patient Reviews from Kottakkal Green Life)
 */
function kottakkal_get_default_testimonials() {
	return array(
		array(
			'id'        => 'bhaskaran-rajeev',
			'name'      => 'Bhaskaran Rajeev',
			'initials'  => 'BR',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => 'Shoulder Pain Relief',
			'doctor'    => '',
			'therapist' => 'Abit',
			'duration'  => '12 Days Treatment',
			'category'  => 'pain',
			'quote'     => 'I recently consulted for Ayurvedic treatment for my shoulder pain, and I am extremely satisfied with the results. Within just 12 days of treatment, I experienced remarkable relief. My sincere thanks to the entire staff for their professionalism, care, and dedication. A special appreciation to Abit, the therapist, for his excellent treatment and attentive approach throughout the sessions. Truly grateful for the wonderful service and highly recommend Kottakkal Green Life for the better health and Care.',
			'poster'    => 'assets/img/testimonials/Testimonial01.jpg',
		),
		array(
			'id'        => 'capt-balbir-kumar',
			'name'      => 'Capt Balbir Prasad Kumar',
			'initials'  => 'BK',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => 'Shoulder Pain Relief',
			'doctor'    => 'Dr. Naseeba Abdul Rafeeque',
			'therapist' => 'Mr. Vaishak',
			'duration'  => '9 Days Treatment',
			'category'  => 'pain',
			'quote'     => 'I had a great experience at Kottakal Green Life Ayurvedic Center in Al Qusais 1. I am sincerely grateful to Dr. Naseeba for her perfect diagnosis and close monitoring of my shoulder pain treatment. My assigned therapist, Mr. Vaishak, was excellent, and I saw daily improvement through the 9-day treatment with varied therapies. I am now finally rid of the pain and discomfort. I highly recommend this clinic, and I\'d also like to thank the front desk staff for their continuous follow-up on appointments and sessions.',
			'poster'    => 'assets/img/testimonials/Testimonial02.jpg',
		),
		array(
			'id'        => 'anagha-mathew',
			'name'      => 'Anagha Mathew',
			'initials'  => 'AM',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => 'Effective Ayurvedic Care',
			'doctor'    => 'Dr. Naseeba Abdul Rafeeque',
			'therapist' => 'Sunu & Sareena',
			'duration'  => 'Therapeutic Sessions',
			'category'  => 'therapies',
			'quote'     => 'I had a wonderful experience at Kottakkal Ayurveda, Al Qusais. The treatment was very effective, and I could really feel the difference after the sessions. The staff are professional, caring, and truly dedicated to their patients. Special thanks DR NASEEBA for her excellent guidance and personalized care, and to therapists SUNU and SAREENA for their amazing therapy sessions and kindness throughout the treatment. Highly recommend Kottakkal Ayurveda for anyone looking for authentic and effective Ayurvedic treatment in Dubai!',
			'poster'    => 'assets/img/testimonials/Testimonial09.jpg',
		),
		array(
			'id'        => 'faisal-nv',
			'name'      => 'Faisal NV',
			'initials'  => 'FN',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => 'Fast Back Pain Remedy',
			'doctor'    => 'Dr. Naseeba Abdul Rafeeque',
			'therapist' => 'Akhil',
			'duration'  => 'Targeted Care',
			'category'  => 'pain',
			'quote'     => 'I recently had Ayurvedic treatment with Dr. Naseeba Abdul Rafeeque and therapist Akhil, and I\'m very satisfied with the care I received. They both did their best and provided excellent treatment for my back pain. The remedy was fast and effective. Highly recommended for anyone looking for quality Ayurvedic care.',
			'poster'    => 'assets/img/testimonials/Testimonial07.jpg',
		),
		array(
			'id'        => 'thanseena-shahul',
			'name'      => 'Thanseena Shahul',
			'initials'  => 'TS',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => 'Severe Neck Pain Relief',
			'doctor'    => 'Dr. Naseeba Abdul Rafeeque',
			'therapist' => 'Sunu',
			'duration'  => '8 Days Treatment',
			'category'  => 'pain',
			'quote'     => 'I had a wonderful experience with Dr. Naseeba and Sunu from kottakal green life ayurveda.. i had treatment for 8 days for severe neck pain and it got relieved in few days. Thank you for your service.',
			'poster'    => 'assets/img/testimonials/Testimonial06.jpg',
		),
		array(
			'id'        => 'suma-vipin',
			'name'      => 'Suma Vipin',
			'initials'  => 'SV',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => 'Ayurvedic Massage & Atmosphere',
			'doctor'    => 'Senior Ayurvedic Doctor',
			'therapist' => 'Sarika',
			'duration'  => 'Massage Therapy',
			'category'  => 'massage',
			'quote'     => 'The Ayurvedha clinic, led by a knowledgeable doctor, provides a peaceful atmosphere and genuinely effective treatments. Special thanks to Sarika. She is exceptionally skilled in her massage techniques and understands exactly what the body needs. Her calm, friendly behavior makes the whole experience even more comfortable. I would recommend her to anyone looking for a high-quality Ayurvedic massage.',
			'poster'    => 'assets/img/testimonials/Testimonial03.jpg',
		),
		array(
			'id'        => 'ranjish-rajan',
			'name'      => 'Ranjish Rajan',
			'initials'  => 'RR',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => 'Accurate Diagnosis & Medicines',
			'doctor'    => 'Dr. Naseeba Abdul Rafeeque',
			'therapist' => 'Mr. Arun',
			'duration'  => 'Consultation & Treatment',
			'category'  => 'consultation',
			'quote'     => 'I met Dr Naseeba. A very knowledgeable Doctor with good experience. She was quick to identify the issue and prescribed the therapy and medicines. I feel much better now. My therapist Mr Arun was very informative and made the treatment a good experience.',
			'poster'    => 'assets/img/testimonials/Testimonial10.jpg',
		),
		array(
			'id'        => 'veeraraghavan-nantha-kumar',
			'name'      => 'Veeraraghavan Nantha kumar',
			'initials'  => 'VN',
			'rating'    => 5,
			'source'    => 'Google Reviews',
			'context'   => '1-Hour Ayurvedic Massage',
			'doctor'    => '',
			'therapist' => 'Abith',
			'duration'  => 'Massage Session',
			'category'  => 'massage',
			'quote'     => 'Abith - He has done 1 hr Ayurvedic massage treatment today. He is very knowledgeable and did an excellent massage. Very communicative with me to give advise and benefits of the treatment.',
			'poster'    => 'assets/img/testimonials/Testimonial05.jpg',
		),
	);
}

/**
 * Fetch testimonials (From CPT 'testimonial' if posts exist, else fallback to defaults)
 */
function kottakkal_get_testimonials() {
	$posts = get_posts( array(
		'post_type'      => 'testimonial',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	) );

	if ( ! empty( $posts ) ) {
		$items = array();
		foreach ( $posts as $p ) {
			$poster_rel = get_post_meta( $p->ID, '_kottakkal_poster', true );
			$thumb_id   = get_post_thumbnail_id( $p->ID );
			$poster_url = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'full' ) : ( $poster_rel ? get_stylesheet_directory_uri() . '/' . $poster_rel : '' );

			$name = $p->post_title;
			$words = explode( ' ', trim( $name ) );
			$initials = '';
			foreach ( $words as $w ) {
				if ( ! empty( $w ) ) {
					$initials .= strtoupper( mb_substr( $w, 0, 1 ) );
				}
				if ( strlen( $initials ) >= 2 ) break;
			}

			$items[] = array(
				'id'        => $p->post_name,
				'name'      => $name,
				'initials'  => $initials ?: 'PT',
				'rating'    => intval( get_post_meta( $p->ID, '_kottakkal_rating', true ) ?: 5 ),
				'source'    => get_post_meta( $p->ID, '_kottakkal_source', true ) ?: 'Google Reviews',
				'context'   => get_post_meta( $p->ID, '_kottakkal_context', true ) ?: 'Ayurvedic Treatment',
				'doctor'    => get_post_meta( $p->ID, '_kottakkal_doctor', true ),
				'therapist' => get_post_meta( $p->ID, '_kottakkal_therapist', true ),
				'duration'  => get_post_meta( $p->ID, '_kottakkal_duration', true ),
				'category'  => get_post_meta( $p->ID, '_kottakkal_category', true ) ?: 'pain',
				'quote'     => $p->post_content,
				'poster'    => $poster_rel,
				'poster_url'=> $poster_url,
				'post_id'   => $p->ID,
			);
		}
		return $items;
	}

	$defaults = kottakkal_get_default_testimonials();
	foreach ( $defaults as &$d ) {
		$d['poster_url'] = get_stylesheet_directory_uri() . '/' . $d['poster'];
	}
	return $defaults;
}

/**
 * Fetch gallery collections and images (CPT 'gallery_album' if posts exist, else fallback to JSON)
 */
function kottakkal_get_gallery() {
	$theme_dir = get_stylesheet_directory();
	$theme_uri = get_stylesheet_directory_uri();

	$posts = get_posts( array(
		'post_type'      => 'gallery_album',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order ID',
		'order'          => 'ASC',
	) );

	if ( ! empty( $posts ) ) {
		$collections = array();
		foreach ( $posts as $p ) {
			$type = get_post_meta( $p->ID, '_kottakkal_gallery_type', true ) ?: 'photos';
			if ( $type === 'videos' ) {
				continue; // Skip video collections in photo gallery query
			}

			$raw_imgs = get_post_meta( $p->ID, '_kottakkal_gallery_images', true );
			if ( ! is_array( $raw_imgs ) ) {
				$raw_imgs = json_decode( (string) $raw_imgs, true ) ?: array();
			}

			$formatted_images = array();
			foreach ( $raw_imgs as $idx => $img ) {
				$src = '';
				if ( ! empty( $img['url'] ) ) {
					$src = $img['url'];
				} elseif ( ! empty( $img['id'] ) ) {
					$src = wp_get_attachment_image_url( $img['id'], 'full' );
				} elseif ( ! empty( $img['relPath'] ) ) {
					$local_file = $theme_dir . '/' . $img['relPath'];
					if ( file_exists( $local_file ) ) {
						$src = $theme_uri . '/' . $img['relPath'];
					} elseif ( ! empty( $img['remoteUrl'] ) ) {
						$src = $img['remoteUrl'];
					}
				}

				if ( $src ) {
					$formatted_images[] = array(
						'src'   => $src,
						'alt'   => $img['alt'] ?? ( $p->post_title . ' - Photo ' . ( $idx + 1 ) ),
						'title' => $img['title'] ?? ( $p->post_title . ' - Photo ' . ( $idx + 1 ) ),
					);
				}
			}

			$collections[] = array(
				'title'  => $p->post_title,
				'slug'   => $p->post_name,
				'count'  => count( $formatted_images ),
				'images' => $formatted_images,
			);
		}

		if ( ! empty( $collections ) ) {
			return $collections;
		}
	}

	$json_file = $theme_dir . '/inc/gallery-data.json';
	if ( file_exists( $json_file ) ) {
		$raw = json_decode( file_get_contents( $json_file ), true );
		if ( is_array( $raw ) ) {
			foreach ( $raw as &$sec ) {
				foreach ( $sec['images'] as &$img ) {
					$local_file = $theme_dir . '/' . $img['relPath'];
					if ( file_exists( $local_file ) ) {
						$img['src'] = $theme_uri . '/' . $img['relPath'];
					} else {
						$img['src'] = $img['remoteUrl'];
					}
				}
			}
			return $raw;
		}
	}

	return array();
}

/**
 * Fetch Official YouTube / TV Media Videos (From Kottakkal Green Life on Janam TV IN FOCUS)
 */
function kottakkal_get_gallery_videos() {
	$posts = get_posts( array(
		'post_type'      => 'gallery_album',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order ID',
		'order'          => 'ASC',
	) );

	if ( ! empty( $posts ) ) {
		$videos = array();
		foreach ( $posts as $p ) {
			$type = get_post_meta( $p->ID, '_kottakkal_gallery_type', true );
			if ( $type !== 'videos' ) {
				continue;
			}

			$raw_vids = get_post_meta( $p->ID, '_kottakkal_gallery_videos', true );
			if ( ! is_array( $raw_vids ) ) {
				$raw_vids = json_decode( (string) $raw_vids, true ) ?: array();
			}

			foreach ( $raw_vids as $v ) {
				$vid_id = $v['id'] ?? '';
				if ( empty( $vid_id ) && ! empty( $v['watch_url'] ) ) {
					if ( preg_match( '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $v['watch_url'], $m ) ) {
						$vid_id = $m[1];
					}
				}

				if ( ! empty( $vid_id ) ) {
					$videos[] = array(
						'id'        => $vid_id,
						'title'     => $v['title'] ?? 'Ayurvedic Health Care',
						'channel'   => $v['channel'] ?? 'Janam TV',
						'program'   => $v['program'] ?? 'INFOCUS',
						'subtitle'  => $v['subtitle'] ?? '',
						'watch_url' => 'https://www.youtube.com/watch?v=' . $vid_id,
						'embed_url' => 'https://www.youtube-nocookie.com/embed/' . $vid_id . '?autoplay=1&rel=0',
						'thumb'     => 'https://img.youtube.com/vi/' . $vid_id . '/hqdefault.jpg',
					);
				}
			}
		}

		if ( ! empty( $videos ) ) {
			return $videos;
		}
	}

	return array(
		array(
			'id'        => 'pYi8o-ErDJ4',
			'title'     => 'വേനലിൽ ആരോഗ്യം സൂക്ഷിക്കാം',
			'channel'   => 'Janam TV',
			'program'   => 'INFOCUS',
			'subtitle'  => 'Summer Health Care & Heat Balancing in Ayurveda',
			'watch_url' => 'https://www.youtube.com/watch?v=pYi8o-ErDJ4',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/pYi8o-ErDJ4?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/pYi8o-ErDJ4/hqdefault.jpg',
		),
		array(
			'id'        => '7W60L1bvmpE',
			'title'     => 'സോറിയാസിസിന് ആയുർവേദ പരിഹാരം',
			'channel'   => 'Janam TV',
			'program'   => 'INFOCUS',
			'subtitle'  => 'Ayurvedic Treatment & Holistic Solutions for Psoriasis',
			'watch_url' => 'https://www.youtube.com/watch?v=7W60L1bvmpE',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/7W60L1bvmpE?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/7W60L1bvmpE/hqdefault.jpg',
		),
		array(
			'id'        => '3qSgZVJUHV4',
			'title'     => 'ഏത് വേനലിലും മുഖം തിളങ്ങും ഈ ഫ്രൂട്ട് ഫേഷ്യൽ ചെയ്താൽ',
			'channel'   => 'Janam TV',
			'program'   => 'INFOCUS',
			'subtitle'  => 'Ayurvedic Herbal Fruit Facial & Glowing Skin Therapy',
			'watch_url' => 'https://www.youtube.com/watch?v=3qSgZVJUHV4',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/3qSgZVJUHV4?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/3qSgZVJUHV4/hqdefault.jpg',
		),
		array(
			'id'        => 'SVl4SQnKQ4E',
			'title'     => 'മുടി തഴച്ചു വളരാൻ ആയുർവേദം',
			'channel'   => 'Janam TV',
			'program'   => 'IN FOCUS',
			'subtitle'  => 'Ayurvedic Remedies for Hair Fall & Luxurious Hair Growth',
			'watch_url' => 'https://www.youtube.com/watch?v=SVl4SQnKQ4E',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/SVl4SQnKQ4E?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/SVl4SQnKQ4E/hqdefault.jpg',
		),
		array(
			'id'        => 'n_gdTEJQewk',
			'title'     => 'സ്ട്രെസ് കുറക്കാൻ ആയുർവേദം',
			'channel'   => 'Janam TV',
			'program'   => 'IN FOCUS',
			'subtitle'  => 'Relieving Stress, Tension & Anxiety through Shirodhara',
			'watch_url' => 'https://www.youtube.com/watch?v=n_gdTEJQewk',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/n_gdTEJQewk?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/n_gdTEJQewk/hqdefault.jpg',
		),
		array(
			'id'        => 'oPms0WRtKq0',
			'title'     => 'നോമ്പുകാലത്ത് കഴിക്കേണ്ടത്?',
			'channel'   => 'Janam TV',
			'program'   => 'INFOCUS',
			'subtitle'  => 'Fasting Diet, Nutrition & Vitality Guidelines in Ayurveda',
			'watch_url' => 'https://www.youtube.com/watch?v=oPms0WRtKq0',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/oPms0WRtKq0?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/oPms0WRtKq0/hqdefault.jpg',
		),
		array(
			'id'        => 'UY8lndUPCJ8',
			'title'     => 'രോഗങ്ങളില്ലാതെ ജീവിക്കാൻ ആയുർവേദം',
			'channel'   => 'Janam TV',
			'program'   => 'INFOCUS',
			'subtitle'  => 'Preventative Wellness & Living Disease-Free with Ayurveda',
			'watch_url' => 'https://www.youtube.com/watch?v=UY8lndUPCJ8',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/UY8lndUPCJ8?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/UY8lndUPCJ8/hqdefault.jpg',
		),
		array(
			'id'        => 'iOxrBiIjgx8',
			'title'     => 'കണ്ണാണ് കരുതലുണ്ടാവണം',
			'channel'   => 'Janam TV',
			'program'   => 'INFOCUS',
			'subtitle'  => 'Traditional Ayurvedic Eye Care & Netra Tarpana Therapies',
			'watch_url' => 'https://www.youtube.com/watch?v=iOxrBiIjgx8',
			'embed_url' => 'https://www.youtube-nocookie.com/embed/iOxrBiIjgx8?autoplay=1&rel=0',
			'thumb'     => 'https://img.youtube.com/vi/iOxrBiIjgx8/hqdefault.jpg',
		),
	);
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
			'p-injury'        => 'assets/img/p-injury.jpg',
			'p-injury-management' => 'assets/img/p-injury.jpg',
			'p-joint'         => 'assets/img/p-joint.jpg',
			'p-marma'         => 'assets/img/p-marma.jpg',
			'p-marma-chikitsa' => 'assets/img/p-marma.jpg',
			'p-postnatal'     => 'assets/img/p-postnatal.jpg',
			'p-relax'         => 'assets/img/p-relax.jpg',
			'p-weight'        => 'assets/img/p-weight.jpg',
			'ritual-1'        => 'assets/img/ritual-1.jpg',
			'ritual-2'        => 'assets/img/ritual-2.jpg',
			'ritual-3'        => 'assets/img/ritual-3.jpg',
			't-abhyangam'     => 'assets/img/t-abhyangam.jpg',
			't-basti'         => 'assets/img/t-basti.jpg',
			't-virechana'     => 'assets/img/t-virechana.jpg',
			't-pottali-sweda' => 'assets/img/t-kizhi.jpg',
			't-kizhi'         => 'assets/img/t-kizhi.jpg',
			't-njavara-kizhi' => 'assets/img/t-kizhi.jpg',
			't-pizhichil'     => 'assets/img/t-pizhichil.jpg',
			't-pichu'         => 'assets/img/t-pichu.jpg',
			't-kati-greeva-pichu' => 'assets/img/t-pichu.jpg',
			't-veshtanam'     => 'assets/img/t-veshtanam.jpg',
			't-shirodara'     => 'assets/img/t-shirodara.jpg',
			't-nasyam'        => 'assets/img/t-nasyam.jpg',
			't-dhoomapana'    => 'assets/img/t-dhoomapanam.jpg',
			't-dhoomapanam'   => 'assets/img/t-dhoomapanam.jpg',
			't-uro-basti'     => 'assets/img/t-urovasthi.jpg',
			't-greeva-basti'  => 'assets/img/t-greeva-basti.jpg',
			't-kativasthi'    => 'assets/img/t-kativasthi.jpg',
			't-prishta-basti' => 'assets/img/t-prishta-basti.jpg',
			't-janu-basti'    => 'assets/img/t-janu-basti.jpg',
			't-shiro-basti'   => 'assets/img/t-shiro-basti.jpg',
			't-dhanyamla-dhara' => 'assets/img/t-dhanyamla-dhara.jpg',
			't-takra-dhara'   => 'assets/img/t-takra-dhara.jpg',
			't-sarvanga-lepanam' => 'assets/img/t-sarvanga-lepanam.webp',
			't-tarpanam'      => 'assets/img/t-tarpanam.jpg',
			't-akshi-seka'    => 'assets/img/t-akshi-seka.webp',
			't-karnapoorana'  => 'assets/img/t-karnapoorana.jpg',
			't-prachanam'     => 'assets/img/t-prachanam.jpg',
			't-face-pack'     => 'assets/img/t-face-pack.jpg',
			't-thalapothichil' => 'assets/img/t-thalapothichil.jpg',
			't-udhwarthanam'  => 'assets/img/t-udhwarthanam.jpg',
			'doc-naseeba'     => file_exists( $theme_dir . '/assets/img/doc-naseeba-hd.png' ) ? 'assets/img/doc-naseeba-hd.png' : ( file_exists( $theme_dir . '/assets/img/doc-naseeba.png' ) ? 'assets/img/doc-naseeba.png' : 'assets/img/doc-naseeba.jpg' ),
			'doc-ajitha'      => file_exists( $theme_dir . '/assets/img/doc-ajitha-hd.png' ) ? 'assets/img/doc-ajitha-hd.png' : ( file_exists( $theme_dir . '/assets/img/doc-ajitha.png' ) ? 'assets/img/doc-ajitha.png' : 'assets/img/doc-ajitha.jpg' ),
			'doc-minupriya'   => file_exists( $theme_dir . '/assets/img/doc-minupriya-hd.png' ) ? 'assets/img/doc-minupriya-hd.png' : ( file_exists( $theme_dir . '/assets/img/doc-minupriya.png' ) ? 'assets/img/doc-minupriya.png' : 'assets/img/doc-minupriya.jpg' ),
			'doc-rajesh'      => 'assets/img/doc-rajesh.jpg',
			'doc-arun'        => 'assets/img/doc-arun.jpg',
		);

		if ( isset( $map[ $key ] ) && file_exists( $theme_dir . '/' . $map[ $key ] ) ) {
			$photo_url = $theme_uri . '/' . $map[ $key ];
		}
	}

	// For any doctor plate, ensure transparent PNG cutout is used whenever available (prefer enhanced HD)
	if ( ( str_starts_with( (string) $key, 'doc-' ) || $ill === 'doc' ) && ! empty( $photo_url ) ) {
		$doc_slug = str_replace( 'doc-', '', (string) $key );
		if ( ! empty( $doc_slug ) ) {
			if ( file_exists( $theme_dir . '/assets/img/doc-' . $doc_slug . '-hd.png' ) ) {
				$photo_url = $theme_uri . '/assets/img/doc-' . $doc_slug . '-hd.png';
			} elseif ( file_exists( $theme_dir . '/assets/img/doc-' . $doc_slug . '.png' ) ) {
				$photo_url = $theme_uri . '/assets/img/doc-' . $doc_slug . '.png';
			}
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

/**
 * Return an SVG icon for doctor credentials matching the editorial reference design
 */
function kottakkal_get_cred_icon( $cred_text ) {
	$text = strtolower( (string) $cred_text );

	// Shield: DHA / MOH / Licensing
	if ( str_contains( $text, 'dha' ) || str_contains( $text, 'moh' ) ) {
		return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>';
	}

	// Building / Hospital / Medical College (e.g. KMCT)
	if ( str_contains( $text, 'kmct' ) ) {
		return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01M16 6h.01M8 10h.01M16 10h.01M8 14h.01M16 14h.01M12 6v4M10 8h4"/></svg>';
	}

	// Graduation Cap: Medical College / University / KUHS / Rajiv Gandhi
	if ( str_contains( $text, 'college' ) || str_contains( $text, 'university' ) || str_contains( $text, 'kuhs' ) || str_contains( $text, 'bangalore' ) || str_contains( $text, 'degree' ) ) {
		return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>';
	}

	// Lotus / Flower: Yoga, Trainer, Ayurvedic Practitioner
	if ( str_contains( $text, 'yoga' ) || str_contains( $text, 'practitioner' ) || str_contains( $text, 'trainer' ) ) {
		return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3c-1.5 3-4 6-4 9a4 4 0 0 0 8 0c0-3-2.5-6-4-9z"/><path d="M6.5 11c-2 2-3.5 4.5-3.5 6.5a4.5 4.5 0 0 0 8.5 2"/><path d="M17.5 11c2 2 3.5 4.5 3.5 6.5a4.5 4.5 0 0 1-8.5 2"/></svg>';
	}

	// Users / Group: across UAE / India / clinical experience
	if ( str_contains( $text, 'across' ) || str_contains( $text, 'uae' ) ) {
		return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>';
	}

	// Calendar / Schedule: 10+ Years of Clinical Experience
	if ( str_contains( $text, '10+' ) ) {
		return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>';
	}

	// Briefcase: Experience in India / General experience
	if ( str_contains( $text, 'experience' ) || str_contains( $text, 'year' ) ) {
		return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>';
	}

	// Default: Leaf icon
	return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>';
}
