<div id="container" class="signup ezine">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <ul class="form_flow cf ez">
        <li class="current">入力</li>
        <li>確認</li>
        <li>メルマガ登録完了</li>
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
                <dt>メールアドレス<span class="must">必須</span></dt>
                <dd class="w3">
                    <?php
                    echo form_input(array(
                        'type'        => 'email',
                        'class'       => 'form-control',
                        'id'          => 'mail',
                        'name'        => 'mail',
                        'required'    => 'required',
                        'placeholder' => 'abcdef@sample.jp',
                        'value'       => set_value('mail', $result['mail']),
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>メールアドレス(確認)<span class="must">必須</span></dt>
                <dd class="w3">
                    <?php
                    echo form_input(array(
                        'type'        => 'email',
                        'class'       => 'form-control',
                        'id'          => 'conf_mail',
                        'name'        => 'conf_mail',
                        'required'    => 'required',
                        'placeholder' => 'abcdef@sample.jp',
                        'value'       => set_value('conf_mail', $result['conf_mail']),
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>パスワード<span class="must">必須</span></dt>
                <dd class="w2">
                    <?php
                    echo form_input(array(
                        'type'        => 'password',
                        'class'       => 'form-control',
                        'id'          => 'password',
                        'name'        => 'password',
                        'required'    => 'required',
                        'placeholder' => 'abcde012345',
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
                <dt>パスワード(確認)<span class="must">必須</span></dt>
                <dd class="w2">
                    <?php
                    echo form_input(array(
                        'type'        => 'password',
                        'class'       => 'form-control',
                        'id'          => 'conf_password',
                        'name'        => 'conf_password',
                        'required'    => 'required',
                        'placeholder' => 'abcde012345',
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>都道府県<span class="must">必須</span></dt>
                <dd class="add">
                    <?php echo form_dropdown('pref', $prefectures, set_value('pref', $result['pref']), array('class' => 'form-control', 'id' => 'address1', 'required' => 'required')); ?>
                </dd>
            </dl>
            <div class="form_btn">
                <?php echo form_submit('submit', '同意して入力の確認へ'); ?>
            </div>
        <?php echo form_close(); ?>
    </div><!--/#form_tbl-->

    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#container-->
