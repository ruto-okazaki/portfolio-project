<!-- カスタム投稿詳細 -->
<?php
get_header();
// Template Name: ギャラリー詳細
?>

<main>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="contents">
				<p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
				<div class="container">
					<img src=" <?php echo CFS()->get('thumbnail'); ?>">
					<div class="content">
						<h2><?php echo CFS()->get('title'); ?></h2>
						<p><?php echo CFS()->get('detail'); ?></p>
					</div>
				</div>
			</section>
	<?php endwhile;
	endif; ?>
</main>

<?php get_footer(); ?>