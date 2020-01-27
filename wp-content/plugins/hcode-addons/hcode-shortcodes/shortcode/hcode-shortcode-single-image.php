<?php
/**
 * Shortcode For Single Image
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Single Image */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_single_image_shortcode' ) ) {
    function hcode_single_image_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_single_image_premade_style' => '',
            'single_image_bg_image' => '',
            'single_image_bg_image_spa' => '',
            'single_image_title' => '',
            'single_image_title1' => '',
            'single_image_title2' => '',
            'single_image_title3' => '',
            'single_image_subtitle' =>'',
            'single_image_slide_number' => '',
            'single_image_mp4_video' => '',
            'single_image_ogg_video' => '',
            'single_image_webm_video' => '',
            'scroll_to_section' => '',
            'single_image_scroll_to_sectionid' => '',
            'hcode_text_color' => '',
            'hcode_title_color' => '',
            'hcode_small_title_color' => '',
            'hcode_small_title_pointer_color' => '',
            'first_button_config' => '',
            'second_button_config' => '',
            'fullscreen' => '',
            'hcode_sep_color' => '',
            'extra_content' => '',
            'position_relative' =>'',
            'hcode_container' => '',
            'youtube_video_url' => '',
            'video_type' => '',
            'external_video_url' => '',
            'video_fullscreen' => '',
            'enable_mute' => '',
            'enable_loop' => '1',
            'enable_autoplay' => '1',
            'enable_controls' => '1',
            'hcode_coming_soon_custom_newsletter' => '',
            'hcode_custom_newsletter' => '',
            'hcode_newsletter_placeholder' => '',
            'hcode_newsletter_button_text' => '',
            'hcode_overlay_color' => '',
            'hcode_overlay_opacity' => '',
            'hcode_image_srcset' => 'full',
            'hcode_bg_image_srcset' => 'full',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_small_title_font' => '',
            'hcode_responsive_extra_content_font' => '',
            'hcode_responsive_number_font' => '',
            'button_one_config_settings'=>'',
            'button_two_config_settings'=>'',
            'hcode_title_bg_color' => '',
        ), $atts ) );

        global $font_settings_array, $hcode_image_video_token, $hcode_featured_array;
        $iframe_attributes = $title_responsive_id = $title_responsive_style = $title_responsive_class = $small_title_responsive_id = $small_title_responsive_style = $small_title_responsive_class = $number_responsive_id = $number_responsive_style = $number_responsive_class = $extra_content_responsive_id = $extra_content_responsive_style = $extra_content_responsive_class = $button_one_responsive_id = $button_two_responsive_id = $button_one_responsive_class = $button_two_responsive_class = $button_one_responsive_style = $button_two_responsive_style ='';
        $fullscreen = ($fullscreen) ? " full-screen" : '';
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class : '';

        $hcode_image_video_token = !empty( $hcode_image_video_token ) ? $hcode_image_video_token : 0;
        $hcode_image_video_token = $hcode_image_video_token + 1;
        $hcode_token_class = 'hcode-image-video-'.$hcode_image_video_token;

        ( $hcode_title_bg_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'.hcode-title-bg{ background-color:'.$hcode_title_bg_color.' !important;}' : '';

        ( $hcode_small_title_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' .personal-name .cd-headline i{ color:'.$hcode_small_title_color.' !important;}' : '';
        ( $hcode_small_title_pointer_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' .personal-name .cd-headline.type .cd-words-wrapper::after{ background-color:'.$hcode_small_title_pointer_color.' !important;}' : '';

        if( !empty( $button_one_config_settings ) ) {
            $button_one_responsive_id = uniqid('hcode-button-');
            $button_one_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_one_config_settings, $button_one_responsive_id );
            $button_one_responsive_class = ' '.$button_one_responsive_id;
        }
        ( !empty( $button_one_responsive_style ) ) ? $font_settings_array[] = $button_one_responsive_style : '';

        if( !empty( $button_two_config_settings ) ) {
            $button_two_responsive_id = uniqid('hcode-button-');
            $button_two_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_two_config_settings, $button_two_responsive_id );
            $button_two_responsive_class = ' '.$button_two_responsive_id;
        }
        ( !empty( $button_two_responsive_style ) ) ? $font_settings_array[] = $button_two_responsive_style : '';

        // For Responsive Title Typography
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        // For Responsive Small Title Typography
        if( !empty( $hcode_responsive_small_title_font ) ) {
            $small_title_responsive_id = uniqid('hcode-font-setting-');
            $small_title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_small_title_font, $small_title_responsive_id );
            $small_title_responsive_class = ' '.$small_title_responsive_id;
        }
        ( !empty( $small_title_responsive_style ) ) ? $font_settings_array[] = $small_title_responsive_style : '';

        // For Responsive Number Typography
        if( !empty( $hcode_responsive_number_font ) ) {
            $number_responsive_id = uniqid('hcode-font-setting-');
            $number_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_number_font, $number_responsive_id );
            $number_responsive_class = ' '.$number_responsive_id;
        }
        ( !empty( $number_responsive_style ) ) ? $font_settings_array[] = $number_responsive_style : '';

        // For Responsive Extra Content Typography
        if( !empty( $hcode_responsive_extra_content_font ) ) {
            $extra_content_responsive_id = uniqid('hcode-font-setting-');
            $extra_content_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_extra_content_font, $extra_content_responsive_id );
            $extra_content_responsive_class = ' '.$extra_content_responsive_id;
        }
        ( !empty( $extra_content_responsive_style ) ) ? $font_settings_array[] = $extra_content_responsive_style : '';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
        $image_url = wp_get_attachment_image_src( $single_image_bg_image, $hcode_image_srcset );
        $hcode_bg_image_srcset  = !empty($hcode_bg_image_srcset) ? $hcode_bg_image_srcset : 'full';

        /* Overlay */
        $hcode_overlay = '';
        $hcode_overlay_opacity = ( $hcode_overlay_opacity ) ? 'opacity:'.$hcode_overlay_opacity.';' : '';
        $hcode_overlay_color = ( $hcode_overlay_color ) ? 'background:'.$hcode_overlay_color.';' : '';

        if( $hcode_overlay_opacity || $hcode_overlay_color ){
            $hcode_overlay = ' style="'.$hcode_overlay_opacity.$hcode_overlay_color.'"';
        }

        $enable_mute = ( $enable_mute == 1 ) ? 'muted ' : '';
        $enable_loop = ( $enable_loop == 1 ) ? 'loop ' : '';
        $enable_autoplay = ( $enable_autoplay == 1 ) ? 'autoplay ' : '';
        $enable_controls = ( $enable_controls == 1 ) ? 'controls ' : '';
        $single_image_title = ( $single_image_title ) ? str_replace('||', '<br />',$single_image_title) : '';

        /* add Custom newsletter shortcode from v1.6 */
        $hcode_newsletter_placeholder = ( $hcode_newsletter_placeholder ) ? $hcode_newsletter_placeholder : __('ENTER YOUR EMAIL...','hcode-addons');
        $hcode_newsletter_button_text = ( $hcode_newsletter_button_text ) ? $hcode_newsletter_button_text : __('START YOUR TRIAL','hcode-addons');
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('`{`', '[',$hcode_custom_newsletter) : '';
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('`}`', ']',$hcode_custom_newsletter) : '';
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('``', '"',$hcode_custom_newsletter) : '';

        // For Button
        if (function_exists('vc_parse_multi_attribute')) {

            $first_button_parse_args = vc_parse_multi_attribute($first_button_config);
            $first_button_link     = ( isset($first_button_parse_args['url']) ) ? $first_button_parse_args['url'] : '#';
            $first_button_title    = ( isset($first_button_parse_args['title']) ) ? $first_button_parse_args['title'] : '';

            /* second Button*/
            $second_button_parse_args = vc_parse_multi_attribute($second_button_config);  
            $second_button_link     = ( isset($second_button_parse_args['url']) ) ? $second_button_parse_args['url'] : '#';
            $second_button_title    = ( isset($second_button_parse_args['title']) ) ? $second_button_parse_args['title'] : '';
        }
        $hcode_text_color = ($hcode_text_color) ? ' style="color:'.$hcode_text_color.';border-color:'.$hcode_text_color.'"' : '';
        $hcode_title_color = ( $hcode_title_color ) ? ' style="color:'.$hcode_title_color.';"' : '';
        $hcode_sep_color = ($hcode_sep_color) ? 'style="background-color:'.$hcode_sep_color.';"' : '';
        $position_relative = ($position_relative == 1) ? ' position-relative' : '';
        $hcode_container = ($hcode_container == 1) ? ' container' : '';
        $youtube_video_url = ( $youtube_video_url ) ? $youtube_video_url : ''; 
        $external_video_url = ( $external_video_url ) ? $external_video_url : '';
        $pos = strrpos($external_video_url, '?');
        $iframe_video_parameters = ( $pos === false ) ? $external_video_url : substr($external_video_url, $pos + 1);
        if ( strpos($iframe_video_parameters, 'autoplay=1') !== false ) {
            $iframe_attributes = ' allow="autoplay"';
        }
        $video_fullscreen = ( $video_fullscreen ) ? ' class="full-screen"' : '';
        $output = '';
        switch ($hcode_single_image_premade_style) {
            case 'single-image-style1':
                if( $hcode_container || $position_relative || $fullscreen || $class || $id ):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    if( $single_image_title ):
                        $output .= '<div class="slider-typography">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle text-center slider-text-middle1 center-col wow fadeIn">';
                                    $output .= '<span class="fashion-subtitle text-uppercase font-weight-700 text-center'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    endif;
                if( $hcode_container || $position_relative || $fullscreen || $class || $id ):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1){
                    $output .= '<div class="scroll-down">';
                        $output .= '<a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link">';
                            $output .= '<i class="fas fa-angle-down bg-black white-text"></i>';
                        $output .= '</a>';
                    $output .= '</div>';
                }
            break;

            case 'single-image-style2':
                if( $hcode_container || $position_relative || $fullscreen || $class || $id ):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography spa-slider">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle">';
                                if( $single_image_bg_image ) {
                                    $output .= wp_get_attachment_image( $single_image_bg_image, $hcode_image_srcset );
                                    $output .= '<br><br>';
                                }
                                if($single_image_title):
                                    $output .= '<p class="text-large font-weight-500 text-uppercase light-gray-text letter-spacing-3 margin-two'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</p>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1){
                    $output .= '<div class="scroll-down">';
                        $output .= '<a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link">';
                            $output .= '<i class="fas fa-angle-down bg-black white-text"></i>';
                        $output .= '</a>';
                    $output .= '</div>';
                }
            break;

            case 'single-image-style3':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography'.$class.'"'.$id.'>';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-bottom agency-header">';
                                if( $single_image_bg_image ) {
                                    $output .= wp_get_attachment_image( $single_image_bg_image, $hcode_image_srcset );
                                }
                                if($single_image_title):
                                    $output .= '<h1 class="'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</h1>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1){
                    $output .= '<div class="scroll-down">';
                        $output .= '<a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link">';
                            $output .= '<i class="fas fa-angle-down bg-black white-text"></i>';
                        $output .= '</a>';
                    $output .= '</div>';
                }
            break;
            
            case 'single-image-style4':
                $output .= '<div class="video-background hcode-remove-frontend-editor-position-style2 fit-videos'.$class.'"'.$id.'>';
                    if($hcode_container || $position_relative || $fullscreen):
                        $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.'">';
                    endif;
                        $output .= '<div class="slider-typography">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-bottom slider-text-middle3">';
                                if($single_image_title || $content):
                                    $output .= '<h1 class="cd-headline letters type xs-margin-bottom-thirtyfive">';
                                        if($single_image_title):
                                            $output .= '<span class="hcode-title-bg rotation-highlight'.$title_responsive_class.' '.$hcode_token_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span><br>';
                                        endif;
                                        if($content):
                                            $output .= '<span class="cd-words-wrapper waiting">';
                                                $output .= do_shortcode( $content );
                                            $output .= '</span>';
                                        endif;
                                    $output .= '</h1>';
                                endif;
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    if($hcode_container || $position_relative || $fullscreen || $class || $id):
                        $output .= '</div>';
                    endif;
                    if($scroll_to_section == 1){
                        $output .= '<div class="scroll-down"><a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link"><i class="fas fa-angle-down bg-white black-text"></i></a></div>';
                    }
                $output .= '</div>';
                if($video_type == 'self'):
                    $output .= '<div class="video-wrapper full-screen-width z-index-0">';
                        $output .= '<video '.$enable_mute.$enable_loop.$enable_autoplay.$enable_controls.' class="html-video" poster="'.$image_url[0].'">';
                            if($single_image_mp4_video){
                                $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                            }
                            if($single_image_ogg_video){
                                $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                            }
                            if($single_image_webm_video){
                                $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                            }
                        $output .= '</video>';
                    $output .= '</div>';
                else:
                    $output .= '<div class="video-wrapper fit-videos z-index-0">';
                        if($external_video_url):
                            $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$iframe_attributes.' width="500" height="284" allowfullscreen></iframe>';
                        endif;
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style5':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-text-middle2">';
                                if($content):
                                    $output .= '<div class="separator-line xs-margin-bottom-five" '.$hcode_sep_color.'></div>';
                                    $output .= '<span class="cd-headline slide animation2 text-uppercase"'.$hcode_text_color.'>';
                                        $output .= '<span class="cd-words-wrapper text-center ">';
                                            $output .= do_shortcode( $content );
                                        $output .= '</span>';
                                    $output .= '</span><br>';
                                endif;
                                if(!empty($first_button_title)):
                                    $output .= '<a class="btn-small-white btn margin-lr-10px margin-five-top no-margin-bottom inner-link'.$button_one_responsive_class.'" href="'.$first_button_link.'">'.$first_button_title.'</a>';
                                endif;
                                if(!empty($second_button_title)):
                                    $output .= '<a class="btn-small-white btn margin-lr-10px margin-five-top no-margin-bottom inner-link'.$button_two_responsive_class.'" href="'.$second_button_link.'">'.$second_button_title.'</a>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .='<div class="scroll-down"><a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link"><i class="fas fa-angle-down bg-white black-text"></i></a></div>';
                endif;
            break;

            case 'single-image-style6':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography text-center">';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-bottom padding-left-right-px animated fadeInUp">';
                                    if($single_image_title):
                                        $output .= '<span class="owl-subtitle'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                        $output .= '<div class="separator-line-thick margin-three" '.$hcode_sep_color.'></div>';
                                    endif;
                                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                $output .= '</div>';
                            $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style7':
                $output .= '<div class="opacity-light gradient-overlay-light"'.$hcode_overlay.'></div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-text-middle2 animated fadeInUp">';
                                if($single_image_title):
                                    $output .= '<div class="separator-line bg-white" '.$hcode_sep_color.'></div>';
                                    $output .= '<span class="slider-subtitle2 alt-font'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                endif;
                                if($first_button_title):
                                    $output .= '<a class="btn-small-white btn margin-lr-10px margin-five-top no-margin-bottom inner-link'.$button_one_responsive_class.'" href="'.$first_button_link.'">'.$first_button_title.'</a>';
                                endif;
                                if($second_button_title):
                                    $output .= '<a class="btn-small-white btn margin-lr-10px margin-five-top no-margin-bottom inner-link'.$button_two_responsive_class.'" href="'.$second_button_link.'">'.$second_button_title.'</a>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .='<div class="scroll-down"><a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link"><i class="fas fa-angle-down bg-white black-text"></i></a></div>';
                endif;
            break;

            case 'single-image-style8':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                 $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle text-left slider-text-middle1 animated fadeInUp">';
                                if($single_image_title):
                                    $output .= '<span class="hcode-title-bg slider-subtitle1 alt-font white-text bg-black'.$title_responsive_class.' '.$hcode_token_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                $output .= '<div class="separator-line no-margin-lr" '.$hcode_sep_color.'></div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style9':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-text-middle3 animated fadeInUp">';
                                if($single_image_title):
                                    $output .= '<span class="slider-subtitle3 black-text'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span><br>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                if($first_button_title):
                                    $output .= '<br><a href="'.$first_button_link.'" class="btn-small-black-border-light btn margin-right-20px margin-five-top no-margin-bottom inner-link'.$button_one_responsive_class.'">'.$first_button_title.'</a>';
                                endif;
                                if($second_button_title):
                                    $output .= '<a href="'.$second_button_link.'" class="btn-small-black-border-light btn margin-right-20px margin-five-top no-margin-bottom inner-link'.$button_two_responsive_class.'">'.$second_button_title.'</a>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .= '<div class="scroll-down">';
                        $output .= '<a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link">';
                            $output .= '<i class="fas fa-angle-down bg-white black-text"></i>';
                        $output .= '</a>';
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style10':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-bottom slider-text-middle4 text-left animated fadeInUp">';
                                if($single_image_title):
                                    $output .= '<span class="slider-title-big4 alt-font'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                $output .= '<p class="no-margin text"><br class="no-margin text"></p><div class="separator-line no-margin-lr no-margin-top xs-margin-bottom-ten" '.$hcode_sep_color.'></div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style11':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-bottom slider-text-middle5 text-left animated fadeInUp">';
                                if($single_image_slide_number):
                                    $output .= '<span class="slider-number alt-font white-text'.$number_responsive_class.'"'.$hcode_text_color.'>'.$single_image_slide_number.'</span>';
                                endif;
                                if($single_image_title):
                                    $output .= '<span class="slider-title-big5 alt-font'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                $output .= '<p class="no-margin text"><br class="no-margin text"></p><div class="separator-line no-margin-lr no-margin-top sm-margin-bottom-eleven" '.$hcode_sep_color.'></div>';
                                if($extra_content):
                                    $output .= '<p class="text-uppercase no-margin-bottom"'.$hcode_text_color.'>'.$extra_content.'</p>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .='<div class="scroll-down"><a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link"><i class="fas fa-angle-down bg-white black-text"></i></a></div>';
                endif;
            break;

            case 'single-image-style12':
                $output .= '<div class="spa-sider"><div class="slider-content position-relative'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                    $output .= wp_get_attachment_image( $single_image_bg_image_spa, $hcode_bg_image_srcset, '', array( 'class' => 'spa-slider-bg' ) );
                    $output .= '<div class="slider-typography padding-seven">';
                            $output .= '<div class="slider-text-middle-main padding-six-lr sm-no-padding">';
                                $output .= '<div class="slider-text-middle slider-text-middle2 text-left xs-no-padding">';
                                    if( $single_image_bg_image ) {
                                        $output .= wp_get_attachment_image( $single_image_bg_image, $hcode_image_srcset, '', array( 'class' => 'get-bg' ) );
                                    }
                                    $output .= '<div class="separator-line no-margin-lr no-margin-top sm-margin-bottom-ten xs-margin-bottom-25px" '.$hcode_sep_color.'></div>';
                                    if($single_image_title):
                                        $output .= '<span class="owl-title single-image-title-box white-text margin-four-bottom sm-margin-bottom-ten xs-margin-bottom-25px'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                    endif;
                                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                    if($first_button_title):
                                        $output .= '<a class="btn-small-white btn inner-link no-margin-top'.$button_one_responsive_class.'" href="'.$first_button_link.'">'.$first_button_title.'</a>';
                                    endif;
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'single-image-style13':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography'.$class.'"'.$id.'>';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-bottom">';
                                if($youtube_video_url):
                                    $output .= '<a class="popup-youtube-landing" href="'.$youtube_video_url.'"><span class="play-icon"><i class="fas fa-play black-text"></i></span></a>';
                                endif;
                                if($single_image_title):
                                    $output .= '<h1 class="letter-spacing-2 white-text margin-three no-margin-bottom landing-title'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</h1>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                $output .= '<div class="margin-five margin-ten-bottom">';
                                    $output .= '<div class="col-lg-6 col-md-7 col-sm-10 col-xs-11 clearfix landing-subscribe center-col">';
                                    if( $hcode_coming_soon_custom_newsletter == 1 ):
                                        $output .= do_shortcode($hcode_custom_newsletter);
                                    else:
                                        $output .= do_shortcode( '[hcode_newsletter hcode_newsletter_premade_style="hcode-newsletter-block2" hcode_newsletter_placeholder="'.$hcode_newsletter_placeholder.'" hcode_newsletter_button_text="'.$hcode_newsletter_button_text.'"]' );
                                    endif;
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style14':
                $output .= '<div class="full-width-image owl-half-slider'.$class.'"'.$id.'>';
                    $output .= '<div class="slider-typography text-left">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle padding-left-right-px">';
                                if($single_image_title):
                                    $output .= '<span class="owl-subtitle black-text'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'single-image-style15':
                
                if( $video_type == 'self' ) {
                    if( $single_image_mp4_video || $single_image_ogg_video || $single_image_webm_video ) {
                        $output .= '<div class="video-wrapper full-screen-width z-index-0 position-top'.$class.'"'.$id.'>';
                            $output .= '<video '.$enable_mute.$enable_loop.$enable_autoplay.$enable_controls.' class="html-video" poster="'.$image_url[0].'">';
                                if($single_image_mp4_video){
                                    $output .= '<source type="video/mp4" src="'.$single_image_mp4_video.'">';
                                }
                                if($single_image_ogg_video){
                                    $output .= '<source type="video/ogg" src="'.$single_image_ogg_video.'">';
                                }
                                if($single_image_webm_video){
                                    $output .= '<source type="video/webm" src="'.$single_image_webm_video.'">';
                                }
                            $output .= '</video>';
                        $output .= '</div>';
                    }
                } else {
                    if( $external_video_url ) {
                        $output .= '<div class="video-wrapper fit-videos z-index-0 position-top'.$class.'"'.$id.'>';
                            $output .= '<iframe '.$video_fullscreen.' src="'.$external_video_url.'"'.$iframe_attributes.' width="500" height="284" allowfullscreen></iframe>';
                        $output .= '</div>';
                    }
                }
                
                if( $single_image_title || $content ) {
                    $output .= '<div class="slider-typography hcode-content-middle">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle">';
                                $output .= '<div class="slider-text-middle2 animated fadeInUp position-relative text-center margin-ten">';
                                    if( $single_image_title ) {
                                        $output .= '<span class="slider-subtitle2 alt-font white-text'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                    }
                                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                }
            break;

            case 'single-image-style16':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-text-middle2 animated fadeInUp">';
                                if($single_image_title):
                                    $output .= '<div class="separator-line margin-five sm-margin-bottom-seven" '.$hcode_sep_color.'></div>';
                                    $output .= '<span class="slider-subtitle2 alt-font black-text'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                                endif;
                                if($first_button_title):
                                    $output .= '<a class="btn-black btn margin-four-top margin-lr-10px inner-link no-margin-bottom'.$button_one_responsive_class.'" href="'.$first_button_link.'">'.$first_button_title.'</a>';
                                endif;
                                if($second_button_title):
                                    $output .= '<a class="btn-black btn margin-four-top margin-lr-10px inner-link'.$button_two_responsive_class.'" href="'.$second_button_link.'">'.$second_button_title.'</a>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .='<div class="scroll-down"><a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link"><i class="fas fa-angle-down bg-black white-text"></i></a></div>';
                endif;
            break;

            case 'single-image-style17':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                if($content):
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-bottom slider-text-middle2">';
                                $output .= '<div class="separator-line xs-margin-bottom-five" '.$hcode_sep_color.'></div>';
                                $output .= '<span class="cd-headline slide animation3 text-uppercase"'.$hcode_text_color.'>';
                                    $output .= '<span class="cd-words-wrapper text-center margin-ten no-margin-top">';
                                        $output .= do_shortcode( $content );
                                    $output .= '</span>';
                                $output .= '</span>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                endif;
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .='<div class="scroll-down"><a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link"><i class="fas fa-angle-down bg-white black-text"></i></a></div>';
                endif;
            break;

            case 'single-image-style18':
                $output .='<div class="half-project-small-img">';
                    $output .='<div class="container">';
                        $output .='<div class="project-header-text">';
                            if($single_image_title):
                                $output .='<span class="project-subtitle alt-font white-text'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                            endif;
                            $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        $output .='</div>';
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'single-image-style19':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography '.$hcode_token_class.'">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-text-middle2 personal-name animated fadeIn">';
                                if( $single_image_title ):
                                    $output .= '<h1 class="margin-two'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</h1>';
                                endif;
                                if( $single_image_title1 || $single_image_title2 || $single_image_title3 ):
                                    $output .= '<span class="cd-headline letters type text-uppercase">';
                                        $output .= '<span class="cd-words-wrapper waiting">';
                                            if( $single_image_title1 ):
                                                $output .= '<b class="is-visible main-font text-large font-weight-400'.$small_title_responsive_class.'">'.$single_image_title1.'</b>';
                                            endif;
                                            if( $single_image_title2 ):
                                                $output .= '<b class="main-font text-large font-weight-400'.$small_title_responsive_class.'">'.$single_image_title2.'</b>';
                                            endif;
                                            if( $single_image_title3 ):
                                                $output .= '<b class="main-font text-large font-weight-400'.$small_title_responsive_class.'">'.$single_image_title3.'</b>';
                                            endif;
                                        $output .= '</span>';
                                    $output .= '</span>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style20':
                if($single_image_slide_number):
                    $output .= '<span class="parallax-number alt-font black-text'.$number_responsive_class.'" >'.$single_image_slide_number.'</span>';
                endif;
                if($single_image_title):
                    $output .= '<span class="parallax-title alt-font black-text'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span>';
                endif;
                if($content):
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                endif;
                $output .= '<div class="separator-line bg-black no-margin-lr" '.$hcode_sep_color.'></div>';
                if($extra_content):
                    $output .= '<p class="black-text text-uppercase no-margin-bottom'.$extra_content_responsive_class.'">'.$extra_content.'</p>';
                endif;
            break;

            case 'single-image-style21':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-text-middle2">';
                                $output .='<div class="separator-line bg-white" '.$hcode_sep_color.'></div>';
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                if(!empty($first_button_title)):
                                    $output .= '<a class="btn-small-white btn margin-lr-10px margin-five-top no-margin-bottom inner-link'.$button_one_responsive_class.'" href="'.$first_button_link.'">'.$first_button_title.'</a>';
                                endif;
                                if(!empty($second_button_title)):
                                    $output .= '<a class="btn-small-white btn margin-lr-10px margin-five-top no-margin-bottom inner-link'.$button_two_responsive_class.'" href="'.$second_button_link.'">'.$second_button_title.'</a>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .='<div class="scroll-down"><a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link"><i class="fas fa-angle-down bg-white black-text"></i></a></div>';
                endif;
            break;

            case 'single-image-style22':
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .='<div class="'.$hcode_container.$position_relative.$fullscreen.$class.'"'.$id.'>';
                endif;
                    $output .= '<div class="slider-typography">';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="slider-text-middle slider-text-middle3 animated fadeInUp">';
                                if($single_image_title):
                                    $output .= '<span class="slider-subtitle3 white-text'.$title_responsive_class.'"'.$hcode_text_color.'>'.$single_image_title.'</span><br>';
                                endif;
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                if($first_button_title):
                                    $output .= '<br><a href="'.$first_button_link.'" class="btn-small-white btn margin-right-20px margin-five-top no-margin-bottom inner-link'.$button_one_responsive_class.'">'.$first_button_title.'</a>';
                                endif;
                                if($second_button_title):
                                    $output .= '<a href="'.$second_button_link.'" class="btn-small-white btn margin-right-20px margin-five-top no-margin-bottom inner-link'.$button_two_responsive_class.'">'.$second_button_title.'</a>';
                                endif;
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                if($hcode_container || $position_relative || $fullscreen || $class || $id):
                    $output .= '</div>';
                endif;
                if($scroll_to_section == 1):
                    $output .= '<div class="scroll-down">';
                        $output .= '<a href="#'.$single_image_scroll_to_sectionid.'" class="inner-link">';
                            $output .= '<i class="fas fa-angle-down bg-white black-text"></i>';
                        $output .= '</a>';
                    $output .= '</div>';
                endif;
            break;

            case 'single-image-style23':
                $output .= '<div class="slider-typography slider-typography-app text-left hcode-remove-frontend-editor-position-style1">';
                    $output .= '<div class="slider-text-middle-main">';
                        $output .= '<div class="slider-text-middle padding-left-right-px">';
                            $output .= '<span class="owl-title black-text xs-margin-bottom-seven margin-bottom-25px'.$title_responsive_class.'"'.$hcode_title_color.'>'.$single_image_title.'</span>';
                            if( $content ) {
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_single_image', 'hcode_single_image_shortcode' );