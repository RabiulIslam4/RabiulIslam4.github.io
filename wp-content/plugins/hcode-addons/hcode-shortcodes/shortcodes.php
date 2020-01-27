<?php
if (!class_exists('Hcode_Require_Shortcode_Files')) {
    class Hcode_Require_Shortcode_Files {
        /*
         * Includes all (require_once) php file(s) inside selected folder using class.
         */
        public function __construct()
        {
            $fileName = array('row', 'inner-row', 'column', 'tab', 'slider', 'content-slider', 'counter-or-skill','portfolio','portfolio-filter','parallax','video-sound','section-heading', 'alert-massage', 'icons', 'icon-list','feature-box', 'featured-owl', 'blockquote','blog','accordian','progressbar','button','shop-top-five', 'releted-product', 'featured-product','text-block','single-image', 'product-brands', 'team-member','team-slider', 'content-block', 'image', 'tab-content','image-gallery','popup','space','divider', 'testimonial', 'career', 'post-slider', 'separator', 'search-form', 'login-form', 'image-carousel', 'education-slider','popular-dishes','restaurant-menu','photography-grid','photography-services', 'spa-package-slider','restaurant-popular-dishes', 'newsletter', 'coming-soon', 'featured-projects-slider', 'travel-agency-special-offer-slider','time-counter');

            global $hcode_theme_settings;
            $hcode_brand_status =  ( isset( $hcode_theme_settings['hcode_enable_brand_tax'] ) && $hcode_theme_settings['hcode_enable_brand_tax'] != '' ) ? $hcode_theme_settings['hcode_enable_brand_tax'] : '1';
            if( $hcode_brand_status != 1 ){
                if (false !== $key = array_search('product-brands', $fileName)) {
                  unset($fileName[$key]);
                }
            }
            $this->Theme_Require_Shortcode_File( HCODE_SHORTCODE_ADDONS_SHORTCODE_URI, $fileName );
            
        }
        public function Theme_Require_Shortcode_File($path, $fileName)
        {

            if(is_array($fileName))
            {
                foreach($fileName as $name)
                {
                    require_once($path.'/hcode-shortcode-'.$name.'.php');
                }
            }
            else
            {
                throw new Exception('File is not found in folder as you given');
            }
        }

    }
    $Hcode_Require_Shortcode_Files = new Hcode_Require_Shortcode_Files();
}