<div style="">

<h1 class="container-title">
<?php echo __(get_the_title(), ''); ?>
</h1>



<!-- price -->
<!-- c1 -->
<div style="display : flex ; width : 100% ; align-items : center ; 
justify-content : space-between">
<!-- c2 -->
<div>

<!-- c3 -->
<div>
<?php 
//tag name
$posttags = get_the_terms( get_the_ID(), 'product_tag' );
if($posttags){
foreach($posttags as $product_tag) {
echo __($product_tag->name,'') ; }
}
?>
<!-- c3 -->
</div>

<!-- price -->
<p style="font-size : 16px ; font-weight : 600">
<?php echo wc_price($product->get_price());//$product->get_price_html(); ?>
</p>
<!-- c2 -->
</div>

<!-- badge -->
<div style="height : 50px ; width : 50px" onclick="woomenu('badge')" class="pointer">
<img style="height : 100% ; width : 100%" 
src="<?php bloginfo('template_url')?>/assets/svgs/guarantee.webp" alt="badge1">
</div>

<!-- c1 -->
</div>

<hr style="margin : 30px auto 14px ; width : 100% ; opacity : 0.5">


<?php


echo do_shortcode('[first_material]');
echo do_shortcode('[second_material]');
echo do_shortcode('[third_material]');

/*
echo '<div class="color-container">
<div class="material">اللون : </div>'.$product->post->post_excerpt;
$posttags = get_the_terms( get_the_ID(), 'product_tag' );
if($posttags){
foreach($posttags as $product_tag) {
echo '<p>' . $product_tag->name . '</p>'; }};
echo '</div>';
*/

echo '<div class="color-container">' . do_shortcode('[pro_short_desc2]') . '</div>';

add_shortcode( 'stock_status', 'display_product_stock_status' );
function display_product_stock_status( $atts) {

    $atts = shortcode_atts(
        array('id'  => get_the_ID() ),
        $atts, 'stock_status'
    );

    $product = wc_get_product( $atts['id'] );

    $stock_status = $product->get_stock_status();

    if ( 'instock' == $stock_status) {
$attribute_slug = 'pa_handmade';
$attribute_value = 'handmade';
if (!has_term($attribute_value, $attribute_slug, $product->get_id())) {
        ?>
        <p class="stock in-stock tac m20tb">

<div class="fw4" style="margin : auto ; width : 150px ; display : flex ; gap : 10px ; align-items : center ; justify-content : center ;
padding : 4px 16px ; border-radius : 20px ; background : #f7f2ec ; color : #2a7f13">
<div>
<?php echo __('متوفر',''); ?> 
</div>
<div class="imgicon" style="width : 15px ; height : 15px">
<img style="width : 100% ; height : 100%" src="<?php bloginfo('template_url') ?>/assets/svgs/true.svg" alt="true">
</div>
</div>
</p>
        <?php
    }} else {
        return '<p class="stock out-of-stock">Out of stock</p>';
    }
}
echo do_shortcode("[stock_status]");
?>

<?php
$attribute_slug = 'pa_handmade';
$attribute_value = 'handmade';

if (has_term($attribute_value, $attribute_slug, $product->get_id())) {
?>
<p class="stock in-stock tac m20tb">
<div class="fw4" style="margin : auto ; width : 150px ; display : flex ; gap : 10px ; align-items : center ; justify-content : center ;
padding : 4px 16px ; border-radius : 20px ; background : #f7f2ec ; color : #2a7f13">
<div>
<?php echo __('مصنوع يدويا',''); ?>ا
</div>
<div class="imgicon" style="width : 15px ; height : 15px">
<img style="width : 100% ; height : 100%" src="<?php bloginfo('template_url') ?>/assets/svgs/true.svg" alt="true">
</div>

</div>
</p>
<?php } ?>






<?php
$attribute_slug = 'pa_preorder';
$attribute_value = 'Preorder';

if (has_term($attribute_value, $attribute_slug, $product->get_id())) {
?>
<p class="stock in-stock tac m20tb">
<div class="fw4" style="margin :14px auto ; width : 150px ; display : flex ; gap : 10px ; align-items : center ; justify-content : center ;
padding : 4px 16px ; border-radius : 20px ; background : #f7f2ec ; color : #2a7f13">
<div>
<?php echo __('حجز مسبق',''); ?>
</div>
<div class="imgicon" style="width : 15px ; height : 15px">
<img style="width : 100% ; height : 100%" src="<?php bloginfo('template_url') ?>/assets/svgs/true.svg" alt="true">
</div>

</div>
</p>
<?php } ?>







<!-- price -->

<?php
woocommerce_template_single_add_to_cart();
?>






<!--after cart-->


<div style="display : flex ; flex-direction : column">


<style>
    img.info {display : none !important}
    .wc_payment_method img {display : none}
</style>
<br>
<?php echo do_shortcode('[tabby]'); ?>

<div style="text-align : center ; width : 100%; background : #f7f2ec  ; padding : 10px ; margin : 10px auto ; border-radius : 10px">
<p style=" ; color : black">
<?php echo __('خصم 50% على أساور فلاورد الأكثر مبيعا !',''); ?>
</p>
<br>
<a href="<?php echo home_url('/shop/flowerd-bracelets/'); ?>" style="color: black ; text-decoration : none ; border-bottom : 1px solid black">
<?php echo __('اكتشف المزيد',''); ?> 
</a>
</div>

<div class="main-footer" style="background : none ; padding : 0 ; margin : 0 ; display : flex ; flex-direction : column">

<ul class="accordions" onSelectStart="return false">




<!--
<li class="product-tap"><label for="" onclick="sidenav22('description')">
التفاصيل + القياس
</label></li>
-->





<!--start-->
<li class="product-tap"><label for="" onclick="sidenavsize()">
<?php echo __('التفاصيل + القياس',''); ?>
</label></li>

<!--sizenav styles and scripts-->

<!--sizenav styles and scripts-->

<li class="product-tap"><label for="" onclick="woomenu('shipping')">
<?php echo __('التوصيل والإرجاع',''); ?>
</label></li>

<li class="product-tap"><label for="" onclick="woomenu('badge')">
<?php echo __('الضمان لمدة سنتين',''); ?>
</label></li>

<?php $posttags = get_the_terms( get_the_ID(), 'product_tag' ); if($posttags){ ?>
<li class="product-tap"><label for="" onclick="woomenu('tag')">
<?php foreach($posttags as $product_tag) {echo __($product_tag->name, ''); } ?>
</label></li>
<?php } ?>


<!--<li class="product-tap"><label for="" onclick="sidenavcolor()">الخامة</label></li>-->

<!--color menu styles and scripts-->

<!--color menu styles and scripts-->


    


<?php 
//include_once get_theme_file_path('include/part3/sidemenu.php') ;
?>

</ul>



<!--sizenav styles and scripts-->
<style>
.variations {width : 100%}
.sizemenu{transform: translate(-100%)}
.sizemenu.active{transform: translate(0%) ; }
.oversize {visibility : hidden ; opacity : 0 ; }
.oversize.active {visibility : visible ; opacity : 1}

</style>


    <div class="ovver oversize" onclick="sidenavsize()"></div>

<nav class="mm sizemenu">
<div class="menu-header">
<div onclick="sidenavsize()" style="cursor : pointer"><i><img src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="clossicon"></i></div>
</div>
<div style="padding : 20px">
<div Id="popup4" class="" style="font-size : 16px">

<?php
global $post;
$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );
?>

<?php if ( $heading ) : ?>
<h2 style="text-align : center"><?php echo esc_html( $heading ); ?></h2>
<?php endif; ?>

<?php
if(is_product()){
    the_content();
}
?>
<br>
<?php echo do_shortcode('[attr_desc attribute="size" ]'); ?>

</div>
</div>

</nav>

<script>
const sizemenu = document.querySelector(".sizemenu");
const oversize = document.querySelector(".oversize");
function sidenavsize(){
sizemenu.classList.toggle("active");
oversize.classList.toggle("active");
}
</script>
<!--end-->
<!--sizenav styles and scripts-->






<!--color menu styles and scripts-->
<style>

.colormenu{transform: translate(-100%)}
.colormenu.active{transform: translate(0%) ; }
.overcolor {visibility : hidden ; opacity : 0 ; }
.overcolor.active {visibility : visible ; opacity : 1}

</style>


    <div class="ovver overcolor" onclick="sidenavcolor()"></div>

<nav class="mm colormenu">
<div class="menu-header">
<div onclick="sidenavcolor()" style="cursor : pointer"><i><img src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="clossicon"></i></div>
</div>
<div style="padding : 20px">
<div Id="popup4" class="" style="font-size : 16px">

<?php echo do_shortcode('[attr_desc attribute="color" ]'); ?>

</div>
</div>

</nav>

<script>
const colormenu = document.querySelector(".colormenu");
const overcolor = document.querySelector(".overcolor");
function sidenavcolor(){
colormenu.classList.toggle("active");
overcolor.classList.toggle("active");
}
</script>
<!--color menu styles and scripts-->




</div>


</div>



<!--after cart-->


</div>