<?php
/**
 * Map For Photography Services
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Photography Services */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => __( 'Photography Services' , 'hcode-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hcode_photography_services', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'category' => 'H-Code',
        'description' => __( 'Add a photography services', 'hcode-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
        'as_parent' => array('only' => 'hcode_photography_services_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        'icon' => 'far fa-list-alt h-code-shortcode-icon', //URL or CSS class with icon image.
        'js_view' => 'VcColumnView',
        'show_settings_on_create' => true,
        'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Column Type', 'hcode-addons' ),
              'param_name' => 'hcode_photography_services_column_type',
              'admin_label' => true,
              'value' => array(__( 'Select Column Type', 'hcode-addons' ) => '',
                               __( '2 Columns', 'hcode-addons' ) => 'work-2col',
                               __( '3 Columns', 'hcode-addons' ) => 'work-3col',
                               __( '4 Columns', 'hcode-addons' ) => 'work-4col',
                               __( '5 Columns', 'hcode-addons' ) => 'work-5col',
                              ),
              'std' => 'work-5col',
            ),
        $hcode_vc_extra_id,
        $hcode_vc_extra_class,
        ),
      )
  );
  vc_map( 
    array(
        'name' => __('Add Photography Service', 'hcode-addons'),
        'base' => 'hcode_photography_services_content',
        'description' => __( 'Add photography service content', 'hcode-addons' ),
        'as_child' => array('only' => 'hcode_photography_services'), // Use only|except attributes to limit parent (separate multiple values with comma)
        'icon' => 'far fa-list-alt h-code-shortcode-icon', //URL or CSS class with icon image.
        'params' => array(
          array(
            'type' => 'attach_image',
            'heading' => __('Image', 'hcode-addons' ),
            'param_name' => 'hcode_image',
          ),
          array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => __( 'Block Title', 'hcode-addons' ),
            'param_name' => 'hcode_title',
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Block Title Link', 'hcode-addons' ),
            'param_name' => 'hcode_title_link',
            'value' => '#',
          ),
          array(
            'type' => 'hcode_custom_switch_option',
            'class' => '',
            'heading' => __('Block Title Link Target Blank', 'hcode-addons'),
            'param_name' => 'hcode_title_link_targer_blank',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1'
                            ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'hcode-addons' ),
            'param_name' => 'hcode_title_color',
            'group' => 'Configuration',
            ),
          array(
            'type'        => 'vc_link',
            'heading'     => __('Button Config', 'hcode-addons' ),
            'param_name'  => 'button_config',
          ),
          array(
            'type' => 'hcode_custom_switch_option',
            'class' => '',
            'heading' => __('Required Padding Setting?', 'hcode-addons'),
            'param_name' => 'padding_setting',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1'
                            ),
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
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Overlay color', 'hcode-addons' ),
            'param_name' => 'hcode_overlay_color',
            'group' => esc_html__( 'Overlay', 'hcode-addons' ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Overlay opacity', 'hcode-addons'),
            'param_name' => 'hcode_overlay_opacity',
            'value' => array( esc_html__( 'Default opacity','hcode-addons') => '',
                              '0'  => '0',
                              '0.1'  => '0.1',
                              '0.2'  => '0.2',
                              '0.3'  => '0.3',
                              '0.4'  => '0.4',
                              '0.5'  => '0.5',
                              '0.6'  => '0.6',
                              '0.7'  => '0.7',
                              '0.8'  => '0.8',
                              '0.9'  => '0.9',
                              '1.0'  => '1.0',
                            ),
            'group' => esc_html__( 'Overlay', 'hcode-addons' ),
          ),
          array(
              'type'        => 'responsive_font_settings',
              'param_name'  => 'hcode_responsive_font',
              'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
              'group' => 'Font Settings',
          ),
          array(
            'type' => 'hcode_custom_srcset',
            'param_name' => 'hcode_image_srcset',
            'heading' => __('Image SRCSET', 'hcode-addons' ),
            'value' => 'full',
            'group' => 'SRCSET',
          ),
          $hcode_vc_extra_id,
          $hcode_vc_extra_class,
          ),
      ) 
);
if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_hcode_photography_services extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_hcode_photography_services_content extends WPBakeryShortCode { }
}