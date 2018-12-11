<div id="contents" class="signup confirm">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $page_title; ?></span></div>
        </div>
        <h2 class="tit mgn30"><?php echo $page_title; ?></h2>
        <p class="f18 ta_l mgn30">ホテリエジョブズでは、全国の宿泊施設関連の求人情報を紹介しております。</p>
        <ul class="form_flow cf">
            <li>入力</li>
            <li class="current">確認</li>
            <li>送信完了</li>
        </ul>
        <div class="form_tbl sec_in">
            <?php echo form_open('', array('method' => 'post'));?>
                <dl>
                    <dt>会社名<span class="must">必須</span></dt>
                    <dd class="w3"><span class="input_text"><?php echo $company_contact['company'];?></span></dd>
                </dl>
                <dl>
                    <dt>ご担当者名<span class="must">必須</span></dt>
                    <dd class="w1">
                        <span class="input_text"><?php echo $company_contact['last_name'];?></span>&emsp;
                        <span class="input_text"><?php echo $company_contact['first_name'];?></span>
                    </dd>
                </dl>
                <dl>
                    <dt>ご住所<span class="must">必須</span></dt>
                    <dd class="add w1">
                        <div class="mgn10">
                            <span class="left">〒</span><span class="input_text"><?php echo $company_contact['zipcode'];?></span>&emsp;
                            <span class="input_text"><?php echo $company_contact['pref_name'];?></span>
                            <span class="input_text"><?php echo $company_contact['city'];?></span>
                        </div>
                        <span class="input_text"><?php echo $company_contact['address'];?></span>
                    </dd>
                </dl>
                <dl>
                    <dt>メールアドレス<span class="must">必須</span></dt>
                    <dd class="w3"><span class="input_text"><?php echo $company_contact['email'];?></span></dd>
                </dl>
                <dl>
                    <dt>電話番号<span class="must">必須</span></dt>
                    <dd class="w2">
                        <span class="input_text"><?php echo $company_contact['phone'];?></span>
                    </dd>
                </dl>
                <dl>
                    <dt>お問い合わせ内容<span class="must">必須</span></dt>
                    <dd class="w2">
                        <span class="input_text"><?php echo nl2br($company_contact['content']);?></span>
                    </dd>
                </dl>
                <div class="conf">ご入力いただいた個人情報は、弊社の<a href="<?php echo site_url('privacy'); ?>" target="_blank">プライバシーポリシー</a>に則って厳重に管理します。</div>
                <div class="form_btn v2">
                    <?php echo form_submit('submit', '入力内容を送信する'); ?>
                </div>
            <?php echo form_close(); ?>
        </div><!--/#form_tbl-->
    </div>
</div>
