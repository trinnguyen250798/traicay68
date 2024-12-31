<?php get_header(); ?>
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .entry-header {
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .entry-title {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .entry-meta {
        font-size: 0.9rem;
        color: #777;
        margin-bottom: 15px;
    }

    .entry-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #444;
        margin-bottom: 20px;
    }

    .entry-footer {
        font-size: 0.9rem;
        color: #555;
    }

    .post-tags, .post-categories {
        margin-top: 15px;
        font-size: 0.9rem;
    }

    .post-tags a, .post-categories a {
        color: #0073aa;
        text-decoration: none;
    }

    .post-tags a:hover, .post-categories a:hover {
        text-decoration: underline;
    }

</style>
<div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="entry-meta">
                <span class="posted-on"><?php echo get_the_date(); ?></span>
                <span class="author"> | Đăng bởi: <?php the_author(); ?></span>
            </div>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>

        <footer class="entry-footer">
            <div class="post-tags">
                <?php the_tags('Tags: ', ', ', '<br />'); ?>
            </div>
            <div class="post-categories">
                <?php _e('Danh mục: '); the_category(', '); ?>
            </div>
        </footer>
    </article>
</div>

<?php get_footer(); ?>
