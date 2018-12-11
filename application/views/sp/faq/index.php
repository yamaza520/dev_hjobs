<div id="container" class="recruit detail">
	<h2 class="tit mgn10">ヘルプ</h2>
	<div class="inner"><h3 class="tit_bdr01">多く寄せられる質問</h3></div>
	<div class="rec_box">
		<div class="qa">
			<?php foreach ($result as $row): ?>
                <dl>
                    <dt><?php echo nl2br($row->question);?></dt>
                    <dd><?php echo nl2br($row->answer);?></dd>
                </dl>
            <?php endforeach;?>
		</div>
	</div>
	<?php $this->load->view('sp/blocks/subscribe_form'); ?>
	<a href="#container" class="top_btn"><img src="<?php echo site_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
