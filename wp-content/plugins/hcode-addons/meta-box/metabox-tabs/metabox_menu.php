<?php
/**
 * Metabox For Header.
 *
 * @package H-Code
 */
?>
<?php 
	hcode_meta_box_dropdown(
		'hcode_enable_menu_single',
		esc_html__( 'Enable Menu', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		)
	);
	hcode_meta_box_dropdown_menu(
		'hcode_header_menu_single',
		esc_html__( 'Select Primary Menu', 'hcode-addons' ),
		'',
		esc_html__( 'You can manage menu using Appearance > Menus', 'hcode-addons' ),
		array( 'element' => 'hcode_enable_menu_single', 'value' => array( 'default', '1' ) )
	);
	hcode_meta_box_dropdown_menu(
		'hcode_header_secondary_menu_single',
		esc_html__( 'Select Secondary Menu', 'hcode-addons' ),
		'',
		esc_html__( 'You can manage menu using Appearance > Menus', 'hcode-addons' ),
		array( 'element' => 'hcode_enable_menu_single', 'value' => array( 'default', '1' ) )
	);