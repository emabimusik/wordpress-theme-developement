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
   <div class="main-column">
       <?php
       if(have_posts()):

           while (have_posts()) : the_post();?>
               <?php get_template_part('content',get_post_format());?>
           <?php endwhile;

       else:

           echo '<p> No content found</p>';

       endif;
       ?>


   </div>


    <!-- End of Main content !-->
<!--Side bar!-->
  <?php get_sidebar();?>
</div> <!--end of content clear fix!-->
<?php
   get_footer();
?>