<?php
if ( ! $product ) {return;}
$attachment_ids = $product->get_gallery_image_ids();
?>

<div class="product-gallery" style="position : relative" role="group" aria-label="Carousel">
<div class="swiper-wrapper" style="position : sticky ; bottom : 0" role="list">

<?php
$main_image_id = $product->get_image_id();
$main_image_url = wp_get_attachment_image_url( $main_image_id, 'full' );
?>


<div class="swiper-slide" role="listitem">

<div class="swiper-zoom-container">
<img class="relative swiper-zoom-target"
src="<?php echo esc_url( $main_image_url ); ?>" 
alt="<?php echo esc_attr__( 'Product main image', 'woocommerce' ); ?>">
</div>

<div class="zoom-icon" onclick="openImageInNewTab(this)">
<img alt="zoom" src="<?php bloginfo('template_url')?>/assets/svgs/zoom.svg">
</div>

</div>



<?php
foreach ( $attachment_ids as $attachment_id ) {
$image_url = wp_get_attachment_image_url( $attachment_id, 'full' ); ?>

<div class="swiper-slide relative" role="listitem">

<div class="swiper-zoom-container">
<img class="swiper-zoom-target" 
src="<?php echo esc_url( $image_url ); ?>" 
alt="<?php echo esc_attr__( 'Product gallery image', 'woocommerce' ); ?>">
</div>

<div class="zoom-icon" onclick="openImageInNewTab(this)">
<img alt="zoom" src="<?php bloginfo('template_url')?>/assets/svgs/zoom.svg">
</div>

</div>

<?php } ?>


<?php echo do_shortcode('[woovideo]'); ?>

<div class="swiper-slide relative"  role="listitem">

<div class="swiper-zoom-container">
<img class="swiper-zoom-target"
src="<?php bloginfo('template_url') ?>/assets/imgs/packaging.webp"
alt="packaging">
</div>

<div class="zoom-icon" onclick="openImageInNewTab(this)">
<img alt="zoom" src="<?php bloginfo('template_url')?>/assets/svgs/zoom.svg">
</div>

</div>
<!--ul-->
</div>

<div class="swiper-pagination"></div>
<!--<a id="a4gtl" href="#getthelook">احصل علي الاطلالة</a>-->
<?php 




// back to cat

if (is_product())
{
global $post;
        
$terms = get_the_terms($post->ID, 'product_cat');
if ($terms && !is_wp_error($terms))
{
$first_term = array_shift($terms);
$category_link = get_term_link($first_term->term_id, 'product_cat');
$category_name = $first_term->name;
echo '
<a 
href="' . esc_url($category_link) . '" 
style="position : absolute ; top : 10px ; right : 10px ; text-decoration : none ; color : black ; z-index: 10">' . __(esc_html($category_name),'') . 
'</a>';
}
}

//back to cat



?>
</div>



<style>
.swiper-slide-zoomed {overflow : hidden}
.zoom-icon {
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 5px;
    cursor: pointer;
    z-index: 10;
}


.container-product-data {display : flex ;}
.container-product-data > div:first-child {width: 70%}
.container-product-data > div:last-child {width: 30% ; padding : 20px}
@media(max-width : 991px) {
.container-product-data {flex-direction : column}
.container-product-data > div:first-child {width: 100%}
.container-product-data > div:last-child {width: 100% ; padding : 20px}
}
</style>

<style>
@media(min-width : 991px){
.product-gallery {
    width: 65%;
}

.product-gallery div.swiper-slide.swiper-slide-active {
    width: 50% !important;
	margin: 0 !important;
	aspect-ratio: 1 / 1;
	height: fit-content;
}


.product-gallery div.swiper-slide.swiper-slide-next, .product-gallery .swiper-slide {
    width: 50% !important;
	margin: 0 !important;
	aspect-ratio: 1 / 1;
	height: fit-content;
}

.product-gallery .swiper-wrapper {
    flex-wrap: wrap;
	height :auto !important;
}

.product-gallery .swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction {display : none}
#a4gtl {display : none !important}

}

.product-gallery {
    overflow: hidden !important; position : relative;
}

.product-gallery .swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction {
    position : absolute; bottom: 14px;
    right: 6px;
	text-align : right
}


.product-gallery .swiper-pagination-bullet {
    background: none;
    opacity: 1;
    border: 1px solid black;
}
.product-gallery .swiper-pagination-bullet-active {background : black}



.woocommerce span.onsale {
display: none
}
</style>
