<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'restaurant' => array(
        'title'          => __( 'Marsh Restaurant', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'restaurant' ),
        'categories'     => array( 'restaurant' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-restaurant/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-restaurant/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-restaurant/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-restaurant.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-restaurant/',
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
    'restaurant-pro' => array(
        'title'          => __( 'Marsh Restaurant Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'restaurant' ),
        'categories'     => array( 'restaurant' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-restaurant-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-restaurant-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-restaurant-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-restaurant-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-restaurant-pro/',
        'pro_url'        => 'https://www.creativthemes.com/downloads/marsh-restaurant-pro/',
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