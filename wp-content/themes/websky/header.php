<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="<?php  bloginfo('charset');?>
        <meta name ="viewport" content ="width= device-width">
        <title><?php bloginfo('name');?></title>
        <?php wp_head();?>

    </head>
<body  <?php body_class();?>>

    <div class="container">
            <!-- site-header -->
            <header class="site-header">

                <!--searchbox -->
                 <div class="hd-search">
                     <?php get_search_form(); ?>
                 </div>

                <!--searchbox-->


               <h1> <a href="<?php echo home_url();?>"><?php bloginfo('name');?></a> </h1>
                <h5><?php bloginfo('descrption');?></h5>
                    <nav class="site-nav">
                     <?php $args = array(
                        'theme_location'=>'primary'
                     );?>
                    <?php wp_nav_menu();?>
                </nav>
            </header>
            <!--end site-header-->
