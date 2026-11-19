<?php
/**
 * Template Name: Kottakkal - Testimonials
 * Description: Authentic patient reviews and stories from Kottakkal Green Life Ayurvedic Center.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$testimonials = kottakkal_get_testimonials();
$total_count  = count( $testimonials );
$theme_uri    = get_stylesheet_directory_uri();
?>

<!-- Testimonials Page Header matching standard page structure -->
<section class="phead">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php esc_html_e( 'Testimonials', 'oceanwp' ); ?></span>
		</nav>

		<span class="label"><?php esc_html_e( 'Patient Stories', 'oceanwp' ); ?></span>
		<h1><?php esc_html_e( 'Our patients’', 'oceanwp' ); ?> <em><?php esc_html_e( 'words of healing', 'oceanwp' ); ?></em></h1>
		<p class="lede">
			<?php esc_html_e( 'Every treatment journey at Kottakkal Green Life begins with listening. Read authentic, verified experiences from individuals who found relief, rejuvenation, and lasting wellness under our care in Dubai.', 'oceanwp' ); ?>
		</p>

		<div class="testi-hero-badge">
			<span class="testi-stars" aria-hidden="true">★★★★★</span>
			<span><?php esc_html_e( '4.9 Star Rating on Google Reviews · 118+ Community Reviews', 'oceanwp' ); ?></span>
		</div>

		<!-- Trust Metrics Bar -->
		<div class="testi-metrics">
			<div class="tm-item">
				<span class="tm-num">4.9<small>/5</small></span>
				<span class="tm-lbl"><?php esc_html_e( 'Google Review Score', 'oceanwp' ); ?></span>
			</div>
			<div class="tm-sep" aria-hidden="true"></div>
			<div class="tm-item">
				<span class="tm-num">100%</span>
				<span class="tm-lbl"><?php esc_html_e( 'Authentic Experiences', 'oceanwp' ); ?></span>
			</div>
			<div class="tm-sep" aria-hidden="true"></div>
			<div class="tm-item">
				<span class="tm-num">DHA</span>
				<span class="tm-lbl"><?php esc_html_e( 'Certified Supervision', 'oceanwp' ); ?></span>
			</div>
			<div class="tm-sep" aria-hidden="true"></div>
			<div class="tm-item">
				<span class="tm-num">5000+</span>
				<span class="tm-lbl"><?php esc_html_e( 'Years Heritage Care', 'oceanwp' ); ?></span>
			</div>
		</div>
	</div>
</section>

<!-- Main Testimonials Content -->
<section class="section testi-main-sec">
	<div class="wrap">

		<!-- Horizontal Scrollable Filter Tabs -->
		<div class="testi-filter-wrapper">
			<div class="testi-filters" role="tablist" aria-label="<?php esc_attr_e( 'Review Categories', 'oceanwp' ); ?>">
				<button type="button" class="testi-tab is-active" data-filter="all" role="tab" aria-selected="true">
					<?php esc_html_e( 'All Reviews', 'oceanwp' ); ?>
					<span class="tab-count"><?php echo esc_html( $total_count ); ?></span>
				</button>
				<button type="button" class="testi-tab" data-filter="pain" role="tab" aria-selected="false">
					<?php esc_html_e( 'Pain Relief', 'oceanwp' ); ?>
				</button>
				<button type="button" class="testi-tab" data-filter="massage" role="tab" aria-selected="false">
					<?php esc_html_e( 'Massage & Therapies', 'oceanwp' ); ?>
				</button>
				<button type="button" class="testi-tab" data-filter="consultation" role="tab" aria-selected="false">
					<?php esc_html_e( 'Doctor Consultation', 'oceanwp' ); ?>
				</button>
				<button type="button" class="testi-tab" data-filter="therapies" role="tab" aria-selected="false">
					<?php esc_html_e( 'Special Therapies', 'oceanwp' ); ?>
				</button>
			</div>
		</div>

		<!-- Reviews Grid -->
		<div class="testi-grid" id="testiGrid">
			<?php foreach ( $testimonials as $idx => $t ) :
				$cat = ! empty( $t['category'] ) ? $t['category'] : 'pain';
				$poster_src = ! empty( $t['poster_url'] ) ? $t['poster_url'] : ( ! empty( $t['poster'] ) ? $theme_uri . '/' . $t['poster'] : '' );
			?>
				<article class="testi-card" data-category="<?php echo esc_attr( $cat ); ?>" data-index="<?php echo esc_attr( $idx ); ?>">
					<div class="tc-top">
						<div class="tc-stars" aria-label="<?php echo esc_attr( $t['rating'] ); ?> out of 5 stars">
							<?php for ( $s = 0; $s < 5; $s++ ) : ?>
								<svg class="tc-star" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
								</svg>
							<?php endfor; ?>
						</div>
						<span class="tc-source">
							<svg class="g-icon" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true">
								<path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.8-2.4 3.65v3h3.86c2.26-2.09 3.685-5.17 3.685-9.09z"/>
								<path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.86-3c-1.08.72-2.45 1.16-4.07 1.16-3.13 0-5.78-2.11-6.73-4.96H1.29v3.09C3.26 21.3 7.31 24 12 24z"/>
								<path fill="#FBBC05" d="M5.27 14.29c-.25-.72-.38-1.49-.38-2.29s.13-1.57.38-2.29V6.62H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.38l3.98-3.09z"/>
								<path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.31 0 3.26 2.7 1.29 6.62l3.98 3.09c.95-2.85 3.6-4.96 6.73-4.96z"/>
							</svg>
							<?php echo esc_html( $t['source'] ); ?>
						</span>
					</div>

					<blockquote class="tc-quote">
						“<?php echo esc_html( $t['quote'] ); ?>”
					</blockquote>

					<!-- Meta tags for treatment context -->
					<div class="tc-tags">
						<?php if ( ! empty( $t['context'] ) ) : ?>
							<span class="tc-tag tc-tag-context"><?php echo esc_html( $t['context'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $t['duration'] ) ) : ?>
							<span class="tc-tag"><?php echo esc_html( $t['duration'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $t['doctor'] ) ) : ?>
							<span class="tc-tag tc-tag-doc">Dr: <?php echo esc_html( $t['doctor'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $t['therapist'] ) ) : ?>
							<span class="tc-tag tc-tag-ther">Therapist: <?php echo esc_html( $t['therapist'] ); ?></span>
						<?php endif; ?>
					</div>

					<footer class="tc-footer">
						<div class="tc-author">
							<div class="tc-avatar" aria-hidden="true">
								<?php echo esc_html( $t['initials'] ); ?>
							</div>
							<div class="tc-author-info">
								<h3 class="tc-name"><?php echo esc_html( $t['name'] ); ?></h3>
								<span class="tc-ver">
									<svg viewBox="0 0 16 16" fill="currentColor" width="12" height="12" aria-hidden="true"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
									<?php esc_html_e( 'Verified Patient', 'oceanwp' ); ?>
								</span>
							</div>
						</div>

						<?php if ( ! empty( $poster_src ) ) : ?>
							<button type="button" class="tc-poster-btn" data-poster="<?php echo esc_url( $poster_src ); ?>" data-name="<?php echo esc_attr( $t['name'] ); ?>" aria-label="<?php printf( esc_attr__( 'View official testimonial card for %s', 'oceanwp' ), esc_attr( $t['name'] ) ); ?>">
								<svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4" width="14" height="14" aria-hidden="true">
									<rect x="3" y="3" width="14" height="14" rx="2"/>
									<circle cx="8" cy="8" r="1.5"/>
									<path d="M17 13l-4-4-6 6"/>
								</svg>
								<span><?php esc_html_e( 'View Card', 'oceanwp' ); ?></span>
							</button>
						<?php endif; ?>
					</footer>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- Bottom Callout Band -->
		<div class="testi-cta-card">
			<div class="tc-cta-copy">
				<span class="label"><?php esc_html_e( 'Begin Your Journey', 'oceanwp' ); ?></span>
				<h2><?php esc_html_e( 'Experience the difference of', 'oceanwp' ); ?> <em><?php esc_html_e( 'authentic Ayurveda.', 'oceanwp' ); ?></em></h2>
				<p>
					<?php esc_html_e( 'Our DHA-certified Ayurvedic doctors and skilled therapists are here to guide you toward lasting relief and balance. Every session is personalized to your unique constitution.', 'oceanwp' ); ?>
				</p>
			</div>
			<div class="tc-cta-acts">
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
					<?php esc_html_e( 'Book an Appointment', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
				<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">
					<?php esc_html_e( 'Explore Our Gallery', 'oceanwp' ); ?>
				</a>
			</div>
		</div>

	</div>
</section>

<!-- Lightbox Modal for Testimonial Card Posters -->
<div class="testi-modal" id="testiModal" role="dialog" aria-modal="true" aria-hidden="true" aria-label="<?php esc_attr_e( 'Official Testimonial Certificate', 'oceanwp' ); ?>">
	<div class="testi-modal-backdrop" id="testiModalBackdrop"></div>
	<div class="testi-modal-dialog">
		<div class="testi-modal-head">
			<span class="testi-modal-title" id="testiModalTitle"><?php esc_html_e( 'Patient Review', 'oceanwp' ); ?></span>
			<button type="button" class="testi-modal-close" id="testiModalClose" aria-label="<?php esc_attr_e( 'Close', 'oceanwp' ); ?>">✕</button>
		</div>
		<div class="testi-modal-body">
			<img src="" alt="" id="testiModalImg" loading="lazy">
		</div>
		<div class="testi-modal-foot">
			<span><?php esc_html_e( 'Official Google Review Poster · Kottakkal Green Life Ayurvedic Center', 'oceanwp' ); ?></span>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
	// 1. Category Filtering
	const tabs = document.querySelectorAll('.testi-tab');
	const cards = document.querySelectorAll('.testi-card');

	tabs.forEach(tab => {
		tab.addEventListener('click', () => {
			tabs.forEach(t => {
				t.classList.remove('is-active');
				t.setAttribute('aria-selected', 'false');
			});
			tab.classList.add('is-active');
			tab.setAttribute('aria-selected', 'true');

			const filter = tab.getAttribute('data-filter');

			cards.forEach(card => {
				const cat = card.getAttribute('data-category');
				if (filter === 'all' || cat === filter || (filter === 'pain' && cat === 'pain') || (filter === 'massage' && (cat === 'massage' || cat === 'therapies')) || (filter === 'consultation' && cat === 'consultation')) {
					card.style.display = '';
					card.classList.add('fade-in');
				} else {
					card.style.display = 'none';
				}
			});
		});
	});

	// 2. Poster Modal
	const modal = document.getElementById('testiModal');
	const modalImg = document.getElementById('testiModalImg');
	const modalTitle = document.getElementById('testiModalTitle');
	const closeBtn = document.getElementById('testiModalClose');
	const backdrop = document.getElementById('testiModalBackdrop');
	const posterBtns = document.querySelectorAll('.tc-poster-btn');

	function openModal(src, name) {
		modalImg.src = src;
		modalImg.alt = name + ' - Testimonial Poster';
		modalTitle.textContent = name + ' · Google Review';
		modal.classList.add('is-open');
		modal.setAttribute('aria-hidden', 'false');
		document.body.style.overflow = 'hidden';
	}

	function closeModal() {
		modal.classList.remove('is-open');
		modal.setAttribute('aria-hidden', 'true');
		modalImg.src = '';
		document.body.style.overflow = '';
	}

	posterBtns.forEach(btn => {
		btn.addEventListener('click', () => {
			const src = btn.getAttribute('data-poster');
			const name = btn.getAttribute('data-name');
			if (src) openModal(src, name);
		});
	});

	if (closeBtn) closeBtn.addEventListener('click', closeModal);
	if (backdrop) backdrop.addEventListener('click', closeModal);

	document.addEventListener('keydown', (e) => {
		if (e.key === 'Escape' && modal.classList.contains('is-open')) {
			closeModal();
		}
	});
});
</script>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
