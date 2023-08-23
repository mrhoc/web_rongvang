<?php get_header() ?>
<style>
	input{
		height: 40px;
	}
	label{
		font-weight: bold;
	}
	.wpcf7-submit{
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: 8.125rem;
		height: 30px;
		border-radius: 5px;
		border: 1px solid #959595;
		font-size: 12px;
		line-height: 1;
		margin: 0px auto 0;
		transition: 0.3s all;
	}
	span.wpcf7-not-valid-tip {
		display: block;
		font-weight: 400;
		font-size: 13px;
		color: red;
		margin-top: 5px;
	}
	.screen-reader-response{
		display: none;
	}
</style>
<main>
	<div id="ctl00_divAlt1" class="altcontent1 cmszone">
		<section class="banner-sub">
			<div class='Module Module-307'>
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
								<h1>Liên hệ</h1>
							</div>
						</div>
					</div>
					<div class='Module Module-223'>
						<ol class='breadcrumb' >
							<li><a href='/' class='itemcrumb'><span>Trang chủ</span></a></li>
							<li><a href='/lien-he/' class='itemcrumb active'><span>Liên hệ</span></a></li>
						</ol>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div id="ctl00_divCenter" class="middle-fullwidth">
		<section class="contact-1 uk-section">
			<div class="uk-container">
				<div class="uk-grid uk-grid-collapse uk-grid-match" uk-grid="">
					<div class="wrapper uk-width-3-5@l">
						<div class='contact-form Module Module-308'>
							<div class='ModuleContent'>
								<div id="ctl00_mainContent_ctl00_pnlFormWizard">
									<div id="ctl00_mainContent_ctl00_pnlForm" class="wrap-form"">
										<h2>Liên hệ với chúng tôi</h2>
										<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
											<?php the_content()?>
										<?php endwhile;endif;?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wrapper uk-width-2-5@l">
						<div class="contact-info">
							<div class='Module Module-309'>
								<div class='ModuleContent'><h2>Thông tin liên hệ</h2>
									<div class="info">
										<ul>
											<li><strong>Hotline</strong><span>(+84) 902 248 918</span></li>
											<li><strong>email</strong><span>phanthutrang2010@gmail.com</span></li>
											<li><strong>Website</strong><span>www.demo.vn</span></li>
										</ul>
									</div>
									<div class="social">
										<a href="#"><span
													class="fab fa-facebook-f"></span></a>
										<a href="#"><span class="fab fa-youtube"></span></a>
										<a href="#"><span class="mdi mdi-linkedin"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>
		<div class='Module Module-311'>
			<div class='ModuleContent'>
				<section class="contact-2">
					<div class="uk-container">
						<div class="address-slider uk-position-relative">
							<div uk-slider="">
								<div class="">
									<div>
										<div class="item">

											<div class="content">
												<p class="title">Công ty TNHH Kiến trúc XD và VT Rồng Vàng</p>
												<p class="address">373 An Dương Vương, Tây Hồ, Hà Nội</p>
												<p class="phone">
													<strong> (+84) 902 248 918</strong>
												</p>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1172.556327308433!2d105.7978041400074!3d21.087273887351746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aab9524ac835%3A0x1042b7e0721b7553!2zMzczIEFuIETGsMahbmcgVsawxqFuZywgUGjhu5EgVGjGsOG7o25nIFRo4buleSwgVMOieSBI4buTLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1692775580965!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</section>
			</div>
		</div>

	</div>


</main>
<?php get_footer() ?>
