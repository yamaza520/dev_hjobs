<div id="container" class="mypage signup">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>

    <h2 class="tit mgn10">基本情報の確認・編集</h2>
    <div class="form_tbl cf">
        <div class="thanks">
            <p class="ta_c">基本情報の設定を変更いたしました。</p>
            <a href="<?php echo site_url('mypage'); ?>" class="back_btn icon">マイページトップへ</a>
        </div>
    </div>

    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#container-->
