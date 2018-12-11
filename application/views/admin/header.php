<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $seo_title; ?> Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url('assets/common/img/favicon.png'); ?>">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/skins/_all-skins.min.css'); ?>">

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .checkall-form table tr th:first-child,
        .checkall-form table tr td:first-child {
            text-align: center !important;
        }
        .div-scroll {
            max-height: 500px;
            overflow-x: hidden;
            overflow-y: scroll;
        }
        .image {
            margin-bottom: 5px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: #333;
        }
        .resume_form_text2 span.num {
            color: #0078d7;
            font-weight: bold;
            display: inline-block;
            padding: 0 2px;
        }
        .subgroup {
            padding: 5px 0 5px 25px;
        }
        .custom-tabs {
            margin-left: -1px;
            margin-top: -1px;
        }
        .nav-tabs.custom-tabs > li > a {
            border-radius: 0;
            font-weight: bold;
            padding: 13px 18px;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo site_url(); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">管理者</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('assets/admin/img/avatar5.png'); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $login_user['name']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('assets/admin/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $login_user['name']; ?>
                                        <small><?php echo $login_user['group_desc']; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat" href="<?php echo site_url($base_path . 'auth/change_password'); ?>">Change Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url($base_path . 'auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url('assets/admin/img/avatar5.png'); ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $login_user['name']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php if (uri_check('admin') || uri_check('admin/dashboard')) echo 'class="active"'; ?>>
                        <a href="<?php echo site_url('admin/dashboard'); ?>">
                            <i class="fa fa-dashboard"></i> <span>KPI表示</span>
                        </a>
                    </li>
                    <?php if ($this->ion_auth->is_admin()): ?>
                    <li class="treeview<?php if (uri_segment(2) == 'user' || uri_segment(3) == 'edit_user'|| uri_segment(3) == 'create_user') echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>管理者管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check(sprintf('%suser/%d/list', $base_path, GROUP_ADMIN))) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url(sprintf('%suser/%d/list', $base_path, GROUP_ADMIN)); ?>"><i class="fa fa-circle-o"></i> 管理者一覧</a>
                            </li>
                            <li <?php if ((uri_check(sprintf('%suser/%d/create', $base_path, GROUP_ADMIN))) || uri_check_contain((sprintf('%suser/%d/edit_user', $base_path, GROUP_ADMIN)))) echo 'class="active"'; ?>>
                                 <a href="<?php echo site_url($base_path.'user/'.GROUP_ADMIN.'/create'); ?>"><i class="fa fa-circle-o"></i> 管理者登録</a>
                            </li>
                            <li <?php if (uri_check(sprintf('%suser/%d/list', $base_path, GROUP_EDITOR))) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url(sprintf('%suser/%d/list', $base_path, GROUP_EDITOR)); ?>"><i class="fa fa-circle-o"></i> 編集者一覧</a>
                            </li>
                            <li <?php if ((uri_check(sprintf('%suser/%d/create', $base_path, GROUP_EDITOR))) || uri_check_contain((sprintf('%suser/%d/edit_user', $base_path, GROUP_EDITOR)))) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'user/'.GROUP_EDITOR.'/create'); ?>"><i class="fa fa-circle-o"></i> 編集者登録</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif ?>
                    <li class="treeview<?php if (uri_check_contain($base_path.'job_seeker')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>会員管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check_contain($base_path.'job_seeker')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'job_seeker'); ?>"><i class="fa fa-circle-o"></i> 会員一覧</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check($base_path.'job_application')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-server"></i> <span>求人応募</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'job_application')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'job_application'); ?>"><i class="fa fa-circle-o"></i>求人応募リスト</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check_contain($base_path . 'ip')
                                                 || uri_check($base_path . 'login_history')
                                                 || uri_check_contain($base_path . 'site_setting')
                                                 || uri_check_contain($base_path . 'page_setting')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-gears"></i> <span>システム</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check_contain($base_path . 'ip')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path . 'ip'); ?>"><i class="fa fa-circle-o"></i> アクセス許可IP</a>
                            </li>
                            <li <?php if (uri_check($base_path . 'login_history')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path . 'login_history'); ?>"><i class="fa fa-circle-o"></i> ログイン履歴</a>
                            </li>
                            <li <?php if (uri_check($base_path . 'site_setting/maintenance')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path . 'site_setting/maintenance'); ?>"><i class="fa fa-circle-o"></i> メンテナンスモード</a>
                            </li>
                            <li <?php if (uri_check_contain($base_path . 'page_setting/pagination')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path . 'page_setting/pagination'); ?>"><i class="fa fa-circle-o"></i>ページ件数設定</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check($base_path.'articles') || uri_check_contain($base_path.'article')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-newspaper-o"></i> <span>コラム</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'articles')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'articles'); ?>"><i class="fa fa-circle-o"></i> コラム一覧</a>
                            </li>
                            <li <?php if (uri_check_contain($base_path.'article/setup')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'article/setup'); ?>"><i class="fa fa-circle-o"></i> コラム登録</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check_contain($base_path.'faq')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-comments-o"></i> <span>FAQ</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'faq')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'faq'); ?>"><i class="fa fa-circle-o"></i> FAQ一覧</a>
                            </li>
                            <li <?php if (uri_check($base_path.'faq/setup')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'faq/setup'); ?>"><i class="fa fa-circle-o"></i>FAQ登録</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check($base_path.'jobs') || uri_check_contain($base_path.'job/setup') || uri_check_contain($base_path.'job_flags') || uri_check_contain($base_path. 'job/employer')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-server"></i> <span>求人</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'jobs')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'jobs'); ?>"><i class="fa fa-circle-o"></i> 求人一覧</a>
                            </li>
                            <li <?php if (uri_check_contain($base_path.'job/setup')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'job/setup'); ?>"><i class="fa fa-circle-o"></i> 求人登録</a>
                            </li>
                            <li <?php if (uri_check_contain($base_path.'job_flags')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'job_flags'); ?>"><i class="fa fa-circle-o"></i> 検索キーワード</a>
                            </li>
                            <li <?php if (uri_check_contain($base_path.'job/employer')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'job/employer'); ?>"><i class="fa fa-circle-o"></i> 雇用主</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check_contain($base_path.'news')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-bullhorn"></i> <span>お知らせ</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'news')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'news'); ?>"><i class="fa fa-circle-o"></i> お知らせ一覧</a>
                            </li>
                            <li <?php if (uri_check($base_path.'news/setup')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'news/setup'); ?>"><i class="fa fa-circle-o"></i> お知らせ登録</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check_contain($base_path.'mail_template')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-envelope-o"></i> <span>メールテンプレート</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'mail_template')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'mail_template'); ?>"><i class="fa fa-circle-o"></i> メールテンプレート一覧</a>
                            </li>
                            <li <?php if (uri_check_contain($base_path.'mail_template/setup')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'mail_template/setup'); ?>"><i class="fa fa-circle-o"></i> メールテンプレート登録</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check($base_path.'mail_magazine')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-envelope"></i> <span>メール配信履歴</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'mail_magazine')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'mail_magazine'); ?>"><i class="fa fa-circle-o"></i> メール配信履歴一覧</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview<?php if (uri_check_contain($base_path.'contact')) echo ' active'; ?>">
                        <a href="#">
                            <i class="fa fa-envelope-open-o"></i> <span>お問い合わせ管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if (uri_check($base_path.'contact/company')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'contact/company'); ?>"><i class="fa fa-circle-o"></i> 提携をご希望の企業様へ</a>
                            </li>
                            <li <?php if (uri_check($base_path.'contact/individual')) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url($base_path.'contact/individual'); ?>"><i class="fa fa-circle-o"></i> お問い合わせ</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
