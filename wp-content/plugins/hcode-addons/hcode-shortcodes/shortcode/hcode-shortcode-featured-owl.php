<?php
/**
 * Shortcode For Featured OWL Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Featured OWL Slider */
/*-----------------------------------------------------------------------------------*/

$hcode_slider_parent_type='';
if ( ! function_exists( 'hcode_feature_slider_shortcode' ) ) {
    function hcode_feature_slider_shortcode( $atts, $content = null ) {
            extract( shortcode_atts( array(
                    'show_pagination' => '',
                    'show_pagination_style' => '',
                    'show_navigation' => '',
                    'show_navigation_style' => '',
                    'show_pagination_color_style' => '',
                    'show_cursor_color_style' => '',
                    'hcode_image_carousel_itemsdesktop' => '3',
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
            $pagination = hcode_owl_pagination_slider_classes($show_pagination_style);
            $pagination_style = hcode_owl_pagination_color_classes($show_pagination_color_style);
            $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;
            $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'image-owl-slider';
            $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';

            $output .= '<div class="feature-owl position-relative">';
                $output .= '<div class="container">';
                    $output .= '<div class="row">';
                        $output .= '<div id="'.$hcode_slider_id.'" class="owl-carousel owl-theme bottom-pagination'.$show_cursor_color_style.$pagination.$navigation.$pagination_style.$hcode_slider_class.'">';
                            $output .= do_shortcode($content);
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
                if( $show_navigation == 1 ):
                    if($show_navigation_style == 1):
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre.png" width="96" height="96" ></a>';
                            $output .= '<a class="next right carousel-control"><img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next.png" width="96" height="96" ></a>';
                        $output .= '</div>';
                    else:
                        $output .= '<div class="feature_nav">';
                            $output .= '<a class="prev left carousel-control"><img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-white-bg.png" width="96" height="96" ></a>';
                            $output .= '<a class="next right carousel-control"><img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-white-bg.png" width="96" height="96" ></a>';
                        $output .= '</div>';
                    endif;
                endif;
            $output .= '</div>';
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
add_shortcode( 'hcode_feature_slider', 'hcode_feature_slider_shortcode' );

if ( ! function_exists( 'hcode_feature_slide_content_shortcode' ) ) {
    function hcode_feature_slide_content_shortcode( $atts, $content = null) {
        global $hcode_slider_parent_type, $font_settings_array;
        extract( shortcode_atts( array(
                    'custom_icon' => '',
                    'custom_icon_image' => '',
                    'hcode_et_line_icon_list' => '',
                    'title' => '',
                    'hcode_icon_title_link' => '',
                    'hcode_icon_title_link_target' => '_self',
                    'margin_setting' => '',
                    'custom_desktop_margin' => '',
                    'desktop_margin' => '',
                    'ipad_margin' => '',
                    'mobile_margin' => '',
                    'id' => '',
                    'class' => '',
                    'icon_color_style' => '',
                    'hcode_icon_color' => '',
                    'title_color_style' => '',
                    'hcode_title_color' => '',
                    'hcode_content_color' => '',
                    'hcode_icon_image_srcset' => 'full',
                    'hcode_responsive_title_font' => '',
                ), $atts ) );
        $output = $urltarget = $margin = $margin_style = $style_attr = $style = $icon_classes = $title_classes = $icon_style = $title_style = $responsive_id = $responsive_style = $responsive_class = '';

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $responsive_id = uniqid('hcode-font-setting-');
            $responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $responsive_id );
            $responsive_class = ' '.$responsive_id;
        }
        ( !empty( $responsive_style ) ) ? $font_settings_array[] = $responsive_style : '';

        $title = ( $title ) ? $title : '';
        switch ($icon_color_style){
            case 'white-text':
                $icon_classes .= 'white-text';
                $icon_style .= '';
            break;
            case 'black-text':
                $icon_classes .= 'black-text';
                $icon_style .= '';
            break;
            case 'custom':
                $icon_classes .= '';
                $icon_style .= 'style="color:'.$hcode_icon_color.';"';
            break;
        }

        switch ($title_color_style){
            case 'white-text':
                $title_classes .= 'white-text';
            break;
            case 'black-text':
                $title_classes .= 'black-text';
            break;
            case 'custom':
                $title_classes .= '';
                $title_style .= ' style="color:'.$hcode_title_color.';"';
            break;
        }

        $hcode_icon_title_link = ( $hcode_icon_title_link ) ? $hcode_icon_title_link : '';
        $hcode_icon_title_link_target = ( $hcode_icon_title_link_target ) ? $hcode_icon_title_link_target : '_self';
        $hcode_et_line_icon_list = ($hcode_et_line_icon_list) ? $hcode_et_line_icon_list : '';
        $hcode_icon_color = ( $hcode_icon_color ) ? 'style="color:'.$hcode_icon_color.';"' : '';
        $hcode_content_color = ( $hcode_content_color ) ? ' style="color:'.$hcode_content_color.';"' : '';
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class : '';
       
        // Column Margin settings
        $margin_setting = ( $margin_setting ) ? $margin_setting : '';
        $desktop_margin = ( $desktop_margin ) ? ' '.$desktop_margin : '';
        $ipad_margin = ( $ipad_margin ) ? ' '.$ipad_margin : '';
        $mobile_margin = ( $mobile_margin ) ? ' '.$mobile_margin : '';
        $custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
        if($desktop_margin == ' custom-desktop-margin' && $custom_desktop_margin){
            $margin_style .= " margin: ".$custom_desktop_margin.";";
        }else{
            $margin .= $desktop_margin;
        }
        $margin .= $ipad_margin.$mobile_margin;
        
        if($margin_style){
            $style_attr .= $margin_style;
        }

        if($style_attr){
            $style .= ' style="'.$style_attr.'"';
        }

        /* New Font Awesome Icons */

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_et_line_icon_list));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_et_line_icon_list = substr(strstr($hcode_et_line_icon_list," "), 1);

            if(array_key_exists($hcode_et_line_icon_list, $fa_icon_old)){
                $hcode_et_line_icon_list = $fa_icon_old[$hcode_et_line_icon_list];
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_solid)){
                $hcode_et_line_icon_list = 'fas '.$hcode_et_line_icon_list;
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_reg)){
                $hcode_et_line_icon_list = 'far '.$hcode_et_line_icon_list;
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_brand)){
                $hcode_et_line_icon_list = 'fab '.$hcode_et_line_icon_list;
            }else{
                $hcode_et_line_icon_list = '';
            }
        }

        $output .='<div'.$id.' class="item margin-ten no-margin-top'.$class.'">';
            $output .='<div class="text-center margin-four wow fadeIn '.$margin.'" '.$style.'>';
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    if( $hcode_icon_title_link ) {
                        $output .= '<a href="'.esc_url( $hcode_icon_title_link ).'" target="'.$hcode_icon_title_link_target.'">';
                    }
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image medium-icon no-margin-bottom' ) );
                    if( $hcode_icon_title_link ) {
                        $output .= '</a>';
                    }
                } elseif( $hcode_et_line_icon_list ) {
                    if( $hcode_icon_title_link ) {
                        $output .= '<a href="'.esc_url( $hcode_icon_title_link ).'" target="'.$hcode_icon_title_link_target.'">';
                    }
                    $output .='<i class="'.$hcode_et_line_icon_list.' medium-icon no-margin-bottom '.$icon_classes.'" '.$icon_style.'></i>';
                    if( $hcode_icon_title_link ) {
                        $output .= '</a>';
                    }
                }
                if( $title ) {
                    $output .= '<h5 class="'.$title_classes.$responsive_class.' margin-ten no-margin-bottom xs-margin-top-five approach-main-title"'.$title_style.'>';
                    if( $hcode_icon_title_link ) {
                        $output .= '<a href="'.esc_url( $hcode_icon_title_link ).'" target="'.$hcode_icon_title_link_target.'">';
                    }
                    $output .= $title;
                    if( $hcode_icon_title_link ) {
                        $output .= '</a>';
                    }
                    $output .= '</h5>';
                }
                if( $content ) {
                   $output .='<span class="approach-details feature-owlslide-content light-gray-text2"'.$hcode_content_color.'>'.do_shortcode( $content ).'</span>';
                }
            $output .='</div>';
        $output .='</div>';
        return $output;
    }
}
add_shortcode( 'hcode_feature_slide_content', 'hcode_feature_slide_content_shortcode' );