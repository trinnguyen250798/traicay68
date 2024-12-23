<?php
/**
 * Template Name: template info - traicay68
 */
get_header(); // Gọi header
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <h1><?php the_title(); ?></h1>
        <div>
            <?php the_content(); ?>
        </div>
    <?php
    endwhile;
endif;
get_footer(); // Gọi footer
?>
