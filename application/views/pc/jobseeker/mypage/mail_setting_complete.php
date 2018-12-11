<div id="contents" class="mypage setting">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit">メール配信</h2>
            <div class="sec_in cf">
                <div class="thanks">
                    <p class="ta_c">メール配信設定を変更いたしました。</p>
                    <a href="<?php echo site_url('mypage'); ?>" class="back_btn icon">マイページトップへ</a>
                </div>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
