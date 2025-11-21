<li>
<input type='checkbox' name='accordion' id='company'>
<label for='company'>
<?php echo __(get_theme_mod("footer2-set"),'');?>
</label>
<div class='content accfoo' style="">


<div class="menu">
<?php 
wp_nav_menu(array(
"theme_location"=>"footer2",
"container" => false,
"items_wrap" => '<ul >%3$s</ul>',
"walker" => new WP_Translate_Nav_Menu_Walker(),
));
?>
</div>
</div>
</li>