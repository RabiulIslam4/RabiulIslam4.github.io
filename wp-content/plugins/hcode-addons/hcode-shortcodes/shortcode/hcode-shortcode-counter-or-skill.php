<?php
/**
 * Shortcode For Counter or Skill
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Hcode Counter or Skill */
/*-----------------------------------------------------------------------------------*/
$count = 1;
if ( ! function_exists( 'hcode_counter_or_skill_shortcode' ) ) {
    function hcode_counter_or_skill_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'counter_or_chart' => '',
            'counter_icon' =>'',
            'counter_style' => 'style-1',
            'custom_icon' =>'',
            'custom_icon_image' =>'',
            'counter_number' => '',
            'counter_number_style' => '',
            'counter_number_color' => '',
            'title' => '',
            'title_style' => '',
            'title_color' => '',
            'icon_color' => '',
            'subtitle' => '',
            'subtitle_color' => '',
            'counter_icon_size' => '',
            'counter_animation_duration' => '',
            'hcode_row_animation_style' => '',
            'skill_percent'=>'',
            'skill_percent_style' =>'',
            'skill_percent_color' => '',
            'skill_line_width' => '',
            'skill_barcolor_color' => '',
            'skill_trackcolor_color' => '',
            'animate_duration' => '',
            'hcode_icon_image_srcset' => 'full',
            'hcode_responsive_number_font' => '',
            'hcode_responsive_percentage_font' => '',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_subtitle_font' => '',
        ), $atts ) );

        $output = '';    
    	global $count, $skill, $font_settings_array;
    	
    	$counter_style_attr = $counter_class_attr = $title_style_attr = $title_class_attr = $skill_style_attr = $skill_class_attr = $number_responsive_id = $number_responsive_style = $number_responsive_class = $percentage_responsive_id = $percentage_responsive_style = $percentage_responsive_class = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = '';
    	$counter_icon = ( $counter_icon ) ? $counter_icon : '' ;

        //For Text Align 
        if( !empty( $hcode_responsive_number_font ) ) {
            $number_responsive_id = uniqid('hcode-font-setting-');
            $number_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_number_font, $number_responsive_id );
            $number_responsive_class = ' '.$number_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_percentage_font ) ) {
            $percentage_responsive_id = uniqid('hcode-font-setting-');
            $percentage_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_percentage_font, $percentage_responsive_id );
            $percentage_responsive_class = ' '.$percentage_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        //For Text Align 
        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        ( !empty( $number_responsive_style ) ) ? $font_settings_array[] = $number_responsive_style : '';
        ( !empty( $percentage_responsive_style ) ) ? $font_settings_array[] = $percentage_responsive_style : '';
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

    	$counter_icon_size = ( $counter_icon_size ) ? ' '.$counter_icon_size : '';
    	$counter_animation_duration = ( $counter_animation_duration ) ? $counter_animation_duration : '';
    	$hcode_row_animation_style = ( $hcode_row_animation_style ) ? ' wow '.$hcode_row_animation_style : '';
    	$counter_number = ( $counter_number ) ? $counter_number : '';
    	$icon_color = ($icon_color) ? 'style ="color: '.$icon_color.'"' : '';
    	// For Counter Style
    	if($counter_number_style == 'custom'){
    		$counter_style_attr = ( $counter_number_color ) ? ' style ="color: '.$counter_number_color.'"' : '';
    	}else{
    		$counter_class_attr = ( $counter_number_style ) ? ' '.$counter_number_style : '';
    	}
    	// For Title Style
    	if($title_style == 'custom'){
    		$title_style_attr = ( $title_color ) ? ' style="color: '.$title_color.'"' : '';
    	}else{
    		$title_class_attr = ( $title_style ) ? ' '.$title_style : '';
    	}

        // For Subtitle Style
        $subtitle_color = ( $subtitle_color ) ? ' style="color: '.$subtitle_color.'"' : '';
    	/* Skill */
    	$skill_percent = ( $skill_percent ) ? $skill_percent : '';

    	if($skill_percent_style == 'custom'){
    		$skill_style_attr = ( $skill_percent_color ) ? ' style:"color: '.$skill_percent_color.'"' : '';
    		$skill_style_attr .= ' style= "color: '.$skill_percent_color.'" ';
    	}else{
    		$skill_class_attr = ( $skill_percent_style ) ? ' '.$skill_percent_style : '';
    	}
        // Skill config
        $skill_line_width = ( $skill_line_width ) ? $skill_line_width : '1';
        $skill_barcolor_color = ( $skill_barcolor_color ) ? $skill_barcolor_color : '#FFF';
        $skill_trackcolor_color = ( $skill_trackcolor_color ) ? $skill_trackcolor_color : '#535353';
        $animate_duration = ( $animate_duration ) ? $animate_duration : '2000';

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';
        
        /* New Font Awesome Icons */

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($counter_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $counter_icon = substr(strstr($counter_icon," "), 1);

            if(array_key_exists($counter_icon, $fa_icon_old)){
                $counter_icon = $fa_icon_old[$counter_icon];
            }else if(in_array($counter_icon, $fa_icons_solid)){
                $counter_icon = 'fas '.$counter_icon;
            }else if(in_array($counter_icon, $fa_icons_reg)){
                $counter_icon = 'far '.$counter_icon;
            }else if(in_array($counter_icon, $fa_icons_brand)){
                $counter_icon = 'fab '.$counter_icon;
            }else{
                $counter_icon = '';
            }
        }
            

        switch ($counter_or_chart) {
            case 'counter':
    			$count++;
          		$counter_id = '#counter_'.$count;

                switch ( $counter_style ) {
                    case 'style-1':
                        $output .= '<div class="counter-section">';
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                            } elseif( $counter_icon ) {
                                $output .= '<i class="'.$counter_icon.$counter_icon_size.'" '.$icon_color.'></i>';
                            }
                            if( $counter_number ) {
                                $output .= '<span id="counter_'.$count.'" data-to="'.$counter_number.'" class="counter-number'.$counter_class_attr.$number_responsive_class.'"'.$counter_style_attr.'>'.$counter_number.'</span>';
                            }
                            if( $title ) {
                                $output .= '<span class="counter-title'.$title_class_attr.$title_responsive_class.'"'.$title_style_attr.'>'.$title.'</span>';
                            }
                        $output .= '</div>'; 
                        break;

                    case 'style-2':
                        $output .= '<div class="counter-style2">';
                            if( $counter_number ) {
                                $output .= '<span id="counter_'.$count.'" data-to="'.$counter_number.'" class="timer counter-number light-gray-text main-font font-weight-700 text-extra-large'.$counter_class_attr.$number_responsive_class.'"'.$counter_style_attr.'>'.$counter_number.'</span>';
                            }
                            if( $title ) {
                                $output .= '<span class="counter-title light-gray-text font-weight-300 text-extra-large '.$title_class_attr.$title_responsive_class.'"'.$title_style_attr.'>'.$title.'</span>';
                            }
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image' ) );
                            } elseif( $counter_icon ) {
                                $output .= '<i class="orange-light-text xs-display-none '.$counter_icon.$counter_icon_size.'" '.$icon_color.'></i>';
                            }
                        $output .= '</div>'; 
                    break;
                }
            break;
            case 'skill':
                $skill++;
            	$output .= '<div class="chart-style2">';
            		if($skill_percent):
    					$output .= '<div class="chart-percent">';
    						$output .= '<span data-percent="'.$skill_percent.'" class="chart chart-'.$skill.$title_class_attr.$percentage_responsive_class.'"'.$skill_style_attr.'>';
    							$output .= '<span class="percent alt-font">'.$skill_percent.'</span>';
    						$output .= '</span>';
    					$output .= '</div>';
    				endif;
    				if(!empty($title) || !empty($subtitle)):
    	                $output .= '<div class="chart-text">';
    	                	if($title):
    	                    	$output .= '<h5 class="'.$title_class_attr.$title_responsive_class.'"'.$title_style_attr.'>'.$title.'</h5>';
    	                	endif;
    	                	if($subtitle):
    	                    	$output .= '<p class="'.$subtitle_responsive_class.'"'.$subtitle_color.'>'.$subtitle.'</p>';
    	                    endif;
    	                $output .= '</div>';
                    endif;
                $output .= '</div>';

            ob_start();?>
            <script type="text/javascript">jQuery(function() { jQuery('<?php echo '.chart-'.$skill ;?>').easyPieChart({ barColor: '<?php echo $skill_barcolor_color;?>', trackColor: '<?php echo $skill_trackcolor_color;?>', scaleColor: false, easing: 'easeOutBounce', scaleLength: 1, lineCap: 'round', lineWidth: <?php echo $skill_line_width; ?>, size: 120, animate: { duration: <?php echo $animate_duration; ?>, enabled: true }, onStep: function (from, to, percent) {  jQuery(this.el).find('.percent').text(Math.round(percent)); } }); }); </script>
            <?php 
            $script = ob_get_contents();
            ob_end_clean();
            $output .= $script;
            break;
        }
        return $output;        
    }
}
add_shortcode( 'hcode_counter_or_skill', 'hcode_counter_or_skill_shortcode' );