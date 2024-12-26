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

// laasy san pham co phan trang
function get_products_by_category_page($category_name = 'san-pham-noi-bat', $paged = 1, $posts_per_page = 20, $orderby = 'date', $order = 'DESC', $search = '', $min_price = 0, $max_price = 5000000) {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_name,
            )
        ),
        'orderby'        => $orderby,
        'order'          => $order
    );

    // Thêm điều kiện sắp xếp theo giá
    if ($orderby === 'price') {
        $args['meta_key'] = '_price';
        $args['orderby'] = 'meta_value_num';
    }

    if ($orderby === 'price-desc') {
        $args['meta_key'] = 'price';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
    }

    // Lọc sản phẩm theo khoảng giá
    if ($min_price != 0 || $max_price != 5000000) { // Đảm bảo không phải giá mặc định
        $min_price = intval($min_price);
        $max_price = intval($max_price);
        $args['meta_query'] = array(
            array(
                'key'     => '_price',
                'value'   => array($min_price, $max_price),
                'compare' => 'BETWEEN',
                'type'    => 'NUMERIC'
            )
        );

    }


    // Thêm tìm kiếm theo tên sản phẩm
    if (!empty($search)) {
        $args['s'] = $search;
    }
    $query = new WP_Query($args);
//    $query = wc_get_products($args);

    return $query;
}
function numrow_products_by_category_page($category_name = 'san-pham-noi-bat', $paged = 1, $posts_per_page = 20, $orderby = 'date', $order = 'DESC', $search = '', $min_price = 0, $max_price = 5000000) {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category_name,
            )
        ),
        'orderby'        => $orderby,
        'order'          => $order
    );

    // Thêm điều kiện sắp xếp theo giá
    if ($orderby === 'price') {
        $args['meta_key'] = '_price';
        $args['orderby'] = 'meta_value_num';
    }

    if ($orderby === 'price-desc') {
        $args['meta_key'] = 'price';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
    }

    // Lọc sản phẩm theo khoảng giá
    if ($min_price != 0 || $max_price != 5000000) { // Đảm bảo không phải giá mặc định
        $min_price = intval($min_price);
        $max_price = intval($max_price);
        $args['price'] = array(
            array(
                'key'     => '_price',
                'value'   => array($min_price, $max_price),
                'compare' => 'BETWEEN',
                'type'    => 'NUMERIC'
            )
        );

    }


    // Thêm tìm kiếm theo tên sản phẩm
    if (!empty($search)) {
        $args['s'] = $search;
    }
//    $query = new WP_Query($args);
    $query = wc_get_products($args);

    return $query;
}

// Load WooCommerce styles
function load_woocommerce_styles() {
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('woocommerce-general');
        wp_enqueue_style('woocommerce-layout');
        wp_enqueue_style('woocommerce-smallscreen');
    }
}
function get_pagination_info($total_products, $posts_per_page, $paged) {
    $start = ($paged - 1) * $posts_per_page + 1;
    $end = min($total_products, $paged * $posts_per_page);

    return "Hiển thị $start – $end của $total_products kết quả";
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
function get_random_products($count = 4) {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $count,
        'orderby'        => 'rand', // Lấy ngẫu nhiên
        'post_status'    => 'publish', // Chỉ lấy sản phẩm đã xuất bản
    );

    // Truy vấn sản phẩm
    $products = wc_get_products($args);
    return $products;
}
add_action('wp_ajax_add_to_cart', 'ajax_add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'ajax_add_to_cart');

function ajax_add_to_cart() {
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    if ($product_id > 0 && WC()->cart->add_to_cart($product_id, $quantity)) {
        wp_send_json_success(array('message' => 'Sản phẩm đã được thêm vào giỏ hàng!'));
    } else {
        wp_send_json_error(array('message' => 'Không thể thêm sản phẩm.'));
    }

    wp_die();
}
function ajax_get_cart() {
    $cart_items = WC()->cart->get_cart();
    if ($cart_items) {
        $total = WC()->cart->subtotal;
        $total_formatted = number_format((float)$total, 2, ',', '.');
        $cart_html = '';

        foreach ($cart_items as $cart_item_key => $cart_item) {
            $cart_item_data = $cart_item['data'];
            $product_id = $cart_item['product_id'];
            $product_name = $cart_item_data->get_name();
            $product_quantity = $cart_item['quantity'];
            $product_price = $cart_item_data->get_price_html();
            $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'thumbnail');

            // Xóa sản phẩm
            $cart_html .= '<div class="item-cart">';
            $cart_html .= '<a href="javascript:void(0)" onclick="remove_item_cart(\'' . $cart_item_key . '\')"><i class="bx bx-x"></i></a>';
            $cart_html .= "<img src='" . $product_image[0] . "' />";
            $cart_html .= "<div>
                            <p class='font-weight-bolder'>$product_name</p>
                            <p>$product_quantity <i class='bx bx-x'></i> $product_price</p>
                          </div>";
            $cart_html .= '</div>';
        }

        // Thêm subtotal
        $cart_html .= '<div class="d-flex mt-4 justify-content-between">';
        $cart_html .= '<p>TẠM TÍNH</p>';
        $cart_html .= '<p class="font-weight-bolder">' . wc_price($total) . '</p>';
        $cart_html .= '</div>';
        $cart_html .= '<button type="button" class="btn btn-sm btn-primary btn-lg btn-block">Xem  giỏ hàng</button>
                       <button type="button" class="btn btn-sm btn-secondary btn-lg btn-block">Thanh toán</button>';

    } else {
        $cart_html = '<p>Giỏ hàng trống</p>';
    }

    echo $cart_html;
    wp_die();
}

add_action('wp_ajax_get_cart', 'ajax_get_cart');
add_action('wp_ajax_nopriv_get_cart', 'ajax_get_cart');
function ajax_remove_item_cart() {
    $cart_item_key = isset($_POST['cart_item_key']) ? $_POST['cart_item_key'] : '';
    $res = 0;
    if ( !empty($cart_item_key) ) {
        WC()->cart->remove_cart_item($cart_item_key); // Xóa sản phẩm khỏi giỏ hàng
        WC()->cart->calculate_totals(); // Tính toán lại tổng giá trị giỏ hàng
        $res = 1;
    }
    echo json_encode(array(
        'statusCode' => 200 ,
        'data' => $res,
    ));
    wp_die();
}
add_action('wp_ajax_remove_item_cart', 'ajax_remove_item_cart');
add_action('wp_ajax_nopriv_remove_item_cart', 'ajax_remove_item_cart');

