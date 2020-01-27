<?php
/**
 * Shortcode For Icon
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Icons */
/*-----------------------------------------------------------------------------------*/
add_shortcode('hcode_font_icons','hcode_font_icons_shortcode');
if ( ! function_exists( 'hcode_font_icons_shortcode' ) ) {
    function hcode_font_icons_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
            	'id' => '',
            	'class' => '',
            	'hcode_font_icon_type' => '',
                'hcode_et_icon_premade_style' => '',
                'hcode_font_icon_premade_style' => '',
                'hcode_font_awesome_custom_icon' => '',
                'hcode_font_awesome_custom_icon_image' => '',
            	'hcode_font_awesome_icon_list' => '',
                'hcode_et_line_custom_icon' => '',
                'hcode_et_line_custom_icon_image' => '',
            	'hcode_et_line_icon_list' => '',
            	'hcode_font_icon_size' => '',
                'hcode_icon_enable_link' => '0',
                'hcode_icon_link_url' => '',
                'hcode_icon_link_target' => '',
            	'show_border' => '',
            	'show_border_rounded' => '',
            	'hcode_icon_box_size' => '',
            	'hcode_icon_box_decoration' => '',
            	'hcode_icon_box_background_color' => '',
            	// et icons
            	'hcode_et_icon_box_size' => '',
            	'et_show_border' => '',
            	'show_et_border_rounded' => '',
            	'et_plain' => '',
            	'circled' => '',
            	'hcode_et_icon_box_decoration' => '',
            	'hcode_et_icon_box_background_color' => '',
                'hcode_font_awesome_icon_image_srcset' => 'full',
                'hcode_et_line_icon_image_srcset' => 'full',
            ), $atts ) );
    	$output = $icon_common_class = '';

    	$id = ( $id ) ? ' id="'.$id.'"' : '';
    	$class = ( $class ) ? ' '.$class : '';
    	$hcode_font_icon_type = ( $hcode_font_icon_type ) ? $hcode_font_icon_type : '';
        $hcode_font_awesome_custom_icon = ( $hcode_font_awesome_custom_icon ) ? $hcode_font_awesome_custom_icon : '';
        $hcode_font_awesome_custom_icon_image = ( $hcode_font_awesome_custom_icon_image ) ? $hcode_font_awesome_custom_icon_image : '';
    	$hcode_font_awesome_icon_list = ( $hcode_font_awesome_icon_list ) ? $hcode_font_awesome_icon_list : '';
    	$hcode_font_icon_size = ( $hcode_font_icon_size ) ? ' '.$hcode_font_icon_size : '';
        $hcode_icon_link_target  = !empty( $hcode_icon_link_target ) ? ' target="'.$hcode_icon_link_target.'"' : '';
    	$show_border = ( $show_border ) ? ' i-bordered' : '';
    	$show_border_rounded = ( $show_border_rounded ) ? ' i-rounded' : '';
    	$hcode_icon_box_size = ( $hcode_icon_box_size ) ? ' '.$hcode_icon_box_size : '';
    	$hcode_icon_box_decoration = ( $hcode_icon_box_decoration ) ? ' '.$hcode_icon_box_decoration : '';
    	$hcode_icon_box_background = ( $hcode_icon_box_background_color ) ? ' '.$hcode_icon_box_background_color : '';
    	// Et Line icons
        $hcode_et_line_custom_icon = ( $hcode_et_line_custom_icon ) ? $hcode_et_line_custom_icon : '';
        $hcode_et_line_custom_icon_image = ( $hcode_et_line_custom_icon_image ) ? $hcode_et_line_custom_icon_image : '';
        $hcode_et_line_icon_list = ( $hcode_et_line_icon_list ) ? $hcode_et_line_icon_list : '';
    	$hcode_et_icon_box_size = ( $hcode_et_icon_box_size ) ? ' '.$hcode_et_icon_box_size : '';
    	$et_show_border = ( $et_show_border ) ? ' i-bordered' : '';
    	$show_et_border_rounded = ( $show_et_border_rounded ) ? ' i-rounded' : '';
    	$et_plain = ( $et_plain ) ? ' i-plain' : '';
    	$circled = ( $circled ) ? ' i-circled' : '';
    	$hcode_et_icon_box_decoration = ( $hcode_et_icon_box_decoration ) ? ' '.$hcode_et_icon_box_decoration : '';
    	$hcode_et_icon_box_background_color = ( $hcode_et_icon_box_background_color ) ? ' '.$hcode_et_icon_box_background_color : '';
        // ET-Line
        switch ($hcode_et_icon_premade_style){
            case 'et-line-icons-1':
            case 'et-line-icons-2':
            case 'et-line-icons-3':
            case 'et-line-icons-4':
            case 'et-line-icons-5':
                $icon_common_class = '';
            break;
            case 'et-line-icons-6':
                $icon_common_class = 'i-background-box ';
            break;
            case 'et-line-icons-7':
            case 'et-line-icons-8':
            case 'et-line-icons-9':
            case 'et-line-icons-10':
            case 'et-line-icons-11':
                $icon_common_class = '';
            break;
            case 'et-line-icons-12':
                $icon_common_class = 'i-background-box ';
            break;
        }
        // Font-Awesome
        switch ($hcode_font_icon_premade_style){
            case 'font-awesome-icons-1':
            case 'font-awesome-icons-2':
            case 'font-awesome-icons-3':
            case 'font-awesome-icons-4':
                $icon_common_class = '';
            break;
            case 'font-awesome-icons-5':
                $icon_common_class = 'i-background-box ';
            break;
        }

        $hcode_font_awesome_icon_image_srcset  = !empty($hcode_font_awesome_icon_image_srcset) ? $hcode_font_awesome_icon_image_srcset : 'full';
        $hcode_et_line_icon_image_srcset  = !empty($hcode_et_line_icon_image_srcset) ? $hcode_et_line_icon_image_srcset : 'full';
        

        /* New Font Awesome Icons */

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_font_awesome_icon_list));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_font_awesome_icon_list = substr(strstr($hcode_font_awesome_icon_list," "), 1);

            if(array_key_exists($hcode_font_awesome_icon_list, $fa_icon_old)){
                $hcode_font_awesome_icon_list = $fa_icon_old[$hcode_font_awesome_icon_list];
            }else if(in_array($hcode_font_awesome_icon_list, $fa_icons_solid)){
                $hcode_font_awesome_icon_list = 'fas '.$hcode_font_awesome_icon_list;
            }else if(in_array($hcode_font_awesome_icon_list, $fa_icons_reg)){
                $hcode_font_awesome_icon_list = 'far '.$hcode_font_awesome_icon_list;
            }else if(in_array($hcode_font_awesome_icon_list, $fa_icons_brand)){
                $hcode_font_awesome_icon_list = 'fab '.$hcode_font_awesome_icon_list;
            }else{
                $hcode_font_awesome_icon_list = '';
            }
        }

        // Check For Font Type
    	switch ($hcode_font_icon_type) {
    		case 'hcode_font_awesome_icons':
                if( $hcode_font_awesome_custom_icon == 1 && !empty( $hcode_font_awesome_custom_icon_image ) ) {
                    $class = 'icon-image '.$icon_common_class.$show_border.$hcode_icon_box_size.$show_border_rounded.$hcode_icon_box_decoration.$hcode_icon_box_background;
                    if( $hcode_icon_enable_link == 1 && !empty( $hcode_icon_link_url ) ) {
                        $output .= '<a '.$hcode_icon_link_target.' href="'.esc_url( $hcode_icon_link_url ).'">'.wp_get_attachment_image( $hcode_font_awesome_custom_icon_image, $hcode_font_awesome_icon_image_srcset, '', array( 'class' => $class ) ).'</a>';
                    } else {
                        $output .= wp_get_attachment_image( $hcode_font_awesome_custom_icon_image, $hcode_font_awesome_icon_image_srcset, '', array( 'class' => $class ) );
                    }
                } else {
                    if( $hcode_icon_enable_link == 1 && !empty( $hcode_icon_link_url ) ) {
                        $output .= '<a '.$hcode_icon_link_target.' href="'.esc_url( $hcode_icon_link_url ).'"><i class="'.$icon_common_class.$hcode_font_awesome_icon_list.$hcode_font_icon_size.$show_border.$hcode_icon_box_size.$show_border_rounded.$hcode_icon_box_decoration.$hcode_icon_box_background.'"></i></a>';
                    } else {
                        $output .= '<i class="'.$icon_common_class.$hcode_font_awesome_icon_list.$hcode_font_icon_size.$show_border.$hcode_icon_box_size.$show_border_rounded.$hcode_icon_box_decoration.$hcode_icon_box_background.'"></i>';
                    }
                }
    		break;
    		case 'hcode_et_line_icons':
                if( $hcode_et_line_custom_icon == 1 && !empty( $hcode_et_line_custom_icon_image ) ) {
                    $class = 'icon-image '.$icon_common_class.$hcode_et_icon_box_size.$et_show_border.$show_et_border_rounded.$et_plain.$circled.$hcode_et_icon_box_decoration.$hcode_et_icon_box_background_color;
                    if( $hcode_icon_enable_link == 1 && !empty( $hcode_icon_link_url ) ) {
                        $output .= '<a '.$hcode_icon_link_target.' href="'.esc_url( $hcode_icon_link_url ).'">'.wp_get_attachment_image( $hcode_et_line_custom_icon_image, $hcode_et_line_icon_image_srcset, '', array( 'class' => $class ) ).'</a>';
                    } else {
                        $output .= wp_get_attachment_image( $hcode_et_line_custom_icon_image, $hcode_et_line_icon_image_srcset, '', array( 'class' => $class ) );
                    }
                } else {
                    if( $hcode_icon_enable_link == 1 && !empty( $hcode_icon_link_url ) ) {
                        $output .= '<a '.$hcode_icon_link_target.' href="'.esc_url( $hcode_icon_link_url ).'"><i class="'.$icon_common_class.$hcode_et_line_icon_list.$hcode_et_icon_box_size.$et_show_border.$show_et_border_rounded.$et_plain.$circled.$hcode_et_icon_box_decoration.$hcode_et_icon_box_background_color.'"></i></a>';
                    } else {
                        $output .= '<i class="'.$icon_common_class.$hcode_et_line_icon_list.$hcode_et_icon_box_size.$et_show_border.$show_et_border_rounded.$et_plain.$circled.$hcode_et_icon_box_decoration.$hcode_et_icon_box_background_color.'"></i>';
                    }
                }
    		break;
    	}
        return $output;
    }
}