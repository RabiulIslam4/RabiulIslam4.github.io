<?php
/**
 * Map For Time Counter
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Time Counter */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Countdown Timer', 'hcode-addons'),
  'description' => __( 'Add a countdown timer', 'hcode-addons' ),
  'icon' => 'far fa-clock h-code-shortcode-icon',
  'base' => 'hcode_time_counter',
  'category' => 'H-Code',
  'params' => array(
    
    array(
      'type' => 'textfield',
      'admin_label' => true,
      'heading' => __('Enter Date', 'hcode-addons'),
      'param_name' => 'hcode_time_counter_date',
      'description' => __( 'Enter date like 12/31/2016 in date format mm/dd/yyyy', 'hcode-addons' ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => __( 'Counter Color', 'hcode-addons' ),
      'param_name' => 'hcode_time_counter_color',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Days Text', 'hcode-addons' ),
      'param_name' => 'hcode_time_counter_days_taxt',
      'value' => 'Day',
      'group' => 'Counter Text Configuration',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Hours Text', 'hcode-addons' ),
      'param_name' => 'hcode_time_counter_hours_taxt',
      'value' => 'Hours',
      'group' => 'Counter Text Configuration',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Minutes Text', 'hcode-addons' ),
      'param_name' => 'hcode_time_counter_minutes_taxt',
      'value' => 'Minutes',
      'group' => 'Counter Text Configuration',
    ),
    array(
      'type' => 'responsive_font_settings',
      'param_name' => 'hcode_time_counter_number_font_settings',
      'heading' => esc_html__( 'Font Settings For Number', 'hcode-addons' ),
      'group' => 'Font Settings',
    ),
    array(
      'type' => 'responsive_font_settings',
      'param_name' => 'hcode_time_counter_text_font_settings',
      'heading' => esc_html__( 'Font Settings For Text', 'hcode-addons' ),
      'group' => 'Font Settings',
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Seconds Text', 'hcode-addons' ),
      'param_name' => 'hcode_time_counter_seconds_taxt',
      'value' => 'Seconds',
      'group' => 'Counter Text Configuration',
    ),
    $hcode_vc_extra_id,
    $hcode_vc_extra_class,
  )
) );