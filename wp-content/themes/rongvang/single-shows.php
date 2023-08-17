<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<header class="w-full rounded shadow">
		<div class="container flex items-end justify-center max-w-screen-lg relative h-48">
			<h3 class="text-xl mb-2 px-2 py-1 text-white z-10 bg-gray-800">
				<?php the_title() ?></h3>
			<div class="absolute top-0 left-0 w-full h-full" style="box-shadow: inset 0 0 50px 0 #000000;"></div>
			<?php if (get_the_post_thumbnail()): ?>
				<?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'absolute top-0 left-0 w-full h-full object-cover')); ?>
			<?php else: ?>
				<span><img class="absolute top-0 left-0 w-full h-full object-cover"
				           src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png"></span>
			<?php endif; ?>
		</div>
	</header>
	<main>
		<div class="flex">

			<?php
			$terms = get_the_terms($post->ID, 'news_tax');
			if ($terms) : foreach ($terms as $term): ?>
				<div class="flex items-center">
					<a class="flex border rounded-md px-2 py-1 mr-1"
					   href="<?php echo get_term_link($term->slug, 'news_tax') ?>">
						<img class="w-4 h-4 object-contain mr-1"
						     src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="">
						<span class="text-xs"><?php echo $term->name ?></span>
					</a>
				</div>
			<?php endforeach; endif; ?>
		</div>
		<div class="flex flex-col gap-y-4">
			<div class="media-tabs" scrollable>
				<h3 class="media-tab flex flex-shrink-0 items-center px-4 md:px-8 select-none cursor-pointer hover:opacity-75"
				    data-tab-id="1" data-active="true">
					<div class="icon icon-4 icon-video-alt-white mr-2"></div>
					<span class="text-sm font-semibold">Full Show</span>
				</h3>
			</div>
			<div class="media-tab-content " data-tab-id="1" data-active="true">
				<?php if (get_field('main_player_-_full_show')): ?>
					<div class="link-block">
						<div class="hidden-link"><a target="_blank" href="<?php echo get_field('main_player_-_full_show')?>">Main Player - Full Show</a></div>
					</div>
				<?php endif; ?>
				<?php if (get_field('main_player_-_full_show')): ?>
					<div class="link-block">
						<div class="hidden-link"><a target="_blank" href="<?php echo get_field('alternative_player_-_full_show')?>">Alternative Player - Full Show</a></div>
					</div>
				<?php endif; ?>
				<?php if (get_field('main_player_-_full_show')): ?>
					<div class="link-block">
						<div class="hidden-link"><a target="_blank" href="<?php echo get_field('fast_direct_link_-_full_show')?>">Fast Direct Link - Full Show</a></div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</main>
<?php endwhile; endif; ?>
<?php get_footer() ?>