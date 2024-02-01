<?php if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<form class="search_form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input type="search" class="search_field" name="s" value="<?php if (is_search()) { echo get_search_query(); } ?>" placeholder="Zoeken..." />

	<button type="submit" id="search_button" class="search_button" role="button">Zoeken</button>

</form>