<div id="contents" class="mypage setting signup">
        <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
        <div class="inner cf">
            <div id="main">
                <div class="sec_in">
                    <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
                </div>
                <h2 class="tit">ログインパスワード設定</h2>
                <?php if ($message) { ?>
                    <dl class="validation mgnT">
                        <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                        <?php echo $message;?>
                    </dl>
                <?php } ?>
                <div class="sec_in form_tbl cf w240">
                    <?php echo form_open("auth/change_password");?>
                        <dl>
                            <dt>現在のパスワード<span class="must">必須</span></dt>
                            <dd class="w2">
                                <?php echo form_input($old_password);?>
                            </dd>
                        </dl>
                        <dl>
                            <dt>新しいパスワード<span class="must">必須</span></dt>
                            <dd class="w2">
                                <?php echo form_input($new_password);?>
                                <p class="memo">
                                ※8文字以上で英字・数字どちらも必ず使用して下さい。<br>
                                ※半角英数文字で入力してください。ハイフン[-]やアンダーバー[_]などの記号は使えません。<br>
                                ※メールアドレスの@以前と同じパスワードは設定できません。<br>
                                ※生年月日と同じパスワードは設定できません。
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>新しいパスワード(確認)<span class="must">必須</span></dt>
                            <dd class="w2"><?php echo form_input($new_password_confirm);?></dd>
                        </dl>
                        <?php echo form_input($email);?>
                        <div class="form_btn"><input type="submit" value="設定する" /></div>
                    <?php echo form_close();?>
                </div>
            </div><!--/#main-->
            <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
        </div>
    </div><!--/#contents-->
