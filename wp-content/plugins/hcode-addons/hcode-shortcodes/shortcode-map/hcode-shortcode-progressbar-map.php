<?php
/**
 * Map For Progressbar
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Progressbar */
/*-----------------------------------------------------------------------------------*/

vc_map( 
array(
    'icon' => 'h-code-shortcode-icon fas fa-ellipsis-h',
    'name' => __( 'ProgressBar' , 'hcode-addons' ),
    'base' => 'hcode_progress',
    'category' => 'H-Code',
    'description' => __( 'Place a ProgressBar', 'hcode-addons' ),
    'as_parent' => array('only' => 'hcode_progress_content'),
    'content_element' => true,
    'show_settings_on_create' => true,
    'params'   => array(
        array(
            'type' => 'checkbox',
            'heading' => __('Show Width', 'hcode-addons'),
            'param_name' => 'progress_show_width',
            'value'       => array( 'Show Width of ProgressBar' => '1', )
        ),
        array(
          'type' => 'checkbox',
          'heading' => __('Title Inside ProgressBar', 'hcode-addons'),
          'param_name' => 'progress_show_inside_title',
          'value'       => array( 'Show Title Inside ProgressBar' => '1', )
        ),
    ),
    'js_view' => 'VcColumnView'
    ) );

vc_map( 
array(
    'icon' => 'h-code-shortcode-icon fas fa-ellipsis-h',
    'name' => __('Add ProgressBar', 'hcode-addons'),
    'description' => __( 'Add new ProgressBar', 'hcode-addons' ),
    'base' => 'hcode_progress_content',
    'content_element' => true,
    'as_child' => array('only' => 'hcode_progress'),
    'params' => array(
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => __( 'Title', 'hcode-addons' ),
                'param_name' => 'progress_title',
            ),
            array(
                'type' => 'textfield',
                'admin_label' => true,
                'heading' => __('Subtitle', 'hcode-addons'),
                'param_name' => 'progress_subtitle'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Height', 'hcode-addons'),
                'description' => __( 'Define Height of Progressbar in numeric value like 2', 'hcode-addons' ),
                'param_name' => 'progress_height'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Width', 'hcode-addons'),
                'description' => __( 'Define Width of Progressbar in numeric value like 80', 'hcode-addons' ),
                'param_name' => 'progress_width'
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => __( 'ProgressBar Color', 'hcode-addons' ),
              'param_name' => 'progress_color',
            ),
            array(
                'type' => 'checkbox',
                'heading' => __('Gradient', 'hcode-addons'),
                'param_name' => 'progress_show_gradient',
                'value'       => array( 'Show Gradient in ProgressBar' => '1', )
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hcode_responsive_title_font',
                'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
                'hide_font_settings_element_lg' => array('text-align'),
                'hide_font_settings_element_md' => array('text-align'),
                'hide_font_settings_element_sm' => array('text-align'),
                'hide_font_settings_element_xs' => array('text-align'),
                'group' => 'Font Settings',
            ),
            array(
                'type'        => 'responsive_font_settings',
                'param_name'  => 'hcode_responsive_subtitle_font',
                'heading'     => esc_html__( 'Font Settings For Subtitle', 'hcode-addons' ),
                'hide_font_settings_element_lg' => array('text-align'),
                'hide_font_settings_element_md' => array('text-align'),
                'hide_font_settings_element_sm' => array('text-align'),
                'hide_font_settings_element_xs' => array('text-align'),
                'group' => 'Font Settings',
            ),
        )  
  ) );
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_hcode_progress extends WPBakeryShortCodesContainer {}
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_hcode_progress_content extends WPBakeryShortCode {}
}