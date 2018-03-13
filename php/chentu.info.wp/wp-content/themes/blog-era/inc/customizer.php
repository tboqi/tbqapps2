<?php
/**
 * Blog Era Theme Customizer
 *
 * @package Blog_Era
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_era_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blog_era_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blog_era_customize_partial_blogdescription',
		) );
	}

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	// Load customize control.
	require get_template_directory() . '/inc/customizer/control.php';	

	$wp_customize->register_section_type( 'Blog_Era_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Blog_Era_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Blog Era Pro', 'blog-era' ),
				'pro_text' => esc_html__( 'Buy Pro', 'blog-era' ),
				'pro_url'  => 'http://96themes.com/downloads/blog-era-pro/',
				'priority' => 1,
			)
		)
	);


	// Load header sections option.
	require get_template_directory() . '/inc/customizer/theme-section.php';

	// Load home page sections option.
	require get_template_directory() . '/inc/customizer/home-section.php';	


}
add_action( 'customize_register', 'blog_era_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog_era_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog_era_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_era_customize_preview_js() {

	wp_enqueue_script( 'blog-era-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blog_era_customize_preview_js' );

/**
 * Script for backend 
 */
function blog_era_customize_backend_scripts() {

	wp_enqueue_style( 'blog-era-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );

	wp_enqueue_script( 'blog-era-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scipt.js', array( ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'blog_era_customize_backend_scripts', 10 );

