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
</style>

<?php
$vn_cities =get_provinces_from_api(); // Lấy danh sách tỉnh/thành phố Việt Nam
?>
<div class="container">
    <p class="title-checkout">THANH TOÁN</p>
    <div class="row mt-4">
        <div class="col-sm-6">
            <p class="tttt">Thông tin thanh toán</p>
            <div class="form-group">
                <label class="mb-0" for="email">Họ và tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control  "  required>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Số điện thoại <span class="text-danger">*</span></label>
                    <input type="text" class="form-control  " required>
                </div>
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control  " >
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Thành phố <span class="text-danger">*</span></label>
                    <select onchange="load_tinhthanh(event)" class="form-control select2"  >
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
                    <select  class="form-control select2"  >

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Xã/Phường <span class="text-danger">*</span></label>
                    <select  class="form-control select2"  >

                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label  class="mb-0">Địa chỉ</label>
                    <input  class="form-control " placeholder="Ví dụ: Số 20, ngõ 90" />

                </div>
            </div>

        </div>
        <div class="col-sm-6">

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
    const load_tinhthanh = (event) => {
        $.ajax({
            url: wc_add_to_cart_params.ajax_url, // URL của WooCommerce AJAX
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'get_wards_from_district',
                cart_item_key : cart_item_key
            },
            success: function(response) {
                if (response.statusCode == 200) {
                    open_cart();
                    if (response.data == 1){

                    }
                }

            }
        });
    }

</script>

<?php
get_footer();
?>

