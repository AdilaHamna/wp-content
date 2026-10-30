<?php
/**
 * Single Care Pathway Template
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $wp_query;

$current_slug = get_query_var( 'pathway' ) ?: ( $post ? $post->post_name : '' );
if ( empty( $current_slug ) ) {
	$req_path = trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( preg_match( '#^specialties/([^/]+)$#', $req_path, $matches ) ) {
		$current_slug = sanitize_title( $matches[1] );
	}
}

$all_pathways = kottakkal_get_pathways();
$pathway = null;
foreach ( $all_pathways as $p ) {
	if ( $p['slug'] === $current_slug || $p['id'] === $current_slug ) {
		$pathway = $p;
		break;
	}
}

if ( ! $pathway && ! empty( $all_pathways ) ) {
	$pathway = $all_pathways[0];
}

// Setup post and query state BEFORE header is output
if ( function_exists( 'kottakkal_setup_virtual_pathway_post' ) && $pathway ) {
	kottakkal_setup_virtual_pathway_post( $pathway );
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$all_treatments = kottakkal_get_treatments();
$all_doctors    = kottakkal_get_doctors();

// Map therapies
$mapped_therapies = array();
if ( ! empty( $pathway['therapies'] ) ) {
	foreach ( $pathway['therapies'] as $tid ) {
		foreach ( $all_treatments as $t ) {
			if ( $t['id'] === $tid || $t['slug'] === $tid ) {
				$mapped_therapies[] = $t;
				break;
			}
		}
	}
}

// Map doctors
$mapped_doctors = array();
if ( ! empty( $pathway['docs'] ) ) {
	foreach ( $pathway['docs'] as $did ) {
		foreach ( $all_doctors as $d ) {
			if ( $d['id'] === $did || $d['slug'] === $did ) {
				$mapped_doctors[] = $d;
				break;
			}
		}
	}
}
?>

<!-- Header -->
<section class="phead">
	<div class="wrap ph2">
		<div>
			<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( home_url( '/specialties/' ) ); ?>"><?php esc_html_e( 'Care pathways', 'oceanwp' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php echo esc_html( $pathway['name'] ); ?></span>
			</nav>

			<span class="label"><?php echo esc_html( $pathway['need'] ); ?></span>
			<h1 style="font-size:var(--fs-1)"><?php echo esc_html( $pathway['name'] ); ?></h1>
			<p class="lede"><?php echo esc_html( $pathway['intro'] ); ?></p>

			<div class="ph-acts">
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/?service=' . $pathway['id'] ) ); ?>">
					<?php esc_html_e( 'Book a consultation', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
			</div>
		</div>

		<div>
			<?php echo kottakkal_render_plate( 'p-' . $pathway['id'], $pathway['ill'], $pathway['tone'], $pathway['need'], null, '', $pathway['img_url'] ?? '' ); ?>
		</div>
	</div>
</section>

<!-- Content & Table of Contents -->
<section class="section" style="padding-top:clamp(40px, 5vw, 72px)">
	<div class="wrap dgrid">
		<nav class="toc" aria-label="<?php esc_attr_e( 'On this page', 'oceanwp' ); ?>">
			<a href="#s1"><?php esc_html_e( 'Overview', 'oceanwp' ); ?></a>
			<a href="#s2"><?php esc_html_e( 'Our approach', 'oceanwp' ); ?></a>
			<a href="#s3"><?php esc_html_e( 'Therapies', 'oceanwp' ); ?></a>
			<a href="#s4"><?php esc_html_e( 'Practitioners', 'oceanwp' ); ?></a>
		</nav>

		<div>
			<div class="dsec" id="s1">
				<h2><?php esc_html_e( 'Overview', 'oceanwp' ); ?></h2>
				<p class="lede"><?php echo esc_html( $pathway['overview'] ); ?></p>
			</div>

			<div class="dsec" id="s2">
				<h2><?php esc_html_e( 'Our approach', 'oceanwp' ); ?></h2>
				<p><?php echo esc_html( $pathway['approach'] ); ?></p>
				<p class="callout">
					<?php esc_html_e( 'Ayurvedic care complements medical treatment and does not replace it. Outcomes vary between individuals.', 'oceanwp' ); ?>
				</p>
			</div>

			<div class="dsec" id="s3">
				<h2><?php esc_html_e( 'Therapies often used', 'oceanwp' ); ?></h2>
				<?php if ( ! empty( $mapped_therapies ) ) : ?>
					<div class="related">
						<?php foreach ( $mapped_therapies as $th ) :
							$th_link = ! empty( $th['link'] ) ? $th['link'] : home_url( '/treatments/' . $th['slug'] . '/' );
						?>
							<a class="xcard" href="<?php echo esc_url( $th_link ); ?>">
								<?php echo kottakkal_render_plate( 't-' . $th['id'], $th['ill'], $th['tone'], '', '4/5', '', $th['img_url'] ?? '' ); ?>
								<div class="ov">
									<span class="ing"><?php echo esc_html( $th['ing'] ); ?></span>
									<h3><?php echo esc_html( $th['name'] ); ?></h3>
									<span class="alt"><?php echo esc_html( $th['alt'] ); ?></span>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				<?php else : ?>
					<p class="muted"><?php esc_html_e( 'Therapies are selected individually at consultation.', 'oceanwp' ); ?></p>
				<?php endif; ?>
			</div>

			<div class="dsec" id="s4">
				<h2><?php esc_html_e( 'Practitioners', 'oceanwp' ); ?></h2>
				<?php if ( ! empty( $mapped_doctors ) ) : ?>
					<div class="minidocs">
						<?php foreach ( $mapped_doctors as $doc ) :
							$d_link = ! empty( $doc['link'] ) ? $doc['link'] : home_url( '/doctors/' . $doc['slug'] . '/' );
							$d_img  = ! empty( $doc['img_url'] ) ? $doc['img_url'] : '';
							$mono_el = empty( $d_img ) ? '<span class="mono" style="font-size:2rem" aria-hidden="true">' . esc_html( $doc['mono'] ) . '</span>' : '';
						?>
							<a class="minidoc" href="<?php echo esc_url( $d_link ); ?>">
								<?php echo kottakkal_render_plate( 'doc-' . $doc['id'], 'doc', $doc['tone'], '', '1', $mono_el, $d_img ); ?>
								<span>
									<b><?php echo esc_html( $doc['name'] ); ?></b>
									<small><?php echo esc_html( $doc['role'] ); ?></small>
								</span>
							</a>
						<?php endforeach; ?>
					</div>
				<?php else : ?>
					<p class="muted">
						<?php esc_html_e( 'Consultations are with our DHA-certified Ayurvedic doctors.', 'oceanwp' ); ?>
						<a href="<?php echo esc_url( home_url( '/doctors/' ) ); ?>" style="color:var(--accent); font-weight:600;"><?php esc_html_e( 'Meet the team', 'oceanwp' ); ?></a>.
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<!-- Action Band -->
<section class="band">
	<div class="wrap">
		<h2><?php printf( esc_html__( 'Arrange a %s', 'oceanwp' ), '<em>' . esc_html__( 'consultation', 'oceanwp' ) . '</em>' ); ?></h2>
		<div style="display:flex; flex-wrap:wrap; gap:12px">
			<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/?service=' . $pathway['id'] ) ); ?>">
				<?php esc_html_e( 'Book an appointment', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/specialties/' ) ); ?>">
				<?php esc_html_e( 'All care pathways', 'oceanwp' ); ?>
			</a>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
