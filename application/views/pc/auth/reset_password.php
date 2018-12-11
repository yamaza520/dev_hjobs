<div id="contents" class="mypage setting signup">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $page_title; ?></span></div>
        </div>
        <h2 class="tit"><?php echo $page_title; ?></h2>
        <?php if ($message) { ?>
            <dl class="validation mgnT">
                <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                <dd><?php echo $message; ?></dd>
            </dl>
        <?php } ?>
        <div class="sec_in form_tbl cf w240">
            <p class="ta_l mgn10">
            マイページへのログイン用の新しいパスワードを設定します。
            </p>
            <?php echo form_open('auth/reset_password/' . $code);?>
                <dl>
                    <dt>
                        <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
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
                <dl>
                    <dt><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?><span class="must">必須</span></dt>
                    <dd class="w2"><?php echo form_input($new_password_confirm, '', array('class' => 'form-control', 'placeholder' => 'xyz987654321'));?></dd>
                </dl>
                <?php echo form_input($user_id);?>
                <?php echo form_hidden($csrf); ?>
                <?php echo form_input($email); ?>
                <div class="form_btn3"><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></div>
            <?php echo form_close();?>
        </div>
    </div>
</div><!--/#contents-->
