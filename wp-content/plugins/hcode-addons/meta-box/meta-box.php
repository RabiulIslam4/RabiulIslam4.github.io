<?php
/**
 * Metabox Class Fill.
 *
 * @package H-Code
 */
?>
<?php
/**
 * Calls the class on the post edit screen.
 */
if ( ! function_exists( 'Hcode_Meta_Boxes' ) ) :
	function Hcode_Meta_Boxes() {
	    new hcodeMetaboxes();
	}
endif;

if ( is_admin() ) {
    add_action( 'load-post.php', 'Hcode_Meta_Boxes' );
    add_action( 'load-post-new.php', 'Hcode_Meta_Boxes' );
}

/** 
 * The hcodeMetaboxes Class.
 */
if (!class_exists('hcodeMetaboxes')) {
	class hcodeMetaboxes {

		/**
		 * Hook into the appropriate actions when the class is constructed.
		 */
		public function __construct() {
			$this->hcode_metabox_addons();
			add_action( 'add_meta_boxes', array( $this, 'hcode_add_meta_boxs' ) );
			add_action( 'save_post', array( $this, 'hcode_save_meta_box' ) );
			add_action('admin_enqueue_scripts', array($this, 'hcode_admin_script_loader'));

			/* Portfolio */
			add_action( 'add_meta_boxes', array( $this, 'hcode_add_meta_boxs_portfolios' ) );
			

		}

		/**
		 * Adds the meta box functions container.
		 */
		public function hcode_metabox_addons(){
			require_once( HCODE_ADDONS_ROOT . '/meta-box/meta-box-maps.php' );
		}

		/**
		 * Adds the meta box container.
		 */
		public function hcode_add_meta_boxs( $post_type ) {
			$post_types = array('post', 'page', 'portfolio');     //limit meta box to certain post types
			$flag = false;
	        if ( in_array( $post_type, $post_types )){
	           	$flag = true;
	        }
	        if($flag == true){
		        $this->hcode_add_meta_box('hcode_admin_options', 'H-Code '.ucfirst($post_type).' Settings', $post_type);
		    }

		}

		public function hcode_add_meta_box($id, $label_name, $post_type)
		{
			add_meta_box(
				$id
				,$label_name
				,array( $this, $id )
				,$post_type
				
			);
		}

		public function hcode_admin_options()
		{
			global $post;
			if($post->post_type == 'post' || $post->post_type == 'portfolio'){
				$hcode_tabs_title = array('Layout Settings', 'Header', 'Menu', 'Page Title', 'Comments Settings','Footer Wrapper', 'Footer', 'Single '.ucfirst( $post->post_type ).' Settings');
				$hcode_tabs_sub_title = array('', 'Header section configuration settings', '', '', 'Enable/Disable comments in '.$post->post_type,'', 'Footer section configuration settings', '');
				$hcode_page_tabs = array('Layout Settings', 'Header', 'Menu', 'Page Title', 'Comments Settings', 'Footer Wrapper','Footer', 'Single '.ucfirst( $post->post_type ).' Layout');
				$hcode_page_tab_content = array('layout_settings', 'header', 'menu', 'title_wrapper', 'content', 'footer_wrapper','footer', 'single_post_layout');
			}else{
				$hcode_tabs_title = array('Layout Settings', 'Header', 'Menu', 'Page Title', 'Comments Settings', 'Footer Wrapper', 'Footer');
				$hcode_tabs_sub_title = array('', 'Header section configuration settings', '', '', 'Enable/Disable comments in page', '', 'Footer section configuration settings');
				$hcode_page_tabs = array('Layout Settings', 'Header', 'Menu', 'Page Title', 'Comments Settings', 'Footer Wrapper', 'Footer');
				$hcode_page_tab_content = array('layout_settings', 'header', 'menu', 'title_wrapper', 'content','footer_wrapper', 'footer');
			}

			$icon_class = array('icon-gears','fas fa-heading','fas fa-bars', 'el el-icon-website', 'fas fa-align-left', 'fas fa-server', 'el el-icon-website icon-rotate', 'far fa-list-alt');
			echo '<ul class="hcode_meta_box_tabs">';
			$icon = 0;
			$showicon = '';
				foreach( $hcode_page_tabs as $tab_key => $tab_name ) {
					if($icon_class){
						$showicon = '<i class="'.$icon_class[$icon].'"></i>';
					}
					echo '<li class="hcode_tab_'.$hcode_page_tab_content[$tab_key].'"><a href="'.$tab_name.'">'.$showicon.'<span class="group_title">'.$tab_name.'</span></a></li>';
					$icon++;
				}
			echo '</ul>';

			echo '<div class="hcode_meta_box_tab_content">';
			echo '<button type="button" name="hcode_meta_options_section_reset_all" id="hcode_meta_options_section_reset_all" class="button button-primary hcode-reset-section-all">'.esc_html__('Reset All', 'hcode-addons' ).'</button>';
			foreach( $hcode_page_tab_content as $tab_content_key => $tab_content_name ) {
				echo '<div class="hcode_meta_box_tab" id="hcode_tab_'.$tab_content_name.'">';
					echo '<button type="button" name="hcode_meta_options_section_reset" id="hcode_meta_options_section_reset" class="button button-primary hcode-reset-section" data-reset-section="'.$hcode_tabs_title[$tab_content_key].'">'.esc_html__('Reset Section', 'hcode-addons' ).'</button>';
					echo "<div class='main_tab_title'>";
						echo "<h3>".$hcode_tabs_title[$tab_content_key]."</h3>";
						echo "<span class='description'>".$hcode_tabs_sub_title[$tab_content_key]."</span>";
					echo "</div>";
					require_once( 'metabox-tabs/metabox_'.$tab_content_name.'.php' );
				echo '</div>';
			}
			echo '</div>';
			echo '<div class="clear"></div>';
		}


		/**
		 * Adds the meta box for Portfolio.
		 */
		public function hcode_add_meta_boxs_portfolios( $post_type ) {
			$post_types = array('portfolio','post');     //limit meta box to certain post types
			$flag = false;
	        if ( in_array( $post_type, $post_types )){
	           	$flag = true;
	        }
	        if($flag == true){
		        $this->hcode_add_meta_box('hcode_admin_options_single', 'H-Code '.ucfirst($post_type).' Format Settings', $post_type);
		    }

		}

		public function hcode_add_meta_boxs_portfolio($id, $label_name, $post_type) {
			add_meta_box(
				$id
				,$label_name
				,array( $this, $id )
				,$post_type
				,'advanced'
				,'high'
			);
		}

		public function hcode_admin_options_single() {
	        global $post;
			echo '<div class="hcode_meta_box_tab_content_single">';
				if( $post->post_type == 'portfolio' ){
					echo '<input name="hcode_portfolio_post_type_single" id="hcode_portfolio_post_type_single" type="hidden" value="" />';
				}
				echo '<div class="hcode_meta_box_tab" id="hcode_tab_single">';
				echo '</div>';
	                if($post->post_type == 'post'):
	                    require_once( 'metabox-tabs/metabox_post_setting.php' );
	                else:
	                    require_once( 'metabox-tabs/metabox_portfolio_setting.php' );
	                endif;
			echo '</div>';
			echo '<div class="clear"></div>';
		}
		/**
		 * Save the meta when the post is saved.
		 *
		 * @param int $post_id The ID of the post being saved.
		 */
		public function hcode_save_meta_box( $post_id ) {
		
			// If this is an autosave, our form has not been submitted,
	        // so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
				return $post_id;

			/* OK, its safe for us to save the data now. */
			$data = array();
			foreach ( $_POST as $key => $value ) {
				if ( strstr( $key, 'hcode_') ) {
					if( $key == 'hcode_quote_single' ) {
					    // Sanitize the textarea and allow html tags.
					    $data = sanitize_text_field( htmlentities( $_POST[$key] ) );
					} else {
					    // Sanitize the text fields.
					    $data = sanitize_text_field( $_POST[$key] );
					}
					// Update the meta field.
					update_post_meta( $post_id, $key, $data );
				}
			}
		}

		public function hcode_admin_script_loader() {
			global $pagenow;
			if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
		   		wp_enqueue_style('thickbox');
		   		wp_register_script('alpha-color-picker', HCODE_ADDONS_ROOT_DIR.'/meta-box/js/alpha-color-picker.js', array('jquery', 'wp-color-picker'), '1.0' );
		   		wp_enqueue_script('alpha-color-picker');
		   		wp_register_style('alpha-color-picker', HCODE_ADDONS_ROOT_DIR.'/meta-box/css/alpha-color-picker.css', array('wp-color-picker'), '1.0' );
		   		wp_enqueue_style('alpha-color-picker');
		   		wp_register_script('hcode-admin-metabox-cookie-js', HCODE_ADDONS_ROOT_DIR.'/meta-box/js/metabox-cookie.js', array('jquery'), '1.0');
		   		wp_enqueue_script('hcode-admin-metabox-cookie-js');
		   		wp_register_script('hcode-admin-metabox-js', HCODE_ADDONS_ROOT_DIR.'/meta-box/js/meta-box.js', array('jquery'), '1.0');
				wp_enqueue_script('hcode-admin-metabox-js');
				wp_localize_script( 'hcode-admin-metabox-js', 'hcode_admin_meta_box', array(
					'reset_meta_message' => sprintf( __( 'This will remove / clear all %1$s for this page and then it will use settings from Theme Settings. Are you sure to clear %1$s?', 'hcode-addons' ), '###' ), 'reset_all_meta_message' => esc_html__( 'This will remove / clear All Sections for this page and then it will use settings from Theme Settings. Are you sure to clear?', 'hcode-addons' )
				) );
		   		wp_register_style('hcode-admin-metabox', HCODE_ADDONS_ROOT_DIR . '/meta-box/css/meta-box.css',null, '1.0');
		   		wp_enqueue_style('hcode-admin-metabox');
			}
		}
	}
}