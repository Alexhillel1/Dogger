<?php
function dogger_enqueue_scripts() {
    // Подключение стилей
    wp_enqueue_style('dogger-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('dogger-aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_style('dogger-jquery-ui-style', get_template_directory_uri() . '/css/jquery-ui.css');
    wp_enqueue_style('dogger-jquery-fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.min.css');
    wp_enqueue_style('dogger-owl-carousel-style', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('dogger-owl-theme-style', get_template_directory_uri() . '/css/owl.theme.default.min.css');
    wp_enqueue_style('dogger-icomoon-style', get_template_directory_uri() . '/fonts/icomoon/style.css');
    wp_enqueue_style('dogger-icomoon-style', get_template_directory_uri() . '/fonts/flaticon/font/flaticon.css');
    wp_enqueue_style('dogger-fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', array(), '3.5.7', 'all');
    wp_enqueue_style('dogger-style', get_stylesheet_uri());

    // Подключение скриптов
    wp_enqueue_script('dogger-jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true);
    wp_enqueue_script('dogger-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.1.3', true);
    wp_enqueue_script('dogger-aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array('jquery'), '2.3.1', true);
    wp_enqueue_script('dogger-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);
    wp_enqueue_script('dogger-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array('jquery'), '1.12.1', true);
    wp_enqueue_script('dogger-jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array('jquery'), '2.2.0', true);
    wp_enqueue_script('dogger-jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);
    wp_enqueue_script('dogger-jquery-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '3.3.5', true);
    wp_enqueue_script('dogger-jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '1.0.4', true);
    wp_enqueue_script('dogger-main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    wp_enqueue_script('dogger-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    wp_enqueue_script('dogger-popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.14.3', true);
    wp_enqueue_script('dogger-fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);

}

add_action('wp_enqueue_scripts', 'dogger_enqueue_scripts');

// Добавляем поддержку пользовательского логотипа
add_theme_support('custom-logo');

function add_parent_menu_class($items) {
    $parents = array();
    foreach ($items as $item) {
        if ($item->menu_item_parent && $item->menu_item_parent > 0) {
            $parents[] = $item->menu_item_parent;
        }
    }
    foreach ($items as $item) {
        if (in_array($item->ID, $parents)) {
            $item->classes[] = 'has-children';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'add_parent_menu_class');

function custom_nav_menu() {
    $menu_args = array(
        'theme_location' => 'main-menu',
        'container' => false,
        'menu_class' => 'site-menu main-menu js-clone-nav mr-auto d-none d-lg-block',
        'fallback_cb' => false,
        'walker' => new My_Custom_Walker_Nav_Menu()
    );
    wp_nav_menu($menu_args);
}

class My_Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '<ul class="dropdown">';
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= '</ul>';
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<li';
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= ' class="has-children"';
        }
        $output .= '>';
        $output .= '<a href="' . $item->url . '" class="nav-link">' . $item->title . '</a>';
    }

    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= '</li>';
    }
}

function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );


add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}