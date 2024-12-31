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
function format_money($amount) {
    return number_format($amount, 0, ',', '.');
}
function enqueue_select2_scripts() {
    // Thêm CSS của Select2
    wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css', array(), '4.1.0' );

    // Thêm JavaScript của Select2
    wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js', array('jquery'), '4.1.0', true );

    // Tùy chỉnh Select2 nếu cần
    wp_enqueue_script( 'custom-select2-js', get_template_directory_uri() . '/js/custom-select2.js', array('jquery', 'select2-js'), null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_select2_scripts' );

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

add_action('wp_ajax_get_cart', 'ajax_get_cart');
add_action('wp_ajax_nopriv_get_cart', 'ajax_get_cart');
function ajax_get_cart() {
    $cart_items = WC()->cart->get_cart();
    if ($cart_items) {
        $total = WC()->cart->subtotal;
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
        $cart_html .= '<a style="color: white!important;" href="'.home_url('/gio-hang').'" class="btn btn-sm btn-primary btn-lg btn-block">Xem  giỏ hàng</a>
                       <a style="color: white!important;" href="'.home_url('/thanh-toan').'" class="btn btn-sm btn-secondary btn-lg btn-block">Thanh toán</a>';

    } else {
        $cart_html = '<p>Giỏ hàng trống</p>';
    }

    echo $cart_html;
    wp_die();
}

add_action('wp_ajax_remove_item_cart', 'ajax_remove_item_cart');
add_action('wp_ajax_nopriv_remove_item_cart', 'ajax_remove_item_cart');
function ajax_remove_item_cart() {
    $cart_item_key = isset($_POST['cart_item_key']) ? $_POST['cart_item_key'] : '';
    $res = 0;
    if ( !empty($cart_item_key) ) {
        WC()->cart->remove_cart_item($cart_item_key); // Xóa sản phẩm khỏi giỏ hàng
        WC()->cart->calculate_totals(); // Tính toán lại tổng giá trị giỏ hàng
        $res = 1;
    }
    wp_send_json([
        'statusCode' => 200,
        'data' => $res,
    ]);
    wp_die();
}


add_action('wp_ajax_update_cart_quantity', 'ajax_update_cart_item_quantity');
add_action('wp_ajax_nopriv_update_cart_quantity', 'ajax_update_cart_item_quantity');
function ajax_update_cart_item_quantity() {
    $cart_item_key = isset($_POST['cart_item_key']) ? sanitize_text_field($_POST['cart_item_key']) : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    if (isset(WC()->cart)) {
        WC()->cart->set_quantity($cart_item_key, $quantity, true);
        wp_send_json([
            'statusCode' => 200,
            'message' => 'Cập nhật số lượng thành công.',
            'data' => 1,
        ]);
    }
    wp_send_json([
        'statusCode' => 200,
        'data' => 0,
    ]);
    wp_die();
}



function get_provinces_from_api() {
    $url = 'https://provinces.open-api.vn/api/';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);
        return $data;
    }
    curl_close($ch);
}
function get_districts_from_city() {
    // URL của API cho tỉnh/thành phố
    $url = "https://esgoo.net/api-tinhthanh/1/0.htm";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    // Kiểm tra lỗi cURL
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);  // Decode JSON
        return $data;

    }

    curl_close($ch);
}

add_action('wp_ajax_get_district_from_city', 'ajax_get_district_from_city');
add_action('wp_ajax_nopriv_get_district_from_city', 'ajax_get_district_from_city');
function ajax_get_district_from_city() {
    if (!isset($_POST['citi_id'])) {
        wp_send_json_error(['message' => 'Thành phố không hợp lệ']);
        return;
    }
    $citi_id = intval($_POST['citi_id']);
    if ($citi_id < 10) {
        $citi_id = '0' . $citi_id;
    }
    $url = "https://esgoo.net/api-tinhthanh/2/$citi_id.htm";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        wp_send_json_error(['message' => 'Lỗi cURL: ' . curl_error($ch)]);
    } else {
        $data = json_decode($response, true);
        wp_send_json_success($data);
    }
    curl_close($ch);
}


function ajax_get_ward_from_district() {
    if (!isset($_POST['district_id'])) {
        wp_send_json_error(['message' => 'Quận/Huyện không hợp lệ']);
        return;
    }
    $district = intval($_POST['district_id']);
    if ($district < 10) {
        $district = '00' . $district;
    }
    if ($district >= 10 && $district <100) {
        $district = '0' . $district;
    }
    $url = "https://esgoo.net/api-tinhthanh/3/$district.htm";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        wp_send_json_error(['message' => 'Lỗi cURL: ' . curl_error($ch)]);
    } else {
        $data = json_decode($response, true);
        wp_send_json_success($data);
    }
    curl_close($ch);
}
add_action('wp_ajax_get_ward_from_district', 'ajax_get_ward_from_district');
add_action('wp_ajax_nopriv_get_ward_from_district', 'ajax_get_ward_from_district');




function custom_checkout_handler() {
    if( !isset($_POST['action']) || $_POST['action'] != 'custom_checkout' ) {
        wp_send_json_error( array( 'message' => 'Invalid request' ) );
        wp_die();
    }

    $fullname = sanitize_text_field( $_POST['fullname'] );
    $telephone = sanitize_text_field( $_POST['telephone'] );
    $email = sanitize_email( $_POST['email'] );
    $city = sanitize_text_field( $_POST['city'] );
    $district = sanitize_text_field( $_POST['district'] );
    $ward = sanitize_text_field( $_POST['ward'] );
    $address = sanitize_textarea_field( $_POST['address'] );
    $note = sanitize_textarea_field( $_POST['note'] );

    // Tạo đơn hàng
    $order_data = array(
        'post_title'    => $fullname,
        'post_status'   => 'pending',
        'post_type'     => 'shop_order_placehold',
    );
    $order_id = wp_insert_post( $order_data );

    error_log('Order ID created: ' . $order_id);
    if ( is_wp_error($order_id) ) {
        wp_send_json_error( array( 'message' => 'Có lỗi xảy ra khi tạo đơn hàng!' ) );
        wp_die();
    }

    // Kiểm tra đơn hàng đã được tạo hay chưa
    if (!is_wp_error($order_id)) {
        // Lưu thông tin chi tiết vào meta
        update_post_meta($order_id, '_billing_telephone', $telephone);
        update_post_meta($order_id, '_billing_email', $email);
        update_post_meta($order_id, '_billing_city', $city);
        update_post_meta($order_id, '_billing_district', $district);
        update_post_meta($order_id, '_billing_ward', $ward);
        update_post_meta($order_id, '_billing_address_1', $address);
        update_post_meta($order_id, '_order_notes', $note);

        // Cập nhật trạng thái đơn hàng
        wp_update_post(array('ID' => $order_id, 'post_status' => 'wc-processing'));
    } else {
        wp_send_json_error(array('message' => 'Có lỗi xảy ra khi tạo đơn hàng!'));
    }

    wp_send_json_success( array('order_id' => $order_id , 'message' => 'Đặt hàng thành công!' ) );
    wp_die();
}
add_action( 'wp_ajax_custom_checkout', 'custom_checkout_handler' );
add_action( 'wp_ajax_nopriv_custom_checkout', 'custom_checkout_handler' );


function create_guest_order() {
    if ( ! isset( $_POST['address'] ) ) {
        wp_send_json_error( [ 'message' => 'Thiếu thông tin địa chỉ.' ] );
    }
    $address = $_POST['address'];
    if ( WC()->cart->is_empty() ) {
        wp_send_json_error( [ 'message' => 'Giỏ hàng đang trống!' ] );
    }
    $order = wc_create_order();
    $order_id = $order->get_id();
    custom_admin_order_notification($order_id);
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        $product_id = $cart_item['product_id'];
        $quantity   = $cart_item['quantity'];
        $order->add_product( wc_get_product( $product_id ), $quantity );
    }
    $billing_address = [
        'first_name' => $address['first_name'],
//        'last_name'  => $address['last_name'],
        'email'      => $address['email'],
        'phone'      => $address['phone'],
        'address_1'  => $address['address_1'],
        'address_2'  => $address['address_2'],
        'city'       => $address['city'],
        'state'      => $address['state'],
        'ward'      => $address['ward'],
        'postcode'   => $address['postcode'],
        'country'    => $address['country'],
    ];

    $order->set_address( $billing_address, 'billing' );
    $order->set_address( $billing_address, 'shipping' );
    $order->calculate_totals();
    $order->update_status( 'processing', 'Order created for guest user.' );
    WC()->cart->empty_cart();
    wp_send_json_success( [ 'order_id' =>$order_id, 'statusCode' => 200 ] );
}
add_action( 'wp_ajax_create_guest_order', 'create_guest_order' );
add_action( 'wp_ajax_nopriv_create_guest_order', 'create_guest_order' );

function custom_admin_order_notification($order_id) {
    $order = wc_get_order($order_id);
    $admin_email = get_option('admin_email');

    $subject = 'New Order Created - ID: ' . $order_id;
    $message = 'A new order has been created with ID: ' . $order_id . '\n';
    $message .= 'Customer Name: ' . $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() . '\n';
    $message .= 'Email: ' . $order->get_billing_email() . '\n';
    $message .= 'Total: ' . $order->get_total();

    wp_mail($admin_email, $subject, $message);
}
add_action('woocommerce_new_order', 'custom_admin_order_notification', 10, 1);

function lazy_load_images() {
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyImages = document.querySelectorAll("img.lazy");
            if ("IntersectionObserver" in window) {
                let imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy");
                            imageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(image) {
                    imageObserver.observe(image);
                });
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'lazy_load_images');