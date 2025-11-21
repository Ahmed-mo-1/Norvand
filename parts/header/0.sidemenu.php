<?php
//echo '<div>' . do_shortcode('[sidecart]') . '</div>';
if (is_product() || is_product_category() || is_product_tag() || is_shop()) { include_once get_theme_file_path('include/part3/sidemenu.php') ; }
?>