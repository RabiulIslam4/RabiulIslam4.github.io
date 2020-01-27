<?php
/**
 * Shortcode For Column
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Column */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'vc_column' ) ) {
	function vc_column( $atts, $content = '', $id = '' ) {
		global $hcode_column_token;
		extract( shortcode_atts( array(
			'id' => '',
			'class' => '',
	        'css' => '',
	    	'centralized_div' => '',
	    	'min_height' => '',
	    	'min_height_ipad' => '',
	    	'min_height_mobile' => '',
	    	'hcode_z_index' => '',
	        'alignment_setting' => '',
	        'desktop_alignment' => '',
	        'ipad_alignment' => '',
	        'mobile_alignment' => '',
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
	        'display_setting' => '',
	        'desktop_display' => '',
	        'ipad_display' => '',
	        'mobile_display' => '',
	        'clear_both' => '',
	        'desktop_clear_both' => '',
	        'ipad_clear_both' => '',
	        'mobile_clear_both' => '',
	        'pull_right' => '',
	        'width' => '',
	        'offset' => '',
	        'hcode_column_bg_color' => '',
	        'hcode_column_animation_style' => '',
	        'hcode_column_animation_duration' => '',
	        'fullscreen' => '',
		), $atts ) );

		global $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
		$output = $alignment = $padding = $padding_style = $margin = $margin_style = $style_attr = $style = $min_height_class = $display = $data_style_attr = '';
		$classes = $front_classes = array();
		$classes[] = 'wpb_column hcode-column-container';
		($fullscreen) ? $classes[] = $front_classes[] = 'full-screen' : '';
		$id = ( $id ) ? ' id="'.$id.'"' : '';
		( $class ) ? $classes[] = $front_classes[] = $class : '';

		if( $css ){
			$classes[] = $front_classes[] = vc_shortcode_custom_css_class( $css, ' ' );
		}
		( $centralized_div ) ? $classes[] = $front_classes[] = 'center-col' : '';
	    ( $pull_right ) ? $classes[] = $front_classes[] = 'pull-right' : '';

		// Column Allignment settings
		$alignment_setting = ( $alignment_setting ) ? $alignment_setting : '';
		( $desktop_alignment ) ? $classes[] = $front_classes[] = $desktop_alignment : '';
		( $ipad_alignment ) ? $classes[] = $front_classes[] = $ipad_alignment : '';
		( $mobile_alignment ) ? $classes[] = $front_classes[] = $mobile_alignment : '';
		
		// Column Display setting
		$display_setting = ($display_setting) ? $display_setting : '';
	    ($desktop_display) ? $classes[] = $front_classes[] = $desktop_display : '';
	    ($ipad_display) ? $classes[] = $front_classes[] = $ipad_display : '';
	    ($mobile_display) ? $classes[] = $front_classes[] = $mobile_display : '';

	    if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' || $min_height || $min_height_ipad || $min_height_mobile ){
			$hcode_column_token = !empty( $hcode_column_token ) ? $hcode_column_token : 0;
	        $hcode_column_token = $hcode_column_token + 1;
	        $hcode_token_class = $classes[] = $front_classes[] = 'hcode-column-'.$hcode_column_token;
	    }

		// Column Padding Settings
		$padding_setting = ( $padding_setting ) ? $padding_setting : '';
		if( $padding_setting ){
			( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $front_classes[] = $desktop_padding : '';
	    	( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $front_classes[] = $ipad_padding : '';
	    	( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $front_classes[] = $mobile_padding : '';
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
			( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $front_classes[] = $desktop_margin : '';
	    	( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $front_classes[] = $ipad_margin : '';
	    	( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $front_classes[] = $mobile_margin : '';
	    	$custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
	        $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
	        $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';

	        ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
	        ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
	        ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
		}

		// Column Clear Both settings
		( $clear_both ) ? $clear_both : '';
		( $desktop_clear_both ) ? $classes[] = $front_classes[] = $desktop_clear_both : '';
		( $ipad_clear_both ) ? $classes[] = $front_classes[] = $ipad_clear_both : '';
		( $mobile_clear_both ) ? $classes[] = $front_classes[] = $mobile_clear_both : '';
		
		// Set min-height
		( $min_height ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ min-height:'.$min_height.' !important;}' : '';
		( $min_height_ipad ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ min-height:'.$min_height_ipad.' !important;}' : '';
		( $min_height_mobile ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ min-height:'.$min_height_mobile.' !important;}' : '';
		
		if( $min_height || $min_height_ipad || $min_height_mobile ):
			$classes[] = $front_classes[] = 'column-min-height';
		endif;

		// H-code V1.8 Column z-index
		$hcode_z_index = ( $hcode_z_index ) ? $hcode_z_index : '';
		if( $hcode_z_index ) :
			$style_attr .= " z-index:".$hcode_z_index.";";
			$data_style_attr .= " data-z-index=".$hcode_z_index."";
		endif;

	    // Column bg color
	    $hcode_column_bg_color = ( $hcode_column_bg_color ) ? $hcode_column_bg_color : '';
	    if( $hcode_column_bg_color ):
	        $style_attr .= " background:".$hcode_column_bg_color.";";
	    	$data_style_attr .= " data-background=".$hcode_column_bg_color."";
	    endif;

		if($style_attr){
			$style .= ' style="'.$style_attr.'"';
		}

		// Column Offset and sm width
		$width = wpb_translateColumnWidthToSpan( $width );
		$width = vc_column_offset_class_merge( $offset, $width );
		if( !strchr( $width,'vc_col-xs' ) ){
			$width = $width." col-xs-mobile-fullwidth";
			$front_classes[] = "col-xs-mobile-fullwidth";
		}
		if( !strchr( $width,'vc_col-sm' ) ){
			$front_classes[] = "front-column-class";
		}
		$classes[] = $width;
		
		// Column Animation 
	    $hcode_column_animation_style = ( $hcode_column_animation_style ) ? $classes[] = 'wow '.$hcode_column_animation_style : '';
	    
		// Class List
		$class_list = implode(" ", $classes);
		$column_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

		// Front End Class List
		$front_class_list = implode(" ", $front_classes);
		$front_column_class = ( $front_class_list ) ? ' data-front-class="'.$front_class_list.'"' : '';

	    
	    $hcode_column_animation_duration = ( $hcode_column_animation_duration ) ? ' data-wow-duration= '.$hcode_column_animation_duration.'ms' : '';

		$output .= '<div'.$id.$column_class.$front_column_class.$data_style_attr.$style.$hcode_column_animation_duration.'>';
			$output .= '<div class="vc-column-innner-wrapper">';
				$output .= do_shortcode( $content );
			$output .= '</div>';
		$output .= '</div>';
		return $output;
	}
}
add_shortcode( 'vc_column', 'vc_column' );
add_shortcode( 'vc_column_inner', 'vc_column' );