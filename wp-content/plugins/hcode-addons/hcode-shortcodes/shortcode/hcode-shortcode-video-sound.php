<?php
/**
 * Shortcode For Video & Sound
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video & Sound */
/*-----------------------------------------------------------------------------------*/
 
if ( ! function_exists( 'hcode_video_sound' ) ) {
    function hcode_video_sound( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'hcode_video_type' => '',
            'hcode_vimeo_id' => '',
            'hcode_youtube_url' => '',
            'hcode_track_id' =>'',
            'hcode_html5_mp4_video' => '',
            'hcode_html5_ogg_video' => '',
            'hcode_html5_webm_video' => '',
            'hcode_auto_play' => '',
            'hcode_auto_loop' => '',
            'hcode_control' => '',
            'hcode_fullscreen' => '',
            'width' => '',
            'height' => '',
        ), $atts ) );
        $output = $iframe_attributes = '';
        $width = ( $width ) ? 'width="'.$width.'"' : '';
        $height = ( $height ) ? 'height="'.$height.'"' : '';
        $fullscreen = $hcode_fullscreen == 1 ? 'webkitAllowFullScreen mozallowfullscreen allowFullScreen' : '';
        if( $hcode_auto_play == 1 ){
            $iframe_attributes = ' allow="autoplay"';
        }
        switch ($hcode_video_type) {
            case 'vimeo':
                if($hcode_vimeo_id):
                    $vimeo_args = array( 
                                            'autoplay'  => $hcode_auto_play == 1 ? '1' : '0',
                                            'color'     => 'bb9b44',
                                            'title'     => '0',
                                            'byline'    => '0',
                                            'portrait'  => '0',
                                            'loop'      => $hcode_auto_loop == 1 ? '1' : '0',
                                        );
                    $vimeo_url = add_query_arg( $vimeo_args, 'https://player.vimeo.com/video/'.$hcode_vimeo_id );

                    $output .= '<div class="fit-videos">';
                        $output .='<iframe src="'.$vimeo_url.'"'.$iframe_attributes.' '.$width.' '.$height.' '.$fullscreen.'></iframe>';
                    $output .= '</div>';
                endif;
            break;

            case 'youtube':
                if($hcode_youtube_url):

                    $youtube_args = array( 
                                            'autoplay'  => $hcode_auto_play == 1 ? '1' : '0',
                                            'loop'      => $hcode_auto_loop == 1 ? '1' : '0',
                                        );
                    $youtube_url = add_query_arg( $youtube_args, $hcode_youtube_url );

                    $output .= '<div class="fit-videos">';
                      $output .='<iframe '.$width.' '.$height.' '.$fullscreen.' src="'.$youtube_url.'"'.$iframe_attributes.'></iframe>';
                    $output .= '</div>';
                endif;
            break;

            case 'sound-cloud':
                if($hcode_track_id):

                    $sound_cloud_args = array( 
                                            'auto_play'     => $hcode_auto_play == 1 ? 'true' : 'false',
                                            'hide_related'  => 'false',
                                            'show_comments' => 'true',
                                            'show_user'     => 'true',
                                            'show_reposts'  => 'false',
                                            'visual'        => 'true',
                                        );
                    $sound_cloud_url = add_query_arg( $sound_cloud_args, 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.$hcode_track_id );

                    $output .='<div class="sound"><iframe '.$width.' '.$height.' '.$fullscreen.' src="'.$sound_cloud_url.'"></iframe></div>';
                endif;
            break;

            case 'html5':
                if( $hcode_html5_mp4_video || $hcode_html5_ogg_video || $hcode_html5_webm_video ):
                    
                    $auto_loop = ( $hcode_auto_loop == 1 ) ? ' loop ' : '';
                    $auto_play = ( $hcode_auto_play == 1 ) ? ' autoplay ' : '';
                    $control = ( $hcode_control == 1 ) ? ' controls ' : '';
                    
                        $output .= '<video '.$auto_loop.$auto_play.$control.' '.$width.' '.$height.'>';
                            if($hcode_html5_mp4_video){
                                $output .= '<source type="video/mp4" src="'.$hcode_html5_mp4_video.'">';
                            }
                            if($hcode_html5_ogg_video){
                                $output .= '<source type="video/ogg" src="'.$hcode_html5_ogg_video.'">';
                            }
                            if($hcode_html5_webm_video){
                                $output .= '<source type="video/webm" src="'.$hcode_html5_webm_video.'">';
                            }
                        $output .= '</video>';

                endif;
            break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_video_sound', 'hcode_video_sound' );