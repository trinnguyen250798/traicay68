

<?php

/**
 * Template Name: Trái cây nhập khẩu - traicay68
 */
get_header();

?>

<style>
    .img-banner {
        text-align: center; /* Căn giữa nội dung trong div */
        margin-bottom: 40px;
    }

    .img-banner img {
        display: inline-block; /* Đảm bảo ảnh hiển thị dưới dạng inline */
        width: 1500px;
        height: 450px;

    }
    .p-title{
        text-transform: uppercase;
        font-size: 29px;
        font-weight: 600;
        color :#070707;
    }

    .box-item-best-sales{
        margin: 0 !important;
    }
    .box-item-best-sales .item-facture {
        padding: 3px!important;
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

    .banner_mid{
        background: rgb(0, 80, 94);
        color: white;
        width: 1600px;
        height: 456px;
        margin: 50px 0;


    }


    .banner_mid .title {
        font-size: 40px;
        background: linear-gradient(to bottom, rgb(242, 196, 90) 40%, rgb(52, 47, 6)); /* Chuyển từ vàng sang xanh đậm */
        -webkit-background-clip: text; /* Áp dụng gradient vào chữ */
        -webkit-text-fill-color: transparent; /* Xóa màu chữ mặc định để dùng gradient */
        text-align: center; /* Căn giữa nội dung */
        font-weight: bold; /* Chữ đậm */
        padding: 25px; /* Khoảng cách bên trong */
        border-bottom: 1px solid rgba(242, 196, 90, 0.59); /* Sửa cú pháp alpha */
    }
    .banner_mid .box-img{
        padding-top: 55px;

        display: flex;
        justify-content: center;
        gap: 256px;
    }
    .btn-zalo {
        border-radius: 5px;
        padding: 6px 12px;
        background: #7e7e7e;
        text-transform: uppercase;
    }
    .btn-tel{
        border-radius: 5px;
        padding: 8px 21px;
        background: white;
        border: 1px solid #7e7e7e;
        color: #7e7e7e;
    }



    @media (max-width: 1024px) {

        .box-item-best-sales {
            gap: 4px;
        }
        .box-item-best-sales .col-sm-3{
            border-bottom: 1px solid;
        }
        .img-why img{
            height: 100% !important;
        }
        .title {
            margin: 0 0 35px !important;
            font-size: 37px;
        }
        .box-item-best-sales{
            margin: 5px !important
        }
        .item-facture{
            width: 49%;
            height: unset;
            border: 1px solid;
        }
        .item-facture .image-wrapper{
            height: unset;
        }
        .box-item-best-sales img{

            height : 165px;
        }

    }


    .pagination {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination a {
        margin:  10px 0px 10px 5px;
        text-decoration: none;
        padding: 11px 18px;
        border-radius: 30px;
        color: #000000;
        background: #ffffff;
        border: 1px solid;

    }
    .pagination a.current {
        background: #000000;
        color: #fff !important;
        padding: 11px 19px;
    }
    .filter{
        font-family: 'Montserrat', sans-serif;
        display: flex;
        justify-content: space-between;
        padding: 7px 25px;
        align-content: center;
        color: #838383;
        font-weight: 600;
        font-size: 11px;
        line-height: 1.36;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .sort-box {
        margin: 20px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sort-box select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 22px;
    }
    .btn-filter{
        min-width: max-content;
        padding: 9px 29px;
        margin-left: 15px;
        background: rgb(0, 80, 94);
        color: white !important;
        border-radius: 2px;
    }
    .btn-filter:hover{
        background: #b49e06;
    }
    .popup {
        display: none;            /* Ẩn popup ban đầu */
        position: fixed;          /* Đặt vị trí cố định */
        top: 0;                   /* Cố định đầu trang */
        right: 0;
        width: 380px;             /* Chiều rộng cố định */
        height: 100vh;            /* Chiều cao 100% màn hình */
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        padding: 20px;
    }

    .popup-content {

    }

    .close-popup {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 24px;
        color: #333;
    }
    .btn-loc{
        padding: 10px 152px;
        border: 1px solid rgb(0, 80, 94);

    }
    .btn-loc:hover{
        color: white !important;
        background:rgb(0, 80, 94);

    }
    #price-slider {
        width: 100%;              /* Chiều rộng đầy đủ của container */
        max-width: 400px;          /* Giới hạn chiều rộng tối đa của slider */
        margin: 0 auto;            /* Căn giữa slider */
        height: 3px;
        background: #7e7e7e;
        margin-bottom: 20px;
    }
        #price-slider .ui-slider-range  {
            height: 3px;
            background: black;
        }
        #price-slider .ui-slider-handle {
            width: 10px;               /* Chiều rộng handle */
            height: 10px;              /* Chiều cao handle */
            background-color: black;   /* Màu handle */
            border-radius: 50%;        /* Hình tròn */
        }
    }
</style>
<?php
$orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : 'date';
$order = ($orderby === 'price-desc' || $orderby ==='date' ) ? 'DESC' : 'ASC';
$keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';
$min_price = isset($_GET['min_price']) ? sanitize_text_field($_GET['min_price']) : 0;
$max_price = isset($_GET['max_price']) ? sanitize_text_field($_GET['max_price']) : 5000000;
$litmit = 20;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$list_product = get_products_by_category_page('trai-cay-nhap-khau', $paged, $litmit,$orderby,$order,$keyword,$min_price,$max_price);
$total_products = count(numrow_products_by_category_page('trai-cay-nhap-khau', 1, -1)); // Lấy tổng số sản phẩm
$total_pages = ceil($total_products / $litmit);
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="container-fluid p-0 mb-4">
    <div class="filter">
        <span class="mt-2"><?php echo get_pagination_info($total_products, $litmit, $paged) ?></span>
        <form id="sort-form" method="get" action="" >
            <div class="d-flex ">
                <select class="form-control form-control-sm" name="orderby" id="sort" onchange="this.form.submit()">
                    <option value="date" <?php echo ( !empty($_GET['orderby']) && $_GET['orderby'] == 'date' ? 'selected' : '') ?>>Mới nhất</option>
                    <option value="price" <?php  echo (!empty($_GET['orderby']) && $_GET['orderby'] == 'price' ? 'selected' : '') ?>>Giá: Thấp đến cao</option>
                    <option value="price-desc" <?php  echo ( !empty($_GET['orderby']) && $_GET['orderby'] =='price-desc' ? 'selected' : '') ?>>Giá: Cao đến thấp</option>
                </select>
                <a class="btn-filter" onclick="open_md_filter()" href="javascrip:void(0)"> <i class='bx bx-filter'></i> Bộ lọc </a>
            </div>

        </form>
    </div>

    <div class="row box-item-best-sales">
        <?php

       if ($list_product->have_posts()) :
            while ($list_product->have_posts()) : $list_product->the_post();
                global $product;

                if(!empty($product->get_price())){
                    $formatted_price = number_format($product->get_price(), 0, '.', ',');
                }
                $image_id = $product->get_image_id();
                $image_url = wp_get_attachment_image_url($image_id, 'full');
                $gallery_image_ids = $product->get_gallery_image_ids();

                $img_hover = esc_url($image_url ?? '');
                if (!empty($gallery_image_ids) && count($gallery_image_ids) > 0) {
                    $img_hover = wp_get_attachment_image_url($gallery_image_ids[0], 'full');
                }
                ?>
                <div class="col-sm-3 item-facture border">
                    <a href="<?php echo $product->get_permalink()  ?>">
                        <div class="image-wrapper mb-4">
                            <img class="default-img" src="<?php echo esc_url($image_url ?? '') ?>" alt="">
                            <img class="hover-img" src="<?php echo esc_url($img_hover ?? '') ?>" alt="">
                        </div>
                        <p><?php echo get_the_title() ?> </p>
                        <p style="font-weight: 300; font-size: 12px"><?php echo $formatted_price ?> đ</p>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            else : ?>
                <p>Không có sản phẩm nào trong danh mục này.</p>
            <?php endif;
        if($total_pages > 1){ ?>
            <div class="pagination ">
                 <?php
                    for ($i = 1; $i <= $total_pages; $i++){ ?>
                        <a href="<?php echo get_pagenum_link($i) ?>" <?php echo (($i == $paged) ? 'class="current"' : '') ?>> <?php echo $i  ?></a>
                    <?php }
                 ?>
            </div>
        <?php }

        ?>
    </div>
</div>
<div id="popup" class="popup">
    <div class="popup-content">
        <span onclick="close_md_filter()" class="close-popup">&times;</span>
        <h2 class="text-center">Bộ lọc</h2>
        <div class="form-group" style="margin-top: 20px">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="keyword" form="sort-form" value="<?php echo $keyword ?>" class="form-control form-control-sm">
        </div>
        <p class=" font-weight-bolder"> Giá</p>
        <div class="container mt-5 mb-5">
            <div id="price-slider" class="slider"></div>
            <p>Giá: <span id="price-range"></span></p>
            <input type="hidden" class="min_price" form="sort-form" name="min_price" value="<?php echo $min_price ?>">
            <input type="hidden" class="max_price" form="sort-form" name="max_price" value="<?php echo $max_price ?>">
        </div>
        <a class="btn-loc" onclick="submit_form()" href="javascript:void(0)">LỌC</a>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Khởi tạo slider
        $("#price-slider").slider({
            range: true,               // Cho phép chọn khoảng giá
            min: 0,                    // Giá thấp nhất
            max: 5000000,                 // Giá cao nhất
            step: 10,                  // Bước nhảy của slider
            values: [$(".min_price").val(), $(".max_price").val()],         // Giá trị mặc định
            slide: function(event, ui) {
                var minPrice = ui.values[0].toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                var maxPrice = ui.values[1].toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                $("#price-range").text(minPrice + " - " + maxPrice);
                $(".min_price").val(ui.values[0])
                $(".max_price").val(ui.values[1])
            }
        });


        var gia1 = parseInt($(".min_price").val());
        var gia2 = parseInt($(".max_price").val());
        var initialMinPrice = gia1.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        var initialMaxPrice = gia2.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        $("#price-range").text(initialMinPrice + " - " + initialMaxPrice);

    });
    const open_md_filter = () => {
        $('#popup').fadeIn();
    }
    const close_md_filter = () => {
        $('#popup').fadeOut();
    }
    const submit_form = () => {
        $(`#sort-form`).submit();
    }

</script>

<?php get_footer(); ?>
