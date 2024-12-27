<?php

/**
 * Template Name:  Giỏ hàng - traicay68
 */
get_header();

?>

<style>
    .title{
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 24px;
        padding: 10px 0px;
        border-bottom: 1px solid #707070;
        margin-bottom: 30px;
    }
    .title p{
        margin-bottom: 0px;
    }
    .title .p-link{
        display: flex;
        align-items: center;
        color: #838383;
        font-weight: 600;
        font-size: 10px;
        line-height: 1.4;
        letter-spacing: 0.07em;
        text-transform: uppercase;
    }
    .p-link a{
        color: #838383 !important;
    }
    .img_td{
        width: 65px;
        height: 65px;
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
    .table td {
        vertical-align: middle;
    }
    .table  th {
        font-weight: 500;
        font-size: 11px;
        line-height: 15px;
        letter-spacing: 0.0625em;
        text-transform: uppercase;
        color: #838383;
        text-align: left;
        border-top : 0px;
    }
    .box-price{
        font-family: monospace !important;
        border: 1px solid #777777;
        padding: 20px;
        font-size: 14px;
        font-weight: 500;
        line-height: 30px;
        letter-spacing: 2px;
    }
    .btn-thanhtoan{
        text-align: center;
        background: rgb(0, 80, 94);
        color: white !important;
        padding: 10px;
        margin-top: 20px;
    }
</style>
<?php
$list_cart  = WC()->cart->get_cart();
$total = WC()->cart->subtotal;
$total_formatted = number_format((float)$total, 0, ',', '.');
?>
<div class="container">
    <div class="title">
        <p>Giỏ hàng</p>
        <p class="p-link p-link-pc"><a href="<?php echo home_url() ?>">Trang chủ</a><i class='bx bx-chevron-right'></i> Giỏ hàng </p>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr >
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tạm tính</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($list_cart)){
                        foreach ($list_cart as $k => $v) {
                            $cart_item_data = $v['data'];
                            $product_price_html = $cart_item_data->get_price_html();
                            $product_price = $cart_item_data->get_price();
                            $product_name = $cart_item_data->get_name();
                            $product_slug = $cart_item_data->get_slug();
                            $product_id = $v['product_id'];
                            $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'thumbnail');
                            ?>
                            <tr >
                                <td>
                                    <div class="item-cart mb-0" >
                                        <a href="javascript:void(0)" onclick="delete_item_cart('<?php echo $k ?>')"><i class="bx bx-x"></i></a>
                                        <img class="img_td" src="<?php echo $product_image[0] ?>" alt="">
                                        <div>
                                            <p class="font-weight-bolder "><a href="<?php echo home_url("/san-pham/$product_slug") ?>"><?php echo $product_name ?></a></p>
                                            <p><?php echo $v['quantity'] ?> <i class='bx bx-x'></i> <?php echo $product_price_html ?> </p>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <div class="quantity-selector">
                                        <a onclick="tanggiam_cart(0,'<?php echo $k ?>')" href="javascript:void(0)"> <i class='bx bx-minus' ></i> </a>
                                        <span class="quantity_value_<?php echo $k ?>"><?php echo  $v['quantity'] ?></span>
                                        <a onclick="tanggiam_cart(1,'<?php echo $k ?>')" href="javascript:void(0)"> <i class='bx bx-plus' ></i> </a>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;"><?php echo format_money($v['quantity']*$product_price) ?>₫</td>
                            </tr>

                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <?php
            if(!empty($list_cart)){
                foreach($list_cart as $v){

                }
            }

            ?>

        </div>
        <div class="col-sm-4">
            <div class="box-price">
                <div class="d-flex border-bottom  justify-content-between tamtinh">
                    <p> TẠM TÍNH </p><p><?php echo $total_formatted ?>₫</p>
                </div>

                <div class="d-flex mt-3 border-bottom  justify-content-between tamtinh">
                    <p>TỔNG </p><p style="font-weight: bolder; font-size: 20px"><?php echo $total_formatted ?>₫</p>
                </div>
                <a href="<?php echo home_url('thanh-toan') ?>" class="btn-block btn-thanhtoan">THANH TOÁN</a>
            </div>
        </div>
    </div>
</div>

<script>
    const tanggiam_cart = (type,key_item_cart) => {
        var quantity_value = parseInt($(`.quantity_value_${key_item_cart}`).text().trim());
        var quantity_value_old = quantity_value ;
        if(type == 0 && quantity_value > 1){
            quantity_value -=1 ;
        }
        if(type == 1 && quantity_value < 15){
            quantity_value +=1 ;
        }
        $(`.quantity_value_${key_item_cart}`).text(quantity_value)
        if(quantity_value != quantity_value_old){
            $.ajax({
                url: wc_add_to_cart_params.ajax_url, // URL của WooCommerce AJAX
                type: 'POST',
                data: {
                    action: 'update_cart_quantity',
                    quantity: quantity_value,
                    cart_item_key: key_item_cart,
                },
                success: function(response) {
                    if (response.statusCode === 200) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 300);
                    } else {
                    }
                },
                error: function() {
                }
            });
        }
    }
    const delete_item_cart = (cart_item_key) => {
        $.ajax({
            url: wc_add_to_cart_params.ajax_url, // URL của WooCommerce AJAX
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'remove_item_cart',
                cart_item_key : cart_item_key
            },
            success: function(response) {
                if (response.statusCode == 200) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 300);
                }

            }
        });
    }
</script>
<?php
get_footer();
?>

