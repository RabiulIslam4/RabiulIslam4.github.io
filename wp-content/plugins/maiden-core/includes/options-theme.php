<?php
/**
 * Init Configuration
 */
Kirki::add_config( 'maiden', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'option',
	'option_name'   => 'maiden_themes_options',
) );

/**
 * General Themes Options
 */
Kirki::add_panel( 'general_options', array(
    'priority'    => 1,
    'title'       => esc_attr__( 'General Options', 'maiden' ),
    'description' => esc_attr__( 'All Settings', 'maiden' ),
) );

Kirki::add_section( 'header_options', array(
    'panel'          => 'general_options', // Not typically needed.
    'title'          => esc_attr__( 'Header Options', 'maiden' ),
    'description'    => '',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/* Type Logo */
Kirki::add_field( 'maiden', array(
	'section'  => 'header_options',
	'settings' => 'maiden_type_logo',
	'label'    => esc_attr__( 'Type Logo', 'maiden' ),
	'type'     => 'select',
	'priority' => 10,
	'default'  => 'image',
	'choices'     => array(
		'hide' => esc_attr__( 'Hide Logo', 'maiden' ),
		'image' => esc_attr__( 'Image Logo', 'maiden' ),
		'text' => esc_attr__( 'Text Logo', 'maiden' )
	),
) );

/* Image Logo */
Kirki::add_field( 'maiden', array(
	'section'     => 'header_options',
	'settings'    => 'maiden_logo_image',
	'type'        => 'image',
	'label'       => esc_attr__( 'Image Logo', 'maiden' ),
	'default'     => '',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'maiden_type_logo',
			'operator' => '==',
			'value'    => 'image',
		),
	),
) );

/* Text Logo */
Kirki::add_field( 'maiden', array(
	'section'     => 'header_options',
	'settings'    => 'maiden_logo_text',
	'type'        => 'text',
	'label'       => esc_attr__( 'Text for Logo', 'maiden' ),
	'default'     => 'maiden',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'maiden_type_logo',
			'operator' => '==',
			'value'    => 'text',
		),
	),
) );

Kirki::add_field( 'maiden', array(
	'section'     => 'header_options',
	'settings'    => 'maiden_page_preloader',
	'label'       => esc_attr__( 'Enable preloader', 'maiden' ),
	'type'        => 'switch',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'On', 'maiden' ),
		'off' => esc_attr__( 'Off', 'maiden' ),
	),
) );

Kirki::add_section( 'footer_options', array(
    'panel'          => 'general_options', // Not typically needed.
    'title'          => esc_attr__( 'Footer Options', 'maiden' ),
    'description'    => '',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/* Type Footer Icons  */
Kirki::add_field( 'maiden', array(
	'section'  => 'footer_options',
	'settings' => 'maiden_type_icons',
	'label'    => esc_attr__( 'Type Icons', 'maiden' ),
	'type'     => 'select',
	'priority' => 10,
	'default'  => 'ionicons',
	'choices'     => array(
		'ionicons' => 'Ionicons',
		'fontawesome' => 'Font Awesome',
		'etline' => 'Et-Line',
	),
) );

/* Footer Socials */

$ionicons_icons = array_map(function($a) { return array_keys($a)[0]; }, ionicons_icons());

$ionicons_icons = array_combine($ionicons_icons,$ionicons_icons);

// Ionicons
Kirki::add_field( 'maiden', array(
	'section'     => 'footer_options',
	'settings'    => 'maiden_footer_socials_ionicons',
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Footer Socials Links', 'maiden' ),
	'priority'    => 10,
	'default'     => array( ),
	'fields' => array(
		'link_icon' => array(
		    'section'     => 'footer_options',
		    'type'        => 'select',
		    'settings'    => 'range_font_icon',
		    'label'       => esc_attr__( 'This is the label', 'maiden' ),
		    'description' => esc_attr__( 'This is the control description', 'maiden' ),
		    'help'        => esc_attr__( 'This is some extra help text.', 'maiden' ),
		    'default'     => 'option-1',
		    'priority'    => 10,
		    'choices'     => $ionicons_icons,
		),
		'link_url' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'Link URL', 'maiden' ),
			'description' => esc_attr__( 'This will be the link URL', 'maiden' ),
			'default'     => '',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'maiden_type_icons',
			'operator' => '==',
			'value'    => 'ionicons',
		),
	),
) );

// Font Awesome
Kirki::add_field( 'maiden', array(
	'section'     => 'footer_options',
	'settings'    => 'maiden_footer_socials_fontawesome',
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Footer Socials Links', 'maiden' ),
	'priority'    => 10,
	'default'     => array( ),
	'fields' => array(
		'link_icon' => array(
		    'section'     => 'footer_options',
		    'type'        => 'select',
		    'settings'    => 'range_font_icon',
		    'label'       => esc_attr__( 'This is the label', 'maiden' ),
		    'description' => esc_attr__( 'This is the control description', 'maiden' ),
		    'help'        => esc_attr__( 'This is some extra help text.', 'maiden' ),
		    'default'     => 'option-1',
		    'priority'    => 10,
		    'choices'     => fontawesome_icons(),
		),
		'link_url' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'Link URL', 'maiden' ),
			'description' => esc_attr__( 'This will be the link URL', 'maiden' ),
			'default'     => '',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'maiden_type_icons',
			'operator' => '==',
			'value'    => 'fontawesome',
		),
	),
) );

// Et-Line
$et_line_icons  = array_map(function($a) {  return array_keys($a)[0]; }, et_line_icons());
$et_line_icons = array_combine($et_line_icons,$et_line_icons);
Kirki::add_field( 'maiden', array(
	'section'     => 'footer_options',
	'settings'    => 'maiden_footer_socials_etline',
	'type'        => 'repeater',
	'label'       => esc_attr__( 'Footer Socials Links', 'maiden' ),
	'priority'    => 10,
	'default'     => array( ),
	'fields' => array(
		'link_icon' => array(
		    'section'     => 'footer_options',
		    'type'        => 'select',
		    'settings'    => 'range_font_icon',
		    'label'       => esc_attr__( 'This is the label', 'maiden' ),
		    'description' => esc_attr__( 'This is the control description', 'maiden' ),
		    'help'        => esc_attr__( 'This is some extra help text.', 'maiden' ),
		    'default'     => 'option-1',
		    'priority'    => 10,
		    'choices'     => $et_line_icons,
		),
		'link_url' => array(
			'type'        => 'text',
			'label'       => esc_attr__( 'Link URL', 'maiden' ),
			'description' => esc_attr__( 'This will be the link URL', 'maiden' ),
			'default'     => '',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'maiden_type_icons',
			'operator' => '==',
			'value'    => 'etline',
		),
	),
) );

Kirki::add_field( 'maiden', array(
	'section'     => 'footer_options',
	'settings'    => 'maiden_back_to_top',
	'label'       => esc_attr__( 'Back to top button', 'maiden' ),
	'type'        => 'switch',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'On', 'maiden' ),
		'off' => esc_attr__( 'Off', 'maiden' ),
	),
) );

/* Copyright */
Kirki::add_field( 'maiden', array(
	'section'  => 'footer_options',
	'settings' => 'maiden_copyright_text',
	'label'    => esc_attr__( 'Copyright', 'maiden' ),
	'type'     => 'textarea',
	'priority' => 10,
	'default'  => '&copy; ' . date('Y') . esc_attr__(' maiden. All Rights Reserved', 'maiden' ),
) );

Kirki::add_section( 'onepage_options', array(
    'panel'          => 'general_options',
    'title'          => esc_attr__( 'One Page Options', 'maiden' ),
    'description'    => '',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_field( 'maiden', array(
	'section'     => 'onepage_options',
	'settings'    => 'enable_onepage',
	'label'       => esc_attr__( 'Enable onepage', 'maiden' ),
	'type'        => 'switch',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'yes'  => esc_attr__( 'Yes', 'maiden' ),
		'no' => esc_attr__( 'No', 'maiden' ),
	),
) );

$blog_id = get_option( 'page_for_posts' ) ? get_option( 'page_for_posts' ) : '';

Kirki::add_field( 'maiden', array(
	'section'     => 'onepage_options',
	'settings'    => 'maiden_sortable_pages',
	'label'       => esc_attr__( 'Sortable pages', 'maiden' ),
	'type'        => 'sortable',
	'default'     => array(),
	'choices'     => Kirki_Helper::get_posts(array('post_type'=>'page','posts_per_page'=>'100','exclude'=> $blog_id )),
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'enable_onepage',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

Kirki::add_section( 'parallax_options', array(
    'panel'          => 'general_options',
    'title'          => esc_attr__( 'Parallax Options', 'maiden' ),
    'description'    => '',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_field( 'maiden', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Slider Images/Slide', 'maiden' ),
    'section'     => 'parallax_options',
    'priority'    => 10,
    'settings'    => 'maiden_parallax_images',
    'default'     => array(
        array(
            'image' => get_template_directory_uri() . '/assets/img/slider1.jpg',
        ),
        array(
            'image' => get_template_directory_uri() . '/assets/img/slider2.jpg',
        ),
        array(
            'image' => get_template_directory_uri() . '/assets/img/slider3.jpg',
        ),
    ),
    'fields' => array(
        'image' => array(
            'type'        => 'image',
            'label'       => esc_attr__( 'Slide Image', 'maiden' ),
            'description' => esc_attr__( 'Select slide image', 'maiden' ),
            'default'     => '',
        ),
    )
) );

Kirki::add_section( 'blog_options', array(
    'panel'          => 'general_options',
    'title'          => esc_attr__( 'Blog Options', 'maiden' ),
    'description'    => '',
    'priority'       => 1,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

Kirki::add_field( 'maiden', array(
	'section'     => 'blog_options',
	'settings'    => 'blog_sidebar',
	'label'       => esc_attr__( 'Enable blog page sidebar', 'maiden' ),
	'type'        => 'switch',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'yes'  => esc_attr__( 'Yes', 'maiden' ),
		'no' => esc_attr__( 'No', 'maiden' ),
	),
) );

Kirki::add_field( 'maiden', array(
	'section'     => 'blog_options',
	'settings'    => 'single_post_sidebar',
	'label'       => esc_attr__( 'Enable single post sidebar', 'maiden' ),
	'type'        => 'switch',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'yes'  => esc_attr__( 'Yes', 'maiden' ),
		'no' => esc_attr__( 'No', 'maiden' ),
	),
) );

Kirki::add_field( 'maiden', array(
	'section'     => 'blog_options',
	'settings'    => 'post_navigation',
	'label'       => esc_attr__( 'Show post navigation', 'maiden' ),
	'type'        => 'switch',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'yes'  => esc_attr__( 'Yes', 'maiden' ),
		'no' => esc_attr__( 'No', 'maiden' ),
	),
) );
