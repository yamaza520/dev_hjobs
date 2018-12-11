<div class="mypage setting signup">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <?php if ($message) { ?>
        <dl class="validation mgnT">
            <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
            <dd><?php echo $message; ?></dd>
        </dl>
    <?php } ?>
    <div class="form_tbl">
        <?php echo form_open('auth/reset_password/' . $code);?>
            <dl>
                <dt class="nobg"><label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
                        <span class="must">必須</span>
                </dt>
                <dd class="w2">
                    <?php echo form_input($new_password, '', array('class' => 'form-control', 'placeholder' => 'xyz987654321'));?>
                    <p class="memo">
                    ※8文字以上で英字・数字どちらも必ず使用して下さい。<br>
                    ※半角英数文字で入力してください。ハイフン[-]やアンダーバー[_]などの記号は使えません。<br>
                    ※メールアドレスの@以前と同じパスワードは設定できません。<br>
                    ※生年月日と同じパスワードは設定できません。
                    </p>
                </dd>
            </dl>
            <dl class="mgn20">
                <dt class="nobg"><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?><span class="must">必須</span>
                </dt>
                <dd class="w2"><?php echo form_input($new_password_confirm, '', array('class' => 'form-control', 'placeholder' => 'xyz987654321'));?>
                </dd>
            </dl>
            <?php echo form_input($user_id);?>
            <?php echo form_hidden($csrf); ?>
            <?php echo form_input($email); ?>
            <div class="btn_box">
                <div class="form_btn"><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></div>
            </div>
        <?php echo form_close();?>
    </div><!--/#form_tbl-->
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#contents-->
