<!-- urgency bar start -->
<div style=" text-align : center ; color : white ; background : black;  padding : 10px " class=" " id="header">
<?php echo get_theme_mod("topmenu-set"); ?>
<div style="font-weight: 900; position : absolute ; right : 10px ; bottom : 50% ; transform : translateY(50%)" id="close" class="pointer">x</div>
</div>



<script>

document.getElementById("close").onclick = function close(){
const header2 = document.getElementById("header");
header2.style.display = "none";
}
</script>

<!-- urgency bar end -->

