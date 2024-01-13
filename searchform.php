<?php
/**
 * Template for displaying search forms in Dsignfly
 *
 * @package Dsignfly
 */

?>
<form action="/" method="get">
<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
<input  class="search-image"
		type="image" alt="Search" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/search.png" />
</form>
