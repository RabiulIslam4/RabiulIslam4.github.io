<?php
/**
 * H-Code Padding Settings For All Shortcode In VC.
 *
 * @package H-Code
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Hcode Desktop Padding */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_custom_desktop_padding', 'hcode_custom_desktop_padding_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_desktop_padding_callback' ) ) :
  function hcode_custom_desktop_padding_callback( $settings, $value ) {

      $output = '';

      $hcode_desktop_padding = array(
          esc_html__('Select Padding', 'hcode-addons') => '',
          esc_html__('No Padding', 'hcode-addons') => 'no-padding',
          esc_html__('No Padding Top', 'hcode-addons') => 'no-padding-top',
          esc_html__('No Padding Bottom', 'hcode-addons') => 'no-padding-bottom',
          esc_html__('No Padding Top Bottom', 'hcode-addons') => 'no-padding-tb',
          esc_html__('No Padding Left', 'hcode-addons') => 'no-padding-left',
          esc_html__('No Padding Right', 'hcode-addons') => 'no-padding-right',
          esc_html__('No Padding Left Right', 'hcode-addons') => 'no-padding-lr',
          esc_html__('Padding One', 'hcode-addons') => 'padding-one',
          esc_html__('Padding Two', 'hcode-addons') => 'padding-two',
          esc_html__('Padding Three', 'hcode-addons') => 'padding-three',
          esc_html__('Padding Four', 'hcode-addons') => 'padding-four',
          esc_html__('Padding Five', 'hcode-addons') => 'padding-five',
          esc_html__('Padding Six', 'hcode-addons') => 'padding-six',
          esc_html__('Padding Seven', 'hcode-addons') => 'padding-seven',
          esc_html__('Padding Eight', 'hcode-addons') => 'padding-eight',
          esc_html__('Padding Nine', 'hcode-addons') => 'padding-nine',
          esc_html__('Padding Ten', 'hcode-addons') => 'padding-ten',
          esc_html__('Padding Eleven', 'hcode-addons') => 'padding-eleven',
          esc_html__('Padding Twelve', 'hcode-addons') => 'padding-twelve',
          esc_html__('Padding Thirteen', 'hcode-addons') => 'padding-thirteen',
          esc_html__('Padding Twenty Two', 'hcode-addons') => 'padding-twentytwo',
          esc_html__('Padding Thirty Five','hcode-addons') => 'padding-thirtyfive',
          esc_html__('Padding One Top', 'hcode-addons') => 'padding-one-top',
          esc_html__('Padding Two Top', 'hcode-addons') => 'padding-two-top',
          esc_html__('Padding Three Top', 'hcode-addons') => 'padding-three-top',
          esc_html__('Padding Four Top', 'hcode-addons') => 'padding-four-top',
          esc_html__('Padding Five Top', 'hcode-addons') => 'padding-five-top',
          esc_html__('Padding Six Top', 'hcode-addons') => 'padding-six-top',
          esc_html__('Padding Seven Top', 'hcode-addons') => 'padding-seven-top',
          esc_html__('Padding Eight Top', 'hcode-addons') => 'padding-eight-top',
          esc_html__('Padding Nine Top', 'hcode-addons') => 'padding-nine-top',
          esc_html__('Padding Ten Top', 'hcode-addons') => 'padding-ten-top',
          esc_html__('Padding Eleven Top', 'hcode-addons') => 'padding-eleven-top',
          esc_html__('Padding Twelve Top', 'hcode-addons') => 'padding-twelve-top',
          esc_html__('Padding Thirteen Top', 'hcode-addons') => 'padding-thirteen-top',
          esc_html__('Padding Twenty Two Top', 'hcode-addons') => 'padding-twentytwo-top',
          esc_html__('Padding One Bottom', 'hcode-addons') => 'padding-one-bottom',
          esc_html__('Padding Two Bottom', 'hcode-addons') => 'padding-two-bottom',
          esc_html__('Padding Three Bottom', 'hcode-addons') => 'padding-three-bottom',
          esc_html__('Padding Four Bottom', 'hcode-addons') => 'padding-four-bottom',
          esc_html__('Padding Five Bottom', 'hcode-addons') => 'padding-five-bottom',
          esc_html__('Padding Six Bottom', 'hcode-addons') => 'padding-six-bottom',
          esc_html__('Padding Seven Bottom', 'hcode-addons') => 'padding-seven-bottom',
          esc_html__('Padding Eight Bottom', 'hcode-addons') => 'padding-eight-bottom',
          esc_html__('Padding Nine Bottom', 'hcode-addons') => 'padding-nine-bottom',
          esc_html__('Padding Ten Bottom', 'hcode-addons') => 'padding-ten-bottom',
          esc_html__('Padding Eleven Bottom', 'hcode-addons') => 'padding-eleven-bottom',
          esc_html__('Padding Twelve Bottom', 'hcode-addons') => 'padding-twelve-bottom',
          esc_html__('Padding Thirteen Bottom', 'hcode-addons') => 'padding-thirteen-bottom',
          esc_html__('Padding Twenty Two Bottom', 'hcode-addons') => 'padding-twentytwo-bottom',
          esc_html__('Padding Left One', 'hcode-addons') => 'padding-left-one',
          esc_html__('Padding Left Two', 'hcode-addons') => 'padding-left-two',
          esc_html__('Padding Left Three', 'hcode-addons') => 'padding-left-three',
          esc_html__('Padding Left Four', 'hcode-addons') => 'padding-left-four',
          esc_html__('Padding Left Five', 'hcode-addons') => 'padding-left-five',
          esc_html__('Padding Left Six', 'hcode-addons') => 'padding-left-six',
          esc_html__('Padding Left Seven', 'hcode-addons') => 'padding-left-seven',
          esc_html__('Padding Left Eight', 'hcode-addons') => 'padding-left-eight',
          esc_html__('Padding Left Nine', 'hcode-addons') => 'padding-left-nine',
          esc_html__('Padding Left Ten', 'hcode-addons') => 'padding-left-ten',
          esc_html__('Padding Left Eleven', 'hcode-addons') => 'padding-left-eleven',
          esc_html__('Padding Left Twelve', 'hcode-addons') => 'padding-left-twelve',
          esc_html__('Padding Left Thirteen', 'hcode-addons') => 'padding-left-thirteen',
          esc_html__('Padding Left Twenty Two', 'hcode-addons') => 'padding-left-twentytwo',
          esc_html__('Padding Right One', 'hcode-addons') => 'padding-right-one',
          esc_html__('Padding Right Two', 'hcode-addons') => 'padding-right-two',
          esc_html__('Padding Right Three', 'hcode-addons') => 'padding-right-three',
          esc_html__('Padding Right Four', 'hcode-addons') => 'padding-right-four',
          esc_html__('Padding Right Five', 'hcode-addons') => 'padding-right-five',
          esc_html__('Padding Right Six', 'hcode-addons') => 'padding-right-six',
          esc_html__('Padding Right Seven', 'hcode-addons') => 'padding-right-seven',
          esc_html__('Padding Right Eight', 'hcode-addons') => 'padding-right-eight',
          esc_html__('Padding Right Nine', 'hcode-addons') => 'padding-right-nine',
          esc_html__('Padding Right Ten', 'hcode-addons') => 'padding-right-ten',
          esc_html__('Padding Right Eleven', 'hcode-addons') => 'padding-right-eleven',
          esc_html__('Padding Right Twelve', 'hcode-addons') => 'padding-right-twelve',
          esc_html__('Padding Right Thirteen', 'hcode-addons') => 'padding-right-thirteen',
          esc_html__('Padding Right Twenty Two', 'hcode-addons') => 'padding-right-twentytwo',
          esc_html__('Padding lr 15px', 'hcode-addons') => 'padding-lr-15px',
          esc_html__('Padding Top Bottom 15px', 'hcode-addons') => 'padding-tb-15px',
          esc_html__('Padding Top 15px', 'hcode-addons') => 'padding-top-15px',
          esc_html__('Padding Top 18px', 'hcode-addons') => 'padding-top-18px',
          esc_html__('Padding Bottom 15px', 'hcode-addons') => 'padding-bottom-15px',
          esc_html__('Padding Bottom 30px', 'hcode-addons') => 'padding-bottom-30px',
          esc_html__('Padding 70px', 'hcode-addons') => 'padding-70px',
          esc_html__('Padding Top Bottom 7% Left Right 11%', 'hcode-addons') => 'padding-tb7-lr11',
          esc_html__('Padding Top Bottom 6% Left Right 9%', 'hcode-addons') => 'padding-tb6-lr9',
          esc_html__('Padding Top Bottom Left Right 70px', 'hcode-addons') => 'padding-tb-lr-70',
          esc_html__('Padding Left Right One', 'hcode-addons') => 'padding-one-lr',
          esc_html__('Padding Left Right Two', 'hcode-addons') => 'padding-two-lr',
          esc_html__('Padding Left Right Three', 'hcode-addons') => 'padding-three-lr',
          esc_html__('Padding Left Right Four', 'hcode-addons') => 'padding-four-lr',
          esc_html__('Padding Left Right Five', 'hcode-addons') => 'padding-five-lr',
          esc_html__('Padding Left Right Six', 'hcode-addons') => 'padding-six-lr',
          esc_html__('Padding Left Right Seven', 'hcode-addons') => 'padding-seven-lr',
          esc_html__('Padding Left Right Eight', 'hcode-addons') => 'padding-eight-lr',
          esc_html__('Padding Left Right Nine', 'hcode-addons') => 'padding-nine-lr',
          esc_html__('Padding Left Right Ten', 'hcode-addons') => 'padding-ten-lr',
          esc_html__('No padding bootom + No margin top', 'hcode-addons') => 'no-padding-bottom no-margin-top',
          esc_html__('Padding-two + Mobile top bottom 9% padding', 'hcode-addons') => 'padding-two sm-padding-top-nine sm-padding-bottom-nine',
          esc_html__('Top padding 0 + Mobile bottom padding 0', 'hcode-addons') => 'no-padding-top xs-no-padding-bottom',
          esc_html__('Padding 0 margin top 0', 'hcode-addons') => 'no-padding no-margin-top',
          esc_html__('No padding margin top 0', 'hcode-addons') => 'no-margin-top no-padding-top',
          esc_html__('No padding margin top 81px', 'hcode-addons') => 'no-padding content-top-margin',
          esc_html__('No padding margin top 87px', 'hcode-addons') => 'no-padding below-header',
          esc_html__('Padding One Top Bottom', 'hcode-addons') => 'padding-one-tb',
          esc_html__('Padding Two Top Bottom', 'hcode-addons') => 'padding-two-tb',
          esc_html__('Padding Three Top Bottom', 'hcode-addons') => 'padding-three-tb',
          esc_html__('Padding Four Top Bottom', 'hcode-addons') => 'padding-four-tb',
          esc_html__('Padding Five Top Bottom', 'hcode-addons') => 'padding-five-tb',
          esc_html__('Custom', 'hcode-addons') => 'custom-desktop-padding',
      );

      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-desktop-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-desktop-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
      foreach ( $hcode_desktop_padding as $index => $data ) {
        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;


/*-----------------------------------------------------------------------------------*/
/* Hcode Ipad Padding */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_custom_ipad_padding', 'hcode_custom_ipad_padding_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_ipad_padding_callback' ) ) :
  function hcode_custom_ipad_padding_callback( $settings, $value ) {
      
      $hcode_ipad_padding =array(
          esc_html__('Select Padding', 'hcode-addons') => '',
          esc_html__('No Padding', 'hcode-addons') => 'sm-no-padding',
          esc_html__('No Padding Top', 'hcode-addons') => 'sm-no-padding-top',
          esc_html__('No Padding Bottom', 'hcode-addons') => 'sm-no-padding-bottom',
          esc_html__('No Padding Left', 'hcode-addons') => 'sm-no-padding-left',
          esc_html__('No Padding Right', 'hcode-addons') => 'sm-no-padding-right',
          esc_html__('No Padding Left Right', 'hcode-addons') => 'sm-no-padding-lr',
          esc_html__('Padding One', 'hcode-addons') => 'sm-padding-one',
          esc_html__('Padding Two', 'hcode-addons') => 'sm-padding-two',
          esc_html__('Padding Three', 'hcode-addons') => 'sm-padding-three',
          esc_html__('Padding Four', 'hcode-addons') => 'sm-padding-four',
          esc_html__('Padding Five', 'hcode-addons') => 'sm-padding-five',
          esc_html__('Padding Six', 'hcode-addons') => 'sm-padding-six',
          esc_html__('Padding Seven', 'hcode-addons') => 'sm-padding-seven',
          esc_html__('Padding Eight', 'hcode-addons') => 'sm-padding-eight',
          esc_html__('Padding Nine', 'hcode-addons') => 'sm-padding-nine',
          esc_html__('Padding Ten', 'hcode-addons') => 'sm-padding-ten',
          esc_html__('Padding Eleven', 'hcode-addons') => 'sm-padding-eleven',
          esc_html__('Padding Twelve', 'hcode-addons') => 'sm-padding-twelve',
          esc_html__('Padding Thirteen', 'hcode-addons') => 'sm-padding-thirteen',
          esc_html__('Padding One Top', 'hcode-addons') => 'sm-padding-one-top',
          esc_html__('Padding Two Top', 'hcode-addons') => 'sm-padding-two-top',
          esc_html__('Padding Three Top', 'hcode-addons') => 'sm-padding-three-top',
          esc_html__('Padding Four Top', 'hcode-addons') => 'sm-padding-four-top',
          esc_html__('Padding Five Top', 'hcode-addons') => 'sm-padding-five-top',
          esc_html__('Padding Six Top', 'hcode-addons') => 'sm-padding-six-top',
          esc_html__('Padding Seven Top', 'hcode-addons') => 'sm-padding-seven-top',
          esc_html__('Padding Eight Top', 'hcode-addons') => 'sm-padding-eight-top',
          esc_html__('Padding Nine Top', 'hcode-addons') => 'sm-padding-nine-top',
          esc_html__('Padding Ten Top', 'hcode-addons') => 'sm-padding-ten-top',
          esc_html__('Padding Eleven Top', 'hcode-addons') => 'sm-padding-eleven-top',
          esc_html__('Padding Twelve Top', 'hcode-addons') => 'sm-padding-twelve-top',
          esc_html__('Padding Thirteen Top', 'hcode-addons') => 'sm-padding-thirteen-top',
          esc_html__('Padding Twenty Two Top', 'hcode-addons') => 'sm-padding-twentytwo-top',
          esc_html__('Padding One Bottom', 'hcode-addons') => 'sm-padding-one-bottom',
          esc_html__('Padding Two Bottom', 'hcode-addons') => 'sm-padding-two-bottom',
          esc_html__('Padding Three Bottom', 'hcode-addons') => 'sm-padding-three-bottom',
          esc_html__('Padding Four Bottom', 'hcode-addons') => 'sm-padding-four-bottom',
          esc_html__('Padding Five Bottom', 'hcode-addons') => 'sm-padding-five-bottom',
          esc_html__('Padding Six Bottom', 'hcode-addons') => 'sm-padding-six-bottom',
          esc_html__('Padding Seven Bottom', 'hcode-addons') => 'sm-padding-seven-bottom',
          esc_html__('Padding Eight Bottom', 'hcode-addons') => 'sm-padding-eight-bottom',
          esc_html__('Padding Nine Bottom', 'hcode-addons') => 'sm-padding-nine-bottom',
          esc_html__('Padding Ten Bottom', 'hcode-addons') => 'sm-padding-ten-bottom',
          esc_html__('Padding Eleven Bottom', 'hcode-addons') => 'sm-padding-eleven-bottom',
          esc_html__('Padding Twelve Bottom', 'hcode-addons') => 'sm-padding-twelve-bottom',
          esc_html__('Padding Thirteen Bottom', 'hcode-addons') => 'sm-padding-thirteen-bottom',
          esc_html__('Padding lr 15px', 'hcode-addons') => 'sm-padding-lr-15px',
          esc_html__('Padding Bottom 15px', 'hcode-addons') => 'sm-padding-bottom-15px',
          esc_html__('Padding Bottom 30px', 'hcode-addons') => 'sm-padding-bottom-30px',
          esc_html__('Padding One Top Bottom', 'hcode-addons') => 'sm-padding-one-tb',
          esc_html__('Padding Two Top Bottom', 'hcode-addons') => 'sm-padding-two-tb',
          esc_html__('Padding Three Top Bottom', 'hcode-addons') => 'sm-padding-three-tb',
          esc_html__('Padding Four Top Bottom', 'hcode-addons') => 'sm-padding-four-tb',
          esc_html__('Padding Five Top Bottom', 'hcode-addons') => 'sm-padding-five-tb',
          esc_html__('Padding Left Right One', 'hcode-addons') => 'sm-padding-one-lr',
          esc_html__('Padding Left Right Two', 'hcode-addons') => 'sm-padding-two-lr',
          esc_html__('Padding Left Right Three', 'hcode-addons') => 'sm-padding-three-lr',
          esc_html__('Padding Left Right Four', 'hcode-addons') => 'sm-padding-four-lr',
          esc_html__('Padding Left Right Five', 'hcode-addons') => 'sm-padding-five-lr',
          esc_html__('Padding Left Right Six', 'hcode-addons') => 'sm-padding-six-lr',
          esc_html__('Padding Left Right Seven', 'hcode-addons') => 'sm-padding-seven-lr',
          esc_html__('Padding Left Right Eight', 'hcode-addons') => 'sm-padding-eight-lr',
          esc_html__('Padding Left Right Nine', 'hcode-addons') => 'sm-padding-nine-lr',
          esc_html__('Padding Left Right Ten', 'hcode-addons') => 'sm-padding-ten-lr',
          esc_html__('Custom', 'hcode-addons') => 'custom-ipad-padding',
      );

      $output = '';
      
      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-ipad-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      
      $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-ipad-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
      foreach ( $hcode_ipad_padding as $index => $data ) {

        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;

/*-----------------------------------------------------------------------------------*/
/* Hcode Mobile Padding */
/*-----------------------------------------------------------------------------------*/

vc_add_shortcode_param( 'hcode_custom_mobile_padding', 'hcode_custom_mobile_padding_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_mobile_padding_callback' ) ) :
  function hcode_custom_mobile_padding_callback( $settings, $value ) {
      
      $hcode_mobile_padding =array(
          esc_html__('Select padding', 'hcode-addons') => '',
          esc_html__('No Padding', 'hcode-addons') => 'xs-no-padding',
          esc_html__('No Padding Top', 'hcode-addons') => 'xs-no-padding-top',
          esc_html__('No Padding Bottom', 'hcode-addons') => 'xs-no-padding-bottom',
          esc_html__('No Padding Left', 'hcode-addons') => 'xs-no-padding-left',
          esc_html__('No Padding Right', 'hcode-addons') => 'xs-no-padding-right',
          esc_html__('No Padding Left Right', 'hcode-addons') => 'xs-no-padding-lr',
          esc_html__('Padding One', 'hcode-addons') => 'xs-padding-one',
          esc_html__('Padding Two', 'hcode-addons') => 'xs-padding-two',
          esc_html__('Padding Three', 'hcode-addons') => 'xs-padding-three',
          esc_html__('Padding Four', 'hcode-addons') => 'xs-padding-four',
          esc_html__('Padding Five', 'hcode-addons') => 'xs-padding-five',
          esc_html__('Padding Six', 'hcode-addons') => 'xs-padding-six',
          esc_html__('Padding Seven', 'hcode-addons') => 'xs-padding-seven',
          esc_html__('Padding Eight', 'hcode-addons') => 'xs-padding-eight',
          esc_html__('Padding Nine', 'hcode-addons') => 'xs-padding-nine',
          esc_html__('Padding Ten', 'hcode-addons') => 'xs-padding-ten',
          esc_html__('Padding Eleven', 'hcode-addons') => 'xs-padding-eleven',
          esc_html__('Padding Twelve', 'hcode-addons') => 'xs-padding-twelve',
          esc_html__('Padding Thirteen', 'hcode-addons') => 'xs-padding-thirteen',
          esc_html__('Padding One Top', 'hcode-addons') => 'xs-padding-one-top',
          esc_html__('Padding Two Top', 'hcode-addons') => 'xs-padding-two-top',
          esc_html__('Padding Three Top', 'hcode-addons') => 'xs-padding-three-top',
          esc_html__('Padding Four Top', 'hcode-addons') => 'xs-padding-four-top',
          esc_html__('Padding Five Top', 'hcode-addons') => 'xs-padding-five-top',
          esc_html__('Padding Six Top', 'hcode-addons') => 'xs-padding-six-top',
          esc_html__('Padding Seven Top', 'hcode-addons') => 'xs-padding-seven-top',
          esc_html__('Padding Eight Top', 'hcode-addons') => 'xs-padding-eight-top',
          esc_html__('Padding Nine Top', 'hcode-addons') => 'xs-padding-nine-top',
          esc_html__('Padding Ten Top', 'hcode-addons') => 'xs-padding-ten-top',
          esc_html__('Padding Eleven Top', 'hcode-addons') => 'xs-padding-eleven-top',
          esc_html__('Padding Twelve Top', 'hcode-addons') => 'xs-padding-twelve-top',
          esc_html__('Padding Thirteen Top', 'hcode-addons') => 'xs-padding-thirteen-top',
          esc_html__('Padding Twenty Two Top', 'hcode-addons') => 'xs-padding-twentytwo-top',
          esc_html__('Padding One Bottom', 'hcode-addons') => 'xs-padding-one-bottom',
          esc_html__('Padding Two Bottom', 'hcode-addons') => 'xs-padding-two-bottom',
          esc_html__('Padding Three Bottom', 'hcode-addons') => 'xs-padding-three-bottom',
          esc_html__('Padding Four Bottom', 'hcode-addons') => 'xs-padding-four-bottom',
          esc_html__('Padding Five Bottom', 'hcode-addons') => 'xs-padding-five-bottom',
          esc_html__('Padding Six Bottom', 'hcode-addons') => 'xs-padding-six-bottom',
          esc_html__('Padding Seven Bottom', 'hcode-addons') => 'xs-padding-seven-bottom',
          esc_html__('Padding Eight Bottom', 'hcode-addons') => 'xs-padding-eight-bottom',
          esc_html__('Padding Nine Bottom', 'hcode-addons') => 'xs-padding-nine-bottom',
          esc_html__('Padding Ten Bottom', 'hcode-addons') => 'xs-padding-ten-bottom',
          esc_html__('Padding Eleven Bottom', 'hcode-addons') => 'xs-padding-eleven-bottom',
          esc_html__('Padding Twelve Bottom', 'hcode-addons') => 'xs-padding-twelve-bottom',
          esc_html__('Padding Thirteen Bottom', 'hcode-addons') => 'xs-padding-thirteen-bottom',
          esc_html__('Padding lr 15px', 'hcode-addons') => 'xs-padding-lr-15px',
          esc_html__('Padding Top Bottom 70px Left Right 15px', 'hcode-addons') => 'xs-padding-tb70px-lr15px',
          esc_html__('Padding Bottom 15px', 'hcode-addons') => 'xs-padding-bottom-15px',
          esc_html__('Padding Bottom 30px', 'hcode-addons') => 'xs-padding-bottom-30px',
          esc_html__('Padding One Top Bottom', 'hcode-addons') => 'xs-padding-one-tb',
          esc_html__('Padding Two Top Bottom', 'hcode-addons') => 'xs-padding-two-tb',
          esc_html__('Padding Three Top Bottom', 'hcode-addons') => 'xs-padding-three-tb',
          esc_html__('Padding Four Top Bottom', 'hcode-addons') => 'xs-padding-four-tb',
          esc_html__('Padding Five Top Bottom', 'hcode-addons') => 'xs-padding-five-tb',
          esc_html__('Padding Left Right One', 'hcode-addons') => 'xs-padding-one-lr',
          esc_html__('Padding Left Right Two', 'hcode-addons') => 'xs-padding-two-lr',
          esc_html__('Padding Left Right Three', 'hcode-addons') => 'xs-padding-three-lr',
          esc_html__('Padding Left Right Four', 'hcode-addons') => 'xs-padding-four-lr',
          esc_html__('Padding Left Right Five', 'hcode-addons') => 'xs-padding-five-lr',
          esc_html__('Padding Left Right Six', 'hcode-addons') => 'xs-padding-six-lr',
          esc_html__('Padding Left Right Seven', 'hcode-addons') => 'xs-padding-seven-lr',
          esc_html__('Padding Left Right Eight', 'hcode-addons') => 'xs-padding-eight-lr',
          esc_html__('Padding Left Right Nine', 'hcode-addons') => 'xs-padding-nine-lr',
          esc_html__('Padding Left Right Ten', 'hcode-addons') => 'xs-padding-ten-lr',
          esc_html__('Custom', 'hcode-addons') => 'custom-mobile-padding',
      );

      $output = '';
      
      $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode-mobile-custom-select-value wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';

      
      $output .= '<select name="'. $settings['param_name']. '-custom" class="hcode-mobile-custom-select wpb_vc_param_value wpb-input wpb-select '. $settings['param_name']
                 . ' ' . $settings['type']
                 . '">';
      foreach ( $hcode_mobile_padding as $index => $data ) {

        $output .= '<option class="" value="' . $data . '" title="'.$index.'">'.$index.'</option>';
      }
      $output .= '</select>';

    return $output;
  }
endif;