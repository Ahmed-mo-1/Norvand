<?php
function subcategoryswiper($atts) {
ob_start();

$atts = shortcode_atts(
array('parents' => ''),
$atts,
'ssubcategories'
);

    // Convert the 'parents' attribute to an array of parent category IDs
    $parent_category_ids = array_map('trim', explode(',', $atts['parents']));

    // Initialize an array to store all subcategories
    $all_subcategories = array();

    // Fetch subcategories for each specified parent category
    foreach ($parent_category_ids as $parent_category_id) {
        $args = array(
            'taxonomy' => 'product_cat',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'date',
            'parent' => (int)$parent_category_id, // Fetch only subcategories of the specified parent category
        );
        $subcategories = get_categories($args);
        $all_subcategories = array_merge($all_subcategories, $subcategories);
    }

    // Remove duplicate subcategories (if any)
    $all_subcategories = array_unique($all_subcategories, SORT_REGULAR);
?>


<section>

<div style="height: 70px; display : flex ; align-items : center">
  <div style="color: black;" class="swiper-button-prev"></div>
  <div style="color: black;" class="swiper-button-next"></div>
</div>

<div class="categoriesswiper">
  
<!-- Additional required wrapper -->
  <div class="swiper-wrapper" role="list">
    <!-- Slides -->
<?php
    foreach($all_subcategories as $subcategory) {
        $image_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
        $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
?>
    <div class="swiper-slide" role="listitem">
            <a href="<?php echo site_url() . '/shop/' . $subcategory->slug; ?>/">
                <figure class="category-tile-image relative">
                    <img width="1000" height="1000" src="<?php echo $image_url; ?>" alt="product-category" loading="lazy">
                    <figcaption>
                        <p><?php echo __($subcategory->name,''); ?></p>
                    </figcaption>
                </figure>
            </a>
    </div>
<?php
    }
?>

  </div>
</div>
</section>

<style>
.categoriesswiper {overflow : hidden}
.categoriesswiper figure {margin: 0; aspect-ratio: 9/10 ; overflow: hidden;}
.categoriesswiper img {
    width: 100%;
    height: -webkit-fill-available;
    height: inherit;
	scale : 1.5;
    object-fit: contain;
}
.categoriesswiper figcaption {
    width: 100%;
    position: absolute;
    bottom: 0%;
    color: white;
    left: 0;
    text-align: right;
	display : flex ; 
	align-items : center; 
	justify-content : center;
	background : linear-gradient(0deg , rgba(0,0,0,0.6) , rgba(0,0,0,0));

	
}

.swiper-button-next, .swiper-button-prev {
    position: relative;
}

.categoriesswiper figcaption p {color : white ; border-top : 1px solid white ; width : 80%; font-size : 14px; padding : 14px 0}

.categoriesswiper .swiper-wrapper {height : auto !important}



.swiper-button-next:after, .swiper-button-prev:after {
    font-family: swiper-icons;
    font-size: 20px ;
}

.swiper-button-next, .swiper-rtl .swiper-button-prev {left : 0 !important ; right : 40px !important ; margin : 0!important ; height : 0!important ; top : 0 !important ; transform : scale(-1)}
.swiper-button-prev, .swiper-rtl .swiper-button-next {left : 0 !important ; right : 0 !important ; margin : 0!important ; height : 0!important ; top : 0 !important ; transform : scale(-1)}
/*
@media(max-width : 700px){
.categoriesswiper figcaption { bottom: 0; }
.categoriesswiper .swiper-wrapper{display: flex;
    width: 100%;
    flex-wrap: wrap;
    justify-content: center;
    align-items: start; gap : 10px}
.categoriesswiper figure { height : 50vw !important ; width : 40vw !important }
.categoriesswiper .swiper-slide {width : 45% !important ; height : 100% ; margin : 0 !important ; overflow : hidden}

.swiper-button-next:after, .swiper-button-prev:after {display : none}
.swiper-button-next, .swiper-rtl .swiper-button-prev {display : none}
.swiper-button-prev, .swiper-rtl .swiper-button-next {display : none}
}
*/
</style>
<?php
    $content = ob_get_clean();
    return $content;
}

add_shortcode('categoryswiper', 'subcategoryswiper');
?>
