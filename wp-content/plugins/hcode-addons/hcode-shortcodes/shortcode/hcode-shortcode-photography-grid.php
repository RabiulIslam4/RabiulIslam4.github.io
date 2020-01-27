<?php
/**
 * Shortcode For Photography Grid
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Photography Grid */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_photography_grid_shortcode' ) ) {
    function hcode_photography_grid_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
        			'id' => '',
                    'class' => '',
                    'hcode_photography_grid_column_type' => 'work-5col',
                ), $atts ) );
        $output = '';
    	$id = ( $id ) ? ' id="'.$id.'"' : '';
    	$class = ( $class ) ? ' '.$class : '';
        $hcode_photography_grid_column_type = ( $hcode_photography_grid_column_type ) ? $hcode_photography_grid_column_type : 'work-5col';
    	$output .= '<div'.$id.' class="'.$hcode_photography_grid_column_type.' masonry wide photography-grid'.$class.'">';
    		$output .= '<div class="tab-content">';
                $output .='<ul class="grid masonry-block-items">';
                	$output .= do_shortcode($content);
                $output .= '</ul>';
            $output .= '</div>';
        $output .= '</div>';
        return $output;
    }
}
add_shortcode( 'hcode_photography_grid', 'hcode_photography_grid_shortcode' );
 
if ( ! function_exists( 'hcode_photography_grid_content_shortcode' ) ) {
    function hcode_photography_grid_content_shortcode( $atts, $content = null) {
        extract( shortcode_atts( array(
        			'show_content' => '',
                    'hcode_image' => '',
                    'hcode_btn_image' => '',
                    'hcode_title' => '',
                    'hcode_url' => '',
                    'hcode_title_color' => '',
                    'display_setting' => '',
                    'desktop_display' => '',
                    'ipad_display' => '',
                    'mobile_display' => '',
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
                    'hcode_image_srcset' => 'full',
                    'hcode_button_image_srcset' => 'full',
                    'hcode_responsive_font'=>'',
        ), $atts ) );
        global $font_settings_array, $hcode_photography_grid_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $output = $block_display_setting= $responsive_class = '';
        $classes = array();
        
        //For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }
        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';
        $hcode_title = ($hcode_title) ? str_replace('||', '<br />',$hcode_title) : '';
        $hcode_title_color = ( $hcode_title_color ) ? 'style="color:'.$hcode_title_color.' !important;"' : '';
        $hcode_url = ($hcode_url) ? $hcode_url : '#';
        $class = ($class) ? $class : '';
        $id = ($id) ? ' id="'.$id.'"' : '';

        // For Display settings

        $display_setting = ( $display_setting ) ? $display_setting : '';
        if( $display_setting ) {
            $block_display_setting .= ( $desktop_display ) ? ' '.$desktop_display : '';
            $block_display_setting .= ( $ipad_display ) ? ' '.$ipad_display : '';
            $block_display_setting .= ( $mobile_display ) ? ' '.$mobile_display : '';
        }

        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_photography_grid_token = !empty( $hcode_photography_grid_token ) ? $hcode_photography_grid_token : 0;
            $hcode_photography_grid_token = $hcode_photography_grid_token + 1;
            $hcode_token_class = $classes[] = 'hcode-photography-grid-'.$hcode_photography_grid_token;
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
        
        $class_list = implode(" ", $classes);
        $photography_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

        switch ($show_content) {
        	case 'image':
        		if( $hcode_image ) {
    	    		$output .='<li'.$id.$photography_class.'>';
                    $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset );
    	            $output .='</li>';
                }
            break;
        	case 'content-with-title':
        		$output .='<li'.$id.$photography_class.'>';
                    if( $hcode_image ) {
                        $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset );
                    }
                    $output .='<div class="img-border-small img-border-small-gray border-transperent-light"></div>';
                    if( $hcode_title ) {
                        $output .='<figure>';
                            $output .='<figcaption>';
                                $output .='<div class="photography-grid-details">';
                                    $output .='<div class="separator-line-thick bg-white display-block no-margin-top"></div>';
                                        $output .='<span class="text-large letter-spacing-3 white-text font-weight-600 '.$responsive_class.'"><a href="'.$hcode_url.'" class="white-text" '.$hcode_title_color.'>'.$hcode_title.'</a></span>';
                                    $output .='<div class="separator-line-thick bg-white display-block no-margin-bottom"></div>';
                                $output .='</div>';
                            $output .='</figcaption>';
                        $output .='</figure>';
                    }
                $output .='</li>';
            break;
            case 'content-with-img-button':

                $hcode_button_image_srcset  = !empty($hcode_button_image_srcset) ? $hcode_button_image_srcset : 'full';
                $output .='<li'.$id.$photography_class.'>';
                    if( $hcode_image ) {
                        $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset );
                    }
                    $output .='<figure>';
                        $output .='<figcaption>';
                            $output .='<div class="photography-grid-details">';
                                if( $content ) {
                                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                }
                                if( $hcode_btn_image ) {
                                    $output .= '<a href="'.$hcode_url.'">';
                                    $output .= wp_get_attachment_image( $hcode_btn_image, $hcode_button_image_srcset, '', array( 'class' => 'width-auto margin-ten no-margin-bottom' ) );
                                    $output .= '</a>';
                                }
                            $output .='</div>';
                        $output .='</figcaption>';
                    $output .='</figure>';
                $output .='</li>';
            break;
            case 'simple-content':
                $output .='<li'.$id.$photography_class.'>';
                    if( $hcode_image ) {
                        $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset );
                    }
                    if( $content ) {
                        $output .='<figure>';
                            $output .='<figcaption>';
                                $output .='<div class="photography-grid-details text-center">';
                                    $output .= do_shortcode( $content );
                                $output .='</div>';
                            $output .='</figcaption>';
                        $output .='</figure>';
                    }
                $output .='</li>';
        	break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_photography_grid_content', 'hcode_photography_grid_content_shortcode' );