<?php
function imgdes() { ?>


<div class="condes">

<?php echo do_shortcode('[pro_image3]') ; ?>

<?php echo do_shortcode('[pro_third_desc]') ; ?>

<style>
.condes {display: flex ; align-items : center ; justify-content : space-between ; width : 100% ; padding : 20px ; flex-direction : column}
@media(min-width : 991px){
.condes {flex-direction : row}
.condes div {width : 50%}
.condes div product-image img {width: 100%}
}
</style>
</div>

<?php

}

add_shortcode( 'imgdes', 'imgdes' );
?>