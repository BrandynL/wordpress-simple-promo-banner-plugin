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
        'Clean Promo Banner',
        'manage_options',
        'clean-promo-banner.php',
        'clean_promo_banner_options_page'
    );
}

function clean_promo_banner_options_page(){
    global $promo_banner_options;
    $available_colors = ["AliceBlue","AntiqueWhite","Aqua","Aquamarine","Azure","Beige","Bisque","Black","BlanchedAlmond","Blue","BlueViolet","Brown","BurlyWood","CadetBlue","Chartreuse","Chocolate","Coral","CornflowerBlue","Cornsilk","Crimson","Cyan","DarkBlue","DarkCyan","DarkGoldenRod","DarkGray","DarkGrey","DarkGreen","DarkKhaki","DarkMagenta","DarkOliveGreen","Darkorange","DarkOrchid","DarkRed","DarkSalmon","DarkSeaGreen","DarkSlateBlue","DarkSlateGray","DarkSlateGrey","DarkTurquoise","DarkViolet","DeepPink","DeepSkyBlue","DimGray","DimGrey","DodgerBlue","FireBrick","FloralWhite","ForestGreen","Fuchsia","Gainsboro","GhostWhite","Gold","GoldenRod","Gray","Grey","Green","GreenYellow","HoneyDew","HotPink","IndianRed","Indigo","Ivory","Khaki","Lavender","LavenderBlush","LawnGreen","LemonChiffon","LightBlue","LightCoral","LightCyan","LightGoldenRodYellow","LightGray","LightGrey","LightGreen","LightPink","LightSalmon","LightSeaGreen","LightSkyBlue","LightSlateGray","LightSlateGrey","LightSteelBlue","LightYellow","Lime","LimeGreen","Linen","Magenta","Maroon","MediumAquaMarine","MediumBlue","MediumOrchid","MediumPurple","MediumSeaGreen","MediumSlateBlue","MediumSpringGreen","MediumTurquoise","MediumVioletRed","MidnightBlue","MintCream","MistyRose","Moccasin","NavajoWhite","Navy","OldLace","Olive","OliveDrab","Orange","OrangeRed","Orchid","PaleGoldenRod","PaleGreen","PaleTurquoise","PaleVioletRed","PapayaWhip","PeachPuff","Peru","Pink","Plum","PowderBlue","Purple","Red","RosyBrown","RoyalBlue","SaddleBrown","Salmon","SandyBrown","SeaGreen","SeaShell","Sienna","Silver","SkyBlue","SlateBlue","SlateGray","SlateGrey","Snow","SpringGreen","SteelBlue","Tan","Teal","Thistle","Tomato","Turquoise","Violet","Wheat","White","WhiteSmoke","Yellow","YellowGreen"];
    // check banner text settings
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['promo-banner-title'])){

        $promo_banner_options['promo-banner-title'] = $_POST['promo-banner-title'];
        if(trim($_POST['promo-banner-text'], ' ') != '') {
            $promo_banner_options['promo-banner-text'] = trim($_POST['promo-banner-text'], ' ');
        }
        if(trim($_POST['promo-banner-link'], ' ') != '') {
            $promo_banner_options['promo-banner-link'] = trim($_POST['promo-banner-link'], ' ');
        }

        if ($_POST['start-date'] != ''){
            $promo_banner_options['start-date'] = $_POST['start-date'];
        }

        if ($_POST['end-date'] != ''){
            $promo_banner_options['end-date'] = $_POST['end-date'];
        }

        $promo_banner_options['background-color'] = $_POST['background-color'];
        $promo_banner_options['text-color'] = $_POST['text-color'];

        $promo_banner_options['last-updated'] = $_POST['updated'];

        update_option('clean-promo-banner', $promo_banner_options);

        // show values in admin areas
        if($promo_banner_options == ''){
            $promo_banner_options = get_option('clean-promo-banner', true);
        }
    }

require ('templates/backend-wrapper.php');
}

// display the banner on the front end
add_action('get_header', 'display_clean_promo_banner');
function display_clean_promo_banner(){
    $promo_banner_options = get_option('clean-promo-banner', true);
    if (trim($promo_banner_options['start-date']) != '' || $promo_banner_options['start-date'] == null){ // start date not set, continue to display...
        //check start date is in the past and end date is in the future
        if( strtotime(str_replace(['-', '/'], '', $promo_banner_options['start-date'])) <= strtotime(Date('Ymd'))) { // start is today or before today
            if (
                strtotime(str_replace(['-', '/'], '', $promo_banner_options['end-date'])) > strtotime(Date('Ymd'))
                || trim($promo_banner_options['end-date']) == ''
                || $promo_banner_options['end-date'] == null
            ){ // end date is in the future or not set
                require('templates/frontend.php');
            }
        }
    }
}
// plugin styles
add_action('wp_enqueue_scripts', 'clean_promo_banner_scripts');
function clean_promo_banner_scripts(){
    // wp_register_style( 'clean_banner_styles', plugins_url( 'clean-promo-banner/css/clean-promo-banner-styles.css' ));
    wp_enqueue_style('clean_banner_styles', plugins_url( 'clean-promo-banner/css/clean-promo-banner-styles.css' ));

    // wp_register_script('clean_banner_scripts', plugins_url( 'clean-promo-banner/js/clean-promo-banner-scripts.js'), array('jquery', 'jquery-ui-widget'));
    wp_enqueue_script('clean_banner_scripts', plugins_url( 'clean-promo-banner/js/clean-promo-banner-scripts.js'), array('jquery', 'jquery-ui-effects-bounce'));
    
}