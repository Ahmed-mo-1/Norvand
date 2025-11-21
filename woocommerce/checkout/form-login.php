<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>
<div class="container" style="padding-bottom : 0">
<div class="woocommerce-form-login-toggle" style="text-align : center ; padding : 10px ; border-radius : 10px ; border: 1px solid #cccccc ; margin : 0 auto 10px">
<?php wc_print_notice( apply_filters( 'woocommerce_checkout_login_message', __( 'عميل سابق؟', '' ) ) . ' <a href="#" class="showlogin">' . 
__( 'أنقر هنا لتسجيل الدخول', '' ) . '</a>', 'notice' ); ?>
</div>
</div>

<style>
.woocommerce-form-login {padding : 20px ; width : 90% ; margin : 10px auto ; border-radius : 10px ; border : 1px solid #cccccc}
</style>


<?php
woocommerce_login_form(
	array(
		'message'  => __( 'إذا تسوّقت بمتجرنا من قبل ولديك حساب لدينا، الرجاء إدخال تفاصيل دخولك بالأسفل. وإذا كنت عميلاً جديدًا، فيرجى منك المتابعة إلى قسم الفاتورة.', '' ),
		'redirect' => wc_get_checkout_url(),
		'hidden'   => true,
	)
);
