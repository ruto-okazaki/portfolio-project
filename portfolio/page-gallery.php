<?php
// Template Name: ギャラリー
get_header();
?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section>
            <h2><?php the_title(); ?><?php echo strtoupper($post->post_name); ?></h2>
            <?php the_content(); ?>
        </section>
<?php endwhile;
endif; ?>
<?php
get_footer();
?>