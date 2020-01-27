<?php
/**
 * Shortcode For Career
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Career */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_career_shortcode' ) ) {
    function hcode_career_shortcode($atts, $content = null){
    	extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_career_left' => '',
            'hcode_career_number' => '',
            'hcode_career_show_separator' =>'',
            'hcode_career_job_title' => '',
            'hcode_career_job_experince' => '',
            'hcode_career_apply_now' => '',
            'hcode_career_urgent_job' => '',
            'hcode_career_number_color' => '',
            'hcode_career_show_separator_color' => '',
            'hcode_career_job_title_color' => '',
            'hcode_career_job_experince_color' => '',
            'hcode_career_urgent_job_color' => '',
            'hcode_career_right' => '',
            'hcode_career_overview_title' => '',
            'hcode_career_overview_content' => '',
            'hcode_career_responsibilities_title' => '',
            'hcode_career_responsibilities_content' => '',
            'hcode_career_bottom_separator' => '',
            'hcode_responsive_number_font' => '',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_experience_font' => '',
            'hcode_responsive_overview_font' => '',
            'hcode_responsive_content_font' => '',
            'button_config_settings' => '',
            'hcode_career_overview_title_color' => '',
            'hcode_career_overview_content_color' => '',
            'hcode_career_responsibility_title_color' => '',
            'hcode_career_responsibility_content_color' => '',
            'hcode_career_border_bottom_color' => '',
        ), $atts ) );
            
        global $font_settings_array;    
    	$output = $number_responsive_id = $number_responsive_style = $number_responsive_class = $title_responsive_id = $title_responsive_style = $title_responsive_class = $experience_responsive_id = $experience_responsive_style = $experience_responsive_class = $overview_responsive_id = $overview_responsive_style = $overview_responsive_class = $content_responsive_id = $content_responsive_style = $content_responsive_class = $button_responsive_id = $button_responsive_style = $button_responsive_class = '';

    	$id = ( $id ) ? ' id="'.$id.'"' : '';
    	$class = ( $class ) ? ' '.$class : '';
    	
        $hcode_career_left = ( $hcode_career_left ) ? $hcode_career_left : '';
        $hcode_career_number = ( $hcode_career_number ) ? $hcode_career_number : '';
        $hcode_career_show_separator = ( $hcode_career_show_separator ) ? $hcode_career_show_separator : '';
        $hcode_career_job_title = ( $hcode_career_job_title ) ? $hcode_career_job_title : '';
        $hcode_career_job_experince = ( $hcode_career_job_experince ) ? $hcode_career_job_experince : '';
        $hcode_career_apply_now = ( $hcode_career_apply_now ) ? $hcode_career_apply_now : '';
        $hcode_career_urgent_job = ( $hcode_career_urgent_job ) ? $hcode_career_urgent_job : '';
        $hcode_career_number_color = ( $hcode_career_number_color ) ? ' style=" color:'.$hcode_career_number_color.'"' : '';
        $hcode_career_show_separator_color = ( $hcode_career_show_separator_color ) ? ' style=" background:'.$hcode_career_show_separator_color.'"' : '';
        $hcode_career_job_title_color = ( $hcode_career_job_title_color ) ? ' style=" color:'.$hcode_career_job_title_color.'"' : '';
        $hcode_career_job_experince_color = ( $hcode_career_job_experince_color ) ? ' style=" color:'.$hcode_career_job_experince_color.'"' : '';
        $hcode_career_urgent_job_color = ( $hcode_career_urgent_job_color ) ? ' style=" color:'.$hcode_career_urgent_job_color.'"' : '';
        $hcode_career_overview_title_color = ( $hcode_career_overview_title_color ) ? ' style=" color:'.$hcode_career_overview_title_color.'"' : '';
        $hcode_career_overview_content_color = ( $hcode_career_overview_content_color ) ? ' style=" color:'.$hcode_career_overview_content_color.'"' : '';
        $hcode_career_responsibility_title_color = ( $hcode_career_responsibility_title_color ) ? ' style=" color:'.$hcode_career_responsibility_title_color.'"' : '';
        $hcode_career_responsibility_content_color = ( $hcode_career_responsibility_content_color ) ? ' style=" color:'.$hcode_career_responsibility_content_color.'"' : '';
        $hcode_career_border_bottom_color = ( $hcode_career_border_bottom_color ) ? ' style=" background-color:'.$hcode_career_border_bottom_color.'"' : '';

        $hcode_career_right = ( $hcode_career_right ) ? $hcode_career_right : '';
        $hcode_career_overview_title = ( $hcode_career_overview_title ) ? $hcode_career_overview_title : '';
        $hcode_career_overview_content = ( $hcode_career_overview_content ) ? $hcode_career_overview_content : '';
        $hcode_career_responsibilities_title = ( $hcode_career_responsibilities_title ) ? $hcode_career_responsibilities_title : '';
        $hcode_career_responsibilities_content = ( $hcode_career_responsibilities_content ) ? $hcode_career_responsibilities_content : '';
        $hcode_career_bottom_separator = ( $hcode_career_bottom_separator ) ? $hcode_career_bottom_separator : '';
        
        if( !empty( $button_config_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_settings, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';

        if (function_exists('vc_parse_multi_attribute')) {
            // For Button
            $hcode_career_apply_now_args = vc_parse_multi_attribute($hcode_career_apply_now);
            $hcode_career_apply_now_link     = ( isset($hcode_career_apply_now_args['url']) ) ? $hcode_career_apply_now_args['url'] : '#';
            $hcode_career_apply_now_title    = ( isset($hcode_career_apply_now_args['title']) ) ? $hcode_career_apply_now_args['title'] : '';
            $hcode_career_apply_now_target   = ( isset($hcode_career_apply_now_args['target']) ) ? trim($hcode_career_apply_now_args['target']) : '_self';
        }

        //For Text Align 
        if( !empty( $hcode_responsive_number_font ) ) {
            $number_responsive_id = uniqid('hcode-font-setting-');
            $number_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_number_font, $number_responsive_id );
            $number_responsive_class = ' '.$number_responsive_id;
        }

        ( !empty( $number_responsive_style ) ) ? $font_settings_array[] = $number_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_experience_font ) ) {
            $experience_responsive_id = uniqid('hcode-font-setting-');
            $experience_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_experience_font, $experience_responsive_id );
            $experience_responsive_class = ' '.$experience_responsive_id;
        }
        
        ( !empty( $experience_responsive_style ) ) ? $font_settings_array[] = $experience_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_overview_font ) ) {
            $overview_responsive_id = uniqid('hcode-font-setting-');
            $overview_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_overview_font, $overview_responsive_id );
            $overview_responsive_class = ' '.$overview_responsive_id;
        }
        
        ( !empty( $overview_responsive_style ) ) ? $font_settings_array[] = $overview_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_content_font ) ) {
            $content_responsive_id = uniqid('hcode-font-setting-');
            $content_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_content_font, $content_responsive_id );
            $content_responsive_class = ' '.$content_responsive_id;
        }
        
        ( !empty( $content_responsive_style ) ) ? $font_settings_array[] = $content_responsive_style : '';

        $output .= '<div class="clearfix">';
            if( $hcode_career_left == 1 ):
                $output .= '<div class="col-md-6 col-sm-12 no-padding-left position-relative">';
                    if( $hcode_career_number ):
                        $output .= '<h2 class="font-weight-600'.$number_responsive_class.'"'.$hcode_career_number_color.'>'.$hcode_career_number.'</h2>';
                    endif;
                    if( $hcode_career_show_separator ):
                        $output .= '<div class="separator-line no-margin-lr"'.$hcode_career_show_separator_color.'></div>';
                    endif;
                    if( $hcode_career_job_title ):
                        $output .= '<p class="text-large letter-spacing-2 no-margin-bottom'.$title_responsive_class.'"'.$hcode_career_job_title_color.'>'.$hcode_career_job_title.'</p>';
                    endif;
                    if( $hcode_career_job_experince ):
                        $output .= '<p class="text-uppercase letter-spacing-1'.$experience_responsive_class.'"'.$hcode_career_job_experince_color.'>'.$hcode_career_job_experince.'</p>';
                    endif;
                    if( $hcode_career_apply_now_title ):
                        $output .= '<a class="highlight-button-black-border btn btn-medium'.$button_responsive_class.'" href="'.$hcode_career_apply_now_link.'" target="'.$hcode_career_apply_now_target.'">'.$hcode_career_apply_now_title.'</a>';
                    endif;
                    if( $hcode_career_urgent_job ):
                        $output .= '<span class="urgent-job text-uppercase letter-spacing-1 font-weight-600 bg-red"'.$hcode_career_urgent_job_color.'>'.$hcode_career_urgent_job.'</span>';
                    endif;
                $output .= '</div>';
            endif;
            if( $hcode_career_right == 1 ):
                $output .= '<div class="col-md-6 col-sm-12 no-padding-left">';
                    if( $hcode_career_overview_title ):
                        $output .= '<p class="black-text no-margin'.$overview_responsive_class.'"'.$hcode_career_overview_title_color.'><strong>'.$hcode_career_overview_title.'</strong></p>';
                    endif;
                    if( $hcode_career_overview_content ):
                        $output .= '<p class="margin-one'.$content_responsive_class.'"'.$hcode_career_overview_content_color.'>'.$hcode_career_overview_content.'</p>';
                    endif;
                    if( $hcode_career_responsibilities_title ):
                        $output .= '<p class="black-text margin-ten no-margin-bottom'.$overview_responsive_class.'"'.$hcode_career_responsibility_title_color.'><strong>'.$hcode_career_responsibilities_title.'</strong></p>';
                    endif;
                    if( $hcode_career_responsibilities_content ):
                        $output .= '<p class="margin-one'.$content_responsive_class.'"'.$hcode_career_responsibility_content_color.'>'.$hcode_career_responsibilities_content.'</p>';
                    endif;
                $output .= '</div>';
            endif;
        $output .= '</div>';
        if( $hcode_career_bottom_separator == 1 ):
            $output .= '<div class="wide-separator-line no-margin-lr margin-ten"'.$hcode_career_border_bottom_color.'></div>';
        endif;

    	return $output;
    }
}
add_shortcode( 'hcode_career', 'hcode_career_shortcode' );