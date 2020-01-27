<?php
/**
 * @package H-Code
 */
?>
<?php
/*******************************************************************************/
/* Start Recent Post With Image Thumb  */
/*******************************************************************************/
if (!class_exists('hcode_recent_widget')) {
	class hcode_recent_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'hcode_recent_widget',
			esc_html__('H-Code Recent Post Widget', 'hcode-addons'),
			array( 'description' => esc_html__( 'Your site most recent Posts.', 'hcode-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
		    
		    $hcode_options = get_option( 'hcode_theme_setting' );
			$hcode_no_image = (isset($hcode_options['hcode_no_image'])) ? $hcode_options['hcode_no_image'] : '';
	        $postperpage =  $instance['postperpage'] ;
	        $thumbnail = $instance['thumbnail'] ;
	        $hcode_post_title = isset( $instance['hcode_post_title'] ) ? $instance['hcode_post_title'] : 'on' ;
	        $hcode_post_author = isset( $instance['hcode_post_author'] ) ? $instance['hcode_post_author'] : 'on' ;
	        $hcode_post_date = isset( $instance['hcode_post_date'] ) ? $instance['hcode_post_date'] : 'on' ;
	        $hcode_post_date_format = isset( $instance['hcode_post_date_format'] ) ? $instance['hcode_post_date_format'] : 'd F' ;
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $args['before_widget'];
			if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];
			
			$recent_post = array('post_type' => 'post', 'posts_per_page' => $postperpage);
			$the_query = new WP_Query( $recent_post );
			$img_url = '';
			
			if ( $the_query->have_posts() ) {
				echo '<div class="widget-body">';
					echo '<ul class="widget-posts">';
					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$hcode_post_meta_array = array();
						
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
								if( $hcode_post_title == 'on' ) {
									echo '<a href="'.get_permalink().'">'.get_the_title().'</a>';
								}

								if( $hcode_post_author == 'on' ) {
									$hcode_post_meta_array[] = get_the_author();
								}
								if( $hcode_post_date == 'on' && $hcode_post_date_format != '' ) {
									$hcode_post_meta_array[] = get_the_date( $hcode_post_date_format, get_the_ID() );
								}

								if( !empty( $hcode_post_meta_array ) ) {
                                   $hcode_post_meta_list = implode( " - ", $hcode_post_meta_array );
                                   echo $hcode_post_meta_list;
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

			if( isset( $instance['hcode_post_title'] ) ) {
				$hcode_post_title = ( $instance['hcode_post_title'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$hcode_post_title = 'checked="checked"';
			}

			if( isset( $instance['hcode_post_author'] ) ) {
				$hcode_post_author = ( $instance['hcode_post_author'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$hcode_post_author = 'checked="checked"';
			}

			if( isset( $instance['hcode_post_date'] ) ) {
				$hcode_post_date = ( $instance['hcode_post_date'] == 'on' ) ? 'checked="checked"' : '';
			} else {
				$hcode_post_date = 'checked="checked"';
			}

			$hcode_post_date_format = (isset($instance[ 'hcode_post_date_format' ])) ? $instance[ 'hcode_post_date_format' ] : 'd F';

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
				<input class="checkbox" id="<?php echo $this->get_field_id( 'hcode_post_title' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_post_title' ); ?>" type="checkbox" <?php echo $hcode_post_title; ?> />
				<label for="<?php echo $this->get_field_id( 'hcode_post_title' ); ?>"><?php esc_html_e( 'Display Post Title?', 'hcode-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'hcode_post_author' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_post_author' ); ?>" type="checkbox" <?php echo $hcode_post_author; ?> />
				<label for="<?php echo $this->get_field_id( 'hcode_post_author' ); ?>"><?php esc_html_e( 'Display Post Author?', 'hcode-addons' ); ?></label> 
			</p>
			<p>
				<input class="checkbox" id="<?php echo $this->get_field_id( 'hcode_post_date' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_post_date' ); ?>" type="checkbox" <?php echo $hcode_post_date; ?> />
				<label for="<?php echo $this->get_field_id( 'hcode_post_date' ); ?>"><?php esc_html_e( 'Display Post Date?', 'hcode-addons' ); ?></label> 
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'hcode_post_date_format' ); ?>"><?php esc_html_e( 'Date Format:', 'hcode-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'hcode_post_date_format' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'hcode_post_date_format' ); ?>" type="text" value="<?php echo esc_attr( $hcode_post_date_format ); ?>" />
			</p>
		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['postperpage'] = ( ! empty( $new_instance['postperpage'] ) ) ? strip_tags( $new_instance['postperpage'] ) : '';
			$instance['thumbnail'] = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
			$instance['hcode_post_title'] = ( ! empty( $new_instance['hcode_post_title'] ) ) ? strip_tags( $new_instance['hcode_post_title'] ) : '';
			$instance['hcode_post_author'] = ( ! empty( $new_instance['hcode_post_author'] ) ) ? strip_tags( $new_instance['hcode_post_author'] ) : '';
			$instance['hcode_post_date'] = ( ! empty( $new_instance['hcode_post_date'] ) ) ? strip_tags( $new_instance['hcode_post_date'] ) : '';
			$instance['hcode_post_date_format'] = ( ! empty( $new_instance['hcode_post_date_format'] ) ) ? strip_tags( $new_instance['hcode_post_date_format'] ) : '';
			return $instance;
		}
	}
}
/*******************************************************************************/
/* End Recent Post With Image Thumb  */
/*******************************************************************************/

/*******************************************************************************/
/* Start Recent Comment With Author And Date */
/*******************************************************************************/
if (!class_exists('hcode_recent_comment_widget')) {
	class hcode_recent_comment_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'hcode_recent_comment_widget',
			esc_html__('H-Code Recent Comments Widget', 'hcode-addons'),
			array( 'description' => esc_html__( 'Your site most recent comments.', 'hcode-addons' ), ) // Args
			);
		}
		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			$postperpage =  $instance['postperpage'] ;
			echo $args['before_widget'];
			$no_comments = $postperpage; 
			$comment_len = 80;
			if ( ! empty( $title ) )
			echo  '<div class="widget">';
			echo $args['before_title'] . $title . $args['after_title'];
					
				$comment_output = '';
				$comment_output .= '<div class="widget-body">';
					$comment_output .='<ul class="widget-posts">';
						$comments_query = new WP_Comment_Query();
						$comments = $comments_query->query( array( 'number' => $no_comments,'post_type' => 'post', ) );
						if ( $comments ) : foreach ( $comments as $comment ) :
							$comment_output .= '<li class="clearfix"><div class="widget-posts-details"><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
							$comment_output .= get_the_title($comment->comment_post_ID). '</a> ';
							$comment_output .= get_comment_author( $comment->comment_ID ).' - '.get_comment_date( 'd F', $comment->comment_ID ) ;
							$comment_output .= '</div>';
							$comment_output .= '</li>';
						endforeach;
						else :
							$comment_output .= '<p>'.__("No comments", "hcode-addons").'</p>';
						endif;
						wp_reset_postdata();
					$comment_output .='</ul>';
				$comment_output .='</div>';
			$comment_output .='</div>';
			echo $comment_output; 
			echo $args['after_widget'];
		}
			
		// Widget Backend 
		public function form( $instance ) {
			
			$title = (isset($instance[ 'title' ])) ? $instance[ 'title' ] : '';
			$postperpage = (isset($instance[ 'postperpage' ])) ? $instance[ 'postperpage' ] : '';
			// Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'hcode-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'postperpage' ); ?>"><?php esc_html_e( 'Number of posts to show :', 'hcode-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'postperpage' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'postperpage' ); ?>" type="text" value="<?php echo esc_attr( $postperpage ); ?>" />
			</p>
		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['postperpage'] = ( ! empty( $new_instance['postperpage'] ) ) ? strip_tags( $new_instance['postperpage'] ) : '';
			return $instance;
		}
	}
}
/*******************************************************************************/
/* End Recent Comment With Author And Date */
/*******************************************************************************/

// Register and load H-Code custom widget
if ( ! function_exists( 'hcode_load_widget' ) ) :
	function hcode_load_widget() {
		register_widget( 'hcode_recent_widget' );
		register_widget( 'hcode_recent_comment_widget' );
	}
endif;
add_action( 'widgets_init', 'hcode_load_widget' );