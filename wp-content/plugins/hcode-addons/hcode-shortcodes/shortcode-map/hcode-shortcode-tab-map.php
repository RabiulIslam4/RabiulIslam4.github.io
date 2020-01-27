<?php
/**
 * Map For Tabs
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tabs */
/*-----------------------------------------------------------------------------------*/

$tab_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_id_2 = time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => __( 'Tabs', 'hcode-addons' ),
  'base' => 'vc_tabs',
  'category' => 'H-Code',
  'show_settings_on_create' => false,
  'is_container' => true,
  'icon' => 'icon-wpb-ui-tab-content',
  //'category' => __( 'Content', 'hcode-addons' ),
  'description' => __( 'Place Tabbed Content', 'hcode-addons' ),
  'params' => array(
    array(
        'type' => 'dropdown',
        'heading' => __('Tabs Style', 'hcode-addons'),
        'param_name' => 'tabs_style',
        'admin_label' => true,
        'class' => 'hcode_select_preview_image',
        'value' => array(__('Select Tabs Style', 'hcode-addons') => '',
                         __('Tab Style1', 'hcode-addons') => 'tab-style1',
                         __('Tab Style2', 'hcode-addons') => 'tab-style2', 
                         __('Tab Style3', 'hcode-addons') => 'tab-style3', 
                         __('Tab Style4', 'hcode-addons') => 'tab-style4',
                         __('Tab Style5', 'hcode-addons') => 'tab-style5',
                         __('Animated Tab1', 'hcode-addons') => 'animated-tab1',
                         __('Animated Tab2', 'hcode-addons') => 'animated-tab2',
                         __('Animated Tab3', 'hcode-addons') => 'animated-tab3',
                         __('Animated Tab4', 'hcode-addons') => 'animated-tab4',
                        ),
    ),
    array(
        'type' => 'hcode_preview_image',
        'heading' => __('Select pre-made style for tab', 'hcode-addons'),
        'param_name' => 'tab_preview_image',
    ),
    array(
        'type' => 'hcode_custom_switch_option',
        'class' => '',
        'heading' => __('Show Separator', 'hcode-addons'),
        'param_name' => 'hcode_tab_show_separator',
        'value' => array(__('OFF', 'hcode-addons') => '0', 
                         __('ON', 'hcode-addons') => '1'
                        ),
        'dependency' => array( 'element' => 'tabs_style', 'value' => array('animated-tab4') ),
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'heading' => __('Flexible Tab', 'hcode-addons'),
      'param_name' => 'hcode_flexible_tab',
      'value' => array(__('NO', 'hcode-addons') => '0',
                       __('YES', 'hcode-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array('animated-tab1','animated-tab2','animated-tab4') ),
    ),
    array(
        'type' => 'textfield',
        'heading' => __( 'Active Tab', 'hcode-addons' ),
        'param_name' => 'active_tab',
        'value' => '1',
        'group' => 'Tab Style',
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'tabs_alignment',
      'heading' => __('Tabs Alignment', 'hcode-addons' ),
      'value' => array(__('No Align', 'hcode-addons') => '',
                       __('Left Align', 'hcode-addons') => 'text-left',
                       __('Right Align', 'hcode-addons') => 'text-right',
                       __('Center Align', 'hcode-addons') => 'text-center',
                      ),
      'description' => __( 'Alignment', 'hcode-addons' ),
      'group' => 'Tab Style',
    ),
    $hcode_vc_extra_id,
    $hcode_vc_extra_class,
  ),
  'custom_markup' => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
                      <ul class="tabs_controls">
                      </ul>
                      %content%
                      </div>',
  'default_content' => '[vc_tab title="' . __( 'Tab 1', 'hcode-addons' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
                        [vc_tab title="' . __( 'Tab 2', 'hcode-addons' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]',
  'js_view' => 'VcTabsView'
) );

vc_map( array(
  'name' => __( 'Tab', 'hcode-addons' ),
  'base' => 'vc_tab',
  'category' => 'H-Code',
  'allowed_container_element' => 'vc_row',
  'is_container' => true,
  'content_element' => false,
  'params' => array(
    array(
        'type' => 'tab_id',
        'heading' => __( 'Tab ID', 'hcode-addons' ),
        'param_name' => 'tab_id'
    ),
    array(
        'type' => 'textfield',
        'admin_label' => true,
        'heading' => __( 'Tab Title', 'hcode-addons' ),
        'param_name' => 'title',
        'value' => '',
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'heading' => __('Custom Tab Icon', 'hcode-addons'),
      'param_name' => 'custom_tab_icon',
      'value' => array(__('NO', 'hcode-addons') => '0',
                       __('YES', 'hcode-addons') => '1'
                      ),
    ),
    array(
      'type' => 'attach_image',
      'heading' => __('Custom Tab Icon Image', 'hcode-addons'),
      'param_name' => 'custom_tab_icon_image',
      'dependency' => array( 'element' => 'custom_tab_icon', 'value' => '1' ),
      'description' => __( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Medium - 40px X 40px, Small - 25px X 25px, Extra Small - 18px X 18px', 'hcode-addons' ),
    ),
    array(
        'type' => 'hcode_icon',
        'heading' => __('Select Tab Icon', 'hcode-addons'),
        'param_name' => 'tab_icon',
        'dependency' => array( 'element' => 'custom_tab_icon', 'value' => '0' ),
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'heading' => __('Show Tab Title', 'hcode-addons'),
      'param_name' => 'show_title',
      'value' => array(__('NO', 'hcode-addons') => '0',
                       __('YES', 'hcode-addons') => '1'
                      ),
    ),
    array(
      'type' => 'hcode_custom_switch_option',
      'heading' => __('Show Tab Icon / Image', 'hcode-addons'),
      'param_name' => 'show_icon',
      'value' => array(__('NO', 'hcode-addons') => '0',
                       __('YES', 'hcode-addons') => '1'
                      ),
    ),
    array(
      'type' => 'responsive_font_settings',
      'param_name' => 'hcode_tab_title_font_settings',
      'heading' => esc_html__( 'Title', 'hcode-addons' ),
      'dependency' => array( 'element' => 'show_title', 'value' => '1' ),
      'hide_font_settings_element_lg' => array('text-align'),
      'hide_font_settings_element_md' => array('text-align'),
      'hide_font_settings_element_sm' => array('text-align'),
      'hide_font_settings_element_xs' => array('text-align'),
      'group' => 'Font Settings',
    ),
    array(
        'type' => 'hcode_custom_srcset',
        'param_name' => 'hcode_icon_image_srcset',
        'heading' => __('Icon Image SRCSET', 'hcode-addons' ),
        'value' => 'full',
        'dependency' => array( 'element' => 'custom_tab_icon', 'value' => '1' ),
        'group' => 'SRCSET',
    ),
  ),
  'js_view' => 'VcTabView'
) );