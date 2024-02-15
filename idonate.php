<?php
/*
Plugin Name: iDonate
Plugin URI:http://armanhome.org
Description: Donate For ArmanHome with Visa/Master Card
Author: Hamid Amini
Version: 0.5
Author URI: http://thehamid.ir
*/

if(!function_exists('add_action')){
    echo "You don't have access to this page";
    exit();
}

//Plugin path!
define('PLUGIN_PATH',plugin_dir_path(__FILE__));

//Plugin url!
define('PLUGIN_URL',plugin_dir_url(__FILE__));

//Plugin css Url!
define('PLUGIN_CSSPATH',trailingslashit(PLUGIN_URL.'assets/css'));

//Plugin js Url
define('PLUGIN_JSPATH',trailingslashit(PLUGIN_URL.'assets/js'));

//Plugin img Url
define('PLUGIN_IMGPATH',trailingslashit(PLUGIN_URL.'assets/img'));

//Plugin Moderator/admin
define('PLUGIN_MODERATOR_PATH',trailingslashit(PLUGIN_PATH.'moderator'));

//Plugin include url
define('PLUGIN_INCLUDE_PATH',trailingslashit(PLUGIN_PATH.'include'));

//Plugin template url
define('PLUGIN_TEMPLATE_PATH',trailingslashit(PLUGIN_PATH.'template'));

//Plugin Shortcode
require PLUGIN_INCLUDE_PATH.'shortcodes.php';
require PLUGIN_INCLUDE_PATH.'inc_func.php';


if (is_admin()){

    require 'moderator/menu.php';
    require 'moderator/page.php';

}