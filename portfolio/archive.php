<!-- デフォルトの投稿タイプ -->
<?php
get_header();
// Template Name: アーカイブテンプレート
?>

<section class="inner archive" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">Archive</h2>
    </div>

    <?php if (have_posts()) : ?>
        <ul class="archive_list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="archive_list_item">
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p></p>
    <?php endif; ?>

    <?php if (function_exists('wp_pagenavi')) : ?>
        <div class="pagination">
            <?php wp_pagenavi(); ?>
        </div>
    <?php endif; ?>
</section>

<?php
get_footer();
?>