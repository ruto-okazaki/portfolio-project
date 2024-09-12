<!-- カスタム投稿タイプ -->
<?php
// Template Name: ギャラリー
get_header();
?>
<section class="gallery inner">
    <?php
    $args = array(
        'post_type' => 'gallery',
        'paged' => $paged
    );
    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : ?>
        <ul class="gallery_list">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <?php get_template_part('template-parts/loop', 'gallery'); ?>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>現在、公開されている制作実績はありません。</p>
    <?php endif;
    wp_reset_postdata(); ?>

    <?php if (function_exists('wp_pagenavi')) : ?>
        <div class="pagination">
            <?php wp_pagenavi(); ?>
        </div>
    <?php endif; ?>
</section>


<?php get_footer(); ?>