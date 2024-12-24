<?php

/**
 * Template Name:  giới thiệu - traicay68
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
    <p class="text-center">Trái cây tươi nhập khẩu KP68 Fruit</p>
</div>
<div class="main-box">
    <div class="row content bg-white ">
        <div class="col-sm-6  align-content-center">
            <p><span class="font-weight-bolder">CÔNG TY TNHH XUẤT NHẬP KHẨU KP68:</span> Đơn Vị Hàng Đầu Trong Lĩnh Vực Nhập Khẩu và Kinh Doanh Trái Cây Cao Cấp Tại TP.HCM</p>
            <p>
                <span class="font-weight-bolder">KP68 Fruit </span>  là một trong những đơn vị hàng đầu tại TP.HCM chuyên về nhập khẩu và phân phối các loại trái cây cao cấp. Với uy tín và chất lượng đã được khẳng định, KP68 đã và đang trở thành điểm đến tin cậy của nhiều khách hàng khi tìm kiếm các sản phẩm
                <a href="">trái cây tươi nhập khẩu.</a>
            </p>
        </div>
        <div class="col-sm-6 ">
            <img src="<?php echo get_template_directory_uri() ?>/images/about/68fruit.jpg" class="w-100 img1">
            <p class="text-center mt-2" style="font-size: 12px">Cửa hàng KP68 Fruit</p>
        </div>
        <div class="col-sm-12  pl-0 div-title">
            Sản Phẩm Kinh Doanh
        </div>
        <div class="col-sm-6">
            <p><span class="font-weight-bolder">Công ty KP68</span> chuyên cung cấp các sản phẩm trái cây nhập khẩu từ nhiều quốc gia nổi tiếng về nông sản như Mỹ, New Zealand, Úc, và Nhật Bản. Các sản phẩm chủ lực của công ty bao gồm:</p>
            <img src="<?php echo get_template_directory_uri() ?>/images/about/img2.jpg" class="w-100 img2">
            <p class="text-center mt-2" style="font-size: 12px">KP68 Fruit</p>
        </div>
        <div class="col-sm-6 d-flex justify-content-center align-items-center">
            <ol>
                <li class="mb-3"><span class="font-weight-bolder">Dưa Lưới:</span> Dưa lưới nhập khẩu với hương vị ngọt ngào, thơm mát, và đầy đủ dinh dưỡng, phù hợp cho mọi đối tượng sử dụng.</li>
                <li class="mb-3"><span class="font-weight-bolder">Táo Envy:</span> Táo Envy từ New Zealand với vị giòn ngọt, mọng nước, là loại trái cây được nhiều người tiêu dùng ưa chuộng nhờ chất lượng vượt trội.</li>
                <li class="mb-3"><span class="font-weight-bolder">Kiwi:</span> Kiwi nhập khẩu từ New Zealand và Úc với hương vị chua ngọt, giàu vitamin C và chất xơ, rất tốt cho sức khỏe.</li>
                <li class="mb-3"><span class="font-weight-bolder">Quýt:</span> Quýt Úc với hương vị thơm ngon, giàu vitamin C và các khoáng chất cần thiết, giúp tăng cường sức đề kháng.</li>
                <li class="mb-3"><span class="font-weight-bolder">Lê:</span>  Lê Hàn Quốc và Nhật Bản với vị ngọt mát, mọng nước, là loại trái cây thích hợp để giải khát và bổ sung dinh dưỡng.</li>
                <li class="mb-3"><span class="font-weight-bolder">Cherry:</span> Cherry Mỹ và Cherry Úc với hương vị ngọt ngào, giàu chất chống oxy hóa, giúp tăng cường sức khỏe và sắc đẹp.</li>
            </ol>
        </div>
        <div class="col-sm-6  pl-0" >
            <p class="div-title"> Hình Thức Kinh Doanh</p>
            <p><span class="font-weight-bolder">Công ty KP68</span> không chỉ kinh doanh bán lẻ mà còn là đơn vị uy tín trong việc phân phối bán đại lý (hàng xách tay) cho các đối tác trong và ngoài thành phố. Các sản phẩm của KP68 luôn đảm bảo nguồn gốc xuất xứ rõ ràng, chất lượng đạt chuẩn, đáp ứng đầy đủ các yêu cầu về an toàn vệ sinh thực phẩm.</p>
            <img src="<?php echo get_template_directory_uri() ?>/images/about/img3.jpg" class="w-100 ">
        </div>
        <div class="col-sm-6  pl-4 ">
            <p class="div-title">   Uy Tín và Chất Lượng</p>
            <p>Với phương châm “Chất Lượng Là Danh Dự”, <span class="font-weight-bolder">Trái cây 68</span> luôn nỗ lực không ngừng để mang đến cho khách hàng những sản phẩm tốt nhất. Công ty cam kết chỉ cung cấp những loại trái cây tươi ngon, được bảo quản và vận chuyển bằng công nghệ hiện đại, đảm bảo giữ nguyên hương vị và giá trị dinh dưỡng.</p>
                <img src="<?php echo get_template_directory_uri() ?>/images/about/img4.webp" class="w-100 ">
        </div>
        <div class="col-sm-12  pl-0">
            <p class="div-title"> Khách Hàng và Đối Tác</p>
            <p><span class="font-weight-bolder">KP68 Fruit </span> tự hào là đối tác tin cậy của nhiều chuỗi cửa hàng, siêu thị, và nhà hàng lớn tại TP.HCM. Đồng thời, công ty cũng nhận được sự tin tưởng và ủng hộ của đông đảo người tiêu dùng nhờ vào chất lượng sản phẩm và dịch vụ chuyên nghiệp.</p>
            <p><span class="font-weight-bolder">KP68 Fruit với uy tín và chất lượng </span> đã được khẳng định, là lựa chọn hàng đầu của người tiêu dùng khi tìm kiếm các sản phẩm trái cây nhập khẩu cao cấp tại TP.HCM. Với sự đa dạng về sản phẩm, hình thức kinh doanh linh hoạt và cam kết chất lượng, KP68 Fruit sẽ tiếp tục phát triển và khẳng định vị thế của mình trên thị trường.</p>
        </div>
        <div class="col-sm-12 box-info pl-0">
            <div class="box-icon">
                <div >
                    <i class="bx bxs-package bx-tada"></i>
                    <p>GIAO HÀNG TẬN NƠI</p>
                </div>
                <div >
                    <i class='bx bxs-discount bx-tada' ></i>
                    <p>ƯU ĐÃI HẤP DẪN HÀNG NGÀY</p>
                </div>
                <div >
                    <i class='bx bx-support bx-tada'></i>
                    <p>HỖ TRỢ 24/7</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-6 align-self-center box-last pl-0" >
            <p class="text-center p-titlee">KP68 FRUIT HỒ CHÍ MINH</p>
            <div class="d-flex " >
                <ul >
                    <li>Địa chỉ 97 trần thánh tông - Tân Bình - HCM</li>
                    <li>Hotline 0816 896 999  -  0588 665 666</li>
                    <p class="mt-4">Bên cạnh đó , KP68 Fruit còn cung cấp thêm :</p>
                    <li>Giỏ Quà Trái Cây Nhập Khẩu – Món quà tươi ngon, ý nghĩa cho mọi dịp!</li>
                    <li>Chúc mừng: khai trương, sinh nhật,…</li>
                    <li>Biếu tặng: khách hàng, đối tác, người thân,…</li>
                    <li>Thăm bệnh, hỏi thăm sức khỏe</li>
                    <li>Chia buồn, viếng đám tang</li>
                    <li>Dâng hương: chùa, đền, tổ nghề,…</li>
                    <li>Cúng kiếng: giỗ tổ nghề, đám giỗ,…!</li>
                    <li>Các dịp lễ lớn khác: quốc tế Phụ Nữ, ngày Nhà giáo Việt Nam, lễ tình nhân,… </li>
                    <p class="mt-4">Với trái cây nhập khẩu tươi ngon từ khắp nơi trên thế giới, mỗi giỏ quà là sự kết hợp hoàn hảo của hương vị và chất lượng. Đặt ngay để gửi tặng người thân, bạn bè hoặc đối tác những món quà đầy sức khỏe và sự sang trọng!"</p>
                </ul>
            </div>

        </div>
    </div>

</div>

<?php
get_footer();
?>
