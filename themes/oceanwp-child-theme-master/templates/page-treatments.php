<?php
/**
 * Template Name: Kottakkal - Treatments Archive
 * Description: Catalog of all classical Ayurvedic treatments with filtering.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$treatments = kottakkal_get_treatments();
$pathways   = kottakkal_get_pathways();
?>

<!-- Header -->
<section class="phead">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php esc_html_e( 'Treatments', 'oceanwp' ); ?></span>
		</nav>
		<span class="label"><?php esc_html_e( 'Treatments', 'oceanwp' ); ?></span>
		<h1><?php esc_html_e( 'Traditional therapies,', 'oceanwp' ); ?> <em><?php esc_html_e( 'individualised', 'oceanwp' ); ?></em></h1>
		<p class="lede">
			<?php esc_html_e( 'Classical Kerala Ayurvedic treatments using medicated oils, herbs, rice and ghee. Your doctor recommends which therapies suit you, and in what order, after consultation.', 'oceanwp' ); ?>
		</p>
		<div class="ph-acts">
			<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
				<?php esc_html_e( 'Book a consultation', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/specialties/' ) ); ?>">
				<?php esc_html_e( 'Browse care pathways', 'oceanwp' ); ?>
			</a>
		</div>
	</div>
</section>

<!-- Treatments Grid & Filter -->
<section class="section" style="padding-top:0">
	<div class="wrap">
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

		<!-- Grid -->
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
	</div>
</section>

<!-- Action Band -->
<section class="band">
	<div class="wrap">
		<h2><?php esc_html_e( 'Not sure which therapy is', 'oceanwp' ); ?> <em><?php esc_html_e( 'right for you?', 'oceanwp' ); ?></em></h2>
		<div style="display:flex; flex-wrap:wrap; gap:12px">
			<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
				<?php esc_html_e( 'Book a consultation', 'oceanwp' ); ?>
				<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
			</a>
			<a class="btn btn-line mag" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">
				<?php esc_html_e( 'Contact our team', 'oceanwp' ); ?>
			</a>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
