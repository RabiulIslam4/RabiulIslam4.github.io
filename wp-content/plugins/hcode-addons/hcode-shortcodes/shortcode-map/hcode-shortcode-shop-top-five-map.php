<?php
/**
 * Map For Shop Top Five
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Shop Top Five Block */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Special Product Block', 'hcode-addons'),
  'description' => __( 'Place a special product block', 'hcode-addons' ),  
  'icon' => 'h-code-shortcode-icon fas fa-th-large',
  'base' => 'hcode_shop_top_five',
  'category' => 'H-Code',
  'params' => array(
    $hcode_vc_extra_id,
    $hcode_vc_extra_class,
  )
) );