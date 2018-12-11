<div id="contents" class="recruit detail">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $page_title; ?></span></div>
        </div>

        <h2 class="tit mgn30"><?php echo nl2br($page_title); ?></h2>
        <div class="page-numbers_wrap cf">
            <?php if (count($result)): ?>
                <span class="current_page"><?php echo $paging_info ; ?></span>
                <div class="pager">
                    <?php echo $pagination; ?>
                </div>
            <?php endif ?>
        </div>
        <?php if (count($result)): ?>
            <?php foreach ($result as $row): ?>
                <div class="sec_in">
                    <div class="tit_bar">
                        <h2><a href="<?php echo base_url($base_path.'news/detail/'.$row->id); ?>" target="_blank"><?php echo nl2br($row->title);?></a></h2></div>
                    <dl class="news">
                        <dt><?php echo date('Y.m.d', strtotime($row->created_at)); ?></dt>
                        <dd><?php echo nl2br(ab_shorten($row->body, 461)); ?></dd>
                    </dl>
                </div>
            <?php endforeach;?>
            <div class="page-numbers_wrap cf">
                <span class="current_page"><?php echo $paging_info ; ?></span>
                <?php echo $pagination; ?>
            </div>
        <?php else: ?>
        データはありません。
        <?php endif ?>
        <?php $this->load->view('pc/blocks/subscribe_form'); ?>
    </div>
</div>
<!--/#contents-->
