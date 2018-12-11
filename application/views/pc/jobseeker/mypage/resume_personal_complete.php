<div id="contents" class="mypage">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit mgn20">履歴書入力・編集</h2>
            <div class="sec_in cf form_tbl">
                <div class="thanks">
                    <p>
                    履歴書を変更致しました。<br>
                    </p>
                    <a href="<?php echo base_url(); ?>" class="back_btn icon">マイページトップへ</a>
                </div>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
