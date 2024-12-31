
<?php

/**
 * Template Name: Chính sách bảo mật - traicay68
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

    }

</style>
<div class="gb-container ">
    <p class="text-center">Chính sách bảo mật</p>
</div>
<div class="main-box">
    <div class="row content bg-white ">
        <div class="col-sm-12  pl-0">
            <p class="div-title">Chính Sách Bảo Mật cho Website https://traicay68.com/</p>
            <p><span class="font-weight-bolder">Giới Thiệu</p>
            <p>Trang web https://traicay68.com/ cam kết bảo vệ sự riêng tư và bảo mật thông tin cá nhân của khách hàng. Chính sách bảo mật này mô tả cách chúng tôi thu thập, sử dụng và bảo vệ thông tin cá nhân của bạn khi truy cập và sử dụng trang web.</p>
            <p><span class="font-weight-bolder">Thu Thập Thông Tin Cá Nhân</p>
            <p>Chúng tôi thu thập thông tin cá nhân của khách hàng khi bạn đăng ký tài khoản, đặt hàng, hoặc liên hệ với chúng tôi qua trang web. Các thông tin có thể bao gồm nhưng không giới hạn: Họ tên,  Địa chỉ email, Số điện thoại, Địa chỉ giao hàng, Thông tin thanh toán</p>
            <p><span class="font-weight-bolder">Mục Đích Sử Dụng Thông Tin</p>
            <p>Thông tin cá nhân mà chúng tôi thu thập sẽ được sử dụng cho các mục đích sau:</p>
            <p class="mb-0 pl-4">Xử lý và quản lý đơn hàng của bạn.</p>
            <p class="mb-0 pl-4">Cung cấp dịch vụ khách hàng và hỗ trợ sau bán hàng.</p>
            <p class="mb-0 pl-4">Cải thiện chất lượng dịch vụ và sản phẩm.</p>
            <p class="mb-0 pl-4">Gửi thông tin về các chương trình khuyến mãi, ưu đãi đặc biệt (nếu bạn đồng ý nhận).</p>
            <p><span class="font-weight-bolder">Bảo Mật Thông Tin</p>
            <p>Chúng tôi áp dụng các biện pháp bảo mật nghiêm ngặt để bảo vệ thông tin cá nhân của bạn khỏi mất mát, truy cập trái phép, tiết lộ hoặc sửa đổi. Các thông tin nhạy cảm như chi tiết thanh toán được mã hóa và bảo mật theo tiêu chuẩn công nghiệp.</p>
            <p><span class="font-weight-bolder">Chia Sẻ Thông Tin</p>
            <p>Chúng tôi không bán, trao đổi hoặc chia sẻ thông tin cá nhân của khách hàng với bên thứ ba mà không có sự đồng ý của bạn, trừ khi cần thiết để thực hiện các dịch vụ liên quan đến việc xử lý đơn hàng (ví dụ: dịch vụ vận chuyển, thanh toán).</p>
            <p><span class="font-weight-bolder">Quyền Của Khách Hàng</p>
            <p>Bạn có quyền yêu cầu truy cập, chỉnh sửa hoặc xóa thông tin cá nhân của mình bất kỳ lúc nào bằng cách liên hệ với chúng tôi qua thông tin liên lạc trên trang web. Chúng tôi sẽ xử lý yêu cầu của bạn trong thời gian sớm nhất có thể.</p>
            <p><span class="font-weight-bolder">Thay Đổi Chính Sách Bảo Mật</p>
            <p>Chúng tôi có thể cập nhật chính sách bảo mật này bất kỳ lúc nào. Mọi thay đổi sẽ được thông báo trên trang web, và bạn nên kiểm tra chính sách này định kỳ để nắm bắt những thay đổi mới nhất.</p>
            <p><span class="font-weight-bolder">Liên Hệ</p>
            <p>Nếu bạn có bất kỳ câu hỏi hoặc thắc mắc nào liên quan đến chính sách bảo mật, xin vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại được cung cấp trên trang web https://traicay68.com/.</p>
            <p>Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi!</p>
        </div>
    </div>

</div>
<?php
get_footer();
?>


