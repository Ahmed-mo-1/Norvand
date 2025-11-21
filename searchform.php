<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">


<div class="input-group">
<input type="search" class="form-control border-0" placeholder="Search" aria-label="search nico" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" autocomplete="off">
<!--<input class="srcbtn" type="submit" aria-label="search submit" value="Submit">-->

</div>


<input type="hidden" value="product" name="post_type" id="post_type" />


</form>

<div id="search-suggestions" class="search-suggestions"></div>
