<!-- 共通詳細ページ -->
<?php
get_header();
// Template Name: シングルテンプレート
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<header>
				<h1><?php the_title(); ?></h1>
				<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y/m/d'); ?></time>
			</header>
			<div class="contents">
				<p><?php the_content(); ?></p>
			</div>

			<footer>
				<!-- カテゴリー一覧表示 -->
				<?php $categories = get_the_category();
				if ($categories) : ?>
					<div class="category">
						<div class="category__list">
							<?php foreach ($categories as $category) : ?>
								<div class="category__item">
									<a href="<?php echo get_category_link($category); ?>">
										<?php echo $category->name; ?>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<!-- 前後の投稿ページへのリンク -->
				<div class="prevNext">
					<?php
					$previous_post = get_previous_post();
					if ($previous_post) : ?>
						<div class="prevNext__item prevNext__item-prev">
							<a href="<?php the_permalink($previous_post); ?>">
								<span><?php echo get_the_title($previous_post); ?></span>
							</a>
						</div>
					<?php endif; ?>
					<?php
					$previous_post = get_next_post();
					if ($next_post) : ?>
						<div class="prevNext__item prevNext__item-prev">
							<a href="<?php the_permalink($next_post); ?>">
								<span><?php echo get_the_title($next_post); ?></span>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</footer>
		</article>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>