<?php
/* Template Name: Homepage */
get_header();?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
    the_content();
    ?>
<?php endwhile; endif; ?>
<?php

// Get Locale
$locale = get_locale();
if ($locale == 'ja') {
    $current_lang = '/ja';
    $route_lang = '?locale=ja';
    $title_tw='Twitterã§ã‚·ã‚§ã‚¢';
    $title_fb='Facebookã§ã‚·ã‚§ã‚¢';
    $title_line='LINEã§ã‚·ã‚§ã‚¢';
    $title_mail='Emailã§ã‚·ã‚§ã‚¢';
    $title_coppy='ãƒªãƒ³ã‚¯ã‚’ã‚³ãƒ”ãƒ¼';
} else {
    $current_lang = '/en';
    $route_lang = '?locale=en';
    $title_tw='Share on Twitter';
    $title_fb='Share on Facebook';
    $title_line='Share on LINE';
    $title_mail='Send via Direct Message';
    $title_coppy='Copy Link';
}

$home_url=apply_filters('wpml_home_url', get_option('home'));

// Save link warashibe-uat
// $is_uat = 'warashibe-uat';

if ($_SERVER['SERVER_NAME']=='uat.cozuchi.com'){
    $is_uat = 'uat';
}
else if($_SERVER['SERVER_NAME']=='stg.cozuchi.com'){
    $is_uat = 'stg';
}
else{
    $is_uat = 'prod';
}

if ($is_uat == 'uat') {
    $url = "https://uat.cozuchi.com/rest/company/funds/top?companyId=1&limit=10";
    $funds_url = '/system/funds' . $route_lang;
    $fund_details_url = 'https://uat.cozuchi.com/system/funds/';
    $host='uat.cozuchi.com';
} else  if ($is_uat=='stg'){
    $url = "https://stg-mypage.cozuchi.com/rest/company/funds/top?companyId=1&limit=10";
    $funds_url = '/system/funds' . $route_lang;
    $fund_details_url = 'https://stg.cozuchi.com/system/funds/';
    $host='stg.cozuchi.com';
}
else if ($is_uat=='prod'){
    $url = "https://mypage.cozuchi.com/rest/company/funds/top?companyId=1&limit=10";
    $funds_url = '/system/funds' . $route_lang;
    $fund_details_url = 'https://cozuchi.com/system/funds/';
    $host='cozuchi.com';
}

// Initiate curl session in a variable (resource)
$curl_handle = curl_init();

//$token=$_SESSION['_csrf_token_'];
//var_dump($token);
$secsionID=$_COOKIE['JSESSIONID_front'];
$headers=array('Cookie: JSESSIONID.front='.$secsionID);

curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
$curl_data = curl_exec($curl_handle);

curl_close($curl_handle);
$response_data = json_decode($curl_data);
$post_data = $response_data->data;

$post_data = array_slice($post_data, 0, 10);
$statusid=0;
$textfundstatus="";
//var_dump($post_data)
?>
<style>
    .btn_remove{
        display: none!important;
    }
</style>
<div class="rm">
    <div  id="funlist-cnt" style="display: none;">
        <section class="sec-funlist">
            <div class="container">
                <div class="list-fund">

                    <?php  foreach ($post_data as $item) { ?>
                        <?php
                        if ($locale == 'ja') {
                            $des='COZUCHI '.$item->name.'ã®è©³ç´°ãƒšãƒ¼ã‚¸ã§ã™ã€‚ä¸€å£1ä¸‡å††ã‹ã‚‰ã€ã‚¤ãƒ³ã‚¿ãƒ¼ãƒãƒƒãƒˆä¸Šã§æ‰‹è»½ã«æŠ•è³‡ã‚’è¡Œã†ã“ã¨ãŒã§ãã¾ã™ã€‚';
                        } else {
                            $des='This is the detail page of COZUCHI '.$item->name.'. You can easily invest on the Internet from 10,000 yen per bit.';
                        }
                        ?>
                        <?php

                        $aff_cts=isset($_COOKIE['_aff_cts_'])?$_COOKIE['_aff_cts_']:'';
                        $item_url = $fund_details_url . $item->id .'?aff_cts='.$aff_cts; ?>
                        <div class="item">
                            <div class="item__img">
                                <?php
                                $statusid=$item->status;
                                $clssstatus="";

                                $locale = get_locale(); //echo $locale;
                                if ($locale == "ja") {
                                    if($statusid==1){$textfundstatus="å‹Ÿé›†å‰"; $clssstatus="status-before-fund";}
                                    if($statusid==2){$textfundstatus="å‹Ÿé›†ä¸­"; $clssstatus="status-fund";}
                                    if($statusid==3){$textfundstatus="å‹Ÿé›†çµ‚äº†"; $clssstatus="status-end-fund";}
                                    if($statusid==4){$textfundstatus="é‹ç”¨ä¸­"; $clssstatus="status-operation";}
                                    if($statusid==5){$textfundstatus="é‹ç”¨çµ‚äº†"; $clssstatus="status-operation-end";}
                                } else{
                                    if($statusid==1){$textfundstatus="Before Funding"; $clssstatus="status-before-fund";}
                                    if($statusid==2){$textfundstatus="Funding"; $clssstatus="status-fund";}
                                    if($statusid==3){$textfundstatus="Funding Ended"; $clssstatus="status-end-fund";}
                                    if($statusid==4){$textfundstatus="In Operation"; $clssstatus="status-operation";}
                                    if($statusid==5){$textfundstatus="Operation Ended"; $clssstatus="status-operation-end";}
                                }
                                ?>
                                <div class="item__stt <?php echo $clssstatus?>">
                                    <?php
                                    echo $textfundstatus;
                                    ?>
                                </div>
                                <a href="<?php echo $item_url; ?>" title="" class="">
                                    <?php
                                    $itemurl =$item->documents; $srcurl=$itemurl[0]->document_url;
                                    $srcurl="/wp-content/themes/cozuchi/images/default-no-img.jpg";
                                    foreach ($itemurl as $index => $a) {
                                        if($a->type==1){
                                            $srcurl=$itemurl[$index]->document_url;
                                        }
                                    }
                                    ?>

                                    <img src="<?php echo $srcurl; ?>" width="542" height="407" alt="">
                                </a>
                            </div>
                            <div class="item__cnt">
                                <div class="lb-wrap justify-content-between">
                                    <div class="d-flex">
                                        <?php
                                        $fund_type=$item->current_fund_period;
                                        $fund_type_item=$fund_type->type;
                                        if($fund_type_item==1){
                                            $typecolorcls="red";
                                            if ($locale == 'ja') {
                                                $texttype="å…ˆç€";
                                            } else {
                                                $texttype="FCF";
                                            }
                                            $rm='';
                                        }
                                        else if($fund_type_item==2){
                                            $typecolorcls="blue";
                                            $texttype="æŠ½é¸";

                                            if ($locale == 'ja') {
                                                $texttype="æŠ½é¸";
                                            } else {
                                                $texttype="LOTTE";
                                            }
                                            $rm='';
                                        }
                                        else{
                                            $rm='btn_remove';
                                        }
                                        ?>
                                        <?php if($item->fund_periods && count($item->fund_periods)>0){?>
                                            <div class="recruitment_method <?php echo $typecolorcls.' '.$rm;  ?>"><?php echo $texttype; ?></div>
                                        <?php }?>

                                        <?php
                                        $income = $item->income_type;
                                        $textincome = "";
                                        $imageimcom = "";
                                        $clsimcome = "";
                                        if (empty($income)) {
                                            $imageimcom = "/wp-content/themes/cozuchi/images/type_blue.svg";
                                            $clsimcome="blue";
                                            if ($locale == "en_US") {
                                                $textincome="Income gain type";
                                            } else{
                                                $textincome="ã‚¤ãƒ³ã‚«ãƒ ã‚²ã‚¤ãƒ³åž‹";
                                            }
                                        }
                                        if($income == 1){
                                            if ($locale == "en_US") {
                                                $textincome="Income gain type";
                                            } else{
                                                $textincome="ã‚¤ãƒ³ã‚«ãƒ ã‚²ã‚¤ãƒ³åž‹";
                                            }
                                            //$textincome="Income gain type";

                                            $imageimcom="/wp-content/themes/cozuchi/images/type_blue.svg";
                                            $clsimcome="blue";
                                        }
                                        if($income==2){
                                            //$textincome="Capital gain type";
                                            if ($locale == "en_US") {
                                                $textincome="Capital gain type";
                                            } else {
                                                $textincome="ã‚­ãƒ£ãƒ”ã‚¿ãƒ«ã‚²ã‚¤ãƒ³åž‹";
                                            }
                                            //$textincome="ã‚­ãƒ£ãƒ”ã‚¿ãƒ«ã‚²ã‚¤ãƒ³åž‹";
                                            $imageimcom="/wp-content/themes/cozuchi/images/type_red.svg";
                                            $clsimcome="red";
                                        }
                                        ?>
                                        <div class="income_type text-truncate"><?php echo $textincome; ?></div>
                                    </div>
                                    <div class="item__share">
                                        <div class="list-social--login">
                                            <div class="d-flex justify-content-end comment-info">
                                                <?php $liked=$item->liked;if ($liked):?>
                                                    <div class="comment-info-handle handle-heart handle-heart__liked on">
                                                        <img src="/wp-content/themes/cozuchi/images/ico-heart-black.svg" alt="" width="16"
                                                             class="ico-heart-black">
                                                        <img src="/wp-content/themes/cozuchi/images/ico-heart-red.svg" alt="" width="16"
                                                             class="ico-heart-red">
                                                        <div class="num-info heart__<?php echo $item->id?>" data-liked="<?php echo $item->liked_count?>">
                                                            <?php  echo thousandsCurrencyFormat($item->liked_count) ?>
                                                        </div>
                                                    </div>
                                                <?php else:?>
                                                    <div class="comment-info-handle handle-heart handle-heart__unliked">
                                                        <img src="/wp-content/themes/cozuchi/images/ico-heart-black.svg" alt="" width="16"
                                                             class="ico-heart-black">
                                                        <img src="/wp-content/themes/cozuchi/images/ico-heart-red.svg" alt="" width="16"
                                                             class="ico-heart-red">
                                                        <div class="num-info heart__<?php echo $item->id?>" data-liked="<?php echo $item->liked_count?>">
                                                            <?php  echo thousandsCurrencyFormat($item->liked_count) ?>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                <div class="comment-info-handle handle-share">
                                                    <img src="/wp-content/themes/cozuchi/images/ico-share.svg" alt="">
                                                    <div class="flag-share ">
                                                        <div class="list-social ">
                                                            <div class="list-social__item share-tw">
                                                                <a href="#" class="share-twitter"
                                                                   onclick="window.open('https://twitter.com/intent/tweet?url=<?php echo  $fund_details_url . $item->id .'?aff_cts='.$aff_cts?>&amp;', '_blank', 'top=150,left=400,width=550,height=350')"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?php echo $title_tw?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-tw_black.svg" alt="" width="20"></a>
                                                            </div>
                                                            <div class="list-social__item share-fb">
                                                                <a href="#"
                                                                   onclick="window.open('https://facebook.com/share.php?u=<?php echo $item_url;?>&amp;t=<?php echo $item->catchphrase?>', '_blank', 'top=150,left=400,width=450,height=550')"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?php echo $title_fb?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-fb_black.svg" alt="" width="16"></a>
                                                            </div>
                                                            <div class="list-social__item share-line">
                                                                <a href="https://social-plugins.line.me/lineit/share?url=<?php echo $item_url;?>&amp;t=<?php echo $item->catchphrase?>"
                                                                   onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?php echo $title_line?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-line_black.svg" alt="line"
                                                                            width="20"></a>
                                                            </div>
                                                            <div class="list-social__item share-mail">
                                                                <a href="mailto:?subject=<?php echo $item->name ?>&amp;body=<?php echo rawurlencode($item_url).'%0D%0A'.rawurlencode($item->name).'%0D%0A'.rawurlencode($des)?>"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?php echo $title_mail?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-mail_black.svg" alt=""
                                                                            width="20"></a>
                                                            </div>
                                                            <div class="list-social__item coppy-link">
                                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                                   title="<?php echo $title_coppy?>"><img src="/wp-content/themes/cozuchi/images/share-coppy_black.svg" alt="" width="18" class="bl">
                                                                    <img src="/wp-content/themes/cozuchi/images/share-coppy_pink.svg" alt="" width="18" class="pink">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-social--logout">
                                            <div class="d-flex justify-content-end comment-info">
                                                <a href="/system/login/" class="comment-info-handle handle-heart">
                                                    <img src="/wp-content/themes/cozuchi/images/ico-heart-black.svg" alt="" width="16">
                                                    <div class="num-info heart__<?php echo $item->id?>">
                                                        <?php  echo thousandsCurrencyFormat($item->liked_count) ?>
                                                    </div>
                                                </a>
                                                <!--										<a href="/system/login?redirectUrl=https%3A%2F%2F--><?php //echo $host?><!--%2Fsystem%2Ffunds%2F--><?php //echo $item->id?><!--%3FtabActive%3Dcomment"-->
                                                <!--										   class="comment-info-handle handle-cmt">-->
                                                <!--											<img src="/wp-content/themes/cozuchi/images/ico-cmt.svg" alt="" width="16">-->
                                                <!--											<div class="num-info comment__--><?php //echo $item->id?><!--">-->
                                                <!--												--><?php // echo thousandsCurrencyFormat($item->comment_count)?>
                                                <!--											</div>-->
                                                <!--										</a>-->
                                                <div class="comment-info-handle handle-share">
                                                    <img src="/wp-content/themes/cozuchi/images/ico-share.svg" alt="">
                                                    <div class="flag-share">
                                                        <div class="list-social">
                                                            <div class="list-social__item share-tw">
                                                                <a href="/system/login/" class="share-twitter"
                                                                   data-toggle="tooltip" data-placement="top"
                                                                   title="<?php echo $title_tw?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-tw_black.svg" alt=""></a>
                                                            </div>
                                                            <div class="list-social__item share-fb">
                                                                <a href="/system/login/" data-toggle="tooltip"
                                                                   data-placement="top" title="<?php echo $title_fb?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-fb_black.svg" alt=""></a>
                                                            </div>
                                                            <div class="list-social__item share-line">
                                                                <a href="/system/login/" data-toggle="tooltip"
                                                                   data-placement="top" title="<?php echo $title_line?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-line_black.svg" alt="line"></a>
                                                            </div>
                                                            <div class="list-social__item share-mail">
                                                                <a href="/system/login/" data-toggle="tooltip"
                                                                   data-placement="top" title="<?php echo $title_mail?>"><img
                                                                            src="/wp-content/themes/cozuchi/images/share-mail_black.svg" alt=""></a>
                                                            </div>
                                                            <div class="list-social__item coppy-link">
                                                                <a href="/system/login/" data-toggle="tooltip"
                                                                   data-placement="top" title="<?php echo $title_coppy?>"><img src="/wp-content/themes/cozuchi/images/share-coppy_black.svg" alt="" class="bl">
                                                                    <img src="/wp-content/themes/cozuchi/images/share-coppy_pink.svg" alt="" width="18" class="pink">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item__info">
                                    <div class="tbl">
                                        <div class="tr">
                                            <div class="td td1">
                                                <?php if ($locale == 'ja') { echo 'æƒ³å®šåˆ©å›žã‚Šï¼ˆå¹´åˆ©ï¼‰'; } else { echo 'Assumed yield (annual interest rate)'; } ?>
                                                <span><?php echo number_format($item->estimated_dividend,1); ?><small>%</small></span>
                                            </div>
                                            <div class="td td2">
                                                <?php if ($locale == 'ja') { echo 'é‹ç”¨æœŸé–“'; } else { echo 'Operation period'; } ?>
                                                <span><?php echo number_format($item->invest_period); ?><small class="sm1"><?php if ($locale == 'ja') { echo 'ãƒ¶æœˆ'; } else { echo 'Months'; } ?></small></span>
                                            </div>
                                        </div>
                                        <div class="tr">
                                            <div class="td td3">
                                                <?php if ($locale == 'ja') { echo 'å‹Ÿé›†é‡‘é¡'; } else { echo 'Recruitment amount'; } ?>
                                                <span><?php echo number_format($item->current_fund_period->offer_amount,0); ?><small class="sm1"><?php if ($locale == 'ja') { echo 'å††'; } else { echo 'Yen'; } ?></small></span>
                                            </div>
                                            <div class="td td4">
                                                <?php if ($locale == 'ja') { echo 'å‹Ÿé›†æœŸé–“'; } else { echo 'Recruitment period'; } ?>
                                                <span><?php if($fund_type->offer_start_time=="0" && $fund_type->offer_end_time=="0"){echo '~';} else {echo date("m/d", substr($fund_type->offer_start_time,0,-3)); ?> ~ <?php echo date("m/d", substr($fund_type->offer_end_time,0,-3));} ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $per=$item->current_fund_period->invested_percent;
                                    $bg_per='';

                                    if ($per>=100){
                                        $bg_per='bg_per_blue';
                                        $per_cent=100;

                                    }
                                    else if ($per==0){
                                        $bg_per='bg_per_gray';
                                        $per_cent=0;
                                    }
                                    else{
                                        $bg_per='bg_per_red';
                                        $per_cent= number_format($item->current_fund_period->invested_percent, 2, '.', '');
                                    }
                                    //fund_periods
                                    $fund_periods=$item->fund_periods;
                                    ?>
                                    <?php if ($locale == 'ja'):?>
                                        <div class="line-percent"><span>å¿œå‹Ÿäººæ•°<small> <?php echo number_format($item->current_fund_period->number_of_investor,0) ?></small>äººï¼å¿œå‹ŸçŽ‡ <small> <?php echo number_format($item->current_fund_period->invested_percent,0); ?>%</small>ï¼ˆå¿œå‹Ÿé‡‘é¡ <small> <?php echo number_format($item->current_fund_period->application_amount,0); ?></small>å††ï¼‰<strong class="line-per-bg scrEvent <?php echo $bg_per?>"  data-per="<?php echo $per_cent?>%"></strong></span></div>

                                    <?php else:?>
                                        <div class="line-percent"><span>Number of applicants:<small><?php echo number_format($item->current_fund_period->number_of_investor,0) ?></small> / Application rate:<small><?php echo number_format($item->current_fund_period->invested_percent,0); ?>%</small>ï¼ˆOffering amount: <small><?php echo number_format($item->current_fund_period->application_amount,0); ?></small>Yenï¼‰<strong class="line-per-bg scrEvent <?php echo $bg_per?>"  data-per="<?php echo $per_cent?>%"></strong></span></div>
                                    <?php endif;?>
                                    <div class="line-percent line-percent--other d-flex">
                                        <?php
                                        $sum = array_reduce($fund_periods, function($carry, $i)
                                        {
                                            return $carry + $i->offer_amount;
                                        });
                                        ?>
                                        <?php foreach ($fund_periods as $fund_period){?>
                                            <?php
                                            $w=$fund_period->offer_amount/$sum*100;
                                            $n=strtotime("now");
                                            $s=substr($fund_period->offer_start_time,0,-3);
                                            $e=substr($fund_period->offer_end_time,0,-3);
                                            if($fund_period->id==$item->current_fund_period->id&&$item->status==2){
                                                $bg_='#f55f53';
                                            }
                                            else{
                                                $bg_='#b9b9b9';
                                            }

                                            ?>
                                            <span class="<?php echo $w<19?'hide-text':''?> <?php echo $fund_period->id=='0'?'d-none':'';?>" style="width: <?php echo $w."%"?>;background-color: <?php echo $bg_?>" data-toggle="tooltip" data-placement="top" title="<?php echo $fund_period->name."\n ".number_format($fund_period->offer_amount)?><?php echo $locale == 'ja' ? 'å††' : 'Yen' ?>"><strong><?php echo $fund_period->name?></strong><small style="display: block;text-align: center;width: 100%;margin: 0;"><?php echo number_format($fund_period->offer_amount)?><?php echo $locale=='ja'?'å††':'Yen'?></small></span>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <a href="/system/funds?locale=<?php if ($locale == 'ja') { echo 'ja'; } else { echo 'en'; } ?>" class="btn-comp03"><?php if ($locale == 'ja') { echo 'ãƒ•ã‚¡ãƒ³ãƒ‰ä¸€è¦§ã¸'; } else { echo 'To Fund List'; } ?></a>
            </div>
        </section>
    </div>
</div>
<input type="hidden" id="token" value="<?php echo $_COOKIE['_csrf_token_'] ?>">
<input type="hidden" id="jesionID" value="<?php echo $_COOKIE['JSESSIONID_front']?>">


<?php get_footer();?>
<script>
    $("#wp-funlist").html($("#funlist-cnt").html());
    $('.rm').remove();
</script>


