<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/02/2019
 * Time: 15.45
 */
get_header();
if(have_posts()):
    while (have_posts()) : the_post();?>

        <article class="post page">
            <?php
            if(has_children() OR $post->post_parent>0) {?>
                <!-- show the ttitle of the ancestor -->
                <nav class="site-nav children-links clearfix">

            <span class="parent-link"><a href="<?php get_the_permalink(get_top_ancestor_id());?>">

               <?php echo get_the_title(get_top_ancestor_id());?> </a> </span>
                    <ul>
                        <?php
                        /*$post->ID  = current post id!   has been remplaced by get_the_ancestor_id*/
                        /* remove the title  'title_li' =>''*/

                        $args = array(

                            'child_of' =>get_top_ancestor_id(),
                            'title_li' =>''
                        );
                        ?>
                        <?php wp_list_pages($args);?>
                    </ul>
                </nav>

            <?php }?>


            <h2><?php the_title() ;?></h2>

            <?php the_content();?>

        </article>
    <?php endwhile;
else:
    echo '<p> No content found</p>';
endif;
get_footer();

?>