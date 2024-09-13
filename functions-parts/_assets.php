<?php 
/*
 * Подключение стилей и скриптов
 * */

function my_assets()
{
    wp_deregister_script('jquery-core');
    wp_register_script('jquery-core', get_stylesheet_directory_uri() . '/build/js/libs/jquery-3.6.0.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_style('main-style', get_template_directory_uri() . '/build/css/style.css');
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/build/css/libs/swiper.css');

    //wp_enqueue_style('inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/build/js/app.js',  array('jquery'), '1.0', true);
    wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/build/js/libs/swiper-bundle.min.js',  array('jquery'), '1.0', true);
    wp_enqueue_script('dynamic-js', get_stylesheet_directory_uri() . '/build/js/libs/dynamicAdapt.js',  array('jquery'), '1.0', true);
    wp_enqueue_script('marker-js', get_stylesheet_directory_uri() . '/build/js/libs/markerclustererplus.min.js',  array('jquery'), '1.0', true);
    wp_enqueue_script('slider-swiper-js', get_stylesheet_directory_uri() . '/build/js/modules/slider.js',  array('jquery'), '1.0', true);

}

add_action('wp_enqueue_scripts', 'my_assets');