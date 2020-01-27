<?php
/**
 * Shortcode For Icon List
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Icon List */
/*-----------------------------------------------------------------------------------*/
add_shortcode('hcode_font_class_list','hcode_font_class_list_shortcode');
if ( ! function_exists( 'hcode_font_class_list_shortcode' ) ) {
	function hcode_font_class_list_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        	'id' => '',
	        	'class' => '',
	        	'hcode_font_icon_class_type' => '',
	    ), $atts ) );
		$output = '';

		$id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? ' '.$class : '';


		switch ($hcode_font_icon_class_type) {
			case 'hcode_font_awesome_icons':
				$output .= '<div'.$id.' class="fa-examples'.$class.'">';
					$hcode_fa_icon_solid  = hcode_fontawesome_solid();
				    $hcode_fa_icon_regular = hcode_fontawesome_reg();
				    $hcode_fa_icon_brand  = hcode_fontawesome_brand();
				    $small_font_class = '';
					foreach ($hcode_fa_icon_solid as $key => $icon) {
						$small_font_class = (strlen($icon) >= 35) ? ' icon-list-small-font' : '';
						$output .= '<div class="col-md-4 col-sm-6 col-lg-3'.$small_font_class.'">';
				        	$output .= '<i class="fas '.$icon.'"></i>';
				            $output .= 'fas '.$icon;
				        $output .= '</div>';	
					}
					foreach ($hcode_fa_icon_regular as $key => $icon) {
						$small_font_class = (strlen($icon) >= 35) ? ' icon-list-small-font' : '';
						$output .= '<div class="col-md-4 col-sm-6 col-lg-3">';
				        	$output .= '<i class="far '.$icon.'"></i>';
				            $output .= 'far '.$icon;
				        $output .= '</div>';	
					}
					foreach ($hcode_fa_icon_brand as $key => $icon) {
						$small_font_class = (strlen($icon) >= 35) ? ' icon-list-small-font' : '';
						$output .= '<div class="col-md-4 col-sm-6 col-lg-3">';
				        	$output .= '<i class="fab '.$icon.'"></i>';
				            $output .= 'fab '.$icon;
				        $output .= '</div>';	
					}
			    $output .= '</div>';
			break;
			case 'hcode_et_line_icons':
				$hcode_icons = hcode_icons();
				foreach ($hcode_icons as $key => $icon) {
					$output .= '<span class="box1">';
		                $output .= '<span class="'.$icon.'" aria-hidden="true"></span>';
		                $output .= '&nbsp;'.$icon;
	                $output .= '</span>';
	            }
			break;
		}
	    return $output;
	}
}