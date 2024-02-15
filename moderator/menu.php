<?php

add_action('admin_menu','admin_menu_function');
function admin_menu_function(){

    $main=add_menu_page('iDonate','iDonate','install_plugins','idonate-main','main_menu_function','','99');
    $payment=add_submenu_page( 'idonate-main', 'Payments', 'Payments', 'install_plugins','idonate-payments', 'payments_menu_functions');
    $setting=add_submenu_page( 'idonate-main', 'Setting', 'Setting', 'install_plugins','idonate-setting', 'setting_menu_functions');
}
