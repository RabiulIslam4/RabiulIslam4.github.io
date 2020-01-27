<?php
/**
 * displaying posts featured image for blog
 *
 * @package H-Code
 */
?>
<?php
global $hcode_posts_srcset;

$hcode_options = get_option( 'hcode_theme_setting' );
$hcode_no_image = (isset($hcode_options['hcode_no_image'])) ? $hcode_options['hcode_no_image'] : '';

if ( has_post_thumbnail() ) {
    echo '<div class="blog-image"><a href="'.get_permalink().'">';
    echo get_the_post_thumbnail( get_the_ID(), $hcode_posts_srcset );
    echo '</a></div>';
}elseif( !empty( $hcode_no_image['url'] ) ) {
    echo '<div class="blog-image"><a href="'.get_permalink().'">';
    echo wp_get_attachment_image( $hcode_no_image['id'], $hcode_posts_srcset );
    echo '</a></div>';
}