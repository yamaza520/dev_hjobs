<div id="contents" class="recruit">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $page_title; ?></span></div>
        </div>
        <h2 class="tit mgn30"><?php echo $page_title; ?></h2>
        <div class="sec_in">
            <div class="qa">
            <?php foreach ($result as $row): ?>
                <dl>
                    <dt><?php echo nl2br($row->question);?></dt>
                    <dd><?php echo nl2br($row->answer);?></dd>
                </dl>
            <?php endforeach;?>
            </div>
        </div>
    </div>
    <?php $this->load->view('pc/blocks/subscribe_form'); ?>
</div><!--/#contents-->
