<!-- カスタム投稿詳細 -->
<?php
// Template Name: 制作実績詳細
get_header();
?>

<section class="detail inner">
    <div id="js-contents">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="detail_container">
                    <?php
                    // フィールドデータの取得と表示
                    $skills = get_field('skills');
                    $url = get_field('url');
                    $period = get_field('period');
                    $purpose = get_field('purpose');
                    $design = get_field('design');
                    $coding = get_field('coding');
                    ?>
                    <!-- サムネイルを表示 -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="detail_container_left">
                            <?php the_post_thumbnail('large'); ?>
                            <table>
                                <?php if ($purpose) : ?>
                                    <tr>
                                        <th>サイトの概要</th>
                                        <td><?php echo esc_html($purpose); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($period) : ?>
                                    <tr>
                                        <th>制作期間</th>
                                        <td><?php echo esc_html($period); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($url) : ?>
                                    <tr>
                                        <th>URL</th>
                                        <td>
                                            <a href="<?php echo esc_url($url); ?>" target="_blank" class="link">
                                                <?php echo esc_html($url); ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    <?php endif; ?>

                    <div class="detail_container_right">
                        <!-- <dl class="project_name">
                            <dt><?php the_title(); ?></dt>
                        </dl> -->
                        <?php if ($skills) : ?>
                            <dl>
                                <dt>使用技術</dt>
                                <dd><?php echo esc_html($skills); ?></dd>
                            </dl>
                        <?php endif; ?>

                        <?php if ($design) : ?>
                            <dl>
                                <dt>デザインについて</dt>
                                <dd class="textarea"><?php echo esc_html($design); ?></dd>
                            </dl>
                        <?php endif; ?>

                        <?php if ($coding) : ?>
                            <dl>
                                <dt>実装について</dt>
                                <dd class="textarea"><?php echo esc_html($coding); ?></dd>
                            </dl>
                        <?php endif; ?>

                        <dl>
                            <dt>経緯・詳細</dt>
                            <dd class="textarea"><?php the_content(); ?></dd>
                        </dl>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>