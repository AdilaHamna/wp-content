<?php
/**
 * Main Index Fallback Template
 *
 * @package OceanWP_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Render the Kottakkal Home Template
require_once get_stylesheet_directory() . '/templates/page-home.php';
