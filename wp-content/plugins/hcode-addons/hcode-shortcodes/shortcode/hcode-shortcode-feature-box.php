<?php
/**
 * Shortcode For Feature Box
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Feature Box */
/*-----------------------------------------------------------------------------------*/
$breadcrumb_text = NULL;
if ( ! function_exists( 'hcode_feature_box_shortcode' ) ) {
    function hcode_feature_box_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_feature_type' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'hcode_et_line_icon_list' =>'',
            'hcode_process_no' => '',
            'hcode_feature_title' => '',
            'hcode_feature_title_link' => '',
            'hcode_feature_title_link_target' => '',
            'hcode_feature_subtitle' => '',
            'hcode_feature_no_of_posts' => '',
            'hcode_feature_price' => '',
            'hcode_feature_per_month_text' => '/mo',
            'hcode_feature_currency' => '',
            'hcode_feature_button_link' => '',
            'hcode_feature_image' => '',
            'hcode_active_feature' => '',
            'hcode_posts_list' => '',
            'hcode_number' => '',
            'counter_icon_size' => '',
            'hcode_title_color' => '',
            'hcode_sep_color' => '',
            'hcode_meta_color' => '',
            'hcode_subtitle_color' => '',
            'hcode_icon_color' => '',
            'hcode_feature_icon' => '',
            'hcode_feature_star' => '',
            'hcode_stars' => '',
            'hcode_star_color' => '',
            'hcode_number_color' => '',
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
            'hcode_show_post_image' => '1',
            'hcode_show_post_title' => '1',
            'hcode_show_post_author' => '1',
            'hcode_show_post_date' => '1',
            'hcode_show_post_excerpt' => '1',
            'hcode_enable_seperator' =>'',
            'hcode_excerpt_length' => '25',
            'hcode_icon_image_srcset' => 'full',
            'hcode_image_srcset' => 'full',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_number_font' => '',
            'hcode_responsive_post_meta_font' => '',
            'hcode_responsive_subtitle_font' => '',
            'button_config_settings'=>'',
        ), $atts ) );
        
        global $font_settings_array, $hcode_featurebox_token, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $output = $btn_class = $style = $button_responsive_id = $title_responsive_id = $title_responsive_style = $button_responsive_style = $title_responsive_class = $number_responsive_id = $number_responsive_style = $number_responsive_class = $post_meta_responsive_id = $post_meta_responsive_style = $post_meta_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = $button_responsive_class = '';
        $classes = array();

        if( !empty( $button_config_settings ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $button_config_settings, $button_responsive_id );
            $button_responsive_class = ' '.$button_responsive_id;
        }
        ( !empty( $button_responsive_style ) ) ? $font_settings_array[] = $button_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_number_font ) ) {
            $number_responsive_id = uniqid('hcode-font-setting-');
            $number_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_number_font, $number_responsive_id );
            $number_responsive_class = ' '.$number_responsive_id;
        }
        ( !empty( $number_responsive_style ) ) ? $font_settings_array[] = $number_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_post_meta_font ) ) {
            $post_meta_responsive_id = uniqid('hcode-font-setting-');
            $post_meta_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_post_meta_font, $post_meta_responsive_id );
            $post_meta_responsive_class = ' '.$post_meta_responsive_id;
        }
        ( !empty( $post_meta_responsive_style ) ) ? $font_settings_array[] = $post_meta_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class : '';
        $icon_size = ( $counter_icon_size ) ? ' '.$counter_icon_size : ' medium-icon';
        $hcode_title_color = ( $hcode_title_color ) ? 'color:'.$hcode_title_color.';' : '';
        $hcode_sep_color = ( $hcode_sep_color ) ? ' style="background:'.$hcode_sep_color.';"' : '';
        $hcode_subtitle_color = ( $hcode_subtitle_color ) ? 'style="color:'.$hcode_subtitle_color.';"' : '';
        $hcode_icon_color = ( $hcode_icon_color ) ? 'style="color:'.$hcode_icon_color.';"' : '';
        $hcode_star_color = ( $hcode_star_color ) ? 'style="color:'.$hcode_star_color.';"' : '';
        $hcode_number_color = ( $hcode_number_color ) ? 'style="color:'.$hcode_number_color.';"' : '';
        $hcode_meta_color = ( $hcode_meta_color ) ? ' style="color:'.$hcode_meta_color.';"' : '';
        $custom_icon = ( $custom_icon ) ? $custom_icon : '';
        $custom_icon_image = ( $custom_icon_image ) ? $custom_icon_image : '';
        $hcode_et_line_icon_list = ( $hcode_et_line_icon_list ) ? $hcode_et_line_icon_list : '';
        $hcode_process_no = ( $hcode_process_no ) ? $hcode_process_no : '';
        $hcode_feature_title = ( $hcode_feature_title ) ? $hcode_feature_title : '';
        $hcode_feature_title_link = ( $hcode_feature_title_link ) ? $hcode_feature_title_link : '';
        $hcode_feature_title_link_target = ( $hcode_feature_title_link_target ) ? ' target="'.$hcode_feature_title_link_target.'"' : '';
        $hcode_feature_subtitle = ( $hcode_feature_subtitle ) ? $hcode_feature_subtitle : '';

        $hcode_feature_no_of_posts = ( $hcode_feature_no_of_posts ) ? $hcode_feature_no_of_posts : '';
        $hcode_feature_price = ( $hcode_feature_price != '' ) ? $hcode_feature_price : '';
        $hcode_feature_currency = ( $hcode_feature_currency ) ? $hcode_feature_currency : '';
        $hcode_feature_per_month_text = ( $hcode_feature_per_month_text ) ? $hcode_feature_per_month_text : '';
        $hcode_feature_button_link = ( $hcode_feature_button_link ) ? $hcode_feature_button_link : '';
        $first_button_parse_args = vc_parse_multi_attribute($hcode_feature_button_link);
        $first_button_link     = ( isset($first_button_parse_args['url']) ) ? $first_button_parse_args['url'] : '#';
        $first_button_title    = ( isset($first_button_parse_args['title']) ) ? $first_button_parse_args['title'] : '';
        $hcode_excerpt_length = ($hcode_excerpt_length) ? $hcode_excerpt_length : '';

        /* Added in V1.8 */
        $hcode_show_post_image = ( $hcode_show_post_image ) ? $hcode_show_post_image : '';
        $hcode_show_post_title = ( $hcode_show_post_title ) ? $hcode_show_post_title : '';
        $hcode_show_post_author = ( $hcode_show_post_author ) ? $hcode_show_post_author : '';
        $hcode_show_post_date = ( $hcode_show_post_date ) ? $hcode_show_post_date : '';
        $hcode_show_post_excerpt = ( $hcode_show_post_excerpt ) ? $hcode_show_post_excerpt : '';

        if( $desktop_padding == 'custom-desktop-padding' || $ipad_padding == 'custom-ipad-padding' || $mobile_padding == 'custom-mobile-padding' || $desktop_margin == 'custom-desktop-margin' || $ipad_margin == 'custom-ipad-margin' || $mobile_margin == 'custom-mobile-margin' ){
            $hcode_featurebox_token = !empty( $hcode_featurebox_token ) ? $hcode_featurebox_token : 0;
            $hcode_featurebox_token = $hcode_featurebox_token + 1;
            $hcode_token_class = $classes[] = 'hcode-featurebox-'.$hcode_featurebox_token;
        }

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

        // Class List
        $class_list = implode(" ", $classes);
        
        if( $hcode_title_color ){
            $style .= ' style="'.$hcode_title_color.'"';
        }

        $hcode_options = get_option( 'hcode_theme_setting' );
        $hcode_no_image = (isset($hcode_options['hcode_no_image'])) ? $hcode_options['hcode_no_image'] : '';

        $hcode_icon_image_srcset  = !empty($hcode_icon_image_srcset) ? $hcode_icon_image_srcset : 'full';

        /* New Font Awesome Icons */

        $fa_icons_solid = hcode_fontawesome_solid();
        $fa_icons_reg = hcode_fontawesome_reg();
        $fa_icons_brand = hcode_fontawesome_brand();
        $fa_icon_old = hcode_fontawesome_old(); 
        $font_awesome_fa_icons = explode(' ',trim($hcode_et_line_icon_list));

        if($font_awesome_fa_icons[0] == 'fa'){
            $hcode_et_line_icon_list = substr(strstr($hcode_et_line_icon_list," "), 1);

            if(array_key_exists($hcode_et_line_icon_list, $fa_icon_old)){
                $hcode_et_line_icon_list = $fa_icon_old[$hcode_et_line_icon_list];
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_solid)){
                $hcode_et_line_icon_list = 'fas '.$hcode_et_line_icon_list;
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_reg)){
                $hcode_et_line_icon_list = 'far '.$hcode_et_line_icon_list;
            }else if(in_array($hcode_et_line_icon_list, $fa_icons_brand)){
                $hcode_et_line_icon_list = 'fab '.$hcode_et_line_icon_list;
            }else{
                $hcode_et_line_icon_list = '';
            }
        }

        switch ($hcode_feature_type) {
            case 'featurebox1':
            		$output .='<div '.$id.' class="work-process-sub position-relative overflow-hidden'.$class.'" >';
    	    			$output .='<div class="work-process-text">';
                            if($hcode_process_no):
    	                       $output .='<span class="work-process-number font-weight-100 display-block yellow-text2'.$number_responsive_class.'" '.$hcode_number_color.'>'.$hcode_process_no.'</span>';
                            endif;
                            if($hcode_feature_title):
    	                       $output .='<span class="text-uppercase letter-spacing-2 font-weight-600 display-block '.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</span>';
                            endif;
                            if($hcode_enable_seperator == 1):
    	                       $output .='<div class="separator-line-thick bg-mid-gray margin-three"'.$hcode_sep_color.'></div>';
                            endif;
    	                $output .='</div>';
    	                $output .='<div class="work-process-details position-absolute display-block">';
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image margin-0auto display-block' ) );
                            } elseif( $hcode_et_line_icon_list ) {
    	                       $output .='<i class="'.$hcode_et_line_icon_list.$icon_size.' display-block" '.$hcode_icon_color.'></i>';
                            }
                            if($content):
    	                       $output .='<span class="text-small text-uppercase">'.do_shortcode( $content ).'</span>';
                            endif;
    	                $output .='</div>';
                    $output .='</div>';
            break;
            case 'featurebox2':
            		$output .= '<div '.$id.' class="features-box-style1'.$class.'">';
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                        }
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image no-margin-top margin-bottom-15px' ) );
                        } elseif( $hcode_et_line_icon_list ) {
    	            	  $output .= '<i class="'.$hcode_et_line_icon_list.$icon_size.'" '.$hcode_icon_color.'></i>';
                        }
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '</a>';
                        }
                        if($hcode_feature_title):
                            if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                            } 
    	                    $output .= '<h5 class="'.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</h5>';
                            if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                $output .= '</a>';
                            }
                        endif;
                        if($content):
    	                   $output .= '<div class="no-margin">'.do_shortcode( hcode_remove_wpautop( $content ) ).'</div>';
                        endif;
                    $output .='</div>';
            break;
            case 'featurebox3':
        		$output .='<div '.$id.' class="features-box-style2'.$class.'">';
                    if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                        $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                    }
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image margin-ten no-margin-top' ) );
                    } elseif( $hcode_et_line_icon_list ) {
            	        $output .='<i class="'.$hcode_et_line_icon_list.$icon_size.' margin-ten no-margin-top" '.$hcode_icon_color.'></i>';
                    }
                    if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                        $output .= '</a>';
                    }
                    if($hcode_feature_title):
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                        }
	                    $output .='<h5 class="'.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</h5>';
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '</a>';
                        }
                    endif;
                    if($hcode_enable_seperator == 1):
	                   $output .='<div class="separator-line bg-yellow no-margin-lr margin-ten"'.$hcode_sep_color.'></div>';
                    endif;
                    if($content):
	                   $output .= '<div class="no-margin">'.do_shortcode( hcode_remove_wpautop( $content ) ).'</div>';
                    endif;
               	$output .='</div>';
            break;
            case 'featurebox4':
                    $args = array('post_type' => 'post',
                        'name'=> $hcode_posts_list,
                    );
                    $query = new WP_Query( $args );
                    while ( $query->have_posts() ) : $query->the_post();

                        // Added in v1.8
                        $hcode_post_classes = '';
                        ob_start();
                            post_class();
                            $hcode_post_classes .= ob_get_contents();
                        ob_end_clean();
                        
                        $post_author = get_post_field( 'post_author', get_the_ID() );
                        $author = '<a class="url fn n light-gray-text2" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'"'.$hcode_meta_color.'>'.get_the_author().'</a>';
                        $blog_quote = hcode_post_meta('hcode_quote');
                        $blog_image = hcode_post_meta('hcode_image');
                        $blog_gallery = hcode_post_meta('hcode_gallery');
                        $blog_video = hcode_post_meta('hcode_video_type');

                        $output .= '<div '.$hcode_post_classes.'>';
                            $output .='<div class="blog-slider-right  wow fadeInUp" data-wow-duration="600ms">';
                                $output .='<div class="blog-slider-grid">';
                                    $output .='<figure>';
                                        if(!empty($blog_image)){
                                                $output .='<div class="blog-post">';
                                                    ob_start();
                                                    get_template_part('loop/loop','image');
                                                    $output .= ob_get_contents();  
                                                    ob_end_clean();
                                            }
                                            elseif(!empty($blog_gallery)){
                                                $output .='<div class="blog-post blog-post-gallery">';
                                                    ob_start();
                                                    get_template_part('loop/loop','gallery');
                                                    $output .= ob_get_contents();  
                                                    ob_end_clean();  
                                            }
                                            elseif(!empty($blog_video)){
                                                $output .='<div class="blog-post blog-post-video">';
                                                    ob_start();
                                                    get_template_part('loop/loop','video');
                                                    $output .= ob_get_contents();  
                                                    ob_end_clean(); 
                                            }
                                            elseif(!empty($blog_quote)){
                                                $output .='<div class="blog-post">';
                                                    ob_start();
                                                    get_template_part('loop/loop','quote');
                                                    $output .= ob_get_contents();  
                                                    ob_end_clean();  
                                            }else{
                                                $output .='<div class="blog-post">';
                                                $output .='<div class="blog-image"><a href="'.get_permalink().'">';
                                                if ( has_post_thumbnail() ) {
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                                } else {
                                                    if( $hcode_no_image['url'] ) {
                                                        $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                    }
                                                }
                                                $output .='</a></div>';
                                        }
                                        $output .='</div>';
                                        if( $hcode_show_post_title == 1 || $hcode_show_post_author == 1 ) {
                                            $output .='<figcaption>';
                                                if( get_the_title() && $hcode_show_post_title == 1 ) {
                                                    $output .='<h3 class="entry-title"><a class="white-text-link'.$title_responsive_class.'" href="'.get_permalink().'"'.$style.'>'.get_the_title().'</a></h3>';
                                                }
                                                if($author && $hcode_show_post_author == 1 ) {
                                                    $output .='<span class="light-gray-text2 author vcard'.$post_meta_responsive_class.'"'.$hcode_meta_color.'>'.esc_html__('Posted by ','hcode-addons').$author.'</span>';
                                                }
                                            $output .='</figcaption>';
                                        }
                                    $output .='</figure>';
                                $output .='</div>';
                            $output .='</div>';
                        $output .='</div>';

                    endwhile;
                    wp_reset_postdata();
            break;
            case 'featurebox5':
                $args = array('post_type' => 'post',
                    'name' => $hcode_posts_list,
                );
                $query = new WP_Query( $args );
                while ( $query->have_posts() ) : $query->the_post();

                    // Added in v1.8
                    $hcode_post_classes = $hcode_post_meta_list = '';
                    $hcode_post_meta_array = array();
                    ob_start();
                        post_class();
                        $hcode_post_classes .= ob_get_contents();
                    ob_end_clean();
                    
                    $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                    $post_author = get_post_field( 'post_author', get_the_ID() );
                    $author = '<a class="url fn n light-gray-text2" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'"'.$hcode_meta_color.'>'.get_the_author().'</a>';
                    $blog_quote = hcode_post_meta('hcode_quote');
                    $blog_image = hcode_post_meta('hcode_image');
                    $blog_gallery = hcode_post_meta('hcode_gallery');
                    $blog_video = hcode_post_meta('hcode_video_type');
                    $show_excerpt = ( $hcode_excerpt_length ) ? hcode_get_the_excerpt_theme($hcode_excerpt_length) : hcode_get_the_excerpt_theme(25);
                    $output .= '<div '.$hcode_post_classes.'>';
                    
                        if(!empty($blog_image)){
                            $output .='<div class="blog-post">';
                            if( $hcode_show_post_image == 1 ) {
                                ob_start();
                                get_template_part('loop/loop','image');
                                $output .= ob_get_contents();  
                                ob_end_clean();
                            }
                        }
                        elseif(!empty($blog_gallery)){
                            $output .='<div class="blog-post blog-post-gallery">';
                            if( $hcode_show_post_image == 1 ) {
                                ob_start();
                                get_template_part('loop/loop','gallery');
                                $output .= ob_get_contents();
                                ob_end_clean();
                            }
                        }
                        elseif(!empty($blog_video)){
                            $output .='<div class="blog-post blog-post-video">';
                            if( $hcode_show_post_image == 1 ) {
                                ob_start();
                                get_template_part('loop/loop','video');
                                $output .= ob_get_contents();  
                                ob_end_clean(); 
                            }
                        }
                        elseif(!empty($blog_quote)){
                            $output .='<div class="blog-post">';
                            if( $hcode_show_post_image == 1 ) {
                                ob_start();
                                get_template_part('loop/loop','quote');
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            }
                        }else{
                            $output .='<div class="blog-post">';
                            if( $hcode_show_post_image == 1 ) {
                                $output .='<div class="blog-image"><a href="'.get_permalink().'">';
                                if ( has_post_thumbnail() ) {
                                    $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                } else {
                                    if( $hcode_no_image['url'] ) {
                                        $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                    }
                                }
                                $output .='</a></div>';
                            }
                        }
                        $output .='<div class="post-details">';
                            if( get_the_title() && $hcode_show_post_title == 1 ) {
                                $output .='<a href="'.get_permalink().'" class="post-title sm-margin-top-ten xs-no-margin-top entry-title'.$title_responsive_class.'"'.$style.'>'.get_the_title().'</a>';
                            }

                            if( $hcode_show_post_author == 1 ) {
                                $hcode_post_meta_array[] = esc_html__('Posted by ','hcode-addons').$author;
                            }
                            if( $hcode_show_post_date == 1 ){
                                $hcode_post_meta_array[] = '<span class="published">'.get_the_date('d F Y', get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( 'd F Y' ).'</time>';
                            }

                            if( !empty( $hcode_post_meta_array ) ) {
                               $hcode_post_meta_list = implode( " | ", $hcode_post_meta_array );
                               $output .='<span class="post-author light-gray-text2 author vcard'.$post_meta_responsive_class.'"'.$hcode_meta_color.'>'.$hcode_post_meta_list.'</span>';
                            }

                            if($show_excerpt && $hcode_show_post_excerpt == 1 ) {
                                $output .= '<p class="entry-content">'.$show_excerpt.'</p>';
                            }
                            if( $hcode_enable_seperator == 1 ) {
                                $output .= '<div class="separator-line bg-black no-margin-lr no-margin-bottom xs-no-margin-top"'.$hcode_sep_color.'></div>';
                            }
                        $output .='</div>';
                    $output .='</div>';
                $output .='</div>';
                endwhile;
                wp_reset_postdata();
            break;
            case 'featurebox6':
                $h3_class = $pricing_price = '';
                        if($hcode_active_feature == 1){
                            $output .='<div class="pricing-box best-price xs-margin-0auto light-gray-text2 bg-black">';
                            $btn_class .='btn-small-white-background';
                            $h3_class = 'white-text ';
                        }else{
                            $output .='<div class="pricing-box  bg-white">';
                            $btn_class .='highlight-button';
                            $h3_class = 'black-text ';
                            $pricing_price = ' black-text';
                        }
                        if( $hcode_feature_title || $hcode_feature_subtitle ):
                            $output .='<div class="pricing-title">';
                                if( $hcode_feature_title ):
                                    if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                        $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                                    }
                                    $output .='<h3 class="'.$h3_class.' '.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</h3>';
                                    if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                        $output .= '</a>';
                                    }
                                endif;
                                if( $hcode_feature_subtitle || $hcode_subtitle_color ):
                                    $output .='<span class="light-gray-text2'.$subtitle_responsive_class.'" '.$hcode_subtitle_color.'>'.$hcode_feature_subtitle.'</span>';
                                endif;
                            $output .='</div>';
                        endif;
                        if( $hcode_feature_price != '' ):
                            $output .='<div class="pricing-price'.$pricing_price.'">';
                                $output .='<span class="price-unit">'.$hcode_feature_currency.'</span>'.$hcode_feature_price.'<span class="price-tenure">'.$hcode_feature_per_month_text.'</span>';
                            $output .='</div>';
                        endif;
                        if( $content ):
                            $output .='<div class="pricing-features">';
                            $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                            $output .='</div>';
                        endif;
                        if( $first_button_title ):
                            $output .='<div class="pricing-action">';
                                $output .='<a href="'.$first_button_link.'" class="'.$btn_class.' btn btn-small button no-margin.'.$button_responsive_class.'">'.$first_button_title.'</a>';
                            $output .='</div>';
                        endif;
                    $output .='</div>'; 
            break;
            case 'featurebox7':
        		$output .='<div '.$id.' class="col-md-12 no-padding'.$class.'">';
                    if( $hcode_feature_title_link ){
                        $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                    }
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) :
                        $output .='<div class="col-md-3 col-sm-2 col-xs-2 no-padding">';
                            $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image margin-bottom-15px' ) );                                
                        $output .='</div>';
                    elseif($hcode_et_line_icon_list):
                        $output .='<div class="col-md-3 col-sm-2 col-xs-2 no-padding">';
                        	$output .='<i class="'.$hcode_et_line_icon_list.$icon_size.'" '.$hcode_icon_color.'></i>';
                        $output .='</div>';
                    endif;
                    if( $hcode_feature_title_link ){
                        $output .= '</a>';
                    }
                    $output .='<div class="col-md-9 col-sm-9 col-xs-9 no-padding text-left f-right">';
                        if($hcode_feature_title):
                            if( $hcode_feature_title_link ){
                                $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                            }
                            $output .='<h5 class="'.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</h5>';
                            if( $hcode_feature_title_link ){
                                $output .= '</a>';
                            }
                        endif;
                        if($hcode_enable_seperator == 1):
                            $output .='<div class="separator-line bg-yellow no-margin-lr"'.$hcode_sep_color.'></div>';
                        endif;
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    $output .='</div>';
                $output .='</div>';
            break;
            case 'featurebox8':
                    $stars='';

                    $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                    
            		$output .='<div '.$id.' class="testimonial-style2'.$class.'">';
            			if( $hcode_feature_image ) {
                            if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                            }
                            $output .= wp_get_attachment_image( $hcode_feature_image, $hcode_image_srcset );
                            if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                $output .= '</a>';
                            }
    	        		}
                        if( $content ) {
    	                   $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                        }
                        if( $hcode_feature_star == 1 ) {
                            for($i=1; $i <= $hcode_stars; $i++){
                                $stars.='<i class="fas fa-star" '.$hcode_star_color.'></i>';
                            }
                            if( $stars ) {
                                $output .= '<div class="margin-two">';
                                    $output .= $stars;
                                $output .='</div>';
                            }
                        }
                        if($hcode_feature_title):
                            if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                            }
    	                    $output .='<span class="name light-gray-text2 '.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</span>';
                            if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                                $output .= '</a>';
                            }
                        endif;
                        if($hcode_feature_icon):
                            $output .='<i class="fas fa-quote-left'.$icon_size.' display-block margin-five no-margin-bottom" '.$hcode_icon_color.'></i>';
                        endif;
                    $output .='</div>';
            break;
            case 'featurebox9':
                if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                    $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                }
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                    $output .= wp_get_attachment_image( $custom_icon_image, $hcode_icon_image_srcset, '', array( 'class' => 'icon-image margin-bottom-15px' ) );
                } elseif( $hcode_et_line_icon_list ) {
                    $output .= '<i class="'.$hcode_et_line_icon_list.$icon_size.' display-block" '.$hcode_icon_color.'></i>';
                }
                if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                    $output .= '</a>';
                }
                if( $hcode_number ) {
                    $output .= '<h1 class="font-weight-600 margin-five no-margin-bottom'.$number_responsive_class.'" '.$hcode_number_color.'>'.$hcode_number.'</h1>';
                }
                if( $hcode_feature_title ) {
                    if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                        $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                    }
                    $output .= '<p class="text-uppercase letter-spacing-2 text-small margin-three '.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</p>';
                    if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                        $output .= '</a>';
                    }
                }
            break;
            case 'featurebox10':
                $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

                $output .= '<div class="col-md-5 col-sm-5 xs-margin-bottom-20px">';
                    if( $hcode_feature_image ) {
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                        }
                        $output .= wp_get_attachment_image( $hcode_feature_image, $hcode_image_srcset );
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '</a>';
                        }
                    }
                $output .= '</div>';
                $output .= '<div class="col-md-7 col-sm-7">';
                    if($hcode_feature_title):
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '<a href="'.$hcode_feature_title_link.'"'.$hcode_feature_title_link_target.'>';
                        }
                        $output .= '<h3 class="margin-bottom-15px font-weight-600 line-height-20 '.$class_list.$title_responsive_class.'"'.$style.'>'.$hcode_feature_title.'</h3>';
                        if( $hcode_feature_title_link || $hcode_feature_title_link_target ){
                            $output .= '</a>';
                        }
                    endif;
                    if($content):
                        $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                    endif;
                $output .= '</div>';
            break;
        }
        return $output;        
    }
}
add_shortcode( 'hcode_feature_box', 'hcode_feature_box_shortcode' );