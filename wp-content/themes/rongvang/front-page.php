<?php get_header() ?>
	<main>
		<div id="ctl00_divCenter" class="middle-fullwidth">
			<section class="banner-home">
				<div class='Module Module-220'>
					<div class='ModuleContent'>
						<div class="uk-position" uk-slideshow="autoplay: true; ratio: 1920:900">
							<ul class="uk-slideshow-items">
								<li>
									<a class="uk-display-block" href="#"
									   title="">
										<img src="<?php bloginfo('template_directory'); ?>/Data/Sites/1/Banner/g%C3%B3i-%C6%B0u-%C4%91%C3%A3i-h%E1%BB%99-gia-%C4%91%C3%ACnh.jpg"
										     alt="">
									</a>
								</li>
								<li>
									<a class="uk-display-block"
									   href="#"
									   title="">
										<img src="<?php bloginfo('template_directory'); ?>/Data/Sites/1/Banner/tuy%E1%BB%83n-%C4%91%E1%BA%A1i-l%C3%BD.jpg"
										     alt="">
									</a>
								</li>
							</ul>
							<div class="banner-pagination uk-position-bottom-left uk-width-1-1">
								<div class="uk-container">
									<ul class="uk-slideshow-nav uk-dotnav">
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class='Module Module-320'>
				<div class='ModuleContent'>

				</div>
			</div>

			<section class="home-3 uk-section-large"
			         style="background-image: url(<?php bloginfo('template_directory'); ?>/Data/Sites/1/skins/default/img/bg-3.jpg)">
				<div class="uk-container">
					<div class='Module Module-324'>
						<div class='ModuleContent'>
							<div class="section-title uk-text-center">
								<p>SẢN PHẨM TIÊU CHUẨN VÀ CHẤT LƯỢNG</p>
								<h3>Thiết bị &amp; phụ kiện</h3>
							</div>
						</div>
					</div>

					<div class="uk-grid uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-match"
					>
						<?php
						global $paged;
						$curpage = $paged ? $paged : 1;
						$args = array(
							'paged' => $curpage,
							'post_type' => 'product', // You can add a custom post type if you like
							'posts_per_page' => 12, // limit of posts,
						);
						$primary_query = new WP_Query($args);
						wp_reset_query();
						query_posts($args);
						?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="wrapper">
								<a class="product-item"
								   href="<?php the_permalink()?>"
								   title="<?php the_title()?>">
									<div class="img">
										<?php if (has_post_thumbnail()): ?>
											<?php the_post_thumbnail() ?>
										<?php else: ?>
											<img src="<?php bloginfo('template_url') ?>/images/default-no-img.jpg"
											     alt="">
										<?php endif; ?>
									</div>
									<div class="caption">
										<p class="name"><?php the_title()?></p>
										<p class="wattage"></p>
										<p class="view-more">Xem chi tiết</p>
									</div>
								</a>
							</div>
						<?php endwhile;wp_reset_postdata();endif; ?>

					</div>
					<a class="btn-view-all"
					   href="<?php bloginfo('url'); ?>/product/"
					   title="">TẤT CẢ SẢN PHẨM</a>

			</section>





		</div>


	</main>
<?php get_footer()?>
