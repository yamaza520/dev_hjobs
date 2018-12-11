<div id="container" class="signup">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <ul class="form_flow cf">
        <li class="current">入力</li>
        <li>確認</li>
        <li>送信完了</li>
    </ul>
    <?php if (validation_errors()) : ?>
        <dl class="validation">
            <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
            <?php echo validation_errors();?>
        </dl>
    <?php endif ?>
    <div class="form_tbl sec_in">
        <?php echo form_open('contact/form', array('method' => 'post'));?>
            <dl>
                <dt>お名前<span class="must">必須</span></dt>
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
                            'type'  => 'tel',
                            'name'  => 'phone',
                            'value' => set_value('phone', $phone),
                            'placeholder' => '08012345678',
                            'required' => 'required'
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
                            'name'        => 'content',
                            'rows'        => '4',
                            'value'       => set_value('content'),
                            'placeholder' => 'お問い合わせ内容を入力してください。',
                            'required'    => 'required'
                        ));
                    ?>
                </dd>
            </dl>
            <div class="conf">ご入力いただいた個人情報は、弊社の<a href="<?php echo site_url('privacy'); ?>" target="_blank">プライバシーポリシー</a>に則って厳重に管理します。</div>
            <div class="form_btn"><?php echo form_submit('submit', '入力内容を確認する'); ?></div>
        <?php echo form_close(); ?>
    </div><!--/#form_tbl-->
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
