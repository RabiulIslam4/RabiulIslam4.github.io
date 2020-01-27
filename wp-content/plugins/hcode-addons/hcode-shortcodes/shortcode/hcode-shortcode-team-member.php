<?php
/**
 * Shortcode For Team Member
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Team Member */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_team_member_shortcode' ) ) {
	function hcode_team_member_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
	        	'id' => '',
	        	'class' => '',
	        	'hcode_team_member_premade_style' => '',
	        	'hcode_team_member_preview_image' => '',
	        	'hcode_team_member_image_position' => '',
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
	        	'hcode_title_color' => '',
	            'hcode_separator_color' => '',
	        	'hcode_designation_color' => '',
	        	'hcode_headline_color' => '',
	        	'hcode_team_designation_bg_color' => '',
	            'hcode_team_bg_color' => '',
	            'hcode_team_icon_color' => '',
	            'hcode_team_member_title_font_settings' => '',
				'hcode_team_member_designation_font_settings' => '',
				'hcode_team_member_icon_font_settings' => '',
				'hcode_team_member_headline_font_settings' => '',
	            'hcode_image_srcset' => 'full',
	    ), $atts ) );

		$output = $image_position_class = $content_position_class = $hcode_team_member_title_font_settings_id = $hcode_team_member_title_font_settings_style = $hcode_team_member_title_font_settings_class = $hcode_team_member_designation_font_settings_id = $hcode_team_member_designation_font_settings_style = $hcode_team_member_designation_font_settings_class = $hcode_team_member_icon_font_settings_id = $hcode_team_member_icon_font_settings_style = $hcode_team_member_icon_font_settings_class = $hcode_team_member_headline_font_settings_id = $hcode_team_member_headline_font_settings_style = $hcode_team_member_headline_font_settings_class = '';

		$id = ( $id ) ? ' id="'.$id.'"' : '';
		$class = ( $class ) ? ' '.$class : '';

		$hcode_team_member_premade_style = ( $hcode_team_member_premade_style ) ? $hcode_team_member_premade_style : '';
		$hcode_team_member_image = ( $hcode_team_member_image ) ? $hcode_team_member_image : '';		
		$hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

		$hcode_team_member_image_position = ( $hcode_team_member_image_position ) ? $hcode_team_member_image_position : '';
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
		$hcode_designation_color = ( $hcode_designation_color ) ? 'style="color: '.$hcode_designation_color.' !important;"' : '';
		$hcode_title_color = ( $hcode_title_color ) ? 'style="color: '.$hcode_title_color.' !important;"' : '';
		$hcode_headline_color = ( $hcode_headline_color ) ? 'style="color: '.$hcode_headline_color.' !important;"' : '';
	    $hcode_team_bg_color = ( $hcode_team_bg_color ) ? 'style="background: '.$hcode_team_bg_color.' !important;"' : '';
		$hcode_team_designation_bg_color = ( $hcode_team_designation_bg_color ) ? 'style="background: '.$hcode_team_designation_bg_color.' !important;"' : '';
	    $hcode_team_icon_color = ( $hcode_team_icon_color ) ? 'style="color: '.$hcode_team_icon_color.' !important;"' : '';
	    $hcode_separator_color = ( $hcode_separator_color ) ? 'style="background: '.$hcode_separator_color.' !important;"' : '';

		$target = 'target="_BLANK"';

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
		if( !empty( $hcode_team_member_icon_font_settings ) ) {
		    $hcode_team_member_icon_font_settings_id = uniqid('hcode-font-setting-');
		    $hcode_team_member_icon_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_team_member_icon_font_settings, $hcode_team_member_icon_font_settings_id.' a i' );
		    $hcode_team_member_icon_font_settings_class = ' '.$hcode_team_member_icon_font_settings_id;
		}
		if( !empty( $hcode_team_member_headline_font_settings ) ) {
		    $hcode_team_member_headline_font_settings_id = uniqid('hcode-font-setting-');
		    $hcode_team_member_headline_font_settings_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_team_member_headline_font_settings, $hcode_team_member_headline_font_settings_id );
		    $hcode_team_member_headline_font_settings_class = ' '.$hcode_team_member_headline_font_settings_id;
		}

		( !empty( $hcode_team_member_title_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_title_font_settings_style : '';
		( !empty( $hcode_team_member_designation_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_designation_font_settings_style : '';
		( !empty( $hcode_team_member_icon_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_icon_font_settings_style : '';
		( !empty( $hcode_team_member_headline_font_settings_style ) ) ? $font_settings_array[] = $hcode_team_member_headline_font_settings_style : '';

		switch ($hcode_team_member_premade_style) {
			case 'team-style-1':
				$output .= '<div class="'.$hcode_team_member_premade_style.' key-person '.$class.'" '.$id.'>';
					if( $hcode_team_member_image ) {
	            		$output .= '<div class="key-person-img">';
						$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset );
	            		$output .= '</div>';
	            	}
	                $output .= '<div class="key-person-details bg-white">';
	                	if( $hcode_team_member_title ):
		                	if( $title_enable_link == 1 && !empty( $title_link_url ) ) {

	                            $output .= '<span class="person-name black-text'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
	                        } else {

		                    	$output .= '<span class="person-name black-text'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
	                        }
	                	endif;
	                	if( $hcode_team_member_designation ):
	                    $output .= '<span class="person-post'.$hcode_team_member_designation_font_settings_class.'" '.$hcode_designation_color.'>'.$hcode_team_member_designation.'</span>';
	                	endif;
	                    if( $hcode_team_member_separator ):
	                    	$output .= '<div class="separator-line bg-yellow" '.$hcode_separator_color.'></div>';
	                	endif;
	                	if( $hcode_team_member_fb || $hcode_team_member_tw || $hcode_team_member_googleplus
	                		|| $hcode_team_member_db || $hcode_team_member_yt || $hcode_team_member_li 
	                		|| $hcode_team_member_ig || $hcode_team_member_pi || $hcode_team_member_gh 
	                		|| $hcode_team_member_ws || $hcode_team_member_xing || $hcode_team_member_vk || $hcode_team_member_email || !empty( $hcode_team_member_custom_link ) ):
	                    $output .= '<div class="person-social'.$hcode_team_member_icon_font_settings_class.'">';
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
	                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
	                $output .= '</div>';
	            $output .= '</div>';
			break;

			case 'team-style-2':
				$output .= '<div class="'.$hcode_team_member_premade_style.' key-person '.$class.'" '.$id.'>';
					if( $hcode_team_member_image ) {
	            		$output .= '<div class="key-person-img">';
	            		$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset );
	            		$output .= '</div>';
	            	}
	                $output .= '<div class="key-person-details bg-gray no-border no-padding-bottom">';
	                	if( $hcode_team_member_title ):
	                		if( $title_enable_link == 1 && !empty( $title_link_url ) ) {

	                            $output .= '<h5 '.$hcode_title_color.' class="team-member-title'.$hcode_team_member_title_font_settings_class.'"><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></h5>';
	                        } else {
	                    		$output .= '<h5 '.$hcode_title_color.' class="team-member-title'.$hcode_team_member_title_font_settings_class.'">'.$hcode_team_member_title.'</h5>';
	                    	}
	                	endif;
	                    if( $hcode_team_member_separator ):
	                    	$output .= '<div class="separator-line bg-black" '.$hcode_separator_color.'></div>';
	                	endif;
	                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
	                $output .= '</div>';
	            $output .= '</div>';
			break;

			case 'team-style-3':
				$output .= '<div class="team-member position-relative agency-team '.$class.'" '.$id.'>';
					$output .= '<div class="'.$class.'"'.$id.'>';
						if( $hcode_team_member_image ) {
		            		$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset );
		            	}
		                $output .= '<div class="team-details bg-blck-overlay">';
		                	if( $hcode_team_member_headline ) {
		                    	$output .= '<h5 class="team-headline white-text text-uppercase font-weight-600'.$hcode_team_member_headline_font_settings_class.'"'.$hcode_headline_color.'>'.$hcode_team_member_headline.'</h5>';
		                	}
		                	if( $content ) {
		                		$output .= '<p class="width-60 center-col light-gray-text margin-five">'.do_shortcode( $content ).'</p>';
		                	}
		                	if( $hcode_team_member_fb || $hcode_team_member_tw || $hcode_team_member_googleplus
		                		|| $hcode_team_member_db || $hcode_team_member_yt || $hcode_team_member_li 
		                		|| $hcode_team_member_ig || $hcode_team_member_pi || $hcode_team_member_gh 
		                		|| $hcode_team_member_ws || $hcode_team_member_xing || $hcode_team_member_vk || $hcode_team_member_email || !empty( $hcode_team_member_custom_link ) ):
			                    $output .= '<div class="person-social margin-five'.$hcode_team_member_icon_font_settings_class.'">';
	                                            if( $hcode_team_member_fb ):
	                                            $output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_fb_url ).'" class="white-text-link"><i class="fab fa-facebook-f" '.$hcode_team_icon_color.'></i></a>';
	                                            endif;
	                                            if( $hcode_team_member_tw ):
	                                            $output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_tw_url ).'" class="white-text-link"><i class="fab fa-twitter" '.$hcode_team_icon_color.'></i></a>';
	                                            endif;
	                                            if( $hcode_team_member_googleplus ):
	                                            $output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_googleplus_url ).'" class="white-text-link"><i class="fab fa-google-plus-g" '.$hcode_team_icon_color.'></i></a>';
	                                            endif;
	                                            if( $hcode_team_member_db ):
	                                            $output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_db_url ).'" class="white-text-link"><i class="fab fa-dribbble" '.$hcode_team_icon_color.'></i></a>';
	                                            endif;
						                		if( $hcode_team_member_yt ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_yt_url ).'" class="white-text-link"><i class="fab fa-youtube" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
						                		if( $hcode_team_member_li ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_li_url ).'" class="white-text-link"><i class="fab fa-linkedin-in" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
						                		if( $hcode_team_member_ig ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_ig_url ).'" class="white-text-link"><i class="fab fa-instagram" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
						                		if( $hcode_team_member_pi ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_pi_url ).'" class="white-text-link"><i class="fab fa-pinterest-p" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
						                		if( $hcode_team_member_gh ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_gh_url ).'" class="white-text-link"><i class="fab fa-github" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
							                	if( $hcode_team_member_xing ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_xing_url ).'" class="white-text-link"><i class="fab fa-xing" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
							                	if( $hcode_team_member_vk ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_vk_url ).'" class="white-text-link"><i class="fab fa-vk" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
						                		if( $hcode_team_member_ws ):
							                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_ws_url ).'" class="white-text-link"><i class="fas fa-external-link-alt" '.$hcode_team_icon_color.'></i></a>';
							                	endif;
							                	if( $hcode_team_member_email ):
							                		if( $hcode_team_member_email_url == '#' ) {
							                    		$output .= '<a href="'.$hcode_team_member_email_url.'" class="white-text-link"><i class="fas fa-envelope" '.$hcode_team_icon_color.'></i></a>';
							                    	} else {
							                    		$output .= '<a href="mailto:'.$hcode_team_member_email_url.'" class="white-text-link"><i class="fas fa-envelope" '.$hcode_team_icon_color.'></i></a>';
							                    	}
							                	endif;

							                	if( !empty( $hcode_team_member_custom_link ) ) :
							                		$output .= nl2br( rawurldecode( base64_decode( strip_tags( $hcode_team_member_custom_link ) ) ) );
							                	endif;
			                    $output .= '</div>';
		                    endif;
		                    if( $hcode_team_member_title || $hcode_team_member_designation ) {
			                    $output .= '<figure class="position-absolute bg-fast-yellow">';
				                	if( $hcode_team_member_title ) {
				                		if( $title_enable_link == 1 && !empty( $title_link_url ) ) {

				                            $output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
				                        } else {

				                    		$output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
				                        }
				                	}
				                    if( $hcode_team_member_designation ) {
				                    	$output .= '<span class="team-post text-uppercase black-text letter-spacing-2 display-block'.$hcode_team_member_designation_font_settings_class.'" '.$hcode_designation_color.'>'.$hcode_team_member_designation.'</span>';
				                	}
				                $output .= '</figure>';
				            }
		                $output .= '</div>';
		            $output .= '</div>';
		        $output .= '</div>';
			break;

			case 'team-style-4':
				$output .= '<div class="'.$hcode_team_member_premade_style.' fashion-team key-person-fashion '.$class.'" '.$id.'>';
	                $output .= '<div class="key-person">';
	                	if( $hcode_team_member_image ) {
	                    	$output .= '<div class="key-person-img">';
	                    	$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset );
	                    	$output .= '</div>';
	                    }
	                    $output .= '<div class="key-person-details bg-white">';
	                    	if( $hcode_team_member_title ):
	                    		if( $title_enable_link == 1 && !empty( $title_link_url ) ) {

		                            $output .= '<span class="person-name black-text'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
		                        } else {
	                    			$output .= '<span class="person-name black-text'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
	                    		}
	                    	endif;
	                    	if( $hcode_team_member_designation ):
	                    		$output .= '<span class="person-post black-text'.$hcode_team_member_designation_font_settings_class.'" '.$hcode_designation_color.'>'.$hcode_team_member_designation.'</span>';
	                    	endif;
	                    	if( $hcode_team_member_separator ):
								$output .= '<div class="separator-line" '.$hcode_separator_color.'></div>';
							endif;
	                        if( $hcode_team_member_fb || $hcode_team_member_tw || $hcode_team_member_googleplus
		                		|| $hcode_team_member_db || $hcode_team_member_yt || $hcode_team_member_li 
		                		|| $hcode_team_member_ig || $hcode_team_member_pi || $hcode_team_member_gh 
		                		|| $hcode_team_member_ws || $hcode_team_member_xing || $hcode_team_member_vk || $hcode_team_member_email || !empty( $hcode_team_member_custom_link ) ):
			                    $output .= '<div class="person-social'.$hcode_team_member_icon_font_settings_class.'">';
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
		                    if( $content ):
								$output .= '<p class="margin-three black-text">'.do_shortcode( $content ).'</p>';
							endif;
	                    $output .= '</div>';
	                $output .= '</div>';
				$output .= '</div>';
			break;

			case 'team-style-5':
				$output .= '<div class="'.$hcode_team_member_premade_style.' key-person '.$class.'" '.$id.'>';
	                if( $hcode_team_member_image ) {
		            	$output .= '<div class="key-person-img">';
		            	$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset );
		            	$output .= '</div>';
		            }
		            if( $hcode_team_member_title || $content || $hcode_team_member_separator ) {
		                $output .='<div class="key-person-details no-border bg-white">';
		                	if( $hcode_team_member_title ) {
		                		if( $title_enable_link == 1 && !empty( $title_link_url ) ) {
		                            $output .= '<span class="person-name black-text margin-five no-margin-top'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
		                        } else {
			                		$output .='<span class="person-name black-text margin-five no-margin-top'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
			                	}
			                }
			                if( $content ){
			                	$output .= do_shortcode( hcode_remove_wpautop( $content ) );
			            	}
			            	if( $hcode_team_member_separator ){
				                $output .='<div class="thin-separator-line bg-black" '.$hcode_separator_color.'></div>';
			            	}
		                $output .='</div>';
	                }
	            $output .='</div>';
			break;

			case 'team-style-6':
				if($hcode_team_member_image_position == 1):
					if( $hcode_team_member_image ) {
		            	$output .= '<div class="col-lg-6 col-md-5 col-sm-6 no-padding'.$image_position_class.'">';
		            	$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset, '', array( 'class' => 'xs-img-full' ) );
		            	$output .= '</div>';
		        	}
					$output .= '<div class="'.$hcode_team_member_premade_style.' col-lg-6 col-md-7 col-sm-6 xs-margin-ten-top no-padding '.$class.'" '.$id.'>';
						$output .= '<div class="architecture-team team-member xs-no-padding">';
							if( $hcode_team_member_title ):
								if( $title_enable_link == 1 && !empty( $title_link_url ) ) {
		                            $output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
		                        } else {
		                    		$output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
		                    	}
		                    endif;
		                    if( $hcode_team_member_designation ):
		                    	$output .= '<span class="team-post text-uppercase letter-spacing-2 display-block'.$hcode_team_member_designation_font_settings_class.'" '.$hcode_designation_color.'>'.$hcode_team_member_designation.'</span>';
		                	endif;
		                    if( $hcode_team_member_separator ):
			                    $output .= '<div class="separator-line bg-black no-margin-lr margin-tb-20px" '.$hcode_separator_color.'></div>';
			                endif;
		                    if( $content ):
			                	$output .= do_shortcode( hcode_remove_wpautop( $content ) );
			            	endif;
		                    if( $hcode_team_member_fb || $hcode_team_member_tw || $hcode_team_member_googleplus
		                		|| $hcode_team_member_db || $hcode_team_member_yt || $hcode_team_member_li 
		                		|| $hcode_team_member_ig || $hcode_team_member_pi || $hcode_team_member_gh 
		                		|| $hcode_team_member_ws || $hcode_team_member_xing || $hcode_team_member_vk || $hcode_team_member_email || !empty( $hcode_team_member_custom_link ) ):
			                    $output .= '<div class="person-social margin-bottom-20px'.$hcode_team_member_icon_font_settings_class.'">';
			                		if( $hcode_team_member_fb ):
				                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_fb_url ).'" class="black-text-link"><i class="fab fa-facebook-f no-margin-left" '.$hcode_team_icon_color.'></i></a>';
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
		                $output .= '</div>';
		            $output .= '</div>';
				else:
					$output .= '<div class="'.$hcode_team_member_premade_style.' col-lg-6 col-md-7 col-sm-6 no-padding'.$class.'"'.$id.'>';
						$output .= '<div class="architecture-team team-member xs-no-padding">';
							if( $hcode_team_member_title ):
								if( $title_enable_link == 1 && !empty( $title_link_url ) ) {
		                            $output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
		                        } else {
		                    		$output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
		                    	}
		                    endif;
		                    if( $hcode_team_member_designation ):
		                    	$output .= '<span class="team-post text-uppercase letter-spacing-2 display-block'.$hcode_team_member_designation_font_settings_class.'" '.$hcode_designation_color.'>'.$hcode_team_member_designation.'</span>';
		                	endif;
		                    if( $hcode_team_member_separator ):
			                    $output .= '<div class="separator-line bg-black no-margin-lr margin-tb-20px" '.$hcode_separator_color.'></div>';
			                endif;
		                    if( $content ):
			                	$output .= do_shortcode( hcode_remove_wpautop( $content ) );
			            	endif;
		                    if( $hcode_team_member_fb || $hcode_team_member_tw || $hcode_team_member_googleplus
		                		|| $hcode_team_member_db || $hcode_team_member_yt || $hcode_team_member_li 
		                		|| $hcode_team_member_ig || $hcode_team_member_pi || $hcode_team_member_gh 
		                		|| $hcode_team_member_ws || $hcode_team_member_xing || $hcode_team_member_vk || $hcode_team_member_email || !empty( $hcode_team_member_custom_link ) ):
			                    $output .= '<div class="person-social margin-bottom-20px'.$hcode_team_member_icon_font_settings_class.'">';
			                		if( $hcode_team_member_fb ):
				                    	$output .= '<a '.$target.' href="'.esc_url( $hcode_team_member_fb_url ).'" class="black-text-link"><i class="fab fa-facebook-f no-margin-left" '.$hcode_team_icon_color.'></i></a>';
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
		                $output .= '</div>';
		            $output .= '</div>';
		            if( $hcode_team_member_image ) {
		            	$output .= '<div class="col-lg-6 col-md-5 col-sm-6 no-padding '.$image_position_class.'">';
		            	$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset, '', array( 'class' => 'xs-img-full' ) );
		            	$output .= '</div>';
		        	}
	        	endif;
			break;

			case 'team-style-7':
				$output .= '<div class="'.$hcode_team_member_premade_style.' team-member'.$class.'"'.$id.'>';
					if( $hcode_team_member_image ) {
		            	$output .= wp_get_attachment_image( $hcode_team_member_image, $hcode_image_srcset );
		        	}
					$output .= '<figure class="position-relative bg-white" '.$hcode_team_designation_bg_color.'>';
						if( $hcode_team_member_title ):
							if( $title_enable_link == 1 && !empty( $title_link_url ) ) {
	                            $output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'><a class="team-title-link'.$hcode_team_member_title_font_settings_class.'"'.$title_link_target.' href="'.esc_url( $title_link_url ).'">'.$hcode_team_member_title.'</a></span>';
	                        } else {
		                		$output .= '<span class="team-name text-uppercase black-text letter-spacing-2 display-block font-weight-600'.$hcode_team_member_title_font_settings_class.'" '.$hcode_title_color.'>'.$hcode_team_member_title.'</span>';
		                	}
		                endif;
		                if( $hcode_team_member_designation ):
		                	$output .= '<span class="team-post text-uppercase letter-spacing-2 display-block'.$hcode_team_member_designation_font_settings_class.'" '.$hcode_designation_color.'>'.$hcode_team_member_designation.'</span>';
		            	endif;
		                            
		                if( $hcode_team_member_fb || $hcode_team_member_tw || $hcode_team_member_googleplus
		                		|| $hcode_team_member_db || $hcode_team_member_yt || $hcode_team_member_li 
		                		|| $hcode_team_member_ig || $hcode_team_member_pi || $hcode_team_member_gh 
		                		|| $hcode_team_member_ws || !empty( $hcode_team_member_custom_link ) ):
		                    $output .= '<div class="person-social margin-five no-margin-bottom'.$hcode_team_member_icon_font_settings_class.'">';
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
		            $output .= '<div class="team-details bg-blck-overlay position-left-right-zero" '.$hcode_team_bg_color.'>';
		            	if( $hcode_team_member_headline ):
		            		$output .= '<h5 class="team-headline white-text text-uppercase font-weight-600'.$hcode_team_member_headline_font_settings_class.'"'.$hcode_headline_color.'>'.$hcode_team_member_headline.'</h5>';
		            	endif;
		            	if( $content ):
		                	$output .= '<p class="width-70 sm-width-90 center-col light-gray-text margin-five">'.do_shortcode( $content ).'</p>';
		            	endif;
		                if( $hcode_team_member_separator ):
		                	$output .= '<div class="separator-line-thick bg-white" '.$hcode_separator_color.'></div>';
		               	endif;
		            $output .= '</div>';
		        $output .= '</div>';
			break;
		}
	    return $output;
	}
}
add_shortcode('hcode_team_member','hcode_team_member_shortcode');