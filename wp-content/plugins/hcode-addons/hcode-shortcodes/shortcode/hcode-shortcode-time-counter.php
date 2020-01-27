<?php
/**
 * Shortcode For Time Counter
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Time Counter */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_time_counter_shortcode' ) ) {
    function hcode_time_counter_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_time_counter_date' => '',
            'hcode_time_counter_color' => '',
            'hcode_time_counter_days_taxt' => 'Day',
            'hcode_time_counter_hours_taxt' => 'Hours',
            'hcode_time_counter_minutes_taxt' => 'Minutes',
            'hcode_time_counter_seconds_taxt' => 'Seconds',
            'hcode_time_counter_number_font_settings' => '',
            'hcode_time_counter_text_font_settings' => '',
        ), $atts ) );
        
        $output = $hcode_time_counter_number_font_settings_id = $hcode_time_counter_number_font_settings_style = $hcode_time_counter_number_font_settings_class = $hcode_time_counter_text_font_settings_id = $hcode_time_counter_text_font_settings_style = $hcode_time_counter_text_font_settings_class = '';

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' class="'.$class.'"' : '';
        $hcode_time_counter_date = ( $hcode_time_counter_date ) ? $hcode_time_counter_date : '';
        $hcode_time_counter_color = ( $hcode_time_counter_color ) ? ' style="color:'.$hcode_time_counter_color.'"' : '';
        $hcode_time_counter_days_taxt = ( $hcode_time_counter_days_taxt ) ? $hcode_time_counter_days_taxt : '';
        $hcode_time_counter_hours_taxt = ( $hcode_time_counter_hours_taxt ) ? $hcode_time_counter_hours_taxt : '';
        $hcode_time_counter_minutes_taxt = ( $hcode_time_counter_minutes_taxt ) ? $hcode_time_counter_minutes_taxt : '';
        $hcode_time_counter_seconds_taxt = ( $hcode_time_counter_seconds_taxt ) ? $hcode_time_counter_seconds_taxt : '';


        global $font_settings_array;
        if( !empty( $hcode_time_counter_number_font_settings ) ) {
            $hcode_time_counter_number_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_time_counter_number_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_time_counter_number_font_settings, $hcode_time_counter_number_font_settings_id.' .counter-box .number' );
            $hcode_time_counter_number_font_settings_class = ' '.$hcode_time_counter_number_font_settings_id;
        }

        if( !empty( $hcode_time_counter_text_font_settings ) ) {
            $hcode_time_counter_text_font_settings_id = uniqid('hcode-font-setting-');
            $hcode_time_counter_text_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_time_counter_text_font_settings, $hcode_time_counter_text_font_settings_id.' span' );
            $hcode_time_counter_text_font_settings_class = ' '.$hcode_time_counter_text_font_settings_id;
        }

        ( !empty( $hcode_time_counter_number_font_settings_style ) ) ? $font_settings_array[] = $hcode_time_counter_number_font_settings_style : '';
        ( !empty( $hcode_time_counter_text_font_settings_style ) ) ? $font_settings_array[] = $hcode_time_counter_text_font_settings_style : '';

        if( $id || $class ) {
            $output .='<div'.$id.$class.'">';
        }

        $output .= '<div id="hcode-time-counter" class="hcode-time-counter'.$hcode_time_counter_number_font_settings_class.$hcode_time_counter_text_font_settings_class.'" data-days-text="'.$hcode_time_counter_days_taxt.'" data-hours-text="'.$hcode_time_counter_hours_taxt.'" data-minutes-text="'.$hcode_time_counter_minutes_taxt.'" data-seconds-text="'.$hcode_time_counter_seconds_taxt.'" '.$hcode_time_counter_color.'></div>';
        if( $hcode_time_counter_date ) {
            $output .= '<span class="hide hcode-time-counter-date counter-hidden">'.$hcode_time_counter_date.'</span>';
        }
        if( $id || $class ) {
            $output .='</div>';
        }

        return $output;
    }
}
add_shortcode( 'hcode_time_counter', 'hcode_time_counter_shortcode' );