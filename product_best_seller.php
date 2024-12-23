<?php

/**
 * Template Name: Bán chạy - traicay68
 */
get_header();


$list_best_seller = get_products_by_category_name('san-pham-ban-chay');

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


</style>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0"></script>
<div class="container-fluid p-0">
    <div class="img-banner">
        <img src="<?php echo get_template_directory_uri(); ?>/images/best_seller/anhbia-bestseller.png" alt="Mô tả hình ảnh">
    </div>
    <p class="text-center p-title">khám phá những sản phẩm được lựa chọn nhiều nhất</p>
    <div class="row box-item-best-sales">
        <?php
        if(!empty($list_best_seller)){
            foreach ($list_best_seller as $product ){
                $formatted_price = number_format($product->get_price(), 0, '.', ',');
                $image_id = $product->get_image_id();
                $image_url = wp_get_attachment_image_url($image_id, 'full');
                $gallery_image_ids = $product->get_gallery_image_ids();

                $img_hover = esc_url($image_url??'');
                if(!empty($gallery_image_ids) && count($gallery_image_ids) > 0 ){
                    $img_hover = wp_get_attachment_image_url($gallery_image_ids[0], 'full');
                }
                ?>
                <div class="col-sm-3 item-facture border">
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
    <div class="d-flex justify-content-center">
        <div class="banner_mid">
            <p class="title"> KP68 Fruit – Chất lượng quốc tế, giá cả hợp lý</p>
            <div class="box-img">
                <img width="250" src="<?php echo get_template_directory_uri(); ?>/images/best_seller/bnm1.jpg">
                <img width="250" src="<?php echo get_template_directory_uri(); ?>/images/best_seller/bnm2.jpg">
                <img width="250" src="<?php echo get_template_directory_uri(); ?>/images/best_seller/bnm3.jpg">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a target="_blank" style="color: white !important;" href="https://zalo.me/" class="btn-zalo">Liên hệ Zalo ngay</a>
    </div>

    <div class="fb-page d-flex justify-content-center mt-2 mb-2"
         data-href="https://www.facebook.com/profile.php?id=61570453135657"
         data-tabs="timeline"
         data-width="500"
         data-height="200"
         data-small-header="false"
         data-adapt-container-width="true"
         data-hide-cover="false"
         data-show-facepile="true">
    </div>
    <div class="d-flex justify-content-center mb-4">
        <div>
            <p>Bạn Cần Hỗ Trợ?</p>
            <a  style="color: #6c6c6c !important;" href="tel:0588665666" class="btn-tel">Gọi ngay</a>
        </div>

    </div>


</div>


<?php
get_footer();
?>
