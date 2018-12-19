<?php
/*
Plugin Name:  Clean Promo Banner
Description:  An incredibly simple and clean banner that works on all wordpress sites
Version:      1.0
Author:       Brandyn Lordi
Author URI:   https://github.com/BrandynL
License:      MIT
License URI:  https://opensource.org/licenses/MIT
*/

defined( 'ABSPATH' ) or die( 'DENIED!' );

add_action('admin_menu','clean_promo_banner_menu');
function clean_promo_banner_menu(){
    add_options_page(
        'Clean Promo Banner',
        'Promo Banner',
        'manage_options',
        'clean-promo-banner.php',
        'clean_promo_banner_options_page'
    );
}

function clean_promo_banner_options_page(){
    global $promo_banner_options;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $promo_banner_options['promo-banner-title'] = $_POST['promo-banner-title'];
        if(trim($_POST['promo-banner-text'], ' ') != '') {
            $promo_banner_options['promo-banner-text'] = trim($_POST['promo-banner-text'], ' ');
        }
        if(trim($_POST['promo-banner-link'], ' ') != '') {
            $promo_banner_options['promo-banner-link'] = trim($_POST['promo-banner-link'], ' ');
        }
        if($_POST['show-promo-banner'] != '') {
            $promo_banner_options['show-promo-banner'] = $_POST['show-promo-banner'];
        }
        $promo_banner_options['last-updated'] = $_POST['updated'];
        update_option('clean-promo-banner', $promo_banner_options);
        //var_dump($promo_banner_options);
    }
    if($promo_banner_options == ''){
        $promo_banner_options = get_option('clean-promo-banner', true);
        //var_dump($promo_banner_options);
    }
require ('templates/backend-wrapper.php');
}

// display the banner on the front end
add_action('get_header', 'display_clean_promo_banner');
function display_clean_promo_banner(){
    $promo_banner_options = get_option('clean-promo-banner', true);
    if(isset($promo_banner_options) && $promo_banner_options['show-promo-banner'] == 'on'){
        require('templates/frontend.php');
    }
}
// plugin styles
add_action('wp_enqueue_scripts', 'clean_promo_banner_styles');
function clean_promo_banner_styles(){
    wp_register_style( 'clean_banner_styles', plugins_url( 'clean-promo-banner/css/clean-promo-banner-styles.css' ));
    wp_enqueue_style('clean_banner_styles');
}

