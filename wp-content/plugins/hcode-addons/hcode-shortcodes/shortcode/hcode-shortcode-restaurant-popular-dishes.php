<?php
/**
 * Shortcode For Popular Dishes Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popular Dishes Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_restaurant_popular_dish_slider_shortcode' ) ) {
    function hcode_restaurant_popular_dish_slider_shortcode( $atts, $content = null ) {

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
                    'stoponhover' => '',
                    'slidespeed' => '3000',
                    'custom_slidespeed' => '',
                    'hcode_slider_id' => '',
                    'hcode_slider_class' => '',
                    'slidedelay' => '700',
                    'custom_slidedelay' => '',
                ), $atts ) );
            $output = $slider_config = '';
            $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;
            $pagination = hcode_owl_pagination_slider_classes($show_pagination_style);
            $pagination_style = hcode_owl_pagination_color_classes($show_pagination_color_style);
            $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'restaurant-popular-dish';
            $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $output .= '<div class="restaurant-popular-dish-owl position-relative">';
                $output .= '<div class="container">';
                    $output .= '<div class="row">';   
                        $output .= '<div id="'.$hcode_slider_id.'" class="owl-pagination-bottom owl-carousel owl-theme'.$pagination.$navigation.$pagination_style.$navigation.$hcode_slider_class.'">';
                            $output .= do_shortcode($content);
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
                if( $show_navigation == 1 ):
                    if($show_navigation_style == 1):
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre.png" width="96" height="96"></a>';
                            $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next.png" width="96" height="96" ></a>';
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
        ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "responsive:{ " : '';
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
add_shortcode( 'hcode_restaurant_popular_dish_slider', 'hcode_restaurant_popular_dish_slider_shortcode' );

if ( ! function_exists( 'hcode_restaurant_popular_dish_slide_content_shortcode' ) ) {
    function hcode_restaurant_popular_dish_slide_content_shortcode( $atts, $content = null) {
    	global $hcode_slider_parent_type;
    	
        extract( shortcode_atts( array(
                    'id' => '',
                    'class' => '',
                    'slide_image' => '',
                    'title' => '',
                    'price_text' => '',
                    'hcode_show_separator' => '',
                    'hcode_title_color' => '',
                    'hcode_content_color' => '',
                    'hcode_image_srcset' => 'full',
                    'hcode_responsive_title_font' => '',
                    'hcode_responsive_price_font' => '',
                ), $atts ) );

        global $font_settings_array;
        $output = $title_responsive_id = $title_responsive_style = $title_responsive_class = $price_responsive_id = $price_responsive_style = $price_responsive_class = '';

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_price_font ) ) {
            $price_responsive_id = uniqid('hcode-font-setting-');
            $price_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_price_font, $price_responsive_id );
            $price_responsive_class = ' '.$price_responsive_id;
        }
        ( !empty( $price_responsive_style ) ) ? $font_settings_array[] = $price_responsive_style : '';

        ob_start();
        $title        = ( $title ) ? $title : '';
        $price_text =( $price_text ) ? $price_text : '';
        $slide_image = ( $slide_image ) ? $slide_image : '';
        $hcode_title_color = ( $hcode_title_color ) ? 'style="color:'.$hcode_title_color.';"' : '';
        $hcode_content_color = ( $hcode_content_color ) ? 'style="color:'.$hcode_content_color.';"' : '';
        $id        = ( $id ) ? $id : '';
    	$class     = ( $class ) ? ' '.$class : '';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

        $output .='<div class="col-md-12 col-sm-12 special-dishes xs-margin-bottom-ten">';
            $output .='<div class="position-relative">';
                if( $slide_image ) {
                    $output .= wp_get_attachment_image( $slide_image, $hcode_image_srcset );
                }
                if( $price_text ) {
                    $output .='<span class="special-dishes-price bg-light-yellow red-text alt-font'.$price_responsive_class.'">'.$price_text.'</span>';
                }
            $output .='</div>';
            if( $title ) {
                $output .='<p class="text-uppercase letter-spacing-2 font-weight-600 margin-ten no-margin-bottom'.$title_responsive_class.'" '.$hcode_title_color.'>'.$title.'</p>';
            }
            if( $content ) {
                $output .='<p class="margin-two text-med width-90" '.$hcode_content_color.'>'.do_shortcode( $content ).'</p>';
            }
            if( $hcode_show_separator == 1 ) {
                $output .='<div class="thin-separator-line bg-dark-gray no-margin-lr"></div>';
            }
        $output .='</div>';
        return $output;
    }
}
add_shortcode( 'hcode_restaurant_popular_dish_slide_content', 'hcode_restaurant_popular_dish_slide_content_shortcode' );