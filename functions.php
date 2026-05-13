<?php
/**
 * Правильное подключение стилей и шрифтов.
 */
add_action( 'wp_enqueue_scripts', 'manitas_enqueue_assets' );
function manitas_enqueue_assets() {
    wp_enqueue_style( 'manitas-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap', array(), null );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ), wp_get_theme()->get('Version') );
}

/**
 * Создаем хедер программно (Лого слева, Меню справа).
 */
add_action( 'wp_body_open', 'manitas_custom_header' );
function manitas_custom_header() {
    ?>
    <header class="manitas-header">
        <div class="header-container">
            <div class="logo">
                <a href="<?php echo home_url(); ?>">Manitas</a>
            </div>
            <nav class="navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'main-menu',
                    'fallback_cb'    => 'manitas_default_menu',
                ) );
                ?>
            </nav>
        </div>
    </header>
    <?php
}

function manitas_default_menu() {
    echo '<ul class="main-menu"><li><a href="/home">Home</a></li><li><a href="/services">Services</a></li><li><a href="/gallery">Gallery</a></li><li><a href="/contact">Contact</a></li></ul>';
}
