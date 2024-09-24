<!-- ギャラリー ループ -->
<li class="gallery_list_item" id="js-contents">
    <div class="mask">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(''); ?>
            <div class="mask_container">
                <p class="mask_content">VIEW MORE</p>
            </div>
        </a>
    </div>
    <div class="gallery_list_item_content">
        <?php
        $url = get_field('url');
        $type = get_field('type');
        $concept = get_field('concept');
        $range = get_field('range');
        $skills = get_field('skills');
        $period = get_field('period');
        ?>
        <div class="project-name">
            <h3><?php the_title(); ?></h3>
            <a href="<?php echo esc_url($url); ?>" target="_blank" class="link">
                <?php echo $url; ?>
            </a>
        </div>
        <div class="excerpt"><?php the_excerpt(); ?></div>
        <div class="content">
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
</li>