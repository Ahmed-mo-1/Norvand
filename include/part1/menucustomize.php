<?php

function topmenu($wp_customize){
$wp_customize->add_section("topmenu-sec",array("title"=>"topmenu"));
$wp_customize->add_setting("topmenu-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("topmenu-set",array("label"=>"topmenu","description"=>"Title","section"=>"topmenu-sec","type"=>"text"));
}

add_action("customize_register", "topmenu");

?>


<?php

function packaging_image($wp_customize){
$wp_customize->add_section("packaging_sec",array("title"=>"packaging"));
$wp_customize->add_setting( 'packaging_img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'packaging_img_control', 
array('label' => 'packaging_img','priority' => 20,'section' => 'packaging_sec','settings' => 'packaging_img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "packaging_image");

?>



<?php

function menu1($wp_customize){
$wp_customize->add_section("menu1-sec",array("title"=>"menu1"));

$wp_customize->add_setting("menu1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("menu1-set",array("label"=>"menu1","description"=>"Title","section"=>"menu1-sec","type"=>"text"));

$wp_customize->add_setting("menu1.1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu1.1-set",array("label"=>"menu2","description"=>"part1","section"=>"menu1-sec","type"=>"text"));

$wp_customize->add_setting("menu1.2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu1.2-set",array("label"=>"menu3","description"=>"part2","section"=>"menu1-sec","type"=>"text"));

$wp_customize->add_setting( 'menu1img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu1img_control', 
array('label' => 'menu1img','priority' => 20,'section' => 'menu1-sec','settings' => 'menu1img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "menu1");

?>

<?php
function menu2($wp_customize){
$wp_customize->add_section("menu2-sec",array("title"=>"menu2"));

$wp_customize->add_setting("menu2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("menu2-set",array("label"=>"menu1","description"=>"Title","section"=>"menu2-sec","type"=>"text"));

$wp_customize->add_setting("menu2.1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu2.1-set",array("label"=>"menu2","description"=>"part1","section"=>"menu2-sec","type"=>"text"));

$wp_customize->add_setting("menu2.2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu2.2-set",array("label"=>"menu3","description"=>"part2","section"=>"menu2-sec","type"=>"text"));

$wp_customize->add_setting( 'menu2img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu2img_control', 
array('label' => 'menu2img','priority' => 20,'section' => 'menu2-sec','settings' => 'menu2img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "menu2");
?>


<?php
function menu3($wp_customize){
$wp_customize->add_section("menu3-sec",array("title"=>"menu3"));

$wp_customize->add_setting("menu3-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("menu3-set",array("label"=>"menu1","description"=>"Title","section"=>"menu3-sec","type"=>"text"));

$wp_customize->add_setting("menu3.1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu3.1-set",array("label"=>"menu2","description"=>"part1","section"=>"menu3-sec","type"=>"text"));

$wp_customize->add_setting("menu3.2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu3.2-set",array("label"=>"menu3","description"=>"part2","section"=>"menu3-sec","type"=>"text"));

$wp_customize->add_setting( 'menu3img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu3img_control', 
array('label' => 'menu3img','priority' => 20,'section' => 'menu3-sec','settings' => 'menu3img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "menu3");
?>

<?php
function menu4($wp_customize){
$wp_customize->add_section("menu4-sec",array("title"=>"menu4"));

$wp_customize->add_setting("menu4-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("menu4-set",array("label"=>"menu1","description"=>"Title","section"=>"menu4-sec","type"=>"text"));

$wp_customize->add_setting("menu4.1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu4.1-set",array("label"=>"menu2","description"=>"part1","section"=>"menu4-sec","type"=>"text"));

$wp_customize->add_setting("menu4.2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu4.2-set",array("label"=>"menu3","description"=>"part2","section"=>"menu4-sec","type"=>"text"));

$wp_customize->add_setting( 'menu4img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu4img_control', 
array('label' => 'menu4img','priority' => 20,'section' => 'menu4-sec','settings' => 'menu4img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "menu4");
?>


<?php
function menu5($wp_customize){
$wp_customize->add_section("menu5-sec",array("title"=>"menu5"));

$wp_customize->add_setting("menu5-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("menu5-set",array("label"=>"menu1","description"=>"Title","section"=>"menu5-sec","type"=>"text"));

$wp_customize->add_setting("menu5.1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu5.1-set",array("label"=>"menu2","description"=>"part1","section"=>"menu5-sec","type"=>"text"));

$wp_customize->add_setting("menu5.2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu5.2-set",array("label"=>"menu3","description"=>"part2","section"=>"menu5-sec","type"=>"text"));

$wp_customize->add_setting( 'menu5img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu5img_control', 
array('label' => 'menu5img','priority' => 20,'section' => 'menu5-sec','settings' => 'menu5img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "menu5");
?>


<?php
function menu6($wp_customize){
$wp_customize->add_section("menu6-sec",array("title"=>"menu6"));

$wp_customize->add_setting("menu6-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("menu6-set",array("label"=>"menu1","description"=>"Title","section"=>"menu6-sec","type"=>"text"));

$wp_customize->add_setting("menu6.1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu6.1-set",array("label"=>"menu2","description"=>"part1","section"=>"menu6-sec","type"=>"text"));

$wp_customize->add_setting("menu6.2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu6.2-set",array("label"=>"menu3","description"=>"part2","section"=>"menu6-sec","type"=>"text"));

$wp_customize->add_setting( 'menu6img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu6img_control', 
array('label' => 'menu6img','priority' => 20,'section' => 'menu6-sec','settings' => 'menu6img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "menu6");
?>


<?php
function menu7($wp_customize){
$wp_customize->add_section("menu7-sec",array("title"=>"menu7"));

$wp_customize->add_setting("menu7-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("menu7-set",array("label"=>"menu1","description"=>"Title","section"=>"menu7-sec","type"=>"text"));

$wp_customize->add_setting("menu7.1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu7.1-set",array("label"=>"menu2","description"=>"part1","section"=>"menu7-sec","type"=>"text"));

$wp_customize->add_setting("menu7.2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control ("menu7.2-set",array("label"=>"menu3","description"=>"part2","section"=>"menu7-sec","type"=>"text"));

$wp_customize->add_setting( 'menu7img', array('sanitize_callback' => 'esc_url_raw'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu7img_control', 
array('label' => 'menu5img','priority' => 20,'section' => 'menu7-sec','settings' => 'menu7img','button_labels' => 
array('select' => 'Select img','remove' => 'Remove img','change' => 'Change img',
))));
}

add_action("customize_register", "menu7");
?>


<?php
function footer($wp_customize){
$wp_customize->add_section("footer-sec",array("title"=>"footer"));

$wp_customize->add_setting("footer1-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("footer1-set",array("label"=>"footer1","description"=>"Title","section"=>"footer-sec","type"=>"text"));

$wp_customize->add_setting("footer2-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("footer2-set",array("label"=>"footer2","description"=>"Title","section"=>"footer-sec","type"=>"text"));

$wp_customize->add_setting("footer3-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("footer3-set",array("label"=>"footer3","description"=>"Title","section"=>"footer-sec","type"=>"text"));

$wp_customize->add_setting("footer4-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("footer4-set",array("label"=>"footer4","description"=>"Title","section"=>"footer-sec","type"=>"text"));

$wp_customize->add_setting("copy-set", array("type"=>"theme_mod","sanitize_callback"=>"sanitize_text_field"));
$wp_customize->add_control("copy-set",array("label"=>"copy","description"=>"Title","section"=>"footer-sec","type"=>"text"));
}

add_action("customize_register", "footer");
?>