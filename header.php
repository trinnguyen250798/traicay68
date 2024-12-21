<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="site-header">
    <!-- Nội dung header bạn đã tạo -->
    <div class="container-fluid">
        <div class="d-flex">
            <?php if ( has_custom_logo() ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
                    <?php the_custom_logo(); ?>
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>

        </div>
    </div>
</header>

<?php
