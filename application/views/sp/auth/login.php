<div class="login">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <?php if ($message) { ?>
        <dl class="success mgnT"><?php echo $message; ?></dl>
    <?php } ?>
    <?php if ($error) { ?>
        <dl class="validation mgnT">
            <dt>入力エラー：下記の項目の再入力をお願いいします。</dt>
            <dd><?php echo $error; ?></dd>
        </dl>
    <?php } ?>
    <div class="form_tbl">
        <?php echo form_open();?>
            <dl>
                <dt>メールアドレス</dt>
                <dd>
                    <?php echo form_input($identity); ?>
                </dd>
            </dl>
            <dl>
                <dt>パスワード</dt>
                <dd class="pwform">
                    <?php echo form_input($password); ?>
                </dd>
            </dl>
            <a href="<?php echo site_url('auth/forgot_password'); ?>" class="memo">会員ID、パスワードをお忘れの方はコチラ</a>
            <div class="btn_box">
                <div class="form_btn"><input type="submit" value="ログインする" /></div>
                <div class="form_btn"><a href="<?php echo site_url('signup'); ?>">新規会員登録はこちら</a></div>
            </div>
        <?php echo form_close(); ?>
    </div><!--/#form_tbl-->
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#contents-->
