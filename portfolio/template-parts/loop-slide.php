<!-- スライド ループ -->
<li class="slide_list_item mask">
    <a href="<?php the_permalink() ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(''); ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/dummy.png" alt="">
        <?php endif; ?>
        <div class="mask_container mask_container-scale">
            <div class="mask_content">
                <h3><?php the_title(); ?></h3>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </div>
        </div>
    </a>
</li>