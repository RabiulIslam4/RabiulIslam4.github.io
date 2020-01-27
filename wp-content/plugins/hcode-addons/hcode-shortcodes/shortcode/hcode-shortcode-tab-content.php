<?php
/**
 * Shortcode For Tab Content
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tab Content */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_tab_content_shortcode' ) ) {
    function hcode_tab_content_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
            	'id' => '',
            	'class' => '',
            	'hcode_tab_content_premade_style' => '',
            	'hcode_tab_content_left_bgimage' => '',
            	'hcode_tab_content_left_bgimage_type' => '',
            	'hcode_tab_content_left_bgimage_show_overlay' => '',
            	'hcode_tab_content_left_number' => '',
            	'hcode_tab_content_left_title' => '',
            	'hcode_tab_content_left_title_show_separator' => '',
            	'hcode_tab_content_left_content' => '',
            	'hcode_tab_content_right_icon' => '',
                'custom_tab_icon' =>'',
                'custom_tab_icon_image' =>'',
            	'hcode_tab_content_right_title' => '',
            	'hcode_tab_content_right_button_config' => '',
            	'hcode_tab_content_left_title_show_separator_line' => '',
            	'hcode_tab_content_bottom_title' => '',
                'hcode_tab_content_counter_number1' => '',
                'hcode_tab_content_counter_text1' => '',
                'hcode_tab_content_counter_number2' => '',
                'hcode_tab_content_counter_text2' => '',
                'hcode_tab_content_counter_number3' => '',
                'hcode_tab_content_counter_text3' => '',
                'hcode_number_color' => '',
                'hcode_left_title_color' => '',
                'hcode_title_color' => '',
                'hcode_counter_number_color' => '',
                'hcode_counter_title_color' => '',
                'hcode_icon_color' => '',
                'hcode_content_color' => '',
                'hcode_button_color' => '',
                'separator_height' => '',
                'hcode_sep_color' => '',
                'hcode_overlay_color' => '',
                'hcode_overlay_opacity' => '',
                'hcode_number_font_settings' => '',
                'hcode_title_font_settings' => '',
                'hcode_left_content_font_settings' => '',
                'hcode_right_title_font_settings' => '',
                'hcode_bottom_title_font_settings' => '',
                'hcode_counter_font_settings' => '',
                'hcode_counter_text_font_settings' => '',
                'hcode_left_bg_image_srcset' => 'full',
                'hcode_icon_image_srcset' => 'full',
                'button_config_settings' => '',
                'button_config_icon_settings' => '',
            ), $atts ) );
    	$output = $separator = $button_color = $button_class = $hcode_overlay = $hcode_number_font_settings_id = $hcode_number_font_settings_style = $hcode_number_font_settings_class = $hcode_title_font_settings_id = $hcode_title_font_settings_style = $hcode_title_font_settings_class = $hcode_right_title_font_settings_id = $hcode_right_title_font_settings_style = $hcode_right_title_font_settings_class = $hcode_bottom_title_font_settings_id = $hcode_bottom_title_font_settings_style = $hcode_bottom_title_font_settings_class = $hcode_left_content_font_settings_id = $hcode_left_content_font_settings_style = $hcode_left_content_font_settings_class = $hcode_counter_font_settings_id = $hcode_counter_font_settings_style = $hcode_counter_font_settings_class = $hcode_counter_text_font_settings_id = $hcode_counter_text_font_settings_style = $hcode_counter_text_font_settings_class = $button_responsive_id = $button_responsive_style = $button_responsive_class ='';

        global $font_settings_array;

        if( !empty( $button_config_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_settings, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        if( !empty( $button_config_icon_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_icon_settings, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';


        if( !empty( $hcode_number_font_settings ) ) {
            $hcode_number_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_number_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_number_font_settings, $hcode_number_font_settings_id );
            $hcode_number_font_settings_class = ' '.$hcode_number_font_settings_id;
        }
        if( !empty( $hcode_title_font_settings ) ) {
            $hcode_title_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_title_font_settings, $hcode_title_font_settings_id );
            $hcode_title_font_settings_class = ' '.$hcode_title_font_settings_id;
        }
        if( !empty( $hcode_right_title_font_settings ) ) {
            $hcode_right_title_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_right_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_right_title_font_settings, $hcode_right_title_font_settings_id );
            $hcode_right_title_font_settings_class = ' '.$hcode_right_title_font_settings_id;
        }
        if( !empty( $hcode_bottom_title_font_settings ) ) {
            $hcode_bottom_title_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_bottom_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_bottom_title_font_settings, $hcode_bottom_title_font_settings_id );
            $hcode_bottom_title_font_settings_class = ' '.$hcode_bottom_title_font_settings_id;
        }
        if( !empty( $hcode_left_content_font_settings ) ) {
            $hcode_left_content_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_left_content_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_left_content_font_settings, $hcode_left_content_font_settings_id );
            $hcode_left_content_font_settings_class = ' '.$hcode_left_content_font_settings_id;
        }
        if( !empty( $hcode_counter_font_settings ) ) {
            $hcode_counter_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_counter_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_counter_font_settings, $hcode_counter_font_settings_id );
            $hcode_counter_font_settings_class = ' '.$hcode_counter_font_settings_id;
        }
        if( !empty( $hcode_counter_text_font_settings ) ) {
            $hcode_counter_text_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_counter_text_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_counter_text_font_settings, $hcode_counter_text_font_settings_id );
            $hcode_counter_text_font_settings_class = ' '.$hcode_counter_text_font_settings_id;
        }

        ( !empty( $hcode_number_font_settings_style ) ) ? $font_settings_array[] = $hcode_number_font_settings_style : '';
        ( !empty( $hcode_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_title_font_settings_style : '';
        ( !empty( $hcode_right_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_right_title_font_settings_style : '';
        ( !empty( $hcode_bottom_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_bottom_title_font_settings_style : '';
        ( !empty( $hcode_left_content_font_settings_style ) ) ? $font_settings_array[] = $hcode_left_content_font_settings_style : '';
        ( !empty( $hcode_counter_font_settings_style ) ) ? $font_settings_array[] = $hcode_counter_font_settings_style : '';
        ( !empty( $hcode_counter_text_font_settings_style ) ) ? $font_settings_array[] = $hcode_counter_text_font_settings_style : '';

    	$id = ( $id ) ? ' id="'.$id.'"' : '';
    	$class = ( $class ) ? ' '.$class : '';
    	$hcode_tab_content_premade_style = ( $hcode_tab_content_premade_style ) ? $hcode_tab_content_premade_style : '';
    	$hcode_tab_content_left_bgimage = ( $hcode_tab_content_left_bgimage ) ? $hcode_tab_content_left_bgimage : '';

        $hcode_left_bg_image_srcset  = !empty($hcode_left_bg_image_srcset) ? $hcode_left_bg_image_srcset : 'full';
        $thumb = wp_get_attachment_image_src($hcode_tab_content_left_bgimage, $hcode_left_bg_image_srcset);

        $srcset = $srcset_data = $sizes = $sizes_data = $srcset_data_bg = $srcset_classes_bg = '';
        $srcset = wp_get_attachment_image_srcset( $hcode_tab_content_left_bgimage, $hcode_left_bg_image_srcset );
        
        if( $srcset ){
            $srcset_data_bg = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
            $srcset_classes_bg = ' bg-image-srcset';
        }

        if( $srcset ){
            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
        }

        $sizes = wp_get_attachment_image_sizes( $hcode_tab_content_left_bgimage, $hcode_left_bg_image_srcset );
        if( $sizes ){
            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
        }

        $hcode_tab_content_left_bgimage_type = ( $hcode_tab_content_left_bgimage_type ) ? $hcode_tab_content_left_bgimage_type : '';
    	$hcode_tab_content_left_bgimage_show_overlay = ( $hcode_tab_content_left_bgimage_show_overlay ) ? $hcode_tab_content_left_bgimage_show_overlay : '';
    	$hcode_tab_content_left_number = ( $hcode_tab_content_left_number ) ? $hcode_tab_content_left_number : '';
    	$hcode_tab_content_left_title = ( $hcode_tab_content_left_title ) ? $hcode_tab_content_left_title : '';
    	$hcode_tab_content_left_title_show_separator = ( $hcode_tab_content_left_title_show_separator ) ? $hcode_tab_content_left_title_show_separator : '';
    	$hcode_tab_content_left_content = ( $hcode_tab_content_left_content ) ? $hcode_tab_content_left_content : '';
    	$hcode_tab_content_right_icon = ( $hcode_tab_content_right_icon ) ? $hcode_tab_content_right_icon : '';
    	$hcode_tab_content_right_title = ( $hcode_tab_content_right_title ) ? $hcode_tab_content_right_title : '';
    	$hcode_tab_content_right_button_config = ( $hcode_tab_content_right_button_config ) ? $hcode_tab_content_right_button_config : '';
    	$hcode_tab_content_left_title_show_separator_line = ( $hcode_tab_content_left_title_show_separator_line ) ? $hcode_tab_content_left_title_show_separator_line : '';
    	$hcode_tab_content_bottom_title = ( $hcode_tab_content_bottom_title ) ? $hcode_tab_content_bottom_title : '';
    	$bg_image = ( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].');"' : '';
        $hcode_number_color = ($hcode_number_color) ? ' style="color:'.$hcode_number_color.' !important"' : '';
        $hcode_left_title_color = ($hcode_left_title_color) ? ' style="color:'.$hcode_left_title_color.' !important"' : '';
        $hcode_counter_number_color = ($hcode_counter_number_color) ? ' style="color:'.$hcode_counter_number_color.' !important"' : '';
        $hcode_counter_title_color = ($hcode_counter_title_color) ? ' style="color:'.$hcode_counter_title_color.' !important"' : '';
        $hcode_title_color = ($hcode_title_color) ? ' style="color:'.$hcode_title_color.' !important"' : '';
        $hcode_icon_color = ($hcode_icon_color) ? ' style="color:'.$hcode_icon_color.' !important"' : '';
        $hcode_content_color = ($hcode_content_color) ? ' style="color:'.$hcode_content_color.' !important"' : '';
        if($hcode_button_color):
            $button_color .= ' style="background:'.$hcode_button_color.' !important"';
            $button_class .= ' button-hover-color';
        endif;

        $hcode_sep_color = ($hcode_sep_color) ? 'background:'.$hcode_sep_color.';' : '';
        $separator_height = ($separator_height) ? 'height:'.$separator_height.';' : '';

        if($hcode_sep_color || $separator_height):
            $separator = ' style="'.$hcode_sep_color.$separator_height.'"';
        endif;

    	if (function_exists('vc_parse_multi_attribute')) {
            // For Button
            $button_parse_args = vc_parse_multi_attribute($hcode_tab_content_right_button_config);
            $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
            $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
            $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
        }

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';

        /* Overlay */
        $hcode_overlay_opacity = ( $hcode_overlay_opacity ) ? 'opacity:'.$hcode_overlay_opacity.';' : '';
        $hcode_overlay_color = ( $hcode_overlay_color ) ? 'background-color:'.$hcode_overlay_color.';' : '';
        
        if( $hcode_overlay_opacity || $hcode_overlay_color ){
            $hcode_overlay = ' style="'.$hcode_overlay_opacity.$hcode_overlay_color.'"';
        }

        /* New Font Awesome Icons */

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_tab_content_right_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_tab_content_right_icon = substr(strstr($hcode_tab_content_right_icon," "), 1);

            if(array_key_exists($hcode_tab_content_right_icon, $fa_icon_old)){
                $hcode_tab_content_right_icon = $fa_icon_old[$hcode_tab_content_right_icon];
            }else if(in_array($hcode_tab_content_right_icon, $fa_icons_solid)){
                $hcode_tab_content_right_icon = 'fas '.$hcode_tab_content_right_icon;
            }else if(in_array($hcode_tab_content_right_icon, $fa_icons_reg)){
                $hcode_tab_content_right_icon = 'far '.$hcode_tab_content_right_icon;
            }else if(in_array($hcode_tab_content_right_icon, $fa_icons_brand)){
                $hcode_tab_content_right_icon = 'fab '.$hcode_tab_content_right_icon;
            }else{
                $hcode_tab_content_right_icon = '';
            }
        }


    	switch ($hcode_tab_content_premade_style) {
    		case 'tab-content1':
    			if( $bg_image || $hcode_tab_content_left_title || $hcode_tab_content_left_number ):
    				$output .= '<div class="col-lg-6 col-md-6 no-padding corporate-standards-img position-relative '.$hcode_tab_content_left_bgimage_type.$srcset_classes_bg.'" '.$bg_image.$srcset_data_bg.'>';
    					if( $hcode_tab_content_left_bgimage_show_overlay ):
    	                	$output .= '<div class="opacity-medium bg-dark-gray"'.$hcode_overlay.'></div>';
    	                endif;
    	                if( $hcode_tab_content_left_title || $hcode_tab_content_left_number ):
    		                $output .= '<p class="title-small text-uppercase corporate-standards-title white-text letter-spacing-7'.$hcode_title_font_settings_class.'">';
    		                	if( $hcode_tab_content_left_number ) {
    		                		$output .= '<span class="title-extra-large no-letter-spacing yellow-text'.$hcode_number_font_settings_class.'"'.$hcode_number_color.'>'.$hcode_tab_content_left_number.'</span><br>';
    		                	}
    		                $output .= '<span'.$hcode_left_title_color.'>'.$hcode_tab_content_left_title.'</span>';
                            $output .= '</p>';
    	                endif;
    				$output .= '</div>';
    			endif;
                $output .= '<div class="col-lg-6 col-md-6 corporate-standards-text sm-margin-lr-four sm-margin-top-four xs-padding-tb-ten">';
                    $output .= '<div class="img-border-small-fix border-gray"></div>';
                    if( $custom_tab_icon == 1 && !empty( $custom_tab_icon_image ) ) {
                        $output .= wp_get_attachment_image( $custom_tab_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'tab-icon-image' ) );
                    } elseif( $hcode_tab_content_right_icon ) {
                    	$output .= '<i class="'.$hcode_tab_content_right_icon.' large-icon yellow-text"'.$hcode_icon_color.'></i>';
                    }
                    if( $hcode_tab_content_right_title ):
                    	$output .= '<h1 class="margin-ten no-margin-bottom'.$hcode_right_title_font_settings_class.'"'.$hcode_title_color.'>'.$hcode_tab_content_right_title.'</h1>';
                    endif;
                    if( $content ):
                    	$output .= '<p class="text-med margin-ten width-80 center-col xs-width-100"'.$hcode_content_color.'>'.do_shortcode( $content ).'</p>';
                    endif;
                    if( $button_title ):
                    	$output .= '<a class="text-small highlight-link text-uppercase bg-black white-text'.$button_class.$button_responsive_class.'"'.$button_color.' href="'.$button_link.'" target="'.$button_target.'">'.$button_title.' <i class="fas fa-long-arrow-alt-right extra-small-icon white-text"></i></a>';
                    endif;
                $output .= '</div>';
    		break;

    		case 'tab-content2':
    			$output .= '<div class="row">';
    				if( $hcode_tab_content_left_title || $hcode_tab_content_left_title_show_separator || $hcode_tab_content_left_content ):
    	                $output .= '<div class="col-md-6 col-sm-12 text-left gray-text">';
    	                	if( $hcode_tab_content_left_title ):
    	                    	$output .= '<h5 class="'.$hcode_title_font_settings_class.'"'.$hcode_title_color.'>'.$hcode_tab_content_left_title.'</h5>';
    	                    endif;
    	                    if( $hcode_tab_content_left_title_show_separator ):
    	                    	$output .= '<div class="separator-line bg-yellow no-margin-lr sm-margin-five"'.$separator.'></div>';
    	                    endif;
    	                    if( $hcode_tab_content_left_content ):
    	                    	$output .= '<p class="text-large margin-five margin-right-ten'.$hcode_left_content_font_settings_class.'">'.$hcode_tab_content_left_content.'</p>';
    	                    endif;
    	                $output .= '</div>';
    	            endif;
    	            if( $hcode_tab_content_right_title || $content ):
    	                $output .= '<div class="col-md-6 col-sm-12 text-left text-med gray-text">';
    	                	if( $hcode_tab_content_right_title ):
    	                    	$output .= '<p class="text-uppercase'.$hcode_right_title_font_settings_class.'">'.$hcode_tab_content_right_title.'</p>';
    	                    endif;
    	                    if( $content ):
    	                    	$output .= do_shortcode( hcode_remove_wpautop( $content ) );
    	                    endif;
    	                $output .= '</div>';
    	            endif;
                $output .= '</div>';
                if( $hcode_tab_content_left_title_show_separator_line == 1 ):
    	            $output .= '<div class="row"> ';
    	                $output .= '<div class="wide-separator-line"></div>';
    	            $output .= '</div>';
                endif;
                if( $hcode_tab_content_bottom_title ):
    	            $output .= '<div class="row">';
    	                $output .= '<div class="col-md-12 col-sm-12 text-center service-year black-text'.$hcode_bottom_title_font_settings_class.'">'.$hcode_tab_content_bottom_title.'</div>';
    	            $output .= '</div>';
                endif;
                if( $hcode_tab_content_left_title_show_separator_line == 1 ):
                    $output .= '<div class="row"> ';
                        $output .= '<div class="wide-separator-line"></div>';
                    $output .= '</div>';
                endif;
                $output .= '<div class="row">';
                    if( $hcode_tab_content_counter_number1 || $hcode_tab_content_counter_text1 ) {
                        $output .= '<div class="col-md-4 col-sm-4 bottom-margin text-center counter-section xs-margin-ten-bottom">';
                            if( $hcode_tab_content_counter_number1 ) {
                                $output .= '<span class="counter-number black-text'.$hcode_counter_font_settings_class.'" data-to="'.$hcode_tab_content_counter_number1.'"'.$hcode_counter_number_color.'>'.$hcode_tab_content_counter_number1.'</span>';
                            }
                            if( $hcode_tab_content_counter_text1 ) {
                                $output .= '<span class="counter-title'.$hcode_counter_text_font_settings_class.'"'.$hcode_counter_title_color.'>'.$hcode_tab_content_counter_text1.'</span>';
                            }
                        $output .= '</div>';
                    }
                    if( $hcode_tab_content_counter_number2 || $hcode_tab_content_counter_text2 ) {
                        $output .= '<div class="col-md-4 col-sm-4 bottom-margin text-center counter-section xs-margin-ten-bottom">';
                            if( $hcode_tab_content_counter_number2 ) {
                                $output .= '<span class="counter-number black-text'.$hcode_counter_font_settings_class.'" data-to="'.$hcode_tab_content_counter_number2.'"'.$hcode_counter_number_color.'>'.$hcode_tab_content_counter_number2.'</span>';
                            }
                            if( $hcode_tab_content_counter_text2 ) {
                                $output .= '<span class="counter-title'.$hcode_counter_text_font_settings_class.'"'.$hcode_counter_title_color.'>'.$hcode_tab_content_counter_text2.'</span>';
                            }
                        $output .= '</div>';
                    }
                    if( $hcode_tab_content_counter_number3 || $hcode_tab_content_counter_text3 ) {
                        $output .= '<div class="col-md-4 col-sm-4 bottom-margin text-center counter-section">';
                            if( $hcode_tab_content_counter_number3 ) {
                                $output .= '<span class="counter-number black-text'.$hcode_counter_font_settings_class.'"  data-to="'.$hcode_tab_content_counter_number3.'"'.$hcode_counter_number_color.'>'.$hcode_tab_content_counter_number3.'</span>';
                            }
                            if( $hcode_tab_content_counter_text3 ) {
                                $output .= '<span class="counter-title'.$hcode_counter_text_font_settings_class.'"'.$hcode_counter_title_color.'>'.$hcode_tab_content_counter_text3.'</span>';
                            }
                        $output .= '</div>';
                    }
                $output .= '</div>'; 
    		break;

    		case 'tab-content3':
                $output .= '<div class="row">';
                    if( $hcode_tab_content_left_title ):
                        $output .= '<div class="col-md-6 col-sm-12 text-left gray-text">';
                            $output .= '<p class="text-large margin-right-ten'.$hcode_title_font_settings_class.'">'.$hcode_tab_content_left_title.'</p>';
                        $output .= '</div>';
                    endif;
                    if( $hcode_tab_content_right_title || $content ):
                        $output .= '<div class="col-md-6 col-sm-12 text-left text-med gray-text">';
                            if( $hcode_tab_content_right_title ):
                                $output .= '<p class="text-uppercase'.$hcode_right_title_font_settings_class.'">'.$hcode_tab_content_right_title.'</p>';
                            endif;
                            if( $content ):
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            endif;
                        $output .= '</div>';
                    endif;
                $output .= '</div>';
                if( $hcode_tab_content_left_title_show_separator_line == 1 ):
                    $output .= '<div class="row"> ';
                        $output .= '<div class="col-md-12 col-sm-12">';
                            $output .= '<div class="wide-separator-line no-margin-lr"></div>';
                        $output .= '</div>';
                    $output .= '</div>';
                endif;
                if( $hcode_tab_content_bottom_title ):
                    $output .= '<div class="row">';
                        $output .= '<div class="col-md-12 col-sm-12 text-center service-year black-text'.$hcode_bottom_title_font_settings_class.'">';
                            $output .= '<strong>'.$hcode_tab_content_bottom_title.'</strong>';
                        $output .= '</div>';
                    $output .= '</div>';
                endif;
    		break;

            case 'tab-content4':
                if( $hcode_tab_content_left_title || $content ):
                    $output .= '<div class="row margin-four-bottom">';
                        $output .= '<div class="col-md-12 col-sm-12 text-center gray-text">';
                            if( $hcode_tab_content_left_title ):
                                $output .= '<p class="text-large margin-five'.$hcode_title_font_settings_class.'">'.$hcode_tab_content_left_title.'</p>';
                            endif;
                            if( $content ):
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            endif;
                        $output .= '</div>';
                    $output .= '</div>';
                endif;
                if( $hcode_tab_content_counter_number1 || $hcode_tab_content_counter_text1 || $hcode_tab_content_counter_number2 || $hcode_tab_content_counter_text2 || $hcode_tab_content_counter_number3 || $hcode_tab_content_counter_text3 ):
                    $output .= '<div class="row border-top padding-four no-padding-bottom">';
                        $output .= '<div class="col-md-4 col-sm-4 col-xs-12 bottom-margin text-center counter-section xs-margin-ten-bottom">';
                            if( $hcode_tab_content_counter_number1 ):
                                $output .= '<span class="counter-number black-text'.$hcode_counter_font_settings_class.'" data-to="'.$hcode_tab_content_counter_number1.'"'.$hcode_counter_number_color.'>'.$hcode_tab_content_counter_number1.'</span>';
                            endif;
                            if( $hcode_tab_content_counter_text1 ):
                                $output .= '<span class="counter-title'.$hcode_counter_text_font_settings_class.'"'.$hcode_counter_title_color.'>'.$hcode_tab_content_counter_text1.'</span>';
                            endif;
                        $output .= '</div>';
                        $output .= '<div class="col-md-4 col-sm-4 col-xs-12 bottom-margin text-center counter-section xs-margin-ten-bottom">';
                            if( $hcode_tab_content_counter_number2 ):
                                $output .= '<span class="counter-number black-text'.$hcode_counter_font_settings_class.'" data-to="'.$hcode_tab_content_counter_number2.'"'.$hcode_counter_number_color.'>'.$hcode_tab_content_counter_number2.'</span>';
                            endif;
                            if( $hcode_tab_content_counter_text2 ):
                                $output .= '<span class="counter-title'.$hcode_counter_text_font_settings_class.'"'.$hcode_counter_title_color.'>'.$hcode_tab_content_counter_text2.'</span>';
                            endif;
                        $output .= '</div>';
                        $output .= '<div class="col-md-4 col-sm-4 col-xs-12 bottom-margin text-center counter-section xs-no-margin-bottom">';
                            if( $hcode_tab_content_counter_number3 ):
                                $output .= '<span class="counter-number black-text'.$hcode_counter_font_settings_class.'" data-to="'.$hcode_tab_content_counter_number3.'"'.$hcode_counter_number_color.'>'.$hcode_tab_content_counter_number3.'</span>';
                            endif;
                            if( $hcode_tab_content_counter_text2 ):
                                $output .= '<span class="counter-title'.$hcode_counter_text_font_settings_class.'"'.$hcode_counter_title_color.'>'.$hcode_tab_content_counter_text3.'</span>';
                            endif;
                        $output .= '</div>';
                    $output .= '</div>';
                endif;
            break;

            case 'tab-content5':
                $output .= '<div class="text-left spa-treatments position-relative '.$hcode_tab_content_left_bgimage_type.$srcset_classes_bg.'" '.$bg_image.$srcset_data_bg.'>';
                    $output .= '<div class="col-md-6 col-sm-6 bg-white pull-right no-padding"> ';
                        $output .= '<div class="pull-right right-content">';
                            if( $hcode_tab_content_left_title ) {
                                $output .= '<span class="text-extra-large font-weight-600 letter-spacing-2 text-uppercase black-text margin-three no-margin-top display-block'.$hcode_title_font_settings_class.'"'.$hcode_title_color.'>'.$hcode_tab_content_left_title.'</span>';
                            }
                            if( $content ) {
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            }
                            if( $button_title ) {
                                $output .= '<a class="btn inner-link btn-black btn-small no-margin'.$button_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                            }
                        $output .= '</div>   ';
                    $output .= '</div>';
                $output .= '</div>';
            break;
    	}
        return $output;
    }
}
add_shortcode('hcode_tab_content','hcode_tab_content_shortcode');