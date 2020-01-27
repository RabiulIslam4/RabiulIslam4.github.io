<?php
/**
 * Shortcode For Tabs
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tabs */
/*-----------------------------------------------------------------------------------*/

$hcode_tabs_style='';
if ( ! function_exists( 'hcode_tabs' ) ) {
  function hcode_tabs( $atts, $content = null ) {
    extract( shortcode_atts( array(
                'id'        => '',
                'class'     => '',
                'tabs_style' => '',
                'hcode_flexible_tab' => '',
                'active_tab' => '',
                'tabs_alignment' => '',
                'hcode_tab_show_separator' => '',
            ), $atts ) );
    $output = $hcode_tab_title_font_settings_id = $hcode_tab_title_font_settings_style = $hcode_tab_title_font_settings_class = '';
    global $hcode_tabs_style, $hcode_global_tabs, $font_settings_array;
    $hcode_global_tabs = array();
    $hcode_tabs_style = $tabs_style;

    do_shortcode( $content );
    if( empty( $hcode_global_tabs ) ) { return; }

    $id = ( $id ) ? ' id="'.$id.'"' : '';
    $class = ( $class ) ? ' '.$class : '';
    $active_tab = ( $active_tab ) ? $active_tab : '1';
    $tabs_style = ( $tabs_style ) ? $tabs_style : '';
    $tabs_alignment = ( $tabs_alignment ) ? ' '.$tabs_alignment : '';
    $flexible_tab = ( $hcode_flexible_tab == 1 ) ? ' hcode-flexible-tab': '';

    /* For uniqtab id V1.6 */
    $tabuniqtab = time().'-'.mt_rand();

    switch ($tabs_style) {
      case 'tab-style4':
      case 'tab-style5':
        $output .= '<div class="'.$tabs_style.$class.'"'.$id.'>';
          $output .= '<div class="row">';
            $output .= '<div class="tabs-left col-md-12 col-sm-12">';
              $output .= '<ul class="nav nav-tabs nav-tabs-light'.$tabs_alignment.'">';
                foreach( $hcode_global_tabs as $key => $tab) {

                  /* Font settings */
                  $hcode_tab_title_font_settings_id = $hcode_tab_title_font_settings_style = $hcode_tab_title_font_settings_class = '';
                  if( isset( $tab['atts']['hcode_tab_title_font_settings'] ) ) {
                    $hcode_tab_title_font_settings = $tab['atts']['hcode_tab_title_font_settings'];
                    
                    if( !empty( $hcode_tab_title_font_settings ) ) {
                        $hcode_tab_title_font_settings_id = uniqid('hcode-font-setting-');
                        $hcode_tab_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_tab_title_font_settings, $hcode_tab_title_font_settings_id );
                        $hcode_tab_title_font_settings_class = ' '.$hcode_tab_title_font_settings_id;
                    }
                    ( !empty( $hcode_tab_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_tab_title_font_settings_style : '';
                  }

                  $title      =  $tab['atts']['title'];
                  $tab_icon  =  ( (isset($tab['atts']['show_icon']) == 1) && isset($tab['atts']['tab_icon']) ) ? $tab['atts']['tab_icon'] : '';

                  /* New Font Awesome Icons Start*/

                  $fa_icons_solid = hcode_fontawesome_solid();
                  $fa_icons_reg = hcode_fontawesome_reg();
                  $fa_icons_brand = hcode_fontawesome_brand();
                  $fa_icon_old = hcode_fontawesome_old(); 
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if($font_awesome_fa_icons[0] == 'fa'){
                      $tab_icon = substr(strstr($tab_icon," "), 1);

                      if(array_key_exists($tab_icon, $fa_icon_old)){
                          $tab_icon = $fa_icon_old[$tab_icon];
                      }else if(in_array($tab_icon, $fa_icons_solid)){
                          $tab_icon = 'fas '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_reg)){
                          $tab_icon = 'far '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_brand)){
                          $tab_icon = 'fab '.$tab_icon;
                      }else{
                          $tab_icon = '';
                      }
                  }

                  /* New Font Awesome Icons End*/

                  $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                  $output .= '<li '.$active.'>';
                    $output .= '<a href="#hcode-'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="'.$hcode_tab_title_font_settings_class.'">';
                    if( (isset($tab['atts']['custom_tab_icon']) == 1) && !empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                      $hcode_icon_image_srcset  = !empty($tab['atts']['hcode_icon_image_srcset']) ? $tab['atts']['hcode_icon_image_srcset'] : 'full';
                      $output .= wp_get_attachment_image( $tab['atts']['custom_tab_icon_image'], $hcode_icon_image_srcset, '', array( 'class' => 'tab-icon-image' ) );
                    } elseif($tab_icon) {
                      $output .= '<i class="'.$tab_icon.'"></i>';
                    }
                    if( $title && (isset($tab['atts']['show_title']) == 1) ) {
                      $output .= esc_html($title);
                    }
                    $output .= '</a>';
                  $output .= '</li>';
                }
              $output .= '</ul>';
              $output .= '<div class="tab-content position-relative overflow-hidden">';
                foreach ($hcode_global_tabs as $key => $tab) {
                  $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                  $title  = $tab['atts']['title'];
                  $output .= '<div class="tab-pane fade'.$active_content.'" id="hcode-'.$tabuniqtab.'-'.$key.'">';
                    $output .=  do_shortcode($tab['content']);
                  $output .=  '</div>';
                }
              $output .= '</div>';
            $output .= '</div>';
          $output .= '</div>';
        $output .= '</div>';
      break;
      case 'animated-tab1':
          $output .= '<div id="'.$tabs_style.'" class="hcode-animated-tabs '.$tabs_style.$class.$flexible_tab.'">';
            $output .= '<ul class="nav nav-tabs margin-five no-margin-top xs-margin-bottom-seven'.$tabs_alignment.'">';
              foreach( $hcode_global_tabs as $key => $tab) {

                /* Font settings */
                $hcode_tab_title_font_settings_id = $hcode_tab_title_font_settings_style = $hcode_tab_title_font_settings_class = '';
                if( isset( $tab['atts']['hcode_tab_title_font_settings'] ) ) {
                  $hcode_tab_title_font_settings = $tab['atts']['hcode_tab_title_font_settings'];
                  
                  if( !empty( $hcode_tab_title_font_settings ) ) {
                      $hcode_tab_title_font_settings_id = uniqid('hcode-font-setting-');
                      $hcode_tab_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_tab_title_font_settings, $hcode_tab_title_font_settings_id.' span' );
                      $hcode_tab_title_font_settings_class = ' '.$hcode_tab_title_font_settings_id;
                  }
                  ( !empty( $hcode_tab_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_tab_title_font_settings_style : '';
                }

                $title      =  $tab['atts']['title'];
                $tab_icon  =  ( (isset($tab['atts']['show_icon']) == 1) && isset($tab['atts']['tab_icon']) ) ? $tab['atts']['tab_icon'] : '';

                /* New Font Awesome Icons Start*/

                  $fa_icons_solid = hcode_fontawesome_solid();
                  $fa_icons_reg = hcode_fontawesome_reg();
                  $fa_icons_brand = hcode_fontawesome_brand();
                  $fa_icon_old = hcode_fontawesome_old(); 
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if($font_awesome_fa_icons[0] == 'fa'){
                      $tab_icon = substr(strstr($tab_icon," "), 1);

                      if(array_key_exists($tab_icon, $fa_icon_old)){
                          $tab_icon = $fa_icon_old[$tab_icon];
                      }else if(in_array($tab_icon, $fa_icons_solid)){
                          $tab_icon = 'fas '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_reg)){
                          $tab_icon = 'far '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_brand)){
                          $tab_icon = 'fab '.$tab_icon;
                      }else{
                          $tab_icon = '';
                      }
                  }

                  /* New Font Awesome Icons End*/
                $active = ( ( $key + 1 ) == $active_tab ) ? ' active' : '';
                $output .= '<li class="nav'.$active.'">';
                  $output .= '<a href="#hcode-'.$tabuniqtab.'-'.$key.'" data-toggle="tab">';
                  
                  if( (isset($tab['atts']['custom_tab_icon']) == 1) && !empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                    $hcode_icon_image_srcset  = !empty($tab['atts']['hcode_icon_image_srcset']) ? $tab['atts']['hcode_icon_image_srcset'] : 'full';
                    $output .= wp_get_attachment_image( $tab['atts']['custom_tab_icon_image'], $hcode_icon_image_srcset, '', array( 'class' => 'tab-icon-image' ) );
                  } elseif($tab_icon) {
                    $output .= '<span><i class="'.$tab_icon.'"></i></span>';
                  }
                  
                  $output .= '</a>';
                  if(($title) && (isset($tab['atts']['show_title']) == 1)):
                    $output .= '<br><a href="#hcode-'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="body-text'.$hcode_tab_title_font_settings_class.'"><span class="text-small text-uppercase letter-spacing-3 margin-bottom-5px margin-top-5px font-weight-600 xs-letter-spacing-none xs-display-none">'.esc_html($title).'</span></a>';
                  endif;
                $output .= '</li>';
              }
            $output .= '</ul>';
              $output .= '<div class="tab-content">';
                foreach ($hcode_global_tabs as $key => $tab) {
                  $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                  $title  = $tab['atts']['title'];
                  $output .= '<div class="col-md-9 col-sm-12 text-center center-col tab-pane fade'.$active_content.'" id="hcode-'.$tabuniqtab.'-'.$key.'">';
                    $output .=  do_shortcode($tab['content']);
                  $output .=  '</div>';
                }
              $output .= '</div>';
          $output .= '</div>';
      break;

      case 'animated-tab2':
          $output .= '<div id="'.$tabs_style.'" class="hcode-animated-tabs '.$tabs_style.$class.$flexible_tab.'">';
            $output .= '<ul class="nav nav-tabs margin-five no-margin-top'.$tabs_alignment.'">';
              foreach( $hcode_global_tabs as $key => $tab) {

                /* Font settings */
                $hcode_tab_title_font_settings_id = $hcode_tab_title_font_settings_style = $hcode_tab_title_font_settings_class = '';
                if( isset( $tab['atts']['hcode_tab_title_font_settings'] ) ) {
                  $hcode_tab_title_font_settings = $tab['atts']['hcode_tab_title_font_settings'];
                  
                  if( !empty( $hcode_tab_title_font_settings ) ) {
                      $hcode_tab_title_font_settings_id = uniqid('hcode-font-setting-');
                      $hcode_tab_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_tab_title_font_settings, $hcode_tab_title_font_settings_id.' span' );
                      $hcode_tab_title_font_settings_class = ' '.$hcode_tab_title_font_settings_id;
                  }
                  ( !empty( $hcode_tab_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_tab_title_font_settings_style : '';
                }

                $title      =  $tab['atts']['title'];
                $tab_icon  =  ( (isset($tab['atts']['show_icon']) == 1) && isset($tab['atts']['tab_icon']) ) ? $tab['atts']['tab_icon'] : '';

                /* New Font Awesome Icons Start*/

                  $fa_icons_solid = hcode_fontawesome_solid();
                  $fa_icons_reg = hcode_fontawesome_reg();
                  $fa_icons_brand = hcode_fontawesome_brand();
                  $fa_icon_old = hcode_fontawesome_old(); 
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if($font_awesome_fa_icons[0] == 'fa'){
                      $tab_icon = substr(strstr($tab_icon," "), 1);

                      if(array_key_exists($tab_icon, $fa_icon_old)){
                          $tab_icon = $fa_icon_old[$tab_icon];
                      }else if(in_array($tab_icon, $fa_icons_solid)){
                          $tab_icon = 'fas '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_reg)){
                          $tab_icon = 'far '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_brand)){
                          $tab_icon = 'fab '.$tab_icon;
                      }else{
                          $tab_icon = '';
                      }
                  }

                  /* New Font Awesome Icons End*/
                $active = ( ( $key + 1 ) == $active_tab ) ? ' active' : '';
                $output .= '<li class="nav'.$active.'">';
                  $output .= '<a href="#hcode-'.$tabuniqtab.'-'.$key.'" class="xs-min-height-inherit xs-no-padding" data-toggle="tab">';
                 
                  if( (isset($tab['atts']['custom_tab_icon']) == 1) && !empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                    $hcode_icon_image_srcset  = !empty($tab['atts']['hcode_icon_image_srcset']) ? $tab['atts']['hcode_icon_image_srcset'] : 'full';
                    $output .= wp_get_attachment_image( $tab['atts']['custom_tab_icon_image'], $hcode_icon_image_srcset, '', array( 'class' => 'tab-icon-image' ) );
                  } elseif($tab_icon) {
                    $output .= '<span><i class="'.$tab_icon.'"></i></span>';
                  }
                  $output .= '</a>';
                  if( ($title) && (isset($tab['atts']['show_title']) == 1)):
                    $output .= '<br><a href="#hcode-'.$tabuniqtab.'-'.$key.'" class="xs-min-height-inherit xs-no-padding body-text'.$hcode_tab_title_font_settings_class.'" data-toggle="tab"><span class="text-small text-uppercase letter-spacing-3 margin-bottom-5px margin-top-5px font-weight-600 xs-letter-spacing-none xs-display-none">'.esc_html($title).'</span></a>';
                  endif;
                $output .= '</li>';
              }
            $output .= '</ul>';
            if( $hcode_tab_show_separator ):
              $output .= '<div class="architecture-company separator-line bg-yellow"></div>';
            endif;
              $output .= '<div class="tab-content">';
                foreach ($hcode_global_tabs as $key => $tab) {
                  $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                  $title  = $tab['atts']['title'];
                  $output .= '<div class="text-center center-col tab-pane fade'.$active_content.'" id="hcode-'.$tabuniqtab.'-'.$key.'">';
                    $output .=  do_shortcode($tab['content']);
                  $output .=  '</div>';
                }
              $output .= '</div>';
          $output .= '</div>';
        break;

        case 'animated-tab3':
          $output .= '<div id="'.$tabs_style.'" class=" '.$tabs_style.$class.'">';
            $output .= '<div class="row">';
              $output .= '<div class="col-md-12 col-sm-12">';
                $output .= '<ul class="nav nav-tabs nav-tabs-light height-auto'.$tabs_alignment.'">';
                  foreach( $hcode_global_tabs as $key => $tab) {

                    /* Font settings */
                    $hcode_tab_title_font_settings_id = $hcode_tab_title_font_settings_style = $hcode_tab_title_font_settings_class = '';
                    if( isset( $tab['atts']['hcode_tab_title_font_settings'] ) ) {
                      $hcode_tab_title_font_settings = $tab['atts']['hcode_tab_title_font_settings'];
                      
                      if( !empty( $hcode_tab_title_font_settings ) ) {
                          $hcode_tab_title_font_settings_id = uniqid('hcode-font-setting-');
                          $hcode_tab_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_tab_title_font_settings, $hcode_tab_title_font_settings_id );
                          $hcode_tab_title_font_settings_class = ' '.$hcode_tab_title_font_settings_id;
                      }
                      ( !empty( $hcode_tab_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_tab_title_font_settings_style : '';
                    }

                    $title      =  $tab['atts']['title'];
                    $tab_icon  =  ( (isset($tab['atts']['show_icon']) == 1) && isset($tab['atts']['tab_icon']) ) ? $tab['atts']['tab_icon'] : '';

                    /* New Font Awesome Icons Start*/

                  $fa_icons_solid = hcode_fontawesome_solid();
                  $fa_icons_reg = hcode_fontawesome_reg();
                  $fa_icons_brand = hcode_fontawesome_brand();
                  $fa_icon_old = hcode_fontawesome_old(); 
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if($font_awesome_fa_icons[0] == 'fa'){
                      $tab_icon = substr(strstr($tab_icon," "), 1);

                      if(array_key_exists($tab_icon, $fa_icon_old)){
                          $tab_icon = $fa_icon_old[$tab_icon];
                      }else if(in_array($tab_icon, $fa_icons_solid)){
                          $tab_icon = 'fas '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_reg)){
                          $tab_icon = 'far '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_brand)){
                          $tab_icon = 'fab '.$tab_icon;
                      }else{
                          $tab_icon = '';
                      }
                  }

                   /* New Font Awesome Icons End*/
                    $active = ( ( $key + 1 ) == $active_tab ) ? ' active' : '';
                    $output .= '<li class="'.$active.'">';
                      $output .= '<a href="#hcode-'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="'.$hcode_tab_title_font_settings_class.'">';
                        if( (isset($tab['atts']['custom_tab_icon']) == 1) && !empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                          $hcode_icon_image_srcset  = !empty($tab['atts']['hcode_icon_image_srcset']) ? $tab['atts']['hcode_icon_image_srcset'] : 'full';
                          $output .= wp_get_attachment_image( $tab['atts']['custom_tab_icon_image'], $hcode_icon_image_srcset, '', array( 'class' => 'tab-icon-image' ) );
                        } elseif($tab_icon) {
                          $output .= '<span><i class="'.$tab_icon.'"></i></span>';
                        }
                        if(($title) && (isset($tab['atts']['show_title']) == 1)):
                          $output .= esc_html( $title );
                        endif;
                      $output .= '</a>';
                    $output .= '</li>';
                  }
                $output .= '</ul>';
              $output .= '</div>';
            $output .= '</div>';

            $output .= '<div class="row">';
              $output .= '<div class="col-md-12 col-sm-12">';
                $output .= '<div class="wide-separator-line no-margin-lr"></div>';
              $output .= '</div>';
            $output .= '</div>';
            
            $output .= '<div class="tab-content">';
              foreach ($hcode_global_tabs as $key => $tab) {
                $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                $title  = $tab['atts']['title'];
                $output .= '<div class="text-center center-col tab-pane fade'.$active_content.'" id="hcode-'.$tabuniqtab.'-'.$key.'">';
                  $output .=  do_shortcode($tab['content']);
                $output .=  '</div>';
              }
            $output .= '</div>';
        $output .= '</div>';
      break;

      case 'animated-tab4':
          $output .= '<div id="'.$tabs_style.'" class="architecture-company hcode-animated-tabs '.$tabs_style.$class.$flexible_tab.'">';
            $output .= '<ul class="nav nav-tabs no-margin-bottom'.$tabs_alignment.'">';
              foreach( $hcode_global_tabs as $key => $tab) {

                /* Font settings */
                $hcode_tab_title_font_settings_id = $hcode_tab_title_font_settings_style = $hcode_tab_title_font_settings_class = '';
                if( isset( $tab['atts']['hcode_tab_title_font_settings'] ) ) {
                  $hcode_tab_title_font_settings = $tab['atts']['hcode_tab_title_font_settings'];
                  
                  if( !empty( $hcode_tab_title_font_settings ) ) {
                      $hcode_tab_title_font_settings_id = uniqid('hcode-font-setting-');
                      $hcode_tab_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_tab_title_font_settings, $hcode_tab_title_font_settings_id.' span' );
                      $hcode_tab_title_font_settings_class = ' '.$hcode_tab_title_font_settings_id;
                  }
                  ( !empty( $hcode_tab_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_tab_title_font_settings_style : '';
                }
                $title      =  $tab['atts']['title'];
                $tab_icon  =  ( (isset($tab['atts']['show_icon']) == 1) && isset($tab['atts']['tab_icon']) ) ? $tab['atts']['tab_icon'] : '';

                /* New Font Awesome Icons Start*/

                  $fa_icons_solid = hcode_fontawesome_solid();
                  $fa_icons_reg = hcode_fontawesome_reg();
                  $fa_icons_brand = hcode_fontawesome_brand();
                  $fa_icon_old = hcode_fontawesome_old(); 
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if($font_awesome_fa_icons[0] == 'fa'){
                      $tab_icon = substr(strstr($tab_icon," "), 1);

                      if(array_key_exists($tab_icon, $fa_icon_old)){
                          $tab_icon = $fa_icon_old[$tab_icon];
                      }else if(in_array($tab_icon, $fa_icons_solid)){
                          $tab_icon = 'fas '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_reg)){
                          $tab_icon = 'far '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_brand)){
                          $tab_icon = 'fab '.$tab_icon;
                      }else{
                          $tab_icon = '';
                      }
                  }

                  /* New Font Awesome Icons End*/
                $active = ( ( $key + 1 ) == $active_tab ) ? ' active' : '';
                $output .= '<li class="nav'.$active.'">';
                  $output .= '<a href="#hcode-'.$tabuniqtab.'-'.$key.'" class="xs-min-height-inherit xs-no-padding" data-toggle="tab">';
                  
                  if( (isset($tab['atts']['custom_tab_icon']) == 1) && !empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                    $hcode_icon_image_srcset  = !empty($tab['atts']['hcode_icon_image_srcset']) ? $tab['atts']['hcode_icon_image_srcset'] : 'full';
                    $output .= wp_get_attachment_image( $tab['atts']['custom_tab_icon_image'], $hcode_icon_image_srcset, '', array( 'class' => 'tab-icon-image' ) );
                  } elseif($tab_icon) {
                    $output .= '<span><i class="'.$tab_icon.'"></i></span>';
                  }
                  
                  $output .= '</a>';
                  if(($title) && (isset($tab['atts']['show_title']) == 1)):
                    $output .= '<br><a href="#hcode-'.$tabuniqtab.'-'.$key.'" class="xs-min-height-inherit xs-no-padding body-text'.$hcode_tab_title_font_settings_class.'" data-toggle="tab"><span class="text-small text-uppercase letter-spacing-3 margin-five font-weight-600 xs-letter-spacing-none xs-display-none">'.esc_html($title).'</span></a>';
                  endif;
                $output .= '</li>';
              }
            $output .= '</ul>';
            if( $hcode_tab_show_separator ):
              $output .= '<div class="separator-line bg-yellow"></div>';
            endif;
              $output .= '<div class="tab-content">';
                foreach ($hcode_global_tabs as $key => $tab) {
                  $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
                  $title  = $tab['atts']['title'];
                  $output .= '<div class="col-md-9 col-sm-12 text-center center-col tab-pane fade'.$active_content.'" id="hcode-'.$tabuniqtab.'-'.$key.'">';
                    $output .=  do_shortcode($tab['content']);
                  $output .=  '</div>';
                }
              $output .= '</div>';
          $output .= '</div>';
        break;

      default:
        $output .= '<div class="'.$tabs_style.$class.'"'.$id.'>';
          $output .= '<div class="row">';
            $output .= '<div class="col-md-12 col-sm-12">';
              $output .= '<ul class="nav nav-tabs nav-tabs-light'.$tabs_alignment.'">';
                foreach( $hcode_global_tabs as $key => $tab) {

                  /* Font settings */
                  $hcode_tab_title_font_settings_id = $hcode_tab_title_font_settings_style = $hcode_tab_title_font_settings_class = '';
                  if( isset( $tab['atts']['hcode_tab_title_font_settings'] ) ) {
                    $hcode_tab_title_font_settings = $tab['atts']['hcode_tab_title_font_settings'];
                    
                    if( !empty( $hcode_tab_title_font_settings ) ) {
                        $hcode_tab_title_font_settings_id = uniqid('hcode-font-setting-');
                        $hcode_tab_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_tab_title_font_settings, $hcode_tab_title_font_settings_id );
                        $hcode_tab_title_font_settings_class = ' '.$hcode_tab_title_font_settings_id;
                    }
                    ( !empty( $hcode_tab_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_tab_title_font_settings_style : '';
                  }


                  $title      =  $tab['atts']['title'];
                  $tab_icon  =  ( (isset($tab['atts']['show_icon']) == 1) && isset($tab['atts']['tab_icon']) ) ? $tab['atts']['tab_icon'] : '';

                  /* New Font Awesome Icons Start*/

                  $fa_icons_solid = hcode_fontawesome_solid();
                  $fa_icons_reg = hcode_fontawesome_reg();
                  $fa_icons_brand = hcode_fontawesome_brand();
                  $fa_icon_old = hcode_fontawesome_old(); 
                  $font_awesome_fa_icons = explode(' ',trim($tab_icon));

                  if($font_awesome_fa_icons[0] == 'fa'){
                      $tab_icon = substr(strstr($tab_icon," "), 1);

                      if(array_key_exists($tab_icon, $fa_icon_old)){
                          $tab_icon = $fa_icon_old[$tab_icon];
                      }else if(in_array($tab_icon, $fa_icons_solid)){
                          $tab_icon = 'fas '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_reg)){
                          $tab_icon = 'far '.$tab_icon;
                      }else if(in_array($tab_icon, $fa_icons_brand)){
                          $tab_icon = 'fab '.$tab_icon;
                      }else{
                          $tab_icon = '';
                      }
                  }

                  /* New Font Awesome Icons End*/
                  $active = ( ( $key + 1 ) == $active_tab ) ? ' class="active"' : '';
                  $output .= '<li '.$active.'>';
                    $output .= '<a href="#hcode-'.$tabuniqtab.'-'.$key.'" data-toggle="tab" class="'.$hcode_tab_title_font_settings_class.'">';
                    
                    if( (isset($tab['atts']['custom_tab_icon']) == 1) && !empty( $tab['atts']['custom_tab_icon_image'] ) ) {
                      $hcode_icon_image_srcset  = !empty($tab['atts']['hcode_icon_image_srcset']) ? $tab['atts']['hcode_icon_image_srcset'] : 'full';
                      $output .= wp_get_attachment_image( $tab['atts']['custom_tab_icon_image'], $hcode_icon_image_srcset, '', array( 'class' => 'tab-icon-image' ) );
                    } elseif($tab_icon) {
                      $output .= '<i class="'.$tab_icon.'"></i>';
                    }
                    if(($title) && (isset($tab['atts']['show_title']) == 1)):
                      $output .= esc_html($title);
                    endif;
                    $output .= '</a>';
                  $output .= '</li>';
                }
              $output .= '</ul>';
            $output .= '</div>';
          $output .= '</div>';
          $output .= '<div class="tab-content">';
            foreach ($hcode_global_tabs as $key => $tab) {
              $active_content = ( ( $key + 1 ) == $active_tab ) ? ' in active' : '';
              $title  = $tab['atts']['title'];
              $output .= '<div class="tab-pane fade'.$active_content.'" id="hcode-'.$tabuniqtab.'-'.$key.'">';
                $output .=  do_shortcode($tab['content']);
              $output .=  '</div>';
            }
          $output .= '</div>';
        $output .= '</div>';
        break;
    }
    return $output;
  }
}
add_shortcode( 'vc_tabs', 'hcode_tabs' );

if ( ! function_exists( 'hcode_tab' ) ) {
  function hcode_tab( $atts, $content = null) {
    global $hcode_global_tabs;
    $hcode_global_tabs[]  = array( 'atts' => $atts, 'content' => $content );
    return;
  }
}
add_shortcode( 'vc_tab', 'hcode_tab' );