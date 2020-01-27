<?php
/**
 * Shortcode For Blog
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blog */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_blog_shortcode' ) ) {
    function hcode_blog_shortcode( $atts, $content = '') {
        global $general, $post, $hcode_posts_srcset;
        $output = $desktop_classes = $ipad_classes = '';
        $m=1;
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_blog_premade_style' => 'grid',
            'hcode_blog_columns' => '3',
            'hcode_animation_style' => '',
            'hcode_post_per_page' => '',
            'hcode_categories_list' =>'',
            'hcode_show_white_bg' => '',
            'hcode_show_post_title' => '',
            'hcode_show_thumbnail' => '',
            'hcode_show_post_feature_image' => '',
            'hcode_show_post_number' => '1',
            'hcode_show_separator' => '1',
            'hcode_show_author_name' => '',
            'hcode_show_date' => '',
            'hcode_date_format' => 'd m Y',
            'hcode_show_categories' => '',
            'hcode_show_excerpt' => '1',
            'hcode_excerpt_length' => '55',
            'hcode_show_content' => '1',
            'hcode_show_like' => '',
            'hcode_show_comment' => '',
            'hcode_show_continue_button' => '',
            'hcode_button_config' => '',
            'hcode_column_animation_style' => '',
            'orderby' => 'date',
            'order' => 'DESC',
            'hcode_show_pagination' => '1',
            'hcode_pagination_style' => 'number-pagination',
            'hcode_image_srcset' => 'full',
            'hcode_background_color' => '',
            'hcode_title_color' => '',
            'hcode_meta_color' => '',
            'hcode_excerpt_color' => '',
            'hcode_like_comment_color' => '',
            'hcode_separator_color' => '',
            'button_settings' => '',
        ), $atts ) );
       
        global $hcode_featured_array, $hcode_blog_token, $hcode_button;
        $class_column = $layout_class = $premade_style_class = $hcode_column_duration = '';
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class_main = ( $class ) ? ' '.$class : '';
        $hcode_blog_columns = ( $hcode_blog_columns ) ? $hcode_blog_columns : '3';
        $hcode_animation_style = ( $hcode_animation_style ) ? ' wow '.$hcode_animation_style : '';
        $hcode_post_per_page = ( $hcode_post_per_page ) ? $hcode_post_per_page : '';
        $hcode_categories_list = ( $hcode_categories_list ) ? $hcode_categories_list : '';
        $hcode_button_config = ( $hcode_button_config ) ? $hcode_button_config : '';
        $hcode_show_white_bg = ($hcode_show_white_bg == 1) ? ' blog-grid-listing' : ''; 

        $hcode_show_post_feature_image = ($hcode_show_post_feature_image) ? $hcode_show_post_feature_image : '0';

        $hcode_image_srcset  = !empty($hcode_image_srcset) ? $hcode_image_srcset : 'full';
        $hcode_posts_srcset = $hcode_image_srcset;

        $hcode_blog_token = !empty( $hcode_blog_token ) ? $hcode_blog_token : 0;
        $hcode_blog_token = $hcode_blog_token + 1;
        $hcode_token_class = 'hcode-blog-'.$hcode_blog_token;

        !empty( $hcode_background_color ) ? $hcode_featured_array[] = '.blog-grid-listing .'.$hcode_token_class.'.blog-details, .blog-grid-listing .'.$hcode_token_class.' .blog-details { background: '.$hcode_background_color.'}' : '';
        !empty( $hcode_title_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' .entry-title, .'.$hcode_token_class.' .entry-title a { color: '.$hcode_title_color.'}' : '';
        !empty( $hcode_meta_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' .blog-date, .'.$hcode_token_class.' .blog-date a, .'.$hcode_token_class.' .hcode-date-author-box, .'.$hcode_token_class.' .hcode-date-author-box .blog-date-right, .'.$hcode_token_class.' .hcode-date-author-box a, .'.$hcode_token_class.' .post-author, .'.$hcode_token_class.' .post-author a { color: '.$hcode_meta_color.'}' : '';
        !empty( $hcode_excerpt_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' .hcode-blog-excerpt, .'.$hcode_token_class.' .hcode-blog-excerpt p { color: '.$hcode_excerpt_color.'}' : '';
        !empty( $hcode_like_comment_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' .hcode-comment-likes, .'.$hcode_token_class.' .hcode-comment-likes a, .'.$hcode_token_class.' .hcode-comment-likes i { color: '.$hcode_like_comment_color.' !important }' : '';
        !empty( $hcode_separator_color ) ? $hcode_featured_array[] = '.'.$hcode_token_class.' .hcode-blog-separator { background: '.$hcode_separator_color.'}' : '';

        $responsive_id='';
        if( !empty( $button_settings) ) {
            $hcode_button = !empty( $hcode_button ) ? $hcode_button : 0;
            $hcode_button = $hcode_button + 1;
            $responsive_id = 'hcode-button-'.$hcode_button ;
            $responsive_style = Hcode_Font_Color_Settings::generate_css( $button_settings, $responsive_id );
        } 
        (!empty( $responsive_style)) ? $hcode_featured_array[] = $responsive_style : '';

        if( empty( $hcode_blog_premade_style ) ) {
            return;
        }

        switch ($hcode_blog_columns) {
            case '2':
                $class_column .= 'col-md-6 col-sm-6 col-xs-12';
            break;
            case '3':
                $class_column .= 'col-md-4 col-sm-6 col-xs-12';
            break;
            case '4':
                $class_column .= 'col-md-3 col-sm-6 col-xs-12';
            break;
            default :
                $class_column .= 'col-md-4 col-sm-6 col-xs-12';
            break;
        }

        /* H-Code V1.8 Add pagination style */
        $infinite_scroll_main_class = '';
        $hcode_show_pagination = ( $hcode_show_pagination ) ? $hcode_show_pagination : '' ;
        $hcode_pagination_style = ( $hcode_pagination_style ) ? $hcode_pagination_style : '';

        if( $hcode_show_pagination == 1 ) {
            switch( $hcode_pagination_style ) {
                case 'infinite-scroll-pagination':
                    $infinite_scroll_main_class = ' infinite-scroll-pagination';
                break;
                default:
                    $infinite_scroll_main_class = '';
                break;
            }
        }

        $cat_id = array();
        $category = explode(",",$hcode_categories_list);
        $hcode_options = get_option( 'hcode_theme_setting' );
        $hcode_no_image = (isset($hcode_options['hcode_no_image'])) ? $hcode_options['hcode_no_image'] : '';
        switch ($hcode_blog_premade_style) {
            case 'grid':
                $blog_columns = ( $hcode_blog_columns ) ? 'blog-'.$hcode_blog_columns.'col product-'.$hcode_blog_columns : '';
                if($id || $hcode_blog_columns || $class_main || $hcode_show_white_bg || $infinite_scroll_main_class ):
                   $output .='<div'.$id.' class="'.$blog_columns.$class_main.$hcode_show_white_bg.$infinite_scroll_main_class.'">';
                endif;
                    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                    $args = array('post_type' => 'post',
                        'posts_per_page' => $hcode_post_per_page,
                        'category_name' => $hcode_categories_list,
                        'orderby' => $orderby,
                        'order' => $order,
                        'paged' => $paged,
                     );
                    $query = new WP_Query( $args );
                    while ( $query->have_posts() ) : $query->the_post();

                    // Added in H-Code v1.8
                    $hcode_post_class_list = array();
                    if( $hcode_show_pagination == 1 ) {
                        if( $hcode_pagination_style == 'infinite-scroll-pagination' ) {
                            $hcode_post_class_list[] = 'blog-single-post';
                        }
                    }

                    $hcode_post_classes = '';
                    ob_start();
                        post_class( $hcode_post_class_list );
                        $hcode_post_classes .= ob_get_contents();
                    ob_end_clean();

                    $post_cat = array();
                    $categories = get_the_category();
                    foreach ($categories as $k => $cat) {
                        $cat_link = get_category_link($cat->cat_ID);
                        $post_cat[]='<a href="'.$cat_link.'" rel="category tag">'.$cat->name.'</a>';
                    }
                    $post_category=implode(", ",$post_cat);
                    
                    $hcode_show_author = ( $hcode_show_author_name == 1 ) ? esc_html__('Posted by ','hcode-addons'). '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span> | ' : '';
                    $show_date = ( $hcode_show_date == 1 ) ? '<span class="published">'.get_the_date( $hcode_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $hcode_date_format ).'</time>' : '';
                    $hcode_categories_list = ( $hcode_categories_list ) ? $post_cat : '';
                    $show_like = ( $hcode_show_like == 1 ) ? get_simple_likes_button( get_the_ID() ) : '';                      
                    $show_categories = ($hcode_show_categories == 1) ? '| '.$post_category : '';

                    if(empty($hcode_blog_columns)){
                        $j = 300 * $m;
                        $m++;
                    }
                    elseif($m > $hcode_blog_columns || $m == 1){
                        $j = 300;
                        $m = 2;
                    }elseif($m <= $hcode_blog_columns){
                        $j = 300 * $m;
                        $m++;
                    }
                    if($hcode_animation_style):
                        $hcode_column_duration = ' data-wow-duration="'.$j.'ms"';
                    endif; 
                    $output .= '<div '.$hcode_post_classes.'>';
                        $output .='<div class="'.$class_column.' blog-listing '.$hcode_animation_style.'" '.$hcode_column_duration.'>';
                            if($hcode_show_thumbnail == 1){
                                $blog_quote = hcode_post_meta('hcode_quote');
                                $blog_image = hcode_post_meta('hcode_image');
                                $blog_gallery = hcode_post_meta('hcode_gallery');
                                $blog_video = hcode_post_meta('hcode_video_type');
                                $post_format = get_post_format(); 

                                if( $post_format == 'image' && $hcode_show_post_feature_image != 1 ) {
                                    $output .='<div class="blog-post">';
                                    ob_start();
                                        include HCODE_ADDONS_ROOT . '/loop/loop-image.php';
                                    $output .= ob_get_contents();  
                                    ob_end_clean();  
                                } elseif( $post_format == 'gallery' && $hcode_show_post_feature_image != 1 ) {
                                    $output .='<div class="blog-post blog-post-gallery">';
                                    ob_start();
                                        include HCODE_ADDONS_ROOT . '/loop/loop-gallery.php';
                                    $output .= ob_get_contents();  
                                    ob_end_clean();
                                } elseif( $post_format == 'video' && $hcode_show_post_feature_image != 1 ) {
                                    $output .='<div class="blog-post blog-post-video">';
                                    ob_start();
                                        include HCODE_ADDONS_ROOT . '/loop/loop-video.php';
                                    $output .= ob_get_contents();  
                                    ob_end_clean();  
                                } elseif( $post_format == 'quote' && $hcode_show_post_feature_image != 1 ) {
                                    $output .='<div class="blog-post">';
                                    ob_start();
                                        include HCODE_ADDONS_ROOT . '/loop/loop-quote.php';
                                    $output .= ob_get_contents();  
                                    ob_end_clean();  
                                } else {
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
                            }
                            $output .='<div class="blog-details '.$hcode_token_class.'">';
                                if($hcode_show_author || $show_date || $show_categories):
                                    $output .='<div class="blog-date">'.$hcode_show_author.$show_date.$show_categories.'</div>';
                                endif;
                                if($hcode_show_post_title == 1){
                                    $output .='<div class="blog-title entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
                                }
                                if($hcode_show_excerpt == 1):
                                    $show_excerpt = ( $hcode_excerpt_length ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));
                                    $output .='<div class="hcode-blog-excerpt blog-short-description entry-content">'.$show_excerpt.'</div>';
                                elseif($hcode_show_content == 1):
                                    $show_content = apply_filters( 'the_content', $post->post_content );
                                    $output .='<div class="blog-short-description entry-content">'.$show_content.'</div>';
                                endif;
                                if($hcode_show_separator == 1) {
                                    $output .='<div class="hcode-blog-separator separator-line bg-black no-margin-lr"></div>';
                                }
                                if($show_like || $hcode_show_comment):
                                    $output .='<div class="hcode-comment-likes">'.$show_like;
                                        if( $hcode_show_comment == 1 && (comments_open() || get_comments_number())){
                                            ob_start();
                                                comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'hcode-addons' ), 'comment' );
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        }
                                    $output .= '</div>';
                                endif;
                                if( $hcode_show_continue_button == 1 ) {
                                    if( $hcode_button_config ) {
                                        $output .='<a class="highlight-button btn btn-small xs-no-margin-bottom '.$responsive_id.'" href="'.get_permalink().'">'.$hcode_button_config.'</a>';
                                    }
                                }
                            $output .='</div>';
                        if($hcode_show_thumbnail == 1):
                            $output .='</div>';
                        endif;
                        $output .='</div>';
                    $output .='</div>';
                endwhile;
                wp_reset_postdata();
                if( $hcode_show_pagination == 1 ) {
                    if( $query->max_num_pages > 1 ) {

                        if( $hcode_pagination_style == 'infinite-scroll-pagination'  ) {

                            $output .='<div class="pagination hcode-infinite-scroll display-none" data-pagination="'.$query->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $query->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hcode-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $query->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';

                        } else {
                            if( $query->query_vars['paged'] > 1 ) {
                                $current = $query->query_vars['paged'];
                            } else {
                                $current = 1;
                            }
                            $output .='<div class="pagination pull-left">';
                                $output .= paginate_links( array(
                                    'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                    'format'       => '',
                                    'add_args'     => '',
                                    'current'      => $current,
                                    'total'        => $query->max_num_pages,
                                    'prev_text'    => '<img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                                    'next_text'    => '<img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                                    'type'         => 'plain',
                                    'end_size'     => 3,
                                    'mid_size'     => 3
                                ) );
                            $output .='</div>';
                        }
                    }
                }

                if( $id || $blog_columns || $class_main || $hcode_show_white_bg || $infinite_scroll_main_class ):  
                    $output .='</div>';
                endif;
            break;
            case 'masonry':
                $blog_columns = ( $hcode_blog_columns ) ? 'blog-masonry-'.$hcode_blog_columns.'col ' : '';
                $output .='<div'.$id.' class="blog-masonry '.$blog_columns.' '.$class_main.$hcode_show_white_bg.$infinite_scroll_main_class.'">';
                    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                    $args = array('post_type' => 'post',
                        'posts_per_page' => $hcode_post_per_page,
                        'category_name' => $hcode_categories_list,
                        'orderby' => $orderby,
                        'order' => $order,
                        'paged' => $paged,
                     );
                    $query = new WP_Query( $args );
                    while ( $query->have_posts() ) : $query->the_post();

                        // Added in H-Code v1.8
                        $hcode_post_class_list = array();
                        if( $hcode_show_pagination == 1 ) {
                            if( $hcode_pagination_style == 'infinite-scroll-pagination' ) {
                                $hcode_post_class_list[] = 'blog-single-post';
                            }
                        }

                        $hcode_post_classes = '';
                        ob_start();
                            post_class( $hcode_post_class_list );
                            $hcode_post_classes .= ob_get_contents();
                        ob_end_clean();

                        $post_cat = array();
                        $categories = get_the_category();
                        foreach ($categories as $k => $cat) {
                            $cat_link = get_category_link($cat->cat_ID);
                            $post_cat[]='<a href="'.$cat_link.'" rel="category tag">'.$cat->name.'</a>';
                        }
                        $post_category=implode(", ",$post_cat);

                        if(empty($hcode_blog_columns)){
                                $j = 300 * $m;
                                $m++;
                        }elseif($m > $hcode_blog_columns || $m == 1){
                            $j = 300;
                            $m = 2;
                        }elseif($m <= $hcode_blog_columns){
                            $j = 300 * $m;
                            $m++;
                        }
                        if($hcode_animation_style):
                            $hcode_column_duration = ' data-wow-duration="'.$j.'ms"';
                        endif;
                        $hcode_show_author = ( $hcode_show_author_name == 1 ) ? esc_html__('Posted by ','hcode-addons'). '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span> | ' : '';
                        $show_date = ( $hcode_show_date == 1 ) ? '<span class="published">'.get_the_date( $hcode_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $hcode_date_format ).'</time>' : '';
                        $hcode_categories_list = ( $hcode_categories_list ) ? $post_cat : '';
                        $show_like = ( $hcode_show_like == 1 ) ? get_simple_likes_button( get_the_ID() ) : '';
                        $show_categories = ($hcode_show_categories == 1) ? '| '.$post_category : '';

                        $output .= '<div '.$hcode_post_classes.'>';
                            $output .='<div class="'.$class_column.' blog-listing '.$hcode_animation_style.'" '.$hcode_column_duration.'>';
                                if($hcode_show_thumbnail == 1){
                                    $blog_quote = hcode_post_meta('hcode_quote');
                                    $blog_image = hcode_post_meta('hcode_image');
                                    $blog_gallery = hcode_post_meta('hcode_gallery');
                                    $blog_link = hcode_post_meta('hcode_link');
                                    $blog_video = hcode_post_meta('hcode_video_type');
                                    $post_format = get_post_format();

                                    if( $post_format == 'image' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post">';
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-image.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    } elseif( $post_format == 'gallery' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post blog-post-gallery">';
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-gallery.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();
                                    } elseif( $post_format == 'video' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post blog-post-video">';
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-video.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    } elseif( $post_format == 'quote' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post">';
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-quote.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    } else {
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
                                }
                                $output .='<div class="blog-details '.$hcode_token_class.'">';
                                    if($hcode_show_author || $show_date || $show_categories):
                                        $output .='<div class="blog-date">'.$hcode_show_author.$show_date.$show_categories.' </div>';
                                    endif;
                                    if($hcode_show_post_title == 1){
                                        $output .='<div class="blog-title entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
                                    }
                                    if($hcode_show_excerpt == 1):
                                        $show_excerpt = ( $hcode_excerpt_length ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));
                                        $output .='<div class="hcode-blog-excerpt blog-short-description entry-content">'.$show_excerpt.'</div>';
                                    elseif($hcode_show_content == 1):
                                        $show_content = apply_filters( 'the_content', $post->post_content );
                                        $output .='<div class="blog-short-description entry-content">'.$show_content.'</div>';
                                    endif;
                                    if($hcode_show_separator == 1) {
                                        $output .='<div class="hcode-blog-separator separator-line bg-black no-margin-lr"></div>';
                                    }
                                    if($show_like || $hcode_show_comment):
                                        $output .='<div class="hcode-comment-likes">'.$show_like;
                                        if( $hcode_show_comment == 1 && (comments_open() || get_comments_number())){
                                            ob_start();
                                                comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'hcode-addons' ), 'comment' );
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        }
                                        $output .= '</div>';
                                    endif;
                                    if( $hcode_show_continue_button == 1 ) {
                                        if( $hcode_button_config ) {
                                            $output .='<a class="highlight-button btn btn-small xs-no-margin-bottom '.$responsive_id.'" href="'.get_permalink().'">'.$hcode_button_config.'</a>';
                                        }
                                    }
                                $output .='</div>';
                            if($hcode_show_thumbnail == 1):
                                $output .='</div>';
                            endif;
                            $output .='</div>';
                        $output .='</div>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</div>';
                if( $hcode_show_pagination == 1 ) {
                    if( $query->max_num_pages > 1 ) {

                        if( $hcode_pagination_style == 'infinite-scroll-pagination'  ) {
                            $output .='<div class="pagination hcode-infinite-scroll display-none" data-pagination="'.$query->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $query->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hcode-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $query->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';

                        } else {
                            if( $query->query_vars['paged'] > 1 ) {
                                $current = $query->query_vars['paged'];
                            } else {
                                $current = 1;
                            }
                            $output .='<div class="pagination pull-left">';
                                $output .= paginate_links( array(
                                    'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                    'format'       => '',
                                    'add_args'     => '',
                                    'current'      => $current,
                                    'total'        => $query->max_num_pages,
                                    'prev_text'    => '<img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                                    'next_text'    => '<img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                                    'type'         => 'plain',
                                    'end_size'     => 3,
                                    'mid_size'     => 3
                                ) );
                            $output .='</div>';
                        }
                    }
                }
            break;
            case 'classic':
                if( $id || $class_main || $hcode_show_white_bg || $infinite_scroll_main_class ):
                   $output .= '<div'.$id.' class="'.$class_main.$hcode_show_white_bg.$infinite_scroll_main_class.'">';
                endif;
                   if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                    $args = array('post_type' => 'post',
                        'posts_per_page' => $hcode_post_per_page,
                        'category_name' => $hcode_categories_list,
                        'orderby' => $orderby,
                        'order' => $order,
                        'paged' => $paged,
                     );
                    $query = new WP_Query( $args );
                    while ( $query->have_posts() ) : $query->the_post();
                        
                        // Added in H-Code v1.8
                        $hcode_post_class_list = array();
                        if( $hcode_show_pagination == 1 ) {
                            if( $hcode_pagination_style == 'infinite-scroll-pagination' ) {
                                $hcode_post_class_list[] = 'blog-single-post';
                            }
                        }

                        $hcode_post_classes = '';
                        ob_start();
                            post_class( $hcode_post_class_list );
                            $hcode_post_classes .= ob_get_contents();
                        ob_end_clean();

                        $post_cat = array();
                        $categories = get_the_category();
                        foreach ($categories as $k => $cat) {
                            $cat_link = get_category_link($cat->cat_ID);
                            $post_cat[]='<a href="'.$cat_link.'" rel="category tag">'.$cat->name.'</a>';
                        }
                        $post_category=implode(", ",$post_cat);

                        $hcode_show_author = ( $hcode_show_author_name == 1 ) ? esc_html__('Posted by ','hcode-addons'). '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span> | ' : '';
                        $show_date = ( $hcode_show_date == 1 ) ? '<span class="published">'.get_the_date( $hcode_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $hcode_date_format ).'</time>' : '';
                        $show_categories = ($hcode_show_categories == 1) ? ' | '.$post_category : '';
                        $show_like = ( $hcode_show_like == 1 ) ? get_simple_likes_button( get_the_ID() ) : '';

                        if($m == 1){
                            $j = 300;
                            $m = 2;
                        }else{
                            $j = 300 * $m;
                            $m++;
                        }
                        if($hcode_animation_style):
                            $hcode_column_duration = ' data-wow-duration="'.$j.'ms"';
                        endif;
                        $output .= '<div '.$hcode_post_classes.'>';
                            $output .='<div class="blog-listing blog-listing-classic '.$hcode_animation_style.'" '.$hcode_column_duration.'>';
                                if($hcode_show_thumbnail == 1){
                                    $blog_quote = hcode_post_meta('hcode_quote');
                                    $blog_image = hcode_post_meta('hcode_image');
                                    $blog_gallery = hcode_post_meta('hcode_gallery');
                                    $blog_link = hcode_post_meta('hcode_link');
                                    $blog_video = hcode_post_meta('hcode_video_type');
                                    $post_format = get_post_format();

                                    if( $post_format == 'image' && $hcode_show_post_feature_image != 1 ){
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-image.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    } elseif( $post_format == 'gallery' && $hcode_show_post_feature_image != 1 ) {
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-gallery.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    } elseif( $post_format == 'video' && $hcode_show_post_feature_image != 1 ) {
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-video.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    } elseif( $post_format == 'quote' && $hcode_show_post_feature_image != 1 ) {
                                        ob_start();
                                            include HCODE_ADDONS_ROOT . '/loop/loop-quote.php';
                                        $output .= ob_get_contents();  
                                        ob_end_clean();  
                                    } else {
                                        $output .='<div class="blog-image"><a href="'.get_permalink().'">';
                                        if ( has_post_thumbnail() ) {
                                            $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                        } else {
                                            if( esc_url( $hcode_no_image['url'] ) ) {
                                                $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                            }
                                        }
                                        $output .='</a></div>';
                                    }
                                }
                                $output .='<div class="blog-details '.$hcode_token_class.'">';
                                    if($hcode_show_author || $show_date || $show_categories):
                                        $output .='<div class="blog-date">'.$hcode_show_author.$show_date.$show_categories.' </div>';
                                    endif;
                                    if($hcode_show_post_title == 1){
                                        $output .='<div class="blog-title entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
                                    }
                                    if($hcode_show_excerpt == 1):
                                        $show_excerpt = ( $hcode_excerpt_length ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));
                                        $output .='<div class="hcode-blog-excerpt margin-four-bottom entry-content">'.$show_excerpt.'</div>';
                                    elseif($hcode_show_content == 1):
                                        $show_content = apply_filters( 'the_content', $post->post_content );
                                        $output .='<div class="margin-four-bottom entry-content">'.$show_content.'</div>';
                                    endif;
                                    if($hcode_show_separator == 1) {
                                        $output .='<div class="hcode-blog-separator separator-line bg-black no-margin"></div>';
                                    }
                                    if($show_like || $hcode_show_comment):
                                        $output .='<div class="margin-four-top hcode-comment-likes">'.$show_like;
                                        if( $hcode_show_comment == 1 && (comments_open() || get_comments_number())){
                                            ob_start();
                                                comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'hcode-addons' ), 'comment' );
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        }
                                        $output .= '</div>';
                                    endif;
                                    if( $hcode_show_continue_button == 1 ) {
                                        if( $hcode_button_config ) {
                                            $output .='<a class="highlight-button btn btn-small xs-no-margin-bottom '.$responsive_id.'" href="'.get_permalink().'">'.$hcode_button_config.'</a>';
                                        }
                                    }
                                $output .='</div>';
                            $output .='</div>';
                        $output .='</div>';
                    endwhile;
                    wp_reset_postdata();
                    if( $id || $class_main || $hcode_show_white_bg || $infinite_scroll_main_class ):
                        $output .= '</div>';
                    endif;

                    if( $hcode_show_pagination == 1 ) {
                        if( $query->max_num_pages > 1 ) {

                            if( $hcode_pagination_style == 'infinite-scroll-pagination'  ) {

                                $output .='<div class="pagination hcode-infinite-scroll display-none" data-pagination="'.$query->max_num_pages.'">';
                                    ob_start();
                                        if( get_next_posts_link( '', $query->max_num_pages ) ) :
                                            next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hcode-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $query->max_num_pages );
                                        endif;
                                    $output .= ob_get_contents();  
                                    ob_end_clean();  
                                $output .='</div>';

                            } else {
                                if( $query->query_vars['paged'] > 1 ) {
                                    $current = $query->query_vars['paged'];
                                } else {
                                    $current = 1;
                                }
                                $output .='<div class="pagination pull-left">';
                                    $output .= paginate_links( array(
                                        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                        'format'       => '',
                                        'add_args'     => '',
                                        'current'      => $current,
                                        'total'        => $query->max_num_pages,
                                        'prev_text'    => '<img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                                        'next_text'    => '<img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                                        'type'         => 'plain',
                                        'end_size'     => 3,
                                        'mid_size'     => 3
                                    ) );
                                $output .='</div>';
                            }
                        }
                    }
            break;
            case 'modern':
                if( $id || $class_main || $hcode_show_white_bg || $infinite_scroll_main_class ):
                    $output .= '<div'.$id.' class="'.$class_main.$hcode_show_white_bg.$infinite_scroll_main_class.'">';
                endif;
                $i = 1;
                if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                
                $default_posts_per_page = ( !empty($hcode_post_per_page) ) ? $hcode_post_per_page : get_option( 'posts_per_page' );
                if( $paged > 1){
                    $i = ($paged - 1 ) * $default_posts_per_page + 1;
                }
                $args = array('post_type' => 'post',
                            'posts_per_page' => $hcode_post_per_page,
                            'category_name' => $hcode_categories_list,
                            'orderby' => $orderby,
                            'order' => $order,
                            'paged' => $paged,
                         );
                $query = new WP_Query( $args );

                while ( $query->have_posts() ) : $query->the_post();
                
                // Added in H-Code v1.8
                $hcode_post_class_list = array();
                if( $hcode_show_pagination == 1 ) {
                    if( $hcode_pagination_style == 'infinite-scroll-pagination' ) {
                        $hcode_post_class_list[] = 'blog-single-post';
                    }
                }

                $hcode_post_classes = '';
                ob_start();
                    post_class( $hcode_post_class_list );
                    $hcode_post_classes .= ob_get_contents();
                ob_end_clean();

                $post_cat = array();
                $categories = get_the_category();
                foreach ($categories as $k => $cat) {
                    $cat_link = get_category_link($cat->cat_ID);
                    $post_cat[]='<a href="'.$cat_link.'" rel="category tag">'.$cat->name.'</a>';
                }
                $post_category=implode(", ",$post_cat);

                if($i < 10){
                    $i = '0'.$i;
                }
                
                $hcode_show_author = ( $hcode_show_author_name == 1 ) ? '<div class="blog-date-right light-gray-text2">'.esc_html__('Posted by ','hcode-addons'). '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span></div><div class="hcode-blog-separator separator-line bg-black no-margin-lr no-margin xs-margin-ten-bottom"></div>' : '';
                $show_date = ( $hcode_show_date == 1 ) ? '<div class="blog-date-right light-gray-text2 no-padding-bottom"><span class="published">'.get_the_date( $hcode_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $hcode_date_format ).'</time></div>' : '';
                $show_like = ( $hcode_show_like == 1 ) ? get_simple_likes_button( get_the_ID() ) : '';

                if($m == 1){
                    $j = 300;
                    $m = 2;
                }else{
                    $j = 300 * $m;
                    $m++;
                }
                if($hcode_animation_style):
                    $hcode_column_duration = ' data-wow-duration="'.$j.'ms"';
                endif;
                $output .= '<div '.$hcode_post_classes.'>';
                    $output .= '<div class="blog-listing blog-listing-classic blog-listing-full '.$hcode_animation_style.' '.$hcode_token_class.'" '.$hcode_column_duration.'>';
                        $output .='<div class="col-md-2 col-sm-2 col-xs-12 clearfix text-center no-padding-right xs-padding-right">';
                            $output .='<div class="avtar text-left xs-width-100px"><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">';
                                    $output .= get_avatar( get_the_author_meta( 'ID' ), 300 );
                                    $output .='</a>';
                            $output .='</div>';
                            $output .= '<div class="hcode-date-author-box">';
                                $output .= $show_date;
                                $output .= $hcode_show_author;
                            $output .= '</div>';
                        $output .='</div>';
                        $output .='<div class="col-md-10 col-sm-10 col-xs-12 no-padding-left xs-padding-left">';
                        if( $hcode_show_post_number == 1 ){
                            $output .='<div class="blog-number bg-white black-text text-center alt-font">'.$i.'</div>';
                        }
                        if($hcode_show_thumbnail == 1){
                            $blog_quote = hcode_post_meta('hcode_quote');
                            $blog_image = hcode_post_meta('hcode_image');
                            $blog_gallery = hcode_post_meta('hcode_gallery');
                            $blog_link = hcode_post_meta('hcode_link');
                            $blog_video = hcode_post_meta('hcode_video_type');
                            $post_format = get_post_format();

                            if( $post_format == 'image' && $hcode_show_post_feature_image != 1 ) {
                                ob_start();
                                    include HCODE_ADDONS_ROOT . '/loop/loop-image.php';
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            } elseif( $post_format == 'gallery' && $hcode_show_post_feature_image != 1 ) {
                                ob_start();
                                    include HCODE_ADDONS_ROOT . '/loop/loop-gallery.php';
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            } elseif( $post_format == 'video' && $hcode_show_post_feature_image != 1 ) {
                                ob_start();
                                    include HCODE_ADDONS_ROOT . '/loop/loop-video.php';
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            } elseif( $post_format == 'quote' && $hcode_show_post_feature_image != 1 ) {
                                ob_start();
                                    include HCODE_ADDONS_ROOT . '/loop/loop-quote.php';
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            } else {
                                $output .='<div class="blog-image"><a href="'.get_permalink().'">';
                                if ( has_post_thumbnail() ) {
                                    $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                } else {
                                    if( esc_url( $hcode_no_image['url'] ) ) {
                                        $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                    }
                                }
                                $output .='</a></div>';
                            }
                        } else {
                            $output .='<div class="blog-image"></div>';
                        }
                        $output .='<div class="blog-details">';
                                if($hcode_show_categories == 1):
                                    $output .='<div class="blog-date no-padding-top alt-font">'.$post_category.'</div>';
                                endif;
                                if($hcode_show_post_title == 1){
                                    $output .='<div class="blog-title entry-title"><a class="alt-font" href="'.get_permalink().'">'.get_the_title().'</a></div>';
                                }
                                if($show_like || $hcode_show_comment):
                                    $output .='<div class="hcode-comment-likes">';
                                        $output .= $show_like;
                                        if( $hcode_show_comment == 1 && (comments_open() || get_comments_number())){
                                            ob_start();
                                                comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'hcode-addons' ), 'comment' );
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        }
                                    $output .='</div>';
                                endif;
                                if($hcode_show_separator == 1) {
                                    $output .='<div class="hcode-blog-separator separator-line bg-black no-margin-lr margin-four"></div>';
                                }
                                if($hcode_show_excerpt == 1):
                                    $show_excerpt = ( $hcode_excerpt_length ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));
                                    $output .='<div class="hcode-blog-excerpt entry-content">'.$show_excerpt.'</div>';
                                elseif($hcode_show_content == 1):
                                    $show_content = apply_filters( 'the_content', $post->post_content );
                                    $output .='<div class="entry-content">'.$show_content.'</div>';
                                endif;
                                if( $hcode_show_continue_button == 1 ) {
                                    if( $hcode_button_config ) {
                                        $output .='<a class="highlight-button-black-border btn btn-medium margin-five no-margin-bottom '.$responsive_id.'" href="'.get_permalink().'">'.$hcode_button_config.'</a>';
                                    }
                                }
                            $output .='</div>';
                        $output .='</div>';
                    $output .='</div>';
                $output .='</div>';
                $i++;
                endwhile;
                wp_reset_postdata();
                if( $id || $class_main || $hcode_show_white_bg || $infinite_scroll_main_class ):
                    $output .= '</div>';
                endif;

                if( $hcode_show_pagination == 1 ) {
                    if( $query->max_num_pages > 1 ) {

                        if( $hcode_pagination_style == 'infinite-scroll-pagination'  ) {

                            $output .='<div class="pagination hcode-infinite-scroll display-none" data-pagination="'.$query->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $query->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hcode-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $query->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';

                        } else {
                            if( $query->query_vars['paged'] > 1 ) {
                                $current = $query->query_vars['paged'];
                            } else {
                                $current = 1;
                            }
                            $output .='<div class="pagination pull-left">';
                                $output .= paginate_links( array(
                                    'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                    'format'       => '',
                                    'add_args'     => '',
                                    'current'      => $current,
                                    'total'        => $query->max_num_pages,
                                    'prev_text'    => '<img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                                    'next_text'    => '<img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                                    'type'         => 'plain',
                                    'end_size'     => 3,
                                    'mid_size'     => 3
                                ) );
                            $output .='</div>';
                        }
                    }
                }
            break;
            case 'box':

                $blog_columns = ( $hcode_blog_columns ) ? 'blog-'.$hcode_blog_columns.'col product-'.$hcode_blog_columns : '';
                if( $id || $hcode_blog_columns || $class_main || $infinite_scroll_main_class ) {
                    $output .= '<div'.$id.' class="'.$blog_columns.$class_main.$infinite_scroll_main_class.'">';
                }

                if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

                $args = array('post_type' => 'post',
                    'posts_per_page' => $hcode_post_per_page,
                    'category_name' => $hcode_categories_list,
                    'orderby' => $orderby,
                    'order' => $order,
                    'paged' => $paged,
                 );

                $query = new WP_Query( $args );
                while ( $query->have_posts() ) : $query->the_post();
                    
                    // Added in H-Code v1.8
                    $hcode_post_class_list = array();
                    if( $hcode_show_pagination == 1 ) {
                        if( $hcode_pagination_style == 'infinite-scroll-pagination' ) {
                            $hcode_post_class_list[] = 'blog-single-post';
                        }
                    }

                    $hcode_post_classes = '';
                    ob_start();
                        post_class( $hcode_post_class_list );
                        $hcode_post_classes .= ob_get_contents();
                    ob_end_clean();

                    $hcode_show_author = ( $hcode_show_author_name == 1 ) ? '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span> | ' : '';
                    $show_date = ( $hcode_show_date == 1 ) ? '<span class="published">'.get_the_date( $hcode_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $hcode_date_format ).'</time>' : '';
                    $show_like = ( $hcode_show_like == 1 ) ? get_simple_likes_button( get_the_ID() ) : '';

                    $output .= '<div '.$hcode_post_classes.'>';
                        $output .= '<div class="'.$class_column.' latest-blogs margin-three-bottom sm-margin-bottom-four'.$hcode_show_white_bg.'">';
                        $output .='<div class="blog-listing no-margin">
                                    <div class="blog-image">';
                                        if ( has_post_thumbnail() ) {
                                            $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                        } else {
                                            if( esc_url( $hcode_no_image['url'] ) ) {
                                                $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                            }
                                        }
                                        $output .='<div class="blog-content xs-text-center '.$hcode_token_class.'">
                                            <div class="slider-text-middle-main">
                                                <div class="slider-text-middle">';
                                                    $output .='<span class="post-author">'.$hcode_show_author.$show_date.'</span>';
                                                    if($hcode_show_post_title == 1){
                                                        $output .='<a class="post-title entry-title" href="'.get_permalink().'">'.get_the_title().'</a>';
                                                    }
                                                    if($hcode_show_excerpt == 1):
                                                        $show_excerpt = ( $hcode_excerpt_length ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(15));
                                                        $output .='<div class="hcode-blog-excerpt entry-content">'.$show_excerpt.'</div>';
                                                    elseif($hcode_show_content == 1):
                                                        $show_content = apply_filters( 'the_content', $post->post_content );
                                                        $output .='<div class="entry-content">'.$show_content.'</div>';
                                                    endif;

                                                    if($show_like || $hcode_show_comment):
                                                        $output .='<div class="like-share hcode-comment-likes">';
                                                            $output .= $show_like;
                                                            if( $hcode_show_comment == 1 && (comments_open() || get_comments_number())){
                                                                ob_start();
                                                                    comments_popup_link( __( '<i class="far fa-comment"></i>Comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'hcode-addons' ), 'comment' );
                                                                    $output .= ob_get_contents();  
                                                                ob_end_clean();
                                                            }
                                                        $output .='</div>';
                                                    endif;
                                            $output .='</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>';
                        $output .= '</div>';
                    $output .= '</div>';
                endwhile;
                if( $id || $hcode_blog_columns || $class_main || $infinite_scroll_main_class ) {
                    $output .= '</div>';
                }
                wp_reset_postdata();
                if( $hcode_show_pagination == 1 ) {
                    if( $query->max_num_pages > 1 ) {

                        if( $hcode_pagination_style == 'infinite-scroll-pagination'  ) {

                            $output .='<div class="pagination hcode-infinite-scroll display-none" data-pagination="'.$query->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $query->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hcode-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $query->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';

                        } else {
                            if( $query->query_vars['paged'] > 1 ) {
                                $current = $query->query_vars['paged'];
                            } else {
                                $current = 1;
                            }
                            $output .='<div class="pagination pull-left">';
                                $output .= paginate_links( array(
                                    'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                    'format'       => '',
                                    'add_args'     => '',
                                    'current'      => $current,
                                    'total'        => $query->max_num_pages,
                                    'prev_text'    => '<img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                                    'next_text'    => '<img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                                    'type'         => 'plain',
                                    'end_size'     => 3,
                                    'mid_size'     => 3
                                ) );
                            $output .='</div>';
                        }
                    }
                }
            break;

            case 'list':

                if($id ||  $class_main || $infinite_scroll_main_class ):
                   $output .='<div'.$id.' class="'.$class_main.$infinite_scroll_main_class.'">';
                endif;
                    $layout_settings_class = ( hcode_option('hcode_layout_settings') == 'hcode_layout_both_sidebar' || hcode_option('hcode_layout_settings') == 'hcode_layout_left_sidebar' || hcode_option('hcode_layout_settings') == 'hcode_layout_right_sidebar' ) ? 'hcode-list-view-three-col ' : '';
                    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
                    $args = array('post_type' => 'post',
                        'posts_per_page' => $hcode_post_per_page,
                        'category_name' => $hcode_categories_list,
                        'orderby' => $orderby,
                        'order' => $order,
                        'paged' => $paged,
                     );
                    $query = new WP_Query( $args );
                    while ( $query->have_posts() ) : $query->the_post();

                    // Added in H-Code v1.8
                    $hcode_post_class_list = array();
                    if( $hcode_show_pagination == 1 ) {
                        if( $hcode_pagination_style == 'infinite-scroll-pagination' ) {
                            $hcode_post_class_list[] = 'blog-single-post';
                        }
                    }

                    $hcode_post_classes = '';
                    ob_start();
                        post_class( $hcode_post_class_list );
                        $hcode_post_classes .= ob_get_contents();
                    ob_end_clean();

                    $post_cat = array();
                    $categories = get_the_category();
                    foreach ($categories as $k => $cat) {
                        $cat_link = get_category_link($cat->cat_ID);
                        $post_cat[]='<a href="'.$cat_link.'" rel="category tag">'.$cat->name.'</a>';
                    }
                    $post_category=implode(", ",$post_cat);
                    
                    $hcode_show_author = ( $hcode_show_author_name == 1 ) ? esc_html__('Posted by ','hcode-addons'). '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span> | ' : '';
                    $show_date = ( $hcode_show_date == 1 ) ? '<span class="published">'.get_the_date( $hcode_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.esc_attr( get_the_modified_date( 'c' ) ).'">'.get_the_modified_date( $hcode_date_format ).'</time>' : '';
                    $hcode_categories_list = ( $hcode_categories_list ) ? $post_cat : '';
                    $show_like = ( $hcode_show_like == 1 ) ? get_simple_likes_button( get_the_ID() ) : '';                      
                    $show_categories = ($hcode_show_categories == 1) ? ' | '.$post_category : '';

                    $j = 300 * $m;
                    $m++;
                    
                    if($hcode_animation_style):
                        $hcode_column_duration = ' data-wow-duration="'.$j.'ms"';
                    endif; 
                    $output .= '<div '.$hcode_post_classes.'>';
                        $output .='<div class="col-md-12 blog-listing blog-list-layout '.$layout_settings_class.$hcode_animation_style.'" '.$hcode_column_duration.'>';
                            if($hcode_show_thumbnail == 1){
                                $blog_quote = hcode_post_meta('hcode_quote');
                                $blog_image = hcode_post_meta('hcode_image');
                                $blog_gallery = hcode_post_meta('hcode_gallery');
                                $blog_video = hcode_post_meta('hcode_video_type');
                                $post_format = get_post_format();

                                    if( $post_format == 'image' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post">';
                                            $output .= '<div class="col-md-5 col-sm-6 col-xs-12 margin-six-bottom xs-margin-bottom-15px no-padding">';
                                                ob_start();
                                                    include HCODE_ADDONS_ROOT . '/loop/loop-image.php';
                                                $output .= ob_get_contents();  
                                                ob_end_clean();  
                                            $output .= '</div>';
                                    } elseif( $post_format == 'gallery' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post blog-post-gallery">';
                                            $output .= '<div class="col-md-5 col-sm-6 col-xs-12 margin-six-bottom xs-margin-bottom-15px no-padding">';
                                                ob_start();
                                                    include HCODE_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                $output .= ob_get_contents();  
                                                ob_end_clean();
                                            $output .= '</div>';
                                    } elseif( $post_format == 'video' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post blog-post-video">';
                                            $output .= '<div class="col-md-5 col-sm-6 col-xs-12 margin-six-bottom xs-margin-bottom-15px no-padding">';
                                                ob_start();
                                                    include HCODE_ADDONS_ROOT . '/loop/loop-video.php';
                                                $output .= ob_get_contents();  
                                                ob_end_clean();
                                            $output .= '</div>';  
                                    } elseif( $post_format == 'quote' && $hcode_show_post_feature_image != 1 ) {
                                        $output .='<div class="blog-post">';
                                            $output .= '<div class="col-md-5 col-sm-6 col-xs-12 margin-six-bottom xs-margin-bottom-15px no-padding">';
                                                ob_start();
                                                    include HCODE_ADDONS_ROOT . '/loop/loop-quote.php';
                                                $output .= ob_get_contents();  
                                                ob_end_clean();  
                                            $output .= '</div>';
                                    } else {
                                        $output .='<div class="blog-post">';
                                        $output .= '<div class="col-md-5 col-sm-6 col-xs-12 margin-six-bottom xs-margin-bottom-15px no-padding">';
                                            $output .='<div class="blog-image"><a href="'.get_permalink().'">';
                                            if ( has_post_thumbnail() ) {
                                                $output .= get_the_post_thumbnail( get_the_ID(), $hcode_image_srcset );
                                            } else {
                                                if( $hcode_no_image['url'] ) {
                                                    $output .= wp_get_attachment_image( $hcode_no_image['id'], $hcode_image_srcset );
                                                }
                                            }
                                        $output .= '</div>';
                                        $output .='</a></div>';
                                    }
                                }
                            $output .='<div class="blog-details col-md-7 col-sm-6 col-xs-12 margin-six-bottom xs-margin-bottom-35px '.$hcode_token_class.'">';
                                if($hcode_show_post_title == 1){
                                    $output .='<div class="blog-title entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
                                }
                                if($hcode_show_author || $show_date || $show_categories):
                                    $output .='<div class="blog-date margin-five-bottom">'.$hcode_show_author.$show_date.$show_categories.'</div>';
                                endif;
                                if($hcode_show_excerpt == 1):
                                    $show_excerpt = ( $hcode_excerpt_length ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));
                                    $output .='<div class="hcode-blog-excerpt blog-short-description entry-content">'.$show_excerpt.'</div>';
                                elseif($hcode_show_content == 1):
                                    $show_content = apply_filters( 'the_content', $post->post_content );
                                    $output .='<div class="blog-short-description entry-content">'.$show_content.'</div>';
                                endif;
                                $output .= '<div class="hcode-custom-meta margin-three-top sm-margin-six-top xs-no-margin-top">';
                                    if( $hcode_show_continue_button == 1 ) {
                                        if( $hcode_button_config ) {
                                            $output .='<div class="hcode-continue-button"><a class="highlight-button btn btn-small xs-no-margin-bottom '.$responsive_id.'" href="'.get_permalink().'">'.$hcode_button_config.'</a></div>';
                                        }
                                    }
                                    if($show_like || $hcode_show_comment):
                                        $output .='<div class="hcode-show-likes hcode-comment-likes">'.$show_like;
                                            if( $hcode_show_comment == 1 && (comments_open() || get_comments_number())){
                                                ob_start();
                                                    comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'hcode-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'hcode-addons' ), 'comment' );
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }
                                        $output .= '</div>';
                                    endif;
                                $output .='</div>';    
                            $output .='</div>';
                        if($hcode_show_thumbnail == 1):
                            $output .='</div>';
                        endif;
                        $output .='</div>';
                        if( $hcode_show_separator == 1 ){
                            $output .= '<div class="col-md-12 col-sm-12 col-xs-12 margin-six-bottom xs-display-none"><div class="hcode-blog-separator separator-line-thin bg-mid-gray"></div></div>';
                        }
                    $output .='</div>';
                endwhile;
                wp_reset_postdata();
                if( $hcode_show_pagination == 1 ) {
                    if( $query->max_num_pages > 1 ) {

                        if( $hcode_pagination_style == 'infinite-scroll-pagination'  ) {

                            $output .='<div class="pagination hcode-infinite-scroll display-none" data-pagination="'.$query->max_num_pages.'">';
                                ob_start();
                                    if( get_next_posts_link( '', $query->max_num_pages ) ) :
                                        next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'hcode-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $query->max_num_pages );
                                    endif;
                                $output .= ob_get_contents();  
                                ob_end_clean();  
                            $output .='</div>';

                        } else {
                            if( $query->query_vars['paged'] > 1 ) {
                                $current = $query->query_vars['paged'];
                            } else {
                                $current = 1;
                            }
                            $output .='<div class="pagination pull-left">';
                                $output .= paginate_links( array(
                                    'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                    'format'       => '',
                                    'add_args'     => '',
                                    'current'      => $current,
                                    'total'        => $query->max_num_pages,
                                    'prev_text'    => '<img alt="Previous" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                                    'next_text'    => '<img alt="Next" src="'.HCODE_PLUGIN_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                                    'type'         => 'plain',
                                    'end_size'     => 3,
                                    'mid_size'     => 3
                                ) );
                            $output .='</div>';
                        }
                    }
                }

                if( $id || $class_main || $infinite_scroll_main_class ):  
                    $output .='</div>';
                endif;
            break;
        }
        return $output;
    }
}
add_shortcode( "hcode_blog", "hcode_blog_shortcode" );