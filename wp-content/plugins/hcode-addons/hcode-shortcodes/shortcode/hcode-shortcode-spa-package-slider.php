<?php
/**
 * Shortcode For Spa Package Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Spa Package Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_spa_packages_slider_shortcode' ) ) {
    function hcode_spa_packages_slider_shortcode( $atts, $content = null ) {
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
            $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'spa-package-owl-slider';
            $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';
            $output .= '<div class="spa-our-packages-owl position-relative">';
                $output .= '<div class="container">';
                    $output .= '<div class="row">';
                        $output .= '<div id="'.$hcode_slider_id.'" class="owl-pagination-bottom owl-carousel spa-our-packages owl-theme'.$show_cursor_color_style.$pagination.$navigation.$pagination_style.$navigation.$hcode_slider_class.'">';
                            $output .= do_shortcode($content);
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
                if( $show_navigation == 1 ):
                    if($show_navigation_style == 1):
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre.png" width="96" height="96"></a>';
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
        ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= '1200:{ items: '.$hcode_image_carousel_itemsdesktop.' },' : $slider_config .= '1200:{ items: 4 },';
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
add_shortcode( 'hcode_spa_packages_slider', 'hcode_spa_packages_slider_shortcode' );

if ( ! function_exists( 'hcode_spa_slide_content_shortcode' ) ) {
    function hcode_spa_slide_content_shortcode( $atts, $content = null) {
    	global $hcode_slider_parent_type;
    	
        extract( shortcode_atts( array(
                    'id' => '',
                    'class' => '',
                    'slide_image' => '',
                    'title' => '',
                    'price_text' => '',
                    'hcode_show_separator' => '',
                    'grade_button' => '',
                    'hcode_title_color' => '',
                    'hcode_price_color' => '',
                    'separator_height' => '',
                    'hcode_sep_color' => '',
                    'hcode_title_font_settings' => '',
                    'hcode_price_text_font_settings' => '',
                    'hcode_image_srcset' => 'full',
                    'button_config_settings' => '',
                ), $atts ) );
        $output = $separator = $hcode_title_font_settings_id = $hcode_title_font_settings_style = $hcode_title_font_settings_class = $hcode_price_text_font_settings_id = $hcode_price_text_font_settings_style = $hcode_price_text_font_settings_class = $button_responsive_id = $button_responsive_style = $button_responsive_class = '';

        global $font_settings_array;

        if( !empty( $button_config_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_settings, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';

        if( !empty( $hcode_title_font_settings ) ) {
            $hcode_title_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_title_font_settings, $hcode_title_font_settings_id );
            $hcode_title_font_settings_class = ' '.$hcode_title_font_settings_id;
        }
        if( !empty( $hcode_price_text_font_settings ) ) {
            $hcode_price_text_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_price_text_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_price_text_font_settings, $hcode_price_text_font_settings_id );
            $hcode_price_text_font_settings_class = ' '.$hcode_price_text_font_settings_id;
        }

        ( !empty( $hcode_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_title_font_settings_style : '';
        ( !empty( $hcode_price_text_font_settings_style ) ) ? $font_settings_array[] = $hcode_price_text_font_settings_style : '';

        $title = ( $title ) ? $title : '';
        $price_text =( $price_text ) ? $price_text : '';
        $slide_image = ( $slide_image ) ? $slide_image : '';
        $hcode_title_color = ( $hcode_title_color ) ? ' style="color:'.$hcode_title_color.' !important;"' : '';
        $hcode_price_color = ( $hcode_price_color ) ? ' style="color:'.$hcode_price_color.' !important;"' : '';
        $id = ( $id ) ? 'id='.$id.'' : '';
    	$class = ( $class ) ? ' '.$class : '';
        if (function_exists('vc_parse_multi_attribute')) {
            // For Button
            $button_parse_args = vc_parse_multi_attribute($grade_button);
            $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '';
            $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
            $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self'; 
        }

        $hcode_sep_color = ($hcode_sep_color) ? 'background:'.$hcode_sep_color.';' : '';
        $separator_height = ($separator_height) ? 'height:'.$separator_height.';' : '';

        if($hcode_sep_color || $separator_height):
            $separator = ' style="'.$hcode_sep_color.$separator_height.'"';
        endif;

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

        $output .='<div class="item">';
            $output .='<div '.$id.' class="col-md-12 sm-margin-bottom-ten '.$class.'">';
                if( $slide_image ) {
                    $output .= wp_get_attachment_image( $slide_image, $hcode_image_srcset );
                }
                if( $title || $price_text || $button_title || $content ) {
                    $output .='<div class="content-box bg-white">';
                        if( $title ) {
                            $output .='<p class="black-text margin-ten no-margin text-med text-uppercase letter-spacing-2 font-weight-600 no-margin'.$hcode_title_font_settings_class.'"'.$hcode_title_color.'>'.$title.'</p>';
                        }
                        if( $price_text ) {
                            $output .='<p class="text-med text-uppercase letter-spacing-1 no-margin'.$hcode_price_text_font_settings_class.'"'.$hcode_price_color.'>'.$price_text.'</p>';
                        }
                        if( $hcode_show_separator == 1 ) {
                            $output .='<div class="thin-separator-line bg-black no-margin-lr"'.$separator.'></div>';
                        }
                        if( $content ) {
                            $output .='<p>'.do_shortcode( $content ).'</p>';
                        }
                        if( $button_title ) {
                            $output .='<a class="btn inner-link btn-black btn-small no-margin'.$button_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                        }
                    $output .='</div>';
                }
            $output .='</div>';
        $output .='</div>';
        return $output;
    }
}
add_shortcode( 'hcode_spa_slide_content', 'hcode_spa_slide_content_shortcode' );