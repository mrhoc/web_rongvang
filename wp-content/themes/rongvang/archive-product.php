<?php get_header() ?>
<main>
	<div id="ctl00_divAlt1" class="altcontent1 cmszone">
		<section class="banner-sub">
			<div class='Module Module-283'>
				<div class='ModuleContent'>
					<div uk-slider="" class=" banner-wrapper">
						<ul class="uk-slider-items uk-child-width-1-1">
							<li>
								<img src="<?php bloginfo('template_directory'); ?>/Data/Sites/1/Banner/1.jpg" alt="">
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="breadcrumb-wrapper uk-position-center uk-width-1-1">
				<div class="uk-container">
					<div class='Module Module-222'>
						<div class='ModuleContent'>
							<div class="zone-title">
								<h1>Thiết bị phụ kiện</h1>
							</div>
						</div>
					</div>
					<div class='Module Module-223'>
						<ol class='breadcrumb' >

							<li><a href='/' class='itemcrumb' ><span itemprop='name'>Trang chủ</span></a>
								<meta itemprop='position' content='0'>
							</li>
							<li><a
										href='#' class='itemcrumb active'
										itemprop='item' itemtype='http://schema.org/Thing'><span itemprop='name'>Thiết bị phụ kiện</span></a>
								<meta itemprop='position' content='1'>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div id="ctl00_divCenter" class="middle-fullwidth">
		<section class="product-section uk-section-large">
			<div class="uk-container">
				<div class="uk-grid" uk-grid="">
					<div class="wrapper uk-width-1-4@l">
						<div class="product-sidenav-wrapper">
							<div class="product-sidenav-item">
								<div class='Module Module-285'>
									<div class='ModuleContent'>
										<div uk-accordion="active: 0">
											<div class="product-sidenav-zone"><a
														class="sidenav-title uk-accordion-title" href="#"><span>Danh mục sản phẩm</span><em
															class="lnr lnr-chevron-down"></em></a>
												<div class="uk-accordion-content">
													<ul>
														<?php
														$taxonomy = 'category_product'; // Replace with the actual taxonomy name
														$terms = get_terms(array(
															'taxonomy' => $taxonomy,
															'hide_empty' => false,
														));

														if (!empty($terms) && !is_wp_error($terms)) {
															foreach ($terms as $term) {
																$term_name = $term->name;
																$term_link = get_term_link($term);

																echo '<li><a href="' . esc_url($term_link) . '">' . esc_html($term_name) . '</a></li>';
															}
														}
														?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wrapper uk-width-3-4@l">
						<div class='Module Module-287'>
							<div class='ModuleContent'>
								<div class="product-heading">
									<div class="product-title">
										<h2>Thiết bị phụ kiện</h2>
									</div>
								</div>
								<section class="ajaxresponse">
									<div class="product-view product-view-grid" style="display: block;">
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
									</div>
								</section>

								<div id="ctl00_mainContent_ctl05_ctl00_divPager" class="pages productpager" style="margin-top: 50px;">
									<div class='modulepager'>
										<?php custom_post_type_pagination()?>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>


	</div>


</main>
<?php get_footer() ?>
