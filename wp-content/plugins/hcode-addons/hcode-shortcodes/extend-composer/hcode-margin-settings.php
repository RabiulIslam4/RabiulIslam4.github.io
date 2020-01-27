<?php
/**
 * H-Code Padding Settings For All Shortcode In VC.
 *
 * @package H-Code
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Hcode Desktop Margin */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_custom_desktop_margin', 'hcode_custom_desktop_margin_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_desktop_margin_callback' ) ) :
  function hcode_custom_desktop_margin_callback( $settings, $value ) {

     $output = '';

     $hcode_desktop_margin =array(
          esc_html__('Select Margin', 'hcode-addons') => '',
          esc_html__('Margin 0auto', 'hcode-addons') => 'margin-0auto',
          esc_html__('No Margin', 'hcode-addons') => 'no-margin',
          esc_html__('No Margin Top', 'hcode-addons') => 'no-margin-top',
          esc_html__('No Margin Bottom', 'hcode-addons') => 'no-margin-bottom',
          esc_html__('No Margin Left', 'hcode-addons') => 'no-margin-left',
          esc_html__('No Margin Right', 'hcode-addons') => 'no-margin-right',
          esc_html__('No Margin Left Right', 'hcode-addons') => 'no-margin-lr',
          esc_html__('Margin One', 'hcode-addons') => 'margin-one-all',
          esc_html__('Margin Two', 'hcode-addons') => 'margin-two-all',
          esc_html__('Margin Three', 'hcode-addons') => 'margin-three-all',
          esc_html__('Margin Four', 'hcode-addons') => 'margin-four-all',
          esc_html__('Margin Five', 'hcode-addons') => 'margin-five-all',
          esc_html__('Margin Six', 'hcode-addons') => 'margin-six-all',
          esc_html__('Margin Seven', 'hcode-addons') => 'margin-seven-all',
          esc_html__('Margin Eight', 'hcode-addons') => 'margin-eight-all',
          esc_html__('Margin Nine', 'hcode-addons') => 'margin-nine-all',
          esc_html__('Margin Ten', 'hcode-addons') => 'margin-ten-all',
          esc_html__('Margin Eleven', 'hcode-addons') => 'margin-eleven-all',
          esc_html__('Margin Twelve', 'hcode-addons') => 'margin-twelve-all',
          esc_html__('Margin Thirteen', 'hcode-addons') => 'margin-thirteen-all',
          esc_html__('Margin One Top', 'hcode-addons') => 'margin-one-top',
          esc_html__('Margin Two Top', 'hcode-addons') => 'margin-two-top',
          esc_html__('Margin Three Top', 'hcode-addons') => 'margin-three-top',
          esc_html__('Margin Four Top', 'hcode-addons') => 'margin-four-top',
          esc_html__('Margin Five Top', 'hcode-addons') => 'margin-five-top',
          esc_html__('Margin Six Top', 'hcode-addons') => 'margin-six-top',
          esc_html__('Margin Seven Top', 'hcode-addons') => 'margin-seven-top',
          esc_html__('Margin Eight Top', 'hcode-addons') => 'margin-eight-top',
          esc_html__('Margin Nine Top', 'hcode-addons') => 'margin-nine-top',
          esc_html__('Margin Ten Top', 'hcode-addons') => 'margin-ten-top',
          esc_html__('Margin Eleven Top', 'hcode-addons') => 'margin-eleven-top',
          esc_html__('Margin Twelve Top', 'hcode-addons') => 'margin-twelve-top',
          esc_html__('Margin Thirteen Top', 'hcode-addons') => 'margin-thirteen-top',
          esc_html__('Margin One Bottom', 'hcode-addons') => 'margin-one-bottom',
          esc_html__('Margin Two Bottom', 'hcode-addons') => 'margin-two-bottom',
          esc_html__('Margin Three Bottom', 'hcode-addons') => 'margin-three-bottom',
          esc_html__('Margin Four Bottom', 'hcode-addons') => 'margin-four-bottom',
          esc_html__('Margin Five Bottom', 'hcode-addons') => 'margin-five-bottom',
          esc_html__('Margin Six Bottom', 'hcode-addons') => 'margin-six-bottom',
          esc_html__('Margin Seven Bottom', 'hcode-addons') => 'margin-seven-bottom',
          esc_html__('Margin Eight Bottom', 'hcode-addons') => 'margin-eight-bottom',
          esc_html__('Margin Nine Bottom', 'hcode-addons') => 'margin-nine-bottom',
          esc_html__('Margin Ten Bottom', 'hcode-addons') => 'margin-ten-bottom',
          esc_html__('Margin Eleven Bottom', 'hcode-addons') => 'margin-eleven-bottom',
          esc_html__('Margin Twelve Bottom', 'hcode-addons') => 'margin-twelve-bottom',
          esc_html__('Margin Thirteen Bottom', 'hcode-addons') => 'margin-thirteen-bottom',
          esc_html__('Margin Left One', 'hcode-addons') => 'margin-left-one',
          esc_html__('Margin Left Two', 'hcode-addons') => 'margin-left-two',
          esc_html__('Margin Left Three', 'hcode-addons') => 'margin-left-three',
          esc_html__('Margin Left Four', 'hcode-addons') => 'margin-left-four',
          esc_html__('Margin Left Five', 'hcode-addons') => 'margin-left-five',
          esc_html__('Margin Left Six', 'hcode-addons') => 'margin-left-six',
          esc_html__('Margin Left Seven', 'hcode-addons') => 'margin-left-seven',
          esc_html__('Margin Left Eight', 'hcode-addons') => 'margin-left-eight',
          esc_html__('Margin Left Nine', 'hcode-addons') => 'margin-left-nine',
          esc_html__('Margin Left Ten', 'hcode-addons') => 'margin-left-ten',
          esc_html__('Margin Left Eleven', 'hcode-addons') => 'margin-left-eleven',
          esc_html__('Margin Left Twelve', 'hcode-addons') => 'margin-left-twelve',
          esc_html__('Margin Left Thirteen', 'hcode-addons') => 'margin-left-thirteen',
          esc_html__('Margin Left Twenty Two', 'hcode-addons') => 'margin-left-twentytwo',
          esc_html__('Margin Right One', 'hcode-addons') => 'margin-right-one',
          esc_html__('Margin Right Two', 'hcode-addons') => 'margin-right-two',
          esc_html__('Margin Right Three', 'hcode-addons') => 'margin-right-three',
          esc_html__('Margin Right Four', 'hcode-addons') => 'margin-right-four',
          esc_html__('Margin Right Five', 'hcode-addons') => 'margin-right-five',
          esc_html__('Margin Right Six', 'hcode-addons') => 'margin-right-six',
          esc_html__('Margin Right Seven', 'hcode-addons') => 'margin-right-seven',
          esc_html__('Margin Right Eight', 'hcode-addons') => 'margin-right-eight',
          esc_html__('Margin Right Nine', 'hcode-addons') => 'margin-right-nine',
          esc_html__('Margin Right Ten', 'hcode-addons') => 'margin-right-ten',
          esc_html__('Margin Right Eleven', 'hcode-addons') => 'margin-right-eleven',
          esc_html__('Margin Right Twelve', 'hcode-addons') => 'margin-right-twelve',
          esc_html__('Margin Right Thirteen', 'hcode-addons') => 'margin-right-thirteen',
          esc_html__('Margin Right Twenty Two', 'hcode-addons') => 'margin-right-twentytwo',
          esc_html__('Margin Bottom 40px', 'hcode-addons') => 'margin-bottom-40px',
          esc_html__('Margin Bottom 80px', 'hcode-addons') => 'margin-bottom-80px',
          esc_html__('Margin Bottom 15px', 'hcode-addons') => 'margin-bottom-15px',
          esc_html__('Margin Top 20px', 'hcode-addons') => 'margin-top-20px',
          esc_html__('Margin Bottom 30px', 'hcode-addons') => 'margin-bottom-30px',
          esc_html__('Margin Right 20px', 'hcode-addons') => 'margin-right-20px',
          esc_html__('Margin Right 25px', 'hcode-addons') => 'margin-right-25px',
          esc_html__('Margin Top 35px', 'hcode-addons') => 'margin-top-35px',
          esc_html__('Margin Top 80px Bottom 70px', 'hcode-addons') => 'margin-top-80px-bottom-70px',
          esc_html__('Margin lr 20px', 'hcode-addons') => 'margin-lr-20px',
          esc_html__('Margin lr 10px', 'hcode-addons') => 'margin-lr-10px',
          esc_html__('Margin Top 30px', 'hcode-addons') => 'margin-top-30px',
          esc_html__('Margin Top 81px', 'hcode-addons') => 'margin-top-81px',
          esc_html__('Margin Top 80px', 'hcode-addons') => 'margin-top-80px',
          esc_html__('Margin Top Bottom 30px', 'hcode-addons') => 'margin-tb-30px',
          esc_html__('Margin Bottom 45px', 'hcode-addons') => 'margin-bottom-45px',
          esc_html__('Margin One Top Bottom', 'hcode-addons') => 'margin-one',
          esc_html__('Margin Two Top Bottom', 'hcode-addons') => 'margin-two',
          esc_html__('Margin Three Top Bottom', 'hcode-addons') => 'margin-three',
          esc_html__('Margin Four Top Bottom', 'hcode-addons') => 'margin-four',
          esc_html__('Margin Five Top Bottom', 'hcode-addons') => 'margin-five',
          esc_html__('Margin Six Top Bottom', 'hcode-addons') => 'margin-six',
          esc_html__('Margin Seven Top Bottom', 'hcode-addons') => 'margin-seven',
          esc_html__('Margin Eight Top Bottom', 'hcode-addons') => 'margin-eight',
          esc_html__('Margin Nine Top Bottom', 'hcode-addons') => 'margin-nine',
          esc_html__('Margin Ten Top Bottom', 'hcode-addons') => 'margin-ten',
          esc_html__('Margin Eleven Top Bottom', 'hcode-addons') => 'margin-eleven',
          esc_html__('Margin Twelve Top Bottom', 'hcode-addons') => 'margin-twelve',
          esc_html__('Margin Thirteen Top Bottom', 'hcode-addons') => 'margin-thirteen',
          esc_html__('Margin Twentytwo Top Bottom', 'hcode-addons') => 'margin-twentytwo',
          esc_html__('Custom', 'hcode-addons') => 'custom-desktop-margin',
     );

     $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-desktop-custom-margin-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

     $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-desktop-custom-margin-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
     foreach ( $hcode_desktop_margin as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
     }
     $output .= '</select>';

     return $output;
}
endif;


/*-----------------------------------------------------------------------------------*/
/* Hcode Ipad Margin */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_custom_ipad_margin', 'hcode_custom_ipad_margin_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_ipad_margin_callback' ) ) :
  function hcode_custom_ipad_margin_callback( $settings, $value ) {

     $output = '';

     $hcode_ipad_margin =array(
          esc_html__('Select Margin', 'hcode-addons') => '',
          esc_html__('Margin 0auto', 'hcode-addons') => 'sm-margin-0auto',
          esc_html__('No Margin', 'hcode-addons') => 'sm-no-margin',
          esc_html__('No Margin Top', 'hcode-addons') => 'sm-no-margin-top',
          esc_html__('No Margin Bottom', 'hcode-addons') => 'sm-no-margin-bottom',
          esc_html__('No Margin Left', 'hcode-addons') => 'sm-no-margin-left',
          esc_html__('No Margin Right', 'hcode-addons') => 'sm-no-margin-right',
          esc_html__('No Margin Left Right', 'hcode-addons') => 'sm-no-margin-lr',
          esc_html__('Margin One', 'hcode-addons') => 'sm-margin-one-all',
          esc_html__('Margin Two', 'hcode-addons') => 'sm-margin-two-all',
          esc_html__('Margin Three', 'hcode-addons') => 'sm-margin-three-all',
          esc_html__('Margin Four', 'hcode-addons') => 'sm-margin-four-all',
          esc_html__('Margin Five', 'hcode-addons') => 'sm-margin-five-all',
          esc_html__('Margin Six', 'hcode-addons') => 'sm-margin-six-all',
          esc_html__('Margin Seven', 'hcode-addons') => 'sm-margin-seven-all',
          esc_html__('Margin Eight', 'hcode-addons') => 'sm-margin-eight-all',
          esc_html__('Margin Nine', 'hcode-addons') => 'sm-margin-nine-all',
          esc_html__('Margin Ten', 'hcode-addons') => 'sm-margin-ten-all',
          esc_html__('Margin Eleven', 'hcode-addons') => 'sm-margin-eleven-all',
          esc_html__('Margin Twelve', 'hcode-addons') => 'sm-margin-twelve-all',
          esc_html__('Margin Thirteen', 'hcode-addons') => 'sm-margin-thirteen-all',
          esc_html__('Margin One Top', 'hcode-addons') => 'sm-margin-one-top',
          esc_html__('Margin Two Top', 'hcode-addons') => 'sm-margin-two-top',
          esc_html__('Margin Three Top', 'hcode-addons') => 'sm-margin-three-top',
          esc_html__('Margin Four Top', 'hcode-addons') => 'sm-margin-four-top',
          esc_html__('Margin Five Top', 'hcode-addons') => 'sm-margin-five-top',
          esc_html__('Margin Six Top', 'hcode-addons') => 'sm-margin-six-top',
          esc_html__('Margin Seven Top', 'hcode-addons') => 'sm-margin-seven-top',
          esc_html__('Margin Eight Top', 'hcode-addons') => 'sm-margin-eight-top',
          esc_html__('Margin Nine Top', 'hcode-addons') => 'sm-margin-nine-top',
          esc_html__('Margin Ten Top', 'hcode-addons') => 'sm-margin-ten-top',
          esc_html__('Margin Eleven Top', 'hcode-addons') => 'sm-margin-eleven-top',
          esc_html__('Margin Twelve Top', 'hcode-addons') => 'sm-margin-twelve-top',
          esc_html__('Margin Thirteen Top', 'hcode-addons') => 'sm-margin-thirteen-top',
          esc_html__('Margin One Bottom', 'hcode-addons') => 'sm-margin-one-bottom',
          esc_html__('Margin Two Bottom', 'hcode-addons') => 'sm-margin-two-bottom',
          esc_html__('Margin Three Bottom', 'hcode-addons') => 'sm-margin-three-bottom',
          esc_html__('Margin Four Bottom', 'hcode-addons') => 'sm-margin-four-bottom',
          esc_html__('Margin Five Bottom', 'hcode-addons') => 'sm-margin-five-bottom',
          esc_html__('Margin Six Bottom', 'hcode-addons') => 'sm-margin-six-bottom',
          esc_html__('Margin Seven Bottom', 'hcode-addons') => 'sm-margin-seven-bottom',
          esc_html__('Margin Eight Bottom', 'hcode-addons') => 'sm-margin-eight-bottom',
          esc_html__('Margin Nine Bottom', 'hcode-addons') => 'sm-margin-nine-bottom',
          esc_html__('Margin Ten Bottom', 'hcode-addons') => 'sm-margin-ten-bottom',
          esc_html__('Margin Eleven Bottom', 'hcode-addons') => 'sm-margin-eleven-bottom',
          esc_html__('Margin Twelve Bottom', 'hcode-addons') => 'sm-margin-twelve-bottom',
          esc_html__('Margin Thirteen Bottom', 'hcode-addons') => 'sm-margin-thirteen-bottom',
          esc_html__('Margin Bottom 40px', 'hcode-addons') => 'sm-margin-bottom-40px',
          esc_html__('Margin Bottom 80px', 'hcode-addons') => 'sm-margin-bottom-80px',
          esc_html__('Margin Top 20px', 'hcode-addons') => 'sm-margin-top-20px',
          esc_html__('Margin Right 20px', 'hcode-addons') => 'sm-margin-right-20px',
          esc_html__('Margin Right 25px', 'hcode-addons') => 'sm-margin-right-25px',
          esc_html__('Margin Top 35px', 'hcode-addons') => 'sm-margin-top-35px',
          esc_html__('Margin Bottom 30px', 'hcode-addons') => 'sm-margin-bottom-30px',
          esc_html__('Margin lr 20px', 'hcode-addons') => 'sm-margin-lr-20px',
          esc_html__('Margin lr 10px', 'hcode-addons') => 'sm-margin-lr-10px',
          esc_html__('Margin Top 30px', 'hcode-addons') => 'sm-margin-top-30px',
          esc_html__('Margin One Top Bottom', 'hcode-addons') => 'sm-margin-one',
          esc_html__('Margin Two Top Bottom', 'hcode-addons') => 'sm-margin-two',
          esc_html__('Margin Three Top Bottom', 'hcode-addons') => 'sm-margin-three',
          esc_html__('Margin Four Top Bottom', 'hcode-addons') => 'sm-margin-four',
          esc_html__('Margin Five Top Bottom', 'hcode-addons') => 'sm-margin-five',
          esc_html__('Margin Six Top Bottom', 'hcode-addons') => 'sm-margin-six',
          esc_html__('Margin Seven Top Bottom', 'hcode-addons') => 'sm-margin-seven',
          esc_html__('Margin Eight Top Bottom', 'hcode-addons') => 'sm-margin-eight',
          esc_html__('Margin Nine Top Bottom', 'hcode-addons') => 'sm-margin-nine',
          esc_html__('Margin Ten Top Bottom', 'hcode-addons') => 'sm-margin-ten',
          esc_html__('Margin Eleven Top Bottom', 'hcode-addons') => 'sm-margin-eleven',
          esc_html__('Margin Twelve Top Bottom', 'hcode-addons') => 'sm-margin-twelve',
          esc_html__('Margin Thirteen Top Bottom', 'hcode-addons') => 'sm-margin-thirteen',
          esc_html__('Margin Twentytwo Top Bottom', 'hcode-addons') => 'sm-margin-twentytwo',
          esc_html__('Custom', 'hcode-addons') => 'custom-ipad-margin',
     );

     $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-ipad-custom-margin-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

     $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-ipad-custom-margin-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
     foreach ( $hcode_ipad_margin as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
     }
     $output .= '</select>';

     return $output;
}
endif;

/*-----------------------------------------------------------------------------------*/
/* Hcode Ipad Margin */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_custom_mobile_margin', 'hcode_custom_mobile_margin_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_mobile_margin_callback' ) ) :
  function hcode_custom_mobile_margin_callback( $settings, $value ) {

     $output = '';

     $hcode_mobile_margin =array(
          esc_html__('Select Margin', 'hcode-addons') => '',
          esc_html__('Margin 0auto', 'hcode-addons') => 'xs-margin-0auto',
          esc_html__('No Margin', 'hcode-addons') => 'xs-no-margin',
          esc_html__('No Margin Top', 'hcode-addons') => 'xs-no-margin-top',
          esc_html__('No Margin Bottom', 'hcode-addons') => 'xs-no-margin-bottom',
          esc_html__('No Margin Left', 'hcode-addons') => 'xs-no-margin-left',
          esc_html__('No Margin Right', 'hcode-addons') => 'xs-no-margin-right',
          esc_html__('No Margin Left Right', 'hcode-addons') => 'xs-no-margin-lr',
          esc_html__('Margin One', 'hcode-addons') => 'xs-margin-one-all',
          esc_html__('Margin Two', 'hcode-addons') => 'xs-margin-two-all',
          esc_html__('Margin Three', 'hcode-addons') => 'xs-margin-three-all',
          esc_html__('Margin Four', 'hcode-addons') => 'xs-margin-four-all',
          esc_html__('Margin Five', 'hcode-addons') => 'xs-margin-five-all',
          esc_html__('Margin Six', 'hcode-addons') => 'xs-margin-six-all',
          esc_html__('Margin Seven', 'hcode-addons') => 'xs-margin-seven-all',
          esc_html__('Margin Eight', 'hcode-addons') => 'xs-margin-eight-all',
          esc_html__('Margin Nine', 'hcode-addons') => 'xs-margin-nine-all',
          esc_html__('Margin Ten', 'hcode-addons') => 'xs-margin-ten-all',
          esc_html__('Margin Eleven', 'hcode-addons') => 'xs-margin-eleven-all',
          esc_html__('Margin Twelve', 'hcode-addons') => 'xs-margin-twelve-all',
          esc_html__('Margin Thirteen', 'hcode-addons') => 'xs-margin-thirteen-all',
          esc_html__('Margin One Top', 'hcode-addons') => 'xs-margin-one-top',
          esc_html__('Margin Two Top', 'hcode-addons') => 'xs-margin-two-top',
          esc_html__('Margin Three Top', 'hcode-addons') => 'xs-margin-three-top',
          esc_html__('Margin Four Top', 'hcode-addons') => 'xs-margin-four-top',
          esc_html__('Margin Five Top', 'hcode-addons') => 'xs-margin-five-top',
          esc_html__('Margin Six Top', 'hcode-addons') => 'xs-margin-six-top',
          esc_html__('Margin Seven Top', 'hcode-addons') => 'xs-margin-seven-top',
          esc_html__('Margin Eight Top', 'hcode-addons') => 'xs-margin-eight-top',
          esc_html__('Margin Nine Top', 'hcode-addons') => 'xs-margin-nine-top',
          esc_html__('Margin Ten Top', 'hcode-addons') => 'xs-margin-ten-top',
          esc_html__('Margin Eleven Top', 'hcode-addons') => 'xs-margin-eleven-top',
          esc_html__('Margin Twelve Top', 'hcode-addons') => 'xs-margin-twelve-top',
          esc_html__('Margin Thirteen Top', 'hcode-addons') => 'xs-margin-thirteen-top',
          esc_html__('Margin One Bottom', 'hcode-addons') => 'xs-margin-one-bottom',
          esc_html__('Margin Two Bottom', 'hcode-addons') => 'xs-margin-two-bottom',
          esc_html__('Margin Three Bottom', 'hcode-addons') => 'xs-margin-three-bottom',
          esc_html__('Margin Four Bottom', 'hcode-addons') => 'xs-margin-four-bottom',
          esc_html__('Margin Five Bottom', 'hcode-addons') => 'xs-margin-five-bottom',
          esc_html__('Margin Six Bottom', 'hcode-addons') => 'xs-margin-six-bottom',
          esc_html__('Margin Seven Bottom', 'hcode-addons') => 'xs-margin-seven-bottom',
          esc_html__('Margin Eight Bottom', 'hcode-addons') => 'xs-margin-eight-bottom',
          esc_html__('Margin Nine Bottom', 'hcode-addons') => 'xs-margin-nine-bottom',
          esc_html__('Margin Ten Bottom', 'hcode-addons') => 'xs-margin-ten-bottom',
          esc_html__('Margin Eleven Bottom', 'hcode-addons') => 'xs-margin-eleven-bottom',
          esc_html__('Margin Twelve Bottom', 'hcode-addons') => 'xs-margin-twelve-bottom',
          esc_html__('Margin Thirteen Bottom', 'hcode-addons') => 'xs-margin-thirteen-bottom',
          esc_html__('Margin Top 20px', 'hcode-addons') => 'xs-margin-top-20px',
          esc_html__('Margin Bottom 20px', 'hcode-addons') => 'xs-margin-bottom-20px',
          esc_html__('Margin Bottom 10px', 'hcode-addons') => 'xs-margin-bottom-10px',
          esc_html__('Margin Right 20px', 'hcode-addons') => 'xs-margin-right-20px',
          esc_html__('Margin Right 25px', 'hcode-addons') => 'xs-margin-right-25px',
          esc_html__('Margin Bottom 30px', 'hcode-addons') => 'xs-margin-bottom-30px',
          esc_html__('Margin Top 35px', 'hcode-addons') => 'xs-margin-top-35px',
          esc_html__('Margin lr 20px', 'hcode-addons') => 'xs-margin-lr-20px',
          esc_html__('Margin lr 10px', 'hcode-addons') => 'xs-margin-lr-10px',
          esc_html__('Margin Top 30px', 'hcode-addons') => 'xs-margin-top-30px',
          esc_html__('Margin Top 55px', 'hcode-addons') => 'xs-margin-top-55px',
          esc_html__('Margin One Top Bottom', 'hcode-addons') => 'xs-margin-one',
          esc_html__('Margin Two Top Bottom', 'hcode-addons') => 'xs-margin-two',
          esc_html__('Margin Three Top Bottom', 'hcode-addons') => 'xs-margin-three',
          esc_html__('Margin Four Top Bottom', 'hcode-addons') => 'xs-margin-four',
          esc_html__('Margin Five Top Bottom', 'hcode-addons') => 'xs-margin-five',
          esc_html__('Margin Six Top Bottom', 'hcode-addons') => 'xs-margin-six',
          esc_html__('Margin Seven Top Bottom', 'hcode-addons') => 'xs-margin-seven',
          esc_html__('Margin Eight Top Bottom', 'hcode-addons') => 'xs-margin-eight',
          esc_html__('Margin Nine Top Bottom', 'hcode-addons') => 'xs-margin-nine',
          esc_html__('Margin Ten Top Bottom', 'hcode-addons') => 'xs-margin-ten',
          esc_html__('Margin Eleven Top Bottom', 'hcode-addons') => 'xs-margin-eleven',
          esc_html__('Margin Twelve Top Bottom', 'hcode-addons') => 'xs-margin-twelve',
          esc_html__('Margin Thirteen Top Bottom', 'hcode-addons') => 'xs-margin-thirteen',
          esc_html__('Margin Twentytwo Top Bottom', 'hcode-addons') => 'xs-margin-twentytwo',
          esc_html__('Custom', 'hcode-addons') => 'custom-mobile-margin',
     );

     $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-mobile-custom-margin-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

     $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-mobile-custom-margin-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
     foreach ( $hcode_mobile_margin as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
     }
     $output .= '</select>';

     return $output;
}
endif;