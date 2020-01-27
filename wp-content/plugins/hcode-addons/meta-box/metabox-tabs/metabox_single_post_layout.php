<?php
/**
 * Metabox For Single Post Layout.
 *
 * @package H-Code
 */
?>
<?php 

	if( $post->post_type == 'post' ) {
		hcode_meta_box_dropdown(
			'hcode_single_layout_settings_single',
			esc_html__( 'Single Post Layout Settings', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'hcode_single_layout_standard' => esc_html__( 'Standard', 'hcode-addons' ),
				'hcode_single_layout_full_width' => esc_html__( 'Full width header', 'hcode-addons' ),
				'hcode_single_layout_full_width_image_slider' => esc_html__( 'Full width with image slider', 'hcode-addons' ),
				'hcode_single_layout_full_width_lightbox' => esc_html__( 'Full width with lightbox gallery', 'hcode-addons' )
			),
			esc_html__( 'Select main content and sidebar alignment. Choose between 1 or 2 column layout.', 'hcode-addons' )
		);

		hcode_meta_box_dropdown(
			'hcode_enable_related_posts_single',
			esc_html__( 'Enable Recent Post', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable recent post', 'hcode-addons' )
		);

		hcode_meta_box_dropdown(
			'hcode_enable_navigation_single',
			esc_html__( 'Enable Navigation Post', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable navigation post', 'hcode-addons' )
		);
		
		hcode_meta_box_dropdown(
			'hcode_enable_meta_tags_single',
			esc_html__( 'Enable Post Meta Tags', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable post meta tags', 'hcode-addons' )
		);
		
		hcode_meta_box_dropdown(
			'hcode_enable_post_author_single',
			esc_html__( 'Enable Post Author', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable post author', 'hcode-addons' )
		);
		hcode_meta_box_dropdown(
			'hcode_social_icons_single',
			esc_html__( 'Enable Social Icons', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable social icons', 'hcode-addons' )
		);
	} else {

		hcode_meta_box_dropdown(
			'hcode_enable_related_portfolio_posts_single',
			esc_html__( 'Enable Recent Project', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
			),
			esc_html__( 'Enable recent project', 'hcode-addons' )
		);

		hcode_meta_box_dropdown(
			'hcode_enable_navigation_portfolio_single',
			esc_html__( 'Enable Navigation Portfolio', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable navigation portfolio', 'hcode-addons' )
		);
		hcode_meta_box_dropdown(
			'hcode_enable_meta_tags_portfolio_single',
			esc_html__( 'Enable Post Meta Tags', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable post meta tags', 'hcode-addons' )
		);
		hcode_meta_box_dropdown(
			'hcode_enable_post_author_portfolio_single',
			esc_html__( 'Enable Post Author', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable post author', 'hcode-addons' )
		);
		hcode_meta_box_dropdown(
			'hcode_social_icons_portfolio_single',
			esc_html__( 'Enable Social Icons', 'hcode-addons' ),
			array(
				'default' => esc_html__( 'Default', 'hcode-addons' ),
				'1' => esc_html__( 'Yes', 'hcode-addons' ),
				'0' => esc_html__( 'No', 'hcode-addons' )
			),
			esc_html__( 'Enable social icons', 'hcode-addons' )
		);
	}