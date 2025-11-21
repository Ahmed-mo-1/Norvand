<!-- mobile menu head -->
<div class="mobile-menu-head">

<!-- icons group -->
<div class="mobile-menu-head-icons-group-container">

<div onclick="togglesearch()" class="search-trigger mobile-icon">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/search.svg" alt="search">
</div>

<a href="<?php echo home_url('/wishlist/'); ?>/wishlist" class="mobile-icon">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/heart.svg" alt="heart">
</a>

<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>/my-account" class="mobile-icon">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/account.svg" alt="account">
</a>

</div>


<!-- submenu head icons -->
<div class="go-back" onclick="hideSubMenu()">
<img class="icon" src="<?php bloginfo('template_url'); ?>/assets/svgs/rarrow.svg" alt="backicon">
</div>

<div class="current-menu-title"></div>

<div class="mobile-menu-close" onclick="toggleMenu()">
<img class="mobileicon" src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="clossicon">
</div>

</div>