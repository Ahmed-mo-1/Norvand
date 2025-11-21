<div class="search-overlay overlay" onclick="togglesearch()"></div>

<nav class="search-menu">

<div class="menu-header">
<div onclick="togglesearch()" style="cursor : pointer"><i><img src="<?php bloginfo('template_url'); ?>/assets/svgs/cross.svg" alt="clossicon"></i></div>
</div>

<div id="search" style="padding : 20px">
<?php 
get_search_form();
?>
</div>
</nav>