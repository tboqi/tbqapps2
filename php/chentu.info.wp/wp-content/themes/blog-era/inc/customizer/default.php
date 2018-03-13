<?php
/**
 * Default theme options.
 *
 * @package Blog_Era
 */

if ( ! function_exists( 'blog_era_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function blog_era_get_default_theme_options() {

	$defaults = array();

	/******************************** Header Section ********************************/
	$defaults['site_identity'] 						= 'title-text';
	$defaults['enable_top_header'] 					= true;
	$defaults['top_left_header'] 					= 'top-menu';
	$defaults['top_right_header'] 					= 'social-icon';
	$defaults['header_address'] 					= '';
	$defaults['header_number'] 						= '';
	$defaults['header_email'] 						= ''; 

	/******************************** Slider Section ********************************/
	$defaults['enable_slider'] 						= false;
	$defaults['slider_category'] 					= 0;
	$defaults['slider_number'] 						= 2;	
	$defaults['featured_page_1'] 					= 0;
	$defaults['featured_page_2'] 					= 0;


	/******************************** Home Page Section ********************************/
	$defaults['blog_layout'] 						= 'mixed';

	/******************************** Layout Setting ********************************/	
	$defaults['layout_options'] 					= 'right'; 
	$defaults['default_layout'] 					= 'boxed';
	$defaults['button_layout'] 						= 'btn'; 
	
	/******************************** General Setting ********************************/	
	$defaults['pagination_option'] 					= 'default';
	$defaults['enable_categories'] 					= true;
	$defaults['enable_tags'] 						= true;
	$defaults['enable_author'] 						= true;
	$defaults['enable_posted_date'] 				= true;
	


	
	/******************************** Footer Section ********************************/	
	$defaults['enable_footer_social_icon'] 			= true;
	$defaults['enable_scroll_top'] 					= true;
	$defaults['copyright_text'] 					= '';

	// Pass through filter.
	$defaults = apply_filters( 'blog_era_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'blog_era_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
function blog_era_get_option( $key ) {

	$default_options = blog_era_get_default_theme_options();

	if ( empty( $key ) ) {
		return;
	}

	$theme_options = (array)get_theme_mod( 'theme_options' );
	$theme_options = wp_parse_args( $theme_options, $default_options );

	$value = null;

	if ( isset( $theme_options[ $key ] ) ) {
		$value = $theme_options[ $key ];
	}

	return $value;
}

endif;