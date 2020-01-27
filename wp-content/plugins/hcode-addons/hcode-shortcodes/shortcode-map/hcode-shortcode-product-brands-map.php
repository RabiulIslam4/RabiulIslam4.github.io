<?php
/**
 * Map For Product Brand Block
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Product Brand Block */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
      'name' => __( 'Product Brand Slider/Grid', 'hcode-addons' ),
      'base' => 'hcode_product_brands',
      'category' => 'H-Code',
      'icon' => 'h-code-shortcode-icon fas fa-arrows-alt-h',
      'description' => __( 'Add product brand slider/grid', 'hcode-addons' ),
      'params' => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => __('Products Block Style', 'hcode-addons'),
            'param_name' => 'product_brand_type',
            'value' => array(__('Select Products Block Style', 'hcode-addons') => '',
                             __('Slider', 'hcode-addons') => 'slider',
                             __('Grid', 'hcode-addons') => 'grid',
          ),
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
          'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('grid') ),
        ),
        array(
            'type' => 'hcode_custom_switch_option',
            'class' => '',
            'heading' => __('Show Brand Title', 'hcode-addons'),
            'param_name' => 'show_brand_title',
            'value' => array(__('NO', 'hcode-addons') => '0', 
                             __('YES', 'hcode-addons') => '1'
                            ),
            'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider','grid') ),
        ),
        array(
            'type' => 'hcode_custom_switch_option',
            'class' => '',
            'heading' => __('Show Pagination', 'hcode-addons'),
            'param_name' => 'show_pagination',
            'value' => array(__('OFF', 'hcode-addons') => '0', 
                             __('ON', 'hcode-addons') => '1'
                            ),
            'description' => __( 'Select ON to show pagination in slider', 'hcode-addons' ),
            'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
            'group'       => 'Slider Config'
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Pagination Style', 'hcode-addons'),
            'param_name' => 'show_pagination_style',
            'value' => array(__('Select Pagination Style', 'hcode-addons') => '',
                             __('Dot Style', 'hcode-addons') => '0',
                             __('Line Style', 'hcode-addons') => '1',
                             __('Round Style', 'hcode-addons') => '2',
                            ),
            'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
            'group'       => 'Slider Config'
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Pagination Color Style', 'hcode-addons'),
            'param_name' => 'show_pagination_color_style',
            'value' => array(__('Select Pagination Color Style', 'hcode-addons') => '',
                             __('Dark Style', 'hcode-addons') => '0',
                             __('Light Style', 'hcode-addons') => '1'
                            ),
            'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
            'group'       => 'Slider Config'
        ),
        array(
              'type' => 'hcode_custom_switch_option',
              'class' => '',
              'heading' => __('Show Navigation', 'hcode-addons'),
              'param_name' => 'show_navigation',
              'value' => array(__('OFF', 'hcode-addons') => '0', 
                               __('ON', 'hcode-addons') => '1'
                              ),
              'description' => __( 'Select ON to show navigation in slider', 'hcode-addons' ),
              'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
              'group'       => 'Slider Config'
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Navigation Style', 'hcode-addons'),
            'param_name' => 'show_navigation_style',
            'value' => array(__('Select Navigation Style', 'hcode-addons') => '',
                             __('Next/Prev Black Arrow', 'hcode-addons') => '0',
                             __('Next/Prev White Arrow', 'hcode-addons') => '1'
                            ),
            'dependency' => array( 'element' => 'show_navigation', 'value' => array('1') ),
            'group'       => 'Slider Config'
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For Desktop Device)', 'hcode-addons' ),
          'value' => '4',
          'param_name' => 'desktop_per_page',
          'description' => __( 'Enter numeric value like 3', 'hcode-addons' ),          
          'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For Mini Desktop Device)', 'hcode-addons' ),
          'value' => '3',
          'param_name' => 'mini_desktop_per_page',
          'description' => __( 'Enter numeric value like 3', 'hcode-addons' ),          
          'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For iPad/Tablet Device)', 'hcode-addons' ),
          'value' => '2',
          'param_name' => 'ipad_per_page',
          'description' => __( 'Enter numeric value like 3', 'hcode-addons' ),          
          'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        array(
          'type' => 'textfield',
          'heading' => __( 'No. of Products Per Page (For Mobile Device)', 'hcode-addons' ),
          'value' => '1',
          'param_name' => 'mobile_per_page',
          'description' => __( 'Enter numeric value like 1', 'hcode-addons' ),          
          'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
          'group'       => 'Slider Config'
        ),
        array(
              'type' => 'hcode_custom_switch_option',
              'class' => '',
              'heading' => __('Loop', 'hcode-addons'),
              'param_name' => 'hcode_image_carousel_loop',
              'value' => array(__('False', 'hcode-addons') => '0', 
                               __('True', 'hcode-addons') => '1'
                              ),
              'description' => __( 'Select TRUE to loop slider', 'hcode-addons' ),
              'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
              'group'       => 'Slider Config' 
        ),
        array(
              'type' => 'hcode_custom_switch_option',
              'class' => '',
              'heading' => __('Autoplay', 'hcode-addons'),
              'param_name' => 'hcode_image_carousel_autoplay',
              'value' => array(__('False', 'hcode-addons') => '0', 
                               __('True', 'hcode-addons') => '1'
                              ),
              'description' => __( 'Select TRUE to autoplay slider', 'hcode-addons' ),
              'dependency'  => array( 'element' => 'product_brand_type', 'value' => array('slider') ),
              'group'       => 'Slider Config' 
        ),
        array(
              'type' => 'hcode_custom_switch_option',
              'class' => '',
              'heading' => __('Stop On Hover', 'hcode-addons'),
              'param_name' => 'stoponhover',
              'value' => array(__('False', 'hcode-addons') => '0', 
                               __('True', 'hcode-addons') => '1'
                              ),
              'description' => __( 'Select TRUE to stop autoplay when hover on slider', 'hcode-addons' ),
              'dependency'  => array( 'element' => 'hcode_image_carousel_autoplay', 'value' => array('1') ),
              'group'       => 'Slider Config'
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Slide Delay Time', 'hcode-addons'),
            'param_name' => 'slidespeed',
            'value' => array(__('Select Slide Delay Time', 'hcode-addons') => '',
                             __('500', 'hcode-addons') => '500',
                             __('600', 'hcode-addons') => '600',
                             __('700', 'hcode-addons') => '700',
                             __('800', 'hcode-addons') => '800',
                             __('900', 'hcode-addons') => '900',
                             __('1000', 'hcode-addons') => '1000',
                             __('1100', 'hcode-addons') => '1100',
                             __('1200', 'hcode-addons') => '1200',
                             __('1300', 'hcode-addons') => '1300',
                             __('1400', 'hcode-addons') => '1400',
                             __('1500', 'hcode-addons') => '1500',
                             __('2000', 'hcode-addons') => '2000',
                             __('3000', 'hcode-addons') => '3000',
                             __('4000', 'hcode-addons') => '4000',
                             __('5000', 'hcode-addons') => '5000',
                             __('6000', 'hcode-addons') => '6000',
                             __('7000', 'hcode-addons') => '7000',
                             __('8000', 'hcode-addons') => '8000',
                             __('9000', 'hcode-addons') => '9000',
                             __('10000', 'hcode-addons') => '10000',
                             __('Custom', 'hcode-addons') => 'custom',
                            ),
            'std' => '3000',
            'description' => __('Select slide delay time (1ms = 100)', 'hcode-addons'),
            'dependency'  => array( 'element' => 'hcode_image_carousel_autoplay', 'value' => array('1') ),
            'group'       => 'Slider Config'
        ),
        array(
           'type'        => 'textfield',
           'heading'     => __('Custom Slide Delay Time', 'hcode-addons' ),
           'description' => __('Add custom slide delay time to this slider. Like "2000"', 'hcode-addons' ),
           'param_name'  => 'custom_slidespeed',
           'dependency' => array( 'element' => 'slidespeed', 'value' => 'custom' ),
           'group' => 'Slider Config',
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Slide Speed', 'hcode-addons'),
            'param_name' => 'slidedelay',
            'admin_label' => true,
            'value' => array(__('Select Slide Speed', 'hcode-addons') => '',
                             __('500', 'hcode-addons') => '500',
                             __('600', 'hcode-addons') => '600',
                             __('700', 'hcode-addons') => '700',
                             __('800', 'hcode-addons') => '800',
                             __('900', 'hcode-addons') => '900',
                             __('1000', 'hcode-addons') => '1000',
                             __('1100', 'hcode-addons') => '1100',
                             __('1200', 'hcode-addons') => '1200',
                             __('1300', 'hcode-addons') => '1300',
                             __('1400', 'hcode-addons') => '1400',
                             __('1500', 'hcode-addons') => '1500',
                             __('2000', 'hcode-addons') => '2000',
                             __('3000', 'hcode-addons') => '3000',
                             __('4000', 'hcode-addons') => '4000',
                             __('5000', 'hcode-addons') => '5000',
                             __('6000', 'hcode-addons') => '6000',
                             __('7000', 'hcode-addons') => '7000',
                             __('8000', 'hcode-addons') => '8000',
                             __('9000', 'hcode-addons') => '9000',
                             __('10000', 'hcode-addons') => '10000',
                             __('Custom', 'hcode-addons') => 'custom',
                            ),
            'std' => '700',
            'description' => __('Select slide speed', 'hcode-addons'),
            'dependency'  => array( 'element' => 'hcode_image_carousel_autoplay', 'value' => array('1') ),
            'group' => 'Slider Config',
        ),
        array(
           'type'        => 'textfield',
           'heading'     => __('Custom Slide Speed', 'hcode-addons' ),
           'description' => __('Add custom slide speed to this slider. Like "2000"', 'hcode-addons' ),
           'param_name'  => 'custom_slidedelay',
           'dependency' => array( 'element' => 'slidedelay', 'value' => 'custom' ),
           'group' => 'Slider Config',
        ),
        array(
            'type'        => 'responsive_font_settings',
            'param_name'  => 'hcode_responsive_font',
            'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
            'dependency'  => array( 'element' => 'show_brand_title', 'value' => array('1') ),
            'group' => 'Font Settings',
        ),
        array(
          'type' => 'hcode_custom_srcset',
          'param_name' => 'hcode_icon_image_srcset',
          'heading' => __('Product Brand SRCSET', 'hcode-addons' ),
          'value' => 'full',
          'group' => 'SRCSET',
      ),
        $hcode_vc_extra_id,
        $hcode_vc_extra_class,
      )
    ) );