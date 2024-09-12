<!-- パンくずリスト -->
<?php if (function_exists('bcn_display')) : ?>
    <div class="breadcrumb">
        <div class="inner">
            <?php bcn_display(); ?>
        </div>
    </div>
<?php endif; ?>