<?php
/**
 * Metabox For Title Wrapper.
 *
 * @package H-Code
 */
?>
<?php

	hcode_meta_box_dropdown(
		'hcode_enable_title_wrapper_single',
		esc_html__( 'Enable Title', 'hcode-addons' ),
		array(
			'1' => esc_html__( 'Default', 'hcode-addons' ),
			'2' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		esc_html__( 'If on, a title will display in page', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_page_title_premade_style_single',
		esc_html__( 'Title Template Style', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
            'title-white' => esc_html__( 'Title White', 'hcode-addons' ),
			'title-gray' => esc_html__( 'Title Gray', 'hcode-addons' ),
			'title-dark-gray' => esc_html__( 'Title Dark Gray', 'hcode-addons' ),
			'title-black' => esc_html__( 'Title Black', 'hcode-addons' ),
			'title-with-image' => esc_html__( 'Title With Image', 'hcode-addons' ),
			'title-large' => esc_html__( 'Title Large', 'hcode-addons' ),
			'title-large-without-overlay' => esc_html__( 'Title Large Without Overlay', 'hcode-addons' ),
			'title-small-white' => esc_html__( 'Title Small White', 'hcode-addons' ),
			'title-small-gray' => esc_html__( 'Title Small Gray', 'hcode-addons' ),
			'title-small-dark-gray' => esc_html__( 'Title Small Dark Gray', 'hcode-addons' ),
			'title-small-black' => esc_html__( 'Title Small Black', 'hcode-addons' ),
			'title-center-align' => esc_html__( 'Title Center Align', 'hcode-addons' ),
		),
		esc_html__( 'Choose template style for the title', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_enable_title_wrapper_single', 'value' => array( '1', '2' ) )
	);
	hcode_meta_box_text(
		'hcode_header_subtitle_single',
		esc_html__( 'Subtitle', 'hcode-addons' ),
		'',
		'',
		'',
		array( 'element' => 'hcode_page_title_premade_style_single', 'value' => array( 'default', 'title-white', 'title-gray', 'title-dark-gray', 'title-black', 'title-with-image', 'title-large', 'title-large-without-overlay', 'title-center-align' ) )
	);
	hcode_meta_box_upload(
		'hcode_title_background_single', 
		esc_html__( 'Title Background Image', 'hcode-addons' ),
		esc_html__( 'Recommended image size (1920px X 700px) for better result.', 'hcode-addons' ),
		array( 'element' => 'hcode_page_title_premade_style_single', 'value' => array( 'default', 'title-with-image', 'title-large', 'title-large-without-overlay' ) ),
		esc_html__( 'Title Background Image', 'hcode-addons' ),
		esc_html__( 'Set Title Background Image', 'hcode-addons' )
	);

	hcode_meta_box_dropdown(
		'hcode_title_parallax_effect_single',
		esc_html__( 'Parallax effect', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'no-effect' => esc_html__( 'No Effect', 'hcode-addons' ),
			'parallax1' => esc_html__( 'parallax-effect-1', 'hcode-addons' ),
			'parallax2' => esc_html__( 'parallax-effect-2', 'hcode-addons' ),
			'parallax3' => esc_html__( 'parallax-effect-3', 'hcode-addons' ),
			'parallax4' => esc_html__( 'parallax-effect-4', 'hcode-addons' ),
			'parallax5' => esc_html__( 'parallax-effect-5', 'hcode-addons' ),
			'parallax6' => esc_html__( 'parallax-effect-6', 'hcode-addons' ),
			'parallax7' => esc_html__( 'parallax-effect-7', 'hcode-addons' ),
			'parallax8' => esc_html__( 'parallax-effect-8', 'hcode-addons' ),
			'parallax9' => esc_html__( 'parallax-effect-9', 'hcode-addons' ),
			'parallax10' => esc_html__( 'parallax-effect-10', 'hcode-addons' ),
			'parallax11' => esc_html__( 'parallax-effect-11', 'hcode-addons' ),
			'parallax12' => esc_html__( 'parallax-effect-12', 'hcode-addons' )
		),
		esc_html__( 'Choose parallax effect', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_page_title_premade_style_single', 'value' => array( 'default', 'title-with-image', 'title-large', 'title-large-without-overlay' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_page_title_show_breadcrumb_single',
		esc_html__( 'Enable Breadcrumb', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		esc_html__( 'If on, breadcrumb will display in title section', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_page_title_premade_style_single', 'value' => array( 'default', 'title-white', 'title-gray', 'title-dark-gray', 'title-black', 'title-with-image', 'title-small-white', 'title-small-gray', 'title-small-dark-gray', 'title-small-black' ) )
	);
	hcode_meta_box_dropdown(
		'hcode_page_title_show_separator_single',
		esc_html__( 'Enable Separator', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' )
		),
		esc_html__( 'If on, separator will display in title section', 'hcode-addons' ),
		'',
		array( 'element' => 'hcode_page_title_premade_style_single', 'value' => array( 'default', 'title-white', 'title-gray', 'title-dark-gray', 'title-black', 'title-with-image', 'title-large', 'title-large-without-overlay', 'title-small-white', 'title-small-gray', 'title-small-dark-gray', 'title-small-black', 'title-center-align' ) )
	);
	hcode_meta_box_colorpicker(
		'hcode_bg_page_title_color_single',
		esc_html__( 'Background', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_bg_page_title_opacity_single',
		esc_html__( 'Opacity', 'hcode-addons' ),
		array(
			'default' => esc_html__( 'Default', 'hcode-addons' ),
			'0.1' => '0.1',
            '0.2' => '0.2',
            '0.3' => '0.3',
            '0.4' => '0.4',
            '0.5' => '0.5',
            '0.6' => '0.6',
            '0.7' => '0.7',
            '0.8' => '0.8',
            '0.9' => '0.9',
            '1.0' => '1.0',
		),
		'',
		'',
		array( 'element' => 'hcode_page_title_premade_style_single', 'value' => array( 'default', 'title-with-image', 'title-large' ) )
	);
	hcode_meta_box_colorpicker(
		'hcode_page_title_title_color_single',
		esc_html__( 'Title Color', 'hcode-addons' )
	);
	hcode_meta_box_colorpicker(
		'hcode_page_title_subtitle_color_single',
		esc_html__( 'Subtitle Color', 'hcode-addons' )
	);
	hcode_meta_box_colorpicker(
		'hcode_page_title_sep_color_single',
		esc_html__( 'Separator Color', 'hcode-addons' )
	);
	hcode_meta_box_colorpicker(
		'hcode_page_title_breadcrumb_color_single',
		esc_html__( 'Breadcrumb Color', 'hcode-addons' )
	);
	hcode_meta_box_colorpicker(
		'hcode_page_title_breadcrumb_hover_color_single',
		esc_html__( 'Breadcrumb Hover Color', 'hcode-addons' )
	);