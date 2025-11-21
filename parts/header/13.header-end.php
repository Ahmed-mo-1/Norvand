</header>

<nav class="leftmenu">
<div class="menu-header">
<div onclick="leftmenu()" style="cursor : pointer"><i><img src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="clossicon"></i></div>
</div>
<div style="padding : 20px">
<div Id="popup4" class="">

<div id="content"></div>

</div>
</div>
</nav>

<div id="search" style="display : none">
<?php 
// echo do_shortcode("[woocommerce_cart]");
get_search_form();
?>
</div>



<script>
/*const cartmenu10 = document.querySelector(".cartmenu10");
const cartmenuover10 = document.querySelector(".over10");


const search = document.getElementById("search").innerHTML;

function leftmenu(section){

if(section){
switch(section){
case 'search' : content.innerHTML = search ; break ;
default : content.innerHTML = ''; 
}
}

cartmenu10.classList.toggle("active1");
cartmenuover10.classList.toggle("active1");
}*/
</script>
