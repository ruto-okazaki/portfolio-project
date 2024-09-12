<!-- 共通固定ページ -->
<?php
get_header();
// Template Name: 固定ページテンプレート
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section>
            <h2><?php the_title(); ?><?php echo strtoupper($post->post_name); ?></h2>
            <?php the_content(); ?>
        </section>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>