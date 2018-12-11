<div id="contents" class="mypage setting signup">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit">基本情報の確認・編集</h2>
            <?php if ($incomplete_profile_info) : ?>
                <dl class="validation mgnT">
                    <dt><?php echo $incomplete_profile_info; ?></dt>
                </dl>
            <?php endif ?>
            <?php if (isset($message) && $message) : ?>
                <dl class="validation mgnT">
                    <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                    <?php echo $message;?>
                </dl>
            <?php endif ?>
            <div class="sec_in cf form_tbl">
                <?php echo form_open(); ?>
                    <dl>
                        <dt>お名前<span class="must">必須</span></dt>
                        <dd class="w4">
                            <?php echo form_hidden('user_id', $jobseeker->user_id); ?>
                            <span class="left">姓</span>
                            <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'last_name',
                                'value' => set_value('last_name', $jobseeker->last_name),
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
                                'value' => set_value('first_name', $jobseeker->first_name),
                                'placeholder' => '太郎',
                                'required' => 'required'
                            ));
                            ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>フリガナ<span class="must">必須</span></dt>
                        <dd class="w4">
                            <span class="left">セイ</span>
                            <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'last_name_kana',
                                'value' => set_value('last_name_kana', $jobseeker->last_name_kana),
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
                                'name'  => 'first_name_kana',
                                'value' => set_value('first_name_kana', $jobseeker->first_name_kana),
                                'placeholder' => 'ヤマダ',
                                'required' => 'required'
                            ));
                            ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>性別<span class="must">必須</span></dt>
                        <dd>
                            <label><input type="radio" name="gender" value="f" <?php echo set_radio('gender', 'f', $jobseeker->gender == 'f' ? true : false);?> required/>女性</label>
                        <label><input type="radio" name="gender" value="m" <?php echo set_radio('gender', 'm', $jobseeker->gender == 'm' ? true : false);?> required/>男性</label>
                        </dd>
                    </dl>
                    <dl>
                        <dt>生年月日<span class="must">必須</span></dt>
                        <dd class="w1">
                            <?php echo form_dropdown('birth_year', $years, set_value('birth_year', $jobseeker->birth_year), array('required' => 'required')); ?>
                        <span class="right">年</span>
                        <?php echo form_dropdown('birth_month', $months, set_value('birth_month', $jobseeker->birth_month), array('required' => 'required')); ?>
                        <span class="right">月</span>
                        <?php echo form_dropdown('birth_day', $days, set_value('birth_day', $jobseeker->birth_day), array('required' => 'required')); ?>
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
                                'value' => set_value('email', $jobseeker->email),
                                'placeholder' => 'abcdef@sample.jp',
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
                                'value' => set_value('phone', $jobseeker->phone),
                                'placeholder' => '08012345678',
                                'required' => 'required'
                            ));
                            ?>
                            <p class="memo">※半角数字で入力して下さい。携帯番号を推奨しております。</p>
                        </dd>
                    </dl>
                    <dl>
                        <dt>住所<span class="must">必須</span></dt>
                        <dd class="add">
                            <div class="wrap_input">
                                <span class="left">〒</span>
                                <?php
                                echo form_input(array(
                                    'type'  => 'tel',
                                    'name'  => 'zipcode',
                                    'value' => set_value('zipcode', $jobseeker->zip_code),
                                    'placeholder' => '000-0000',
                                    'maxlength' => 8,
                                    'required' => 'required'
                                ));
                                ?><br>
                                <span class="left">都道府県</span>
                                <?php echo form_dropdown('pref_cd', $prefectures, set_value('pref_cd', $jobseeker->pref_cd), array('required' => 'required')); ?>&emsp;
                                <span class="left">市区町村</span>
                                <?php
                                echo form_input(array(
                                    'type'  => 'text',
                                    'id'    => 'city',
                                    'name'  => 'city',
                                    'value' => set_value('city', $jobseeker->city),
                                ));
                                ?>
                            </div>
                            <span class="left">番地・建物名</span>
                            <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'w1',
                                'name'  => 'address',
                                'value' => set_value('address', $jobseeker->address),
                                'placeholder' => '00-00-00 ○○○マンション000号室',
                                'required' => 'required'
                            ));
                            ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>既婚 / 未婚<span class="must">必須</span></dt>
                        <dd>
                            <label><input type="radio" name="marital_status" value="m" <?php echo set_radio('marital_status', 'm', $jobseeker->marital_status == 'm' ? true : false);?> required/>既婚</label>
                        <label><input type="radio" name="marital_status" value="s" <?php echo set_radio('marital_status', 's', $jobseeker->marital_status == 's' ? true : false);?> required/>未婚</label>
                        </dd>
                    </dl>
                    <div class="form_btn"><?php echo form_submit('submit', '登録内容の確認へ'); ?></div>
                    <?php echo form_hidden('redirect', $redirect); ?>
                <?php echo form_close(); ?>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
