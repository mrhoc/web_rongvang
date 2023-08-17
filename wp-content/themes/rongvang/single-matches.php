<?php get_header() ?>
<header class="w-full rounded shadow" data-match-type="concluded" data-kickoff="2023-02-12T14:30:00.000Z">
    <div class="container flex flex-col items-center justify-center max-w-screen-lg ">
<!--        <div class="flex flex-col md:flex-row justify-center items-center w-full mt-4 mb-8"><a-->
<!--                    class="flex items-center border rounded-md px-2 py-1 mr-1" href="">-->
<!--                <img class="w-4 h-4 object-contain mr-2" src=""-->
<!--                     alt="Premier League"/>-->
<!--                <span class="text-sm">Premier League</span>-->
<!--            </a>-->
<!--            <div class="hidden md:flex items-center justify-center mx-1 text-sm">-->
<!--                <div class="icon icon-5 icon-map-gray mr-1"></div>-->
<!--                Old Trafford, Manchester-->
<!--            </div>-->
<!--        </div>-->
        <div class="flex flex-col w-full px-1">
            <div class="flex flex-nowrap justify-center w-full">
                <div class="flex w-5/12 justify-end items-center"><a class="text-base font-medium md:text-xl text-right"
                                                                     href="#"><?php teamgroup('team1','name1')?></a>
                    <img class="w-8 md:w-12 h-8 md:h-12 object-contain ml-1 md:ml-3"
                         src="<?php teamgroup('team1','logo1')?>" alt="Manchester United"/></div>
                <div class="flex justify-center items-center mx-1 md:mx-4 text-sm md:text-xl font-semibold text-gray-500">
                    <div class="py-1 w-8 md:w-12 mx-1 md:mx-2 text-center rounded shadow">
                        <?php teamgroup('team1','score1')?>
                    </div>
                    <div><span class="text-xl font-bold">:</span></div>
                    <div class="py-1 w-8 md:w-12 mx-1 md:mx-2 text-center rounded shadow">
                        <?php teamgroup('team2','score2')?>
                    </div>
                </div>
                <div class="flex w-5/12 justify-start items-center"><img
                            class="w-8 md:w-12 h-8 md:h-12 object-contain mr-1 md:mr-3"
                            src="<?php teamgroup('team2','logo2')?>" alt="Tottenham Hotspur"/>
                    <a class="text-base font-medium md:text-xl text-left" href="#"><?php teamgroup('team2','name2')?></a></div>
            </div>
            <div class="flex w-full justify-center">
                <div class="flex items-center mt-8 px-4 py-1 rounded shadow status-concluded"><span
                            class="text-xs font-semibold tracking-widest text-white">
FT
</span></div>
            </div>
        </div>
        <nav class="tabs-nav flex justify-between overflow-x-scroll max-w-full text-sm mt-8"><a
                    class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
                    href="#lineups" data-title="lineups" data-active="false">
                Line-ups</a>
            <div class="icon icon-5 icon-squad-gray ml-2"></div>
            &nbsp;

            <a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer" href="#stats"
               data-title="stats" data-active="false">
                Stats</a>
            <div class="icon icon-5 icon-stats-gray ml-2"></div>
            &nbsp;

            <a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
               href="#events" data-title="events" data-active="false">
                Events</a>
            <div class="icon icon-5 icon-ball-gray ml-2"></div>
            &nbsp;

            <a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer" href="#media"
               data-title="media" data-active="false">
                Media</a>
            <div class="icon icon-5 icon-video-gray ml-2"></div>
            &nbsp;

            <a class="tabs-nav-item flex flex-shrink-0 items-center px-4 py-2 rounded-t-md cursor-pointer"
               href="#support-us" data-title="support-us" data-active="false">
                Support us</a>
            <div class="icon icon-5 icon-heart-gray ml-2"></div>
            &nbsp;

        </nav>
    </div>
</header>
<main class="single-matches">
    <div class="nav-content">
        <div class="tabs-page line-ups" data-title="lineups" data-active="false">
            <?php
            echo get_field('line-ups')
            ?>

        </div>
        <div class="tabs-page tab-stats" data-title="stats" data-active="false">
            <?php
            echo get_field('stats')
            ?>
        </div>
        <div class="tabs-page tabs-events" data-title="events" data-active="false">
            <?php
            echo get_field('events')
            ?>

        </div>
        <div class="tabs-page" data-title="media" data-active="false" data-tab-type="media">
            <div class="flex flex-col gap-y-4">
                <div class="media-tabs" scrollable>
                    <h3 class="media-tab flex flex-shrink-0 items-center px-4 md:px-8 select-none cursor-pointer hover:opacity-75"
                        data-tab-id="1" data-active="true">
                        <div class="icon icon-4 icon-video-alt-white mr-2"></div>
                        <span class="text-sm font-semibold">Highlights</span>
                    </h3>
                    <h3 class="media-tab flex flex-shrink-0 items-center px-4 md:px-8 select-none cursor-pointer hover:opacity-75"
                        data-tab-id="2" data-active="false">
                        <div class="icon icon-4 icon-video-alt-white mr-2"></div>
                        <span class="text-sm font-semibold">Full Match</span>
                    </h3>
                </div>
                <div class="media-tab-content " data-tab-id="1" data-active="true">
                    <?php if (get_field('main_player_-_full_show')): ?>
                        <div class="link-block">
                            <div class="hidden-link"><a href="<?php echo get_field('main_player_-_full_show') ?>">Main
                                    Player - Full Show</a></div>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('main_player_-_full_show')): ?>
                        <div class="link-block">
                            <div class="hidden-link"><a
                                        href="<?php echo get_field('alternative_player_-_full_show') ?>">Alternative
                                    Player - Full Show</a></div>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('main_player_-_full_show')): ?>
                        <div class="link-block">
                            <div class="hidden-link"><a href="<?php echo get_field('fast_direct_link_-_full_show') ?>">Fast
                                    Direct Link - Full Show</a></div>
                        </div>
                    <?php endif; ?>
                    <div class="iframe-responsive">
                        <?php if (get_field('video')): ?>
                            <iframe width="100%" height="421px" src="<?php echo get_field('video') ?>"></iframe>
                        <?php endif; ?>
                    </div>
                    <div class="w-full bg-gray-800 p-4 -mt-4 text-sm text-white leading-6 tracking-normal">
                        This content is provided and hosted by a 3rd party server. Sometimes this servers may
                        include advertisments. We do
                        not host or upload this material and is not responsible for the content.
                    </div>
                </div>
                <div class="media-tab-content hidden" data-tab-id="2" data-active="false">
                    <div class="link-block">
                        <div class="hidden-link" data-url="aHR0cHM6Ly9zYmhpZ2h0LmNvbS92YWRpZ2N5YTJ0eXguaHRtbA==">
                            Main Player - Full Match
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs-page" data-title="support-us" data-active="false">
            <div class="flex flex-col items-center justify-center flex-grow ">
<span class="prose mb-8 text-sm md:text-base text-center font-medium leading-relaxed">
<p>
By supporting us, you will help us keep doing what we love the most! You will also help us fund server costs, improve our
websites and therefore provide better quality.
</p>
<p>
Thank you. We really appreciate your help 🙏
</p>
</span>
                <a href="https://www.buymeacoffee.com/mastersoccer" target="_blank">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/site/buymeacoffee.svg"
                         alt="Buy Me A Coffee" class="h-12 md:h-16"
                         loading="lazy">
                </a>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>

