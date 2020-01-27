<?php
/**
 * Map For Related Product Block
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Related Product Block */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
      'name' => __( 'New Arrival Products', 'hcode-addons' ),
      'base' => 'hcode_recent_products',
      'category' => 'H-Code',
      'icon' => 'h-code-shortcode-icon fas fa-rocket',
      'description' => __( 'Place new arrival products block', 'hcode-addons' ),
      'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => __('Products Block Style', 'hcode-addons'),
            'param_name' => 'recent_product_type',
            'value' => array(__('Select Products Block Style', 'hcode-addons') => '',
                             __('Slider', 'hcode-addons') => 'slider',
                             __('Grid', 'hcode-addons') => 'grid',
          ),
        ), 
        array(
          'type' => 'textfield',
          'heading' => __( 'Show No. of Total Products', 'hcode-addons' ),
          'description' => __( 'Enter numeric value like 6', 'hcode-addons' ),
          'value' => 6,
          'param_name' => 'per_page',
          'dependency'  => array( 'element' => 'recent_product_type', 'not_empty' => true ),
        ),
        array(
          'type' => 'dropdown',
          'admin_label' => true,
          'heading' => __( 'Column Type', 'hcode-addons' ),
          'value' => array(__('Select Column Type', 'hcode-addons') => '',
                           __( '1 Column', 'hcode-addons' ) => '1',
                           __( '2 Columns', 'hcode-addons' ) => '2',
                           __( '3 Columns', 'hcode-addons' ) => '3',
                           __( '4 Columns', 'hcode-addons' ) => '4',
                           __( '6 Columns', 'hcode-addons' ) => '6',
                          ),
          'param_name' => 'columns',
          'dependency'  => array( 'element' => 'recent_product_type', 'value' => array('grid') ),
        ),
        array(
          'type' => 'dropdown',
          'admin_label' => true,
          'heading' => __( 'Display Products Order by', 'hcode-addons' ),
          'param_name' => 'orderby',
          'value' => array(__('Select Order by', 'hcode-addons') => '',
                           __( 'Date', 'hcode-addons' ) => 'date',
                           __( 'ID', 'hcode-addons' ) => 'ID',
                           __( 'Author', 'hcode-addons' ) => 'author',
                           __( 'Title', 'hcode-addons' ) => 'title',
                           __( 'Modified', 'hcode-addons' ) => 'modified',
                           __( 'Random', 'hcode-addons' ) => 'rand',
                           __( 'Comment count', 'hcode-addons' ) => 'comment_count',
                           __( 'Menu order', 'hcode-addons' ) => 'menu_order',
                          ),
          'dependency'  => array( 'element' => 'recent_product_type', 'not_empty' => true ),
        ),
        array(
          'type' => 'dropdown',
          'admin_label' => true,
          'heading' => __( 'Display Products Sort by', 'hcode-addons' ),
          'param_name' => 'order',
          'value' => array(__('Select Sort by', 'hcode-addons') => '',
                           __( 'Descending', 'hcode-addons' ) => 'DESC',
                           __( 'Ascending', 'hcode-addons' ) => 'ASC',
                          ),
          'dependency'  => array( 'element' => 'recent_product_type', 'not_empty' => true ),
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For Desktop Device)', 'hcode-addons' ),
          'description' => __( 'Enter numeric value like 3', 'hcode-addons' ),          
          'value' => '3',
          'param_name' => 'desktop_per_page',
          'dependency'  => array( 'element' => 'recent_product_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For Mini Desktop Device)', 'hcode-addons' ),
          'description' => __( 'Enter numeric value like 3', 'hcode-addons' ),          
          'value' => '3',
          'param_name' => 'mini_desktop_per_page',
          'dependency'  => array( 'element' => 'recent_product_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For iPad/Tablet Device)', 'hcode-addons' ),
          'description' => __( 'Enter numeric value like 3', 'hcode-addons' ),          
          'value' => '3',
          'param_name' => 'ipad_per_page',
          'dependency'  => array( 'element' => 'recent_product_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For Mobile Device)', 'hcode-addons' ),
          'description' => __( 'Enter numeric value like 1', 'hcode-addons' ),          
          'value' => '1',
          'param_name' => 'mobile_per_page',
          'dependency'  => array( 'element' => 'recent_product_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        $hcode_vc_extra_id,
        $hcode_vc_extra_class,
      )
    ) );