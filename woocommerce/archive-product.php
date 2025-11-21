<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>

<div class="container">
<?php
include_once get_theme_file_path('woocommerce/archive-page/1.archive-header.php');
include_once get_theme_file_path('woocommerce/archive-page/2.archive-content.php');
include_once get_theme_file_path('woocommerce/archive-page/3.archive-footer.php');
?>
</div>



<!-- adding -->
<style>
.woocommerce div.product {
    margin-bottom: 0;
    position: relative;
    width: 100%;
    height: max-content;
}
</style>


<style>

.product-catalog {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

/* Product styling */


.product img {
max-width: 100%;
    width: 100% !important;
    height: 100%;
    display: block;
    margin: 0 !important;
}



.product h2.woocommerce-loop-product__title {
    font-size: 14px;
    font-weight: 400;
}

.x2 {padding : 0 ; margin : 10px ; background : black}

@media (max-width: 991px) {
    .product-catalog {
        grid-template-columns: repeat(2, 1fr);    gap: 10px;
    padding: 0;
    }
	.product {

}

.x2 {padding : 0 ; margin : 0 ; background : black}
}


.custom-thumbnails .thumbnail { text-align : center}

.custom-thumbnails .btndiv a {background: none !important;
    color: white !important;
    border: 1px solid white !important;
    border-radius: 0 !important;
    margin : 26px auto;
    text-align: center !important;
    width: 80% !important;




}

.attribute-engraving {
}

</style>


<?php
get_footer( 'shop' );
