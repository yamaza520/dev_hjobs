<div id="container" class="mypage signup">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
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
    <div class="form_tbl sec_in">
        <?php echo form_open('mypage/basic', array('method' => 'post'));?>
            <dl>
                <dt>お名前<span class="must">必須</span></dt>
                <?php echo form_hidden('user_id', $jobseeker->user_id); ?>
                <dd class="w1 cf">
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'w1',
                        'name'  => 'last_name',
                        'value' => set_value('last_name', $jobseeker->last_name),
                        'placeholder' => '山田',
                        'required' => 'required'
                    ));

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
                <dd class="w1 cf">
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'w1',
                        'name'  => 'first_name_kana',
                        'value' => set_value('first_name_kana', $jobseeker->first_name_kana),
                        'placeholder' => 'ヤマダ',
                        'required' => 'required'
                    ));

                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'w1',
                        'name'  => 'last_name_kana',
                        'value' => set_value('last_name_kana', $jobseeker->last_name_kana),
                        'placeholder' => 'タロウ',
                        'required' => 'required'
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>性別<span class="must">必須</span></dt>
                <dd class="check">
                    <ul class="cf">
                        <li><?php echo form_radio('gender', 'f', isset($jobseeker->gender) && $jobseeker->gender == 'f' ? true : false, 'required'); ?><label>女性</label></li>
                        <li><?php echo form_radio('gender', 'm', isset($jobseeker->gender) && $jobseeker->gender == 'm' ? true : false, 'required'); ?><label>男性</label></li>
                    </ul>
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

                    echo form_dropdown('pref_cd', $prefectures, set_value('pref_cd', $jobseeker->pref_cd), array('required' => 'required'));

                    echo form_input(array(
                        'type'  => 'text',
                        'id'    => 'city',
                        'name'  => 'city',
                        'value' => set_value('city', $jobseeker->city),
                    ));

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
            <dl class="mgn30">
                <dt>既婚 / 未婚<span class="must">必須</span></dt>
                <dd class="check">
                    <ul class="cf">
                        <li><?php echo form_radio('marital_status', 'm', isset($jobseeker->marital_status) && $jobseeker->marital_status == 'm' ? true : false, 'required'); ?><label>既婚</label></li>
                        <li><?php echo form_radio('marital_status', 's', isset($jobseeker->marital_status) && $jobseeker->marital_status == 's' ? true : false, 'required'); ?><label>未婚</label></li>
                    </ul>
                </dd>
            </dl>
            <div class="form_btn"><?php echo form_submit('submit', '登録内容の確認へ'); ?></div>
            <?php echo form_hidden('redirect', $redirect); ?>
        <?php echo form_close(); ?>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#container-->
