<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/02/2019
 * Time: 14.46
 */

get_header();

if(have_posts()):?>

    <h2>Search results for: <?php echo get_search_query(); ?></h2>

<?php
    while (have_posts()) : the_post();?>

        <?php get_template_part('content');?>

    <?php endwhile;

else:

    echo '<p> No content found</p>';

endif;

get_footer();
?>