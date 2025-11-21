<?php 
$men1 = get_theme_mod("menu1-set");
if(!empty($men1)){
?>

<li class="menu-item-has-children">

<a href="#">
<?php echo __(get_theme_mod("menu1-set"),''); ?>
<i><!--<img src="<?php //bloginfo('template_url'); ?>/assets/svgs/larrow.svg" alt="backarraow">--></i>
</a>

<div class="mega-menu">
<div class="mega-inside">

<div class="list-item">
<h4 class="title"><?php echo __(get_theme_mod("menu1.1-set"),'');?></h4>
<?php wp_nav_menu(array( "theme_location"=>"menu1", "container" => false, "items_wrap" => '<ul >%3$s</ul>',"walker" => new WP_Translate_Nav_Menu_Walker(), )); ?>
</div>

<div class="list-item">
<h4 class="title"><?php echo __(get_theme_mod("menu1.2-set"),'');?></h4>
<?php wp_nav_menu(array( "theme_location"=>"menu1.1", "container" => false, "items_wrap" => '<ul>%3$s</ul>',"walker" => new WP_Translate_Nav_Menu_Walker(), )); ?>
</div>

<div class="list-item"></div>
<div class="list-item"></div>

<div class="list-item doublecol"><img src="<?php echo get_theme_mod('menu1img'); ?>" alt="#"/></div>

</div>
</li>

<?php } else{} ; ?>