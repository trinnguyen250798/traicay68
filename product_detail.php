<?php
/* Template Name: Chi Tiết Sản Phẩm - traicay68 */

get_header();


?>
<style>
    .product-detail {
        display: flex;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
    }

    .product-image {

        padding: 10px;
    }

    .product-image img {
        max-width: 100%;
        height: auto;

    }

    .product-info {
        padding: 8px 20px 10px;
        text-align: left;
        font-family: 'Montserrat', sans-serif;
    }

    .product-description {
        margin-top: 15px;
        font-size: 16px;
        color: #555;
    }

    .product-detail .button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .product-detail .button:hover {
        background-color: #0056b3;
    }

    .product-meta {
        margin-top: 10px;
        font-size: 14px;
        color: #777;
    }

    .product-slider {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .product-main-image {
        max-width: 600px;
        margin-bottom: 20px;
    }

    .product-main-image img {
        width: 530px;
        height: 530px;

    }

    .product-thumbnails {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        overflow-x: auto;
        height: max-content;
    }

    .product-thumbnails img {
        width: 80px;
        height: auto;
        cursor: pointer;

    }

    .p-link{
        display: flex;
        align-items: center;
        color: #838383;
        font-weight: 600;
        font-size: 10px;
        line-height: 1.4;
        letter-spacing: 0.07em;
        text-transform: uppercase;
    }
    .product__title{
        font-size: 27px;
        font-style: normal;
        font-weight: 500;
        line-height: 1.23;
        letter-spacing: 0.005em;
        text-transform: capitalize;
        margin-top: 20px;
        color: #070707;
    }
    .product__price{

        font-style: normal;
        font-weight: 600;
        font-size: 17px;
        line-height: 1;
        letter-spacing: -0.01em;
        display: flex;
        align-items: baseline;
        flex-wrap: wrap;
        -moz-column-gap: 5px;
        column-gap: 5px;
        margin: 25px 0 0 0;
    }
    .product__short-description{
        margin-top: 20px;
        font-style: normal;
        font-weight: 400;
        font-size: 13px;
        line-height: 26px;
        letter-spacing: 0.0225em;
    }
    .product__attributes h4{
        display: block;
        font-weight: 800;
        font-size: 14px;
        line-height: 21px;
        letter-spacing: 0.035em;
        text-transform: uppercase;
        -ms-word-wrap: normal;
        word-break: normal;
        word-wrap: normal;
    }
    .title-desc{
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        font-weight: 800;
        font-size: 14px;
        line-height: 21px;
        letter-spacing: 0.035em;
        text-transform: uppercase;
        -ms-word-wrap: normal;
        word-break: normal;
        word-wrap: normal;
        font-family: auto;
    }
    .product__attributes__item {
        list-style: none; /* Loại bỏ dấu chấm của danh sách */
        padding: 0;       /* Loại bỏ khoảng cách padding mặc định */
        margin: 0;        /* Loại bỏ khoảng cách margin mặc định */
        display: flex;    /* Hiển thị danh sách theo hàng ngang */
        gap: 10px;        /* Khoảng cách giữa các mục trong danh sách */
    }
    .product__attributes__item li {
        font-size: 11px;
        background-color: #f7f7f7; /* Màu nền cho từng mục */
        padding: 6px 11px;        /* Khoảng cách bên trong từng mục */
        border: 1px solid #ddd;    /* Viền cho từng mục */
        border-radius: 5px;        /* Bo tròn góc */
        cursor: pointer;           /* Con trỏ chuột hiển thị dạng chọn */
        transition: background-color 0.3s ease; /* Hiệu ứng hover */
    }

    .product__attributes__item li:hover {
        background-color: #e2e2e2; /* Đổi màu khi hover */

    }
    .product__attributes__item li.active{
        background-color: #e2e2e2;
        border: 1px solid ;
    }
    .quantity-selector{

        padding: 14px 0px;
        border: 1px solid;
        width: max-content;
    }
    .quantity-selector span{
        padding: 14px;
    }
    .quantity-selector a{
        padding: 14px;
    }
    .btn-adad-card{
        margin-left: 10px;
        padding: 14px 50px;
        background: #00505f;
        font-weight: 600;
        font-size: 12px;
        line-height: 2;
        border: 1px solid #00505f;
        color: white;
    }
    .btn-buy-now{
        padding: 14px 50px;
        font-weight: 600;
        font-size: 12px;
        line-height: 2;
        border: 1px solid #00505f;
        color: #707070;
        width: 357px;
        text-align: center;
    }

    #icon.rotate {
        transform: rotate(45deg);
    }
    #icon {
        transition: transform 0.3s ease;
    }
    .page_404{
        text-align: center;
        padding: 100px;
        margin: auto;
    }
    .sptt{
        word-spacing: 5px;
        font-weight: 700;
        font-size: 22px;
        line-height: calc(30 / 22);
        text-transform: uppercase;

        margin-top: 40px;
        position: relative;
        text-align: center;
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
        height: 300px;
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
        height: 300px;
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
        height: 300px;
    }
    /* Hiệu ứng khi hover */
    .image-wrapper:hover .default-img {
        opacity: 0;
    }
    .image-wrapper:hover .hover-img {
        opacity: 1;
        transform: scale(1.2); /* Phóng to hình ảnh hover */

    }

    .p-link-mb{
        display: none;
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
        .product-main-image img{
            width: 312px;
            height: 305px;
        }
        .product-thumbnails img{
            width: 40px;
            height: 40px;
        }
        .p-link-mb{
            display: block;
        }
        .p-link-pc{
            display: none ;
        }
        .product-detail{
            padding: 20px 0px;
        }
        .product-info{
            padding: 20px 0px;
        }
        .quantity-selector a {
            padding: 18px;
        }
        .quantity-selector span {
            padding: 6px;
        }

    }



    .disabled-link {
        pointer-events: none; /* Vô hiệu hóa tất cả sự kiện chuột */
        color: gray; /* Thay đổi màu để hiển thị trạng thái bị vô hiệu hóa */
        text-decoration: none;
    }


</style>
<?php

// san pham tuong tu
$random_products = get_random_products(4);

// Lấy tên sản phẩm từ URL
$slug_san_pham = get_query_var('ten_san_pham');

// Gọi hàm để lấy thông tin sản phẩm
$product = get_product_by_slug($slug_san_pham);
?>
<div class="product-detail row">
    <?php
    if ($product){ ?>
        <div class="col-sm-6">
            <p class="p-link p-link-mb">Trang chủ <i class='bx bx-chevron-right'></i> Trái cây nhập khẩu <i class='bx bx-chevron-right'></i> <?php echo esc_html($product->get_name()); ?></p>
            <div class="product-image">
                <div class="product-slider">
                    <div class="product-main-image">
                        <?php
                        $image_id = $product->get_image_id();
                        $image = wp_get_attachment_image_url($image_id, 'full');
                        $gallery_image_ids = $product->get_gallery_image_ids();

                        if ( $image ) {
                            echo '<img src="' . esc_url($image) . '" alt="Product Image">';
                        }
                        ?>
                    </div>
                    <div class="product-thumbnails">
                        <img src="<?php echo esc_url($image) ?>" onclick="load_img('<?php echo  esc_url($image) ?>')" alt="">
                        <?php
                        foreach ( $gallery_image_ids as $image_id ) {
                            $image_url = wp_get_attachment_url( $image_id ); ?>
                            <img src="<?php echo esc_url($image_url) ?>" onclick="load_img('<?php echo  esc_url($image_url) ?>')" alt="">
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="product-info">
                <p class="p-link p-link-pc">Trang chủ <i class='bx bx-chevron-right'></i> Trái cây nhập khẩu <i class='bx bx-chevron-right'></i> <?php echo esc_html($product->get_name()); ?></p>
                <h1 class="product__title"><?php echo esc_html($product->get_name()); ?></h1>
                <div class="product__price">
                    <?php echo $product->get_price_html(); ?>
                </div>
                <div class="product__short-description">
                    <?php echo $product->get_short_description(); ?>
                </div>
                <?php
                $product_attributes = $product->get_attributes();
                if (!empty($product_attributes)) {
                    foreach ($product_attributes as $attribute_name => $attribute) {
                        if ($attribute->is_taxonomy()) {
                            $terms = wc_get_product_terms($product->get_id(), $attribute_name, array('fields' => 'names'));
                            ?>
                            <div class="product__attributes">
                                <h4><?php echo wc_attribute_label($attribute_name); ?></h4>
                                <ul class="product__attributes__item">
                                    <?php
                                    foreach ($terms as $term) {
                                        $variation = find_matching_variation($product, esc_attr($term));
                                        $price_html = $variation ? $variation['price_html'] : 'Liên hệ để biết giá';
                                        $price = $variation ? $variation['display_price'] : 'Liên hệ để biết giá';
                                        ?>
                                        <li price="<?php echo esc_js($price); ?>" onclick="chooseAttribute(event, '<?php echo esc_js($price_html); ?>')">
                                            <?php echo esc_html($term); ?>
                                        </li>

                                    <?php } ?>
                                </ul>
                            </div>
                            <?php
                        }
                    }
                }
                ?>

                <div class="product__price d-none justify-content-between">
                    <span class="change_price "></span>
                    <a href="javascript:void(0)" style="font-weight: 500;font-size: 12px;" onclick="remove_choose()"> xóa</a>
                </div>
                <div class="d-flex mt-4">

                    <div class="quantity-selector">
                        <a onclick="tanggiam(0)" href="javascript:void(0)"> <i class='bx bx-minus' ></i> </a>
                        <span class="quantity_value">1</span>
                        <a onclick="tanggiam(1)" href="javascript:void(0)"> <i class='bx bx-plus' ></i> </a>
                    </div>
                    <a class=""  onclick="add_product_to_cart(this,'<?php echo $product->get_id() ?>')" href="javascript:void(0)">
                        <div class="btn-adad-card">
                            Thêm vào giỏ hàng
                        </div>
                    </a>


                </div>
                <a class="" onclick="add_product_to_cart(this,'<?php echo $product->get_id() ?>',1)" href="javascript:void(0)">
                    <div class="btn-buy-now mt-2" >
                        MUA NGAY
                    </div>

                </a>

                <h4 class="title-desc ">Mô Tả <a href="javascript:void(0)" onclick="show_desc()"><i id="icon" class='bx bx-plus' ></i></a></h4>
                <div class="product-description d-none">
                    <p><?php echo $product->get_description(); ?></p>
                </div>
                <hr>


            </div>
        </div>
    <?php }else{
        echo '<div class="page_404">Không tim thấy sản phẩm</div>';
    } ?>

</div>
<p class="sptt">Sản phẩm tương tự</p>
<div class="product-detail row  box-item-best-sales">
    <?php
    if(!empty($random_products)){
        foreach ($random_products as $product ){
            if(!empty($product->get_price())){
                $formatted_price = number_format($product->get_price(), 0, '.', ',');
            }
            $image_id = $product->get_image_id();
            $image_url = wp_get_attachment_image_url($image_id, 'full');
            $gallery_image_ids = $product->get_gallery_image_ids();

            $img_hover = esc_url($image_url??'');
            if(!empty($gallery_image_ids) && count($gallery_image_ids) > 0 ){
                $img_hover = wp_get_attachment_image_url($gallery_image_ids[0], 'full');
            }
            ?>
            <div class="col-sm-3 item-facture border">
                <a href="<?php echo $product->get_permalink()  ?>">
                    <div class="image-wrapper mb-4">
                        <img class="default-img" src="<?php echo esc_url($image_url ?? '') ?>" alt="">
                        <img class="hover-img " src="<?php echo esc_url($img_hover ?? '') ?>" alt="">
                    </div>
                    <p><?php echo $product->get_name() ?> </p>
                    <p style="font-weight: 300; font-size: 12px"><?php echo $formatted_price ?? '' ?> đ</p>
                </a>
            </div>


        <?php }
    }

    ?>
</div>
<script>
    $(()=>{

    })
    const show_desc = () => {
        $('#icon').toggleClass('rotate');
        $('.product-description').toggleClass('d-none', 800);
    }
   const load_img = (src) => {
       let img = `<img src="${src}" alt="">`;
       $('.product-main-image').html(img);
   }
   const chooseAttribute = (event,price_show) => {
       $('.product__attributes__item li').removeClass('active');
       $(event.target).addClass('active');
       $(`.change_price`).html(price_show);
       $(`.product__price`).addClass('d-flex');
       $(`.product__price`).removeClass('d-none');
   }
   const remove_choose = () => {
       $('.product__attributes__item li').removeClass('active');
       $(`.product__price`).removeClass('d-flex');
       $(`.product__price`).addClass('d-none');
   }
   const tanggiam = (type) => {
        var quantity_value = parseInt($(`.quantity_value`).text().trim());
        if(type == 0 && quantity_value > 1){
          quantity_value -=1 ;
        }
        if(type == 1 && quantity_value < 15){
           quantity_value +=1 ;
        }
        $(`.quantity_value`).text(quantity_value)
   }
    function add_product_to_cart(element,product_id,buy_now = 0) {
        if (element.dataset.clicked === "true") {
            return;
        }
        let quantity =  parseInt($(`.quantity_value`).text().trim());
        $.ajax({
            url: wc_add_to_cart_params.ajax_url, // URL của WooCommerce AJAX
            type: 'POST',
            data: {
                action: 'add_to_cart',
                product_id: product_id,
                quantity: quantity,
            },
            beforeSend: function() {
                if(buy_now == 1){
                    $(`.btn-buy-now`).html(`<i class='bx bx-loader-alt bx-spin'></i>`);
                }else{
                    element.dataset.clicked = "true";
                    $(`.btn-adad-card`).html(`<i class='bx bx-loader-alt bx-spin'></i>`);
                }

            },
            success: function(response) {
                if(buy_now == 1){
                    window.location.href = '<?php echo home_url('/thanh-toan') ?>';
                }else{
                    element.dataset.clicked = "false";
                    $(`.btn-adad-card`).html(`Thêm vào giỏ hàng`);
                    if (response.success) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Sản phẩm đã được thêm vào giỏ hàng!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    } else {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Có lỗi xảy ra khi thêm sản phẩm.',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                }

            }
        });
    }

</script>


<?php get_footer(); ?>
