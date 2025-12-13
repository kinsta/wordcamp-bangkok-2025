<?php
/**
 * Plugin Name: WordCamp Bangkok 2025
 * Description: A very simple WordPress plugin with assets built using modern WordPress toolings.
 * Author: Thoriq Firdaus
 * Version: 0.0.1
 * Text Domain: wordcamp-bangkok-2025
 *
 * @package WordCamp Bangkok 2025
 */

add_action( 'wp_enqueue_scripts', 'wordcamp_bangkok_2025_enqueue_assets' );
add_action( 'admin_enqueue_scripts', 'wordcamp_bangkok_2025_enqueue_assets' );
add_action( 'admin_menu', 'wordcamp_bangkok_2025_add_admin_page' );
add_action( 'plugins_loaded', 'wordcamp_bangkok_2025_load_textdomain' );

function wordcamp_bangkok_2025_enqueue_assets(): void {
	$asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';
	$plugin_url = plugin_dir_url( __FILE__ );

	if ( file_exists( $asset_file ) ) {
		$asset = include $asset_file;
	}

	wp_enqueue_script(
		'wordcamp-bangkok-2025-js',
		$plugin_url . 'build/index.js',
		$asset['dependencies'],
		$asset['version'],
		true
	);

	wp_enqueue_style(
		'wordcamp-bangkok-2025-css',
		$plugin_url . 'build/style-index' . ( is_rtl() ? '-rtl' : '' ) . '.css',
		array(),
		$asset['version']
	);
}

function wordcamp_bangkok_2025_add_admin_page(): void {
	add_management_page(
		__( 'Bangkok 2025', 'wordcamp-bangkok-2025' ),
		__( 'Bangkok 2025', 'wordcamp-bangkok-2025' ),
		'manage_options',
		'wordcamp-bangkok-2025',
		'wordcamp_bangkok_2025_render_admin_page'
	);
}

function wordcamp_bangkok_2025_render_admin_page(): void {
	?>
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<div id="wordcamp-bangkok-2025-app"></div>
	<?php
}

function wordcamp_bangkok_2025_load_textdomain(): void {
	load_plugin_textdomain(
		'wordcamp-bangkok-2025',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/lang/'
	);
}

get_template_hierarchy();
