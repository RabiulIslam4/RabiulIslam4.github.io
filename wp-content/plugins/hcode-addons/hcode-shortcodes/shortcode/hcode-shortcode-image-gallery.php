<?php
/**
 * Shortcode For Image gallery
 *
 * @package H-Code
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_image_gallery_shortcode' ) ) {
	function hcode_image_gallery_shortcode( $atts, $content = null ) { 
		extract( shortcode_atts( array(
	        	'image_gallery_type' => '',
	        	'simple_image_type' => '',
	        	'lightbox_type' => '',
	        	'column' => '',
	        	'image_gallery' => '',
	        	'hcode_column_animation_style' => '',
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
		        'hide_lightbox_gallery' => '',
		        'id' => '',
		        'class' => '',
		        'hcode_image_srcset' => 'full',
	    ), $atts ) );
		global $hcode_gallery_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
		$classes = array();
		$explode_image = explode(",",$image_gallery);

		if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
			$hcode_gallery_token = !empty( $hcode_gallery_token ) ? $hcode_gallery_token : 0;
	        $hcode_gallery_token = $hcode_gallery_token + 1;
	        $hcode_token_class = $classes[] = 'hcode-gallery-'.$hcode_gallery_token;
	    }
		
		$hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

		$output = $classes_desktop = $classes_ipad = $classes_masonry = '';
		$popup_id = ( $id ) ? $id : 'default';
		$id = ( $id ) ? 'id="'.$id.'"' : '';
		$class_main = ( $class ) ? $class.' ' : '';
		$hcode_column_animation_style = ($hcode_column_animation_style) ? " wow ".$hcode_column_animation_style : '';
		$hide_lightbox = ( $hide_lightbox_gallery == 1 ) ? '' : 'lightbox-gallery';
		$hide_lightbox_zoom = ( $hide_lightbox_gallery == 1 ) ? '' : 'zoom-gallery';
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

		switch ($column) {
	        case '1':
				$classes_desktop .= '12';
	            $classes_ipad .= '12';
				$classes_masonry .= 'work-1col';
			break;   
			case '2':
				$classes_desktop .= '6';
	            $classes_ipad .= '6';
				$classes_masonry .= 'work-2col';
			break;
			case '3':
				$classes_desktop .= '4';
	            $classes_ipad .= '6';
				$classes_masonry .= 'work-3col';
			break;
			case '4':
				$classes_desktop .= '3';
	            $classes_ipad .= '6';
				$classes_masonry .= 'work-4col';
			break;       
	       	case '6':
				$classes_desktop .= '2';
	            $classes_ipad .= '6';
				$classes_masonry .= 'work-6col';
			break;
		}
		$class = 'col-md-'.$classes_desktop.' col-sm-'.$classes_ipad.$class_list;

		$img_lightbox_caption = hcode_option_image_caption($image_gallery);
		$img_lightbox_title = hcode_option_lightbox_image_title($image_gallery);
		$image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
		$image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;


		switch ($image_gallery_type) {
	     	case 'simple-image-lightbox':
	     		switch ($simple_image_type) {
					case 'zoom':
						if( $explode_image[0] ) {
							$image_full_url = wp_get_attachment_image_src( $explode_image[0], 'full' );
							$output .= '<div '.$id.' class="'.$class_main.$hcode_column_animation_style.$class_list.'">';
							if( $hide_lightbox_gallery != 1 ){
					        	$output .= '<a class="image-popup-no-margins" href="'.$image_full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.'>';
					        }
							$output .= wp_get_attachment_image( $explode_image[0], $hcode_image_srcset, '', array( 'class' => 'project-img-gallery' ) );
							if( $hide_lightbox_gallery != 1 ){
							 	$output .= '</a>';
							}
					        $output .='</div>';
					    }
					break;
					case 'feet':
						if( $explode_image[0] ) {
							$image_full_url = wp_get_attachment_image_src( $explode_image[0], 'full' );
							$output .= '<div '.$id.' class="'.$class_main.$hcode_column_animation_style.$class_list.'">';
							if( $hide_lightbox_gallery != 1 ){
					            $output .= '<a class="image-popup-vertical-fit" href="'.$image_full_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.'>';
					        }
							$output .= wp_get_attachment_image( $explode_image[0], $hcode_image_srcset, '', array( 'class' => 'project-img-gallery' ) );
							if( $hide_lightbox_gallery != 1 ){
								$output .= '</a>';
							}
					        $output .='</div>';
					    }
					break;
				}
	     	break;
	     	case 'lightbox-gallery':
	     		switch ($lightbox_type) {
					case 'grid':
						if( $explode_image ) {
							$output .='<div '.$id.' class="'.$class_main.$hide_lightbox.'">';
							foreach ($explode_image as $key => $value) {

								$img_lightbox_caption = hcode_option_image_caption($value);
								$img_lightbox_title = hcode_option_lightbox_image_title($value);
								$image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
								$image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ; 
								$image_full_url = wp_get_attachment_image_src( $value, 'full' );

								$output .= '<div class="'.$class.' '.$hcode_column_animation_style.'">';
								if( $hide_lightbox_gallery != 1 ){
						            $output .='<a href="'.$image_full_url[0].'" class="lightboxgalleryitem" data-group="'.$popup_id.'" '.$image_lightbox_title.$image_lightbox_caption.'>';
						        }
						        $output .= wp_get_attachment_image( $value, $hcode_image_srcset, '', array( 'class' => 'project-img-gallery' ) );
						        if( $hide_lightbox_gallery != 1 ){
						            $output .='</a>';
						        }
						        $output .='</div>';
						    }
					        $output .='</div>';
					    }
					break;
					case 'masonry':
						if( $explode_image ) {
							$output .= '<div '.$id.' class="'.$class_main.$classes_masonry.'">';
								$output .='<div class="col-md-12 grid-gallery overflow-hidden '.$class_list.'">';
									$output .='<ul class="grid masonry-items '.$hide_lightbox.'">';
									foreach ($explode_image as $key => $value) {

										$img_lightbox_caption = hcode_option_image_caption($value);
										$img_lightbox_title = hcode_option_lightbox_image_title($value);
										$image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
										$image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;

										$image_full_url = wp_get_attachment_image_src( $value, 'full' );

										$output .='<li class="'.$hcode_column_animation_style.'">';
										if( $hide_lightbox_gallery != 1 ){
			                                $output .='<a href="'.$image_full_url[0].'" class="lightboxgalleryitem" data-group="'.$popup_id.'" '.$image_lightbox_title.$image_lightbox_caption.'>';
			                            }
			                            $output .= wp_get_attachment_image( $value, $hcode_image_srcset );
			                            if( $hide_lightbox_gallery != 1 ){
			                                $output .='</a>';
			                            }
			                            $output .='</li>';
								    }
							        $output .='</ul>';
						        $output .='</div>';
						    $output .='</div>';
					    }
					break;
				}
	     	break;
     		case 'zoom-gallery':
 				if( $explode_image[0] ) {
					$output .= '<div '.$id.' class="'.$class_main.$hide_lightbox_zoom.' '.$hcode_column_animation_style.'">';
					$image_full_url = wp_get_attachment_image_src( $explode_image[0], 'full' );
					if( $hide_lightbox_gallery != 1 ){
			            $output .= '<a href="'.$image_full_url[0].'" class="lightboxzoomgalleryitem" data-group="'.$popup_id.'" '.$image_lightbox_title.$image_lightbox_caption.'>';
			        }
     				$classes = 'project-img-gallery '.$class_list;
     				$output .= wp_get_attachment_image( $explode_image[0], $hcode_image_srcset, '', array( 'class' => $classes ) );
		     		if( $hide_lightbox_gallery != 1 ){
		     			$output .= '</a>';
		     		}
			        $output .='</div>';
			    }
     		break;

	    } 
	    return $output;   
	}
}
add_shortcode( 'hcode_image_gallery', 'hcode_image_gallery_shortcode' );