<?php

function liteswift_menus(){
register_nav_menus(
array( 
// id=>name

"menu1" => "menu1-row1",
"menu1.1" => "menu1-row2",

"menu2" => "menu2-row1",
"menu2.1" => "menu2-row2",

"menu3" => "menu3-row1",
"menu3.1" => "menu3-row2",

"menu4" => "menu4-row1",
"menu4.1" => "menu4-row2",

"menu5" => "menu5-row1",
"menu5.1" => "menu5-row2",

"menu6" => "menu6-row1",
"menu6.1" => "menu6-row2",

"menu7" => "menu7-row1",
"menu7.1" => "menu7-row2",

"footer1" => "footer1",
"footer2" => "footer2",
"footer3" => "footer3",
"footer4" => "footer4",

));}
add_action("after_setup_theme" , "liteswift_menus");

?>