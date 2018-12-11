<div id="container" class="signup confirm">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <ul class="form_flow cf">
        <li>基本情報入力</li>
        <li class="current">確認</li>
        <li>登録完了</li>
    </ul>
    <div class="form_tbl sec_in">
        <?php echo form_open();?>
            <dl>
                <dt>お名前<span class="must">必須</span></dt>
                <dd class="w1 cf">
                    <span class="input_text"><?php echo $jobseeker['last_name'];?></span>&emsp;
                    <span class="input_text"><?php echo $jobseeker['first_name'];?></span>
                </dd>
            </dl>
            <dl>
                <dt>フリガナ<span class="must">必須</span></dt>
                <dd class="w1 cf">
                    <span class="input_text"><?php echo $jobseeker['last_name_kana'];?></span>&emsp;
                    <span class="input_text"><?php echo $jobseeker['first_name_kana'];?></span>
                </dd>
            </dl>
            <dl>
                <dt>性別<span class="must">必須</span></dt>
                <dd>
                    <span class="input_text"><?php echo $jobseeker['gender'] === 'm' ? '男性' : '女性' ; ?></span>
                </dd>
            </dl>
            <dl>
                <dt>生年月日<span class="must">必須</span></dt>
                <dd class="w1">
                    <span class="input_text"><?php echo $jobseeker['birth_year'];?></span>
                    <span class="right">年</span>
                    <span class="input_text"><?php echo $jobseeker['birth_month'];?></span>
                    <span class="right">月</span>
                    <span class="input_text"><?php echo $jobseeker['birth_day'];?></span>
                    <span class="right">日</span>
                </dd>
            </dl>
            <dl>
                <dt>メールアドレス<span class="must">必須</span></dt>
                <dd class="w3"><span class="input_text"><?php echo $jobseeker['email'];?></span></dd>
            </dl>
            <dl>
                <dt>パスワード<span class="must">必須</span></dt>
                <dd class="w2">
                    <span class="input_text"><?php echo str_repeat('*', strlen($jobseeker['password']));?></span>
                </dd>
            </dl>
            <dl>
                <dt>電話番号<span class="must">必須</span></dt>
                <dd class="w2">
                    <span class="input_text"><?php echo $jobseeker['phone'];?></span>
                </dd>
            </dl>
            <dl>
                <dt>住所<span class="must">必須</span></dt>
                <dd class="add">
                    <span class="left">〒</span><span class="input_text"><?php echo $jobseeker['zipcode'];?></span>
                    <span class="input_text"><?php echo $jobseeker['pref_name'];?></span>
                    <span class="input_text"><?php echo $jobseeker['city'];?></span>
                </dd>
            </dl>
            <dl>
                <dt>現在の勤務状況<span class="must">必須</span></dt>
                <dd>
                    <span class="input_text"><?php echo $jobseeker['is_working'] === 0 ? '就業中' : '離職中' ; ?></span>
                </dd>
            </dl>
            <dl>
                <dt>既婚 / 未婚<span class="must">必須</span></dt>
                <dd>
                    <span class="input_text"><?php echo $jobseeker['marital_status'] === 'm' ? '既婚' : '未婚' ; ?></span>
                </dd>
            </dl>
            <div class="conf">上記の登録フォーム内容を送信することにより、<a href="<?php echo site_url('tos'); ?>" target="_blank">利用規約</a>と<a href="<?php echo site_url('privacy'); ?>" target="_blank">個人情報の取扱い</a>についてに同意したこととなります。<br>ご登録の際には、個人情報保護方針、サービスガイドライン、その他利用規約の各条項をよくお読み下さい。</div>

            <div class="btn_box2 cf">
                <input type="hidden" name="id" value="123">
                <div class="back_btn"><input type="button" value="入力画面に戻る" onclick="location.href='<?php echo site_url('signup?edit=1'); ?>';"/></div>
                <div class="form_btn"><input type="submit" value="同意して登録する" /></div>
            </div>
        <?php echo form_close(); ?>
    </div><!--/#form_tbl-->

    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#container-->
