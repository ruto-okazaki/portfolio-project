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
    <p class="skills_content_list_item js-default-message active">
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
                    <li class="skills_content_list_item js-skills_list_item">
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
            <ul class="skills_btn_list js-list <?php echo $index === 0 ? 'active' : ''; ?>">
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