<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $product;

include_once get_theme_file_path('include/part3/0.nav.php');
include_once get_theme_file_path('include/part3/1.description.php');
include_once get_theme_file_path('include/part3/2.shipping.php');
include_once get_theme_file_path('include/part3/3.warranty.php');
include_once get_theme_file_path('include/part3/4.tag.php');
include_once get_theme_file_path('include/part3/5.badge.php');
include_once get_theme_file_path('include/part3/6.filter.php');
?>


<script>
const cartmenu10 = document.querySelector(".cartmenu10");
const cartmenuover10 = document.querySelector(".over10");
const content = document.getElementById("content");

const description = document.getElementById("description").innerHTML;
const shipping = document.getElementById("shipping").innerHTML;
const warranty = document.getElementById("warranty").innerHTML;
const tag = document.getElementById("tag").innerHTML;
const badge = document.getElementById("badge").innerHTML;
const filter = document.getElementById("filter").innerHTML;

function woomenu(section){

if(section){
switch(section){
case 'description' : content.innerHTML = description ; break ;
case 'shipping' : content.innerHTML = shipping ; break ; 
case 'warranty' : content.innerHTML = warranty ; break ;
case 'tag' : content.innerHTML = tag ; break ;
case 'badge' : content.innerHTML = badge ; break ;
case 'filter' : content.innerHTML = filter ; break ;
default : content.innerHTML = ''; 
}
}

cartmenu10.classList.toggle("active1");
cartmenuover10.classList.toggle("active1");
}
</script>
    