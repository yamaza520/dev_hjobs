<div id="contents" class="signup">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $page_title; ?></span></div>
        </div>
        <h2 class="tit mgn30"><?php echo $page_title; ?></h2>
        <ul class="form_flow cf">
            <li class="current">基本情報入力</li>
            <li>確認</li>
            <li>登録完了</li>
        </ul>
        <?php if (isset($message) && $message) : ?>
            <dl class="validation mgnT">
                <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                <?php echo $message;?>
            </dl>
        <?php endif ?>
        <div class="form_tbl sec_in">
            <!-- form start -->
            <?php echo form_open('', array('method' => 'post'));?>
                <dl>
                    <dt>お名前<span class="must">必須</span></dt>
                    <dd class="w1">
                        <span class="left">姓</span>
                        <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'last_name',
                                'value' => set_value('last_name', $jobseeker['last_name']),
                                'maxlength'   => '50',
                                'placeholder' => '山田',
                                'required' => 'required'
                            ));
                        ?>

                        &emsp;
                        <span class="left">名</span>
                        <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'first_name',
                                'value' => set_value('first_name', $jobseeker['first_name']),
                                'maxlength'   => '50',
                                'placeholder' => '太郎',
                                'required' => 'required'
                            ));
                        ?>
                    </dd>
                </dl>
                <dl>
                    <dt>フリガナ<span class="must">必須</span></dt>
                    <dd class="w1">
                        <span class="left">セイ</span>
                        <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'first_name_kana',
                                'value' => set_value('first_name_kana', $jobseeker['first_name_kana']),
                                'maxlength'   => '50',
                                'placeholder' => 'タロウ',
                                'required' => 'required'
                            ));
                        ?>
                        &emsp;
                        <span class="left">メイ</span>
                        <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'last_name_kana',
                                'value' => set_value('last_name_kana', $jobseeker['last_name_kana']),
                                'maxlength'   => '50',
                                'placeholder' => 'ヤマダ',
                                'required' => 'required'
                            ));
                        ?>
                    </dd>
                </dl>
                <dl>
                    <dt>性別<span class="must">必須</span></dt>
                    <dd>
                        <label><input type="radio" name="gender" value="f" <?php echo set_radio('gender', 'f', $jobseeker['gender'] == 'f' ? true : false);?> required/>女性</label>
                        <label><input type="radio" name="gender" value="m" <?php echo set_radio('gender', 'm', $jobseeker['gender'] == 'm' ? true : false);?> required/>男性</label>
                    </dd>
                </dl>
                <dl>
                    <dt>生年月日<span class="must">必須</span></dt>
                    <dd class="w1">
                        <?php echo form_dropdown('birth_year', $years, set_value('birth_year', $jobseeker['birth_year']), array('required' => 'required')); ?>
                        <span class="right">年</span>
                        <?php echo form_dropdown('birth_month', $months, set_value('birth_month', $jobseeker['birth_month']), array('required' => 'required')); ?>
                        <span class="right">月</span>
                        <?php echo form_dropdown('birth_day', $days, set_value('birth_day', $jobseeker['birth_day']), array('required' => 'required')); ?>
                        <span class="right">日</span>
                    </dd>
                </dl>
                <dl>
                    <dt>メールアドレス<span class="must">必須</span></dt>
                    <dd class="w3">
                        <?php
                            echo form_input(array(
                                'type'  => 'email',
                                'class' => 'w1',
                                'name'  => 'email',
                                'value' => set_value('email', $jobseeker['email']),
                                'placeholder' => 'abcdef@sample.jp',
                                'required' => 'required'
                            ));
                        ?>
                    </dd>
                </dl>
                <dl>
                    <dt>パスワード<span class="must">必須</span></dt>
                    <dd class="w2">
                        <?php
                            echo form_input(array(
                                'type'  => 'password',
                                'class' => 'w1',
                                'name'  => 'password',
                                'value' => set_value('password'),
                                'placeholder' => 'abcde012345',
                                'required' => 'required'
                            ));
                        ?>
                        <p class="memo">
                        ※8文字以上で英字・数字どちらも必ず使用して下さい。<br>
                        ※半角英数文字で入力してください。ハイフン[-]やアンダーバー[_]などの記号は使えません。<br>
                        ※メールアドレスの@以前と同じパスワードは設定できません。<br>
                        ※生年月日と同じパスワードは設定できません。
                        </p>
                    </dd>
                </dl>
                <dl>
                    <dt>パスワード（確認）<span class="must">必須</span></dt>
                    <dd class="w2">
                        <?php
                            echo form_input(array(
                                'type'  => 'password',
                                'name'  => 'confirm_password',
                                'value' => set_value('confirm_password'),
                                'placeholder' => 'abcde012345',
                                'required' => 'required'
                            ));
                        ?>
                    </dd>
                </dl>
                <dl>
                    <dt>電話番号<span class="must">必須</span></dt>
                    <dd class="w2">
                        <?php
                            echo form_input(array(
                                'type'  => 'tel',
                                'name'  => 'phone',
                                'value' => set_value('phone', $jobseeker['phone']),
                                'placeholder' => '08012345678',
                                'required' => 'required'
                            ));
                        ?>
                        <p class="memo">※半角数字で入力して下さい。携帯番号を推奨しております。</p>
                    </dd>
                </dl>
                <dl>
                    <dt>住所<span class="must">必須</span></dt>
                    <dd class="add w1">
                        <span class="left">〒</span>
                        <?php
                            echo form_input(array(
                                'type'  => 'tel',
                                'name'  => 'zipcode',
                                'value' => set_value('zipcode', $jobseeker['zipcode']),
                                'placeholder' => '000-0000',
                                'maxlength' => 8,
                                'required' => 'required'
                            ));
                        ?>&emsp;
                        <span class="left">都道府県</span>
                        <?php echo form_dropdown('pref_cd', $prefectures, set_value('pref_cd', $jobseeker['pref_cd']), array('required' => 'required')); ?>
                        &emsp;
                        <span class="left">市区町村</span>
                        <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'city',
                                'value' => set_value('city', $jobseeker['city']),
                                'maxlength' => '20',
                                'required' => 'required'
                            ));
                        ?>
                    </dd>
                </dl>
                <dl>
                    <dt>現在の勤務状況<span class="must">必須</span></dt>
                    <dd>
                        <label><input type="radio" name="is_working" value="0" <?php echo set_radio('is_working', 0, $jobseeker['is_working'] === 0 ? true : false);?> required/>就業中</label>
                        <label><input type="radio" name="is_working" value="1" <?php echo set_radio('is_working', 1, $jobseeker['is_working'] === 1 ? true : false);?> required/>離職中</label>
                    </dd>
                </dl>
                <dl>
                    <dt>既婚 / 未婚<span class="must">必須</span></dt>
                    <dd>
                        <label><input type="radio" name="marital_status" value="m" <?php echo set_radio('marital_status', 'm', $jobseeker['marital_status'] == 'm' ? true : false);?> required/>既婚</label>
                        <label><input type="radio" name="marital_status" value="s" <?php echo set_radio('marital_status', 's', $jobseeker['marital_status'] == 's' ? true : false);?> required/>未婚</label>
                    </dd>
                </dl>
                <div class="conf">上記の登録フォーム内容を送信することにより、<a href="<?php echo site_url('tos'); ?>" target="_blank">利用規約</a>と<a href="<?php echo site_url('privacy'); ?>" target="_blank">個人情報の取扱い</a>についてに同意したこととなります。<br>ご登録の際には、個人情報保護方針、サービスガイドライン、その他利用規約の各条項をよくお読み下さい。</div>
                <div class="form_btn"><?php echo form_submit('submit', '同意して入力の確認へ'); ?></div>
            <?php echo form_close(); ?>
        </div><!--/#form_tbl-->
    </div>
</div><!--/#contents-->
