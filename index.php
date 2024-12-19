

<?php

/**
 * Template Name: Trang Chủ - traicay68
 */
get_header(); ?>

<style>

    .btn-khampha {
        background: #00505f;
        padding: 10px 30px;
        font-size: 16px;
        color: white !important;
        border-radius: 0 !important;
    }
    .p-quatang{
        line-height: normal;
        color: #070707;
        font-size: 64px;
        font-weight: 500;
        font-family: 'Montserrat', sans-serif;
    }
    .p-camket{
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        margin-bottom: 30px
    }
    #carouselExampleControls {
        height: 580px !important; /* Chiều cao cố định */
    }

    .carousel-item img {
        height: 100% !important; /* Đảm bảo ảnh vừa vặn với chiều cao của carousel */
        max-height: 580px;

    }
    .box-info-1{
        font-family: 'Montserrat', sans-serif;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

        padding: 30px;
        font-size: 14px;
    }
    .box-info-1 i{
        font-size: 30px;
    }
    .btn-kham-pha{
        padding: 15px 20px;
        border-radius: 5px;
        background: #dbaa56;
        box-shadow: #dbaa56 0px 3px 8px;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 600;
    }
    .title{
        font-family: 'Montserrat', sans-serif;
        font-size: 43px;
    }
    .title span {
        color: #aebcb9;
        position: relative;
        display: inline-block;
        padding-bottom: 10px; /* Khoảng cách dưới chữ */
    }

    .title svg {
        position: absolute;
        z-index: -99;
        bottom: -12px;
        left: 53%;
        width: 150px;
        height: 61px;
        /* font-size: 21px; */
        fill: none;
        stroke: #dc0303;
        stroke-width: 8px;
        animation: movePath 2s infinite linear;
    }

    @keyframes movePath {
        from {
            stroke-dasharray: 0, 2000; /* Đặt chiều dài đoạn cắt */
        }
        to {
            stroke-dasharray: 2000, 2000; /* Hoàn tất đường gạch */
        }
    }
    .box-danhmuc a{
        text-decoration: none;
       font-size: 14px;
        color: #707070;
    }
    .box-danhmuc a.active{
       border-bottom: 1px solid #333c43;
    }

</style>

<div class="container-fluid p-0">
    <?php

    function get_products_by_category_name($category_name = 'san-pham-moi-nhat') {
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
        print_r($products);
        foreach ($products as $product) {
            echo $product->get_name(); // Lấy tên sản phẩm
        }
    }

    get_products_by_category_name();

    function get_image_from_library($image_name) {
        $args = array(
            'post_type' => 'attachment',
            'name'      => $image_name,
            'post_mime_type' => 'image',
            'posts_per_page' => 1,
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $image_url = wp_get_attachment_url(get_the_ID());
                return $image_url;
            }
        } else {
            return null; // Trả về null nếu không tìm thấy ảnh
        }
    }
    $image_url1 = get_image_from_library('banner1');
    $image_url2 = get_image_from_library('banner2');
    if($image_url1){
        $url1 = esc_url($image_url1);
    }
    if($image_url2){
        $url2 = esc_url($image_url2);
    }
    ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $url1??'' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $url2 ?? ''; ?>" alt="Second slide">
                <div class="carousel-caption d-flex justify-content-center">
                    <a class=""><span class="btn-kham-pha">KHÁM PHÁ NGAY</span></a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"  style="color: #333333" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" style="color: #333333"  aria-hidden="true"></span>
        </a>
    </div>
    <div class="d-flex justify-content-between box-info-1">
       <div class="d-flex  align-items-center" style="gap:20px">
           <i class='bx bx-medal'></i>
           <div>
               <p class="mb-0" style="font-size: 18px">Trái Cây Thượng Hạng</p>
               <p class="mb-0">100% Trái cây nhập khẩu tuyển lựa</p>
           </div>
       </div>
        <div class="d-flex  align-items-center" style="gap:20px">
            <i class='bx bxs-package'></i>
            <div>
                <p class="mb-0" style="font-size: 18px">Giao Hàng Siêu Tốc 2H</p>
                <p class="mb-0">100% Trái cây nhập khẩu tuyển lựa</p>
            </div>
        </div>
        <div class="d-flex  align-items-center" style="gap:20px">
            <i class='bx bx-donate-heart' ></i>
            <div>
                <p class="mb-0" style="font-size: 18px">Cam Kết Hài Lòng</p>
                <p class="mb-0">100% Trái cây nhập khẩu tuyển lựa</p>
            </div>
        </div>
    </div>


    <div class="mt-4">

        <p class="text-center title">
            Sản Phẩm <span>Nổi Bật</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
            </svg>
        </p>

        <div class="d-flex box-danhmuc w-100 justify-content-center align-items-center" style="gap:30px;">
            <a href="javascript:void(0)" class="a-tab-noibat choose_tab_moi_nhat " onclick="load_sp_dm_noibat('moi_nhat')">SẢN PHẨM MỚI NHẤT</a>
            <a href="javascript:void(0)" class="a-tab-noibat choose_tab_ban_chay" onclick="load_sp_dm_noibat('ban_chay')">SẢN PHẨM BÁN CHẠY</a>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        function load_sp_dm_noibat(type) {
            $('.a-tab-noibat').removeClass('active');
            $(`.choose_tab_${type}`).addClass('active');
        }
    </script>

    <?php get_footer(); ?>
