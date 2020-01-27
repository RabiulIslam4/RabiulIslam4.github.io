<?php
/**
 * Shortcode For Parallax
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Parallax */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_parallax_shortcode' ) ) {
    function hcode_parallax_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_parallax_style' => '',
            'hcode_show_filter' => '',
            'hcode_show_all_categories_filter' => '1',
            'hcode_default_category_selected' => '',
            'hcode_portfolio_categories_orderby' => 'id',
            'hcode_portfolio_categories_order' => 'ASC',
            'hcode_filter_color' => 'nav-tabs-black',
            'hcode_filter_custom_color' => '',
            'hcode_show_button' => '1',
            'hcode_button_link' => '',
            'hcode_seperater' => '1',
            'hcode_sep_color' => '',
            'seperator_height' => '',
            'hcode_animation_style' => '',
            'hcode_categories_list' => '',
            'hcode_post_per_page' => '10',
            'hcode_show_excerpt' => '',
            'hcode_excerpt_length' => '15',
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
            'orderby' => '',
            'order' => '',
            'hcode_overlay_color' => '',
            'hcode_overlay_opacity' => '',
            'hcode_image_srcset' => 'full',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_subtitle_font' => '',
            'hcode_responsive_filter_font' => '',
            'hcode_filter_hover_color' => '',
            'hcode_filter_border_color' => '',
            'hcode_title_color' => '',
            'hcode_subtitle_color' => '',
            'hcode_bg_color' => '',
            'hcode_hover_bg_color' => '',
        ), $atts ) );
        global $font_settings_array, $hcode_featured_array, $hcode_parallax_filter, $hcode_featured_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $output = $seperator = $padding = $padding_style = $margin = $margin_style = $style_attr = $style = $hcode_overlay = $hcode_parallax_portfolio_filter = $filter_class = $filter_class_style = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = $filter_responsive_id = $filter_responsive_style = $filter_responsive_class = '';
        $classes = array();

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

        if( !empty( $hcode_responsive_filter_font ) ) {
            $filter_responsive_id = uniqid('hcode-font-setting-');
            $filter_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_filter_font, $filter_responsive_id );
            $filter_responsive_class = ' '.$filter_responsive_id;
        }
        ( !empty( $filter_responsive_style ) ) ? $font_settings_array[] = $filter_responsive_style : '';

        $hcode_parallax_filter = !empty( $hcode_parallax_filter ) ? $hcode_parallax_filter : 0;
        $hcode_parallax_filter = $hcode_parallax_filter + 1;
        $hcode_token_class = 'hcode-parallax-filter-'.$hcode_parallax_filter;
        $hcode_parallax_token_class = 'hcode-parallax-'.$hcode_parallax_filter;

        !empty( $hcode_filter_border_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' > li.active > a, .'.$hcode_token_class.' li > a:hover{ border-color: '.$hcode_filter_border_color.'}' : '';
        !empty( $hcode_filter_hover_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' > li.active > a, .'.$hcode_token_class.' li > a:hover{ color: '.$hcode_filter_hover_color.' !important; }' : '';
        !empty( $hcode_hover_bg_color ) ? $hcode_featured_array[] = '.'.$hcode_parallax_token_class.':hover figure { background: '.$hcode_hover_bg_color.' !important; }' : '';

        $hcode_title_color = ($hcode_title_color) ? ' style="color:'.$hcode_title_color.';"' : '';
        $hcode_subtitle_color = ($hcode_subtitle_color) ? ' style="color:'.$hcode_subtitle_color.';"' : '';
        $hcode_bg_color = ($hcode_bg_color) ? ' style="background:'.$hcode_bg_color.';"' : '';

        $hcode_sep_color = ($hcode_sep_color) ? 'background:'.$hcode_sep_color.';' : '';
        $seperator_height = ($seperator_height) ? 'height:'.$seperator_height.';' : '';

        if($hcode_sep_color || $seperator_height):
            $seperator = ' style="'.$hcode_sep_color.$seperator_height.'"';
        endif;

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class.' ' : '';
        $orderby = ( $orderby ) ? $orderby : '';
        $order = ( $order ) ? $order : '';
        // For Button
        $first_button_parse_args = vc_parse_multi_attribute($hcode_button_link);
        $first_button_link     = ( isset($first_button_parse_args['url']) ) ? $first_button_parse_args['url'] : '#';
        $first_button_title    = ( isset($first_button_parse_args['title']) ) ? $first_button_parse_args['title'] : '';
        $hcode_animation_style = ( $hcode_animation_style ) ? ' wow '.$hcode_animation_style : '';

        /* Overlay */
        $hcode_overlay_opacity = ( $hcode_overlay_opacity ) ? 'opacity:'.$hcode_overlay_opacity.';' : '';
        $hcode_overlay_color = ( $hcode_overlay_color ) ? 'background:'.$hcode_overlay_color.';' : '';
        
        if( $hcode_overlay_opacity || $hcode_overlay_color ){
            $hcode_overlay = ' style="'.$hcode_overlay_opacity.$hcode_overlay_color.'"';
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

            ( $custom_desktop_padding && $desktop_padding == 'custom-desktop-padding' ) ? $hcode_featured_array[] = '.'.$hcode_parallax_token_class.'{ padding:'.$custom_desktop_padding.' !important; }' : '';
            ( $custom_ipad_padding && $ipad_padding == 'custom-ipad-padding' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_parallax_token_class.'{ padding:'.$custom_ipad_padding.' !important;}' : '';
            ( $custom_mobile_padding && $mobile_padding == 'custom-mobile-padding' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_parallax_token_class.'{ padding:'.$custom_mobile_padding.' !important;}' : '';
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

            ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $hcode_featured_array[] = '.'.$hcode_parallax_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
            ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_parallax_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
            ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_parallax_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
        }

        $class_list = implode(" ", $classes);

        $categories_to_display_ids = explode(",",$hcode_categories_list);
        if ( is_array( $categories_to_display_ids ) && $categories_to_display_ids[0] == '0' ) {
            unset( $categories_to_display_ids[0] );
            $categories_to_display_ids = array_values( $categories_to_display_ids );
        }
        // If no categories are chosen or "All categories", we need to load all available categories
        if ( ! is_array( $categories_to_display_ids ) || count( $categories_to_display_ids ) == 0 ) {
            $terms = get_terms( 'portfolio-category' );

            if ( ! is_array( $categories_to_display_ids ) ) {
                $categories_to_display_ids = array();
            }

            foreach ( $terms as $term ) {
                $categories_to_display_ids[] = $term->slug;
            }
        }

        if( $hcode_show_filter == 1 ) {
            
            /* For portfolio filter color */
            $hcode_filter_color = ( $hcode_filter_color ) ? $hcode_filter_color : '';
            $hcode_filter_custom_color = ( $hcode_filter_custom_color ) ? $hcode_filter_custom_color : '';

            switch ($hcode_filter_color) {
                case 'nav-tabs-black':
                case 'nav-tabs-gray':
                    if( $hcode_filter_color ){
                        $filter_class = ' '.$hcode_filter_color;
                    }
                break;

                case 'custom':
                    if( $hcode_filter_custom_color ) {
                        $filter_class_style .= ' style="color:'.$hcode_filter_custom_color.'"';
                    }
                break;
            }
            $output .='<div class="col-md-12 text-center">';
                $output .='<div class="text-center hcode-parallax">';
                    $output .='<ul class="portfolio-filter nav nav-tabs wow fadeInUp'.$filter_class.' '.$hcode_token_class.'">';
                        if( $hcode_show_all_categories_filter == 1 ) {
                            $active_class = empty( $hcode_default_category_selected ) ? ' active ' : '';
                            $output .= '<li class="nav '.$active_class.'"><a href="#" class="'.$filter_responsive_class.'" data-filter="*"'.$filter_class_style.'>'.__( 'All', 'hcode-addons' ).'</a></li>';
                        }
                    $taxonomy = 'portfolio-category';
                    $args = array(
                        'orderby' => $hcode_portfolio_categories_orderby,
                        'order' => $hcode_portfolio_categories_order,
                        'hide_empty' => 0, 
                        'slug' => $categories_to_display_ids,
                    );
                    $tax_terms = get_terms($taxonomy, $args);
                    foreach ($tax_terms as $tax_term) {
                        $active_class = ( $hcode_default_category_selected == $tax_term->slug ) ? ' active ' : '';
                        $output .='<li class="nav '.$active_class.'">
                                    <a href="#" class="'.$filter_responsive_class.'" data-filter=".portfolio-filter-'.$tax_term->term_id.'"'.$filter_class_style.'>'.$tax_term->name.'</a>
                                </li>';
                    }
                    $output .='</ul>';
                $output .='</div>';
            $output .='</div>';
        
        $output .= '<div class="parallax-masonry-items" style="float: left; width:100%;">';
        $output .= '<div class="content-section">';
        $output .= '<div class="tab-content">';
        $hcode_parallax_portfolio_filter .= 'parallax-portfolio-filter ';
        }

            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => $hcode_post_per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolio-category',
                        'field' => 'slug',
                        'terms' => $categories_to_display_ids
                   ),
                ),
                'orderby' => $orderby,
                'order' => $order,
                'paged' => $paged,
            );
            $portfolio_posts = new WP_Query( $args );
            while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
                $title = get_the_title();
                $portfolio_permalink = get_permalink();

                $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $hcode_image_srcset );

                $srcset = $srcset_data_bg = $srcset_classes_bg = '';
                $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(get_the_ID()), $hcode_image_srcset );
                if( $srcset ){
                    $srcset_data_bg = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                    $srcset_classes_bg = ' bg-image-srcset';
                }
            
                $url = $thumb['0'];
                $show_excerpt = ( $hcode_show_excerpt == 1 ) ? hcode_get_the_excerpt_theme($hcode_excerpt_length) : hcode_get_the_excerpt_theme(55);
                $parallax = '';
                if($url){
                    $parallax = ' style="background-image: url('.$url.')"';
                }
                $portfolio_subtitle = hcode_post_meta('hcode_subtitle');
                $portfoliowithdesc_class = '';

                $portfolio_image = hcode_post_meta('hcode_image');;
                $portfolio_gallery = hcode_post_meta('hcode_gallery');
                $portfolio_link = hcode_post_meta('hcode_link_type');
                $portfolio_video = hcode_post_meta('hcode_video');
                $portfolio_subtitle = hcode_post_meta('hcode_subtitle');
                $hcode_portfolio_post_type = hcode_post_meta( 'hcode_portfolio_post_type' );

                $img_lightbox_caption = hcode_option_image_caption(get_post_thumbnail_id());
                $img_lightbox_title = hcode_option_lightbox_image_title(get_post_thumbnail_id());
                $image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                $image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ;
                $popup_id = 'portfolio-'.get_the_ID();

                $post_format = $button = '';

                if( $hcode_portfolio_post_type != "" && ( $hcode_portfolio_post_type == "image" || $hcode_portfolio_post_type == "standard") ){
                    if($hcode_show_button && $first_button_title){
                        if($hcode_parallax_style == 'parallax'){
                            $button .='<div class="look-project wow fadeInUp"><a href="'.$portfolio_permalink.'" class="text-uppercase">'.$first_button_title.'</a></div>';
                            $post_format .='<a href="'.$portfolio_permalink.'" class="text-uppercase"><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                        }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                            $button .='<a href="'.$portfolio_permalink.'" class="btn-small-white-background btn margin-ten no-margin-bottom">'.$first_button_title.'</a>';
                            if($title):
                                $post_format .='<a href="'.$portfolio_permalink.'"><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                            endif;
                        }
                    }else{
                        if($hcode_parallax_style == 'parallax'){
                            $post_format .='<a href="'.$portfolio_permalink.'" class="text-uppercase"><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                        }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                            if($title):
                                $post_format .='<a href="'.$portfolio_permalink.'"><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                            endif;
                        }
                    }
                }else{
                    if(!empty($portfolio_gallery) || ( $hcode_portfolio_post_type != "" && $hcode_portfolio_post_type == "gallery" ) ){

                        $portfolio_gallery = hcode_post_meta('hcode_gallery');
                        $gallery = explode(",",$portfolio_gallery);
                        $i=1;
                        if(is_array($gallery)):
                            foreach ($gallery as $k => $value) {

                                $img_lightbox_caption_gallery = hcode_option_image_caption($value);
                                $img_lightbox_title_gallery = hcode_option_lightbox_image_title($value);
                                $image_lightbox_caption_gallery = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;
                                $image_lightbox_title_gallery = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.$img_lightbox_title_gallery['title'].'"' : '' ; 

                                $thumb_gallery = wp_get_attachment_image_src( $value, 'full' );
                                if($i == 1){
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                    $url = $thumb['0'];
                                    if($url){
                                        if($hcode_parallax_style == 'parallax'){
                                            if($hcode_show_button && $first_button_title){
                                                $button .='<div class="look-project parallax-parent-gallery-popup wow fadeInUp"><a '.$image_lightbox_title.$image_lightbox_caption.' href="javascript:void(0);" class="text-uppercase">'.$first_button_title.'</a></div>';
                                            }
                                            $post_format .='<a '.$image_lightbox_title.$image_lightbox_caption.' href="'.$url.'" class="lightboxgalleryitem" data-group="'.$popup_id.'">';
                                            
                                            $post_format .= '<div class="opacity-light bg-slider"'.$hcode_overlay.'></div>';
                                            $post_format .= '</a>';
                                            if( $thumb_gallery[0] ) {
                                                $post_format .= '<a href="'.$thumb_gallery[0].'" '.$image_lightbox_title_gallery.$image_lightbox_caption_gallery.' class="lightboxgalleryitem" data-group="'.$popup_id.'"></a>';
                                            }
                                        }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                                            if($hcode_show_button && $first_button_title){
                                                $button .='<a href="javascript:void(0);" class="btn-small-white-background btn margin-ten no-margin-bottom parallax-parent-gallery-popup">'.$first_button_title.'</a>';
                                            }
                                            $post_format .='<a '.$image_lightbox_title.$image_lightbox_caption.' href="'.$url.'" class="lightboxgalleryitem" data-group="'.$popup_id.'"><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                                            
                                            if( $thumb_gallery[0] ) {
                                                $post_format .= '<a href="'.$thumb_gallery[0].'" '.$image_lightbox_title_gallery.$image_lightbox_caption_gallery.' class="lightboxgalleryitem" data-group="'.$popup_id.'"></a>';
                                            }
                                        }
                                    }
                                }else {
                                    if( $thumb_gallery[0] ) {
                                        $post_format .= '<a href="'.$thumb_gallery[0].'" '.$image_lightbox_title_gallery.$image_lightbox_caption_gallery.' class="lightboxgalleryitem" data-group="'.$popup_id.'"></a>';
                                    }
                                }
                                $i++;
                            }
                        endif;

                    }elseif(!empty($portfolio_video) || ( $hcode_portfolio_post_type != "" && $hcode_portfolio_post_type == "video" )){

                        $video_url = hcode_post_meta('hcode_video');
                        if($hcode_show_button && $first_button_title){
                            if($hcode_parallax_style == 'parallax'){
                                $button .='<div class="look-project wow fadeInUp"><a href="'.$video_url.'" class="text-uppercase popup-vimeo">'.$first_button_title.'</a></div>';
                                $post_format .= '<a href="'.$video_url.'" class="text-uppercase popup-vimeo"><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                            }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                                $button .='<a href="'.$video_url.'" class="btn-small-white-background btn margin-ten no-margin-bottom popup-vimeo">'.$first_button_title.'</a>';
                                if($title):
                                    $post_format .='<a href="'.$video_url.'" class="popup-vimeo"><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                                endif;
                            }
                        }else{
                            if($hcode_parallax_style == 'parallax'){
                                $post_format .= '<a href="'.$video_url.'" class="text-uppercase popup-vimeo"><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                            }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                                if($title):
                                    $post_format .='<a href="'.$video_url.'" class="popup-vimeo"><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                                endif;
                            }
                        }

                    }elseif(!empty($portfolio_link) || ( $hcode_portfolio_post_type != "" && $hcode_portfolio_post_type == "link" )){

                        $link_url = hcode_post_meta('hcode_link');
                        $link_type = hcode_post_meta('hcode_link_type');
                        $hcode_link_target = hcode_post_meta('hcode_link_target');
                        $ajax_popup_class = $link = $icon = $link_target = '';
                        switch ($link_type) {
                            case 'external':
                                $ajax_popup_class .= '';
                                $link .= $link_url;
                                $link_target .= ' target="'.$hcode_link_target.'"';
                                break;

                            case 'ajax-popup':
                                $ajax_popup_class .= ' simple-ajax-popup-align-top';
                                $link .= $link_url;
                                break;
                        }
                        if($hcode_show_button && $first_button_title){
                            if($hcode_parallax_style == 'parallax'){
                                $button .='<div class="look-project wow fadeInUp"><a href="'.$link.'" class="text-uppercase'.$ajax_popup_class.'"'.$link_target.'>'.$first_button_title.'</a></div>';
                                $post_format .='<a href="'.$link.'" class="text-uppercase'.$ajax_popup_class.'"'.$link_target.'><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                            }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                                $button .='<a href="'.$link.'" class="btn-small-white-background btn margin-ten no-margin-bottom'.$ajax_popup_class.'"'.$link_target.'>'.$first_button_title.'</a>';
                                if($title):
                                    $post_format .='<a href="'.$link.'" class="text-uppercase'.$ajax_popup_class.'"'.$link_target.'><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                                endif;
                            }
                        }else{
                            if($hcode_parallax_style == 'parallax'){
                                $post_format .='<a href="'.$link.'" class="text-uppercase'.$ajax_popup_class.'"'.$link_target.'><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                            }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                                if($title):
                                    $post_format .='<a href="'.$link.'" class="text-uppercase'.$ajax_popup_class.'"'.$link_target.'><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                                endif;
                            }
                        }
                        
                    } else {

                        if($hcode_show_button && $first_button_title){
                            if($hcode_parallax_style == 'parallax'){
                                $button .='<div class="look-project wow fadeInUp"><a href="'.$portfolio_permalink.'" class="text-uppercase">'.$first_button_title.'</a></div>';
                                $post_format .='<a href="'.$portfolio_permalink.'" class="text-uppercase"><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                            }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                                $button .='<a href="'.$portfolio_permalink.'" class="btn-small-white-background btn margin-ten no-margin-bottom">'.$first_button_title.'</a>';
                                if($title):
                                    $post_format .='<a href="'.$portfolio_permalink.'"><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                                endif;
                            }
                        }else{
                            if($hcode_parallax_style == 'parallax'){
                                $post_format .='<a href="'.$portfolio_permalink.'" class="text-uppercase"><div class="opacity-light bg-slider"'.$hcode_overlay.'></div></a>';
                            }elseif($hcode_parallax_style == 'portfolio-with-desc'){
                                if($title):
                                    $post_format .='<a href="'.$portfolio_permalink.'"><h3 class="white-text'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3></a>';
                                endif;
                            }
                        }
                    }
                }

                $cat_slug = '';
                $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                foreach ($cat as $key => $c) {
                    $cat_slug .= ' portfolio-filter-'.$c->term_id;
                }

                switch ($hcode_parallax_style) {
                    case 'parallax':
                        $output .='<div '.$id.' class="'.$hcode_parallax_portfolio_filter.' parallax-portfolio-gallery-parent pull-left width-100'.$cat_slug.'" '.$class.'>';
                            $output .= '<div class="parallax-portfolio'.$srcset_classes_bg.'" '.$parallax.$srcset_data_bg.'>';
                                $output .= $post_format;
                                $output .='<figure>';
                                    $output .='<figcaption class="bg-black"'.$hcode_bg_color.'>';
                                        if($title):
                                            $output .='<h3 class="'.$title_responsive_class.'"'.$hcode_title_color.'>'.$title.'</h3>';
                                        endif;
                                        $output .='<p class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_color.'>'.$portfolio_subtitle.'</p>';
                                    $output .='</figcaption>';
                                    $output .= $button;
                                $output .='</figure>';
                            $output .='</div>';
                        $output .='</div>';
                    break;

                    case 'portfolio-with-desc':
                        $portfoliowithdesc_class = ' no-padding-top';
                        $output .='<div '.$id.' class="'.$hcode_parallax_portfolio_filter.'portfolio-short-description parallax-portfolio-gallery-parent col-md-12 col-sm-12 col-xs-12 '.$class.$class_list.$cat_slug.'">';
                            $output .='<div class="portfolio-short-description-bg pull-left'.$srcset_classes_bg.' '.$hcode_parallax_token_class.'" '.$parallax.$srcset_data_bg.'>';
                                $output .='<figure class="pull-right '.$hcode_animation_style.'"'.$hcode_bg_color.'>';
                                    $output .='<figcaption>';
                                    if($hcode_seperater == '1'){
                                        $output .='<div class="separator-line bg-yellow no-margin-lr margin-ten no-margin-top"'.$seperator.'></div>';
                                    }
                                        
                                        $output .= $post_format;                                    
                                        $output .= '<p class="light-gray-text margin-seven"'.$hcode_subtitle_color.'>'.$show_excerpt.'</p>';
                                        $output .= $button;
                                    $output .='</figcaption>';
                                $output .='</figure>';
                            $output .='</div>';
                        $output .='</div>';
                    break;
                }
            endwhile;
            wp_reset_postdata();
        if( $hcode_show_filter == 1 ) {
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }
                
        // Pagination
        if( $hcode_show_filter != 1 ) {
            if($portfolio_posts->max_num_pages > 1) {
                if( $portfolio_posts->query_vars['paged'] > 1 ) {
                    $current = $portfolio_posts->query_vars['paged'];
                } else {
                    $current = 1;
                }
                $output .='<section class="clear-both'.$portfoliowithdesc_class.'">';
                    $output .='<div class="container">';
                        $output .='<div class="row">';
                            $output .='<div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp">';
                                $output .='<div class="pagination margin-top-20px">';
                                    $output .= paginate_links( array(
                                        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                        'format'       => '',
                                        'add_args'     => '',
                                        'current'      => $current,
                                        'total'        => $portfolio_posts->max_num_pages,
                                        'prev_text'    => '<img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                                        'next_text'    => '<img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                                        'type'         => 'plain',
                                        'end_size'     => 2,
                                        'mid_size'     => 2
                                    ) );
                                $output .='</div>';
                            $output .='</div>';
                        $output .='</div>';
                    $output .='</div>';
                $output .='</section>';
            }
        }
    return $output;
    }
}
add_shortcode( 'hcode_parallax', 'hcode_parallax_shortcode' );