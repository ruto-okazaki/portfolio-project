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
        <h3><?php the_title(); ?></h3>
        <div class="excerpt"><?php the_excerpt(); ?></div>
        <table>
            <?php
            $url = get_field('url');
            $period = get_field('period');
            $purpose = get_field('purpose');
            ?>
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
</li>