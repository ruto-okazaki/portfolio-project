<?php get_header();
/* Template Name: トップページ */
?>

<section class="hero">
    <?php $args = array(
        'post_type' => 'hero',
        'posts_per_page' => -1 //表示件数
    );
    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/dummy.png" alt="">
            <?php endif; ?>
            <div class="heading">
                <?php the_title('<h2 class="heading_ttl">', '</h2>'); ?>
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <div class="to-main js-to-main"></div>
</section>

<section class="works slide" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">Works</h2>
    </div>
    <div class="scrollHint"></div>
    <ul class="slider">
        <!-- サブクエリ -->
        <?php $args = array(
            'post_type' => 'works', //カスタム投稿タイプ
            'posts_per_page' => 9 //表示件数
        );
        $the_query = new WP_Query($args);
        ?>
        <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="slider__img mask__wrap">
                    <a href="">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/dummy.png" alt="">
                        <?php endif; ?>
                        <div class="mask mask--scale">
                            <div class="ttl">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_content(); ?></p>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
<?php endif; ?>
<p class="btn btn-main">
    <a href="<?php echo bloginfo('works'); ?>">制作実績一覧</a>
</p>
</section>

<!-- メインクエリ -->
<!-- <section class="inner news" id="js-contents">
    <h2 id="1" class="title">News</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
    <ul>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="news__list">
                    <a href="<?php the_permalink(); ?>">
                        <?php $categories = get_the_category();
                        if ($categories) : ?>
                            <div class="category-label">
                                <?php foreach ($categories as $category) : ?>
                                    <span class="label"><?php echo $category->name; ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
                        <p><?php the_title(); ?></p>
                    </a>
                </li>
        <?php endwhile;
        endif ?>
    </ul>
    <p class="btn btn-main">
        <a href="<?php echo bloginfo('news'); ?>">最新情報</a>
    </p>
</section> -->

<!-- <section class="inner display" id="js-contents">
    <div class="heading">
        <h2 id="2" class="heading_ttl">Gallery</h2>
    </div>
    <ul class="category-switch inner">
        <li class="category-switch-btn active">Formal</li>
        <span>/</span>
        <li class="category-switch-btn"><span>Casual</span></li>
        <span>/</span>
        <li class="category-switch-btn"><span>All</span></li>
    </ul>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
    <?php $args = array(
        'post_type' => 'gallery', //カスタム投稿タイプ
        'posts_per_page' => 6 //表示件数
    );
    $the_query = new WP_Query($args);
    ?>
    <ul class="container gallery_list active">
        <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="container__box">
                    <div class="mask__wrap modal_open js-modal_open">
                        <?php the_post_thumbnail(); ?>
                        <div class="mask">
                            <div class="ttl ttl--mask">
                                <p>クリックで拡大</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal js-modal">
                        <?php the_post_thumbnail(); ?>
                        <div class="modal_close-btn js-modal_close-btn">×</div>
                    </div>
                    <div class="ttl">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo number_format(get_field('price')); ?>円</p>
                        <p><?php the_content(); ?></p>
                    </div>
                </li>
            <?php endwhile; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
<?php endif; ?>
<div class="modal_over-lay" id="js-modalOverlay"></div>

<p class="btn btn-main">
    <a href="<?php echo bloginfo('gallery'); ?>">商品一覧</a>
</p>
</section> -->

<section class="inner skill" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">Skills</h2>
        <p class="heading_txt">使用できる言語、ツールの一覧です。アイコンをクリックすると、その詳細をご確認いただけます。</p>
    </div>
    <!-- スキルカテゴリタブ切り替え -->
    <ul class="category-switch">
        <li class="category-switch-tab js-category-switch-tab active">
            <span>すべて</span>
        </li>
        <li class="category-switch-tab js-category-switch-tab">
            <span>言語</span>
        </li>
        <li class="category-switch-tab js-category-switch-tab">
            <span>ツール系</span>
        </li>
        <li class="category-switch-tab js-category-switch-tab">
            <span>デザイン系</span>
        </li>
        <li class="category-switch-tab js-category-switch-tab">
            <span>業務効率化</span>
        </li>
        <li class="category-switch-tab js-category-switch-tab">
            <span>学習中</span>
        </li>
        <li class="category-switch-tab js-category-switch-tab">
            <span>学習予定</span>
        </li>
        <li class="category-switch-tab js-category-switch-tab">
            <span>その他</span>
        </li>
    </ul>

    <!-- カテゴリ毎のスキル一覧 -->
    <!-- すべて -->
    <ul class="skill_btn_list js-list active inner">
        <li class="skill_btn_list_item js-skill-btn active">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/html.svg" alt="">
            <h3>HTML</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/css.svg" alt="">
            <h3>CSS</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/sass.svg" alt="">
            <h3>SASS</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/javascript.svg" alt="">
            <h3>JavaScript</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/typescript.svg" alt="">
            <h3>TypeScript</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/wordpress.svg" alt="">
            <h3>WordPress</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/shopify.svg" alt="">
            <h3>Shopify</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/seo.png" alt="">
            <h3>SEO</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/cli.png" alt="">
            <h3>ターミナル(CLI)</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/npm.svg" alt="">
            <h3>パッケージマネージャー各種</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/vite.svg" alt="">
            <h3>Vite(ビルドツール)</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/git.svg" alt="">
            <h3>Git</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/github.svg" alt="">
            <h3>Github</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/docker.svg" alt="">
            <h3>Docker</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/photoshop.svg" alt="">
            <h3>Photoshop</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/xd.svg" alt="">
            <h3>AdobeXd</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/figma.svg" alt="">
            <h3>Figma</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/notion.svg" alt="">
            <h3>Notion</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/dropbox.svg" alt="">
            <h3>Dropbox</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/google-drive.svg" alt="">
            <h3>Googleドライブ</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/spread-sheet.svg" alt="">
            <h3>スプレッドシート</h3>
        </li>
    </ul>
    <!-- 言語 -->
    <ul class="skill_btn_list js-list inner">
        <li class="skill_btn_list_item js-skill-btn active">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/html.svg" alt="">
            <h3>HTML</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/css.svg" alt="">
            <h3>CSS</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/sass.svg" alt="">
            <h3>SASS</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/javascript.svg" alt="">
            <h3>JavaScript</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/typescript.svg" alt="">
            <h3>TypeScript</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/wordpress.svg" alt="">
            <h3>WordPress</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/shopify.svg" alt="">
            <h3>Shopify</h3>
        </li>
        <!-- <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/php.svg" alt="">
            <h3>PHP</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/mysql.svg" alt="">
            <h3>MySQL</h3>
        </li> -->
    </ul>
    <!-- ツール系 -->
    <ul class="skill_btn_list js-list inner">
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/cli.png" alt="">
            <h3>ターミナル(CLI)</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/npm.svg" alt="">
            <h3>パッケージマネージャー各種</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/vite.svg" alt="">
            <h3>Vite(ビルドツール)</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/git.svg" alt="">
            <h3>Git</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/github.svg" alt="">
            <h3>Github</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/docker.svg" alt="">
            <h3>Docker</h3>
        </li>
    </ul>
    <!-- デザイン系 -->
    <ul class="skill_btn_list js-list inner">
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/photoshop.svg" alt="">
            <h3>Photoshop</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/xd.svg" alt="">
            <h3>AdobeXd</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/figma.svg" alt="">
            <h3>Figma</h3>
        </li>
    </ul>
    <!-- 業務効率化 -->
    <!-- <ul class="skill_btn_list js-list inner">
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/spread-sheet.svg" alt="">
            <h3>スプレッドシート</h3>
        </li>
    </ul> -->
    <!-- 学習中 -->
    <ul class="skill_btn_list js-list inner">
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/node-js.svg" alt="">
            <h3>Node.js</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/react.svg" alt="">
            <h3>React</h3>
        </li>
        <!-- <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/next-js.svg" alt="">
            <h3>Next.js</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/vue-js.svg" alt="">
            <h3>Vue.js</h3>
        </li> -->
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/php.svg" alt="">
            <h3>PHP</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/mysql.svg" alt="">
            <h3>MySQL</h3>
        </li>
    </ul>
    <!-- 学習予定 -->
    <ul class="skill_btn_list js-list inner">
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/next-js.svg" alt="">
            <h3>Next.js</h3>
        </li>
        <!-- <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/vue-js.svg" alt="">
            <h3>Vue.js</h3>
        </li> -->
    </ul>
    <!-- その他 -->
    <ul class="skill_btn_list js-list inner">
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/seo.png" alt="">
            <h3>SEO</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/notion.svg" alt="">
            <h3>Notion</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/dropbox.svg" alt="">
            <h3>Dropbox</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/google-drive.svg" alt="">
            <h3>Googleドライブ</h3>
        </li>
        <li class="skill_btn_list_item js-skill-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/img/language_icon/spread-sheet.svg" alt="">
            <h3>スプレッドシート</h3>
        </li>
    </ul>

    <!-- スキル内容 -->
    <!-- すべて -->
    <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item active">
            <h3>HTML</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>CSS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>SASS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>JavaScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>TypeScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>WordPress</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Shopify</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>SEO</h3>
            <p>基本的なSEO、内部SEOの知見</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>ターミナル(CLI)</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>パッケージマネージャー各種</h3>
            <p>Homebrew,npm,Composerでの開発環境構築</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Vite(ビルドツール)</h3>
            <p>ビルドツールはViteを使用して、モダンJSの開発を行います。</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Git</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Github</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Docker</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Photoshop</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>AdobeXd</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Figma</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde provident modi neque veritatis consectetur ratione obcaecati ea tempore iusto cumque explicabo ex et earum sapiente sunt ipsam, nobis reiciendis commodi.</p>
        </li>
        <!-- <li class="skill_content_list_item js-skill_list_item">
            <h3>Notion</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li> -->
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Dropbox</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Googleドライブ</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>スプレッドシート</h3>
            <p>CSVでのデータの扱い、GASの使用や業務効率化</p>
        </li>
    </ul>
    <!-- 言語 -->
    <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item">
            <h3>HTML</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>CSS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>SASS</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>JavaScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>TypeScript</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>WordPress</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Shopify</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
    </ul>
    <!-- ツール系 -->
    <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item">
            <h3>ターミナル(CLI)</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>パッケージマネージャー各種</h3>
            <p>Homebrew,npm,Composer</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Vite(ビルドツール)</h3>
            <p>ビルドツールはViteを使用して、モダンJSの開発を行います。</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Git</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Github</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Docker</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
    </ul>
    <!-- デザイン系 -->
    <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Photoshop</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>AdobeXd</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Figma</h3>
            <p></p>
        </li>
    </ul>
    <!-- 学習中 -->
    <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Node.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>React</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <!-- <li class="skill_content_list_item js-skill_list_item">
            <h3>Next.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>vue.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li> -->
        <li class="skill_content_list_item js-skill_list_item">
            <h3>PHP</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>MySQL</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
    </ul>
    <!-- 学習予定 -->
    <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Next.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <!-- <li class="skill_content_list_item js-skill_list_item">
            <h3>vue.js</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li> -->
        <!-- <li class="skill_content_list_item js-skill_list_item">
            <h3>Restful API</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li> -->
    </ul>
    <!-- 業務効率化 -->
    <!-- <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item">
            <h3>スプレッドシート</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
    </ul> -->
    <!-- その他 -->
    <ul class="skill_content_list">
        <li class="skill_content_list_item js-skill_list_item">
            <h3>SEO</h3>
            <p>基本的なSEO、内部SEOの知見</p>
        </li>
        <!-- <li class="skill_content_list_item js-skill_list_item">
            <h3>Notion</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li> -->
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Dropbox</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>Googleドライブ</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
        <li class="skill_content_list_item js-skill_list_item">
            <h3>スプレッドシート</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
        </li>
    </ul>

    <p class="btn btn-main">
        <a href="<?php echo bloginfo('skill'); ?>">スキル一覧</a>
    </p>
</section>

<section class="profile" id="js-contents">
    <div class="profile_container">
        <div class="profile_container_left inner">
            <div class="profile_detail">
                <div class="heading">
                    <h2 class="heading_ttl">Profile</h2>
                </div>
                <h3 class="name">岡崎 流宇斗</h3>
                <table>
                    <tr>
                        <th>生年月日</th>
                        <td>2001/2/7(23歳)</td>
                    </tr>
                    <tr>
                        <th>出身</th>
                        <td>神奈川県出身、現在も神奈川県川崎市在住</td>
                    </tr>
                    <tr>
                        <th>趣味</th>
                        <td>サブカルチャー、映画鑑賞、ファッション、スキー/スノボ</td>
                    </tr>
                </table>
                <p>
                    Webデザイナーを目指しております。
                    <br>よろしくお願いいたします。
                    <br>大学時代にゼロから独学でコーディングやCMS、デザインソフトの使い方、デザインやWebのことを学び、実務として、ホームページの制作をひとりで行って参りました。
                    <br>デザインからホームページの制作、公開、運用を行っています。
                    <br>ゆくゆくは、このマーケティングを踏まえて、私が構築したサイトを実際に集客できるサイトにしていき、運用していこうと考えております。
                    <br>ただ創るだけでなく、見やすさ、使いやすさといったようなUI/UXを意識し、お客様のその先の目的を達成するサイトを制作することを心がけております。
                    <br>その後は、私が培ったノウハウをお客様にもお伝えできるようなWebデザイナーを目指しています。
                </p>
            </div>
        </div>
        <div class="profile_container_right">
            <img src="<?php echo get_template_directory_uri(); ?>/img/profile_01.png" alt="">
        </div>
    </div>
</section>

<!-- <section class="faq" id="faq">
    <div class="inner" id="js-contents">
        <div class="heading">
            <h2 class="heading_ttl">FAQ</h2>
            <p class="heading_ttl ja">よくある質問</p>
        </div>
        <dl class="faq__container">
            <div class="faq__block">
                <dt class="faq__block--question">
                    <p>質問事項</p>
                </dt>
                <dd class="faq__block--answer">
                    <p>回答</p>
                </dd>
            </div>
            <div class="faq__block">
                <dt class="faq__block--question">質問事項</dt>
                <dd class="faq__block--answer">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
                </dd>
            </div>
            <div class="faq__block">
                <dt class="faq__block--question">質問事項</dt>
                <dd class="faq__block--answer">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
                </dd>
            </div>
            <div class="faq__block">
                <dt class="faq__block--question">質問事項</dt>
                <dd class="faq__block--answer">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
                </dd>
            </div>
            <div class="faq__block">
                <dt class="faq__block--question">質問事項</dt>
                <dd class="faq__block--answer">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
                </dd>
            </div>
            <div class="faq__block">
                <dt class="faq__block--question">質問事項</dt>
                <dd class="faq__block--answer">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis fugiat sequi ab aspernatur dignissimos quos eos accusantium voluptates unde, nulla asperiores? Quod voluptates accusamus magnam quis quam suscipit nobis harum.</p>
                </dd>
            </div>
        </dl>
    </div>
    <p class="btn btn-main">
        <a href="<?php echo bloginfo('faq'); ?>">よくある質問</a>
    </p>
</section> -->

<!-- <section class="inner contact" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">Contact</h2>
        <p class="heading_txt">
            お問い合わせを随時、受け付けております。<br>
            こちらからお問い合わせお願いします。
        </p>
    </div>
    <div class="contact_container">
        <?php echo do_shortcode('[contact-form-7 id="19c2f38" title="CONTACT"]'); ?>
    </div>
    <p class="btn btn-main">
        <a href="<?php echo bloginfo('contact'); ?>">お問い合わせ</a>
    </p>
</section> -->
<!-- キャプション -->
<!-- <aside class="caption accordion" id="caption-pc">
    <dl class="caption-body dl" id="caption-body">
        <dt class="caption-ttl dt">
            <p class="limited"></p>
            <h2 class="caption-ttl">
                大感謝祭!!<br />
                お得なキャンペーン実施中!!
            </h2>
        </dt>
        <dd class="caption-txt dd">
            <p>キャンペーン詳細</p>
            <a href="#pricePlan"> お得なキャンペーン詳細はコチラ </a>
        </dd>
        <div class="caption-btn" id="caption-btn">×閉じる</div>
    </dl>
</aside> -->

<?php get_footer(); ?>