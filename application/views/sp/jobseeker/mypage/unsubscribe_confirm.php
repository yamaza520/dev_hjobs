<div id="container" class="mypage signup setting">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>
    <h2 class="tit mgn10"><?php echo $page_title; ?></h2>
    <div class="form_tbl cf">
        <?php echo form_open();?>
            <div class="bg">
                <p class="memo2"><span>ご注意ください</span>
                退会すると登録した情報や応募履歴、検討中リストに保存した求人情報がすべて削除されます。<br>
                メールマガジンの配信も停止されます。
                </p>
                <p class="memo3">退会手続きを実行しても<br>よろしいでしょうか？</p>
                <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                <div class="ta_c cf inner mgn30">
                    <div class="form_btn2"><input type="submit" value="はい、退会します"/></div>
                    <div class="form_btn2"><input type="button" value="いいえ、退会しません" onclick="location.href='<?php echo site_url('mypage/unsubscribe?edit=1'); ?>';"/></div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo site_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
