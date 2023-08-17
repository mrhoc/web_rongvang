<?php get_header(); ?>

<?php
$term = get_queried_object();
$parent_term = get_term_by('id', $term->parent, 'news_tax');
if ($term->parent == 108) :?>
	<!--	layout teams-->
	<header class="w-full rounded shadow">
		<div class="container flex flex-col items-center justify-center max-w-screen-lg">
			<div class="flex flex-col w-full mt-12">
				<div class="flex justify-center items-center">
					<img class="w-8 h-8 mr-2" src="<?php echo z_taxonomy_image_url();?>"
					     alt="Olympique Lyonnais">
					<h1 class="text-2xl"><?php echo $term->name ?></h1>
				</div>
				<!--				<div class="flex flex-wrap items-center justify-center mt-2">-->
				<!--					<div class="flex justify-center items-center mx-1" href="-->
				<?php //echo get_field('link_twitter')
				?><!--">-->
				<!--						<div class="icon icon-map-gray icon-4 mr-1"></div>-->
				<!--						<h3 class="text-base tracking-tight">--><?php //echo get_field('stadium')
				?><!--</h3>-->
				<!--					</div>-->
				<!--					<a class="flex justify-center items-center mx-1 hover:opacity-75" href="-->
				<?php //echo get_field('link_twitter')
				?><!--" target="_blank">-->
				<!--						<div class="icon icon-twitter icon-4 mr-1"></div>-->
				<!--						<h3 class="text-base tracking-tight">OL</h3>-->
				<!--					</a>-->
				<!--				</div>-->
			</div>
			<nav class="tabs-nav flex justify-between overflow-x-scroll max-w-full mt-8 text-sm" scrollable>
				<a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
				   data-title="results" data-active="false" href="#results">
					<span>Results</span>
					<div class="icon icon-5 icon-ball-gray ml-2"></div>
				</a>
				<a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
				   data-title="fixtures" data-active="false" href="#fixtures">
					<span>Fixtures</span>
					<div class="icon icon-5 icon-calendar-gray ml-2"></div>
				</a>
				<a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
				   data-title="news" data-active="false" href="#news">
					<span>Latest News</span>
					<div class="icon icon-5 icon-news ml-2"></div>
				</a>
			</nav>
		</div>
	</header>
	<main>
		<div class="nav-content">
			<div class="tabs-page" data-title="results" data-active="false">
				<div class="match-list flex flex-col">
					<?php
					$args = array('post_type' => 'matches', 'posts_per_page' => 10,
						'tax_query' => array(
							array(
								'taxonomy' => 'news_tax',
								'field' => 'slug',
								'terms' => $term,
							)),
					);
					?>
					<?php query_posts($args);
					if (have_posts()): while (have_posts()) : the_post(); ?>
						<?php
						$event_date_time = get_field('infomation')['time'];
						$f = date("F", strtotime($event_date_time));
						$j = date("j", strtotime($event_date_time));
						$y = date("Y", strtotime($event_date_time));
						$g = date("g", strtotime($event_date_time));
						$i = date("i", strtotime($event_date_time));
						$filed_date_timestamp = strtotime($event_date_time); // Chuyển đổi thành timestamp
						$today_timestamp = strtotime(date('F j, Y g:i a')); // Lấy timestamp của ngày hiện tại
						?>
						<?php if ($filed_date_timestamp <= $today_timestamp) : ?>
							<section class="flex flex-col  gap-y-2">
								<article class="flex justify-between items-center text-sm text-gray-500 font-medium">
									<time class="text-left tracking-tight mr-1" datetime="2023-02-12T19:45:00.000Z"
									      data-type="date"><?php echo $f . ' ', $j . ', ' . $y ?></time>
									<!--								<a class="flex items-center" href="#">-->
									<!--									<img class="w-6 h-6 mr-2" src="/public/assets/img/leagues/ligue-1.png" alt="Ligue 1">-->
									<!--									<h3 class="text-left tracking-tight">Ligue 1</h3>-->
									<!--								</a>-->
								</article>
								<section class="flex border-b-2 border-gray-100 pb-2">
									<article class="flex w-full">
										<div class="flex w-1/12 justify-center items-center mr-2">
											<div class="px-2 py-1 rounded text-xs font-medium status-concluded"
											     spoilers="true">
												FT
											</div>
											<time class="px-2 py-1 rounded text-xs font-medium bg-gray-200"
											      datetime="2023-02-12T19:45:00.000Z" data-type="time" spoilers="false">
												<?php echo $g . ':' . $i ?>
											</time>
										</div>
										<a class="flex w-10/12 text-sm md:text-base"
										   href="<?php the_permalink() ?>">

											<div class="flex flex-grow justify-end items-center w-5/12">
											<span class="text-right">
												<?php
												teamgroup('team1', 'name1')
												?>
											</span>
												<img class="w-5 h-5 object-contain ml-2"
												     src="<?php echo teamgroup('team1','logo1') ?>"
												     alt="<?php the_title()?>">
											</div>
											<div class="flex justify-center items-center flex-shrink-0 w-1/12 text-sm font-medium">
												<span spoilers="false">vs</span>
												<span spoilers="true"><?php teamgroup('team1', 'score1') ?> - <?php teamgroup('team2', 'score2') ?></span>
											</div>
											<div class="flex flex-grow justify-start items-center w-5/12">
												<img class="w-5 h-5 object-contain mr-2"
												     src="<?php echo teamgroup('team2','logo2') ?>"
												     alt="Lens">
												<span class="text-left"><?php teamgroup('team2', 'name2') ?></span>
											</div>
										</a>
										<div class="flex justify-center items-center w-1/12">
											<div class="icon icon-6 icon-stats-gray"></div>
											<div class="icon icon-6 icon-video-gray"></div>
										</div>
									</article>
								</section>
							</section>
						<?php endif; ?>
						<?php wp_reset_postdata();endwhile;endif; ?>
				</div>
			</div>
			<div class="tabs-page" data-title="fixtures" data-active="false">
				<div class="match-list flex flex-col">
					<?php
					$args = array('post_type' => 'matches', 'posts_per_page' => 10,
						'tax_query' => array(
							array(
								'taxonomy' => 'news_tax',
								'field' => 'slug',
								'terms' => $term,
							)),
					);
					?>
					<?php query_posts($args);
					if (have_posts()): while (have_posts()) : the_post(); ?>
						<?php
						$event_date_time = get_field('infomation')['time'];
						$f = date("F", strtotime($event_date_time));
						$j = date("j", strtotime($event_date_time));
						$y = date("Y", strtotime($event_date_time));
						$g = date("g", strtotime($event_date_time));
						$i = date("i", strtotime($event_date_time));
						$filed_date_timestamp = strtotime($event_date_time); // Chuyển đổi thành timestamp
						$today_timestamp = strtotime(date('F j, Y g:i a')); // Lấy timestamp của ngày hiện tại
						?>
						<?php if ($filed_date_timestamp > $today_timestamp) : ?>
							<section class="flex flex-col  gap-y-2">
								<article class="flex justify-between items-center text-sm text-gray-500 font-medium">
									<time class="text-left tracking-tight mr-1" datetime="2023-02-12T19:45:00.000Z"
									      data-type="date"><?php echo $f . ' ', $j . ', ' . $y ?></time>
									<!--								<a class="flex items-center" href="#">-->
									<!--									<img class="w-6 h-6 mr-2" src="/public/assets/img/leagues/ligue-1.png" alt="Ligue 1">-->
									<!--									<h3 class="text-left tracking-tight">Ligue 1</h3>-->
									<!--								</a>-->
								</article>
								<section class="flex border-b-2 border-gray-100 pb-2">
									<article class="flex w-full">
										<div class="flex w-1/12 justify-center items-center mr-2">
											<div class="px-2 py-1 rounded text-xs font-medium status-concluded"
											     spoilers="true">
												FT
											</div>
											<time class="px-2 py-1 rounded text-xs font-medium bg-gray-200"
											      datetime="2023-02-12T19:45:00.000Z" data-type="time" spoilers="false">
												<?php echo $g . ':' . $i ?>
											</time>
										</div>
										<a class="flex w-10/12 text-sm md:text-base"
										   href="<?php the_permalink() ?>">

											<div class="flex flex-grow justify-end items-center w-5/12">
											<span class="text-right">
												<?php
												teamgroup('team1', 'name1')
												?>
											</span>
												<img class="w-5 h-5 object-contain ml-2"
												     src="<?php teamgroup('team1','logo1')?>"
												     alt="Olympique Lyonnais">
											</div>
											<div class="flex justify-center items-center flex-shrink-0 w-1/12 text-sm font-medium">
												<span spoilers="false">vs</span>
												<span spoilers="true"><?php teamgroup('team1', 'score1') ?> - <?php teamgroup('team2', 'score2') ?></span>
											</div>
											<div class="flex flex-grow justify-start items-center w-5/12">
												<img class="w-5 h-5 object-contain mr-2"
												     src="<?php teamgroup('team2','logo2')?>"
												     alt="Lens">
												<span class="text-left"><?php teamgroup('team2', 'name2') ?></span>
											</div>
										</a>
										<div class="flex justify-center items-center w-1/12">
											<div class="icon icon-6 icon-stats-gray"></div>
											<div class="icon icon-6 icon-video-gray"></div>
										</div>
									</article>
								</section>
							</section>
						<?php endif; ?>
						<?php wp_reset_postdata();endwhile;endif; ?>
				</div>
			</div>
			<div class="tabs-page" data-title="news" data-active="false">
				<section class="news-list" paginated>
					<?php
					$args = array('post_type' => 'news', 'posts_per_page' => 10,
						'tax_query' => array(
							array(
								'taxonomy' => 'news_tax',
								'field' => 'slug',
								'terms' => $term,
							)),
					);
					?>
					<?php query_posts($args);
					if (have_posts()): while (have_posts()) : the_post(); ?>
						<a class="news-article" href="<?php the_permalink() ?>">
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
													echo $term->name;
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
									<?php the_title() ?>
								</h3>
								<h4 class="flex justify-between text-xs mt-2">
									<span>by <strong><?php the_author() ?>></strong></span>
									<time><?php the_time('Y.m.d') ?></time>
								</h4>
							</div>
						</a>
						<?php wp_reset_postdata();endwhile;endif; ?>

				</section>
			</div>
		</div>
	</main>

<?php else: ?>
	<!--	layout leagues-->
	<header class="w-full rounded shadow">
		<div class="container flex flex-col items-center justify-center max-w-screen-lg">
			<div class="flex flex-col w-full mt-12">
				<div class="flex justify-center items-center">
					<img class="w-8 h-8 mr-2" src="<?php echo z_taxonomy_image_url(); ?>" alt="Ligue 1">
					<h1 class="text-2xl"><?php echo $term->name ?> - <?php echo $parent_term->name ?></h1>
				</div>
				<div class="flex justify-center mt-1">
					<h1 class="text-base text-gray-500">2022/2023</h1>
				</div>
			</div>
			<nav class="tabs-nav flex justify-between overflow-x-scroll max-w-full mt-8 text-sm" scrollable>
				<a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
				   data-title="calendar" data-active="false" href="#calendar">
					<span>Results & Fixtures</span>
					<div class="icon icon-5 icon-calendar-gray ml-2"></div>
				</a>
				<a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
				   data-title="news" data-active="false" href="#news">
					<span>Latest News</span>
					<div class="icon icon-5 icon-news ml-2"></div>
				</a>
				<a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
				   data-title="shows" data-active="false" href="#shows">
					<span>Shows</span>
					<div class="icon icon-5 icon-video-gray ml-2"></div>
				</a>
			</nav>
		</div>
	</header>
	<main>
		<div class="nav-content">
			<div class="tabs-page" data-title="calendar" data-active="false">
				<div class="flex flex-col">
					<div class="season-select flex justify-center mb-4" data-league-id="301" data-season-id="19745"
					     data-current-stage-id="77457884" data-current-round-id="275119">
						<select class="stage-list mx-2 pl-2 pr-10 py-1 text-sm border-gray-300 rounded"
						        autocomplete="off">
							<option value="77457884">Regular Season</option>
						</select>
						<select class="round-list mx-2 pl-2 pr-10 py-1 text-sm border-gray-300 rounded disabled:opacity-25"
						        autocomplete="off">
							<option value="274934" data-stage-id="77457884">Round 1</option>
							<option value="274935" data-stage-id="77457884">Round 2</option>
							<option value="274936" data-stage-id="77457884">Round 3</option>

						</select>
					</div>
					<div class="match-list">
						<?php
						$term_parent_id = $term->parent; // ID của term cha
						$taxonomy = 'news_tax'; // Thay your_taxonomy bằng slug của custom taxonomy của bạn
						$args = array(
							'post_type' => 'matches',
							 'posts_per_page' => -1,
							'tax_query' => array(
								'relation' => 'OR',
								array(
									'taxonomy' => $taxonomy,
									'field' => 'term_id',
									'terms' => $term_parent_id,
									'include_children' => false // chỉ lấy bài viết của term cha
								),
								array(
									'taxonomy' => $taxonomy,
									'field' => 'parent',
									'terms' => $term_parent_id,
									'include_children' => true // lấy bài viết của term con và term con của term con
								),
							),
						);

						$query = new WP_Query($args);

						if ($query->have_posts()) {
							$events = array();
							while ($query->have_posts()) {
								$query->the_post();
								$event_date_time = get_field('infomation')['time'];
								$date = date('F j, Y', strtotime($event_date_time));
								$time = date('g:i a', strtotime($event_date_time));

								$f = date("F", strtotime($event_date_time));
								$j = date("j", strtotime($event_date_time));
								$y = date("Y", strtotime($event_date_time));
								$g = date("g", strtotime($event_date_time));
								$i = date("i", strtotime($event_date_time));

								if (have_rows('infomation')):
									while (have_rows('infomation')) : the_row();
										if (have_rows('team1')):
											while (have_rows('team1')) : the_row();
												$name1 = get_sub_field('name1');
												$score1 = get_sub_field('score1');
												$logo1 = get_sub_field('logo1');
											endwhile;
										endif;
										if (have_rows('team2')):
											while (have_rows('team2')) : the_row();
												$name2 = get_sub_field('name2');
												$score2 = get_sub_field('score2');
												$logo2 = get_sub_field('logo2');
											endwhile;
										endif;
									endwhile;
								endif;
								$events[$date][] = array(
									'title' => get_the_title(),
									'time' => $time,
									'team1'=>$name1,
									'score1'=>$score1,
									'team2'=>$name2,
									'score2'=>$score2,
									'link'=>get_the_permalink(),
									'logo1'=>$logo1,
									'logo2'=>$logo2
								);
							}
							wp_reset_postdata();

							foreach ($events as $date => $event_day) {
								echo '<section class="match-list-head">';
								echo '<article class="match-list-date">
								<time datetime="2023-02-12T19:45:00.000Z" data-type="date">' . $date . '</time>
								</article>';
								usort($event_day, function ($a, $b) {
									return strtotime($a['time']) - strtotime($b['time']);
								});

								foreach ($event_day as $event) {
									echo '<section class="match-list-body">
								<article>
									<div class="match-list-status">
										<div class="status-concluded" spoilers="true">
											FT
										</div>
										<time class="bg-gray-200" datetime="2023-02-12T19:45:00.000Z"
										      data-type="time"
										      spoilers="false">' .$g. ' : ' .$i.'
										</time>
									</div>
									<a class="match-list-content"
									   href="'.$event['link'].'">
										<div class="match-list-home">
											<img src="'.$event['logo1'].'"
											     alt="'.$event['link'].'">
											<span>'.$event['team1'].'</span>
											<div class="match-list-scorebox">
												<span spoilers="true">'.$event['score1'].'</span>
												<span spoilers="false">-</span>
											</div>
										</div>
										<div class="match-list-away">
											<img src="'.$event['logo2'].'"
											     alt="'.$event['title'].'">
											<span>'.$event['team2'].'</span>
											<div class="match-list-scorebox">
												<span spoilers="true">'.$event['score2'].'</span>
												<span spoilers="false">-</span>
											</div>
										</div>
									</a>
									<div class="match-list-extra">
										<div class="icon icon-6 icon-stats-gray"></div>
										<div class="icon icon-6 icon-video-gray"></div>
									</div>
								</article>
							
							</section>';
								}
								echo '</section>';
							}
						}
						?>

					</div>
				</div>
			</div>
			<div class="tabs-page" data-title="news" data-active="false">
				<section class="news-list" paginated>
					<?php
					$args = array('post_type' => 'news', 'posts_per_page' => 20,
						'tax_query' => array(
							array(
								'taxonomy' => 'news_tax',
								'field' => 'slug',
								'terms' => $term,
							)),
					);
					?>
					<?php query_posts($args);
					if (have_posts()): while (have_posts()) : the_post(); ?>
						<a class="news-article" href="<?php the_permalink() ?>">
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
													echo $term->name;
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
									<?php the_title() ?>
								</h3>
								<h4 class="flex justify-between text-xs mt-2">
									<span>by <strong><?php the_author() ?>></strong></span>
									<time><?php the_time('Y.m.d') ?></time>
								</h4>
							</div>
						</a>
						<?php wp_reset_postdata();endwhile;endif; ?>

					<a class="news-article"
					   href="<?php the_permalink() ?>>">
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
												echo $term->name;
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
								<div class="flex items-center">
									<span>by <strong><?php the_author() ?>></strong></span>
								</div>
								<time><?php the_time('Y.m.d') ?></time>
							</h4>
						</div>
					</a>

				</section>
				<div class="pagination" data-items-total="40" data-pageination-parent="news-list"
				     data-is-first-page="true" data-is-last-page="false" data-args="news?leagueId=301">

				</div>
			</div>
			<div class="tabs-page" data-title="shows" data-active="false">
				<section class="show-list" paginated>
					<?php
					$args = array('post_type' => 'shows', 'posts_per_page' => 20,
						'tax_query' => array(
							array(
								'taxonomy' => 'news_tax',
								'field' => 'slug',
								'terms' => $term,
							)),
					);
					?>
					<?php query_posts($args);
					if (have_posts()): while (have_posts()) : the_post(); ?>
						<article class="show-item">
							<a href="<?php the_permalink()?>">
								<?php if (get_the_post_thumbnail()): ?>
									<?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'show-item-image' ) ); ?>
								<?php else: ?>
									<span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png"></span>
								<?php endif; ?>
								<h3 class="show-item-info">
									<span><?php echo the_title() ?></span>
									<time><?php the_time('Y.m.d')?></time>
								</h3>
							</a>
						</article>
					<?php wp_reset_postdata();endwhile;endif;?>


				</section>
				<div class="pagination" data-items-total="359" data-pageination-parent="show-list"
				     data-is-first-page="true" data-is-last-page="false" data-args="shows?leagueId=301">

				</div>
			</div>
		</div>
	</main>
<?php endif; ?>


<?php get_footer(); ?>
