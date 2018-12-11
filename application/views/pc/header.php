<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-script-type" content="text/javascript" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="<?php echo $meta_desc; ?>" />
        <meta name="keywords" content="<?php echo $meta_keywords; ?>" />
        <meta property="og:url" content="<?php echo site_url(uri_string()); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $seo_title; ?>" />
        <meta property="og:description" content="<?php echo $meta_desc; ?>" />
        <title><?php echo $seo_title; ?></title>
        <link href="<?php echo base_url('assets/pc/css/style.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
        <link href="https://fonts.googleapis.com/css?family=Taviraj:400i" rel="stylesheet">
        <link href="<?php echo base_url('assets/pc/css/custom.css'); ?>" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url('assets/common/img/favicon.png'); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://jpostal-1006.appspot.com/jquery.jpostal.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110486232-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-110486232-1');
        </script>

    </head>
    <body>
    <div id="container">
        <div id="head">
            <div class="inner cf">
                <h1><?php echo $header_message; ?></h1>
                <ul>
                    <a href="<?php echo base_url($base_path.'favorite-jobs'); ?>"><li class="review">気になるリスト<span><label id="fav-count"><?php echo $fav_count; ?></label>件</span></li></a>
                    <a href="<?php echo base_url($base_path.'browsing-jobs'); ?>"><li class="review">最近閲覧したお仕事<span><?php echo $browsing_count; ?>件</span></li></a>
                    <?php if (!ab_is_jobseeker()): ?>
                        <li><a href="<?php echo site_url('login'); ?>"><img src="<?php echo base_url('assets/pc/img/btn_login.png'); ?>" alt="ログイン"></a></li>
                        <li><a href="<?php echo site_url('subscribe'); ?>"><img src="<?php echo base_url('assets/pc/img/btn_magazine.png'); ?>" alt="メルマガ登録"></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo site_url('logout'); ?>"><img src="<?php echo base_url('assets/pc/img/btn_logout.png'); ?>" alt="ログアウト"></a></li>
                        <li><a href="<?php echo site_url($base_path.'mypage'); ?>"><img src="<?php echo base_url('assets/pc/img/btn_mypage.png'); ?>" alt="マイページ"></a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div><!--/#head-->
        <div id="head2">
            <div class="inner cf">
                <div class="left_box">
                    <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url('assets/pc/img/logo.png'); ?>" width="290" alt="ホテルアグリゲーション"></a>
                    <!--<div><span><?php //echo $job_count ;?> 件</span>求人案内</div>-->
                </div>
                <ul class="right_box">
                    <li class="menu01">
                        <a href="<?php echo site_url('jobs'); ?>"><span>仕事を探す</span></a>
                    </li>
                    <li class="menu02"><a href="<?php echo site_url('article'); ?>"><span>記事を読む</span></a></li>
                    <li class="menu04"><a href="<?php echo site_url('articles/category/1') ?>"><span>転職ノウハウ</span></a></li>
                    <li class="menu05"><a href="<?php echo site_url('help'); ?>"><span>ヘルプ</span></a></li>
                </ul>
            </div>
        </div><!--/#head2-->
