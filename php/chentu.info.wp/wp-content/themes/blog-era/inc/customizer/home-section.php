<?php
/**
 * Home Page Options.
 *
 * @package Blog_Era
 */

$default = blog_era_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => esc_html__( 'Home Page Options', 'blog-era' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);
/************************* Slider Section **********************************/
$wp_customize->add_section('section_featured_slider', 
	array(    
	'title'       => esc_html__('Slider Section', 'blog-era'),
	'panel'       => 'home_page_panel'    
	)
);
/************************** Slider Section Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_slider]', 
	array(
	'default' 			=> $default['enable_slider'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_era_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_slider]', 
	array(		
	'label' 	=> esc_html__('Enable Slider Section', 'blog-era'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[enable_slider]',
	'type' 		=> 'checkbox',	
	)
);

/************************* Slider categor **********************************/
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(
	'default'           => $default['slider_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Blog_Era_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'blog-era' ),
		'section'  => 'section_featured_slider',
		'settings' => 'theme_options[slider_category]',
		'active_callback'   => 'blog_era_active_slider',
		)
	)
);
// Slider Number.
$wp_customize->add_setting( 'theme_options[slider_number]',
	array(
		'default'           => $default['slider_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[slider_number]',
	array(
		'label'       => esc_html__( 'No of Slider', 'blog-era' ),
		'section'     => 'section_featured_slider',
		'type'        => 'number',
		'input_attrs' => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 115px;' ),
		'active_callback'   => 'blog_era_active_slider',
	)
);

/************************* Featured Page  **********************************/
$wp_customize->add_setting('theme_options[featured_page_info]', 
	array(
		'sanitize_callback' => 'esc_attr',            
	)
);

$wp_customize->add_control( 
	new Blog_Era_Info( $wp_customize, 'theme_options[featured_page_info]',
		array(
			'label' 			=> esc_html__( 'Featured Page(Before Slider)', 'blog-era'),
			'section' 			=> 'section_featured_slider',
			'active_callback' 	=> 'blog_era_active_slider',
		) 
	)
);

/************************** Featured Page  ******************************/
$wp_customize->add_setting('theme_options[featured_page_1]', 
	array(
	'default' 			=> $default['featured_page_1'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_era_sanitize_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[featured_page_1]', 
	array(		
	'label' 	=> esc_html__(' Select Page-1', 'blog-era'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[featured_page_1]',
	'type' 		=> 'dropdown-pages',	
	)
);

/************************** Featured Page  ******************************/
$wp_customize->add_setting('theme_options[featured_page_2]', 
	array(
	'default' 			=> $default['featured_page_2'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_era_sanitize_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[featured_page_2]', 
	array(		
	'label' 	=> esc_html__(' Select Page-2', 'blog-era'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[featured_page_2]',
	'type' 		=> 'dropdown-pages',	
	)
);

/*************************General Setting **********************************/
$wp_customize->add_section('section_general_setting', 
	array(    
	'title'       => esc_html__('General Settings', 'blog-era'),
	'panel'       => 'home_page_panel'    
	)
);

/************************** Default Layout  ******************************/
$wp_customize->add_setting('theme_options[blog_layout]', 
	array(
	'default' 			=> $default['blog_layout'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blog_era_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[blog_layout]', 
	array(		
	'label' 	=> esc_html__('Blog Layout', 'blog-era'),
	'section' 	=> 'section_general_setting',
	'settings'  => 'theme_options[blog_layout]',
	'type' 		=> 'select',
	'choices' 	=> array(		
		'single' 		=> esc_html__('Single', 'blog-era'),							
		'mixed' 		=> esc_html__('Mixed', 'blog-era'),		
		),	
	)
);
