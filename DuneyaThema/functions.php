<?php
//Styl laden en script
function showStyle(){
    wp_enqueue_style( 'stijl', get_stylesheet_uri() );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), 1.5 , true);
}
add_action('init', 'showStyle');

//de menu's'
function registreer_menu(){
    $argumenten = array(
        'hoofd-menu' => __( 'Hoofd menu' )
    );
    register_nav_menus($argumenten);
  }
add_action( 'init', 'registreer_menu' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'init', 'register_navwalker' );
