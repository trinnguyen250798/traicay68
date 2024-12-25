<?php
function enqueue_theme_assets() {
    if (!is_admin()) { // Chỉ tải trên frontend
        // Bootstrap CSS và JS
        wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array('jquery'), null, true);

        // Slick Carousel CSS và JS
        wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
        wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), null, true);

        // BoxIcons CSS
        wp_enqueue_style('boxicons-css', 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');

        // Font Awesome CSS
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

        // Check and enqueue WooCommerce styles
        if (class_exists('WooCommerce')) {
            wp_enqueue_style('woocommerce-general');
            wp_enqueue_style('woocommerce-layout');
            wp_enqueue_style('woocommerce-smallscreen');
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

function theme_setup() {
    // Hỗ trợ logo tùy chỉnh
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'theme_setup');


function get_products_by_category_name($category_name = 'san-pham-noi-bat') {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'status'         => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_name
            )
        )
    );
    $products = wc_get_products($args);
    return $products;
}
// Load WooCommerce styles
function load_woocommerce_styles() {
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('woocommerce-general');
        wp_enqueue_style('woocommerce-layout');
        wp_enqueue_style('woocommerce-smallscreen');
    }
}
add_action('wp_enqueue_scripts', 'load_woocommerce_styles');
add_filter('woocommerce_enqueue_styles', '__return_true');