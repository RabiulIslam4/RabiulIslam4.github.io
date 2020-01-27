<?php
/**
 * Metabox For Footer Wrapper.
 *
 * @package H-Code
 */
?>
<?php
	hcode_meta_box_dropdown(
		'hcode_enable_footer_wrapper_single',
		esc_html__( 'Enable Footer Wrapper', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		esc_html__( 'Select enable footer wrapper', 'hcode-addons' )
	);