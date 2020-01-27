<?php
/**
 * Metabox Map
 *
 * @package H-Code 
 */
?>
<?php
if ( ! function_exists( 'hcode_meta_box_text' ) ) {
	function hcode_meta_box_text($id, $label, $desc = '', $short_desc = '',$extra='', $hcode_dependency = '' ) {
		global $post;
		
		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
		$html .= '<div class="left-part">';
			$html .= $label;
			if($desc) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
			$html .= '<input type="text" id="' . $id . '" name="' . $id . '" value="' . get_post_meta($post->ID, $id, true) . '" />';
			if($short_desc) {
				$html .= '<span class="short-description">' . $short_desc . '</span>';
			}
			if(!empty($extra) && get_post_meta($post->ID, $id, true) != ''){
				$html .= '<input name="hcode_hidden_val_'.$extra.'" id="hcode_hidden_val_'.$extra.'" type="hidden" value="1" />';
			}
		$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}
}

if ( ! function_exists( 'hcode_meta_box_dropdown' ) ) {
	function hcode_meta_box_dropdown($id, $label, $options, $desc = '',$extra='', $hcode_dependency = '' ) {
		global $post;

		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = $select_class = '';

		$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
            $html .= '<div class="left-part">';
                    $html .= $label;
                    if($desc) {
                            $html .= '<span class="description">' . $desc . '</span>';
                    }
            $html .='</div>';
	        $html .= '<div class="right-part">';
	            $html .= '<select id="' . $id . '" class="'.$select_class.'" name="' . $id . '">';
                foreach($options as $key => $option) {
                    if(get_post_meta($post->ID, $id, true) == (string)$key && get_post_meta($post->ID, $id, true) != '') {
                        $selected = 'selected="selected"';
                    } else {
                        $selected = '';
                    }
                    $html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
                }
                $html .= '</select>';

                if(!empty($extra) && get_post_meta($post->ID, $id, true) != '') {
					$html .= '<input name="hcode_hidden_val_'.$extra.'" id="hcode_hidden_val_'.$extra.'" type="hidden" value="1" />';
                }

	        $html .='</div>';
		$html .= '</div>';
		echo $html;
	}
}

if ( ! function_exists( 'hcode_meta_box_dropdown_sidebar' ) ) {
	function hcode_meta_box_dropdown_sidebar($id, $label, $options, $desc = '', $child_hidden = '', $hcode_dependency = '' ) {
		global $post;

		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = $select_class = '';
		$flag = false;
			$child_hidden = ( $child_hidden ) ? ' hide-child '.$child_hidden : '';
			$html .= '<div class="'.$id.'_box description_box'.$child_hidden.'"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $label;
					if($desc) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<select id="' . $id . '" class="'.$select_class.'" name="' . $id . '">';
					foreach($options as $key => $option) {
						if(get_post_meta($post->ID, $id, true) == $key && get_post_meta($post->ID, $id, true) != '') {
							$selected = 'selected="selected"';
						}else {
								$selected = '';
						}

						$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';

					}
					$html .= '</select>';
				$html .='</div>';	
			$html .= '</div>';
		echo $html;
	}
}

/* menu dropdown */

if ( ! function_exists( 'hcode_meta_box_dropdown_menu' ) ) {
	function hcode_meta_box_dropdown_menu($id, $label, $options, $desc = '', $hcode_dependency = '' )
	{
		global $post;

		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = $select_class = '';
		$flag = false;

		
			$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $label;
					if($desc) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<select id="' . $id . '" class="'.$select_class.'" name="' . $id . '">';
					$html .= '<option value="">Default</option>';
					$menus = wp_get_nav_menus();
					$menu_array = array();
					foreach ($menus as $key => $value) {
						if(get_post_meta($post->ID, $id, true) == $value->slug && get_post_meta($post->ID, $id, true) != '') {
							$selected = 'selected="selected"';
						}else {
								$selected = '';
						}

						$html .= '<option ' . $selected . 'value="' . $value->slug . '">' . $value->name . '</option>';
					}
					$html .= '</select>';
				$html .='</div>';	
			$html .= '</div>';
		echo $html;
	}
}

if ( ! function_exists( 'hcode_meta_box_textarea' ) ) {
	function hcode_meta_box_textarea($id, $label, $desc = '', $default = '' , $hcode_dependency = '' )
	{
		global $post;

		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
		$html .= '<div class="left-part">';
			$html .= $label;
			if($desc) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
		$html .='</div>';
		
		if( get_post_meta($post->ID, $id, true)) {
			$value = get_post_meta($post->ID, $id, true);
		} else {
			$value = '';
		}
		$html .= '<div class="right-part">';
			$html .= '<textarea cols="120" id="' . $id . '" name="' . $id . '">' . $value . '</textarea>';
		$html .='</div>';
		$html .= '</div>';

		echo $html;
	}
}

if ( ! function_exists( 'hcode_meta_box_upload' ) ) {
	function hcode_meta_box_upload( $id, $label, $desc = '', $hcode_dependency = '', $hcode_image_popup_title = '', $hcode_image_popup_button_title = '' ) {
		global $post;

		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
		$html .= '<div class="left-part">';
			$html .= $label;
			if($desc) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
			$html .= '<input name="' . $id . '" class="upload_field" id="hcode_upload" type="text" value="' . get_post_meta($post->ID,  $id, true) . '" />';
			$html .= '<input name="'. $id.'_thumb" class="'. $id.'_thumb" id="'. $id.'_thumb" type="hidden" value="'.get_post_meta($post->ID,  $id, true).'" />';
	            $html .= '<img alt="" class="upload_image_screenshort" src="'.get_post_meta($post->ID,  $id, true).'" />';
			$html .= '<input data-popup-title="'.esc_attr( $hcode_image_popup_title ).'" data-popup-button-title="'.esc_attr( $hcode_image_popup_button_title ).'" class="hcode_upload_button" id="hcode_upload_button" type="button" value="'.esc_html( "Browse", "hcode-addons" ).'" />';
			$html .= '<span class="hcode_remove_button button">'.__("Remove", "hcode-addons").'</span>';      
		$html .='</div>';
		$html .= '</div>';
		echo $html;
	}
}

if ( ! function_exists( 'hcode_meta_box_upload_multiple' ) ) {
	function hcode_meta_box_upload_multiple($id, $label, $desc = '',$extra='', $hcode_dependency = '', $hcode_image_popup_title = '', $hcode_image_popup_button_title = '' )
	{
		global $post;

		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}
		
		$html = '';
		$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
				$html .= $label;
				if($desc) {
					$html .= '<span class="description">' . $desc . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<input name="' . $id . '" class="upload_field" id="hcode_upload" type="hidden" value="'.get_post_meta($post->ID,  $id, true).'" />';

				$html .= '<div class="multiple_images">';
				$val = explode(",",get_post_meta($post->ID,  $id, true));
				
				foreach ($val as $key => $value) {
					if(!empty($value)):
						$image_url = wp_get_attachment_url( $value );
						$html .='<div id='.$value.'>';
		                	$html .= '<img alt="" class="upload_image_screenshort_multiple" src="'.$image_url.'" style="width:100px;" />';
		                	$html .= '<a href="javascript:void(0)" class="remove">'.__("Remove", "hcode-addons").'</a>';
		            	$html .= '</div>';
		            endif;
				}
		        $html .= '</div>';
				$html .= '<input data-popup-title="'.esc_attr( $hcode_image_popup_title ).'" data-popup-button-title="'.esc_attr( $hcode_image_popup_button_title ).'" class="hcode_upload_button_multiple" id="hcode_upload_button_multiple" type="button" value="'.esc_html__( "Browse", "hcode-addons" ).'" />'.esc_html__(" Select Files", "hcode-addons" );
		        if(!empty($extra) && get_post_meta($post->ID, $id, true) != '')
						$html .= '<input name="hcode_hidden_val_'.$extra.'" id="hcode_hidden_val_'.$extra.'" type="hidden" value="1" />';

			$html .='</div>';
		$html .= '</div>';
		echo $html;
	}
}

if ( ! function_exists( 'hcode_meta_box_colorpicker' ) ) {
	function hcode_meta_box_colorpicker( $id, $label, $desc = '', $hcode_dependency = '' ) {
		global $post;
        
		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($hcode_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$hcode_dependency['element'].'"';
			foreach ($hcode_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
				$html .= $label;
				if($desc) {
					$html .= '<span class="description">' . $desc . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<input type="text" class="hcode-color-picker" id="' . $id . '" name="' . $id . '" value="' . get_post_meta($post->ID, $id, true) . '" />';
			$html .='</div>';
		$html .='</div>';
		echo $html;
	}
}