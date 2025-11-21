<a class="logolink" href='<?php bloginfo('home'); ?>'>
<?php
if(has_custom_logo()){
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="logo">';
}
else{echo bloginfo('title');}
?>
</a>