<?php


//privacy checkbox checkout
function custom_validate_privacy_policy() {
    if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
        wc_add_notice( __( '
يجب الموافقة علي الشروط والاحكام
' ), 'error' );
    }
}
add_action( 'woocommerce_checkout_process', 'custom_validate_privacy_policy' );


?>