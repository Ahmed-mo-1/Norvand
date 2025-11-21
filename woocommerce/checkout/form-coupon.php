<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>
<div class="container" style="padding-top : 0 ; padding-bottom : 0">
<div class="woocommerce-form-coupon-toggle"  style="text-align : center ; padding : 10px ; border-radius : 10px ; border: 1px solid #cccccc ;">
<?php wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', __( 'هل لديك قسيمة؟', '' ) . ' <a href="#" class="showcoupon">' . 
__( 'أنقر هنا لإدخال رمز القسيمة', '' ) . '</a>' ), 'notice' ); ?>
</div>
</div>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none ; padding : 20px ; width : 90% ; margin : 10px auto ; border-radius : 10px ; border : 1px solid #cccccc">

<p><?php echo __( 'إذا كان لديك رمز القسيمة، فيرجى استخدامه أدناه.', '' ); ?></p>

	<p class="form-row form-row-first">
		<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php echo __( 'رمز القسيمة', '' ); ?>" id="coupon_code1" value="" />
	</p>
	<br>
	<p class="form-row form-row-last">
		<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php echo __( 'استخدام القسيمة', '' ); ?></button>
	</p>

	<div class="clear"></div>
</form>
