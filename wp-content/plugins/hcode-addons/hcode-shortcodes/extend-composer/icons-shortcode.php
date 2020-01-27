<?php
/**
 * H-Code Custom Icon (font awesome and et line) List For VC.
 *
 * @package H-Code
 */
?>
<?php 
/* icons shortcode settings */
vc_add_shortcode_param('hcode_icon', 'hcode_icon_shortcode', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_icon_shortcode' ) ) :
  function hcode_icon_shortcode($settings, $value) {
      $hcode_icons = hcode_icons();
      $hcode_fa_icon_solid  = hcode_fontawesome_solid();
      $hcode_fa_icon_regular = hcode_fontawesome_reg();
      $hcode_fa_icon_brand  = hcode_fontawesome_brand();
      $hcode_fa_icon_old    = hcode_fontawesome_old();
      $output               = '';
      $value_without_fontawesome_main_class = substr(strstr($value," "), 1);
      $hcode_fontawesome_icons_main_class =  explode(' ',trim($value));
      $hcode_fontawesome_new_icon_value = '';

      if($hcode_fontawesome_icons_main_class[0] == 'fa'){
        if(array_key_exists($value_without_fontawesome_main_class, $hcode_fa_icon_old)){
          $hcode_fontawesome_new_icon_value = $hcode_fa_icon_old[$value_without_fontawesome_main_class];
        }else{
          if(in_array($value_without_fontawesome_main_class, $hcode_fa_icon_solid)){
              $hcode_fontawesome_new_icon_value = 'fas '.$value_without_fontawesome_main_class;
          }else if(in_array($value_without_fontawesome_main_class, $hcode_fa_icon_regular)){
              $hcode_fontawesome_new_icon_value = 'far '.$value_without_fontawesome_main_class;
          }else if(in_array($value_without_fontawesome_main_class, $hcode_fa_icon_brand)){
              $hcode_fontawesome_new_icon_value = 'fab '.$value_without_fontawesome_main_class;
          }
        }
      }else{
        $hcode_fontawesome_new_icon_value = $value;
      }

      $output .= "<div class='hcode_icon_container_main'>";
          foreach ($hcode_icons as $ikey => $ivalue) {
              $selected_icon = "";
              if($ivalue == $value) {
                $selected_icon = " active_icon";
              }
          $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="'.$ivalue.'" data-name="'.$ivalue.'"></i></span>';
          }
          
          foreach ($hcode_fa_icon_solid as $ikey => $ivalue) {
            $selected_icon = "";
            if('fas '.$ivalue == $hcode_fontawesome_new_icon_value) { 
                $selected_icon = " active_icon";
            }
            $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="fas '.$ivalue.'" data-name="fas '.$ivalue.'"></i></span>';
          }

          foreach ($hcode_fa_icon_regular as $ikey => $ivalue) {
            $selected_icon = "";
            if('far '.$ivalue == $hcode_fontawesome_new_icon_value) { 
              $selected_icon = " active_icon";
            }
            $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="far '.$ivalue.'" data-name="far '.$ivalue.'"></i></span>';
          }

          foreach ($hcode_fa_icon_brand as $ikey => $ivalue) {
            $selected_icon = "";
            if('fab '.$ivalue == $hcode_fontawesome_new_icon_value) { 
              $selected_icon = " active_icon";
            }
            $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="fab '.$ivalue.'" data-name="fab '.$ivalue.'"></i></span>';
          }
    
          $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode_icon_field wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
      $output .= '</div>'; 

  return $output;
  }
endif;

if( !function_exists('hcode_icons')):
  function hcode_icons() {
    $icons = array('icon-mobile','icon-laptop','icon-desktop','icon-tablet','icon-phone','icon-document','icon-documents','icon-search','icon-clipboard','icon-newspaper','icon-notebook','icon-book-open','icon-browser','icon-calendar','icon-presentation','icon-picture','icon-pictures','icon-video','icon-camera','icon-printer','icon-toolbox','icon-briefcase','icon-wallet','icon-gift','icon-bargraph','icon-grid','icon-expand','icon-focus','icon-edit','icon-adjustments','icon-ribbon','icon-hourglass','icon-lock','icon-megaphone','icon-shield','icon-trophy','icon-flag','icon-map','icon-puzzle','icon-basket','icon-envelope','icon-streetsign','icon-telescope','icon-gears','icon-key','icon-paperclip','icon-attachment','icon-pricetags','icon-lightbulb','icon-layers','icon-pencil','icon-tools','icon-tools-2','icon-scissors','icon-paintbrush','icon-magnifying-glass','icon-circle-compass','icon-linegraph','icon-mic','icon-strategy','icon-beaker','icon-caution','icon-recycle','icon-anchor','icon-profile-male','icon-profile-female','icon-bike','icon-wine','icon-hotairballoon','icon-globe','icon-genius','icon-map-pin','icon-dial','icon-chat','icon-heart','icon-cloud','icon-upload','icon-download','icon-target','icon-hazardous','icon-piechart','icon-speedometer','icon-global','icon-compass','icon-lifesaver','icon-clock','icon-aperture','icon-quote','icon-scope','icon-alarmclock','icon-refresh','icon-happy','icon-sad','icon-facebook','icon-twitter','icon-googleplus','icon-rss','icon-tumblr','icon-linkedin','icon-dribbble');
    return $icons;
  }
endif;

vc_add_shortcode_param('hcode_fontawesome_icon', 'hcode_font_awesome_icon_shortcode', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_font_awesome_icon_shortcode' ) ) :
  function hcode_font_awesome_icon_shortcode($settings, $value) {
      $hcode_fa_icon_solid  = hcode_fontawesome_solid();
      $hcode_fa_icon_regular = hcode_fontawesome_reg();
      $hcode_fa_icon_brand  = hcode_fontawesome_brand();
      $hcode_fa_icon_old    = hcode_fontawesome_old();
      $output               = '';
      $value_without_fontawesome_main_class = substr(strstr($value," "), 1);
      $hcode_fontawesome_icons_main_class =  explode(' ',trim($value));
      $hcode_fontawesome_new_icon_value = '';

      if($hcode_fontawesome_icons_main_class[0] == 'fa'){
        if(array_key_exists($value_without_fontawesome_main_class, $hcode_fa_icon_old)){
          $hcode_fontawesome_new_icon_value = $hcode_fa_icon_old[$value_without_fontawesome_main_class];
        }else{
          if(in_array($value_without_fontawesome_main_class, $hcode_fa_icon_solid)){
              $hcode_fontawesome_new_icon_value = 'fas '.$value_without_fontawesome_main_class;
          }else if(in_array($value_without_fontawesome_main_class, $hcode_fa_icon_regular)){
              $hcode_fontawesome_new_icon_value = 'far '.$value_without_fontawesome_main_class;
          }else if(in_array($value_without_fontawesome_main_class, $hcode_fa_icon_brand)){
              $hcode_fontawesome_new_icon_value = 'fab '.$value_without_fontawesome_main_class;
          }
        }
      }else{
        $hcode_fontawesome_new_icon_value = $value;
      }
      
      $output .= "<div class='hcode_icon_container_main'>";
          foreach ($hcode_fa_icon_solid as $ikey => $ivalue) {
            $selected_icon = "";
            if('fas '.$ivalue == $hcode_fontawesome_new_icon_value) { 
                $selected_icon = " active_icon";
            }
            $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="fas '.$ivalue.'" data-name="fas '.$ivalue.'"></i></span>';
          }

          foreach ($hcode_fa_icon_regular as $ikey => $ivalue) {
            $selected_icon = "";
            if('far '.$ivalue == $hcode_fontawesome_new_icon_value) { 
              $selected_icon = " active_icon";
            }
            $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="far '.$ivalue.'" data-name="far '.$ivalue.'"></i></span>';
          }

          foreach ($hcode_fa_icon_brand as $ikey => $ivalue) {
            $selected_icon = "";
            if('fab '.$ivalue == $hcode_fontawesome_new_icon_value) { 
              $selected_icon = " active_icon";
            }
            $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="fab '.$ivalue.'" data-name="fab '.$ivalue.'"></i></span>';
          }
    
          $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode_icon_field wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
      $output .= '</div>'; 

  return $output;
  }
endif;

vc_add_shortcode_param('hcode_etline_icon', 'hcode_et_line_icon_shortcode', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_et_line_icon_shortcode' ) ) :
  function hcode_et_line_icon_shortcode($settings, $value) {
      $hcode_icons = hcode_icons();
      $output = '';

      $output .= "<div class='hcode_icon_container_main'>";
          foreach ($hcode_icons as $ikey => $ivalue) {
              $selected_icon = "";
              if($ivalue == $value) {
                $selected_icon = " active_icon";
              }
          $output .= '<span class="hcode_icon_preview'.$selected_icon.'"><i class="'.$ivalue.'" data-name="'.$ivalue.'"></i></span>';
          }
          
          $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value hcode_icon_field wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
      $output .= '</div>'; 

  return $output;
  }
endif;
?>