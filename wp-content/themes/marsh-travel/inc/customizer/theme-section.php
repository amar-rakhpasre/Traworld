<?php
/**
 * Theme Options.
 *
 * @package Marsh Travel
 */

$default = marsh_travel_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'marsh-travel' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('Layout Option', 'marsh-travel'),
'panel'       => 'theme_option_panel'    
));

//Layout Options for Blog
$wp_customize->add_setting('theme_options[layout_options_blog]', 
	array(
	'default' 			=> $default['layout_options_blog'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_travel_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_travel_Image_Radio_Control($wp_customize, 'theme_options[layout_options_blog]', 
	array(		
	'label' 	=> __('Blog Layout', 'marsh-travel'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_blog]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

//Layout Options for Archive
$wp_customize->add_setting('theme_options[layout_options_archive]', 
	array(
	'default' 			=> $default['layout_options_archive'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_travel_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_travel_Image_Radio_Control($wp_customize, 'theme_options[layout_options_archive]', 
	array(		
	'label' 	=> __('Archive Layout', 'marsh-travel'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_archive]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);


//Layout Options for Pages
$wp_customize->add_setting('theme_options[layout_options_page]', 
	array(
	'default' 			=> $default['layout_options_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_travel_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_travel_Image_Radio_Control($wp_customize, 'theme_options[layout_options_page]', 
	array(		
	'label' 	=> __('Page Layout', 'marsh-travel'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_page]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

//Layout Options for Single Post
$wp_customize->add_setting('theme_options[layout_options_single]', 
	array(
	'default' 			=> $default['layout_options_single'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_travel_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_travel_Image_Radio_Control($wp_customize, 'theme_options[layout_options_single]', 
	array(		
	'label' 	=> __('Single Post Layout', 'marsh-travel'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_single]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

// Excerpt Length
$wp_customize->add_section('section_excerpt_length', 
	array(    
	'title'       => __('Excerpt Length', 'marsh-travel'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'marsh_travel_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => __( 'Excerpt Length', 'marsh-travel' ),
	'description' => __( 'in words', 'marsh-travel' ),
	'section'     => 'section_excerpt_length',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 75px;' ),
) );

// Blog Title
$wp_customize->add_section('section_blog_title', 
	array(    
	'title'       => __('Blog Title', 'marsh-travel'),
	'panel'       => 'theme_option_panel'    
	)
);


$wp_customize->add_setting( 'theme_options[your_latest_posts_title]',
	array(
	'default'           => $default['your_latest_posts_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[your_latest_posts_title]',
	array(
	'label'    => __( 'Blog Title', 'marsh-travel' ),
	'section'  => 'section_blog_title',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Read More Section
$wp_customize->add_section('section_read_more', 
	array(    
	'title'       => __('Read More Text', 'marsh-travel'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_travel_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( 'Read More Text', 'marsh-travel' ),
	'section'  => 'section_read_more',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Setting', 'marsh-travel'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'marsh-travel' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Disable Header Image on Front Page
$wp_customize->add_setting( 'theme_options[disable_frontpage_header_image]', array(
	'default'             => $default['disable_frontpage_header_image'],
	'sanitize_callback'   => 'marsh_travel_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[disable_frontpage_header_image]', array(
	'label'       	=> esc_html__( 'Disable in Front Page Only', 'marsh-travel' ),
	'section'     	=> 'header_image',
	'type'        	=> 'checkbox',
) );