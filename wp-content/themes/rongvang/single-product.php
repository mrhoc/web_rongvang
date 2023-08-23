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
							<ol class='breadcrumb'>
								<li><a href='/' class='itemcrumb'><span
												itemprop='name'>Trang chủ</span></a>
									<meta itemprop='position' content='0'>
								</li>

								<li><a href='/product/' class='itemcrumb'><span>Thiết bị phụ kiện</span></a>
								</li>
								<li ><?php the_title()?></li>
							</ol>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div id="ctl00_divCenter" class="middle-fullwidth">
			<div class='Module Module-287'>
				<div class='ModuleContent'>
					<div id="ctl00_mainContent_ctl00_ctl00_pnlInnerWrap">
						<div class="uk-container">
							<div class="product-detail-top uk-section">
								<div class="uk-grid" uk-grid="">
									<div class="wrapper uk-width-3-5@l">
										<div class="product-image-list">
											<div class="thumbnail-slide">
												<div class="swiper-prev">
              <span class="lnr lnr-chevron-up">
              </span>
												</div>
												<div class="swiper-next">
              <span class="lnr lnr-chevron-down">
              </span>
												</div>
												<div class="swiper-container">
													<div class="swiper-wrapper">
														<?php
														$images = get_field('images'); // Replace 'images' with the actual field name
														if ($images) {
															foreach ($images as $image) {
																if (!empty($image['url'])) {
																	$image_url = $image['url'];
																	$image_alt = $image['alt'];

																	echo '<div class="swiper-slide"><div class="img"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '"></div></div>';
																}
															}
														}
														?>
													</div>
												</div>
											</div>
											<div class="image-slide">
												<div class="swiper-container">
													<div class="swiper-wrapper">
														<?php
														$images = get_field('images'); // Replace 'images' with the actual field name
														if ($images) {
															foreach ($images as $image) {
																if (!empty($image['url'])) {
																	$image_url = $image['url'];
																	$image_alt = $image['alt'];

																	echo '<div class="swiper-slide"><div class="img"><img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '"></div></div>';
																}
															}
														}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="wrapper uk-width-2-5@l">
										<div class="product-detail-info">
											<p class="name"><?php the_title()?></p>
											<div class="status-wrapper">
												<div class="logo">
<!--													<img src="" alt="">-->
												</div>
												<div class="status in-stock">
													<strong>Trạng thái: </strong>
													<span>Còn hàng</span>
												</div>
											</div>
											<div class="content">
												<table>
													<tbody>
													<tr>
														<td>Tên sản phẩm</td>
														<td><?php the_title()?></td>
													</tr>
													<?php get_data_field('Mã sản phẩm:','ma_san_pham')?>
													<?php get_data_field('Thương hiệu','thuong_hieu')?>
													<?php get_data_field('Công suất:','cong_suat')?>
													<?php get_data_field('Chủng loại:','chung_loai')?>
													<?php get_data_field('Khối Lượng:','khoi_luong')?>
													<?php get_data_field('Kích thước:','kick_thuoc')?>
													<?php get_data_field('Bảo Hành:','bao_hanh')?>
													</tbody>
												</table>
											</div>
											<div class="product-contact">
												<a class="btn-contact btn-border-blue" href="/lien-he">Liên hệ</a>
												<div class="product-share">
													<ul>
														<li>
															<a href="#" onclick="window.open('https://facebook.com/share.php?u=<?php echo home_url($_SERVER['REQUEST_URI'])?>', '_blank', 'top=150,left=400,width=450,height=550')" data-toggle="tooltip" data-placement="top"
															   title="<?php the_title()?>"><span class="fab fa-facebook-f"></span></a>
														</li>
														<li>
															<a href="#" class="share-twitter" onclick="window.open('https://twitter.com/intent/tweet?url=<?php echo home_url($_SERVER['REQUEST_URI'])?>', '_blank', 'top=150,left=400,width=550,height=350')"
															   data-toggle="tooltip" data-placement="top"
															   title="<?php the_title()?>"><span class="fab fa-twitter"></span></a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="product-detail-attributes">
								<div class="switcher-tab">
									<ul uk-switcher="connect: .attributes-tab; swiping: false">
										<?php
										if(get_field('thong_tin_san_pham')){
											echo '<li>
											<a href="#">
												<em class="mdi mdi-view-headline">
												</em>
												<span>Thông tin Sản phẩm</span>
											</a>
										</li>';
										}
										?>
										<?php
											if(get_field('datasheet')){
												echo '<li>
											<a href="#">
												<em class="mdi mdi-star">
												</em>
												<span>Tính năng nổi bật</span>
											</a>
										</li>';
											}
										?>

									</ul>
								</div>
								<div class="attributes-tab uk-switcher">
									<?php if(get_field('thong_tin_san_pham')):?>
										<div class="tab-content tab-content-1">
											<div class="content">
												<?php echo get_field('thong_tin_san_pham')?>
											</div>
										</div>
									<?php endif;?>
									<?php if(get_field('datasheet')):?>
										<div class="tab-content tab-content-2">
											<div class="content">
												<?php echo get_field('datasheet')?>
											</div>
										</div>
									<?php endif;?>
								</div>
							</div>
							<div class="product-detail-related uk-section">
								<?php
								$terms = get_the_terms(get_the_ID(), 'category_product');
								if ($terms && !is_wp_error($terms)) {?>
									<div class="section-title uk-text-center">
										<h3>SẢN PHẨM LIÊN QUAN</h3>
									</div>
									<div class="product-related-slider uk-position-relative">
										<div uk-slider="finite: true">
											<ul class="uk-slider-items uk-grid uk-child-width-1-4@l uk-child-width-1-2@s">
												<?php
												$term_ids = array();
												foreach ($terms as $term) {
													$term_ids[] = $term->term_id;
												}

												$args = array(
													'post_type' => 'product',
													'posts_per_page' => 12,
													'tax_query' => array(
														array(
															'taxonomy' => 'category_product',
															'field' => 'term_id',
															'terms' => $term_ids,
															'operator' => 'IN',
														),
													),
													'orderby'        => 'modified',
													'order'          => 'DESC',
													'suppress_filters' => false,
													'post__not_in' => array(get_the_ID()),
												);

												$related_posts = get_posts($args);?>

												<?php
												if ($related_posts) {?>
													<?php
													foreach ($related_posts as $post) { setup_postdata($post);?>
														<li>
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
														</li>
													<?php } wp_reset_postdata();?>

												<?php }?>
											</ul>
											<a class="uk-position-center-left uk-position-small" href="#"
											   uk-slidenav-previous="" uk-slider-item="previous"><span class="mdi mdi-chevron-left"></span>
											</a>
											<a class="uk-position-center-right uk-position-small" href="#"
											   uk-slidenav-next="" uk-slider-item="next"><span class="mdi mdi-chevron-right"></span>
											</a>
										</div>
									</div>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer() ?>