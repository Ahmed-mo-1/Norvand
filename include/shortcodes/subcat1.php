
<?php
function subcategoryswiper1($atts) {
    $atts = shortcode_atts(
        array(
            'parent' => 0, // Default parent category ID
        ),
        $atts,
        'ssubcategories'
    );

    $parent_category_id = $atts['parent'];
?>

<section>

<div style="position : relative ; height : 50px">
  <div style="color : black" class="swiper-button-prev"></div>
  <div style="color : black" class="swiper-button-next"></div>
</div>

<div class="swiper">
  
<!-- Additional required wrapper -->
  <div class="swiper-wrapper" role="list">
    <!-- Slides -->
<?php
$args = array(
    'taxonomy' => 'product_cat',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'date',
    'parent' => $parent_category_id, // Fetch only subcategories of the specified parent category
);
$subcategories = get_categories($args);
foreach($subcategories as $subcategory) {
    $image_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
    $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
?>
    <div class="swiper-slide" role="listitem">
            <a href="<?php echo site_url() . '/shop/' . $subcategory->slug; ?>/">
                <figure class="category-tile-image relative">
                    <img width="423" height="450" src="<?php echo $image_url; ?>" alt="product-category" loading="lazy">
                    <figcaption>
                        <h3><?php echo __($subcategory->name,''); ?></h3>
                    </figcaption>
                </figure>
            </a>
    </div>
<?php }
?>

  </div>
</div>
</section>


<style>
.swiper figure {margin: 0}
.swiper img {width : 100%}
.swiper figcaption {
    width: 100%;
    position: absolute;
    bottom: 20px;
    color: black;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
}
.swiper-wrapper {height : auto !important}



.swiper-button-next:after, .swiper-button-prev:after {
    font-family: swiper-icons;
    font-size: 20px ;
}

.swiper-button-next, .swiper-rtl .swiper-button-prev {left : 0 !important ; right : 40px !important ; margin : 0!important ; height : 0!important ; top : 0 !important ; transform : scale(-1)}
.swiper-button-prev, .swiper-rtl .swiper-button-next {left : 0 !important ; right : 0 !important ; margin : 0!important ; height : 0!important ; top : 0 !important ; transform : scale(-1)}
</style>

<?php }

add_shortcode( 'ssubcategories', 'subcategoryswiper1' );
?>
