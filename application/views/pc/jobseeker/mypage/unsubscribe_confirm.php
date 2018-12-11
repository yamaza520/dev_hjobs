<div id="contents" class="mypage signup setting">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit"><?php echo $page_title; ?></h2>
            <div class="sec_in form_tbl cf">
                <div class="bg">
                    <p class="memo2"><span>ご注意ください</span>
                        退会すると登録した情報や応募履歴、検討中リストに保存した求人情報がすべて削除されます。<br>
                        メールマガジンの配信も停止されます。
                    </p>
                    <p class="memo3">退会手続きを実行してもよろしいでしょうか？</p>
                    <div class="ta_c cf btn_box2">
                        <?php echo form_open();?>
                            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                            <div class="form_btn"><input type="submit" value="はい、退会します"/></div>
                            <div class="back_btn"><input type="button" value="いいえ、退会しません" onclick="location.href='<?php echo site_url('mypage/unsubscribe?edit=1'); ?>';"/></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
