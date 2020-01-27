<?php
/**
 * Map For Video & Sound
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video & Sound */
/*-----------------------------------------------------------------------------------*/
 
vc_map( array(
  'name' => __('Video & Sound', 'hcode-addons'),
  'description' => __( 'Add vimeo/youtube/sound cloud', 'hcode-addons' ),
  'icon' => 'fas fa-video h-code-shortcode-icon',
  'base' => 'hcode_video_sound',
  'category' => 'H-Code',
  'params' => array(
    array(
      'type' => 'dropdown',
      'admin_label' => true,
      'class' => '',
      'heading' => __('Video Type', 'hcode-addons'),
      'param_name' => 'hcode_video_type',
      'value' => array(__('Select Video Type', 'hcode-addons') => '',
                       __('Vimeo', 'hcode-addons') => 'vimeo',
                       __('Youtube', 'hcode-addons') => 'youtube',
                       __('Sound Cloud', 'hcode-addons') => 'sound-cloud',
                       __('Html 5', 'hcode-addons') => 'html5',
      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Vimeo ID', 'hcode-addons'),
      'description' => __( 'Add VIMEO ID like xxxxxxxxx of vimeo url - https://vimeo.com/xxxxxxxxx', 'hcode-addons' ),      
      'param_name' => 'hcode_vimeo_id',
      'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('vimeo') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Youtube Embed URL', 'hcode-addons'),
      'description' => __( 'Add YOUTUBE VIDEO EMBED URL like https://www.youtube.com/embed/xxxxxxxxxx, you will get this from youtube embed iframe src code', 'hcode-addons' ),            
      'param_name' => 'hcode_youtube_url',
      'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('youtube') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __('Track ID', 'hcode-addons'),
      'description' => __( 'Add TRACK ID like XXXXXXXX, you will get it from embed code like api.soundcloud.com/tracks/XXXXXXXX', 'hcode-addons' ),                  
      'param_name' => 'hcode_track_id',
      'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('sound-cloud') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __('Html 5 MP4 Video URL', 'hcode-addons'),
        'param_name' => 'hcode_html5_mp4_video',
        'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('html5') ),
    ), 
    array(
        'type' => 'textfield',
        'heading' => __('Html 5 OGG Video URL', 'hcode-addons'),
        'param_name' => 'hcode_html5_ogg_video',
        'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('html5') ),
    ), 
    array(
        'type' => 'textfield',
        'heading' => __('Html 5 WEBM Video URL', 'hcode-addons'),
        'param_name' => 'hcode_html5_webm_video',
        'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('html5') ),
    ), 
    array(
      'type' => 'hcode_custom_switch_option',
      'class' => '',
      'heading' => __('Autoplay', 'hcode-addons'),
      'param_name' => 'hcode_auto_play',
      'value' => array(__('No', 'hcode-addons') => '0', 
                       __('Yes', 'hcode-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'hcode_video_type', 'value' => array('vimeo','youtube','sound-cloud','html5') ),
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'class' => '',
      'heading' => __('Loop', 'hcode-addons'),
      'param_name' => 'hcode_auto_loop',
      'value' => array(__('No', 'hcode-addons') => '0', 
                       __('Yes', 'hcode-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'hcode_video_type', 'value' => array('vimeo','youtube','html5') ),
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'class' => '',
      'heading' => __('Controls', 'hcode-addons'),
      'param_name' => 'hcode_control',
      'value' => array(__('No', 'hcode-addons') => '0', 
                       __('Yes', 'hcode-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'hcode_video_type', 'value' => array('html5') ),
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'class' => '',
      'heading' => __('Full Screen', 'hcode-addons'),
      'param_name' => 'hcode_fullscreen',
      'value' => array(__('No', 'hcode-addons') => '0', 
                       __('Yes', 'hcode-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'hcode_video_type', 'value' => array('vimeo','youtube','sound-cloud') ),
    ),
    array(
      'type'        => 'textfield',
      'heading'     => __('Width', 'hcode-addons' ),
      'description' => __( 'Define IFRAME width like 500', 'hcode-addons' ),                        
      'param_name'  => 'width',
      'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('vimeo','youtube','sound-cloud','html5') ),
      'group'       => 'Width & Height'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => __('Height', 'hcode-addons' ),
      'param_name'  => 'height',
      'description' => __( 'Define IFRAME height like 400', 'hcode-addons' ),                              
      'dependency'  => array( 'element' => 'hcode_video_type', 'value' => array('vimeo','youtube','sound-cloud','html5') ),
      'group'       => 'Width & Height'
    )
  )
) );