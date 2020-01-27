<?php
/**
 * Shortcode For Newsletter
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Newsletter */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_newsletter_shortcode' ) ) {
    function hcode_newsletter_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_newsletter_premade_style' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'hcode_newsletter_icon' => '',
            'hcode_newsletter_title' => '',
            'hcode_newsletter_subtitle' => '',
            'hcode_newsletter_placeholder' => '',
            'hcode_newsletter_button_text' => 'Subscribe Now!',
            'hcode_coming_soon_custom_newsletter' => '',
            'hcode_custom_newsletter' => '',
            'hcode_newsletter_icon_size' => '',
            'hcode_newsletter_icon_color' => '',
            'hcode_newsletter_title_color' => '',
            'hcode_newsletter_subtitle_color' => '',
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
            'hcode_icon_image_srcset' => 'full',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_subtitle_font' => '',
            'button_config_settings' => '',
        ), $atts ) );
        
        global $font_settings_array, $hcode_newsletter_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $output = $padding = $margin = $padding_style = $margin_style = $style_attr = $style = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = $button_responsive_id = $button_responsive_style = $button_responsive_class = '';
        $classes = array();

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
        
        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

        $id = ($id) ? ' id='.$id : '';
        ($class) ? $classes[] = $class : ''; 
        $hcode_newsletter_icon = ( $hcode_newsletter_icon ) ? $hcode_newsletter_icon : 'medium-icon';
        $hcode_newsletter_title = ( $hcode_newsletter_title ) ? $hcode_newsletter_title : '';
        $hcode_newsletter_subtitle = ( $hcode_newsletter_subtitle ) ? $hcode_newsletter_subtitle : '';
        $hcode_newsletter_placeholder = ( $hcode_newsletter_placeholder ) ? $hcode_newsletter_placeholder : __('ENTER YOUR EMAIL','hcode-addons');
        $hcode_newsletter_button_text = ( $hcode_newsletter_button_text ) ? $hcode_newsletter_button_text : __('Subscribe Now!','hcode-addons');

        /* add Custom newsletter shortcode from v1.6 */
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('`{`', '[',$hcode_custom_newsletter) : '';
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('`}`', ']',$hcode_custom_newsletter) : '';
        $hcode_custom_newsletter = ( $hcode_custom_newsletter ) ? str_replace('``', '"',$hcode_custom_newsletter) : '';

        
        $hcode_newsletter_icon_size = ( $hcode_newsletter_icon_size ) ? ' '.$hcode_newsletter_icon_size : '';
        $hcode_newsletter_icon_color = ( $hcode_newsletter_icon_color ) ? ' style="color:'.$hcode_newsletter_icon_color.'"' : '';
        $hcode_newsletter_title_color = ( $hcode_newsletter_title_color ) ? ' style="color:'.$hcode_newsletter_title_color.'"' : '';
        $hcode_newsletter_subtitle_color = ( $hcode_newsletter_subtitle_color ) ? ' style="color:'.$hcode_newsletter_subtitle_color.'"' : '';
        
        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_newsletter_token = !empty( $hcode_newsletter_token ) ? $hcode_newsletter_token : 0;
            $hcode_newsletter_token = $hcode_newsletter_token + 1;
            $hcode_token_class = $classes[] = 'hcode-newsletter-'.$hcode_newsletter_token;
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

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';

        /* New Font Awesome Icons */

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_newsletter_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_newsletter_icon = substr(strstr($hcode_newsletter_icon," "), 1);

            if(array_key_exists($hcode_newsletter_icon, $fa_icon_old)){
                $hcode_newsletter_icon = $fa_icon_old[$hcode_newsletter_icon];
            }else if(in_array($hcode_newsletter_icon, $fa_icons_solid)){
                $hcode_newsletter_icon = 'fas '.$hcode_newsletter_icon;
            }else if(in_array($hcode_newsletter_icon, $fa_icons_reg)){
                $hcode_newsletter_icon = 'far '.$hcode_newsletter_icon;
            }else if(in_array($hcode_newsletter_icon, $fa_icons_brand)){
                $hcode_newsletter_icon = 'fab '.$hcode_newsletter_icon;
            }else{
                $hcode_newsletter_icon = '';
            }
        }

        // Class List
        $class_list = implode(" ", $classes);
           
        switch ( $hcode_newsletter_premade_style ){
            case 'hcode-newsletter-block1':
                $output .= '<div class="shop-newsletter-main '.$class_list.'"'.$id.'>';
                    $output .= '<div class="shop-newsletter">';
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image margin-five no-margin-top' ) );
                        } elseif( $hcode_newsletter_icon ) {
                            $output .= '<i class="'.$hcode_newsletter_icon.$hcode_newsletter_icon_size.' margin-five no-margin-top"'.$hcode_newsletter_icon_color.'></i>';
                        }
                        if($hcode_newsletter_title):
                            $output .= '<p class="text-med text-uppercase letter-spacing-2 no-margin lg-display-block lg-margin-bottom-three'.$title_responsive_class.'"'.$hcode_newsletter_title_color.'>'.$hcode_newsletter_title.'</p>';
                        endif;
                        if($hcode_newsletter_subtitle):
                            $output .= '<p class="title-large font-weight-700 text-uppercase letter-spacing-2 lg-display-none'.$subtitle_responsive_class.'"'.$hcode_newsletter_subtitle_color.'>'.$hcode_newsletter_subtitle.'</p>';
                        endif;
                        if( $hcode_coming_soon_custom_newsletter == 1 ):
                            $output .= do_shortcode($hcode_custom_newsletter);
                        else:
                            $output .= '<form method="POST" name="subscription" action="'.home_url( '/' ).'index.php?wp_nlm=subscribe">';
                                $output .= wp_nonce_field( 'xyz_em_subscription' );
                                $output .= '<input class="no-margin xyz_em_email text-field" placeholder="'.$hcode_newsletter_placeholder.'" name="xyz_em_email" type="text" />';
                                $output .= '<input name="submit" id="submit_newsletter" class="btn submit-small-button margin-five no-margin-right no-margin-bottom submit_newsletter'.$button_responsive_class.'" type="submit" value="'.$hcode_newsletter_button_text.'" />';
                            $output .= '</form>';                   
                        endif;
                    $output .= '</div>';
                $output .= '</div>';
            break;
            case 'hcode-newsletter-block2':
                if( $hcode_coming_soon_custom_newsletter == 1 ):
                    $output .= do_shortcode($hcode_custom_newsletter);
                else:
                    $output .= '<form '.$id.' class="'.$class_list.'" method="POST" name="subscription" action="'.home_url( '/' ).'index.php?wp_nlm=subscribe">';
                        $output .= wp_nonce_field( 'xyz_em_subscription' );
                        $output .= '<div class="col-lg-8 col-md-7 col-sm-8 no-padding-left xs-no-padding xs-margin-bottom-four"><input type="text" id="email" name="xyz_em_email" class="big-input landing-subscribe-input no-margin-bottom xyz_em_email" placeholder="'.$hcode_newsletter_placeholder.'"></div>
                        <div class="col-lg-4 col-md-5 col-sm-4 no-padding"><input type="submit" class="landing-subscribe-button no-margin-bottom submit_newsletter'.$button_responsive_class.'" value="'.$hcode_newsletter_button_text.'" id="notifyme-button" name="notifyme-button"></div>
                    </form>';
                endif;
            break;

            case 'hcode-newsletter-block3':
                if( $hcode_coming_soon_custom_newsletter == 1 ):
                    $output .= do_shortcode($hcode_custom_newsletter);
                else:
                    $output .= '<div class="hcode-newsletter-general">';
                        $output .= '<form '.$id.' class="'.$class_list.'" method="POST" name="subscription" action="'.home_url( '/' ).'index.php?wp_nlm=subscribe">';
                            $output .= wp_nonce_field( 'xyz_em_subscription' );
                            $output .= '<input class="form-control xyz_em_email" placeholder="'.$hcode_newsletter_placeholder.'" name="xyz_em_email" type="text" />';
                            $output .= '<button name="submit" id="submit_newsletter" class="btn btn-black btn-small no-margin submit_newsletter'.$button_responsive_class.'" ><span>'.$hcode_newsletter_button_text.'</span></button>';
                        $output .= '</form>';
                    $output .= '</div>';
                endif;
            break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_newsletter', 'hcode_newsletter_shortcode' );