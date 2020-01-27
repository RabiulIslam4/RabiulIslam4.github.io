<?php
/**
 * Shortcode For Team Member Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Team Member Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_team_slider_shortcode' ) ) {
	function hcode_team_slider_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
				'hcode_slider_premade_style' => 'default',
				'hcode_slider_preview_image' => '',
	        	'show_pagination' => '',
                'show_pagination_style' => '',
                'show_navigation' => '',
                'show_navigation_style' => '',
                'show_pagination_color_style' => '',
                'hcode_image_carousel_itemsdesktop' => '3',
                'hcode_image_carousel_itemsminidesktop' => '3',
                'hcode_image_carousel_itemstablet' => '2',
                'hcode_image_carousel_itemsmobile' => '1',
                'hcode_image_carousel_autoplay' => '',
                'hcode_image_carousel_loop' => '',
                'hcode_slider_id' => '',
                'hcode_slider_class' => '',
                'show_cursor_color_style' => '',
                'stoponhover' => '',
                'slidespeed' => '3000',
                'custom_slidespeed' => '',
                'slidedelay' => '700',
                'custom_slidedelay' => '',
	    ), $atts ) );

		$output = $slider_config = '';
		$hcode_slider_premade_style = ( $hcode_slider_premade_style ) ? $hcode_slider_premade_style : 'team-agency';
	    $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;
	    $pagination = hcode_owl_pagination_slider_classes($show_pagination_style);
	    $pagination_style = hcode_owl_pagination_color_classes($show_pagination_color_style);
	    $hcode_slider_id = ( $hcode_slider_id ) ? $hcode_slider_id : $hcode_slider_premade_style;
	    $hcode_slider_class  = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
	    $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';

        global $hcode_team_slider_parent_type;
    	$hcode_team_slider_parent_type = $hcode_slider_premade_style;

        switch ($hcode_slider_premade_style) {

            case 'team-member-slider-1': // Owl Carousel Slider Style
                	
                	$output .= '<div id="'.$hcode_slider_id.'" class="owl-carousel owl-theme dark-pagination bottom-arrow-pagination'.$show_cursor_color_style.' main-slider '.$hcode_slider_class.'">';
                    	$output .= do_shortcode($content);
                    $output .= '</div>';

					$slider_config .= 'nav: true, ';
					$slider_config .= 'autoplayTimeout: 300, ';
					$slider_config .= 'dotsSpeed: 400, ';
					$slider_config .= 'items: 1, ';
					$slider_config .= 'navText: ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"] ';

            break;
            case 'default': // Default Slider Style
                	
					$output .= '<div class="team-agency-owl position-relative">';
				        $output .= '<div class="container">';
				            $output .= '<div class="row">';
								$output .= '<div id="'.$hcode_slider_id.'" class="owl-carousel owl-theme team-agency '.$show_cursor_color_style.$pagination.$navigation.$pagination_style.$navigation.$hcode_slider_class.'">';
										$output .= do_shortcode($content);
								$output .= '</div>';
							$output .= '</div>';
						$output .= '</div>';
						if( $show_navigation == 1 ):
				            if($show_navigation_style == 1):
				                $output .= '<div class="feature_nav">';
				                    $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre.png" width="96" height="96"></a>';
				                    $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next.png" width="96" height="96"></a>';
				                $output .= '</div>';
				            else:
				                $output .= '<div class="feature_nav">';
				                    $output .= '<a class="prev left carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-white-bg.png" width="96" height="96"></a>';
				                    $output .= '<a class="next right carousel-control"><img alt="" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-white-bg.png" width="96" height="96"></a>';
				                $output .= '</div>';
				            endif;
				        endif;
				    $output .= '</div>';

					/* Add custom script Start*/
					$slidespeed = ( $slidespeed ) ? $slidespeed : '3000';
					$custom_slidespeed = ( $custom_slidespeed ) ? $custom_slidespeed : '';
					if( $slidespeed == 'custom' && $custom_slidespeed && is_numeric( $custom_slidespeed ) ) {
					    $slidespeed = $custom_slidespeed;
					}

					if( $slidespeed == 'custom' ) {
					    $slidespeed = '3000';
					}

					$slidedelay = ( $slidedelay ) ? $slidedelay : '700';
			        $custom_slidedelay = ( $custom_slidedelay ) ? $custom_slidedelay : '';
			        if( $slidedelay == 'custom' && $custom_slidedelay && is_numeric( $custom_slidedelay ) ) {
			            $slidedelay = $custom_slidedelay;
			        }

			        if( $slidedelay == 'custom' ) {
			            $slidedelay = '700';
			        }

				    ( $show_pagination == 1 ) ? $slider_config .= 'dots: true,' : $slider_config .= 'dots: false,';
				    ( $hcode_image_carousel_autoplay == 1 ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$slidespeed.',autoplaySpeed: '.$slidedelay.',' : $slider_config .= 'autoPlay: false,';
			        ( $stoponhover == 1) ? $slider_config .= 'autoplayHoverPause: true, ' : $slider_config .= 'autoplayHoverPause: false, ';
			        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
				    ( $hcode_image_carousel_loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
			        ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "responsive:{" : '';
			        ( $hcode_image_carousel_itemsmobile ) ? $slider_config .= '0:{ items: '.$hcode_image_carousel_itemsmobile.' },' : $slider_config .= '0:{ items: 1 },';
			        ( $hcode_image_carousel_itemstablet ) ? $slider_config .= '700:{ items: '.$hcode_image_carousel_itemstablet.'},' : $slider_config .= '700:{ items: 2 },';
			        ( $hcode_image_carousel_itemsminidesktop ) ? $slider_config .= '991:{ items: '.$hcode_image_carousel_itemsminidesktop.' },' : $slider_config .= '991:{ items: 3 },';
			        ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= '1200:{ items: '.$hcode_image_carousel_itemsdesktop.' },' : $slider_config .= '1200:{ items: 4 },';
			        ( $hcode_image_carousel_itemsdesktop || $hcode_image_carousel_itemsminidesktop || $hcode_image_carousel_itemstablet || $hcode_image_carousel_itemsmobile ) ? $slider_config .= "}" : '';

            break;
		}
			ob_start();?>
			<script type="text/javascript">jQuery(document).ready(function () { jQuery("<?php echo '#'.$hcode_slider_id;?>").owlCarousel({ <?php echo $slider_config;?> }); }); </script>
			<?php 
			$script = ob_get_contents();
			ob_end_clean();
			$output .= $script;

		/* Add custom script End*/
	    return $output;
	}
}
add_shortcode('hcode_team_slider','hcode_team_slider_shortcode');

if ( ! function_exists( 'hcode_team_slide_content_shortcode' ) ) {
	function hcode_team_slide_content_shortcode( $atts, $content = null ) {

        global $hcode_team_slider_parent_type;

		extract( shortcode_atts( array(
				'id' => '',
	        	'class' => '',
	        	'hcode_team_member_image' => '',
	        	'hcode_team_member_title' => '',
	        	'hcode_team_member_designation' => '',
	        	'hcode_team_member_headline' => '',
	        	'hcode_team_member_separator' => '',
	        	'title_enable_link' => '0',
	        	'title_link_target' => '',
	        	'title_link_url' => '',
	        	'hcode_team_member_fb' => '',
	        	'hcode_team_member_fb_url' => '',
	        	'hcode_team_member_tw' => '',
	        	'hcode_team_member_tw_url' => '',
	        	'hcode_team_member_googleplus' => '',
	        	'hcode_team_member_googleplus_url' => '',
	        	'hcode_team_member_db' => '',
	        	'hcode_team_member_db_url' => '',
	        	'hcode_team_member_yt' => '',
	        	'hcode_team_member_yt_url' => '',
	        	'hcode_team_member_li' => '',
	        	'hcode_team_member_li_url' => '',
	        	'hcode_team_member_ig' => '',
	        	'hcode_team_member_ig_url' => '',
	        	'hcode_team_member_pi' => '',
	        	'hcode_team_member_pi_url' => '',
	        	'hcode_team_member_gh' => '',
	        	'hcode_team_member_gh_url' => '',
	        	'hcode_team_member_xing' => '',
				'hcode_team_member_xing_url' => '',
				'hcode_team_member_vk' => '',
				'hcode_team_member_vk_url' => '',
	        	'hcode_team_member_ws' => '',
	        	'hcode_team_member_ws_url' => '',
	        	'hcode_team_member_email' => '',
				'hcode_team_member_email_url' => '',
	        	'hcode_team_member_custom_link' => '',
	        	'hcode_column_animation_style' => '',
	        	'hcode_column_animation_duration' => '',
	        	'hcode_title_color' => '',
	        	'hcode_designation_color' => '',
	        	'hcode_team_designation_bg_color' => '',
	            'hcode_team_icon_color' => '',
	            'hcode_team_member_title_font_settings' => '',
				'hcode_team_member_designation_font_settings' => '',
				'hcode_team_member_headline_font_settings' => '',
				'hcode_team_member_social_icon_font_settings' => '',
	            'hcode_image_srcset' => 'full',
	    ), $atts ) );

	    $id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? ' '.$class : '';

		$hcode_team_member_image = ( $hcode_team_member_image ) ? $hcode_team_member_image : '';
		$hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

		$hcode_team_member_title = ( $hcode_team_member_title ) ? $hcode_team_member_title : '';
		$hcode_team_member_designation = ( $hcode_team_member_designation ) ? $hcode_team_member_designation : '';
		$hcode_team_member_separator = ( $hcode_team_member_separator ) ? $hcode_team_member_separator : '';
		$title_link_target  = !empty( $title_link_target ) ? ' target="'.$title_link_target.'"' : '';
		$hcode_team_member_headline = ( $hcode_team_member_headline ) ? $hcode_team_member_headline : '';
		$hcode_team_member_fb = ( $hcode_team_member_fb ) ? $hcode_team_member_fb : '';
		$hcode_team_member_fb_url = ( $hcode_team_member_fb_url ) ? $hcode_team_member_fb_url : '#';
		$hcode_team_member_tw = ( $hcode_team_member_tw ) ? $hcode_team_member_tw : '';
		$hcode_team_member_tw_url = ( $hcode_team_member_tw_url ) ? $hcode_team_member_tw_url : '#';
		$hcode_team_member_googleplus = ( $hcode_team_member_googleplus ) ? $hcode_team_member_googleplus : '';
		$hcode_team_member_googleplus_url = ( $hcode_team_member_googleplus_url ) ? $hcode_team_member_googleplus_url : '#';
		$hcode_team_member_db = ( $hcode_team_member_db ) ? $hcode_team_member_db : '';
		$hcode_team_member_db_url = ( $hcode_team_member_db_url ) ? $hcode_team_member_db_url : '#';
		$hcode_team_member_yt = ( $hcode_team_member_yt ) ? $hcode_team_member_yt : '';
		$hcode_team_member_yt_url = ( $hcode_team_member_yt_url ) ? $hcode_team_member_yt_url : '#';
		$hcode_team_member_li = ( $hcode_team_member_li ) ? $hcode_team_member_li : '';
		$hcode_team_member_li_url = ( $hcode_team_member_li_url ) ? $hcode_team_member_li_url : '#';
		$hcode_team_member_ig = ( $hcode_team_member_ig ) ? $hcode_team_member_ig : '';
		$hcode_team_member_ig_url = ( $hcode_team_member_ig_url ) ? $hcode_team_member_ig_url : '#';
		$hcode_team_member_pi = ( $hcode_team_member_pi ) ? $hcode_team_member_pi : '';
		$hcode_team_member_pi_url = ( $hcode_team_member_pi_url ) ? $hcode_team_member_pi_url : '#';
		$hcode_team_member_gh = ( $hcode_team_member_gh ) ? $hcode_team_member_gh : '';
		$hcode_team_member_gh_url = ( $hcode_team_member_gh_url ) ? $hcode_team_member_gh_url : '#';
		$hcode_team_member_xing = ( $hcode_team_member_xing ) ? $hcode_team_member_xing : '';
		$hcode_team_member_xing_url = ( $hcode_team_member_xing_url ) ? $hcode_team_member_xing_url : '#';
		$hcode_team_member_vk = ( $hcode_team_member_vk ) ? $hcode_team_member_vk : '';
		$hcode_team_member_vk_url = ( $hcode_team_member_vk_url ) ? $hcode_team_member_vk_url : '#';
		$hcode_team_member_ws = ( $hcode_team_member_ws ) ? $hcode_team_member_ws : '';
		$hcode_team_member_ws_url = ( $hcode_team_member_ws_url ) ? $hcode_team_member_ws_url : '#';
		$hcode_team_member_email = ( $hcode_team_member_email ) ? $hcode_team_member_email : '';
		$hcode_team_member_email_url = ( $hcode_team_member_email_url ) ? $hcode_team_member_email_url : '#';
		$hcode_team_member_custom_link = ( $hcode_team_member_custom_link ) ? $hcode_team_member_custom_link : '';
		$hcode_designation_color = ( $hcode_designation_color ) ? ' style="color: '.$hcode_designation_color.' !important;"' : '';
		$hcode_title_color = ( $hcode_title_color ) ? 'style="color: '.$hcode_title_color.' !important;"' : '';
		$hcode_team_designation_bg_color = ( $hcode_team_designation_bg_color ) ? 'style="background: '.$hcode_team_designation_bg_color.' !important;"' : '';
	    $hcode_team_icon_color = ( $hcode_team_icon_color ) ? 'style="color: '.$hcode_team_icon_color.' !important;"' : '';

		$target = 'target="_BLANK"';

		$hcode_column_animation_style = ( $hcode_column_animation_style ) ? ' wow '.$hcode_column_animation_style : '';
	    $hcode_column_animation_duration = ( $hcode_column_animation_duration ) ? ' data-wow-duration= '.$hcode_column_animation_duration.'ms' : '';

		$output = $hcode_team_member_title_font_settings_id = $hcode_team_member_title_font_settings_style = $hcode_team_member_title_font_settings_class = $hcode_team_member_designation_font_settings_id = $hcode_team_member_designation_font_settings_style = $hcode_team_member_designation_font_settings_class = $hcode_team_member_headline_font_settings_id = $hcode_team_member_headline_font_settings_style = $hcode_team_member_headline_font_settings_class = $hcode_team_member_social_icon_font_settings_id = $hcode_team_member_social_icon_font_settings_style = $hcode_team_member_social_icon_font_settings_class = '';

		global $font_settings_array;
		if( !empty( $hcode_team_member_title_font_settings ) ) {
		    $hcode_team_member_title_font_settings_id = uniqid('hcode-font-setting-');
		    $hcode_team_member_title_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_team_member_title_font_settings, $hcode_team_member_title_font_settings_id );
		    $hcode_team_member_title_font_settings_class = ' '.$hcode_team_member_title_font_settings_id;
		}
		if( !empty( $hcode_team_member_designation_font_settings ) ) {
		    $hcode_team_member_designation_font_settings_id = uniqid('hcode-font-setting-');
		    $hcode_team_member_designation_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_team_member_designation_font_settings, $hcode_team_member_designation_font_settings_id );
		    $hcode_team_member_designation_font_settings_class = ' '.$hcode_team_member_designation_font_settings_id;
		}
		if( !empty( $hcode_team_member_headline_font_settings ) ) {
		    $hcode_team_member_headline_font_settings_id = uniqid('hcode-font-setting-');
		    $hcode_team_member_headline_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_team_member_headline_font_settings, $hcode_team_member_headline_font_settings_id );
		    $hcode_team_member_headline_font_settings_class = ' '.$hcode_team_member_headline_font_settings_id;
		}
		if( !empty( $hcode_team_member_social_icon_font_settings ) ) {
		    $hcode_team_member_social_icon_font_settings_id = uniqid('hcode-font-setting-');
		    $hcode_team_member_social_icon_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_team_member_social_icon_font_settings, $hcode_team_member_social_icon_font_settings_id.' a i, .'.$hcode_team_member_social_icon_font_settings_id.' div span' );
		    $hcode_team_member_social_icon_font_settings_class = ' '.$hcode_team_member_social_icon_font_settings_id;
		}

		( !empty( $hcode_team_member_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_title_font_settings_style : '';
		( !empty( $hcode_team_member_designation_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_designation_font_settings_style : '';
		( !empty( $hcode_team_member_headline_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_headline_font_settings_style : '';
		( !empty( $hcode_team_member_social_icon_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_social_icon_font_settings_style : '';

        switch ($hcode_team_slider_parent_type) {

            case 'team-member-slider-1': // Owl Carousel Slider Style

                	$output .= '<div class="item'.$class.'"'.$id.' >
	                        <div class="col-lg-6 col-md-6 case-study-details bg-gray"> 
	                            <div class="col-lg-7 col-md-12 pull-right about-text position-relative xs-text-center">';
								if( $hcode_team_member_title ) {
									if( $title_enable_link == 1 && !empty( $title_link_url ) ) {
			                            $output .= '<p class="title-small text-uppercase letter-spacing-3 black-text font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></p>';
			                        } else {
	                                	$output .= '<p class="title-small text-uppercase letter-spacing-3 black-text font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</p>';
	                            	}
			                	}
								if( $hcode_team_member_designation ) {
	                                $output .= '<p class="title-small text-uppercase letter-spacing-3 black-text font-weight-600'.$hcode_team_member_designation_font_settings_class.'"'.$hcode_designation_color.'>'.$hcode_team_member_designation.'</p>';
			                	}
				            	if( $content ) {
				                	$output .= do_shortcode( hcode_remove_wpautop( $content ) );
				            	}

				            	$social_data = array();
				            	if( $hcode_team_member_fb ) {
				            	 	$social_data['fab fa-facebook-f'] = $hcode_team_member_fb_url;
				            	}
				            	if( $hcode_team_member_tw ) {
				            	 	$social_data['fab fa-twitter'] = $hcode_team_member_tw_url;
				            	}
				            	if( $hcode_team_member_googleplus ) {
				            	 	$social_data['fab fa-google-plus-g'] = $hcode_team_member_googleplus_url;
				            	}
				            	if( $hcode_team_member_db ) {
				            	 	$social_data['fab fa-dribbble'] = $hcode_team_member_db_url;
				            	}
				            	if( $hcode_team_member_yt ) {
				            	 	$social_data['fab fa-youtube'] = $hcode_team_member_yt_url;
				            	}
				            	if( $hcode_team_member_li ) {
				            	 	$social_data['fab fa-linkedin-in'] = $hcode_team_member_li_url;
				            	}
				            	if( $hcode_team_member_ig ) {
				            	 	$social_data['fab fa-instagram'] = $hcode_team_member_ig_url;
				            	}
				            	if( $hcode_team_member_pi ) {
				            	 	$social_data['fab fa-pinterest-p'] = $hcode_team_member_pi_url;
				            	}
				            	if( $hcode_team_member_gh ) {
				            	 	$social_data['fab fa-github'] = $hcode_team_member_gh_url;
				            	}
				            	if( $hcode_team_member_xing ) {
				            		$social_data['fab fa-xing'] = $hcode_team_member_xing_url;
				            	}
			                	if( $hcode_team_member_vk ) {
			                		$social_data['fab fa-vk'] = $hcode_team_member_vk_url;
			                	}
			                	if( $hcode_team_member_ws ) {
				            	 	$social_data['fas fa-external-link-alt'] = $hcode_team_member_ws_url;
				            	}
				            	if( $hcode_team_member_email ) {
				            	 	$social_data['fas fa-envelope'] = $hcode_team_member_email_url;
				            	}

				            	if( !empty( $social_data ) || !empty( $hcode_team_member_custom_link ) ) {
				            		$output .= '<div class="our-team-agency-social'.$hcode_team_member_social_icon_font_settings_class.'">';
				            			$count = count( $social_data );
				            			$i = 0;
				            			foreach ($social_data as $key => $value) {
				            				$i++;
				            				$output .= '<div>';

				            				if( $key == 'fa-envelope' ) {
				            					if( $hcode_team_member_email_url == '#' ) {
						                    		$output .= '<a '.$target.' href="'.$value.'"><i class="'.$key.'" '.$hcode_team_icon_color.'></i></a>';
						                    	} else {
						                    		$output .= '<a '.$target.' href="mailto:'.$value.'"><i class="'.$key.'" '.$hcode_team_icon_color.'></i></a>';
						                    	}
				            				} else {
				            					$output .= '<a '.$target.' href="'.esc_url( $value ).'"><i class="'.$key.'" '.$hcode_team_icon_color.'></i></a>';
				            				}

				            				if( $i != $count || !empty( $hcode_team_member_custom_link ) ) {
				            					$output .= '<span>/</span>';
				            				}
				            				$output .= '</div>';
				            			}
					                	if( !empty( $hcode_team_member_custom_link ) ) :
					                		$output .= nl2br( rawurldecode( base64_decode( strip_tags( $hcode_team_member_custom_link ) ) ) );
					                	endif;
				                    $output .= '</div>';
				            	}
	                $output .= '</div>
	                        </div>';
	                        $thumb = wp_get_attachment_image_src( $hcode_team_member_image, $hcode_image_srcset );

					        $srcset_data_bg = $srcset_classes_bg = '';
					        $srcset_icon = wp_get_attachment_image_srcset( $hcode_team_member_image, $hcode_image_srcset );

					        if( $srcset_icon ){
					            $srcset_data_bg = ' data-bg-srcset="'.esc_attr( $srcset_icon ).'"';
					            $srcset_classes_bg = ' bg-image-srcset';
					        }
							if( $thumb[0] ) {
				            	$output .= '<div class="col-lg-6 col-md-6 case-study-img cover-background'.$srcset_classes_bg.'" style="background-image:url('.$thumb[0].');"'.$srcset_data_bg.'></div>';
				        	}
                    $output .= '</div>';
            break;
            case 'default': // Default Slider Style
                	
					$output .= '<div class="text-center team-member'.$class.$hcode_column_animation_style.'"'.$id.' '.$hcode_column_animation_duration.'>';
						if( $hcode_team_member_image ) {
			            	$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset );
			        	}
						$output .= '<figure class="position-relative bg-white" '.$hcode_team_designation_bg_color.'>';
						if( $hcode_team_member_title ) {
							if( $title_enable_link == 1 && !empty( $title_link_url ) ) {
	                            $output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600 123'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
	                        } else {
		                		$output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600 123'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
		                	}
		                }
		                if( $hcode_team_member_designation ) {
		                	$output .= '<span class="team-post text-uppercase letter-spacing-2 display-block'.$hcode_team_member_designation_font_settings_class.'"'.$hcode_designation_color.'>'.$hcode_team_member_designation.'</span>';
		            	}
			                            
		                if( $hcode_team_member_fb || $hcode_team_member_tw || $hcode_team_member_googleplus
	                		|| $hcode_team_member_db || $hcode_team_member_yt || $hcode_team_member_li 
	                		|| $hcode_team_member_ig || $hcode_team_member_pi || $hcode_team_member_gh 
	                		|| $hcode_team_member_ws || $hcode_team_member_xing || $hcode_team_member_vk || $hcode_team_member_email || !empty( $hcode_team_member_custom_link ) ):
		                    $output .= '<div class="person-social margin-five no-margin-bottom'.$hcode_team_member_social_icon_font_settings_class.'">';
		                		if( $hcode_team_member_fb ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_fb_url ).'" class="black-text-link"><i class="fab fa-facebook-f" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
			                	if( $hcode_team_member_tw ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_tw_url ).'" class="black-text-link"><i class="fab fa-twitter" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
			                	if( $hcode_team_member_googleplus ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_googleplus_url ).'" class="black-text-link"><i class="fab fa-google-plus-g" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
		                		if( $hcode_team_member_db ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_db_url ).'" class="black-text-link"><i class="fab fa-dribbble" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
		                		if( $hcode_team_member_yt ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_yt_url ).'" class="black-text-link"><i class="fab fa-youtube" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
		                		if( $hcode_team_member_li ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_li_url ).'" class="black-text-link"><i class="fab fa-linkedin-in" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
		                		if( $hcode_team_member_ig ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_ig_url ).'" class="black-text-link"><i class="fab fa-instagram" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
		                		if( $hcode_team_member_pi ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_pi_url ).'" class="black-text-link"><i class="fab fa-pinterest-p" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
		                		if( $hcode_team_member_gh ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_gh_url ).'" class="black-text-link"><i class="fab fa-github" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
			                	if( $hcode_team_member_xing ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_xing_url ).'" class="black-text-link"><i class="fab fa-xing" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
			                	if( $hcode_team_member_vk ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_vk_url ).'" class="black-text-link"><i class="fab fa-vk" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
		                		if( $hcode_team_member_ws ):
			                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_ws_url ).'" class="black-text-link"><i class="fas fa-external-link-alt" '.$hcode_team_icon_color.'></i></a>';
			                	endif;
			                	if( $hcode_team_member_email ):
			                		if( $hcode_team_member_email_url == '#' ) {
			                    		$output .= '<a href="'.$hcode_team_member_email_url.'" class="black-text-link"><i class="fas fa-envelope" '.$hcode_team_icon_color.'></i></a>';
			                    	} else {
			                    		$output .= '<a href="mailto:'.$hcode_team_member_email_url.'" class="black-text-link"><i class="fas fa-envelope" '.$hcode_team_icon_color.'></i></a>';
			                    	}
			                	endif;
			                	if( !empty( $hcode_team_member_custom_link ) ) :
			                		$output .= nl2br( rawurldecode( base64_decode( strip_tags( $hcode_team_member_custom_link ) ) ) );
			                	endif;
		                    $output .= '</div>';
		                endif;
			            $output .= '</figure>';
			            $output .= '<div class="team-details bg-blck-overlay">';
			            	if( $hcode_team_member_headline ) {
			            		$output .= '<h5 class="team-headline white-text text-uppercase font-weight-600'.$hcode_team_member_headline_font_settings_class.'">'.$hcode_team_member_headline.'</h5>';
			            	}
			            	if( $content ) {
			                	$output .= do_shortcode( hcode_remove_wpautop( $content ) );
			            	}
			                if( $hcode_team_member_separator ) {
			                	$output .= '<div class="separator-line-thick bg-white"></div>';
			               	}
			            $output .= '</div>';
			        $output .= '</div>';
            break;
		}

		return $output;
	}
}
add_shortcode('hcode_team_slide_content','hcode_team_slide_content_shortcode');