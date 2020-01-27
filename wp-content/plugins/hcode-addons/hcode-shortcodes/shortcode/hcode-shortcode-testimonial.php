<?php
/**
 * Shortcode For Testimonial
 *
 * @package H-Code
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hcode_testimonial_shortcode' ) ) {
    function hcode_testimonial_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
                    'show_blog_slider_style' => '',
                    'show_pagination' => '',
                    'show_pagination_style' => '',
                    'show_pagination_color_style' => '',
                    'show_cursor_color_style' => '',
                    'hcode_image_carousel_itemsdesktop' => '3',
                    'hcode_image_carousel_itemsminidesktop' => '3',
                    'hcode_image_carousel_itemstablet' => '2',
                    'hcode_image_carousel_itemsmobile' => '1',
                    'hcode_image_carousel_loop' => '',
                    'hcode_image_carousel_autoplay' => '',
                    'hcode_slider_id' => '',
                    'hcode_slider_class' => '',
                    'hcode_image_carousel_singleitem' => '',
                    'stoponhover' => '',
                    'slidespeed' => '3000',
                    'custom_slidespeed' => '',
                    'slidedelay' => '700',
                    'custom_slidedelay' => '',
                ), $atts ) );

            $output = $slider_config = $blog_post = '';
            global $hcode_slider_parent_type;
            $hcode_slider_parent_type = $show_blog_slider_style;
            $pagination = hcode_owl_pagination_slider_classes($show_pagination_style);
            $pagination_style = hcode_owl_pagination_color_classes($show_pagination_color_style);
            $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'hcode-testimonial';
            $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';
            $output .= '<div class="testimonial-slider position-relative no-transition">';
                $output .= '<div id="'.$hcode_slider_id.'" class="owl-carousel owl-theme owl-pagination-bottom position-relative '.$hcode_slider_class.$pagination.$pagination_style.$show_cursor_color_style.'">';
                                $output .= do_shortcode($content);
                $output .= '</div>';            
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
        ( $hcode_image_carousel_singleitem ) ? $slider_config .= 'items: 1,' : '';
        if( $hcode_image_carousel_autoplay == 1 && $hcode_image_carousel_singleitem != 1 ){
            ( $hcode_image_carousel_autoplay == 1 ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$slidespeed.',autoplaySpeed: '.$slidedelay.',' : $slider_config .= 'autoPlay: false,';
            ( $stoponhover == 1) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
        }else{
            ( $hcode_image_carousel_autoplay == 1 ) ? $slider_config .= 'autoplay:true, smartSpeed: '.$slidespeed.',' : $slider_config .= 'autoPlay: false,';
            ( $stoponhover == 1) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
        }
        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
        ( $hcode_image_carousel_loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
        if( $hcode_image_carousel_singleitem != 1 ) {
            ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "responsive:{" : '';
            ( $hcode_image_carousel_itemsmobile ) ? $slider_config .= '0:{ items: '.$hcode_image_carousel_itemsmobile.' },' : $slider_config .= '0:{ items: 1 },';
            ( $hcode_image_carousel_itemstablet ) ? $slider_config .= '767:{ items: '.$hcode_image_carousel_itemstablet.'},' : $slider_config .= '767:{ items: 2 },';
            ( $hcode_image_carousel_itemsminidesktop ) ? $slider_config .= '991:{ items: '.$hcode_image_carousel_itemsminidesktop.' },' : $slider_config .= '991:{ items: 3 },';
            ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= '1200:{ items: '.$hcode_image_carousel_itemsdesktop.' },' : $slider_config .= '1200:{ items: 3 },';
            ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "}," : '';
        }
        $slider_config .= 'navText: ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]';

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
add_shortcode( 'hcode_testimonial', 'hcode_testimonial_shortcode' );

if ( ! function_exists( 'hcode_testimonial_slide_content_shortcode' ) ) {
    function hcode_testimonial_slide_content_shortcode( $atts, $content = null) {
    	global $hcode_testimonial_parent_type;
        extract( shortcode_atts( array(
                    'image' => '',
                    'title' => '',
                    'hcode_testimonial_font_settings' => '',
                    'hcode_title_color' => '',
                    'hcode_icon_color' => '',
                    'hcode_icon' => '',
                    'hcode_icon_size' => '',
                    'hcode_image_srcset' => 'full',
                ), $atts ) );
        
        $output = $hcode_testimonial_font_settings_id = $hcode_testimonial_font_settings_style = $hcode_testimonial_font_settings_class = '';
        $title = ( $title ) ? $title : '';  

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

        $hcode_title_color = ($hcode_title_color) ? ' style="color:'.$hcode_title_color.'"' : '';
        $hcode_icon_color = ($hcode_icon_color) ? ' style="color:'.$hcode_icon_color.'"' : '';
        $hcode_icon_size = ( $hcode_icon_size ) ? $hcode_icon_size : '';

        global $font_settings_array;
        if( !empty( $hcode_testimonial_font_settings ) ) {
            $hcode_testimonial_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_testimonial_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_testimonial_font_settings, $hcode_testimonial_font_settings_id );
            $hcode_testimonial_font_settings_class = ' '.$hcode_testimonial_font_settings_id;
        }

        ( !empty( $hcode_testimonial_font_settings_style ) ) ? $font_settings_array[] = $hcode_testimonial_font_settings_style : '';


        if( $image || $content || $title ) {
                $output .= '<div class="col-md-12 col-sm-12 col-xs-12 testimonial-style2 center-col text-center margin-three no-margin-top">';
                if( $image ) {
                    $output .= wp_get_attachment_image( $image, $hcode_image_srcset );
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $title ) {
                    $output .= '<span class="name light-gray-text2'.$hcode_testimonial_font_settings_class.'"'.$hcode_title_color.'>'.$title.'</span>';
                }
                if( $hcode_icon == 1 ) {
                    $output .= '<i class="fas fa-quote-left '.$hcode_icon_size.' display-block margin-five no-margin-bottom"'.$hcode_icon_color.'></i>';
                }
            $output .= '</div>';
        }
        return $output;
    }
}
add_shortcode( 'hcode_testimonial_slide_content', 'hcode_testimonial_slide_content_shortcode' );