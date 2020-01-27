<?php
/**
 * Shortcode For Space
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Space */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_space_shortcode' ) ) {
	function hcode_space_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
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
	    $output = '';
	    global $hcode_space_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
	    $classes = array();
	    $classes[] = 'hcode-space';
	    if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
			$hcode_space_token = !empty( $hcode_space_token ) ? $hcode_space_token : 0;
	        $hcode_space_token = $hcode_space_token + 1;
	        $hcode_token_class = $classes[] = 'hcode-space-'.$hcode_space_token;
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
		$space_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

		$output .= '<div'.$space_class.'></div>';
		return $output;
	}
}
add_shortcode( 'hcode_space', 'hcode_space_shortcode' );