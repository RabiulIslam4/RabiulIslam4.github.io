<?php
/**
 * Shortcode For Coming soon
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Coming soon */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_coming_soon_shortcode' ) ) {
    function hcode_coming_soon_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_coming_soon_type' => '',
            'hcode_coming_soon_logo' => '',
            'hcode_coming_soon_mp4' => '',
            'hcode_coming_soon_ogg' => '',
            'hcode_coming_soon_webm' => '',
            'hcode_coming_soon_title' => '',
            'hcode_coming_soon_title_color' => '',
            'hcode_coming_soon_date' => '',
            'hcode_date_style' => 'hcode-date-style1',
            'hcode_coming_soon_notify_me_title' => '',
            'hcode_coming_soon_notify_me_title_color' => '',
            'hcode_coming_soon_notify_me_bgcolor' => '',
            'hcode_coming_soon_notify_me_counter_color' => '',
            'hcode_coming_soon_notify_me_subtitle' => '',
            'hcode_coming_soon_notify_me_show_form' => '',
            'hcode_coming_soon_notify_me_button_text' => '',
            'hcode_coming_soon_notify_placeholder' => '',
            'hcode_coming_soon_custom_newsletter' => '',
            'hcode_custom_newsletter' => '',
            'hcode_time_counter_days_taxt' => 'Day',
            'hcode_time_counter_hours_taxt' => 'Hours',
            'hcode_time_counter_minutes_taxt' => 'Minutes',
            'hcode_time_counter_seconds_taxt' => 'Seconds',
            'hcode_social_style' => 'hcode-social-style1',
            'hcode_coming_soon_notify_me_fb' => '',
            'hcode_coming_soon_notify_me_fb_url' => '',
            'hcode_coming_soon_notify_me_tw' => '',
            'hcode_coming_soon_notify_me_tw_url' => '',
            'hcode_coming_soon_notify_me_gp' => '',
            'hcode_coming_soon_notify_me_gp_url' => '',
            'hcode_coming_soon_notify_me_dr' => '',
            'hcode_coming_soon_notify_me_dr_url' => '',
            'hcode_coming_soon_notify_me_yt' => '',
            'hcode_coming_soon_notify_me_yt_url' => '',
            'hcode_coming_soon_notify_me_li' => '',
            'hcode_coming_soon_notify_me_li_url' => '',
            'hcode_coming_soon_notify_me_in' => '',
            'hcode_coming_soon_notify_me_in_url' => '',
            'hcode_coming_soon_notify_me_pi' => '',
            'hcode_coming_soon_notify_me_pi_url' => '',
            'hcode_coming_soon_notify_me_gh' => '',
            'hcode_coming_soon_notify_me_gh_url' => '',
            'hcode_coming_soon_notify_me_xing' => '',
            'hcode_coming_soon_notify_me_xing_url' => '',
            'hcode_coming_soon_notify_me_vk' => '',
            'hcode_coming_soon_notify_me_vk_url' => '',
            'hcode_coming_soon_notify_me_ws' => '',
            'hcode_coming_soon_notify_me_ws_url' => '',
            'hcode_coming_soon_notify_me_email' => '',
            'hcode_coming_soon_notify_me_email_url' => '',
            'hcode_coming_soon_notify_me_custom_link' => '',
            'padding_setting' => '',
            'desktop_padding' => '',
            'custom_desktop_padding' => '',
            'ipad_padding' => '',
            'custom_ipad_padding' => '',
            'mobile_padding' => '',
            'custom_mobile_padding' => '',
            'margin_setting' => '',
            'desktop_margin' => '',
            'custom_desktop_margin' => '',
            'ipad_margin' => '',
            'custom_ipad_margin' => '',
            'mobile_margin' => '',
            'custom_mobile_margin' => '',
            'hcode_coming_soon_bg' => '',
            'enable_mute' => '',
            'enable_loop' => '1',
            'enable_autoplay' => '1',
            'enable_controls' => '1',
            'hcode_overlay_color' => '',
            'hcode_overlay_opacity' => '',
            'hcode_image_srcset' => 'full',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_counter_font' => '',
            'hcode_responsive_counter_text_font' => '',
            'hcode_responsive_notify_title_font' => '',
            'hcode_responsive_notify_subtitle_font' => '',
        ), $atts ) );
        
        global $font_settings_array, $hcode_coming_soon_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $output = $hcode_overlay = $title_responsive_id = $title_responsive_style = $title_responsive_class = $counter_responsive_id = $counter_responsive_style = $counter_responsive_class = $counter_text_responsive_id = $counter_text_responsive_style = $counter_text_responsive_class = $notify_title_responsive_id = $notify_title_responsive_style = $notify_title_responsive_class = $notify_subtitle_responsive_id = $notify_subtitle_responsive_style = $notify_subtitle_responsive_class = '';
        $classes = array();
        $id = ($id) ? 'id='.$id : '';
        $class = ($class) ? ' '.$class : ''; 

        $hcode_coming_soon_logo = ( $hcode_coming_soon_logo ) ? $hcode_coming_soon_logo : '';
        $hcode_coming_soon_bg = ( $hcode_coming_soon_bg ) ? $hcode_coming_soon_bg : '';
        $hcode_coming_soon_mp4 = ( $hcode_coming_soon_mp4 ) ? $hcode_coming_soon_mp4 : '';
        $hcode_coming_soon_ogg = ( $hcode_coming_soon_ogg ) ? $hcode_coming_soon_ogg : '';
        $hcode_coming_soon_webm = ( $hcode_coming_soon_webm ) ? $hcode_coming_soon_webm : '';
        $hcode_coming_soon_title = ( $hcode_coming_soon_title ) ? $hcode_coming_soon_title : '';
        $hcode_coming_soon_date = ( $hcode_coming_soon_date ) ? $hcode_coming_soon_date : '';
        $hcode_date_style = ( $hcode_date_style ) ? $hcode_date_style : '';
        $hcode_coming_soon_notify_me_title = ( $hcode_coming_soon_notify_me_title ) ? $hcode_coming_soon_notify_me_title : '';
        $hcode_coming_soon_notify_me_subtitle = ( $hcode_coming_soon_notify_me_subtitle ) ? $hcode_coming_soon_notify_me_subtitle : '';
        $hcode_coming_soon_notify_me_show_form = ( $hcode_coming_soon_notify_me_show_form ) ? $hcode_coming_soon_notify_me_show_form : '';
        $hcode_coming_soon_notify_placeholder = ( $hcode_coming_soon_notify_placeholder ) ? $hcode_coming_soon_notify_placeholder : __('ENTER YOUR EMAIL ADDRESS','hcode-addons');
        $hcode_coming_soon_notify_me_button_text = ( $hcode_coming_soon_notify_me_button_text ) ? $hcode_coming_soon_notify_me_button_text : __('Get Notified','hcode-addons');

        $hcode_time_counter_days_taxt = ( $hcode_time_counter_days_taxt ) ? $hcode_time_counter_days_taxt : '';
        $hcode_time_counter_hours_taxt = ( $hcode_time_counter_hours_taxt ) ? $hcode_time_counter_hours_taxt : '';
        $hcode_time_counter_minutes_taxt = ( $hcode_time_counter_minutes_taxt ) ? $hcode_time_counter_minutes_taxt : '';
        $hcode_time_counter_seconds_taxt = ( $hcode_time_counter_seconds_taxt ) ? $hcode_time_counter_seconds_taxt : '';

        /* add Custom newsletter shortcode from v1.6 */
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('`{`', '[',$hcode_custom_newsletter) : '';
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('`}`', ']',$hcode_custom_newsletter) : '';
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('``', '"',$hcode_custom_newsletter) : '';

        $hcode_coming_soon_notify_me_fb_url = ( $hcode_coming_soon_notify_me_fb_url ) ? $hcode_coming_soon_notify_me_fb_url : '#';
        $hcode_coming_soon_notify_me_tw_url = ( $hcode_coming_soon_notify_me_tw_url ) ? $hcode_coming_soon_notify_me_tw_url : '#';
        $hcode_coming_soon_notify_me_gp_url = ( $hcode_coming_soon_notify_me_gp_url ) ? $hcode_coming_soon_notify_me_gp_url : '#';
        $hcode_coming_soon_notify_me_dr_url = ( $hcode_coming_soon_notify_me_dr_url ) ? $hcode_coming_soon_notify_me_dr_url : '#';
        $hcode_coming_soon_notify_me_yt_url = ( $hcode_coming_soon_notify_me_yt_url ) ? $hcode_coming_soon_notify_me_yt_url : '#';
        $hcode_coming_soon_notify_me_li_url = ( $hcode_coming_soon_notify_me_li_url ) ? $hcode_coming_soon_notify_me_li_url : '#';
        $hcode_coming_soon_notify_me_in_url = ( $hcode_coming_soon_notify_me_in_url ) ? $hcode_coming_soon_notify_me_in_url : '#';
        $hcode_coming_soon_notify_me_pi_url = ( $hcode_coming_soon_notify_me_pi_url ) ? $hcode_coming_soon_notify_me_pi_url : '#';
        $hcode_coming_soon_notify_me_gh_url = ( $hcode_coming_soon_notify_me_gh_url ) ? $hcode_coming_soon_notify_me_gh_url : '#';
        $hcode_coming_soon_notify_me_ws_url = ( $hcode_coming_soon_notify_me_ws_url ) ? $hcode_coming_soon_notify_me_ws_url : '#';

        $hcode_coming_soon_notify_me_xing_url = ( $hcode_coming_soon_notify_me_xing_url ) ? $hcode_coming_soon_notify_me_xing_url : '#';
        $hcode_coming_soon_notify_me_vk_url = ( $hcode_coming_soon_notify_me_vk_url ) ? $hcode_coming_soon_notify_me_vk_url : '#';
        $hcode_coming_soon_notify_me_email_url = ( $hcode_coming_soon_notify_me_email_url ) ? $hcode_coming_soon_notify_me_email_url : '#';

        $hcode_coming_soon_notify_me_custom_link = !empty( $hcode_coming_soon_notify_me_custom_link ) ? $hcode_coming_soon_notify_me_custom_link : '';

        $hcode_coming_soon_title_color = ( $hcode_coming_soon_title_color ) ? ' style="color:'.$hcode_coming_soon_title_color.' !important;"' : '';
        $hcode_coming_soon_notify_me_title_color = ( $hcode_coming_soon_notify_me_title_color ) ? ' style="color:'.$hcode_coming_soon_notify_me_title_color.' !important;"' : '';
        $hcode_coming_soon_notify_me_counter_color = ( $hcode_coming_soon_notify_me_counter_color ) ? ' style="color:'.$hcode_coming_soon_notify_me_counter_color.' !important;"' : '';
        $enable_mute = ($enable_mute == 1) ? 'muted ' : '';
        $enable_loop = ( $enable_loop == 1 ) ? 'loop ' : '';
        $enable_autoplay = ( $enable_autoplay == 1 ) ? 'autoplay ' : '';
        $enable_controls = ( $enable_controls == 1 ) ? 'controls ' : '';

        $hcode_coming_soon_notify_me_bgcolor = ( $hcode_coming_soon_notify_me_bgcolor ) ? ' style="background:'.$hcode_coming_soon_notify_me_bgcolor.'"' : '';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
        
        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_coming_soon_token = !empty( $hcode_coming_soon_token ) ? $hcode_coming_soon_token : 0;
            $hcode_coming_soon_token = $hcode_coming_soon_token + 1;
            $hcode_token_class = $classes[] = 'hcode-coming-soon-'.$hcode_coming_soon_token;
        }
        
        // Column Padding Settings
        $padding_setting = ( $padding_setting ) ? $padding_setting : '';
        if( $padding_setting ){
            ( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $desktop_padding : '';
            ( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $ipad_padding : '';
            ( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $mobile_padding : '';
            $custom_desktop_padding = ( $custom_desktop_padding ) ? $custom_desktop_padding : '';
            $custom_ipad_padding = ( $custom_ipad_padding ) ? $custom_ipad_padding : '';
            $custom_mobile_padding = ( $custom_mobile_padding ) ? $custom_mobile_padding : '';

            ( $custom_desktop_padding && $desktop_padding == 'custom-desktop-padding' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_desktop_padding.' !important; }' : '';
            ( $custom_ipad_padding && $ipad_padding == 'custom-ipad-padding' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_ipad_padding.' !important;}' : '';
            ( $custom_mobile_padding && $mobile_padding == 'custom-mobile-padding' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_mobile_padding.' !important;}' : '';
        }

        // Column Margin Settings
        $margin_setting = ( $margin_setting ) ? $margin_setting : '';
        if( $margin_setting ){
            ( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_margin : '';
            ( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $ipad_margin : '';
            ( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $mobile_margin : '';
            $custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
            $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
            $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';

            ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
            ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
            ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
        }

        //social icon style css
        $hcode_social_style_css = $hcode_social_style == 'hcode-social-style2' ? 'btn social-icon button' : 'black-text-link';
        $hcode_social_wrap_css  = $hcode_social_style == 'hcode-social-style2' ? '' : ' footer-social ';

        /* Overlay */
        $hcode_overlay_opacity = ( $hcode_overlay_opacity ) ? 'opacity:'.$hcode_overlay_opacity.';' : '';
        $hcode_overlay_color = ( $hcode_overlay_color ) ? 'background:'.$hcode_overlay_color.';' : '';
        
        if( $hcode_overlay_opacity || $hcode_overlay_color ){
            $hcode_overlay = ' style="'.$hcode_overlay_opacity.$hcode_overlay_color.'"';
        }

        //social icon style css
        $hcode_date_style_css   = $hcode_date_style;

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_counter_font ) ) {
            $counter_responsive_id = uniqid('hcode-font-setting-');
            $counter_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_counter_font, $counter_responsive_id.' .number' );
            $counter_responsive_class = ' '.$counter_responsive_id;
        }
        
        ( !empty( $counter_responsive_style ) ) ? $font_settings_array[] = $counter_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_counter_text_font ) ) {
            $counter_text_responsive_id = uniqid('hcode-font-setting-');
            $counter_text_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_counter_text_font, $counter_text_responsive_id.' span' );
            $counter_text_responsive_class = ' '.$counter_text_responsive_id;
        }
        
        ( !empty( $counter_text_responsive_style ) ) ? $font_settings_array[] = $counter_text_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_notify_title_font ) ) {
            $notify_title_responsive_id = uniqid('hcode-font-setting-');
            $notify_title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_notify_title_font, $notify_title_responsive_id );
            $notify_title_responsive_class = ' '.$notify_title_responsive_id;
        }

        ( !empty( $notify_title_responsive_style ) ) ? $font_settings_array[] = $notify_title_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_notify_subtitle_font ) ) {
            $notify_subtitle_responsive_id = uniqid('hcode-font-setting-');
            $notify_subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_notify_subtitle_font, $notify_subtitle_responsive_id );
            $notify_subtitle_responsive_class = ' '.$notify_subtitle_responsive_id;
        }

        ( !empty( $notify_subtitle_responsive_style ) ) ? $font_settings_array[] = $notify_subtitle_responsive_style : '';

        // Class List
        $class_list = implode(" ", $classes);

        switch( $hcode_coming_soon_type ){
        
        case 'hcode-coming-soon-type1':
        case 'hcode-coming-soon-type3':
            $hcode_animation_title_css = $hcode_coming_soon_type == 'hcode-coming-soon-type3' ? ' margin-ten no-margin-lr no-margin-bottom' : '';
            $hcode_animation_time_css  = $hcode_coming_soon_type == 'hcode-coming-soon-type3' ? ' margin-two no-margin-lr no-margin-bottom' : '';

            if( $hcode_coming_soon_type == 'hcode-coming-soon-type3' ) {
                $output .= '<div id="animated-balls"></div>';
                wp_enqueue_script( 'hcode-velocity');
                wp_enqueue_script( 'hcode-velocity-animation');
            }
            $output .= '<div class="slider-typography xs-position-inherit '.$class_list.$class.'">';
                $output .= '<div class="slider-text-middle-main">';
                    $output .= '<div class="slider-text-top slider-text-middle2">';
                        if ( $hcode_coming_soon_logo ) {
                            $output .= '<div class="coming-soon-logo">';
                            $output .= wp_get_attachment_image( $hcode_coming_soon_logo, $hcode_image_srcset, '', array( 'class' => 'logo-style-2' ) );
                            $output .= '</div>';
                        }
                        if( $hcode_coming_soon_title || $hcode_coming_soon_title_color ) {
                            $output .= '<span class="coming-soon-title text-uppercase '.$hcode_animation_title_css.$title_responsive_class.'"'.$hcode_coming_soon_title_color.'>'.$hcode_coming_soon_title.'</span>';
                        }
                        if( $content ) {
                            $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        }
                        if( $hcode_coming_soon_date ) {
                            $output .= '<div id="counter-underconstruction" data-days-text="'.$hcode_time_counter_days_taxt.'" data-hours-text="'.$hcode_time_counter_hours_taxt.'" data-minutes-text="'.$hcode_time_counter_minutes_taxt.'" data-seconds-text="'.$hcode_time_counter_seconds_taxt.'" class="'.$hcode_date_style_css.$hcode_animation_time_css.$counter_responsive_class.$counter_text_responsive_class.'"'.$hcode_coming_soon_notify_me_counter_color.'></div>';
                            $output .= '<span class="hide counter-underconstruction-date counter-hidden">'.$hcode_coming_soon_date.'</span>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            if( $hcode_coming_soon_notify_me_title || $hcode_coming_soon_notify_me_subtitle || $hcode_coming_soon_notify_me_show_form == 1 || $hcode_coming_soon_notify_me_fb == 1 || $hcode_coming_soon_notify_me_tw == 1 || $hcode_coming_soon_notify_me_gp == 1 || $hcode_coming_soon_notify_me_dr == 1 || $hcode_coming_soon_notify_me_yt == 1 || $hcode_coming_soon_notify_me_li == 1 || $hcode_coming_soon_notify_me_in == 1 || $hcode_coming_soon_notify_me_pi == 1 || $hcode_coming_soon_notify_me_gh == 1 || $hcode_coming_soon_notify_me_ws == 1 || $hcode_coming_soon_notify_me_xing || $hcode_coming_soon_notify_me_vk || $hcode_coming_soon_notify_me_email || !empty( $hcode_coming_soon_notify_me_custom_link ) ):
                $output .= '<div class="notify-me-main"'.$hcode_coming_soon_notify_me_bgcolor.'>';
                    $output .= '<div class="container">';
                        if( $hcode_coming_soon_notify_me_title || $hcode_coming_soon_notify_me_subtitle ) {
                            $output .= '<div class="row">';
                                $output .= '<div class="col-md-12 col-sm-12 text-center">';
                                    $output .= '<span class="notify-me-text text-uppercase'.$notify_subtitle_responsive_class.'">';
                                    $output .= '<strong class="'.$notify_title_responsive_class.'"'.$hcode_coming_soon_notify_me_title_color.'>'.$hcode_coming_soon_notify_me_title.'</strong>';
                                    $output .= '<br>'.$hcode_coming_soon_notify_me_subtitle.'</span>';
                                $output .= '</div>';
                            $output .= '</div>';
                        }

                        if( $hcode_coming_soon_notify_me_show_form == 1 ) {
                            $output .= '<div class="row">';
                                $output .= '<div class="col-md-6 col-sm-12 text-center center-col">';
                                if( $hcode_coming_soon_custom_newsletter == 1 ) {
                                    $output .= do_shortcode( $hcode_custom_newsletter );
                                } else {
                                    $output .= '<form method="POST" name="subscription" action="'.esc_url( home_url() ).'/index.php?wp_nlm=subscribe">';
                                        $output .= wp_nonce_field( 'xyz_em_subscription' );
                                        $output .= '<input class="form-control xyz_em_email" placeholder="'.$hcode_coming_soon_notify_placeholder.'" name="xyz_em_email" type="text" />';
                                        $output .= '<button name="submit" id="submit_newsletter" class="btn btn-black btn-small no-margin submit_newsletter" ><span>'.$hcode_coming_soon_notify_me_button_text.'</span></button>';
                                    $output .= '</form>';
                                }
                                $output .= '</div>';
                            $output .= '</div>';
                        }
                        if( $hcode_coming_soon_notify_me_fb == 1 || $hcode_coming_soon_notify_me_tw == 1 || $hcode_coming_soon_notify_me_gp == 1 || $hcode_coming_soon_notify_me_dr == 1 || $hcode_coming_soon_notify_me_yt == 1 || $hcode_coming_soon_notify_me_li == 1 || $hcode_coming_soon_notify_me_in == 1 || $hcode_coming_soon_notify_me_pi == 1 || $hcode_coming_soon_notify_me_gh == 1 || $hcode_coming_soon_notify_me_ws == 1 || $hcode_coming_soon_notify_me_xing == 1 || $hcode_coming_soon_notify_me_vk == 1 || $hcode_coming_soon_notify_me_email == 1 || !empty( $hcode_coming_soon_notify_me_custom_link ) ) {
                            $output .= '<div class="row coming-soon-footer">';
                                $output .= '<!-- social icon -->';
                                $output .= '<div class="col-md-12 text-center margin-five no-margin-bottom '.$hcode_social_wrap_css.'">';
                                    if( $hcode_coming_soon_notify_me_fb == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_fb_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-facebook-f"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_tw == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_tw_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-twitter"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_gp == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_gp_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-google-plus-g"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_dr == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_dr_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-dribbble"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_yt == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_yt_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-youtube"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_li == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_li_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-linkedin-in"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_in == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_in_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-instagram"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_pi == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_pi_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-pinterest-p"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_gh == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_gh_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-github"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_xing == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_xing_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-xing"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_vk == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_vk_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-vk"></i></a>';
                                    }
                                    if( $hcode_coming_soon_notify_me_ws == 1 ) {
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_ws_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fas fa-external-link-alt"></i></a>';
                                    }

                                    if( $hcode_coming_soon_notify_me_email ) {
                                        if( $hcode_coming_soon_notify_me_email_url == '#' ) {
                                            $output .= '<a href="'.$hcode_coming_soon_notify_me_email_url.'" class="'.$hcode_social_style_css.'"><i class="fas fa-envelope"></i></a>';

                                        } else {
                                            $output .= '<a href="mailto:'.$hcode_coming_soon_notify_me_email_url.'" class="'.$hcode_social_style_css.'"><i class="fas fa-envelope"></i></a>';
                                        }
                                    }

                                    if( !empty( $hcode_coming_soon_notify_me_custom_link ) ) {
                                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hcode_coming_soon_notify_me_custom_link ) ) ) );
                                    }
                                $output .= '</div>';
                                $output .= '<!-- end social icon -->';
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            endif;
        break;
        case 'hcode-coming-soon-type2':
            $thumb_bg = wp_get_attachment_image_src( $hcode_coming_soon_bg, 'full' );
            $output .= '<div class="opacity-light gradient-overlay"'.$hcode_overlay.'></div><div class="video-wrapper">
                            <video '.$enable_mute.$enable_loop.$enable_autoplay.$enable_controls.' class="html-video" poster="'.$thumb_bg[0].'">
                                <source type="video/mp4" src="'.$hcode_coming_soon_mp4.'">
                                <source type="video/ogg" src="'.$hcode_coming_soon_ogg.'">
                                <source type="video/webm" src="'.$hcode_coming_soon_webm.'">
                            </video>
                        </div>';
            $output .= '<div class="hcode-remove-frontend-editor-position-style2 slider-typography '.$class_list.$class.'">';
                $output .= '<div class="slider-text-middle-main">';
                    $output .= '<div class="slider-text-top slider-text-middle2">';
                        if ( $hcode_coming_soon_logo ) {
                            $output .= '<div class="coming-soon-logo">';
                            $output .= wp_get_attachment_image( $hcode_coming_soon_logo, $hcode_image_srcset, '', array( 'class' => 'logo-style-3' ) );
                            $output .= '</div>';
                        }
                        if( $hcode_coming_soon_title || $hcode_coming_soon_title_color ) {
                            $output .= '<span class="coming-soon-title text-uppercase'.$title_responsive_class.'"'.$hcode_coming_soon_title_color.'>'.$hcode_coming_soon_title.'</span>';
                        }
                        if( $hcode_coming_soon_date ) {
                            $output .= '<!-- time -->';
                            $output .= '<div id="counter-underconstruction" data-days-text="'.$hcode_time_counter_days_taxt.'" data-hours-text="'.$hcode_time_counter_hours_taxt.'" data-minutes-text="'.$hcode_time_counter_minutes_taxt.'" data-seconds-text="'.$hcode_time_counter_seconds_taxt.'" class="counter-underconstruction-video '.$hcode_date_style_css.$counter_responsive_class.$counter_text_responsive_class.' "'.$hcode_coming_soon_notify_me_counter_color.'></div>';
                            $output .= '<span class="hide counter-underconstruction-date counter-hidden">'.$hcode_coming_soon_date.'</span>';
                            $output .= '<!-- end time -->';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
            if( $hcode_coming_soon_notify_me_title || $hcode_coming_soon_notify_me_subtitle || $hcode_coming_soon_notify_me_show_form == 1 || $hcode_coming_soon_notify_me_fb == 1 || $hcode_coming_soon_notify_me_tw == 1 || $hcode_coming_soon_notify_me_gp == 1 || $hcode_coming_soon_notify_me_dr == 1 || $hcode_coming_soon_notify_me_yt == 1 || $hcode_coming_soon_notify_me_li == 1 || $hcode_coming_soon_notify_me_in == 1 || $hcode_coming_soon_notify_me_pi == 1 || $hcode_coming_soon_notify_me_gh == 1 || $hcode_coming_soon_notify_me_ws == 1 || $hcode_coming_soon_notify_me_xing == 1 || $hcode_coming_soon_notify_me_vk == 1 || $hcode_coming_soon_notify_me_email == 1 || !empty( $hcode_coming_soon_notify_me_custom_link ) ):
                $output .= '<div class="notify-me-main"'.$hcode_coming_soon_notify_me_bgcolor.'>';
                    $output .= '<div class="container">';
                        if( $hcode_coming_soon_notify_me_title || $hcode_coming_soon_notify_me_subtitle ):
                            $output .= '<div class="row">';
                                $output .= '<div class="col-md-12 col-sm-12 text-center">';
                                    $output .= '<span class="notify-me-text text-uppercase'.$notify_subtitle_responsive_class.'">';
                                    $output .= '<strong class="'.$notify_title_responsive_class.'"'.$hcode_coming_soon_notify_me_title_color.'>'.$hcode_coming_soon_notify_me_title.'</strong>';
                                    $output .= '<br>'.$hcode_coming_soon_notify_me_subtitle.'</span>';
                                $output .= '</div>';
                            $output .= '</div>';
                        endif;

                        if( $hcode_coming_soon_notify_me_show_form == 1 ):
                            $output .= '<div class="row">';
                                $output .= '<div class="col-md-6 col-sm-12 text-center center-col">';
                                if( $hcode_coming_soon_custom_newsletter == 1 ):
                                    $output .= do_shortcode($hcode_custom_newsletter);
                                else:
                                    $output .= '<form method="POST" name="subscription" action="'.esc_url( home_url() ).'/index.php?wp_nlm=subscribe">';
                                        $output .= wp_nonce_field( 'xyz_em_subscription' );
                                        $output .= '<input class="form-control xyz_em_email" placeholder="'.$hcode_coming_soon_notify_placeholder.'" name="xyz_em_email" type="text" />';
                                        $output .= '<button name="submit" id="submit_newsletter" class="btn btn-black btn-small no-margin submit_newsletter" ><span>'.$hcode_coming_soon_notify_me_button_text.'</span></button>';
                                    $output .= '</form>';
                                endif;
                                $output .= '</div>';
                            $output .= '</div>';
                        endif;
                        if( $hcode_coming_soon_notify_me_fb == 1 || $hcode_coming_soon_notify_me_tw == 1 || $hcode_coming_soon_notify_me_gp == 1 || $hcode_coming_soon_notify_me_dr == 1 || $hcode_coming_soon_notify_me_yt == 1 || $hcode_coming_soon_notify_me_li == 1 || $hcode_coming_soon_notify_me_in == 1 || $hcode_coming_soon_notify_me_pi == 1 || $hcode_coming_soon_notify_me_gh == 1 || $hcode_coming_soon_notify_me_ws == 1 || $hcode_coming_soon_notify_me_xing == 1 || $hcode_coming_soon_notify_me_vk == 1 || $hcode_coming_soon_notify_me_email == 1 || !empty( $hcode_coming_soon_notify_me_custom_link ) ):
                            $output .= '<div class="row coming-soon-footer">';
                                $output .= '<!-- social icon -->';
                                $output .= '<div class="col-md-12 text-center margin-two no-margin-bottom '.$hcode_social_wrap_css.'">';
                                    if( $hcode_coming_soon_notify_me_fb == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_fb_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-facebook-f"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_tw == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_tw_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-twitter"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_gp == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_gp_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-google-plus-g"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_dr == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_dr_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-dribbble"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_yt == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_yt_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-youtube"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_li == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_li_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-linkedin-in"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_in == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_in_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-instagram"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_pi == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_pi_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-pinterest-p"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_gh == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_gh_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-github"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_xing == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_xing_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-xing"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_vk == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_vk_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fab fa-vk"></i></a>';
                                    endif;
                                    if( $hcode_coming_soon_notify_me_ws == 1 ):
                                        $output .= '<a href="'.esc_url( $hcode_coming_soon_notify_me_ws_url ).'" target="_blank" class="'.$hcode_social_style_css.'"><i class="fas fa-external-link-alt"></i></a>';
                                    endif;

                                    if( $hcode_coming_soon_notify_me_email ):
                                        if( $hcode_coming_soon_notify_me_email_url == '#' ) {
                                            $output .= '<a href="'.$hcode_coming_soon_notify_me_email_url.'" class="'.$hcode_social_style_css.'"><i class="fas fa-envelope"></i></a>';

                                        } else {
                                            $output .= '<a href="mailto:'.$hcode_coming_soon_notify_me_email_url.'" class="'.$hcode_social_style_css.'"><i class="fas fa-envelope"></i></a>';
                                        }
                                    endif;

                                    if( !empty( $hcode_coming_soon_notify_me_custom_link ) ) :
                                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hcode_coming_soon_notify_me_custom_link ) ) ) );
                                    endif;
                                $output .= '</div>';
                                $output .= '<!-- end social icon -->';
                            $output .= '</div>';
                        endif;
                    $output .= '</div>';
                $output .= '</div>';
            endif;
        break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_coming_soon', 'hcode_coming_soon_shortcode' );