<?php get_header()?>
<style>
    .live{
        height: 7px;
        width: 22px;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        font-size: 6px;
        line-height: 8px;
        letter-spacing: .3px;
        color: #fff;
        background-color: #dc143c;
        display: -ms-flexbox;
        display: inline-block;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        text-align: center;
        text-transform: uppercase;
        vertical-align: middle;
        opacity: .9;
    }
    .icon-flag {
        display: block;
        width: 18px;
        height: 14px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        margin-right: 10px;
    }
    .icon-flag[data-name="0"], .icon-flag[data-name="18"] {
        background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNSIgaGVpZ2h0PSIxNSI+PHBhdGggZmlsbD0iIzk5OSIgZD0iTTIgMTJoMTF2MUgyek0wIDNoMTV2OEgweiIvPjwvc3ZnPg==);
    }
</style>
    <main>
        <?php
        $event_date_time = get_field('date');
        $f = date("F", strtotime($event_date_time));
        $j = date("j", strtotime($event_date_time));
        $y = date("Y", strtotime($event_date_time));
        $g = date("g", strtotime($event_date_time));
        $i = date("i", strtotime($event_date_time));
        $filed_date_timestamp = strtotime($event_date_time); // Chuyển đổi thành timestamp
        $today_timestamp = strtotime(date('F j, Y g:i a')); // Lấy timestamp của ngày hiện tại
        $link=get_field('link')
        ?>
        <h1 style="font-size: 20px;margin-bottom: 30px;"><?php the_title()?> <span class="live">LIVE</span>
            <span style="color: #999;display: block;margin-top: 5px;
    font-weight: 400;font-size: 11px;"><?php echo $event_date_time?></span></h1>
        
        <p style="display:flex;align-items: center;border-top:1px solid #bcccde;border-bottom: 1px solid #bcccde;padding-top: 20px;
padding-bottom: 20px;"><img src="//cdn.sportcast.life/assets/img/Fir.png" alt="" style="margin-right: 10px;width:30px">Browser Links</p>

        <a target="_blank" href="<?php echo $link?>" style="display: flex;align-items:center"><i title="" data-name="0" class="icon-flag"></i>unknow <svg style="width: 20px;height:20px;margin-right: 10px;margin-left: 10px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256" xml:space="preserve">

<defs>
</defs>
                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                    <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 62.251 46.633 L 37.789 60.756 c -1.258 0.726 -2.829 -0.181 -2.829 -1.633 V 30.877 c 0 -1.452 1.572 -2.36 2.829 -1.634 l 24.461 14.123 C 63.508 44.092 63.508 45.907 62.251 46.633 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
</svg> Web</a>

    </main>
<?php get_footer()?>
