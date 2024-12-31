
<?php

/**
 * Template Name: Chính sách giao hàng - traicay68
 */
get_header();
?>
<style>
    .gb-container:before {
        content: "";
        background-image: url('<?php echo get_template_directory_uri() ?>/images/about/gb_about.jpg');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        background-attachment: fixed;
        z-index: -1;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        transition: inherit;
        pointer-events: none;
        opacity: 0.3;

    }
    .gb-container {
        height: 300px;
        align-content: center;
        background-color: #6a0101; /* Màu nền giữ nguyên */
        color: white;
        position: relative;
        font-size: 47px;
        font-weight: 700;
        mix-blend-mode: multiply; /* Pha trộn màu nền với hình ảnh */
    }
    .main-box{
        margin: auto;
        background: #f0f0f0;
        display: flex;
        justify-content: center;
        font-size: 20px;

    }
    .content{
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        background: white;
        max-width: 1440px;
        margin: 40px;
        padding: 60px;
        text-align: justify;
        font-size: 18px;
    }
    .img1{
        border-radius: 220px;
    }
    .img2{
        height: 375px;
        border-radius: 100px;
    }
    .div-title{
        font-size: 37px;
        font-weight: 700;
        border-bottom:1px solid ;
        margin-bottom: 40px;
        margin-top: 40px;
    }
    .box-info{
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        padding-top: 20px;
        font-size: 14px;
        font-weight: 400;
        text-align: center;
        margin: 40px auto;
    }
    .box-icon{
        justify-content: center;
        display: flex;
        gap: 310px;
        padding-top: 10px;
        height: 100px;
    }
    .box-icon i{
        font-size: 24px;
        margin-bottom: 20px;
    }
    .box-last{
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 400;
        font-size: 16px;
        color: #454545;
    }
    .box-last ul {
        list-style-type: disc; /* Kiểu dấu chấm */
        list-style-position: inside; /* Vị trí dấu chấm bên trong phần tử */
        color: #000; /* Màu chữ */
    }

    .box-last ul li {

    }

    .box-last ul li::marker {
        color: #e5a64e; /* Màu vàng cho dấu chấm */
        font-size: 12px;
    }
    .p-titlee{
        margin-left: 40px;
        font-size: 29px;
    }

    @media (max-width: 1024px) {
        .box-icon{
            gap: unset;
        }
        .content{
            max-width: 100%;
            margin: 0;
            padding: 10px;
        }
        .div-title{
            font-size: 27px;
        }
        .p-titlee{
            margin-left: 0px;
        }
        div.col-sm-6.pl-4{
            padding-left: 0px !important;
        }
        .img3{
            width: 100% !important;
            height: 129px !important;

        }
    }
    .img3{
        width: 100%;
        height: 474px;
        object-fit: cover;
    }

</style>
<div class="gb-container ">
    <p class="text-center">Chính Sách Giao Hàng</p>
</div>
<div class="main-box">
    <div class="row content bg-white ">
        <div class="col-sm-12  pl-0">
<!--            <p class="div-title">Chính Sách Bảo Mật cho Website https://traicay68.com/</p>-->
            <p><span class="font-weight-bolder">Notes: KP68 Fruit hỗ trợ tối đa không quá 30.000 VND phí giao hàng/ Đơn Hàng/ Địa Điểm.</p>
            <img class="img3" src="<?php echo get_template_directory_uri() ?>/images/giao-hang-toan-quoc-2.jpg" alt="">
            <p class="div-title">Giao Hàng TIÊU CHUẨN</p>
            <ul>
                <li>Thời gian đặt hàng: Đơn hàng đặt trước 14h: giao trong ngày; đơn hàng đặt sau 14h: giao trước 10h ngày kế tiếp</li>
                <li>Giao trong giờ hành chính (Thứ 2 – Thứ 7), từ 9:00AM đến 18:00PM</li>
                <li>Biểu phí giao hàng:</li>
            </ul>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Giá trị đơn hàng</th>
                        <th>Quận 1, 3, 4</th>
                        <th>
                            <p class="mb-0">Quận Phú Nhuận</p>
                            <p class="mb-0">Bình Thạnh, 2, 5, 7, 11</p>
                            <p class="mb-0">Tân Bình, Gò Vấp</p>
                        </th>
                        <th>Tân Phú</th>
                        <th>
                            <p>Quận 9, 6, Bình Tân</p>
                            <p>Thủ Đức</p>
                        </th>
                        <th>Quận Nhà Bè, Bình Chánh, Hóc Môn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Dưới 500.000đ</td>
                        <td>20.000đ</td>
                        <td>25.000đ – 30.000đ</td>
                        <td>30.000đ</td>
                        <td>35.000đ</td>
                        <td>40.000đ</td>
                    </tr>
                    <tr>
                        <td>Dưới 500.000đ</td>
                        <td>15.000đ</td>
                        <td>20.000đ – 25.000đ</td>
                        <td>25.000đ</td>
                        <td>30.000đ</td>
                        <td>35.000đ</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <ul>
                <li>Miễn phí giao hàng với đơn hàng có tổng giá trị trên 2.000.000 VND/ 1 địa điểm giao hàng. Với đơn hàng nhiều địa điểm giao, áp dụng tính phí giao hàng từ địa điểm số 2 trở đi.</li>
            </ul>
            <p><span class="font-weight-bolder">Giao Hàng SIÊU TỐC</p>
            <ul>
                <li>Áp dụng với đơn hàng cần giao ngay, theo lịch yêu cầu, ngoài giờ hành chính,</li>
                <li>Giao trong giờ hành chính (Thứ 2 – Thứ 7), từ 9:00AM đến 18:00PM</li>
                <li>Phí giao hàng áp dụng cho nhiều địa điểm: + 25.000 VND/ địa điểm tiếp theo</li>
                <li>Biểu phí giao hàng:</li>
            </ul>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Giá trị đơn hàng</th>
                        <th>Quận 1, 3, 4</th>
                        <th>
                            <p class="mb-0">Quận Phú Nhuận</p>
                            <p class="mb-0">Bình Thạnh, 2, 5, 7, 11</p>
                            <p class="mb-0">Tân Bình, Gò Vấp</p>
                        </th>
                        <th>Tân Phú</th>
                        <th>
                            <p>Quận 9, 6, Bình Tân</p>
                            <p>Thủ Đức</p>
                        </th>
                        <th>Quận Nhà Bè, Bình Chánh, Hóc Môn</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Dưới 500.000đ</td>
                        <td>	30.000đ</td>
                        <td>35.000đ – 40.000đ</td>
                        <td>40.000đ</td>
                        <td>45.000đ-65.000đ</td>
                        <td>50.000đ-75.000đ</td>
                    </tr>
                    <tr>
                        <td>Dưới 500.000đ</td>
                        <td>	25.000đ</td>
                        <td>25.000đ – 35.000đ</td>
                        <td>30.000đ</td>
                        <td>	40.000đ-60.000đ</td>
                        <td>45.000đ-70.000đ</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <ul>
                <li>Miễn phí giao hàng với đơn hàng có tổng giá trị trên 3.000.000 VND/ 1 địa điểm giao hàng. Với đơn hàng nhiều địa điểm giao, áp dụng tính phí giao hàng từ địa điểm số 2 trở đi.</li>
            </ul>

            <p><span class="font-weight-bolder">Địa điểm giao hàng: </span> KP68 Fruit chỉ giao hàng dưới chân tòa nhà văn phòng, chung cư. Yêu cầu giao hàng tận tay vui lòng liên hệ nhân viên tư vấn để được hỗ trợ.</p>
            <p><span class="font-weight-bolder">Gói Giao Hàng Miễn Phí: </span> Áp dụng với tất cả nhóm khách hàng Miễn phí giao hàng với tất cả đơn hàng theo phương thức giao hàng tiêu chuẩn. Phí áp dụng: 499.000 VND/ năm.</p>
            <p><span class="font-weight-bolder">Giao hàng với Subcription: </span> tính theo phí giao hàng tiêu chuẩn.</p>
            <p><span class="font-weight-bolder">Phí giao hàng với đơn hàng Toàn Quốc:  </span> Phí cố định: 30.000 VND/ đơn hàng</p>
            <p>Chỉ áp dụng với các sản phẩm trái cây sấy khô, hạt dinh dưỡng (không bảo quản mát, đông lạnh)</p>
            <p><span class="font-weight-bolder">Phí giao hàng với sản phẩm dễ hư hỏng: </span> một số sản phẩm dễ hư hỏng sẽ yêu cầu bảo quản nhất định trong quá trình di chuyển để để đảm bảo chất lượng tốt nhất. Sản phẩm này bắt buộc giao hàng với gói dịch vụ giao hàng siêu tốc.</p>



        </div>
    </div>

</div>

<?php
get_footer();
?>


