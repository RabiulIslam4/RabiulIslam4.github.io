<?php
/**
 * The main template file For H-Code Theme Addons.
 *
 * @package H-Code
 */
?>
<?php
/**
 * Defind Class 
 */

defined('HCODE_SHORTCODE_ADDONS_URI') or define('HCODE_SHORTCODE_ADDONS_URI', HCODE_ADDONS_ROOT.'/hcode-shortcodes');
defined('HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER') or define('HCODE_SHORTCODE_ADDONS_EXTEND_COMPOSER', HCODE_SHORTCODE_ADDONS_URI.'/extend-composer');
defined('HCODE_SHORTCODE_ADDONS_SHORTCODE_URI') or define('HCODE_SHORTCODE_ADDONS_SHORTCODE_URI', HCODE_SHORTCODE_ADDONS_URI.'/shortcode');
defined('HCODE_SHORTCODE_ADDONS_MAP_URI') or define('HCODE_SHORTCODE_ADDONS_MAP_URI', HCODE_SHORTCODE_ADDONS_URI.'/shortcode-map');
defined('HCODE_SHORTCODE_ADDONS_PREVIEW_IMAGE') or define('HCODE_SHORTCODE_ADDONS_PREVIEW_IMAGE', HCODE_ADDONS_ROOT_DIR.'/hcode-shortcodes/images/preview-images');
defined('HCODE_PLUGIN_IMAGES_URI') or define('HCODE_PLUGIN_IMAGES_URI', HCODE_ADDONS_ROOT_DIR.'/hcode-shortcodes/images');

if( !class_exists( 'Hcode_Shortcodes_Addons' ) ) {
  class Hcode_Shortcodes_Addons {

    // Construct
    public function __construct() {
      
      // Load Required Style For Addons.
      add_action( 'init', array( $this, 'init' ) );
    }

    public function init() {
      require_once( HCODE_ADDONS_ROOT.'/hcode-shortcodes/hcode-excerpt.php' );
      require_once( HCODE_ADDONS_ROOT.'/hcode-shortcodes/hcode-shortcode-addons-share.php' );
      require_once( HCODE_ADDONS_ROOT.'/hcode-shortcodes/hcode-shortcode-addons-post-like.php' );

      add_action( 'admin_enqueue_scripts', array($this,'load_custom_wp_admin_style') );
      add_action( 'admin_print_scripts-post.php',   array($this, 'load_custom_wp_admin_style'), 99);
      add_action( 'admin_print_scripts-post-new.php', array($this, 'load_custom_wp_admin_style'), 99);

      if( class_exists( 'Vc_Manager' ) ) {
        // Action For Add H-Code Maps And Shortcode In VC.
        add_action( 'init', array( $this, 'hcode_addons_init' ), 40 );
      }
    }

    public function load_custom_wp_admin_style() {
      // Enqueue Custom JS For WP Admin.
      wp_enqueue_script( 'hcode-custom-script',   HCODE_ADDONS_ROOT_DIR . '/hcode-shortcodes/js/custom.js' , array('jquery'), '1.0.0', true );
    }
    
    public function hcode_addons_init() {
        $this->hcode_addons_vc_set_default_post_type();
        // Load Shortcode For H-Code Theme.
        $this->hcode_addons_vc_load_shortcodes();
        // Load Custom Maps.php For VC.
        $this->hcode_addons_vc_integration();
    }

    public function hcode_addons_vc_set_default_post_type() {
        global $vc_manager;
          
        $list = array( 'page', 'post', 'portfolio');
        $hcode_vc_default_set = $vc_manager->editorPostTypes();
        $hcode_vc_default_get = get_option( 'hcode_set_default_vc_post_type' );
        if( ( $hcode_vc_default_get != 'yes' ) && ( count($hcode_vc_default_set) == 1 )  && ( $hcode_vc_default_set[0] == 'page') ) {
            $finalArray = array_unique( array_merge( $hcode_vc_default_set, $list ) );
            sleep(1);
            $vc_manager->setEditorPostTypes( $finalArray );
            add_option( 'hcode_set_default_vc_post_type', 'yes' );
        }
    }
    
    public function hcode_addons_vc_load_shortcodes() {
      require_once( HCODE_SHORTCODE_ADDONS_URI . '/shortcodes.php' );
    }

    public function hcode_addons_vc_integration() {
      require_once( HCODE_SHORTCODE_ADDONS_URI . '/maps.php' );
      
    }
  } // end of class

$Hcode_Shortcodes_Addons = new Hcode_Shortcodes_Addons();
} // end of class_exists