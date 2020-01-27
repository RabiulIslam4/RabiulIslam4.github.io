<?php
/**
 * Shortcode For Popup
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popup */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_popup_shortcode' ) ) {
    function hcode_popup_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            	'popup_type' => '',
            	'popup_title' => '',
                'inside_popup_title' => '',
                'inside_popup_button_title' => 'Dismiss',
            	'popup_button_config' => '',
                'popup_button_config_youtube' => '',
                'popup_form_id' => '',
                'contact_forms_shortcode' => '',
                'custom_icon' => '',
                'custom_icon_image' => '',
                'hcode_et_line_icon_list' => '',
                'popup_external_url' => '',
                'popup_external_url_youtube' => '',
                'hcode_title_color' => '',
                'hcode_icon_color' => '',
                'offset' => '',
                'width' => '',
                'hcode_icon_image_srcset' => 'full',
                'hcode_responsive_title_font' => '',
                'hcode_responsive_subtitle_font' => '',
                'button_config_settings'=>'',
                'inside_popup_button_config_settings'=>'',
                'hcode_enable_custom_newsletter' => '',
                'hcode_custom_newsletter' => '',
                'hcode_newsletter_button_text' => 'Subscribe',
                'hcode_newsletter_placeholder' => 'ENTER YOUR EMAIL ADDRESS',
            ), $atts ) );
        global $font_settings_array;
        $output = $popup_form_class = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = $button_responsive_id = $button_responsive_style = $button_responsive_class = $button_inside_responsive_id = $button_inside_responsive_style = $button_inside_responsive_class ='';

        if( !empty( $button_config_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_settings, $button_responsive_id.',.'.$button_responsive_id.' span', $button_responsive_id.':hover span,.'.$button_responsive_id.':hover i,.'.$button_responsive_id.':hover'  );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';

        if( !empty( $inside_popup_button_config_settings ) ) {
            $button_inside_responsive_id = uniqid('hcode-button-');
            $button_inside_responsive_style = Hcode_Font_Color_Settings::generate_css( $inside_popup_button_config_settings, $button_inside_responsive_id );
            $button_inside_responsive_class = ' '.$button_inside_responsive_id;
        }
        ( !empty( $button_inside_responsive_style ) ) ? $font_settings_array[] = $button_inside_responsive_style : '';

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

        $hcode_et_line_icon_list = ($hcode_et_line_icon_list) ? $hcode_et_line_icon_list : '';
        $popup_external_url = ($popup_external_url) ? $popup_external_url : '';
        $popup_external_url_youtube = ($popup_external_url_youtube) ? $popup_external_url_youtube : '';
        $inside_popup_title = ( $inside_popup_title ) ? $inside_popup_title : '';
        $inside_popup_button_title = ( $inside_popup_button_title ) ? $inside_popup_button_title : '';
        $hcode_newsletter_button_text = ( $hcode_newsletter_button_text ) ? $hcode_newsletter_button_text : '';
        $hcode_newsletter_placeholder = ( $hcode_newsletter_placeholder ) ? $hcode_newsletter_placeholder : '';
        $hcode_title_color = ( $hcode_title_color ) ? ' style="color:'.$hcode_title_color.' !important;"' : '';
        $hcode_icon_color = ( $hcode_icon_color ) ? ' style="color:'.$hcode_icon_color.' !important;"' : '';
        $first_button_parse_args = vc_parse_multi_attribute($popup_button_config);
        $first_button_link     = ( isset($first_button_parse_args['url']) ) ? $first_button_parse_args['url'] : '#';
        $first_button_title    = ( isset($first_button_parse_args['title']) ) ? $first_button_parse_args['title'] : '';
        $first_button_target   = ( isset($first_button_parse_args['target']) ) ? trim($first_button_parse_args['target']) : '_self';

        $youtube_button = vc_parse_multi_attribute($popup_button_config_youtube);
        $youtube_button_link     = ( isset($youtube_button['url']) ) ? $youtube_button['url'] : '#';
        $youtube_button_title    = ( isset($youtube_button['title']) ) ? $youtube_button['title'] : '';
        $youtube_button_target   = ( isset($youtube_button['target']) ) ? trim($youtube_button['target']) : '_self';

        // Column Offset and sm width
        $width = wpb_translateColumnWidthToSpan( $width );
        $width = vc_column_offset_class_merge( $offset, $width );

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

        switch ($popup_type){
            case 'popup-form-1':
                $contact_form = do_shortcode( '[contact-form-7 id='.$contact_forms_shortcode.']' );
                $output .='<div class="slider-text-middle2 animated fadeInUp position-relative text-center">';
                    if( $content ) {
                        $output .='<span class="slider-subtitle5 black-text">'.do_shortcode( $content ).'</span>';
                    }
                    if( $first_button_title ) {
                        $output .= '<a class="btn button-reveal button-reveal-black button popup-with-form no-margin'.$button_responsive_class.'" href="#popup-form-'.$popup_form_id.'" target="'.$first_button_target.'"><i class="fas fa-plus"></i><span>'.$first_button_title.'</span></a>';
                    }
                    
                    $output .= '<div id="popup-form-'.$popup_form_id.'" class="'.$width.' center-col text-center mfp-hide position-initial">';
                        if( $content ) {
                            $output .= '<span class="slider-subtitle5 black-text">'.do_shortcode($content).'</span>';
                        }
                        $output .= $contact_form;
                    $output .= '</div>';
                $output .= '</div>';
                break;
            
            case 'popup-form-2':
                $contact_form = do_shortcode('[contact-form-7 id='.$contact_forms_shortcode.']');
                $output .='<div class="slider-text-middle2 animated fadeInUp position-relative text-center">';
                    if( $content ) {
                        $output .='<span class="slider-subtitle5 white-text">'.do_shortcode($content).'</span>';
                    }
                    if( $first_button_title ) {
                        $output .= '<a class="btn-small-white-dark btn btn-medium button xs-margin-bottom-five popup-with-form no-margin'.$button_responsive_class.'" href="#popup-form-'.$popup_form_id.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                    }
                    $output .= '<div id="popup-form-'.$popup_form_id.'" class="'.$width.' center-col text-center mfp-hide position-initial">';
                        if( $content ) {
                            $output .= '<span class="slider-subtitle5 black-text">'.do_shortcode($content).'</span>';
                        }
                        $output .= $contact_form;
                    $output .= '</div>';
                $output .= '</div>';
                break;
            
            case 'modal-popup':
                if( $popup_title ) {
                    $output .= '<p class="text-med'.$title_responsive_class.'" '.$hcode_title_color.'>'.$popup_title.'</p>';
                }
                if( $first_button_title ) {
                    $output .= '<a class="highlight-button btn btn-small no-margin-right '.$popup_type.' no-margin-bottom'.$button_responsive_class.'" href="#modal-popup-'.$popup_form_id.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                }
                $output .= '<div id="modal-popup-'.$popup_form_id.'" class="white-popup-block mfp-hide '.$width.' center-col bg-white text-center modal-popup-main">';
                    if( $inside_popup_title ) {
                        $output .= '<span class="slider-subtitle5 black-text no-margin-bottom'.$subtitle_responsive_class.'">'.$inside_popup_title.'</span>';
                    }
                    if( $content ) {
                        $output .= '<p class="margin-four">'.do_shortcode($content).'</p>';
                    }
                    if( $inside_popup_button_title ) {
                        $output .= '<a class="highlight-button btn btn-very-small button popup-modal-dismiss no-margin'.$button_inside_responsive_class.'" href="#">'.$inside_popup_button_title.'</a>';
                    }
                $output .= '</div>';
                break;

            case 'popup-with-zoom-anim':
                if( $popup_title ) {
                    $output .= '<p class="text-med'.$title_responsive_class.'" '.$hcode_title_color.'>'.$popup_title.'</p>';
                }
                if( $first_button_title ) {
                    $output .= '<a class="highlight-button btn btn-small no-margin-right '.$popup_type.' no-margin-bottom'.$button_responsive_class.'" href="#modal-popup-'.$popup_form_id.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                }
                $output .= '<div id="modal-popup-'.$popup_form_id.'" class="zoom-anim-dialog mfp-hide '.$width.' center-col bg-white text-center modal-popup-main">';
                    if( $inside_popup_title ) {
                        $output .= '<span class="slider-subtitle5 black-text no-margin-bottom'.$subtitle_responsive_class.'">'.$inside_popup_title.'</span>';
                    }
                    if( $content ) {
                        $output .= '<p class="margin-four">'.do_shortcode($content).'</p>';
                    }
                    if( $inside_popup_button_title ) {
                        $output .= '<a class="highlight-button btn btn-very-small button popup-modal-dismiss no-margin'.$button_inside_responsive_class.'" href="#">'.$inside_popup_button_title.'</a>';
                    }
                $output .= '</div>';
                break;
            
            case 'popup-with-move-anim':
                if( $popup_title ) {
                    $output .= '<p class="text-med'.$title_responsive_class.'" '.$hcode_title_color.'>'.$popup_title.'</p>';
                }
                if( $first_button_title ) {
                    $output .= '<a class="highlight-button btn btn-small no-margin-right '.$popup_type.' no-margin-bottom'.$button_responsive_class.'" href="#modal-popup-'.$popup_form_id.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                }
                $output .= '<div id="modal-popup-'.$popup_form_id.'" class="zoom-anim-dialog mfp-hide '.$width.' center-col bg-white text-center modal-popup-main">';
                    if( $inside_popup_title ) {
                        $output .= '<span class="slider-subtitle5 black-text no-margin-bottom'.$subtitle_responsive_class.'">'.$inside_popup_title.'</span>';
                    }
                    if( $content ) {
                        $output .= '<p class="margin-four">'.do_shortcode($content).'</p>';
                    }
                    if( $inside_popup_button_title ) {
                        $output .= '<a class="highlight-button btn btn-very-small button popup-modal-dismiss no-margin'.$button_inside_responsive_class.'" href="#">'.$inside_popup_button_title.'</a>';
                    }
                $output .= '</div>';
                break;
            
            case 'simple-ajax-popup-align-top':
                if( $popup_title ) {
                    $output .= '<p class="text-med'.$title_responsive_class.'" '.$hcode_title_color.'>'.$popup_title.'</p>';
                }
                if( $first_button_title ) {
                    $output .= '<a class="highlight-button btn btn-small no-margin-right '.$popup_type.' no-margin-bottom'.$button_responsive_class.'" href="'.$first_button_link.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                }
            break;

            case 'youtube-video-1':
                if( $content ) {
                    $output .='<p class="text-med">'.do_shortcode($content).'</p>';
                }
                if( $youtube_button_title ) {
                    $output .='<a class="highlight-button btn btn-small no-margin-right popup-youtube'.$button_responsive_class.'" href="'.$youtube_button_link.'" target="'.$youtube_button_target.'">'.$youtube_button_title.'</a>';
                }
            break;
            
            case 'youtube-video-2':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $output .='<a class="popup-youtube" href="'.$popup_external_url_youtube.'" target="'.$first_button_target.'">';
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image white-text large-icon margin-ten no-margin-top' ) );
                    $output .= '</a>';
                } elseif( $hcode_et_line_icon_list ) {
                    $output .='<a class="popup-youtube" href="'.$popup_external_url_youtube.'" target="'.$first_button_target.'"><i class="'.$hcode_et_line_icon_list.' white-text large-icon margin-ten no-margin-top" '.$hcode_icon_color.'></i></a>';
                }
                if( $popup_title ) {
                    $output .='<h1 class="white-text video-title'.$title_responsive_class.'" '.$hcode_title_color.'>'.$popup_title.'</h1>';
                }
                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
            break;
            
            case 'vimeo-video-1':
                if( $content ) {
                    $output .='<p class="text-med">'.do_shortcode( $content ).'</p>';
                }
                if( $first_button_title ) {
                    $output .='<a class="highlight-button btn btn-small no-margin-right popup-vimeo no-margin-bottom'.$button_responsive_class.'" href="'.$first_button_link.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                }
            break;

            case 'vimeo-video-2':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $output .='<a class="popup-vimeo" href="'.$popup_external_url.'">';
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image white-text large-icon margin-ten no-margin-top' ) );
                    $output .= '</a>';
                } elseif( $hcode_et_line_icon_list ) {
                    $output .='<a class="popup-vimeo" href="'.$popup_external_url.'"><i class="'.$hcode_et_line_icon_list.' white-text large-icon margin-ten no-margin-top" '.$hcode_icon_color.'></i></a>';
                }
                if( $popup_title ) {
                    $output .='<h1 class="white-text video-title'.$title_responsive_class.'" '.$hcode_title_color.'>'.$popup_title.'</h1>';    
                }
                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
            break;
            
            case 'google-map-1':
                if( $content ) {
                    $output .='<p class="text-med">'.do_shortcode($content).'</p>';
                }
                if( $first_button_title ) {
                    $output .='<a class="highlight-button btn btn-small no-margin-right popup-gmaps no-margin-bottom'.$button_responsive_class.'" href="'.$first_button_link.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                }
            break;

            case 'google-map-2':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $output .= '<a class="popup-gmaps" href="'.$popup_external_url.'">';
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image white-text large-icon margin-ten no-margin-top' ) );
                    $output .= '</a>';
                } elseif( $hcode_et_line_icon_list ) {
                    $output .='<a class="popup-gmaps" href="'.$popup_external_url.'"><i class="'.$hcode_et_line_icon_list.' white-text large-icon margin-ten no-margin-top" '.$hcode_icon_color.'></i></a>';
                }
                if( $popup_title ) {
                    $output .='<h1 class="white-text video-title'.$title_responsive_class.'" '.$hcode_title_color.'>'.$popup_title.'</h1>';
                }
                $output .= do_shortcode( hcode_remove_wpautop($content) );
            break;

            case 'subscribe-form-1':
                $output .='<div class="slider-text-middle2 animated fadeInUp position-relative text-center">';
                    if( $content ) {
                        $output .='<span class="slider-subtitle5 black-text">'.do_shortcode( $content ).'</span>';
                    }
                    if( $first_button_title ) {
                        $output .= '<a class="btn button-reveal button-reveal-black button popup-with-form no-margin'.$button_responsive_class.'" href="#popup-form-'.$popup_form_id.'" target="'.$first_button_target.'"><i class="fas fa-plus"></i><span>'.$first_button_title.'</span></a>';
                    }
                    
                    $output .= '<div id="popup-form-'.$popup_form_id.'" class="'.$width.' center-col text-center mfp-hide position-initial">';
                        if( $content ) {
                            $output .= '<span class="slider-subtitle5 black-text">'.do_shortcode($content).'</span>';
                        }
                        if( $hcode_enable_custom_newsletter == 1 ){
                            $output .= do_shortcode($hcode_custom_newsletter);
                        }else{
                            $output .= '<form method="POST" name="subscription" action="'.esc_url( home_url() ).'/index.php?wp_nlm=subscribe">';
                            $output .= wp_nonce_field( 'xyz_em_subscription' );
                            $output .= '<input class="form-control xyz_em_email" placeholder="'.$hcode_newsletter_placeholder.'" name="xyz_em_email" type="text" />';
                            $output .= '<button name="submit" id="submit_newsletter" class="btn btn-black btn-small no-margin submit_newsletter" ><span>'.$hcode_newsletter_button_text.'</span></button>';
                            $output .= '</form>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
                break;
            
            case 'subscribe-form-2':
                $output .='<div class="slider-text-middle2 animated fadeInUp position-relative text-center">';
                    if( $content ) {
                        $output .='<span class="slider-subtitle5 white-text">'.do_shortcode($content).'</span>';
                    }
                    if( $first_button_title ) {
                        $output .= '<a class="btn-small-white-dark btn btn-medium button xs-margin-bottom-five popup-with-form no-margin'.$button_responsive_class.'" href="#popup-form-'.$popup_form_id.'" target="'.$first_button_target.'">'.$first_button_title.'</a>';
                    }
                    $output .= '<div id="popup-form-'.$popup_form_id.'" class="'.$width.' center-col text-center mfp-hide position-initial">';
                        if( $content ) {
                            $output .= '<span class="slider-subtitle5 black-text">'.do_shortcode($content).'</span>';
                        }
                        if( $hcode_enable_custom_newsletter == 1 ){
                            $output .= do_shortcode($hcode_custom_newsletter);
                        }else{
                            $output .= '<form method="POST" name="subscription" action="'.esc_url( home_url() ).'/index.php?wp_nlm=subscribe">';
                                $output .= wp_nonce_field( 'xyz_em_subscription' );
                                $output .= '<input class="form-control xyz_em_email" placeholder="'.$hcode_newsletter_placeholder.'" name="xyz_em_email" type="text" />';
                                $output .= '<button name="submit" id="submit_newsletter" class="btn btn-black btn-small no-margin submit_newsletter" ><span>'.$hcode_newsletter_button_text.'</span></button>';
                            $output .= '</form>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
                break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_popup', 'hcode_popup_shortcode' );