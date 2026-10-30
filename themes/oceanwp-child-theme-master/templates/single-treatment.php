<?php
/**
 * Single Treatment Template
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $wp_query;

$current_slug = get_query_var( 'treatment' ) ?: ( $post ? $post->post_name : '' );
if ( empty( $current_slug ) ) {
	$req_path = trim( (string) parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( preg_match( '#^treatments/([^/]+)$#', $req_path, $matches ) ) {
		$current_slug = sanitize_title( $matches[1] );
	}
}

$all_treatments = kottakkal_get_treatments();

// Find current treatment
$treatment = null;
$current_index = 0;
foreach ( $all_treatments as $idx => $t ) {
	if ( $t['slug'] === $current_slug || $t['id'] === $current_slug ) {
		$treatment = $t;
		$current_index = $idx;
		break;
	}
}

// Fallback to first treatment if not matched
if ( ! $treatment && ! empty( $all_treatments ) ) {
	$treatment = $all_treatments[0];
	$current_index = 0;
}

// Setup post and query state BEFORE header is output
if ( function_exists( 'kottakkal_setup_virtual_treatment_post' ) && $treatment ) {
	kottakkal_setup_virtual_treatment_post( $treatment );
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$total_t = count( $all_treatments );
$prev_t = $all_treatments[ ( $current_index - 1 + $total_t ) % $total_t ];
$next_t = $all_treatments[ ( $current_index + 1 ) % $total_t ];

// Related treatments
$related_t = array();
foreach ( $all_treatments as $t ) {
	if ( $t['id'] !== $treatment['id'] ) {
		$common = array_intersect( $treatment['paths'], $t['paths'] );
		if ( ! empty( $common ) ) {
			$related_t[] = $t;
		}
	}
	if ( count( $related_t ) >= 3 ) break;
}
if ( count( $related_t ) < 3 ) {
	foreach ( $all_treatments as $t ) {
		if ( $t['id'] !== $treatment['id'] && ! in_array( $t, $related_t ) ) {
			$related_t[] = $t;
		}
		if ( count( $related_t ) >= 3 ) break;
	}
}

$all_pathways = kottakkal_get_pathways();
?>

<!-- Single Treatment Header -->
<section class="phead">
	<div class="wrap ph2">
		<div>
			<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>"><?php esc_html_e( 'Treatments', 'oceanwp' ); ?></a>
				<span aria-hidden="true">/</span>
				<span aria-current="page"><?php echo esc_html( $treatment['name'] ); ?></span>
			</nav>

			<span class="label"><?php echo esc_html( $treatment['alt'] ); ?></span>
			<h1><?php echo esc_html( $treatment['name'] ); ?></h1>

			<?php if ( ! empty( $treatment['meaning'] ) ) : ?>
				<p class="meaning"><?php echo esc_html( $treatment['meaning'] ); ?></p>
			<?php endif; ?>

			<p class="lede"><?php echo esc_html( $treatment['short'] ); ?></p>

			<?php if ( ! empty( $treatment['facts'] ) ) : ?>
				<dl class="facts">
					<?php foreach ( $treatment['facts'] as $f ) : ?>
						<div>
							<dt><?php echo esc_html( $f[0] ); ?></dt>
							<dd><?php echo esc_html( $f[1] ); ?></dd>
						</div>
					<?php endforeach; ?>
				</dl>
			<?php endif; ?>

			<div class="ph-acts">
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/?service=' . $treatment['id'] ) ); ?>">
					<?php printf( esc_html__( 'Book %s', 'oceanwp' ), esc_html( $treatment['name'] ) ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
				<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>">
					<?php esc_html_e( 'All treatments', 'oceanwp' ); ?>
				</a>
			</div>
		</div>

		<div>
			<?php echo kottakkal_render_plate( 't-' . $treatment['id'], $treatment['ill'], $treatment['tone'], 'Key ingredient · ' . $treatment['ing'], null, '', $treatment['img_url'] ?? '' ); ?>
		</div>
	</div>
</section>

<!-- Content & Table of Contents -->
<section class="section" style="padding-top:clamp(40px, 5vw, 72px)">
	<div class="wrap dgrid">
		<nav class="toc" aria-label="<?php esc_attr_e( 'On this page', 'oceanwp' ); ?>">
			<a href="#d1"><?php esc_html_e( 'What it is for', 'oceanwp' ); ?></a>
			<a href="#d2"><?php esc_html_e( 'What happens', 'oceanwp' ); ?></a>
			<a href="#d3"><?php esc_html_e( 'Before you book', 'oceanwp' ); ?></a>
			<a href="#d4"><?php esc_html_e( 'Related care', 'oceanwp' ); ?></a>
		</nav>

		<div>
			<div class="dsec" id="d1">
				<h2><?php esc_html_e( 'What it is for', 'oceanwp' ); ?></h2>
				<p class="lede"><?php echo esc_html( $treatment['purpose'] ); ?></p>
			</div>

			<div class="dsec" id="d2">
				<h2><?php esc_html_e( 'What happens', 'oceanwp' ); ?></h2>
				<p><?php echo esc_html( $treatment['process'] ); ?></p>
				<p class="muted">
					<?php esc_html_e( 'Every treatment is recommended by a doctor after consultation. Session length and the number of sessions depend on your plan.', 'oceanwp' ); ?>
				</p>
			</div>

			<div class="dsec" id="d3">
				<h2><?php esc_html_e( 'Before you book', 'oceanwp' ); ?></h2>
				<?php if ( ! empty( $treatment['caution'] ) ) : ?>
					<p class="callout"><?php echo esc_html( $treatment['caution'] ); ?></p>
				<?php endif; ?>
				<p>
					<?php printf( esc_html__( 'Tell us about any medical conditions, pregnancy, allergies and medicines you take. Your doctor will confirm whether %s is suitable for you, and may suggest an alternative.', 'oceanwp' ), esc_html( $treatment['name'] ) ); ?>
				</p>
				<p class="muted">
					<?php esc_html_e( 'Ayurvedic treatment complements medical care and does not replace it. Results vary between individuals.', 'oceanwp' ); ?>
				</p>
			</div>

			<div class="dsec" id="d4">
				<h2><?php esc_html_e( 'Related care', 'oceanwp' ); ?></h2>
				<div class="chips">
					<?php foreach ( $treatment['paths'] as $pid ) :
						$matched_p = null;
						foreach ( $all_pathways as $p ) {
							if ( $p['id'] === $pid ) { $matched_p = $p; break; }
						}
						if ( $matched_p ) :
							$p_link = ! empty( $matched_p['link'] ) ? $matched_p['link'] : home_url( '/specialties/' . $matched_p['slug'] . '/' );
					?>
						<a class="chip" href="<?php echo esc_url( $p_link ); ?>"><?php echo esc_html( $matched_p['name'] ); ?></a>
					<?php endif; endforeach; ?>
				</div>

				<div class="related" style="margin-top:24px">
					<?php foreach ( $related_t as $rel ) :
						$rel_link = ! empty( $rel['link'] ) ? $rel['link'] : home_url( '/treatments/' . $rel['slug'] . '/' );
					?>
						<a class="xcard" href="<?php echo esc_url( $rel_link ); ?>">
							<?php echo kottakkal_render_plate( 't-' . $rel['id'], $rel['ill'], $rel['tone'], '', '4/5', '', $rel['img_url'] ?? '' ); ?>
							<div class="ov">
								<span class="ing"><?php echo esc_html( $rel['ing'] ); ?></span>
								<h3><?php echo esc_html( $rel['name'] ); ?></h3>
								<span class="alt"><?php echo esc_html( $rel['alt'] ); ?></span>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Action Band -->
<section class="band">
	<div class="wrap">
		<h2><?php printf( esc_html__( 'Arrange a consultation for %s', 'oceanwp' ), '<em>' . esc_html( $treatment['name'] ) . '</em>' ); ?></h2>
		<div style="display:flex; flex-wrap:wrap; gap:12px">
			<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/?service=' . $treatment['id'] ) ); ?>">
				<?php esc_html_e( 'Book an appointment', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/treatments/' ) ); ?>">
				<?php esc_html_e( 'All therapies', 'oceanwp' ); ?>
			</a>
		</div>
	</div>
</section>

<!-- Prev / Next Pagination -->
<div class="wrap pn">
	<a href="<?php echo esc_url( ! empty( $prev_t['link'] ) ? $prev_t['link'] : home_url( '/treatments/' . $prev_t['slug'] . '/' ) ); ?>">
		<small><?php esc_html_e( 'Previous', 'oceanwp' ); ?></small>
		<b><?php echo esc_html( $prev_t['name'] ); ?></b>
	</a>
	<a href="<?php echo esc_url( ! empty( $next_t['link'] ) ? $next_t['link'] : home_url( '/treatments/' . $next_t['slug'] . '/' ) ); ?>">
		<small><?php esc_html_e( 'Next', 'oceanwp' ); ?></small>
		<b><?php echo esc_html( $next_t['name'] ); ?></b>
	</a>
</div>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
