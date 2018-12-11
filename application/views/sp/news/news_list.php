<a href="<?php echo site_url('subscribe'); ?>" class="btn_ezine"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>

<h2 class="tit mgn10">お知らせ一覧</h2>
<?php if (count($result)): ?>
    <?php foreach ($result as $row): ?>
        <div class="inner">
            <h3 class="tit_bdr01"><a href="<?php echo base_url($base_path.'news/detail/'.$row->id); ?>" target="_blank"><?php echo nl2br($row->title);?></a></h3>
        </div>
        <div class="rec_box">
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

<?php $this->load->view('sp/blocks/subscribe_form'); ?>
<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
