<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


if( !class_exists( 'Hcode_Font_Color_Settings' ) ) {
	class Hcode_Font_Color_Settings {
		
		protected $settings = array();
		protected $value = '';
		protected $std = '';
		protected $text_tranform = array();

		protected $device_size = array(	
			'lg' => 'large',
			'md' => 'medium',
			'sm' => 'small',
			'xs' => 'extrasmall',
		);
		protected $device_layout = array(
			'xs' => 'portrait-smartphones',
			'sm' => 'portrait-tablets',
			'md' => 'landscape-tablets',
			'lg' => 'default',
		);
		protected $device_name = array(
			'xs' => 'Mobile',
			'sm' => 'Tablet',
			'md' => 'Mini desktop',
			'lg' => 'Desktop',
		);
		
		public function __construct( $settings, $value ) {

			$this->settings = $settings;
			$this->value = $value;

			$this->text_tranform = array(
				esc_html__( 'Capitalize', 'hcode-addons' ) => 'capitalize',
				esc_html__( 'Lowercase', 'hcode-addons' ) => 'lowercase',
				esc_html__( 'Uppercase', 'hcode-addons' ) => 'uppercase',
			);
		}

		public function hcode_font_settings() {
			$output = '';
			ob_start(); 
				$settings = $this->settings;
				$value = $this->value;
				$values = $this->hcode_resposive_values( $value );
				$sizes = $this->device_size;
				$layouts = $this->device_layout;
				$devices_name = $this->device_name;
				
				$hide_font_settings_element = $settings['hide_font_settings_element'];
				?>
				<div class="hcode-color-font-main-wrapper">
					<input name="<?php echo esc_attr( $settings['param_name'] ) ?>" class="wpb_vc_param_value <?php echo esc_attr( $settings['param_name'] ) ?> <?php echo esc_attr( $settings['type'] ) ?> '_field" type="hidden" value="<?php echo esc_attr( $value ) ?>"/>
					<div class="hcode-button-color-setting">
						<?php
							if( !in_array( 'text-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'text', 'Text Color' );
							}
							if( !in_array( 'text-hover-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'text_hover', 'Text Hover Color' );
							}
							if( !in_array( 'background-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'bg', 'Background Color' );	
							}
							if( !in_array( 'background-hover-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'bg_hover', 'Background Hover Color' );
							}
							if( !in_array( 'border-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'border', 'Border Color' );
							}
							if( !in_array( 'border-hover-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'border_hover', 'Border Hover Color' );
							}
							if( !in_array( 'icon-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'icon', 'Icon Color' );
							}
							if( !in_array( 'icon-hover-color', $hide_font_settings_element ) ) {
								echo $this->hcode_color_settings( $values,'icon_hover', 'Icon Hover Color' );
							}
						?>
					</div>
					<div class="vc_column-offset" data-column-offset="true">
						<div class="hcode-font-settings-container button-container">
							<div class="wpb_element_label">Font Settings For Button</div>
							<div class="tab">
								<?php 
								$active = '';
								foreach ( $sizes as $key => $size ) {
									$active = ( $i == 0 ) ? ' active' : '';
								?>
								<h3 class="font-setting-button <?php echo $size.$active;?>" data-device="<?php echo $size?>-device" title="<?php echo $devices_name[ $key ];?>">
									<i class="vc-composer-icon vc-c-icon-layout_<?php echo isset( $layouts[ $key ] ) ? $layouts[ $key ] : $key ?>"></i>
								</h3>
								<?php 
									$i++;
								}
								?>
							</div>

							<?php 
							foreach ( $sizes as $key => $size ) {
								$active_content = ( $j == 0 ) ? ' active' : '';
							?>
								<div  class="<?php echo $size.'-device'.$active_content;?> font-setting-content tab-content">
									<div class="hcode-font-setting-wrapper">
										<?php 
											if( !in_array( 'font-size', $hide_font_settings_element ) ) {
												echo $this->hcode_font_size( $key,$values  );
											}
											if( !in_array( 'line-height', $hide_font_settings_element ) ) {
												echo $this->hcode_font_height( $key,$values  );
											}
											if( !in_array( 'letter-spacing', $hide_font_settings_element ) ) {
												echo $this->hcode_font_letterspacing( $key,$values  );
											}
											if( !in_array( 'font-transform', $hide_font_settings_element ) ) {
												echo $this->hcode_font_transform( $key ,$values );
											}
										?>
									</div>
								</div>
							<?php  
								$j++; 
							}
							?>
						</div>
					</div>
				</div>
			<?php
			$output .= ob_get_contents();
			ob_end_clean();
			return $output;
		}
		
		public function hcode_font_transform( $size ,$values = array() ) {
			$output = '';
			$prefix = 'text-'.$size.'-';
			$field = 'align_'.$size;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.esc_html__( 'Text transform', 'hcode-addons' ).'</div>';
				$output .= '<select name="vc_'.$size.'_responsive_alignment" class="vc_column_offset_field" data-type="transform-'.$size.'">';
					$output .= '<option value="">'.esc_html__( 'None', 'hcode-addons' ).'</option>';
					foreach ( $this->text_tranform as $label => $index ) {
						$value = $prefix . $index;
						$output .= '<option value="' . $value . '"' . ( in_array( $value, $values ) ? ' selected' : '' ) . '>' . $label . '</option>';
					}
				$output .= '</select>';
			$output .= '</div>';
			return $output;
		}
		
		public function hcode_color_settings( $values = array(), $button_elements, $title='' ) {
			$output = '';
			$prefix = 'color_' . $button_elements;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.$title.'</div>';
				$output .= '<input type="text" data-type="color_'.$button_elements.'" class="hcode-color-picker" value="'.$values[$prefix].'" />';
			$output .= '</div>';
			return $output;
		}
		
		public function hcode_font_size( $size, $values = array() ) {	
			$output = '';
			$prefix = 'font_' . $size;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.esc_html__( 'Font size','hcode-addons').'
				<small> ('.esc_html__( 'in px','hcode-addons').')</small></div>';
				$output .= '<input type="text" data-type="font-' . $size . '" value="'.$values[$prefix].'"/>';
			$output .= '</div>';
			return $output;
		}
		
		public function hcode_font_height( $size, $values = array() ) {
			$output = '';
			$prefix = 'line_' . $size;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.esc_html__( 'Line Height','hcode-addons').'
				<small> ('.esc_html__( 'in px','hcode-addons').')</small></div>';
				$output .= '<input type="text" data-type="line-' . $size . '" value="'.$values[$prefix].'" />';
			$output .= '</div>';
			return $output;
		}

		public function hcode_font_letterspacing( $size, $values = array() ) {
			$prefix = 'letter_' . $size;
			$output .= '<div class=" vc_col-md-6 vc_col-sm-6 vc_col-xs-12">';
				$output .= '<div class="wpb_element_label">'.esc_html__( 'Letter Spacing','hcode-addons').'
				<small> ('.esc_html__( 'in px','hcode-addons').')</small></div>';
				$output .= '<input type="text" data-type="letter-' . $size . '" value="'.$values[$prefix].'" />';
			$output .= '</div>';
			return $output;
		}
		
		public static function hcode_resposive_values( $value ) {
	        $responsive_settings = array( 'font_lg' => '', 'font_md' => '','font_sm' => '', 'font_xs' => '' ,'line_lg' =>'' , 'line_md' =>'' ,'line_sm' =>'','line_xs' =>'' , 'transform_lg'=>'' ,'transform_md'=>'','transform_sm'=>'','transform_xs'=>'','letter_lg'=>'','letter_md'=>'','letter_sm'=>'','letter_xs'=>'','color_text'=>'','color_text_hover'=>'','color_bg'=>'','color_bg_hover'=>'','color_border'=>'','color_border_hover'=>'','color_icon'=>'','color_icon_hover'=>'');
	        return vc_parse_multi_attribute( $value, $responsive_settings );
	    }

		public static function generate_css( $value, $id = '' , $optional_id = '' ) {
	        
	        if( empty( $value ) || empty( $id ) ){
	            return;
	        }
	            
	        $values = Hcode_Font_Color_Settings::hcode_resposive_values( $value );
            $media_query = array(
                'desktop' => '',
                'mini'    => '@media (max-width: 1199px)',
                'tablet'  => '@media (max-width: 991px)',
                'mobile'  => '@media (max-width: 767px)',
            );
	            
            $res_css = '';
            $res_style = array( 'desktop' => '','mini'=>'', 'tablet' => '', 'mobile' => '' );
            $res_style_hover = array( 'desktop' => '' );
            $res_style_icon = array( 'desktop' => '' );
            $res_style_icon_hover = array( 'desktop' => '' );

            //button color
            if( isset( $values['color_text'] ) && $values['color_text'] != '' ) {
                $res_style['desktop'] .= 'color: '.$values['color_text'].' !important; ';
            }
            if( isset( $values['color_text_hover'] ) && $values['color_text_hover'] != '' ) {
                $res_style_hover['desktop'] .= 'color: '.$values['color_text_hover'].' !important; ';
            }
            if( isset( $values['color_bg'] ) && $values['color_bg'] != '' ) {
                $res_style['desktop'] .= 'background-color: '.$values['color_bg'].' !important; ';
            }
            if( isset( $values['color_bg_hover'] ) && $values['color_bg_hover'] != '' ) {
                $res_style_hover['desktop'] .= 'background-color: '.$values['color_bg_hover'].' !important; ';
            }
            if( isset( $values['color_border'] ) && $values['color_border'] != '' ) {
                $res_style['desktop'] .= 'border-color: '.$values['color_border'].' !important; ';
            }
            if( isset( $values['color_border_hover'] ) && $values['color_border_hover'] != '' ) {
                $res_style_hover['desktop'] .= 'border-color: '.$values['color_border_hover'].' !important; ';
            }

            //button icon color
            if( isset( $values['color_icon'] ) && $values['color_icon'] != '' ) {
                $res_style_icon['desktop'] .= 'color: '.$values['color_icon'].' !important; ';
            }
            if( isset( $values['color_icon_hover'] ) && $values['color_icon_hover'] != '' ) {
                $res_style_icon_hover['desktop'] .= 'color: '.$values['color_icon_hover'].' !important; ';
            }


            // font-size
            if( isset( $values['font_lg'] ) && $values['font_lg'] != '' ) {
                $res_style['desktop'] .= 'font-size: '.$values['font_lg'].' !important; ';
            }
            if( isset( $values['font_md'] ) && $values['font_md'] != '' ) {
                $res_style['mini'] .= 'font-size: '.$values['font_md'].' !important; ';
            }
            if( isset( $values['font_sm'] )&& $values['font_sm'] != '' ) {
                $res_style['tablet'] .= 'font-size: '.$values['font_sm'].' !important; ';
            }
            if( isset( $values['font_xs'] ) && $values['font_xs'] != '' ) {
                $res_style['mobile'] .= 'font-size: '.$values['font_xs'].' !important; ';
            }

            // line-height
            if( isset( $values['line_lg']) && $values['line_lg'] != '' ) {
                $res_style['desktop'] .= 'line-height: '.$values['line_lg'].' !important; ';
            }
            if( isset( $values['line_md'] ) && $values['line_md'] != '' ) {
                $res_style['mini'] .= 'line-height: '.$values['line_md'].' !important; ';
            }
            if( isset( $values['line_sm'] ) && $values['line_sm'] != '' ) {
                $res_style['tablet'] .= 'line-height: '.$values['line_sm'].' !important; ';
            }
            if( isset( $values['line_xs'] ) && $values['line_xs'] != '' ) {
                $res_style['mobile'] .= 'line-height: '.$values['line_xs'].' !important; ';
            }

            // text-transform
            if( isset( $values['transform_lg'] ) && $values['transform_lg'] != '' ) {
            	$text_transform = str_replace('text-lg-','',$values['transform_lg']);
                $res_style['desktop'] .= 'text-transform: '.$text_transform.' !important; ';
            }
            if( isset( $values['transform_md'] )&& $values['transform_md'] != '' ) {
            	$text_transform = str_replace('text-md-','',$values['transform_md']);
                $res_style['mini'] .= 'text-transform: '.$text_transform.' !important; ';
            }
            if( isset( $values['transform_sm'] )&& $values['transform_sm'] != '' ) {
            	$text_transform = str_replace('text-sm-','',$values['transform_sm']);
                $res_style['tablet'] .= 'text-transform: '.$text_transform.' !important; ';
            }
            if( isset( $values['transform_xs'] )&& $values['transform_xs'] != '' ) {
            	$text_transform = str_replace('text-xs-','',$values['transform_xs']);
                $res_style['mobile'] .= 'text-transform: '.$text_transform.' !important; ';
            }

            //letter-spacing
            if( isset( $values['letter_lg']) && $values['letter_lg'] != '' ) {
                $res_style['desktop'] .= 'letter-spacing: '.$values['letter_lg'].' !important; ';
            }
            if( isset( $values['letter_md'] ) && $values['letter_md'] != '' ) {
                $res_style['mini'] .= 'letter-spacing: '.$values['letter_md'].' !important; ';
            }
            if( isset( $values['letter_sm'] ) && $values['letter_sm'] != '' ) {
                $res_style['tablet'] .= 'letter-spacing: '.$values['letter_sm'].' !important; ';
            }
            if( isset( $values['letter_xs'] ) && $values['letter_xs'] != '' ) {
                $res_style['mobile'] .= 'letter-spacing: '.$values['letter_xs'].' !important; ';
            }

            //generate dynamic responsive css
            if( isset( $res_style['desktop'] ) && $res_style['desktop'] !== '' ) {
                $res_css .= $media_query['desktop'] . '  '. '.' . $id . ' {' . $res_style['desktop'] . ' }   ';
            }
            if( isset( $res_style['mini'] ) && $res_style['mini'] !== '' ) {
                $res_css .= $media_query['mini'] . ' { '. '.' . $id . ' {' . $res_style['mini'] . ' }  } ';
            }
            if( isset( $res_style['tablet'] ) && $res_style['tablet'] !== '' ) {
                $res_css .= $media_query['tablet'] . ' { '. '.' . $id . ' {' . $res_style['tablet'] . ' }  } ';
            }
            if( isset( $res_style['mobile'] ) && $res_style['mobile'] !== '' ) {
                $res_css .= $media_query['mobile'] . ' { '. '.' . $id . ' {' . $res_style['mobile'] . ' }  } ';
            }
            // button hover settings css
            if ( isset( $res_style_hover['desktop'] ) && $res_style_hover['desktop'] !== '' && empty($optional_id) ) {
            	 $res_css .=  ' '. '.' . $id . ':hover{' . $res_style_hover['desktop'] . ' }   ';
            }
            else{
            	$res_css .=  ' '. '.' . $optional_id . ' {' . $res_style_hover['desktop'] . ' }   ';
            }
            // icon settings css
            if (isset( $res_style_icon['desktop'] ) && $res_style_icon['desktop'] !== '' ) {
            	 $res_css .=  ' '. '.' . $id . ' i{' . $res_style_icon['desktop'] . ' }   ';
            }
            //icon hover settings css 
            if (isset( $res_style_icon_hover['desktop'] ) && $res_style_icon_hover['desktop'] !== '' ) {
            	 $res_css .=  ' '. '.' . $id . ':hover i{' . $res_style_icon_hover['desktop'] . ' }   ';
            }

            return $res_css;        
        }
	}
}

if( !function_exists( 'hcode_button_settings_callback' ) ) {
	function hcode_button_settings_callback( $settings, $value ) {
		$responsive_alignment = new Hcode_Font_Color_Settings( $settings, $value );
		return $responsive_alignment->hcode_font_settings();
 	}
}

if( function_exists( 'vc_add_shortcode_param' ) ) {
	vc_add_shortcode_param(	'hcode_button_settings', 'hcode_button_settings_callback', HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/button-setting.js' );
}