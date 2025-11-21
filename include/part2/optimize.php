
<?php



/*dequeue and de regester */

function dequeue_all_woocommerce_styles() {
    if (class_exists('WooCommerce')) {
        // Log the action for debugging purposes
        error_log('Dequeue WooCommerce styles function called.');

        // Dequeue and deregister all known WooCommerce styles
        wp_dequeue_style('woocommerce-general');
        wp_deregister_style('woocommerce-general');
        
        wp_dequeue_style('woocommerce-layout');
        wp_deregister_style('woocommerce-layout');

        wp_dequeue_style('woocommerce-smallscreen');
        wp_deregister_style('woocommerce-smallscreen');

        wp_dequeue_style('woocommerce-inline');
        wp_deregister_style('woocommerce-inline');

        // Additional WooCommerce styles (add more if needed)
        wp_dequeue_style('woocommerce_frontend_styles');
        wp_deregister_style('woocommerce_frontend_styles');

        wp_dequeue_style('woocommerce_fancybox_styles');
        wp_deregister_style('woocommerce_fancybox_styles');

        wp_dequeue_style('woocommerce_chosen_styles');
        wp_deregister_style('woocommerce_chosen_styles');

        wp_dequeue_style('woocommerce_prettyPhoto_css');
        wp_deregister_style('woocommerce_prettyPhoto_css');
    }
}
add_action('wp_enqueue_scripts', 'dequeue_all_woocommerce_styles', 99); // Use a high priority to ensure it runs late


















//optimize and compine
function optimize_assets() {
    // Deregister unnecessary scripts/styles
    wp_deregister_style('unnecessary-style');
    wp_deregister_script('unnecessary-script');
    
    // Enqueue minified styles/scripts
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.min.css', array(), '1.0.0', 'all');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0.0', true);
}
//add_action('wp_enqueue_scripts', 'optimize_assets');

//remove shortcodes
function remove_unused_shortcodes() {
    remove_shortcode('elementor');
    // Add other shortcodes you want to remove
}
add_action('init', 'remove_unused_shortcodes');



//optimize html -- it causes error
function start_html_minify() {
    ob_start('minify_html_output');
}
//add_action('get_header', 'start_html_minify');

function minify_html_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',  // Remove whitespaces after tags, except space
        '/[^\S ]+\</s',  // Remove whitespaces before tags, except space
        '/(\s)+/s'       // Shorten multiple whitespace sequences
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

//optimize images
function add_lazyload_to_images($content) {
    $content = preg_replace('/<img(.*?)src=/', '<img$1loading="lazy" src=', $content);
    return $content;
}
add_filter('the_content', 'add_lazyload_to_images');


//defer js
function defer_parsing_of_js($url) {
    if (is_admin()) return $url;
    if (false === strpos($url, '.js')) return $url;
    return "$url' defer='defer";
}
//add_filter('clean_url', 'defer_parsing_of_js', 11, 1);


//disable embed
function disable_embeds_code_init() {
    remove_action('rest_api_init', 'wp_oembed_register_route');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    add_filter('embed_oembed_discover', '__return_false');
    add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');
    add_filter('rewrite_rules_array', 'disable_embeds_rewrites');
    remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
}
//add_action('init', 'disable_embeds_code_init', 9999);

function disable_embeds_tiny_mce_plugin($plugins) {
    return array_diff($plugins, array('wpembed'));
}

function disable_embeds_rewrites($rules) {
    foreach ($rules as $rule => $rewrite) {
        if (false !== strpos($rewrite, 'embed=true')) {
            unset($rules[$rule]);
        }
    }
    return $rules;
}

//remove unused (thats it)
function remove_unused_styles_scripts() {
    if (!is_admin()) {
        wp_deregister_style('elementor-frontend');
        wp_deregister_script('elementor-frontend');

		wp_dequeue_style('woocommerce-rtl');

		// Dequeue WooCommerce small screen responsive styles
		wp_dequeue_style('woocommerce-smallscreen');

		// Dequeue other WooCommerce styles
		wp_dequeue_style('woocommerce-layout');
		wp_dequeue_style('woocommerce-general');

		wp_dequeue_style('wc-blocks-style'); // WooCommerce block styles
		wp_dequeue_style('wc-blocks-vendors-style'); // WooCommerce block vendor styles
		wp_dequeue_style('wc-blocks-style-rtl'); 

		if ( class_exists( 'woocommerce' ) ) {
			wp_dequeue_style( 'select2' );
			wp_deregister_style( 'select2' );
			wp_dequeue_script( 'selectWoo' );
			wp_deregister_script( 'selectWoo' );
		}


if ( is_front_page() || is_home() ) {
        //wp_deregister_style('app-css');
        //wp_deregister_style('header-css');
        /*wp_deregister_style('materials-css');
        wp_deregister_style('look-css');
        wp_deregister_style('cart-checkout');
        wp_deregister_style('cart-css');
        wp_deregister_style('theme-css');
        wp_deregister_style('cart-checkout');*/
        //wp_deregister_style('width-css');
        //wp_deregister_style('margin-css');
        //wp_deregister_style('padding-css');
        /*wp_deregister_style('materials2-css');
        wp_deregister_style('product-gallery');*/
        //wp_deregister_style('sidemenu-css');
        //wp_deregister_style('liteswift-css');
        /*wp_deregister_style('style-css');
        wp_deregister_style('related-css');*/
        //wp_deregister_style('footer-css');
        //wp_deregister_style('accordionls-css');
        //wp_deregister_style('swiper-css');
		/*wp_dequeue_script('wc-cart-fragments');
		wp_dequeue_script('woocommerce');
		wp_dequeue_script('wc-add-to-cart');*/
		//wp_dequeue_script('swiper-js');
		//wp_dequeue_script('swiper1-js');
		//wp_dequeue_script('swiper5-js');
		//wp_dequeue_script('swiper10-js');
		//wp_dequeue_script('swiper11-r-js');
		//wp_dequeue_script('swiper2-js');
		//wp_dequeue_script('categoriesswiper-js');
		//wp_dequeue_script('script-js');
		//wp_dequeue_script('cart-js');
		/*wp_dequeue_script('woocommerce');
    wp_dequeue_style('woocommerce-rtl');*/

    // Dequeue WooCommerce small screen responsive styles
    /*wp_dequeue_style('woocommerce-smallscreen');*/

    // Dequeue other WooCommerce styles
    /*wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-general');

    wp_dequeue_style('wc-blocks-style'); // WooCommerce block styles
    wp_dequeue_style('wc-blocks-vendors-style'); // WooCommerce block vendor styles
    wp_dequeue_style('wc-blocks-style-rtl'); */
    //Dequeue WordPress Frontend styles
    wp_dequeue_style('wp-block-library'); // WordPress core block styles
    wp_dequeue_style('wp-block-library-theme'); // WordPress core block theme styles
    wp_dequeue_style('wp-editor-font'); // WordPress editor font styles

    //wp_dequeue_script( 'jquery');
   // wp_deregister_script( 'jquery');   
    wp_dequeue_script( 'wp-emoji-release.min.js');
    wp_deregister_script( 'wp-emoji-release.min.js'); 


}



    }
}
add_action('wp_enqueue_scripts', 'remove_unused_styles_scripts', 20);


function disable_plugins_on_homepage() {
    if (is_front_page() || is_home()) {
        // List of plugins to disable on the homepage
        $plugins_to_disable = array(
            'liteswift-product-options/wpc-product-options.php',
            'liteswift-product-options/index.php',
            'wordpress-seo/wp-seo.php'
        );

        // Loop through each plugin and disable it
        foreach ($plugins_to_disable as $plugin) {
            if (is_plugin_active($plugin)) {
                deactivate_plugins($plugin);
            }
        }
    }
}
//add_action('wp', 'disable_plugins_on_homepage');


//frontpage


//disable some features
function disable_wp_embeds() {
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    add_filter('embed_oembed_discover', '__return_false');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_resource_hints', 2);
}
//add_action('init', 'disable_wp_embeds');


//disable guten
function remove_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'remove_block_library_css', 100);


//lazy load
function lazy_load_images_videos($content) {
    $content = preg_replace('/<img(.*?)src=/', '<img$1loading="lazy" src=', $content);
    $content = preg_replace('/<iframe(.*?)src=/', '<iframe$1loading="lazy" src=', $content);
    return $content;
}
add_filter('the_content', 'lazy_load_images_videos');


//combine
function combine_minify_css_js() {
    wp_enqueue_style('combined-styles', get_template_directory_uri() . '/css/combined.min.css', array(), '1.0.0', 'all');
    wp_enqueue_script('combined-scripts', get_template_directory_uri() . '/js/combined.min.js', array('jquery'), '1.0.0', true);
}
//add_action('wp_enqueue_scripts', 'combine_minify_css_js');


?>