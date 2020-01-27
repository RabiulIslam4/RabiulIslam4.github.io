<?php
/**
 * Shortcode For Related Product Block
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Related Product Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_recent_products_shortcode' ) ) {
    function hcode_recent_products_shortcode( $atts, $content = null ) {
        if(!class_exists( 'WooCommerce' )){
            return false;
        }
        $atts = shortcode_atts( array(
                'class' =>'',
                'id' => '',
                'recent_product_type' => '',
                'per_page'  => '12',
                'columns'   => '4',
                'orderby'   => 'date',
                'order'     => 'desc',
                'desktop_per_page' => '3',
                'mini_desktop_per_page' => '3',
                'ipad_per_page' => '3',
                'mobile_per_page' => '1',

            ), $atts );
        
        $query_args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => $atts['per_page'],
            'orderby'             => $atts['orderby'],
            'order'               => $atts['order'],
            'meta_query'          => WC()->query->get_meta_query(),
            'tax_query' => WC()->query->get_tax_query(),
        );

        global $woocommerce_loop;
        $products                    = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $query_args, $atts ) );
        $columns                     = absint( $atts['columns'] );
        $woocommerce_loop['columns'] = $columns;
        $loop_name                   = 'recent_products';
        $id = ( $atts['id'] ) ? ' id= "'.$atts['id'].'"': '';
        $class = ( $atts['class'] ) ? $atts['class']: '';
        
        ob_start();
        if ( $products->have_posts() ) : ?>

            <?php do_action( "woocommerce_shortcode_before_{$loop_name}_loop" ); ?>

                <?php if($atts['recent_product_type'] == 'slider'):?>
                <div class="owl-carousel hcode-recent-<?php echo $atts['recent_product_type']?> owl-theme dark-pagination owl-no-pagination owl-prev-next-simple" <?php echo $id;?>>
                <?php else:?>
                <div class="product-<?php echo $columns;?>" <?php echo $id;?>>
                <?php endif;?>
                    <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                        <?php

                        if ( ! defined( 'ABSPATH' ) ) {
                            exit; // Exit if accessed directly
                        }
                        global $product, $woocommerce_loop;

                        // Store loop count we're currently on
                        if ( empty( $woocommerce_loop['loop'] ) ) {
                            $woocommerce_loop['loop'] = 0;
                        }
                        // Store column count for displaying the grid
                        if ( empty( $woocommerce_loop['columns'] ) ) {
                            $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
                        }
                        // Ensure visibility
                        if ( ! $product || ! $product->is_visible() ) {
                            return;
                        }
                        // Increase loop count
                        $woocommerce_loop['loop']++;

                        // Extra post classes
                        $classes = array();
                        if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
                            $classes[] = 'first';
                        }
                        if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
                            $classes[] = 'last';
                        }
                        if($atts['recent_product_type'] == 'slider'){
                            $classes[] = 'item';
                        }else{
                            switch ($woocommerce_loop['columns']) {
                                case '6':
                                    $set_column = '2';
                                    $set_ipad_column = '6';
                                    break;
                                case '4':
                                    $set_column = '3';
                                    $set_ipad_column = '6';
                                    break;
                                case '3':
                                    $set_column = '4';
                                    $set_ipad_column = '6';
                                    break;
                                case '2':
                                    $set_column = '6';
                                    $set_ipad_column = '6';
                                    break;
                                case '1':
                                    $set_column = '12';
                                    $set_ipad_column = '12';
                                    break;
                            }
                            $classes[] = 'col-md-'.$set_column.' col-sm-'.$set_ipad_column.' col-xs-12';
                        }
                        ?>
                        <div <?php post_class( $classes ); ?>>
                            <div class="home-product text-center position-relative overflow-hidden margin-ten no-margin-top">
                                <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
                                <div class="product-image-wrapper">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php //do_action( 'woocommerce_before_shop_loop_item_title' );
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'shop_catalog' );
                                        }elseif ( wc_placeholder_img_src() ) {
                                            echo wc_placeholder_img( 'shop_catalog' );
                                        }
                                        ?>
                                    </a>
                                    <?php do_action ( 'hcode_sale_flash' ); ?>
                                </div>
                                <div class="product-content-wrapper">
                                    <span class="product-name text-uppercase">
                                        <a href="<?php the_permalink(); ?>">    
                                            <?php
                                                /**
                                                 * woocommerce_shop_loop_item_title hook
                                                 *
                                                 * @hooked woocommerce_template_loop_product_title - 10
                                                 */
                                                wc_get_template( 'loop/title.php' );
                                            ?>
                                        </a>
                                    </span>
                                    <?php
                                        /**
                                         * woocommerce_after_shop_loop_item_title hook
                                         *
                                         * @hooked woocommerce_template_loop_rating - 5
                                         * @hooked woocommerce_template_loop_price - 10
                                         */
                                        do_action( 'woocommerce_after_shop_loop_item_title' );
                                    ?>
                                    <div class="quick-buy">
                                        <div class="product-share">
                                            <?php

                                                /**
                                                 * woocommerce_after_shop_loop_item hook
                                                 *
                                                 * @hooked woocommerce_template_loop_add_to_cart - 10
                                                 */
                                                do_action( 'woocommerce_after_shop_loop_item' );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; // end of the loop. ?>
                <?php if($atts['recent_product_type'] == 'slider'):?>
                    </div>
                <?php else:?>
                    </div>
                <?php endif;?>

            <?php do_action( "woocommerce_shortcode_after_{$loop_name}_loop" ); ?>

        <?php endif;

        woocommerce_reset_loop();
        wp_reset_postdata();
        if($atts['recent_product_type'] == 'slider'):
        $slider_rtl_enable = (is_rtl()) ? 'true' : 'false';
        ?>
        <script type="text/javascript">jQuery(document).ready(function(){ jQuery(".hcode-recent-slider").owlCarousel({ nav: true, rtl: <?php echo $slider_rtl_enable ?> ,loop: true, responsive:{ 0: { items: <?php echo $atts['mobile_per_page']; ?> }, 767: { items: <?php echo $atts['ipad_per_page']; ?> }, 991:{ items: <?php echo $atts['mini_desktop_per_page']; ?> }, 1200:{ items: <?php echo $atts['desktop_per_page']; ?> } }, navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"] }); }); </script>
        <?php
        endif;
        return ob_get_clean();
    }
}
add_shortcode( 'hcode_recent_products', 'hcode_recent_products_shortcode' );