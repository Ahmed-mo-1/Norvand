<div class="cart-overlay overlay" onclick="toggleCart()"></div>

<nav class="leftmenu">

<div class="menu-header">
<div onclick="toggleCart()" style="cursor : pointer"><i><img src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="clossicon"></i></div>
</div>

<div class="p20">
<?php echo do_shortcode("[woocommerce_cart]"); ?>
</div>
</nav>