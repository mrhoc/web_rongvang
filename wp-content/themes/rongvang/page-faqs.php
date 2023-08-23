<?php get_header() ?>
<main>
	<div id="ctl00_divAlt1" class="altcontent1 cmszone">
		<section class="banner-sub">
			<div class='Module Module-236'>
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
								<h1>FAQs</h1>
							</div>
						</div>
					</div>
					<div class='Module Module-223'>
						<ol class='breadcrumb' itemscope='' itemtype='http://schema.org/BreadcrumbList'>

							<li ><a
										href='/' class='itemcrumb' ><span
											itemprop='name'>Trang chủ</span></a>
								<meta itemprop='position' content='0'>
							</li>

							<li ><a href='/faqs' class='itemcrumb' itemprop='item'><span itemprop='name'>FAQs</span></a>
								<meta itemprop='position' content='1'>
							</li>


						</ol>
					</div>
				</div>
			</div>
		</section>

	</div>

	<div id="ctl00_divCenter" class="middle-fullwidth">

		<section class="faq-section uk-section-large">
			<div class="uk-container">
				<div class="uk-grid" uk-grid="">
					<div class='wrapper uk-width-1-3@l Module Module-238'>
						<div class='ModuleContent'>
							<div class="img"><img alt="" src="<?php bloginfo('template_directory'); ?>/Data/Sites/1/default/img/faq/1.jpg"/></div>
						</div>
					</div>
					<div class="wrapper uk-width-2-3@l">
						<div class="faq-wrapper">
<!--							<div class='Module Module-239'>-->
<!--								<div class='ModuleContent'>-->
<!--									<div class="faq-nav">-->
<!--										<ul>-->
<!--											<li class="active"><a-->
<!--														href="https://www.ttcenergy.vn/faqs/dien-mat-troi-gia-dinh"-->
<!--														title="Điện mặt trời gia đình"><img-->
<!--															src="--><?php //bloginfo('template_directory'); ?><!--/Data/Sites/1/media/faq/1.png"-->
<!--															alt="Điện mặt trời gia đình"><span>Điện mặt trời gia đình</span></a>-->
<!--											</li>-->
<!--											<li>-->
<!--												<a href="https://www.ttcenergy.vn/faqs/dien-mat-troi-doanh-nghiep"-->
<!--												   title="Điện mặt trời doanh nghiệp"><img-->
<!--															src="--><?php //bloginfo('template_directory'); ?><!--/Data/Sites/1/media/faq/2.png"-->
<!--															alt="Điện mặt trời doanh nghiệp"><span>Điện mặt trời doanh nghiệp</span></a>-->
<!--											</li>-->
<!--											<li><a href="https://www.ttcenergy.vn/faqs/mot-so-cau-hoi-khac"-->
<!--											       title="Một số câu hỏi khác"><img-->
<!--															src="--><?php //bloginfo('template_directory'); ?><!--/Data/Sites/1/media/faq/3.png"-->
<!--															alt="Một số câu hỏi khác"><span>Một số câu hỏi khác</span></a>-->
<!--											</li>-->
<!--										</ul>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
							<div class='Module Module-240'>
								<div class='ModuleContent'>
									<div class="faq-container ajaxresponse">
										<ul class="faq-list ajaxresponsewrap" uk-accordion="">
											<?php
											global $paged;
											$curpage = $paged ? $paged : 1;
											$args = array(
												'paged' => $curpage,
												'post_type' => 'cau_hoi_thuong_gap', // You can add a custom post type if you like
												'posts_per_page' => 12, // limit of posts,
											);
											$primary_query = new WP_Query($args);
											wp_reset_query();
											query_posts($args);
											?>
											<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
												<li>
													<a class="uk-accordion-title" href="#">
        <span class="number">
        </span>
														<span class="title"><?php the_title()?></span>
													</a>
													<div class="uk-accordion-content"><?php the_content()?>
													</div>
												</li>
											<?php endwhile;wp_reset_postdata();endif; ?>

										</ul>
									</div>
									<div id="ctl00_mainContent_ctl02_ctl00_divPager" class="pages newspager">
										<div class='modulepager'>
											<?php custom_post_type_pagination()?>
										</div>
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
