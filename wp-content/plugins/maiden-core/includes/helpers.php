<?php

defined( 'ABSPATH' ) or exit;

if (!function_exists('maiden_wpc_date')) {
	function maiden_wpc_date($settings, $value) {
	    return '<div class="date-group">'
	           . '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-date ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="text" value="' . $value . '"/>'
	           . '</div>';
	}
}

/*if ( function_exists('vc_add_shortcode_param') ) {
	vc_add_shortcode_param('wpc_date', 'maiden_wpc_date', get_template_directory_uri() . '/assets/js/date.js');
}*/

if ( ! function_exists( 'maiden_wpc_date_style' ) ) {
	function maiden_wpc_date_style() {
	    wp_enqueue_script('jquery-ui-datepicker' );
	}
}
add_action( 'admin_enqueue_scripts', 'maiden_wpc_date_style' );

/* Get all template shortcodes */
if ( ! function_exists( 'vc_get_shortcode_template' ) ) {

	function vc_get_shortcode_template($shortcode_name)
	{	
		$default_headers = array(
			'Template' => 'Template',
			'Version' => 'Version',
		);

		$templates = array();
		if (!empty($shortcode_name)) {
			$template_dir = vcs_locate_template( array( $shortcode_name ),'',false);
			$directories = glob( $template_dir .'/*' , GLOB_ONLYDIR);

			$data = array();
			foreach ($directories as $key => $directory) {

				if (basename( $directory ) == 'assets') continue;

				if (file_exists($directory . '/index.php')) {
					$data = get_file_data($directory . '/index.php', $default_headers);
				}
				if (basename( $directory ) ) 
				if (empty($data['Template'])) {
					$data['Template'] = 'Style ' . ($key+1);
				}
				$templates[$data['Template']] = basename( $directory );
			}
		}
		return $templates;
	}
}

if ( ! function_exists( 'vcs_load_template' ) ) {
	function vcs_load_template( $_template_file, $require_once = true, $data = '' ) {
		global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

		if ( is_array( $wp_query->query_vars ) ) {
			extract( $wp_query->query_vars, EXTR_SKIP );
		}

		if ( isset( $s ) ) {
			$s = esc_attr( $s );
		}

		if ( $require_once ) {
			require_once( $_template_file );
		} else {
			require( $_template_file );
		}
	}
}

if ( ! function_exists( 'vcs_locate_template' ) ) {
	function vcs_locate_template( $template_names, $data = '', $load = true, $require_once = false ) {
		// No file found yet
		$located = false;

		// get dir current plugin
		$plugin_dir = '';
		if ( class_exists('Maiden_Core') ) {
			$plugin_dir = Maiden_Core::maiden_plugin_dir();
		}
	 
		// Try to find a template file
		foreach ( (array) $template_names as $template_name ) {
	 
			// Continue if template is empty
			if ( empty( $template_name ) )
				continue;
	 
			// Trim off any slashes from the template name
			$template_name = apply_filters('vcs_locate_template_name', ltrim( $template_name, '/' ));
	 
			// Check child theme first
			if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'maiden_templates/' . $template_name ) ) {
				$located = trailingslashit( get_stylesheet_directory() ) . 'maiden_templates/' . $template_name;
				break;
	 
			// Check parent theme next
			} elseif ( file_exists( trailingslashit( get_template_directory() ) . 'maiden_templates/' . $template_name ) ) {
				$located = trailingslashit( get_template_directory() ) . 'maiden_templates/' . $template_name;
				break;
	 
			// Check theme compatibility last
			} elseif ( file_exists( trailingslashit( $plugin_dir ) . 'shortcodes/' . $template_name ) ) {
				$located = trailingslashit( $plugin_dir ) . 'shortcodes/' . $template_name;
				break;
			}
		}

		$located = apply_filters('maiden_templates_locate', $located );
	 	
		if ( ( true == $load ) && ! empty( $located ) )
			vcs_load_template( $located, $require_once, $data );
	 
		return $located;
	}

}

/*
* AJAX call to save the order for Front Page Sections
*/
if (!function_exists('maiden_save_sortable')) {
	function maiden_save_sortable() {
		$items = $_POST['items'];
		if ( is_array( $items ) ) {
			update_option( 'maiden_sortable_items', $items );
			wp_send_json_success();
		}else{
			wp_send_json_error();
		}
		die();
	}
}
add_action( 'wp_ajax_nopriv_maiden_save_sortable', 'maiden_save_sortable' );
add_action( 'wp_ajax_maiden_save_sortable', 'maiden_save_sortable' );

if (!function_exists('maiden_get_all_options')) {
	function maiden_get_all_options(  ) {
		return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( get_option( 'maiden_themes_options' ) ), 9 ) ) ), '+/', '-_' ), '=' );
	}
} 