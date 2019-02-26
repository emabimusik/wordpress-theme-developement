<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21/02/2019
 * Time: 12.56
 */

?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s"     placeholder="<?php echo the_search_query(); ?>"  />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>