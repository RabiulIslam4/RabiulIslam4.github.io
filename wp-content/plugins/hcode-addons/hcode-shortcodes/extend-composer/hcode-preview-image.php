<?php
/**
 * H-Code Preview Image For All Shortcode In VC.
 *
 * @package H-Code
 */
?>
<?php 
// For Preeview Images "hcode_preview_image"
vc_add_shortcode_param( 'hcode_preview_image', 'hcode_custom_slider_image_settings_field', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js');
if ( ! function_exists( 'hcode_custom_slider_image_settings_field' ) ) :
 	function hcode_custom_slider_image_settings_field( $settings, $value ) {
 		$output = '';
      	$output .= '<div class="hcode-preview-image-main" data-url="'.HCODE_SHORTCODE_ADDONS_PREVIEW_IMAGE.'">';
        	$output .= '<div class="preview-image-hide"><img src="" alt="'.__( 'Preview Image', 'hcode-addons' ).'" /></div>';
      	$output .= '</div>';
    return $output;
  	}
endif;