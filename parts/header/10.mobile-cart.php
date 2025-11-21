<div onclick="toggleCart()" id="mobile-cart" class="mobile-cart-icon">
<img class="mobileicon" src="<?php bloginfo('template_url'); ?>/assets/svgs/cart.svg" alt="carticon">

<span class="flx jcc aic bw absolute t0 l-8 br50 h14 w14px fs10">
<?php echo WC()->cart->get_cart_contents_count(); ?>
</span>
</div>