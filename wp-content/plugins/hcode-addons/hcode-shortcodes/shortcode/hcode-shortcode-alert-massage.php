<?php
/**
 * Shortcode For Alert Message
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Alert Message */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_alert_massage_shortcode' ) ) {
	function hcode_alert_massage_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        	'id' => '',
	        	'class' => '',
	        	'hcode_alert_massage_premade_style' => '',
	        	'alert_massage_preview_image' => '',
	        	'hcode_alert_massage_type' => '',
	        	'hcode_message_icon' => '',
	            'custom_icon' =>'',
	            'custom_icon_image' =>'',
	        	'hcode_highliget_title' => '',
	        	'hcode_subtitle' => '',
	        	'show_close_button' => '',
	        	'hcode_icon_image_srcset' => 'full',
	        	'hcode_responsive_font' => '',
	        	'hcode_responsive_font_subtitle' => '',
	        	'hcode_title_color' => '',
	        	'hcode_subtitle_color' => '',
	        	'hcode_icon_color' => '',
	        	'hcode_border_color' => '',
	        	'hcode_bg_color' => '',
	        	'hcode_close_button_color' => '',
	        ), $atts ) );
		global $font_settings_array;
		$output = $responsive_id = $responsive_class = $subtitle_responsive_id = $subtitle_responsive_class = $subtitle_responsive_style = $responsive_style = $style_attr = '';
		$style_arr = array();
		$id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? ' '.$class : '';
		$hcode_alert_massage_premade_style = ( $hcode_alert_massage_premade_style ) ? $hcode_alert_massage_premade_style : '';
		$hcode_alert_massage_type = ( $hcode_alert_massage_type ) ? 'alert-'.$hcode_alert_massage_type : '';
		$hcode_message_icon = ( $hcode_message_icon ) ? $hcode_message_icon : '';
		$hcode_highliget_title = ( $hcode_highliget_title ) ? $hcode_highliget_title : '';
		$hcode_subtitle = ( $hcode_subtitle ) ? $hcode_subtitle : '';
		$hcode_title_color = ( $hcode_title_color ) ? ' style="color:'.$hcode_title_color.'"' : '';
		$hcode_subtitle_color = ( $hcode_subtitle_color ) ? ' style="color:'.$hcode_subtitle_color.'"' : '';
		$hcode_icon_color = ( $hcode_icon_color ) ? ' style="color:'.$hcode_icon_color.';"' : '';
		$hcode_border_color = ( $hcode_border_color ) ? $style_arr[] = 'border-color:'.$hcode_border_color.';' : '';
		$hcode_bg_color = ( $hcode_bg_color ) ? $style_arr[] = ' background-color:'.$hcode_bg_color.';' : '';
		$hcode_close_button_color = ( $hcode_close_button_color ) ? ' style="color: '.$hcode_close_button_color.'"' : '';
		if( !empty($style_arr) ){
			$style_sep = implode("",$style_arr);
			$style_attr = ' style="'.$style_sep.'"';
		}
		$show_close_button = ( $show_close_button ) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"'.$hcode_close_button_color.'>×</button>' : '';

		//For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }
        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_font_subtitle ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font_subtitle, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

		$hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';
		$custom_icon_image = ( $custom_icon_image ) ? $custom_icon_image : '';

        //New Font Awesome Icons

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($hcode_message_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_message_icon = substr(strstr($hcode_message_icon," "), 1);

            if(array_key_exists($hcode_message_icon, $fa_icon_old)){
                $hcode_message_icon = $fa_icon_old[$hcode_message_icon];
            }else if(in_array($hcode_message_icon, $fa_icons_solid)){
                $hcode_message_icon = 'fas '.$hcode_message_icon;
            }else if(in_array($hcode_message_icon, $fa_icons_reg)){
                $hcode_message_icon = 'far '.$hcode_message_icon;
            }else if(in_array($hcode_message_icon, $fa_icons_brand)){
                $hcode_message_icon = 'fab '.$hcode_message_icon;
            }else{
                $hcode_message_icon = '';
            }
        }

		switch ($hcode_alert_massage_premade_style) {
			case 'alert-massage-style-1':
				$output .= '<div class="alert-style6">';
					$output .= '<div role="alert" class="alert '.$hcode_alert_massage_type.'"'.$style_attr.'>';
						if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
							$output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    	} elseif( $hcode_message_icon ) {
							$output .= '<i class="'.$hcode_message_icon.'"'.$hcode_icon_color.'></i>';
						}
						if( $hcode_highliget_title || $hcode_subtitle ) {
							$output .= '<span class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>';
								if( $hcode_highliget_title ) {
									$output .= '<strong class="'.$responsive_class.'"'.$hcode_title_color.'>'.$hcode_highliget_title.'</strong> ';
								}
								$output .= $hcode_subtitle;
							$output .= '</span>';
						}
		            $output .= '</div>';
	            $output .= '</div>';
			break;
			case 'alert-massage-style-2':
				$output .= '<div role="alert" class="alert '.$hcode_alert_massage_type.' fade in"'.$style_attr.'>';
					if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
						$output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    } elseif( $hcode_message_icon ) {
						$output .= '<i class="bg-transparent '.$hcode_message_icon.' '.$hcode_alert_massage_type.'"'.$hcode_icon_color.'></i>';
					}
					if( $hcode_highliget_title || $hcode_subtitle ) {
		                $output .= ' <span class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>';
		            		if( $hcode_highliget_title ) {
			                	$output .= '<strong class="'.$responsive_class.'"'.$hcode_title_color.'>'.$hcode_highliget_title.'</strong> ';
			                }
			                $output .= $hcode_subtitle;
		                $output .= '</span>';
	                }
	                $output .= $show_close_button;
	            $output .= '</div>';
			break;
			case 'alert-massage-style-3':
				$output .= '<div class="alert-style5">';
					$output .= '<div role="alert" class="alert '.$hcode_alert_massage_type.'"'.$style_attr.'>';
					if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
						$output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    } elseif( $hcode_message_icon ) {
						$output .= '<i class="bg-transparent '.$hcode_message_icon.' '.$hcode_alert_massage_type.'"'.$hcode_icon_color.'></i>';
					}
					if( $hcode_highliget_title || $hcode_subtitle ) {
						$output .= '<span class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>';
							if( $hcode_highliget_title ) {
								$output .= '<strong class="'.$responsive_class.'"'.$hcode_title_color.'>'.$hcode_highliget_title.'</strong> ';
							}
							$output .= $hcode_subtitle;
						$output .= '</span>';
					}
					$output .= $show_close_button;
		            $output .= '</div>';
	            $output .= '</div>';
			break;
			case 'alert-massage-style-4':
				$output .= '<div role="alert" class="alert '.$hcode_alert_massage_type.'"'.$style_attr.'>';
					if( $hcode_highliget_title || $hcode_subtitle ) {
						$output .= '<span class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>';
							if( $hcode_highliget_title ) {
								$output .= '<strong class="'.$responsive_class.'"'.$hcode_title_color.'>'.$hcode_highliget_title.'</strong> ';
							}
							$output .= $hcode_subtitle;
						$output .= '</span>';
					}
					$output .= $show_close_button;
	            $output .= '</div>';
			break;
			case 'alert-massage-style-5':
				$output .='<div class="alert-style2">';
					$output .= '<div role="alert" class="alert '.$hcode_alert_massage_type.'"'.$style_attr.'>';
						if( $hcode_highliget_title || $hcode_subtitle ) {
							$output .= '<span class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>';
								if( $hcode_highliget_title ) {
									$output .= '<strong class="'.$responsive_class.'"'.$hcode_title_color.'>'.$hcode_highliget_title.'</strong> ';
								}
								$output .= $hcode_subtitle;
							$output .= '</span>';
						}
						$output .= $show_close_button;
		            $output .= '</div>';
				$output .= '</div>';
			break;
			case 'alert-massage-style-6':
				$output .='<div class="alert-style3">';
					$output .= '<div role="alert" class="alert '.$hcode_alert_massage_type.'"'.$style_attr.'>';
						if( $hcode_highliget_title || $hcode_subtitle ) {
							$output .= '<span class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>';
								if( $hcode_highliget_title ) {
									$output .= '<strong class="'.$responsive_class.'"'.$hcode_title_color.'>'.$hcode_highliget_title.'</strong> ';
								}
								$output .= $hcode_subtitle;
							$output .= '</span>';
						}
						$output .= $show_close_button;
		            $output .= '</div>';
				$output .= '</div>';
			break;
			case 'alert-massage-style-7':
				$output .='<div class="alert-style4">';
					$output .= '<div role="alert" class="alert '.$hcode_alert_massage_type.'"'.$style_attr.'>';
						if( $hcode_highliget_title || $hcode_subtitle ) {
							$output .= '<span class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>';
								if( $hcode_highliget_title ) {
									$output .= '<strong class="'.$responsive_class.'"'.$hcode_title_color.'>'.$hcode_highliget_title.'</strong> ';
								}
								$output .= $hcode_subtitle;
							$output .= '</span>';
						}
						$output .= $show_close_button;
		            $output .= '</div>';
				$output .= '</div>';
			break;
			case 'alert-massage-style-8':
				$output .= '<div role="alert" class="alert alert-block fade in '.$hcode_alert_massage_type.'"'.$style_attr.'>';
					$output .= $show_close_button;
					if( $hcode_highliget_title ) {
						$output .= '<h3 class="'.$hcode_alert_massage_type.$responsive_class.' margin-two no-margin-top bg-transparent"'.$hcode_title_color.'>'.$hcode_highliget_title.'</h3>';
					}
					if( $hcode_subtitle ) {
						$output .= '<p class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>'.$hcode_subtitle.'</p>';
					}
		        $output .= '</div>';
			break;
		}
	    return $output;
	}
}
add_shortcode('hcode_alert_massage','hcode_alert_massage_shortcode');