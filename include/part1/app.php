<?php function theme_scripts(){
//css
wp_enqueue_style("app-css", get_template_directory_uri()."/assets/css/1.app.css", array(), time() , "all");
wp_enqueue_style("header-css", get_template_directory_uri()."/assets/css/2.header.css", array(), time(), "all");
wp_enqueue_style("header2-css", get_template_directory_uri()."/assets/css/3.header2.css", array(), time(), "all");
//header
wp_enqueue_script("header-functions-js", get_template_directory_uri()."/assets/js/header-functions.js", array(), time() , true);

/*
wp_enqueue_style("appc-css", get_template_directory_uri()."/assets/css/appc.css", array(), time() , "all");
wp_enqueue_style("cart-checkout", get_template_directory_uri()."/assets/css/cart-checkout.css", array(), time(), "all");
wp_enqueue_style("liteswift-css", get_template_directory_uri()."/assets/css/liteswift.css",array(), time(), "all");
wp_enqueue_style("cart-css", get_template_directory_uri()."/assets/css/add-to-cart-form.css", array(), time(), "all");
*/

wp_enqueue_script("swiper-js", get_template_directory_uri()."/assets/swiper/swiper.js", array(), time() , true);
wp_enqueue_style("swiper-css", get_template_directory_uri()."/assets/swiper/swiper.css", array(), time(), "all");

wp_enqueue_style("theme-css", get_template_directory_uri()."/assets/css/theme.css", array(), time(), "all");

wp_enqueue_style("materials-css", get_template_directory_uri()."/assets/css/materials.css", array(), time() , "all");
wp_enqueue_style("materials2-css", get_template_directory_uri()."/assets/css/materials2.css", array(), time() , "all");
wp_enqueue_style("sidemenu-css", get_template_directory_uri()."/assets/css/sidemenu.css", array(), time(), "all");

wp_enqueue_style("inputs-css", get_template_directory_uri()."/assets/css/inputs.css", array(), time(), "all");

wp_enqueue_style("style-css", get_stylesheet_uri(), array() , time() , "all");

wp_enqueue_style("accordionls-css", get_template_directory_uri()."/assets/css/accordions.css", array(), time(), "all");

wp_enqueue_style("footer-css", get_template_directory_uri()."/assets/css/footer.css", array(), time(), "all");

}

add_action("wp_enqueue_scripts", "theme_scripts");

?>