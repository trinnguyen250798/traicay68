<?php

/**
 * Template Name:  cảm ơn - traicay68
 */
get_header();
?>
<style>
    .thank-you-page {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        background: url("<?php echo get_template_directory_uri() ?>/images/thankyou.png") no-repeat center center/cover;
        color: white;
    }
    .title{
        font-weight: 700;
        color: #0bdbff;
        font-size: 36px;
        font-family: ui-monospace;
    }
    .box-text{
        margin-top: 130px;
    }
</style>

<div class="thank-you-page">
    <div class="box-text">
        <p class="title">Cảm ơn bạn đã đặt hàng tại KP68</p>
        <p>Đơn hàng của bạn đã được xác nhận và đang trong quá trình xử lý.</p>
    </div>

</div>

<?php
get_footer();
?>

