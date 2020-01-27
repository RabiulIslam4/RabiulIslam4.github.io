<?php
/**
 * Shortcode For Special Content Block.
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Content Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_content_block_shortcode' ) ) {
    function hcode_content_block_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_block_premade_style' => '',
            'hcode_block_preview_image' => '',
            'hcode_block_position_right' => '',
            'hcode_block_image' => '',
            'hcode_block_title' => '',
            'hcode_block_title_link' => '',
            'hcode_block_title_link_target' => '',
            'hcode_block_subtitle' => '',
            'hcode_block_title_url' => '',
            'hcode_block_gifts_off' => '',
            'hcode_block_image_position' => '',
            'hcode_block_show_separator' => '',
            'button_config' =>'',
            'hcode_block_telephone' => '',
            'hcode_block_telephone_prefix' => 'T.',
            'hcode_block_telephone_number' => '',
            'hcode_telephone_prefix_color' => '',
            'hcode_telephone_number_color' => '',
            'hcode_block_email' => '',
            'hcode_block_email_prefix' => 'E.',
            'hcode_block_email_url' => '',
            'hcode_email_prefix_color' => '',
            'hcode_email_id_color' => '',
            'hcode_block_icon_list' => '',
            'custom_icon' =>'',
            'custom_icon_image' =>'',
            'hcode_animation_style' => '',
            'hcode_image_position' => '',
            'hcode_block_icon_size' => '',
            'hcode_block_border_color' => '',
            'hcode_block_icon_color' => '',
            'hcode_block_title_color' => '',
            'hcode_block_subtitle_color' => '',
            'separator_height' => '',
            'hcode_sep_color' => '',
            'hcode_block_number_color' => '',
            'hcode_block_number_bg_color' => '',
            'hcode_block_price_color' => '',
            'hcode_block_price_bg_color' => '',
            'hcode_block_number_border_color' => '',
            'hcode_block_dis_text_bg_color' => '',
            'hcode_block_dis_text_color' => '',
            'hcode_block_number' => '',
            'hcode_block_hover_title' => '',
            'hcode_block_hover_url' => '',
            'hcode_block_hover_target_blank' => '',
            'hcode_block_hover_color' =>'',
            'hcode_block_hover_bg_color' => '',
            'hcode_block_hover_back_color' => '',
            'hcode_block_hover_text_color' => '',
            'hcode_block_hover_icon_color' => '',
            'hcode_block_hover_subtitle_color' => '',
            'hcode_block_facebook' =>'',
            'hcode_block_facebook_url' =>'',
            'hcode_block_twitter' =>'',
            'hcode_block_twitter_url' =>'',
            'hcode_block_googleplus' =>'',
            'hcode_block_googleplus_url' =>'',
            'hcode_block_dribbble' =>'',
            'hcode_block_dribbble_url' =>'',
            'hcode_block_youtube' => '',
            'hcode_block_youtube_url' => '',
            'hcode_block_linkedin' => '',
            'hcode_block_linkedin_url' => '',
            'hcode_block_instagram' => '',
            'hcode_block_instagram_url' => '',
            'hcode_block_pinterest' => '',
            'hcode_block_pinterest_url' => '',
            'hcode_block_github' => '',
            'hcode_block_github_url' => '',
            'hcode_block_xing' => '',
            'hcode_block_xing_url' => '',
            'hcode_block_vk' => '',
            'hcode_block_vk_url' => '',
            'hcode_block_website' => '',
            'hcode_block_website_url' => '',
            'hcode_block_email_address' => '',
            'hcode_block_email_address_url' => '',
            'hcode_block_custom_link' => '',
            'hcode_block_event_date' => '',
            'hcode_block_event_time' => '',
            'hcode_block_title_font_size' => '',
            'hcode_block_title_line_height' => '',
            'hcode_stars' => '',
            'hcode_block_price' => '',
            'hcode_block_button_color' => '',
            'hcode_block_button_arrow_color' => '',
            'hcode_block_button_text_color' => '',
            'hcode_block_button_border_color' => '',
            'hcode_border_class' => '',
            'hcode_block_bg_color' => '',
            'hcode_block_hover_custom_icon' =>'',
            'hcode_block_hover_custom_icon_image' =>'',
            'hcode_block_hover_icon1' => '',
            'hcode_block_hover_title1' => '',
            'hcode_block_hover_subtitle1' => '',
            'hcode_block_hover_custom_icon2' =>'',
            'hcode_block_hover_custom_icon2_image' =>'',
            'hcode_block_hover_icon2' => '',
            'hcode_block_hover_title2' => '',
            'hcode_block_hover_subtitle2' => '',
            'hcode_block_hover_content' => '',
            'hover_button_config' => '',
            'hcode_block_hover_destinations_small_title' => '',
            'hcode_block_hover_destinations_image1' => '',
            'hcode_block_hover_destinations_title1' => '',
            'hcode_block_hover_destinations_url1' => '',
            'hcode_block_hover_destinations_subtitle1' => '',
            'hcode_block_hover_destinations_image2' => '',
            'hcode_block_hover_destinations_title2' => '',
            'hcode_block_hover_destinations_url2' => '',
            'hcode_block_hover_destinations_subtitle2' => '',
            'hcode_block_hover_destinations_image3' => '',
            'hcode_block_hover_destinations_title3' => '',
            'hcode_block_hover_destinations_url3' => '',
            'hcode_block_hover_destinations_subtitle3' => '',
            'hcode_image_srcset' => 'full',
            'hcode_icon_image_srcset' => 'full',
            'hcode_hover_icon_image_srcset' => 'full',
            'hcode_hover_icon2_image_srcset' => 'full',
            'hcode_destinations_image_srcset' => 'full',
            'hcode_destinations_image2_srcset' => 'full',
            'hcode_destinations_image3_srcset' => 'full',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_subtitle_font' => '',
            'hcode_responsive_number_font' => '',
            'hcode_responsive_hover_title_font' => '',
            'hcode_responsive_price_font' => '',
            'hcode_responsive_dis_text_font' => '',
            'hcode_responsive_hover_subtitle_font' => '',
            'hcode_responsive_small_title_font' => '',
            'hcode_responsive_destinations_title_font' => '',
            'hcode_responsive_destinations_subtitle_font' => '',
            'button_one_config_settings' => '',
            'button_two_config_settings' => '',
            'button_icon_config_settings' => '',
            'hcode_block_default_cursor' => '',
            'hcode_block_hover_border_color' => '',
            'hcode_block_strike_through' => '1',
            'hcode_block_hover_number_color' => '',
        ), $atts ) );
        
        global $font_settings_array, $hcode_block_token, $hcode_featured_array;
        $output = $separator = $discount_color = $hover_block_color = $number_color = $price_color = $image_position_class = $content_position_class = $style_att = $button_style = $title_color = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = $number_responsive_id = $number_responsive_style = $number_responsive_class = $hover_title_responsive_id = $hover_title_responsive_style = $hover_title_responsive_class = $price_responsive_id = $price_responsive_style = $price_responsive_class = $dis_text_responsive_id = $dis_text_responsive_style = $dis_text_responsive_class = $hover_subtitle_responsive_id = $hover_subtitle_responsive_style = $hover_subtitle_responsive_class = $small_title_responsive_id = $small_title_responsive_style = $small_title_responsive_class = $destinations_title_responsive_id = $destinations_title_responsive_style = $destinations_title_responsive_class = $destinations_subtitle_responsive_id = $destinations_subtitle_responsive_style = $destinations_subtitle_responsive_class = $button_one_responsive_id = $button_two_responsive_id = $button_one_responsive_class = $button_two_responsive_class = $button_two_responsive_style = $button_one_responsive_style ='';

        $hcode_block_token = !empty( $hcode_block_token ) ? $hcode_block_token : 0;
        $hcode_block_token = $hcode_block_token + 1;
        $hcode_token_class = 'hcode-block-'.$hcode_block_token;

        if( !empty( $button_one_config_settings ) ) {
            $button_one_responsive_id = uniqid('hcode-button-');
            $button_one_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_one_config_settings, $button_one_responsive_id );
            $button_one_responsive_class = ' '.$button_one_responsive_id;
        }
        if( !empty( $button_icon_config_settings ) ) {
            $button_one_responsive_id = uniqid('hcode-button-');
            $button_one_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_icon_config_settings, $button_one_responsive_id );
            $button_one_responsive_class = ' '.$button_one_responsive_id;
        }
        ( !empty( $button_one_responsive_style ) ) ? $font_settings_array[] = $button_one_responsive_style : '';

        if( !empty( $button_two_config_settings ) ) {
            $button_two_responsive_id = uniqid('hcode-button-');
            $button_two_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_two_config_settings, $button_two_responsive_id );
            $button_two_responsive_class = ' '.$button_two_responsive_id;
        }
        ( !empty( $button_two_responsive_style ) ) ? $font_settings_array[] = $button_two_responsive_style : '';

        //For Text Align 
        if( $hcode_block_premade_style == 'block-39' ){
            if( !empty( $hcode_responsive_title_font ) ) {
                $title_responsive_id = uniqid('hcode-font-setting-');
                $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, 'fashion-right .right-content .'.$title_responsive_id );
                $title_responsive_class = ' '.$title_responsive_id;
            }
        }else{
            if( !empty( $hcode_responsive_title_font ) ) {
                $title_responsive_id = uniqid('hcode-font-setting-');
                $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
                $title_responsive_class = ' '.$title_responsive_id;
            }
        }
        //For Text Align 
        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_number_font ) ) {
            $number_responsive_id = uniqid('hcode-font-setting-');
            $number_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_number_font, $number_responsive_id );
            $number_responsive_class = ' '.$number_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_hover_title_font ) ) {
            $hover_title_responsive_id = uniqid('hcode-font-setting-');
            $hover_title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_hover_title_font, $hover_title_responsive_id );
            $hover_title_responsive_class = ' '.$hover_title_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_price_font ) ) {
            $price_responsive_id = uniqid('hcode-font-setting-');
            $price_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_price_font, $price_responsive_id );
            $price_responsive_class = ' '.$price_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_dis_text_font ) ) {
            $dis_text_responsive_id = uniqid('hcode-font-setting-');
            $dis_text_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_dis_text_font, $dis_text_responsive_id );
            $dis_text_responsive_class = ' '.$dis_text_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_hover_subtitle_font ) ) {
            $hover_subtitle_responsive_id = uniqid('hcode-font-setting-');
            $hover_subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_hover_subtitle_font, $hover_subtitle_responsive_id );
            $hover_subtitle_responsive_class = ' '.$hover_subtitle_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_small_title_font ) ) {
            $small_title_responsive_id = uniqid('hcode-font-setting-');
            $small_title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_small_title_font, $small_title_responsive_id );
            $small_title_responsive_class = ' '.$small_title_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_destinations_title_font ) ) {
            $destinations_title_responsive_id = uniqid('hcode-font-setting-');
            $destinations_title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_destinations_title_font, $destinations_title_responsive_id );
            $destinations_title_responsive_class = ' '.$destinations_title_responsive_id;

        }
        //For Text Align 
        if( !empty( $hcode_responsive_destinations_subtitle_font ) ) {
            $destinations_subtitle_responsive_id = uniqid('hcode-font-setting-');
            $destinations_subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_destinations_subtitle_font, $destinations_subtitle_responsive_id );
            $destinations_subtitle_responsive_class = ' '.$destinations_subtitle_responsive_id;
        }

        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';
        ( !empty( $number_responsive_style ) ) ? $font_settings_array[] = $number_responsive_style : '';
        ( !empty( $hover_title_responsive_style ) ) ? $font_settings_array[] = $hover_title_responsive_style : '';
        ( !empty( $price_responsive_style ) ) ? $font_settings_array[] = $price_responsive_style : '';
        ( !empty( $dis_text_responsive_style ) ) ? $font_settings_array[] = $dis_text_responsive_style : '';
        ( !empty( $hover_subtitle_responsive_style ) ) ? $font_settings_array[] = $hover_subtitle_responsive_style : '';
        ( !empty( $small_title_responsive_style ) ) ? $font_settings_array[] = $small_title_responsive_style : '';
        ( !empty( $destinations_title_responsive_style ) ) ? $font_settings_array[] = $destinations_title_responsive_style : '';
        ( !empty( $destinations_subtitle_responsive_style ) ) ? $font_settings_array[] = $destinations_subtitle_responsive_style : '';

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $class : '';
        $hcode_border_class = ($hcode_border_class == 1) ? ' corporate-border' : '';
        $hcode_block_premade_style = ( $hcode_block_premade_style ) ? $hcode_block_premade_style : '';
        $hcode_block_image = ( $hcode_block_image ) ? $hcode_block_image : '';
        $hcode_default_cursor = ( $hcode_block_default_cursor ) ? ' block-default-cursor': '';

        $hcode_sep_color = ($hcode_sep_color) ? 'background:'.$hcode_sep_color.';' : '';
        $separator_height = ($separator_height) ? 'height:'.$separator_height.';' : '';

        if( $hcode_sep_color || $separator_height ) {
            $separator = ' style="'.$hcode_sep_color.$separator_height.'"';
        }

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

        $thumb = wp_get_attachment_image_src( $hcode_block_image, $hcode_image_srcset );

        $srcset = $srcset_data_bg = $srcset_classes_bg = '';
        $srcset = wp_get_attachment_image_srcset( $hcode_block_image, $hcode_image_srcset );
        if( $srcset ){
            $srcset_data_bg = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
            $srcset_classes_bg = ' bg-image-srcset';
        }

        $hcode_block_position_right = ( $hcode_block_position_right == 1 ) ? ' position-right-15px xs-position-right' : ' position-left-15px xs-position-left';
        $hcode_block_title = ( $hcode_block_title ) ? str_replace('||', '<br />',$hcode_block_title) : '';
        $hcode_block_subtitle = ( $hcode_block_subtitle ) ? str_replace('||', '<br />',$hcode_block_subtitle) : '';
        $hcode_block_title_link = ( $hcode_block_title_link ) ? $hcode_block_title_link : '';
        $hcode_block_title_link_target = ( $hcode_block_title_link_target ) ? ' target="'.$hcode_block_title_link_target.'"' : '';
        $hcode_block_title_url = ( $hcode_block_title_url ) ? $hcode_block_title_url : '';
        $hcode_block_gifts_off = ( $hcode_block_gifts_off ) ? $hcode_block_gifts_off : '';

        $hcode_block_show_separator = ( $hcode_block_show_separator ) ? $hcode_block_show_separator : '';
        $hcode_block_telephone = ( $hcode_block_telephone ) ? $hcode_block_telephone : '';
        $hcode_block_telephone_number = ( $hcode_block_telephone_number ) ? $hcode_block_telephone_number : '';
        $hcode_block_email = ( $hcode_block_email ) ? $hcode_block_email : '';
        $hcode_block_email_url = ( $hcode_block_email_url ) ? $hcode_block_email_url : '';
        $hcode_block_icon_list = ( $hcode_block_icon_list ) ? $hcode_block_icon_list : '';
        $hcode_animation_style = ( $hcode_animation_style ) ? ' wow '.$hcode_animation_style : '';
        $hcode_image_position = ($hcode_image_position) ? $hcode_image_position : '';
        $hcode_block_title_font_size = ($hcode_block_title_font_size) ? ' font-size:'.$hcode_block_title_font_size.' !important;' : '';
        $hcode_block_title_line_height = ( $hcode_block_title_line_height ) ? ' line-height:'.$hcode_block_title_line_height.';' : '';
        if( $hcode_block_title_color || $hcode_block_title_font_size || $hcode_block_title_line_height ) {
            $title_color = ' color:'.$hcode_block_title_color.' !important;';
            $style_att .= ' style="'.$hcode_block_title_font_size.$hcode_block_title_line_height.$title_color.'"';
        }

        /* Block 1 */
        $hcode_telephone_prefix_color = ( $hcode_telephone_prefix_color ) ? ' style="color:'.$hcode_telephone_prefix_color.'"' : '';
        $hcode_telephone_number_color = ( $hcode_telephone_number_color ) ? ' style="color:'.$hcode_telephone_number_color.'"' : '';
        $hcode_email_prefix_color = ( $hcode_email_prefix_color ) ? ' style="color:'.$hcode_email_prefix_color.'"' : '';
        $hcode_email_id_color = ( $hcode_email_id_color ) ? ' style="color:'.$hcode_email_id_color.'"' : '';

        /* Block 9 */
        $hcode_block_dis_text_bg_color = ( $hcode_block_dis_text_bg_color ) ? 'background-color:'.$hcode_block_dis_text_bg_color.';' : '';
        $hcode_block_dis_text_color = ( $hcode_block_dis_text_color ) ? 'color:'.$hcode_block_dis_text_color.';' : '';
        if( $hcode_block_dis_text_color || $hcode_block_dis_text_bg_color ) {
            $discount_color = ' style="'.$hcode_block_dis_text_color.$hcode_block_dis_text_bg_color.'"';
        }

        ( $hcode_block_hover_back_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.':hover, .grid-border .grid-border-box.'.$hcode_token_class.':hover{ background-color: '.$hcode_block_hover_back_color.' !important;}' : '';
        ( $hcode_block_hover_text_color ) ? $hcode_featured_array[] = '.grid-border .'.$hcode_token_class.':hover i, .grid-border .'.$hcode_token_class.':hover .hcode-special-block{ color: '.$hcode_block_hover_text_color.' !important }' : '';
        ( $hcode_block_border_color ) ? $hcode_featured_array[] = '.fashion-subtitle.'.$hcode_token_class.', .'.$hcode_token_class.'.about-onepage .border-right { border-color: '.$hcode_block_border_color.' !important }' : '';
        ( $hcode_block_hover_icon_color ) ? $hcode_featured_array[] = '.grid-border .'.$hcode_token_class.':hover i { color: '.$hcode_block_hover_icon_color.' !important }' : '';
        ( $hcode_block_hover_border_color ) ? $hcode_featured_array[] = '.about-onepage.'.$hcode_token_class.':hover .border-right { border-color: '.$hcode_block_hover_border_color.' !important }' : '';
        ( $hcode_block_hover_number_color ) ? $hcode_featured_array[] = '.about-onepage.'.$hcode_token_class.' .about-onepage-number-hover { color: '.$hcode_block_hover_number_color.' !important }' : '';

        ( $hcode_block_strike_through != 1 ) ? $hcode_featured_array[] = '.about-onepage.'.$hcode_token_class.':hover .about-onepage-text-sub .black-text { text-decoration: none !important }' : '';

        /* Social */
        $hcode_block_facebook_url = ( $hcode_block_facebook_url ) ? $hcode_block_facebook_url : '#';
        $hcode_block_twitter_url = ( $hcode_block_twitter_url ) ? $hcode_block_twitter_url : '#';
        $hcode_block_googleplus_url = ( $hcode_block_googleplus_url ) ? $hcode_block_googleplus_url : '#';
        $hcode_block_dribbble_url = ( $hcode_block_dribbble_url ) ? $hcode_block_dribbble_url : '#';
        $hcode_block_youtube_url = ( $hcode_block_youtube_url ) ? $hcode_block_youtube_url : '#';
        $hcode_block_linkedin_url = ( $hcode_block_linkedin_url ) ? $hcode_block_linkedin_url : '#';
        $hcode_block_instagram_url = ( $hcode_block_instagram_url ) ? $hcode_block_instagram_url : '#';
        $hcode_block_pinterest_url = ( $hcode_block_pinterest_url ) ? $hcode_block_pinterest_url : '#';
        $hcode_block_github_url = ( $hcode_block_github_url ) ? $hcode_block_github_url : '#';
        $hcode_block_xing_url = ( $hcode_block_xing_url ) ? $hcode_block_xing_url : '#';
        $hcode_block_vk_url = ( $hcode_block_vk_url ) ? $hcode_block_vk_url : '#';
        $hcode_block_website_url = ( $hcode_block_website_url ) ? $hcode_block_website_url : '#';
        $hcode_block_email_address_url = ( $hcode_block_email_address_url ) ? $hcode_block_email_address_url : '#';
        $hcode_block_custom_link = !empty( $hcode_block_custom_link ) ? $hcode_block_custom_link : '';
        $hcode_block_telephone_prefix = !empty( $hcode_block_telephone_prefix ) ? $hcode_block_telephone_prefix : '';
        $hcode_block_email_prefix = !empty( $hcode_block_email_prefix ) ? $hcode_block_email_prefix : '';
        
        /* For block 20 hover */
        $hcode_block_number = ( $hcode_block_number ) ? $hcode_block_number : '';
        $hcode_block_hover_title = ( $hcode_block_hover_title ) ? $hcode_block_hover_title : '';
        $hcode_block_hover_url = ( $hcode_block_hover_url ) ? $hcode_block_hover_url : '';
        $hcode_block_hover_target_blank = ( $hcode_block_hover_target_blank ) ? $hcode_block_hover_target_blank : '';
        $hcode_block_hover_color = ( $hcode_block_hover_color ) ? 'color:'.$hcode_block_hover_color.';' : '';
        $hcode_block_hover_bg_color = ( $hcode_block_hover_bg_color ) ? 'background-color:'.$hcode_block_hover_bg_color.';' : '';
        if( $hcode_block_hover_bg_color || $hcode_block_hover_color ) {
            $hover_block_color = ' style="'.$hcode_block_hover_bg_color.$hcode_block_hover_color.'"';
        }
        
        /* For Block 49 */
        $hcode_block_hover_icon1 = ( $hcode_block_hover_icon1 ) ? $hcode_block_hover_icon1 : '';
        $hcode_block_hover_title1 = ( $hcode_block_hover_title1 ) ? $hcode_block_hover_title1 : '';
        $hcode_block_hover_subtitle1 = ( $hcode_block_hover_subtitle1 ) ? $hcode_block_hover_subtitle1 : '';
        $hcode_block_hover_icon2 = ( $hcode_block_hover_icon2 ) ? $hcode_block_hover_icon2 : '';
        $hcode_block_hover_title2 = ( $hcode_block_hover_title2 ) ? $hcode_block_hover_title2 : '';
        $hcode_block_hover_subtitle2 = ( $hcode_block_hover_subtitle2 ) ? $hcode_block_hover_subtitle2 : '';
        $hcode_block_hover_content = ( $hcode_block_hover_content ) ? $hcode_block_hover_content : '';
        
        /* For Block 50*/
        $hcode_block_hover_destinations_small_title = ( $hcode_block_hover_destinations_small_title ) ? $hcode_block_hover_destinations_small_title : '';

        $hcode_destinations_image_srcset  = !empty($hcode_destinations_image_srcset) ? $hcode_destinations_image_srcset : 'full';
        $hcode_block_hover_destinations_image1 = ( $hcode_block_hover_destinations_image1 ) ? $hcode_block_hover_destinations_image1 : '';
        $hcode_block_hover_destinations_title1 = ( $hcode_block_hover_destinations_title1 ) ? $hcode_block_hover_destinations_title1 : '';
        $hcode_block_hover_destinations_url1 = ( $hcode_block_hover_destinations_url1 ) ? $hcode_block_hover_destinations_url1 : '';
        $hcode_block_hover_destinations_subtitle1 = ( $hcode_block_hover_destinations_subtitle1 ) ? $hcode_block_hover_destinations_subtitle1 : '';

        $hcode_destinations_image2_srcset  = !empty($hcode_destinations_image2_srcset) ? $hcode_destinations_image2_srcset : 'full';
        $hcode_block_hover_destinations_image2 = ( $hcode_block_hover_destinations_image2 ) ? $hcode_block_hover_destinations_image2 : '';
        $hcode_block_hover_destinations_title2 = ( $hcode_block_hover_destinations_title2 ) ? $hcode_block_hover_destinations_title2 : '';
        $hcode_block_hover_destinations_url2 = ( $hcode_block_hover_destinations_url2 ) ? $hcode_block_hover_destinations_url2 : '';
        $hcode_block_hover_destinations_subtitle2 = ( $hcode_block_hover_destinations_subtitle2 ) ? $hcode_block_hover_destinations_subtitle2 : '';

        $hcode_destinations_image3_srcset  = !empty($hcode_destinations_image3_srcset) ? $hcode_destinations_image3_srcset : 'full';
        $hcode_block_hover_destinations_image3 = ( $hcode_block_hover_destinations_image3 ) ? $hcode_block_hover_destinations_image3 : '';
        $hcode_block_hover_destinations_title3 = ( $hcode_block_hover_destinations_title3 ) ? $hcode_block_hover_destinations_title3 : '';
        $hcode_block_hover_destinations_url3 = ( $hcode_block_hover_destinations_url3 ) ? $hcode_block_hover_destinations_url3 : '';
        $hcode_block_hover_destinations_subtitle3 = ( $hcode_block_hover_destinations_subtitle3 ) ? $hcode_block_hover_destinations_subtitle3 : '';
        
        $hcode_block_hover_subtitle_color = ( $hcode_block_hover_subtitle_color ) ? ' style="color:'.$hcode_block_hover_subtitle_color.' !important"' : '';
        $hcode_block_hover_icon_color = ( $hcode_block_hover_icon_color ) ? ' style="color:'.$hcode_block_hover_icon_color.' !important"' : '';

        /* For Block 32, 55 */
        $hcode_block_icon_color_new = $hcode_block_title_color_new = '';
        $hcode_block_icon_color_new = ( $hcode_block_icon_color ) ? ' style="color:'.$hcode_block_icon_color.'"' : '';
        $hcode_block_title_color_new = ( $hcode_block_title_color ) ? ' style="color:'.$hcode_block_title_color.'"' : '';

        $hcode_block_icon_size = ( $hcode_block_icon_size ) ? ' '.$hcode_block_icon_size : ' medium-icon';
        $hcode_block_border_color = ( $hcode_block_border_color ) ? ' style="border-color:'.$hcode_block_border_color.' !important"' : '';
        $hcode_block_icon_color = ( $hcode_block_icon_color ) ? ' style="color:'.$hcode_block_icon_color.' !important"' : '';
        $hcode_block_title_color = ( $hcode_block_title_color ) ? ' style="color:'.$hcode_block_title_color.' !important"' : '';
        $hcode_block_subtitle_color = ( $hcode_block_subtitle_color ) ? ' style="color:'.$hcode_block_subtitle_color.' !important"' : '';
        $hcode_block_number_color = ( $hcode_block_number_color ) ? 'color:'.$hcode_block_number_color.' !important;' : '';
        $hcode_block_number_bg_color = ( $hcode_block_number_bg_color ) ? 'background-color:'.$hcode_block_number_bg_color.' !important;' : '';
        $hcode_block_number_border_color = ( $hcode_block_number_border_color ) ? 'border-color:'.$hcode_block_number_border_color.' !important;' : '';
        if( $hcode_block_number_bg_color || $hcode_block_number_color || $hcode_block_number_border_color ) {
            $number_color = ' style="'.$hcode_block_number_bg_color.$hcode_block_number_color.$hcode_block_number_border_color.'"';
        }

        $hcode_block_price_color = ( $hcode_block_price_color ) ? 'color:'.$hcode_block_price_color.' !important;' : '';
        $hcode_block_price_bg_color = ( $hcode_block_price_bg_color ) ? 'background-color:'.$hcode_block_price_bg_color.' !important;' : '';
        if( $hcode_block_price_bg_color || $hcode_block_price_color ) {
            $price_color = ' style="'.$hcode_block_price_bg_color.$hcode_block_price_color.'"';
        }
        
        $hcode_block_button_border_color = ( $hcode_block_button_border_color ) ? 'border-color:'.$hcode_block_button_border_color.' !important;' : '';
        $hcode_block_button_text_color = ( $hcode_block_button_text_color ) ? 'color:'.$hcode_block_button_text_color.' !important;' : '';
        $hcode_block_button_color = ( $hcode_block_button_color ) ? ' background:'.$hcode_block_button_color.';' : '';
        $hcode_block_button_arrow_color = ( $hcode_block_button_arrow_color ) ? ' style="color:'.$hcode_block_button_arrow_color.' !important"' : '';
        $hcode_block_bg_color = ( $hcode_block_bg_color ) ? ' style="background:'.$hcode_block_bg_color.';"' : '';

        if( $hcode_block_button_color || $hcode_block_button_text_color || $hcode_block_button_border_color ) {
            $button_style .= 'style="'.$hcode_block_button_color.$hcode_block_button_text_color.$hcode_block_button_border_color.'"';
        }

        /* Event date and time */
        $hcode_block_event_date = ( $hcode_block_event_date ) ? $hcode_block_event_date : '';
        $hcode_block_event_time = ( $hcode_block_event_time ) ? $hcode_block_event_time : '';
        if (function_exists('vc_parse_multi_attribute')) {
            // For Button
            $button_parse_args = vc_parse_multi_attribute($button_config);
            $button_link     = ( isset($button_parse_args['url']) ) ? $button_parse_args['url'] : '#';
            $button_title    = ( isset($button_parse_args['title']) ) ? $button_parse_args['title'] : '';
            $button_target   = ( isset($button_parse_args['target']) ) ? trim($button_parse_args['target']) : '_self';
            
            $hover_button_parse_args = vc_parse_multi_attribute($hover_button_config);
            $hover_button_link     = ( isset($hover_button_parse_args['url']) ) ? $hover_button_parse_args['url'] : '#';
            $hover_button_title    = ( isset($hover_button_parse_args['title']) ) ? $hover_button_parse_args['title'] : '';
            $hover_button_target   = ( isset($hover_button_parse_args['target']) ) ? trim($hover_button_parse_args['target']) : '_self'; 
        }

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';
        $hcode_hover_icon_image_srcset = !empty($hcode_hover_icon_image_srcset) ? $hcode_hover_icon_image_srcset : 'full';
        $hcode_hover_icon2_image_srcset = !empty($hcode_hover_icon2_image_srcset) ? $hcode_hover_icon2_image_srcset : 'full';

        /* New Font Awesome Icons */
        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_block_icon_list));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_block_icon_list = substr(strstr($hcode_block_icon_list," "), 1);

            if(array_key_exists($hcode_block_icon_list, $fa_icon_old)){
                $hcode_block_icon_list = $fa_icon_old[$hcode_block_icon_list];
            }else if(in_array($hcode_block_icon_list, $fa_icons_solid)){
                $hcode_block_icon_list = 'fas '.$hcode_block_icon_list;
            }else if(in_array($hcode_block_icon_list, $fa_icons_reg)){
                $hcode_block_icon_list = 'far '.$hcode_block_icon_list;
            }else if(in_array($hcode_block_icon_list, $fa_icons_brand)){
                $hcode_block_icon_list = 'fab '.$hcode_block_icon_list;
            }else{
                $hcode_block_icon_list = '';
            }
        }

        /* New Font Awesome Icons Hover 1*/
        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_block_hover_icon1));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_block_hover_icon1 = substr(strstr($hcode_block_hover_icon1," "), 1);

            if(array_key_exists($hcode_block_hover_icon1, $fa_icon_old)){
                $hcode_block_hover_icon1 = $fa_icon_old[$hcode_block_hover_icon1];
            }else if(in_array($hcode_block_hover_icon1, $fa_icons_solid)){
                $hcode_block_hover_icon1 = 'fas '.$hcode_block_hover_icon1;
            }else if(in_array($hcode_block_hover_icon1, $fa_icons_reg)){
                $hcode_block_hover_icon1 = 'far '.$hcode_block_hover_icon1;
            }else if(in_array($hcode_block_hover_icon1, $fa_icons_brand)){
                $hcode_block_hover_icon1 = 'fab '.$hcode_block_hover_icon1;
            }else{
                $hcode_block_hover_icon1 = '';
            }
        }

        /* New Font Awesome Icons Hover 2*/
        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_block_hover_icon2));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_block_hover_icon2 = substr(strstr($hcode_block_hover_icon2," "), 1);

            if(array_key_exists($hcode_block_hover_icon2, $fa_icon_old)){
                $hcode_block_hover_icon2 = $fa_icon_old[$hcode_block_hover_icon2];
            }else if(in_array($hcode_block_hover_icon2, $fa_icons_solid)){
                $hcode_block_hover_icon2 = 'fas '.$hcode_block_hover_icon2;
            }else if(in_array($hcode_block_hover_icon2, $fa_icons_reg)){
                $hcode_block_hover_icon2 = 'far '.$hcode_block_hover_icon2;
            }else if(in_array($hcode_block_hover_icon2, $fa_icons_brand)){
                $hcode_block_hover_icon2 = 'fab '.$hcode_block_hover_icon2;
            }else{
                $hcode_block_hover_icon2 = '';
            }
        }

        
        switch ($hcode_block_premade_style) {
            case 'block-1':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                if( $hcode_block_image || $button_title ) {
                    $output .= '<div class="position-relative">';
                        if( $hcode_block_image ) {
                            $output .= '<a href="'.$button_link.'" target="'.$button_target.'">';
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                            $output .= '</a>';
                        }
                        if( $button_title ) {
                            $output .= '<a class="highlight-button-dark btn btn-very-small view-map no-margin bg-black white-text'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                        }
                    $output .= '</div>';
                }
                if( $hcode_block_title ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<p class="text-med black-text letter-spacing-1 margin-ten no-margin-bottom text-uppercase font-weight-600 xs-margin-top-five'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $hcode_block_show_separator ) {
                    $output .= '<div class="wide-separator-line bg-mid-gray no-margin-lr"'.$separator.'></div>';
                }
                if( $hcode_block_telephone == 1 ) {
                    $output .= '<p class="black-text no-margin-bottom"><strong'.$hcode_telephone_prefix_color.'>'.$hcode_block_telephone_prefix.'</strong> <a href="tel:'.$hcode_block_telephone_number.'"'.$hcode_telephone_number_color.'>'.$hcode_block_telephone_number.'</a></p>';
                }
                if( $hcode_block_email ) {
                    $output .= '<p class="black-text"><strong'.$hcode_email_prefix_color.'>'.$hcode_block_email_prefix.'</strong> <a href="mailto:'.$hcode_block_email_url.'"'.$hcode_email_id_color.'>'.$hcode_block_email_url.'</a></p>';
                }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-2':
                $output .= '<div class="corporate-standards-text '.$class.'"'.$id.'>';
                    $output .= '<div class="img-border-small-fix border-gray" '.$hcode_block_border_color.'></div>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        $img_classes = 'icon-image '.$hcode_block_icon_size;
                        $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );
                    } elseif ( $hcode_block_icon_list ) {
                        $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.'"'.$hcode_block_icon_color.'></i>';
                    }
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                    if( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<h1 class="margin-ten no-margin-bottom'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h1>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $button_title ) {
                        $output .= '<a class="text-small highlight-link text-uppercase bg-black white-text'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.' <i class="fas fa-long-arrow-alt-right extra-small-icon white-text"></i></a>';
                    }
                $output .= '</div>';
            break;

            case 'block-3':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                    if( $hcode_block_subtitle ) {
                        $output .= '<span class="margin-five no-margin-top display-block letter-spacing-2'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                    }
                    if( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<h1 class="'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h1>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-4':
                $output .= '<div class="clearfix '.$class.'"'.$id.'>';
                    if( $hcode_block_image_position == 1 ) {
                        $content_position_class .= ' pull-right sm-pull-left';
                        $image_position_class .= ' pull-left sm-pull-right';
                    } else {
                        $content_position_class .= ' pull-left sm-pull-right';
                        $image_position_class .= ' pull-right sm-pull-left';
                    }

                    if( $hcode_block_image ){
                        $output .= '<div class="col-md-6 col-sm-12 col-xs-12 no-padding'.$image_position_class.'">';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        $output .= '</div>';
                    }
                    $output .= '<div class="col-md-6 col-sm-12 col-xs-12 no-padding '.$content_position_class.'">';
                        $output .= '<div class="model-details-text">';
                            if( $hcode_block_show_separator ) {
                                $output .= '<div class="separator-line bg-black no-margin-lr margin-ten"'.$separator.'></div>';
                                $output .= '<span class="margin-ten display-block clearfix xs-margin-0auto sm-display-none"></span>';
                            }
                            if( $hcode_block_title ) {
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                }
                                $output .= '<span class="text-uppercase font-weight-600 black-text letter-spacing-2'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '</a>';
                                }
                            }
                            if( $hcode_block_subtitle ) {
                                $output .= '<span class="text-uppercase text-small letter-spacing-2 margin-three display-block'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                            }
                            if( $content ) {
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            }
                            if( $button_title ) {
                                $output .= '<span class="margin-ten display-block clearfix xs-margin-0auto"></span>';
                                $output .= '<a class="highlight-button-dark btn btn-very-small no-margin'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'block-5':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                    if( $hcode_block_image ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<p class="text-uppercase letter-spacing-2 black-text font-weight-600 margin-ten no-margin-bottom'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-6':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                    if( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<h3 class="title-med no-padding-bottom letter-spacing-2'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</h3>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $button_title ) {
                        $output .= '<a class="highlight-button-dark btn btn-small button'.$button_one_responsive_class.'" '.$button_style.' href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                    }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-7':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                    if( $hcode_block_image ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<h5 class="margin-ten no-margin-bottom xs-margin-top-five'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</h5>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-8':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                    if( $hcode_block_subtitle ) {
                        $output .= '<span class="text-large display-block'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                    }
                    if( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<span class="title-large text-uppercase letter-spacing-1 font-weight-600 black-text'.$title_responsive_class.'" '.$style_att.'>'.$hcode_block_title.'</span>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_show_separator ) {
                        $output .= '<div class="separator-line-thick bg-fast-pink no-margin-lr"'.$separator.'></div>';
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $button_title ) {
                        $output .= '<a class="highlight-button-black-border btn btn-small no-margin-bottom inner-link sm-margin-bottom-ten" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                    }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-9':
                $output .= '<div class="special-gifts-box '.$class.'" '.$id.' '.$hcode_block_border_color.'>';
                    if( $hcode_block_subtitle ) {
                        $output .= '<span class="text-uppercase text-small letter-spacing-1'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                    }
                    if( $hcode_block_title ) {
                        $output .= '<span class="text-uppercase font-weight-600 letter-spacing-1 black-text display-block'.$title_responsive_class.'" '.$hcode_block_title_color.'>';
                            if( $hcode_block_title_url ) {
                                $output .= '<a href="'.$hcode_block_title_url.'">';
                            }
                                $output .= $hcode_block_title;
                                
                            if( $hcode_block_title_url ) {
                                $output .= '</a>';
                            }
                        $output .= '</span>';
                    }
                    if( $hcode_block_gifts_off ) {
                        $output .= '<span class="gifts-off bg-fast-pink white-text'.$dis_text_responsive_class.'"'.$discount_color.'>'.$hcode_block_gifts_off.'</span>';
                    }
                $output .= '</div>';
            break;

            case 'block-10':
                if( $hcode_block_title || $hcode_block_subtitle ) {
                    $output .= '<div class="text-large '.$class.'" '.$id.'>';
                        if( $hcode_block_title ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<h6 class="no-margin-top '.$hcode_animation_style.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h6>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_subtitle ) {
                            $output .= '<p class="no-margin-bottom '.$hcode_animation_style.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</p>';
                        }
                    $output .= '</div>';
                }
            break;

            case 'block-11':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if( $hcode_block_title || $hcode_block_subtitle ) {
                    $output .= '<div class="about-year text-uppercase white-text">';
                    if( $hcode_block_title ) {
                    $output .= '<span class="clearfix'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                    }
                    if( $hcode_block_subtitle ) {
                        $output .= '<div class="about-year-text'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</div>';
                    }
                    $output .= '</div>';
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }

                if( $id || $class ) {
                    $output .= '</div>';
                }

            break;

            case 'block-12':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if ( $hcode_block_title ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<p class="title-large white-text text-uppercase letter-spacing-2'.$title_responsive_class.'" '.$hcode_block_title_color.'><strong>'.$hcode_block_title.'</strong></p>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }

                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-13':
                $output .= '<div class="testimonial-style2'.$class.'"'.$id.'>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        $img_classes = 'icon-image '.$hcode_block_icon_size;
                        $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );
                    } elseif ( $hcode_block_icon_list ) {
                        $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.' margin-five no-margin-top"'.$hcode_block_icon_color.'></i>';
                    }
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                    if ( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if ( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<span class="name light-gray-text2'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                $output .= '</div>';
            break;

            case 'block-14': 
                if ( $hcode_block_title ) {
                    $output .= '<div class="team-plus text-uppercase'.$class.$title_responsive_class.'"'.$id.' '.$hcode_block_title_color.'><span class="clearfix">'.$hcode_block_title.'</span></div>';
                }
            break;

            case 'block-15':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if ( $hcode_block_title ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<p class="title-large text-uppercase letter-spacing-1 black-text font-weight-600'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if ( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;
            
            case 'block-16':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if ( $hcode_block_title ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<h1 class="white-text sm-small-text'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</h1>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if ( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;
            
            case 'block-17':
                if ( $hcode_block_title ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<h1 class="title-med text-uppercase letter-spacing-1 white-text font-weight-600 '.$class.$title_responsive_class.'" '.$id.' '.$hcode_block_title_color.'>'.$hcode_block_title.'</h1>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if ( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
            break;
            
            case 'block-18':
                $output .= '<div class="client-main position-relative overflow-hidden '.$class.'" '.$id.'>';
                    if( $hcode_block_image ) {
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                    }
                    if( $content || $button_title ) {
                        $output .= '<div class="client-text position-absolute display-block bg-white text-center">';
                        if( $content ) {
                            $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        }
                        if( $button_title ) {
                            $output .= '<a class="highlight-button-dark btn btn-very-small margin-three no-margin'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                        }
                        $output .= '</div>';
                    }
                $output .= '</div>';
            break;

            case 'block-19':
                $output .= '<div class="spa-treatments xs-no-float '.$class.'" '.$id.'>';
                    if( $hcode_image_position == 1 ) {
                        if( $hcode_block_image ) {
                            if( $hcode_block_title || $content ) {
                                $output .='<div class="col-lg-6 col-md-12 col-xs-12 no-padding md-display-none pull-left text-center">';
                            }else{
                                $output .='<div class="col-lg-12 col-md-12 col-xs-12 no-padding md-display-none pull-left text-center">';
                            }
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                                $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                            $output .='</div>';
                        }
                    }
                    if( $hcode_block_title || $content ) {
                        if( $hcode_block_image ) {
                            $output .= '<div class="right-content col-lg-6 col-md-12 col-xs-12">';
                        }else{
                            $output .= '<div class="right-content col-lg-12 col-md-12 col-xs-12">';
                        }
                        if( $hcode_block_title ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<span class="title-large text-uppercase white-text font-weight-600 letter-spacing-1'.$title_responsive_class.'" '.$hcode_block_title_color.'>';
                                $output .= $hcode_block_title;
                            $output .= '</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        $output .= '</div>';
                    }
                    if( $hcode_image_position == 0 ) {
                        if( $hcode_block_image ) {
                            if( $hcode_block_title || $content ) {
                                $output .='<div class="col-lg-6 col-md-12 col-xs-12 no-padding md-display-none pull-right text-center">';
                            }else{
                                $output .='<div class="col-lg-12 col-md-12 col-xs-12 no-padding md-display-none pull-right text-center">';
                            }
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                }
                                $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '</a>';
                                }
                            $output .='</div>';
                        }
                    }
                $output .= '</div>';
                
            break;
            
            case 'block-20':
                $output .= '<div class="services-box '.$class.'" '.$id.'>';
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $img_classes = 'icon-image '.$hcode_block_icon_size;
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );                  
                } elseif ( $hcode_block_icon_list || $hcode_block_icon_color ) {
                    $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.'"'.$hcode_block_icon_color.'></i>';
                }
                if( $hcode_block_title || $hcode_block_title_color ) {
                    $output .= '<h6 class="margin-five font-weight-600 letter-spacing-2'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h6>';
                }
                if( $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                    $output .= '<p class="'.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</p>';
                }
                if( $hcode_block_number || $hcode_block_hover_title || $hover_block_color ) {
                    if( !empty( $hcode_block_hover_url ) ) {
                        $target_blank = $hcode_block_hover_target_blank == 1 ? ' target="_BLANK" ' : '';
                        $output .= '<a '.$target_blank.' href="'.esc_url( $hcode_block_hover_url ).'">';
                    }
                        $output .= '<figure class="text-uppercase bg-black"'.$hover_block_color.'>';
                        if( $hcode_block_number ) {
                            $output .= '<span class="'.$number_responsive_class.'"'.$number_color.'>'.$hcode_block_number.'</span>';
                        }
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.' class="service-box-gray-text">';
                        }
                        $output .= '<div class="'.$hover_title_responsive_class.'">'.$hcode_block_hover_title.'</div>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                        $output .= '</figure>';
                    if( !empty( $hcode_block_hover_url ) ) {
                        $output .= '</a>';
                    }
                }
                $output .= '</div>';
            break;
            
            case 'block-21':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if( $hcode_block_number ) {
                    $output .= '<span class="parallax-number alt-font white-text letter-spacing-2 bg-black margin-five no-margin-top'.$number_responsive_class.'"'.$number_color.'>'.$hcode_block_number.'</span>';
                }
                if( $hcode_block_title || $hcode_block_title_color ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<h6 class="margin-two font-weight-600 letter-spacing-2 no-margin-top'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h6>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;
            
            case 'block-22':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                    if( $hcode_block_image ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                        $output .= '<br><br>';
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<p class="text-large'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_show_separator ) {
                        $output .= '<div class="wide-separator-line no-margin-lr"'.$separator.'></div>';
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;
            
            case 'block-23':
                $output .= '<div class="about-onepage '.$class.' '.$hcode_token_class.'"'.$id.'>';
                    $output .= '<div class="col-md-3 col-sm-12 border-right about-onepage-number position-relative overflow-hidden sm-no-border-right xs-text-center">';
                        $output .= '<span class="about-onepage-number-default fast-yellow-text font-weight-100 position-absolute xs-position-inherit'.$number_responsive_class.'"'.$number_color.'>'.$hcode_block_number.'</span>';
                        $output .= '<span class="about-onepage-number-hover gray-text font-weight-100 position-absolute xs-display-none">'.$hcode_block_number.'</span>';
                    $output .= '</div>';
                if( $hcode_block_title || $content ) {
                    $output .= '<div class="col-md-9 col-sm-12 about-onepage-text">';
                        $output .= '<div class="about-onepage-text-sub sm-no-margin-left xs-text-center">';
                            if( $hcode_block_title ) {
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                }
                                $output .= '<span class="black-text'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '</a>';
                                }
                            }
                            if( $content ) {
                                $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                }
                $output .= '</div>';
            break;
            
            case 'block-24':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        $img_classes = 'icon-image '.$hcode_block_icon_size;
                        $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );
                    } elseif ( $hcode_block_icon_list || $hcode_block_icon_color ) {
                        $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.' margin-ten-bottom"'.$hcode_block_icon_color.'></i>';
                    }
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<span class="parallax-title alt-font'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $hcode_block_show_separator == 1 ) {
                        $output .= '<div class="separator-line bg-white"'.$separator.'></div>';
                    }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-25':
                $output .= '<div class="restaurant-features-main bg-white '.$class.'" '.$id.' '.$hcode_block_border_color.'>';
                    $output .= '<div class="restaurant-features text-center">';
                    if( $hcode_block_image ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_title ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<span class="text-uppercase font-weight-600 letter-spacing-1 black-text margin-ten display-block no-margin-bottom'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_subtitle ) {
                        $output .= '<span class="text-small letter-spacing-1 text-uppercase'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                    }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'block-26':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if( $hcode_block_image ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if( $hcode_block_title ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<h1 class="margin-ten no-margin-bottom'.$title_responsive_class.'" '.$style_att.'>'.$hcode_block_title.'</h1>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if( $hcode_block_subtitle ) {
                    $output .='<span class="text-small text-uppercase letter-spacing-3'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-27':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if( $hcode_block_image ) {
                    $output .='<div class="cover-background'.$srcset_classes_bg.'" style="background-image:url('.$thumb[0].');"'.$srcset_data_bg.'>';
                }

                if( $hcode_block_title || $hcode_block_subtitle ) {
                    $output .='<div class="food-services-inner '.$hcode_token_class.'">';
                        $output .='<div class="food-services-border text-center" '.$hcode_block_border_color.'>';
                            if( $hcode_block_title ) {
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                }
                                $output .='<span class="text-extra-large text-uppercase letter-spacing-2 white-text display-block font-weight-600 margin-one no-margin-top'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '</a>';
                                }
                            }
                            if( $hcode_block_subtitle ) {
                                $output .='<span class="food-time text-small white-text display-block text-uppercase letter-spacing-2'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                            }
                        $output .='</div>';
                    $output .='</div>';
                }
                if( $hcode_block_image ) {
                    $output .='</div>';
                }

                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;              
        
            case 'block-28':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if( $hcode_block_number ) {
                    $output .= '<span class="services-number-landing font-weight-100 gray-text bg-light-yellow'.$number_responsive_class.'"'.$number_color.'>'.$hcode_block_number.'</span>';
                }
                if( $hcode_block_title || $hcode_block_title_color ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .= '<p class="text-med font-weight-600 margin-five no-margin-bottom'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;
            
            case 'block-29':
                $output .= '<div class="about-couple '.$class.'" '.$id.' '.$hcode_block_border_color.'>';
                    $output .= '<div class="about-couple-sub bg-white">';
                        if( $hcode_block_image ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<div class="margin-five no-margin-top">';
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset, '', array( 'class' => 'white-round-border no-border' ) );
                            $output .= '</div>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_title || $hcode_block_title_color ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<span class="title-small text-uppercase letter-spacing-3 font-weight-600 display-block'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                            $output .= '<span class="text-uppercase margin-one display-block letter-spacing-2'.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                        }
                        if( $hcode_block_show_separator == 1 ) {
                            $output .= '<div class="wide-separator-line bg-mid-gray margin-five no-margin-lr"'.$separator.'></div>';
                        }
                        if( $content ) {
                            $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        }
                        if( $hcode_block_show_separator == 1 ) {
                            $output .= '<div class="wide-separator-line bg-mid-gray margin-five no-margin-lr"'.$separator.'></div>';
                        }
                        if( $hcode_block_facebook ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_facebook_url ).'" class="black-text-link"><i class="fab fa-facebook-f extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_twitter ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_twitter_url ).'" class="black-text-link"><i class="fab fa-twitter extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_googleplus ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_googleplus_url ).'" class="black-text-link"><i class="fab fa-google-plus-g extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_dribbble ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_dribbble_url ).'" class="black-text-link"><i class="fab fa-dribbble extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_youtube ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_youtube_url ).'" class="black-text-link"><i class="fab fa-youtube extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_linkedin ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_linkedin_url ).'" class="black-text-link"><i class="fab fa-linkedin-in extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_instagram ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_instagram_url ).'" class="black-text-link"><i class="fab fa-instagram extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_pinterest ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_pinterest_url ).'" class="black-text-link"><i class="fab fa-pinterest-p extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_github ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_github_url ).'" class="black-text-link"><i class="fab fa-github extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_xing ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_xing_url ).'" class="black-text-link"><i class="fab fa-xing extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_vk ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_vk_url ).'" class="black-text-link"><i class="fab fa-vk extra-small-icon"></i></a>';
                        }
                        if( $hcode_block_website ) {
                            $output .= '<a target="_blank" href="'.esc_url( $hcode_block_website_url ).'" class="black-text-link"><i class="fas fa-external-link-alt extra-small-icon"></i></a>';
                        }

                        if( $hcode_block_email_address ) {
                            if( $hcode_block_email_address_url == '#' ) {
                                $output .= '<a href="'.$hcode_block_email_address_url.'" class="black-text-link"><i class="fas fa-envelope extra-small-icon"></i></a>';
                            } else {
                                $output .= '<a href="mailto:'.$hcode_block_email_address_url.'" class="black-text-link"><i class="fas fa-envelope extra-small-icon"></i></a>';
                            }
                        }

                        if( !empty( $hcode_block_custom_link ) ) {
                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $hcode_block_custom_link ) ) ) );
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'block-30':
                $output .= '<div class="event-box '.$class.'" '.$id.' '.$hcode_block_border_color.'>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        $img_classes = 'icon-image '.$hcode_block_icon_size;
                        $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );
                    } elseif ( $hcode_block_icon_list || $hcode_block_icon_color ) {
                        $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.' margin-five"'.$hcode_block_icon_color.'></i>';
                    }
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<span class="text-med text-uppercase letter-spacing-2 font-weight-600 display-block'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_show_separator == 1 ) {
                        $output .= '<div class="wide-separator-line bg-mid-gray margin-ten no-margin-lr"'.$separator.'></div>';
                    }
                    if( $hcode_block_event_date ) {
                        $output .= '<span class="text-uppercase letter-spacing-2 display-block black-text">'.$hcode_block_event_date.'</span>';
                    }
                    if( $hcode_block_event_time ) {
                        $output .= '<span class="event-time">'.$hcode_block_event_time.'</span>';
                    }
                    if( $hcode_block_show_separator == 1 ) {
                        $output .= '<div class="wide-separator-line bg-mid-gray margin-ten no-margin-lr"'.$separator.'></div>';
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $button_title ) {
                        $output .= '<a class="highlight-button-dark btn btn-small button no-margin-right inner-link'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                    }
                $output .= '</div>';
            break;

            case 'block-31':
                if ( ( $custom_icon == 1 && !empty( $custom_icon_image ) ) || $hcode_block_icon_list || $hcode_block_icon_size || $hcode_block_icon_color ) {
                    $output .= '<div class="award-box clearfix bg-white'.$class.'"'.$id.' '.$hcode_block_border_color.'>';
                        if ( ( $custom_icon == 1 && !empty( $custom_icon_image ) ) || $hcode_block_icon_list || $hcode_block_icon_size || $hcode_block_icon_color ) {
                            $output .= '<div class="col-md-4 col-sm-12 text-center">';
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                }
                                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                    $img_classes = 'icon-image '.$hcode_block_icon_size;
                                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );
                                } elseif ( $hcode_block_icon_list || $hcode_block_icon_color ) {
                                    $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.'"'.$hcode_block_icon_color.'></i>';
                                }
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '</a>';
                                }
                            $output .= '</div>';
                        }
                        if( $hcode_block_title || $hcode_block_title_color ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<div class="col-md-8 col-sm-12 text-left position-relative text-uppercase letter-spacing-1 top-6 sm-text-center sm-margin-top-five'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</div>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                    $output .= '</div>';
                }

            break;

            case 'block-32':
                $output .= '<div class="grid-border hcode-min-height-0px'.$class.'"'.$id.'>';
                    $output .= '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 no-padding grid-border-box bg-gray text-center '.$hcode_token_class.'">';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            $img_classes = 'icon-image '.$hcode_block_icon_size;
                            $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );
                        } elseif ( $hcode_block_icon_list || $hcode_block_icon_size ) {
                            $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.'"'.$hcode_block_icon_color_new.'></i>';
                        }
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                        if( $hcode_block_title || $hcode_block_title_color ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<span class="hcode-special-block text-uppercase letter-spacing-2 black-text font-weight-600 display-block margin-ten no-margin-bottom xs-margin-top-five'.$title_responsive_class.'"'.$hcode_block_title_color_new.'>'.$hcode_block_title.'</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;
           
            case 'block-33':
                $output .= '<div class="client-logo-outer'.$hcode_border_class.$class.'" '.$id.' '.$hcode_block_border_color.'>';
                    $output .= '<div class="client-logo-inner">';
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'block-34':
                $output .='<div class="travel-adventure overflow-hidden position-relative '.$class.$hcode_default_cursor.'" '.$id.'>';
                    if( $hcode_block_image ) {
                        $output .= '<a href="'.$hcode_block_title_url.'">';
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        $output .= '</a>';
                    }
                    if( $hcode_block_title ) {
                        $output .='<figure class="text-large letter-spacing-3'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</figure>';
                    }
                $output .='</div>';
            break;

            case 'block-35':
                $output .='<div class="special-offers '.$class.'" '.$id.'>';
                    $output .='<div class="img-border-full border-color-black" '.$hcode_block_border_color.'></div>';
                    $output .='<div class="special-offers-sub">';
                        if( $hcode_block_image ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset, '', array( 'class' => 'margin-ten no-margin-top' ) );
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_title ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .='<span class="title-small text-uppercase font-weight-600 letter-spacing-3 display-block margin-ten no-margin-top'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                    $output .='</div>';
                $output .='</div>';
            break;

            case 'block-36':
                if( $hcode_block_image ) {
                    $output .='<a href="'.$hcode_block_title_url.'">';
                    $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                    $output .= '</a>';
                }
                $output .='<div class="white-box bg-white '.$class.'" '.$id.'>';
                    if( $hcode_block_title ) {
                        $output .='<span class="destinations-name text-uppercase font-weight-600 letter-spacing-3 display-block"><a href="'.$hcode_block_title_url.'" class="'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</a></span>';
                    }
                    if( $hcode_block_subtitle ) {
                        $output .='<span class="destinations-place text-uppercase font-weight-400 letter-spacing-2 display-block'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                    }
                    if( $hcode_stars ) {
                        $output .='<div class="no-margin-bottom">';
                        for( $i=1; $i <= 5; $i++ ) {
                            if($i <= $hcode_stars) {
                                $output .='<i class="far fa-star " '.$hcode_block_icon_color.'></i>';
                            } else {
                                $output .='<i class="far fa-star "></i>';
                            }
                        }
                        $output .='</div>';
                    }
                $output .='</div>  ';
            break;

            case 'block-37':
                if( $hcode_block_image ) {
                    $output .='<div class="cover-background best-hotels-img'.$srcset_classes_bg.'" style="background-image:url('.$thumb[0].');"'.$srcset_data_bg.'>';
                }
                    $output .='<div class="col-md-6 col-sm-9 text-center best-hotels-text bg-white pull-right '.$class.'" '.$id.'>';
                        $output .='<div>';
                            for( $i=1; $i <= 5; $i++ ) {
                                if( $i <= $hcode_stars ) {
                                    $output .='<i class="far fa-star small-icon" '.$hcode_block_icon_color.'></i>';
                                } else {
                                    $output .='<i class="far fa-star small-icon"></i>';
                                }
                            }
                        $output .='</div>';
                        if( $hcode_block_title ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .='<span class="text-uppercase font-weight-600 display-block margin-ten no-margin-bottom letter-spacing-2'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_subtitle ) {
                            $output .='<span class="text-uppercase letter-spacing-2 margin-ten display-block no-margin-top'.$subtitle_responsive_class.'" '.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                        }
                        if( $button_title ) {
                            $output .='<a href="'.$button_link.'" class="highlight-button-dark btn btn-small button no-margin-lr'.$button_one_responsive_class.'" target="'.$button_target.'">'.$button_title.'</a>';
                        }
                    $output .='</div>';
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                if( $hcode_block_image ) {
                    $output .='</div>';
                }
            break;

            case 'block-38':
                if( $id || $class ) {
                    $output .= '<div class="'.$class.'"'.$id.'>';
                }

                if( $hcode_block_title || $hcode_block_title_color ) {
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                    }
                    $output .='<span class="title-small text-uppercase font-weight-700 letter-spacing-1 margin-seven-top margin-five-bottom display-block'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                        $output .= '</a>';
                    }
                }
                if( $content ) {
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                }
                if( $button_title ) {
                    $output .='<a href="'.$button_link.'" class="highlight-link text-uppercase white-text'.$button_one_responsive_class.'" '.$button_style.' target="'.$button_target.'">'.$button_title.' <i class="fas fa-long-arrow-alt-right extra-small-icon white-text" '.$hcode_block_button_arrow_color.'></i></a>';
                }
                if( $id || $class ) {
                    $output .= '</div>';
                }
            break;

            case 'block-39':
                $output .= '<div class="fashion-person fashion-right'.$class.'"'.$id.'>';
                    if( $hcode_block_image ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    $output .= '<div class="right-content"'.$hcode_block_bg_color.'>';
                        if( $hcode_block_title || $hcode_block_title_color ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<span class="title-large text-uppercase letter-spacing-2 display-block'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                            $output .= '<span class="owl-subtitle sm-margin-top-five sm-margin-bottom-five'.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                        }
                        if( $hcode_block_show_separator ) {
                            $output .= '<div class="separator-line bg-white"'.$separator.'></div>';
                        }
                        if( $content ) {
                            $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        }
                        if( $button_title ) {
                            $output .= '<a class="btn btn-small-white-background margin-seven margin-four-bottom'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
                break;

                case 'block-40':
                    if( $id || $class ) {
                        $output .= '<div class="'.$class.'"'.$id.'>';
                    }

                    if( $hcode_block_image ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<div class="icon-bg">';
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        $output .= '</div>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .='<span class="display-block margin-ten work-process-title no-margin-bottom gray-text'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $hcode_block_show_separator == 1 ) {
                        $output .='<div class="thin-separator-line bg-dark-gray"'.$separator.'></div>';
                    }
                    if( $id || $class ) {
                        $output .= '</div>';
                    }
                break;

                case 'block-41':
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        $output .= '<div class="slider-typography container position-relative '.$class.'" '.$id.'>';
                            $output .= '<div class="slider-text-middle-main">';
                                $output .= '<div class="slider-text-middle text-center slider-text-middle1 center-col wow fadeIn">';
                                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                    }
                                    $output .= '<span class="fashion-subtitle text-uppercase font-weight-700 border-color-white text-center'.$title_responsive_class.' '.$hcode_token_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                        $output .= '</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    }
                break;

                case 'block-42':
                $output .= '<div class="person-grid '.$class.'" '.$id.'>';
                    $output .= '<div class="grid bg-black">';
                        if( $hcode_block_image ) {
                            $output .= '<div class="gallery-img">';
                                $output .= '<a href="'.$button_link.'" class="inner-link">';
                                $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                                $output .= '</a>';
                            $output .= '</div>';
                        }
                        $output .= '<figure>';
                            $output .= '<figcaption class="md-bottom-10">';
                                if( $hcode_block_title || $hcode_block_title_color ) {
                                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                        $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                    }
                                    $output .= '<span class="owl-title white-text position-relative margin-five'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                                    if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                        $output .= '</a>';
                                    }
                                }
                                if( $content ) {
                                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                }
                                if( $button_title ) {
                                    $output .= '<a class="btn-small-white btn btn-medium position-relative no-margin-right margin-five inner-link'.$button_one_responsive_class.'" href="'.$button_link.'" target='.$button_target.'>'.$button_title.'</a>';
                                }
                                $output .= '<span class="margin-ten display-block"></span>';
                            $output .= '</figcaption>';
                        $output .= '</figure>';
                    $output .= '</div>';
                $output .= '</div>';
                break;

                case 'block-43':
                    $output .= '<div class="position-relative '.$class.'" '.$id.'>';
                        if( $hcode_block_image ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_price ) {
                            $output .= '<span class="special-dishes-price bg-white red-text alt-font'.$price_responsive_class.'"'.$price_color.'>'.$hcode_block_price.'</span>';
                        }
                    $output .= '</div>';
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<p class="text-uppercase letter-spacing-2 font-weight-600 margin-ten no-margin-bottom'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $hcode_block_show_separator == 1 ) {
                        $output .= '<div class="thin-separator-line bg-dark-gray no-margin-lr"'.$separator.'></div>';
                    }
                break;

                case 'block-44':
                    $output .= '<div class="no-padding-bottom reasons '.$class.'"'.$id.'>';
                        $output .= '<span class="slider-title-big2"'.$hcode_block_title_color.'>';
                        $output .= '<div class="'.$number_responsive_class.'"'.$number_color.'>'.$hcode_block_number.'</div>';
                        if( $hcode_block_title ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .='<span class="'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        $output .= '</span>';
                        if( $content ) {
                            $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        }
                        if( $hcode_block_image ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                    $output .= '</div>';
                    break;
                    
                case 'block-45':
                    $output .= '<div class="text-block '.$class.'" '.$id.'>';
                        $output .= '<div class="text-block-inner bg-white">';
                            if( $hcode_block_title || $hcode_block_title_color ) {
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                }
                                $output .= '<p class="text-large text-uppercase no-margin-bottom'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '</a>';
                                }
                            }
                            if( $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                                $output .= '<p class="title-small text-uppercase font-weight-600 letter-spacing-1'.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</p>';
                            }
                            if( $button_title ) {
                                $output .= '<a class="highlight-button btn btn-small no-margin'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                    break;

                case 'block-46':
                    $output .= '<div class="slider-typography hcode-remove-frontend-editor-position-style1 text-left '.$class.'" '.$id.'>';
                        $output .= '<div class="slider-text-middle-main">';
                            $output .= '<div class="col-md-6 col-sm-8 col-xs-10 contant-box position-absolute no-padding'.$hcode_block_position_right.'"'.$hcode_block_bg_color.'>';
                                $output .= '<div class="position-relative overflow-hidden padding-ten no-padding-bottom">';
                                    if( $hcode_block_title || $hcode_block_title_color ) {
                                        $output .= '<h5 class="text-big alt-font position-absolute"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h5>';
                                    }
                                    if( $hcode_block_show_separator == 1 ) {
                                        $output .= '<div class="separator-line bg-white margin-bottom-eleven no-margin-top no-margin-lr xs-margin-bottom-ten"'.$separator.'></div>';
                                    }
                                    if( $content ) {
                                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                    }
                                    if( $hcode_block_title || $hcode_block_title_color ) {
                                        $output .= '<h5 class="text-big-title alt-font word-wrap-normal'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h5>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                break;
                
                case 'block-47':
                    if( $id || $class ) {
                        $output .= '<div class="'.$class.'"'.$id.'>';
                    }

                    if( $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                        $output .= '<p class="text-large no-margin-bottom'.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</p>';
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= '<h1 class="margin-five no-margin-top'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</h1>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $id || $class ) {
                        $output .= '</div>';
                    }
                break;

                case 'block-48':
                    if( $id || $class ) {
                        $output .= '<div class="'.$class.'"'.$id.'>';
                    }
                    if( $hcode_block_number ) {
                        $output .='<span class="services-number font-weight-100 gray-text'.$number_responsive_class.'"'.$number_color.'>'.$hcode_block_number.'</span>';
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .='<p class="text-uppercase letter-spacing-2 font-weight-600 margin-five no-margin-bottom'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $id || $class ) {
                        $output .= '</div>';
                    }
                break;
                    
                case 'block-49':
                    $output .= '<div class="popular-destinations position-relative '.$class.'" '.$id.'>';
                        if( $hcode_block_image ) {
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        }
                        if( $hcode_block_title || $hcode_block_subtitle || $button_title ) {
                            $output .= '<div class="popular-destinations-text">';
                                if( $hcode_block_title || $hcode_block_title_color ) {
                                    $output .= '<span class="destinations-name text-med text-uppercase font-weight-600 letter-spacing-3 display-block'.$title_responsive_class.'"'.$hcode_block_title_color.'>'.$hcode_block_title.'</span>';
                                }
                                if( $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                                    $output .= '<span class="destinations-place text-uppercase font-weight-400 letter-spacing-3 display-block'.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                                }
                                if( $button_title ) {
                                    $output .= '<a class="highlight-button btn btn-small no-margin-right no-margin-bottom'.$button_one_responsive_class.'" href="'.$button_link.'" target="'.$button_target.'">'.$button_title.'</a>';
                                }
                            $output .= '</div>';
                        }
                        $output .= '<div class="popular-destinations-highlight bg-white">';
                            if( $hcode_block_hover_icon2 || $hcode_block_hover_title2 || $hcode_block_hover_subtitle2 ) {
                                $output .= '<div class="popular-destinations-highlight-sub">';
                                    if( $hcode_block_hover_custom_icon == 1 && !empty( $hcode_block_hover_custom_icon_image ) ) {
                                        $output .= wp_get_attachment_image( $hcode_block_hover_custom_icon_image, $hcode_hover_icon_image_srcset, '', array( 'class' => 'icon-image medium-icon' ) );
                                    } elseif( $hcode_block_hover_icon1 ) {
                                        $output .= '<i class="'.$hcode_block_hover_icon1.' medium-icon"'.$hcode_block_hover_icon_color.'></i>';
                                    }
                                    if( $hcode_block_hover_title1 ) {
                                        $output .= '<span class="display-block text-med font-weight-600 black-text text-uppercase letter-spacing-2'.$hover_title_responsive_class.'"'.$hover_block_color.'>'.$hcode_block_hover_title1.'</span>';
                                    }
                                    if( $hcode_block_hover_subtitle1 ) {
                                        $output .= '<span class="text-uppercase font-weight-400 letter-spacing-2 black-text'.$hover_subtitle_responsive_class.'"'.$hcode_block_hover_subtitle_color.'>'.$hcode_block_hover_subtitle1.'</span>';
                                    }
                                $output .= '</div>';
                            }
                            if( $hcode_block_hover_icon2 || $hcode_block_hover_title2 || $hcode_block_hover_subtitle2 || ( $hcode_block_hover_custom_icon2 == 1 && !empty( $hcode_block_hover_custom_icon2_image ) ) ) {
                                $output .= '<div class="popular-destinations-highlight-sub">';
                                    if( $hcode_block_hover_custom_icon2 == 1 && !empty( $hcode_block_hover_custom_icon2_image ) ) {
                                        $output .= wp_get_attachment_image( $hcode_block_hover_custom_icon2_image, $hcode_hover_icon2_image_srcset, '', array( 'class' => 'icon-image medium-icon' ) );
                                    } elseif( $hcode_block_hover_icon2 ) {
                                        $output .= '<i class="'.$hcode_block_hover_icon2.' medium-icon"'.$hcode_block_hover_icon_color.'></i>';
                                    }
                                    if( $hcode_block_hover_title2 ) {
                                        $output .= '<span class="display-block text-med font-weight-600 black-text text-uppercase letter-spacing-2'.$hover_title_responsive_class.'"'.$hover_block_color.'>'.$hcode_block_hover_title2.'</span>';
                                    }
                                    if( $hcode_block_hover_subtitle2 ) {
                                        $output .= '<span class="text-uppercase font-weight-400 letter-spacing-2 black-text'.$hover_subtitle_responsive_class.'"'.$hcode_block_hover_subtitle_color.'>'.$hcode_block_hover_subtitle2.'</span>';
                                    }
                                $output .= '</div>';
                            }
                            if( $hcode_block_hover_content || $hover_button_title ) {
                                $output .= '<div class="popular-destinations-highlight-sub">';
                                    if( $hcode_block_hover_content ) {
                                        $output .= '<p class="no-margin-bottom">'.$hcode_block_hover_content.'</p>';
                                    }
                                    if( $hover_button_title ) {
                                        $output .= '<a class="highlight-button-dark btn btn-small no-margin-right no-margin-bottom inner-link'.$button_two_responsive_class.'" href="'.$hover_button_link.'" target="'.$hover_button_target.'">'.$hover_button_title.'</a>';
                                    }
                                $output .= '</div>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                    break;
                    
                case 'block-50':
                    $output .= '<div class="agency-enjoy-right'.$class.'"'.$id.'>';
                        if( $hcode_block_image ) {
                            $output .= '<div class="center-img sm-display-none">';
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                            $output .= '</div>';
                        }
                        if( $hcode_block_title || $hcode_block_title_color || $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                            $output .= '<div class="title-top sm-no-margin-left yellow-text alt-font'.$title_responsive_class.'"'.$hcode_block_title_color.'>';
                            if( $hcode_block_title || $hcode_block_title_color ) {
                                $output .= $hcode_block_title;
                            }
                            if( $hcode_block_subtitle || $hcode_block_subtitle_color ) {
                                $output .= '<span class="white-text'.$subtitle_responsive_class.'"'.$hcode_block_subtitle_color.'>'.$hcode_block_subtitle.'</span>';
                            }
                            $output .= '</div>';
                        }
                        if( $hcode_block_show_separator ) {
                            $output .= '<div class="separator-line bg-yellow no-margin-lr sm-margin-bottom-five"'.$separator.'></div>';
                        }
                        if( $hcode_block_hover_destinations_small_title ) {
                            $output .= '<h3 class="title-small white-text no-padding-bottom margin-five-bottom font-weight-400 letter-spacing-3 xs-margin-bottom-ten'.$small_title_responsive_class.'">'.$hcode_block_hover_destinations_small_title.'</h3>';
                        }
                        $output .= '<div class="row">';
                            $output .= '<div class="col-md-4 col-sm-4 text-center xs-margin-ten-bottom">';
                                if( $hcode_block_hover_destinations_image1 ) {
                                    $output .= '<a href="'.$hcode_block_hover_destinations_url1.'">';
                                    $output .= wp_get_attachment_image( $hcode_block_hover_destinations_image1, $hcode_destinations_image_srcset );
                                    $output .= '</a>';
                                }
                                $output .= '<div class="white-box bg-white">';
                                    if( $hcode_block_hover_destinations_title1 ) {
                                        $output .= '<span class="destinations-name text-uppercase font-weight-600 letter-spacing-1 black-text display-block'.$destinations_title_responsive_class.'"><a href="'.$hcode_block_hover_destinations_url1.'">'.$hcode_block_hover_destinations_title1.'</a></span>';
                                    }
                                    if( $hcode_block_hover_destinations_subtitle1 ) {
                                        $output .= '<span class="destinations-place text-uppercase font-weight-400 letter-spacing-1 display-block'.$destinations_subtitle_responsive_class.'">'.$hcode_block_hover_destinations_subtitle1.'</span>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<div class="col-md-4 col-sm-4 text-center xs-margin-ten-bottom">';
                                if( $hcode_block_hover_destinations_image2 ) {
                                    $output .= '<a href="'.$hcode_block_hover_destinations_url2.'">';
                                    $output .= wp_get_attachment_image( $hcode_block_hover_destinations_image2, $hcode_destinations_image2_srcset );
                                    $output .= '</a>';
                                }
                                $output .= '<div class="white-box bg-white">';
                                    if( $hcode_block_hover_destinations_title2 ) {
                                        $output .= '<span class="destinations-name text-uppercase font-weight-600 letter-spacing-1 black-text display-block'.$destinations_title_responsive_class.'"><a href="'.$hcode_block_hover_destinations_url2.'">'.$hcode_block_hover_destinations_title2.'</a></span>';
                                    }
                                    if( $hcode_block_hover_destinations_subtitle2 ) {
                                        $output .= '<span class="destinations-place text-uppercase font-weight-400 letter-spacing-1 display-block'.$destinations_subtitle_responsive_class.'">'.$hcode_block_hover_destinations_subtitle2.'</span>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<div class="col-md-4 col-sm-4 text-center">';
                                if( $hcode_block_hover_destinations_image3 ) {
                                    $output .= '<a href="'.$hcode_block_hover_destinations_url3.'">';
                                    $output .= wp_get_attachment_image( $hcode_block_hover_destinations_image3, $hcode_destinations_image3_srcset );
                                    $output .= '</a>';
                                }
                                $output .= '<div class="white-box bg-white">';
                                    if( $hcode_block_hover_destinations_title3 ) {
                                        $output .= '<span class="destinations-name text-uppercase font-weight-600 letter-spacing-1 black-text display-block'.$destinations_title_responsive_class.'"><a href="'.$hcode_block_hover_destinations_url3.'">'.$hcode_block_hover_destinations_title3.'</a></span>';
                                    }
                                    if( $hcode_block_hover_destinations_title3 ) {
                                        $output .= '<span class="destinations-place text-uppercase font-weight-400 letter-spacing-1 display-block'.$destinations_subtitle_responsive_class.'">'.$hcode_block_hover_destinations_subtitle2.'</span>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div> ';
                    $output .= '</div>';
                    break;

                case 'block-51':

                    if( $id || $class ) {
                        $output .= '<div class="'.$class.'"'.$id.'>';
                    }
                    if( $hcode_block_image ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .='<p class="text-extra-large text-uppercase black-text font-weight-600 margin-ten margin-four-bottom xs-margin-top-four'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</p>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                    if( $content ) {
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    }
                    if( $id || $class ) {
                        $output .= '</div>';
                    }
                break;

                case 'block-52':
                    if( $hcode_block_show_separator == 1 ) {
                        $output .='<div class="separator-line bg-yellow no-margin-lr no-margin-top"'.$separator.'></div>';
                    }
                    if( $hcode_block_title || $hcode_block_title_color ) {
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        $output .='<div class="white-text slider-subtitle1 bg-inherit no-margin text-left no-padding'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</div>';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                break;

                case 'block-53':
                    if( $hcode_block_image || $hcode_block_title || $hcode_block_title_color || $content ) {
                        if( $id || $class ) {
                            $output .= '<div class="'.$class.'"'.$id.'>';
                        }

                        $output .= '<div class="padding-fifteen md-padding-five xs-padding-ten text-center specialise-box" '.$hcode_block_bg_color.'>';
                        if( $hcode_block_image ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<div class="margin-ten-bottom xs-margin-bottom-five">';
                            $output .= wp_get_attachment_image( $hcode_block_image, $hcode_image_srcset );
                            $output .= '</div>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $hcode_block_title || $hcode_block_title_color ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .='<div class="title-small yellow-text text-transform-uppercase font-weight-700 margin-four-bottom'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</div>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                        if( $content ) {
                            $output .= '<div class="text-med no-margin">' . do_shortcode( hcode_remove_wpautop( $content ) ) . '</div>';
                        }
                        $output .= '</div>';

                        if( $id || $class ) {
                            $output .= '</div>';
                        }
                    }
                break;

                case 'block-54':
                    $output .= '<div class="agency2-onepage '.$class.'"'.$id.'>';

                        if ( ( $custom_icon == 1 && !empty( $custom_icon_image ) ) || $hcode_block_icon_list || $hcode_block_icon_color ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                              $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                            } elseif ( $hcode_block_icon_list || $hcode_block_icon_color ) {
                                $output .= '<span><i class="'.$hcode_block_icon_list.'"'.$hcode_block_icon_color.'></i></span>';
                            }
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }

                        if( $hcode_block_title || $content ) {
                            if( $hcode_block_title ) {
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                                }
                                $output .= '<strong class="'.$title_responsive_class.'" '.$hcode_block_title_color.'>'.$hcode_block_title.'</strong>';
                                if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                    $output .= '</a>';
                                }
                            }
                            if( $content ) {
                                $output .= '<div>' . do_shortcode( hcode_remove_wpautop( $content ) ) . '</div>';
                            }
                        }
                    $output .= '</div>';
                break;

                case 'block-55':
                $output .= '<div class="grid-border hcode-min-height-0px'.$class.'"'.$id.'>';
                    $output .= '<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 no-padding grid-border-box dark-grid-border-box bg-extra-dark-gray text-center '.$hcode_token_class.'">';
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                        }
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            $img_classes = 'icon-image '.$hcode_block_icon_size;
                            $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => $img_classes ) );
                        } elseif ( $hcode_block_icon_list || $hcode_block_icon_size ) {
                            $output .= '<i class="'.$hcode_block_icon_list.$hcode_block_icon_size.'"'.$hcode_block_icon_color_new.'></i>';
                        }
                        if( $hcode_block_title_link || $hcode_block_title_link_target ){
                            $output .= '</a>';
                        }
                        if( $hcode_block_title || $hcode_block_title_color ) {
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '<a href="'.$hcode_block_title_link.'"'.$hcode_block_title_link_target.'>';
                            }
                            $output .= '<span class="hcode-special-block text-uppercase letter-spacing-2 white-text font-weight-600 display-block margin-ten no-margin-bottom xs-margin-top-five'.$title_responsive_class.'"'.$hcode_block_title_color_new.'>'.$hcode_block_title.'</span>';
                            if( $hcode_block_title_link || $hcode_block_title_link_target ){
                                $output .= '</a>';
                            }
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;
                
            }
        return $output;
    }
}
add_shortcode( 'hcode_content_block', 'hcode_content_block_shortcode' );