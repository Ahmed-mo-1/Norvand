<li class="final">
<input type='checkbox' name='accordion' id='social'>
<label for='social'>
<?php echo __(get_theme_mod("footer4-set"),'');?>
</label>
<div class='content accfoo' style="">


<div class="menu">
<?php 
wp_nav_menu(array(
"theme_location"=>"footer4",
"container" => false,
"items_wrap" => '<ul >%3$s</ul>',
"walker" => new WP_Translate_Nav_Menu_Walker(),
));
?>
</div>
</div>
</li>