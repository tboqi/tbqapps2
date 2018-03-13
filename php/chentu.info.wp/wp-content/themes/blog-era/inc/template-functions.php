<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blog_Era
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blog_era_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    /********************** Add class for Blog layout ********************/
    $blog_layout = blog_era_get_option('blog_layout');   
    $blog_layout = apply_filters( 'blog_era_filter_theme_blog_layout', $blog_layout ); 

    $classes[] = 'blog-layout-' . esc_attr( $blog_layout ); 

    /********************** Add class for Sidebar layout ********************/
    $sidebar_layout = blog_era_get_option('layout_options'); 
    $sidebar_layout = apply_filters( 'blog_era_filter_theme_global_layout', $sidebar_layout );
    $classes[] = 'global-layout-' . esc_attr( $sidebar_layout ); 

    /********************** Add class for Default layout ********************/
    $default_layout = blog_era_get_option('default_layout');   
    $default_layout = apply_filters( 'blog_era_filter_theme_default_layout', $default_layout ); 

    $classes[] = 'default-layout-' . esc_attr( $default_layout );

	return $classes;
}
add_filter( 'body_class', 'blog_era_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function blog_era_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blog_era_pingback_header' );

if ( ! function_exists( 'blog_era_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     * @since 1.0.0
     *
     * @param int     $length Excerpt length in words.
     * @param WP_Post $post_obj WP_Post instance (Optional).
     * @return string Excerpt.
     */
    function blog_era_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }

endif;
