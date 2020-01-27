<?php
/**
 * Shortcode For Education Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Education Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_education_slider_shortcode' ) ) {
    function hcode_education_slider_shortcode( $atts, $content = null ) {
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
            $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;
            $pagination = hcode_owl_pagination_slider_classes($show_pagination_style);
            $pagination_style = hcode_owl_pagination_color_classes($show_pagination_color_style);
            $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : 'education-owl-slider';
            $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';

                $output .= '<div class="feature-owl position-relative">';
                    $output .= '<div class="container">';
                        $output .= '<div class="row">';
                            $output .= '<div id="'.$hcode_slider_id.'" class="owl-pagination-bottom owl-carousel owl-theme'.$show_cursor_color_style.$pagination.$navigation.$pagination_style.$navigation.$hcode_slider_class.'">';
                                $output .= do_shortcode($content);
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                    if( $show_navigation == 1 ) {
                        if( $show_navigation_style == 1 ) {
                            $output .= '<div class="feature_nav">';
                                $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre.png" width="96" height="96" ></a>';
                                $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next.png" width="96" height="96" ></a>';
                            $output .= '</div>';
                        } else {
                            $output .= '<div class="feature_nav">';
                                $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-white-bg.png" width="96" height="96" ></a>';
                                $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-white-bg.png" width="96" height="96" ></a>';
                            $output .= '</div>';
                        }
                    }
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
        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
        ( $hcode_image_carousel_loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
        ( $hcode_image_carousel_autoplay == 1 ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$slidespeed.',autoplaySpeed: '.$slidedelay.',' : $slider_config .= 'autoPlay: false,';
        ( $stoponhover == 1) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
        ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "responsive:{ " : '';
        ( $hcode_image_carousel_itemsmobile ) ? $slider_config .= '0:{ items: '.$hcode_image_carousel_itemsmobile.' },' : $slider_config .= '0:{ items: 1 },';
        ( $hcode_image_carousel_itemstablet ) ? $slider_config .= '700:{ items: '.$hcode_image_carousel_itemstablet.'},' : $slider_config .= '700:{ items: 2 },';
        ( $hcode_image_carousel_itemsminidesktop ) ? $slider_config .= '991:{ items: '.$hcode_image_carousel_itemsminidesktop.' },' : $slider_config .= '991:{ items: 3 },';
        ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= '1200:{ items: '.$hcode_image_carousel_itemsdesktop.' },' : $slider_config .= '1200:{ items: 4 },';
        ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop ||$hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "}" : '';

    	ob_start();?>
    	<script type="text/javascript"> jQuery(document).ready(function () { jQuery("<?php echo '#'.$hcode_slider_id;?>").owlCarousel({ <?php echo $slider_config;?> }); }); </script>
    	<?php 
    	$script = ob_get_contents();
    	ob_end_clean();
    	$output .= $script;
    	/* Add custom script End*/
        return $output;
    }
}
add_shortcode( 'hcode_education_slider', 'hcode_education_slider_shortcode' );

if ( ! function_exists( 'hcode_education_slide_content_shortcode' ) ) { 
    function hcode_education_slide_content_shortcode( $atts, $content = null) {
    	global $hcode_slider_parent_type, $font_settings_array;
        extract( shortcode_atts( array(
                    'id' => '',
                    'class' => '',
                    'custom_icon' => '',
                    'custom_icon_image' => '',
                    'hcode_et_line_icon_list' => '',
                    'year' => '',
                    'title' => '',
                    'hcode_show_separator' => '',
                    'education_name' => '',
                    'grade_button' => '',
                    'hcode_icon_color' => '',
                    'year_color' => '',
                    'hcode_title_color' => '',
                    'education_name_color' => '',
                    'hcode_content_color' => '',
                    'hcode_sep_color' => '',
                    'hcode_icon_image_srcset' => 'full',
                    'hcode_responsive_title_font' => '',
                    'hcode_responsive_year_font' => '',
                    'hcode_responsive_name_font' => '',
                    'button_config_settings' => '',
                ), $atts ) );
        $output = $title_responsive_id = $title_responsive_style = $title_responsive_class = $year_responsive_id = $year_responsive_style = $year_responsive_class = $name_responsive_id = $name_responsive_style = $name_responsive_class = $button_responsive_id = $button_responsive_style = $button_responsive_class = '';


        if( !empty( $button_config_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_settings, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';
        //For Text Align 
        if( !empty( $hcode_responsive_year_font ) ) {
            $year_responsive_id = uniqid('hcode-font-setting-');
            $year_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_year_font, $year_responsive_id );
            $year_responsive_class = ' '.$year_responsive_id;
        }
        ( !empty( $year_responsive_style ) ) ? $font_settings_array[] = $year_responsive_style : '';
        //For Text Align 
        if( !empty( $hcode_responsive_name_font ) ) {
            $name_responsive_id = uniqid('hcode-font-setting-');
            $name_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_name_font, $name_responsive_id );
            $name_responsive_class = ' '.$name_responsive_id;
        }
        ( !empty( $name_responsive_style ) ) ? $font_settings_array[] = $name_responsive_style : '';

        $title = ( $title ) ? $title : '';
        $year = ( $year ) ? $year : '';
        $hcode_et_line_icon_list = ($hcode_et_line_icon_list) ? $hcode_et_line_icon_list : '';
        $hcode_icon_color = ( $hcode_icon_color ) ? 'style="color:'.$hcode_icon_color.';"' : '';
        $year_color = ( $year_color ) ? 'style="color:'.$year_color.';"' : '';
        $hcode_title_color = ( $hcode_title_color ) ? 'style="color:'.$hcode_title_color.';"' : '';
        $education_name_color = ( $education_name_color ) ? 'style="color:'.$education_name_color.';"' : '';
        $hcode_content_color = ( $hcode_content_color ) ? 'style="color:'.$hcode_content_color.';"' : '';
        $hcode_sep_color = ( $hcode_sep_color ) ? ' style="background:'.$hcode_sep_color.';"' : '';
        $button_title = ( $grade_button ) ? $grade_button : '';

        $id        = ( $id ) ? $id : '';
    	$class     = ( $class ) ? ' '.$class : '';
        $education_name = ( $education_name ) ? $education_name : '';

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';

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
        
        $output .='<div class="education-box-main text-center'.$class.'"'.$id.'>';
            $output .='<div class="education-box">';
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                } elseif( $hcode_et_line_icon_list || $hcode_icon_color ) {
                    $output .='<i class="'.$hcode_et_line_icon_list.'" '.$hcode_icon_color.'></i>';
                }
                if( $year ) {
                    $output .='<span class="year text-large display-block margin-five'.$year_responsive_class.'" '.$year_color.'>'.$year.'</span>';
                }
                if( $title ) {
                    $output .='<span class="university text-uppercase display-block letter-spacing-2 font-weight-600'.$title_responsive_class.'" '.$hcode_title_color.'>'.$title.'</span>';
                }
                if( $hcode_show_separator == 1 ) {
                    $output .='<div class="separator-line bg-black margin-ten"'.$hcode_sep_color.'></div>';
                }
            $output .='</div>';
            $output .='<div class="namerol">';
                if( $education_name ) {
                    $output .='<span class="text-uppercase display-block letter-spacing-2 margin-five no-margin-top'.$name_responsive_class.'" '.$education_name_color.'>'.$education_name.'</span>';
                }
                if( $content ) {
                    $output .='<p '.$hcode_content_color.'>'.do_shortcode( $content ).'</p>';
                }
                if( $button_title ) {
                    $output .='<span class="result text-uppercase white-text font-weight-600 letter-spacing-1 bg-black text-white'.$button_responsive_class.'">'.$button_title.'</span>';
                }
            $output .='</div>';
        $output .='</div>';
        return $output;
    }
}
add_shortcode( 'hcode_education_slide_content', 'hcode_education_slide_content_shortcode' );