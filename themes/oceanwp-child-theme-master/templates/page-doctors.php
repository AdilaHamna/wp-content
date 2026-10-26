<?php
/**
 * Template Name: Kottakkal - Our Doctors
 * Description: Directory of DHA-certified Ayurvedic doctors and practitioners.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$doctors = kottakkal_get_doctors();
?>

<!-- Header -->
<section class="phead" style="padding-bottom:0">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php esc_html_e( 'Our doctors', 'oceanwp' ); ?></span>
		</nav>
		<span class="label"><?php esc_html_e( 'Practitioners', 'oceanwp' ); ?></span>
		<h1><?php esc_html_e( 'Our', 'oceanwp' ); ?> <em><?php esc_html_e( 'doctors', 'oceanwp' ); ?></em></h1>
		<p class="lede">
			<?php esc_html_e( 'All treatments are performed under the supervision of DHA-certified Ayurvedic doctors, together with highly trained therapists.', 'oceanwp' ); ?>
		</p>
	</div>
</section>

<!-- Doctors Profiles List -->
<div class="wrap">
	<?php foreach ( $doctors as $d ) :
		$d_link = ! empty( $d['link'] ) ? $d['link'] : home_url( '/doctors/' . $d['slug'] . '/' );
		$d_img  = ! empty( $d['img_url'] ) ? $d['img_url'] : '';
		$mono_el = empty( $d_img ) ? '<span class="mono" aria-hidden="true">' . esc_html( $d['mono'] ) . '</span>' : '';
	?>
		<article class="docfull">
			<div class="frame">
				<?php echo kottakkal_render_plate( 'doc-' . $d['id'], 'doc', $d['tone'], '', null, $mono_el, $d_img ); ?>
			</div>

			<div>
				<span class="label"><?php echo esc_html( $d['role'] ); ?></span>
				<h2><?php echo esc_html( $d['name'] ); ?></h2>

				<ul class="creds">
					<?php foreach ( $d['creds'] as $c ) : ?>
						<li><?php echo esc_html( $c ); ?></li>
					<?php endforeach; ?>
				</ul>

				<div class="body">
					<?php if ( ! empty( $d['bio'] ) ) : ?>
						<p class="lede"><?php echo esc_html( $d['bio'][0] ); ?></p>
					<?php endif; ?>
				</div>

				<div class="specs">
					<?php foreach ( $d['specs'] as $s ) : ?>
						<span><?php echo esc_html( $s ); ?></span>
					<?php endforeach; ?>
				</div>

				<div class="ph-acts">
					<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/?doctor=' . $d['id'] ) ); ?>">
						<?php esc_html_e( 'Book a consultation', 'oceanwp' ); ?>
						<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
					</a>
					<a class="btn btn-line mag" href="<?php echo esc_url( $d_link ); ?>">
						<?php esc_html_e( 'Full profile', 'oceanwp' ); ?>
					</a>
				</div>
			</div>
		</article>
	<?php endforeach; ?>
</div>

<!-- Action Band -->
<section class="band">
	<div class="wrap">
		<h2><?php esc_html_e( 'Book a consultation with', 'oceanwp' ); ?> <em><?php esc_html_e( 'our doctors', 'oceanwp' ); ?></em></h2>
		<div style="display:flex; flex-wrap:wrap; gap:12px">
			<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
				<?php esc_html_e( 'Book an appointment', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">
				<?php esc_html_e( 'Contact clinic', 'oceanwp' ); ?>
			</a>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
