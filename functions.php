<?php
/**
 * Правильное подключение стилей и шрифтов.
 */
add_action( 'wp_enqueue_scripts', 'manitas_enqueue_assets' );
function manitas_enqueue_assets() {
    // 1. Подключаем Google Fonts через PHP
    wp_enqueue_style( 'manitas-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap', array(), null );

    // 2. Подключаем стили родительской темы
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // 3. Подключаем стили нашей дочерней темы
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ), wp_get_theme()->get('Version') );
}