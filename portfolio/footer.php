<!-- ページトップへ戻る -->
<div id="js-to-top"></div>
<!-- パンくずリスト -->
<?php get_template_part('template-parts/breadcrumb'); ?>
</main>

<footer>
    <h1><a href="<?php echo home_url(); ?>">Title<span><?php bloginfo('description'); ?></span></a></h1>
    <?php
    $args = [
        'menu' => 'footer-nav',
        'menu_class' => 'footer_list',
        'menu_id' => '',
        'container' => 'false',
        'container_class' => '',
        'container_id' => '',
    ];
    wp_nav_menu($args);
    ?>
    <p class="recaptcha">
        <small>このサイトはreCAPTCHAによって保護されており、Google
            <a href="https://policies.google.com/privacy">プライバシーポリシー</a> と
            <a href="https://policies.google.com/terms">利用規約</a> が適用されます。
        </small>
        <small>This site is protected by reCAPTCHA and the Google
            <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
        </small>
    </p>
    <p class="copyright">
        <small>Copyright &copy; 会社名, inc. All Rights Reserved.</small>
    </p>
</footer>

<script>
    // slick
    $(".slide_list").slick({
        centerMode: true,
        centerPadding: "100px",
        slidesToShow: 3,
        autoplay: true,
        arrows: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "40px",
                    slidesToShow: 3,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: "70px",
                    slidesToShow: 1,
                },
            },
        ],
    });
</script>

<?php wp_footer(); ?>
</body>

</html>