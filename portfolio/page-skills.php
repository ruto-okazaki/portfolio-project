<?php
// Template Name: スキル
get_header();
?>

<section class="skills inner" id="js-contents">
    <div class="heading">
        <h2 class="heading_ttl">Skills</h2>
        <p class="heading_txt">
            使用できる言語、ツールの一覧です。<br>
            クリックすると、その詳細が拡大されて表示されます。<br>
            以下のアイコンより、気になるスキルをお選びください。
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
                                    <p><?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?></p>
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

<?php get_footer(); ?>