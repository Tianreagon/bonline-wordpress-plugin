<?php
/*
Plugin Name: WP bOnline Plugin
Plugin URI:  http://bonline.com
Description: A plugin for bonline company
Version:     0.1
Author:      bOnline
Author URI:  http://bonline.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: gcp
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( 'Sorry you can not access this file, hackerboy!!'  );

function bonline_enqueue_script() {
    wp_register_style( 'bonline_admin_css', plugins_url('assets/css/bonline.css', __FILE__));
    wp_register_style( 'bootstrap_admin_css', plugins_url('assets/css/bootstrap.min.css', __FILE__));
    wp_register_style( 'font_awesome_admin_css', plugins_url('assets/css/font-awesome.css', __FILE__));
    wp_register_script( 'bonline_admin_script', plugins_url('assets/js/bonline.js', __FILE__));
    wp_register_script( 'bootsrap_admin_script', plugins_url('assets/js/bootstrap.min.js', __FILE__));
    wp_register_script( 'popper_admin_script', plugins_url('assets/js/popper.min.js', __FILE__));

    wp_enqueue_style( 'bonline_admin_css' );
    wp_enqueue_style( 'bootstrap_admin_css' );
    wp_enqueue_style( 'font_awesome_admin_css' );
    wp_enqueue_script( 'bonline_admin_script' );
    wp_enqueue_script( 'bootsrap_admin_script' );
    wp_enqueue_script( 'popper_admin_script' );
}
add_action( 'admin_enqueue_scripts', 'bonline_enqueue_script' );

require plugin_dir_path( __FILE__ ) . 'includes/admin-blog-dashboard.php';
require plugin_dir_path( __FILE__ ) . 'includes/network-admin-main-dashboard.php';
require plugin_dir_path( __FILE__ ) . 'includes/network-page-dashboard.php';

// Added per blog menu items
function bo_add_blog_menu_items() {

    add_menu_page('bonline_admin_info', 'bOnline Admin', 'manage_network', 'bonline_admin_info_page', 'bonline_admin_info', 'dashicons-groups' );

    // add_submenu_page('bonline_admin_info_page','client_details_page', 'Client Details', 'manage_network', 'client_details_page', 'client_details_page');
}
add_action('admin_menu', 'bo_add_blog_menu_items');
add_action( 'admin_notices', 'admin_logo' );
add_action('wp_network_dashboard_setup', 'add_custom_dashboard_widgets');
add_action('wp_dashboard_setup', 'add_individual_sites_dashboard_widgets');
add_action('wp_dashboard_setup', 'remove_dashboard_meta_boxes');
add_action('wp_dashboard_setup', 'bo_remove_nags');
