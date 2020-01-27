<?php
/**
 * Map For Popular Dishes
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popular Dishes */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => __( 'Popular Dishes Block' , 'hcode-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hcode_popular_dishes', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'category' => 'H-Code',
        'description' => __( 'Add a popular dishes block', 'hcode-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
        'as_parent' => array('only' => 'hcode_popular_dishes_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        'icon' => 'h-code-shortcode-icon fas fa-th', //URL or CSS class with icon image.
        'js_view' => 'VcColumnView',
        'show_settings_on_create' => false,
        'params' => array(
          $hcode_vc_extra_id,
          $hcode_vc_extra_class,
        )
      )
  );
  vc_map( 
    array(
        'name' => __('Add Dishes', 'hcode-addons'),
        'base' => 'hcode_popular_dishes_content',
        'description' => __( 'Add Dishes Content', 'hcode-addons' ),
        'as_child' => array('only' => 'hcode_popular_dishes'), // Use only|except attributes to limit parent (separate multiple values with comma)
        'icon' => 'h-code-shortcode-icon fas fa-th', //URL or CSS class with icon image.
        'params' => array(
          array(
            'type' => 'dropdown',
            'heading' => __('Content Type', 'hcode-addons'),
            'param_name' => 'show_content',
            'admin_label' => true,
            'value' => array(__('Select Content Type', 'hcode-addons') => '',
                             __('Image', 'hcode-addons') => 'image',
                             __('Content', 'hcode-addons') => 'content',
                            ),
          ),
          array(
            'type' => 'attach_image',
            'heading' => __('BackGround Image', 'hcode-addons' ),
            'param_name' => 'hcode_bg_image',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content') ),
          ),
          array(
            'type' => 'attach_image',
            'heading' => __('Image', 'hcode-addons' ),
            'param_name' => 'hcode_image',
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content') ),
          ),
          array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => __( 'Block Title', 'hcode-addons' ),
            'param_name' => 'hcode_dishes_title',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content') ),
          ),
          array(
            'type' => 'textarea_html',
            'heading' => __( 'Block Subtitle', 'hcode-addons' ),
            'param_name' => 'content',
            'dependency' => array( 'element' => 'show_content', 'value' => array('content') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => __( 'Block URL', 'hcode-addons' ),
            'param_name' => 'hcode_dishes_url',
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content') ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'hcode-addons' ),
            'param_name' => 'hcode_title_color',
            'description' => __( 'Title Color', 'hcode-addons' ),
            'dependency' => array( 'element' => 'show_content', 'value' => array('content') ),
            'group' => 'Configuration',
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'SubTitle Color', 'hcode-addons' ),
            'param_name' => 'hcode_subtitle_color',
            'description' => __( 'SubTitle Color', 'hcode-addons' ),
            'dependency' => array( 'element' => 'show_content', 'value' => array('content') ),
            'group' => 'Configuration',
          ),
          array(
            'type' => 'hcode_custom_switch_option',
            'class' => '',
            'heading' => __('Required Padding Setting?', 'hcode-addons'),
            'param_name' => 'padding_setting',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1'
                            ),
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content') ),
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
            'dependency' => array( 'element' => 'show_content', 'value' => array('image','content') ),
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
            'dependency' => array( 'element' => 'show_content', 'value' => array('content') ),
            'group' => 'Font Settings',
          ),
          array(
            'type' => 'hcode_custom_srcset',
            'param_name' => 'hcode_image_srcset',
            'heading' => __('Image SRCSET', 'hcode-addons' ),
            'value' => 'full',
            'group' => 'SRCSET',
          ),
          array(
            'type' => 'hcode_custom_srcset',
            'param_name' => 'hcode_bg_image_srcset',
            'heading' => __('Background Image SRCSET', 'hcode-addons' ),
            'value' => 'full',
            'group' => 'SRCSET',
          ),
         
          ),
      ) 
  );

if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_hcode_popular_dishes extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_hcode_popular_dishes_content extends WPBakeryShortCode { }
}