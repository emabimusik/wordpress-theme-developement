<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/02/2019
 * Time: 14.46
 */

get_header();
?>
    <!--Main content !-->
    <div class="site-content clearfix">
            <?php
            if(have_posts()):
                while (have_posts()) : the_post();?>
                    <?php the_content();?>
                <?php endwhile;
            else:
                echo '<p> No content found</p>';

            endif;
            ?>
        <!-- courses posts loop bigin  here!-->
        <!-- Home -column!-->
        <div class="home-columns clearfix">
            <!---One half-->
            <div class="one-half">
                <h2>Latest Course</h2>
                <?php
                $the_courses = new WP_Query('cat=4&posts_per_page=2');
                ?>
                <?php if($the_courses->have_posts()):
               while($the_courses->have_posts()): $the_courses->the_post();?>
                <!--post-item -->
                 <div class="post-item clearfix">
                     <!-- post thumbnail -->
                   <div class="square-thumbnail">

                      <a href="#"> <?php
                          if(has_post_thumbnail()){
                              the_post_thumbnail('square-thumbnail');
                          }
                           else{?>
                               <img  class ="square-thumbnail"src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg"/>
                          <?php
                           }
                          ?></a>
                   </div>
                     <h4><a href="<?php the_permalink();?>"> <?php the_title();?><span class="subtle-date"><?php the_time('n/j/Y');?></span><a/></h4>
                     <?php the_excerpt();?>
                 </div>
                     <?php
                     endwhile;
                     else:
                     ?>
                <h2>No Content Found<h/2>

                    <?php
                         endif;
                         wp_reset_postdata();
                         ?>
                    <span class="horiz-center"><a href="<?php echo get_category_link(4); ?>" class="btn-a">View all Courses Posts</a></span>
            </div><!--end of one half!-->
            <div class="one-half last">
                <?php
                $the_talk = new WP_Query('cat=6&posts_per_page=2');

                ?>
                <h2>Latest Talk</h2>
                <?php if( $the_talk->have_posts()):

                    while( $the_talk->have_posts()):  $the_talk->the_post();?>

                <!--post-item -->
                <div class="post-item clearfix">

                    <!-- post thumbnail -->
                    <div class="square-thumbnail">

                        <a href="<?php get_permalink()?>"> <?php
                            if(has_post_thumbnail()){
                                the_post_thumbnail('square-thumbnail');
                            }
                            else{?>
                                <img  class ="square-thumbnail"src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg"/>
                                <?php
                            }
                            ?></a>

                    </div>
                    <h4><a href="<?php the_permalink();?>"> <?php the_title();?><span class="subtle-date"><?php the_time('n/j/Y');?></span><a/></h4>
                        <?php the_excerpt();?>
                </div> <!-- Eenf of the div post-!-->

                    <?php
                    endwhile;
                else:
                ?>
                <h2>No Content Found<h/2>

                    <?php
                    endif;
                    wp_reset_postdata();
                    ?>
                    <span class="horiz-center"><a href="<?php echo get_category_link(6); ?>" class="btn-a">View all  Talks Posts</a></span>
            </div>
        </div>
        </div>
        <!-- End of Main content !-->
<?php
get_footer();
?>