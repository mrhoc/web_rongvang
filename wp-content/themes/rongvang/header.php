<!DOCTYPE html>
<html lang="en" class="spoilers-off">
<head>
	<script>
        if (!localStorage.spoilers) {
            localStorage.spoilers = "off";
        } else if (localStorage.spoilers) {
            if (localStorage.spoilers === 'on') {
                document.documentElement.className = 'spoilers-on';
            } else {
                document.documentElement.className = 'spoilers-off';
            }
        }
	</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/custome.css?v=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
	<script defer
			src="https://code.jquery.com/jquery-3.6.3.min.js"
			integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
			crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/style.js" defer></script>
	<link rel="apple-touch-icon" sizes="180x180"
	      href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="16x16"
	      href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32"
	      href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-32x32.png">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon-16x16.ico">
	<meta name="description"
	      content="All the latest football news, statistics, standings, top scorers, videos and more. Spoiler-free.">
	<meta name="image" content="">
	<meta property="og:title" content="Spoiler-free football news, stats, videos.">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<meta property="og:description"
	      content="All the latest football news, statistics, standings, top scorers, videos and more. Spoiler-free.">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:description"
	      content="All the latest football news, statistics, standings, top scorers, videos and more. Spoiler-free.">
	<meta name="twitter:image" content="">
	<title></title>
	<?php wp_head(); ?>
</head>
<body  has-nav has-media <?php if(is_singular('matches')) {echo '';echo ' class="spoilers-on single-matches"';}?>>
<nav class="main-menu main-menu-mobile md:hidden flex flex-col relative text-white bg-gray-800">
	<div class="flex justify-between items-center px-2">
		<a class="flex items-center py-4" href="/">
			<div class="h-8 flex items-center">
				<div class="logo">M</div><span class="txt_logo">astersoccer.<span>live</span></span>
			</div>
			<span class="cc"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/site/logomastersoccer.live.png" alt=""></span>
		</a>
		<div class="menu-toggle icon icon-8 icon-hamburger-white cursor-pointer transform-gpu transition-transform hover:opacity-75"></div>
	</div>
	<div class="main-menu-expand flex flex-col absolute top-full z-50 overflow-hidden w-full transition-all duration-500 ease-in-out"
	     style="height: 0px;" data-expanded="false">
		<ul class="pl-4 px-2 pb-2 bg-gray-800">
			<li class="settings-user" expandable-menu>
				<div class="flex justify-between items-center py-4 cursor-pointer select-none" expandable-selector>
					<h3 class="font-medium">User Settings</h3>
					<div class="icon icon-5 icon-arrow-down-white mr-1 transform-gpu transition-transform"></div>
				</div>
				<div class="settings-spoilers overflow-hidden transition-all duration-500 ease-in-out"
				     style="height: 0px;" expandable-content>
					<ul>
						<li class="flex items-center ml-4">
							<div class="icon icon-4 icon-spoiler-white mr-2"></div>
							<span class="flex-1 font-medium text-sm whitespace-nowrap cursor-pointer select-none hover:opacity-75">Spoilers</span>
							<label class="switch ml-6">
								<input type="checkbox" autocomplete="off">
								<div></div>
							</label>
						</li>
					</ul>
				</div>
			</li>
			<li expandable-menu>
				<div class="flex justify-between items-center py-4 cursor-pointer select-none" expandable-selector>
					<h3 class="font-medium">Popular Leagues</h3>
					<div class="icon icon-5 icon-arrow-down-white mr-1 transform-gpu transition-transform"></div>
				</div>
				<div class="overflow-hidden ml-4 font-medium text-sm transition-all duration-500 ease-in-out"
				     style="height: 0px;" expandable-content>
					<ul class="flex flex-col">
						<li>
							<a class="flex items-center my-1" href="/news_tax/world-cup">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/world-cup.png"
									     alt="World Cup" loading="lazy">
								</div>
								<h3>World Cup</h3>
							</a>
						</li>
						<li>
							<a class="flex items-center my-1" href="/news_tax/champions-league">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/champions-league.png"
									     alt="Champions League" loading="lazy">
								</div>
								<h3>Champions League</h3>
							</a>
						</li>
						<li>
							<a class="flex items-center my-1" href="/news_tax/europa-league">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/europa-league.png"
									     alt="Europa League" loading="lazy">
								</div>
								<h3>Europa League</h3>
							</a>
						</li>
						<li>
							<a class="flex items-center my-1" href="/news_tax/premier-league">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/premier-league.png"
									     alt="Premier League" loading="lazy">
								</div>
								<h3>Premier League</h3>
							</a>
						</li>
						<li>
							<a class="flex items-center my-1" href="/news_tax/la-liga">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/la-liga.png"
									     alt="La Liga" loading="lazy">
								</div>
								<h3>La Liga</h3>
							</a>
						</li>
						<li>
							<a class="flex items-center my-1" href="/news_tax/serie-a">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/serie-a.png"
									     alt="Serie A" loading="lazy">
								</div>
								<h3>Serie A</h3>
							</a>
						</li>
						<li>
							<a class="flex items-center my-1" href="/news_tax/bundesliga">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/bundesliga.png"
									     alt="Bundesliga" loading="lazy">
								</div>
								<h3>Bundesliga</h3>
							</a>
						</li>
						<li>
							<a class="flex items-center my-1" href="/news_tax/ligue-1">
								<div class="rounded-full bg-white p-1 mr-2">
									<img class="w-4 h-4"
									     src="<?php echo get_template_directory_uri(); ?>/assets/img/leagues/ligue-1.png"
									     alt="Ligue 1" loading="lazy">
								</div>
								<h3>Ligue 1</h3>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li>
				<div class="flex justify-between items-center py-4 cursor-pointer select-none">
					<a class="font-medium" href="/latest-news">Latest news</a>
				</div>
			</li>
			<li>
				<div class="flex justify-between items-center py-4 cursor-pointer select-none">
					<a class="font-medium" href="/pages/feedback">Feedback</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<nav class="main-menu hidden md:block menu-main w-full text-white bg-gray-800">
	<div class="container relative max-w-screen-lg flex items-center justify-between px-2 header-pc">
		<a class="flex items-center" href="/">
			<div class="h-8 flex items-center">
				<div class="logo">M</div><span class="txt_logo">astersoccer.<span>live</span></span>
			</div>
			<span class="cc"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/site/logomastersoccer.live.png" alt=""></span>
		</a>
<!--		<ul class="flex items-center">-->
<!--			<li class="flex items-center px-2 py-4 font-medium text-base">-->
<!--				<a class="cursor-pointer" href="/pages/feedback">Feedback</a>-->
<!--			</li>-->
<!--			<li class="flex items-center px-2 py-4 font-medium text-base" expandable-menu>-->
<!--				<div class="flex items-center select-none" expandable-selector>-->
<!--					<h3 class="cursor-pointer">Leagues</h3>-->
<!--					<div class="icon icon-5 icon-arrow-down-white transform-gpu transition-transform"></div>-->
<!--				</div>-->
<!--				<div class="hidden flex flex-wrap absolute w-full top-full left-0 z-20 rounded-b-md py-4 px-4 text-white bg-gray-800"-->
<!--				     expandable-content>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/england.png"-->
<!--									     alt="England" loading="lazy">-->
<!--								</div>-->
<!--								<span>England</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/premier-league">Premier League</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/championship">Championship</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/fa-cup">FA Cup</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/carabao-cup">Carabao Cup</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/spain.png"-->
<!--									     alt="Spain" loading="lazy">-->
<!--								</div>-->
<!--								<span>Spain</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/la-liga">La Liga</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/copa-del-rey">Copa del Rey</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/supercopa-de-espana">Supercopa de España</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/italy.png"-->
<!--									     alt="Italy" loading="lazy">-->
<!--								</div>-->
<!--								<span>Italy</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/serie-a">Serie A</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/coppa-italia">Coppa Italia</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/germany.png"-->
<!--									     alt="Germany" loading="lazy">-->
<!--								</div>-->
<!--								<span>Germany</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/bundesliga">Bundesliga</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/dfb-pokal">DFB Pokal</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/france.png"-->
<!--									     alt="France" loading="lazy">-->
<!--								</div>-->
<!--								<span>France</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/ligue-1">Ligue 1</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/coupe-de-france">Coupe de France</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/coupe-de-la-ligue">Coupe de la Ligue</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5 mt-4">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/portugal.png"-->
<!--									     alt="Portugal" loading="lazy">-->
<!--								</div>-->
<!--								<span>Portugal</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/primeira-liga">Primeira Liga</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5 mt-4">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/netherlands.png"-->
<!--									     alt="Netherlands" loading="lazy">-->
<!--								</div>-->
<!--								<span>Netherlands</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/eredivisie">Eredivisie</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5 mt-4">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/russia.png"-->
<!--									     alt="Russia" loading="lazy">-->
<!--								</div>-->
<!--								<span>Russia</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/premier-liga">Premier Liga</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5 mt-4">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/europe.png"-->
<!--									     alt="Europe" loading="lazy">-->
<!--								</div>-->
<!--								<span>Europe</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/euro-2020">Euro 2020</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/champions-league">Champions League</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/europa-league">Europa League</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/nations-league">Nations League</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5 mt-4">-->
<!--						<div class="flex flex-col">-->
<!--							<div class="flex items-center mb-2">-->
<!--								<div class="rounded-sm overflow-hidden mr-2">-->
<!--									<img class="w-6 h-4"-->
<!--									     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/flags/world.png"-->
<!--									     alt="World" loading="lazy">-->
<!--								</div>-->
<!--								<span>World</span>-->
<!--							</div>-->
<!--							<div class="flex flex-col text-gray-300">-->
<!--								<a class="text-sm mb-1" href="/news_tax/world-cup">World Cup</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/copa-america">Copa America</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/international-friendlies">Intl.-->
<!--									Friendlies</a>-->
<!--								<a class="text-sm mb-1" href="/news_tax/club-friendlies">Club Friendlies</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</li>-->
<!--			<li class="flex items-center px-2 py-4 font-medium text-base" expandable-menu>-->
<!--				<div class="flex items-center select-none" expandable-selector>-->
<!--					<h3 class="cursor-pointer">Teams</h3>-->
<!--					<div class="icon icon-5 icon-arrow-down-white transform-gpu transition-transform"></div>-->
<!--				</div>-->
<!--				<div class="hidden flex flex-wrap absolute w-full top-full left-0 z-20 rounded-b-md py-4 px-4 text-white bg-gray-800"-->
<!--				     expandable-content>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/arsenal">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/19.png" alt="Arsenal"-->
<!--							     loading="lazy">-->
<!--							<span>Arsenal</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/chelsea">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/18.png" alt="Chelsea"-->
<!--							     loading="lazy">-->
<!--							<span>Chelsea</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/liverpool">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/8.png"-->
<!--							     alt="Liverpool" loading="lazy">-->
<!--							<span>Liverpool</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/manchester-city">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/9.png" alt="Man City"-->
<!--							     loading="lazy">-->
<!--							<span>Man City</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/manchester-united">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/14.png"-->
<!--							     alt="Man United" loading="lazy">-->
<!--							<span>Man United</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/tottenham-hotspur">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/6.png"-->
<!--							     alt="Tottenham" loading="lazy">-->
<!--							<span>Tottenham</span>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/atletico-madrid">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/7980.png"-->
<!--							     alt="Atletico Madrid" loading="lazy">-->
<!--							<span>Atletico</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/athletic-club">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/13258.png"-->
<!--							     alt="Athletic Club" loading="lazy">-->
<!--							<span>Athletic Club</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/barcelona">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/83.png"-->
<!--							     alt="Barcelona" loading="lazy">-->
<!--							<span>Barcelona</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/sevilla">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/676.png"-->
<!--							     alt="Sevilla" loading="lazy">-->
<!--							<span>Sevilla</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/real-madrid">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/3468.png"-->
<!--							     alt="Real Madrid" loading="lazy">-->
<!--							<span>Real Madrid</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/valencia">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/214.png"-->
<!--							     alt="Valencia" loading="lazy">-->
<!--							<span>Valencia</span>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/fiorentina">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/109.png"-->
<!--							     alt="Fiorentina" loading="lazy">-->
<!--							<span>Fiorentina</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/inter">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/2930.png" alt="Inter"-->
<!--							     loading="lazy">-->
<!--							<span>Inter</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/juventus">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/625.png"-->
<!--							     alt="Juventus" loading="lazy">-->
<!--							<span>Juventus</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/milan">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/113.png" alt="Milan"-->
<!--							     loading="lazy">-->
<!--							<span>Milan</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/napoli">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/597.png" alt="Napoli"-->
<!--							     loading="lazy">-->
<!--							<span>Napoli</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/roma">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/37.png" alt="Roma"-->
<!--							     loading="lazy">-->
<!--							<span>Roma</span>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/bayern-munich">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/503.png" alt="Bayern"-->
<!--							     loading="lazy">-->
<!--							<span>Bayern</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/borussia-dortmund">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/68.png"-->
<!--							     alt="Dortmund" loading="lazy">-->
<!--							<span>Dortmund</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/teams/683/borussia-mgladbach">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/683.png"-->
<!--							     alt="Gladbach" loading="lazy">-->
<!--							<span>Gladbach</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/rb-leipzig">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/277.png"-->
<!--							     alt="Leipzig" loading="lazy">-->
<!--							<span>Leipzig</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/bayer-leverkusen">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/3321.png"-->
<!--							     alt="Leverkusen" loading="lazy">-->
<!--							<span>Leverkusen</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/wolfsburg">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/510.png"-->
<!--							     alt="Wolfsburg" loading="lazy">-->
<!--							<span>Wolfsburg</span>-->
<!--						</a>-->
<!--					</div>-->
<!--					<div class="flex flex-col w-1/5">-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/lille">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/690.png" alt="Lille"-->
<!--							     loading="lazy">-->
<!--							<span>Lille</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/olympique-lyonnais">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/44.png" alt="Lyon"-->
<!--							     loading="lazy">-->
<!--							<span>Lyon</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/monaco">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/6789.png"-->
<!--							     alt="Monaco" loading="lazy">-->
<!--							<span>Monaco</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/olympique-marseille">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/44.png"-->
<!--							     alt="Marseille" loading="lazy">-->
<!--							<span>Marseille</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/nice">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/450.png" alt="Nice"-->
<!--							     loading="lazy">-->
<!--							<span>Nice</span>-->
<!--						</a>-->
<!--						<a class="flex items-center mb-2 text-sm" href="/news_tax/psg">-->
<!--							<img class="w-6 h-6 object-contain mr-2"-->
<!--							     src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/teams/591.png" alt="PSG"-->
<!--							     loading="lazy">-->
<!--							<span>PSG</span>-->
<!--						</a>-->
<!--					</div>-->
<!--				</div>-->
<!--			</li>-->
<!--			<li class="settings-user relative flex ml-2">-->
<!--				<div class="flex items-center cursor-pointer hover:opacity-75">-->
<!--					<div class="icon icon-6 icon-user-white"></div>-->
<!--					<div class="icon icon-5 icon-arrow-down-white"></div>-->
<!--				</div>-->
<!--				<ul class="dropdown flex flex-col absolute z-10 top-full right-0 rounded-b-md mt-3 p-2 bg-gray-800 hidden">-->
<!--					<li class="settings-spoilers flex items-center px-3 py-1">-->
<!--						<div class="icon icon-4 icon-spoiler-white mr-2"></div>-->
<!--						<span class="flex-1 font-medium text-sm whitespace-nowrap cursor-pointer select-none hover:opacity-75">Spoilers</span>-->
<!--						<label class="switch ml-6">-->
<!--							<input type="checkbox" autocomplete="off">-->
<!--							<div></div>-->
<!--						</label>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
<!--		</ul>-->
	</div>
</nav>

