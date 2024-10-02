<?php
// Template Name: トップ
get_header();
?>

<section class="works slide inner" id="js-contents">
    <div class="scrollHint"></div>
    <!-- サブクエリ -->
    <?php $args = array(
        'post_type' => 'works',
        'posts_per_page' => 100
    );
    $works_query = new WP_Query($args);
    ?>
    <?php if ($works_query->have_posts()) : ?>
        <ul class="slide_list">
            <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
                <?php get_template_part('template-parts/loop', 'slide'); ?>
            <?php endwhile; ?>
        </ul>
    <?php endif;
    wp_reset_postdata(); ?>

    <p class="btn">
        <a href="<?php echo home_url('works'); ?>">Works</a>
    </p>
</section>

<div id="skills">
    <section class="skills inner" id="js-contents">
        <div class="heading">
            <h2 class="heading_ttl">Skills</h2>
            <p class="heading_txt">
                使用可能な言語やツールの一覧です。<br>
                アイコンをクリックすると、詳細を拡大表示できます。<br>
                気になるスキルを、以下のアイコンからお選びください。
            </p>
        </div>

        <?php
        // カスタムタクソノミー 'dep' に関連するカテゴリを取得
        $custom_categories = get_terms(array(
            'taxonomy' => 'dep',
            'hide_empty' => false,
        ));
        ?>

        <?php if (!empty($custom_categories) && !is_wp_error($custom_categories)) : ?>
            <!-- カテゴリのタブ表示 -->
            <ul class="category-switch">
                <?php foreach ($custom_categories as $index => $category) : ?>
                    <li class="category-switch-tab js-category-switch-tab <?php echo $index === 0 ? 'active' : ''; ?>">
                        <span><?php echo esc_html($category->name); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- カテゴリに属する投稿ボタンを表示 -->
            <?php foreach ($custom_categories as $index => $category) :
                $args = array(
                    'post_type' => 'skills',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'dep',
                            'field'    => 'slug',
                            'terms'    => $category->slug,
                        ),
                    ),
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                );
                $skills_query = new WP_Query($args);
            ?>

                <?php if ($skills_query->have_posts()) : ?>
                    <ul class="skills_btn_list js-list <?php echo $index === 0 ? 'active' : ''; ?>">
                        <?php foreach ($skills_query->posts as $post) : ?>
                            <!-- アイコンをクリックでモーダル表示 -->
                            <li class="skills_btn_list_item js-skills-btn js-modal-btn">
                                <!-- スキルアイコン -->
                                <div class="skills_icon">
                                    <?php echo get_the_post_thumbnail($post->ID); ?>
                                    <h3><?php echo get_the_title($post->ID); ?></h3>
                                </div>
                                <!-- モーダル内コンテンツ -->
                                <div class="skills_content_list_item js-skills_list_item inner modal">
                                    <div class="skills_pic">
                                        <?php echo get_the_post_thumbnail($post->ID); ?>
                                    </div>
                                    <div class="skills_content">
                                        <h3><?php echo get_the_title($post->ID); ?></h3>
                                        <div class="scroll_container">
                                            <div class="example">
                                                <h4>説明</h4>
                                                <p>
                                                    <?php the_field('example'); ?>
                                                </p>
                                            </div>
                                            <div class="possible">
                                                <h4>具体的にできること</h4>
                                                <p><?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_close-btn"></div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="modal_over-lay"></div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>

<div id="profile">
    <section class="profile" id="js-contents">
        <?php $args = array(
            'post_type' => 'profile',
            'posts_per_page' => -1
        );
        $profile_query = new WP_Query($args);
        ?>
        <?php if ($profile_query->have_posts()) : while ($profile_query->have_posts()) : $profile_query->the_post(); ?>
                <?php
                $age = get_field('age');
                $from = get_field('from');
                $hobby = get_field('hobby');
                ?>
                <!-- PCレイアウト -->
                <div class="profile_container pc-only">
                    <div class="profile_container_left">
                        <div class="heading">
                            <h2 class="heading_ttl">Profile</h2>
                        </div>
                        <div class="name">
                            <h3><?php the_title(); ?></h3>
                            <ul class="name_sub">
                                <?php if ($age) : ?>
                                    <li><?php echo esc_html($age); ?></li>
                                <?php endif; ?>
                                <?php if ($from) : ?>
                                    <li><?php echo esc_html($from); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="scroll_container">
                            <div class="scroll_arrow"></div>
                            <div class="appeal">
                                <div class="hobby">
                                    <h4>趣味</h4>
                                    <dl>
                                        <dt>ファッション</dt>
                                        <dd>ジャンルはアメカジで、主にレザーやデニムのアイテムが好んでいます。</dd>
                                        <dt>サブカルチャー</dt>
                                        <dd>
                                            エンタメや音楽の鑑賞が大好きで、映画鑑賞・お笑い、音楽は昔のJ-POPや洋楽のロックをよく聴いています。<br>
                                            また、アメリカの文化や価値観が好きで、憧れがあり、実際に学生時代にロサンゼルスに旅行もしました。
                                        </dd>
                                        <dt>バイク</dt>
                                        <dd>アメリカンタイプのバイクが好きで、実際に学生時代に国産のアメリカンを乗っていました。いつかはハーレーを買うことを目標に日々努力しています。</dd>
                                        <dt>スキー/スノボ</dt>
                                        <dd>毎年、必ず行っています。</dd>
                                    </dl>
                                </div>
                                <div class="qualification">
                                    <h4>資格</h4>
                                    <ul>
                                        <li>ITパスポート</li>
                                        <li>日商簿記検定3級</li>
                                        <li>普通自動二輪免許/普通自動車免許</li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="career"><?php the_content(); ?></div>
                        </div>
                    </div>
                    <div class="profile_container_right">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/profile_01_original.jpg" alt="">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- レスポンシブレイアウト -->
                <div class="profile_container sp-only">
                    <div class="profile_container_left">
                        <div class="heading">
                            <h2 class="heading_ttl">Profile</h2>
                        </div>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/profile_02.jpg" alt="">
                        <?php endif; ?>
                        <div class="name">
                            <h3><?php the_title(); ?></h3>
                            <ul class="name_sub">
                                <?php if ($age) : ?>
                                    <li><?php echo esc_html($age); ?></li>
                                <?php endif; ?>
                                <?php if ($from) : ?>
                                    <li><?php echo esc_html($from); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="profile_container_right">
                        <div class="appeal">
                            <div class="hobby">
                                <h4>趣味</h4>
                                <dl>
                                    <dt>ファッション</dt>
                                    <dd>ジャンルはアメカジで、主にレザーやデニムのアイテムが好んでいます。</dd>
                                    <dt>サブカルチャー</dt>
                                    <dd>
                                        エンタメや音楽の鑑賞が大好きで、映画鑑賞・お笑い、音楽は昔のJ-POPや洋楽のロックをよく聴いています。<br>
                                        また、アメリカの文化や価値観が好きで、憧れがあり、実際に学生時代にロサンゼルスに旅行もしました。
                                    </dd>
                                    <dt>バイク</dt>
                                    <dd>アメリカンタイプのバイクが好きで、実際に学生時代に国産のアメリカンを乗っていました。いつかはハーレーを買うことを目標に日々努力しています。</dd>
                                    <dt>スキー/スノボ</dt>
                                    <dd>毎年、必ず行っています。</dd>
                                </dl>
                            </div>
                            <div class="qualification">
                                <h4>資格</h4>
                                <ul>
                                    <li>ITパスポート</li>
                                    <li>日商簿記検定3級</li>
                                    <li>普通自動二輪免許/普通自動車免許</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="career"><?php the_content(); ?></div>
                    </div>
                </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </section>
</div>

<section class="thank-you inner" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">Thank you</h2>
        <p class="heading_txt">
            最後まで私のポートフォリオをご覧いただき、誠にありがとうございます。<br>
            お問い合わせは、下記のボタンからフォームへアクセスいただけますので、そちらよりお願いいたします。
        </p>
    </div>
    <p class="btn">
        <a href="<?php echo home_url('contact'); ?>">CONTACT</a>
    </p>
</section>

<?php get_footer(); ?>