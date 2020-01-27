<?php
/**
 * Shortcode For OWL Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* OWL Slider */
/*-----------------------------------------------------------------------------------*/

$hcode_slider_parent_type='';
if ( ! function_exists( 'hcode_image_carousel_shortcode' ) ) {
    function hcode_image_carousel_shortcode( $atts, $content = null ) {
    		extract( shortcode_atts( array(
                    'show_pagination' => '',
                    'show_pagination_style' => '',
                    'show_navigation' => '',
                    'show_navigation_style' => '',
                    'show_pagination_color_style' => '',
                    'hcode_image_carousel_itemsdesktop' => '3',
                    'hcode_image_carousel_itemsminidesktop' => '3',
                    'hcode_image_carousel_itemstablet' => '2',
                    'hcode_image_carousel_itemsmobile' => '1',
                    'hcode_image_carousel_autoplay' => '',
                    'hcode_image_carousel_loop' => '',
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
    		$pagination = hcode_owl_pagination_slider_classes($show_pagination_style);
            $pagination_style = hcode_owl_pagination_color_classes($show_pagination_color_style);
    	    $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;
    	    $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'image-owl-slider';
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';
    		$hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $output .= '<div class="blog-slider">';
                $output .= '<div id="'.$hcode_slider_id.'" class="owl-pagination-bottom owl-carousel owl-theme'.$pagination.$pagination_style.$navigation.$hcode_slider_class.$show_cursor_color_style.'">';
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
            
            ( $show_navigation == 1 ) ? $slider_config .= 'nav: true,' : $slider_config .= 'nav: false,';
        	( $show_pagination == 1 ) ? $slider_config .= 'dots: true,' : $slider_config .= 'dots: false,';
        	( $hcode_image_carousel_autoplay == 1 ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$slidespeed.',' : $slider_config .= 'autoPlay: false,';
            ( $stoponhover == 1) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false,autoplaySpeed: '.$slidedelay.', ';
            ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
            ( $hcode_image_carousel_loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
            ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "responsive:{" : '';
            ( $hcode_image_carousel_itemsmobile ) ? $slider_config .= '0:{ items: '.$hcode_image_carousel_itemsmobile.' },' : $slider_config .= '0:{ items: 1 },';
            ( $hcode_image_carousel_itemstablet ) ? $slider_config .= '700:{ items: '.$hcode_image_carousel_itemstablet.'},' : $slider_config .= '700:{ items: 2 },';
            ( $hcode_image_carousel_itemsminidesktop ) ? $slider_config .= '991:{ items: '.$hcode_image_carousel_itemsminidesktop.' },' : $slider_config .= '991:{ items: 3 },';
            ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= '1200:{ items: '.$hcode_image_carousel_itemsdesktop.' },' : $slider_config .= '1200:{ items: 4 },';
            
            ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "}," : '';

        	$slider_config .= 'navText: ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]';

        	ob_start();?>
        	<script type="text/javascript"> jQuery(document).ready(function () { jQuery("<?php echo '#'.$hcode_slider_id;?>").owlCarousel({	<?php echo $slider_config;?> }); }); </script>
        	<?php 
        	$script = ob_get_contents();
        	ob_end_clean();
        	$output .= $script;
        	/* Add custom script End*/
            return $output;
    }
}
add_shortcode( 'hcode_image_carousel', 'hcode_image_carousel_shortcode' );

if ( ! function_exists( 'hcode_image_carousel_content_shortcode' ) ) {
    function hcode_image_carousel_content_shortcode( $atts, $content = null) {
    	global $hcode_slider_parent_type;
        extract( shortcode_atts( array(
                    'id' => '',
                    'class' => '',
                    'hcode_image_carousel_content_image' => '',
                    'hcode_image_carousel_content_image_url' => '#',
                    'hcode_image_carousel_content_image_url_target_blank' => '',
                    'hcode_image_srcset' => 'full',
                ), $atts ) );
        $output = '';
        $id = ( $id ) ? ' id="'.$id.'"' : '';
    	$class = ( $class ) ? ' '.$class : '';
        $hcode_image_carousel_content_image = ( $hcode_image_carousel_content_image ) ? $hcode_image_carousel_content_image : '';
        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

        $hcode_image_carousel_content_image_url = ( $hcode_image_carousel_content_image_url ) ? $hcode_image_carousel_content_image_url : '';
        $hcode_image_carousel_content_image_url_target_blank = ( $hcode_image_carousel_content_image_url_target_blank == 1 ) ? ' target="_blank"' : ' target="_self"';

        if( $hcode_image_carousel_content_image ) {
            $output .='<div class="item">';
            if( $hcode_image_carousel_content_image_url ) {
                $output .='<a href="'.$hcode_image_carousel_content_image_url.'"'.$hcode_image_carousel_content_image_url_target_blank.'>';
            }
            $output .= wp_get_attachment_image( $hcode_image_carousel_content_image, $hcode_image_srcset );
            if( $hcode_image_carousel_content_image_url ) {
                $output .='</a>';
            }
            $output .='</div>';
        }
        	
        return $output;
    }
}
add_shortcode( 'hcode_image_carousel_content', 'hcode_image_carousel_content_shortcode' );