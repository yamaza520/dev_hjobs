<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo $page_title; ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box-body">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3><?php echo $count->job_total; ?></h3>
                            <p>求人獲得数（総数： <?php echo $count->job_total; ?>）</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <a href="<?php echo site_url('admin/jobs'); ?>" class="small-box-footer">詳細情報 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo $count->job_application_total; ?></h3>
                            <p>求人応募獲得数（総数： <?php echo $count->job_application_total; ?>）</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-database"></i>
                        </div>
                        <a href="<?php echo site_url('admin/job_application'); ?>" class="small-box-footer">詳細情報 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $count->member_total; ?></h3>
                            <p>会員獲得数（総数： <?php echo $count->member_total; ?>）</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo site_url('admin/job_seeker'); ?>" class="small-box-footer">詳細情報 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
</section>
