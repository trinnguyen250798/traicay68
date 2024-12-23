<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
}
?>

<header id="site-header" class="p-0">
    <!-- Nội dung header -->
    <div class="menu-popup-overlay">
        <div class="menu-popup " >
        <button onclick="close_menu()" class="close-menu">&times;</button>
            <ul class="menu-popup-list">
                <li class="item-menu-top">
                    <a href="">Bán Chạy</a>
                </li>
                <li class="item-menu-top">
                    <a href="">Trái Cây nhập Khẩu</a>
                </li>
                <li class="item-menu-top">
                    <a href="">Trái cây khô</a>
                </li>
                <li class="item-menu-top">
                    <a href="">Giới thiệu</a>
                </li>
                <li class="item-menu-top">
                    <a href="">Khuyến mãi </a>
                </li>
            </ul>
           
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row align-items-center box-header ">
            <div class="col-sm-3 box-icon-left">
                <div class="d-flex justify-content-start ">
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=61570453135657">   <i class='bx bxl-facebook'></i></a>
                    <a target="_blank" href="https://www.youtube.com/@FruitKP68"><i class='bx bxl-youtube'></i></a>
                    <a target="_blank" href="#"><i class='bx bxl-tiktok'></i></a>
                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="d-flex box-top-main  align-items-center">
                    <a class="icon_mb_menu " href="javascript:void(0)" onclick="open_menu()"><i class='bx bx-menu'></i></a>
                    <a href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo $logo_url ?>" alt=""></a>
                    <a class="icon_mb_menu " href="javascript:void(0)"><i class="bx bx-shopping-bag"></i></a>
                </div>
            </div>
            <div class="col-sm-3 box-icon-right">
                <div class="d-flex justify-content-end ">
                    <i class='bx bx-user' ></i>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-heart' ></i>
                    <i class='bx bx-shopping-bag'></i>
                </div>
            </div>
        </div>
        <ul class="menu-top">
            <li class="item-menu-top">
                <a href="">Bán Chạy</a>
            </li>
            <li class="item-menu-top">
                <a href="">Trái Cây nhập Khẩu</a>
            </li>
            <li class="item-menu-top">
                <a href="">Trái cây khô</a>
            </li>
            <li class="item-menu-top">
                <a href="">Giới thiệu</a>
            </li>
            <li class="item-menu-top">
                <a href="">Khuyến mãi </a>
            </li>
        </ul>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var header = $('#site-header');
    var stickyPoint = header.offset().top; // Điểm cố định khi header bắt đầu cố định
    $(window).scroll(function() {
        if ($(window).scrollTop() >= stickyPoint) {
            header.addClass('header-top'); // Thêm class khi cuộn đến điểm sticky
        }
    });
    const open_menu = () => {
        $('.menu-popup-overlay').fadeIn();
    }
    const close_menu = () => {
        $('.menu-popup-overlay').fadeOut();
    }
</script>
<?php wp_footer(); ?>
</body>
</html>
