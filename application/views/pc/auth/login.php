<div id="contents" class="login">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $page_title; ?></span></div>
        </div>
        <h2 class="tit"><?php echo $page_title; ?></h2>
        <?php if ($message) { ?>
            <dl class="success mgnT"><?php echo $message; ?></dl>
        <?php } ?>
        <?php if ($error) { ?>
            <dl class="validation mgnT">
                <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                <dd><?php echo $error; ?></dd>
            </dl>
        <?php } ?>
        <div class="form_tbl">
            <?php echo form_open();?>
                <dl>
                    <dt>メールアドレス</dt>
                    <dd>
                        <?php echo form_input($identity); ?>
                    </dd>
                </dl>
                <dl>
                    <dt>パスワード</dt>
                    <dd>
                        <?php echo form_input($password); ?>
                    </dd>
                </dl>
                <a href="<?php echo site_url('auth/forgot_password'); ?>" class="memo">会員ID、パスワードをお忘れの方はコチラ</a>
                <div class="btn_box cf">
                    <div class="form_btn fl"><input type="submit" value="ログインする" /></div>
                    <div class="form_btn fr"><a href="<?php echo site_url('signup'); ?>">新規会員登録はこちら</a></div>
                </div>
            <?php echo form_close(); ?>
        </div><!--/#form_tbl-->
    </div>
</div><!--/#contents-->
