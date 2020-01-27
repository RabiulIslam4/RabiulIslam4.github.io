<?php

/*
 * About Box Shortcode
 * Author: ravenbluethemes
 * Author URI: https://themeforest.net/user/ravenbluethemes/portfolio
 * Version: 1.0 
 */

if (function_exists('vc_map')) {
	vc_map( 
		array(
			'name'						=> esc_html__( 'About Box', 'js_composer' ),
			'base'						=> 'vc_about_box',
			'content_element'			=> true,
			'show_settings_on_create'	=> true,
			'description'				=> esc_html__( '', 'js_composer'),
			'params'					=> array (
				array (
				    'param_name' => 'title',
				    'type' => 'textfield',
				    'description' => '',
				    'heading' => 'Title',
				    'value' => ''
				),
				array (
					'param_name' => 'content',
					'type' => 'textarea_html',
					'description' => '',
					'heading' => 'Content',
					'value' => ''
				), 
				array (
					'param_name' => 'background_color',
					'type' => 'colorpicker',
					'description' => '',
					'heading' => 'Background Color',
					'value' => '#AD00FF'
				),
				array (
					'type' => 'css_editor',
					'heading' => 'CSS box',
					'param_name' => 'css',
					'group' => 'Design options'
				),
			)
			//end params
		) 
	);
}

if (class_exists('WPBakeryShortCode')) {
	/* Frontend Output Shortcode */
	class WPBakeryShortCode_vc_about_box extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'title'	=> '',
				'background_color' => '',
				'el_class'	=> '',
				'css'	=> '',
			
			), $atts ) );
			
			// start output
			ob_start(); ?>
			<div class="box" style="background-color: <?php echo esc_attr( $background_color ); ?>">
				<?php if(!empty($title)) : ?>
				<h3><?php echo esc_html($title); ?></h3>
				<?php endif; ?>

				<?php if(!empty($content)) : ?>
				<p><?php echo wp_kses_post(do_shortcode($content)); ?></p>
				<?php endif; ?>
			</div>
			<?php
			// end output
			return ob_get_clean();
		}
	}
}
