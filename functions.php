<?php
function my_theme_load_styles() {
    wp_enqueue_style('my-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_load_styles');

function my_theme_register_menu() {
    register_nav_menu('main-menu', 'Main Menu');
}
add_action('after_setup_theme', 'my_theme_register_menu');

function my_theme_functions() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'my_theme_functions');