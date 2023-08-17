<?php get_header();?>
<main>
	<h1 class="text-xl font-semibold">Latest football news</h1>
	<section class="news-list" paginated>
		<?php
		if (have_posts()): while (have_posts()) : the_post(); ?>
		<a class="news-article" href="<?php the_permalink()?>">
			<div class="news-article-image">
				<?php if (get_the_post_thumbnail()): ?>
					<span><?php echo get_the_post_thumbnail(); ?></span>
				<?php else: ?>
					<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png"></span>
				<?php endif; ?>
				<div class="news-article-related">
					<?php
					$terms = get_the_terms($post->ID, 'news_tax');
					$grandparent_id = 139;

					if ($terms) {
						foreach ($terms as $term) {
							if ($term->parent) {
								$parent = get_term($term->parent);
								if ($parent->parent == $grandparent_id) {
									echo z_taxonomy_image($term->term_id);
									echo '<span>'.$term->name.'</span>';
									break;
								}
							}
						}
					}

					?>
				</div>
			</div>
			<div class="news-article-info">
				<h3>
					<?php the_title()?>
				</h3>
				<h4 class="flex justify-between text-xs mt-2">
					<span>by <strong><?php the_author()?></strong></span>
					<time><?php the_time('Y.m.d')?></time>
				</h4>
			</div>
		</a>
		<?php wp_reset_postdata(); endwhile;endif;?>

	</section>

	<div class="pagination" data-items-total="2049" data-pageination-parent="news-list" data-is-first-page="true" data-is-last-page="false" data-args="news?type=latest">
		<div class="pagination-controls">
			<?php wp_pagenavi()?>
		</div>
	</div>
</main>

<?php get_footer();?>
