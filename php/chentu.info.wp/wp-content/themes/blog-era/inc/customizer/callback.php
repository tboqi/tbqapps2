<?php
/**
 * Callback functions for active_callback.
 *
 * @package Blog_Era
 */

if ( ! function_exists( 'blog_era_active_slider' ) ) :

	/**
	 * Check if slider is active in Home Page
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blog_era_active_slider( $control ) {

        if( true == $control->manager->get_setting('theme_options[enable_slider]')->value() ){
        
            return true;
        
        } else {
        
            return false;
        
        }

	}

endif;