<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'travel' => array(
        'title'          => __( 'Marsh Travel', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'travel' ),
        'categories'     => array( 'travel' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-travel/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-travel/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-travel/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-travel.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-travel/',
        'plugins'        => array(
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            )
        ),
    ),
    'travel-pro' => array(
        'title'          => __( 'Marsh Travel Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'travel' ),
        'categories'     => array( 'travel' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-travel-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-travel-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-travel-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-travel-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-travel-pro/',
        'pro_url'        => 'https://www.creativthemes.com/downloads/marsh-travel-pro/',
        'plugins'        => array(
            array(
                'name' => __( 'Elementor', 'creativ-demo-importer' ),
                'slug' => 'elementor',
            ),
            array(
                'name' => __( 'ElementsKit Lite', 'creativ-demo-importer' ),
                'slug' => 'elementskit-lite',
            )
        ),
    )
);