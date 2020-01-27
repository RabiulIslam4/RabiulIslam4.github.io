<?php
/**
 * Shortcode For Simple Image
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Simple Image */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_simple_image_shortcode' ) ) {
    function hcode_simple_image_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
            	'id' => '',
            	'class' => '',
            	'hcode_image' => '',
                'hcode_mobile_full_image' => '',
                'hcode_image_with_border' => '',
                'alignment_setting' => '',
                'desktop_alignment' => '',
                'ipad_alignment' => '',
                'mobile_alignment' => '',
                'padding_setting' => '',
                'desktop_padding' => '',
                'custom_desktop_padding' => '',
                'ipad_padding' => '',
                'custom_ipad_padding' => '',
                'mobile_padding' => '',
                'custom_mobile_padding' => '',
                'margin_setting' => '',
                'desktop_margin' => '',
                'custom_desktop_margin' => '',
                'ipad_margin' => '',
                'custom_ipad_margin' => '',
                'mobile_margin' => '',
                'custom_mobile_margin' => '',
                'hcode_min_height' => '',
                'hcode_mobile_min_height' => '',
                'hcode_target_blank' => '',
                'hcode_url' => '',
                'hcode_show_image_caption' => '',
                'hcode_image_caption_position' => '',
                'hcode_image_caption_text_alignment' => '',
                'hcode_image_srcset' => 'full',
            ), $atts ) );
        global $hcode_image_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
    	$output = $main_class = $main_class_list = $padding = $margin = $padding_style = $margin_style = $style_attr = $style = $alignment = '';
        $classes = array();
        $img_id = ( $id ) ? $id : '';
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class : '';

        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_image_token = !empty( $hcode_image_token ) ? $hcode_image_token : 0;
            $hcode_image_token = $hcode_image_token + 1;
            $hcode_token_class = $classes[] = 'hcode-image-'.$hcode_image_token;
        }

        $hcode_mobile_full_image = ($hcode_mobile_full_image==1) ? ' xs-img-full' : '';
        $hcode_min_height = ($hcode_min_height) ? 'min-height:'.$hcode_min_height.';' : '';
        $hcode_mobile_min_height = ( $hcode_mobile_min_height ) ? ' '.$hcode_mobile_min_height : '';
        $hcode_target_blank = ( $hcode_target_blank == 1 ) ? ' target="_blank"': '';
        $hcode_url = ( $hcode_url ) ? $hcode_url : '';

        /* Add image caption */
        $hcode_show_image_caption = ( $hcode_show_image_caption ) ? $hcode_show_image_caption : '';
        $hcode_image_caption_position = ( $hcode_image_caption_position ) ? $hcode_image_caption_position : 'image-caption-bottom';
        $hcode_image_caption_text_alignment = ( $hcode_image_caption_text_alignment ) ? ' '.$hcode_image_caption_text_alignment : ' text-left';
        
        // Column Allignment Settings
        $alignment_setting = ( $alignment_setting ) ? $alignment_setting : '';
        $desktop_alignment = ( $desktop_alignment ) ? ' '.$desktop_alignment : '';
        $ipad_alignment = ( $ipad_alignment ) ? ' '.$ipad_alignment : '';
        $mobile_alignment = ( $mobile_alignment ) ? ' '.$mobile_alignment : '';

        // Column Padding Settings
        $padding_setting = ( $padding_setting ) ? $padding_setting : '';
        if( $padding_setting ){
            ( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes[] = $desktop_padding : '';
            ( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes[] = $ipad_padding : '';
            ( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes[] = $mobile_padding : '';
            $custom_desktop_padding = ( $custom_desktop_padding ) ? $custom_desktop_padding : '';
            $custom_ipad_padding = ( $custom_ipad_padding ) ? $custom_ipad_padding : '';
            $custom_mobile_padding = ( $custom_mobile_padding ) ? $custom_mobile_padding : '';

            ( $custom_desktop_padding && $desktop_padding == 'custom-desktop-padding' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_desktop_padding.' !important; }' : '';
            ( $custom_ipad_padding && $ipad_padding == 'custom-ipad-padding' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_ipad_padding.' !important;}' : '';
            ( $custom_mobile_padding && $mobile_padding == 'custom-mobile-padding' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ padding:'.$custom_mobile_padding.' !important;}' : '';
        }

        // Column Margin Settings
        $margin_setting = ( $margin_setting ) ? $margin_setting : '';
        if( $margin_setting ){
            ( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes[] = $desktop_margin : '';
            ( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes[] = $ipad_margin : '';
            ( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes[] = $mobile_margin : '';
            $custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
            $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
            $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';

            ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
            ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
            ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
        }
        $class_list = implode(" ", $classes);
        if($alignment_setting){
            $alignment .= $desktop_alignment;
            $alignment .= $ipad_alignment;
            $alignment .= $mobile_alignment;
        }
        if($class || $hcode_mobile_full_image || $alignment || $class_list):
            $main_class .= 'class="'.$class.$hcode_mobile_full_image.$class_list.$alignment.'"';
            $main_class_list = $class.$hcode_mobile_full_image.$class_list.$alignment;
        endif;
        $hcode_image = ( $hcode_image ) ? $hcode_image : '';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
        $thumb = wp_get_attachment_image_src($hcode_image, $hcode_image_srcset);

        /* Added Image Caption V1.5 */
        $attachment = get_post( $hcode_image );
        $img_caption = array(
            'caption' => ( !empty( $attachment->post_excerpt ) ? $attachment->post_excerpt : '' ),
        );
        $img_caption = ( isset($img_caption['caption']) && !empty($img_caption['caption']) ) ? $img_caption['caption'] : '' ;
        
        
        if ( $thumb[0] ):
            if( $hcode_show_image_caption == 1 ) :
                $output .= '<figure class="hcode-image-caption" id="attachment_'.$hcode_image.'">';
                if( $img_caption && $hcode_image_caption_position == 'image-caption-top' ) :
                    $output .= '<figcaption class="wp-caption-text'.$hcode_image_caption_text_alignment.'">'.$img_caption.'</figcaption>';
                endif;
            endif;
            if($hcode_image_with_border == 1){
                $srcset_icon = $srcset_data_bg = $srcset_classes_bg = '';
                $srcset_icon = wp_get_attachment_image_srcset( $hcode_image, $hcode_image_srcset );
                if( $srcset_icon ){
                    $srcset_data_bg = ' data-bg-srcset="'.esc_attr( $srcset_icon ).'"';
                    $srcset_classes_bg = ' bg-image-srcset';
                }
                if( $hcode_url ){
                    $output .= '<a href="'.$hcode_url.'"'.$hcode_target_blank.'>';
                }
                    $output .= '<div '.$id.' class="cover-background '.$hcode_mobile_min_height.$class.$hcode_mobile_full_image.$padding.$margin.$alignment.$srcset_classes_bg.'" style="background-image:url('.$thumb[0].');'.$hcode_min_height.$margin_style.$padding_style.'"'.$srcset_data_bg.'>';
                        $output .= '<div class="img-border"></div>';
                    $output .= '</div>';
                if( $hcode_url ){
                    $output .= '</a>';
                }
            }else{

                if( $hcode_url ){
                    $output .= '<a href="'.$hcode_url.'"'.$hcode_target_blank.'>';
                }

                if( $img_id ) {
                    $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset, '', array( 'class' => $main_class_list, 'id' => $img_id ) );
                } else {
                    $output .= wp_get_attachment_image( $hcode_image, $hcode_image_srcset, '', array( 'class' => $main_class_list ) );
                }
                
                if( $hcode_url ){
                    $output .= '</a>';
                }
            }
            if( $hcode_show_image_caption == 1 ) :
                if( $img_caption && $hcode_image_caption_position == 'image-caption-bottom' ) :
                    $output .= '<figcaption class="hcode-image-caption'.$hcode_image_caption_text_alignment.'">'.$img_caption.'</figcaption>';
                endif;
                $output .= '</figure>';
            endif;

        endif;
        return $output;
    }
}
add_shortcode('hcode_simple_image','hcode_simple_image_shortcode');