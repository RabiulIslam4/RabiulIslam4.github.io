<?php
/**
 * Shortcode For Divider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Divider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_divider_shortcode' ) ) {
	function hcode_divider_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
	            'hcode_row_border_position' => '',
	            'hcode_row_border_color' => '',
	            'hcode_border_size' => '',
	            'hcode_border_type' => '',
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
	        ), $atts ) );
		global $hcode_divider_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
	    $output = $style = '';
	    $classes = array();

	    if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
		    $hcode_divider_token = !empty( $hcode_divider_token ) ? $hcode_divider_token : 0;
	        $hcode_divider_token = $hcode_divider_token + 1;
	        $hcode_token_class = $classes[] = 'hcode-divider-'.$hcode_divider_token;
	    }

	    /* For Border */
		$hcode_row_border_pos = ($hcode_row_border_position) ? $hcode_row_border_position.': ' : '';
		if($hcode_row_border_pos){
			$hcode_row_border_pos .= ($hcode_border_size) ? $hcode_border_size : '';
			$hcode_row_border_pos .= ($hcode_border_type) ? ' '.$hcode_border_type : '';
			$hcode_row_border_pos .= ($hcode_row_border_color) ? ' '.$hcode_row_border_color : '';
			$hcode_row_border_pos .= ';';
		}
	        
	    // Column Padding Settings
		$padding_setting = ( $padding_setting ) ? $padding_setting : '';
		if( $padding_setting ){
			( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $desktop_padding : '';
	    	( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $ipad_padding : '';
	    	( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $mobile_padding : '';
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
			( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_margin : '';
	    	( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $ipad_margin : '';
	    	( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $mobile_margin : '';
	    	$custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
	        $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
	        $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';

	        ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
	        ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
	        ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
		}

		// Class List
		$class_list = implode(" ", $classes);

		if( $hcode_row_border_pos ){
			$style .= ' style="'.$hcode_row_border_pos.'"';
		}
		$output .= '<div class="hcode-divider '.$class_list.'"'.$style.'></div>';
		return $output;
	}
}
add_shortcode( 'hcode_divider', 'hcode_divider_shortcode' );