<?php
/* Template Name: Chi Tiết Sản Phẩm */

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
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .product-image {
        flex: 1;
        max-width: 50%;
        padding: 10px;
    }

    .product-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .product-info {
        flex: 2;
        max-width: 50%;
        padding: 10px;
        text-align: left;
    }

    .product-info h1 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }

    .product-price {
        margin-top: 10px;
        font-size: 20px;
        color: #28a745;
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
        width: 900px;
        height: 900px;
        border-radius: 8px;
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
        border-radius: 8px;
    }


</style>
<?php

// Lấy tên sản phẩm từ URL
$slug_san_pham = get_query_var('ten_san_pham');

// Gọi hàm để lấy thông tin sản phẩm
$product = get_product_by_slug($slug_san_pham);

?>
<div class="product-detail">
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


    <div class="product-info">
        <h1><?php echo esc_html($product->get_name()); ?></h1>
        <div class="product-price">
            <?php echo $product->get_price_html(); ?>
        </div>
        <div class="product-description">
            <p><?php echo $product->get_description(); ?></p>
        </div>
        <button class="button">Mua Ngay</button>
    </div>
</div>

<script>

   const load_img = (src) => {
       let img = `<img src="${src}" alt="">`;
       $('.product-main-image').html(img);
   }
</script>
<?php get_footer(); ?>
