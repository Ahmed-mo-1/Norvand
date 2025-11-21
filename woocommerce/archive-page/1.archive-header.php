<header id="header">
<h1 class="container-title"><?php $archive_title = woocommerce_page_title(false) ; echo __($archive_title,''); ?></h1>
<?php do_action( 'woocommerce_archive_description' ); ?>
<br>
<?php echo do_shortcode("[catthirddesc]") ; ?>
</header>
<hr style="margin : 20px auto">