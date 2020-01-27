<?php
/**
 * Map For Photography Grid
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Photography Grid */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => __( 'Photography Content Block' , 'hcode-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hcode_photography_grid', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'category' => 'H-Code',
        'description' => __( 'Create a photography content block', 'hcode-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
        'as_parent' => array('only' => 'hcode_photography_grid_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        'icon' => 'far fa-list-alt h-code-shortcode-icon', //URL or CSS class with icon image.
        'js_view' => 'VcColumnView',
        'show_settings_on_create' => true,
        'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => __( 'Column Type', 'hcode-addons' ),
              'param_name' => 'hcode_photography_grid_column_type',
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
        'name' => __('Add Photography', 'hcode-addons'),
        'base' => 'hcode_photography_grid_content',
        'description' => __( 'Add photography content', 'hcode-addons' ),
        'as_child' => array('only' => 'hcode_photography_grid'), // Use only|except attributes to limit parent (separate multiple values with comma)
        'icon' => 'far fa-list-alt h-code-shortcode-icon', //URL or CSS class with icon image.
        'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => __('Content Type', 'hcode-addons'),
              'param_name' => 'show_content',
              'admin_label' => true,
              'value' => array(__('Select Content Type', 'hcode-addons') => '',
                               __('Image', 'hcode-addons') => 'image',
                               __('Content with title', 'hcode-addons') => 'content-with-title',
                               __('Content with Image button', 'hcode-addons') => 'content-with-img-button',
                               __('Simple Content', 'hcode-addons') => 'simple-content',
                              ),
            ),
           array(
              'type' => 'hcode_preview_image',
              'heading' => __('Select pre-made style', 'hcode-addons'),
              'param_name' => 'slider_photography_preview_image',
          ),
          array(
            'type' => 'attach_image',
            'admin_label' => true,
            'heading' => __('Image', 'hcode-addons' ),
            'param_name' => 'hcode_image',
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content-with-title','content-with-img-button','simple-content') ),
          ),
          array(
            'type' => 'attach_image',
            'heading' => __('Button Image', 'hcode-addons' ),
            'param_name' => 'hcode_btn_image',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content-with-img-button') ),
          ),
          array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => __( 'Block Title', 'hcode-addons' ),
            'param_name' => 'hcode_title',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content-with-title') ),
          ),
          array(
            'type' => 'textarea_html',
            'heading' => __( 'Content', 'hcode-addons' ),
            'param_name' => 'content',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content-with-img-button','simple-content') ),
          ),
           array(
            'type' => 'textfield',
            'heading' => __( 'URL', 'hcode-addons' ),
            'param_name' => 'hcode_url',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content-with-title','content-with-img-button') ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'hcode-addons' ),
            'param_name' => 'hcode_title_color',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content-with-title') ),
            'group' => 'Configuration',
          ),
          array(
            'type' => 'hcode_custom_switch_option',
            'class' => '',
            'heading' => __('Required Display Settings?', 'hcode-addons'),
            'param_name' => 'display_setting',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1',
                            ),
            'group' => 'Style',
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'desktop_display',
            'heading' => __('Display Setting (For Desktop Device)', 'hcode-addons' ),
            'value' => array(__('Select Display Type', 'hcode-addons') => '',
                             __('Block', 'hcode-addons') => 'display-block',
                             __('None', 'hcode-addons') => 'display-none',
                            ),
            'dependency' => array( 'element' => 'display_setting', 'value' => array('1') ),
            'group' => 'Style',
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'ipad_display',
            'heading' => __('Display Setting (For iPad/Tablet Device)', 'hcode-addons' ),
            'value' => array(__('Select Display Type', 'hcode-addons') => '',
                             __('Block', 'hcode-addons') => 'sm-display-block',
                             __('None', 'hcode-addons') => 'sm-display-none',
                            ),
            'dependency' => array( 'element' => 'display_setting', 'value' => array('1') ),
            'group' => 'Style',
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'mobile_display',
            'heading' => __('Display Setting (For Mobile Device)', 'hcode-addons' ),
            'value' => array(__('Select Display Type', 'hcode-addons') => '',
                             __('Block', 'hcode-addons') => 'xs-display-block',
                             __('None', 'hcode-addons') => 'xs-display-none',
                            ),
            'dependency' => array( 'element' => 'display_setting', 'value' => array('1') ),
            'group' => 'Style',
          ),
          array(
            'type' => 'hcode_custom_switch_option',
            'class' => '',
            'heading' => __('Required Padding Setting?', 'hcode-addons'),
            'param_name' => 'padding_setting',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1'
                            ),
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content-with-title','content-with-img-button','simple-content') ),
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
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content-with-title','content-with-img-button','simple-content') ),
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
              'type'        => 'responsive_font_settings',
              'param_name'  => 'hcode_responsive_font',
              'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
              'group' => 'Font Settings',
              'dependency' => array( 'element' => 'show_content', 'value' => array('content-with-title') ),
              'hide_font_settings_element_lg' => array('text-align'),
              'hide_font_settings_element_md' => array('text-align'),
              'hide_font_settings_element_sm' => array('text-align'),
              'hide_font_settings_element_xs' => array('text-align'),
          ),
          array(
            'type' => 'hcode_custom_srcset',
            'param_name' => 'hcode_image_srcset',
            'heading' => __('Image SRCSET', 'hcode-addons' ),
            'value' => 'full',
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content-with-title','content-with-img-button','simple-content') ),
            'group' => 'SRCSET',
          ),
          array(
            'type' => 'hcode_custom_srcset',
            'param_name' => 'hcode_button_image_srcset',
            'heading' => __('Button Image SRCSET', 'hcode-addons' ),
            'value' => 'full',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content-with-img-button') ),
            'group' => 'SRCSET',
          ),
          $hcode_vc_extra_id,
          $hcode_vc_extra_class,
          ),
      ) 
  );

if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_hcode_photography_grid extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_hcode_photography_grid_content extends WPBakeryShortCode { }
}