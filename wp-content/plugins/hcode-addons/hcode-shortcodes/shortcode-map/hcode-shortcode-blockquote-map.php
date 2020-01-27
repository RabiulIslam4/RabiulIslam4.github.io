<?php
/**
 * Map For Blockquote
 *
 * @package H-Code
 */
?>
<?php
vc_map( array(
  'name' => __('Blockquote', 'hcode-addons'),
  'description' => __( 'Create a blockquote', 'hcode-addons' ),  
  'icon' => 'h-code-shortcode-icon fas fa-quote-left',
  'base' => 'hcode_blockquote',
  'category' => 'H-Code',
  'params' => array(
        array(
          'type' => 'textarea_html',
          'heading' => __('Content', 'hcode-addons'),
          'param_name' => 'content',
        ),
        array(
          'type' => 'textfield',
          'admin_label' => true,
          'heading' => __('Heading Title', 'hcode-addons'),
          'param_name' => 'hcode_blockquote_heading',
        ),
       array(
          'type' => 'hcode_custom_switch_option',
          'class' => '',
          'heading' => __('Show Blockquote Icon', 'hcode-addons'),
          'param_name' => 'blockquote_icon',
          'value' => array(__('No', 'hcode-addons') => '0', 
                           __('Yes', 'hcode-addons') => '1'
                          ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => __( 'Blockquote Background Color', 'hcode-addons' ),
          'param_name' => 'hcode_blockquote_bg_color',
          'group' => 'Blockquote Style',
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => __( 'Blockquote Text Color', 'hcode-addons' ),
          'param_name' => 'hcode_blockquote_color',
          'group' => 'Blockquote Style',
        ),
        array(
          'type' => 'dropdown',
          'param_name' => 'hcode_border_position',
          'heading' => __('Border Position', 'hcode-addons' ),
          'value' => array(__('No Border', 'hcode-addons') => '',
                           __('Border Top', 'hcode-addons') => 'border-top',
                           __('Border Bottom', 'hcode-addons') => 'border-bottom',
                           __('Border Left', 'hcode-addons') => 'border-left',
                           __('Border Right', 'hcode-addons') => 'border-right',
                          ),
          'group' => 'Blockquote Style',
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => __( 'Border Color', 'hcode-addons' ),
          'param_name' => 'hcode_border_color',
          'dependency' => array( 'element' => 'hcode_border_position', 'not_empty' => true ),
          'group' => 'Blockquote Style',
        ),
        array(
          'type' => 'textfield',
          'heading' => __('Border Size', 'hcode-addons' ),
          'param_name' => 'hcode_border_size',
          'dependency' => array( 'element' => 'hcode_border_position', 'not_empty' => true ),
          'description' => __( 'Define border size like 2px', 'hcode-addons' ),
          'group' => 'Blockquote Style',
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
          'dependency' => array( 'element' => 'hcode_border_position', 'not_empty' => true ),
          'group' => 'Blockquote Style',
        ),
        array(
          'type' => 'hcode_custom_desktop_padding',
          'param_name' => 'desktop_padding',
          'heading' => __('Padding (For Desktop Device)', 'hcode-addons' ),
          'value' => '',
          'group' => 'Blockquote Style',
        ),
        array(
          'type' => 'textfield',
          'heading' => __('Custom Padding (For All Devices)', 'hcode-addons' ),
          'param_name' => 'custom_desktop_padding',
          'dependency' => array( 'element' => 'desktop_padding', 'value' => array('custom-desktop-padding') ),
          'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
          'group' => 'Blockquote Style',
        ),
        array(
          'type' => 'hcode_custom_desktop_margin',
          'param_name' => 'desktop_margin',
          'heading' => __('Margin (For Desktop Device)', 'hcode-addons' ),
          'value' => '',
          'group' => 'Blockquote Style',
          ),
        array(
          'type' => 'textfield',
          'heading' => __('Custom Margin (For All Devices)', 'hcode-addons' ),
          'param_name' => 'custom_desktop_margin',
          'dependency' => array( 'element' => 'desktop_margin', 'value' => array('custom-desktop-margin') ),
          'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
          'group' => 'Blockquote Style',
        ),
        array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'hcode_responsive_font',
            'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
            'group' => 'Blockquote Style',
        ),
        array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'hcode_responsive_font_content',
            'heading'     => esc_html__( 'Font Settings For Content', 'hcode-addons' ),
            'group' => 'Blockquote Style',
        ),
        $hcode_vc_extra_id,
        $hcode_vc_extra_class,
    )
) );