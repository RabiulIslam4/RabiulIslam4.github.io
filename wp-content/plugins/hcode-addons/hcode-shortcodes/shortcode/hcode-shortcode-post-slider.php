<?php
/**
 * Shortcode For Blog Post Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blog Post Slider */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_blog_post_slider_shortcode' ) ) {
    function hcode_blog_post_slider_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
                    'show_blog_slider_style' => '',
                    'hcode_post_slider_id' => '',
            	    'hcode_post_slider_class' => '',
                    'hcode_categories_list' => '',
                    'hcode_show_post_title' => '',
                    'hcode_show_author_name' => '1',
                    'hcode_show_excerpt' => '1',
                    'hcode_excerpt_length' => '55',
                    'hcode_show_date' => '',
                    'hcode_show_button' => '1',
                    'hcode_button_text' => 'Continue Reading',
                    'hcode_day_format' => '',
                    'hcode_month_format' => '',
                    'hcode_year_format' => '',
                    'hcode_title_color' => '',
                    'hcode_subtitle_color' => '',
                    'hcode_day_color' => '',
                    'hcode_month_color' => '',
                    'hcode_year_color' => '',
                    'hcode_seperator_color' => '',
                    'hcode_seperator_height' => '',
                    'hcode_meta_color' => '',
                    'hcode_items_per_slider' => '5',
                    'hcode_post_per_page_desktop' => '3',
                    'hcode_post_per_page_minidesktop' => '3',
                    'hcode_post_per_page_ipad' => '2',
                    'hcode_post_per_page_mobile' => '1',
                    'show_pagination' => '',
                    'show_pagination_style' => '',
                    'show_pagination_color_style' => '',
                    'show_navigation' => '',
                    'show_navigation_style' => '',
                    'show_cursor_color_style' => '',
                    'loop' => '',
                    'autoplay' => '3000',
                    'custom_slidespeed' => '',
                    'slidedelay' => '700',
                    'custom_slidedelay' => '',
                    'orderby' => '',
                    'order' => '',
                    'hcode_image_srcset' => 'full',
                    'hcode_responsive_title_font' => '',
                    'hcode_responsive_postmeta_font' => '',
                    'one_button_config' => '',
        ), $atts ) );
        
        global $font_settings_array;
        $output  = $slider_config = $slider_id = $seperator = $blog_post = $title_responsive_id = $title_responsive_style = $title_responsive_class = $postmeta_responsive_id = $postmeta_responsive_style = $postmeta_responsive_class = $button_responsive_id = $button_responsive_style = $button_responsive_class = '';

        if( !empty( $one_button_config ) ) {
            $button_responsive_id = uniqid('hcode-button-');
            $button_responsive_style = Hcode_Font_Color_Settings::generate_css( $one_button_config, $button_responsive_id );
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
        if( !empty( $hcode_responsive_postmeta_font ) ) {
            $postmeta_responsive_id = uniqid('hcode-font-setting-');
            $postmeta_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_postmeta_font, $postmeta_responsive_id );
            $postmeta_responsive_class = ' '.$postmeta_responsive_id;
        }
        ( !empty( $postmeta_responsive_style ) ) ? $font_settings_array[] = $postmeta_responsive_style : '';

        $hcode_post_slider_id = ( $hcode_post_slider_id ) ? 'blog-post-slider-'.$hcode_post_slider_id : 'blog-post-slider-demo';
        $hcode_post_slider_class = ( $hcode_post_slider_class ) ? ' '.$hcode_post_slider_class : '';
        
        $hcode_categories_list = ( $hcode_categories_list ) ? $hcode_categories_list : '';
        $pagination = ($show_pagination_style) ? hcode_owl_pagination_slider_classes($show_pagination_style) : hcode_owl_pagination_slider_classes('default');
        $pagination_style = ($show_pagination_color_style) ? hcode_owl_pagination_color_classes($show_pagination_color_style) : hcode_owl_pagination_color_classes('default');
        $navigation = ( $show_navigation_style ) ? hcode_owl_navigation_slider_classes( $show_navigation_style) : hcode_owl_navigation_slider_classes('default') ;
        $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';

        $hcode_items_per_slider = ( $hcode_items_per_slider ) ? $hcode_items_per_slider : '';
        
        $hcode_post_per_page_desktop = ( $hcode_post_per_page_desktop ) ? $hcode_post_per_page_desktop : '3';
        $hcode_post_per_page_minidesktop = ( $hcode_post_per_page_minidesktop ) ? $hcode_post_per_page_minidesktop : '3';
        $hcode_post_per_page_ipad = ( $hcode_post_per_page_ipad ) ? $hcode_post_per_page_ipad : '2';
        $hcode_post_per_page_mobile = ( $hcode_post_per_page_mobile ) ? $hcode_post_per_page_mobile : '1';

        $hcode_title_color = ($hcode_title_color) ? 'style="color:'.$hcode_title_color.' !important"' : '';
        $hcode_subtitle_color = ($hcode_subtitle_color) ? 'style="color:'.$hcode_subtitle_color.' !important"' : '';
        $hcode_day_color = ($hcode_day_color) ? 'style="color:'.$hcode_day_color.' !important"' : '';
        $hcode_month_color = ($hcode_month_color) ? 'style="color:'.$hcode_month_color.' !important"' : '';
        $hcode_year_color = ($hcode_year_color) ? 'style="color:'.$hcode_year_color.' !important"' : '';
        $hcode_seperator_color = ($hcode_seperator_color) ? 'background:'.$hcode_seperator_color.' !important;' : '';
        $hcode_seperator_height = ($hcode_seperator_height) ? 'height:'.$hcode_seperator_height.';' : '';
        $hcode_meta_color = ($hcode_meta_color) ? ' style="color:'.$hcode_meta_color.' !important"' : '';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
        
        // no image
        $hcode_options = get_option( 'hcode_theme_setting' );
        $hcode_no_image = (isset($hcode_options['hcode_no_image'])) ? $hcode_options['hcode_no_image'] : '';
        if($hcode_seperator_color || $hcode_seperator_height):
            $seperator .= 'style = "'.$hcode_seperator_color.$hcode_seperator_height.'"';
        endif;
        $orderby = ( $orderby ) ? $orderby : 'date';
        $order = ( $order ) ? $order : 'DESC';
          
        $args = array('post_type' => 'post',
                    'posts_per_page' => $hcode_items_per_slider,
                   'category_name' => $hcode_categories_list,
                   'orderby' => $orderby,
                   'order' => $order,
    		       );
        $hcode_post_slider = new WP_Query( $args );

        // For Added Extra class
        if($show_blog_slider_style == 'blog-slider-3'):
            $blog_post .= 'blog-post-slider';
        elseif($show_blog_slider_style == 'blog-slider-2'):
            $blog_post .= 'blog-slider';
        elseif($show_blog_slider_style == 'blog-slider-1'):
            $blog_post .= 'blog-slider blog-slider-padding';
        else : 
            $blog_post .= 'blog-slider';
        endif;

        $output .= '<div class="'.$blog_post.' position-relative">';
        if($show_blog_slider_style == 'blog-slider-1'):
            $output .= '<div class="container">';
                $output .= '<div class="row">';
        endif;

        $output .= '<div id="'.$hcode_post_slider_id.'" class="owl-carousel owl-theme '.$hcode_post_slider_class.$navigation.$pagination.$pagination_style.$show_cursor_color_style.'">';
            while ( $hcode_post_slider->have_posts() ) : $hcode_post_slider->the_post();

                // Added in v1.8
                $hcode_post_classes = '';
                ob_start();
                    post_class();
                    $hcode_post_classes .= ob_get_contents();
                ob_end_clean();
                $output .= '<div '.$hcode_post_classes.'>';
                
                $hcode_show_post_title = ( $hcode_show_post_title ) ? $hcode_show_post_title : '';
                $show_excerpt = ( $hcode_excerpt_length ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));
                $hcode_show_date = ( $hcode_show_date ) ? $hcode_show_date : '';

                $hcode_show_button = ( $hcode_show_button ) ? $hcode_show_button : '';
                $hcode_button_text = ( $hcode_button_text ) ? $hcode_button_text : '';

                $_hcode_day_format = ( $hcode_day_format ) ? get_the_date( $hcode_day_format, get_the_ID() ) : get_the_date('d', get_the_ID());
                $_hcode_month_format = ( $hcode_month_format ) ? get_the_date( $hcode_month_format, get_the_ID() ) : get_the_date('m', get_the_ID());
                $_hcode_year_format = ( $hcode_year_format ) ? get_the_date( $hcode_year_format, get_the_ID()) : get_the_date( 'Y', get_the_ID());
                
                $post_author = get_post_field( 'post_author', get_the_ID() );
                $author = '<a class="light-gray-text2 url fn n" href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'"'.$hcode_meta_color.'>'.get_the_author().'</a>';
                $blog_quote = get_post_meta(get_the_ID(),'hcode_quote_single',true);
                $blog_image = get_post_meta(get_the_ID(),'hcode_image_single',true);
                $blog_gallery = get_post_meta(get_the_ID(),'hcode_gallery_single',true);
                $blog_video = get_post_meta(get_the_ID(),'hcode_video_type_single',true);

                switch ($show_blog_slider_style) {
                case "blog-slider-1" :
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
                                $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset  );
                            } else {
                                if( isset( $hcode_no_image['url'] ) && $hcode_no_image['url'] ) {
                                    $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                }
                            }
                            $output .='</a></div>';
                        }
                        $output .='<div class="post-details">';
                            if($hcode_show_post_title == 1):
                                $output .='<a href="'.get_permalink(get_the_ID()).'" class="post-title sm-margin-top-ten xs-no-margin-top entry-title'.$title_responsive_class.'" '.$hcode_title_color.'>'.get_the_title(get_the_ID()).'</a>';
                            endif;
                            
                            if( $hcode_show_author_name == 1 || $hcode_show_date == 1 ):
                                $output .='<span class="post-author light-gray-text2 author vcard published'.$postmeta_responsive_class.'"'.$hcode_meta_color.'>';
                                    if( $hcode_show_author_name == 1 ):
                                        $output .= esc_html__('Posted by ','hcode-addons').$author;
                                    endif;

                                    if( $hcode_show_date == 1 ):
                                        $date_format = array();
                                        if( !empty( $hcode_day_format ) ) {
                                            $date_format[] = $hcode_day_format;
                                        }
                                        if( !empty( $hcode_month_format ) ) {
                                            $date_format[] = $hcode_month_format;
                                        }
                                        if( !empty( $hcode_year_format ) ) {
                                            $date_format[] = $hcode_year_format;
                                        }
                                        $date_format = !empty( $date_format ) ? implode(' ', $date_format) : '';
                                        
                                        $output .= ( !empty( $hcode_show_author_name ) ? ' | ' : '' ).get_the_date($date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $date_format ).'</time>';
                                    endif;
                                $output .='</span>';
                            endif;

                            if( $hcode_show_excerpt == 1 ):
                                $output .= '<div class="entry-content">'.$show_excerpt.'</div>';
                            endif;
                        $output .='</div>';
                    $output .='</div>';
                    break;

                case "blog-slider-2" :
                    $output .='<div class="item">';
                        $output .='<div class="blog-slider-con">';
                            $output .='<figure>';
                                if(!empty($blog_image)){
                                        ob_start();
                                        get_template_part('loop/loop','image');
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                }
                                elseif(!empty($blog_gallery)){
                                        ob_start();
                                        get_template_part('loop/loop','gallery');
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                }
                                elseif(!empty($blog_video)){
                                        ob_start();
                                        get_template_part('loop/loop','video');
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                }
                                elseif(!empty($blog_quote)){
                                        ob_start();
                                        get_template_part('loop/loop','quote');
                                        $output .= ob_get_contents();  
                                        ob_end_clean(); 
                                }else{
                                        $output .='<div class="blog-image"><a href="'.get_permalink().'">';
                                        if ( has_post_thumbnail() ) {
                                            $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                        } else {
                                            if( isset( $hcode_no_image['url'] ) && $hcode_no_image['url'] ) {
                                                $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                            }
                                        }
                                        $output .='</a></div>';
                                }
                                $output .='<figcaption>';
                                    if($hcode_show_post_title == 1):
                                        $output .='<h3 class="'.$title_responsive_class.'"><a class="white-text-link entry-title" href="'.get_permalink(get_the_ID()).'" '.$hcode_title_color.'>'.get_the_title().'</a></h3>';
                                    endif;
                                    
                                    if( $hcode_show_author_name == 1 || $hcode_show_date == 1 ):
                                        $output .='<span class="post-author light-gray-text author vcard published'.$postmeta_responsive_class.'"'.$hcode_meta_color.'>';
                                            if( $hcode_show_author_name == 1 ):
                                                $output .= esc_html__('Posted by ','hcode-addons').$author;
                                            endif;

                                            if( $hcode_show_date == 1 ):
                                                $date_format = array();
                                                if( !empty( $hcode_day_format ) ) {
                                                    $date_format[] = $hcode_day_format;
                                                }
                                                if( !empty( $hcode_month_format ) ) {
                                                    $date_format[] = $hcode_month_format;
                                                }
                                                if( !empty( $hcode_year_format ) ) {
                                                    $date_format[] = $hcode_year_format;
                                                }
                                                $date_format = !empty( $date_format ) ? implode(' ', $date_format) : '';
                                                
                                                $output .= ( !empty( $hcode_show_author_name ) ? ' | ' : '' ) .get_the_date($date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $date_format ).'</time>';
                                            endif;
                                        $output .='</span>';
                                    endif;
                                    if( $hcode_show_button == 1 && $hcode_button_text ) {
                                        $output .='<a href="'.get_permalink(get_the_ID()).'" class="btn-small-white btn margin-five-top no-margin-bottom inner-link'.$button_responsive_class.'">'.$hcode_button_text.'</a>';
                                    }
                                $output .='</figcaption>';
                            $output .='</figure>';
                        $output .='</div>';
                    $output .='</div>';
                    break;

                case "blog-slider-3" :
                     $output .='<div class="item">';
                        $output .='<div class="blog-slider-grid">';
                            $output .='<figure>';
                                if(!empty($blog_image)){
                                        ob_start();
                                        get_template_part('loop/loop','image');
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                }
                                elseif(!empty($blog_gallery)){
                                        ob_start();
                                        get_template_part('loop/loop','gallery');
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                }
                                elseif(!empty($blog_video)){
                                        ob_start();
                                        get_template_part('loop/loop','video');
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                }
                                elseif(!empty($blog_quote)){
                                        ob_start();
                                        get_template_part('loop/loop','quote');
                                        $output .= ob_get_contents();  
                                        ob_end_clean(); 
                                }else{
                                    $output .='<div class="blog-image"><a href="'.get_permalink().'">';
                                    if ( has_post_thumbnail() ) {
                                        $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                    } else {
                                        if( isset( $hcode_no_image['url'] ) && $hcode_no_image['url'] ) {
                                            $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                        }
                                    }
                                    $output .='</a></div>';
                                }
                                $output .='<figcaption>';
                                    if($hcode_show_post_title == 1):
                                        $output .='<h3 class="'.$title_responsive_class.'"><a class="white-text-link entry-title" href="'.get_permalink(get_the_ID()).'" '.$hcode_title_color.'>'.get_the_title().'</a></h3>';
                                    endif;
                                    
                                    if( $hcode_show_author_name == 1 || $hcode_show_date == 1 ):
                                        $output .='<span class="post-author light-gray-text2 author vcard published'.$postmeta_responsive_class.'"'.$hcode_meta_color.'>';
                                            if( $hcode_show_author_name == 1 ):
                                                $output .= esc_html__('Posted by ','hcode-addons').$author;
                                            endif;

                                            if( $hcode_show_date == 1 ):
                                                $date_format = array();
                                                if( !empty( $hcode_day_format ) ) {
                                                    $date_format[] = $hcode_day_format;
                                                }
                                                if( !empty( $hcode_month_format ) ) {
                                                    $date_format[] = $hcode_month_format;
                                                }
                                                if( !empty( $hcode_year_format ) ) {
                                                    $date_format[] = $hcode_year_format;
                                                }
                                                $date_format = !empty( $date_format ) ? implode(' ', $date_format) : '';
                                                
                                                $output .= ( !empty( $hcode_show_author_name ) ? ' | ' : '' ).get_the_date($date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $date_format ).'</time>';
                                            endif;

                                        $output .='</span>';
                                    endif;

                                $output .='</figcaption>';
                            $output .='</figure>';
                        $output .='</div>';
                    $output .='</div>';
                    break;

                case "blog-slider-4" :
                    if( ( $hcode_show_date == 1 ) || ( $_hcode_day_format || $_hcode_month_format || $_hcode_year_format || $hcode_show_post_title == 1 || $show_excerpt ) ):
                        $output .='<div class="item">';
                            if( ( $hcode_show_date == 1 ) && ( $_hcode_day_format || $_hcode_month_format || $_hcode_year_format ) ):
                                $output .='<div class="col-md-2 col-sm-3 col-xs-3 col-md-offset-1 text-center">';
                                    if( $_hcode_day_format ):
                                        $output .='<span class="timeline-number alt-font bg-white black-text display-inline-block" '.$hcode_day_color.'>'.$_hcode_day_format.'</span>';
                                    endif;
                                    if( $_hcode_month_format ):
                                        $output .='<span class="text-large white-text display-block margin-ten-top" '.$hcode_month_color.'>'.$_hcode_month_format.'</span>';
                                    endif;
                                    if( $_hcode_year_format ):
                                        $output .='<span class="text-large white-text display-block margin-ten-bottom" '.$hcode_year_color.'>'.$_hcode_year_format.'</span>';
                                    endif;
                                    $output .='<div class="thin-separator-line bg-yellow" '.$seperator.'></div>';
                                $output .='</div>';
                            endif;
                            if( $hcode_show_post_title == 1 || $hcode_show_excerpt == 1 ):
                                $output .='<div class="col-md-9 col-sm-8 col-xs-9 border-right border-transperent-light xs-no-border">';
                                    if( $hcode_show_post_title == 1 ):
                                        $output .='<h5 class="title-small text-uppercase font-weight-700 letter-spacing-1 white-text entry-title'.$title_responsive_class.'"><a href="'.get_permalink().'" '.$hcode_title_color.'>'.get_the_title().'</a></h5>';
                                    endif;
                                    if( $hcode_show_excerpt == 1 ):
                                        $output .='<div class="text-med margin-three width-80 gray-text xs-width-100 float-left post-slider-no-margin entry-content" '.$hcode_subtitle_color.'>'.$show_excerpt.'</div>';
                                    endif;
                                $output .='</div>';
                            endif;
                        $output .='</div>';
                    endif;
                    break;
                }
                $output .='</div>';
            endwhile;
            wp_reset_postdata();
        $output .='</div>';
        if($show_blog_slider_style == 'blog-slider-1'):
                $output .= '</div>';
            $output .= '</div>';
        endif;
        $output .='</div>';
        // For Navigation
        switch ($show_blog_slider_style) {
                case 'blog-slider-1':
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
                    break;

                case 'blog-slider-2':
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
                    break;
                    
                case 'blog-slider-3':
                    ( $show_navigation == 1 ) ? $slider_config .= 'nav: true,' : $slider_config .= 'nav: false,';
                    break;
                }
            
    	/* Add custom script Start*/
        $autoplay = ( $autoplay ) ? $autoplay : '3000';
        $custom_slidespeed = ( $custom_slidespeed ) ? $custom_slidespeed : '';
        if( $autoplay == 'custom' && $custom_slidespeed && is_numeric( $custom_slidespeed ) ) {
            $autoplay = $custom_slidespeed;
        }

        if( $autoplay == 'custom' ) {
            $autoplay = '3000';
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
    	( $autoplay ) ? $slider_config .= 'autoplay:true, autoplayTimeout: '.$autoplay.', autoplaySpeed: '.$slidedelay.',' : '';
        ( is_rtl() ) ? $slider_config .= 'rtl: true,' : '';
        ( $loop == 1) ? $slider_config .= 'loop: true, ' : $slider_config .= 'loop: false, ';
        ( $hcode_post_per_page_desktop || $hcode_post_per_page_minidesktop || $hcode_post_per_page_ipad || $hcode_post_per_page_mobile ) ? $slider_config .= "responsive:{" : '';
        ( $hcode_post_per_page_mobile ) ? $slider_config .= '0:{ items: '.$hcode_post_per_page_mobile.' },' : $slider_config .= '0:{ items: 1 },';
        ( $hcode_post_per_page_ipad ) ? $slider_config .= '700:{ items: '.$hcode_post_per_page_ipad.'},' : $slider_config .= '700:{ items: 2 },';
        ( $hcode_post_per_page_minidesktop ) ? $slider_config .= '991:{ items: '.$hcode_post_per_page_minidesktop.' },' : $slider_config .= '991:{ items: 3 },';
        ( $hcode_post_per_page_desktop ) ? $slider_config .= '1200:{ items: '.$hcode_post_per_page_desktop.' },' : $slider_config .= '1200:{ items: 4 },';
        ( $hcode_post_per_page_desktop || $hcode_post_per_page_minidesktop || $hcode_post_per_page_ipad || $hcode_post_per_page_mobile ) ? $slider_config .= "}," : '';
    	$slider_config .= 'navText: ["<i class=\'fas fa-angle-left\'></i>", "<i class=\'fas fa-angle-right\'></i>"]';
    	ob_start();?>
        <script type="text/javascript">jQuery(document).ready(function () { jQuery("<?php echo '#'.$hcode_post_slider_id;?>").owlCarousel({ <?php echo $slider_config;?> }); }); </script>
    	<?php 
    	$script = ob_get_contents();
    	ob_end_clean();
    	$output .= $script;
    	/* Add custom script End*/

    	return $output;
    }
}
add_shortcode('hcode_blog_post_slider','hcode_blog_post_slider_shortcode');