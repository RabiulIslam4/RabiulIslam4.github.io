<?php
/**
 * Map For Divider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Divider */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Divider', 'hcode-addons'),
  'description' => __( 'Add a divider with different options', 'hcode-addons' ),  
  'icon' => 'fas fa-arrows-alt-v h-code-shortcode-icon',
  'base' => 'hcode_divider',
  'category' => 'H-Code',
  'params' => array(
          array(
            'type' => 'dropdown',
            'admin_label' => true,
            'param_name' => 'hcode_row_border_position',
            'heading' => __('Row Border Position', 'hcode-addons' ),
            'value' => array(__('No Border', 'hcode-addons') => '',
                             __('Border Top', 'hcode-addons') => 'border-top',
                             __('Border Bottom', 'hcode-addons') => 'border-bottom',
                            ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => __( 'Border Color', 'hcode-addons' ),
            'param_name' => 'hcode_row_border_color',
            'dependency' => array( 'element' => 'hcode_row_border_position', 'value' => array('border-top','border-bottom') ),
          ),
          array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => __('Border Size', 'hcode-addons' ),
            'param_name' => 'hcode_border_size',
            'dependency' => array( 'element' => 'hcode_row_border_position', 'value' => array('border-top','border-bottom') ),
            'description' => __( 'Define border size like 2px', 'hcode-addons' ),
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'hcode_border_type',
            'heading' => __('Border Type', 'hcode-addons' ),
            'value' => array(__('no border', 'hcode-addons') => '',
                             __('Dotted', 'hcode-addons') => 'dotted',
                             __('Dashed', 'hcode-addons') => 'dashed',
                             __('Solid', 'hcode-addons') => 'solid',
                             __('Double', 'hcode-addons') => 'double',
                            ),
            'dependency' => array( 'element' => 'hcode_row_border_position', 'value' => array('border-top','border-bottom') ),
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
  )
) );