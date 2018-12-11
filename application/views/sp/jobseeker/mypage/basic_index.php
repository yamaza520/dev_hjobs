<div id="container" class="mypage">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>
    <div class="inner">
        <dl class="menu">
            <dt><span>登録内容確認・編集</span></dt>
            <dd><a href="<?php echo site_url('mypage/basic'); ?>">基本情報</a></dd>
            <dd><a href="<?php echo site_url('mypage/career-history'); ?>">経歴情報</a></dd>
            <dd><a href="<?php echo site_url('mypage/job-preferences'); ?>">希望条件</a></dd>
            <dd><a href="<?php echo site_url('mypage/resume'); ?>">履歴書・職務経歴書</a></dd>
        </dl>
        <dl class="menu">
            <dt><span>応募・登録履歴</span></dt>
            <dd><a href="<?php echo site_url('mypage/application-history'); ?>">求人・人材紹介会社<br>応募履歴</a></dd>
        </dl>
        <dl class="menu">
            <dt><span>その他</span></dt>
            <dd><a href="<?php echo site_url('mypage/mail-setting'); ?>">メール配信</a></dd>
            <dd><a href="<?php echo site_url('mypage/change-password'); ?>">ログインパスワード設定</a></dd>
            <dd><a href="<?php echo site_url('logout'); ?>">ログアウト</a></dd>
            <dd><a href="<?php echo site_url('mypage/unsubscribe'); ?>">退会手続き</a></dd>
        </dl>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo site_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
