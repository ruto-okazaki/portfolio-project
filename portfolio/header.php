<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="
        私のポートフォリオに興味をお持ちいただき、ありがとうございます。
        このページには、これまで私が取り組んできたことを詰め込んでおりますので、ぜひご覧ください。
        実際にいくつかのご依頼を受けてお仕事をさせていただいた実績もあり、それらの作品は「WORKS」ページにまとめております。よろしければ、ぜひご覧ください。
        また、お問い合わせフォームもご用意しておりますので、ご興味をお持ちいただけましたら、お気軽にご連絡ください。
    ">
    <meta property="og:url" content="https://route-site.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Ruto&nbsp;Okazaki&nbsp;Portfolio" />
    <meta property="og:description" content="Ruto&nbsp;Okazaki&nbsp;Portfolio" />
    <meta property="og:site_name" content="Ruto&nbsp;Okazaki&nbsp;Portfolio" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/icon_logo.png" />
    <link rel="canonical" href="https://route-site.com/">
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
    $contact_pages = ['contact', 'contact/confirm', 'contact/confirm/thanks'];
    if (is_page($contact_pages)) {
        return basename(get_permalink());
    }
    if (is_singular('works')) {
        return 'detail';
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
        <div class="heading inner">
            <?php if (is_front_page()) : ?>
                <h2 class="heading_ttl site-name">Ruto Okazaki</h2>
                <p class="heading_txt">
                    岡崎 流宇斗のポートフォリオサイト
                </p>
                <p>
                    <a href="<?php echo home_url('works'); ?>">制作実績</a>・<a href="#skills">スキル</a>・<a href="#profile">自己紹介</a>などを掲載しております。<br>
                    また、<a href="<?php echo home_url('contact'); ?>">お問い合わせ</a>フォームもご用意しておりますので、<br class="sp-only">どうぞお気軽にお問い合わせください。
                </p>

            <?php elseif (is_post_type_archive('works')) : ?>
                <h2 class="heading_ttl">Works</h2>
                <p class="heading_txt">
                    「VIEW ALL」からは、制作の経緯やこだわり、期間など、より詳細な情報をご覧いただけます。<br>
                    ぜひご参考にしていただけると幸いです。<br>
                    また、サムネイル画像をクリックすると、各サイトの詳細ページへアクセスできます。
                </p>

            <?php elseif (is_singular('works')) : ?>
                <h2 class="heading_ttl"><?php the_title(); ?></h2>
                <p class="heading_txt">
                    <?php
                    $url = get_field('url');
                    ?>
                    <?php if ($url) : ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank" class="link">
                            <?php echo esc_html($url); ?>
                        </a>
                    <?php endif; ?>
                </p>

            <?php elseif (is_page(['contact', 'contact/confirm', 'contact/confirm/thanks'])) : ?>
                <?php if (is_page('contact')) : ?>
                    <h2 class="heading_ttl">Contact</h2>
                    <p class="heading_txt">
                        お問い合わせは随時受け付けております。<br>
                        こちらからお気軽にお問い合わせください。<br>
                        通常、翌日までにご入力いただいたメールアドレス宛にご返信いたします。<br>
                        その後のやり取りについては、お客様のご希望に応じて柔軟に対応させていただきます。
                    </p>
                <?php elseif (is_page('contact/confirm')) : ?>
                    <h2 class="heading_ttl">Check</h2>
                    <p class="heading_txt">
                        こちらは確認画面です。<br>
                        お問い合わせの送信はまだ完了しておりません。<br>
                        以下の内容をご確認いただき、問題がなければ「送信」をクリックしてください。<br>
                        お問い合わせ完了後、すぐに自動返信メールをお送りいたしますので、そちらで内容をご確認ください。
                    </p>
                <?php else : ?>
                    <h2 class="heading_ttl">Thanks!</h2>
                    <div class="heading_txt">
                        お問い合わせいただき、誠にありがとうございます。<br>
                        ご入力いただいた内容は無事に送信されました。<br>
                        また、ご入力いただいたメールアドレス宛に自動返信メールをお送りしておりますので、詳細をご確認ください。<br>
                        こちらからは内容を確認のうえ、通常、翌日までにご返信いたします。<br>
                        改めて、この度はお問い合わせいただきありがとうございました。
                    </div>
                <?php endif; ?>

            <?php elseif (is_404()) : ?>
                <h2 class="heading_ttl">404 <small>NOT FOUND</small></h2>
                <p class="heading_txt">
                    お探しのページが見つかりませんでした。<br>
                    申し訳ございませんが、以下のボタンより、<br class="sp-only">TOPへお戻りください。
                </p>
            <?php endif; ?>
        </div>