<?php
// Template Name: トップ
get_header();
?>

<section class="works slide inner" id="js-contents">
    <!-- <div class="heading">
        <h2 class="heading_ttl">Works</h2>
    </div> -->
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
        </div>

        <?php
        // カスタムタクソノミー 'dep' に関連するカテゴリを取得
        $custom_categories = get_terms(array(
            'taxonomy' => 'dep',
            'hide_empty' => false,
        ));
        ?>
        <!-- カテゴリのタブ表示 -->
        <? if (!empty($custom_categories) && !is_wp_error($custom_categories)) : ?>
            <ul class="category-switch">
                <?php foreach ($custom_categories as $index => $category) : ?>
                    <li class="category-switch-tab js-category-switch-tab <?php echo $index === 0 ? 'active' : ''; ?>">
                        <span><?php echo esc_html($category->name); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- 初期メッセージ -->
        <p class="skills_content_list_item inner js-default-message active">
            使用できる言語、ツールの一覧です。<br>
            クリックすると、その詳細がこちらに表示されます。<br>
            以下のアイコンより、気になるスキルをお選びください。
        </p>

        <?php
        foreach ($custom_categories as $index => $category) :
            // 各カテゴリに属する投稿を取得
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
                <ul class="skills_content_list">
                    <? foreach ($skills_query->posts as $post_index => $post) : ?>
                        <li class="skills_content_list_item inner js-skills_list_item">
                            <div class="skills_pic"><?php echo get_the_post_thumbnail($post->ID); ?></div>
                            <div class="skills_content">
                                <h3><?php echo get_the_title($post->ID); ?></h3>
                                <p><?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;
            wp_reset_postdata(); ?>
        <?php endforeach; ?>

        <!-- カテゴリに属する投稿ボタンを表示 -->
        <?php
        foreach ($custom_categories as $index => $category) :
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
                <ul class="skills_btn_list js-list inner <?php echo $index === 0 ? 'active' : ''; ?>">
                    <?php foreach ($skills_query->posts as $post_index => $post) : ?>
                        <li class="skills_btn_list_item js-skills-btn <?php echo $post_index === 0 ? 'active' : ''; ?>">
                            <?php echo get_the_post_thumbnail($post->ID); ?>
                            <h3><?php echo get_the_title($post->ID); ?></h3>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;
            wp_reset_postdata(); ?>
        <?php endforeach; ?>
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
                    <div class="profile_container_left inner">
                        <div class="profile_detail">
                            <div class="heading">
                                <h2 class="heading_ttl">Profile</h2>
                            </div>
                            <h3 class="name"><?php the_title(); ?></h3>
                            <table>
                                <?php if ($age) : ?>
                                    <tr>
                                        <th>生年月日</th>
                                        <td><?php echo esc_html($age); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($from) : ?>
                                    <tr>
                                        <th>出身</th>
                                        <td><?php echo esc_html($from); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($hobby) : ?>
                                    <tr>
                                        <th>趣味</th>
                                        <td><?php echo esc_html($hobby); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="profile_container_right">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/profile_01.png" alt="">
                        <?php endif; ?>
                    </div>
                </div>
                <!-- レスポンシブレイアウト -->
                <div class="profile_container sp-only">
                    <div class="profile_container_left inner">
                        <div class="profile_detail">
                            <div class="heading">
                                <h2 class="heading_ttl">Profile</h2>
                            </div>
                            <h3 class="name"><?php the_title(); ?></h3>
                        </div>
                        <div class="profile_container_right">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/profile_01.png" alt="">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="inner">
                        <table>
                            <?php if ($age) : ?>
                                <tr>
                                    <th>生年月日</th>
                                    <td><?php echo esc_html($age); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($from) : ?>
                                <tr>
                                    <th>出身</th>
                                    <td><?php echo esc_html($from); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($hobby) : ?>
                                <tr>
                                    <th>趣味</th>
                                    <td><?php echo esc_html($hobby); ?></td>
                                </tr>
                            <?php endif; ?>
                        </table>
                        <?php the_content(); ?>
                    </div>
                </div>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </section>
</div>

<!-- <div id="contact inner" id="js-contents">
    <section class="inner contact js-contents">
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
    </section>
</div> -->

<section class="thank-you inner" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">Thank you</h2>
        <p class="heading_txt">
            最後まで、私のポートフォリオをご覧いただき、誠にありがとうございます。<br>
            お問い合わせにつきましては、下記のボタンより、フォームございますのでそちらよりお願いします。
        </p>
    </div>
    <p class="btn">
        <a href="<?php echo home_url('contact'); ?>">CONTACT</a>
    </p>
</section>

<?php get_footer(); ?>