<?php
// Template Name: 制作実績一覧
get_header();
?>

<section class="gallery inner">
    <?php
    // 現在のページ番号を取得
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'works',
        'paged' => $paged
    );
    $works_query = new WP_Query($args);
    ?>
    <? if ($works_query->have_posts()) : ?>
        <ul class="gallery_list">
            <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
                <?php get_template_part('template-parts/loop', 'gallery'); ?>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>現在、公開されている制作実績はありません。</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <!-- ページネーション -->
    <?php if (function_exists('wp_pagenavi')) : ?>
        <div class="pagination">
            <?php wp_pagenavi(array('query' => $works_query)); ?>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>