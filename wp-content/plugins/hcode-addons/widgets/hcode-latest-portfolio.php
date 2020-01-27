<?php
/**
 * @package H-Code
 */
?>
<?php
/*******************************************************************************/
/* Start Recent Portfolio With Image Thumb  */
/*******************************************************************************/
if (!class_exists('hcode_recent_portfolio_widget')) {
	class hcode_recent_portfolio_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'hcode_recent_portfolio_widget',
			esc_html__( 'H-Code Recent Portfolio Widget', 'hcode-addons' ),
			array( 'description' => esc_html__( 'Your site most recent Portfolios.', 'hcode-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
		    
		    $hcode_options = get_option( 'hcode_theme_setting' );
			$hcode_no_image = (isset($hcode_options['hcode_no_image'])) ? $hcode_options['hcode_no_image'] : '';
	        $postperpage =  $instance['postperpage'] ;
	        $thumbnail = $instance['thumbnail'] ;
	        $hcode_portfolio_title = isset( $instance['hcode_portfolio_title'] ) ? $instance['hcode_portfolio_title'] : 'on' ;
	        $hcode_portfolio_author = isset( $instance['hcode_portfolio_author'] ) ? $instance['hcode_portfolio_author'] : 'on' ;
	        $hcode_portfolio_date = isset( $instance['hcode_portfolio_date'] ) ? $instance['hcode_portfolio_date'] : 'on' ;
	        $hcode_portfolio_date_format = isset( $instance['hcode_portfolio_date_format'] ) ? $instance['hcode_portfolio_date_format'] : 'd F' ;
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];
			
			$hcode_recent_portfolio = array(
				'post_type' => 'portfolio', 
				'posts_per_page' => $postperpage
				);
			$the_query = new WP_Query( $hcode_recent_portfolio );
			$img_url = '';
			
			if ( $the_query->have_posts() ) {
				echo '<div class="widget-body">';
					echo '<ul class="widget-posts">';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$hcode_portfolio_meta_array = array();

						$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
						if( $url ){
							$img_url = $url;
						}else{
							$img_url = $hcode_no_image['url'];
						}
						echo '<li class="clearfix">';
							if($thumbnail == 'on'){
								echo '<a href="'.get_permalink().'">';
								if ( has_post_thumbnail() ) {
					                the_post_thumbnail( 'recent-posts-thumb' );
					            } elseif( !empty( $hcode_no_image['url'] ) ) {

					            	$no_image_id = $hcode_no_image['id'];
					            	$thumb_no_image = wp_get_attachment_image_src($no_image_id, 'full');

					                $srcset_no_image = $srcset_data_no_image = $sizes_no_image = $sizes_data_no_image = '';
					                $srcset_no_image = wp_get_attachment_image_srcset( $no_image_id, 'full' );
					                if( $srcset_no_image ){
					                    $srcset_data_no_image = ' srcset="'.esc_attr( $srcset_no_image ).'"';
					                }

					                $sizes_no_image = wp_get_attachment_image_sizes( $no_image_id, 'full' );
					                if( $sizes_no_image ){
					                    $sizes_data_no_image = ' sizes="'.esc_attr( $sizes_no_image ).'"';
					                }
					                echo '<img src="'.$thumb_no_image[0].'" width="'.$thumb_no_image[1].'" height="'.$thumb_no_image[2].'" alt="'.__( 'No Image', 'hcode-addons' ).'"'.$srcset_data_no_image.$sizes_data_no_image.' />';
					            }
								echo '</a>';
							}
							echo '<div class="widget-posts-details">';
								if( $hcode_portfolio_title == 'on' ) {
									echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
								}

								if( $hcode_portfolio_author == 'on' ) {
									$hcode_portfolio_meta_array[] = get_the_author();
								}
								if( $hcode_portfolio_date == 'on' && $hcode_portfolio_date_format != '' ) {
									$hcode_portfolio_meta_array[] = get_the_date( $hcode_portfolio_date_format, get_the_ID() );
								}

								if( !empty( $hcode_portfolio_meta_array ) ) {
                                   $hcode_portfolio_meta_list = implode( " - ", $hcode_portfolio_meta_array );
                                   echo $hcode_portfolio_meta_list;
                                }


							echo '</div>';
						echo '</li>';
					}
					wp_reset_postdata();
					echo '</ul>';
				echo '</div>';
	        }
	        echo $args['after_widget'];
		}
			
		// Widget Backend 
		public function form( $instance ) {
			$title = (isset($instance[ 'title' ])) ? $instance[ 'title' ] : '';
			$postperpage = (isset($instance[ 'postperpage' ])) ? $instance[ 'postperpage' ] : '';

			if(isset($instance['thumbnail'])){
				$thumbnail = ($instance['thumbnail'] == 'on') ? 'checked="checked"' : '';
			}

			if( isset( $instance['hcode_portfolio_title'] ) ) {
				$hcode_portfolio_title = ( $instance['hcode_portfolio_title'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$hcode_portfolio_title = 'checked="checked"';
			}

			if( isset( $instance['hcode_portfolio_author'] ) ) {
				$hcode_portfolio_author = ( $instance['hcode_portfolio_author'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$hcode_portfolio_author = 'checked="checked"';
			}

			if( isset( $instance['hcode_portfolio_date'] ) ) {
				$hcode_portfolio_date = ( $instance['hcode_portfolio_date'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$hcode_portfolio_date = 'checked="checked"';
			}

			$hcode_portfolio_date_format = (isset($instance[ 'hcode_portfolio_date_format' ])) ? $instance[ 'hcode_portfolio_date_format' ] : 'd F';

			// Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hcode-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'postperpage' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'hcode-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'postperpage' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'postperpage' ); ?>" type="text" value="<?php echo esc_attr( $postperpage ); ?>" />
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'thumbnail' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'thumbnail' ); ?>" type="checkbox" <?php echo $thumbnail; ?> />
				<label for="<?php echo $this->get_field_id( 'thumbnail' ); ?>"><?php esc_html_e( 'Display Thumbnail?', 'hcode-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'hcode_portfolio_title' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_portfolio_title' ); ?>" type="checkbox" <?php echo $hcode_portfolio_title; ?> />
				<label for="<?php echo $this->get_field_id( 'hcode_portfolio_title' ); ?>"><?php esc_html_e( 'Display Post Title?', 'hcode-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'hcode_portfolio_author' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_portfolio_author' ); ?>" type="checkbox" <?php echo $hcode_portfolio_author; ?> />
				<label for="<?php echo $this->get_field_id( 'hcode_portfolio_author' ); ?>"><?php esc_html_e( 'Display Post Author?', 'hcode-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'hcode_portfolio_date' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_portfolio_date' ); ?>" type="checkbox" <?php echo $hcode_portfolio_date; ?> />
				<label for="<?php echo $this->get_field_id( 'hcode_portfolio_date' ); ?>"><?php esc_html_e( 'Display Post Date?', 'hcode-addons' ); ?></label> 
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'hcode_portfolio_date_format' ); ?>"><?php esc_html_e( 'Date Format:', 'hcode-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'hcode_portfolio_date_format' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_portfolio_date_format' ); ?>" type="text" value="<?php echo esc_attr( $hcode_portfolio_date_format ); ?>" />
			</p>
		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['postperpage'] = ( ! empty( $new_instance['postperpage'] ) ) ? strip_tags( $new_instance['postperpage'] ) : '';
			$instance['thumbnail'] = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
			$instance['hcode_portfolio_title'] = ( ! empty( $new_instance['hcode_portfolio_title'] ) ) ? strip_tags( $new_instance['hcode_portfolio_title'] ) : '';
			$instance['hcode_portfolio_author'] = ( ! empty( $new_instance['hcode_portfolio_author'] ) ) ? strip_tags( $new_instance['hcode_portfolio_author'] ) : '';
			$instance['hcode_portfolio_date'] = ( ! empty( $new_instance['hcode_portfolio_date'] ) ) ? strip_tags( $new_instance['hcode_portfolio_date'] ) : '';
			$instance['hcode_portfolio_date_format'] = ( ! empty( $new_instance['hcode_portfolio_date_format'] ) ) ? strip_tags( $new_instance['hcode_portfolio_date_format'] ) : '';
			return $instance;
		}
	}
}
/*******************************************************************************/
/* End Recent Portfolio With Image Thumb  */
/*******************************************************************************/


// Register and load H-Code custom widget
if ( ! function_exists( 'hcode_recent_portfolio_post_widget' ) ) :
	function hcode_recent_portfolio_post_widget() {
		register_widget( 'hcode_recent_portfolio_widget' );
	}
endif;
add_action( 'widgets_init', 'hcode_recent_portfolio_post_widget' );