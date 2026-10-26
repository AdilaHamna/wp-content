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
		<div class="hero-grid">
			<div>
				<span class="label fade-up" style="color:var(--gold-hi)">
					<?php esc_html_e( 'Ayurvedic centre · Al Qusais, Dubai', 'oceanwp' ); ?>
				</span>
				<h1 id="hero-h" style="margin-top:28px">
					<span class="ln"><span><?php esc_html_e( 'Ancient wisdom.', 'oceanwp' ); ?></span></span>
					<span class="ln"><span><em><?php esc_html_e( 'Personalised', 'oceanwp' ); ?></em></span></span>
					<span class="ln"><span><?php esc_html_e( 'wellness.', 'oceanwp' ); ?></span></span>
				</h1>
			</div>

			<div>
				<p class="sub fade-up d1">
					<?php esc_html_e( 'Discover a more considered approach to wellbeing through traditional Ayurvedic therapies and personalised care at Kottakkal GreenLife, Dubai.', 'oceanwp' ); ?>
				</p>
				<div class="ctas fade-up d2">
					<a class="btn btn-ivory mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
						<?php esc_html_e( 'Book your consultation', 'oceanwp' ); ?>
						<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
					</a>
					<a class="btn btn-glass mag" href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>">
						<?php esc_html_e( 'Explore treatments', 'oceanwp' ); ?>
					</a>
				</div>
				<div class="meta fade-up d3">
					<span><?php esc_html_e( 'DHA-certified Ayurvedic doctors', 'oceanwp' ); ?></span>
					<span><?php esc_html_e( 'Open daily, 9 am – 9 pm', 'oceanwp' ); ?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="cue" aria-hidden="true">
		<?php esc_html_e( 'Scroll', 'oceanwp' ); ?><i></i>
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
				<div>
					<?php echo kottakkal_render_plate( 'intro-a', 'drop', 'oil', 'Medicated herbal oil', '4/5' ); ?>
				</div>
				<div class="b">
					<?php echo kottakkal_render_plate( 'intro-b', 'rice', 'ivory', 'Njavara rice', '3/4' ); ?>
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
						<?php esc_html_e( 'Every course of care at Kottakkal GreenLife begins with a thorough review by one of our DHA-certified Ayurvedic doctors. From there we build a plan around you, drawing on classical Kerala therapies, herbal medicine and changes to diet and daily routine.', 'oceanwp' ); ?>
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
				<b><span data-count="11">11</span></b>
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
		<div class="filters" role="group" aria-label="<?php esc_attr_e( 'Filter therapies by need', 'oceanwp' ); ?>">
			<button type="button" class="chip active" data-f="all" aria-pressed="true">
				<span><?php esc_html_e( 'All therapies', 'oceanwp' ); ?></span>
				<small><?php echo count( $treatments ); ?></small>
			</button>
			<?php foreach ( $pathways as $p ) :
				$count = 0;
				foreach ( $treatments as $t ) {
					if ( in_array( $p['id'], $t['paths'] ) ) {
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
			<p><?php esc_html_e( 'Six pathways bring together the therapies, doctors and approach for a particular concern.', 'oceanwp' ); ?></p>
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
<section class="section" style="padding-top:0" aria-labelledby="dr-h">
	<div class="wrap">
		<div class="shead">
			<div>
				<span class="label"><?php esc_html_e( 'Practitioners', 'oceanwp' ); ?></span>
				<h2 id="dr-h"><?php esc_html_e( 'The doctors behind', 'oceanwp' ); ?> <em><?php esc_html_e( 'your care', 'oceanwp' ); ?></em></h2>
			</div>
			<p><?php esc_html_e( 'All treatments are carried out under the supervision of DHA-certified Ayurvedic doctors, working with highly trained therapists.', 'oceanwp' ); ?></p>
		</div>

		<div class="docs">
			<?php foreach ( $doctors as $d ) :
				$d_link = ! empty( $d['link'] ) ? $d['link'] : home_url( '/doctors/' . $d['slug'] . '/' );
				$d_img  = ! empty( $d['img_url'] ) ? $d['img_url'] : '';
				$mono_el = empty( $d_img ) ? '<span class="mono" aria-hidden="true">' . esc_html( $d['mono'] ) . '</span>' : '';
			?>
				<article class="dcard">
					<a class="frame" href="<?php echo esc_url( $d_link ); ?>" aria-label="<?php echo esc_attr( $d['name'] ); ?>, full profile">
						<?php echo kottakkal_render_plate( 'doc-' . $d['id'], 'doc', $d['tone'], '', null, $mono_el, $d_img ); ?>
						<span class="reveal" aria-hidden="true">
							<?php foreach ( $d['specs'] as $spec ) : ?>
								<span><?php echo esc_html( $spec ); ?></span>
							<?php endforeach; ?>
						</span>
					</a>

					<div>
						<span class="role"><?php echo esc_html( $d['role'] ); ?></span>
						<h3><?php echo esc_html( $d['name'] ); ?></h3>
						<ul>
							<?php foreach ( $d['creds'] as $cred ) : ?>
								<li><?php echo esc_html( $cred ); ?></li>
							<?php endforeach; ?>
						</ul>
						<div class="acts">
							<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
								<?php printf( esc_html__( 'Book with %s', 'oceanwp' ), esc_html( explode( ' ', $d['name'] )[1] ?? $d['name'] ) ); ?>
								<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
							</a>
							<a class="link" href="<?php echo esc_url( $d_link ); ?>">
								<?php esc_html_e( 'Full profile', 'oceanwp' ); ?>
								<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
							</a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div style="margin-top:44px">
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>">
				<?php esc_html_e( 'Meet our practitioners', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
		</div>
	</div>
</section>

<!-- Quote Band (Founder / CEO Message) -->
<section class="qband dark" aria-label="<?php esc_attr_e( 'Our founding idea', 'oceanwp' ); ?>">
	<svg class="lv lv1" viewBox="0 0 400 500" fill="none" stroke="currentColor" stroke-width="0.8" aria-hidden="true">
		<g transform="translate(200 500) rotate(14)"><path d="M0 0C125 -103.4 107.5 -366.6 0 -470C-107.5 -366.6 -125 -103.4 0 0Z" fill="currentColor" fill-opacity="0.05"/><path d="M0 6L0 -455.9" stroke-opacity="0.8"/></g>
	</svg>
	<svg class="lv lv2" viewBox="0 0 400 500" fill="none" stroke="currentColor" stroke-width="0.8" aria-hidden="true">
		<g transform="translate(200 500) rotate(-20)"><path d="M0 0C125 -103.4 107.5 -366.6 0 -470C-107.5 -366.6 -125 -103.4 0 0Z" fill="currentColor" fill-opacity="0.04"/><path d="M0 6L0 -455.9" stroke-opacity="0.8"/></g>
	</svg>
	<div class="wrap">
		<blockquote>
			<span class="label bare"><?php esc_html_e( 'From our CEO', 'oceanwp' ); ?></span>
			<q><?php esc_html_e( 'Igniting life with nature', 'oceanwp' ); ?></q>
			<p><?php esc_html_e( 'Somarajan AR founded the centre on his family’s Ayurvedic lineage, with a commitment to authentic, classical treatment practised with honesty and care.', 'oceanwp' ); ?></p>
			<cite><?php esc_html_e( 'Somarajan AR · Chief Executive Officer', 'oceanwp' ); ?></cite>
		</blockquote>
	</div>
</section>

<!-- Testimonials Section -->
<section class="section" aria-label="<?php esc_attr_e( 'Patient stories', 'oceanwp' ); ?>" style="border-top:1px solid var(--line)">
	<div class="wrap voices">
		<span class="qm" aria-hidden="true">“</span>
		<div>
			<span class="label"><?php esc_html_e( 'Patient stories', 'oceanwp' ); ?></span>
			<div style="margin-top:24px">
				<h2 style="font-size:var(--fs-2); max-width:18ch">
					<?php esc_html_e( 'In our patients’', 'oceanwp' ); ?> <em><?php esc_html_e( 'own words', 'oceanwp' ); ?></em>
				</h2>
				<p class="muted" style="margin-top:22px; max-width:58ch">
					<?php esc_html_e( 'We are gathering written stories from patients who have agreed to share their experience. They will appear here, with their permission, once each is approved for publication.', 'oceanwp' ); ?>
				</p>
				<span class="pending"><?php esc_html_e( 'Approved patient stories coming soon', 'oceanwp' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Appointment Booking Section (With Contact Form 7 / Native Form) -->
<section class="booking dark section" id="booking" aria-labelledby="bk-h">
	<div class="wrap bk-grid">
		<div class="bk-copy">
			<span class="label"><?php esc_html_e( 'Appointments', 'oceanwp' ); ?></span>
			<h2 id="bk-h"><?php esc_html_e( 'Your journey to wellbeing', 'oceanwp' ); ?> <em><?php esc_html_e( 'begins here.', 'oceanwp' ); ?></em></h2>
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
			<p><?php esc_html_e( 'Consultations 9 am to 9 pm daily. Call, write or request an appointment online.', 'oceanwp' ); ?></p>
		</div>

		<div class="ct-grid">
			<dl class="ct-list">
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
					<dd><a class="big" href="mailto:<?php echo esc_attr( $contact['email'] ); ?>" style="font-size:clamp(1.1rem,.85rem + 1vw,1.7rem)"><?php echo esc_html( $contact['email'] ); ?></a></dd>
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
					<p><?php esc_html_e( 'Convenient location in Al Qusais 1, Dubai with easy metro and road access.', 'oceanwp' ); ?></p>
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
