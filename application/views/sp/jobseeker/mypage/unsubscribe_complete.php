<div id="container" class="mypage signup setting">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>
    <h2 class="tit mgn10"><?php echo $page_title; ?></h2>
    <div class="form_tbl cf">
        <div class="thanks">
            <p class="ta_c">
            退会手続きが完了いたしました。<br>
            ご利用いただき<br>誠にありがとうございました。<br>
            またのご利用をお待ちしております。</p>
            <a href="<?php echo site_url(); ?>" class="back_btn">トップページへ</a>
        </div>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo site_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
