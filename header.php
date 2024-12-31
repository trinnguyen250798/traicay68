<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Đình Trí">
    <meta name="description" content="KP68 Fruit là một trong những công ty hàng đầu trong lĩnh vực cung cấp sỉ và lẻ Trái Cây Tươi tại Thành phố Hồ Chí Minh.">
    <meta name="keywords" content="KP68 Fruit, traicay68, Trái cây nhập khẩu">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="KP68 Fruit - Trái cây nhập khẩu">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KP68 Fruit - Trái cây nhập khẩu</title>
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="KP68 Fruit là một trong những công ty hàng đầu trong lĩnh vực cung cấp sỉ và lẻ Trái Cây Tươi tại Thành phố Hồ Chí Minh. Chúng tôi có thế mạnh về bán lẻ với" />
    <meta property="og:url" content="https://traicay68.com/" />
    <meta property="og:site_name" content="Trái Cây 68" />
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



    <link href='<?php echo get_template_directory_uri() ?>/css/style.css' rel='stylesheet'>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
$custom_logo_id = get_theme_mod('custom_logo');
if ($custom_logo_id) {
    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
}

global $post;
if (isset($post)) {
    $current_slug = $post->post_name; // Lấy slug hiện tại
}

?>


<header id="site-header" class="p-0 border-bottom bg-white">
    <!-- Nội dung header -->
    <div class="menu-popup-overlay">
        <div class="menu-popup " >
        <button onclick="close_menu()" class="close-menu">&times;</button>
            <ul class="menu-popup-list">
                <li class="item-menu-top">
                    <a href="<?php echo home_url('/ban-chay'); ?>">Bán Chạy</a>
                </li>
                <li class="item-menu-top">
                    <a href="<?php echo home_url('/trai-cay-nhap-khau') ?>">Trái Cây nhập Khẩu</a>
                </li>
                <li class="item-menu-top">
                    <a href="<?php echo home_url('/trai-cay-tuoi-nhap-khau-kp68-fruit') ?>">Giới thiệu</a>
                </li>
                <li class="item-menu-top">
                    <a href="<?php echo home_url('/khuyen-mai') ?>">Khuyến mãi </a>
                </li>
                <li class="item-menu-top">
                    <a href="<?php echo home_url('/lien-he') ?>">liên hệ</a>
                </li>
            </ul>
           
        </div>
    </div>
    <div class="cart-popup-overlay"></div>
    <div class="cart-popup">
        <button onclick="close_cart()" class="close-menu">&times;</button>
        <p class="mt-2">Giỏ hàng</p>
        <hr>
        <div class="content-cart"></div>
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
                    <a class="icon_mb_menu " onclick="open_cart()" href="javascript:void(0)"><i class="bx bx-shopping-bag"></i></a>
                </div>
            </div>
            <div class="col-sm-3 box-icon-right">
                <div class="d-flex justify-content-end ">
<!--                    <i class='bx bx-user' ></i>-->
<!--                    <i class='bx bx-search' ></i>-->
<!--                    <i class='bx bx-heart' ></i>-->
                    <a href="javascript:void(0)" onclick="open_cart()"> <i class='bx bx-shopping-bag'></i></a>

                </div>
            </div>
        </div>

        <ul class="menu-top">
            <li class="item-menu-top <?php echo $current_slug=='ban-chay'?'active':'' ?>">
                <a href="<?php echo home_url('/ban-chay'); ?>">Bán Chạy</a>
            </li>
            <li class="item-menu-top <?php echo $current_slug=='trai-cay-nhap-khau'?'active':'' ?>">
                <a href="<?php echo home_url('/trai-cay-nhap-khau') ?>">Trái Cây nhập Khẩu</a>
            </li>
            <li class="item-menu-top <?php echo $current_slug=='trai-cay-tuoi-nhap-khau-kp68-fruit'?'active':'' ?>">
                <a href="<?php echo home_url('/trai-cay-tuoi-nhap-khau-kp68-fruit') ?>">Giới thiệu</a>
            </li>
            <li class="item-menu-top <?php echo $current_slug=='khuyen-mai'?'active':'' ?>">
                <a href="<?php echo home_url('/khuyen-mai') ?>">Khuyến mãi </a>
            </li>
            <li class="item-menu-top <?php echo $current_slug=='lien-he'?'active':'' ?>">
                <a href="<?php echo home_url('/lien-he') ?>">liên hệ</a>
            </li>
        </ul>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var header = $('#site-header');

    $(window).scroll(function() {

        var stickyPoint = 2; // Điểm sticky của header

        if ($(window).scrollTop() >= stickyPoint) {
            header.addClass('header-top'); // Thêm class khi cuộn đến điểm sticky
        } else {
            // Thêm một hiệu ứng mượt mà khi xóa lớp
            header.css('transition', 'all 0.3s ease-in-out');
            header.removeClass('header-top'); // Xóa class khi cuộn về đầu trang
        }
    });

    const open_menu = () => {
        $('.menu-popup-overlay').fadeIn();
    }
    const close_menu = () => {
        $('.menu-popup-overlay').fadeOut();
    }
    function open_cart() {
        $(`.content-cart`).html(`<div class="d-flex justify-content-center"><i class='bx bx-loader-alt bx-spin bx-flip-horizontal' ></i></div>`)
        $('.cart-popup-overlay').fadeIn();
        $('.cart-popup').addClass('open top');
        $.ajax({
            url: wc_add_to_cart_params.ajax_url, // URL của WooCommerce AJAX
            type: 'POST',
            data: {
                action: 'get_cart',
            },
            success: function(response) {
                $(`.content-cart`).html(response)
            }
        });

    }

    // Đóng popup cart
    function close_cart() {
        $('.cart-popup-overlay').fadeOut();
        $('.cart-popup').removeClass('open top');
    }
    $(document).on('click', '.cart-popup-overlay', function() {
        close_cart();
    });
    const remove_item_cart = (cart_item_key) => {
        $(`.content-cart`).html(`<div class="d-flex justify-content-center"><i class='bx bx-loader-alt bx-spin bx-flip-horizontal' ></i></div>`)
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
                    open_cart();
                    if (response.data == 1){
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Xóa thành công',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }else{
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Xóa thất bại',
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
<?php wp_footer(); ?>

