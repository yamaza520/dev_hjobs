<div id="contents" class="signup">
    <h2 class="tit mgn10"><?php echo $page_title; ?></h2>
    <p class="ta_l inner">ホテリエジョブズでは、全国の宿泊施設関連の求人情報を紹介しております。</p>
    <ul class="form_flow con cf">
        <li class="current">入力</li>
        <li>確認</li>
        <li>送信完了</li>
    </ul>
    <?php if (isset($message) && $message) : ?>
        <dl class="validation">
            <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
            <?php echo $message;?>
        </dl>
    <?php endif ?>
    <div class="form_tbl sec_in">
        <?php echo form_open('', array('method' => 'post'));?>
            <dl>
                <dt>会社名<span class="must">必須</span></dt>
                <dd class="w3">
                    <?php
                        echo form_input(array(
                            'type'        => 'text',
                            'name'        => 'company',
                            'value'       => set_value('company'),
                            'placeholder' => '○○○株式会社',
                            'required'    => 'required'
                        ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>ご担当者名<span class="must">必須</span></dt>
                <dd class="w1 cf">
                    <?php
                        echo form_input(array(
                            'type'        => 'text',
                            'name'        => 'last_name',
                            'value'       => set_value('last_name', $last_name),
                            'placeholder' => '山田',
                            'required'    => 'required'
                        ));
                    ?>
                    <?php
                        echo form_input(array(
                            'type'        => 'text',
                            'name'        => 'first_name',
                            'value'       => set_value('first_name', $first_name),
                            'placeholder' => '太郎',
                            'required'    => 'required'
                        ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>ご住所<span class="must">必須</span></dt>
                <dd class="add">
                    <span class="left">〒</span>
                        <?php
                            echo form_input(array(
                                'type'        => 'tel',
                                'name'        => 'zipcode',
                                'value'       => set_value('zipcode'),
                                'placeholder' => '000-0000',
                                'maxlength'   => 8,
                                'required'    => 'required'
                            ));
                        ?>
                        <?php echo form_dropdown('pref_cd', $prefectures, set_value('pref_cd'), array('required' => 'required')); ?>
                        <?php
                            echo form_input(array(
                                'type'     => 'text',
                                'name'     => 'city',
                                'value'    => set_value('city'),
                                'placeholder' => '市区町村名',
                                'required' => 'required'
                            ));
                        ?>
                    <?php
                        echo form_input(array(
                            'type'        => 'text',
                            'class'       => 'last',
                            'name'        => 'address',
                            'value'       => set_value('address'),
                            'placeholder' => '番地・建物名',
                            'required'    => 'required'
                        ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>メールアドレス<span class="must">必須</span></dt>
                <dd class="w3">
                    <?php
                        echo form_input(array(
                            'type'        => 'email',
                            'name'        => 'email',
                            'value'       => set_value('email', $email),
                            'placeholder' => 'abcdef@sample.jp',
                            'required'    => 'required'
                        ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>電話番号<span class="must">必須</span></dt>
                <dd class="w2">
                    <?php
                        echo form_input(array(
                            'type'        => 'tel',
                            'name'        => 'phone',
                            'value'       => set_value('phone', $phone),
                            'placeholder' => '08012345678',
                            'required'    => 'required'
                        ));
                    ?>
                    <p class="memo">※半角数字で入力して下さい。携帯番号を推奨しております。</p>
                </dd>
            </dl>
            <dl>
                <dt>お問い合わせ内容<span class="must">必須</span></dt>
                <dd class="w2">
                    <?php
                        echo form_textarea(array(
                            'name'  => 'content',
                            'rows'  => '4',
                            'value' => set_value('content'),
                            'placeholder' => 'お問い合わせ内容を入力してください。',
                            'required' => 'required'
                        ));
                    ?>
                </dd>
            </dl>
            <div class="conf">ご入力いただいた個人情報は、弊社の<a href="<?php echo site_url('privacy'); ?>" target="_blank">プライバシーポリシー</a>に則って厳重に管理します。</div>
            <div class="form_btn v2"><?php echo form_submit('submit', '入力内容を確認する'); ?></div>
        <?php echo form_close(); ?>
    </div><!--/#form_tbl-->
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
