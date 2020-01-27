<?php
/**
 * Map For Blog Post Slider
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blog Post Slider */
/*-----------------------------------------------------------------------------------*/

$date = date('Y-m-d H:i:s'); ## Get current date
$post_slider_time = strtotime($date); ## Get timestamp of current date 
vc_map( array(
    'name' => __('Blog Post Slider', 'hcode-addons'),
    'description' => __( 'Place a blog post slider', 'hcode-addons' ),
    'icon' => 'h-code-shortcode-icon fas fa-arrows-alt-h',
    'base' => 'hcode_blog_post_slider',
    'category' => 'H-Code',
    'params' => array(
      array(
          'type' => 'dropdown',
          'heading' => __('Slider Style', 'hcode-addons'),
          'param_name' => 'show_blog_slider_style',
          'admin_label' => true,
          'value' => array(__('Select Slider Style', 'hcode-addons') => '',
                           __('Slider Carousal', 'hcode-addons') => 'blog-slider-1',
                           __('Owl Slider', 'hcode-addons') => 'blog-slider-2',
                           __('Owl Blog Slider Grid', 'hcode-addons') => 'blog-slider-3',
                           __('Blog Post Slider', 'hcode-addons') => 'blog-slider-4',
                          ),
      ),
      array(
          'type' => 'hcode_preview_image',
          'heading' => __('Select pre-made style', 'hcode-addons'),
          'param_name' => 'slider_photography_preview_image',
          'admin_label' => true,
          'value' => array(__('Select Blog Slider Style', 'hcode-addons') => '',
                             __('Slider Carousal', 'hcode-addons') => 'blog-slider-1',
                             __('Owl Slider', 'hcode-addons') => 'blog-slider-2',
                             __('Owl Blog Slider Grid', 'hcode-addons') => 'blog-slider-3',
                             __('Blog Post Slider', 'hcode-addons') => 'blog-slider-4',
                          ),
      ),
      array(
          'type' => 'hcode_multiple_select_option',
          'heading' => __('Categories', 'hcode-addons'),
          'param_name' => 'hcode_categories_list',
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
      ),
      array(
          'type' => 'hcode_custom_switch_option',
          'heading' => __('Show Title', 'hcode-addons'),
          'param_name' => 'hcode_show_post_title',
          'value' => array(__('No', 'hcode-addons') => '0', 
                           __('Yes', 'hcode-addons') => '1'
                          ),
          'description' => __( 'Select Yes to show post title', 'hcode-addons' ),
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
      ),
      array(
          'type' => 'hcode_custom_switch_option',
          'heading' => __('Show Author Name', 'hcode-addons'),
          'param_name' => 'hcode_show_author_name',
          'value' => array(__('No', 'hcode-addons') => '0', 
                           __('Yes', 'hcode-addons') => '1'
                          ),
          'std' => '1',
          'description' => __( 'Select Yes to show author name', 'hcode-addons' ),
          'dependency'  => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3') )
      ),
      array(
          'type' => 'hcode_custom_switch_option',
          'heading' => __('Show Excerpt', 'hcode-addons'),
          'param_name' => 'hcode_show_excerpt',
          'value' => array(__('No', 'hcode-addons') => '0', 
                           __('Yes', 'hcode-addons') => '1'
                          ),
          'std' => '1',
          'description' => __( 'Select Yes to show excerpt, no to show full content', 'hcode-addons' ),
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-4') ),
      ),
      array(
          'type'        => 'textfield',
          'heading'     => __('Excerpt Length', 'hcode-addons' ),
          'description' => __( 'Enter numaric value like 20', 'hcode-addons' ),
          'param_name'  => 'hcode_excerpt_length',
          'value'     => '55',
          'dependency'  => array( 'element' => 'hcode_show_excerpt', 'value' => array('1') ),
      ),
      array(
          'type' => 'hcode_custom_switch_option',
          'heading' => __('Show Date', 'hcode-addons'),
          'param_name' => 'hcode_show_date',
          'value' => array(__('No', 'hcode-addons') => '0', 
                           __('Yes', 'hcode-addons') => '1'
                          ),
          'description' => __( 'Select Yes to show date', 'hcode-addons' ),
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
      ),

      array(
          'type' => 'hcode_custom_switch_option',
          'heading' => __('Show Button', 'hcode-addons'),
          'param_name' => 'hcode_show_button',
          'value' => array(__('No', 'hcode-addons') => '0',
                           __('Yes', 'hcode-addons') => '1'
                          ),
          'std' => '1',
          'description' => __( 'Select Yes to show button', 'hcode-addons' ),
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-2') ),
      ),
      array(
          'type'        => 'textfield',
          'heading'     => __('Button Text', 'hcode-addons' ),
          'param_name'  => 'hcode_button_text',
          'value'     => 'Continue Reading',
          'dependency'  => array( 'element' => 'hcode_show_button', 'value' => array('1') ),
      ),
      array(
          'type'        => 'textfield',
          'heading'     => __('Day Format', 'hcode-addons' ),
          'param_name'  => 'hcode_day_format',
          'value'     => 'd',
          'dependency'  => array( 'element' => 'hcode_show_date', 'value' => array('1') ),
          'description' => __( 'Day format should be like dd, <a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">click here</a> to see other formates', 'hcode-addons' ),
      ),
      array(
          'type'        => 'textfield',
          'heading'     => __('Month Format', 'hcode-addons' ),
          'param_name'  => 'hcode_month_format',
          'value'     => 'm',
          'dependency'  => array( 'element' => 'hcode_show_date', 'value' => array('1') ),
          'description' => __( 'Month format should be like mm, <a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">click here</a> to see other formates', 'hcode-addons' ),
      ),
      array(
          'type'        => 'textfield',
          'heading'     => __('Year Format', 'hcode-addons' ),
          'param_name'  => 'hcode_year_format',
          'value'     => 'Y',
          'dependency'  => array( 'element' => 'hcode_show_date', 'value' => array('1') ),
          'description' => __( 'Year format should be like yyyy, <a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">click here</a> to see other formates', 'hcode-addons' ),
      ),
      array(
          'type' => 'textfield',
          'heading' => __('No. of Items Per Slider', 'hcode-addons'),
          'description' => __( 'Define value like 3', 'hcode-addons' ),
          'param_name' => 'hcode_items_per_slider',
          'value' => '5',
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
      ),
      array(
          'type' => 'textfield',
          'heading' => __('No. of Post Per Page (For Desktop Device)', 'hcode-addons'),
          'description' => __( 'Define value like 3', 'hcode-addons' ),
          'param_name' => 'hcode_post_per_page_desktop',
          'value' => '3',
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
          'group' => 'Slider Configuration',
      ),
      array(
          'type' => 'textfield',
          'heading' => __('No. of Post Per Page (For Mini Desktop Device)', 'hcode-addons'),
          'description' => __( 'Define value like 3', 'hcode-addons' ),
          'param_name' => 'hcode_post_per_page_minidesktop',
          'value' => '3',
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
          'group' => 'Slider Configuration',
      ),
      array(
          'type' => 'textfield',
          'heading' => __('No. of Post Per Page (For iPad/Tablet Device)', 'hcode-addons'),
          'description' => __( 'Define value like 2', 'hcode-addons' ),
          'param_name' => 'hcode_post_per_page_ipad',
          'value' => '2',
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
          'group' => 'Slider Configuration',
      ),
      array(
          'type' => 'textfield',
          'heading' => __('No. of Post Per Page (For Mobile Device)', 'hcode-addons'),
          'description' => __( 'Define value like 1', 'hcode-addons' ),
          'param_name' => 'hcode_post_per_page_mobile',
          'value' => '1',
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
          'group' => 'Slider Configuration',
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
          'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-4') ),
          'group' => 'Slider Configuration',
      ),
    array(
        'type' => 'dropdown',
        'heading' => __('Pagination Style', 'hcode-addons'),
        'param_name' => 'show_pagination_style',
        'admin_label' => true,
        'value' => array(__('Select Pagination Style', 'hcode-addons') => '',
                         __('Dot Style', 'hcode-addons') => '0',
                         __('Line Style', 'hcode-addons') => '1',
                         __('Round Style', 'hcode-addons') => '2',
                        ),
        'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
        'group' => 'Slider Configuration',
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Pagination Color Style', 'hcode-addons'),
        'param_name' => 'show_pagination_color_style',
        'admin_label' => true,
        'value' => array(__('Select Pagination Color Style', 'hcode-addons') => '',
                         __('Dark Style', 'hcode-addons') => '0',
                         __('Light Style', 'hcode-addons') => '1',
                        ),
        'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
        'group' => 'Slider Configuration',
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
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3') ),
        'group' => 'Slider Configuration',
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Navigation Style', 'hcode-addons'),
        'param_name' => 'show_navigation_style',
        'admin_label' => true,
        'value' => array(__('Select Navigation Style', 'hcode-addons') => '',
                         __('Next/Prev Black Arrow', 'hcode-addons') => '0',
                         __('Next/Prev White Arrow', 'hcode-addons') => '1'
                        ),
        'dependency' => array( 'element' => 'show_navigation', 'value' => array('1') ),
        'group' => 'Slider Configuration',
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Cursor Color Style', 'hcode-addons'),
        'param_name' => 'show_cursor_color_style',
        'admin_label' => true,
        'value' => array(__('Select Cursor Color Style', 'hcode-addons') => '',
                         __('White Cursor', 'hcode-addons') => 'white-cursor',
                         __('Black Cursor', 'hcode-addons') => 'black-cursor',
                         __('Default Cursor', 'hcode-addons') => 'no-cursor',
                        ),
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
        'group' => 'Slider Configuration',
    ),
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Loop', 'hcode-addons'),
        'param_name' => 'loop',
        'value' => array(__('NO', 'hcode-addons') => '0', 
                         __('YES', 'hcode-addons') => '1'
                        ),
        'description' => __( 'Select YES to loop in slider', 'hcode-addons' ),
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3') ),
        'group' => 'Slider Configuration',
    ),
    array(
        'type' => 'dropdown',
        'heading' => __('Slide Delay Time', 'hcode-addons'),
        'param_name' => 'autoplay',
        'admin_label' => true,
        'value' => array( __('Slide Delay Time', 'hcode-addons') => '',
                          __('1000', 'hcode-addons') => '1000',
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
        'description' => __('Select slide delay time (1s = 1000)', 'hcode-addons'),
        'std' => '3000',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
        'group' => 'Slider Configuration',
    ),
    array(
       'type'        => 'textfield',
       'heading'     => __('Custom Slide Delay Time', 'hcode-addons' ),
       'description' => __('Add custom slide delay time to this slider. Like "2000"', 'hcode-addons' ),
       'param_name'  => 'custom_slidespeed',
       'dependency' => array( 'element' => 'autoplay', 'value' => 'custom' ),
       'group' => 'Slider Configuration',
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
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
        'group' => 'Slider Configuration',
    ),
    array(
       'type'        => 'textfield',
       'heading'     => __('Custom Slide Speed', 'hcode-addons' ),
       'description' => __('Add custom slide speed to this slider. Like "2000"', 'hcode-addons' ),
       'param_name'  => 'custom_slidedelay',
       'dependency' => array( 'element' => 'slidedelay', 'value' => 'custom' ),
       'group' => 'Slider Configuration',
    ),
    array(
      'type'        => 'hcode_button_settings',
      'param_name'  => 'one_button_config',
      'heading'     => esc_html__( 'Button Configuration', 'hcode-addons' ),
      'group' => 'Button Configuration',
      'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-2') ),
      'description' => __( 'You can easily set button text-transform, font-size, line-height, letter-spacing for all devices ', 'hcode-addons' ),
      'hide_font_settings_element'=>array('icon-color','icon-hover-color')
    ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Title Color', 'hcode-addons' ),
        'param_name' => 'hcode_title_color',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Subtitle Color', 'hcode-addons' ),
        'param_name' => 'hcode_subtitle_color',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-4') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Day Color', 'hcode-addons' ),
        'param_name' => 'hcode_day_color',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-4') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Month Color', 'hcode-addons' ),
        'param_name' => 'hcode_month_color',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-4') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Year Color', 'hcode-addons' ),
        'param_name' => 'hcode_year_color',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-4') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Separator Color', 'hcode-addons' ),
        'param_name' => 'hcode_seperator_color',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-4') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'textfield',
        'heading' => __('Separator Height', 'hcode-addons'),
        'description' => __( 'Define height like 2px', 'hcode-addons' ),
        'param_name' => 'hcode_seperator_height',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-4') ),
        'group' => 'Style',
      ),
      array(
        'type' => 'colorpicker',
        'class' => '',
        'heading' => __( 'Meta Color', 'hcode-addons' ),
        'param_name' => 'hcode_meta_color',
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3') ),
        'group' => 'Style',
      ),
      array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_title_font',
        'heading'     => esc_html__( 'Font Settings For Title', 'hcode-addons' ),
        'dependency' => array( 'element' => 'hcode_show_post_title', 'value' => array('1') ),
        'group' => 'Font Settings',
      ),
      array(
        'type'        => 'responsive_font_settings',
        'param_name'  => 'hcode_responsive_postmeta_font',
        'heading'     => esc_html__( 'Font Settings For Post Meta', 'hcode-addons' ),
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3') ),
        'group' => 'Font Settings',
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Display Items Order by', 'hcode-addons' ),
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
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
        'group' => 'Order'
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Display Items Sort by', 'hcode-addons' ),
        'param_name' => 'order',
        'value' => array(__('Select Sort by', 'hcode-addons') => '',
                         __( 'Descending', 'hcode-addons' ) => 'DESC',
                         __( 'Ascending', 'hcode-addons' ) => 'ASC',
                        ),
        'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
        'group' => 'Order'
      ),
      array(
          'type' => 'hcode_custom_srcset',
          'param_name' => 'hcode_image_srcset',
          'heading' => __('Image SRCSET', 'hcode-addons' ),
          'value' => 'full',
          'dependency'  => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3') ),
          'group' => 'SRCSET',
      ),
      array(
       'type'        => 'textfield',
       'heading'     => __('Slider ID', 'hcode-addons' ),
       'param_name'  => 'hcode_post_slider_id',
       'description' => 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
       'value'       => $post_slider_time,
       'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
       'group'       => 'Slider ID & Class'
      ),  
      array(
       'type'        => 'textfield',
       'heading'     => __('Slider Extra Class', 'hcode-addons' ),
       'description' => 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2"',
       'param_name'  => 'hcode_post_slider_class',
       'dependency' => array( 'element' => 'show_blog_slider_style', 'value' => array('blog-slider-1','blog-slider-2','blog-slider-3','blog-slider-4') ),
       'group'       => 'Slider ID & Class'
      ),
    ),
) );