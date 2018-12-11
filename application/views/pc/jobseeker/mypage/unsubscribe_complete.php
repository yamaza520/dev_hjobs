<div id="contents" class="mypage signup setting">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit"><?php echo $page_title; ?></h2>
            <div class="sec_in form_tbl cf">
                <div class="thanks">
                    <p class="ta_c">
                        退会手続きが完了いたしました。<br>
                        ご利用いただき誠にありがとうございました。<br>
                        またのご利用をお待ちしております。</p>
                    <a href="<?php echo site_url(); ?>" class="back_btn">トップページへ</a>
                </div>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
