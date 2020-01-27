<?php
/**
 * Metabox For Content.
 *
 * @package H-Code
 */
?>
<?php 
	if( $post->post_type == 'post' ) {
		hcode_meta_box_dropdown(
			'hcode_enable_post_comment_single',
			esc_html__( 'Enable Comments', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Select enable post comments', 'hcode-addons' )
		);
	} elseif( $post->post_type == 'portfolio' ) {

		hcode_meta_box_dropdown(
			'hcode_enable_portfolio_comment_single',
			esc_html__( 'Enable Comments', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Select enable portfolio comments', 'hcode-addons' )
		);
	} else {
		hcode_meta_box_dropdown(
			'hcode_enable_page_comment_single',
			esc_html__( 'Enable Comments', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Select enable page comments.', 'hcode-addons' )
		);
	}