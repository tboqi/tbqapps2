<?php
/**
 * Load files.
 *
 * @package Blog_Era
 */

/**
 * Include default theme options.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/default.php';




/**
 * Load hooks.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/structure.php';
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/basic.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/custom.php';
//require_once trailingslashit( get_template_directory() ) . 'inc/hook/tgm.php';


/**
 * Implement the Custom Header feature.
 */

require trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require trailingslashit( get_template_directory() ) . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require trailingslashit( get_template_directory() ) . '/inc/jetpack.php';
}

/**
 * About Us Widget.
 */
require trailingslashit( get_template_directory() ) . '/inc/widget/about/about-us.php';

/**
 *  Widget.
 */
require trailingslashit( get_template_directory() ) . '/inc/widget/widgets.php';