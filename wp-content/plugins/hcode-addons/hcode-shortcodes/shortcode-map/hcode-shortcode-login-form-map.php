<?php
/**
 * Map For Login Form
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Login Form */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Forms', 'hcode-addons'),
  'description' => __('Place a form with options', 'hcode-addons'), 
  'icon' => 'far fa-edit h-code-shortcode-icon',
  'base' => 'hcode_login_form',
  'category' => 'H-Code',
  'params' => array(
    array(
        'type' => 'dropdown',
        'heading' => __('Form Type', 'hcode-addons'),
        'param_name' => 'hcode_login_form_style',
        'admin_label' => true,
        'value' => array(__('Select Form Type', 'hcode-addons') => '',
                         __('Login Form With box', 'hcode-addons') => 'login-style1',
                         __('Login Form', 'hcode-addons') => 'login-style2',
                         __('Register', 'hcode-addons') => 'register'   
                        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Username Label Text', 'hcode-addons' ),
        'param_name' => 'uname',
        'dependency' => array( 'element' => 'hcode_login_form_style', 'value' => array('login-style1','login-style2','register') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Password Label Text', 'hcode-addons' ),
        'param_name' => 'password',
        'dependency' => array( 'element' => 'hcode_login_form_style', 'value' => array('login-style1','login-style2') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Email Label Text', 'hcode-addons' ),
        'param_name' => 'email',
        'dependency' => array( 'element' => 'hcode_login_form_style', 'value' => array('register') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Remember Me Label Text', 'hcode-addons' ),
        'param_name' => 'remember',
        'dependency' => array( 'element' => 'hcode_login_form_style', 'value' => array('login-style1') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Button Text', 'hcode-addons' ),
        'param_name' => 'button_text',
        'dependency' => array( 'element' => 'hcode_login_form_style', 'value' => array('login-style1','login-style2','register') ),
    ),
    array(
      'type'        => 'hcode_button_settings',
      'param_name'  => 'one_button_config',
      'heading'     => esc_html__( 'Button Configuration', 'hcode-addons' ),
      'group' => 'Button Configuration',
      'description' => __( 'You can easily set button text-transform, font-size, line-height, letter-spacing for all devices ', 'hcode-addons' ),
      'hide_font_settings_element'=>array('icon-color','icon-hover-color')
    ),
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Required Padding Setting?', 'hcode-addons'),
        'param_name' => 'padding_setting',
        'value' => array(__('No', 'hcode-addons') => '0', 
                         __('Yes', 'hcode-addons') => '1'
                        ),
        'dependency' => array( 'element' => 'hcode_login_form_style', 'value' => array('login-style1','login-style2','register') ),
        'group' => 'Style',
    ),
    array(
      'type' => 'hcode_custom_desktop_padding',
      'param_name' => 'desktop_padding',
      'heading' => __('Padding (For Desktop Device)', 'hcode-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For Desktop Devices)', 'hcode-addons' ),
      'param_name' => 'custom_desktop_padding',
      'dependency' => array( 'element' => 'desktop_padding', 'value' => array('custom-desktop-padding') ),
      'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'hcode_custom_ipad_padding',
      'param_name' => 'ipad_padding',
      'heading' => __('Padding (For iPad Device)', 'hcode-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For iPad Devices)', 'hcode-addons' ),
      'param_name' => 'custom_ipad_padding',
      'dependency' => array( 'element' => 'ipad_padding', 'value' => array('custom-ipad-padding') ),
      'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'hcode_custom_mobile_padding',
      'param_name' => 'mobile_padding',
      'heading' => __('Padding (For Mobile Device)', 'hcode-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Padding (For Mobile Devices)', 'hcode-addons' ),
      'param_name' => 'custom_mobile_padding',
      'dependency' => array( 'element' => 'mobile_padding', 'value' => array('custom-mobile-padding') ),
      'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'class' => '',
      'heading' => __('Required Margin Setting?', 'hcode-addons'),
      'param_name' => 'margin_setting',
      'value' => array(__('No', 'hcode-addons') => '0', 
                       __('Yes', 'hcode-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'hcode_login_form_style', 'value' => array('login-style1','login-style2','register') ),
        'group' => 'Style',
    ),
    array(
      'type' => 'hcode_custom_desktop_margin',
      'param_name' => 'desktop_margin',
      'heading' => __('Margin (For Desktop Device)', 'hcode-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For Desktop Devices)', 'hcode-addons' ),
      'param_name' => 'custom_desktop_margin',
      'dependency' => array( 'element' => 'desktop_margin', 'value' => array('custom-desktop-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'hcode_custom_ipad_margin',
      'param_name' => 'ipad_margin',
      'heading' => __('Margin (For iPad Device)', 'hcode-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For iPad Devices)', 'hcode-addons' ),
      'param_name' => 'custom_ipad_margin',
      'dependency' => array( 'element' => 'ipad_margin', 'value' => array('custom-ipad-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
      'group' => 'Style',
    ),
    array(
      'type' => 'hcode_custom_mobile_margin',
      'param_name' => 'mobile_margin',
      'heading' => __('Margin (For Mobile Device)', 'hcode-addons' ),
      'value' => '',
      'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
      'group' => 'Style',
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Custom Margin (For Mobile Devices)', 'hcode-addons' ),
      'param_name' => 'custom_mobile_margin',
      'dependency' => array( 'element' => 'mobile_margin', 'value' => array('custom-mobile-margin') ),
      'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
      'group' => 'Style',
    ),
    $hcode_vc_extra_id,
    $hcode_vc_extra_class,
  )
) );