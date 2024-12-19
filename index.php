

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
    .title {
        font-family: 'Montserrat', sans-serif;
        font-size: 43px;
        margin: 35px;
        position: relative; /* Đặt position để chứa các phần tử con tuyệt đối */
        text-align: center; /* Căn giữa nội dung */
        overflow: hidden; /* Đảm bảo không cho phần tử con tràn ra ngoài */
    }

    .title span {
        color: #aebcb9;
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }

    .title svg {
        position: absolute;
        z-index: -1; /* Đặt SVG nằm dưới nội dung chữ */

        left: 56%; /* Đặt SVG ở giữa theo chiều ngang */
        transform: translateX(-50%); /* Căn chỉnh để SVG nằm chính giữa */
        width: 148px;
        height: 69px;
        fill: none;
        stroke: #dc0303;
        stroke-width: 8px;
        animation: movePath 2s infinite;
    }

    @keyframes movePath {
        from {
            stroke-dasharray: 0, 2000;
        }
        to {
            stroke-dasharray: 2000, 2000;
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
    .box-item-best-sales{
        margin: 0 !important;
    }
    .box-item-best-sales .item-facture {
       padding: 0!important;
        box-sizing: border-box !important;

    }
    .box-item-best-sales p {
        font-family: 'Montserrat', sans-serif;
        padding-left: 30px;
        font-size: 16px;
        font-weight: 500;
        color: #070707;

    }
    .box-item-best-sales img {
        max-width: 100%;
        height: 465px;
        display: block;
        margin-bottom: 20px;
    }
    .item-facture:hover{
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
    }

    .image-wrapper {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 465px;
    }

    /* Cấu hình ảnh mặc định */
    .default-img, .hover-img {
        width: 100%;
        height: auto;
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    /* Ẩn hình ảnh hover */
    .hover-img {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        z-index: 1;
        transition: opacity 0.3s ease-in-out;
        height: 465px;
    }
    /* Hiệu ứng khi hover */
    .image-wrapper:hover .default-img {
        opacity: 0;
    }
    .image-wrapper:hover .hover-img {
        opacity: 1;
        transform: scale(1.2); /* Phóng to hình ảnh hover */

    }


    .slick-prev, .slick-next {
        background-color: transparent; /* Bỏ nền */
        color: #000; /* Màu chữ */
        border: none; /* Bỏ viền */
        border-radius: 50%; /* Biểu tượng tròn */
        padding: 10px; /* Khoảng cách bên trong */
        font-size: 20px; /* Kích thước icon */
        position: absolute;
        top: 50%;
        z-index: 10;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .slick-prev {
        left: -30px; /* Vị trí của nút "prev" */
    }

    .slick-next {
        right: -30px; /* Vị trí của nút "next" */
    }

    .slick-prev::before, .slick-next::before {
        content: ''; /* Bỏ nội dung mặc định */
    }

    .slick-prev i {
        content: '\f104'; /* Icon cho nút "prev" (Font Awesome) */
    }

    .slick-next i {
        content: '\f105'; /* Icon cho nút "next" (Font Awesome) */
    }

    .slick-prev:hover, .slick-next:hover {
        background-color: #333; /* Màu nền khi hover */
        color: #fff; /* Màu chữ khi hover */
    }

</style>

<div class="container-fluid p-0">
    <?php

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

    $list_facture = get_products_by_category_name();

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
    $image_url3 = get_image_from_library('legit');
    if($image_url1){
        $url1 = esc_url($image_url1);
    }
    if($image_url2){
        $url2 = esc_url($image_url2);
    }
    ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
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
    <div class="row box-info-1 m-0">
       <div class="col-sm-4 justify-content-center d-flex  align-items-center" style="gap:20px">
           <i class='bx bx-medal'></i>
           <div>
               <p class="mb-0" style="font-size: 18px">Trái Cây Thượng Hạng</p>
               <p class="mb-0">100% Trái cây nhập khẩu tuyển lựa</p>
           </div>
       </div>
        <div class="col-sm-4 justify-content-center d-flex  align-items-center" style="gap:20px">
            <i class='bx bxs-package'></i>
            <div>
                <p class="mb-0" style="font-size: 18px">Giao Hàng Siêu Tốc 2H</p>
                <p class="mb-0">100% Trái cây nhập khẩu tuyển lựa</p>
            </div>
        </div>
        <div class="col-sm-4 justify-content-center d-flex  align-items-center" style="gap:20px">
            <i class='bx bx-donate-heart' ></i>
            <div>
                <p class="mb-0" style="font-size: 18px">Cam Kết Hài Lòng</p>
                <p class="mb-0">100% Trái cây nhập khẩu tuyển lựa</p>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="text-center title">
            Sản Phẩm <span>Nổi Bật</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
            </svg>
        </div>
    </div>
    <div class="row box-item-best-sales">
        <?php
        if(!empty($list_facture)){
            foreach ($list_facture as $product ){
                $formatted_price = number_format($product->get_price(), 0, '.', ',');
                $image_id = $product->get_image_id();
                $image_url = wp_get_attachment_image_url($image_id, 'full');
                $gallery_image_ids = $product->get_gallery_image_ids();
                $img_hover = esc_url($image_url??'');
                if(!empty($gallery_image_ids) && count($gallery_image_ids) > 1 ){
                    $img_hover = wp_get_attachment_image_url($gallery_image_ids[1], 'full');
                }
                ?>
                <div class="col-sm-3 item-facture">
                    <div class="image-wrapper mb-4">
                        <img class="default-img" src="<?php echo esc_url($image_url ?? '') ?>" alt="">
                        <img class="hover-img " src="<?php echo esc_url($img_hover ?? '') ?>" alt="">
                    </div>
                    <p><?php echo $product->get_name() ?> </p>
                    <p style="font-weight: 300; font-size: 12px"><?php echo $formatted_price ?? '' ?> đ</p>
                </div>

            <?php }
        }

        ?>

    </div>
    <div  style=" margin-top: 40px;   box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;">
        <img style="width: 100%;height: 400px" src="<?php echo $image_url3 ?>" alt="">
    </div>
    <div class="mt-4">
        <div class="text-center title">
             Khách hàng <span>Đánh Giá</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
            </svg>
        </div>
    </div>
    <div class="box-comment">
        <div class="your-slider-class">
            <div><img src="path/to/image1.jpg" alt="Image 1"></div>
            <div><img src="path/to/image2.jpg" alt="Image 2"></div>
            <div><img src="path/to/image3.jpg" alt="Image 3"></div>
            <div><img src="path/to/image1.jpg" alt="Image 1"></div>
            <div><img src="path/to/image2.jpg" alt="Image 2"></div>
            <div><img src="path/to/image3.jpg" alt="Image 3"></div>
            <!-- Thêm nhiều hình ảnh khác -->
        </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">

       $(()=>{
           $('.your-slider-class').slick({
               slidesToShow: 3,
               slidesToScroll: 1,
               arrows: false
           });
       })

    </script>

    <?php get_footer(); ?>
