<?php get_header() ?>
<main>
    <?php
    $link1 = get_field('link_live')['live1'];
    $link2 = get_field('link_live')['live2'];
    $link3 = get_field('link_live')['live3'];
    ?>
    <h1 class="text-xl font-semibold border-b-2 border-green-500 ">Todays soccer matches schedule</h1>
    <p class="text-sm">Here you can follow all soccer matches taking place today and get information about upcoming
        matches, score, schedule, latest results. Alternative of reddit soccerstreams.
    </p>
    <br><br>
    <div class="flex" style="align-items: center;padding-left: 20px;">
        <svg style="width: 20px;height:20px;margin-right: 10px" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256"
             xml:space="preserve">

<defs>
</defs>
            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
               transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 62.251 46.633 L 37.789 60.756 c -1.258 0.726 -2.829 -0.181 -2.829 -1.633 V 30.877 c 0 -1.452 1.572 -2.36 2.829 -1.634 l 24.461 14.123 C 63.508 44.092 63.508 45.907 62.251 46.633 z"
                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
            </g>
</svg>
        <a target="_blank" style="color:#2a5885" href="<?php echo $link1 ?>">live 1</a></div>

    <div class="flex" style="align-items: center;padding-left: 20px;">
        <svg style="width: 20px;height:20px;margin-right: 10px" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256"
             xml:space="preserve">

<defs>
</defs>
            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
               transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 62.251 46.633 L 37.789 60.756 c -1.258 0.726 -2.829 -0.181 -2.829 -1.633 V 30.877 c 0 -1.452 1.572 -2.36 2.829 -1.634 l 24.461 14.123 C 63.508 44.092 63.508 45.907 62.251 46.633 z"
                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
            </g>
</svg>
        <a target="_blank" style="color:#2a5885" href="<?php echo $link2 ?>">live 2</a></div>

    <div class="flex" style="align-items: center;padding-left: 20px;">
        <svg style="width: 20px;height:20px;margin-right: 10px" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="256" height="256" viewBox="0 0 256 256"
             xml:space="preserve">

<defs>
</defs>
            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
               transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 62.251 46.633 L 37.789 60.756 c -1.258 0.726 -2.829 -0.181 -2.829 -1.633 V 30.877 c 0 -1.452 1.572 -2.36 2.829 -1.634 l 24.461 14.123 C 63.508 44.092 63.508 45.907 62.251 46.633 z"
                      style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                      transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
            </g>
</svg>
        <a target="_blank" style="color:#2a5885" href="<?php echo $link3 ?>">live 3</a></div>


    <iframe width="100%" height="600px"
            src="https://cdn.sportcast.life/webplayer.php?t=ifr&c=2066511&lang=en&eid=115048189&lid=2066511&ci=289&si=1&ask=1676968200"
            frameborder="0"></iframe>
</main>
<?php get_footer() ?>

