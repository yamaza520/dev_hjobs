<a href="<?php echo site_url('subscribe'); ?>" class="btn_ezine"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>

<h2 class="tit mgn10"><?php echo $page_title; ?></h2>
<div class="inner">
    <h3 class="tit_bdr01"><?php echo $news->title; ?></h3></div>
<div class="rec_box">
    <dl class="news">
        <dt><?php echo date('Y.m.d', strtotime($news->created_at)); ?></dt>
        <dd><?php echo nl2br($news->body); ?></dd>
    </dl>
</div>

<?php $this->load->view('sp/blocks/subscribe_form'); ?>
<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
