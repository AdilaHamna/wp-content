<?php
/**
 * Template Name: Kottakkal - Wellness Journal
 * Description: Wellness journal and Ayurvedic lifestyle guide.
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/templates/header-custom.php';
?>

<!-- Header -->
<section class="phead">
	<div class="wrap">
		<nav class="crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'oceanwp' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'oceanwp' ); ?></a>
			<span aria-hidden="true">/</span>
			<span aria-current="page"><?php esc_html_e( 'Wellness', 'oceanwp' ); ?></span>
		</nav>
		<span class="label"><?php esc_html_e( 'Wellness journal', 'oceanwp' ); ?></span>
		<h1><?php esc_html_e( 'Notes on', 'oceanwp' ); ?> <em><?php esc_html_e( 'Ayurvedic living', 'oceanwp' ); ?></em></h1>
		<p class="lede">
			<?php esc_html_e( 'Guidance on diet, daily routine and seasonal care, written or reviewed by our DHA-certified doctors.', 'oceanwp' ); ?>
		</p>
	</div>
</section>

<!-- Content & Planned Pillars -->
<section class="section" style="padding-top:0">
	<div class="wrap empty">
		<div>
			<h2 style="font-size:var(--fs-2)">
				<?php esc_html_e( 'The first articles are', 'oceanwp' ); ?> <em><?php esc_html_e( 'in preparation', 'oceanwp' ); ?></em>
			</h2>
			<p class="lede" style="margin-top:22px">
				<?php esc_html_e( 'Each article will name its author and reviewing doctor, and show when it was published and last reviewed. Until then, our doctors are happy to answer questions at consultation.', 'oceanwp' ); ?>
			</p>
			<div class="ph-acts">
				<a class="btn btn-solid mag" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">
					<?php esc_html_e( 'Ask a doctor', 'oceanwp' ); ?>
					<svg class="ic" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M1 8h13M9 3l5 5-5 5"/></svg>
				</a>
			</div>
		</div>

		<div>
			<span class="label bare"><?php esc_html_e( 'Planned sections', 'oceanwp' ); ?></span>
			<div class="cats" style="margin-top:18px">
				<div>
					<b><?php esc_html_e( 'Daily routine', 'oceanwp' ); ?></b>
					<span>Dinacharya</span>
				</div>
				<div>
					<b><?php esc_html_e( 'Seasonal care', 'oceanwp' ); ?></b>
					<span>Ritucharya</span>
				</div>
				<div>
					<b><?php esc_html_e( 'Food and digestion', 'oceanwp' ); ?></b>
					<span>Ahara</span>
				</div>
				<div>
					<b><?php esc_html_e( 'Understanding your treatment', 'oceanwp' ); ?></b>
					<span>Chikitsa</span>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
require_once get_stylesheet_directory() . '/templates/footer-custom.php';
