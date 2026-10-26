<?php
/**
 * Single Doctor Profile Template
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

global $post;
$current_slug = $post ? $post->post_name : get_query_var( 'doctor' );
$all_doctors  = kottakkal_get_doctors();

$doctor = null;
foreach ( $all_doctors as $d ) {
	if ( $d['slug'] === $current_slug || $d['id'] === $current_slug ) {
		$doctor = $d;
		break;
	}
}

if ( ! $doctor && ! empty( $all_doctors ) ) {
	$doctor = $all_doctors[0];
}

$d_img   = ! empty( $doctor['img_url'] ) ? $doctor['img_url'] : '';
$mono_el = empty( $d_img ) ? '<span class="mono" aria-hidden="true">' . esc_html( $doctor['mono'] ) . '</span>' : '';
?>

<!-- Header -->
<section class="phead" style="padding-bottom:0">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<a href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>"><?php esc_html_e( 'Our doctors', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php echo esc_html( $doctor['name'] ); ?></span>
		</nav>
	</div>
</section>

<!-- Full Doctor Profile -->
<div class="wrap">
	<article class="docfull">
		<div class="frame">
			<?php echo kottakkal_render_plate( 'doc-' . $doctor['id'], 'doc', $doctor['tone'], '', null, $mono_el, $d_img ); ?>
		</div>

		<div>
			<span class="label"><?php echo esc_html( $doctor['role'] ); ?></span>
			<h1><?php echo esc_html( $doctor['name'] ); ?></h1>

			<ul class="creds">
				<?php foreach ( $doctor['creds'] as $c ) : ?>
					<li><?php echo esc_html( $c ); ?></li>
				<?php endforeach; ?>
			</ul>

			<div class="body">
				<?php foreach ( $doctor['bio'] as $idx => $p ) : ?>
					<p<?php echo $idx === 0 ? ' class="lede"' : ''; ?>><?php echo esc_html( $p ); ?></p>
				<?php endforeach; ?>
			</div>

			<div class="specs">
				<?php foreach ( $doctor['specs'] as $s ) : ?>
					<span><?php echo esc_html( $s ); ?></span>
				<?php endforeach; ?>
			</div>

			<div class="ph-acts">
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/?doctor=' . $doctor['id'] ) ); ?>">
					<?php esc_html_e( 'Book a consultation', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
				<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>">
					<?php esc_html_e( 'All doctors', 'oceanwp' ); ?>
				</a>
			</div>
		</div>
	</article>
</div>

<!-- Action Band -->
<section class="band">
	<div class="wrap">
		<h2><?php printf( esc_html__( 'Book a consultation with %s', 'oceanwp' ), '<em>' . esc_html( $doctor['name'] ) . '</em>' ); ?></h2>
		<div style="display:flex; flex-wrap:wrap; gap:12px">
			<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/?doctor=' . $doctor['id'] ) ); ?>">
				<?php esc_html_e( 'Book an appointment', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>">
				<?php esc_html_e( 'Our doctors', 'oceanwp' ); ?>
			</a>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
