<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<main class="sidebar">
		<section class="flex flex-col gap-y-4">
			<h1 class="text-3xl font-semibold"><?php the_title() ?></h1>
			<div class="flex items-center text-xs font-medium -mt-2">
				<span>by <?php the_author(); ?></span>
				<div class="icon icon-4 icon-time-gray mx-1"></div>
				<time><?php the_time('Y.m.d') ?>></time>
			</div>
			<div class="relative flex items-end w-full h-96">
				<?php if (get_the_post_thumbnail()): ?>
					<span><?php echo get_the_post_thumbnail(); ?></span>
				<?php else: ?>
					<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png"></span>
				<?php endif; ?>
				<?php if (get_field('imgDes')) : ?>
					<figcaption
						class="absolute w-full px-2 py-1 text-center text-xs font-medium bg-gray-800 text-white">
						<?php the_field('imgDes') ?>
					</figcaption>
				<?php endif; ?>

			</div>
			<div class="flex flex-wrap items-center">
				<?php
				$terms = get_the_terms($post->ID, 'news_tax');
				if ($terms) : foreach ($terms as $term): ?>
					<a class="flex border rounded-md px-2 py-1 mr-1"
					   href="<?php echo get_term_link($term->slug, 'news_tax') ?>">
						<img class="w-4 h-4 object-contain mr-1"
						     src="<?php echo z_taxonomy_image_url($term->term_id); ?>"/>
						<span class="text-xs"><?php echo $term->name ?></span>
					</a>
				<?php endforeach; endif; ?>
			</div>

			<article class="prose">
				<?php the_content(); ?>
			</article>

			<hr class="border-t border-gray-200">
			<div class="flex items-center my-4">
				<h3 class="font-semibold text-lg mr-4">Share this article</h3>
				<?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
			</div>
		</section>
		<aside class="flex">
			<section class="flex flex-col w-full gap-y-4">
				<h3 class="font-medium text-lg text-center">Related news</h3>
				<?php
				$terms = wp_get_post_terms($post->ID, 'news_tax');
				$term_ids = array();
				foreach ($terms as $term) {
					$term_ids[] = $term->term_id;
				}
				$args = array(
					'post_type' => 'news',
					'posts_per_page' => 5,
					'tax_query' => array(
						array(
							'taxonomy' => 'news_tax',
							'field' => 'id',
							'terms' => $term_ids,
							'operator' => 'IN'
						)
					),
					'post__not_in' => array($post->ID)
				);
				$related_posts = new WP_Query($args);
				if ($related_posts->have_posts()):while ($related_posts->have_posts()):$related_posts->the_post(); ?>
					<a class="flex flex-col items-center rounded overflow-hidden shadow cursor-pointer hover:opacity-75"
					   href="<?php the_permalink() ?>">
						<div class="relative w-full">
							<?php if (get_the_post_thumbnail()): ?>
								<?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'rounded w-full h-60 md:h-36 object-cover transition-all')); ?>
							<?php else: ?>
								<img class="rounded w-full h-60 md:h-36 object-cover transition-all"
								     src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png">
							<?php endif; ?>


							<?php
							$terms = get_the_terms($post->ID, 'news_tax');
							$grandparent_id = 139;

							if ($terms) {
								foreach ($terms as $term) {
									if ($term->parent) {
										$parent = get_term($term->parent);
										if ($parent->parent == $grandparent_id) {
											echo '<div class="flex items-center absolute bottom-0 px-2 py-1 rounded-tr-md bg-white bg-opacity-95">
									<img class="w-4 h-4 mr-1" src="'.z_taxonomy_image_url($term->term_id).'"
									     alt="">
									<span class="text-xs">'.$term->name.'</span>
								</div>';
										}
									}
								}
							}

							?>

						</div>
						<div class="flex flex-col justify-between w-full h-full p-2">
							<h3 class="text-base text-left font-semibold tracking-tight">
								<?php the_title() ?>
							</h3>
							<h4 class="flex justify-between text-xs mt-2">
								<span>by <strong class="font-medium"><?php the_author() ?></strong></span>
								<time class="text-gray-500"><?php the_time('Y.m.d') ?></time>
							</h4>
						</div>
					</a>
					<?php wp_reset_postdata(); endwhile; endif; ?>


			</section>
		</aside>
	</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>