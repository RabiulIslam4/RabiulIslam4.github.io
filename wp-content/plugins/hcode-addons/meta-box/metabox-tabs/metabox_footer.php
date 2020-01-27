<?php
/**
 * Metabox For Footer.
 *
 * @package H-Code
 */
?>
<?php 
	hcode_meta_box_dropdown(
		'hcode_enable_page_footer_single',
		esc_html__( 'Enable Footer?', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		)
	);
	hcode_meta_box_dropdown(
		'hcode_enable_sidebar_section_single',
		esc_html__( 'Enable Footer Information Links Block', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_enable_page_footer_single', 'value' => array( 'default', '1' ) )
	);

	$sidebar_array = hcode_registered_sidebars_array();

	hcode_meta_box_dropdown_sidebar(
		'hcode_footer_sidebar_1_single',
		esc_html__( 'Information Block', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select custom sidebar', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_sidebar_section_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown_sidebar(
		'hcode_footer_sidebar_2_single',
		esc_html__( 'Link Block 1', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select custom sidebar', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_sidebar_section_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown_sidebar(
		'hcode_footer_sidebar_3_single',
		esc_html__( 'Link Block 2', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select custom sidebar', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_sidebar_section_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown_sidebar(
		'hcode_footer_sidebar_4_single',
		esc_html__( 'Link Block 3', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select custom sidebar', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_sidebar_section_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown_sidebar(
		'hcode_footer_sidebar_5_single',
		esc_html__( 'Link Block 4', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select custom sidebar', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_sidebar_section_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_footer_menu_single',
		esc_html__( 'Enable Footer Menu', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_enable_page_footer_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown_menu(
		'hcode_footer_menu_single',
		esc_html__( 'Select Footer Menu', 'hcode-addons' ),
		'',
		'',
		array( 'element' => 'hcode_enable_footer_menu_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_social_icons_single',
		esc_html__( 'Enable Social Icons', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		'',
		'',
		array( 'element' => 'hcode_enable_page_footer_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown_sidebar(
		'hcode_social_sidebar_single',
		esc_html__( 'Social Sidebar', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select custom sidebar', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_social_icons_single', 'value' => array( 'default', '1' ) )
	);