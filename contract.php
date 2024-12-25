<?php

/**
 * Template Name:  liên hệ - traicay68
 */
get_header();

$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
}

?>
<style>
    .main{
        margin-top: 40px ;
        justify-content: center;
    }
    .main .title{
        font-size: 20px;
        font-weight: bolder;
        margin: 20px 0px ;
    }
</style>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v21.0"></script>
<div class="container">
    <div class="row main">
        <div class="col-sm-6">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.77961088742!2d106.63792787454685!3d10.828170858238156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175297a7c08b539%3A0x95e34bd3ae5d5021!2zOTcgVHLhuqduIFRow6FuaCBUw7RuZywgUGjGsOG7nW5nIDE1LCBUw6JuIELDrG5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1735098567924!5m2!1svi!2s"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
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
        </div>
        <div class="col-sm-6 text-center">
            <img  src="<?php echo $logo_url ?>" alt="Logo" class="img-fluid">
            <p class="title">CÔNG TY TNHH XUẤT NHẬP KHẨU KP68</p>
            <p>Địa chỉ: 97 Trần Thánh Tông, P.15, Tân Bình, TP.HCM</p>
            <p>Hotline: 0816 896 999 - 0588 665 666</p>
            <p>Email: traicay68@gmail.com</p>

        </div>

    </div>
</div>
<script>
    function updateFbPageWidth() {
        const fbPage = document.getElementById('fb-page');
        const screenWidth = window.innerWidth;

        // Cập nhật giá trị data-width
        if (screenWidth <= 768) { // Độ rộng <= 768px là thiết bị di động
            fbPage.setAttribute('data-width', '300');
        } else {
            fbPage.setAttribute('data-width', '500');
        }

        // Tải lại plugin Facebook
        if (typeof FB !== 'undefined') {
            FB.XFBML.parse(); // Cập nhật hiển thị
        }
    }

    // Gọi hàm khi tải trang
    window.onload = updateFbPageWidth;

    // Gọi lại khi thay đổi kích thước màn hình
    window.onresize = updateFbPageWidth;
</script>


<?php
get_footer();
?>

