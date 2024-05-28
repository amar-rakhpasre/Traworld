<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$starter_sites = array(
    'construction' => array(
        'title'          => __( 'Marsh Construction', 'creativ-demo-importer' ), 
        'is_pro'         => false,
        'type'           => 'elementor',
        'author'         => __( 'Creativ Themes', 'creativ-demo-importer' ),
        'keywords'       => array( 'marsh', 'construction' ),
        'categories'     => array( 'construction' ),
        'template_url'   => array(
            'content' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-construction/content.json',
            'options' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-construction/options.json',
            'widgets' => CREATIV_DEMO_IMPORTER_URL. 'includes/starter-sites/json/marsh-construction/widgets.json',
        ),
        'screenshot_url' => CREATIV_DEMO_IMPORTER_URL.'assets/img/marsh-construction.jpg',
        'demo_url'       => 'https://creativthemes.com/theme-demo/marsh-construction/',
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