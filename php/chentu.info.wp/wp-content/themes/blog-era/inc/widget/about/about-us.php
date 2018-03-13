<?php
/**
 * Plugin widgets.
 *
 * @package Blog_Era
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load widget.
require get_template_directory() . '/inc/widget/about/inc/widget.php';

/**
 * Register widget.
 *
 * @since 1.0.0
 */
function blog_era_promo_init() {

	register_widget( 'Blog_Era_Promo' );

}
add_action( 'widgets_init', 'blog_era_promo_init' );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 *
 * @param string $hook Hook.
 */
function blog_era_promo_scripts( $hook ) {

	if ( 'widgets.php' !== $hook ) {
		return;
	}

	wp_enqueue_style( 'blog-era-admin-css', get_template_directory_uri() . '/inc/widget/about/css/admin.css', array(), '1.0.0' );

	wp_enqueue_media();

	wp_enqueue_script( 'blog-era-admin-js', get_template_directory_uri() . '/inc/widget/about/js/admin.js', array( 'jquery' ), '1.0.0' );

}
add_action( 'admin_enqueue_scripts', 'blog_era_promo_scripts' );
