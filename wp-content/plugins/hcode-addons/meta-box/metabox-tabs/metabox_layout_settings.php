<?php
/**
 * Metabox For Layout Setting.
 *
 * @package H-Code
 */
?>
<?php

	hcode_meta_box_dropdown(
		'hcode_layout_settings_single',
		esc_html__( 'Sidebar Settings', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'hcode_layout_left_sidebar' => esc_html__( 'Two Columns Left', 'hcode-addons' ),
			'hcode_layout_right_sidebar' => esc_html__( 'Two Columns Right', 'hcode-addons' ),
			'hcode_layout_both_sidebar' => esc_html__( 'Three Columns', 'hcode-addons' ),
			'hcode_layout_full_screen' => esc_html__( 'One Column', 'hcode-addons' )
		)
	);

	$sidebar_array = hcode_registered_sidebars_array();

	hcode_meta_box_dropdown_sidebar(
		'hcode_layout_left_sidebar_single',
		esc_html__( 'Left Sidebar', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select sidebar to display in left column of page', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_layout_settings_single', 'value' => array( 'default', 'hcode_layout_left_sidebar', 'hcode_layout_both_sidebar' ) )
	);
	hcode_meta_box_dropdown_sidebar(
		'hcode_layout_right_sidebar_single',
		esc_html__( 'Right Sidebar', 'hcode-addons' ),
		$sidebar_array,
		esc_html__( 'Select sidebar to display in right column of page', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_layout_settings_single', 'value' => array( 'default', 'hcode_layout_right_sidebar', 'hcode_layout_both_sidebar' ) )
	);

	hcode_meta_box_dropdown(
		'hcode_enable_container_fluid_single',
		esc_html__( 'Enable Container Fluid', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
		)
	);

	hcode_meta_box_upload(
		'hcode_bg_image_single', 
		esc_html__( 'Background Image', 'hcode-addons' ),
		esc_html__( 'Upload the background image that will be displayed in the background for this post/page/portfolio.', 'hcode-addons' ),
		'',
		esc_html__( 'Background Image', 'hcode-addons' ),
		esc_html__( 'Set Background Image', 'hcode-addons' )
	);