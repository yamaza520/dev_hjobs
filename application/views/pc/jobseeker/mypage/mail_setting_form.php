<div id="contents" class="mypage setting">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit">メール配信</h2>
            <div class="sec_in cf">
                <p class="text">受け取る・受け取らないを選択し、設定ボタンを押してください。</p>
                <?php echo form_open(); ?>
                    <dl>
                        <dt class="bg">メールマガジン<span>転職に役立つ情報を不定期でお届けいたします。</span></dt>
                        <dd>
                            <ul class="check_wrap cf w30p">
                                <li><input type="radio" name='mail_magazine' value="1" <?php echo $result->mail_magazine_flag == 1 ? 'checked' : ''; ?>/><label>受け取る</label></li>
                                <li><input type="radio" name='mail_magazine' value="0" <?php echo $result->mail_magazine_flag == 0 ? 'checked' : ''; ?>/><label>受け取らない</label></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="mgn30">
                        <dt class="bg">アラートメール<span>ご希望の条件にあった求人情報を毎日お届けいたします。</span></dt>
                        <dd>
                            <ul class="check_wrap cf w30p">
                                <li><input type="radio" name='alert_mail' value="1" <?php echo $result->alert_mail_flag == 1 ? 'checked' : ''; ?>/><label>受け取る</label></li>
                                <li><input type="radio" name='alert_mail' value="0" <?php echo $result->alert_mail_flag == 0 ? 'checked' : ''; ?>/><label>受け取らない</label></li>
                            </ul>
                        </dd>
                    </dl>
                    <div class="form_btn"><?php echo form_submit('submit', '設定する'); ?></div>
                <?php echo form_close(); ?>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
