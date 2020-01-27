<?php
/**
 * Map For Portfolio Filter
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio Filter */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Portfolio Filter', 'hcode-addons'),
  'description' => __( 'Place portfolio filter list', 'hcode-addons' ),
  'icon' => 'fas fa-briefcase h-code-shortcode-icon',
  'base' => 'hcode_portfolio_filter',
  'category' => 'H-Code',
  'params' => array(
      array(
          'type' => 'dropdown',
          'admin_label' => true,
          'heading' => __('Filter Style', 'hcode-addons'),
          'param_name' => 'hcode_portfolio_filter_style',
          'value' => array(__('Select Filter Style', 'hcode-addons') => '',
                           __('Filter Style 1', 'hcode-addons') => 'filter-style-1',
                           __('Filter Style 2', 'hcode-addons') => 'filter-style-2',
          ),
          'std' => 'filter-style-1',
      ),
      array(
          'type' => 'hcode_preview_image',
          'heading' => __('Select pre-made style', 'hcode-addons'),
          'param_name' => 'hcode_filter_preview_image',
      ),
      array(
          'type' => 'dropdown',
          'admin_label' => true,
          'class' => '',
          'heading' => __('Type of Selection', 'hcode-addons'),
          'param_name' => 'hcode_portfolio_filter_selection',
          'value' => array(__('Category', 'hcode-addons') => 'portfolio-category',
                           __('Tags', 'hcode-addons') => 'portfolio-tags',
          ),
          'std' => 'portfolio-category',
      ),
      array(
          'type' => 'hcode_multiple_portfolio_categories',
          'heading' => __('Select Categories', 'hcode-addons'),
          'param_name' => 'hcode_categories_list',
          'dependency' => array( 'element' => 'hcode_portfolio_filter_selection', 'value' => array('portfolio-category') ),
      ),
      array(
          'type' => 'hcode_multiple_portfolio_tags',
          'heading' => __('Select Tags', 'hcode-addons'),
          'param_name' => 'hcode_tags_list',
          'dependency' => array( 'element' => 'hcode_portfolio_filter_selection', 'value' => array('portfolio-tags') ),
      ),
      array(
            'type' => 'hcode_custom_switch_option',
            'heading' => __('Show All Categories Filter', 'hcode-addons'),
            'param_name' => 'hcode_show_all_categories_filter',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1'
                            ),
            'std' => '1',
            'description' => __( 'Select YES to show filter above portfolio', 'hcode-addons' ),
            'dependency' => array( 'element' => 'hcode_portfolio_filter_selection', 'value' => array('portfolio-category') ),
      ),
      array(
          'type' => 'hcode_multiple_portfolio_categories',
          'heading' => __('Select Default Category Selected', 'hcode-addons'),
          'param_name' => 'hcode_default_category_selected',    
          'multiple' => false,
          'dependency' => array( 'element' => 'hcode_portfolio_filter_selection', 'value' => array('portfolio-category') ),
      ),
      array(
            'type' => 'hcode_custom_switch_option',
            'heading' => __('Show All Tags Filter', 'hcode-addons'),
            'param_name' => 'hcode_show_all_tags_filter',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1'
                            ),
            'std' => '1',
            'description' => __( 'Select YES to show filter above portfolio', 'hcode-addons' ),
            'dependency' => array( 'element' => 'hcode_portfolio_filter_selection', 'value' => array('portfolio-tags') ),
      ),
      array(
          'type' => 'hcode_multiple_portfolio_tags',
          'heading' => __('Select Default Tags Selected', 'hcode-addons'),
          'param_name' => 'hcode_default_tags_selected',    
          'multiple' => false,
          'dependency' => array( 'element' => 'hcode_portfolio_filter_selection', 'value' => array('portfolio-tags') ),
      ),
      array(
          'type' => 'dropdown',
          'admin_label' => true,
          'class' => '',
          'heading' => __('Categories / Tags Order By', 'hcode-addons'),
          'param_name' => 'hcode_portfolio_categories_orderby',
          'value' => array(__('Select Order By', 'hcode-addons') => '',
                           __('Name', 'hcode-addons') => 'name',
                           __('Slug', 'hcode-addons') => 'slug',
                           __('Id', 'hcode-addons') => 'id',
                           __('Count', 'hcode-addons') => 'count',
          ),
          'std' => 'id',
      ),
      array(
          'type' => 'dropdown',
          'admin_label' => true,
          'class' => '',
          'heading' => __('Categories / Tags Order', 'hcode-addons'),
          'param_name' => 'hcode_portfolio_categories_order',
          'value' => array(__('Select Order', 'hcode-addons') => '',
                           __('Ascending', 'hcode-addons') => 'ASC',
                           __('Descending', 'hcode-addons') => 'DESC',
          ),
          'std' => 'ASC',
      ),
      array(
            'type' => 'hcode_custom_switch_option',
            'heading' => __('Show Filter Strike Through', 'hcode-addons'),
            'param_name' => 'hcode_show_filter_strike_through',
            'value' => array(__('No', 'hcode-addons') => '0', 
                             __('Yes', 'hcode-addons') => '1'
                            ),
            'std' => '1',
            'dependency' => array( 'element' => 'hcode_portfolio_filter_style', 'value' => array('filter-style-2') ),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __('Filter Color', 'hcode-addons'),
        'param_name' => 'hcode_filter_color',
        'value' => array(__('Select Filter Color', 'hcode-addons') => '',
                         __('Black', 'hcode-addons') => 'nav-tabs-black',
                         __('Gray', 'hcode-addons') => 'nav-tabs-gray',
                         __('Custom', 'hcode-addons') => 'custom',
                ),
        'group' => 'Filter Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Custom Filter Color', 'hcode-addons' ),
        'param_name' => 'hcode_filter_custom_color',
        'dependency' => array( 'element' => 'hcode_filter_color', 'value' => array('custom') ),
        'group' => 'Filter Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Custom Filter Hover Color', 'hcode-addons' ),
        'param_name' => 'hcode_filter_hover_color',
        'dependency' => array( 'element' => 'hcode_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
        'group' => 'Filter Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Custom Filter Border Color', 'hcode-addons' ),
        'param_name' => 'hcode_filter_border_color',
        'dependency' => array( 'element' => 'hcode_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
        'group' => 'Filter Style',
      ),
      array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_title_font',
        'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
        'hide_font_settings_element_lg' => array('text-align'),
        'hide_font_settings_element_md' => array('text-align'),
        'hide_font_settings_element_sm' => array('text-align'),
        'hide_font_settings_element_xs' => array('text-align'),
        'group' => 'Font Settings',
      ),
      array(
        'type' => 'hcode_animation_style',
        'param_name' => 'hcode_animation_style',
        'heading' => __('Animation Style', 'hcode-addons' ),
        'value' => '',
        'group' => 'Animation',
      ),
      $hcode_vc_extra_id,
      $hcode_vc_extra_class,
  )
) );