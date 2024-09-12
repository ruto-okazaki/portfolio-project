<!-- デフォルトの投稿タイプ -->
<?php
// Template Name: お知らせ
get_header();
?>

<section class="news inner" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">News</h2>
    </div>
    <?php if (have_posts()) : ?>
        <ul class="news_list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="news_list_item">
                    <a href="<?php the_permalink(); ?>">
                        <p class="news_date"><?php the_date('Y.m.d'); ?></p>
                        <p class="news_content"><?php the_title(); ?></p>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>お知らせがありません。</p>
    <?php endif; ?>

    <!-- ページナビゲーション -->
    <?php if (function_exists('wp_pagenavi')) : ?>
        <div class="pagination">
            <?php wp_pagenavi(); ?>
        </div>
    <?php endif; ?>
</section>

<?php
get_footer();
?>