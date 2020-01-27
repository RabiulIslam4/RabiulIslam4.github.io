<?php
/**
 * H-Code Animation Settings For All Shortcode In VC.
 *
 * @package H-Code
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Hcode Animation */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_animation_style', 'hcode_animation_style_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_animation_style_callback' ) ) :
  function hcode_animation_style_callback( $settings, $value ) {

     $output = '';

     $hcode_animation_style = hcode_animation_style();

      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-animation-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-animation-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . ' ' . $css_option
                 . '" data-option="' . $css_option . '">';
      foreach ( $hcode_animation_style as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;