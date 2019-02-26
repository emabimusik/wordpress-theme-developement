<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/02/2019
 * Time: 16.19
 */

function  webskyWordpress_ressources(){
    wp_enqueue_style('style',get_stylesheet_uri());

}
add_action('wp_enqueue_scripts','webskyWordpress_ressources');



// function to get The Top ancestor id

function get_top_ancestor_id(){
     global $post;

    if($post->post_parent){
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      return $ancestors[0];
    }
    return $post->ID;
}
function has_children(){
    global  $post;
    $pages = get_pages('child_of='.$post->ID);
    return count($pages);

}
/* theme setup */

function websky_setup_theme(){

    // Navigation Menu

    register_nav_menus(array(
        'primary'=> __('Primary Menu'),
        'footer'=>__('Footer Menu')
    ));

    // add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail',180,120,true);
    add_image_size('banner-image',920,210,true);
    add_image_size('square-thumbnail', 80, 80, true);

    // add post format support
    add_theme_support('post-formats',array('aside','gallery','link'));

}
add_action('after_setup_theme','websky_setup_theme');
// customize expert
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// add widget  location

function ourWidgetInit(){
    register_sidebar (array(
        'name'=>'Sidebar',
        'id'=>'sidebar1',
        'before_widget'=>'<div class="widget-item">',
        'after_widget'=>'</div>'


    ));
    register_sidebar (array(
        'name'=>'Footer Area One',
        'id'=>'footer1',
        'before_widget'=>'<div class="widget-item">',
        'after_widget'=>'</div>'

    ));
    register_sidebar (array(
        'name'=>'Footer Area Two',
        'id'=>'footer2',
        'before_widget'=>'<div class="widget-item">',
        'after_widget'=>'</div>'

    ));
    register_sidebar (array(
        'name'=>'Footer Area Three',
        'id'=>'footer3',
        'before_widget'=>'<div class="widget-item">',
        'after_widget'=>'</div>'
    ));
    register_sidebar (array(
        'name'=>'Footer Area Four',
        'id'=>'footer4',
        'before_widget'=>'<div class="widget-item">',
        'after_widget'=>'</div>'

    ));
}

add_action('widgets_init','ourWidgetInit');

/* Customize Appearance Options*/
function websky_customize_register($wp_customize){
    $wp_customize->add_setting('wbsk_link_color',array(
        'default'=>'#006ec3',
        'transport'=>'refresh',
    ));
    /* button Section*/
    $wp_customize->add_setting('wbsk_btn_color',array(
        'default'=>'#006ec3',
        'transport'=>'refresh',
    ));
    $wp_customize-> add_section('wbsk_standard_colors',array(
        'title'=>__('Standard Colors','Websky'),
        'priority'=>30,

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'wbsk_link_color_control', array(

        'label'  =>__('Link Color','Websky'),
        'section'=> 'wbsk_standard_colors',
        'settings'=>'wbsk_link_color',
    )));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'wbsk_btn_color_control', array(

        'label'  =>__('Button Color','Websky'),
        'section'=> 'wbsk_standard_colors',
        'settings'=>'wbsk_btn_color',
    )));
}


add_action('customize_register','websky_customize_register');

function websky_customize_css(){ ?>

    <style type ="text/css">

        a:link,
        a:visited {
            color:<?php echo  get_theme_mod('wbsk_link_color');?>;
        }

        .btn-a,
        .btn-a:link,
        .btn-a:visited,div.hd-search #searchsubmit,div input#searchsubmit{
            background-color: <?php echo  get_theme_mod('wbsk_btn_color');?>;
        }

        .site-header nav ul li.current-menu-item a:link,
        .site-header nav ul li.current-menu-item a:visited,
        .site-header nav ul li.current-page-ancestor a:link,
        .site-header nav ul li.current-page-ancestor a:visited{
            background-color: <?php echo  get_theme_mod('wbsk_link_color');?>;

        }
    </style>

<?php
}
add_action('wp_head','websky_customize_css');


/* Add Footer callout section to admin appearence customize screen */

    function wbsk_footer_callout($wp_customize){


        /*  headline customize*/
        $wp_customize->add_section('wbsk-footer-callout-section',array(
            'title'=>'Footer Callout'
        ));
        /* Ask the admin if does he want the callout option*/
        $wp_customize->add_setting('wbsk-footer-callout-display',array(
            'default'=> 'No'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'wbsk-footer-callout-display-control',array(

            'label'=>'Display this section?',
            'section'=>'wbsk-footer-callout-section',
            'settings'=>'wbsk-footer-callout-display',
            'type'=>'select',
            'choices'=>array('No'=>'No',
                'Yes'=>'Yes')

        )));

        $wp_customize->add_setting('wbsk-footer-callout-headline',array(
            'default'=>'Example Headline Text!'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'wbsk-footer-callout-headline-control',array(

            'label'=>'Headline',
            'section'=>'wbsk-footer-callout-section',
            'settings'=>'wbsk-footer-callout-headline'

        )));

        /*paragraph customize*/

        $wp_customize->add_setting('wbsk-footer-callout-text',array(
            'default'=>'Example paragraph text!'
        ));

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'wbsk-footer-callout-text-control',array(

            'label'=>'Text',
            'section'=>'wbsk-footer-callout-section',
            'settings'=>'wbsk-footer-callout-text',
            'type'=>'textarea'

        )));
        /*Text area link*/
        $wp_customize->add_setting('wbsk-footer-callout-link');

        $wp_customize->add_control(new WP_Customize_Control($wp_customize,'wbsk-footer-callout-link-control',array(

            'label'=>'Link',
            'section'=>'wbsk-footer-callout-section',
            'settings'=>'wbsk-footer-callout-link',
            'type'=>'dropdown-pages'

        )));
      /*Image customize*/
        $wp_customize->add_setting('wbsk-footer-callout-image');

        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'wbsk-footer-callout-image-control',array(

            'label'=>'Image',
            'section'=>'wbsk-footer-callout-section',
            'settings'=>'wbsk-footer-callout-image',
            'width'=> 750,
            'height'=>500

        )));
    }
    add_action('customize_register','wbsk_footer_callout');