<?php
/**
 * Shortcode For Accordian
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

$global_accordian_id = $i = $pre_define_style =''; 
if ( ! function_exists( 'hcode_accordian_shortcode' ) ) {
    function hcode_accordian_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
    	            'accordian_pre_define_style' => '',
    	            'accordian_id' => '',
    	            'no_padding' => '',
    	            'without_border' => '',
    	        ), $atts ) );
    	global $global_accordian_id,$i,$pre_define_style;
    	$output = '';

    	$accordian_id = ($accordian_id) ? $accordian_id : '';
    	$global_accordian_id = $accordian_id;
    	$ac_id = ($accordian_pre_define_style == 'accordion-style1' || $accordian_pre_define_style == 'accordion-style2' || $accordian_pre_define_style == 'accordion-style3' || $accordian_pre_define_style == 'accordion-style4' ) ? ' id="'.$accordian_id.'"' : '';
    	$no_pad = ($no_padding=='0') ? 'toggles-style3' : '';
    	$without_border = ($without_border == 1) ? ' no-border' : '';
        $extra_class_style4 = ( $accordian_pre_define_style == 'accordion-style4' ) ? ' about-tab-right' : '';
        $pre_define_style = $accordian_pre_define_style;
        
        $i += 1;
       	$output .='<div class="panel-group '.$pre_define_style.$without_border.$extra_class_style4.'"'.$ac_id.' >';
            $output .= do_shortcode($content);
        $output .='</div>';

        return $output;
    }
}
add_shortcode( 'hcode_accordian', 'hcode_accordian_shortcode' );
 
if ( ! function_exists( 'hcode_accordian_content_shortcode' ) ) {
    function hcode_accordian_content_shortcode( $atts, $content = null ) {
       	extract( shortcode_atts( array(
                    'accordian_active' => '',
                    'custom_icon' => '',
                    'custom_icon_image' => '',
                    'accordian_title_icon' => '',
                    'accordian_title' => '',
                    'accordian_bg_image' => '',
                    'button_text' => '',
                    'hcode_icon_color' => '',
                    'hcode_title_color' => '',
                    'hcode_image_srcset' => 'full',
                    'hcode_icon_image_srcset' => 'full',
                    'hcode_responsive_font' => '',
                ), $atts,'hcode_accordian' ) );
       	global $global_accordian_id,$i,$pre_define_style,$font_settings_array;

       	$output = $active = $icon_class = $class = $image_alt = $image_title = $responsive_id = $responsive_class = $responsive_style = '';

        //For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }

        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
        $accordian_bg_image = ( $accordian_bg_image ) ? $accordian_bg_image : '';

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';
        $custom_icon_image = ( $custom_icon_image ) ? $custom_icon_image : '';

        $accordian_title = ( $accordian_title ) ? $accordian_title : '';

       	$hcode_icon_color = ( $hcode_icon_color ) ? ' style=color:'.$hcode_icon_color.';' : '';
       	$hcode_title_color = ( $hcode_title_color ) ? 'style=color:'.$hcode_title_color.';' : '';

        // new font awesome icons

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($accordian_title_icon));

        if( $font_awesome_fa_icons[0] == 'fa' ) {
            $accordian_title_icon = substr( strstr( $accordian_title_icon, " " ), 1 );

            if( array_key_exists( $accordian_title_icon, $fa_icon_old ) ) {
                $accordian_title_icon = $fa_icon_old[$accordian_title_icon];
            }else if(in_array($accordian_title_icon, $fa_icons_solid)){
                $accordian_title_icon = 'fas '.$accordian_title_icon;
            }else if(in_array($accordian_title_icon, $fa_icons_reg)){
                $accordian_title_icon = 'far '.$accordian_title_icon;
            }else if(in_array($accordian_title_icon, $fa_icons_brand)){
                $accordian_title_icon = 'fab '.$accordian_title_icon;
            }else{
                $accordian_title_icon = '';
            }
        }
        
        $accordian_icon = '';
        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
            $accordian_icon = wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image extra-small-icon vertical-align-middle' ) );
        } elseif( $accordian_title_icon ) {
            $accordian_icon ='<i class="'.$accordian_title_icon.' extra-small-icon vertical-align-middle"'.$hcode_icon_color.'></i> ';
        }

      	// For Button
       	$button_parse_args = vc_parse_multi_attribute($button_text);
        $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
        $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
        $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
       
       
       	switch ($pre_define_style) {
            case 'accordion-style1':
                if($accordian_active=='1'){
                    $active="active-accordion";
                    $class="in";
                    $icon_class="fa-minus";
                }else{
                    $active=$class='';
                    $icon_class="fa-plus";
                }
            break;
            case 'accordion-style2':
                 if($accordian_active=='1'){
                    $active="active-accordion";
                    $class="in";
                    $icon_class="fa-angle-up";
                }else{
                    $active=$class='';
                    $icon_class="fa-angle-down";
                }
            break;
            case 'accordion-style3':
                 if($accordian_active=='1'){
                    $active="active-accordion";
                    $class="in";
                    $icon_class="fa-angle-up";
                }else{
                    $active=$class='';
                    $icon_class="fa-angle-down";
                }
            break;
            case 'accordion-style4':
                if($accordian_active=='1'){
                    $active="active-accordion";
                    $class="in";
                    $icon_class="fa-minus";
                }else{
                    $active=$class='';
                    $icon_class="fa-plus";
                }
            break;
            case 'toggles-style1':
                 if($accordian_active=='1'){
                    $active="active-accordion";
                    $class="in";
                    $icon_class="fa-minus";
                }else{
                    $active=$class='';
                    $icon_class="fa-plus";
                }
            break;
            case 'toggles-style2':
                 if($accordian_active=='1'){
                    $active="active-accordion";
                    $class="in";
                    $icon_class="fa-angle-up";
                }else{
                    $active=$class='';
                    $icon_class="fa-angle-down";
                }
            break;
            case 'toggles-style3':
                 if($accordian_active=='1'){
                    $active="active-accordion";
                    $class="in";
                    $icon_class="fa-minus";
                }else{
                    $active=$class='';
                    $icon_class="fa-plus";
                }
            break;
        } 
        $output .='<div class="panel panel-default">';
            $output .='<div class="panel-heading '.$active.'">';
                $output .='<a data-toggle="collapse" data-parent="#'.$global_accordian_id.'" href="#accordian-panel-'.$i.'">';
                    $output .='<h4 class="panel-title'.$responsive_class.'" '.$hcode_title_color.'>';
                        $output .= $accordian_icon;
                        $output .= $accordian_title;
                        $output .='<span class="pull-right">';
                            $output .='<i class="fas '.$icon_class.'"></i>';
                        $output .='</span>';
                    $output .='</h4>';
                $output .='</a>';
            $output .='</div>';
            $output .='<div id="accordian-panel-'.$i.'" class="panel-collapse collapse '.$class.'">';
                $output .='<div class="panel-body">';
                    if( $accordian_bg_image ) {
                        $output .='<div class="col-md-2 col-sm-2 col-xs-6 no-padding xs-margin-bottom-five">';
                            $output .= wp_get_attachment_image( $accordian_bg_image, $hcode_image_srcset, '', array( 'class' => 'white-round-border no-border spa-packages-img' ) );
                        $output .='</div>';
                        $output .='<div class="col-md-9 col-sm-9 col-xs-12 sm-pull-right col-md-offset-1 no-padding">';
                            if( $content ) {
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            }
                            if( $button_title ) {
                                $output .='<a class="highlight-button-dark btn btn-very-small button" target="'.$button_target.'" href="'.$button_link.'">'.$button_title.'</a>';
                            }
                        $output .='</div>';
                    } else {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        if( $button_title ) {
                            $output .='<a class="highlight-button-dark btn btn-very-small button" target="'.$button_target.'" href="'.$button_link.'">'.$button_title.'</a>';
                        }
                    }
                $output .='</div>';
            $output .='</div>';
        $output .='</div>';

        $i++;
    	return $output;
    }
}
add_shortcode( 'hcode_accordian_content', 'hcode_accordian_content_shortcode' );