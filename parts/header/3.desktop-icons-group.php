<!-- right icons container start -->
<div class="icons-group">

<!-- humberger menu icon -->
<div class="humberger" onclick="toggleMenu()"><!--mobileMenuTrigger to humberger-->
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/menu.svg" alt="menu">
</div>

<!-- desktop cart // removed id desktop-cart -->
<div class="desktop-icon" onclick="toggleCart()">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/cart.svg" alt="carticon">

<span class="flx jcc aic bw absolute t0 l-8 br50 fs10 w14px h14">
<?php echo WC()->cart->get_cart_contents_count(); ?>
</span>


</div>

<!-- desktop wishlist icon -->
<a href="<?php  echo home_url('/wishlist/'); ?>" class="desktop-icon">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/heart.svg" alt="heart">
</a>

<!-- desktop account icon -->
<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="desktop-icon">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/account.svg" alt="account">
</a>

<!-- desktop search icon -->
<div class="desktop-icon" onclick="togglesearch()">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/search.svg" alt="search">
</div>

<!-- right icons container end -->
</div>
