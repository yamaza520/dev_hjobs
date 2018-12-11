<div id="container" class="signup ezine confirm">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <ul class="form_flow cf ez">
        <li>入力</li>
        <li class="current">確認</li>
        <li>メルマガ登録完了</li>
    </ul>
    <div class="form_tbl sec_in">
        <?php echo form_open(); ?>
            <dl>
                <dt>メールアドレス<span class="must">必須</span></dt>
                <dd class="w3"><span class="input_text"><?php echo $result['mail'] ;?></span></dd>
            </dl>
            <dl>
                <dt>メールアドレス(確認)<span class="must">必須</span></dt>
                <dd class="w3"><span class="input_text"><?php echo $result['conf_mail'] ;?></span></dd>
            </dl>
            <dl>
                <dt>パスワード<span class="must">必須</span></dt>
                <dd class="w2">
                    <span class="input_text"><?php echo str_repeat('*', strlen($result['password'])) ;?></span>
                </dd>
            </dl>
            <dl>
                <dt>都道府県<span class="must">必須</span></dt>
                <dd class="add">
                    <span class="input_text"><?php echo $result['pref_name'] ;?></span>
                </dd>
            </dl>
            <div class="conf">上記の登録フォーム内容を送信することにより、<a href="<?php echo site_url('tos'); ?>" target="_blank">利用規約</a>と<a href="<?php echo site_url('privacy'); ?>" target="_blank">個人情報の取扱い</a>についてに同意したこととなります。<br>ご登録の際には、個人情報保護方針、サービスガイドライン、その他利用規約の各条項をよくお読み下さい。</div>
            <div class="btn_box2 cf">
                <div class="back_btn">
                    <input type="button" value="入力画面に戻る" onclick="location.href='<?php echo site_url('subscribe?edit=1'); ?>';"/>
                </div>
                <div class="form_btn">
                    <input type="submit" name="register" value="同意して登録する" />
                </div>
            </div>
        <?php echo form_close(); ?>
    </div><!--/#form_tbl-->

    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#container-->
