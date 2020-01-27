<?php
/**
 * Map For Accordian
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

$current_date = date('Y-m-d H:i:s'); ## Get current date
$timestamp = strtotime($current_date); ## Get timestamp of current date
$acc_id = $timestamp;
vc_map( 
array(
    'icon' => 'h-code-shortcode-icon fas fa-indent',
    'name' => __( 'Accordion' , 'hcode-addons' ),
    'base' => 'hcode_accordian',
    'category' => 'H-Code',
    'description' => __( 'Create an accordion', 'hcode-addons' ),
    'as_parent' => array('only' => 'hcode_accordian_content'),
    'content_element' => true,
    'show_settings_on_create' => true,
    'params'   => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => __( 'Accordion Pre-define style', 'hcode-addons' ),
            'param_name' => 'accordian_pre_define_style',
            'value' => array(__('Select Pre-define Style', 'hcode-addons') => '',
                      __('Accordion Style 1', 'hcode-addons') => 'accordion-style1',
                      __('Accordion Style 2', 'hcode-addons') => 'accordion-style2',
                      __('Accordion Style 3', 'hcode-addons') => 'accordion-style3',
                      __('Accordion Style 4', 'hcode-addons') => 'accordion-style4',
                      __('Toggle Style 1', 'hcode-addons') => 'toggles-style1',
                      __('Toggle Style 2', 'hcode-addons') => 'toggles-style2',
                      __('Toggle Style 3', 'hcode-addons') => 'toggles-style3',
            ),
            
        ),
        array(
          'type' => 'hcode_preview_image',
          'heading' => __('Select pre-made style', 'hcode-addons'),
          'param_name' => 'accordion_preview_image',
        ),
        array(
          'type' => 'hcode_custom_switch_option',
          'class' => '',
          'heading' => __('Toggle without border', 'hcode-addons'),
          'param_name' => 'without_border',
          'value' => array(__('No', 'hcode-addons') => '0', 
                           __('Yes', 'hcode-addons') => '1'
                          ),
          'description' => __( 'Select yes to add toggle without left / right border', 'hcode-addons' ),
          'dependency'  => array( 'element' => 'accordian_pre_define_style', 'value' => array('toggles-style3') ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'Id', 'hcode-addons' ),
          'param_name' => 'accordian_id',
          'value' => $acc_id,
        ),
    ),
    'js_view' => 'VcColumnView'
) );
vc_map( 
array(
    'icon' => 'h-code-shortcode-icon fas fa-indent',
    'name' => __('Add Accordion slides', 'hcode-addons'),
    'base' => 'hcode_accordian_content',
    'description' => __( 'A slide for the Accordion.', 'hcode-addons' ),
    'content_element' => true,
    'as_child' => array('only' => 'hcode_accordian'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => __('Active Slide', 'hcode-addons'),
            'param_name' => 'accordian_active',
            'value' => array(__('Select Active Slide', 'hcode-addons') => '',
                      __('No', 'hcode-addons') => '0',
                      __('Yes', 'hcode-addons') => '1',
          ),
        ),
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
          'heading' => __('Title Icon', 'hcode-addons' ),
          'param_name' => 'accordian_title_icon',
          'description' => __( 'select icon then it shows', 'hcode-addons' ),
          'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),
        ),
        array(
          'type' => 'textfield',
          'admin_label' => true,
          'heading' => __( 'Title', 'hcode-addons' ),
          'param_name' => 'accordian_title',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => __('Description', 'hcode-addons'),
            'param_name' => 'content'
        ),
        array(
            'type' => 'attach_image',
            'heading' => __('Image', 'hcode-addons' ),
            'param_name' => 'accordian_bg_image',
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => __('Button config', 'hcode-addons' ),
            'param_name'  => 'button_text',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Icon Color', 'hcode-addons' ),
            'param_name' => 'hcode_icon_color',
            'description' => __( 'Choose Icon Color', 'hcode-addons' ),
            'group' => 'Color Style',
        ),
        array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Title Color', 'hcode-addons' ),
            'param_name' => 'hcode_title_color',
            'description' => __( 'Choose Title Color', 'hcode-addons' ),
            'group' => 'Color Style',
        ),
        array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'hcode_responsive_font',
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
        array(
            'type' => 'hcode_custom_srcset',
            'param_name' => 'hcode_image_srcset',
            'heading' => __('Image SRCSET', 'hcode-addons' ),
            'value' => 'full',
            'group' => 'SRCSET',
        ),
      )  
  ) );
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_hcode_accordian extends WPBakeryShortCodesContainer {}
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_hcode_accordian_content extends WPBakeryShortCode {}
}