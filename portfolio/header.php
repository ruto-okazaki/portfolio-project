<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<?php
// ページ毎のクラス設定
function get_page_class()
{
    if (is_front_page()) {
        return 'top';
    }
    if (is_post_type_archive('works')) {
        return 'works';
    }
    // contactページとそのサブページ
    $contact_pages = ['contact', 'contact/confirm', 'contact/thanks'];
    if (is_page($contact_pages)) {
        return basename(get_permalink());
    }
    if (is_404()) {
        return '404';
    }
    return '';
}
// 変数にクラスを格納
$class = get_page_class();
?>

<body class="<?php echo 'page-' . $class; ?>">
    <?php wp_body_open(); ?>

    <div id="js-loading">
        <div class="spinner"></div>
    </div>

    <header>
        <h1>
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="">
                <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo01.svg" alt=""> -->
            </a>
        </h1>

        <?php
        $args = [
            'menu' => 'PC-MENU',
            'menu_class' => '',
            'menu_id' => '',
            'container' => 'nav',
            'container_class' => 'pc-nav pc-only',
            'container_id' => '',
        ];
        wp_nav_menu($args);
        ?>

        <!-- <form action="<?php echo home_url('/'); ?>" method="get" class="search">
            <input type="text" name="s" value="<?php the_search_query(); ?>" aria-label="Search">
        </form> -->

        <div class="sp-nav sp-only">
            <div id="js-sp-nav-btn" class="sp-nav_btn">
                <span></span>
            </div>
            <?php
            $args = [
                'menu' => 'SP-MENU',
                'menu_class' => 'sp-nav_container_list',
                'menu_id' => '',
                'container' => 'nav',
                'container_class' => 'sp-nav_container',
                'container_id' => 'js-sp-nav',
            ];
            wp_nav_menu($args);
            ?>
        </div>
    </header>
    <main>
        <!-- ページ毎のキャッチコピー -->
        <?php if (is_front_page()) : ?>
            <section class="hero">
                <?php
                $args = array(
                    'post_type' => 'hero',
                    // 'posts_per_page' => -1
                );
                $hero_query = new WP_Query($args);
                if ($hero_query->have_posts()) :
                    while ($hero_query->have_posts()) : $hero_query->the_post(); ?>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                        <div class="heading inner">
                            <?php the_title('<h2 class="heading_ttl">', '</h2>'); ?>
                            <p class="heading_txt">
                                岡崎 流宇斗のポートフォリオサイト<br>
                                <a href="<?php echo home_url('works'); ?>">制作実績</a>・<a href="#skills">スキル</a>・<a href="#profile">自己紹介</a>などを記載しております。<br>
                                また、<a href="<?php echo home_url('contact'); ?>">お問い合わせ</a>もご用意しておりますので、<br class="sp-only">お気軽にお問い合わせください。
                            </p>
                        </div>
                <?php endwhile;
                endif;
                wp_reset_postdata(); ?>
            </section>

        <?php elseif (is_post_type_archive('works')) : ?>
            <div class="heading">
                <h2 class="heading_ttl">Works</h2>
                <p class="heading_txt">
                    VIEW ALLより、制作の経緯や目的、期間などのより詳細な情報を記載しております。<br>
                    ご参考までに是非とも、ご覧いただけると幸いです。<br>
                    また、サムネイル画像からは、実際のサイトへアクセスできます。
                </p>
            </div>

        <?php elseif (is_singular('works')) : ?>
            <div class="heading">
                <h2 class="heading_ttl"><?php the_title(); ?></h2>
            </div>

        <?php elseif (is_page(['contact', 'contact/confirm', 'contact/thanks'])) : ?>
            <div class="heading">
                <?php if (is_page('contact')) : ?>
                    <h2 class="heading_ttl">Contact</h2>
                    <p class="heading_txt">
                        お問い合わせを随時、受け付けております。<br>
                        こちらからお問い合わせお願いします。
                    </p>
                <?php elseif (is_page('contact/confirm')) : ?>
                    <h2 class="heading_ttl">こちらはご確認画面になります</h2>
                    <p class="heading_txt">
                        お問い合せはまだ完了しておりません。<br>
                        以下の内容をご確認のうえ、送信をクリックしてください。
                    </p>
                <?php else : ?>
                    <h2 class="heading_ttl">Thanks!</h2>
                <?php endif; ?>
            </div>

        <?php elseif (is_404()) : ?>
            <div class="heading">
                <h2 class="heading_ttl">404 <small>NOT FOUND</small></h2>
                <p class="heading_txt">
                    お探しのページが見つかりませんでした。<br>
                    申し訳ございませんが、以下のボタンより、TOPへお戻りください。
                </p>
            </div>
        <?php endif; ?>