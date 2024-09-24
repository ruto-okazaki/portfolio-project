<?php
// Template Name: お問い合わせ
get_header();
?>

<section class="inner contact" id="js-contents">
    <div class="contact_container">
        <?php if (is_page('contact/confirm/thanks')) : ?>
            <div class="contact_submit">
                <a href="<?php echo home_url('/'); ?>">TOPへ</a>
            </div>
        <?php else: ?>
            <?php the_content(); ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>