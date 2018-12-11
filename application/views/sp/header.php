<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
        <meta http-equiv="content-script-type" content="text/javascript" />
        <meta http-equiv="content-style-type" content="text/css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="" content="" />
        <title><?php echo $seo_title; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sp/css/style.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sp/css/animate.css'); ?>" />
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sp/css/custom.css'); ?>" />
        <link href="https://fonts.googleapis.com/css?family=Taviraj:400i" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo base_url('assets/common/img/favicon.png'); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
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
        <div id="container" class="<?php echo $page_class; ?>">
            <div id="head">
                <div class="cf">
                    <h1><a href="<?php echo site_url(''); ?>"><img src="<?php echo base_url('assets/sp/img/logo.png'); ?>" alt=""></a></h1>
                    <ul class="<?php echo (ab_is_jobseeker()) ? 'head_logout':'' ; ?>">
                        <li><a href="<?php echo site_url('favorite-jobs'); ?>"><img src="<?php echo base_url('assets/sp/img/head_menu01.png'); ?>" alt="気になる"></a></li>
                        <li><a href="<?php echo site_url('browsing-jobs'); ?>"><img src="<?php echo base_url('assets/sp/img/head_menu02.png'); ?>" alt="閲覧履歴"></a></li>
                        <li><a href="<?php echo site_url('jobs'); ?>"><img src="<?php echo base_url('assets/sp/img/head_menu03.png'); ?>" alt="検索"></a></li>
                        <?php if (!ab_is_jobseeker()): ?>
                            <li><a href="<?php echo site_url('login'); ?>"><img src="<?php echo base_url('assets/sp/img/head_menu04.png'); ?>" alt="ログイン"></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo site_url($base_path.'mypage'); ?>"><img src="<?php echo base_url('assets/sp/img/head_menu05.png'); ?>" alt="マイページ"></a></li>
                            <li><a href="<?php echo site_url('logout'); ?>"><img src="<?php echo base_url('assets/sp/img/logout.png'); ?>" alt="ログアウト"></a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div><!--/#head-->
