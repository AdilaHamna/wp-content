<?php
/**
 * Kottakkal Editorial Custom Header Template
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$theme_uri   = get_stylesheet_directory_uri();
$contact     = kottakkal_get_contact_info();
$treatments  = kottakkal_get_treatments();
$pathways    = kottakkal_get_pathways();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#173F32">
	<script>
		(function() {
			try {
				var t = localStorage.getItem('kottakkal_theme');
				if (t === 'dark' || (!t && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
					document.documentElement.setAttribute('data-theme', 'dark');
				}
			} catch(e) {}
		})();
	</script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300..600&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip" href="#main" id="skip"><?php esc_html_e( 'Skip to content', 'oceanwp' ); ?></a>
<div class="curtain" id="curtain" aria-hidden="true">
	<img src="<?php echo esc_url( $theme_uri . '/assets/img/brand/emblem-white.png' ); ?>" alt="" width="90" height="91">
</div>

<header class="hdr" id="hdr">
	<div class="wrap hdr-in">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>, home">
			<img class="emb logo-l" src="<?php echo esc_url( $theme_uri . '/assets/img/brand/emblem.png' ); ?>" alt="" width="240" height="240">
			<img class="emb logo-d" src="<?php echo esc_url( $theme_uri . '/assets/img/brand/emblem-white.png' ); ?>" alt="" width="240" height="240">
			<img class="wm logo-l" src="<?php echo esc_url( $theme_uri . '/assets/img/brand/wordmark.png' ); ?>" alt="Kottakkal Green Life Ayurvedic Center" width="502" height="206">
			<img class="wm logo-d" src="<?php echo esc_url( $theme_uri . '/assets/img/brand/wordmark-white.png' ); ?>" alt="Kottakkal Green Life Ayurvedic Center" width="502" height="206">
		</a>

		<nav class="nav" id="nav" aria-label="<?php esc_attr_e( 'Main', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-nav="home" class="<?php echo is_front_page() ? 'active' : ''; ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" data-nav="about"><?php esc_html_e( 'About', 'oceanwp' ); ?></a>
			<button type="button" id="megaBtn" aria-expanded="false" aria-controls="mega" data-nav="treatments">
				<?php esc_html_e( 'Treatments', 'oceanwp' ); ?>
				<svg class="chev" viewBox="0 0 10 10" fill="none" stroke="currentColor" aria-hidden="true"><path d="M1 3l4 4 4-4"/></svg>
			</button>
			<a href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>" data-nav="doctors"><?php esc_html_e( 'Our Doctors', 'oceanwp' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/wellness/' ) ); ?>" data-nav="wellness"><?php esc_html_e( 'Wellness', 'oceanwp' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" data-nav="contact"><?php esc_html_e( 'Contact', 'oceanwp' ); ?></a>
			<span class="nav-ind" id="navInd" aria-hidden="true"></span>
		</nav>

		<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>" data-book=""><?php esc_html_e( 'Book an Appointment', 'oceanwp' ); ?></a>

		<button class="menu-btn" type="button" id="menuBtn" aria-expanded="false" aria-controls="mmenu">
			<i></i>
			<span class="sr"><?php esc_html_e( 'Open menu', 'oceanwp' ); ?></span>
		</button>
	</div>

	<!-- Mega Menu Dropdown -->
	<div class="mega" id="mega">
		<div class="wrap mega-in">
			<div class="mega-col">
				<h4><?php esc_html_e( 'Therapies', 'oceanwp' ); ?></h4>
				<ul>
					<?php
					$first_col = array_slice( $treatments, 0, 6 );
					foreach ( $first_col as $idx => $t ) :
						$t_link = ! empty( $t['link'] ) ? $t['link'] : home_url( '/treatments/' . $t['slug'] . '/' );
						$t_img  = ! empty( $t['img_url'] ) ? $t['img_url'] : $theme_uri . '/' . ( ! empty( $t['img'] ) ? $t['img'] : 'assets/img/t-abhyangam.jpg' );
					?>
						<li style="transition-delay: <?php echo esc_attr( $idx * 40 ); ?>ms">
							<a href="<?php echo esc_url( $t_link ); ?>" data-mp="<?php echo esc_attr( $t['id'] ); ?>" data-title="<?php echo esc_attr( $t['name'] ); ?>" data-desc="<?php echo esc_attr( $t['short'] ); ?>" data-img="<?php echo esc_url( $t_img ); ?>">
								<?php echo esc_html( $t['name'] ); ?>
								<small><?php echo esc_html( $t['ing'] ); ?></small>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="mega-col">
				<h4>&nbsp;</h4>
				<ul>
					<?php
					$second_col = array_slice( $treatments, 6 );
					foreach ( $second_col as $idx => $t ) :
						$t_link = ! empty( $t['link'] ) ? $t['link'] : home_url( '/treatments/' . $t['slug'] . '/' );
						$t_img  = ! empty( $t['img_url'] ) ? $t['img_url'] : $theme_uri . '/' . ( ! empty( $t['img'] ) ? $t['img'] : 'assets/img/t-abhyangam.jpg' );
					?>
						<li style="transition-delay: <?php echo esc_attr( ( $idx + 6 ) * 40 ); ?>ms">
							<a href="<?php echo esc_url( $t_link ); ?>" data-mp="<?php echo esc_attr( $t['id'] ); ?>" data-title="<?php echo esc_attr( $t['name'] ); ?>" data-desc="<?php echo esc_attr( $t['short'] ); ?>" data-img="<?php echo esc_url( $t_img ); ?>">
								<?php echo esc_html( $t['name'] ); ?>
								<small><?php echo esc_html( $t['ing'] ); ?></small>
							</a>
						</li>
					<?php endforeach; ?>
					<li style="transition-delay: 480ms">
						<a href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>">
							<strong><?php esc_html_e( 'All treatments', 'oceanwp' ); ?></strong>
							<small>→</small>
						</a>
					</li>
					<li style="transition-delay: 520ms">
						<a href="<?php echo esc_url( home_url( '/specialties/' ) ); ?>">
							<strong><?php esc_html_e( 'Care pathways', 'oceanwp' ); ?></strong>
							<small>→</small>
						</a>
					</li>
				</ul>
			</div>

			<div class="mega-prev" id="megaPrev">
				<?php
				$preview_t = ! empty( $treatments[0] ) ? $treatments[0] : null;
				if ( $preview_t ) :
					echo kottakkal_render_plate( 't-' . $preview_t['id'], $preview_t['ill'], $preview_t['tone'], '', '4/5' );
				?>
					<p>
						<b style="font:400 1.3rem/1.2 var(--display); color:var(--heading); display:block; margin-top:12px;">
							<?php echo esc_html( $preview_t['name'] ); ?>
						</b>
						<?php echo esc_html( $preview_t['short'] ); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mmenu" id="mmenu" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Menu', 'oceanwp' ); ?>">
	<div class="top">
		<span class="brand">
			<img src="<?php echo esc_url( $theme_uri . '/assets/img/brand/emblem-white.png' ); ?>" alt="" style="height:46px">
			<img src="<?php echo esc_url( $theme_uri . '/assets/img/brand/wordmark-white.png' ); ?>" alt="Kottakkal Green Life Ayurvedic Center" style="height:50px">
		</span>
		<button class="x" type="button" id="menuX" aria-label="<?php esc_attr_e( 'Close menu', 'oceanwp' ); ?>">✕</button>
	</div>
	<nav aria-label="<?php esc_attr_e( 'Mobile', 'oceanwp' ); ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>"><?php esc_html_e( 'About us', 'oceanwp' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>"><?php esc_html_e( 'Treatments', 'oceanwp' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/specialties/' ) ); ?>"><?php esc_html_e( 'Care pathways', 'oceanwp' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>"><?php esc_html_e( 'Our doctors', 'oceanwp' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/wellness/' ) ); ?>"><?php esc_html_e( 'Wellness', 'oceanwp' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Contact', 'oceanwp' ); ?></a>
	</nav>
	<div class="meta">
		<a class="btn btn-ivory" href="<?php echo esc_url( home_url( '/book/' ) ); ?>"><?php esc_html_e( 'Book an Appointment', 'oceanwp' ); ?></a>
		<span><?php esc_html_e( 'Consultations 9 am to 9 pm, every day', 'oceanwp' ); ?></span>
		<a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>" style="color:inherit; font-weight:600;"><?php echo esc_html( $contact['phone'] ); ?></a>
	</div>
</div>

<main id="main" tabindex="-1">
