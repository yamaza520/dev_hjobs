<div id="container" class="mypage signup setting">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>

    <h2 class="tit mgn10"><?php echo $page_title; ?></h2>
    <div class="form_tbl cf">
        <p class="text">受け取る・受け取らないを選択し、設定ボタンを押してください。</p>
        <?php echo form_open(); ?>
            <dl>
                <dt>メールマガジン</dt>
                <dd><span>転職に役立つ情報を不定期でお届けいたします。</span></dd>
                <dd class="check">
                    <ul class="cf">
                        <li>
                            <input type="radio" name="mail_magazine" value="1" <?php echo $result->mail_magazine_flag == 1 ? 'checked' : ''; ?>/>
                            <label>受け取る</label>
                        </li>
                        <li>
                            <input type="radio" name="mail_magazine" value="0" <?php echo $result->mail_magazine_flag == 0 ? 'checked' : ''; ?>/>
                            <label>受け取らない</label>
                        </li>
                    </ul>
                </dd>
            </dl>
            <dl class="mgn20">
                <dt>アラートメール</dt>
                <dd><span>ご希望の条件にあった求人情報を毎日お届けいたします。</span></dd>
                <dd class="check">
                    <ul class="cf">
                        <li>
                            <input type="radio" name="alert_mail" value="1" <?php echo $result->alert_mail_flag == 1 ? 'checked' : ''; ?>/>
                            <label>受け取る</label>
                        </li>
                        <li>
                            <input type="radio" name="alert_mail" value="0" <?php echo $result->alert_mail_flag == 0 ? 'checked' : ''; ?>/>
                            <label>受け取らない</label>
                        </li>
                    </ul>
                </dd>
            </dl>
            <div class="form_btn">
                <?php echo form_submit('submit', '設定する'); ?>
            </div>
        <?php echo form_close(); ?>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
