<?php
// Template Name: プロフィール
get_header();
?>

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
                    <!-- <?php if ($hobby) : ?>
                            <div class="hobby">
                                <h4>趣味</h4>
                                <dl>
                                    <dt><?php echo esc_html($hobby); ?></dt>
                                    <dd><?php echo esc_html($hobby); ?></dd>
                                </dl>
                            </div>
                        <?php endif; ?> -->
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
                        <div class="ja"><?php the_content(); ?></div>
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
                        <!-- <?php if ($hobby) : ?>
                                <div class="hobby">
                                    <h4>趣味</h4>
                                    <dl>
                                        <dt><?php echo esc_html($hobby); ?></dt>
                                        <dd><?php echo esc_html($hobby); ?></dd>
                                    </dl>
                                </div>
                                <?php endif; ?> -->
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
                    <p class="ja"><?php the_content(); ?></p>
                </div>
            </div>
    <?php endwhile;
    endif;
    wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>