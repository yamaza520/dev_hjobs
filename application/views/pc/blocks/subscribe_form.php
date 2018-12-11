<div id="footer_form" class="inner">
    <div class="cf">
        <div class="left_box">
            <ul>
                <li><span>1</span>希望に合った求人情報をすぐにでもお届け</li>
                <li><span>2</span>複数の転職サイトの情報を受け取れるチャンス</li>
                <li><span>3</span>転職成功に役立つヒントが満載</li>
            </ul>
            <span class="bnr">お仕事を探すならまずは、メルマガ登録から！</span>
        </div>
        <img src="<?php echo base_url('assets/pc/img/img08.jpg'); ?>" alt="">
    </div>
    <div class="form_box">
        <?php echo form_open(site_url('ajax/user_register'), array('id' => 'subscribe-form'));?>
        <div class="error-msg"></div>
            <dl>
                <dt>メールアドレス</dt>
                <dd class="w1">
                    <?php
                    echo form_input(array(
                        'type'  => 'email',
                        'class' => 'form-control',
                        'id'    => 'mail',
                        'name'  => 'mail',
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>メールアドレス（確認）</dt>
                <dd class="w1">
                    <?php
                    echo form_input(array(
                        'type'  => 'email',
                        'class' => 'form-control',
                        'id'    => 'conf_mail',
                        'name'  => 'conf_mail',
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>パスワード（英数6文字以上）</dt>
                <dd class="w2">
                    <?php
                    echo form_input(array(
                        'type'  => 'password',
                        'class' => 'form-control',
                        'id'    => 'password',
                        'name'  => 'password',
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>パスワード（確認）</dt>
                <dd class="w2">
                    <?php
                    echo form_input(array(
                        'type'  => 'password',
                        'class' => 'form-control',
                        'id'    => 'conf_password',
                        'name'  => 'conf_password',
                    ));
                    ?>
                </dd>
            </dl>
            <dl>
                <dt>都道府県</dt>
                <dd>
                    <?php echo form_dropdown('pref', $prefectures); ?>
                </dd>
            </dl>
            <div class="form_btn">
                <?php echo form_submit('submit', '送信'); ?>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        Application.quickUserRegistration($('#subscribe-form'));
    });
</script>
