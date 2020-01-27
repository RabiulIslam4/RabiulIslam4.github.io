<?php
/**
 * Shortcode For Travel Agency Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Onepage Travel Agency Slider Special Offers Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_travel_special_offers_slider_shortcode' ) ) {
    function hcode_travel_special_offers_slider_shortcode( $atts, $content = null ) {

    		extract( shortcode_atts( array(
                    'show_pagination' => '',
                    'show_pagination_style' => '',
                    'show_navigation' => '',
                    'show_navigation_style' => '',
                    'show_pagination_color_style' => '',
                    'hcode_image_carousel_itemsdesktop' => '4',
                    'hcode_image_carousel_itemsminidesktop' => '3',
                    'hcode_image_carousel_itemstablet' => '2',
                    'hcode_image_carousel_itemsmobile' => '1',
                    'hcode_image_carousel_loop' => '',
                    'hcode_image_carousel_autoplay' => '',
                    'hcode_slider_id' => '',
                    'hcode_slider_class' => '',
                    'show_cursor_color_style' => '',
                    'stoponhover' => '',
                    'slidespeed' => '3000',
                    'custom_slidespeed' => '',
                    'slidedelay' => '700',
                    'custom_slidedelay' => '',
            ), $atts ) );
            $output = $slider_config = '';
            $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;
            $pagination = hcode_owl_pagination_slider_classes($show_pagination_style);
            $pagination_style = hcode_owl_pagination_color_classes($show_pagination_color_style);
            $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'travel-agency-special-offers-slider';
            $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';

            $output .= '<div class="travel-special-offers-slider position-relative">';
                $output .= '<div class="container">';
                    $output .= '<div class="row">';
                        $output .= '<div id="'.$hcode_slider_id.'" class="owl-pagination-bottom owl-carousel owl-theme'.$show_cursor_color_style.$pagination.$navigation.$pagination_style.$navigation.$hcode_slider_class.'">';
                            $output .= do_shortcode($content);
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
                if( $show_navigation == 1 ):
                    if($show_navigation_style == 1):
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre.png" width="96" height="96" ></a>';
                            $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next.png" width="96" height="96"></a>';
                        $output .= '</div>';
                    else:
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-white-bg.png" width="96" height="96"></a>';
                            $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-white-bg.png" width="96" height="96"></a>';
                        $output .= '</div>';
                    endif;
                endif;
            $output .= '</div>';
            	
        /* Add custom script Start*/
        $slidespeed = ( $slidespeed ) ? $slidespeed : '3000';
        $custom_slidespeed = ( $custom_slidespeed ) ? $custom_slidespeed : '';
        if( $slidespeed == 'custom' && $custom_slidespeed && is_numeric( $custom_slidespeed ) ) {
            $slidespeed = $custom_slidespeed;
        }

        if( $slidespeed == 'custom' ) {
            $slidespeed = '3000';
        }

        $slidedelay = ( $slidedelay ) ? $slidedelay : '700';
        $custom_slidedelay = ( $custom_slidedelay ) ? $custom_slidedelay : '';
        if( $slidedelay == 'custom' && $custom_slidedelay && is_numeric( $custom_slidedelay ) ) {
            $slidedelay = $custom_slidedelay;
        }

        if( $slidedelay == 'custom' ) {
            $slidedelay = '700';
        }

        ( $show_pagination == 1 ) ? $slider_config .= 'dots: true,' : $slider_config .= 'dots: false,';
        ( $hcode_image_carousel_autoplay == 1 ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$slidespeed.',autoplaySpeed: '.$slidedelay.',' : $slider_config .= 'autoPlay: false,';
        ( $stoponhover == 1) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
        ( $hcode_image_carousel_loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
        ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "responsive:{" : '';
        ( $hcode_image_carousel_itemsmobile ) ? $slider_config .= '0:{ items: '.$hcode_image_carousel_itemsmobile.' },' : $slider_config .= '0:{ items: 1 },';
        ( $hcode_image_carousel_itemstablet ) ? $slider_config .= '700:{ items: '.$hcode_image_carousel_itemstablet.'},' : $slider_config .= '700:{ items: 2 },';
        ( $hcode_image_carousel_itemsminidesktop ) ? $slider_config .= '991:{ items: '.$hcode_image_carousel_itemsminidesktop.' },' : $slider_config .= '991:{ items: 3 },';
        ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= '1200:{ items: '.$hcode_image_carousel_itemsdesktop.' },' : $slider_config .= '1200:{ items: 3 },';
        ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "}" : '';

        ob_start();?>
        <script type="text/javascript">jQuery(document).ready(function () { jQuery("<?php echo '#'.$hcode_slider_id;?>").owlCarousel({ <?php echo $slider_config;?> }); });</script> 
        <?php 
        $script = ob_get_contents();
        ob_end_clean();
        $output .= $script;
        /* Add custom script End*/
        return $output;
    }
}
add_shortcode( 'hcode_travel_special_offers_slider', 'hcode_travel_special_offers_slider_shortcode' );

if ( ! function_exists( 'hcode_travel_special_offers_slide_content_shortcode' ) ) {
    function hcode_travel_special_offers_slide_content_shortcode( $atts, $content = null) {
    	
        extract( shortcode_atts( array(
                    'id' => '',
                    'class' => '',
                    'slide_image' => '',
                    'title' => '',
                    'subtitle' => '',
                    'title_color' => '',
                    'subtitle_color' => '',
                    'button_config' => '',
                    'hcode_responsive_title_font' => '',
                    'hcode_responsive_subtitle_font' => '',
                    'hcode_image_srcset' => 'full',
                    'button_config_settings' => '',
                ), $atts ) );
        $output = $hcode_responsive_title_font_id = $hcode_responsive_title_font_style = $hcode_responsive_title_font_class = $hcode_responsive_subtitle_font_id = $hcode_responsive_subtitle_font_style = $hcode_responsive_subtitle_font_class = $button_responsive_id = $button_responsive_style = $button_responsive_class = '';
        $title = ( $title ) ? $title : '';

        $slide_image = ( $slide_image ) ? $slide_image : '';
        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
        
        $title_color = ( $title_color ) ? 'style="color:'.$title_color.' !important;"' : '';
        $subtitle_color = ( $subtitle_color ) ? 'style="color:'.$subtitle_color.' !important;"' : '';
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class : '';
        
        if (function_exists('vc_parse_multi_attribute')) {
            // For Button
            $button_parse_args = vc_parse_multi_attribute($button_config);
            $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '';
            $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
            $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';  
        }

        //For Title Font Settings
        global $font_settings_array;

        if( !empty( $button_config_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_settings, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';

        if( !empty( $hcode_responsive_title_font ) ) {
            $hcode_responsive_title_font_id = uniqid('hcode-font-setting-');
            $hcode_responsive_title_font_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $hcode_responsive_title_font_id );
            $hcode_responsive_title_font_class = ' '.$hcode_responsive_title_font_id;
        }

        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $hcode_responsive_subtitle_font_id = uniqid('hcode-font-setting-');
            $hcode_responsive_subtitle_font_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $hcode_responsive_subtitle_font_id );
            $hcode_responsive_subtitle_font_class = ' '.$hcode_responsive_subtitle_font_id;
        }

        ( !empty( $hcode_responsive_title_font_style ) ) ? $font_settings_array[] = $hcode_responsive_title_font_style : '';
        ( !empty( $hcode_responsive_subtitle_font_style ) ) ? $font_settings_array[] = $hcode_responsive_subtitle_font_style : '';

        if( $slide_image || $title || $subtitle ) {
            $output .= '<div class="item col-md-12 col-sm-12'.$class.'"'.$id.'>';
                if( $slide_image ) {
                    if( $button_link ) {
                        $output .='<a href="'.$button_link.'" target="'.$button_target.'">';
                        $output .= wp_get_attachment_image( $slide_image, $hcode_image_srcset );
                        $output .= '</a>';
                    } else {
                        $output .= wp_get_attachment_image( $slide_image, $hcode_image_srcset );
                    }
                }
                $output .= '<div class="popular-destinations-text bg-white">';
                    if( $title || $title_color ) {
                        $output .= '<span class="destinations-name text-uppercase font-weight-600 letter-spacing-2 black-text display-block'.$hcode_responsive_title_font_class.'" '.$title_color.'>'.$title.'</span>';
                    }
                    if( $subtitle || $subtitle_color ) {
                        $output .= '<span class="destinations-place text-uppercase font-weight-400 letter-spacing-2 display-block margin-two no-margin-bottom'.$hcode_responsive_subtitle_font_class.'" '.$subtitle_color.'>'.$subtitle.'</span>';
                    }
                    if( $button_title ) {
                        $output .= '<a class="highlight-button btn btn-small no-margin-right'.$button_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                    }
                $output .= '</div>';
            $output .= '</div>';
        }
        return $output;
    }
}
add_shortcode( 'hcode_travel_special_offers_slide_content', 'hcode_travel_special_offers_slide_content_shortcode' );