<!-- 検索ページ -->
<?php
// Template Name: 検索ページテンプレート
get_header();
?>
<h1>検索結果</h1>
<section class="search">
    <?php if (have_posts()) : ?>
        <div class="search__result">
            <p><i class="fas fa-search"></i>検索ワード「<?php the_search_query(); ?>」</p>
        </div>
        <div class="search__list">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/loop', 'news'); ?>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <div class="search__result">
            <p>検索結果はありませんでした。</p>
        </div>
    <?php endif; ?>
    <?php if (function_exists('wp_pagenavi')) : ?>
        <div class="pagination">
            <?php wp_pagenavi(); ?>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>