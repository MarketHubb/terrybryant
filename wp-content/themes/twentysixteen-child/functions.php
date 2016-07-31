<?php
/**
 * Register styles and scripts
 */
if (!is_admin()) {
    wp_register_style('bootstrap-styles', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_register_script('bootstrap-scripts', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
}

/**
 * Enqueue global styles and scripts
 */
if (!is_admin()) {
    wp_enqueue_style('bootstrap-styles');
    wp_enqueue_script('bootstrap-scripts');
}

/**
 * ACF Global Options
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Global',
        'menu_title'	=> 'Global',
        'menu_slug' 	=> 'global',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}