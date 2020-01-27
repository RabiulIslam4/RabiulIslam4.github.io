<?php
/**
 * Shortcode For Feature Project Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Feature Project Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_architecture_featured_projects_slider_shortcode' ) ) {
    function hcode_architecture_featured_projects_slider_shortcode( $atts, $content = null ) {
    		extract( shortcode_atts( array(
                    'show_pagination' => '',
                    'show_pagination_style' => '',
                    'show_navigation' => '',
                    'show_navigation_style' => '',
                    'show_pagination_color_style' => '',
                    'show_cursor_color_style' => '',
                    'hcode_image_carousel_itemsdesktop' => '4',
                    'hcode_image_carousel_itemsminidesktop' => '3',
                    'hcode_image_carousel_itemstablet' => '2',
                    'hcode_image_carousel_itemsmobile' => '1',
                    'hcode_image_carousel_autoplay' => '',
                    'hcode_image_carousel_loop' => '',
                    'hcode_slider_id' => '',
                    'hcode_slider_class' => '',
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
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' black-cursor';
            $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'architecture-feature-project-slider';
            $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';

            $output .= '<div class="architecture-feature-slider feature-project-slider position-relative">';
                $output .= '<div class="container">';
                    $output .= '<div class="row">';
                        $output .= '<div id="'.$hcode_slider_id.'" class="owl-pagination-bottom owl-carousel owl-theme'.$pagination.$navigation.$pagination_style.$navigation.$hcode_slider_class.$show_cursor_color_style.'">';
                            $output .= do_shortcode($content);
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
                // For Navigation
                if( $show_navigation == 1 ):
                    if($show_navigation_style == 1):
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre.png" width="96" height="96" ></a>';
                            $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next.png" width="96" height="96" ></a>';
                        $output .= '</div>';
                    else:
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-white-bg.png" width="96" height="96" ></a>';
                            $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-white-bg.png" width="96" height="96" ></a>';
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
add_shortcode( 'hcode_architecture_featured_projects_slider', 'hcode_architecture_featured_projects_slider_shortcode' );
 
if ( ! function_exists( 'hcode_architecture_featured_projects_slide_content_shortcode' ) ) {
    function hcode_architecture_featured_projects_slide_content_shortcode( $atts, $content = null) {
    	global $hcode_slider_parent_type, $font_settings_array;
    	
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'slide_image' => '',
            'title' => '',
            'hcode_title_color' => '',
            'img_url' => '',
            'hcode_image_srcset' => 'full',
            'hcode_responsive_font' => '',
        ), $atts ) );
        $output = $responsive_id = $responsive_style = $responsive_class = '';

        //For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }

        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        $title = ( $title ) ? $title : '';
        $slide_image = ( $slide_image ) ? $slide_image : '';
        $hcode_title_color = ( $hcode_title_color ) ? 'style="color:'.$hcode_title_color.';"' : '';
        $id = ( $id ) ? $id : '';
    	$class = ( $class ) ? ' '.$class : '';
        $img_url = ( $img_url ) ? $img_url : '';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

        if( $slide_image || $title ) {
            $output .= '<div class="item'.$class.'"'.$id .'>';
                if( $slide_image ) {
                    $output .='<a href="'.$img_url.'">';
                        $output .= wp_get_attachment_image( $slide_image, $hcode_image_srcset );
                    $output .= '</a>';
                }
                if( $title ) {
                    $output .='<h5 class="margin-ten no-margin-bottom xs-margin-top-five'.$responsive_class.'" '.$hcode_title_color.'>'.$title.'</h5>';
                }
            $output .= '</div>';
        }
        return $output;
    }
}
add_shortcode( 'hcode_architecture_featured_projects_slide_content', 'hcode_architecture_featured_projects_slide_content_shortcode' );