<div class="container-2col" >

<div>

<div style="width : 250px ; flex-direction : column ; margin : auto">

<h1 style="font-size : 42px ; display : block ; font-weight : 300">
<?php echo __('السعادة',''); ?>
</h1>

<h1 style="font-size : 42px ; display : flex ; justify-content : end ;font-weight : 900">
<?php echo __('مضمونه',''); ?>
</h1>

</div>
</div>

<br>

<div class="comparison" style="">

<ul>
<li></li>
<li>
<?php echo __('نورڨاند',''); ?>

</li>
<li>
<?php echo __('شركات أخرى',''); ?>
</li>
</ul>

<ul>
<li>
<?php echo __('كفالة لمدة سنتين',''); ?>
</li>
<li><img class="mobileicon" src="<?php bloginfo('template_url'); ?>/assets/svgs/true.svg" alt="true"></li>
<li><img style="width : 10px" src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="false"></li>
</ul>

<ul>
<li>
<?php echo __('ثبات اللون',''); ?>
</li>
<li><img class="mobileicon" src="<?php bloginfo('template_url'); ?>/assets/svgs/true.svg" alt="true"></li>
<li><img style="width : 10px" src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="false"></li>
</ul>

<ul>
<li>
<?php echo __('منتجات مقاومة للماء',''); ?>
</li>
<li><img class="mobileicon" src="<?php bloginfo('template_url'); ?>/assets/svgs/true.svg" alt="true"></li>
<li><img style="width : 10px" src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="false"></li>
</ul>

<ul>
<li>
<?php echo __('لا تسبب حساسية',''); ?>
</li>
<li><img class="mobileicon" src="<?php bloginfo('template_url'); ?>/assets/svgs/true.svg" alt="true"></li>
<li><img style="width : 10px" src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="false"></li>
</ul>

</div>

</div>


<style>
.comparison {display : flex ; flex-direction : column ;  font-size : 14px}
.comparison > ul {list-style : none ; display : flex ; width : 100% }
.comparison > ul > li {width : 30% ; padding : 10px 0 ; text-align : center ; font-weight : 500 ;}
.comparison > ul > li:first-child {width : 40% ; text-align : start}
.comparison > ul {border-bottom : 1px solid black}
.comparison > ul:last-child {border : none}
</style>