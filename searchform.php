<?php
?>
<form action="/" method="get">
<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
<input  class="search-image"
        type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" />
</form>