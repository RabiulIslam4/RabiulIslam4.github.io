<?php
/**
 * Shortcode For Photography Services
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Photography Services */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hcode_photography_services_shortcode' ) ) {
    function hcode_photography_services_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
        			'id' => '',
                    'class' => '',
                    'hcode_photography_services_column_type' => 'work-5col',
                ), $atts ) );
        $output = '';

    	$id = ( $id ) ? ' id="'.$id.'"' : '';
    	$class = ( $class ) ? ' '.$class : '';
        $hcode_photography_services_column_type = ( $hcode_photography_services_column_type ) ? $hcode_photography_services_column_type : 'work-5col';
        $output .= '<div'.$id.' class="'.$hcode_photography_services_column_type.' masonry wide photography-grid photography-services'.$class.'">';
    		$output .= '<div class="tab-content">';
                $output .='<ul class="grid masonry-block-items">';
                	$output .= do_shortcode( $content );
                $output .= '</ul>';
            $output .= '</div>';
        $output .= '</div>';
        return $output;
    }
}
add_shortcode( 'hcode_photography_services', 'hcode_photography_services_shortcode' );

if ( ! function_exists( 'hcode_photography_services_content_shortcode' ) ) {
    function hcode_photography_services_content_shortcode( $atts, $content = null) {
        extract( shortcode_atts( array(
        			'show_content' => '',
                    'hcode_image' => '',
                    'hcode_title' => '',
                    'hcode_title_link' => '#',
                    'hcode_title_link_targer_blank' => '',
                    'hcode_title_color' => '',
                    'button_config' => '',
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
                    'class' => '',
                    'id' => '',
                    'hcode_overlay_color' => '',
                    'hcode_overlay_opacity' => '',
                    'hcode_image_srcset' => 'full',
                    'hcode_responsive_font' => '',
                ), $atts ) );
        global $font_settings_array, $hcode_photography_service_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $output = $hcode_overlay = $responsive_id = $responsive_style =$responsive_class = '';
        $classes = array();
        
        //For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, 'photography-services .photography-grid-details > .'.$responsive_id );
            $responsive_class = ' '.$responsive_id;
        }

        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        $hcode_title_color = ( $hcode_title_color ) ? 'style="color:'.$hcode_title_color.' !important;"' : '';
        ($class) ? $classes[] = $class : '';
        $id = ($id) ? 'id="'.$id.'"' : '';

        if (function_exists('vc_parse_multi_attribute')) {
            //Button
            $button_parse_args = vc_parse_multi_attribute($button_config);
            $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
            $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
            $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
        }

        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_photography_service_token = !empty( $hcode_photography_service_token ) ? $hcode_photography_service_token : 0;
            $hcode_photography_service_token = $hcode_photography_service_token + 1;
            $hcode_token_class = $classes[] = 'hcode-photography-service-'.$hcode_photography_service_token;
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

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

        /* Overlay */
        $hcode_overlay_opacity = ( $hcode_overlay_opacity ) ? 'opacity:'.$hcode_overlay_opacity.';' : '';
        $hcode_overlay_color = ( $hcode_overlay_color ) ? 'background:'.$hcode_overlay_color.';' : '';

        if( $hcode_overlay_opacity || $hcode_overlay_color ){
            $hcode_overlay = ' style="'.$hcode_overlay_opacity.$hcode_overlay_color.'"';
        }

        $class_list = implode(" ", $classes);

        $output .='<li '.$id.' class="overflow-hidden '.$class_list.'">';
            $output .='<div class="opacity-light bg-dark-gray"'.$hcode_overlay.'></div>';
            if( $hcode_image ) {
                $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset );
            }
            $output .='<div class="img-border-small img-border-small-gray border-transperent-light"></div>';
            $output .='<figure>';
                $output .='<figcaption>';
                    if( $hcode_title ) {
                        $output .='<div class="photography-grid-details">';
                            if( $hcode_title_link ) {
                                if( $hcode_title_link_targer_blank == 1 ) {
                                    $output .='<span class="text-large letter-spacing-9 display-block font-weight-600 white-text'.$responsive_class.'"><a target="_blank" href="'.esc_url( $hcode_title_link ).'" '.$hcode_title_color.'>'.$hcode_title.'</a></span>';
                                } else {
                                    $output .='<span class="text-large letter-spacing-9 display-block font-weight-600 white-text'.$responsive_class.'"><a target="_self" href="'.esc_url( $hcode_title_link ).'" '.$hcode_title_color.'>'.$hcode_title.'</a></span>';
                                }
                            } else {
                                $output .='<span class="text-large letter-spacing-9 font-weight-600 white-text" '.$hcode_title_color.'>'.$hcode_title.'</span>';
                            }
                        $output .='</div>';
                    }
                    if( $button_title ) {
                        $output .='<a class="btn-small-white btn btn-small no-margin-right" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                    }
                $output .='</figcaption>';
            $output .='</figure>';
        $output .='</li>';
        
        return $output;
    }
}
add_shortcode( 'hcode_photography_services_content', 'hcode_photography_services_content_shortcode' );