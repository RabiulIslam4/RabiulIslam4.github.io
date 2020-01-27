<?php
/**
 * Shortcode For Login Form
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Login Form */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_login_form_shortcode' ) ) {
    function hcode_login_form_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_login_form_style' => '',
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
            'uname' => '',
            'password' => '',
            'email' => '',
            'remember' => '',
            'button_text' => '',
            'one_button_config' => '',
        ), $atts ) );
        global $hcode_login_form_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array, $font_settings_array;
        $output = $padding = $margin = $padding_style = $margin_style = $style_attr = $style = $button_responsive_id = $button_responsive_style = $button_responsive_class ='';
        $classes = array();
        $id = ($id) ? 'id='.$id : '';
        ($class) ? $classes[] = $class : ''; 
        $hcode_login_form_style = ( $hcode_login_form_style ) ? $hcode_login_form_style : '';
        $uname = ( $uname ) ? $uname : '';
        $password = ( $password ) ? $password : '';
        $email = ( $email ) ? $email : '';
        $remember = ( $remember ) ? $remember : '';
        $button_text = ( $button_text ) ? $button_text : '';
        
        if( !empty( $one_button_config ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $one_button_config, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';

        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_login_form_token = !empty( $hcode_login_form_token ) ? $hcode_login_form_token : 0;
            $hcode_login_form_token = $hcode_login_form_token + 1;
            $hcode_token_class = $classes[] = 'hcode-login-form-'.$hcode_login_form_token;
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

        // Class List
        $class_list = implode(" ", $classes);

        switch ($hcode_login_form_style){
        case 'login-style1':
            $output .= '<div'.$id.' class="login-box bg-white '.$class_list.'">';
            //Form Title
            $output .= '<h1>'.esc_html__( 'Login', 'hcode-addons' ).'</h1>';
            //Form Sub Title
            $output .= '<p class="text-uppercase margin-three no-margin-bottom">'.sprintf( __( 'Enter to account or <a href="%s">Register Now</a>.', 'hcode-addons' ), home_url()."/wp-login.php?action=register" ).'</p>';
            $output .= '<!-- end form sub title  -->';
            $output .= '<div class="separator-line bg-black no-margin-lr margin-ten"></div>';
                $output .= '<form name="loginform" id="loginform" action="'.home_url().'/wp-login.php" method="post">';
                    $output .= '<div class="form-group no-margin-bottom">';
                        // Label Start
                        if($uname):
                            $output .= '<label class="text-uppercase" for="user_login">'.$uname.'</label>';
                        endif;
                        // Label End
                        $output .= '<input type="text" id="user_login" name="log">';
                    $output .= '</div>';
                    $output .= '<div class="form-group no-margin-bottom">';
                        // Label Start
                        if($password):
                            $output .= '<label class="text-uppercase" for="user_pass">'.$password.'</label>';
                        endif;
                        // Label End
                        $output .= '<input type="password" id="user_pass" name="pwd">';
                    $output .= '</div>';
                    $output .= '<div class="checkbox margin-five">';
                        // Checkbox
                        if($remember):
                            $output .= '<label><input type="checkbox" name="rememberme" id="rememberme" value="forever"> '.$remember.'</label>';
                        endif;
                    $output .= '</div>';
                    $output .= '<input type="hidden" name="redirect_to" value="'.$_SERVER['REQUEST_URI'].'">';
                    if($button_text):
                        $output .= '<button type="submit" class="btn btn-black no-margin-bottom btn-small btn-round no-margin-top'.$button_responsive_class.'">'.$button_text.'</button>';
                    endif;
                $output .= '</form>';
            $output .= '</div>';
        break;

        case 'login-style2':
            $output .= '<form name="loginform" '.$id.' action="'.home_url().'/wp-login.php" method="post" class="loginform '.$class_list.'">';
                $output .= '<div class="form-group no-margin-bottom">';
                    // Label Start
                    if($uname):
                        $output .= '<label class="text-uppercase" for="user_login">'.$uname.'</label>';
                    endif;
                    // Label End
                    $output .= '<input type="text" class="input-round big-input" id="user_login" name="log">';
                $output .= '</div>';
                $output .= '<div class="form-group no-margin-bottom">';
                    // Label Start
                    if($password):
                        $output .= '<label class="text-uppercase" for="user_pass">'.$password.'</label>';
                    endif;
                    // Label End
                    $output .= '<input type="password" class="input-round big-input" id="user_pass" name="pwd">';
                $output .= '</div>';
                if($button_text):
                    $output .= '<button type="submit" class="btn highlight-button-dark btn-small btn-round margin-five no-margin-right'.$button_responsive_class.'">'.$button_text.'</button>';
                endif;
                $output .= '<a class="display-block text-uppercase" href="'.wp_lostpassword_url().'">'.esc_html__( 'Forgot Password?', 'hcode-addons' ).'</a>';
            $output .= '</form>';
        break;
        
        case 'register':
                // Registration
                $output .= '<div id="register-form '.$class_list.'">'; 
                    $output .= '<form action="'.site_url('wp-login.php?action=register', 'login_post').'" method="post">';
                        $output .= '<div class="form-group no-margin-bottom">';
                            // Label Start
                            if($uname):
                                $output .= '<label class="text-uppercase">'.$uname.'</label>';
                            endif;
                            // Label End
                            $output .= '<input type="text" class="input-round big-input" id="user_login" name="user_login">';
                        $output .= '</div>';
                        $output .= '<div class="form-group no-margin-bottom">';
                            // Label Start
                            if($email):
                            $output .= '<label class="text-uppercase">'.$email.'</label>';
                            endif;
                            // Label End
                            $output .= '<input type="text" class="input-round big-input" id="user_email" name="user_email">';
                        $output .= '</div>';
                        $output .= do_action('register_form');
                        if($button_text):
                            $output .= '<button type="submit" class="btn highlight-button-dark btn-small btn-round margin-five no-margin-right'.$button_responsive_class.'" id="register">'.$button_text.'</button>';
                        endif;
                        $output .= '<p class="display-block text-uppercase">'.esc_html__( 'A password will be e-mailed to you.', 'hcode-addons' ).'</p>';
                    $output .= '</form>';
                $output .= '</div>';
        break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_login_form', 'hcode_login_form_shortcode' );