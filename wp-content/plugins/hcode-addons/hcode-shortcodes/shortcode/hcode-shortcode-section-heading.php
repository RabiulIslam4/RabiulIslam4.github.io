<?php
/**
 * Shortcode For Section Heading
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Section Heading */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_section_heading' ) ) {
	function hcode_section_heading( $atts, $content = null ) {
		extract( shortcode_atts( array(
	            'hcode_heading_type' => '',
                'custom_icon' => '',
                'custom_icon_image' => '',
	            'hcode_et_line_icon_list' => '',
	        	'hcode_heading' => '',
	        	'hcode_heading_number' => '',
            	'hcode_enable_underline_on_title' => '1',
	        	'hcode_seperator' => '',
	        	'hcode_double_line' => '',
	        	'hcode_text_color' => '',
	        	'hcode_heading_subtitle_color' => '',
	        	'hcode_heading_border_color' => '',
            	'hcode_underline_color' => '',
	        	'hcode_heading_tag' => '',
	        	'hcode_heading_text_color' => '',
	        	'hcode_heading_number_text_color' => '',
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
	        	'font_size' => '',
	        	'line_height' => '',
	        	'font_weight' => '',
	            'hcode_heading_icon_color' => '',
	            'hcode_heading_sep_color' => '',
		        'id' => '',
		        'class' => '',
		        'icon_size' => '',
		        'hcode_heading_text_bg_color' => '',
	            'subtitle' => '',
	            'hcode_icon_image_srcset' => 'full',
	            'hcode_responsive_title_font' => '',
	            'hcode_responsive_subtitle_font' => '',
	        ), $atts ) );
		global $font_settings_array, $hcode_section_heading_token, $hcode_heading_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
		$class_inner = $class_style = $output = $style = $style_attr = $heading_class = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = '';
		$classes = array();

		//For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, 'parent-section .'.$title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';
        
        //For Text Align 
        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

		switch ($hcode_text_color) {
			case 'black-text':
					$class_inner .= ' black-text';
				break;

			case 'white-text':
					$class_inner .= ' white-text';
				break;

			case 'custom':
	                $class_inner .= '';
					$class_style .= ' color:'.$hcode_heading_text_color.'; ';
				break;
			
			default:
				break;
		}

		$id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? ' '.$class : '';
		$hcode_heading_sep_color = ($hcode_heading_sep_color) ? ' style = "background-color: '.$hcode_heading_sep_color.';"' : ' style = "background-color: #e6af2a;"';
		$hcode_heading_tag = ( $hcode_heading_tag ) ? $hcode_heading_tag : 'h1';
		$hcode_et_line_icon_list = ( $hcode_et_line_icon_list ) ? $hcode_et_line_icon_list : '';
        $hcode_underline_color = ($hcode_underline_color) ? ' style="background-color:'.$hcode_underline_color.'" !important;' : '';
		$hcode_seperator = ( $hcode_seperator ) ? $hcode_seperator = '<div class="separator-line margin-five" '.$hcode_heading_sep_color.'></div>' : '';
		$hcode_double_line = ( $hcode_double_line ) ? $hcode_double_line = 'dividers-header double-line' : '';
		$font_weight = ($font_weight) ? 'font-weight:'.$font_weight.';' : '';
		$font_size = ($font_size) ? 'font-size:'.$font_size.';' : '';
		$line_height = ($line_height) ? 'line-height:'.$line_height.';' : '';
		$icon_size = ($icon_size) ? ' '.$icon_size : ' medium-icon';
	    $hcode_heading_icon_color = ( $hcode_heading_icon_color ) ? ' style = "color: '.$hcode_heading_icon_color.';"' : '';
	    $hcode_heading_number = ( $hcode_heading_number ) ? $hcode_heading_number : '';
	    $hcode_enable_underline_on_title = ( $hcode_enable_underline_on_title == 1 ) ? '' : ' text-decoration-none';
	    $hcode_heading_number_text_color = ( $hcode_heading_number_text_color ) ? ' style = "color: '.$hcode_heading_number_text_color.';"' : '';
	    $hcode_heading_text_bg_color = ( $hcode_heading_text_bg_color ) ? ' style = "background-color: '.$hcode_heading_text_bg_color.';"' : 'style = "background-color: #fff;"';
	    $hcode_heading_subtitle_color = ( $hcode_heading_subtitle_color ) ? ' style = "color: '.$hcode_heading_subtitle_color.';"' : '';
	        
	    /* Replace || to br in title */
	    $hcode_heading = ( $hcode_heading ) ? str_replace('||', '<br />',$hcode_heading) : '';

	    if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
			$hcode_heading_token = !empty( $hcode_heading_token ) ? $hcode_heading_token : 0;
	        $hcode_heading_token = $hcode_heading_token + 1;
	        $hcode_token_class = $classes[] = 'hcode-heading-'.$hcode_heading_token;
	    }

	    $hcode_section_heading_token = !empty( $hcode_section_heading_token ) ? $hcode_section_heading_token : 0;
        $hcode_section_heading_token = $hcode_section_heading_token + 1;
        $hcode_heading_class = 'hcode-section-heading-'.$hcode_section_heading_token;

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

		( $hcode_heading_border_color ) ? $hcode_featured_array[] = '.'.$hcode_heading_class.', .'.$hcode_heading_class.':before, .'.$hcode_heading_class.' .subheader-double-line{ border-color:'.$hcode_heading_border_color.' !important;}' : '';

		if( $class_style || $font_size || $font_weight ){
	                $style .= ' style="'.$class_style.$font_size.$font_weight.$line_height.'"';
		}
		if($hcode_double_line || $class):
			$heading_class .= ' class="'.$hcode_double_line.$class.' '.$hcode_heading_class.'"';
		endif;

		$hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';

        /* New Font Awesome Icons */

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_et_line_icon_list));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_et_line_icon_list = substr(strstr($hcode_et_line_icon_list," "), 1);

            if(array_key_exists($hcode_et_line_icon_list, $fa_icon_old)){
                $hcode_et_line_icon_list = $fa_icon_old[$hcode_et_line_icon_list];
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_solid)){
                $hcode_et_line_icon_list = 'fas '.$hcode_et_line_icon_list;
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_reg)){
                $hcode_et_line_icon_list = 'far '.$hcode_et_line_icon_list;
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_brand)){
                $hcode_et_line_icon_list = 'fab '.$hcode_et_line_icon_list;
            }else{
                $hcode_et_line_icon_list = '';
            }
        }

        $class_list = implode(" ", $classes);
		
		switch ($hcode_heading_type) {
			case 'heading-style1':
				$output .='<'.$hcode_heading_tag.$id.' class="section-title '.$class_list.$class.$class_inner.$title_responsive_class.'"'.$style.'>';
					$output .= $hcode_heading;
	            $output .='</'.$hcode_heading_tag.'>';
	            $output .= $hcode_seperator;
			break;

			case 'heading-style2':
				$output .='<div'.$heading_class.$id.'>';
					$output .='<div class="subheader" '.$hcode_heading_text_bg_color.'>';
						if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                      		$output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    	} elseif( $hcode_et_line_icon_list ) {
		                	$output .='<i class="'.$hcode_et_line_icon_list.$icon_size.'"'.$hcode_heading_icon_color.'></i>';
		            	}
		                $output .='<'.$hcode_heading_tag.' class="section-title '.$class_list.$title_responsive_class.'"'.$style.'>';
						 	$output .= $hcode_heading;
						$output .='</'.$hcode_heading_tag.'>';
						if( $subtitle ):
							$output .='<h6 class="'.$subtitle_responsive_class.'"'.$hcode_heading_subtitle_color.'>'.$subtitle.'</h6>';
						endif;
	    			$output .='</div>';
	    		$output .='</div>';
			break;

			case 'heading-style3':
				$output .='<div'.$heading_class.$id.'>';
		    		$output .='<div class="subheader subheader-double-line bg-white">';
	                    $output .='<'.$hcode_heading_tag.' class="section-title '.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_heading.'</'.$hcode_heading_tag.'>';
	                $output .='</div>';
	            $output .='</div>';
			break;
	                
	        case 'heading-style4':
	            $output .='<'.$hcode_heading_tag.$id.' class="text-large letter-spacing-2 text-uppercase agency-title '.$class_list.$class.$class_inner.$title_responsive_class.' '.$hcode_heading_class.'"'.$style.'>';
	                $output .= $hcode_heading;
	            $output .= '</'.$hcode_heading_tag.'>';
			break;

	        case 'heading-style5':
	           $output .='<div'.$id.' class="heading-style-five '.$class_list.$class.$title_responsive_class.'">';
	           $output .='<'.$hcode_heading_tag.$style.'>';
	           		if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    } elseif( $hcode_et_line_icon_list ) {
	           			$output .='<i class="'.$hcode_et_line_icon_list.$icon_size.' vertical-align-middle"'.$hcode_heading_icon_color.'></i> ';
	           		}
	           		$output .= $hcode_heading;
	           $output .='</'.$hcode_heading_tag.'>';
	           $output .='</div>';
	        break;

	        case 'heading-style6':
	    		if( $hcode_heading_number ):
	        		$output .= '<span class="title-number'.$subtitle_responsive_class.'"'.$hcode_heading_number_text_color.'>'.$hcode_heading_number.'</span>';
	        	endif;
				$output .='<'.$hcode_heading_tag.$id.' class="section-title '.$class_list.$class.$class_inner.$title_responsive_class.'"'.$style.'>';
					$output .= $hcode_heading;
	            $output .='</'.$hcode_heading_tag.'>';
	            $output .= $hcode_seperator;
			break;

	        case 'heading-style7':
	            $output .='<div'.$id.' class="heading-style-seven '.$class_list.$class.'">';
	            $output .='<'.$hcode_heading_tag.' class="section-title text-transform-none display-inline-block vertical-align-bottom no-padding-bottom '.$class_inner.$title_responsive_class.'"'.$style.'>';
	           		$output .= $hcode_heading;
	            $output .='</'.$hcode_heading_tag.'>';
           		if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                } elseif( $hcode_et_line_icon_list ) {
           			$output .='<i class="'.$hcode_et_line_icon_list.$icon_size.' vertical-align-middle"'.$hcode_heading_icon_color.'></i> ';
           		}
	            $output .='</div>';
	        break;

	        case 'heading-style8':
	            $output .='<div'.$id.' class="heading-style-eight '.$class_list.$class.'">';
	            $output .='<'.$hcode_heading_tag.' class="slider-title-big8 '.$class_inner.$title_responsive_class.'"'.$style.'>';
	           		$output .= $hcode_heading;
	            $output .='</'.$hcode_heading_tag.'>';
	            $output .='</div>';
	        break;

	        case 'heading-style9':
	            $output .='<div'.$id.' class="heading-style-nine '.$class_list.$class.'">';
	            $output .='<'.$hcode_heading_tag.' class="text-transform-none title orange-light-text'.$class_inner.$title_responsive_class.$hcode_enable_underline_on_title.'"'.$style.'>';
	           		$output .= '<span>'.$hcode_heading.'</span>';
	            $output .='</'.$hcode_heading_tag.'>';
				if( $subtitle ):
					$output .='<h4 class="margin-two-top no-margin-lr no-margin-top font-weight-300 gray-text'.$subtitle_responsive_class.'"'.$hcode_heading_subtitle_color.'>'.$subtitle.'</h4>';
				endif;
	            $output .='</div>';
	        break;

	        case 'heading-style10':
	           $output .='<div'.$id.' class="heading-style-ten icon position-relative xs-no-margin-lr-auto '.$class_list.$class.$class_inner.'"'.$style.'>';
	           		if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    } elseif( $hcode_et_line_icon_list ) {
	           			$output .='<i class="'.$hcode_et_line_icon_list.$icon_size.' vertical-align-middle"'.$hcode_heading_icon_color.'></i> ';
	           		}
		           $output .='<'.$hcode_heading_tag.' class="title-style10 title-large font-weight-700 display-inline-block vertical-align-middle'.$title_responsive_class.'">';
		           		$output .= $hcode_heading;
		           $output .='</'.$hcode_heading_tag.'>';
	           $output .='</div>';
	        break;

			default:
				break;
		}
	    return $output;
	}
}
add_shortcode("hcode_section_heading","hcode_section_heading");