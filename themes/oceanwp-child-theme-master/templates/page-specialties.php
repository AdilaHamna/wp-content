<?php
/**
 * Template Name: Kottakkal - Care Pathways
 * Description: Care pathways & specialties overview.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';

$pathways = kottakkal_get_pathways();
?>

<!-- Header -->
<section class="phead">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php esc_html_e( 'Care pathways', 'oceanwp' ); ?></span>
		</nav>
		<span class="label"><?php esc_html_e( 'Specialties', 'oceanwp' ); ?></span>
		<h1><?php esc_html_e( 'Care organised', 'oceanwp' ); ?> <em><?php esc_html_e( 'around you', 'oceanwp' ); ?></em></h1>
		<p class="lede">
			<?php esc_html_e( 'Six pathways, each bringing together the therapies, doctors and approach relevant to a particular need.', 'oceanwp' ); ?>
		</p>
	</div>
</section>

<!-- Accordion Panes -->
<section class="section" style="padding-top:0">
	<div class="wrap">
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
			<?php esc_html_e( 'Ayurvedic care complements medical treatment and does not replace it. We do not promise cures; your doctor will discuss realistic goals with you.', 'oceanwp' ); ?>
		</p>
	</div>
</section>

<!-- Action Band -->
<section class="band">
	<div class="wrap">
		<h2><?php esc_html_e( 'Talk to a doctor about', 'oceanwp' ); ?> <em><?php esc_html_e( 'your needs', 'oceanwp' ); ?></em></h2>
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
