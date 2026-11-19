<?php
/**
 * Template Name: Kottakkal - Gallery
 * Description: Visual archive of authentic therapies, television broadcasts, clinic celebrations, and milestones.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$sections     = kottakkal_get_gallery();
$videos       = function_exists( 'kottakkal_get_gallery_videos' ) ? kottakkal_get_gallery_videos() : array();
$total_photos = 0;
foreach ( $sections as $s ) {
	$total_photos += count( $s['images'] );
}
?>

<!-- Gallery Page Header matching standard page structure -->
<section class="phead">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php esc_html_e( 'Gallery', 'oceanwp' ); ?></span>
		</nav>

		<span class="label"><?php esc_html_e( 'Visual Archive', 'oceanwp' ); ?></span>
		<h1><?php esc_html_e( 'Moments of care,', 'oceanwp' ); ?> <em><?php esc_html_e( 'celebration & healing', 'oceanwp' ); ?></em></h1>
		<p class="lede">
			<?php esc_html_e( 'A visual journey through authentic Ayurvedic therapies, television health series, classical healing preparations, festive milestones, and compassionate care at Kottakkal Green Life Ayurvedic Center in Al Qusais, Dubai.', 'oceanwp' ); ?>
		</p>

		<div class="gal-hero-badge">
			<svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4" width="16" height="16" aria-hidden="true">
				<rect x="2" y="3" width="16" height="14" rx="3"/>
				<circle cx="7.5" cy="8" r="2"/>
				<path d="M18 14l-5-5-8 8"/>
			</svg>
			<span><?php printf( esc_html__( '%d Authentic Photos & %d Media Broadcasts', 'oceanwp' ), $total_photos, count( $videos ) ); ?></span>
		</div>
	</div>
</section>

<!-- Main Gallery Section -->
<section class="section gal-main-sec">
	<div class="wrap">

		<!-- Sticky Filter Tabs -->
		<div class="gal-filter-wrapper">
			<div class="gal-filters" role="tablist" aria-label="<?php esc_attr_e( 'Gallery Collections', 'oceanwp' ); ?>" id="galFilterTabs">
				<button type="button" class="gal-tab is-active" data-filter="all" role="tab" aria-selected="true">
					<?php esc_html_e( 'All Collections', 'oceanwp' ); ?>
					<span class="tab-badge"><?php echo esc_html( $total_photos + count( $videos ) ); ?></span>
				</button>
				<button type="button" class="gal-tab" data-filter="videos" role="tab" aria-selected="false">
					<svg viewBox="0 0 20 20" fill="currentColor" width="14" height="14" style="color:#ff4d4d;" aria-hidden="true"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/></svg>
					<?php esc_html_e( 'Videos & TV', 'oceanwp' ); ?>
					<span class="tab-badge"><?php echo esc_html( count( $videos ) ); ?></span>
				</button>
				<?php foreach ( $sections as $sec ) : ?>
					<button type="button" class="gal-tab" data-filter="<?php echo esc_attr( $sec['slug'] ); ?>" role="tab" aria-selected="false">
						<?php echo esc_html( $sec['title'] ); ?>
						<span class="tab-badge"><?php echo esc_html( count( $sec['images'] ) ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- YouTube / Television Media Videos Section (Janam TV IN FOCUS Series) -->
		<div class="gal-video-section" id="galVideoSec">
			<div class="gvs-head">
				<div>
					<span class="label"><?php esc_html_e( 'Television & Health Series', 'oceanwp' ); ?></span>
					<h2><?php esc_html_e( 'Featured on Janam TV', 'oceanwp' ); ?> <em><?php esc_html_e( 'IN FOCUS', 'oceanwp' ); ?></em></h2>
					<p><?php esc_html_e( 'Ayurvedic health advice, wellness guidance, and doctor discussions broadcast on Janam TV’s renowned IN FOCUS health program.', 'oceanwp' ); ?></p>
				</div>
			</div>

			<div class="gal-video-grid">
				<?php foreach ( $videos as $v ) : ?>
					<article class="gal-video-card" data-video-id="<?php echo esc_attr( $v['id'] ); ?>" data-video-title="<?php echo esc_attr( $v['title'] . ' | ' . $v['program'] ); ?>" data-embed-url="<?php echo esc_url( $v['embed_url'] ); ?>">
						<div class="gvc-frame" role="button" tabindex="0" aria-label="<?php printf( esc_attr__( 'Play video: %s', 'oceanwp' ), esc_attr( $v['title'] ) ); ?>">
							<img src="<?php echo esc_url( $v['thumb'] ); ?>" alt="<?php echo esc_attr( $v['title'] ); ?>" class="gvc-thumb" loading="lazy" width="480" height="360">

							<!-- Top Channel & Title Overlay matching reference screenshot -->
							<div class="gvc-top-overlay">
								<div class="gvc-channel-logo">JTV</div>
								<div class="gvc-top-info">
									<span class="gvc-title-head"><?php echo esc_html( $v['title'] ); ?> | <?php echo esc_html( $v['program'] ); ?></span>
									<span class="gvc-channel-name"><?php echo esc_html( $v['channel'] ); ?></span>
								</div>
							</div>

							<!-- Center YouTube Play Icon -->
							<div class="gvc-play-btn" aria-hidden="true">
								<div class="gvc-yt-icon">
									<svg viewBox="0 0 24 24" fill="currentColor" width="30" height="30">
										<path d="M8 5v14l11-7z"/>
									</svg>
								</div>
							</div>

							<!-- Bottom Watch on YouTube link -->
							<div class="gvc-bottom-bar">
								<a href="<?php echo esc_url( $v['watch_url'] ); ?>" target="_blank" rel="noopener" class="gvc-yt-link" onclick="event.stopPropagation();">
									<svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
									<span>Watch on YouTube</span>
								</a>
							</div>
						</div>

						<div class="gvc-body">
							<h3 class="gvc-title"><?php echo esc_html( $v['title'] ); ?></h3>
							<p class="gvc-sub"><?php echo esc_html( $v['subtitle'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Gallery Photo Grid -->
		<div class="gal-grid" id="galGrid">
			<?php
			$global_idx = 0;
			foreach ( $sections as $sec ) :
				$sec_title = $sec['title'];
				$sec_slug  = $sec['slug'];
				foreach ( $sec['images'] as $img ) :
					$global_idx++;
					$img_src = esc_url( $img['src'] );
					$img_alt = ! empty( $img['alt'] ) ? esc_attr( $img['alt'] ) : esc_attr( $sec_title . ' - Photo ' . $global_idx );
			?>
					<figure class="gal-item" data-category="<?php echo esc_attr( $sec_slug ); ?>" data-section-name="<?php echo esc_attr( $sec_title ); ?>" data-index="<?php echo esc_attr( $global_idx - 1 ); ?>" data-src="<?php echo $img_src; ?>">
						<div class="gal-img-wrap">
							<img src="<?php echo $img_src; ?>" alt="<?php echo $img_alt; ?>" loading="lazy" width="600" height="400">
							<div class="gal-overlay">
								<span class="gal-zoom-ic" aria-hidden="true">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="22" height="22">
										<circle cx="11" cy="11" r="8"/>
										<path d="M21 21l-4.35-4.35M11 8v6M8 11h6"/>
									</svg>
								</span>
								<span class="gal-cat-pill"><?php echo esc_html( $sec_title ); ?></span>
							</div>
						</div>
					</figure>
			<?php
				endforeach;
			endforeach;
			?>
		</div>

		<!-- Bottom CTA -->
		<div class="gal-cta-card">
			<div class="gc-copy">
				<span class="label"><?php esc_html_e( 'Experience In Person', 'oceanwp' ); ?></span>
				<h2><?php esc_html_e( 'Step into our sanctuary of', 'oceanwp' ); ?> <em><?php esc_html_e( 'tranquil wellness.', 'oceanwp' ); ?></em></h2>
				<p>
					<?php esc_html_e( 'Located beside Al Nahda Metro Station in Al Qusais, our doors are open seven days a week for thorough doctor consultations and tailored therapies.', 'oceanwp' ); ?>
				</p>
			</div>
			<div class="gc-acts">
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
					<?php esc_html_e( 'Book an Appointment', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
				<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/testimonials/' ) ); ?>">
					<?php esc_html_e( 'Read Patient Testimonials', 'oceanwp' ); ?>
				</a>
			</div>
		</div>

	</div>
</section>

<!-- Fullscreen Interactive Lightbox for Photos -->
<div class="gal-lightbox" id="galLightbox" role="dialog" aria-modal="true" aria-hidden="true" aria-label="<?php esc_attr_e( 'Gallery Photo Viewer', 'oceanwp' ); ?>">
	<div class="glb-backdrop" id="glbBackdrop"></div>

	<!-- Top Bar -->
	<div class="glb-topbar">
		<div class="glb-info">
			<span class="glb-counter" id="glbCounter">1 / <?php echo esc_html( $total_photos ); ?></span>
			<span class="glb-title" id="glbTitle"><?php esc_html_e( 'Gallery Photo', 'oceanwp' ); ?></span>
		</div>
		<button type="button" class="glb-close" id="glbClose" aria-label="<?php esc_attr_e( 'Close Lightbox', 'oceanwp' ); ?>">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="24" height="24" aria-hidden="true">
				<path d="M18 6L6 18M6 6l12 12"/>
			</svg>
		</button>
	</div>

	<!-- Stage Image -->
	<div class="glb-stage" id="glbStage">
		<button type="button" class="glb-nav glb-prev" id="glbPrev" aria-label="<?php esc_attr_e( 'Previous Photo', 'oceanwp' ); ?>">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true">
				<path d="M15 18l-6-6 6-6"/>
			</svg>
		</button>

		<div class="glb-frame">
			<img src="" alt="" id="glbImage">
		</div>

		<button type="button" class="glb-nav glb-next" id="glbNext" aria-label="<?php esc_attr_e( 'Next Photo', 'oceanwp' ); ?>">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28" aria-hidden="true">
				<path d="M9 18l6-6-6-6"/>
			</svg>
		</button>
	</div>
</div>

<!-- Interactive Video Player Modal -->
<div class="gal-video-modal" id="galVideoModal" role="dialog" aria-modal="true" aria-hidden="true" aria-label="<?php esc_attr_e( 'YouTube Video Player', 'oceanwp' ); ?>">
	<div class="gvm-backdrop" id="gvmBackdrop"></div>
	<div class="gvm-dialog">
		<div class="gvm-head">
			<span class="gvm-title" id="gvmTitle"><?php esc_html_e( 'Video Player', 'oceanwp' ); ?></span>
			<button type="button" class="gvm-close" id="gvmClose" aria-label="<?php esc_attr_e( 'Close Video', 'oceanwp' ); ?>">✕</button>
		</div>
		<div class="gvm-body">
			<iframe id="gvmIframe" src="" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
		</div>
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
	// 1. Filtering Logic
	const tabs = document.querySelectorAll('.gal-tab');
	const items = Array.from(document.querySelectorAll('.gal-item'));
	const videoSection = document.getElementById('galVideoSec');
	const photoGrid = document.getElementById('galGrid');

	tabs.forEach(tab => {
		tab.addEventListener('click', () => {
			tabs.forEach(t => {
				t.classList.remove('is-active');
				t.setAttribute('aria-selected', 'false');
			});
			tab.classList.add('is-active');
			tab.setAttribute('aria-selected', 'true');

			const filter = tab.getAttribute('data-filter');

			if (filter === 'videos') {
				// Show only videos
				if (videoSection) videoSection.style.display = '';
				if (photoGrid) photoGrid.style.display = 'none';
				items.forEach(item => item.classList.add('is-hidden'));
			} else {
				if (photoGrid) photoGrid.style.display = 'grid';
				if (filter === 'all') {
					if (videoSection) videoSection.style.display = '';
				} else {
					if (videoSection) videoSection.style.display = 'none';
				}

				items.forEach(item => {
					const cat = item.getAttribute('data-category');
					if (filter === 'all' || cat === filter) {
						item.style.display = '';
						item.classList.remove('is-hidden');
					} else {
						item.style.display = 'none';
						item.classList.add('is-hidden');
					}
				});
			}
		});
	});

	// 2. Lightbox Logic for Photos
	const lb = document.getElementById('galLightbox');
	const lbImg = document.getElementById('glbImage');
	const lbCounter = document.getElementById('glbCounter');
	const lbTitle = document.getElementById('glbTitle');
	const lbClose = document.getElementById('glbClose');
	const lbBackdrop = document.getElementById('glbBackdrop');
	const lbPrev = document.getElementById('glbPrev');
	const lbNext = document.getElementById('glbNext');

	let activeVisibleItems = [];
	let currentIndex = 0;

	function getVisibleItems() {
		return items.filter(el => !el.classList.contains('is-hidden'));
	}

	function showImageAt(idx) {
		activeVisibleItems = getVisibleItems();
		if (!activeVisibleItems.length) return;

		if (idx < 0) idx = activeVisibleItems.length - 1;
		if (idx >= activeVisibleItems.length) idx = 0;

		currentIndex = idx;
		const curItem = activeVisibleItems[currentIndex];
		const src = curItem.getAttribute('data-src');
		const secName = curItem.getAttribute('data-section-name');

		lbImg.src = src;
		lbCounter.textContent = (currentIndex + 1) + ' / ' + activeVisibleItems.length;
		lbTitle.textContent = secName;
	}

	function openLightbox(item) {
		activeVisibleItems = getVisibleItems();
		const idx = activeVisibleItems.indexOf(item);
		showImageAt(idx >= 0 ? idx : 0);

		lb.classList.add('is-open');
		lb.setAttribute('aria-hidden', 'false');
		document.body.style.overflow = 'hidden';
	}

	function closeLightbox() {
		lb.classList.remove('is-open');
		lb.setAttribute('aria-hidden', 'true');
		lbImg.src = '';
		document.body.style.overflow = '';
	}

	items.forEach(item => {
		item.addEventListener('click', () => openLightbox(item));
	});

	if (lbClose) lbClose.addEventListener('click', closeLightbox);
	if (lbBackdrop) lbBackdrop.addEventListener('click', closeLightbox);
	if (lbPrev) lbPrev.addEventListener('click', (e) => { e.stopPropagation(); showImageAt(currentIndex - 1); });
	if (lbNext) lbNext.addEventListener('click', (e) => { e.stopPropagation(); showImageAt(currentIndex + 1); });

	// 3. Video Modal Logic
	const vModal = document.getElementById('galVideoModal');
	const vIframe = document.getElementById('gvmIframe');
	const vTitle = document.getElementById('gvmTitle');
	const vClose = document.getElementById('gvmClose');
	const vBackdrop = document.getElementById('gvmBackdrop');
	const videoCards = document.querySelectorAll('.gal-video-card');

	function openVideo(embedUrl, title) {
		vTitle.textContent = title;
		vIframe.src = embedUrl;
		vModal.classList.add('is-open');
		vModal.setAttribute('aria-hidden', 'false');
		document.body.style.overflow = 'hidden';
	}

	function closeVideo() {
		vModal.classList.remove('is-open');
		vModal.setAttribute('aria-hidden', 'true');
		vIframe.src = '';
		document.body.style.overflow = '';
	}

	videoCards.forEach(card => {
		const frame = card.querySelector('.gvc-frame');
		const embedUrl = card.getAttribute('data-embed-url');
		const title = card.getAttribute('data-video-title');

		if (frame) {
			frame.addEventListener('click', () => openVideo(embedUrl, title));
			frame.addEventListener('keydown', (e) => {
				if (e.key === 'Enter' || e.key === ' ') {
					e.preventDefault();
					openVideo(embedUrl, title);
				}
			});
		}
	});

	if (vClose) vClose.addEventListener('click', closeVideo);
	if (vBackdrop) vBackdrop.addEventListener('click', closeVideo);

	document.addEventListener('keydown', (e) => {
		if (lb && lb.classList.contains('is-open')) {
			if (e.key === 'Escape') closeLightbox();
			if (e.key === 'ArrowLeft') showImageAt(currentIndex - 1);
			if (e.key === 'ArrowRight') showImageAt(currentIndex + 1);
		}
		if (vModal && vModal.classList.contains('is-open')) {
			if (e.key === 'Escape') closeVideo();
		}
	});
});
</script>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
