<?php
/**
 * Map For Career
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Career */
/*-----------------------------------------------------------------------------------*/
vc_map( array(
  'name' => __('Career Content Block', 'hcode-addons'),
  'description' => __( 'Place a career content block', 'hcode-addons' ),  
  'icon' => 'far fa-list-alt h-code-shortcode-icon',
  'base' => 'hcode_career',
  'category' => 'H-Code',
  'params' => array(
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Show Left Section', 'hcode-addons'),
        'param_name' => 'hcode_career_left',
        'value' => array(__('OFF', 'hcode-addons') => '0', 
                         __('ON', 'hcode-addons') => '1',
                        ),
        'description' => __( 'Select ON to show left section', 'hcode-addons' ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Number Text', 'hcode-addons'),
        'param_name' => 'hcode_career_number',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
    ),
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Show Separator', 'hcode-addons'),
        'param_name' => 'hcode_career_show_separator',
        'value' => array(__('OFF', 'hcode-addons') => '0', 
                         __('ON', 'hcode-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Job Title', 'hcode-addons'),
        'param_name' => 'hcode_career_job_title',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Job Experience', 'hcode-addons'),
        'param_name' => 'hcode_career_job_experince',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
    ),
    array(
        'type'        => 'vc_link',
        'heading'     => __('Button Config', 'hcode-addons' ),
        'param_name'  => 'hcode_career_apply_now',
        'admin_label' => true,
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Urgent Job Text', 'hcode-addons'),
        'param_name' => 'hcode_career_urgent_job',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
    ),  
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Show Middle Section', 'hcode-addons'),
        'param_name' => 'hcode_career_right',
        'value' => array(__('OFF', 'hcode-addons') => '0', 
                         __('ON', 'hcode-addons') => '1'
                        ),
        'description' => __( 'Select ON to show middle section', 'hcode-addons' ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Overview Title', 'hcode-addons'),
        'param_name' => 'hcode_career_overview_title',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
    ),
    array(
        'type' => 'textarea',
        'heading' => __('Overview Content', 'hcode-addons'),
        'param_name' => 'hcode_career_overview_content',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Responsibilities', 'hcode-addons'),
        'param_name' => 'hcode_career_responsibilities_title',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
    ),
    
    array(
        'type' => 'textarea',
        'heading' => __('Responsibilities Content', 'hcode-addons'),
        'param_name' => 'hcode_career_responsibilities_content',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Number Text Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_number_color',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Separator Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_show_separator_color',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Job Title Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_job_title_color',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Job Experience Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_job_experince_color',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Urgent Job Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_urgent_job_color',
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Overview Title Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_overview_title_color',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Overview Content Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_overview_content_color',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Responsibility Title Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_responsibility_title_color',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Responsibility Content Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_responsibility_content_color',
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Border Bottom Color', 'hcode-addons' ),
        'param_name' => 'hcode_career_border_bottom_color',
        'dependency'  => array( 'element' => 'hcode_career_bottom_separator', 'value' => array('1') ),
        'group' => 'Style',
    ),
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Show Bottom Separator', 'hcode-addons'),
        'param_name' => 'hcode_career_bottom_separator',
        'value' => array(__('OFF', 'hcode-addons') => '0', 
                         __('ON', 'hcode-addons') => '1'
                        ),
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
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Font Settings',
    ),
    array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_title_font',
        'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Font Settings',
    ),
    array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_experience_font',
        'heading'     => esc_html__( 'Font Settings For Experience', 'hcode-addons' ),
        'dependency'  => array( 'element' => 'hcode_career_left', 'value' => array('1') ),
        'group' => 'Font Settings',
    ),
    array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_overview_font',
        'heading'     => esc_html__( 'Font Settings For Overview / Responsibilities Title', 'hcode-addons' ),
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
        'group' => 'Font Settings',
    ),
    array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_content_font',
        'heading'     => esc_html__( 'Font Settings For Overview / Responsibilities Content', 'hcode-addons' ),
        'dependency'  => array( 'element' => 'hcode_career_right', 'value' => array('1') ),
        'group' => 'Font Settings',
    ),
    $hcode_vc_extra_id,
    $hcode_vc_extra_class,
  )
) );
