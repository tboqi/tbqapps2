<?php
/**
 * Theme Options Customizer
 *
 * @package Blog_Era
 */

$default = blog_era_get_default_theme_options();


/************************* Add Pannel **********************************/
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'blog-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		)
	);

/*************************Header Setting Section starts********************/
$wp_customize->add_section('section_header', 
	array(    
		'title'       => esc_html__('Header Setting', 'blog-era'),
		'panel'       => 'theme_option_panel'    
		)
	);
/**************************** Site Identity ********************************/
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
		'default' 			=> $default['site_identity'],
		'sanitize_callback' => 'blog_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[site_identity]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blog-era'),
		'section' 	=> 'title_tagline',
		'settings'  => 'theme_options[site_identity]',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'logo-only' 	=> esc_html__('Logo Only', 'blog-era'),
			'logo-text' 	=> esc_html__('Logo + Tagline', 'blog-era'),
			'title-only' 	=> esc_html__('Title Only', 'blog-era'),
			'title-text' 	=> esc_html__('Title + Tagline', 'blog-era')
			)
		)
	);

/************************** Top Header Enable  ******************************/
$wp_customize->add_setting('theme_options[enable_top_header]', 
	array(
		'default' 			=> $default['enable_top_header'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_top_header]', 
	array(		
		'label' 	=> esc_html__('Enable Top Header Section', 'blog-era'),
		'section' 	=> 'section_header',
		'settings'  => 'theme_options[enable_top_header]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Top Left Part  ******************************/
$wp_customize->add_setting('theme_options[top_left_header]', 
	array(
		'default' 			=> $default['top_left_header'],
		'sanitize_callback' => 'blog_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[top_left_header]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blog-era'),
		'section' 	=> 'section_header',
		'settings'  => 'theme_options[top_left_header]',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'top-menu' 		=> esc_html__('Top Menu', 'blog-era'),
			'social-icon' 	=> esc_html__('Social Icon', 'blog-era'),
			'address' 		=> esc_html__('Address', 'blog-era'),			
			)
		)
	);

/************************** Top Right Part  ******************************/
$wp_customize->add_setting('theme_options[top_right_header]', 
	array(
		'default' 			=> $default['top_right_header'],
		'sanitize_callback' => 'blog_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[top_right_header]', 
	array(		
		'label' 	=> esc_html__('Choose Option', 'blog-era'),
		'section' 	=> 'section_header',
		'settings'  => 'theme_options[top_right_header]',
		'type' 		=> 'radio',
		'choices' 	=>  array(
			'top-menu' 		=> esc_html__('Top Menu', 'blog-era'),
			'social-icon' 	=> esc_html__('Social Icon', 'blog-era'),
			'address' 		=> esc_html__('Address', 'blog-era'),			
			)
		)
	);

/************************* Address *********************************/
$wp_customize->add_setting( 'theme_options[header_address]',
	array(
		'default'           => $default['header_address'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_textarea_field',	
		)
	);
$wp_customize->add_control( 'theme_options[header_address]',
	array(
		'label'    => esc_html__( 'Address', 'blog-era' ),
		'section'  => 'section_header',
		'type'     => 'text',
		)
	);

/************************* Phone *********************************/
$wp_customize->add_setting( 'theme_options[header_number]',
	array(
		'default'           => $default['header_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',	
		)
	);
$wp_customize->add_control( 'theme_options[header_number]',
	array(
		'label'    => esc_html__( 'Phone Number', 'blog-era' ),
		'section'  => 'section_header',
		'type'     => 'text',	
		)
	);

/************************* Email *********************************/
$wp_customize->add_setting('theme_options[header_email]',  
	array(
		'default'           => $default['header_email'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_email',
		'priority' => 100,
		)
	);

$wp_customize->add_control('theme_options[header_email]', 
	array(
		'label'       => esc_html__('Contact Email', 'blog-era'),
		'section'     => 'section_header',   
		'settings'    => 'theme_options[header_email]',		
		'type'        => 'text'
		)
	);
/*****************General  Setting Section starts *****************/
$wp_customize->add_section('section_general', array(    
	'title'       => esc_html__('General Option', 'blog-era'),
	'panel'       => 'theme_option_panel'    
	));

/******************* Pagaination Option *********************************/
$wp_customize->add_setting('theme_options[pagination_option]', 
	array(
		'default' 			=> $default['pagination_option'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[pagination_option]', 
	array(		
		'label' 	=> esc_html__('Pagaination Options', 'blog-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[pagination_option]',
		'type' 		=> 'radio',
		'choices' 	=> array(		
			'default' 		=> esc_html__('Default', 'blog-era'),							
			'numeric' 		=> esc_html__('Numeric', 'blog-era'),		
			),	
		)
	);

/************************** Enable Categories  ******************************/
$wp_customize->add_setting('theme_options[enable_categories]', 
	array(
		'default' 			=> $default['enable_categories'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_categories]', 
	array(		
		'label' 	=> esc_html__('Enable Category', 'blog-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_categories]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Enable Tags  ******************************/
$wp_customize->add_setting('theme_options[enable_tags]', 
	array(
		'default' 			=> $default['enable_tags'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_tags]', 
	array(		
		'label' 	=> esc_html__('Enable Tags', 'blog-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_tags]',
		'type' 		=> 'checkbox',	
		)
	);


/************************** Enable Author  ******************************/
$wp_customize->add_setting('theme_options[enable_author]', 
	array(
		'default' 			=> $default['enable_author'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_author]', 
	array(		
		'label' 	=> esc_html__('Enable Author', 'blog-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_author]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Enable Posted Date  ******************************/
$wp_customize->add_setting('theme_options[enable_posted_date]', 
	array(
		'default' 			=> $default['enable_posted_date'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_posted_date]', 
	array(		
		'label' 	=> esc_html__('Enable Date', 'blog-era'),
		'section' 	=> 'section_general',
		'settings'  => 'theme_options[enable_posted_date]',
		'type' 		=> 'checkbox',	
		)
	);

/*****************Layout Setting Section  *****************/
$wp_customize->add_section('section_layout', array(    
	'title'       => esc_html__('Layout Option', 'blog-era'),
	'panel'       => 'theme_option_panel'    
	));

/************************** Default Layout  ******************************/
$wp_customize->add_setting('theme_options[default_layout]', 
	array(
		'default' 			=> $default['default_layout'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[default_layout]', 
	array(		
		'label' 	=> esc_html__('Default Layout', 'blog-era'),
		'section' 	=> 'section_layout',
		'settings'  => 'theme_options[default_layout]',
		'type' 		=> 'select',
		'choices' 	=> array(		
			'full-width' 		=> esc_html__('Full Width', 'blog-era'),							
			'boxed' 		=> esc_html__('Boxed', 'blog-era'),		
			),	
		)
	);

/************************** Button Layout  ******************************/
$wp_customize->add_setting('theme_options[button_layout]', 
	array(
		'default' 			=> $default['button_layout'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_select'
		)
	);

$wp_customize->add_control('theme_options[button_layout]', 
	array(		
		'label' 	=> esc_html__('Button Layout', 'blog-era'),
		'section' 	=> 'section_layout',
		'settings'  => 'theme_options[button_layout]',
		'type' 		=> 'select',
		'choices' 	=> array(		
			'btn' 		=> esc_html__('Default', 'blog-era'),							
			'btn-primary' 		=> esc_html__('Layout 1', 'blog-era'),
			'btn-secondary' 		=> esc_html__('Layout 2', 'blog-era'),
			'btn-readmore' 		=> esc_html__('Layout 3', 'blog-era'),		
			),	
		)
	);


/************************* Layout Options ******************************************/
$wp_customize->add_setting('theme_options[layout_options]', 
	array(
		'default' 			=> $default['layout_options'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_select'
		)
	);

$wp_customize->add_control(new Blog_Era_Image_Radio_Control($wp_customize, 'theme_options[layout_options]', 
	array(		
		'label' 	=> esc_html__('Sidebar Layout Options', 'blog-era'),
		'section' 	=> 'section_layout',
		'settings'  => 'theme_options[layout_options]',
		'type' 		=> 'radio-image',
		'choices' 	=> array(		
			'left' 			=> get_template_directory_uri() . '/assets/img/left-sidebar.png',							
			'right' 		=> get_template_directory_uri() . '/assets/img/right-sidebar.png',
			'no-sidebar' 	=> get_template_directory_uri() . '/assets/img/no-sidebar.png',
			),	
		))
);

/***************** Footer Setting Section starts ********************/
$wp_customize->add_section('section_footer', 
	array(    
		'title'       => esc_html__('Footer Setting', 'blog-era'),
		'panel'       => 'theme_option_panel'    
		)
	);

/************************** Footer Social Icon ******************************/
$wp_customize->add_setting('theme_options[enable_footer_social_icon]', 
	array(
		'default' 			=> $default['enable_footer_social_icon'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_footer_social_icon]', 
	array(		
		'label' 	=> esc_html__('Enable Footer Social Icon', 'blog-era'),
		'section' 	=> 'section_footer',
		'settings'  => 'theme_options[enable_footer_social_icon]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Footer Social Icon ******************************/
$wp_customize->add_setting('theme_options[enable_scroll_top]', 
	array(
		'default' 			=> $default['enable_scroll_top'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blog_era_sanitize_checkbox'
		)
	);

$wp_customize->add_control('theme_options[enable_scroll_top]', 
	array(		
		'label' 	=> esc_html__('Enable Scroll To Top', 'blog-era'),
		'section' 	=> 'section_footer',
		'settings'  => 'theme_options[enable_scroll_top]',
		'type' 		=> 'checkbox',	
		)
	);

/************************** Copyright Text ******************************/
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
		'default'           => $default['copyright_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		)
	);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
		'label'    => esc_html__( 'Copyright Text', 'blog-era' ),
		'section'  => 'section_footer',
		'settings'  => 'theme_options[copyright_text]',
		'type'     => 'text',
		)
	);