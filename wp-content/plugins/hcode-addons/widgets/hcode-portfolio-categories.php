<?php
/**
 * @package H-Code
 */
?>
<?php
if (!class_exists('hcode_portfolio_categories_widget')) {
	class hcode_portfolio_categories_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'hcode_portfolio_categories_widget',
			esc_html__('H-Code Portfolio Categories', 'hcode-addons'),
			array( 'description' => esc_html__( 'A list or dropdown of categories.', 'hcode-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
			static $first_dropdown = true;

			$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Portfolio Categories', 'hcode-addons' );
			
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$c = ! empty( $instance['count'] ) ? '1' : '0';
			$h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
			$d = ! empty( $instance['dropdown'] ) ? '1' : '0';

			echo $args['before_widget'];

			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			$cat_args = array(
				'orderby'      => 'name',
				'show_count'   => $c,
				'hierarchical' => $h,
			);

			if ( $d ) {
				echo sprintf( '<form action="%s" method="get">', esc_url( home_url() ) );
					$dropdown_id = ( $first_dropdown ) ? 'portfolio_cat' : "{$this->id_base}-dropdown-{$this->number}";
					$first_dropdown = false;

					echo '<label class="screen-reader-text" for="' . esc_attr( $dropdown_id ) . '">' . $title . '</label>';

					$cat_args['show_option_none'] = __( 'Select Category', 'hcode-addons' );
					$cat_args['id'] = $dropdown_id;

					hcode_portfolio_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $cat_args, $instance ) );
				echo '</form>';
				?>

				<script type='text/javascript'>
				/* <![CDATA[ */
				(function() {
					jQuery( '.portfolio_categories' ).change( function() {
						if ( jQuery(this).val() != '' ) {
							var this_page = '';
							var home_url  = "<?php echo esc_js( home_url( '/' ) ) ?>";
							if ( home_url.indexOf( '?' ) > 0 ) {
								this_page = home_url + '&portfolio-category=' + jQuery(this).val();
							} else {
								this_page = home_url + '?portfolio-category=' + jQuery(this).val();
							}
							location.href = this_page;
						}
					});
				})();
				/* ]]> */
				</script>

				<?php
			} else {
				?>
					<ul>
				<?php
						$cat_args['title_li'] = '';
						$cat_args['taxonomy'] = 'portfolio-category';
						wp_list_categories( apply_filters( 'widget_categories_args', $cat_args, $instance ) );
				?>
					</ul>
				<?php
			}

			echo $args['after_widget'];
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
			$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
			$instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

			return $instance;
		}

		public function form( $instance ) {
			//Defaults
			$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
			$title = sanitize_text_field( $instance['title'] );
			$count = isset($instance['count']) ? (bool) $instance['count'] :false;
			$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
			$dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'hcode-addons' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

			<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
			<label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e( 'Display as dropdown', 'hcode-addons' ); ?></label><br />

			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', 'hcode-addons' ); ?></label><br />

			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
			<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy', 'hcode-addons' ); ?></label></p>
			<?php
		}
	}
}

// Register and load H-Code custom widget
if ( ! function_exists( 'hcode_portfolio_categories' ) ) :
	function hcode_portfolio_categories() {
		register_widget( 'hcode_portfolio_categories_widget' );
	}
endif;
add_action( 'widgets_init', 'hcode_portfolio_categories' );