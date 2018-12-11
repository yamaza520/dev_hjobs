<div id="contents" class="mypage setting signup confirm">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit">基本情報の確認・編集</h2>
            <div class="sec_in cf form_tbl">
                <dl>
                    <dt>お名前<span class="must">必須</span></dt>
                    <dd class="w4">
                        <span class="input_text"><?php echo $jobseeker['last_name'];?></span>&emsp;
                        <span class="input_text"><?php echo $jobseeker['first_name'];?></span>
                    </dd>
                </dl>
                <dl>
                    <dt>フリガナ<span class="must">必須</span></dt>
                    <dd class="w4">
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
                    <span class="right bb">年</span>
                    <span class="input_text"><?php echo $jobseeker['birth_month'];?></span>
                    <span class="right bb">月</span>
                    <span class="2"><?php echo $jobseeker['birth_day'];?></span>
                    <span class="right bb">日</span>
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
                        <div class="wrap_input">
                            <span class="left bb">〒</span>
                            <span class="input_text"><?php echo $jobseeker['zip_code'];?></span>&emsp;
                            <span class="input_text"><?php echo $jobseeker['pref_name'];?></span>
                            <span class="input_text"><?php echo $jobseeker['city']; ?></span>
                        </div>
                        <span class="input_text"><?php echo $jobseeker['address'];?></span>
                    </dd>
                </dl>
                <dl>
                    <dt>既婚 / 未婚<span class="must">必須</span></dt>
                    <dd>
                        <span class="input_text"><?php echo $jobseeker['marital_status'] === 'm' ? '既婚' : '未婚' ; ?></span>
                    </dd>
                </dl>
                <div class="btn_box2 cf">
                    <?php echo form_open('');?>
                        <input type="hidden" name="id" value="123">
                        <div class="back_btn"><input type="button" value="入力画面に戻る" onclick="location.href='<?php echo site_url('mypage/basic?edit=1'); ?>';"/></div>
                        <div class="form_btn"><input type="submit" value="同意して登録する" /></div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
