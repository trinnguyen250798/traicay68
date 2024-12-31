<?php get_header(); ?>
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .page-title {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    .blog-posts article {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background: #f9f9f9;
    }

    .blog-posts .entry-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #0073aa;
    }

    .blog-posts .entry-title a {
        text-decoration: none;
    }

    .blog-posts .entry-title a:hover {
        text-decoration: underline;
    }

    .blog-posts .entry-meta {
        font-size: 0.9rem;
        color: #777;
        margin-bottom: 15px;
    }

    .blog-posts .entry-excerpt {
        font-size: 1rem;
        line-height: 1.6;
        color: #444;
        margin-bottom: 10px;
    }

    .read-more {
        display: inline-block;
        margin-top: 10px;
        font-size: 1rem;
        color: #fff;
        background: #0073aa;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
    }

    .read-more:hover {
        background: #005f8a;
    }

</style>
<div class="container">
    <h1 class="page-title">Tin tức</h1>
    <div class="blog-posts">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="entry-meta">
                        <span class="posted-on"><?php echo get_the_date(); ?></span>
                        <span class="author"> | Đăng bởi: <?php the_author(); ?></span>
                    </div>
                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="read-more">Đọc tiếp</a>
                </article>
            <?php endwhile;

            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('« Trước'),
                'next_text' => __('Tiếp »'),
            ));
        else :
            echo '<p>Không có bài viết nào.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
