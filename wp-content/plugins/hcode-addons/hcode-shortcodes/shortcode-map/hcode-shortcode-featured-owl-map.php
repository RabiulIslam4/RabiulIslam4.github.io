<?php
/**
 * Map For Featured OWL Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Featured OWL Slider */
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        'name' => __( 'Features Box Slider' , 'hcode-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'hcode_feature_slider', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => __( 'Place a features box slider', 'hcode-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
        'as_parent' => array('only' => 'hcode_feature_slide_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        'icon' => 'h-code-shortcode-icon far fa-building', //URL or CSS class with icon image.
        'category' => 'H-Code',
        'js_view' => 'VcColumnView',
        'params' => array(
          array(
              'type' => 'hcode_custom_switch_option',
              'class' => '',
              'heading' => __('Show Pagination', 'hcode-addons'),
              'param_name' => 'show_pagination',
              'value' => array(__('OFF', 'hcode-addons') => '0', 
                               __('ON', 'hcode-addons') => '1'
                              ),
              'description' => __( 'Select ON to show pagination in slider', 'hcode-addons' ),
          ),
          array(
              'type' => 'dropdown',
              'heading' => __('Pagination Style', 'hcode-addons'),
              'param_name' => 'show_pagination_style',
              'value' => array(__('Select Pagination Style', 'hcode-addons') => '',
                               __('Dot Style', 'hcode-addons') => '0',
                               __('Line Style', 'hcode-addons') => '1',
                               __('Round Style', 'hcode-addons') => '2',
                              ),
              'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
          ),
          array(
              'type' => 'dropdown',
              'heading' => __('Pagination Color Style', 'hcode-addons'),
              'param_name' => 'show_pagination_color_style',
              'value' => array(__('Select Pagination Color Style', 'hcode-addons') => '',
                               __('Dark Style', 'hcode-addons') => '0',
                               __('Light Style', 'hcode-addons') => '1'
                              ),
              'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
          ),
          array(
                'type' => 'hcode_custom_switch_option',
                'class' => '',
                'heading' => __('Show Navigation', 'hcode-addons'),
                'param_name' => 'show_navigation',
                'value' => array(__('OFF', 'hcode-addons') => '0', 
                                 __('ON', 'hcode-addons') => '1'
                                ),
                'description' => __( 'Select ON to show navigation in slider', 'hcode-addons' ),
          ),
          array(
              'type' => 'dropdown',
              'heading' => __('Navigation Style', 'hcode-addons'),
              'param_name' => 'show_navigation_style',
              'value' => array(__('Select Navigation Style', 'hcode-addons') => '',
                               __('Next/Prev Black Arrow', 'hcode-addons') => '0',
                               __('Next/Prev White Arrow', 'hcode-addons') => '1'
                              ),
              'dependency' => array( 'element' => 'show_navigation', 'value' => array('1') ),
          ),
          array(
              'type' => 'dropdown',
              'heading' => __('Cursor Color Style', 'hcode-addons'),
              'param_name' => 'show_cursor_color_style',
              'value' => array(__('Select Cursor Color Style', 'hcode-addons') => '',
                               __('White Cursor', 'hcode-addons') => 'white-cursor',
                               __('Black Cursor', 'hcode-addons') => 'black-cursor',
                               __('Default Cursor', 'hcode-addons') => 'no-cursor',
                              ),
          ),
          array(
                'type' => 'textfield',
                'heading' => __('No. of Items Per Slide (For Desktop Device)', 'hcode-addons'),
                'description' => __( 'Enter only numeric value like 3', 'hcode-addons' ),                
                'param_name' => 'hcode_image_carousel_itemsdesktop',
                'group'       => 'Slider Configuration',
                'value'     => '3',
          ),
          array(
                'type' => 'textfield',
                'heading' => __('No. of Items Per Slide (For Mini Desktop Device)', 'hcode-addons'),
                'description' => __( 'Enter only numeric value like 3', 'hcode-addons' ),  
                'param_name' => 'hcode_image_carousel_itemsminidesktop',
                'group'       => 'Slider Configuration',
                'value'     => '3',
            ),
          array(
                'type' => 'textfield',
                'heading' => __('No. of Items Per Slide (For iPad/Tablet Device)', 'hcode-addons'),
                'description' => __( 'Enter only numeric value like 3', 'hcode-addons' ),                                
                'param_name' => 'hcode_image_carousel_itemstablet',
                'group'       => 'Slider Configuration',
                'value'     => '2',

          ),
          array(
                'type' => 'textfield',
                'heading' => __('No. of Items Per Slide (For Mobile Device)', 'hcode-addons'),
                'description' => __( 'Enter only numeric value like 1', 'hcode-addons' ),   
                'param_name' => 'hcode_image_carousel_itemsmobile',
                'group'       => 'Slider Configuration',
                'value'     => '1',
          ),
          array(
                'type' => 'hcode_custom_switch_option',
                'class' => '',
                'heading' => __('Loop', 'hcode-addons'),
                'param_name' => 'hcode_image_carousel_loop',
                'value' => array(__('False', 'hcode-addons') => '0', 
                                 __('True', 'hcode-addons') => '1'
                                ),
                'description' => __( 'Select TRUE to loop slider', 'hcode-addons' ),
                'group'       => 'Slider Configuration'  
          ),
          array(
                'type' => 'hcode_custom_switch_option',
                'class' => '',
                'heading' => __('Autoplay', 'hcode-addons'),
                'param_name' => 'hcode_image_carousel_autoplay',
                'value' => array(__('False', 'hcode-addons') => '0', 
                                 __('True', 'hcode-addons') => '1'
                                ),
                'description' => __( 'Select TRUE to autoplay slider', 'hcode-addons' ),
                'group'       => 'Slider Configuration'  
          ),
          array(
                'type' => 'hcode_custom_switch_option',
                'class' => '',
                'heading' => __('Stop On Hover', 'hcode-addons'),
                'param_name' => 'stoponhover',
                'value' => array(__('False', 'hcode-addons') => '0', 
                                 __('True', 'hcode-addons') => '1'
                                ),
                'description' => __( 'Select TRUE to stop autoplay when hover on slider', 'hcode-addons' ),
                'dependency'  => array( 'element' => 'hcode_image_carousel_autoplay', 'value' => array('1') ),
                'group' => 'Slider Configuration',
          ),
          array(
              'type' => 'dropdown',
              'heading' => __('Slide Delay Time', 'hcode-addons'),
              'param_name' => 'slidespeed',
              'value' => array(__('Select Slide Delay Time', 'hcode-addons') => '',
                               '500' => '500',
                               '600' => '600',
                               '700' => '700',
                               '800' => '800',
                               '900' => '900',
                               '1000' => '1000',
                               '1100' => '1100',
                               '1200' => '1200',
                               '1300' => '1300',
                               '1400' => '1400',
                               '1500' => '1500',
                               '2000' => '2000',
                               '3000' => '3000',
                               '4000' => '4000',
                               '5000' => '5000',
                               '6000' => '6000',
                               '7000' => '7000',
                               '8000' => '8000',
                               '9000' => '9000',
                               '10000' => '10000',
                               __('Custom', 'hcode-addons') => 'custom',
                              ),
              'std' => '3000',
              'description' => __('Select slide delay time (1ms = 100)', 'hcode-addons'),
              'dependency'  => array( 'element' => 'hcode_image_carousel_autoplay', 'value' => array('1') ),
              'group' => 'Slider Configuration',
          ),
          array(
             'type'        => 'textfield',
             'heading'     => __('Custom Slide Delay Time', 'hcode-addons' ),
             'description' => __('Add custom slide delay time to this slider. Like "2000"', 'hcode-addons' ),
             'param_name'  => 'custom_slidespeed',
             'dependency' => array( 'element' => 'slidespeed', 'value' => 'custom' ),
             'group' => 'Slider Configuration',
          ),
          array(
              'type' => 'dropdown',
              'heading' => __('Slide Speed', 'hcode-addons'),
              'param_name' => 'slidedelay',
              'value' => array(__('Select Slide Speed', 'hcode-addons') => '',
                               '500' => '500',
                               '600' => '600',
                               '700' => '700',
                               '800' => '800',
                               '900' => '900',
                               '1000' => '1000',
                               '1100' => '1100',
                               '1200' => '1200',
                               '1300' => '1300',
                               '1400' => '1400',
                               '1500' => '1500',
                               '2000' => '2000',
                               '3000' => '3000',
                               '4000' => '4000',
                               '5000' => '5000',
                               '6000' => '6000',
                               '7000' => '7000',
                               '8000' => '8000',
                               '9000' => '9000',
                               '10000' => '10000',
                               __('Custom', 'hcode-addons') => 'custom',
                              ),
              'std' => '700',
              'description' => __('Select slide speed', 'hcode-addons'),
              'dependency'  => array( 'element' => 'hcode_image_carousel_autoplay', 'value' => array('1') ),
              'group' => 'Slider Configuration',
          ),
          array(
             'type'        => 'textfield',
             'heading'     => __('Custom Slide Speed', 'hcode-addons' ),
             'description' => __('Add custom slide speed to this slider. Like "2000"', 'hcode-addons' ),
             'param_name'  => 'custom_slidedelay',
             'dependency' => array( 'element' => 'slidedelay', 'value' => 'custom' ),
             'group' => 'Slider Configuration',
          ),
          array(
             'type'        => 'textfield',
             'heading'     => __('Slider ID', 'hcode-addons' ),
             'description' => 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
             'param_name'  => 'hcode_slider_id',
             'group'       => 'Slider ID & Class'
          ),
          array(
             'type'        => 'textfield',
             'heading'     => __('Slider Extra Class', 'hcode-addons' ),
             'description' => 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2"',
             'param_name'  => 'hcode_slider_class',
             'group'       => 'Slider ID & Class'
          ),
          )
      )
  );
  vc_map( 
    array(
        'name' => __('Add Feature Block', 'hcode-addons'),
        'base' => 'hcode_feature_slide_content',
        'description' => __( 'A slide for the image slider.', 'hcode-addons' ),
        'as_child' => array('only' => 'hcode_feature_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
        'icon' => 'h-code-shortcode-icon far fa-building', //URL or CSS class with icon image.
        'params' => array(
            array(
              'type' => 'hcode_custom_switch_option',
              'heading' => __('Custom Icon', 'hcode-addons'),
              'param_name' => 'custom_icon',
              'value' => array(__('NO', 'hcode-addons') => '0',
                               __('YES', 'hcode-addons') => '1'
                              ),
            ),
            array(
              'type' => 'attach_image',
              'heading' => __('Custom Icon Image', 'hcode-addons'),
              'param_name' => 'custom_icon_image',
              'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
              'description' => __( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'hcode-addons' ),
            ),
            array(
              'type' => 'hcode_icon',
              'heading' => __('Select Icon Type', 'hcode-addons'),
              'param_name' => 'hcode_et_line_icon_list',
              'description' => __('Select Font Type', 'hcode-addons'),
              'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),      
            ),
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => __('Title', 'hcode-addons'),
                'param_name' => 'title'
            ),
            array(
              'type' => 'textfield',
              'heading' => __( 'Link', 'hcode-addons' ),
              'param_name' => 'hcode_icon_title_link',
              'description' => __( 'Add link for icon and title', 'hcode-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => __( 'Link Target', 'hcode-addons' ),
              'param_name' => 'hcode_icon_title_link_target',
              'value' => array(__( 'Same window / tab', 'hcode-addons' ) => '_self', 
                               __( 'New Window / tab', 'hcode-addons' ) => '_blank',
                              ),
              'std' => '_self',
            ),
            array(
              'type' => 'textarea_html',
              'heading' => __('Content', 'hcode-addons'),
              'param_name' => 'content'
            ),
            array(
              'type' => 'dropdown',
              'heading' => __('Icon Color style', 'hcode-addons'),
              'param_name' => 'icon_color_style',
              'value' => array(__('Default', 'hcode-addons') => '',
                               __('White', 'hcode-addons') => 'white-text',
                               __('Black', 'hcode-addons') => 'black-text',
                               __('Custom Color', 'hcode-addons') => 'custom',
                              ),
              'group' => 'Configuration',
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => __( 'Icon Color', 'hcode-addons' ),
              'param_name' => 'hcode_icon_color',
              'dependency' => array( 'element' => 'icon_color_style', 'value' => array('custom') ),
              'description' => __( 'Icon Color', 'hcode-addons' ),
              'group' => 'Configuration',
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Title Color style', 'hcode-addons'),
                'param_name' => 'title_color_style',
                'value' => array(__('Default', 'hcode-addons') => '',
                                 __('White', 'hcode-addons') => 'white-text',
                                 __('Black', 'hcode-addons') => 'black-text',
                                 __('Custom Color', 'hcode-addons') => 'custom',
                                ),
                'group' => 'Configuration',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => __( 'Title Color', 'hcode-addons' ),
                'param_name' => 'hcode_title_color',
                'dependency' => array( 'element' => 'title_color_style', 'value' => array('custom') ),
                'description' => __( 'Title Color', 'hcode-addons' ),
                'group' => 'Configuration',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => __( 'Content Color', 'hcode-addons' ),
                'param_name' => 'hcode_content_color',
                'description' => __( 'Content Color', 'hcode-addons' ),
                'group' => 'Configuration',
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
                'heading' => __('Custom Margin (For All Devices)', 'hcode-addons' ),
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
                'type' => 'hcode_custom_mobile_margin',
                'param_name' => 'mobile_margin',
                'heading' => __('Margin (For Mobile Device)', 'hcode-addons' ),
                'value' => '',
                'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
                'group' => 'Style',
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hcode_responsive_title_font',
                'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
                'group' => 'Font Settings',
            ),
            array(
                'type' => 'hcode_custom_srcset',
                'param_name' => 'hcode_icon_image_srcset',
                'heading' => __('Icon Image SRCSET', 'hcode-addons' ),
                'value' => 'full',
                'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
                'group' => 'SRCSET',
            ),
            $hcode_vc_extra_id,
            $hcode_vc_extra_class,
          ),
      ) 
  );

if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_hcode_feature_slider extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_hcode_feature_slide_content extends WPBakeryShortCode { }
}