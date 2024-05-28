<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Add demo list by filter
 *
 */
add_filter( 'advanced_import_demo_lists', 'creativ_demo_importer_starter_sites' );
function creativ_demo_importer_starter_sites($starter_sites){
    if(get_stylesheet() == 'marsh-construction'){
        require plugin_dir_path(__FILE__) . 'starter-sites/marsh-construction-list.php';
    }
    elseif(get_stylesheet() == 'marsh-restaurant'){
        require plugin_dir_path(__FILE__) . 'starter-sites/marsh-restaurant-list.php';
    }
    elseif(get_stylesheet() == 'marsh-travel'){
        require plugin_dir_path(__FILE__) . 'starter-sites/marsh-travel-list.php';
    }
    elseif(get_stylesheet() == 'marsh-business'){
        require plugin_dir_path(__FILE__) . 'starter-sites/marsh-business-list.php';
    }else{
        require plugin_dir_path(__FILE__) . 'starter-sites/default-list.php';
    }
    return $starter_sites;
}