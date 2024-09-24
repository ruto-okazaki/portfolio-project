<!-- カスタム投稿詳細 -->
<?php
// Template Name: 制作実績詳細
get_header();
?>

<section class="detail inner">
    <div id="js-contents">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                // フィールドデータの取得と表示
                $client = get_field('client');
                $type = get_field('type');
                $concept = get_field('concept');
                $range = get_field('range');
                $skills = get_field('skills');
                $period = get_field('period');
                $commitment = get_field('commitment');
                $benefit = get_field('benefit');
                ?>
                <div class="detail_container">
                    <!-- サムネイルを表示 -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="detail_container_left">
                            <?php the_post_thumbnail('large'); ?>
                            <div class="detail_content">
                                <?php if ($type) : ?>
                                    <dl>
                                        <dt>サイトの分類</dt>
                                        <dd><?php echo $type; ?></dd>
                                    </dl>
                                <?php endif; ?>
                                <?php if ($concept) : ?>
                                    <dl>
                                        <dt>コンセプト</dt>
                                        <dd><?php echo $concept; ?></dd>
                                    </dl>
                                <?php endif; ?>
                                <?php if ($range) : ?>
                                    <dl>
                                        <dt>担当範囲</dt>
                                        <dd><?php echo $range; ?></dd>
                                    </dl>
                                <?php endif; ?>
                                <?php if ($skills) : ?>
                                    <dl>
                                        <dt>使用技術</dt>
                                        <dd><?php echo $skills; ?></dd>
                                    </dl>
                                <?php endif; ?>
                                <?php if ($period) : ?>
                                    <dl>
                                        <dt>制作期間</dt>
                                        <dd><?php echo $period; ?></dd>
                                    </dl>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="detail_container_right">
                        <dl>
                            <dt>経緯・詳細</dt>
                            <dd><?php the_content(); ?></dd>
                        </dl>
                        <?php if ($commitment) : ?>
                            <dl>
                                <dt>こだわり</dt>
                                <dd class="textarea"><?php echo $commitment; ?></dd>
                            </dl>
                        <?php endif; ?>

                        <?php if ($benefit) : ?>
                            <dl>
                                <dt>この経験で得たこと</dt>
                                <dd class="textarea"><?php echo $benefit; ?></dd>
                            </dl>
                        <?php endif; ?>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>