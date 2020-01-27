<?php
/**
 * Shortcode For Popular Dishes
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popular Dishes */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_popular_dishes_shortcode' ) ) {
    function hcode_popular_dishes_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
        			'id' => '',
                    'class' => '',
                ), $atts ) );
        $output = '';

        	$id = ( $id ) ? ' id="'.$id.'"' : '';
        	$class = ( $class ) ? $class : '';
            
        	$output .= '<div '.$id.' class="work-4col gutter masonry grid-gallery '.$class.'">';
        			$output .= '<div class="tab-content">';
                        $output .='<ul class="grid masonry-items">';
                        	$output .= do_shortcode($content);
                        $output .= '</ul>';
                    $output .= '</div>';
                $output .= '</div>';
        return $output;
    }
}
add_shortcode( 'hcode_popular_dishes', 'hcode_popular_dishes_shortcode' );

if ( ! function_exists( 'hcode_popular_dishes_content_shortcode' ) ) {
    function hcode_popular_dishes_content_shortcode( $atts, $content = null) {
        extract( shortcode_atts( array(
        			'show_content' => '',
                    'hcode_image' => '',
                    'hcode_bg_image' => '',
                    'hcode_dishes_title' => '',
                    'hcode_dishes_url' => '',
                    'hcode_title_color' => '',
                    'hcode_subtitle_color' => '',
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
                    'hcode_image_srcset' => 'full',
                    'hcode_bg_image_srcset' => 'full',
                    'hcode_responsive_font' => '',
                ), $atts ) );
        global $font_settings_array, $hcode_popular_dishes_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $output = $classes = $padding = $margin = $padding_style = $margin_style = $style_attr = $style = $responsive_id = $responsive_style = $responsive_class = '';
        $classes = array();

        //For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }
        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        $hcode_title_color = ( $hcode_title_color ) ? ' style="color:'.$hcode_title_color.';"' : '';
        $hcode_subtitle_color = ( $hcode_subtitle_color ) ? ' style="color:'.$hcode_subtitle_color.';"' : '';
        $hcode_dishes_url = ( $hcode_dishes_url ) ? $hcode_dishes_url : '';

        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_popular_dishes_token = !empty( $hcode_popular_dishes_token ) ? $hcode_popular_dishes_token : 0;
            $hcode_popular_dishes_token = $hcode_popular_dishes_token + 1;
            $hcode_token_class = $classes[] = 'hcode-popular-dishes-'.$hcode_popular_dishes_token;
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

        // Class List
        $class_list = implode(" ", $classes);
        $popular_dishes_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

        switch ($show_content) {
        	case 'image':
        		if( $hcode_image ) {
    	    		$output .='<li'.$popular_dishes_class.'>';
    	                $output .='<a href="'.$hcode_dishes_url.'">';
                        $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset );
                        $output .='</a>';
    	            $output .='</li>';
                }
    		break;

        	case 'content':

                $hcode_bg_image_srcset  = !empty($hcode_bg_image_srcset) ? $hcode_bg_image_srcset : 'full';

	    		$output .='<li'.$popular_dishes_class.'>';
                    if( $hcode_bg_image ) {
	                    $output .='<a href="'.$hcode_dishes_url.'">';
                        $output .= wp_get_attachment_image( $hcode_bg_image, $hcode_bg_image_srcset );
                        $output .='</a>';
                    }
	                $output .='<div class="popular-dishes-border"></div>';
	                $output .='<div class="popular-dishes">';
                        if( $hcode_image ) {
	                       $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset );
                        }
                        if($hcode_dishes_title):
	                       $output .='<span class="text-uppercase letter-spacing-2 font-weight-600 display-block'.$responsive_class.'"><a href="'.$hcode_dishes_url.'"'.$hcode_title_color.'>'.$hcode_dishes_title.'</a></span>';
                        endif;
                        if($content):
	                       $output .='<span class="text-small text-uppercase"'.$hcode_subtitle_color.'>'.do_shortcode( $content ).'</span>';
                        endif;
	                $output .='</div>';
	            $output .='</li>';
        	break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_popular_dishes_content', 'hcode_popular_dishes_content_shortcode' );