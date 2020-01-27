<?php
/**
 * H-Code SRCSET Settings For All Shortcode In VC.
 *
 * @package H-Code
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Hcode SRCSET */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_custom_srcset', 'hcode_custom_srcset_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_srcset_callback' ) ) :
  function hcode_custom_srcset_callback( $settings, $value ) {

      $output = '';

      $hcode_srcset = hcode_get_thumbnail_image_sizes();

      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-srcset-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-srcset-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . ' ' . $css_option
                 . '" data-option="' . $css_option . '">';
      foreach ( $hcode_srcset as $index => $data ) {
        $selected_val = ( $value == $data ) ? ' selected="selected"' : ''; 
        $output .= '<option class="" value="' . $data . '" title="'.$index.'"'.$selected_val.'>'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;