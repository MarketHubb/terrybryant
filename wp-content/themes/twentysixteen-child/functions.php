<?php
/**
 * Register styles and scripts
 */
if (!is_admin()) {
    wp_register_style('bootstrap-styles', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_register_style('web-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
    wp_register_script('bootstrap-scripts', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
    wp_register_script('practice-scripts', get_stylesheet_directory_uri() . '/js/practice-scripts.js', array('jquery'), '', true);
    wp_register_script('font-awesome-scripts', 'https://use.fontawesome.com/284b9b6460.js">', array('jquery'), '', true);
    wp_register_script('apex-chat', 'http://www.apexchat.net/scripts/invitation.ashx?company=terrybryant', array('jquery'), '', true);
}

/**
 * Enqueue global styles and scripts
 */
if (!is_admin()) {
    wp_enqueue_style('bootstrap-styles');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('web-fonts');
    wp_enqueue_script('font-awesome-scripts');
    wp_enqueue_script('bootstrap-scripts');
    wp_enqueue_script('practice-scripts');
    wp_enqueue_script('apex-chat');
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