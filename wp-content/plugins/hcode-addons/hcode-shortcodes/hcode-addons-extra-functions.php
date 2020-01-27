<?php
/**
 * Shortcode For Site URL
 *
 */
?>
<?php 

if ( ! function_exists( 'hcode_option' ) ) {
    function hcode_option( $option ){
        global $hcode_theme_settings, $post;
        $hcode_single = false;
        if(is_singular()){
            $value = get_post_meta( $post->ID, $option.'_single', true);
            $hcode_single = true;
        }

        if($hcode_single == true){
            if (is_string($value) && (strlen($value) > 0 || is_array($value)) && ($value != 'default' && $value != 'Select Sidebar')  ) {
                return $value;
            }
        }
        if(isset($hcode_theme_settings[$option]) && $hcode_theme_settings[$option] != ''){
            $option_value = $hcode_theme_settings[$option];
            return $option_value;
        }
        return false;
    }
}

if ( ! function_exists( 'hcode_site_url_shortcode' ) ) {
	function hcode_site_url_shortcode( $atts, $content = null ) { 
		return home_url('/');
	}
}
add_shortcode( 'hcode_site_url', 'hcode_site_url_shortcode' );


//load button setting css other css 
if( ! function_exists( 'hcode_addons_generate_custom_css' ) ) {
    function hcode_addons_generate_custom_css() {
        global $hcode_featured_array, $style_array,$responsive_style, $hcode_featured_mini_desktop_array, $hcode_featured_ipad_array, $hcode_featured_mobile_array;

        $output_css = '';
        if( !empty($hcode_featured_array) || !empty($hcode_featured_ipad_array) || !empty($hcode_featured_mobile_array) ) {
            ob_start();
                echo '<style id="hcode-addon-custom-css" type="text/css">';
                    if( !empty($hcode_featured_array) ){
                        foreach ($hcode_featured_array as $key => $value) {
                            echo $value;
                        }
                    }

                    if( !empty($hcode_featured_ipad_array) ){
                        echo '@media (max-width: 991px) {';
                            foreach ($hcode_featured_ipad_array as $key => $value) {
                                echo $value;
                            }
                        echo '}';
                    }
                    if( !empty($hcode_featured_mobile_array) ){
                        echo '@media (max-width: 767px) {';
                            foreach ($hcode_featured_mobile_array as $key => $value) {
                                echo $value;
                            }
                        echo '}';
                    }    
                echo '</style>';
            $output_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            ?>
                <script type="text/javascript"> (function($) { $('head').append('<?php print $output_css; ?>'); })(jQuery); </script>
            <?php   
        }
       
    }
}
add_action( 'wp_footer', 'hcode_addons_generate_custom_css', 998 );

//load dyamic css for font settings
if( ! function_exists( 'hcode_addons_text_align_css' ) ) {
    function hcode_addons_text_align_css() {
        global $font_settings_array;

        $output_css = '';
        if( !empty($font_settings_array)) {
            ob_start();
                echo '<style id="hcode-addon-font-custom-css" type="text/css">';
                    foreach ($font_settings_array as $key => $value) {
                        echo $value;
                    }    
                echo '</style>';
            $output_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            ?>
                <script type="text/javascript"> (function($) { $('head').append('<?php print $output_css; ?>'); })(jQuery); </script>
            <?php   
        }
    }
}
add_action( 'wp_footer', 'hcode_addons_text_align_css', 998 );

if( ! function_exists( 'hcode_portfolio_dropdown_categories' ) ) {
    function hcode_portfolio_dropdown_categories( $args = array() ) {
        global $wp_query;

        $args = wp_parse_args( $args, array(
            'pad_counts'         => 1,
            'show_count'         => 1,
            'hierarchical'       => 1,
            'hide_empty'         => 1,
            'show_uncategorized' => 1,
            'orderby'            => 'name',
            'selected'           => isset( $wp_query->query_vars['portfolio_cat'] ) ? $wp_query->query_vars['portfolio_cat']: '',
            'menu_order'         => false,
            'show_option_none'   => __( 'Select a category', 'hcode-addons' ),
            'option_none_value'  => '',
            'value_field'        => 'slug',
            'taxonomy'           => 'portfolio-category',
            'name'               => 'portfolio_cat',
            'class'              => 'portfolio_categories',
        ) );

        if ( 'order' === $args['orderby'] ) {
            $args['menu_order'] = 'asc';
            $args['orderby']    = 'name';
        }

        wp_dropdown_categories( $args );
    }
}

if ( ! function_exists( 'hcode_slider_pagination' ) ) {
    function hcode_slider_pagination( $pagination , $slider_id = ''){
        $output  = '';

        ob_start();

        if($pagination){
            $pagination_count = substr_count($pagination, '[hcode_slide_content ');
            for ($count=0; $count <= $pagination_count-1; $count++){
                echo '<li data-target="#'.$slider_id.'" data-slide-to="'.$count.'"></li>';
            }
        }

        $result = ob_get_contents();
        ob_end_clean();
        $output .= $result;

        return $output;
    }
}
/* For content bootstrap slider pagination */
if ( ! function_exists( 'hcode_bootstrap_content_slider_pagination' ) ) {
    function hcode_bootstrap_content_slider_pagination( $pagination , $slider_id = ''){
        $output  = '';

        ob_start();

        if($pagination){
            $pagination_count = substr_count($pagination, '[hcode_special_slide_content ');
            for ($count=0; $count <= $pagination_count-1; $count++){
                echo '<li data-target="#'.$slider_id.'" data-slide-to="'.$count.'"></li>';
            }
        }

        $result = ob_get_contents();
        ob_end_clean();
        $output .= $result;

        return $output;
    }
}

if ( ! function_exists( 'hcode_owl_pagination_color_classes' ) ) {
    function hcode_owl_pagination_color_classes( $pagination ){
        $class_list = '';

        switch($pagination)
        {
            case 0:
                $class_list .= ' dark-pagination';
                break;

            case 1:
                $class_list .= ' light-pagination';
                break;

            default:
                $class_list .= ' dark-pagination';
                break;
        }
        return $class_list;
    }
}

if ( ! function_exists( 'hcode_owl_pagination_slider_classes' ) ) {
    function hcode_owl_pagination_slider_classes( $pagination_color ){
        $class_list = '';

        switch($pagination_color)
        {
            case 0:
                $class_list .= ' dot-pagination';
                break;

            case 1:
                $class_list .= ' square-pagination';
                break;

                    case 2:
                        $class_list .= ' round-pagination';
                        break;

            default:
                $class_list .= ' dot-pagination';
                break;
        }

        return $class_list;
    }
}

if ( ! function_exists( 'hcode_owl_navigation_slider_classes' ) ) {
    function hcode_owl_navigation_slider_classes ($navigation){
        $class_list = '';

        switch($navigation)
        {
            case 0:
                $class_list .= ' dark-navigation';
                break;

            case 1:
                $class_list .= ' light-navigation';
                break;

            default:
                $class_list .= ' dark-navigation';
                break;
        }

        return $class_list;
    }
}

add_filter( 'hcode_portfolio_title', 'hcode_portfolio_title_filter' );

if ( ! function_exists( 'hcode_portfolio_title_filter' ) ) {
    function hcode_portfolio_title_filter( $value ) {   

        if( is_admin() ) {
            return $value;
        }

        $hcode_options = get_option( 'hcode_theme_setting' );
        if( !empty( $hcode_options['hcode_portfolio_cat_title'] ) ) {
            $value = trim( $hcode_options['hcode_portfolio_cat_title'] );
        } elseif( !empty( $hcode_options['hcode_portfolio_url_slug'] ) ) {
            $value = trim( $hcode_options['hcode_portfolio_url_slug'] );
        }

        return $value;
    }
}

if ( ! function_exists( 'hcode_fontawesome_solid' ) ) :
    function hcode_fontawesome_solid() {
        $fa_icons_solid = array( 'fa-ad', 'fa-address-book', 'fa-address-card', 'fa-adjust', 'fa-air-freshener', 'fa-align-center', 'fa-align-justify', 'fa-align-left', 'fa-align-right', 'fa-allergies', 'fa-ambulance', 'fa-american-sign-language-interpreting', 'fa-anchor', 'fa-angle-double-down', 'fa-angle-double-left', 'fa-angle-double-right', 'fa-angle-double-up', 'fa-angle-down', 'fa-angle-left', 'fa-angle-right', 'fa-angle-up', 'fa-angry', 'fa-ankh', 'fa-apple-alt', 'fa-archive', 'fa-archway', 'fa-arrow-alt-circle-down', 'fa-arrow-alt-circle-left', 'fa-arrow-alt-circle-right', 'fa-arrow-alt-circle-up', 'fa-arrow-circle-down', 'fa-arrow-circle-left', 'fa-arrow-circle-right', 'fa-arrow-circle-up', 'fa-arrow-down', 'fa-arrow-left', 'fa-arrow-right', 'fa-arrow-up', 'fa-arrows-alt', 'fa-arrows-alt-h', 'fa-arrows-alt-v', 'fa-assistive-listening-systems', 'fa-asterisk', 'fa-at', 'fa-atlas', 'fa-atom', 'fa-audio-description', 'fa-award', 'fa-baby', 'fa-baby-carriage', 'fa-backspace', 'fa-backward', 'fa-bacon', 'fa-balance-scale', 'fa-ban', 'fa-band-aid', 'fa-barcode', 'fa-bars', 'fa-baseball-ball', 'fa-basketball-ball', 'fa-bath', 'fa-battery-empty', 'fa-battery-full', 'fa-battery-half', 'fa-battery-quarter', 'fa-battery-three-quarters', 'fa-bed', 'fa-beer', 'fa-bell', 'fa-bell-slash', 'fa-bezier-curve', 'fa-bible', 'fa-bicycle', 'fa-binoculars', 'fa-biohazard', 'fa-birthday-cake', 'fa-blender', 'fa-blender-phone', 'fa-blind', 'fa-blog', 'fa-bold', 'fa-bolt', 'fa-bomb', 'fa-bone', 'fa-bong', 'fa-book', 'fa-book-dead', 'fa-book-medical', 'fa-book-open', 'fa-book-reader', 'fa-bookmark', 'fa-bowling-ball', 'fa-box', 'fa-box-open', 'fa-boxes', 'fa-braille', 'fa-brain', 'fa-bread-slice', 'fa-briefcase', 'fa-briefcase-medical', 'fa-broadcast-tower', 'fa-broom', 'fa-brush', 'fa-bug', 'fa-building', 'fa-bullhorn', 'fa-bullseye', 'fa-burn', 'fa-bus', 'fa-bus-alt', 'fa-business-time', 'fa-calculator', 'fa-calendar', 'fa-calendar-alt', 'fa-calendar-check', 'fa-calendar-day', 'fa-calendar-minus', 'fa-calendar-plus', 'fa-calendar-times', 'fa-calendar-week', 'fa-camera', 'fa-camera-retro', 'fa-campground', 'fa-candy-cane', 'fa-cannabis', 'fa-capsules', 'fa-car', 'fa-car-alt', 'fa-car-battery', 'fa-car-crash', 'fa-car-side', 'fa-caret-down', 'fa-caret-left', 'fa-caret-right', 'fa-caret-square-down', 'fa-caret-square-left', 'fa-caret-square-right', 'fa-caret-square-up', 'fa-caret-up', 'fa-carrot', 'fa-cart-arrow-down', 'fa-cart-plus', 'fa-cash-register', 'fa-cat', 'fa-certificate', 'fa-chair', 'fa-chalkboard', 'fa-chalkboard-teacher', 'fa-charging-station', 'fa-chart-area', 'fa-chart-bar', 'fa-chart-line', 'fa-chart-pie', 'fa-check', 'fa-check-circle', 'fa-check-double', 'fa-check-square', 'fa-cheese', 'fa-chess', 'fa-chess-bishop', 'fa-chess-board', 'fa-chess-king', 'fa-chess-knight', 'fa-chess-pawn', 'fa-chess-queen', 'fa-chess-rook', 'fa-chevron-circle-down', 'fa-chevron-circle-left', 'fa-chevron-circle-right', 'fa-chevron-circle-up', 'fa-chevron-down', 'fa-chevron-left', 'fa-chevron-right', 'fa-chevron-up', 'fa-child', 'fa-church', 'fa-circle', 'fa-circle-notch', 'fa-city', 'fa-clinic-medical', 'fa-clipboard', 'fa-clipboard-check', 'fa-clipboard-list', 'fa-clock', 'fa-clone', 'fa-closed-captioning', 'fa-cloud', 'fa-cloud-download-alt', 'fa-cloud-meatball', 'fa-cloud-moon', 'fa-cloud-moon-rain', 'fa-cloud-rain', 'fa-cloud-showers-heavy', 'fa-cloud-sun', 'fa-cloud-sun-rain', 'fa-cloud-upload-alt', 'fa-cocktail', 'fa-code', 'fa-code-branch', 'fa-coffee', 'fa-cog', 'fa-cogs', 'fa-coins', 'fa-columns', 'fa-comment', 'fa-comment-alt', 'fa-comment-dollar', 'fa-comment-dots', 'fa-comment-medical', 'fa-comment-slash', 'fa-comments', 'fa-comments-dollar', 'fa-compact-disc', 'fa-compass', 'fa-compress', 'fa-compress-arrows-alt', 'fa-concierge-bell', 'fa-cookie', 'fa-cookie-bite', 'fa-copy', 'fa-copyright', 'fa-couch', 'fa-credit-card', 'fa-crop', 'fa-crop-alt', 'fa-cross', 'fa-crosshairs', 'fa-crow', 'fa-crown', 'fa-crutch', 'fa-cube', 'fa-cubes', 'fa-cut', 'fa-database', 'fa-deaf', 'fa-democrat', 'fa-desktop', 'fa-dharmachakra', 'fa-diagnoses', 'fa-dice', 'fa-dice-d20', 'fa-dice-d6', 'fa-dice-five', 'fa-dice-four', 'fa-dice-one', 'fa-dice-six', 'fa-dice-three', 'fa-dice-two', 'fa-digital-tachograph', 'fa-directions', 'fa-divide', 'fa-dizzy', 'fa-dna', 'fa-dog', 'fa-dollar-sign', 'fa-dolly', 'fa-dolly-flatbed', 'fa-donate', 'fa-door-closed', 'fa-door-open', 'fa-dot-circle', 'fa-dove', 'fa-download', 'fa-drafting-compass', 'fa-dragon', 'fa-draw-polygon', 'fa-drum', 'fa-drum-steelpan', 'fa-drumstick-bite', 'fa-dumbbell', 'fa-dumpster', 'fa-dumpster-fire', 'fa-dungeon', 'fa-edit', 'fa-egg', 'fa-eject', 'fa-ellipsis-h', 'fa-ellipsis-v', 'fa-envelope', 'fa-envelope-open', 'fa-envelope-open-text', 'fa-envelope-square', 'fa-equals', 'fa-eraser', 'fa-ethernet', 'fa-euro-sign', 'fa-exchange-alt', 'fa-exclamation', 'fa-exclamation-circle', 'fa-exclamation-triangle', 'fa-expand', 'fa-expand-arrows-alt', 'fa-external-link-alt', 'fa-external-link-square-alt', 'fa-eye', 'fa-eye-dropper', 'fa-eye-slash', 'fa-fast-backward', 'fa-fast-forward', 'fa-fax', 'fa-feather', 'fa-feather-alt', 'fa-female', 'fa-fighter-jet', 'fa-file', 'fa-file-alt', 'fa-file-archive', 'fa-file-audio', 'fa-file-code', 'fa-file-contract', 'fa-file-csv', 'fa-file-download', 'fa-file-excel', 'fa-file-export', 'fa-file-image', 'fa-file-import', 'fa-file-invoice', 'fa-file-invoice-dollar', 'fa-file-medical', 'fa-file-medical-alt', 'fa-file-pdf', 'fa-file-powerpoint', 'fa-file-prescription', 'fa-file-signature', 'fa-file-upload', 'fa-file-video', 'fa-file-word', 'fa-fill', 'fa-fill-drip', 'fa-film', 'fa-filter', 'fa-fingerprint', 'fa-fire', 'fa-fire-alt', 'fa-fire-extinguisher', 'fa-first-aid', 'fa-fish', 'fa-fist-raised', 'fa-flag', 'fa-flag-checkered', 'fa-flag-usa', 'fa-flask', 'fa-flushed', 'fa-folder', 'fa-folder-minus', 'fa-folder-open', 'fa-folder-plus', 'fa-font', 'fa-football-ball', 'fa-forward', 'fa-frog', 'fa-frown', 'fa-frown-open', 'fa-funnel-dollar', 'fa-futbol', 'fa-gamepad', 'fa-gas-pump', 'fa-gavel', 'fa-gem', 'fa-genderless', 'fa-ghost', 'fa-gift', 'fa-gifts', 'fa-glass-cheers', 'fa-glass-martini', 'fa-glass-martini-alt', 'fa-glass-whiskey', 'fa-glasses', 'fa-globe', 'fa-globe-africa', 'fa-globe-americas', 'fa-globe-asia', 'fa-globe-europe', 'fa-golf-ball', 'fa-gopuram', 'fa-graduation-cap', 'fa-greater-than', 'fa-greater-than-equal', 'fa-grimace', 'fa-grin', 'fa-grin-alt', 'fa-grin-beam', 'fa-grin-beam-sweat', 'fa-grin-hearts', 'fa-grin-squint', 'fa-grin-squint-tears', 'fa-grin-stars', 'fa-grin-tears', 'fa-grin-tongue', 'fa-grin-tongue-squint', 'fa-grin-tongue-wink', 'fa-grin-wink', 'fa-grip-horizontal', 'fa-grip-lines', 'fa-grip-lines-vertical', 'fa-grip-vertical', 'fa-guitar', 'fa-h-square', 'fa-hamburger', 'fa-hammer', 'fa-hamsa', 'fa-hand-holding', 'fa-hand-holding-heart', 'fa-hand-holding-usd', 'fa-hand-lizard', 'fa-hand-middle-finger', 'fa-hand-paper', 'fa-hand-peace', 'fa-hand-point-down', 'fa-hand-point-left', 'fa-hand-point-right', 'fa-hand-point-up', 'fa-hand-pointer', 'fa-hand-rock', 'fa-hand-scissors', 'fa-hand-spock', 'fa-hands', 'fa-hands-helping', 'fa-handshake', 'fa-hanukiah', 'fa-hard-hat', 'fa-hashtag', 'fa-hat-wizard', 'fa-haykal', 'fa-hdd', 'fa-heading', 'fa-headphones', 'fa-headphones-alt', 'fa-headset', 'fa-heart', 'fa-heart-broken', 'fa-heartbeat', 'fa-helicopter', 'fa-highlighter', 'fa-hiking', 'fa-hippo', 'fa-history', 'fa-hockey-puck', 'fa-holly-berry', 'fa-home', 'fa-horse', 'fa-horse-head', 'fa-hospital', 'fa-hospital-alt', 'fa-hospital-symbol', 'fa-hot-tub', 'fa-hotdog', 'fa-hotel', 'fa-hourglass', 'fa-hourglass-end', 'fa-hourglass-half', 'fa-hourglass-start', 'fa-house-damage', 'fa-hryvnia', 'fa-i-cursor', 'fa-ice-cream', 'fa-icicles', 'fa-id-badge', 'fa-id-card', 'fa-id-card-alt', 'fa-igloo', 'fa-image', 'fa-images', 'fa-inbox', 'fa-indent', 'fa-industry', 'fa-infinity', 'fa-info', 'fa-info-circle', 'fa-italic', 'fa-jedi', 'fa-joint', 'fa-journal-whills', 'fa-kaaba', 'fa-key', 'fa-keyboard', 'fa-khanda', 'fa-kiss', 'fa-kiss-beam', 'fa-kiss-wink-heart', 'fa-kiwi-bird', 'fa-landmark', 'fa-language', 'fa-laptop', 'fa-laptop-code', 'fa-laptop-medical', 'fa-laugh', 'fa-laugh-beam', 'fa-laugh-squint', 'fa-laugh-wink', 'fa-layer-group', 'fa-leaf', 'fa-lemon', 'fa-less-than', 'fa-less-than-equal', 'fa-level-down-alt', 'fa-level-up-alt', 'fa-life-ring', 'fa-lightbulb', 'fa-link', 'fa-lira-sign', 'fa-list', 'fa-list-alt', 'fa-list-ol', 'fa-list-ul', 'fa-location-arrow', 'fa-lock', 'fa-lock-open', 'fa-long-arrow-alt-down', 'fa-long-arrow-alt-left', 'fa-long-arrow-alt-right', 'fa-long-arrow-alt-up', 'fa-low-vision', 'fa-luggage-cart', 'fa-magic', 'fa-magnet', 'fa-mail-bulk', 'fa-male', 'fa-map', 'fa-map-marked', 'fa-map-marked-alt', 'fa-map-marker', 'fa-map-marker-alt', 'fa-map-pin', 'fa-map-signs', 'fa-marker', 'fa-mars', 'fa-mars-double', 'fa-mars-stroke', 'fa-mars-stroke-h', 'fa-mars-stroke-v', 'fa-mask', 'fa-medal', 'fa-medkit', 'fa-meh', 'fa-meh-blank', 'fa-meh-rolling-eyes', 'fa-memory', 'fa-menorah', 'fa-mercury', 'fa-meteor', 'fa-microchip', 'fa-microphone', 'fa-microphone-alt', 'fa-microphone-alt-slash', 'fa-microphone-slash', 'fa-microscope', 'fa-minus', 'fa-minus-circle', 'fa-minus-square', 'fa-mitten', 'fa-mobile', 'fa-mobile-alt', 'fa-money-bill', 'fa-money-bill-alt', 'fa-money-bill-wave', 'fa-money-bill-wave-alt', 'fa-money-check', 'fa-money-check-alt', 'fa-monument', 'fa-moon', 'fa-mortar-pestle', 'fa-mosque', 'fa-motorcycle', 'fa-mountain', 'fa-mouse-pointer', 'fa-mug-hot', 'fa-music', 'fa-network-wired', 'fa-neuter', 'fa-newspaper', 'fa-not-equal', 'fa-notes-medical', 'fa-object-group', 'fa-object-ungroup', 'fa-oil-can', 'fa-om', 'fa-otter', 'fa-outdent', 'fa-pager', 'fa-paint-brush', 'fa-paint-roller', 'fa-palette', 'fa-pallet', 'fa-paper-plane', 'fa-paperclip', 'fa-parachute-box', 'fa-paragraph', 'fa-parking', 'fa-passport', 'fa-pastafarianism', 'fa-paste', 'fa-pause', 'fa-pause-circle', 'fa-paw', 'fa-peace', 'fa-pen', 'fa-pen-alt', 'fa-pen-fancy', 'fa-pen-nib', 'fa-pen-square', 'fa-pencil-alt', 'fa-pencil-ruler', 'fa-people-carry', 'fa-pepper-hot', 'fa-percent', 'fa-percentage', 'fa-person-booth', 'fa-phone', 'fa-phone-slash', 'fa-phone-square', 'fa-phone-volume', 'fa-piggy-bank', 'fa-pills', 'fa-pizza-slice', 'fa-place-of-worship', 'fa-plane', 'fa-plane-arrival', 'fa-plane-departure', 'fa-play', 'fa-play-circle', 'fa-plug', 'fa-plus', 'fa-plus-circle', 'fa-plus-square', 'fa-podcast', 'fa-poll', 'fa-poll-h', 'fa-poo', 'fa-poo-storm', 'fa-poop', 'fa-portrait', 'fa-pound-sign', 'fa-power-off', 'fa-pray', 'fa-praying-hands', 'fa-prescription', 'fa-prescription-bottle', 'fa-prescription-bottle-alt', 'fa-print', 'fa-procedures', 'fa-project-diagram', 'fa-puzzle-piece', 'fa-qrcode', 'fa-question', 'fa-question-circle', 'fa-quidditch', 'fa-quote-left', 'fa-quote-right', 'fa-quran', 'fa-radiation', 'fa-radiation-alt', 'fa-rainbow', 'fa-random', 'fa-receipt', 'fa-recycle', 'fa-redo', 'fa-redo-alt', 'fa-registered', 'fa-reply', 'fa-reply-all', 'fa-republican', 'fa-restroom', 'fa-retweet', 'fa-ribbon', 'fa-ring', 'fa-road', 'fa-robot', 'fa-rocket', 'fa-route', 'fa-rss', 'fa-rss-square', 'fa-ruble-sign', 'fa-ruler', 'fa-ruler-combined', 'fa-ruler-horizontal', 'fa-ruler-vertical', 'fa-running', 'fa-rupee-sign', 'fa-sad-cry', 'fa-sad-tear', 'fa-satellite', 'fa-satellite-dish', 'fa-save', 'fa-school', 'fa-screwdriver', 'fa-scroll', 'fa-sd-card', 'fa-search', 'fa-search-dollar', 'fa-search-location', 'fa-search-minus', 'fa-search-plus', 'fa-seedling', 'fa-server', 'fa-shapes', 'fa-share', 'fa-share-alt', 'fa-share-alt-square', 'fa-share-square', 'fa-shekel-sign', 'fa-shield-alt', 'fa-ship', 'fa-shipping-fast', 'fa-shoe-prints', 'fa-shopping-bag', 'fa-shopping-basket', 'fa-shopping-cart', 'fa-shower', 'fa-shuttle-van', 'fa-sign', 'fa-sign-in-alt', 'fa-sign-language', 'fa-sign-out-alt', 'fa-signal', 'fa-signature', 'fa-sim-card', 'fa-sitemap', 'fa-skating', 'fa-skiing', 'fa-skiing-nordic', 'fa-skull', 'fa-skull-crossbones', 'fa-slash', 'fa-sleigh', 'fa-sliders-h', 'fa-smile', 'fa-smile-beam', 'fa-smile-wink', 'fa-smog', 'fa-smoking', 'fa-smoking-ban', 'fa-sms', 'fa-snowboarding', 'fa-snowflake', 'fa-snowman', 'fa-snowplow', 'fa-socks', 'fa-solar-panel', 'fa-sort', 'fa-sort-alpha-down', 'fa-sort-alpha-up', 'fa-sort-amount-down', 'fa-sort-amount-up', 'fa-sort-down', 'fa-sort-numeric-down', 'fa-sort-numeric-up', 'fa-sort-up', 'fa-spa', 'fa-space-shuttle', 'fa-spider', 'fa-spinner', 'fa-splotch', 'fa-spray-can', 'fa-square', 'fa-square-full', 'fa-square-root-alt', 'fa-stamp', 'fa-star', 'fa-star-and-crescent', 'fa-star-half', 'fa-star-half-alt', 'fa-star-of-david', 'fa-star-of-life', 'fa-step-backward', 'fa-step-forward', 'fa-stethoscope', 'fa-sticky-note', 'fa-stop', 'fa-stop-circle', 'fa-stopwatch', 'fa-store', 'fa-store-alt', 'fa-stream', 'fa-street-view', 'fa-strikethrough', 'fa-stroopwafel', 'fa-subscript', 'fa-subway', 'fa-suitcase', 'fa-suitcase-rolling', 'fa-sun', 'fa-superscript', 'fa-surprise', 'fa-swatchbook', 'fa-swimmer', 'fa-swimming-pool', 'fa-synagogue', 'fa-sync', 'fa-sync-alt', 'fa-syringe', 'fa-table', 'fa-table-tennis', 'fa-tablet', 'fa-tablet-alt', 'fa-tablets', 'fa-tachometer-alt', 'fa-tag', 'fa-tags', 'fa-tape', 'fa-tasks', 'fa-taxi', 'fa-teeth', 'fa-teeth-open', 'fa-temperature-high', 'fa-temperature-low', 'fa-tenge', 'fa-terminal', 'fa-text-height', 'fa-text-width', 'fa-th', 'fa-th-large', 'fa-th-list', 'fa-theater-masks', 'fa-thermometer', 'fa-thermometer-empty', 'fa-thermometer-full', 'fa-thermometer-half', 'fa-thermometer-quarter', 'fa-thermometer-three-quarters', 'fa-thumbs-down', 'fa-thumbs-up', 'fa-thumbtack', 'fa-ticket-alt', 'fa-times', 'fa-times-circle', 'fa-tint', 'fa-tint-slash', 'fa-tired', 'fa-toggle-off', 'fa-toggle-on', 'fa-toilet', 'fa-toilet-paper', 'fa-toolbox', 'fa-tools', 'fa-tooth', 'fa-torah', 'fa-torii-gate', 'fa-tractor', 'fa-trademark', 'fa-traffic-light', 'fa-train', 'fa-tram', 'fa-transgender', 'fa-transgender-alt', 'fa-trash', 'fa-trash-alt', 'fa-trash-restore', 'fa-trash-restore-alt', 'fa-tree', 'fa-trophy', 'fa-truck', 'fa-truck-loading', 'fa-truck-monster', 'fa-truck-moving', 'fa-truck-pickup', 'fa-tshirt', 'fa-tty', 'fa-tv', 'fa-umbrella', 'fa-umbrella-beach', 'fa-underline', 'fa-undo', 'fa-undo-alt', 'fa-universal-access', 'fa-university', 'fa-unlink', 'fa-unlock', 'fa-unlock-alt', 'fa-upload', 'fa-user', 'fa-user-alt', 'fa-user-alt-slash', 'fa-user-astronaut', 'fa-user-check', 'fa-user-circle', 'fa-user-clock', 'fa-user-cog', 'fa-user-edit', 'fa-user-friends', 'fa-user-graduate', 'fa-user-injured', 'fa-user-lock', 'fa-user-md', 'fa-user-minus', 'fa-user-ninja', 'fa-user-nurse', 'fa-user-plus', 'fa-user-secret', 'fa-user-shield', 'fa-user-slash', 'fa-user-tag', 'fa-user-tie', 'fa-user-times', 'fa-users', 'fa-users-cog', 'fa-utensil-spoon', 'fa-utensils', 'fa-vector-square', 'fa-venus', 'fa-venus-double', 'fa-venus-mars', 'fa-vial', 'fa-vials', 'fa-video', 'fa-video-slash', 'fa-vihara', 'fa-volleyball-ball', 'fa-volume-down', 'fa-volume-mute', 'fa-volume-off', 'fa-volume-up', 'fa-vote-yea', 'fa-vr-cardboard', 'fa-walking', 'fa-wallet', 'fa-warehouse', 'fa-water', 'fa-weight', 'fa-weight-hanging', 'fa-wheelchair', 'fa-wifi', 'fa-wind', 'fa-window-close', 'fa-window-maximize', 'fa-window-minimize', 'fa-window-restore', 'fa-wine-bottle', 'fa-wine-glass', 'fa-wine-glass-alt', 'fa-won-sign', 'fa-wrench', 'fa-x-ray', 'fa-yen-sign', 'fa-yin-yang' );
        return $fa_icons_solid;
    }
endif;


if ( ! function_exists( 'hcode_fontawesome_reg' ) ) :
    function hcode_fontawesome_reg() {
        $fa_icons_reg = array( 'fa-address-book', 'fa-address-card', 'fa-angry', 'fa-arrow-alt-circle-down', 'fa-arrow-alt-circle-left', 'fa-arrow-alt-circle-right', 'fa-arrow-alt-circle-up', 'fa-bell', 'fa-bell-slash', 'fa-bookmark', 'fa-building', 'fa-calendar', 'fa-calendar-alt', 'fa-calendar-check', 'fa-calendar-minus', 'fa-calendar-plus', 'fa-calendar-times', 'fa-caret-square-down', 'fa-caret-square-left', 'fa-caret-square-right', 'fa-caret-square-up', 'fa-chart-bar', 'fa-check-circle', 'fa-check-square', 'fa-circle', 'fa-clipboard', 'fa-clock', 'fa-clone', 'fa-closed-captioning', 'fa-comment', 'fa-comment-alt', 'fa-comment-dots', 'fa-comments', 'fa-compass', 'fa-copy', 'fa-copyright', 'fa-credit-card', 'fa-dizzy', 'fa-dot-circle', 'fa-edit', 'fa-envelope', 'fa-envelope-open', 'fa-eye', 'fa-eye-slash', 'fa-file', 'fa-file-alt', 'fa-file-archive', 'fa-file-audio', 'fa-file-code', 'fa-file-excel', 'fa-file-image', 'fa-file-pdf', 'fa-file-powerpoint', 'fa-file-video', 'fa-file-word', 'fa-flag', 'fa-flushed', 'fa-folder', 'fa-folder-open', 'fa-frown', 'fa-frown-open', 'fa-futbol', 'fa-gem', 'fa-grimace', 'fa-grin', 'fa-grin-alt', 'fa-grin-beam', 'fa-grin-beam-sweat', 'fa-grin-hearts', 'fa-grin-squint', 'fa-grin-squint-tears', 'fa-grin-stars', 'fa-grin-tears', 'fa-grin-tongue', 'fa-grin-tongue-squint', 'fa-grin-tongue-wink', 'fa-grin-wink', 'fa-hand-lizard', 'fa-hand-paper', 'fa-hand-peace', 'fa-hand-point-down', 'fa-hand-point-left', 'fa-hand-point-right', 'fa-hand-point-up', 'fa-hand-pointer', 'fa-hand-rock', 'fa-hand-scissors', 'fa-hand-spock', 'fa-handshake', 'fa-hdd', 'fa-heart', 'fa-hospital', 'fa-hourglass', 'fa-id-badge', 'fa-id-card', 'fa-image', 'fa-images', 'fa-keyboard', 'fa-kiss', 'fa-kiss-beam', 'fa-kiss-wink-heart', 'fa-laugh', 'fa-laugh-beam', 'fa-laugh-squint', 'fa-laugh-wink', 'fa-lemon', 'fa-life-ring', 'fa-lightbulb', 'fa-list-alt', 'fa-map', 'fa-meh', 'fa-meh-blank', 'fa-meh-rolling-eyes', 'fa-minus-square', 'fa-money-bill-alt', 'fa-moon', 'fa-newspaper', 'fa-object-group', 'fa-object-ungroup', 'fa-paper-plane', 'fa-pause-circle', 'fa-play-circle', 'fa-plus-square', 'fa-question-circle', 'fa-registered', 'fa-sad-cry', 'fa-sad-tear', 'fa-save', 'fa-share-square', 'fa-smile', 'fa-smile-beam', 'fa-smile-wink', 'fa-snowflake', 'fa-square', 'fa-star', 'fa-star-half', 'fa-sticky-note', 'fa-stop-circle', 'fa-sun', 'fa-surprise', 'fa-thumbs-down', 'fa-thumbs-up', 'fa-times-circle', 'fa-tired', 'fa-trash-alt', 'fa-user', 'fa-user-circle', 'fa-window-close', 'fa-window-maximize', 'fa-window-minimize', 'fa-window-restore' );

        return $fa_icons_reg;
    }
endif;

if ( ! function_exists( 'hcode_fontawesome_brand' ) ) :
    function hcode_fontawesome_brand() {
        $fa_icons_brand = array( 'fa-500px', 'fa-accessible-icon', 'fa-accusoft', 'fa-acquisitions-incorporated', 'fa-adn', 'fa-adobe', 'fa-adversal', 'fa-affiliatetheme', 'fa-algolia', 'fa-alipay', 'fa-amazon', 'fa-amazon-pay', 'fa-amilia', 'fa-android', 'fa-angellist', 'fa-angrycreative', 'fa-angular', 'fa-app-store', 'fa-app-store-ios', 'fa-apper', 'fa-apple', 'fa-apple-pay', 'fa-artstation', 'fa-asymmetrik', 'fa-atlassian', 'fa-audible', 'fa-autoprefixer', 'fa-avianex', 'fa-aviato', 'fa-aws', 'fa-bandcamp', 'fa-behance', 'fa-behance-square', 'fa-bimobject', 'fa-bitbucket', 'fa-bitcoin', 'fa-bity', 'fa-black-tie', 'fa-blackberry', 'fa-blogger', 'fa-blogger-b', 'fa-bluetooth', 'fa-bluetooth-b', 'fa-btc', 'fa-buromobelexperte', 'fa-buysellads', 'fa-canadian-maple-leaf', 'fa-cc-amazon-pay', 'fa-cc-amex', 'fa-cc-apple-pay', 'fa-cc-diners-club', 'fa-cc-discover', 'fa-cc-jcb', 'fa-cc-mastercard', 'fa-cc-paypal', 'fa-cc-stripe', 'fa-cc-visa', 'fa-centercode', 'fa-centos', 'fa-chrome', 'fa-cloudscale', 'fa-cloudsmith', 'fa-cloudversify', 'fa-codepen', 'fa-codiepie', 'fa-confluence', 'fa-connectdevelop', 'fa-contao', 'fa-cpanel', 'fa-creative-commons', 'fa-creative-commons-by', 'fa-creative-commons-nc', 'fa-creative-commons-nc-eu', 'fa-creative-commons-nc-jp', 'fa-creative-commons-nd', 'fa-creative-commons-pd', 'fa-creative-commons-pd-alt', 'fa-creative-commons-remix', 'fa-creative-commons-sa', 'fa-creative-commons-sampling', 'fa-creative-commons-sampling-plus', 'fa-creative-commons-share', 'fa-creative-commons-zero', 'fa-critical-role', 'fa-css3', 'fa-css3-alt', 'fa-cuttlefish', 'fa-d-and-d', 'fa-d-and-d-beyond', 'fa-dashcube', 'fa-delicious', 'fa-deploydog', 'fa-deskpro', 'fa-dev', 'fa-deviantart', 'fa-dhl', 'fa-diaspora', 'fa-digg', 'fa-digital-ocean', 'fa-discord', 'fa-discourse', 'fa-dochub', 'fa-docker', 'fa-draft2digital', 'fa-dribbble', 'fa-dribbble-square', 'fa-dropbox', 'fa-drupal', 'fa-dyalog', 'fa-earlybirds', 'fa-ebay', 'fa-edge', 'fa-elementor', 'fa-ello', 'fa-ember', 'fa-empire', 'fa-envira', 'fa-erlang', 'fa-ethereum', 'fa-etsy', 'fa-expeditedssl', 'fa-facebook', 'fa-facebook-f', 'fa-facebook-messenger', 'fa-facebook-square', 'fa-fantasy-flight-games', 'fa-fedex', 'fa-fedora', 'fa-figma', 'fa-firefox', 'fa-first-order', 'fa-first-order-alt', 'fa-firstdraft', 'fa-flickr', 'fa-flipboard', 'fa-fly', 'fa-font-awesome', 'fa-font-awesome-alt', 'fa-font-awesome-flag', 'fa-fonticons', 'fa-fonticons-fi', 'fa-fort-awesome', 'fa-fort-awesome-alt', 'fa-forumbee', 'fa-foursquare', 'fa-free-code-camp', 'fa-freebsd', 'fa-fulcrum', 'fa-galactic-republic', 'fa-galactic-senate', 'fa-get-pocket', 'fa-gg', 'fa-gg-circle', 'fa-git', 'fa-git-square', 'fa-github', 'fa-github-alt', 'fa-github-square', 'fa-gitkraken', 'fa-gitlab', 'fa-gitter', 'fa-glide', 'fa-glide-g', 'fa-gofore', 'fa-goodreads', 'fa-goodreads-g', 'fa-google', 'fa-google-drive', 'fa-google-play', 'fa-google-plus', 'fa-google-plus-g', 'fa-google-plus-square', 'fa-google-wallet', 'fa-gratipay', 'fa-grav', 'fa-gripfire', 'fa-grunt', 'fa-gulp', 'fa-hacker-news', 'fa-hacker-news-square', 'fa-hackerrank', 'fa-hips', 'fa-hire-a-helper', 'fa-hooli', 'fa-hornbill', 'fa-hotjar', 'fa-houzz', 'fa-html5', 'fa-hubspot', 'fa-imdb', 'fa-instagram', 'fa-intercom', 'fa-internet-explorer', 'fa-invision', 'fa-ioxhost', 'fa-itunes', 'fa-itunes-note', 'fa-java', 'fa-jedi-order', 'fa-jenkins', 'fa-jira', 'fa-joget', 'fa-joomla', 'fa-js', 'fa-js-square', 'fa-jsfiddle', 'fa-kaggle', 'fa-keybase', 'fa-keycdn', 'fa-kickstarter', 'fa-kickstarter-k', 'fa-korvue', 'fa-laravel', 'fa-lastfm', 'fa-lastfm-square', 'fa-leanpub', 'fa-less', 'fa-line', 'fa-linkedin', 'fa-linkedin-in', 'fa-linode', 'fa-linux', 'fa-lyft', 'fa-magento', 'fa-mailchimp', 'fa-mandalorian', 'fa-markdown', 'fa-mastodon', 'fa-maxcdn', 'fa-medapps', 'fa-medium', 'fa-medium-m', 'fa-medrt', 'fa-meetup', 'fa-megaport', 'fa-mendeley', 'fa-microsoft', 'fa-mix', 'fa-mixcloud', 'fa-mizuni', 'fa-modx', 'fa-monero', 'fa-napster', 'fa-neos', 'fa-nimblr', 'fa-nintendo-switch', 'fa-node', 'fa-node-js', 'fa-npm', 'fa-ns8', 'fa-nutritionix', 'fa-odnoklassniki', 'fa-odnoklassniki-square', 'fa-old-republic', 'fa-opencart', 'fa-openid', 'fa-opera', 'fa-optin-monster', 'fa-osi', 'fa-page4', 'fa-pagelines', 'fa-palfed', 'fa-patreon', 'fa-paypal', 'fa-penny-arcade', 'fa-periscope', 'fa-phabricator', 'fa-phoenix-framework', 'fa-phoenix-squadron', 'fa-php', 'fa-pied-piper', 'fa-pied-piper-alt', 'fa-pied-piper-hat', 'fa-pied-piper-pp', 'fa-pinterest', 'fa-pinterest-p', 'fa-pinterest-square', 'fa-playstation', 'fa-product-hunt', 'fa-pushed', 'fa-python', 'fa-qq', 'fa-quinscape', 'fa-quora', 'fa-r-project', 'fa-raspberry-pi', 'fa-ravelry', 'fa-react', 'fa-reacteurope', 'fa-readme', 'fa-rebel', 'fa-red-river', 'fa-reddit', 'fa-reddit-alien', 'fa-reddit-square', 'fa-redhat', 'fa-renren', 'fa-replyd', 'fa-researchgate', 'fa-resolving', 'fa-rev', 'fa-rocketchat', 'fa-rockrms', 'fa-safari', 'fa-sass', 'fa-schlix', 'fa-scribd', 'fa-searchengin', 'fa-sellcast', 'fa-sellsy', 'fa-servicestack', 'fa-shirtsinbulk', 'fa-shopware', 'fa-simplybuilt', 'fa-sistrix', 'fa-sith', 'fa-sketch', 'fa-skyatlas', 'fa-skype', 'fa-slack', 'fa-slack-hash', 'fa-slideshare', 'fa-snapchat', 'fa-snapchat-ghost', 'fa-snapchat-square', 'fa-soundcloud', 'fa-sourcetree', 'fa-speakap', 'fa-spotify', 'fa-squarespace', 'fa-stack-exchange', 'fa-stack-overflow', 'fa-staylinked', 'fa-steam', 'fa-steam-square', 'fa-steam-symbol', 'fa-sticker-mule', 'fa-strava', 'fa-stripe', 'fa-stripe-s', 'fa-studiovinari', 'fa-stumbleupon', 'fa-stumbleupon-circle', 'fa-superpowers', 'fa-supple', 'fa-suse', 'fa-teamspeak', 'fa-telegram', 'fa-telegram-plane', 'fa-tencent-weibo', 'fa-the-red-yeti', 'fa-themeco', 'fa-themeisle', 'fa-think-peaks', 'fa-trade-federation', 'fa-trello', 'fa-tripadvisor', 'fa-tumblr', 'fa-tumblr-square', 'fa-twitch', 'fa-twitter', 'fa-twitter-square', 'fa-typo3', 'fa-uber', 'fa-ubuntu', 'fa-uikit', 'fa-uniregistry', 'fa-untappd', 'fa-ups', 'fa-usb', 'fa-usps', 'fa-ussunnah', 'fa-vaadin', 'fa-viacoin', 'fa-viadeo', 'fa-viadeo-square', 'fa-viber', 'fa-vimeo', 'fa-vimeo-square', 'fa-vimeo-v', 'fa-vine', 'fa-vk', 'fa-vnv', 'fa-vuejs', 'fa-weebly', 'fa-weibo', 'fa-weixin', 'fa-whatsapp', 'fa-whatsapp-square', 'fa-whmcs', 'fa-wikipedia-w', 'fa-windows', 'fa-wix', 'fa-wizards-of-the-coast', 'fa-wolf-pack-battalion', 'fa-wordpress', 'fa-wordpress-simple', 'fa-wpbeginner', 'fa-wpexplorer', 'fa-wpforms', 'fa-wpressr', 'fa-xbox', 'fa-xing', 'fa-xing-square', 'fa-y-combinator', 'fa-yahoo', 'fa-yandex', 'fa-yandex-international', 'fa-yarn', 'fa-yelp', 'fa-yoast', 'fa-youtube', 'fa-youtube-square', 'fa-zhihu' );

        return $fa_icons_brand;
    }
endif;

if ( ! function_exists( 'hcode_fontawesome_old' ) ) {
    function hcode_fontawesome_old() {
        $fa_icon_old = array( 'fa-500px' => 'fab fa-500px','fa-address-book-o' => 'far fa-address-book','fa-address-card-o' => 'far fa-address-card','fa-adn' => 'fab fa-adn','fa-amazon' => 'fab fa-amazon','fa-android' => 'fab fa-android','fa-angellist' => 'fab fa-angellist','fa-apple' => 'fab fa-apple','fa-area-chart' => 'fas fa-chart-area','fa-arrow-circle-o-down' => 'far fa-arrow-alt-circle-down','fa-arrow-circle-o-left' => 'far fa-arrow-alt-circle-left','fa-arrow-circle-o-right' => 'far fa-arrow-alt-circle-right','fa-arrow-circle-o-up' => 'far fa-arrow-alt-circle-up','fa-arrows' => 'fas fa-arrows-alt','fa-arrows-alt' => 'fas fa-expand-arrows-alt','fa-arrows-h' => 'fas fa-arrows-alt-h','fa-arrows-v' => 'fas fa-arrows-alt-v','fa-asl-interpreting' => 'fas fa-american-sign-language-interpreting','fa-automobile' => 'fas fa-car','fa-bandcamp' => 'fab fa-bandcamp','fa-bank' => 'fas fa-university','fa-bar-chart' => 'far fa-chart-bar','fa-bar-chart-o' => 'far fa-chart-bar','fa-bathtub' => 'fas fa-bath','fa-battery' => 'fas fa-battery-full','fa-battery-0' => 'fas fa-battery-empty','fa-battery-1' => 'fas fa-battery-quarter','fa-battery-2' => 'fas fa-battery-half','fa-battery-3' => 'fas fa-battery-three-quarters','fa-battery-4' => 'fas fa-battery-full','fa-behance' => 'fab fa-behance','fa-behance-square' => 'fab fa-behance-square','fa-bell-o' => 'far fa-bell','fa-bell-slash-o' => 'far fa-bell-slash','fa-bitbucket' => 'fab fa-bitbucket','fa-bitbucket-square' => 'fab fa-bitbucket','fa-bitcoin' => 'fab fa-btc','fa-black-tie' => 'fab fa-black-tie','fa-bluetooth' => 'fab fa-bluetooth','fa-bluetooth-b' => 'fab fa-bluetooth-b','fa-bookmark-o' => 'far fa-bookmark','fa-btc' => 'fab fa-btc','fa-building-o' => 'far fa-building','fa-buysellads' => 'fab fa-buysellads','fa-cab' => 'fas fa-taxi','fa-calendar' => 'fas fa-calendar-alt','fa-calendar-check-o' => 'far fa-calendar-check','fa-calendar-minus-o' => 'far fa-calendar-minus','fa-calendar-o' => 'far fa-calendar','fa-calendar-plus-o' => 'far fa-calendar-plus','fa-calendar-times-o' => 'far fa-calendar-times','fa-caret-square-o-down' => 'far fa-caret-square-down','fa-caret-square-o-left' => 'far fa-caret-square-left','fa-caret-square-o-right' => 'far fa-caret-square-right','fa-caret-square-o-up' => 'far fa-caret-square-up','fa-cc' => 'far fa-closed-captioning','fa-cc-amex' => 'fab fa-cc-amex','fa-cc-diners-club' => 'fab fa-cc-diners-club','fa-cc-discover' => 'fab fa-cc-discover','fa-cc-jcb' => 'fab fa-cc-jcb','fa-cc-mastercard' => 'fab fa-cc-mastercard','fa-cc-paypal' => 'fab fa-cc-paypal','fa-cc-stripe' => 'fab fa-cc-stripe','fa-cc-visa' => 'fab fa-cc-visa','fa-chain' => 'fas fa-link','fa-chain-broken' => 'fas fa-unlink','fa-check-circle-o' => 'far fa-check-circle','fa-check-square-o' => 'far fa-check-square','fa-chrome' => 'fab fa-chrome','fa-circle-o' => 'far fa-circle','fa-circle-o-notch' => 'fas fa-circle-notch','fa-circle-thin' => 'far fa-circle','fa-clipboard' => 'far fa-clipboard','fa-clock-o' => 'far fa-clock','fa-clone' => 'far fa-clone','fa-close' => 'fas fa-times','fa-cloud-download' => 'fas fa-cloud-download-alt','fa-cloud-upload' => 'fas fa-cloud-upload-alt','fa-cny' => 'fas fa-yen-sign','fa-code-fork' => 'fas fa-code-branch','fa-codepen' => 'fab fa-codepen','fa-codiepie' => 'fab fa-codiepie','fa-comment-o' => 'far fa-comment','fa-commenting' => 'far fa-comment-dots','fa-commenting-o' => 'far fa-comment-dots','fa-comments-o' => 'far fa-comments','fa-compass' => 'far fa-compass','fa-connectdevelop' => 'fab fa-connectdevelop','fa-contao' => 'fab fa-contao','fa-copyright' => 'far fa-copyright','fa-creative-commons' => 'fab fa-creative-commons','fa-credit-card' => 'far fa-credit-card','fa-credit-card-alt' => 'fas fa-credit-card','fa-css3' => 'fab fa-css3','fa-cutlery' => 'fas fa-utensils','fa-dashboard' => 'fas fa-tachometer-alt','fa-dashcube' => 'fab fa-dashcube','fa-deafness' => 'fas fa-deaf','fa-dedent' => 'fas fa-outdent','fa-delicious' => 'fab fa-delicious','fa-deviantart' => 'fab fa-deviantart','fa-diamond' => 'far fa-gem','fa-digg' => 'fab fa-digg','fa-dollar' => 'fas fa-dollar-sign','fa-dot-circle-o' => 'far fa-dot-circle','fa-dribbble' => 'fab fa-dribbble','fa-drivers-license' => 'fas fa-id-card','fa-drivers-license-o' => 'far fa-id-card','fa-dropbox' => 'fab fa-dropbox','fa-drupal' => 'fab fa-drupal','fa-edge' => 'fab fa-edge','fa-eercast' => 'fab fa-sellcast','fa-empire' => 'fab fa-empire','fa-envelope-o' => 'far fa-envelope','fa-envelope-open-o' => 'far fa-envelope-open','fa-envira' => 'fab fa-envira','fa-etsy' => 'fab fa-etsy','fa-eur' => 'fas fa-euro-sign','fa-euro' => 'fas fa-euro-sign','fa-exchange' => 'fas fa-exchange-alt','fa-expeditedssl' => 'fab fa-expeditedssl','fa-external-link' => 'fas fa-external-link-alt','fa-external-link-square' => 'fas fa-external-link-square-alt','fa-eye' => 'far fa-eye','fa-eye-slash' => 'far fa-eye-slash','fa-eyedropper' => 'fas fa-eye-dropper','fa-fa' => 'fab fa-font-awesome','fa-facebook' => 'fab fa-facebook-f','fa-facebook-f' => 'fab fa-facebook-f','fa-facebook-official' => 'fab fa-facebook','fa-facebook-square' => 'fab fa-facebook-square','fa-feed' => 'fas fa-rss','fa-file-archive-o' => 'far fa-file-archive','fa-file-audio-o' => 'far fa-file-audio','fa-file-code-o' => 'far fa-file-code','fa-file-excel-o' => 'far fa-file-excel','fa-file-image-o' => 'far fa-file-image','fa-file-movie-o' => 'far fa-file-video','fa-file-o' => 'far fa-file','fa-file-pdf-o' => 'far fa-file-pdf','fa-file-photo-o' => 'far fa-file-image','fa-file-picture-o' => 'far fa-file-image','fa-file-powerpoint-o' => 'far fa-file-powerpoint','fa-file-sound-o' => 'far fa-file-audio','fa-file-text' => 'fas fa-file-alt','fa-file-text-o' => 'far fa-file-alt','fa-file-video-o' => 'far fa-file-video','fa-file-word-o' => 'far fa-file-word','fa-file-zip-o' => 'far fa-file-archive','fa-files-o' => 'far fa-copy','fa-firefox' => 'fab fa-firefox','fa-first-order' => 'fab fa-first-order','fa-flag-o' => 'far fa-flag','fa-flash' => 'fas fa-bolt','fa-flickr' => 'fab fa-flickr','fa-floppy-o' => 'far fa-save','fa-folder-o' => 'far fa-folder','fa-folder-open-o' => 'far fa-folder-open','fa-font-awesome' => 'fab fa-font-awesome','fa-fonticons' => 'fab fa-fonticons','fa-fort-awesome' => 'fab fa-fort-awesome','fa-forumbee' => 'fab fa-forumbee','fa-foursquare' => 'fab fa-foursquare','fa-free-code-camp' => 'fab fa-free-code-camp','fa-frown-o' => 'far fa-frown','fa-futbol-o' => 'far fa-futbol','fa-gbp' => 'fas fa-pound-sign','fa-ge' => 'fab fa-empire','fa-gear' => 'fas fa-cog','fa-gears' => 'fas fa-cogs','fa-get-pocket' => 'fab fa-get-pocket','fa-gg' => 'fab fa-gg','fa-gg-circle' => 'fab fa-gg-circle','fa-git' => 'fab fa-git','fa-git-square' => 'fab fa-git-square','fa-github' => 'fab fa-github','fa-github-alt' => 'fab fa-github-alt','fa-github-square' => 'fab fa-github-square','fa-gitlab' => 'fab fa-gitlab','fa-gittip' => 'fab fa-gratipay','fa-glass' => 'fas fa-glass-martini','fa-glide' => 'fab fa-glide','fa-glide-g' => 'fab fa-glide-g','fa-google' => 'fab fa-google','fa-google-plus' => 'fab fa-google-plus-g','fa-google-plus-circle' => 'fab fa-google-plus','fa-google-plus-official' => 'fab fa-google-plus','fa-google-plus-square' => 'fab fa-google-plus-square','fa-google-wallet' => 'fab fa-google-wallet','fa-gratipay' => 'fab fa-gratipay','fa-grav' => 'fab fa-grav','fa-group' => 'fas fa-users','fa-hacker-news' => 'fab fa-hacker-news','fa-hand-grab-o' => 'far fa-hand-rock','fa-hand-lizard-o' => 'far fa-hand-lizard','fa-hand-o-down' => 'far fa-hand-point-down','fa-hand-o-left' => 'far fa-hand-point-left','fa-hand-o-right' => 'far fa-hand-point-right','fa-hand-o-up' => 'far fa-hand-point-up','fa-hand-paper-o' => 'far fa-hand-paper','fa-hand-peace-o' => 'far fa-hand-peace','fa-hand-pointer-o' => 'far fa-hand-pointer','fa-hand-rock-o' => 'far fa-hand-rock','fa-hand-scissors-o' => 'far fa-hand-scissors','fa-hand-spock-o' => 'far fa-hand-spock','fa-hand-stop-o' => 'far fa-hand-paper','fa-handshake-o' => 'far fa-handshake','fa-hard-of-hearing' => 'fas fa-deaf','fa-hdd-o' => 'far fa-hdd','fa-header' => 'fas fa-heading','fa-heart-o' => 'far fa-heart','fa-hospital-o' => 'far fa-hospital','fa-hotel' => 'fas fa-bed','fa-hourglass-1' => 'fas fa-hourglass-start','fa-hourglass-2' => 'fas fa-hourglass-half','fa-hourglass-3' => 'fas fa-hourglass-end','fa-hourglass-o' => 'far fa-hourglass','fa-houzz' => 'fab fa-houzz','fa-html5' => 'fab fa-html5','fa-id-badge' => 'far fa-id-badge','fa-id-card-o' => 'far fa-id-card','fa-ils' => 'fas fa-shekel-sign','fa-image' => 'far fa-image','fa-imdb' => 'fab fa-imdb','fa-inr' => 'fas fa-rupee-sign','fa-instagram' => 'fab fa-instagram','fa-institution' => 'fas fa-university','fa-internet-explorer' => 'fab fa-internet-explorer','fa-intersex' => 'fas fa-transgender','fa-ioxhost' => 'fab fa-ioxhost','fa-joomla' => 'fab fa-joomla','fa-jpy' => 'fas fa-yen-sign','fa-jsfiddle' => 'fab fa-jsfiddle','fa-keyboard-o' => 'far fa-keyboard','fa-krw' => 'fas fa-won-sign','fa-lastfm' => 'fab fa-lastfm','fa-lastfm-square' => 'fab fa-lastfm-square','fa-leanpub' => 'fab fa-leanpub','fa-legal' => 'fas fa-gavel','fa-lemon-o' => 'far fa-lemon','fa-level-down' => 'fas fa-level-down-alt','fa-level-up' => 'fas fa-level-up-alt','fa-life-bouy' => 'far fa-life-ring','fa-life-buoy' => 'far fa-life-ring','fa-life-ring' => 'far fa-life-ring','fa-life-saver' => 'far fa-life-ring','fa-lightbulb-o' => 'far fa-lightbulb','fa-line-chart' => 'fas fa-chart-line','fa-linkedin' => 'fab fa-linkedin-in','fa-linkedin-square' => 'fab fa-linkedin','fa-linode' => 'fab fa-linode','fa-linux' => 'fab fa-linux','fa-list-alt' => 'far fa-list-alt','fa-long-arrow-down' => 'fas fa-long-arrow-alt-down','fa-long-arrow-left' => 'fas fa-long-arrow-alt-left','fa-long-arrow-right' => 'fas fa-long-arrow-alt-right','fa-long-arrow-up' => 'fas fa-long-arrow-alt-up','fa-mail-forward' => 'fas fa-share','fa-mail-reply' => 'fas fa-reply','fa-mail-reply-all' => 'fas fa-reply-all','fa-map-marker' => 'fas fa-map-marker-alt','fa-map-o' => 'far fa-map','fa-maxcdn' => 'fab fa-maxcdn','fa-meanpath' => 'fab fa-font-awesome','fa-medium' => 'fab fa-medium','fa-meetup' => 'fab fa-meetup','fa-meh-o' => 'far fa-meh','fa-minus-square-o' => 'far fa-minus-square','fa-mixcloud' => 'fab fa-mixcloud','fa-mobile' => 'fas fa-mobile-alt','fa-mobile-phone' => 'fas fa-mobile-alt','fa-modx' => 'fab fa-modx','fa-money' => 'far fa-money-bill-alt','fa-moon-o' => 'far fa-moon','fa-mortar-board' => 'fas fa-graduation-cap','fa-navicon' => 'fas fa-bars','fa-newspaper-o' => 'far fa-newspaper','fa-object-group' => 'far fa-object-group','fa-object-ungroup' => 'far fa-object-ungroup','fa-odnoklassniki' => 'fab fa-odnoklassniki','fa-odnoklassniki-square' => 'fab fa-odnoklassniki-square','fa-opencart' => 'fab fa-opencart','fa-openid' => 'fab fa-openid','fa-opera' => 'fab fa-opera','fa-optin-monster' => 'fab fa-optin-monster','fa-pagelines' => 'fab fa-pagelines','fa-paper-plane-o' => 'far fa-paper-plane','fa-paste' => 'far fa-clipboard','fa-pause-circle-o' => 'far fa-pause-circle','fa-paypal' => 'fab fa-paypal','fa-pencil' => 'fas fa-pencil-alt','fa-pencil-square' => 'fas fa-pen-square','fa-pencil-square-o' => 'far fa-edit','fa-photo' => 'far fa-image','fa-picture-o' => 'far fa-image','fa-pie-chart' => 'fas fa-chart-pie','fa-pied-piper' => 'fab fa-pied-piper','fa-pied-piper-alt' => 'fab fa-pied-piper-alt','fa-pied-piper-pp' => 'fab fa-pied-piper-pp','fa-pinterest' => 'fab fa-pinterest','fa-pinterest-p' => 'fab fa-pinterest-p','fa-pinterest-square' => 'fab fa-pinterest-square','fa-play-circle-o' => 'far fa-play-circle','fa-plus-square-o' => 'far fa-plus-square','fa-product-hunt' => 'fab fa-product-hunt','fa-qq' => 'fab fa-qq','fa-question-circle-o' => 'far fa-question-circle','fa-quora' => 'fab fa-quora','fa-ra' => 'fab fa-rebel','fa-ravelry' => 'fab fa-ravelry','fa-rebel' => 'fab fa-rebel','fa-reddit' => 'fab fa-reddit','fa-reddit-alien' => 'fab fa-reddit-alien','fa-reddit-square' => 'fab fa-reddit-square','fa-refresh' => 'fas fa-sync','fa-registered' => 'far fa-registered','fa-remove' => 'fas fa-times','fa-renren' => 'fab fa-renren','fa-reorder' => 'fas fa-bars','fa-repeat' => 'fas fa-redo','fa-resistance' => 'fab fa-rebel','fa-rmb' => 'fas fa-yen-sign','fa-rotate-left' => 'fas fa-undo','fa-rotate-right' => 'fas fa-redo','fa-rouble' => 'fas fa-ruble-sign','fa-rub' => 'fas fa-ruble-sign','fa-ruble' => 'fas fa-ruble-sign','fa-rupee' => 'fas fa-rupee-sign','fa-s15' => 'fas fa-bath','fa-safari' => 'fab fa-safari','fa-scissors' => 'fas fa-cut','fa-scribd' => 'fab fa-scribd','fa-sellsy' => 'fab fa-sellsy','fa-send' => 'fas fa-paper-plane','fa-send-o' => 'far fa-paper-plane','fa-share-square-o' => 'far fa-share-square','fa-shekel' => 'fas fa-shekel-sign','fa-sheqel' => 'fas fa-shekel-sign','fa-shield' => 'fas fa-shield-alt','fa-shirtsinbulk' => 'fab fa-shirtsinbulk','fa-sign-in' => 'fas fa-sign-in-alt','fa-sign-out' => 'fas fa-sign-out-alt','fa-signing' => 'fas fa-sign-language','fa-simplybuilt' => 'fab fa-simplybuilt','fa-skyatlas' => 'fab fa-skyatlas','fa-skype' => 'fab fa-skype','fa-slack' => 'fab fa-slack','fa-sliders' => 'fas fa-sliders-h','fa-slideshare' => 'fab fa-slideshare','fa-smile-o' => 'far fa-smile','fa-snapchat' => 'fab fa-snapchat','fa-snapchat-ghost' => 'fab fa-snapchat-ghost','fa-snapchat-square' => 'fab fa-snapchat-square','fa-snowflake-o' => 'far fa-snowflake','fa-soccer-ball-o' => 'far fa-futbol','fa-sort-alpha-asc' => 'fas fa-sort-alpha-down','fa-sort-alpha-desc' => 'fas fa-sort-alpha-up','fa-sort-amount-asc' => 'fas fa-sort-amount-down','fa-sort-amount-desc' => 'fas fa-sort-amount-up','fa-sort-asc' => 'fas fa-sort-up','fa-sort-desc' => 'fas fa-sort-down','fa-sort-numeric-asc' => 'fas fa-sort-numeric-down','fa-sort-numeric-desc' => 'fas fa-sort-numeric-up','fa-soundcloud' => 'fab fa-soundcloud','fa-spoon' => 'fas fa-utensil-spoon','fa-spotify' => 'fab fa-spotify','fa-square-o' => 'far fa-square','fa-stack-exchange' => 'fab fa-stack-exchange','fa-stack-overflow' => 'fab fa-stack-overflow','fa-star-half-empty' => 'far fa-star-half','fa-star-half-full' => 'far fa-star-half','fa-star-half-o' => 'far fa-star-half','fa-star-o' => 'far fa-star','fa-steam' => 'fab fa-steam','fa-steam-square' => 'fab fa-steam-square','fa-sticky-note-o' => 'far fa-sticky-note','fa-stop-circle-o' => 'far fa-stop-circle','fa-stumbleupon' => 'fab fa-stumbleupon','fa-stumbleupon-circle' => 'fab fa-stumbleupon-circle','fa-sun-o' => 'far fa-sun','fa-superpowers' => 'fab fa-superpowers','fa-support' => 'far fa-life-ring','fa-tablet' => 'fas fa-tablet-alt','fa-tachometer' => 'fas fa-tachometer-alt','fa-telegram' => 'fab fa-telegram','fa-television' => 'fas fa-tv','fa-tencent-weibo' => 'fab fa-tencent-weibo','fa-themeisle' => 'fab fa-themeisle','fa-thermometer' => 'fas fa-thermometer-full','fa-thermometer-0' => 'fas fa-thermometer-empty','fa-thermometer-1' => 'fas fa-thermometer-quarter','fa-thermometer-2' => 'fas fa-thermometer-half','fa-thermometer-3' => 'fas fa-thermometer-three-quarters','fa-thermometer-4' => 'fas fa-thermometer-full','fa-thumb-tack' => 'fas fa-thumbtack','fa-thumbs-o-down' => 'far fa-thumbs-down','fa-thumbs-o-up' => 'far fa-thumbs-up','fa-ticket' => 'fas fa-ticket-alt','fa-times-circle-o' => 'far fa-times-circle','fa-times-rectangle' => 'fas fa-window-close','fa-times-rectangle-o' => 'far fa-window-close','fa-toggle-down' => 'far fa-caret-square-down','fa-toggle-left' => 'far fa-caret-square-left','fa-toggle-right' => 'far fa-caret-square-right','fa-toggle-up' => 'far fa-caret-square-up','fa-trash' => 'fas fa-trash-alt','fa-trash-o' => 'far fa-trash-alt','fa-trello' => 'fab fa-trello','fa-tripadvisor' => 'fab fa-tripadvisor','fa-try' => 'fas fa-lira-sign','fa-tumblr' => 'fab fa-tumblr','fa-tumblr-square' => 'fab fa-tumblr-square','fa-turkish-lira' => 'fas fa-lira-sign','fa-twitch' => 'fab fa-twitch','fa-twitter' => 'fab fa-twitter','fa-twitter-square' => 'fab fa-twitter-square','fa-unsorted' => 'fas fa-sort','fa-usb' => 'fab fa-usb','fa-usd' => 'fas fa-dollar-sign','fa-user-circle-o' => 'far fa-user-circle','fa-user-o' => 'far fa-user','fa-vcard' => 'fas fa-address-card','fa-vcard-o' => 'far fa-address-card','fa-viacoin' => 'fab fa-viacoin','fa-viadeo' => 'fab fa-viadeo','fa-viadeo-square' => 'fab fa-viadeo-square','fa-video-camera' => 'fas fa-video','fa-vimeo' => 'fab fa-vimeo-v','fa-vimeo-square' => 'fab fa-vimeo-square','fa-vine' => 'fab fa-vine','fa-vk' => 'fab fa-vk','fa-volume-control-phone' => 'fas fa-phone-volume','fa-warning' => 'fas fa-exclamation-triangle','fa-wechat' => 'fab fa-weixin','fa-weibo' => 'fab fa-weibo','fa-weixin' => 'fab fa-weixin','fa-whatsapp' => 'fab fa-whatsapp','fa-wheelchair-alt' => 'fab fa-accessible-icon','fa-wikipedia-w' => 'fab fa-wikipedia-w','fa-window-close-o' => 'far fa-window-close','fa-window-maximize' => 'far fa-window-maximize','fa-window-restore' => 'far fa-window-restore','fa-windows' => 'fab fa-windows','fa-won' => 'fas fa-won-sign','fa-wordpress' => 'fab fa-wordpress','fa-wpbeginner' => 'fab fa-wpbeginner','fa-wpexplorer' => 'fab fa-wpexplorer','fa-wpforms' => 'fab fa-wpforms','fa-xing' => 'fab fa-xing','fa-xing-square' => 'fab fa-xing-square','fa-y-combinator' => 'fab fa-y-combinator','fa-y-combinator-square' => 'fab fa-hacker-news','fa-yahoo' => 'fab fa-yahoo','fa-yc' => 'fab fa-y-combinator','fa-yc-square' => 'fab fa-hacker-news','fa-yelp' => 'fab fa-yelp','fa-yen' => 'fas fa-yen-sign','fa-yoast' => 'fab fa-yoast','fa-youtube' => 'fab fa-youtube','fa-youtube-play' => 'fab fa-youtube','fa-youtube-square' => 'fab fa-youtube-square', /*H-code custom font*/ 'fa-facebook' => 'fab fa-facebook-f', 'fa-google-plus' => 'fab fa-google-plus-g', 'fa-linkedin' => 'fab fa-linkedin-in' );
        return $fa_icon_old;
    }
}

/**
 * Force All Page To Under Construction If "enable-under-construction" is enable
 */

if ( ! function_exists( 'hcode_under_construction_theme_option' ) ) :
    function hcode_under_construction_theme_option() {
        $hcode_under_construction = array(
            'id'       => 'enable_under_construction',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Under Construction', 'hcode-addons' ),
            'default'  => false,
            'desc' => esc_html__('Select on to put the site under construction. Only administrator will be able to see frontend site. Please logout to check under construction mode is enabled or not.', 'hcode-addons'),
        );

        return $hcode_under_construction;
    }
endif;

if ( ! function_exists( 'hcode_get_address' ) ) {
    function hcode_get_address() {
        // return the full address
        return hcode_get_protocol().'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    } // end function hcode_get_address
}

if ( ! function_exists( 'hcode_get_protocol' ) ) {
    function hcode_get_protocol() {
        // Set the base protocol to http
        $protocol = 'http';
        // check for https
        if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
            $protocol .= "s";
        }
        
        return $protocol;
    } // end function hcode_get_protocol
}
        
add_action('init', 'hcode_force_under_construction', 1);
if ( ! function_exists( 'hcode_force_under_construction' ) ) {
    function hcode_force_under_construction() {

        if (hcode_option('enable_under_construction') == 1 && !current_user_can('level_10') && hcode_option('under_construction_page') != '' ) { 
                
            // this is what the user asked for (strip out home portion, case insensitive)
            $userrequest = str_ireplace(home_url(),'',hcode_get_address());
            $userrequest = rtrim($userrequest,'/');

            $do_redirect = '';
            if( get_option('permalink_structure') ){
                $frontpage_id = get_option( 'page_on_front' );
                $post = get_post($frontpage_id); 
                $slug = $post->post_name;
                if( $slug == hcode_option( 'under_construction_page' ) ) {
                    $do_redirect = '/';
                }else{
                    $do_redirect = '/'.hcode_option('under_construction_page');
                }
            }else{
                $getpost = get_page_by_path(hcode_option('under_construction_page'));
                if ($getpost) {
                    $do_redirect = '/?page_id='.$getpost->ID;
                }
            }

            if( strpos($userrequest, '/contact-form-7/v1') !== false ) {
                return;
            }

            if ( strpos($userrequest, '/wp-login') !== 0 && strpos($userrequest, '/wp-admin') !== 0 ) {
                // Make sure it gets all the proper decoding and rtrim action
                $userrequest = str_replace('*','(.*)',$userrequest);
                $pattern = '/^' . str_replace( '/', '\/', rtrim( $userrequest, '/' ) ) . '/';
                $do_redirect = str_replace('*','$1',$do_redirect);
                $output = preg_replace($pattern, $do_redirect, $userrequest);
                if ($output !== $userrequest) {
                    // pattern matched, perform redirect
                    $do_redirect = $output;
                }
            }else{
                // simple comparison redirect
                $do_redirect = $userrequest;
            }

            if ($do_redirect !== '' && trim($do_redirect,'/') !== trim($userrequest,'/')) {
                // check if destination needs the domain prepended

                if (strpos($do_redirect,'/') === 0){
                    $do_redirect = home_url().$do_redirect;
                }

                wp_redirect( $do_redirect );
                exit();
                
            }
        }
    } // end funcion redirect
}

/**
 * To Add Under Construction Notice To Adminbar For All Logged User
 */
if ( ! function_exists( 'hcode_admin_bar_under_construction_notice' ) ) {
    function hcode_admin_bar_under_construction_notice() {
        global $wp_admin_bar;
        
        if( hcode_option( 'enable_under_construction' ) == 1 ) {
            $wp_admin_bar->add_menu( array(
                'id' => 'admin-bar-under-construction-notice',
                'parent' => 'top-secondary',
                'href' => admin_url( 'themes.php?page=hcode_theme_settings' ),
                'title' => '<span style="color: #FF0000;">'.esc_html__( 'Under Construction', 'hcode-addons' ).'</span>'
            ) );
        }
    }
}
add_action( 'admin_bar_menu', 'hcode_admin_bar_under_construction_notice' );


// Remove Empty P tag
if( ! function_exists( 'hcode_remove_wpautop' ) ) {
  function hcode_remove_wpautop( $content, $force_br = true ) {
    if ( $force_br ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

if ( ! function_exists( 'hcode_post_meta' ) ) {
    function hcode_post_meta( $option ){
        global $post;
        $value = get_post_meta( $post->ID, $option.'_single', true);
        return $value;
    }
}

/* For Image Caption */
if ( ! function_exists( 'hcode_option_image_caption' ) ) {
    function hcode_option_image_caption( $attach_id ){
        global $hcode_theme_settings, $post;
        $option = 'enable_lightbox_caption';
        if(isset($hcode_theme_settings[$option]) && $hcode_theme_settings[$option] != ''){
            $option_value = $hcode_theme_settings[$option];
            $img_meta = wp_get_attachment_metadata( $attach_id );
            $attachment = get_post( $attach_id );
            $img_info = array(
                'caption' => $attachment->post_excerpt,
            );
            if($option_value == '1'){
                return $img_info;
            }else{
                return;
            }
        }
        return;
    }
}

/* For Lightbox Image Title */
if ( ! function_exists( 'hcode_option_lightbox_image_title' ) ) {
    function hcode_option_lightbox_image_title( $attach_id ){
        global $hcode_theme_settings, $post;
        $option = 'enable_lightbox_title';
        if(isset($hcode_theme_settings[$option]) && $hcode_theme_settings[$option] != ''){
            $option_value = $hcode_theme_settings[$option];
            $img_meta = wp_get_attachment_metadata( $attach_id );
            $attachment = get_post( $attach_id );
            $img_info = array(
                'title' => $attachment->post_title
            );
            if($option_value == '1'){
                return $img_info;
            }else{
                return;
            }
        }
        return;
    }
}

if ( ! function_exists( 'hcode_get_the_excerpt_theme' ) ) {

    function hcode_get_the_excerpt_theme( $length ) {
        return hcode_Excerpt::hcode_get_by_length( $length );
    }
}

if ( ! function_exists( 'hcode_extract_shortcode_contents' ) ) :
    /**
     * Extract text contents from all shortcodes for usage in excerpts
     *
     * @return string The shortcode contents
     **/
    function hcode_extract_shortcode_contents( $m ) {
        global $shortcode_tags;

        // Setup the array of all registered shortcodes
        $shortcodes = array_keys( $shortcode_tags );
        $no_space_shortcodes = array( 'dropcap' );
        $omitted_shortcodes  = array( 'slide' );

        // Extract contents from all shortcodes recursively
        if ( in_array( $m[2], $shortcodes ) && ! in_array( $m[2], $omitted_shortcodes ) ) {
            $pattern = get_shortcode_regex();
            // Add space the excerpt by shortcode, except for those who should stick together, like dropcap
            $space = ' ' ;
            if ( in_array( $m[2], $no_space_shortcodes ) ) {
                $space = '' ;
            }
            $content = preg_replace_callback( "/$pattern/s", 'hcode_extract_shortcode_contents', rtrim( $m[5] ) . $space );
            return $content;
        }

        // allow [[foo]] syntax for escaping a tag
        if ( $m[1] == '[' && $m[6] == ']' ) {
            return substr( $m[0], 1, -1 );
        }

       return $m[1] . $m[6];
    }
endif;

if ( ! function_exists( 'hcode_registered_sidebars_array' ) ) :
function hcode_registered_sidebars_array() {
    global $wp_registered_sidebars;
    if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
        $sidebar_array = array();
        $sidebar_array['default'] = 'Default';
        foreach( $wp_registered_sidebars as $sidebar ){
            $sidebar_array[$sidebar['id']] = $sidebar['name'];
        }
    }
    return $sidebar_array;
}
endif;

if ( ! function_exists( 'hcode_addons_get_header_layout' ) ) :
    function hcode_addons_get_header_layout() {

        return array(  
                    'default'     => esc_html__( 'Default', 'hcode-addons' ),
                    'headertype1' => esc_html__( 'Light Header', 'hcode-addons' ),
                    'headertype2' => esc_html__( 'Dark Header', 'hcode-addons' ),
                    'headertype3' => esc_html__( 'Dark Transparent Header', 'hcode-addons' ),
                    'headertype4' => esc_html__( 'Light Transparent Header', 'hcode-addons' ),
                    'headertype5' => esc_html__( 'Static Sticky Header', 'hcode-addons' ),
                    'headertype6' => esc_html__( 'White Sticky Header', 'hcode-addons' ),
                    'headertype7' => esc_html__( 'Gray Header', 'hcode-addons' ),
                    'headertype8' => esc_html__( 'Non Sticky Header', 'hcode-addons' ),
                    'headertype9' => esc_html__( 'Hamburger Header 1', 'hcode-addons' ),
                    'headertype10'=> esc_html__( 'Hamburger Header 2', 'hcode-addons' ),
                    'headertype11'=> esc_html__( 'Hamburger Header 3', 'hcode-addons' ),
                );
    }
endif;


if( ! function_exists( 'hcode_get_intermediate_image_sizes' ) ) :
    function hcode_get_intermediate_image_sizes() {
        global $wp_version;
        $image_sizes = array( 'full', 'thumbnail', 'medium', 'medium_large', 'large' ); // Standard sizes
        if( $wp_version >= '4.7.0' ){
            $_wp_additional_image_sizes = wp_get_additional_image_sizes();
            if ( ! empty( $_wp_additional_image_sizes ) ) {
                $image_sizes = array_merge( $image_sizes, array_keys( $_wp_additional_image_sizes ) );
            }
            return apply_filters( 'intermediate_image_sizes', $image_sizes );
        } else {
            return $image_sizes;
        }
    }
endif;

if( ! function_exists( 'hcode_get_image_sizes' ) ) :
    function hcode_get_image_sizes() {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach ( get_intermediate_image_sizes() as $_size ) {
            if ( in_array( $_size, array('full', 'thumbnail', 'medium', 'medium_large', 'large') ) ) {
                $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
            } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                $sizes[ $_size ] = array(
                    'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                    'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                    'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                );
            }
        }
        return $sizes;
    }
endif;

if( ! function_exists( 'hcode_get_image_size' ) ) :
        function hcode_get_image_size( $size ) {
            $sizes = hcode_get_image_sizes();

            if ( isset( $sizes[ $size ] ) ) {
                return $sizes[ $size ];
            }

            return false;
        }
    endif;

if( ! function_exists( 'hcode_get_thumbnail_image_sizes' ) ) :
    function hcode_get_thumbnail_image_sizes() {

        $thumbnail_image_sizes = array();

        // Hackily add in the data link parameter.
        $hcode_srcset = hcode_get_intermediate_image_sizes();

        if(!empty($hcode_srcset)) {
            foreach ( $hcode_srcset as $value => $label ){
                
                $key = esc_attr( $label );

                $hcode_srcset_image_data = hcode_get_image_size( $label );
                $width = ( $hcode_srcset_image_data['width'] == 0 ) ? esc_html( 'Auto', 'hcode-addons' ) : $hcode_srcset_image_data['width'].'px';
                $height = ( $hcode_srcset_image_data['height'] == 0 ) ? esc_html( 'Auto', 'hcode-addons' ) : $hcode_srcset_image_data['height'].'px';
                if( $label == 'full' ) {
                    $data = esc_html__( 'Original Full Size', 'hcode-addons' );
                } else {
                    $data = ucwords( str_replace( '_', ' ', str_replace( '-', ' ', esc_attr( $label ) ) ) ).' ('.esc_attr( $width ).' X '.esc_attr( $height ).')';
                }

                $thumbnail_image_sizes[$data] = $key;
            }
        }

        return $thumbnail_image_sizes;
    }
endif;