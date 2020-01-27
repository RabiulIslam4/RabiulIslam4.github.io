<?php
/**
 * Shortcode For Product Brand Block
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product Brand Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_product_brands_shortcode' ) ) {
    function hcode_product_brands_shortcode( $atts, $content = null ) {
        if(!class_exists( 'WooCommerce' )){
            return false;
        }
        extract(shortcode_atts( array(
            'class' =>'',
            'id' => '',
            'product_brand_type' => '',
            'show_brand_title' => '',
            'columns'   => '4',
            'order'     => 'desc',
            'show_pagination' => '',
            'show_pagination_style' => '',
            'show_navigation' => '',
            'show_navigation_style' => '',
            'show_pagination_color_style' => '',            
            'desktop_per_page' => '4',
            'mini_desktop_per_page' => '3',
            'ipad_per_page' => '2',
            'mobile_per_page' => '1',
            'hcode_image_carousel_autoplay' => '',
            'hcode_image_carousel_loop' => '',
            'stoponhover' => '',
            'slidespeed' => '3000',
            'custom_slidespeed' => '',
            'hcode_icon_image_srcset' => 'full',
            'hcode_responsive_font' => '',
            'slidedelay' => '700',
            'custom_slidedelay' => '',
        ), $atts ) );

        global $font_settings_array;
        $responsive_id = $responsive_style = $responsive_class = '';
        //For Text Align 
        if( !empty( $hcode_responsive_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }
        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        $id = ( $id ) ? ' id= "'.$id.'"': '';
        $class = ( $class ) ? ' '.$class : '';
        $product_brand_type = $product_brand_type ? $product_brand_type : '';
        $show_brand_title = ( $show_brand_title ) ? $show_brand_title : '';
        $columns = ( $columns ) ? $columns : '';
        $desktop_per_page = ( $desktop_per_page ) ? $desktop_per_page : '';
        $mini_desktop_per_page = ( $mini_desktop_per_page ) ? $mini_desktop_per_page : '';
        $ipad_per_page = ( $ipad_per_page ) ? $ipad_per_page : '';
        $mobile_per_page = ( $mobile_per_page ) ? $mobile_per_page : '';
        $output = $set_column = '';
        switch ($columns) {
            case '6':
                $set_column = '2';
                break;
            case '4':
                $set_column = '3';
                break;
            case '3':
                $set_column = '4';
                break;
            case '2':
                $set_column = '6';
                break;
            case '1':
                $set_column = '12';
                break;
            default:
                $set_column = '12';
                break;
        }
        $col_class = ' class="text-center col-sm-'.$set_column.'"';
        $product_brand = get_terms( 'product_brand', 'orderby=name' );

        if ( ! empty( $product_brand ) ) {
            if( $product_brand_type == 'slider' ) {
                $pagination = ( $show_pagination == 1 ) ? hcode_owl_pagination_slider_classes($show_pagination_style) : '';
                $pagination_style = ( $show_pagination == 1 ) ? hcode_owl_pagination_color_classes($show_pagination_color_style) : '';
                $navigation = ( $show_navigation == 1 ) ? hcode_owl_navigation_slider_classes($show_navigation_style) : '' ;
                $output .= '<div class="owl-carousel owl-prev-next-simple owl-demo-brand owl-theme'.$class.$pagination.$navigation.$pagination_style.'" '.$id.'>';
                    foreach( (array) $product_brand as $brand ) { 
                        
                        $logo_id = get_term_meta( $brand->term_id, 'logo_id', true ); 
                        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';
                        $output .= '<div class="item">';
                            $output .= '<div class="home-product text-center position-relative overflow-hidden">';
                            if( $logo_id ) {
                                $output .= '<a href="'.get_term_link( $brand ).'">';
                                $output .= wp_get_attachment_image( $logo_id, $hcode_icon_image_srcset, '', array( 'class' => 'parallax-background-img' ) );
                                $output .= '</a>';
                            }
                            if($show_brand_title == 1){
                                $output .= '<span class="text-uppercase display-block'.$responsive_class.'"><a href="'.get_term_link( $brand ).'">'.esc_html( $brand->name ).'</a></span>';
                            }
                            $output .= '</div>';
                        $output .= '</div>';
                    }
                $output .= '</div>';
            } else {
                $brand_class = ( $columns) ? ' brando-logo-'.$columns : ' brando-logo-1';
                $output .= '<div class="product-brands-grid'.$brand_class.$class.'"'.$id.'>';
                foreach( (array) $product_brand as $brand ) {
                    
                    $logo_id = get_term_meta( $brand->term_id, 'logo_id', true );                    
                    $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';

                    $output .= '<div '.$col_class.'>';
                    if( $logo_id ) {
                        $output .= '<a href="'.get_term_link( $brand ).'">';
                            $output .= wp_get_attachment_image( $logo_id, $hcode_icon_image_srcset, '', array( 'class' => 'parallax-background-img' ) );
                        $output .= '</a>';
                    }
                    if($show_brand_title == 1){
                        $output .= '<span class="text-uppercase'.$responsive_class.'"><a href="'.get_term_link( $brand ).'">'.esc_html( $brand->name ).'</a></span>';
                    }
                    $output .= '</div>';
                }
                $output .= '</div>';
            }
        }
        if($product_brand_type == 'slider'):
        $slider_config = '';
        
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
        ( $hcode_image_carousel_loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
        ( $desktop_per_page || $mini_desktop_per_page || $ipad_per_page || $mobile_per_page ) ? $slider_config .= "responsive:{" : '';
        ( $mobile_per_page ) ? $slider_config .= '0:{ items: '.$mobile_per_page.' },' : $slider_config .= '0:{ items: 1 },';
        ( $ipad_per_page ) ? $slider_config .= '767:{ items: '.$ipad_per_page.'},' : $slider_config .= '767:{ items: 2 },';
        ( $mini_desktop_per_page ) ? $slider_config .= '991:{ items: '.$mini_desktop_per_page.' },' : $slider_config .= '991:{ items: 3 },';
        ( $desktop_per_page ) ? $slider_config .= '1200:{ items: '.$desktop_per_page.' },' : $slider_config .= '1200:{ items: 4 },';
        ( $desktop_per_page || $mini_desktop_per_page || $ipad_per_page || $mobile_per_page ) ? $slider_config .= "}," : '';

        $slider_config .= 'navText: ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]';
        ob_start();?>
        <script type="text/javascript">jQuery(document).ready(function(){ jQuery(".owl-demo-brand").owlCarousel({ nav: true, <?php echo $slider_config; ?> }); }); </script>
        <?php
        $script = ob_get_contents();
        $output .= $script;
        endif;
        return $output;
    }
}
add_shortcode( 'hcode_product_brands', 'hcode_product_brands_shortcode' );