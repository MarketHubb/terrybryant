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
    wp_register_script('ri-scripts', get_stylesheet_directory_uri() . '/js/ri-scripts.js', array('jquery'), '', true);
    wp_register_script('ri-tracking-scripts', get_stylesheet_directory_uri() . '/js/ri-tracking-scripts.js', array('jquery'), '', true);
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
    wp_enqueue_script('ri-scripts');
    wp_enqueue_script('ri-tracking-scripts');
}

if (!is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {
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

/**
 * Remove default menu items in WP admin
 */
add_action( 'admin_menu', 'mh_remove_menus', 999 );
function mh_remove_menus()
{
    global $menu;
    global $submenu;

    // Menu pages
    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    /*remove_menu_page( 'tools.php' );*/                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
    remove_menu_page( 'cptui_main_menu' );            //Custom Post Type UI
    remove_menu_page( 'edit.php?post_type=acf-field-group' ); //ACF
    remove_menu_page( 'admin.php?page=wpseo_dashboard' ); //Yoast

    // Submenu pages
    remove_submenu_page( 'index.php', 'update-core.php' );
    // remove_submenu_page( 'gf_edit_forms', 'gf_new_form' );
    // remove_submenu_page( 'gf_edit_forms', 'gf_update' );
    // remove_submenu_page( 'gf_edit_forms', 'gf_settings' );
    // remove_submenu_page( 'gf_edit_forms', 'gf_help' );
    // remove_submenu_page( 'gf_edit_forms', 'gf_export' );
    // remove_submenu_page( 'gf_edit_forms', 'gf_addons' );

}

/**
 * Remove default WP footer text
 */
add_filter('admin_footer_text', mh_remove_admin_footer_text, 1000);
function mh_remove_admin_footer_text($footer_text =''){
    return '';
}

add_filter('update_footer', mh_remove_admin_footer_upgrade, 1000);
function mh_remove_admin_footer_upgrade($footer_text =''){
    return '';
}

function my_login_logo() { ?>
    <style type="text/css">
        body {
            background: #eee !important;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/Terry-Bryant-Logo.svg);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );