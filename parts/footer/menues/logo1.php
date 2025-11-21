<li class="logo1 final" style="width : 100% ; margin : 50px 0 20px 0">
<input type='checkbox' name='accordion' id='first' checked>
<div style="display : flex ; align-items : center ; justify-content : center">
<a href='#'>
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
echo '<img style="width : 200px" src="' . esc_url( $custom_logo_url ) . '" alt="footerlogo">';
?>
</a>


</div>
</li>