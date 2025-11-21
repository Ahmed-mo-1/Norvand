<?php
//echo woocommerce_template_loop_price();
//echo woocommerce_template_loop_rating();
//echo woocommerce_template_loop_add_to_cart();
?>

<p class="archive-price"><?php echo wc_price($product->get_price());//$product->get_price_html(); ?></p>