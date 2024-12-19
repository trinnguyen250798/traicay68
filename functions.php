<?php
function enqueue_bootstrap_slick_and_boxicons() {


    // Enqueue Bootstrap CSS và JS
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Enqueue Slick Carousel CSS và JS
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array('jquery'), null, true);

    // Enqueue BoxIcons CSS
    wp_enqueue_style('boxicons-css', 'https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css');

    // Enqueue Font Awesome CSS
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

    // Enqueue jQuery
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_slick_and_boxicons');



