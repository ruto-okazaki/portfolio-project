<?php
// Template Name: お問い合わせ
get_header();
?>

<!-- <section class="contact ja width">
    <div class="contact_img">
        <img src="<?php echo get_template_directory_uri(); ?>/img/Man holding iPhone X.png" alt="">
    </div>
    <div class="contact_form">
        <h2>3営業日以内に<span class="br"></span>ご返信いたします</h2>
        <p>※こちらでいただいたご連絡先へのご返信以外の営業等は一切いたしません。
            <br>ご安心ください。
            <br>その後のやりとりはお客様のご希望によって柔軟に対応させていただきます。
        </p>
        
        <p>※お問い合わせ完了後、すぐに自動返信メールをお送りいたします。
            <br>メールが届きましたら、お問い合わせが正常に送信されております。
            <br>ご安心ください。
        </p>
    </div>

</section> -->

<section class="inner contact" id="js-contents">
    <div class="contact_container">
        <?php the_content(); ?>

        <?php if (is_page('contact/thanks')) : ?>
            <div class="contact_submit">
                <a href="<?php echo home_url('/'); ?>">TOPへ</a>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php
get_footer();
?>