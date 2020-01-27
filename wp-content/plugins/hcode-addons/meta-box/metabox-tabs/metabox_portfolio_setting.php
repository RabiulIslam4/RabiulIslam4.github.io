<?php
/**
 * Metabox For Portfolio Setting.
 *
 * @package H-Code
 */
?>
<?php 

	hcode_meta_box_text(
		'hcode_subtitle_single',
		esc_html__( 'Title on Hover', 'hcode-addons' ),
		esc_html__( 'This title will be displayed on hover of the portfolio image', 'hcode-addons' )
	);
	hcode_meta_box_dropdown( 
		'hcode_enable_ajax_popup_single',
		esc_html__( 'Enable Ajax Popup', 'hcode-addons' ),
		array(
			'no' => esc_html__( 'No', 'hcode-addons' ),
			'yes' => esc_html__( 'Yes', 'hcode-addons' ),
		)
	);
	hcode_meta_box_textarea(
		'hcode_quote_single',
		esc_html__( 'Blockquote', 'hcode-addons' ),
		esc_html__( 'Add block quote content', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_image_single',
		esc_html__( 'Featured Image in Portfolio Page', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Select a image', 'hcode-addons' ),
			'no' => esc_html__( 'No', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
		),
		esc_html__( 'Select No if you do not want to show featured image in the portfolio detail page.', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_featured_image_single',
		esc_html__( 'Featured Image in Portfolio Page', 'hcode-addons' ),
		array(
			'no' => esc_html__( 'No', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
		),
		esc_html__( 'Select No if you do not want to show featured image in the portfolio detail page.', 'hcode-addons' )
	);

	hcode_meta_box_upload_multiple(
		'hcode_gallery_single', 
		esc_html__( 'Images', 'hcode-addons' ),
		esc_html__( 'Upload / select multiple images to build a gallery', 'hcode-addons' ),
		'',
		'',
		esc_html__( 'Image', 'hcode-addons' ),
		esc_html__( 'Set images to build a gallery', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_link_type_single',
		esc_html__( 'Link Type', 'hcode-addons' ),
		array(
			'external' => esc_html__( 'External Url', 'hcode-addons' ),
			'ajax-popup' => esc_html__( 'Ajax Popup', 'hcode-addons' ),
		),
		esc_html__('Select link type', 'hcode-addons')
	);
	hcode_meta_box_dropdown(
		'hcode_link_target_single',
		esc_html__( 'Link Target', 'hcode-addons' ),
		array(
			'_self' => esc_html__( 'Same window / tab', 'hcode-addons' ),
			'_blank' => esc_html__( 'New window / tab', 'hcode-addons' ),
		),
		esc_html__( 'Select link target. This setting will be applicable when link type is set to External URL', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_show_lightbox_popup_single',
		esc_html__( 'Enable Lightbox Popup', 'hcode-addons' ),
		array(
			'yes' => esc_html__( 'Yes', 'hcode-addons' ),
			'no' => esc_html__( 'No', 'hcode-addons' ),
		)
	);
	hcode_meta_box_text(
		'hcode_link_single',
		esc_html__( 'External Link', 'hcode-addons' ),
		esc_html__( 'Add external link', 'hcode-addons' ),
		'',
		esc_html__( 'select_link', 'hcode-addons' )
	);
	hcode_meta_box_text(
		'hcode_video_single',
		esc_html__( 'Add Youtube/Vimeo Url', 'hcode-addons' ),
		esc_html__( 'Video url is required here if external url option is selected.', 'hcode-addons' ),
		esc_html__( 'Add YOUTUBE VIDEO URL like https://www.youtube.com/watch?v=xxxxxxxxxx, you will get this from youtube video url. or add VIMEO VIDEO EMBED URL like https://player.vimeo.com/video/xxxxxxxx, you will get this from vimeo embed iframe src code', 'hcode-addons' ),
		esc_html__( 'select_video', 'hcode-addons' )
	);