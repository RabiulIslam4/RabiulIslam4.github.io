<?php
/**
 * Shortcode For Restaurant Menu Slider
 *
 * @package H-Code
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Restaurant Menu Slider */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hcode_restaurant_menu_shortcode' ) ) {
    function hcode_restaurant_menu_shortcode( $atts, $content = null ) {

        extract( shortcode_atts( array(
                    'show_pagination' => '',
                    'show_pagination_style' => '',
                    'show_navigation' => '',
                    'show_navigation_style' => '',
                    'transition_style' => '',
                    'transition_animation_out' => '',
                    'show_pagination_color_style' => '',
                    'autoplay' => '',
                    'loop' => '',
                    'stoponhover' => '',
                    'slidespeed' => '3000',
                    'custom_slidespeed' => '',
                    'hcode_slider_id' => '',
                    'hcode_slider_class' => '',
                    'hcode_overlay_color' => '',
                    'hcode_overlay_opacity' => '',
                    'slidedelay' => '700',
                    'custom_slidedelay' => '',
                ), $atts ) );
        
        global $hcode_overlay;
        $output  = $slider_config = $slider_id ='';
        $transition_style           = ( $transition_style ) ? $transition_style : '';
        $pagination = ($show_pagination_style) ? hcode_owl_pagination_slider_classes($show_pagination_style) : hcode_owl_pagination_slider_classes('default');
        $pagination_style = ($show_pagination_color_style) ? hcode_owl_pagination_color_classes($show_pagination_color_style) : hcode_owl_pagination_color_classes('default');
        $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;

        /* Overlay */
        $hcode_overlay_opacity = ( $hcode_overlay_opacity ) ? 'opacity:'.$hcode_overlay_opacity.';' : '';
        $hcode_overlay_color = ( $hcode_overlay_color ) ? 'background-color:'.$hcode_overlay_color.';' : '';
        
        if( $hcode_overlay_opacity || $hcode_overlay_color ){
            $hcode_overlay = ' style="'.$hcode_overlay_opacity.$hcode_overlay_color.'"';
        }

        /* Check if Slider Id and Class */
        $hcode_slider_id = ( $hcode_slider_id ) ? $slider_id = $hcode_slider_id : $slider_id = 'hcode-restaurent-menu';
        $hcode_slider_class = ( $hcode_slider_class ) ? $hcode_slider_class : '';

        $output .= '<div id="'.$slider_id.'" class="owl-carousel owl-theme col-xs-12 no-padding bottom-pagination position-relative '.$hcode_slider_class.$pagination.$pagination_style.$navigation.'">';
                $output .= do_shortcode($content);
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


        if( $transition_style == 'fade' ){
            $transition_style = 'fadeIn';
            $transition_animation_out = 'fadeOut';
        }
        if( $transition_style == 'slide' ){
            $transition_style = '';
            $transition_animation_out = '';
        }
        if( $transition_style == 'goDown' ){
            $transition_style = 'slideInDown';
            $transition_animation_out = 'fadeOut';
        }
        if( $transition_style == 'backSlide' ){
            $transition_style = 'fadeOutLeft';
            $transition_animation_out = 'fadeInRight';
        }
        if( $transition_style == 'fadeUp' ){
            $transition_style = 'zoomIn';
            $transition_animation_out = 'fadeOut';
        }
        
        ( $show_navigation == 1 ) ? $slider_config .= 'nav: true,' : $slider_config .= 'nav: false,';
    	( $show_pagination == 1 ) ? $slider_config .= 'dots: true,' : $slider_config .= 'dots: false,';
    	( $transition_style ) ? $slider_config .= 'animateIn: "'.$transition_style .'",' : '';
        ( $transition_animation_out ) ? $slider_config .= 'animateOut: "'.$transition_animation_out .'",' : '';
    	( $autoplay == 1 ) ? $slider_config .= 'autoplay:true, smartSpeed: '.$slidespeed.',autoplaySpeed: '.$slidedelay.',' : $slider_config .= 'autoPlay: false,';
    	( $stoponhover == 1) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
        ( $loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
    	$slider_config .= 'items: 1,';
    	$slider_config .= 'dotsSpeed: 400,';
    	$slider_config .= 'navText: ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]';
    	ob_start();?>
        <script type="text/javascript">jQuery(document).ready(function () { jQuery("<?php echo '#'.$slider_id;?>").owlCarousel({ <?php echo $slider_config;?> }); }); </script>
    	<?php 
    	$script = ob_get_contents();
    	ob_end_clean();
                
        $output .= $script;
    	/* Add custom script End*/
        return $output;
    }
}
add_shortcode( 'hcode_restaurant_menu', 'hcode_restaurant_menu_shortcode' );

if ( ! function_exists( 'hcode_restaurant_menu_slide_content_shortcode' ) ) {
    function hcode_restaurant_menu_slide_content_shortcode( $atts, $content = null) {
        global $hcode_testimonial_parent_type;
        
        extract( shortcode_atts( array(
                    'image' => '',
                    'title' => '',
                    'subtitle' => '',
                    'content_image' => '',
                    'hcode_menu_image_srcset' => 'full',
                    'hcode_content_image_srcset' => 'full',
                    'hcode_responsive_title_font' => '',
                    'hcode_responsive_subtitle_font' => '',
                    'hcode_title_color' => '',
                    'hcode_subtitle_color' => '',
                ), $atts ) );

        global $hcode_overlay, $font_settings_array;
        $output = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id =$subtitle_responsive_style = $subtitle_responsive_class = '';
        $title        = ( $title ) ? $title : '';   

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
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
        
        $hcode_title_color = ( $hcode_title_color ) ? ' style="color:'.$hcode_title_color.';"' : '';
        $hcode_subtitle_color = ( $hcode_subtitle_color ) ? ' style="color:'.$hcode_subtitle_color.';"' : '';

        $hcode_menu_image_srcset  = !empty($hcode_menu_image_srcset) ? $hcode_menu_image_srcset : 'full';
        $thumb = wp_get_attachment_image_src( $image, $hcode_menu_image_srcset );

        $srcset = $srcset_data_bg = $srcset_classes_bg = '';
        $srcset = wp_get_attachment_image_srcset( $image, $hcode_menu_image_srcset );

        if( $srcset ){
            $srcset_data_bg = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
            $srcset_classes_bg = ' bg-image-srcset';
        }

        $hcode_content_image_srcset  = !empty($hcode_content_image_srcset) ? $hcode_content_image_srcset : 'full';
        
        if( $thumb[0] || $content || $title || $content_image || $subtitle ) {
        $output .='<div class="item">';
            if( $thumb[0]  ) {
                $output .='<div class="col-md-6 restaurant-menu-img cover-background'.$srcset_classes_bg.'" style="background-image:url('.$thumb[0].');"'.$srcset_data_bg.'>';
            } else {
                $output .='<div class="col-md-6 restaurant-menu-img cover-background">';
            }
            $output .='<div class="img-border"></div>';
            $output .='<div class="opacity-full bg-dark-gray"'.$hcode_overlay.'></div>';
                $output .='<div class="popular-dishes">';
                    if( $content_image ) {
                        $output .= wp_get_attachment_image( $content_image, $hcode_content_image_srcset );
                        $output .='<br>';
                    }
                    if( $title ) {
                        $output .='<span class="title-small white-text text-uppercase letter-spacing-3 display-block'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</span>';
                    }
                    if( $subtitle ) {
                        $output .='<span class="food-time text-small white-text display-block text-uppercase letter-spacing-2'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>'.$subtitle.'</span>';
                    }
                $output .='</div>';

            $output .='</div>';
            if( $content ) {
                $output .='<div class="col-md-6 bg-white restaurant-menu-text-main margin-three no-margin-top">';
                    $output .='<div class="restaurant-menu-text">';
                        $output .= do_shortcode( hcode_remove_wpautop($content) );
                    $output .='</div>';
                $output .='</div>';
            }
        $output .='</div>';
        }
        return $output;
    }
}
add_shortcode( 'hcode_restaurant_menu_slide_content', 'hcode_restaurant_menu_slide_content_shortcode' );