<?php
/**
 * Shortcode For Row
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Row */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_row_inner' ) ) {
	function hcode_row_inner( $atts, $content = null ){
		extract( shortcode_atts( array(
	        'hcode_row_style' => '',
	        'hcode_row_bg_color' =>'',
	        'hcode_row_bg_image' => '',
	        'show_container_fluid' => '',
	        'show_full_width' => '',
	        'hcode_row_image_type' => '',
	        'hcode_bg_image_type' => '',
	        'hcode_parallax_image_type' => '',
	        'fullscreen' => '',
	        'disable_element' => '',
	        'show_overlay' => '',
	        'hcode_overlay_opacity' => '',
	        'hcode_row_overlay_color' => '',
	        'hcode_z_index' => '',
	        'show_navigation' => '',
	        'hcode_row_border_position' => '',
	        'hcode_row_border_color' => '',
	        'hcode_border_size' => '',
	        'hcode_border_type' => '',
	        'hcode_row_padding' => '',
	        'hcode_padding_top' => '',
	        'hcode_padding_bottom' => '',
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
	        'hcode_row_animation_style' => '',
	        'id' => '',
	        'class' => '',
	        'css' => '',
	        'position_relative' => '',
	        'overflow_hidden' => '',
	        'hcode_relative_projects' => '',
	        'scroll_to_down' => '',
	        'hide_background' => '',
	        'scroll_to_down_color' => '',
	        'scroll_to_down_id' => '',
	        'hcode_min_height' => '',
	    	'hcode_min_height_ipad' => '',
	    	'hcode_min_height_mobile' => '',
	        'hcode_image_srcset' => 'full',
	    ), $atts ) );
	    global $hcode_inner_row_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
		$output = '';
		$classes = $style_array = array();

		if ( '1' === $disable_element ) {
			return;
		}

		$id = ($id) ? ' id="'.$id.'"' : '';
		( $class ) ? $classes[] = $class : '';
		if( $css ){
			$classes[] = vc_shortcode_custom_css_class( $css, ' ' );
		}

		$classes[] = 'hcode-inner-row';
		($position_relative == 1) ? $classes[] = 'position-relative' : '';
		($overflow_hidden == 1) ? $classes[] = 'overflow-hidden' : '';
		($fullscreen) ? $classes[] = 'full-screen' : '';
		($hcode_relative_projects) ? $classes[] = 'related-projects' : '';
		$show_container_fluid_att = ($show_container_fluid == 1) ? 'container-fluid' : 'container';
		($hide_background == 1) ? $classes[] = 'xs-no-background' : '';

		// For Border
		$hcode_row_border_pos = ($hcode_row_border_position) ? $hcode_row_border_position.': ' : '';
		if($hcode_row_border_pos){
			$hcode_row_border_pos .= ($hcode_border_size) ? $hcode_border_size : '';
			$hcode_row_border_pos .= ($hcode_border_type) ? ' '.$hcode_border_type : '';
			$hcode_row_border_pos .= ($hcode_row_border_color) ? ' '.$hcode_row_border_color : '';
			$hcode_row_border_pos .= ';';
		}

		if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' || $hcode_min_height || $hcode_min_height_ipad || $hcode_min_height_mobile ){
			$hcode_inner_row_token = !empty( $hcode_inner_row_token ) ? $hcode_inner_row_token : 0;
	        $hcode_inner_row_token = $hcode_inner_row_token + 1;
	        $hcode_token_class = $classes[] = 'hcode-inner-row-'.$hcode_inner_row_token;
    	}

    	// Set min-height
		( $hcode_min_height ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ min-height:'.$hcode_min_height.' !important;}' : '';
		( $hcode_min_height_ipad ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ min-height:'.$hcode_min_height_ipad.' !important;}' : '';
		( $hcode_min_height_mobile ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ min-height:'.$hcode_min_height_mobile.' !important;}' : '';

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

		/* For Animation*/
		($hcode_row_animation_style) ? $classes[] = 'wow '.$hcode_row_animation_style : '';
	        
	    /* For scroll_to_down */
	    $scroll_to_down_onclick = '';
	    if( $scroll_to_down == 1 ){
	        $classes[] = $scroll_to_down_color;
	        $classes[] = 'scrollToDownSection';
	        $scroll_to_down_onclick = ' data-section-id="'.$scroll_to_down_id.'"';
	    }
	    
	    // Class List
		$class_list = implode(" ", $classes);
		$row_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

		$style_array[] = $hcode_row_border_pos;

		if(empty($hcode_row_style)){
			// Style Property List
			$style_property_list = implode("", $style_array);
			$style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

			$output .= '<div'.$id.$row_class.$style_property.$scroll_to_down_onclick.'>';
				$output .=  do_shortcode($content);
		    $output .= '</div>';
		}else{
			switch ($hcode_row_style) {
				case 'color':
					($hcode_row_bg_color) ? $style_array[] = 'background-color:'.$hcode_row_bg_color.';' : '';
					// Style Property List
					$style_property_list = implode("", $style_array);
					$style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';
					$output .= '<div'.$id.$row_class.$style_property.$scroll_to_down_onclick.'>';
						
						$output .=  do_shortcode($content);

	                $output .= '</div>';
	            break;
				case 'image':

					$hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
			        $image_url = wp_get_attachment_image_src($hcode_row_bg_image, $hcode_image_srcset);

			        $srcset = $srcset_data_bg = '';
			        $srcset = wp_get_attachment_image_srcset( $hcode_row_bg_image, $hcode_image_srcset );
			        if( $srcset ){
			            $srcset_data_bg = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
			            $classes[] = 'bg-image-srcset';
			        }

					($image_url[0]) ? $style_array[] = 'background-image: url('.$image_url[0].');' : '';

					($hcode_row_image_type=='parallax') ? $classes[] = 'parallax-fix' : '';
					($hcode_bg_image_type) ? $classes[] = $hcode_bg_image_type : '';
					($hcode_parallax_image_type) ? $classes[] = $hcode_parallax_image_type : '';

					$hcode_overlay_opacity_att = ($hcode_overlay_opacity) ? ' opacity:'.$hcode_overlay_opacity.';' : '';
					$hcode_row_overlay_color_att = ($hcode_row_overlay_color) ? ' background-color:'.$hcode_row_overlay_color.';' : '';
					$hcode_z_index = ($hcode_z_index) ? ' z-index:'.$hcode_z_index.';' : '';

					// Style Property List
					$style_property_list = implode("", $style_array);
					$style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

					// Class List
					$class_list = implode(" ", $classes);
					$row_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

					$output .= '<div '.$id.$row_class.$style_property.$scroll_to_down_onclick.$srcset_data_bg.'>';

						if($show_overlay=='1'){
							$output .= '<div class="selection-overlay" style="'.$hcode_overlay_opacity_att.$hcode_row_overlay_color_att.$hcode_z_index.'"></div>';
						}
	             
						$output .=  do_shortcode($content);
		                
	                $output .= '</div>';
			    break;
			}
		}
		return $output;
	}
}
add_shortcode( 'vc_row_inner', 'hcode_row_inner' );