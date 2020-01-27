<?php
/**
 * Metabox For Header.
 *
 * @package H-Code
 */
?>
<?php 
	
	hcode_meta_box_dropdown(
		'hcode_enable_header_single',
		esc_html__( 'Enable Header', 'hcode-addons' ),
		array( 
			'2' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		)
	);
	hcode_meta_box_dropdown(
		'hcode_header_layout_single',
		esc_html__( 'Select a Header Style', 'hcode-addons' ),
		hcode_addons_get_header_layout( 'meta_fields' )
	);
	hcode_meta_box_dropdown(
		'hcode_non_sticky_menu_single',
		esc_html__( 'Non Sticky', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype1', 'headertype2', 'headertype3', 'headertype4', 'headertype5', 'headertype6', 'headertype7', 'headertype10', 'headertype11' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_top_header_space_single',
		esc_html__( 'Add Top Header Space', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype1','headertype3', 'headertype4', 'headertype10' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_remove_top_header_space_single',
		esc_html__( 'Remove Top Header Space', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype2','headertype5', 'headertype6', 'headertype7', 'headertype8', 'headertype9', 'headertype11' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_header_text_color_single',
		esc_html__( 'Header Text Color', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'nav-black' => esc_html__( 'Black', 'hcode-addons' ),
			'nav-white' => esc_html__( 'White', 'hcode-addons' ),
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype1', 'headertype2', 'headertype3', 'headertype4', 'headertype5', 'headertype6', 'headertype7', 'headertype8', 'headertype9', 'headertype10', 'headertype11' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_header_logo_position_single',
		esc_html__( 'Header Logo Position', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'left' => esc_html__( 'Left', 'hcode-addons' ),
			'center' => esc_html__( 'Center', 'hcode-addons' ),
			'top' => esc_html__( 'Top', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype1', 'headertype2', 'headertype3', 'headertype4', 'headertype5', 'headertype6', 'headertype7', 'headertype8' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_header_full_width_single',
		esc_html__( 'Enable Header Full Width', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype1', 'headertype2', 'headertype3', 'headertype4', 'headertype5', 'headertype6', 'headertype7', 'headertype8' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_header_menu_position_single',
		esc_html__( 'Header Menu Position', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'menu-left-align' => esc_html__( 'Left', 'hcode-addons' ),
			'menu-center-align' => esc_html__( 'Center', 'hcode-addons' ),
			'menu-right-align' => esc_html__( 'Right', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_logo_position_single', 'value' => array( 'default','left' ) )
	);
	hcode_meta_box_upload(
		'hcode_menu_image_single',
		esc_html__( 'Menu Background Image', 'hcode-addons' ),
		esc_html__( 'Upload the logo that will be displayed in the background', 'hcode-addons' ),
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype10', 'headertype11' ) ),
		esc_html__( 'Menu Background Image', 'hcode-addons' ),
		esc_html__( 'Set Menu Background Image', 'hcode-addons' )
	);
	hcode_meta_box_upload(
		'hcode_menu_logo_single',
		esc_html__( 'Menu Logo', 'hcode-addons' ),
		esc_html__( 'Upload a logo used in menu style.', 'hcode-addons' ),
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype10' ) ),
		esc_html__( 'Menu Logo', 'hcode-addons' ),
		esc_html__( 'Set Menu Logo', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_menu_social_icons_single',
		esc_html__( 'Enable Menu Social Icons', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype9', 'headertype10', 'headertype11' ) )
	);

	$sidebar_array = hcode_registered_sidebars_array();

	hcode_meta_box_dropdown_sidebar(
		'hcode_menu_social_sidebar_single',
		esc_html__( 'Menu Social Sidebar', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select custom sidebar', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_menu_social_icons_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_menu_separator_single',
		esc_html__( 'Enable Menu Separator', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_header_layout_single', 'value' => array( 'default', 'headertype11' ) )
	);
	hcode_meta_box_upload(
		'hcode_header_logo_single', 
		esc_html__( 'Logo', 'hcode-addons' ),
		esc_html__( 'Upload the logo that will be displayed in the header', 'hcode-addons' ),
		'',
		esc_html__( 'Logo', 'hcode-addons' ),
		esc_html__( 'Set Logo', 'hcode-addons' )
	);
	hcode_meta_box_upload(
		'hcode_header_light_logo_single', 
		esc_html__( 'Logo (Light)', 'hcode-addons' ),
		esc_html__( 'Upload a light version of logo used in dark backgrounds header template.', 'hcode-addons' ),
		'',
		esc_html__( 'Light Logo', 'hcode-addons' ),
		esc_html__( 'Set Light Logo', 'hcode-addons' )
	);
	hcode_meta_box_upload(
		'hcode_retina_logo_single', 
		esc_html__( 'Retina Logo', 'hcode-addons' ),
		esc_html__( 'Optional retina version displayed in devices with retina display (high resolution display).', 'hcode-addons' ),
		'',
		esc_html__( 'Retina Logo', 'hcode-addons' ),
		esc_html__( 'Set Retina Logo', 'hcode-addons' )
	);
	hcode_meta_box_upload(
		'hcode_retina_logo_light_single', 
		esc_html__( 'Retina Logo (Light)', 'hcode-addons' ),
		esc_html__(' (Upload a light version of logo) optional retina version displayed in devices with retina display (high resolution display).', 'hcode-addons' ),
		'',
		esc_html__( 'Light Retina Logo', 'hcode-addons' ),
		esc_html__( 'Set Light Retina Logo', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_header_search_single',
		esc_html__( 'Search Modules', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		esc_html__( 'If on, a search module will be displayed in header section.', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_header_cart_single',
		esc_html__( 'Cart Module', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		esc_html__( 'If on, a cart module will be displayed in header section. It will only work if Woocommerce plugin is installed and active.', 'hcode-addons' )
	);