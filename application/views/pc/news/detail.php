<div id="contents" class="recruit detail">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $page_title; ?></span></div>
        </div>
        <h2 class="tit mgn30"><?php echo $page_title; ?></h2>
        <div class="sec_in">
            <div class="tit_bar">
                <h2><?php echo $news->title; ?></h2>
            </div>
            <dl class="news">
                <dt><?php echo date('Y.m.d', strtotime($news->created_at)); ?></dt>
                <dd><?php echo nl2br($news->description); ?></dd>
                <dd><?php echo nl2br($news->body); ?></dd>
                <dd class="pull-right">
                    <?php if ($news->view_count > 0): ?>
                        <?php echo $news->view_count; ?> total view<?php if ($news->view_count > 1) echo 's'; ?>
                    <?php endif ?>
                </dd>
            </dl>
        </div>
        <?php $this->load->view('pc/blocks/subscribe_form'); ?>
    </div>
</div><!--/#contents-->
