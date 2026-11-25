<?php
/**
 * Template Name: Kottakkal - Home
 * Description: Editorial botanical homepage matching reference website.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$contact    = kottakkal_get_contact_info();
$treatments = kottakkal_get_treatments();
$pathways   = kottakkal_get_pathways();
$doctors    = kottakkal_get_doctors();
?>

<!-- Hero Section -->
<section class="hero" aria-labelledby="hero-h">
	<div class="bg"></div>
	<canvas id="gl" aria-hidden="true"></canvas>

	<!-- Botanical Sprig SVG -->
	<svg class="layer sprig" data-depth="-14" viewBox="0 0 400 500" fill="none" stroke="currentColor" stroke-width=".9" stroke-linecap="round" aria-hidden="true">
		<g class="breathe">
			<path d="M318 540C296 420 300 300 330 196C344 146 362 98 380 40"/>
			<g transform="translate(322 470) rotate(-58)"><path d="M0 0C34 -26.4 29.2 -93.6 0 -120C-29.2 -93.6 -34 -26.4 0 0Z" fill="currentColor" fill-opacity="0.07"/><path d="M0 6L0 -116.4" stroke-opacity="0.8"/></g>
			<g transform="translate(312 410) rotate(52)"><path d="M0 0C36 -28.6 30.9 -101.4 0 -130C-30.9 -101.4 -36 -28.6 0 0Z" fill="currentColor" fill-opacity="0.07"/><path d="M0 6L0 -126.1" stroke-opacity="0.8"/></g>
			<g transform="translate(306 350) rotate(-62)"><path d="M0 0C34 -27.2 29.2 -96.7 0 -124C-29.2 -96.7 -34 -27.2 0 0Z" fill="currentColor" fill-opacity="0.07"/><path d="M0 6L0 -120.2" stroke-opacity="0.8"/></g>
			<g transform="translate(312 292) rotate(48)"><path d="M0 0C32 -25.9 27.5 -92 0 -118C-27.5 -92 -32 -25.9 0 0Z" fill="currentColor" fill-opacity="0.07"/><path d="M0 6L0 -114.4" stroke-opacity="0.8"/></g>
			<g transform="translate(322 236) rotate(-56)"><path d="M0 0C30 -23.7 25.8 -84.2 0 -108C-25.8 -84.2 -30 -23.7 0 0Z" fill="currentColor" fill-opacity="0.07"/><path d="M0 6L0 -104.7" stroke-opacity="0.8"/></g>
			<g transform="translate(336 186) rotate(44)"><path d="M0 0C28 -21.5 24 -76.4 0 -98C-24 -76.4 -28 -21.5 0 0Z" fill="currentColor" fill-opacity="0.07"/><path d="M0 6L0 -95" stroke-opacity="0.8"/></g>
			<path d="M310 380C250 360 210 330 182 292" stroke-opacity="0.7"/>
		</g>
	</svg>

	<div class="wrap hero-in">
		<div class="hero-grid hero-pk-grid">
			<div class="hero-pk-content">
				<span class="label hero-pk-label fade-up" style="color:var(--gold-hi)">
					<?php esc_html_e( 'Classical Kerala Ayurveda · Shodhana Chikitsa · Dubai', 'oceanwp' ); ?>
				</span>
				<h1 id="hero-h" style="margin-top:24px">
					<span class="ln"><span><?php esc_html_e( 'Classical', 'oceanwp' ); ?></span></span>
					<span class="ln"><span><em><?php esc_html_e( 'Panchakarma.', 'oceanwp' ); ?></em></span></span>
					<span class="ln"><span><?php esc_html_e( '5 Sacred Cleansing Therapies.', 'oceanwp' ); ?></span></span>
				</h1>

				<p class="sub fade-up d1">
					<?php esc_html_e( 'Experience the pinnacle of authentic Ayurvedic purification. Panchakarma is a sacred, physician-guided sequence of five cleansing therapies (Shodhanas) that eliminate deep-seated metabolic toxins (Ama), clear vital channels, and restore tri-doshic equilibrium under DHA-certified Ayurvedic doctors.', 'oceanwp' ); ?>
				</p>

				<!-- 5 Panchakarma Therapies Quick-Nav List (matches user drawing list) -->
				<div class="pk-therapies-quicknav fade-up d2" role="navigation" aria-label="<?php esc_attr_e( 'Panchakarma Therapies', 'oceanwp' ); ?>">
					<div class="pk-qnav-label"><?php esc_html_e( 'The 5 Shodhana Stages:', 'oceanwp' ); ?></div>
					<div class="pk-qnav-items">
						<a href="<?php echo esc_url( home_url( '/treatments/vamana/' ) ); ?>" class="pk-qnav-item" data-stage="vamana">
							<span class="pk-qnum">01</span>
							<span class="pk-qname">Vamana</span>
							<span class="pk-qtag"><?php esc_html_e( 'Kapha Emesis', 'oceanwp' ); ?></span>
						</a>
						<a href="<?php echo esc_url( home_url( '/treatments/virechana/' ) ); ?>" class="pk-qnav-item" data-stage="virechana">
							<span class="pk-qnum">02</span>
							<span class="pk-qname">Virechana</span>
							<span class="pk-qtag"><?php esc_html_e( 'Pitta Purgation', 'oceanwp' ); ?></span>
						</a>
						<a href="<?php echo esc_url( home_url( '/treatments/basti/' ) ); ?>" class="pk-qnav-item" data-stage="basti">
							<span class="pk-qnum">03</span>
							<span class="pk-qname">Basti</span>
							<span class="pk-qtag"><?php esc_html_e( 'Vata Enemas', 'oceanwp' ); ?></span>
						</a>
						<a href="<?php echo esc_url( home_url( '/treatments/nasyam/' ) ); ?>" class="pk-qnav-item" data-stage="nasya">
							<span class="pk-qnum">04</span>
							<span class="pk-qname">Nasya</span>
							<span class="pk-qtag"><?php esc_html_e( 'Prana / Nasal', 'oceanwp' ); ?></span>
						</a>
						<a href="<?php echo esc_url( home_url( '/treatments/raktamokshana/' ) ); ?>" class="pk-qnav-item" data-stage="raktamokshana">
							<span class="pk-qnum">05</span>
							<span class="pk-qname">Raktamokshana</span>
							<span class="pk-qtag"><?php esc_html_e( 'Blood Cleansing', 'oceanwp' ); ?></span>
						</a>
					</div>
				</div>

				<div class="ctas fade-up d2">
					<a class="btn btn-ivory mag" href="<?php echo esc_url( home_url( '/book/?treatment=panchakarma' ) ); ?>">
						<?php esc_html_e( 'Book Panchakarma Consultation', 'oceanwp' ); ?>
						<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
					</a>
					<a class="btn btn-glass mag" href="#panchakarma-cycle">
						<?php esc_html_e( 'Explore 5 Therapies', 'oceanwp' ); ?>
					</a>
				</div>

				<div class="meta fade-up d3">
					<span><?php esc_html_e( 'DHA-Certified Ayurvedic Doctors', 'oceanwp' ); ?></span>
					<span><?php esc_html_e( 'Authentic Kerala Tradition', 'oceanwp' ); ?></span>
					<span><?php esc_html_e( 'Open daily, 9 am – 9 pm', 'oceanwp' ); ?></span>
				</div>
			</div>

			<!-- Right Column: The Panchakarma Cycle Component -->
			<div class="hero-pk-visual fade-up d1">
				<div class="pk-cycle-card">
					<div class="pk-cycle-header">
						<span class="pk-cycle-eyebrow"><?php esc_html_e( 'Classical Purification Flow', 'oceanwp' ); ?></span>
						<h3 class="pk-cycle-title"><?php esc_html_e( 'Panchakarma Cycle', 'oceanwp' ); ?></h3>
					</div>

					<div class="pk-cycle-diagram-wrap">
						<!-- SVG Panchakarma Cycle Diagram -->
						<svg class="pk-cycle-svg" viewBox="0 0 520 520" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="<?php esc_attr_e( 'Panchakarma 5-stage cycle diagram', 'oceanwp' ); ?>">
							<defs>
								<!-- Ambient Central Glow -->
								<radialGradient id="pkCoreGlow" cx="50%" cy="50%" r="50%">
									<stop offset="0%" stop-color="#DFC289" stop-opacity="0.22"/>
									<stop offset="60%" stop-color="#24513F" stop-opacity="0.15"/>
									<stop offset="100%" stop-color="#0A1D17" stop-opacity="0"/>
								</radialGradient>
								<!-- Vamana Gradient -->
								<radialGradient id="gradVamana" cx="38%" cy="32%" r="68%">
									<stop offset="0%" stop-color="#D47A4A"/>
									<stop offset="70%" stop-color="#803816"/>
									<stop offset="100%" stop-color="#2E1206"/>
								</radialGradient>
								<!-- Virechana Gradient -->
								<radialGradient id="gradVirechana" cx="38%" cy="32%" r="68%">
									<stop offset="0%" stop-color="#E5A93C"/>
									<stop offset="70%" stop-color="#8E5B0F"/>
									<stop offset="100%" stop-color="#331E04"/>
								</radialGradient>
								<!-- Basti Gradient -->
								<radialGradient id="gradBasti" cx="38%" cy="32%" r="68%">
									<stop offset="0%" stop-color="#5BB381"/>
									<stop offset="70%" stop-color="#246842"/>
									<stop offset="100%" stop-color="#0B2316"/>
								</radialGradient>
								<!-- Nasya Gradient -->
								<radialGradient id="gradNasya" cx="38%" cy="32%" r="68%">
									<stop offset="0%" stop-color="#D96B75"/>
									<stop offset="70%" stop-color="#7C252D"/>
									<stop offset="100%" stop-color="#2C090D"/>
								</radialGradient>
								<!-- Raktamokshana Gradient -->
								<radialGradient id="gradRakta" cx="38%" cy="32%" r="68%">
									<stop offset="0%" stop-color="#4A8FD4"/>
									<stop offset="70%" stop-color="#1B4D80"/>
									<stop offset="100%" stop-color="#07192C"/>
								</radialGradient>
								<!-- Golden Orbit Gradient -->
								<linearGradient id="orbitGrad" x1="0%" y1="0%" x2="100%" y2="100%">
									<stop offset="0%" stop-color="#DFC289" stop-opacity="0.6"/>
									<stop offset="50%" stop-color="#24513F" stop-opacity="0.25"/>
									<stop offset="100%" stop-color="#DFC289" stop-opacity="0.6"/>
								</linearGradient>
								<!-- Filter: Gold Drop Shadow -->
								<filter id="goldGlow" x="-20%" y="-20%" width="140%" height="140%">
									<feDropShadow dx="0" dy="4" stdDeviation="8" flood-color="#DFC289" flood-opacity="0.3"/>
								</filter>
								<filter id="nodeShadow" x="-30%" y="-30%" width="160%" height="160%">
									<feDropShadow dx="0" dy="6" stdDeviation="10" flood-color="#000000" flood-opacity="0.6"/>
								</filter>
							</defs>

							<!-- Ambient Background Core Glow -->
							<circle cx="260" cy="260" r="190" fill="url(#pkCoreGlow)"/>

							<!-- Outer Orbital Circle Track (R = 175) -->
							<circle cx="260" cy="260" r="175" stroke="url(#orbitGrad)" stroke-width="1.8" stroke-dasharray="6 4" class="pk-orbit-line"/>
							<circle cx="260" cy="260" r="175" stroke="#DFC289" stroke-opacity="0.12" stroke-width="1"/>

							<!-- Directional Flow Arrows Along Orbit (Clockwise: 1->2->3->4->5->1) -->
							<!-- Arrow 1 -> 2 (Vamana to Virechana, Midpoint angle -54°: x=362.9, y=118.4, rotation 36°) -->
							<g transform="translate(362.9, 118.4) rotate(36)" class="pk-cycle-arrow" data-flow="1-2">
								<path d="M-10 -4 L0 0 L-10 4 L-7 0 Z" fill="#DFC289"/>
								<circle cx="-16" cy="0" r="2" fill="#DFC289" opacity="0.6"/>
							</g>

							<!-- Arrow 2 -> 3 (Virechana to Basti, Midpoint angle 18°: x=426.4, y=314.1, rotation 108°) -->
							<g transform="translate(426.4, 314.1) rotate(108)" class="pk-cycle-arrow" data-flow="2-3">
								<path d="M-10 -4 L0 0 L-10 4 L-7 0 Z" fill="#DFC289"/>
								<circle cx="-16" cy="0" r="2" fill="#DFC289" opacity="0.6"/>
							</g>

							<!-- Arrow 3 -> 4 (Basti to Nasya, Midpoint angle 90°: x=260, y=435, rotation 180°) -->
							<g transform="translate(260, 435) rotate(180)" class="pk-cycle-arrow" data-flow="3-4">
								<path d="M-10 -4 L0 0 L-10 4 L-7 0 Z" fill="#DFC289"/>
								<circle cx="-16" cy="0" r="2" fill="#DFC289" opacity="0.6"/>
							</g>

							<!-- Arrow 4 -> 5 (Nasya to Raktamokshana, Midpoint angle 162°: x=93.6, y=314.1, rotation 252°) -->
							<g transform="translate(93.6, 314.1) rotate(252)" class="pk-cycle-arrow" data-flow="4-5">
								<path d="M-10 -4 L0 0 L-10 4 L-7 0 Z" fill="#DFC289"/>
								<circle cx="-16" cy="0" r="2" fill="#DFC289" opacity="0.6"/>
							</g>

							<!-- Arrow 5 -> 1 (Raktamokshana to Vamana, Midpoint angle 234°: x=157.1, y=118.4, rotation 324°) -->
							<g transform="translate(157.1, 118.4) rotate(324)" class="pk-cycle-arrow" data-flow="5-1">
								<path d="M-10 -4 L0 0 L-10 4 L-7 0 Z" fill="#DFC289"/>
								<circle cx="-16" cy="0" r="2" fill="#DFC289" opacity="0.6"/>
							</g>

							<!-- Center Core Hub: Panchakarma Emblem (cx=260, cy=260) -->
							<g class="pk-center-hub">
								<circle cx="260" cy="260" r="62" fill="#081812" stroke="#DFC289" stroke-width="1.2" stroke-opacity="0.45"/>
								<circle cx="260" cy="260" r="56" fill="none" stroke="#DFC289" stroke-width="0.8" stroke-dasharray="3 3" stroke-opacity="0.3"/>
								<!-- Center Decorative Botanical Ring -->
								<circle cx="260" cy="260" r="48" fill="#0A1D17" stroke="rgba(223, 194, 137, 0.2)" stroke-width="1"/>
								<text x="260" y="242" text-anchor="middle" fill="#DFC289" font-size="8.5" font-family="var(--sans)" font-weight="600" letter-spacing="0.22em">AYURVEDA</text>
								<text x="260" y="262" text-anchor="middle" fill="#F3EEE2" font-size="15" font-family="var(--display)" font-weight="500" letter-spacing="0.04em">PANCHA</text>
								<text x="260" y="278" text-anchor="middle" fill="#DFC289" font-size="13" font-family="var(--display)" font-style="italic">Karma</text>
								<text x="260" y="294" text-anchor="middle" fill="rgba(243, 238, 226, 0.65)" font-size="7.5" font-family="var(--sans)" letter-spacing="0.14em">5 SHODHANAS</text>
							</g>

							<!-- Node 1: Vamana (Top, 260, 85) -->
							<a href="<?php echo esc_url( home_url( '/treatments/vamana/' ) ); ?>" class="pk-node-link" data-node="vamana" aria-label="Vamana Treatment">
								<g class="pk-node-group" filter="url(#nodeShadow)">
									<circle cx="260" cy="85" r="44" fill="url(#gradVamana)" stroke="#DFC289" stroke-width="1.8" class="pk-node-circle"/>
									<circle cx="260" cy="85" r="40" fill="none" stroke="rgba(255, 255, 255, 0.2)" stroke-width="0.8"/>
									<text x="260" y="70" text-anchor="middle" fill="#DFC289" font-size="8" font-family="var(--sans)" font-weight="700" letter-spacing="0.18em">01 · KAPHA</text>
									<text x="260" y="88" text-anchor="middle" fill="#FFFFFF" font-size="11.5" font-family="var(--display)" font-weight="600" letter-spacing="0.08em">VAMANA</text>
									<text x="260" y="103" text-anchor="middle" fill="rgba(243, 238, 226, 0.85)" font-size="7.5" font-family="var(--sans)" font-weight="500">Therapeutic Emesis</text>
								</g>
							</a>

							<!-- Node 2: Virechana (Top-Right, 426.4, 205.9) -->
							<a href="<?php echo esc_url( home_url( '/treatments/virechana/' ) ); ?>" class="pk-node-link" data-node="virechana" aria-label="Virechana Treatment">
								<g class="pk-node-group" filter="url(#nodeShadow)">
									<circle cx="426.4" cy="205.9" r="44" fill="url(#gradVirechana)" stroke="#DFC289" stroke-width="1.8" class="pk-node-circle"/>
									<circle cx="426.4" cy="205.9" r="40" fill="none" stroke="rgba(255, 255, 255, 0.2)" stroke-width="0.8"/>
									<text x="426.4" y="191" text-anchor="middle" fill="#DFC289" font-size="8" font-family="var(--sans)" font-weight="700" letter-spacing="0.18em">02 · PITTA</text>
									<text x="426.4" y="209" text-anchor="middle" fill="#FFFFFF" font-size="11" font-family="var(--display)" font-weight="600" letter-spacing="0.08em">VIRECHANA</text>
									<text x="426.4" y="224" text-anchor="middle" fill="rgba(243, 238, 226, 0.85)" font-size="7.5" font-family="var(--sans)" font-weight="500">Therapeutic Purgation</text>
								</g>
							</a>

							<!-- Node 3: Basti (Bottom-Right, 362.9, 401.6) -->
							<a href="<?php echo esc_url( home_url( '/treatments/basti/' ) ); ?>" class="pk-node-link" data-node="basti" aria-label="Basti Treatment">
								<g class="pk-node-group" filter="url(#nodeShadow)">
									<circle cx="362.9" cy="401.6" r="44" fill="url(#gradBasti)" stroke="#DFC289" stroke-width="1.8" class="pk-node-circle"/>
									<circle cx="362.9" cy="401.6" r="40" fill="none" stroke="rgba(255, 255, 255, 0.2)" stroke-width="0.8"/>
									<text x="362.9" y="386.6" text-anchor="middle" fill="#DFC289" font-size="8" font-family="var(--sans)" font-weight="700" letter-spacing="0.18em">03 · VATA</text>
									<text x="362.9" y="404.6" text-anchor="middle" fill="#FFFFFF" font-size="12" font-family="var(--display)" font-weight="600" letter-spacing="0.08em">BASTI</text>
									<text x="362.9" y="419.6" text-anchor="middle" fill="rgba(243, 238, 226, 0.85)" font-size="7.5" font-family="var(--sans)" font-weight="500">Medicated Enemas</text>
								</g>
							</a>

							<!-- Node 4: Nasya (Bottom-Left, 157.1, 401.6) -->
							<a href="<?php echo esc_url( home_url( '/treatments/nasyam/' ) ); ?>" class="pk-node-link" data-node="nasya" aria-label="Nasya Treatment">
								<g class="pk-node-group" filter="url(#nodeShadow)">
									<circle cx="157.1" cy="401.6" r="44" fill="url(#gradNasya)" stroke="#DFC289" stroke-width="1.8" class="pk-node-circle"/>
									<circle cx="157.1" cy="401.6" r="40" fill="none" stroke="rgba(255, 255, 255, 0.2)" stroke-width="0.8"/>
									<text x="157.1" y="386.6" text-anchor="middle" fill="#DFC289" font-size="8" font-family="var(--sans)" font-weight="700" letter-spacing="0.18em">04 · PRANA</text>
									<text x="157.1" y="404.6" text-anchor="middle" fill="#FFFFFF" font-size="12" font-family="var(--display)" font-weight="600" letter-spacing="0.08em">NASYA</text>
									<text x="157.1" y="419.6" text-anchor="middle" fill="rgba(243, 238, 226, 0.85)" font-size="7.5" font-family="var(--sans)" font-weight="500">Nasal Administration</text>
								</g>
							</a>

							<!-- Node 5: Raktamokshana (Top-Left, 93.6, 205.9) -->
							<a href="<?php echo esc_url( home_url( '/treatments/raktamokshana/' ) ); ?>" class="pk-node-link" data-node="raktamokshana" aria-label="Raktamokshana Treatment">
								<g class="pk-node-group" filter="url(#nodeShadow)">
									<circle cx="93.6" cy="205.9" r="44" fill="url(#gradRakta)" stroke="#DFC289" stroke-width="1.8" class="pk-node-circle"/>
									<circle cx="93.6" cy="205.9" r="40" fill="none" stroke="rgba(255, 255, 255, 0.2)" stroke-width="0.8"/>
									<text x="93.6" y="191" text-anchor="middle" fill="#DFC289" font-size="7.5" font-family="var(--sans)" font-weight="700" letter-spacing="0.16em">05 · RAKTA</text>
									<text x="93.6" y="209" text-anchor="middle" fill="#FFFFFF" font-size="9.5" font-family="var(--display)" font-weight="600" letter-spacing="0.04em">RAKTAMOKSHANA</text>
									<text x="93.6" y="224" text-anchor="middle" fill="rgba(243, 238, 226, 0.85)" font-size="7.5" font-family="var(--sans)" font-weight="500">Blood Cleansing</text>
								</g>
							</a>
						</svg>
					</div>

					<!-- Live Interactive Stage Indicator Bar -->
					<div class="pk-cycle-status-bar" id="pkStatusBanner">
						<span class="pk-status-dot"></span>
						<span class="pk-status-text" id="pkStatusText"><?php esc_html_e( 'Interactive Cycle: Tap or hover any of the 5 Shodhana therapies to explore its action.', 'oceanwp' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="cue" aria-hidden="true">
		<?php esc_html_e( 'Scroll', 'oceanwp' ); ?><i></i>
	</div>
</section>

<!-- The 5 Pillars of Panchakarma Detailed Section -->
<section class="pk-pillars-sec" id="panchakarma-cycle" aria-labelledby="pk-sec-h">
	<div class="wrap">
		<div class="pk-sec-header">
			<span class="label" style="color:var(--gold-hi)">
				<?php esc_html_e( 'Panchakarma Protocol · Shodhana Chikitsa', 'oceanwp' ); ?>
			</span>
			<h2 id="pk-sec-h" style="margin-top:16px">
				<?php esc_html_e( 'The Five Sacred Purifications.', 'oceanwp' ); ?> <em><?php esc_html_e( 'Rooted in Classical Kerala Ayurveda.', 'oceanwp' ); ?></em>
			</h2>
			<p class="lede" style="margin-top:20px">
				<?php esc_html_e( 'Unlike superficial treatments, classical Panchakarma works at the deepest cellular level to detach, liquefy, and systematically eliminate metabolic toxins (Ama), restoring harmony across Vata, Pitta, and Kapha.', 'oceanwp' ); ?>
			</p>
		</div>

		<div class="pk-cards-grid">
			<!-- 1. Vamana Card -->
			<article class="pk-card pk-card-vamana" id="pk-card-vamana">
				<div class="pk-card-badge"><span>01</span> · <?php esc_html_e( 'Kapha Elimination', 'oceanwp' ); ?></div>
				<h3 class="pk-card-title"><?php esc_html_e( 'Vamana', 'oceanwp' ); ?></h3>
				<span class="pk-card-sub"><?php esc_html_e( 'Therapeutic Emesis', 'oceanwp' ); ?></span>
				<p class="pk-card-desc">
					<?php esc_html_e( 'Physician-guided therapeutic emesis eliminating deep Kapha toxins and mucus congestion from respiratory pathways.', 'oceanwp' ); ?>
				</p>
				<div class="pk-card-details">
					<div class="pk-detail-item"><b><?php esc_html_e( 'Action:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Upper GI & respiratory purge', 'oceanwp' ); ?></div>
					<div class="pk-detail-item"><b><?php esc_html_e( 'Indications:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Asthma, allergies, psoriasis, hyperacidity', 'oceanwp' ); ?></div>
				</div>
				<a href="<?php echo esc_url( home_url( '/treatments/vamana/' ) ); ?>" class="pk-card-link">
					<?php esc_html_e( 'Explore Details', 'oceanwp' ); ?> →
				</a>
			</article>

			<!-- 2. Virechana Card -->
			<article class="pk-card pk-card-virechana" id="pk-card-virechana">
				<div class="pk-card-badge"><span>02</span> · <?php esc_html_e( 'Pitta Elimination', 'oceanwp' ); ?></div>
				<h3 class="pk-card-title"><?php esc_html_e( 'Virechana', 'oceanwp' ); ?></h3>
				<span class="pk-card-sub"><?php esc_html_e( 'Therapeutic Purgation', 'oceanwp' ); ?></span>
				<p class="pk-card-desc">
					<?php esc_html_e( 'Controlled herbal purgation flushing excess Pitta heat toxins from the liver, gallbladder, and small intestine.', 'oceanwp' ); ?>
				</p>
				<div class="pk-card-details">
					<div class="pk-detail-item"><b><?php esc_html_e( 'Action:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Liver & intestinal detox', 'oceanwp' ); ?></div>
					<div class="pk-detail-item"><b><?php esc_html_e( 'Indications:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Dermatitis, chronic acidity, eczema, sluggish liver', 'oceanwp' ); ?></div>
				</div>
				<a href="<?php echo esc_url( home_url( '/treatments/virechana/' ) ); ?>" class="pk-card-link">
					<?php esc_html_e( 'Explore Details', 'oceanwp' ); ?> →
				</a>
			</article>

			<!-- 3. Basti Card -->
			<article class="pk-card pk-card-basti" id="pk-card-basti">
				<div class="pk-card-badge"><span>03</span> · <?php esc_html_e( 'Vata Balance', 'oceanwp' ); ?></div>
				<h3 class="pk-card-title"><?php esc_html_e( 'Basti', 'oceanwp' ); ?></h3>
				<span class="pk-card-sub"><?php esc_html_e( 'Medicated Enemas', 'oceanwp' ); ?></span>
				<p class="pk-card-desc">
					<?php esc_html_e( 'Classical herbal decoction and oil enemas administered to pacify Vata, lubricate tissues, and rejuvenate nerves.', 'oceanwp' ); ?>
				</p>
				<div class="pk-card-details">
					<div class="pk-detail-item"><b><?php esc_html_e( 'Action:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Colon & nerve regeneration', 'oceanwp' ); ?></div>
					<div class="pk-detail-item"><b><?php esc_html_e( 'Indications:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Sciatica, arthritis, lumbar stiffness, joint pain', 'oceanwp' ); ?></div>
				</div>
				<a href="<?php echo esc_url( home_url( '/treatments/basti/' ) ); ?>" class="pk-card-link">
					<?php esc_html_e( 'Explore Details', 'oceanwp' ); ?> →
				</a>
			</article>

			<!-- 4. Nasya Card -->
			<article class="pk-card pk-card-nasya" id="pk-card-nasya">
				<div class="pk-card-badge"><span>04</span> · <?php esc_html_e( 'Prana & Sensory Detox', 'oceanwp' ); ?></div>
				<h3 class="pk-card-title"><?php esc_html_e( 'Nasya', 'oceanwp' ); ?></h3>
				<span class="pk-card-sub"><?php esc_html_e( 'Nasal Administration', 'oceanwp' ); ?></span>
				<p class="pk-card-desc">
					<?php esc_html_e( 'Medicated oil instillation into nasal passages to cleanse sinuses, awaken senses, and relieve supraclavicular stagnation.', 'oceanwp' ); ?>
				</p>
				<div class="pk-card-details">
					<div class="pk-detail-item"><b><?php esc_html_e( 'Action:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Head & sensory purification', 'oceanwp' ); ?></div>
					<div class="pk-detail-item"><b><?php esc_html_e( 'Indications:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Migraines, cervical spondylosis, sinusitis, insomnia', 'oceanwp' ); ?></div>
				</div>
				<a href="<?php echo esc_url( home_url( '/treatments/nasyam/' ) ); ?>" class="pk-card-link">
					<?php esc_html_e( 'Explore Details', 'oceanwp' ); ?> →
				</a>
			</article>

			<!-- 5. Raktamokshana Card -->
			<article class="pk-card pk-card-raktamokshana" id="pk-card-raktamokshana">
				<div class="pk-card-badge"><span>05</span> · <?php esc_html_e( 'Blood Purification', 'oceanwp' ); ?></div>
				<h3 class="pk-card-title"><?php esc_html_e( 'Raktamokshana', 'oceanwp' ); ?></h3>
				<span class="pk-card-sub"><?php esc_html_e( 'Controlled Bloodletting', 'oceanwp' ); ?></span>
				<p class="pk-card-desc">
					<?php esc_html_e( 'Specialized medical leech therapy (Jalouka) evacuating localized vascular toxins to calm severe inflammatory skin flare-ups.', 'oceanwp' ); ?>
				</p>
				<div class="pk-card-details">
					<div class="pk-detail-item"><b><?php esc_html_e( 'Action:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Microvascular toxin release', 'oceanwp' ); ?></div>
					<div class="pk-detail-item"><b><?php esc_html_e( 'Indications:', 'oceanwp' ); ?></b> <?php esc_html_e( 'Psoriasis, chronic eczema, varicose congestion', 'oceanwp' ); ?></div>
				</div>
				<a href="<?php echo esc_url( home_url( '/treatments/raktamokshana/' ) ); ?>" class="pk-card-link">
					<?php esc_html_e( 'Explore Details', 'oceanwp' ); ?> →
				</a>
			</article>
		</div>
	</div>
</section>

<!-- Continuous Therapy Ticker -->
<div class="marquee" aria-hidden="true">
	<div class="marquee-track">
		<?php for ( $i = 0; $i < 2; $i++ ) : ?>
			<?php foreach ( $treatments as $t ) : ?>
				<span><?php echo esc_html( $t['name'] ); ?></span>
			<?php endforeach; ?>
		<?php endfor; ?>
	</div>
</div>

<!-- Intro / Approach Section -->
<section class="section" aria-labelledby="in-h">
	<div class="wrap">
		<div class="intro">
			<div class="intro-art">
				<div data-reveal="img">
					<?php echo kottakkal_render_plate( 'intro-a', 'drop', 'oil', 'Medicated herbal oil', '4/5' ); ?>
				</div>
				<div class="b" data-reveal="img">
					<?php echo kottakkal_render_plate( 'intro-b', 'rice', 'ivory', '', '3/4' ); ?>
				</div>
				<span class="tag"><?php esc_html_e( 'In the heart of Dubai', 'oceanwp' ); ?></span>
			</div>

			<div>
				<span class="label"><?php esc_html_e( 'Our approach', 'oceanwp' ); ?></span>
				<h2 id="in-h">
					<?php esc_html_e( 'A more thoughtful approach to', 'oceanwp' ); ?> <em><?php esc_html_e( 'wellbeing', 'oceanwp' ); ?></em>
				</h2>
				<div class="body">
					<p>
						<?php esc_html_e( 'Every course of care at Kottakkal Green Life begins with a thorough review by one of our DHA-certified Ayurvedic doctors. From there we build a plan around you, drawing on classical Kerala therapies, herbal medicine and changes to diet and daily routine.', 'oceanwp' ); ?>
					</p>
					<p class="muted">
						<?php esc_html_e( 'Trained therapists carry out each treatment under the doctors’ supervision, using natural, toxin-free preparations, in a calm centre beside Al Nahda Metro Station.', 'oceanwp' ); ?>
					</p>
					<a class="link" href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" style="justify-self:start">
						<?php esc_html_e( 'Discover our story', 'oceanwp' ); ?>
						<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
					</a>
				</div>
			</div>
		</div>

		<!-- Animated Statistics -->
		<div class="stats">
			<div class="stat">
				<b><span data-count="30">30</span><sup>+</sup></b>
				<span><?php esc_html_e( 'Classical Kerala therapies', 'oceanwp' ); ?></span>
			</div>
			<div class="stat">
				<b><span data-count="7">7</span></b>
				<span><?php esc_html_e( 'Days a week, by appointment', 'oceanwp' ); ?></span>
			</div>
			<div class="stat">
				<b><span data-count="12">12</span></b>
				<span><?php esc_html_e( 'Hours of consultations a day, 9 am to 9 pm', 'oceanwp' ); ?></span>
			</div>
			<div class="stat">
				<b><span data-count="10">10</span><sup>+</sup></b>
				<span><?php esc_html_e( 'Years’ clinical experience, our Medical Director', 'oceanwp' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Treatments Catalog Explorer Section -->
<section class="section" style="padding-top:0" aria-labelledby="tx-h">
	<div class="wrap">
		<div class="shead">
			<div>
				<span class="label"><?php esc_html_e( 'The therapies', 'oceanwp' ); ?></span>
				<h2 id="tx-h"><?php esc_html_e( 'Traditional therapies.', 'oceanwp' ); ?> <em><?php esc_html_e( 'Individualised care.', 'oceanwp' ); ?></em></h2>
			</div>
			<p><?php esc_html_e( 'Each therapy is drawn here as its key ingredient. Filter by what you need, then open a therapy to see how it works.', 'oceanwp' ); ?></p>
		</div>

		<!-- Filter Chips -->
		<div class="filters" role="group" aria-label="<?php esc_attr_e( 'Filter therapies by category and need', 'oceanwp' ); ?>">
			<button type="button" class="chip active" data-f="all" aria-pressed="true">
				<span><?php esc_html_e( 'All therapies', 'oceanwp' ); ?></span>
				<small><?php echo count( $treatments ); ?></small>
			</button>
			<?php
			$categories = function_exists( 'kottakkal_get_therapy_categories' ) ? kottakkal_get_therapy_categories() : array();
			foreach ( $categories as $cat_id => $cat ) :
				$count = 0;
				foreach ( $treatments as $t ) {
					if ( ! empty( $t['paths'] ) && in_array( $cat_id, $t['paths'], true ) ) {
						$count++;
					}
				}
				if ( $count > 0 ) :
			?>
				<button type="button" class="chip" data-f="<?php echo esc_attr( $cat_id ); ?>" aria-pressed="false">
					<span><?php echo esc_html( $cat['short'] ); ?></span>
					<small><?php echo esc_html( $count ); ?></small>
				</button>
			<?php endif; endforeach; ?>
			<?php foreach ( $pathways as $p ) :
				$count = 0;
				foreach ( $treatments as $t ) {
					if ( ! empty( $t['paths'] ) && in_array( $p['id'], $t['paths'], true ) ) {
						$count++;
					}
				}
				if ( $count > 0 ) :
			?>
				<button type="button" class="chip" data-f="<?php echo esc_attr( $p['id'] ); ?>" aria-pressed="false">
					<span><?php echo esc_html( $p['short'] ); ?></span>
					<small><?php echo esc_html( $count ); ?></small>
				</button>
			<?php endif; endforeach; ?>
		</div>

		<!-- Explorer Grid -->
		<div class="xgrid" id="xgrid">
			<?php foreach ( $treatments as $t ) :
				$t_link = ! empty( $t['link'] ) ? $t['link'] : home_url( '/treatments/' . $t['slug'] . '/' );
				$t_img  = ! empty( $t['img_url'] ) ? $t['img_url'] : '';
				$paths_attr = implode( ' ', $t['paths'] );
			?>
				<a class="xcard" href="<?php echo esc_url( $t_link ); ?>" data-cats="<?php echo esc_attr( $paths_attr ); ?>">
					<?php echo kottakkal_render_plate( 't-' . $t['id'], $t['ill'], $t['tone'], '', '4/5', '', $t_img ); ?>
					<div class="ov">
						<span class="ing"><?php echo esc_html( $t['ing'] ); ?></span>
						<h3><?php echo esc_html( $t['name'] ); ?></h3>
						<span class="alt"><?php echo esc_html( $t['alt'] ); ?></span>
						<p><span><?php echo esc_html( $t['short'] ); ?></span></p>
					</div>
				</a>
			<?php endforeach; ?>
		</div>

		<p class="xcount" id="xcount" aria-live="polite">
			<?php printf( esc_html__( 'Showing all %d therapies.', 'oceanwp' ), count( $treatments ) ); ?>
		</p>

		<div style="margin-top:36px">
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>">
				<?php esc_html_e( 'View all treatments', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
		</div>
	</div>
</section>

<!-- Scrollytelling Ritual Steps Section -->
<section class="section dark" aria-labelledby="ri-h">
	<div class="wrap ritual-grid">
		<div class="ritual-vis" id="rvis">
			<span class="ritual-prog"><i id="rprog"></i></span>
			<?php echo kottakkal_render_plate( 'ritual-1', 'leafy', 'forest', 'The consultation', null ); ?>
			<?php echo kottakkal_render_plate( 'ritual-2', 'powder', 'clay', 'Your plan', null ); ?>
			<?php echo kottakkal_render_plate( 'ritual-3', 'stream', 'saffron', 'The treatment', null ); ?>
		</div>

		<div>
			<span class="label"><?php esc_html_e( 'Your visit', 'oceanwp' ); ?></span>
			<h2 id="ri-h" style="font-size:var(--fs-1); margin-top:22px">
				<?php esc_html_e( 'How care', 'oceanwp' ); ?> <em><?php esc_html_e( 'unfolds', 'oceanwp' ); ?></em>
			</h2>

			<div class="rstep on" data-rs="0">
				<?php echo kottakkal_render_plate( 'ritual-1', 'leafy', 'forest', '', '4/3' ); ?>
				<span class="num"><?php esc_html_e( 'i. Consultation', 'oceanwp' ); ?></span>
				<h3><?php esc_html_e( 'A doctor listens first', 'oceanwp' ); ?></h3>
				<p class="muted"><?php esc_html_e( 'A DHA-certified Ayurvedic doctor reviews your health, history and concerns before any therapy is recommended.', 'oceanwp' ); ?></p>
			</div>

			<div class="rstep" data-rs="1">
				<?php echo kottakkal_render_plate( 'ritual-2', 'powder', 'clay', '', '4/3' ); ?>
				<span class="num"><?php esc_html_e( 'ii. Your plan', 'oceanwp' ); ?></span>
				<h3><?php esc_html_e( 'Made for one person', 'oceanwp' ); ?></h3>
				<p class="muted"><?php esc_html_e( 'Therapies, herbal medicines and guidance on diet and routine, chosen for your constitution and goals.', 'oceanwp' ); ?></p>
			</div>

			<div class="rstep" data-rs="2">
				<?php echo kottakkal_render_plate( 'ritual-3', 'stream', 'saffron', '', '4/3' ); ?>
				<span class="num"><?php esc_html_e( 'iii. Treatment', 'oceanwp' ); ?></span>
				<h3><?php esc_html_e( 'Unhurried, attentive care', 'oceanwp' ); ?></h3>
				<p class="muted"><?php esc_html_e( 'Sessions with trained therapists in a calm setting, reviewed by your doctor and adjusted as you progress.', 'oceanwp' ); ?></p>
				<div style="margin-top:12px">
					<a class="btn btn-ivory mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
						<?php esc_html_e( 'Begin with a consultation', 'oceanwp' ); ?>
						<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Care Pathways Accordion Section -->
<section class="section" aria-labelledby="pa-h">
	<div class="wrap">
		<div class="shead">
			<div>
				<span class="label"><?php esc_html_e( 'Care pathways', 'oceanwp' ); ?></span>
				<h2 id="pa-h"><?php esc_html_e( 'Start from what', 'oceanwp' ); ?> <em><?php esc_html_e( 'you need', 'oceanwp' ); ?></em></h2>
			</div>
			<p><?php esc_html_e( 'Care pathways bring together the therapies, doctors and approach for a particular concern.', 'oceanwp' ); ?></p>
		</div>

		<div class="acc" id="acc">
			<?php foreach ( $pathways as $idx => $p ) :
				$p_link = ! empty( $p['link'] ) ? $p['link'] : home_url( '/specialties/' . $p['slug'] . '/' );
				$p_img  = ! empty( $p['img_url'] ) ? $p['img_url'] : '';
				$is_on  = $idx === 0 ? ' on' : '';
			?>
				<a class="pane<?php echo esc_attr( $is_on ); ?>" href="<?php echo esc_url( $p_link ); ?>" data-pane>
					<?php echo kottakkal_render_plate( 'p-' . $p['id'], $p['ill'], $p['tone'], '', null, '', $p_img ); ?>
					<span class="shade"></span>
					<span class="vt" aria-hidden="true"><?php echo esc_html( $p['name'] ); ?></span>
					<span class="body">
						<span class="need"><?php echo esc_html( $p['need'] ); ?></span>
						<h3><?php echo esc_html( $p['name'] ); ?></h3>
						<p><?php echo esc_html( $p['intro'] ); ?></p>
						<span class="link">
							<?php esc_html_e( 'Explore pathway', 'oceanwp' ); ?>
							<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
						</span>
					</span>
				</a>
			<?php endforeach; ?>
		</div>

		<p class="fine">
			<?php esc_html_e( 'Ayurvedic care complements medical treatment and does not replace it. Outcomes vary from person to person; your doctor will discuss what is realistic for you.', 'oceanwp' ); ?>
		</p>
	</div>
</section>

<!-- Doctors Section -->
<section class="section docs-section" aria-labelledby="dr-h">
	<!-- Ambient Wave Lines -->
	<svg class="docs-ambient-waves" viewBox="0 0 1400 600" fill="none" preserveAspectRatio="none" aria-hidden="true">
		<path d="M -100 120 C 300 -50 700 250 1100 80 C 1300 -10 1450 60 1550 100" stroke="rgba(74, 222, 128, 0.22)" stroke-width="1.2"/>
		<path d="M -50 200 C 350 40 650 300 1050 140 C 1250 50 1400 120 1500 160" stroke="rgba(74, 222, 128, 0.12)" stroke-width="1"/>
		<path d="M -100 350 C 250 220 750 480 1200 300 C 1350 240 1450 280 1550 320" stroke="rgba(74, 222, 128, 0.08)" stroke-width="1"/>
	</svg>

	<!-- Corner Foliage SVGs -->
	<svg class="docs-corner-leaf left" viewBox="0 0 180 180" fill="none" aria-hidden="true">
		<g opacity="0.35" filter="blur(0.5px)">
			<path d="M -20 180 C 10 120 50 80 160 30" stroke="#34D399" stroke-width="2.5" stroke-linecap="round"/>
			<path d="M 15 140 C -10 115 -12 85 5 65 C 22 75 30 105 15 140 Z" fill="#10B981"/>
			<path d="M 45 105 C 25 80 28 50 48 35 C 65 48 65 78 45 105 Z" fill="#34D399"/>
			<path d="M 85 70 C 70 45 80 25 102 18 C 115 32 108 55 85 70 Z" fill="#6EE7B7"/>
			<path d="M 35 150 C 55 135 75 140 78 158 C 65 165 45 160 35 150 Z" fill="#059669"/>
			<path d="M 68 115 C 88 100 108 105 110 120 C 95 128 78 124 68 115 Z" fill="#10B981"/>
		</g>
	</svg>
	<svg class="docs-corner-leaf right" viewBox="0 0 180 180" fill="none" aria-hidden="true">
		<g opacity="0.35" filter="blur(0.5px)">
			<path d="M 200 180 C 170 120 130 80 20 30" stroke="#34D399" stroke-width="2.5" stroke-linecap="round"/>
			<path d="M 165 140 C 190 115 192 85 175 65 C 158 75 150 105 165 140 Z" fill="#10B981"/>
			<path d="M 135 105 C 155 80 152 50 132 35 C 115 48 115 78 135 105 Z" fill="#34D399"/>
			<path d="M 95 70 C 110 45 100 25 78 18 C 65 32 72 55 95 70 Z" fill="#6EE7B7"/>
			<path d="M 145 150 C 125 135 105 140 102 158 C 115 165 135 160 145 150 Z" fill="#059669"/>
			<path d="M 112 115 C 92 100 72 105 70 120 C 85 128 102 124 112 115 Z" fill="#10B981"/>
		</g>
	</svg>

	<div class="wrap">
		<!-- Section Header (Pill, High-Impact Title, Subtitle) -->
		<div class="docs-header doc-reveal" data-reveal="up">
			<div class="docs-pill">
				<svg class="pill-ic" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
					<path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm6 2a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM2.5 16.5c0-2.5 3-3.8 4.5-3.8s4.5 1.3 4.5 3.8v.5h-9v-.5Zm10 0v-.5c0-.8-.4-1.6-1.1-2.2 1.3.1 3.6.7 3.6 2.2v.5h-2.5Z"/>
				</svg>
				<span><?php esc_html_e( 'Our Practitioners', 'oceanwp' ); ?></span>
			</div>
			<h2 class="docs-title" id="dr-h">
				<?php esc_html_e( 'Meet Our', 'oceanwp' ); ?> <span class="highlight-green"><?php esc_html_e( 'Expert', 'oceanwp' ); ?></span> <?php esc_html_e( 'Practitioners', 'oceanwp' ); ?>
			</h2>
			<p class="docs-subtitle">
				<?php esc_html_e( 'Experienced professionals dedicated to your health and well-being', 'oceanwp' ); ?>
			</p>
		</div>

		<?php
		// Ordered explicitly: 1st Naseeba, 2nd Ajitha, 3rd Minupriya
		$home_practitioners = array(
			array(
				'slug'        => 'naseeba',
				'name'        => 'Dr. Naseeba Abdul Rafeeque',
				'badge_type'  => 'director',
				'badge_text'  => 'Medical Director',
				'extra_badge' => '',
				'subtitle'    => 'DHA- and MOH-certified Ayurvedic practitioner',
				'has_cross'   => true,
				'img_file'    => 'doc-naseeba-hd.png',
				'link'        => home_url( '/doctors/naseeba/' ),
				'book_link'   => home_url( '/book/?doctor=naseeba' ),
				'book_label'  => 'Book with Naseeba',
				'creds'       => array(
					array(
						'icon' => 'hospital',
						'text' => 'KMCT Ayurveda Medical College, Calicut',
					),
					array(
						'icon' => 'globe',
						'text' => "10+ years' clinical experience in India and the UAE",
					),
				),
			),
			array(
				'slug'        => 'ajitha',
				'name'        => 'Dr. Ajitha Babu',
				'badge_type'  => 'practitioner',
				'badge_text'  => 'Ayurveda Practitioner',
				'extra_badge' => '',
				'subtitle'    => 'Ayurvedic Practitioner',
				'has_cross'   => false,
				'img_file'    => 'doc-ajitha-hd.png',
				'link'        => home_url( '/doctors/ajitha/' ),
				'book_link'   => home_url( '/book/?doctor=ajitha' ),
				'book_label'  => 'Book with Ajitha',
				'creds'       => array(
					array(
						'icon' => 'cap',
						'text' => 'SN Ayurveda Medical College, Kollam (KUHS)',
					),
					array(
						'icon' => 'mortar',
						'text' => "6+ years' experience in India",
					),
					array(
						'icon' => 'award',
						'text' => 'Certified yoga trainer (Yoga Alliance International, CIY)',
					),
				),
			),
			array(
				'slug'        => 'minupriya',
				'name'        => 'Dr. Minupriya',
				'badge_type'  => 'practitioner',
				'badge_text'  => 'Ayurvedic Practitioner',
				'extra_badge' => '10+ Years Experience',
				'subtitle'    => 'Ayurvedic Practitioner',
				'has_cross'   => false,
				'img_file'    => 'doc-minupriya-hd.png',
				'link'        => home_url( '/doctors/minupriya/' ),
				'book_link'   => home_url( '/book/?doctor=minupriya' ),
				'book_label'  => 'Book with Minupriya',
				'creds'       => array(
					array(
						'icon' => 'clock',
						'text' => '10+ Years of Clinical Experience',
					),
					array(
						'icon' => 'cap',
						'text' => 'Rajiv Gandhi University of Health Sciences, Bangalore',
					),
					array(
						'icon' => 'stethoscope',
						'text' => "10+ years' clinical experience across India and the UAE",
					),
				),
			),
		);
		?>

		<!-- Three Practitioner Cards -->
		<div class="docs-grid">
			<?php foreach ( $home_practitioners as $doc ) :
				$doc_img_path = get_stylesheet_directory() . '/assets/img/' . $doc['img_file'];
				$doc_img_url  = file_exists( $doc_img_path )
					? get_stylesheet_directory_uri() . '/assets/img/' . $doc['img_file']
					: get_stylesheet_directory_uri() . '/assets/img/doc-' . $doc['slug'] . '.png';
			?>
				<article class="dcard doc-reveal" data-doctor="<?php echo esc_attr( $doc['slug'] ); ?>">
					<!-- Right Arch Portal Backdrop (Exact Reference Matched) -->
					<div class="dcard-arch-portal" aria-hidden="true">
						<?php if ( ! empty( $doc['has_cross'] ) ) : ?>
							<svg class="dcard-cross-svg" viewBox="0 0 48 48" fill="none" aria-hidden="true">
								<path d="M18 4h12a2 2 0 0 1 2 2v12h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H32v12a2 2 0 0 1-2 2H18a2 2 0 0 1-2-2V34H4a2 2 0 0 1-2-2V20a2 2 0 0 1 2-2h12V6a2 2 0 0 1 2-2z" stroke="rgba(167, 243, 208, 0.45)" stroke-width="2.5" fill="rgba(52, 211, 153, 0.1)"/>
							</svg>
						<?php endif; ?>
					</div>

					<!-- Doctor Cutout Portrait (Takes Full Arch Area, Fully Highlighted & Prominent) -->
					<a class="dcard-photo-wrap" href="<?php echo esc_url( $doc['link'] ); ?>" aria-label="<?php echo esc_attr( $doc['name'] ); ?>, full profile">
						<img class="dcard-photo-v2" src="<?php echo esc_url( $doc_img_url ); ?>" alt="<?php echo esc_attr( $doc['name'] ); ?>" loading="lazy" decoding="async">
					</a>

					<!-- Left Column: Details -->
					<div class="dcard-content">
						<div class="dcard-badges">
							<?php if ( $doc['badge_type'] === 'director' ) : ?>
								<span class="dcard-badge badge-director">
									<svg class="ic-star" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M8 1.5l1.9 4.2 4.6.4-3.5 3.1 1 4.5L8 11.3l-4 2.4 1-4.5-3.5-3.1 4.6-.4L8 1.5z"/></svg>
									<span><?php echo esc_html( $doc['badge_text'] ); ?></span>
								</span>
							<?php else : ?>
								<span class="dcard-badge badge-practitioner">
									<svg class="ic-leaf" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M14.5 1.5C9 1.5 5 5 4.5 9.5 4 13.5 1.5 14.5 1.5 14.5s4-.5 6-3.5c2.5-3.5 4.5-6 7-9.5z"/></svg>
									<span><?php echo esc_html( $doc['badge_text'] ); ?></span>
								</span>
							<?php endif; ?>

							<?php if ( ! empty( $doc['extra_badge'] ) ) : ?>
								<span class="dcard-badge badge-experience">
									<span><?php echo esc_html( $doc['extra_badge'] ); ?></span>
								</span>
							<?php endif; ?>
						</div>

						<h3 class="dcard-name">
							<a href="<?php echo esc_url( $doc['link'] ); ?>"><?php echo esc_html( $doc['name'] ); ?></a>
						</h3>

						<p class="dcard-sub"><?php echo esc_html( $doc['subtitle'] ); ?></p>

						<!-- Green Accent Line Requested by User -->
						<div class="dcard-accent-line" aria-hidden="true"></div>

						<ul class="dcard-creds-v2">
							<?php foreach ( $doc['creds'] as $c_item ) : ?>
								<li>
									<span class="cred-ic-v2" aria-hidden="true">
										<?php if ( $c_item['icon'] === 'mortar' ) : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m19 5-3.5 7.5"/><path d="M4.5 12.5C4 16.5 7.5 20 12 20s8-3.5 7.5-7.5H4.5z"/><path d="M7 20v1.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V20"/></svg>
										<?php elseif ( $c_item['icon'] === 'award' ) : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="5"/><path d="m8.5 13-1.5 8 5-3 5 3-1.5-8"/></svg>
										<?php elseif ( $c_item['icon'] === 'clock' ) : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><polyline points="12 6 12 12 16 14"/></svg>
										<?php elseif ( $c_item['icon'] === 'cap' ) : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
										<?php elseif ( $c_item['icon'] === 'stethoscope' ) : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4.8 2.5A2.3 2.3 0 0 1 7 4.8V9a5 5 0 0 0 10 0V4.8a2.3 2.3 0 0 1 2.2-2.3M12 14v4a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-1"/><circle cx="18" cy="17" r="2"/></svg>
										<?php elseif ( $c_item['icon'] === 'hospital' ) : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M12 7v4M10 9h4M9 22v-4h6v4"/></svg>
										<?php elseif ( $c_item['icon'] === 'globe' ) : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
										<?php else : ?>
											<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/></svg>
										<?php endif; ?>
									</span>
									<span class="cred-lbl"><?php echo esc_html( $c_item['text'] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Bottom Action: Mint Book Pill Button & View Full Profile Link -->
					<div class="dcard-footer">
						<a class="btn-book-v2" href="<?php echo esc_url( $doc['book_link'] ); ?>">
							<span class="btn-book-label">
								<svg class="ic-cal" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
									<rect x="3" y="4" width="14" height="13" rx="2"/>
									<line x1="3" y1="8" x2="17" y2="8"/>
									<line x1="7" y1="2" x2="7" y2="5"/>
									<line x1="13" y1="2" x2="13" y2="5"/>
								</svg>
								<span><?php echo esc_html( $doc['book_label'] ); ?></span>
							</span>
							<span class="btn-book-circle" aria-hidden="true">
								<svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M3 8h9M8 4l4 4-4 4"/></svg>
							</span>
						</a>

						<a class="link-profile-v2" href="<?php echo esc_url( $doc['link'] ); ?>">
							<span><?php esc_html_e( 'View Full Profile', 'oceanwp' ); ?></span>
							<span class="arr" aria-hidden="true">→</span>
						</a>
					</div>

					<!-- Corner Botanical Leaf Decoration -->
					<svg class="dcard-corner-leaves" viewBox="0 0 80 80" fill="none" aria-hidden="true">
						<path d="M 5 75 C 12 45 32 30 68 12" stroke="rgba(74, 222, 128, 0.45)" stroke-width="1.6" stroke-linecap="round"/>
						<path d="M 18 56 C 8 48 6 36 12 28 C 20 33 24 45 18 56 Z" fill="rgba(74, 222, 128, 0.3)"/>
						<path d="M 28 42 C 20 32 20 22 28 15 C 35 20 36 31 28 42 Z" fill="rgba(74, 222, 128, 0.35)"/>
						<path d="M 42 28 C 36 18 40 10 48 7 C 54 13 51 23 42 28 Z" fill="rgba(74, 222, 128, 0.4)"/>
						<path d="M 24 60 C 32 54 40 56 42 63 C 36 66 28 64 24 60 Z" fill="rgba(74, 222, 128, 0.22)"/>
						<path d="M 36 46 C 44 40 52 42 54 48 C 47 51 40 50 36 46 Z" fill="rgba(74, 222, 128, 0.25)"/>
					</svg>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- Centered Bottom Button: Meet Our Practitioners -->
		<div class="docs-bottom-action doc-reveal" data-reveal="up">
			<div class="docs-action-line" aria-hidden="true"></div>
			<a class="btn-meet-practitioners" href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>">
				<span><?php esc_html_e( 'Meet Our Practitioners', 'oceanwp' ); ?></span>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
					<path d="M2 8h11M9 4l4 4-4 4"/>
				</svg>
			</a>
			<div class="docs-action-line" aria-hidden="true"></div>
		</div>
	</div>
</section>

<!-- Quote Band (Founder / CEO Message) -->
<section class="qband dark" aria-label="<?php esc_attr_e( 'Our founding idea', 'oceanwp' ); ?>">
	<svg class="lv lv1" data-speed="1.4" viewBox="0 0 400 500" fill="none" stroke="currentColor" stroke-width="0.8" aria-hidden="true">
		<g transform="translate(200 500) rotate(14)"><path d="M0 0C125 -103.4 107.5 -366.6 0 -470C-107.5 -366.6 -125 -103.4 0 0Z" fill="currentColor" fill-opacity="0.05"/><path d="M0 6L0 -455.9" stroke-opacity="0.8"/></g>
	</svg>
	<svg class="lv lv2" data-speed="0.5" viewBox="0 0 400 500" fill="none" stroke="currentColor" stroke-width="0.8" aria-hidden="true">
		<g transform="translate(200 500) rotate(-20)"><path d="M0 0C125 -103.4 107.5 -366.6 0 -470C-107.5 -366.6 -125 -103.4 0 0Z" fill="currentColor" fill-opacity="0.04"/><path d="M0 6L0 -455.9" stroke-opacity="0.8"/></g>
	</svg>
	<svg class="lv lv3" data-speed="2" viewBox="0 0 400 500" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true">
		<g transform="translate(200 500) rotate(0)"><path d="M0 0C125 -103.4 107.5 -366.6 0 -470C-107.5 -366.6 -125 -103.4 0 0Z" fill="currentColor" fill-opacity="0.1"/><path d="M0 6L0 -455.9" stroke-opacity="0.8"/></g>
	</svg>
	<div class="wrap">
		<blockquote>
			<span class="label bare"><?php esc_html_e( 'From our CEO', 'oceanwp' ); ?></span>
			<q data-split><?php esc_html_e( 'Igniting life with nature', 'oceanwp' ); ?></q>
			<p><?php esc_html_e( 'Somarajan AR founded the centre on his family’s Ayurvedic lineage, with a commitment to authentic, classical treatment practised with honesty and care.', 'oceanwp' ); ?></p>
			<cite><?php esc_html_e( 'Somarajan AR · Chief Executive Officer', 'oceanwp' ); ?></cite>
		</blockquote>
	</div>
</section>

<!-- Testimonials Section -->
<section class="section home-testi-sec" aria-label="<?php esc_attr_e( 'Patient stories', 'oceanwp' ); ?>" style="border-top:1px solid var(--line); position:relative; overflow:hidden;">
	<div class="wrap">
		<div class="home-testi-head" style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:2.5rem;">
			<div>
				<div style="display:inline-flex; align-items:center; gap:8px; padding:5px 14px; border-radius:999px; background:rgba(212,175,55,0.1); border:1px solid rgba(212,175,55,0.25); color:var(--gold-ink); font-size:0.8rem; font-weight:600; margin-bottom:12px;">
					<span style="color:#ffb703; letter-spacing:2px;">★★★★★</span>
					<span><?php esc_html_e( '4.9 / 5 · Verified Google Reviews', 'oceanwp' ); ?></span>
				</div>
				<span class="label" style="display:block;"><?php esc_html_e( 'Patient stories', 'oceanwp' ); ?></span>
				<h2 style="font-size:var(--fs-2); margin-top:8px;">
					<?php esc_html_e( 'In our patients’', 'oceanwp' ); ?> <em><?php esc_html_e( 'own words', 'oceanwp' ); ?></em>
				</h2>
			</div>
			<div>
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>">
					<?php esc_html_e( 'Read all patient testimonials', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
			</div>
		</div>

		<!-- 3 Curated Authentic Testimonials -->
		<?php
		$home_testimonials = array_slice( kottakkal_get_testimonials(), 0, 3 );
		?>
		<div class="home-testi-grid">
			<?php foreach ( $home_testimonials as $t ) : ?>
				<article class="home-testi-card">
					<div>
						<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
							<span class="htc-stars">★★★★★</span>
							<span style="font-size:0.75rem; color:rgba(244,238,225,0.6);"><?php echo esc_html( $t['source'] ); ?></span>
						</div>
						<p class="htc-quote">
							“<?php echo esc_html( wp_trim_words( $t['quote'], 38, '…' ) ); ?>”
						</p>
					</div>
					<div>
						<span style="display:inline-block; padding:3px 10px; border-radius:999px; background:rgba(46,125,96,0.2); border:1px solid rgba(46,125,96,0.35); color:#a3e6cb; font-size:0.72rem; font-weight:500; margin-bottom:1rem;">
							<?php echo esc_html( $t['context'] ); ?>
						</span>
						<div class="htc-foot">
							<div class="htc-author">
								<span style="width:38px; height:38px; border-radius:50%; background:linear-gradient(135deg, rgba(212,175,55,0.25) 0%, rgba(14,46,33,0.8) 100%); border:1px solid rgba(212,175,55,0.35); display:inline-flex; align-items:center; justify-content:center; font-family:var(--display); font-size:0.85rem; font-weight:600; color:var(--gold-ink); flex-shrink:0;">
									<?php echo esc_html( $t['initials'] ); ?>
								</span>
								<div style="min-width:0;">
									<h4 style="font-family:var(--display); font-size:0.96rem; font-weight:600; color:var(--cream); margin:0; line-height:1.2; word-break:break-word;"><?php echo esc_html( $t['name'] ); ?></h4>
									<span style="font-size:0.72rem; color:#55e6a5; display:block;"><?php esc_html_e( 'Verified Patient', 'oceanwp' ); ?></span>
								</div>
							</div>
							<a href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>" style="font-size:0.78rem; color:var(--gold-ink); text-decoration:none; display:inline-flex; align-items:center; gap:4px; font-weight:500; white-space:nowrap;">
								<?php esc_html_e( 'Read story', 'oceanwp' ); ?> →
							</a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Gallery Showcase Preview Section -->
<section class="section home-gal-sec" aria-label="<?php esc_attr_e( 'Clinic Gallery', 'oceanwp' ); ?>" style="border-top:1px solid var(--line); position:relative;">
	<div class="wrap">
		<div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:20px; margin-bottom:2.5rem;">
			<div>
				<span class="label"><?php esc_html_e( 'Visual Archive', 'oceanwp' ); ?></span>
				<h2 style="font-size:var(--fs-2); margin-top:8px;">
					<?php esc_html_e( 'Inside our centre,', 'oceanwp' ); ?> <em><?php esc_html_e( 'moments of healing & community', 'oceanwp' ); ?></em>
				</h2>
				<p class="muted" style="margin-top:12px; max-width:58ch;">
					<?php esc_html_e( 'Glimpses into classical Kerala therapies, herbal preparations, festive celebrations, and milestones from our centre in Al Qusais, Dubai.', 'oceanwp' ); ?>
				</p>
			</div>
			<div>
				<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">
					<?php esc_html_e( 'Explore full gallery (110+ photos)', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
			</div>
		</div>

		<!-- 4 Curated Authentic Gallery Photos -->
		<div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px;">
			<?php
			$all_gal_secs = function_exists( 'kottakkal_get_gallery' ) ? kottakkal_get_gallery() : array();
			$home_gal_previews = array();
			if ( ! empty( $all_gal_secs ) ) {
				foreach ( $all_gal_secs as $sec ) {
					if ( ! empty( $sec['images'][0] ) ) {
						$home_gal_previews[] = array(
							'src'     => $sec['images'][0]['src'],
							'caption' => $sec['title'],
						);
					}
					if ( count( $home_gal_previews ) >= 4 ) {
						break;
					}
				}
			}
			if ( empty( $home_gal_previews ) ) {
				$home_gal_previews = array(
					array(
						'src'     => $theme_uri . '/assets/img/gallery/healing-therapy-treatment-01.png',
						'caption' => 'Classical Herbal Therapy',
					),
					array(
						'src'     => $theme_uri . '/assets/img/gallery/healing-therapy-treatment-03.png',
						'caption' => 'Traditional Shirodhara Preparation',
					),
					array(
						'src'     => $theme_uri . '/assets/img/gallery/onam-celebration-01.png',
						'caption' => 'Floral Pookkalam & Onam Celebration',
					),
					array(
						'src'     => $theme_uri . '/assets/img/gallery/anniversary-01.png',
						'caption' => 'Clinic Anniversary & Care Team',
					),
				);
			}
			foreach ( $home_gal_previews as $p_img ) : ?>
				<a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>" style="display:block; border-radius:14px; overflow:hidden; position:relative; aspect-ratio:4/3; border:1px solid rgba(212,175,55,0.18); text-decoration:none;" class="home-gal-thumb">
					<img src="<?php echo esc_url( $p_img['src'] ); ?>" alt="<?php echo esc_attr( $p_img['caption'] ); ?>" loading="lazy" style="width:100%; height:100%; object-fit:cover; display:block;">
					<div style="position:absolute; inset:0; background:linear-gradient(180deg, rgba(5,16,12,0) 40%, rgba(5,16,12,0.85) 100%); display:flex; align-items:flex-end; padding:16px;">
						<span style="font-size:0.78rem; font-weight:500; color:var(--sand); background:rgba(5,16,12,0.7); padding:4px 10px; border-radius:999px; border:1px solid rgba(212,175,55,0.25);">
							<?php echo esc_html( $p_img['caption'] ); ?>
						</span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Appointment Booking Section (With Contact Form 7 / Native Form) -->
<section class="booking dark section" id="booking" aria-labelledby="bk-h">
	<svg class="bg-leaf" data-speed="0.6" viewBox="0 0 400 500" fill="none" stroke="currentColor" stroke-width="0.8" aria-hidden="true">
		<g transform="translate(200 500) rotate(-18)"><path d="M0 0C125 -103.4 107.5 -366.6 0 -470C-107.5 -366.6 -125 -103.4 0 0Z" fill="currentColor" fill-opacity="0.08"/><path d="M0 6L0 -455.9" stroke-opacity="0.8"/></g>
	</svg>
	<div class="wrap bk-grid">
		<div class="bk-copy">
			<span class="label"><?php esc_html_e( 'Appointments', 'oceanwp' ); ?></span>
			<h2 id="bk-h" data-split><?php esc_html_e( 'Your journey to wellbeing', 'oceanwp' ); ?> <em><?php esc_html_e( 'begins here.', 'oceanwp' ); ?></em></h2>
			<p class="lede">
				<?php esc_html_e( 'Connect with our team to discuss your needs and arrange a consultation. It takes about a minute.', 'oceanwp' ); ?>
			</p>

			<dl class="bk-facts">
				<div><dt><?php esc_html_e( 'Hours', 'oceanwp' ); ?></dt><dd><?php echo esc_html( $contact['hours'] ); ?></dd></div>
				<div><dt><?php esc_html_e( 'Telephone', 'oceanwp' ); ?></dt><dd><a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></dd></div>
				<div><dt><?php esc_html_e( 'Email', 'oceanwp' ); ?></dt><dd><a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></dd></div>
				<div><dt><?php esc_html_e( 'Visit', 'oceanwp' ); ?></dt><dd><?php echo esc_html( $contact['addr1'] . ', ' . $contact['addr2'] ); ?></dd></div>
			</dl>
		</div>

		<div class="panel" id="bkPanel">
			<?php kottakkal_render_contact_form(); ?>
		</div>
	</div>
</section>

<!-- Visit Us / Metro Route Section -->
<section class="section" aria-labelledby="ct-h">
	<div class="wrap">
		<div class="shead">
			<div>
				<span class="label"><?php esc_html_e( 'Visit us', 'oceanwp' ); ?></span>
				<h2 id="ct-h"><?php esc_html_e( 'In Al Qusais,', 'oceanwp' ); ?> <em><?php esc_html_e( 'beside the metro', 'oceanwp' ); ?></em></h2>
			</div>
			<p><?php printf( esc_html__( 'Consultations %s. Call, write or request an appointment online.', 'oceanwp' ), esc_html( $contact['hours'] ) ); ?></p>
		</div>

		<div class="ct-grid">
			<dl class="ct-list" data-stagger>
				<div class="ct-row">
					<dt><?php esc_html_e( 'Visit', 'oceanwp' ); ?></dt>
					<dd>
						<span class="big"><?php echo esc_html( $contact['addr1'] ); ?></span><br>
						<span class="muted"><?php echo esc_html( $contact['addr2'] ); ?></span>
					</dd>
					<span></span>
				</div>
				<div class="ct-row">
					<dt><?php esc_html_e( 'Call', 'oceanwp' ); ?></dt>
					<dd><a class="big" href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a></dd>
					<button class="copy" type="button" data-copy="<?php echo esc_attr( $contact['phone'] ); ?>"><?php esc_html_e( 'Copy', 'oceanwp' ); ?></button>
				</div>
				<div class="ct-row">
					<dt><?php esc_html_e( 'Write', 'oceanwp' ); ?></dt>
					<dd><a class="big" href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a></dd>
					<button class="copy" type="button" data-copy="<?php echo esc_attr( $contact['email'] ); ?>"><?php esc_html_e( 'Copy', 'oceanwp' ); ?></button>
				</div>
				<div class="ct-row">
					<dt><?php esc_html_e( 'Hours', 'oceanwp' ); ?></dt>
					<dd><?php printf( esc_html__( 'Consultations %s', 'oceanwp' ), esc_html( $contact['hours'] ) ); ?></dd>
					<span></span>
				</div>
			</dl>

			<!-- Interactive Metro Map Visual -->
			<div class="map" id="map">
				<svg class="streets" viewBox="0 0 600 460" preserveAspectRatio="xMidYMid slice" fill="none" stroke="currentColor" aria-hidden="true">
					<path d="M-20 330L640 250" stroke-width="16" stroke-opacity=".35"/>
					<path d="M-20 330L640 250" stroke-dasharray="10 10"/>
					<path d="M230 -20L330 480" stroke-width="7"/>
					<path d="M-20 140L640 100" stroke-width="4"/>
					<path d="M470 -20L520 480" stroke-width="4"/>
					<path d="M90 -20L130 480" stroke-width="3"/>
					<path d="M-20 420L640 380" stroke-width="3"/>
					<path d="M380 100L400 260" stroke-width="2"/>
					<rect x="128" y="300" width="40" height="18" rx="9" fill="currentColor" fill-opacity=".5"/>
					<g class="route">
						<path id="routePath" d="M150 300C200 290 260 280 300 240S340 190 348 175" stroke="currentColor" stroke-width="2.4" stroke-dasharray="6 8"/>
					</g>
				</svg>
				<span class="lab" style="left:calc(25% - 30px); top:calc(65% + 22px)"><?php esc_html_e( 'Al Nahda Metro', 'oceanwp' ); ?></span>
				<span class="pin" aria-hidden="true"></span>
				<span class="lab" style="left:calc(58% + 22px); top:calc(38% - 6px)"><?php esc_html_e( 'Mozna Building', 'oceanwp' ); ?></span>
				<div class="card">
					<b><?php esc_html_e( 'Beside Al Nahda Metro Station', 'oceanwp' ); ?></b>
					<p><?php esc_html_e( 'Illustrative map. Use directions for the exact route.', 'oceanwp' ); ?></p>
					<div style="display:flex; flex-wrap:wrap; gap:18px">
						<a class="link" href="<?php echo esc_url( $contact['dir'] ); ?>" target="_blank" rel="noopener">
							<?php esc_html_e( 'Get directions', 'oceanwp' ); ?>
							<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
						</a>
						<a class="link" href="<?php echo esc_url( $contact['maps'] ); ?>" target="_blank" rel="noopener">
							<?php esc_html_e( 'Open in Maps', 'oceanwp' ); ?>
							<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
