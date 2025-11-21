<?php 
$men5 = get_theme_mod("menu5-set");
if(!empty($men5)){
?>

<li class="menu-item-has-children">

<a href="#">
<?php echo __(get_theme_mod("menu5-set"),'');?>
<i><!--<img src="<?php //bloginfo('template_url'); ?>/assets/svgs/larrow.svg" alt="backarraow">--></i>
</a>

<div class="mega-menu">
<div class="mega-inside">

<div class="list-item">
<h4 class="title"><?php echo __(get_theme_mod("menu5.1-set"),''); ?></h4>
<?php wp_nav_menu(array( "theme_location"=>"menu5", "container" => false, "items_wrap" => '<ul >%3$s</ul>',"walker" => new WP_Translate_Nav_Menu_Walker(), )); ?>
</div>

<div class="list-item">
<h4 class="title"><?php echo __(get_theme_mod("menu5.2-set"),''); ?></h4>
<?php wp_nav_menu(array( "theme_location"=>"menu5.1", "container"=>false, "items_wrap"=>'<ul>%3$s</ul>',"walker" => new WP_Translate_Nav_Menu_Walker(), )); ?>
</div>

<div class="list-item"></div>
<div class="list-item"></div>

<div class="list-item doublecol"><img src="<?php echo get_theme_mod('menu5img'); ?>" alt="#"/></div>

</div>
</li>

<?php } else{} ; ?>