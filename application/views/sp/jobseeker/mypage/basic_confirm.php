<div id="container" class="mypage signup">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>

    <h2 class="tit">基本情報の確認・編集</h2>
    <div class="form_tbl sec_in">
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
                <dt>電話番号<span class="must">必須</span></dt>
                <dd class="w2">
                    <span class="input_text"><?php echo $jobseeker['phone'];?></span>
                </dd>
            </dl>
            <dl>
                <dt>住所<span class="must">必須</span></dt>
                <dd class="add">
                    <span class="left">〒</span>
                    <span class="input_text"><?php echo $jobseeker['zip_code'];?></span>&emsp;
                    <span class="input_text"><?php echo $jobseeker['pref_name'];?></span>
                    <span class="input_text"><?php echo $jobseeker['city']; ?></span>
                    <span class="input_text"><?php echo $jobseeker['address'];?></span>
                </dd>
            </dl>
            <dl class="mgn30">
                <dt>既婚 / 未婚<span class="must">必須</span></dt>
                <dd>
                    <span class="input_text"><?php echo $jobseeker['marital_status'] === 'm' ? '既婚' : '未婚' ; ?></span>
                </dd>
            </dl>
            <div class="btn_box2 cf">
                <?php echo form_open('');?>
                <input type="hidden" name="id" value="123">
                <div class="back_btn"><input type="button" value="編集画面に戻る" onclick="location.href='<?php echo site_url('mypage/basic?edit=1'); ?>';"/></div>
                <div class="form_btn"><input type="submit" value="この内容で更新する" /></div>
                <?php echo form_close(); ?>
            </div>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#container-->
