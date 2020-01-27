<?php

// For Slider Preview Image.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-preview-image.php' );
// For Switch Option.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/switch-option.php' );
// For Icons List.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/icons-shortcode.php' );
// For Font Awesome Icons List.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/font-awesome-icons.php' );
// For ET-Line Icons List.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/et-line-icons.php' );
// For Post Featurebox.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-posts-list.php' );
// For Multi-select Option In Post Category.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-multiple-select-option.php' );
// For Multi-select Option In Portfolio Category.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-multiple-portfolio-categories.php' );
// For Multi-select Option In Portfolio Tags.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-multiple-portfolio-tags.php' );
// For Animation.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/animation-style.php' );
// For Custom Padding And Margin.
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/padding-margin.php' );
// For Custom Padding Param
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-padding-settings.php' );
// For Custom Margin Param
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-margin-settings.php' );
// For Custom SRCSET Param
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-srcset.php' );
// For Custom Animation Param
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/hcode-animation-settings.php' );
//For Resposive text Param
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/font-setting.php' );
//For button all settings Param
require_once( HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/button.php' );

/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class Start */
/*-----------------------------------------------------------------------------------*/

$hcode_vc_extra_id = array(
  'type'        => 'textfield',
  'heading'     => 'Extra ID',
  'description' => 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
  'param_name'  => 'id',
  'group'       => 'Extras'
);

$hcode_vc_extra_class = array(
  'type'        => 'textfield',
  'heading'     => 'Extra Class',
  'description' => 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2"',
  'param_name'  => 'class',
  'group'       => 'Extras'
);

$hcode_vc_column =array(
  __( 'inherit from smaller', 'hcode-addons' ) => '',
  __( '1 column - 1/12', 'hcode-addons' ) => '1/12',
  __( '2 columns - 1/6', 'hcode-addons' ) => '1/6',
  __( '3 columns - 1/4', 'hcode-addons' ) => '1/4',
  __( '4 columns - 1/3', 'hcode-addons' ) => '1/3',
  __( '5 columns - 5/12', 'hcode-addons' ) => '5/12',
  __( '6 columns - 1/2', 'hcode-addons' ) => '1/2',
  __( '7 columns - 7/12', 'hcode-addons' ) => '7/12',
  __( '8 columns - 2/3', 'hcode-addons' ) => '2/3',
  __( '9 columns - 3/4', 'hcode-addons' ) => '3/4',
  __( '10 columns - 5/6', 'hcode-addons' ) => '5/6',
  __( '11 columns - 11/12', 'hcode-addons' ) => '11/12',
  __( '12 columns - 1/1', 'hcode-addons') => '1/1',
  __( '20% - 1/5', 'hcode-addons' ) => '1/5',
  __( '40% - 2/5', 'hcode-addons' ) => '2/5',
  __( '60% - 3/5', 'hcode-addons' ) => '3/5',
  __( '80% - 4/5', 'hcode-addons' ) => '4/5',
);

/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class End */
/*-----------------------------------------------------------------------------------*/

if (class_exists('Vc_Manager')) {

$cf7 = get_posts( 'post_type=wpcf7_contact_form&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
  foreach ( $cf7 as $cform ) {
    $contact_forms[ $cform->post_title ] = $cform->ID;
  }
} else {
  $contact_forms[ __( 'No contact forms found', 'hcode-addons' ) ] = 0;
}

  // Include all shortcode map files
  $fileName = array('row', 'inner-row', 'column', 'inner-column', 'tab', 'slider', 'content-slider', 'counter-or-skill','portfolio','portfolio-filter','parallax','video-sound','section-heading', 'alert-massage', 'icons', 'icon-list','feature-box', 'featured-owl', 'blockquote','blog','accordian','progressbar','button','shop-top-five', 'releted-product', 'featured-product','text-block','single-image', 'product-brands', 'team-member','team-slider', 'content-block', 'image', 'tab-content','image-gallery','popup','space','divider', 'testimonial', 'career', 'post-slider', 'separator', 'login-form', 'image-carousel', 'education-slider','popular-dishes','restaurant-menu','photography-grid','photography-services', 'spa-package-slider','restaurant-popular-dishes', 'newsletter', 'coming-soon', 'featured-projects-slider', 'travel-agency-special-offer-slider','time-counter');
  global $hcode_theme_settings;
  $hcode_brand_status =  ( isset( $hcode_theme_settings['hcode_enable_brand_tax'] ) && $hcode_theme_settings['hcode_enable_brand_tax'] != '' ) ? $hcode_theme_settings['hcode_enable_brand_tax'] : '1';
  if( $hcode_brand_status != 1 ){
    if (false !== $key = array_search('product-brands', $fileName)) {
      unset( $fileName[$key] );
    }
  }
  foreach($fileName as $name) {
      require_once( HCODE_SHORTCODE_ADDONS_MAP_URI.'/hcode-shortcode-'.$name.'-map.php' );
  }
}