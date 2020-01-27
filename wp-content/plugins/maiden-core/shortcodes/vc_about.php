<?php

/*
 * About Shortcode
 * Author: ravenbluethemes
 * Author URI: https://themeforest.net/user/ravenbluethemes/portfolio
 * Version: 1.0 
 */

if (function_exists('vc_map')) {
	vc_map( 
		array(
			'name'						=> esc_html__( 'About', 'js_composer' ),
			'base'						=> 'vc_about',
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
					'type' => 'textfield',
					'heading' => 'Extra class name',
					'param_name' => 'el_class',
					'description' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.',
					'value' => ''
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
	class WPBakeryShortCode_vc_about extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'title' => '',
				'el_class'	=> '',
				'css'	=> '',
			
			), $atts ) );
			/* get param class */
			$wrap_class  = !empty( $el_class ) ? $el_class : '';
			/* get custum css as class*/
			$wrap_class .= vc_shortcode_custom_css_class( $css, ' ' );
			
			// start output
			ob_start(); ?>
			<div class="<?php echo esc_attr( $wrap_class ); ?> about">
				<div class="container">
					<div class="section-heading">
						<h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo esc_html($title); ?></h2>
					</div>
					<div class="section-content text-center">

						<?php if(!empty($content)) : ?>
						<p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"><?php echo wp_kses_post( do_shortcode( $content ) ); ?></p>
						<?php endif; ?>
						
					</div>
				</div>
			</div>
			<?php
			// end output
			return ob_get_clean();
		}
	}
}
