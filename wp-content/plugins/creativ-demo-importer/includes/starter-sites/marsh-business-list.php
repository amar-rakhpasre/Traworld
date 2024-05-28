<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'business' => array(
        'title'          => __( 'Marsh Business', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'business' ),
        'categories'     => array( 'business' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-business/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-business/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-business/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-business.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-business/',
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
    'business-pro' => array(
        'title'          => __( 'Marsh Business Pro', 'creativ-demo-importer' ), 
        'is_pro'         => true,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'business' ),
        'categories'     => array( 'business' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-business-pro/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-business-pro/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-business-pro/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-business-pro.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-business-pro/',
        'pro_url'        => 'https://www.creativthemes.com/downloads/marsh-business-pro/',
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