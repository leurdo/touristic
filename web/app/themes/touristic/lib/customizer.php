<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->add_section(
        'footer_text',
        array(
            'title' => 'Текст в подвале',
            'description' => 'Копирайт и ссылка там',
            'priority' => 35,
        )
    );

    $wp_customize->add_setting(
        'copyright_text',
        array(
            'default' => 'Туристик',
        )
    );

    $wp_customize->add_control(
        'copyright_text',
        array(
            'label' => 'Текст копирайта',
            'section' => 'footer_text',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'copyright_link',
        array(
            'default' => 'Loftschool 2016',
        )
    );

    $wp_customize->add_control(
        'copyright_link',
        array(
            'label' => 'Ссылка в строке копирайта',
            'section' => 'footer_text',
            'type' => 'text',
        )
    );

}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}

add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');




