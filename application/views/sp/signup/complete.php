<div id="container" class="signup">
    <h2 class="tit"><?php echo $page_title; ?></h2>
    <ul class="form_flow cf">
        <li>基本情報入力</li>
        <li>確認</li>
        <li class="current">登録完了</li>
    </ul>
    <div class="form_tbl sec_in">
        <div class="thanks">
            <p>
            ご登録ありがとうございます。<br>
            メールがあなたのメールアドレスに送信されました。<br>
            次回ご利用時は右上の【ログイン】より<br>ご登録いただいた、メールアドレス・パスワードを入力してご利用ください。
            </p>
            <a href="<?php echo site_url('login'); ?>" class="btn">ログインする</a>
        </div>
    </div><!--/#form_tbl-->

    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--/#container-->
