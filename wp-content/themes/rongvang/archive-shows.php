<?php get_header();?>
<main>
	<h1 class="text-xl font-semibold">Latest football shows</h1>
	<section class="show-list" paginated>
		<?php
		if (have_posts()): while (have_posts()) : the_post(); ?>
			<article class="show-item">
				<a href="<?php the_permalink();?>">
					<?php if (get_the_post_thumbnail()): ?>
						<span><?php echo get_the_post_thumbnail(); ?></span>
					<?php else: ?>
						<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png"></span>
					<?php endif; ?>
					<h3 class="show-item-info">
						<span><?php the_title() ?></span>
						<time><?php the_time('Y.m.d')?></time>
					</h3>
				</a>
			</article>
			<?php wp_reset_postdata(); endwhile;endif;?>


	</section>
	<div class="pagination" data-items-total="2049" data-pageination-parent="news-list" data-is-first-page="true" data-is-last-page="false" data-args="news?type=latest">
		<div class="pagination-controls">
			<?php wp_pagenavi()?>
		</div>
	</div>
</main>

<?php get_footer();?>
