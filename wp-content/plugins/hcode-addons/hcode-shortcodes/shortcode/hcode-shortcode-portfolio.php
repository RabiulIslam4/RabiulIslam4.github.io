<?php
/**
 * Shortcode For Portfolio
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'hcode_portfolio_shortcode' ) ) {
    function hcode_portfolio_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_portfolio_style' => '',
            'hcode_portfolio_columns' =>'',
            'hcode_post_per_page' => '15',
            'orderby' => 'date',
            'order' => 'ASC',
            'hcode_portfolio_selection' => 'portfolio-category',
            'hcode_categories_list' => '',
            'hcode_tags_list' => '',
            'hcode_enable_lightbox' => '',
            'hcode_show_filter' => '',
            'hcode_portfolio_filter_selection' => 'portfolio-category',
            'hcode_show_all_categories_filter' => '1',
            'hcode_default_category_selected' => '',
            'hcode_show_all_tags_filter' => '1',
            'hcode_default_tags_selected' => '',
            'hcode_portfolio_categories_orderby' => 'id',
            'hcode_portfolio_categories_order' => 'ASC',
            'hcode_show_title' => '1',
            'hcode_show_subtitle' => '1',
            'hcode_show_infinite_pagination' => '',
            'hcode_show_separator' => '',
            'hcode_sep_color' => '',
            'seperator_height' => '2px',
            'hcode_title_text_color' => '',
            'hcode_subtitle_text_color' => '',
            'hcode_hover_bg_color' => '',
            'hcode_filter_color' => '',
            'hcode_filter_custom_color' => '',
            'hcode_animation_style' => '',
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
            'hcode_show_button' => '',
            'button_text' => '',
            'hcode_image_srcset' => 'full',
            'hcode_responsive_title_font' => '',
            'hcode_responsive_subtitle_font' => '',
            'hcode_responsive_filter_font' => '',
            'hcode_filter_hover_color' => '',
            'hcode_filter_border_color' => '',
        ), $atts ) );
        
        global $font_settings_array, $hcode_featured_array, $hcode_portfolio, $hcode_featured_ipad_array, $hcode_featured_mobile_array;
        $icon = $output = $container_class = $no_padding = $classes = $seperator = $portfolio_columns = $title_responsive_id = $title_responsive_style = $title_responsive_class = $subtitle_responsive_id = $subtitle_responsive_style = $subtitle_responsive_class = $filter_responsive_id = $filter_responsive_style = $filter_responsive_class = $portfolio_id = '';
        $classes_arr = array();

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_subtitle_font ) ) {
            $subtitle_responsive_id = uniqid('hcode-font-setting-');
            $subtitle_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_subtitle_font, $subtitle_responsive_id );
            $subtitle_responsive_class = ' '.$subtitle_responsive_id;
        }
        ( !empty( $subtitle_responsive_style ) ) ? $font_settings_array[] = $subtitle_responsive_style : '';

        //For Text Align 
        if( !empty( $hcode_responsive_filter_font ) ) {
            $filter_responsive_id = uniqid('hcode-font-setting-');
            $filter_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_filter_font, $filter_responsive_id );
            $filter_responsive_class = ' '.$filter_responsive_id;
        }
        ( !empty( $filter_responsive_style ) ) ? $font_settings_array[] = $filter_responsive_style : '';
        $hcode_portfolio = !empty( $hcode_portfolio ) ? $hcode_portfolio : 0;
        $hcode_portfolio = $hcode_portfolio + 1;
        $hcode_token_class = 'hcode-portfolio-'.$hcode_portfolio;
        $hcode_filter_token_class = 'hcode-portfolio-filter-'.$hcode_portfolio; 
        !empty( $hcode_hover_bg_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' figure:hover .gallery-img{ background-color: '.$hcode_hover_bg_color.'}' : '';

        !empty( $hcode_filter_border_color ) ? $hcode_featured_array[] = '.'.$hcode_filter_token_class.' > li.active > a, .'.$hcode_filter_token_class.' li > a:hover{ border-color: '.$hcode_filter_border_color.'}' : '';
        !empty( $hcode_filter_hover_color ) ? $hcode_featured_array[] = '.'.$hcode_filter_token_class.' > li.active > a, .'.$hcode_filter_token_class.' li > a:hover{ color: '.$hcode_filter_hover_color.' !important; }' : '';

        $portfolio_id = $id;
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' '.$class : '';
        $hcode_portfolio_selection = ( $hcode_portfolio_selection ) ? $hcode_portfolio_selection : 'portfolio-category';
        $hcode_portfolio_filter_selection = ( $hcode_portfolio_filter_selection ) ? $hcode_portfolio_filter_selection : 'portfolio-category';
        
        $hcode_portfolio_settings = hcode_post_meta('hcode_portfolio_settings');
        $hcode_post_per_page = ($hcode_post_per_page) ? $hcode_post_per_page : '-1';
        $orderby = ($orderby) ? $orderby : '"date"';
        $order = ($order) ? $order : 'ASC';
        $enable_lightbox = ($hcode_enable_lightbox == 1) ? 'lightbox-gallery' : '';
        $hcode_title_text_color = ($hcode_title_text_color) ? ' style="color:'.$hcode_title_text_color.' !important;"' : '';
        $hcode_subtitle_text_color = ($hcode_subtitle_text_color) ? ' style="color:'.$hcode_subtitle_text_color.' !important;"' : '';
        $hcode_filter_color = ( $hcode_filter_color ) ? $hcode_filter_color : '';
        $hcode_filter_custom_color = ( $hcode_filter_custom_color ) ? $hcode_filter_custom_color : '';
        $hcode_animation_style = ( $hcode_animation_style ) ? ' wow '.$hcode_animation_style : '';
        $hcode_sep_color = ($hcode_sep_color) ? 'background:'.$hcode_sep_color.';' : '';
        $seperator_height = ($seperator_height) ? 'height:'.$seperator_height.';' : '';
        $button_text = ($button_text) ? $button_text : '';
        $hcode_portfolio_columns = ($hcode_portfolio_columns) ? $hcode_portfolio_columns : '';
        $filter_class = $filter_class_style = '';

        $hcode_portfolio_categories_orderby = !empty( $hcode_portfolio_categories_orderby ) ? $hcode_portfolio_categories_orderby : 'id';
        $hcode_portfolio_categories_order = !empty( $hcode_portfolio_categories_order ) ? $hcode_portfolio_categories_order : 'ASC';

        if($hcode_sep_color || $seperator_height):
            $seperator = 'style="'.$hcode_sep_color.$seperator_height.'"';
        endif;

        // Column Padding Settings
        $padding_setting = ( $padding_setting ) ? $padding_setting : '';
        if( $padding_setting ){
            ( $desktop_padding && $desktop_padding != 'custom-desktop-padding' ) ?  $classes_arr[] = $desktop_padding : '';
            ( $ipad_padding && $ipad_padding != 'custom-ipad-padding' ) ? $classes_arr[] = $ipad_padding : '';
            ( $mobile_padding && $mobile_padding != 'custom-mobile-padding' ) ? $classes_arr[] = $mobile_padding : '';
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
            ( $desktop_margin && $desktop_margin != 'custom-desktop-margin' ) ? $classes_arr[] = $desktop_margin : '';
            ( $ipad_margin && $ipad_margin != 'custom-ipad-margin' ) ? $classes_arr[] = $ipad_margin : '';
            ( $mobile_margin && $mobile_margin != 'custom-mobile-margin' ) ? $classes_arr[] = $mobile_margin : '';
            $custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
            $custom_ipad_margin = ( $custom_ipad_margin ) ? $custom_ipad_margin : '';
            $custom_mobile_margin = ( $custom_mobile_margin ) ? $custom_mobile_margin : '';

            ( $custom_desktop_margin && $desktop_margin == 'custom-desktop-margin' ) ? $hcode_featured_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_desktop_margin.' !important; }' : '';
            ( $custom_ipad_margin && $ipad_margin == 'custom-ipad-margin' ) ? $hcode_featured_ipad_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_ipad_margin.' !important;}' : '';
            ( $custom_mobile_margin && $mobile_margin == 'custom-mobile-margin' ) ? $hcode_featured_mobile_array[] = '.'.$hcode_token_class.'{ margin:'.$custom_mobile_margin.' !important;}' : '';
        }

        // no image
        $hcode_options = get_option( 'hcode_theme_setting' );
        $hcode_no_image = (isset($hcode_options['hcode_no_image'])) ? $hcode_options['hcode_no_image'] : '';

        if( is_array( $hcode_no_image ) ) {
            $no_img_lightbox_caption = hcode_option_image_caption( $hcode_no_image['id'] );
            $no_img_lightbox_title = hcode_option_lightbox_image_title( $hcode_no_image['id'] );
            $no_image_lightbox_caption = ( isset($no_img_lightbox_caption['caption']) && !empty($no_img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$no_img_lightbox_caption['caption'].'"' : '' ;
            $no_image_lightbox_title = ( isset($no_img_lightbox_title['title']) && !empty($no_img_lightbox_title['title']) ) ? ' title="'.$no_img_lightbox_title['title'].'"' : '' ;
        }

        switch ($hcode_filter_color) {
            case 'nav-tabs-black':
            case 'nav-tabs-gray':
                    $filter_class = $hcode_filter_color;
                    $filter_class_style = '';
                break;

            case 'custom':
                    $filter_class = '';
                    $filter_class_style .= 'style="color:'.$hcode_filter_custom_color.'"';
                break;
            
            default:
                break;
        }

        switch ($hcode_portfolio_style) {
            case 'grid':
                    $classes .= '';
                    $container_class .= 'container';
                    $no_padding .= '';
                    break;
            case 'grid-gutter':
                     $classes .= 'gutter';
                     $container_class .= 'container';
                     $no_padding .= '';
                     break;
            case 'grid-with-title':
                     $classes .= 'gutter work-with-title';
                     $container_class .= 'container';
                     $no_padding .= '';
                     break;
            case 'wide':
                    $classes .= 'wide';
                    $container_class .= 'container-fluid position-relative';
                    $no_padding .= 'no-padding';
                    break;
            case 'wide-gutter':
                    $classes .= 'gutter wide';
                    $container_class .= 'container-fluid position-relative';
                    $no_padding .= '';
                    break;
            case 'wide-with-title':
                    $classes .= 'gutter work-with-title wide wide-title';
                    $container_class .= 'container-fluid position-relative';
                    $no_padding .= 'no-padding';
                    break;
            case 'masonry':
                    $classes .= 'masonry wide';
                    $container_class .= 'container-fluid position-relative';
                    $no_padding .= 'no-padding';
                    break;
        }
        if( $hcode_portfolio_selection == 'portfolio-tags' ){
            $categories_to_display_ids = explode(",",$hcode_tags_list);
        }else{
            $categories_to_display_ids = explode(",",$hcode_categories_list);
        }
        if ( is_array( $categories_to_display_ids ) && $categories_to_display_ids[0] == '0' ) {
            unset( $categories_to_display_ids[0] );
            $categories_to_display_ids = array_values( $categories_to_display_ids );
        }
        // If no categories are chosen or "All categories", we need to load all available categories
        if ( ! is_array( $categories_to_display_ids ) || count( $categories_to_display_ids ) == 0 ) {
            $terms = get_terms( $hcode_portfolio_selection );
            
            if ( ! is_array( $categories_to_display_ids ) ) {
                $categories_to_display_ids = array();
            }
            foreach ( $terms as $term ) {
                $categories_to_display_ids[] = $term->slug;
            }
        }

        $class_list = implode(" ", $classes_arr);

        if($hcode_show_filter == 1):
            $output .='<div class="col-md-12 text-center">';
                $output .='<div class="text-center">';
                    $output .='<ul '.$id.' class="portfolio-filter nav nav-tabs '.$filter_class.$hcode_animation_style.' '.$hcode_filter_token_class.'">';
                        if( $hcode_portfolio_filter_selection == 'portfolio-tags' ){
                            if( $hcode_show_all_tags_filter == 1 ){
                                $active_class = empty( $hcode_default_tags_selected ) ? ' active ' : '';
                                $output .= '<li class="nav '.$active_class.'"><a href="#" '.$filter_class_style.' class="'.$filter_responsive_class.'" data-uniqueid="'.$hcode_token_class.'" data-filter="*" data-id="'.$portfolio_id.'">'.__( 'All', 'hcode-addons' ).'</a></li>';
                            }
                        } else {
                            if( $hcode_show_all_categories_filter == 1 ){
                                $active_class = empty( $hcode_default_category_selected ) ? ' active ' : '';
                                $output .= '<li class="nav '.$active_class.'"><a href="#" '.$filter_class_style.' class="'.$filter_responsive_class.'" data-uniqueid="'.$hcode_token_class.'" data-filter="*" data-id="'.$portfolio_id.'">'.__( 'All', 'hcode-addons' ).'</a></li>';
                            }
                        }
                    $taxonomy = $hcode_portfolio_selection;
                    $args = array(
                        'orderby' => $hcode_portfolio_categories_orderby,
                        'order' => $hcode_portfolio_categories_order,
                        'hide_empty'        => 0, 
                        'slug'           => $categories_to_display_ids,
                    );
                    $tax_terms = get_terms($taxonomy, $args);
                    foreach ($tax_terms as $tax_term) {
                        if( $hcode_portfolio_filter_selection == 'portfolio-tags' ){
                            $active_class = ( $hcode_default_tags_selected == $tax_term->slug ) ? ' active ' : '';
                        }else{
                            $active_class = ( $hcode_default_category_selected == $tax_term->slug ) ? ' active ' : '';
                        }
                        $output .='<li class="nav '.$active_class.'">
                                    <a href="#" '.$filter_class_style.' class="'.$filter_responsive_class.'" data-uniqueid="'.$hcode_token_class.'" data-filter=".portfolio-filter-'.$tax_term->term_id.'" data-id="'.$portfolio_id.'">'.$tax_term->name.'</a>
                                </li>';
                    }
                    $output .='</ul>';
                $output .='</div>';
            $output .='</div>';
        endif;
        $portfolio_columns = ( $hcode_portfolio_columns ) ? 'work-'.$hcode_portfolio_columns.'col' : '';
        if($hcode_portfolio_columns || $id || $classes || $class):
            $output .='<div '.$id.' class="'.$portfolio_columns.' '.$classes.' '.$class.'">';
        endif;
        
        $output .='<div class="col-md-12 '.$class_list.' grid-gallery overflow-hidden '.$no_padding.' content-section">';
            $output .='<div class="tab-content portfolio-infinite-scroll-pagination">';
                $output .='<ul class="grid masonry-items masonry-portfolio-grid '.$enable_lightbox.' '.$portfolio_id.' '.$hcode_token_class.'" data-portfolio="'.$portfolio_id.'" data-uniqueid="'.$hcode_token_class.'">';
                    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                    $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => $hcode_post_per_page,
                        'tax_query' => array(
                            array(
                                'taxonomy' => $hcode_portfolio_selection,
                                'field' => 'slug',
                                'terms' => $categories_to_display_ids
                           ),
                        ),
                        'paged' => $paged,
                        'orderby' => $orderby,
                        'order' => $order,
                    );
                    $portfolio_posts = new WP_Query( $args );
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $img_lightbox_caption = hcode_option_image_caption( get_post_thumbnail_id() );
                        $img_lightbox_title = hcode_option_lightbox_image_title( get_post_thumbnail_id() );
                        $image_lightbox_caption = ( isset($img_lightbox_caption['caption']) && !empty($img_lightbox_caption['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title = ( isset($img_lightbox_title['title']) && !empty($img_lightbox_title['title']) ) ? ' title="'.$img_lightbox_title['title'].'"' : '' ; 


                        $popup_id = 'portfolio-'.get_the_ID();
                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), $hcode_portfolio_selection );
                        foreach ($cat as $key => $c) {
                            $cat_slug .= 'portfolio-filter-'.$c->term_id." ";
                        }
                        $output .='<li class="'.$cat_slug.'">';
                            $output .='<figure>';
                                $portfolio_image = hcode_post_meta('hcode_image');;
                                $portfolio_gallery = hcode_post_meta('hcode_gallery');
                                $portfolio_link = hcode_post_meta('hcode_link_type');
                                $portfolio_video = hcode_post_meta('hcode_video');
                                $portfolio_subtitle = hcode_post_meta('hcode_subtitle');
                                $hcode_portfolio_post_type = hcode_post_meta( 'hcode_portfolio_post_type' );

                                if( $hcode_portfolio_post_type != "" && ( $hcode_portfolio_post_type == "image" || $hcode_portfolio_post_type == "standard") ){
                                        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

                                        $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

                                        if( has_post_thumbnail( get_the_ID() ) ){
                                            $output .= '<div class="gallery-img">';
                                                if( $enable_lightbox == 'lightbox-gallery' ) {
                                                    $output .= '<a href="'.$full_image_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                } else {
                                                    $output .= '<a href="'.get_permalink().'">';
                                                }
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        } else {
                                            if( esc_url( $hcode_no_image['url'] ) ) {
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery') {
                                                        $output .= '<a href="'.$hcode_no_image['url'].'" class="lightboxgalleryitem" data-group="general"'.$no_image_lightbox_title.$no_image_lightbox_caption.'>';
                                                    } else {
                                                        $output .= '<a href="'.get_permalink().'">';
                                                    }
                                                    $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        }
                                        $output .= '<figcaption>';
                                            if( $hcode_show_title == 1 ){
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<h3 class="'.$title_responsive_class.'"'.$hcode_title_text_color.'>'.get_the_title().'</h3>';
                                                else:
                                                    $output .= '<h3 class="'.$title_responsive_class.'"><a href="'.get_permalink().'"'.$hcode_title_text_color.'>'.get_the_title().'</a></h3>';
                                                endif;
                                            }

                                            if( $portfolio_subtitle && $hcode_show_subtitle == 1 ){
                                                $output .= '<p class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_text_color.'>'.$portfolio_subtitle.'</p>';
                                            }

                                            if( $hcode_show_separator == 1 ) {
                                                $output .= '<div class="separator-line-thick display-block no-margin-bottom" '.$seperator.'></div>';
                                            }
                                            if($hcode_show_button == 1) {
                                                if($enable_lightbox == 'lightbox-gallery') {
                                                    if( $button_text ) {
                                                        $output .='<span class="btn inner-link btn-black btn-small">'.$button_text.'</span>';
                                                    }
                                                } else {
                                                    if( $button_text ) {
                                                        $output .='<a class="btn inner-link btn-black btn-small" href="'.get_permalink().'">'.$button_text.'</a>';
                                                    }
                                                }
                                            }
                                        $output .= '</figcaption>';
                                }else{
                                    if( !empty( $portfolio_gallery ) || ( $hcode_portfolio_post_type != "" && $hcode_portfolio_post_type == "gallery" ) ){

                                        $portfolio_gallery = hcode_post_meta( 'hcode_gallery' );
                                        $gallery = explode( ",", $portfolio_gallery );
                                        $i = 1;
                                        $image = '';

                                        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                                        $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

                                        if( $enable_lightbox == 'lightbox-gallery' ) {
                                            if( has_post_thumbnail( get_the_ID() ) ){
                                                $output .= '<div class="gallery-img">';
                                                    $output .= '<a href="'.$full_image_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                        $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            } else {
                                                if( esc_url( $hcode_no_image['url'] ) ) {
                                                    $output .= '<div class="gallery-img">';
                                                        if( $enable_lightbox == 'lightbox-gallery' ) {
                                                            $output .= '<a href="'.$hcode_no_image['url'].'" class="lightboxgalleryitem" data-group="general"'.$no_image_lightbox_title.$no_image_lightbox_caption.'>';
                                                        } else {
                                                            $output .= '<a href="'.get_permalink().'">';
                                                        }
                                                        $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                        $output .= '</a>';
                                                    $output .= '</div>';
                                                }
                                            }

                                        } else {

                                            if( is_array( $gallery ) ) {
                                                foreach ($gallery as $k => $value) {

                                                    $img_lightbox_caption_gallery = hcode_option_image_caption($value);
                                                    $img_lightbox_title_gallery = hcode_option_lightbox_image_title($value);                                                    
                                                    $image_lightbox_caption_gallery = ( isset($img_lightbox_caption_gallery['caption']) && !empty($img_lightbox_caption_gallery['caption']) ) ? ' lightbox_caption="'.$img_lightbox_caption_gallery['caption'].'"' : '' ;
                                                    $image_lightbox_title_gallery = ( isset($img_lightbox_title_gallery['title']) && !empty($img_lightbox_title_gallery['title']) ) ? ' title="'.$img_lightbox_title_gallery['title'].'"' : '' ; 

                                                    $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                                                    $full_image_gallery = wp_get_attachment_image_src( $value, 'full' );

                                                    if( $i == 1 ) {
                                                        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                                                        $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                                        if( has_post_thumbnail( get_the_ID() ) ){
                                                            $image .='<a '.$image_lightbox_title.$image_lightbox_caption.' href="'.$full_image_url[0].'" class="lightboxgalleryitem" data-group="'.$popup_id.'">';
                                                                $image .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                                            $image .= '</a>';

                                                            if( esc_url( $full_image_gallery[0] ) ) {
                                                                $image .= '<a href="'.$full_image_gallery[0].'" '.$image_lightbox_title_gallery.$image_lightbox_caption_gallery.' class="lightboxgalleryitem" data-group="'.$popup_id.'"></a>';
                                                            }
                                                        }else {
                                                            if( esc_url( $hcode_no_image['url'] ) ) {
                                                                $image .= '<a href="'.$hcode_no_image['url'].'" width="900" height="600" class="lightboxgalleryitem" data-group="'.$popup_id.'">';
                                                                    $image .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                                $image .= '</a>';
                                                                if( esc_url( $full_image_gallery[0] ) ) {
                                                                    $image .= '<a href="'.$full_image_gallery[0].'" '.$image_lightbox_title_gallery.$image_lightbox_caption_gallery.' class="lightboxgalleryitem" data-group="'.$popup_id.'"></a>';
                                                                }
                                                            } else {
                                                                $image .= '<a href="'.$full_image_gallery[0].'" '.$image_lightbox_title_gallery.$image_lightbox_caption_gallery.' class="lightboxgalleryitem" data-group="'.$popup_id.'">';
                                                                    $image .= wp_get_attachment_image( $value, $hcode_image_srcset );
                                                                $image .= '</a>';
                                                            }
                                                        }
                                                    } else {
                                                        if( esc_url( $full_image_gallery[0] ) ) {
                                                            $image .= '<a href="'.$full_image_gallery[0].'" '.$image_lightbox_title_gallery.$image_lightbox_caption_gallery.' class="lightboxgalleryitem" data-group="'.$popup_id.'"></a>';
                                                        }
                                                    }
                                                    $i++;
                                                }
                                            }
                                            $output .= '<div class="gallery-img lightbox-gallery">';
                                                $output .= $image;
                                            $output .= '</div>';
                                        }

                                        $output .= '<figcaption>';
                                            if( $hcode_show_title == 1 ){
                                                if( $enable_lightbox == 'lightbox-gallery' ) {
                                                    $output .= '<h3 class="'.$title_responsive_class.'"'.$hcode_title_text_color.'>'.get_the_title().'</h3>';
                                                } else {
                                                    $output .= '<h3 class="'.$title_responsive_class.'"><a class="parent-gallery-popup" href="javascript:void(0);"'.$hcode_title_text_color.'>'.get_the_title().'</a></h3>';
                                                }
                                            }

                                            if( $portfolio_subtitle && $hcode_show_subtitle == 1 ) {
                                                $output .= '<p class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_text_color.'>'.$portfolio_subtitle.'</p>';
                                            }

                                            if($hcode_show_separator == 1) {
                                                $output .= '<div class="separator-line-thick display-block no-margin-bottom" '.$seperator.'></div>';
                                            }

                                            if( $hcode_show_button == 1 ) {
                                                if( $enable_lightbox == 'lightbox-gallery' ) {
                                                    if( $button_text ) {
                                                        $output .='<span class="btn inner-link btn-black btn-small">'.$button_text.'</span>';
                                                    }
                                                } else {
                                                    if( $button_text ) {
                                                        $output .='<a class="btn inner-link btn-black btn-small parent-gallery-popup" href="javascript:void(0);">'.$button_text.'</a>';
                                                    }
                                                }
                                            }
                                        $output .= '</figcaption>';
                                    }
                                    elseif(!empty($portfolio_video) || ( $hcode_portfolio_post_type != "" && $hcode_portfolio_post_type == "video" ) ){

                                        $video_url = hcode_post_meta('hcode_video');
                                        $show_lightbox_popup = hcode_post_meta('hcode_show_lightbox_popup');

                                        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';

                                        $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                        
                                        $output .= '<div class="gallery-img">';
                                            if( $enable_lightbox == 'lightbox-gallery' ) {
                                                if( has_post_thumbnail( get_the_ID() ) ){
                                                    $output .= '<a href="'.$full_image_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                } else {
                                                    if( esc_url( $hcode_no_image['url'] ) ) {
                                                        $output .= '<a href="'.$hcode_no_image['url'].'" class="lightboxgalleryitem" data-group="general"'.$no_image_lightbox_title.$no_image_lightbox_caption.'>';
                                                    }
                                                }
                                            } else {
                                                if( $video_url && $show_lightbox_popup != 'no' ) { 
                                                    $output .= '<a class="popup-vimeo" href="'.$video_url.'">';
                                                } else {
                                                    $output .= '<a class="no-popup-vimeo" href="'.get_permalink().'">';
                                                }
                                            }
                                            if( has_post_thumbnail( get_the_ID() ) ){
                                                $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                            } else {
                                                if( esc_url( $hcode_no_image['url'] ) ) {
                                                    $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                }
                                            }
                                        $output .= '</a></div>';

                                        $output .= '<figcaption>';
                                            if( $hcode_show_title == 1 ){
                                                if( $enable_lightbox == 'lightbox-gallery' ){
                                                    $output .= '<h3 class="'.$title_responsive_class.'"'.$hcode_title_text_color.'>'.get_the_title().'</h3>';
                                                } else {
                                                    if( $video_url && $show_lightbox_popup != 'no' ) {
                                                        $output .= '<h3 class="'.$title_responsive_class.'"><a class="popup-vimeo" href="'.$video_url.'"'.$hcode_title_text_color.'>'.get_the_title().'</a></h3>';
                                                    } else {
                                                        $output .= '<h3 class="'.$title_responsive_class.'"><a class="no-popup-vimeo" href="'.get_permalink().'"'.$hcode_title_text_color.'>'.get_the_title().'</a></h3>';
                                                    }
                                                }
                                            }

                                            if( $portfolio_subtitle && $hcode_show_subtitle == 1 ) {
                                                $output .= '<p class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_text_color.'>'.$portfolio_subtitle.'</p>';
                                            }

                                            if($hcode_show_separator == 1){
                                                $output .= '<div class="separator-line-thick display-block no-margin-bottom" '.$seperator.'></div>';
                                            }

                                            if( $hcode_show_button == 1 ) {
                                                if( $enable_lightbox == 'lightbox-gallery' ) {
                                                    if( $button_text ) {
                                                        $output .='<span class="btn inner-link btn-black btn-small">'.$button_text.'</span>';
                                                    }
                                                } else {
                                                    if( $button_text ) {
                                                        if( $video_url && $show_lightbox_popup != 'no' ) {
                                                            $output .='<a class="btn inner-link btn-black btn-small popup-vimeo" href="'.$video_url.'">'.$button_text.'</a>';
                                                        } else {
                                                            $output .='<a class="btn inner-link btn-black btn-small popup-vimeo" href="'.get_permalink().'">'.$button_text.'</a>';
                                                        }
                                                    }
                                                } 
                                            }
                                        $output .= '</figcaption>'; 
                                    }
                                    elseif(!empty($portfolio_link) || ( $hcode_portfolio_post_type != "" && $hcode_portfolio_post_type == "link" )){
                                       
                                        $link_url = hcode_post_meta('hcode_link');
                                        $link_type = hcode_post_meta('hcode_link_type');
                                        $hcode_link_target = hcode_post_meta('hcode_link_target');
                                        $ajax_popup_class = $link = $icon = $link_target = '';

                                        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                                        $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

                                        switch ($link_type) {
                                            case 'external':
                                                $ajax_popup_class .= '';
                                                $link .= $link_url;
                                                $link_target .= ' target="'.$hcode_link_target.'"';
                                                break;

                                            case 'ajax-popup':
                                                $ajax_popup_class .= 'simple-ajax-popup-align-top';
                                                $link .= $link_url;
                                                break;
                                        }
                                        $output .= '<div class="gallery-img">';
                                            if( $enable_lightbox == 'lightbox-gallery' ) {
                                                if( has_post_thumbnail( get_the_ID() ) ){
                                                    $output .= '<a href="'.$full_image_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                } else {
                                                    if( esc_url( $hcode_no_image['url'] ) ) {
                                                        $output .= '<a href="'.$hcode_no_image['url'].'" class="lightboxgalleryitem" data-group="general"'.$no_image_lightbox_title.$no_image_lightbox_caption.'>';
                                                    }
                                                }
                                            } else {
                                                $output .= '<a href="'.$link.'" class="'.$ajax_popup_class.'"'.$link_target.'>';
                                            }
                                                if( has_post_thumbnail( get_the_ID() ) ){
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                                } else {
                                                    if( esc_url( $hcode_no_image['url'] ) ) {
                                                        $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                    }
                                                }
                                            $output .= '</a>';
                                        $output .= '</div>';


                                        $output .= '<figcaption>';

                                            if( $hcode_show_title == 1 ){
                                                if( $enable_lightbox == 'lightbox-gallery' ) {
                                                    $output .= '<h3 class="'.$title_responsive_class.'"'.$hcode_title_text_color.'>'.get_the_title().'</h3>';
                                                } else{
                                                    $output .= '<h3 class="'.$title_responsive_class.'"><a href="'.$link.'" class="'.$ajax_popup_class.'"'.$link_target.$hcode_title_text_color.'>'.get_the_title().'</a></h3>';
                                                }
                                            }

                                            if( $portfolio_subtitle && $hcode_show_subtitle == 1 ){
                                                $output .= '<p class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_text_color.'>'.$portfolio_subtitle.'</p>';
                                            }
                                            
                                            if($hcode_show_separator == 1) {
                                                $output .= '<div class="separator-line-thick display-block no-margin-bottom" '.$seperator.'></div>';
                                            }

                                            if( $hcode_show_button == 1 ){
                                                if( $enable_lightbox == 'lightbox-gallery' ) {
                                                    if( $button_text ) {
                                                        $output .='<span class="btn inner-link btn-black btn-small">'.$button_text.'</span>';
                                                    }
                                                } else {
                                                    if( $button_text ) {
                                                        $output .='<a class="'.$ajax_popup_class.' btn inner-link btn-black btn-small" href="'.$link.'"'.$link_target.'>'.$button_text.'</a>';
                                                    }
                                                }
                                            }
                                        $output .= '</figcaption>';
                                    } else {
                                        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
                                        $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

                                        if( has_post_thumbnail( get_the_ID() ) ){
                                            $output .= '<div class="gallery-img">';
                                                if( $enable_lightbox == 'lightbox-gallery' ) {
                                                    $output .= '<a href="'.$full_image_url[0].'" '.$image_lightbox_title.$image_lightbox_caption.' class="lightboxgalleryitem" data-group="general">';
                                                } else {
                                                    $output .= '<a href="'.get_permalink().'">';
                                                }
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                                $output .= '</a>';
                                            $output .= '</div>';
                                        } else {
                                            if( esc_url( $hcode_no_image['url'] ) ) {
                                                $output .= '<div class="gallery-img">';
                                                    if($enable_lightbox == 'lightbox-gallery') {
                                                        $output .= '<a href="'.$hcode_no_image['url'].'" class="lightboxgalleryitem" data-group="general"'.$no_image_lightbox_title.$no_image_lightbox_caption.'>';
                                                    } else {
                                                        $output .= '<a href="'.get_permalink().'">';
                                                    }
                                                    $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                    $output .= '</a>';
                                                $output .= '</div>';
                                            }
                                        }
                                        $output .= '<figcaption>';
                                            if( $hcode_show_title == 1 ){
                                                if($enable_lightbox == 'lightbox-gallery'):
                                                    $output .= '<h3 class="'.$title_responsive_class.'"'.$hcode_title_text_color.'>'.get_the_title().'</h3>';
                                                else:
                                                    $output .= '<h3 class="'.$title_responsive_class.'"><a href="'.get_permalink().'"'.$hcode_title_text_color.'>'.get_the_title().'</a></h3>';
                                                endif;
                                            }

                                            if( $portfolio_subtitle && $hcode_show_subtitle == 1 ){
                                                $output .= '<p class="'.$subtitle_responsive_class.'"'.$hcode_subtitle_text_color.'>'.$portfolio_subtitle.'</p>';
                                            }

                                            if( $hcode_show_separator == 1 ) {
                                                $output .= '<div class="separator-line-thick display-block no-margin-bottom" '.$seperator.'></div>';
                                            }
                                            if($hcode_show_button == 1) {
                                                if($enable_lightbox == 'lightbox-gallery') {
                                                    if( $button_text ) {
                                                        $output .='<span class="btn inner-link btn-black btn-small">'.$button_text.'</span>';
                                                    }
                                                } else {
                                                    if( $button_text ) {
                                                        $output .='<a class="btn inner-link btn-black btn-small" href="'.get_permalink().'">'.$button_text.'</a>';
                                                    }
                                                }
                                            }
                                        $output .= '</figcaption>';
                                    }
                                }
                            $output .='</figure>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
                if( $portfolio_posts->max_num_pages > 1 && $hcode_show_infinite_pagination == 1 && ( $hcode_show_all_categories_filter == 1 || $hcode_show_all_categories_filter == '')) {
                     $output .='<div class="pagination hcode-portfolio-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                        ob_start();
                            if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                                next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hcode-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $portfolio_posts->max_num_pages );
                            endif;
                        $output .= ob_get_contents();  
                        ob_end_clean();  
                    $output .='</div>';
                }
            $output .='</div>';
        $output .='</div>';
        if($hcode_portfolio_columns || $id || $classes || $class):
            $output .='</div>';
        endif;
        return $output;
    }
}
add_shortcode( 'hcode_portfolio', 'hcode_portfolio_shortcode' );