<?php
/**
 * Map For Popup
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popup */
/*-----------------------------------------------------------------------------------*/

$date = date('Y-m-d H:i:s'); ## Get current date
$time = strtotime($date); ## Get timestamp of current date
vc_map( array(
  'name' => __('Popup', 'hcode-addons'),
  'description' => __('Add a popup with content ', 'hcode-addons'),
  'icon' => 'far fa-copy h-code-shortcode-icon',
  'base' => 'hcode_popup',
  'category' => 'H-Code',
  'params' => array(
      array(
          'type' => 'dropdown',
          'admin_label' => true,
          'heading' => __('Popup Type', 'hcode-addons'),
          'param_name' => 'popup_type',
          'value' => array(__('Select Popup Type', 'hcode-addons') => '',
                    __('Popup Form 1', 'hcode-addons') => 'popup-form-1',
                    __('Popup Form 2', 'hcode-addons') => 'popup-form-2',
                    __('Simple Modal Popup', 'hcode-addons') => 'modal-popup',
                    __('Popup With Zoom', 'hcode-addons') => 'popup-with-zoom-anim',
                    __('Popup with Fade', 'hcode-addons') => 'popup-with-move-anim',
                    __('Ajax Popup', 'hcode-addons') => 'simple-ajax-popup-align-top',
                    __('Youtube Video 1', 'hcode-addons') => 'youtube-video-1',
                    __('Youtube Video 2', 'hcode-addons') => 'youtube-video-2',
                    __('Vimeo Video 1', 'hcode-addons') => 'vimeo-video-1',
                    __('Vimeo Video 2', 'hcode-addons') => 'vimeo-video-2',
                    __('Google Map 1', 'hcode-addons') => 'google-map-1',
                    __('Google Map 2', 'hcode-addons') => 'google-map-2',
                    __('Subscribe Form 1', 'hcode-addons') => 'subscribe-form-1',
                    __('Subscribe Form 2', 'hcode-addons') => 'subscribe-form-2',
        ),
      ),
      array(
          'type' => 'hcode_preview_image',
          'heading' => __('Select pre-made style for Popup', 'hcode-addons'),
          'param_name' => 'popup_preview_image',
      ),
      array(
        'type' => 'hcode_custom_switch_option',
        'heading' => __('Custom Icon', 'hcode-addons'),
        'param_name' => 'custom_icon',
        'value' => array(__('NO', 'hcode-addons') => '0',
                         __('YES', 'hcode-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('youtube-video-2','vimeo-video-2','google-map-2')),
      ),
      array(
        'type' => 'attach_image',
        'heading' => __('Custom Icon Image', 'hcode-addons'),
        'param_name' => 'custom_icon_image',
        'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
        'description' => __( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'hcode-addons' ),
      ),
      array(
        'type' => 'hcode_icon',
        'heading' => __('Select Icon Type', 'hcode-addons'),
        'param_name' => 'hcode_et_line_icon_list',
        'description' => __('Select Font Type', 'hcode-addons'),
        'dependency' => array( 'element' => 'custom_icon', 'value' => '0' ),      
      ),
      array(
        'type' => 'textfield',
        'admin_label' => true,
        'heading' => __('Title', 'hcode-addons'),
        'param_name' => 'popup_title',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('modal-popup','popup-with-zoom-anim','popup-with-move-anim','simple-ajax-popup-align-top','youtube-video-2','vimeo-video-2','google-map-2') ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Inside Popup Title', 'hcode-addons'),
        'param_name' => 'inside_popup_title',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('modal-popup','popup-with-zoom-anim','popup-with-move-anim') ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Inside Popup Button Title Text', 'hcode-addons'),
        'param_name' => 'inside_popup_button_title',
        'value' => 'Dismiss',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('modal-popup','popup-with-zoom-anim','popup-with-move-anim') ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Select Contact Form', 'hcode-addons' ),
        'param_name' => 'contact_forms_shortcode',
        'value' => $contact_forms,
        'description' => __( 'Choose previously created contact form from the drop down list.', 'hcode-addons' ),
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','popup-form-2') ),
      ),
      array(
          'type' => 'hcode_custom_switch_option',
          'class' => '',
          'heading' => __('Do you want to show custom newsletter?', 'hcode-addons'),
          'param_name' => 'hcode_enable_custom_newsletter',
          'value' => array(__('NO', 'hcode-addons') => '0', 
                           __('YES', 'hcode-addons') => '1'
                          ),
          'dependency' => array( 'element' => 'popup_type', 'value' => array('subscribe-form-1','subscribe-form-2') ),
      ),
      array(
          'type' => 'textarea',
          'heading' => __('Add Custom Newsletter Shortcode', 'hcode-addons'),
          'param_name' => 'hcode_custom_newsletter',
          'dependency' => array( 'element' => 'hcode_enable_custom_newsletter', 'value' => array('1') ),
      ),
      array(
          'type' => 'textfield',
          'heading' => __('Newsletter Placeholder Text', 'hcode-addons'),
          'param_name' => 'hcode_newsletter_placeholder',
          'value' => 'ENTER YOUR EMAIL ADDRESS',
          'dependency' => array( 'element' => 'hcode_enable_custom_newsletter', 'value' => array('0') ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Newsletter Button Text', 'hcode-addons'),
        'param_name' => 'hcode_newsletter_button_text',
        'value' => 'Subscribe',
        'dependency' => array( 'element' => 'hcode_enable_custom_newsletter', 'value' => array('0') ),
      ),
      array(
        'type' => 'textarea_html',
        'heading' => __('Content', 'hcode-addons'),
        'param_name' => 'content',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','popup-form-2','modal-popup','popup-with-zoom-anim','popup-with-move-anim','youtube-video-1','youtube-video-2','vimeo-video-1','vimeo-video-2','google-map-1','google-map-2','subscribe-form-1','subscribe-form-2') ),
      ),
      array(
        'type'        => 'vc_link',
        'heading'     => __('Button Config', 'hcode-addons'),
        'param_name'  => 'popup_button_config',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','popup-form-2','modal-popup','popup-with-zoom-anim','popup-with-move-anim','simple-ajax-popup-align-top','vimeo-video-1','google-map-1','subscribe-form-1','subscribe-form-2') ),
      ),
      array(
        'type'        => 'vc_link',
        'heading'     => __('Button Config', 'hcode-addons'),
        'param_name'  => 'popup_button_config_youtube',
        'description' => __( 'Add YOUTUBE VIDEO URL like https://www.youtube.com/watch?v=xxxxxxxxxx, you will get this from youtube.', 'hcode-addons' ),            
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('youtube-video-1') ),
      ),
      array(
        'type' => 'textfield',
        'heading' => __('External URL', 'hcode-addons'),
        'param_name' => 'popup_external_url',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('vimeo-video-2','google-map-2')),
      ),
      array(
        'type' => 'textfield',
        'heading' => __('External URL', 'hcode-addons'),
        'param_name' => 'popup_external_url_youtube',
        'description' => __( 'Add YOUTUBE VIDEO URL like https://www.youtube.com/watch?v=xxxxxxxxxx, you will get this from youtube.', 'hcode-addons' ),            
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('youtube-video-2')),
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Form Id', 'hcode-addons'),
        'param_name' => 'popup_form_id',
        'value' => $time,
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','popup-form-2','modal-popup','popup-with-zoom-anim','popup-with-move-anim','subscribe-form-1','subscribe-form-2') ),
      ),
      array(
        'type'        => 'hcode_button_settings',
        'param_name'  => 'button_config_settings',
        'heading'     => esc_html__( 'Button Configuration', 'hcode-addons' ),
        'group' => 'Button Configuration',
        'dependency' => array( 'element' => 'popup_type', 'value' => array('popup-form-1','popup-form-2','modal-popup','popup-with-zoom-anim','popup-with-move-anim','simple-ajax-popup-align-top','youtube-video-1','vimeo-video-1','google-map-1','subscribe-form-1','subscribe-form-2') ),
        'description' => __( 'You can easily set button text-transform, font-size, line-height, letter-spacing for all devices ', 'hcode-addons' ),
        'hide_font_settings_element'=>array('icon-color','icon-hover-color')
      ),
      array(
        'type'        => 'hcode_button_settings',
        'param_name'  => 'inside_popup_button_config_settings',
        'heading'     => esc_html__( 'inside Popup Button Configuration', 'hcode-addons' ),
        'group' => 'Button Configuration',
        'dependency' => array( 'element' => 'popup_type', 'value' => array('modal-popup','popup-with-zoom-anim','popup-with-move-anim') ),
        'description' => __( 'You can easily set button text-transform, font-size, line-height, letter-spacing for all devices ', 'hcode-addons' ),
        'hide_font_settings_element'=>array('icon-color','icon-hover-color')
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Title Text Color', 'hcode-addons' ),
        'param_name' => 'hcode_title_color',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('modal-popup','popup-with-zoom-anim','popup-with-move-anim','simple-ajax-popup-align-top','youtube-video-2','vimeo-video-2','google-map-2') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Icon Color', 'hcode-addons' ),
        'param_name' => 'hcode_icon_color',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('youtube-video-2','vimeo-video-2','google-map-2')),
        'group' => 'Style',
      ),
      array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_title_font',
        'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('modal-popup','popup-with-zoom-anim','popup-with-move-anim','simple-ajax-popup-align-top','youtube-video-2','vimeo-video-2','google-map-2') ),
        'group' => 'Font Settings',
      ),
      array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_subtitle_font',
        'heading'     => esc_html__( 'Font Settings For Inside Title', 'hcode-addons' ),
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('modal-popup','popup-with-zoom-anim','popup-with-move-anim') ),
        'group' => 'Font Settings',
      ),
      array(
        'type' => 'dropdown',
        'heading' => __('SM Width', 'hcode-addons' ),
        'param_name' => 'width',
        'value' => $hcode_vc_column,
        'group' => 'Responsive Options',
        'description' => 'Select column width',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','popup-form-2','modal-popup','popup-with-zoom-anim','popup-with-move-anim','subscribe-form-1','subscribe-form-2') ),
      ),
      array(
        'type' => 'column_offset',
        'heading' => __('Responsiveness', 'hcode-addons' ),
        'param_name' => 'offset',
        'group' => 'Responsive Options',
        'description' => 'Adjust column for different screen sizes. Control width, offset and visibility settings.',
        'dependency'  => array( 'element' => 'popup_type', 'value' => array('popup-form-1','popup-form-2','modal-popup','popup-with-zoom-anim','popup-with-move-anim','subscribe-form-1','subscribe-form-2') ),
      ),
      array(
          'type' => 'hcode_custom_srcset',
          'param_name' => 'hcode_icon_image_srcset',
          'heading' => __('Icon Image SRCSET', 'hcode-addons' ),
          'value' => 'full',
          'dependency' => array( 'element' => 'custom_icon', 'value' => '1' ),
          'group' => 'SRCSET',
      ),
  )
) );