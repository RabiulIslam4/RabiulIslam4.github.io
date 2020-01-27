<?php
/**
 * Shortcode For Blockquote
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blockquote */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_blockquote_shortcode' ) ) {
	function hcode_blockquote_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'id' => '',
	        	'class' => '',
	        	'hcode_blockquote_heading' => '',
	            'blockquote_icon' => '',
				'hcode_blockquote_bg_color' => '',
			    'hcode_blockquote_color' => '',
			    'hcode_border_position' => '',
				'hcode_border_color' => '',
			    'hcode_border_size' => '',
			    'hcode_border_type' => '',
			    'desktop_padding' => '',
			    'custom_desktop_padding' => '',
	            'desktop_margin' => '',
	            'custom_desktop_margin' => '',
			    'hcode_responsive_font' => '',
	        	'hcode_responsive_font_content' => '',
	        ), $atts ) );

		global $font_settings_array;
		$output = $border_attr = $style_footer_atrr = $style_atrr = $responsive_id = $responsive_class = $content_responsive_id = $content_responsive_class = $responsive_class = $content_responsive_style = '';

		$id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? ' '.$class : '';
		$hcode_blockquote_heading = ( $hcode_blockquote_heading ) ? $hcode_blockquote_heading : '';
		$hcode_blockquote_bg_color = ( $hcode_blockquote_bg_color ) ? ' background: none repeat scroll 0 0 '.$hcode_blockquote_bg_color.';' : '';
		$hcode_blockquote_color = ( $hcode_blockquote_color ) ? 'color: '.$hcode_blockquote_color.';' : '';
		$hcode_border_position = ( $hcode_border_position ) ? ' '.$hcode_border_position : '';
		$hcode_border_color = ( $hcode_border_color ) ? $hcode_border_color.';' : '';
		$hcode_border_size = ( $hcode_border_size ) ? $hcode_border_size : '';
		$hcode_border_type = ( $hcode_border_type ) ? $hcode_border_type : '';
		$desktop_padding = ( $desktop_padding && $desktop_padding != 'custom-desktop-padding') ? $desktop_padding.' ' : '';
	    $desktop_margin = ( $desktop_margin && $desktop_margin != 'custom-desktop-margin') ? $desktop_margin.' ' : '';
		$custom_desktop_padding = ( $custom_desktop_padding ) ? ' padding:'.$custom_desktop_padding.';' : '';
	    $custom_desktop_margin = ( $custom_desktop_margin ) ? ' margin:'.$custom_desktop_margin.';' : '';
	    $blockquote_icon = ( $blockquote_icon == 1 ) ? ' blog-image' : '';

	    //For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }

        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_font_content ) ) {
            $content_responsive_id = uniqid('hcode-font-setting-');
            $content_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font_content, $content_responsive_id );
            $content_responsive_class = ' '.$content_responsive_id;
        }

        ( !empty( $content_responsive_style ) ) ? $font_settings_array[] = $content_responsive_style : '';
	        
		if($hcode_border_size || $hcode_border_color || $hcode_border_size):
			$border_attr = $hcode_border_position.': '.$hcode_border_size.' '.$hcode_border_type.' '.$hcode_border_color;
		endif;
		if($desktop_padding || $class || $blockquote_icon || $desktop_margin):
			$class_attr = ' class="'.$desktop_padding.$desktop_margin.$class.$blockquote_icon.'"';
	    else:
	        $class_attr = '';
		endif;
		if($border_attr || $custom_desktop_padding || $hcode_blockquote_bg_color || $custom_desktop_margin):
			$style_atrr = ' style="'.$border_attr.$custom_desktop_padding.$custom_desktop_margin.$hcode_blockquote_bg_color.$hcode_blockquote_color.'"';
		endif;
		if($hcode_blockquote_color):
			$style_footer_atrr = ' style="'.$hcode_blockquote_color.'"';
		endif;

		$output .= '<blockquote'.$id.$class_attr.$style_atrr.'>';
			if($content):
	    		$output .= '<p class="'.$content_responsive_class.'">'.do_shortcode( $content ).'</p>';
	    	endif;
	    	if($hcode_blockquote_heading):
	    		$output .= '<footer'.$style_footer_atrr.' class="'.$responsive_class.'">'.$hcode_blockquote_heading.'</footer>';
	    	endif;
	    $output .= '</blockquote>';
	    return $output;
	}
}
add_shortcode("hcode_blockquote","hcode_blockquote_shortcode");