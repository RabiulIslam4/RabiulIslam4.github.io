<?php
/**
 * Map For Image gallery
 *
 * @package H-Code
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Image Gallery', 'hcode-addons'),
  'description' => __( 'Simple/lightbox/zoom image gallery', 'hcode-addons' ),  
  'icon' => 'h-code-shortcode-icon far fa-image',
  'base' => 'hcode_image_gallery',
  'category' => 'H-Code',
  'params' => array(
    array(
        'type' => 'dropdown',
        'admin_label' => true,
        'heading' => __('Image Gallery Type', 'hcode-addons'),
        'param_name' => 'image_gallery_type',
        'value' => array(__('Select Image Gallery Type', 'hcode-addons') => '',
                  __('Simple Image Lightbox', 'hcode-addons') => 'simple-image-lightbox',
                  __('Lightbox Gallery', 'hcode-addons') => 'lightbox-gallery',
                  __('Zoom Gallery', 'hcode-addons') => 'zoom-gallery',
      ),
    ),
    array(
        'type' => 'dropdown',
        'admin_label' => true,
        'heading' => __('Style', 'hcode-addons'),
        'param_name' => 'simple_image_type',
        'value' => array(__('Select Style', 'hcode-addons') => '',
                  __('Zoom', 'hcode-addons') => 'zoom',
                  __('Feet Horizontal-vertical', 'hcode-addons') => 'feet',
        ),
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
    ),
    array(
        'type' => 'dropdown',
        'admin_label' => true,
        'heading' => __('Lightbox Type', 'hcode-addons'),
        'param_name' => 'lightbox_type',
        'value' => array(__('Select Lightbox Type', 'hcode-addons') => '',
                  __('Grid', 'hcode-addons') => 'grid',
                  __('Masonry', 'hcode-addons') => 'masonry',
        ),
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery') )
    ),
    array(
        'type' => 'dropdown',
        'admin_label' => true,
        'heading' => __('Column Type', 'hcode-addons'),
        'param_name' => 'column',
        'value' => array(__('Select Column Type', 'hcode-addons') => '',
                  __('1 column', 'hcode-addons') => '1',
                  __('2 columns', 'hcode-addons') => '2',
                  __('3 columns', 'hcode-addons') => '3',
                  __('4 columns', 'hcode-addons') => '4',
                  __('6 columns', 'hcode-addons') => '6',
        ),
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery') )
    ),
    array(
        'type' => 'attach_images',
        'heading' => __('Image', 'hcode-addons'),
        'param_name' => 'image_gallery',
        'holder' => 'div',
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
    ),
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Hide Lightbox Gallery?', 'hcode-addons'),
        'param_name' => 'hide_lightbox_gallery',
        'value' => array(__('No', 'hcode-addons') => '0', 
                         __('Yes', 'hcode-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
      ),
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Required Padding Setting?', 'hcode-addons'),
        'param_name' => 'padding_setting',
        'value' => array(__('No', 'hcode-addons') => '0', 
                         __('Yes', 'hcode-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_custom_desktop_padding',
        'param_name' => 'desktop_padding',
        'heading' => __('Padding (For Desktop Device)', 'hcode-addons' ),
        'value' => '',
        'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Custom Padding (For Desktop Devices)', 'hcode-addons' ),
        'param_name' => 'custom_desktop_padding',
        'dependency' => array( 'element' => 'desktop_padding', 'value' => array('custom-desktop-padding') ),
        'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),

        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_custom_ipad_padding',
        'param_name' => 'ipad_padding',
        'heading' => __('Padding (For iPad Device)', 'hcode-addons' ),
        'value' => '',
        'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Custom Padding (For iPad Devices)', 'hcode-addons' ),
        'param_name' => 'custom_ipad_padding',
        'dependency' => array( 'element' => 'ipad_padding', 'value' => array('custom-ipad-padding') ),
        'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_custom_mobile_padding',
        'param_name' => 'mobile_padding',
        'heading' => __('Padding (For Mobile Device)', 'hcode-addons' ),
        'value' => '',
        'dependency' => array( 'element' => 'padding_setting', 'value' => array('1') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Custom Padding (For Mobile Devices)', 'hcode-addons' ),
        'param_name' => 'custom_mobile_padding',
        'dependency' => array( 'element' => 'mobile_padding', 'value' => array('custom-mobile-padding') ),
        'description' => __( 'Specify padding like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Required Margin Setting?', 'hcode-addons'),
        'param_name' => 'margin_setting',
        'value' => array(__('No', 'hcode-addons') => '0', 
                         __('Yes', 'hcode-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_custom_desktop_margin',
        'param_name' => 'desktop_margin',
        'heading' => __('Margin (For Desktop Device)', 'hcode-addons' ),
        'value' => '',
        'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Custom Margin (For Desktop Devices)', 'hcode-addons' ),
        'param_name' => 'custom_desktop_margin',
        'dependency' => array( 'element' => 'desktop_margin', 'value' => array('custom-desktop-margin') ),
        'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_custom_ipad_margin',
        'param_name' => 'ipad_margin',
        'heading' => __('Margin (For iPad Device)', 'hcode-addons' ),
        'value' => '',
        'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Custom Margin (For iPad Devices)', 'hcode-addons' ),
        'param_name' => 'custom_ipad_margin',
        'dependency' => array( 'element' => 'ipad_margin', 'value' => array('custom-ipad-margin') ),
        'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_custom_mobile_margin',
        'param_name' => 'mobile_margin',
        'heading' => __('Margin (For Mobile Device)', 'hcode-addons' ),
        'value' => '',
        'dependency' => array( 'element' => 'margin_setting', 'value' => array('1') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Custom Margin (For Mobile Devices)', 'hcode-addons' ),
        'param_name' => 'custom_mobile_margin',
        'dependency' => array( 'element' => 'mobile_margin', 'value' => array('custom-mobile-margin') ),
        'description' => __( 'Specify margin like (10px 12px 10px 12px or 10px or 10%...)', 'hcode-addons' ),
        'group' => 'Style',
      ),
      array(
        'type' => 'hcode_animation_style',
        'param_name' => 'hcode_column_animation_style',
        'heading' => __('Animation Style', 'hcode-addons' ),
        'value' => '',
        'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
        'group' => 'Animation',
      ),
      array(
          'type' => 'hcode_custom_srcset',
          'param_name' => 'hcode_image_srcset',
          'heading' => __('Image SRCSET', 'hcode-addons' ),
          'value' => 'full',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery')),
          'group' => 'SRCSET',
      ),
      $hcode_vc_extra_id,
      $hcode_vc_extra_class,
  )
) );