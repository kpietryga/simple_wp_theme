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

function my_theme_enqueue_styles() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

    wp_enqueue_style('my-theme-style', get_stylesheet_uri());

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function my_theme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'my_theme_add_woocommerce_support');

function my_theme_enqueue_woocommerce_styles() {
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('woocommerce-style', plugins_url('/woocommerce/assets/css/woocommerce.css'));
    }
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_woocommerce_styles');

//Logo
function logo_support() {
    add_theme_support('custom-logo', array(
        'height'      => 100, // Wysokość logo
        'width'       => 400, // Szerokość logo
        'flex-height' => true, // Elastyczna wysokość
        'flex-width'  => true, // Elastyczna szerokość
    ));
}
add_action('after_setup_theme', 'logo_support');

add_theme_support('post-thumbnails');

function theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'theme_section', array(
        'title' => 'Theme Settings',
        'priority' => 30,
    ) );
    $wp_customize->add_setting( 'theme_option', array(
        'default' => 'default value',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'theme_option', array(
        'label' => 'Option Label',
        'section' => 'theme_section',
        'type' => 'text',
    ) );
}
add_action( 'customize_register', 'theme_customizer' );