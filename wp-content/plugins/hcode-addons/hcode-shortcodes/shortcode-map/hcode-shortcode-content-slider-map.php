<?php
/**
 * Map For Content Slider
 *
 * @package H-Code
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Content Slider */
/*-----------------------------------------------------------------------------------*/

vc_map( 
  array(
      'name' => __( 'Content Slider' , 'hcode-addons' ), //Name of your shortcode for human reading inside element list
      'base' => 'hcode_content_slider', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
      'description' => __( 'Place a content slider', 'hcode-addons' ), //Short description of your element, it will be visible in "Add element" window
      'class' => '', //CSS class which will be added to the shortcode's content element in the page edit screen in Visual Composer backend edit mode
      'as_parent' => array('only' => 'hcode_special_slide_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      'icon' => 'fas fa-align-center h-code-shortcode-icon', //URL or CSS class with icon image.
      'js_view' => 'VcColumnView',
      'category' => 'H-Code',
      'params' => array( //List of shortcode attributes. Array which holds your shortcode params, these params will be editable in shortcode settings page
          array(
              'type' => 'dropdown',
              'heading' => __('Content Slider Style', 'hcode-addons'),
              'param_name' => 'slider_content_premade_style',
              'admin_label' => true,
              'value' => array(__('Select a Content Slider Style', 'hcode-addons') => '',
                               __('Owl Carousel Content Slider Style 1', 'hcode-addons') => 'hcode-owl-content-slider1', 
                               __('Bootstrap Content Slider Style 1', 'hcode-addons') => 'hcode-bootstrap-content-slider1',
                               __('Spa Case Study', 'hcode-addons') => 'hcode-bootstrap-content-slider2',
                               __('Agency Case Study', 'hcode-addons') => 'hcode-bootstrap-content-slider3',
                              ),
              'description' => __('Choose a pre-made content slider style', 'hcode-addons'),
          ),
          array(
              'type' => 'hcode_preview_image',
              'heading' => __('Select pre-made style', 'hcode-addons'),
              'param_name' => 'slider_content_preview_image',
          ),
          array(
                'type' => 'hcode_custom_switch_option',
                'class' => '',
                'heading' => __('Show Pagination', 'hcode-addons'),
                'param_name' => 'show_pagination',
                'value' => array(__('OFF', 'hcode-addons') => '0', 
                                 __('ON', 'hcode-addons') => '1'
                                ),
                'description' => __( 'Select ON to show pagination in slider', 'hcode-addons' ),
                'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1','hcode-bootstrap-content-slider1','hcode-bootstrap-content-slider2','hcode-bootstrap-content-slider3') ),
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
                'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1','hcode-bootstrap-content-slider1','hcode-bootstrap-content-slider2','hcode-bootstrap-content-slider3') ),
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
              'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1') ),
          ),       
          array(
              'type' => 'hcode_animation_style',
              'heading' => __('Animation In', 'hcode-addons'),
              'param_name' => 'transition_style',
              'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1') ),
              'group' => 'Slider Configuration',
          ),
          array(
              'type' => 'hcode_animation_style',
              'heading' => __('Animation Out', 'hcode-addons'),
              'param_name' => 'transition_animation_out',
              'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1') ),
              'group' => 'Slider Configuration',
          ),
          array(
                'type' => 'hcode_custom_switch_option',
                'class' => '',
                'heading' => __('Autoplay', 'hcode-addons'),
                'param_name' => 'autoplay',
                'value' => array(__('False', 'hcode-addons') => '0', 
                                 __('True', 'hcode-addons') => '1'
                                ),
                'description' => __( 'Select TRUE to autoplay slider', 'hcode-addons' ),
                'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1','hcode-bootstrap-content-slider1','hcode-bootstrap-content-slider2','hcode-bootstrap-content-slider3') ),
                'group' => 'Slider Configuration',
          ),
          array(
                'type' => 'hcode_custom_switch_option',
                'class' => '',
                'heading' => __('Loop', 'hcode-addons'),
                'param_name' => 'loop',
                'value' => array(__('False', 'hcode-addons') => '0', 
                                 __('True', 'hcode-addons') => '1'
                                ),
                'description' => __( 'Select TRUE to loop slider', 'hcode-addons' ),
                'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1') ),
                'group' => 'Slider Configuration',
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
                'dependency'  => array( 'element' => 'autoplay', 'value' => array('1') ),
                'group' => 'Slider Configuration',
          ),
          array(
              'type' => 'dropdown',
              'heading' => __('Slide Delay Time', 'hcode-addons'),
              'param_name' => 'slidespeed',
              'value' => array(__('Select Slide Delay Time', 'hcode-addons') => '',
                               __('500', 'hcode-addons') => '500',
                               __('600', 'hcode-addons') => '600',
                               __('700', 'hcode-addons') => '700',
                               __('800', 'hcode-addons') => '800',
                               __('900', 'hcode-addons') => '900',
                               __('1000', 'hcode-addons') => '1000',
                               __('1100', 'hcode-addons') => '1100',
                               __('1200', 'hcode-addons') => '1200',
                               __('1300', 'hcode-addons') => '1300',
                               __('1400', 'hcode-addons') => '1400',
                               __('1500', 'hcode-addons') => '1500',
                               __('2000', 'hcode-addons') => '2000',
                               __('3000', 'hcode-addons') => '3000',
                               __('4000', 'hcode-addons') => '4000',
                               __('5000', 'hcode-addons') => '5000',
                               __('6000', 'hcode-addons') => '6000',
                               __('7000', 'hcode-addons') => '7000',
                               __('8000', 'hcode-addons') => '8000',
                               __('9000', 'hcode-addons') => '9000',
                               __('10000', 'hcode-addons') => '10000',
                               __('Custom', 'hcode-addons') => 'custom',
                              ),
              'std' => '3000',
              'description' => __('Select slide delay time (1ms = 100)', 'hcode-addons'),
               'dependency'  => array( 'element' => 'autoplay', 'value' => array('1') ),
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
                               __('500', 'hcode-addons') => '500',
                               __('600', 'hcode-addons') => '600',
                               __('700', 'hcode-addons') => '700',
                               __('800', 'hcode-addons') => '800',
                               __('900', 'hcode-addons') => '900',
                               __('1000', 'hcode-addons') => '1000',
                               __('1100', 'hcode-addons') => '1100',
                               __('1200', 'hcode-addons') => '1200',
                               __('1300', 'hcode-addons') => '1300',
                               __('1400', 'hcode-addons') => '1400',
                               __('1500', 'hcode-addons') => '1500',
                               __('2000', 'hcode-addons') => '2000',
                               __('3000', 'hcode-addons') => '3000',
                               __('4000', 'hcode-addons') => '4000',
                               __('5000', 'hcode-addons') => '5000',
                               __('6000', 'hcode-addons') => '6000',
                               __('7000', 'hcode-addons') => '7000',
                               __('8000', 'hcode-addons') => '8000',
                               __('9000', 'hcode-addons') => '9000',
                               __('10000', 'hcode-addons') => '10000',
                               __('Custom', 'hcode-addons') => 'custom',
                              ),
              'std' => '700',
              'description' => __('Select slide speed', 'hcode-addons'),
              'dependency'  => array( 'element' => 'autoplay', 'value' => array('1') ),
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
             'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1','hcode-bootstrap-content-slider1','hcode-bootstrap-content-slider2','hcode-bootstrap-content-slider3') ),
             'group'       => 'Slider ID & Class'
          ),
          array(
             'type'        => 'textfield',
             'heading'     => __('Slider Extra Class', 'hcode-addons' ),
             'description' => 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2"',
             'param_name'  => 'hcode_slider_class',
             'dependency' => array( 'element' => 'slider_content_premade_style', 'value' => array('hcode-owl-content-slider1','hcode-bootstrap-content-slider1','hcode-bootstrap-content-slider2','hcode-bootstrap-content-slider3') ),
             'group'       => 'Slider ID & Class'
          ),
      ),
  )
);
vc_map( 
  array(
      'name' => __('Add Slide', 'hcode-addons'),
      'base' => 'hcode_special_slide_content',
      'description' => __( 'A slide for the content slider.', 'hcode-addons' ),
      'as_child' => array('only' => 'hcode_content_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
      'icon' => 'fas fa-align-center h-code-shortcode-icon', //URL or CSS class with icon image.
      'params' => array(
          array(
              'type' => 'attach_image',
              'heading' => __('Background Slide Image', 'hcode-addons'),
              'param_name' => 'hcode_content_slider_image',
          ),
          array(
              'type' => 'attach_image',
              'heading' => __('Discount Image', 'hcode-addons'),
              'param_name' => 'hcode_content_discount_image',
              'description' => __( 'Work only for Spa Case Study Slider', 'hcode-addons' ),
          ),
          array(
              'type' => 'textfield',
              'heading' => __('Number', 'hcode-addons'),
              'param_name' => 'hcode_content_slider_number',
              'description' => __('Number will not apply for Spa Case Study Slider', 'hcode-addons'),
          ),
          array(
              'type' => 'textfield',
              'admin_label' => true,
              'heading' => __('Title', 'hcode-addons'),
              'param_name' => 'hcode_content_slider_title'
          ),
          array(
              'type' => 'textfield',
              'admin_label' => true,
              'heading' => __('SubTitle', 'hcode-addons'),
              'param_name' => 'hcode_content_slider_subtitle'
          ),
          array(
              'type' => 'textarea_html',
              'heading' => __('Content', 'hcode-addons'),
              'param_name' => 'content'
          ),
          array(
            'type'        => 'vc_link',
            'heading'     => __('Button config', 'hcode-addons' ),
            'param_name'  => 'button_config',
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Number Color', 'hcode-addons' ),
            'param_name' => 'number_color',
            'group' => 'Configuration',
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'hcode-addons' ),
            'param_name' => 'title_color',
            'group' => 'Configuration',
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Subtitle Color', 'hcode-addons' ),
            'param_name' => 'subtitle_color',
            'group' => 'Configuration',
          ),
          array(
            'type'        => 'hcode_button_settings',
            'param_name'  => 'button_config_settings',
            'heading'     => esc_html__( 'Button Configuration', 'hcode-addons' ),
            'group' => 'Button Configuration',
            'description' => __( 'You can easily set button text-transform, font-size, line-height, letter-spacing for all devices ', 'hcode-addons' ),
            'hide_font_settings_element'=>array('icon-color','icon-hover-color')
          ),
          array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'hcode_responsive_number_font',
            'heading'     => esc_html__( 'Font Settings For Number', 'hcode-addons' ),
            'hide_font_settings_element_lg' => array('text-align','font-transform'),
            'hide_font_settings_element_md' => array('text-align','font-transform'),
            'hide_font_settings_element_sm' => array('text-align','font-transform'),
            'hide_font_settings_element_xs' => array('text-align','font-transform'),
            'description' => __('Number will not apply for Spa Case Study Slider', 'hcode-addons'),
            'group' => 'Font Settings',
          ),
          array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'hcode_responsive_title_font',
            'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
            'group' => 'Font Settings',
          ),
          array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'hcode_responsive_subtitle_font',
            'heading'     => esc_html__( 'Font Settings For Subtitle', 'hcode-addons' ),
            'group' => 'Font Settings',
          ),
          array(
            'type' => 'hcode_custom_srcset',
            'param_name' => 'hcode_dis_image_srcset',
            'heading' => __('Discount Image SRCSET', 'hcode-addons' ),
            'value' => 'full',
            'group' => 'SRCSET',
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
/* Content Slider class*/
if(class_exists('WPBakeryShortCodesContainer')){ 
  class WPBakeryShortCode_hcode_content_slider extends WPBakeryShortCodesContainer { }
}
if(class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_hcode_special_slide_content extends WPBakeryShortCode { }
}