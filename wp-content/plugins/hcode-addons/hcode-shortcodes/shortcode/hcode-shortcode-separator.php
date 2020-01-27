<?php
/**
 * Shortcode For Separator
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_separator_shortcode' ) ) {
	function hcode_separator_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'id' =>'',
	        'class' => '',
	        'hcode_sep_style' => '',
	        'hcode_sep_bg_color' => '', 
	        'margin_lt_none' => '',
	        'padding_setting' => '',
	        'desktop_padding' => '',
	        'custom_desktop_padding' => '',
	        'ipad_padding' => '',
	        'custom_ipad_padding' => '',
	        'mobile_padding' => '',
	        'custom_mobile_padding' => '',
	        'margin_setting' => '',
	        'desktop_margin' => '',
	        'custom_desktop_margin' => '',
	        'ipad_margin' => '',
	        'custom_ipad_margin' => '',
	        'mobile_margin' => '',
	        'custom_mobile_margin' => '',
	        'hcode_height' => '',
	        ), $atts ) );

		global $hcode_separator_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
	    $output = $padding = $padding_style = $margin = $margin_style = $style_attr = $style = $classes = '';
	    $classes_arr = array();
	    
	    $id = ( $id ) ? ' id="'.$id.'"' : '';
	    $class = ( $class ) ? $class : '';
	    $margin_lt_none = ( $margin_lt_none == 1 ) ? ' no-margin-lr' : '';
	    $hcode_sep_bg_color = ($hcode_sep_bg_color) ? ' background:'.$hcode_sep_bg_color.';' : '';
	    $hcode_height = ($hcode_height) ? 'height:'.$hcode_height.';' : '';

	    if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
			$hcode_separator_token = !empty( $hcode_separator_token ) ? $hcode_separator_token : 0;
	        $hcode_separator_token = $hcode_separator_token + 1;
	        $hcode_token_class = $classes_arr[] = 'hcode-separator-'.$hcode_separator_token;
	    }

	    // Column Padding Settings
		$padding_setting = ( $padding_setting ) ? $padding_setting : '';
		if( $padding_setting ){
			( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes_arr[] = $desktop_padding : '';
	    	( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes_arr[] = $ipad_padding : '';
	    	( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes_arr[] = $mobile_padding : '';
	    	$custom_desktop_padding = ( $custom_desktop_padding ) ? $custom_desktop_padding : '';
	        $custom_ipad_padding = ( $custom_ipad_padding ) ? $custom_ipad_padding : '';
	        $custom_mobile_padding = ( $custom_mobile_padding ) ? $custom_mobile_padding : '';

	        ( $custom_desktop_padding && $desktop_padding == 'custom-desktop-padding' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_desktop_padding.' !important; }' : '';
	        ( $custom_ipad_padding && $ipad_padding == 'custom-ipad-padding' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_ipad_padding.' !important;}' : '';
	        ( $custom_mobile_padding && $mobile_padding == 'custom-mobile-padding' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_mobile_padding.' !important;}' : '';
		}

		// Column Margin Settings
		$margin_setting = ( $margin_setting ) ? $margin_setting : '';
		if( $margin_setting ){
			( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes_arr[] = $desktop_margin : '';
	    	( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes_arr[] = $ipad_margin : '';
	    	( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes_arr[] = $mobile_margin : '';
	    	$custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
	        $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
	        $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';

	        ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
	        ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
	        ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
		}

		$class_list = implode(" ", $classes_arr);
		if($hcode_sep_bg_color || $hcode_height){
			$style .= ' style="'.$hcode_sep_bg_color.$hcode_height.'"';
		}
		switch ($hcode_sep_style) {
			case 'large':
				$classes .= ' wide-separator-line';
				break;
			
			case 'small':
				$classes .= ' separator-line';
				break;
		}
		$output .= '<div'.$id.' class="'.$class_list.$classes.$class.$margin_lt_none.'"'.$style.'></div>';
		return $output;
	}
}
add_shortcode( 'hcode_separator', 'hcode_separator_shortcode' );