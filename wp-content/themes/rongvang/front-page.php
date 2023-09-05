<?php get_header() ?>
<style>
	.swiper-button-next:after, .swiper-button-prev:after{
		color: #d30000;
	}
</style>
<main>
	<div id="ctl00_divCenter" class="middle-fullwidth">
		<section class="banner-home">
			<img class="img-cus" src="<?php bloginfo('template_directory'); ?>/Data/Sites/1/Banner/bn.png" width="100%"
			     alt="">
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
							   href="<?php the_permalink() ?>"
							   title="<?php the_title() ?>">
								<div class="img">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail() ?>
									<?php else: ?>
										<img src="<?php bloginfo('template_url') ?>/images/default-no-img.jpg"
										     alt="">
									<?php endif; ?>
								</div>
								<div class="caption">
									<p class="name"><?php the_title() ?></p>
									<p class="wattage"></p>
									<p class="view-more">Xem chi tiết</p>
								</div>
							</a>
						</div>
					<?php endwhile;
						wp_reset_postdata();endif; ?>

				</div>
				<a class="btn-view-all"
				   href="<?php bloginfo('url'); ?>/product/"
				   title="">TẤT CẢ SẢN PHẨM</a>

		</section>

		<div class='Module Module-333'>
			<div class='ModuleContent'>
				<section class="home-8 uk-section-large">
					<div class="uk-container">
						<div class="section-title uk-text-center">
							<h3>Khách hàng nói gì về chúng tôi</h3></div>
						<div class="news-list" style="max-width: 1000px;margin: auto;">
							<div class="uk-grid uk-grid-match" uk-grid="">
								<div class="wrapper uk-width-3-3@l">
									<div class="swiper-container">
										<div class="swiper-wrapper">
											<?php
											$args = array(
												'post_type' => 'y_kien_khach_hang', // You can add a custom post type if you like
												'posts_per_page' => 2, // limit of posts,
											);
											$primary_query = new WP_Query($args);
											wp_reset_query();
											query_posts($args);
											?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
												<div class="big-news uk-grid uk-grid-collapse uk-child-width-1-2@l swiper-slide"
												     uk-grid="" style="margin-bottom: 30px;">
													<div class="img">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail() ?>
														<?php else: ?>
															<img src="<?php bloginfo('template_url') ?>/images/default-no-img.jpg"
															     alt="">
														<?php endif; ?>
													</div>
													<div class="caption-wrapper">
														<div class="caption">
															<p class="title">
																<?php the_title() ?>
															</p>

															<p class="brief">
																<?php the_excerpt() ?>
															</p>
														</div>

													</div>
												</div>
											<?php endwhile;
												wp_reset_postdata();endif; ?>
										</div>
										<div class="swiper-button-prev"></div>
										<div class="swiper-button-next"></div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</section>
			</div>
		</div>


	</div>


</main>
<?php get_footer() ?>
<script>
    $(document).ready(function() {
// Swiper: Slider
        new Swiper('.swiper-container', {
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 1,
            paginationClickable: true,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    });

</script>