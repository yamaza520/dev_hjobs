<div class="login">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <div class="form_tbl">
        <p class="ta_l mgn20">
        マイページへのログイン用のパスワードをお忘れの方は、下記フォームにご登録に使用したメールアドレスをご入力ください。<br>
        そのメールアドレス宛に、パスワード再設定のご案内を自動送信いたします。
        </p>
        <?php if ($message) { ?>
            <dl class="validation mgnT">
                <dt><?php echo $message; ?></dt>
            </dl>
        <?php } ?>
        <?php echo form_open("auth/forgot_password");?>
            <dl>
                <dt><label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label</dt>
                <dd><?php echo form_input($identity);?></dd>
            </dl>
            <div class="btn_box">
                <div class="form_btn"><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></div>
            </div>
        <?php echo form_close();?>
    </div><!--/#form_tbl-->
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#contents-->
