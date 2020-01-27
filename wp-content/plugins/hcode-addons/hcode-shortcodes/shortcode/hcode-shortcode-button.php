<?php
/**
 * Shortcode For Button
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Button */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_button_shortcode' ) ) {
    function hcode_button_shortcode( $atts, $content = null ) {
        global $hcode_featured_array,$hcode_button,$font_settings_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        extract( shortcode_atts( array(
            'button_style' =>'',
            'button_type' => '',
            'button_version_type' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'button_icon' => '',
            'button_text' => '',
            'button_sub_text' => '',
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
            'extra_large' => '',
            'hcode_column_animation_style' => '',
            'class' => '',
            'id' => '',
            'hcode_icon_image_srcset' => 'full',
            'button_settings' => '',
            'button_settings_icon' =>''
                ), $atts ) );
        $output = $alignment = '';
        $classes = array();
        ($class) ? $classes[] = $class : '';
        $id = ($id) ? 'id="'.$id.'"' : '';

        $classes[] = 'inner-link button btn';
        $first_button_parse_args = vc_parse_multi_attribute($button_text);
        $first_button_link     = ( isset($first_button_parse_args['url']) ) ? $first_button_parse_args['url'] : '#';
        $first_button_title    = ( isset($first_button_parse_args['title']) ) ? $first_button_parse_args['title'] : '';
        $first_button_target   = ( isset($first_button_parse_args['target']) ) ? trim($first_button_parse_args['target']) : '_self';
        ($extra_large == 1) ? $classes[] = 'btn-extra-large' : '';
        ( $hcode_column_animation_style ) ? $classes[] = 'wow '.$hcode_column_animation_style : '';
        $class= $icon='';

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';
        $custom_icon_image = ( $custom_icon_image ) ? $custom_icon_image : '';

        $hcode_button = !empty( $hcode_button ) ? $hcode_button : 0;
        $hcode_button = $hcode_button + 1;
        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_token_class = $classes[] = 'hcode-button-'.$hcode_button ;
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

        //Button color and font settings
        $button_responsive_id = $button_icon_responsive_id = '';
        if( !empty( $button_settings) ) {
            $button_responsive_id = 'hcode-button-'.$hcode_button ;
            $button_responsive_style = ($button_style == 'style19' || $button_style == 'style20') ? Hcode_Font_Color_Settings::generate_css( $button_settings, $button_responsive_id.' span,.'.$button_responsive_id, $button_responsive_id.':hover span,.'.$button_responsive_id.':hover i,.'.$button_responsive_id.':hover') : Hcode_Font_Color_Settings::generate_css( $button_settings, $button_responsive_id );
            $classes[] = ' '.$button_responsive_id;
        }  
        if (!empty( $button_settings_icon)) {
            $button_icon_responsive_id = 'hcode-button-'.$hcode_button ;
            $button_icon_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_settings_icon, $button_icon_responsive_id );
            $classes[] = ' '.$button_icon_responsive_id;
        }
        (!empty( $button_responsive_style)) ? $hcode_featured_array[] = $button_responsive_style : '';
        (!empty( $button_icon_responsive_style)) ? $hcode_featured_array[] = $button_icon_responsive_style : '';
        
        //New Font Awesome Icons
        
        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($button_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $button_icon = substr(strstr($button_icon," "), 1);

            if(array_key_exists($button_icon, $fa_icon_old)){
                $button_icon = $fa_icon_old[$button_icon];
            }else if(in_array($button_icon, $fa_icons_solid)){
                $button_icon = 'fas '.$button_icon;
            }else if(in_array($button_icon, $fa_icons_reg)){
                $button_icon = 'far '.$button_icon;
            }else if(in_array($button_icon, $fa_icons_brand)){
                $button_icon = 'fab '.$button_icon;
            }else{
                $button_icon = '';
            }
        }
        
        // For Button Style
        switch ($button_style) {
            case 'style1':
            	$icon = $first_button_title;
                $classes[] = "highlight-button";
            break;
            case 'style2':
            	$icon = $first_button_title;
                $classes[] = "highlight-button-dark";
            break;
            case 'style3':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-background";
            break;
            case 'style4':
            	$icon = $first_button_title;
                $classes[] = "highlight-button btn-round";
            break;
            case 'style5':
            	$icon = $first_button_title;
                $classes[] = "highlight-button-dark btn-round";
            break;
            case 'style6':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-background btn-round";
            break;
            case 'style7':
            	$icon = $first_button_title;
                $classes[] = "highlight-button-black-border";
            break;
            case 'style8':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white";
            break;
            case 'style9':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-dark";
            break;
            case 'style10':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white btn-round";
            break;
            case 'style11':
            	$icon = $first_button_title;
                $classes[] = "btn-small-white-dark btn-round";
            break;
            case 'style12':
            	$icon = $first_button_title;
                $classes[] = "btn-small-black-border-light";
            break;
            case 'style13':
            	$icon = $first_button_title;
                $classes[] = "btn-small-black-border-light btn-round";
            break;
            case 'style14':
            	$icon = $first_button_title;
                $classes[] = "btn-very-small-white";
            break;
            case 'style15':
            	$icon = $first_button_title;
                $classes[] = "btn-very-small-white btn-round";
            break;
            case 'style16':
            	if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $icon .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    $icon .= $first_button_title;
                } else { 
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= $first_button_title;
                }
                $classes[] = "highlight-button";
            break;
            case 'style17':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $icon = wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    $icon .= $first_button_title;
                } else { 
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= $first_button_title;
                }
                $classes[] = "highlight-button-dark";
            break;
            case 'style18':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $icon .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    $icon .= $first_button_title;
                } else { 
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= $first_button_title;
                }
                $classes[] = "btn-small-white-background";
            break;
            case 'style19':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $icon .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    $icon .= '<span>'.$first_button_title.'</span>';
                } else { 
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= '<span>'.$first_button_title.'</span>';
                }
                $classes[] = "button-reveal";
            break;
            case 'style20':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $icon .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    $icon .= '<span>'.$first_button_title.'</span>';
                } else { 
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                    $icon .= '<span>'.$first_button_title.'</span>';
                }
                $classes[] = "button-reveal button-reveal-black";
            break;
            case 'style21':
            	$icon = $first_button_title;            
            break;
            case 'style22':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $icon .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    $icon .= $first_button_title;
                } else { 
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.' btn-round"></i>';
                    }
                }
                $classes[] = "social-icon";
            break;
            case 'style23':
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $icon .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                    $icon .= $first_button_title;
                } else { 
                    if($button_icon){
                        $icon = '<i class="'.$button_icon.'"></i>';
                    }
                }
                $classes[] = "social-icon social-icon-large button";
            break;
            case 'style24':
            	$icon = $first_button_title.'<span>'.$button_sub_text.'</span>';
                $classes[] = "button-3d btn-large button-desc";
            break;
            case 'style25':
            	$icon = $first_button_title;
                $classes[] = "button-3d btn-round";
            break;
        }
        // For Button Type
        switch ($button_type) {
            case 'large':
                $classes[] = "btn-large";
            break;
            case 'medium':
                $classes[] = "btn-medium";
            break;
            case 'small':
                $classes[] = "btn-small";
            break;
            case 'vsmall':
                $classes[] = "btn-very-small";
            break;
        }
        // For Button Version
        switch ($button_version_type) {
            case 'primary':
                $classes[] = "btn-primary btn-round";
            break;
            case 'success':
                if($button_style=='style24'){
                    $classes[] = "btn-success btn-round";
                }else{
                    $classes[] = "btn-success btn-round";
                }
            break;
            case 'info':
                $classes[] = "btn-info btn-round";
            break;
            case 'warning':
                $classes[] = "btn-warning btn-round";
            break;
            case 'danger':
                $classes[] = "btn-danger btn-round";
            break;
        }

        // Class List
        $class_list = implode(" ", $classes);

        // button body
        if( $icon ) {
            $output .= '<a '.$id.' href="'.$first_button_link.'" target="'.$first_button_target.'"  class="'.$class_list.'">'.$icon.'</a>';
        }
        
        return $output;
    }
}
add_shortcode( 'hcode_button', 'hcode_button_shortcode' );