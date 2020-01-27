<?php

/*
 * Banner Shortcode
 * Author: ravenbluethemes
 * Author URI: https://themeforest.net/user/ravenbluethemes/portfolio
 * Version: 1.0 
 */

if (function_exists('vc_map')) {
	vc_map( 
		array(
			'name'						=> esc_html__( 'Banner', 'js_composer' ),
			'base'						=> 'vc_banner',
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
                    'param_name' => 'subtitle',
                    'type' => 'textfield',
                    'description' => '',
                    'heading' => 'Subtitle',
                    'value' => ''
                  ), 
                  array (
                    'param_name' => 'typed_text',
                    'type' => 'param_group',
                    'description' => '',
                    'heading' => 'Typed Text',
                    'params' => 
                    array ( 
                      array (
                        'param_name' => 'text',
                        'type' => 'textfield',
                        'description' => '',
                        'heading' => 'Name',
                        'value' => '',
                        'parent' => 'typed_text'
                      ),
                    ),
                  ), 
                  array (
                    'param_name' => 'show_arrow',
                    'type' => 'checkbox',
                    'description' => '',
                    'heading' => 'Show arrow',
                    'value' => ''
                  ), 
                  array (
                    'param_name' => 'arrow_link',
                    'type' => 'textfield',
                    'description' => '',
                    'heading' => 'Arrow Link',
                    'value' => '',
                    'dependency'  => array(
                        'element' => 'show_arrow',
                        'not_empty' => true
                    ),
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
	class WPBakeryShortCode_vc_banner extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
						'title'	=> '',
						'subtitle'	=> '',
                        'typed_text'  => '',
                        'show_arrow'    => '',
						'arrow_link'	=> '',
						'el_class'	=> '',
						'css'	=> '',
			
			), $atts ) );
			/* get param class */
			$wrap_class  = !empty( $el_class ) ? $el_class : '';
			/* get custum css as class*/
			$wrap_class .= vc_shortcode_custom_css_class( $css, ' ' );
			
			// start output
			ob_start(); 
			if( !empty($wrap_class) ): ?>
			<div class="<?php echo esc_attr( $wrap_class ); ?>">
			<?php endif; ?>
				<div id="main-top" class="main-top">
                    <div class="main-content">
                    	<div class="container content">
                    		<div class="row text-center">
                    		    
                    		    <?php if(!empty($title)) : ?>
                                <h2><?php echo $title; ?></h2>
                                <?php endif; ?>
                                
                    			<?php if(!empty($subtitle)) : ?>
                                <h1><?php echo esc_html($subtitle); ?> <span class="text"></span></h1>
                                <?php endif; ?> 
                    			
                    		</div>
                    		<?php if(!empty($show_arrow)) : ?>
                    	    <div class="text-center">
                    	        <a href="<?php echo esc_url( $arrow_link ); ?>" class="scroll-down"></a>
                    	    </div>
                    	    <?php endif; ?> 
                    	</div>
                    </div>
                </div>
                <script type='text/javascript'>
                    var $ = jQuery.noConflict();

                    jQuery(function($) {
                        $(".text").typed({
                            strings: [<?php if(!empty($typed_text)): $typed_text = json_decode( urldecode( $typed_text ) ); foreach ($typed_text as $item):
                            if(!empty($item->text)) : echo "'" . esc_html($item->text) . "', "; endif;
                            endforeach; endif; ?>],
                            // Typing speed
                            typeSpeed: 100,
                            // Time before typing starts
                            startDelay: 1000,
                            // Backspacing speed
                            backSpeed: 50,
                            // Time before backspacing
                            backDelay: 2000,
                            // Loop
                            loop: true
                        });
                    });
                </script>
			<?php if( !empty($wrap_class) ): ?>
			</div>
			<?php endif; 
			// end output
			return ob_get_clean();
		}
	}
}
