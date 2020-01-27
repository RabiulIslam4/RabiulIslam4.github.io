<?php
/**
 * Shortcode For Portfolio Filter
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio Filter */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_portfolio_filter_shortcode' ) ) {
    function hcode_portfolio_filter_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'hcode_portfolio_filter_style' => '',
            'hcode_portfolio_filter_selection' => 'portfolio-category',
            'hcode_categories_list' => '',
            'hcode_tags_list' => '',
            'hcode_show_all_categories_filter' => '1',
            'hcode_default_category_selected' => '',
            'hcode_show_all_tags_filter' => '1',
            'hcode_default_tags_selected' => '',
            'hcode_portfolio_categories_orderby' => 'id',
            'hcode_portfolio_categories_order' => 'ASC',
            'hcode_filter_color' => '',
            'hcode_filter_custom_color' => '',
            'hcode_animation_style' => '',
            'hcode_show_filter_strike_through' => '1',
            'hcode_filter_hover_color' => '',
            'hcode_filter_border_color' => '',
            'hcode_responsive_title_font' => '',
        ), $atts ) );
        global $font_settings_array, $hcode_featured_array, $hcode_portfolio_filter;
        $output = $filter_class = $filter_class_style = $filterStyle = $title_responsive_id = $title_responsive_style = $title_responsive_class = '';

        //For Text Align 
        if( !empty( $hcode_responsive_title_font ) ) {
            $title_responsive_id = uniqid('hcode-font-setting-');
            $title_responsive_style = Hcode_Responsive_Font_Settings::generate_css( $hcode_responsive_title_font, $title_responsive_id );
            $title_responsive_class = ' '.$title_responsive_id;
        }
        ( !empty( $title_responsive_style ) ) ? $font_settings_array[] = $title_responsive_style : '';

        $portfolio_id = $id;
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' class="'.$class.'"' : '';
        $hcode_portfolio_filter_style = ( $hcode_portfolio_filter_style ) ? $hcode_portfolio_filter_style : '';
        $hcode_show_all_categories_filter = ( $hcode_show_all_categories_filter ) ? $hcode_show_all_categories_filter : '';
        $hcode_default_category_selected = ( $hcode_default_category_selected ) ? $hcode_default_category_selected : '';
        $hcode_portfolio_categories_orderby = ( $hcode_portfolio_categories_orderby ) ? $hcode_portfolio_categories_orderby : '';
        $hcode_portfolio_categories_order = ( $hcode_portfolio_categories_order ) ? $hcode_portfolio_categories_order : '';
        $hcode_filter_color = ( $hcode_filter_color ) ? $hcode_filter_color : '';
        $hcode_filter_custom_color = ( $hcode_filter_custom_color ) ? $hcode_filter_custom_color : '';
        $hcode_animation_style = ( $hcode_animation_style ) ? ' wow '.$hcode_animation_style : '';

        $hcode_portfolio_filter = !empty( $hcode_portfolio_filter ) ? $hcode_portfolio_filter : 0;
        $hcode_portfolio_filter = $hcode_portfolio_filter + 1;
        $hcode_filter_unique_id = 'hcode-portfolio-'.$hcode_portfolio_filter;
        $hcode_filter_token_class = 'hcode-portfolio-filter-style-'.$hcode_portfolio_filter; 

        !empty( $hcode_filter_border_color ) ? $hcode_featured_array[] = '.'.$hcode_filter_token_class.' > li.active > a, .'.$hcode_filter_token_class.' li > a:hover{ border-color: '.$hcode_filter_border_color.'}' : '';
        !empty( $hcode_filter_border_color ) ? $hcode_featured_array[] = '.'.$hcode_filter_token_class.' li.active:before{ background-color: '.$hcode_filter_border_color.'}' : '';
        !empty( $hcode_filter_hover_color ) ? $hcode_featured_array[] = '.'.$hcode_filter_token_class.' > li.active > a, .'.$hcode_filter_token_class.' li > a:hover{ color: '.$hcode_filter_hover_color.' !important; }' : '';
        ( $hcode_show_filter_strike_through == 0 ) ? $hcode_featured_array[] = '.'.$hcode_filter_token_class.' li.active:before { display: none !important; }' : '';

        switch( $hcode_portfolio_filter_style ) {
            case 'filter-style-2':
                $filterStyle = ' nav-tabs-style2';
            break;
            
            default:
                $filterStyle = ' nav-tabs-style1';
            break;
        }

        switch( $hcode_filter_color ) {
            case 'nav-tabs-black':
            case 'nav-tabs-gray':
                $filter_class = ( $hcode_filter_color ) ? ' '.$hcode_filter_color : '';
            break;

            case 'custom':
                $filter_class_style .= 'style="color:'.$hcode_filter_custom_color.'"';
            break;
        }

        if( $hcode_portfolio_filter_selection == 'portfolio-tags' ){
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
            $terms = get_terms( $hcode_portfolio_filter_selection );
            
            if ( ! is_array( $categories_to_display_ids ) ) {
                $categories_to_display_ids = array();
            }
            foreach ( $terms as $term ) {
                $categories_to_display_ids[] = $term->slug;
            }
        }
        
        if( $class ) :
            $output .='<div'.$class.'">';
        endif;

        $output .='<ul'.$id.' class="portfolio-filter nav nav-tabs'.$filterStyle.$filter_class.$hcode_animation_style.' '.$hcode_filter_token_class.'">';

            if( $hcode_portfolio_filter_selection == 'portfolio-tags' ){
                if( $hcode_show_all_tags_filter == 1 ){
                    $active_class = empty( $hcode_default_tags_selected ) ? ' active ' : '';
                    $output .= '<li class="nav '.$active_class.'"><a href="#" '.$filter_class_style.' class="'.$title_responsive_class.'" data-uniqueid="'.$hcode_filter_unique_id.'" data-filter="*" data-id="'.$portfolio_id.'">'.__( 'All', 'hcode-addons' ).'</a></li>';
                }
            } else {
                if( $hcode_show_all_categories_filter == 1 ){
                    $active_class = empty( $hcode_default_category_selected ) ? ' active ' : '';
                    $output .= '<li class="nav '.$active_class.'"><a href="#" '.$filter_class_style.' class="'.$title_responsive_class.'" data-uniqueid="'.$hcode_filter_unique_id.'" data-filter="*" data-id="'.$portfolio_id.'">'.__( 'All', 'hcode-addons' ).'</a></li>';
                }
            }

            $taxonomy = $hcode_portfolio_filter_selection;
            $args = array(
                'orderby' => $hcode_portfolio_categories_orderby,
                'order' => $hcode_portfolio_categories_order,
                'hide_empty' => 0, 
                'slug' => $categories_to_display_ids,
            );
            
            $tax_terms = get_terms($taxonomy, $args);
            foreach ($tax_terms as $tax_term) {
                if( $hcode_portfolio_filter_selection == 'portfolio-tags' ){
                    $active_class = ( $hcode_default_tags_selected == $tax_term->slug ) ? ' active ' : '';
                } else {
                    $active_class = ( $hcode_default_category_selected == $tax_term->slug ) ? ' active ' : '';
                }
                $output .='<li class="nav '.$active_class.'">
                            <a href="#" '.$filter_class_style.' class="'.$title_responsive_class.'" data-filter=".portfolio-filter-'.$tax_term->term_id.'" data-uniqueid="'.$hcode_filter_unique_id.'" data-id="'.$portfolio_id.'">'.$tax_term->name.'</a>
                        </li>';
            }
        $output .='</ul>';
        
        if( $class ) :
            $output .='</div>';
        endif;

        return $output;
    }
}
add_shortcode( 'hcode_portfolio_filter', 'hcode_portfolio_filter_shortcode' );