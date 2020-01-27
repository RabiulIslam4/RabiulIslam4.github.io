<?php
/**
 * Map For Icon List
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Icon List */
/*-----------------------------------------------------------------------------------*/
vc_map( 
  array(
    'name' => __('Font Icons List', 'hcode-addons'),
    'base' => 'hcode_font_class_list',
    'category' => 'H-Code',
    'description' => __( 'Add list of all font icons', 'hcode-addons' ),
    'icon' => 'fas fa-flag-checkered h-code-shortcode-icon', //URL or CSS class with icon image.
    'params' => array(
          array(
              'type' => 'dropdown',
              'holder' => 'div',
              'class' => '',
              'heading' => __('Icon List', 'hcode-addons'),
              'param_name' => 'hcode_font_icon_class_type',
              'value' => array(__('Select Icon List', 'hcode-addons') => '',
                       __('Font Awesome Icons', 'hcode-addons') => 'hcode_font_awesome_icons',
                               __('Et-line Icons', 'hcode-addons') => 'hcode_et_line_icons',
                              ),
          ),
          $hcode_vc_extra_id,
          $hcode_vc_extra_class,
        ),
    ) 
);