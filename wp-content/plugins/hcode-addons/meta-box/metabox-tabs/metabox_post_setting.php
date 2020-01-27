<?php
/**
 * Metabox For Post Setting.
 *
 * @package H-Code
 */
?>
<?php

	hcode_meta_box_dropdown(
		'hcode_image_single',
		esc_html__( 'Featured Image in Post Page', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Select a image', 'hcode-addons' ),
			'no' => esc_html__( 'No', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
		),
		esc_html__( 'Select No if you do not want to show featured image in the post detail page', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_featured_image_single',
		esc_html__( 'Featured Image in Post Page', 'hcode-addons' ),
		array(
			'no' => esc_html__( 'No', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
		),
		esc_html__( 'Select No if you do not want to show featured image in the post detail page.', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_post_title_single',
		esc_html__( 'Post title in post page', 'hcode-addons' ),
		array(
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'no' => esc_html__( 'No', 'hcode-addons' ),
		),
		esc_html__( 'Select Yes if you want to show title in the post detail page.', 'hcode-addons' )
	);
	hcode_meta_box_textarea(
		'hcode_quote_single',
		esc_html__( 'Blockquote', 'hcode-addons' ),
		esc_html__( 'Add block quote content', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_lightbox_image_single',
		esc_html__( 'List Type', 'hcode-addons' ),
		array(
			'1' => esc_html__( 'Lightbox', 'hcode-addons' ),
			'0' => esc_html__( 'Slider', 'hcode-addons' ),
		),
		esc_html__( 'Select listing type', 'hcode-addons' )
	);
	hcode_meta_box_upload_multiple(
		'hcode_gallery_single', 
		esc_html__( 'Images', 'hcode-addons' ),
		esc_html__( 'Upload / select multiple images to build a gallery', 'hcode-addons' ),
		'',
		'',
		esc_html__( 'Image', 'hcode-addons' ),
		esc_html__( 'Set images to build a gallery/slider', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_link_type_single',
		esc_html__( 'Link Type', 'hcode-addons' ),
		array(
			'external' => esc_html__( 'External Url', 'hcode-addons' ),
			'ajax-popup' => esc_html__( 'Ajax Popup', 'hcode-addons' ),
		),
		esc_html__( 'Select link type', 'hcode-addons' )
	);
	hcode_meta_box_text(
		'hcode_link_single',
		esc_html__( 'External Link', 'hcode-addons' ),
		esc_html__( 'Add external link', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_video_type_single',
		esc_html__( 'Video Type', 'hcode-addons' ),
		array(
			'' => esc_html__( 'Select Video Type', 'hcode-addons' ),
			'self' => esc_html__( 'Self Hosted', 'hcode-addons' ),
			'external' => esc_html__( 'External Url', 'hcode-addons' ),
		),
		esc_html__( 'Select video type', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_mute_single',
		esc_html__( 'Enable Video Mute', 'hcode-addons' ),
		array(
			'0' => esc_html__( 'No', 'hcode-addons' ),
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
		),
		esc_html__( 'Select yes to mute video sound.', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_loop_single',
		esc_html__( 'Enable Video Loop', 'hcode-addons' ),
		array(
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' ),
		),
		esc_html__( 'Select yes to loop video.', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_autoplay_single',
		esc_html__( 'Enable Video Autoplay', 'hcode-addons' ),
		array(
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' ),
		),
		esc_html__( 'Select yes to autoplay video.', 'hcode-addons' )
	);
	hcode_meta_box_dropdown(
		'hcode_enable_controls_single',
		esc_html__( 'Enable Video Controls', 'hcode-addons' ),
		array(
			'1' => esc_html__( 'Yes', 'hcode-addons' ),
			'0' => esc_html__( 'No', 'hcode-addons' ),
		),
		esc_html__( 'Select yes to add controls in video.', 'hcode-addons' )
	);
	hcode_meta_box_text(
		'hcode_video_mp4_single',
		esc_html__( 'MP4 Video URL', 'hcode-addons' ),
		esc_html__( 'Video url is required here if self hosted option is selected', 'hcode-addons' )
	);
	hcode_meta_box_text(
		'hcode_video_ogg_single',
		esc_html__( 'OGG Video URL', 'hcode-addons' ),
		esc_html__( 'Video url is required here if self hosted option is selected', 'hcode-addons' )
	);
	hcode_meta_box_text(
		'hcode_video_webm_single',
		esc_html__( 'WEBM Video URL', 'hcode-addons' ),
		esc_html__( 'Video url is required here if self hosted option is selected', 'hcode-addons' )
	);
	hcode_meta_box_text(
		'hcode_video_single',
		esc_html__( 'Add Youtube/Vimeo Embed Url', 'hcode-addons' ),
		esc_html__( 'Video url is required here if external url option is selected.', 'hcode-addons' ),
		esc_html__( 'Add YOUTUBE VIDEO EMBED URL like https://www.youtube.com/embed/xxxxxxxxxx, you will get this from youtube embed iframe src code. or add VIMEO VIDEO EMBED URL like https://player.vimeo.com/video/xxxxxxxx, you will get this from vimeo embed iframe src code.', 'hcode-addons' )
	);