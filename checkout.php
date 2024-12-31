<?php

/**
 * Template Name:  Thanh toán - traicay68
 */
get_header();
?>
<style>
    .title-checkout{
        font-weight: 700;
        font-size: 24px;
        line-height: 1.375;
        letter-spacing: -0.015em;
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        padding: 24px;
        border-bottom: 1px solid #d7d7d7;
    }
    .tttt{
        font-weight: 700;
        font-size: 17px;
        line-height: 23px;
        text-transform: uppercase;
        color: #070707;
    }
    .select2-container--default .select2-selection--single {
        height: 38px !important; /* Điều chỉnh chiều cao cho Select2 */
        padding-top: 4px;
    }
    .box-price{
        font-family: monospace !important;
        border: 1px solid #777777;
        padding: 30px;
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
        text-transform: uppercase;
    }
    .title-cart{
        font-weight: 700;
        font-size: 17px;
        line-height: 23px;
        text-transform: uppercase;
        color: #070707;
        letter-spacing: 0px;
    }
    .item_cart{
        display: flex;
        justify-content: space-between;
        letter-spacing: 1px;
        line-height: 10px;
        font-size: 12px;
    }
    .dieu-khoan{
        padding: 25px 0px;
        text-align: justify;
        letter-spacing: 0px;
        line-height: 23px;
        font-size: 14px;
    }
    .dieu-khoan a{
        text-decoration: underline;
    }
    .dieu-khoan a:hover{
        text-decoration: underline!important;
        color: #786802 !important;
    }
    .check_dieu-khoan{

        text-align: justify;
        letter-spacing: -1px;
        line-height: 23px;
        font-size: 14px;
    }
</style>

<?php
$vn_cities =get_provinces_from_api(); // Lấy danh sách tỉnh/thành phố Việt Nam
$list_cart  = WC()->cart->get_cart();
$total = WC()->cart->subtotal;



?>
<div class="container mb-4">
    <p class="title-checkout">THANH TOÁN</p>
    <div class="row mt-4">
        <div class="col-sm-6">
            <p class="tttt">Thông tin thanh toán</p>
            <div class="form-group">
                <label class="mb-0" for="email">Họ và tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control fullname "  required>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="text" class="form-control  telephone" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control email " >
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Thành phố <span class="text-danger">*</span></label>
                    <select onchange="load_tinhthanh(event)" class="form-control city select2"  >
                        <?php
                        if (!empty($vn_cities)) {
                        foreach ($vn_cities as $k => $v) { ?>
                        <option value="<?php echo $v['code']; ?>"><?php echo $v['name']; ?></option>
                        <?php }
                        }?>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Quận huyện <span class="text-danger">*</span></label>
                    <select onchange="load_phuongxa(event)" class="form-control district select2"  >

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Xã/Phường <span class="text-danger">*</span></label>
                    <select  class="form-control ward select2"  >

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Địa chỉ</label>
                    <input  class="form-control address" placeholder="Ví dụ: Số 20, ngõ 90" />

                </div>
            </div>
            <div class="form-group">
                <label for="">Ghi chú đơn hàng (tuỳ chọn)</label>
                <textarea class="form-control note" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
            </div>

        </div>
        <div class="col-sm-6">
            <div class="box-price">
                <p class="title-cart">ĐƠN HÀNG CỦA BẠN</p>
                <div class="box-cart">
                    <?php
                    if(!empty($list_cart)){
                        foreach($list_cart as $v){
                            $cart_item_data = $v['data'];
                            $product_price = $cart_item_data->get_price();
                            $product_name = $cart_item_data->get_name();
                            ?>
                            <div class="item_cart">
                                <p><?php echo $product_name ?> <i class='bx bx-x'></i><?php echo $v['quantity'] ?> </p>
                                <p class="font-weight-bolder"><?php echo format_money($v['quantity']*$product_price) ?>₫</p>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
                <div class="d-flex border-bottom border-top pt-3 justify-content-between item_cart">
                    <p> TẠM TÍNH </p><p><?php echo format_money($total) ?>₫</p>
                </div>
                <div class="d-flex mt-3 border-bottom  justify-content-between tamtinh">
                    <p>TỔNG </p><p style="font-weight: bolder; font-size: 20px"><?php echo format_money($total) ?>₫</p>
                </div>
                <div class="border-bottom border-top pt-3  pb-3 justify-content-between ">
                    <p>Phương thức thanh toán</p>
                    <div class="d-flex ml-5 align-items-center" style="letter-spacing: 0px; gap: 10px">
                        <input type="checkbox" checked disabled>
                        <label class="mb-0" for="">Thanh toán khi nhận hàng</label>
                    </div>
                </div>
                <p class="dieu-khoan">Dữ liệu sẽ được sử dụng để hỗ trợ cải thiện trải nghiêm và các mục đích theo chính sách bảo mật được mô tả ở
                    <a  href="<?php echo home_url('/chinh-sach-bao-mat') ?>"> Chính sách bảo mật</a>.</p>
                <div class="d-flex  align-items-center check_dieu-khoan" style=" gap: 10px">
                    <input type="checkbox"  id="checkbox_dieu_khoan">
                    <label class="mb-0" for="checkbox_dieu_khoan">Tôi đã đọc và đồng ý với <a href="<?php echo home_url('dieu-khoan') ?>">Điều khoản & Điều kiện</a> của website *</label>
                </div>
                <a href="javascript:void(0)" onclick="checkout(event)" class="btn-block btn-thanhtoan">Đặt hàng</a>
            </div>
        </div>
    </div>
</div>

<script>
    const noti = (text) => {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: `${text}`,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    }
    $(document).ready(function() {
        $('.select2').select2();
        $('.city').trigger('change');
    });
    const load_tinhthanh = (event) => {
        $.ajax({
            url: wc_add_to_cart_params.ajax_url, // URL của WooCommerce AJAX
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'get_district_from_city',
                citi_id : event.target.value,
            },
            success: function(response) {
                if (response.success ) {
                   if(response.data.data.length > 0) {
                       let html = '';
                       response.data.data.forEach(function(item){
                           html +=`<option value="${item.id}" >${item.name}</option>`;
                       })
                       $(`.district`).html(html).trigger('change');
                   }
                }

            }
        });
    }
    const load_phuongxa = (event) => {
        $.ajax({
            url: wc_add_to_cart_params.ajax_url, // URL của WooCommerce AJAX
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'get_ward_from_district',
                district_id : event.target.value,
            },
            success: function(response) {
                if (response.success ) {
                    if(response.data.data.length > 0) {
                        let html = '';
                        response.data.data.forEach(function(item){
                            html +=`<option value=">${item.id}" >${item.name}</option>`;
                        })
                        $(`.ward`).html(html);
                    }
                }

            }
        });
    }
    const checkout = (event) => {
        let fullname = $(`.fullname`).val();
        let telephone = $(`.telephone`).val();
        let email = $(`.email`).val();
        let city = $(`.city`).val();
        let district = $(`.district`).val(); // select
        let ward = $(`.ward`).val(); // select
        let address = $(`.address`).val(); // select
        let note = $(`.note`).val();
        let checkbox_dieu_khoan = $('#checkbox_dieu_khoan').prop('checked');
        if (fullname === '') {
            noti("Họ tên không được để trống!");
            return ;
        }
        if (telephone === '' || !/^\d{10,11}$/.test(telephone)) {
            noti("Số điện thoại không hợp lệ");
           return ;
        }
        if (email === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            noti("Email không hợp lệ!");
           return ;
        }
        if (city === '') {
            noti("Vui lòng chọn thành phố!");
           return ;
        }
        if (district === '') {
            noti("Vui lòng chọn quận/huyện!");
           return ;
        }
        if (ward === '') {
            noti("Vui lòng chọn phường/xã!");
           return ;
        }
        if (address === '') {
            noti("Địa chỉ không được để trống!");
           return ;
        }
        if(!checkbox_dieu_khoan){
            noti("Vui lòng chấp nhận Điều khoản & Điều kiện ");
            return ;
        }

        const city_name = $('.city option:selected').text();
        const district_name = $('.district option:selected').text();
        const ward_name = $('.ward option:selected').text();
        const address_arr = {
            first_name:fullname,
            email: email,
            phone: telephone,
            address_1:address,
            city: city_name,
            state: district_name,
            ward: ward_name,
            country:'Việt Nam'
        };
        $.ajax({
            url: wc_checkout_params.ajax_url,
            method: 'POST',
            data: {
                action: 'create_guest_order',
                address: address_arr
            },
            beforeSend: function() {
                event.target.innerHTML = `<i class='bx bx-loader bx-spin bx-rotate-90' ></i>`;
            },
            success: function (response) {
                if (response.data.statusCode == 200) {
                    window.location.href = '<?php echo home_url('/thanks') ?>';
                } else {
                    alert('Đã xảy ra lỗi: ' + response.message);
                }
            },
            error: function () {
                alert('Đã xảy ra lỗi trong quá trình gửi yêu cầu.');
            }
        });
    }

</script>

<?php
get_footer();
?>

