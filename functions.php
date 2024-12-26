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

function add_query_vars_filter($vars) {
    $vars[] = 'ten_san_pham'; // Thêm biến 'ten_san_pham'
    return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');

// Thêm quy tắc rewrite cho đường dẫn
function custom_rewrite_rule() {
    add_rewrite_rule(
        '^san-pham/([^/]*)/?',
        'index.php?pagename=san-pham&ten_san_pham=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_rewrite_rule');


/**
 * Lấy thông tin sản phẩm từ cơ sở dữ liệu dựa trên slug sản phẩm.
 *
 * @param string $product_slug Slug của sản phẩm.
 * @return object|null Thông tin sản phẩm hoặc null nếu không tìm thấy.
 */
function get_product_by_slug($product_slug) {
    global $wpdb;
    $product_slug = sanitize_title($product_slug);

    if (empty($product_slug)) {
        return null;
    }

    $product = $wpdb->get_row($wpdb->prepare("
        SELECT * FROM {$wpdb->posts} 
        WHERE post_type = 'product' 
        AND post_status = 'publish' 
        AND post_name = %s
    ", $product_slug));

    if ($product) {
        return wc_get_product($product->ID); // Lấy chi tiết sản phẩm bằng WC_Functions
    }

    return null;
}
function find_matching_variation($product, $term_name) {
    $term_name_lower = strtolower($term_name);
    if (!$product->is_type('variable')) {
        return false;
    }
    $variations = $product->get_available_variations();
    foreach ($variations as $variation) {
        foreach ($variation['attributes'] as $key => $value) {
            if (strtolower($value) === $term_name_lower) {
                return $variation;
            }
        }
    }
    return false;
}