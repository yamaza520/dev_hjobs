<div id="container" class="mypage signup setting">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>
    <h2 class="tit mgn20"><?php echo $page_title; ?></h2>
    <div class="inner cf mgn20">
        <div class="left_box">
            <p class="tit">履歴書・職務経歴書を簡単作成！</p>
            <p>
            マイページに登録した情報をもとに、簡単に履歴書・職務経歴書を作成することができます。<br>
            作成した履歴書・職務経歴書はPDFでダウンロードしてご利用ください。
            </p>
        </div>
        <img src="<?php echo base_url('assets/sp/img/img15.png'); ?>" alt="" class="fr">
    </div>
    <div class="inner">
        <div class="tit_bar"><h3>履歴書</h3></div>
        <div class="cf">
            <div class="img_box"><img src="<?php echo base_url('assets/sp/img/img16.png'); ?>" alt=""></div>
            <div class="btn_box">
                <a href="<?php echo site_url('mypage/resume/personal/form'); ?>" class="btn">履歴書作成画面へ</a>
                <a href="<?php echo site_url('jobseeker/mypage/resume/personal_pdf'); ?>" class="btn" target="_blank">確認してダウンロード</a>
            </div>
        </div>
        <p class="text">
            <span class="indent">●作成できる履歴書はA4用紙2枚です。</span>
            <span class="indent">●履歴書に必要な写真ファイルのご用意をお願いたします。</span>
            <span class="indent">●氏名・性別・メールアドレス・住所等は、会員登録情報が入力されております。<br>これらを修正する場合は基本情報から変更を行って下さい。</span>
            <span class="indent">●最終更新日付が入力されます。現在の日付で書類を作成したい場合は、<br>編集画面にて一度保存を行ってからダウンロードをして下さい。</span>
        </p>
        <div class="tit_bar"><h3>職務経歴書</h3></div>
        <div class="cf">
            <div class="img_box"><img src="<?php echo base_url('assets/sp/img/img17.png'); ?>" alt=""></div>
            <div class="btn_box">
                <a href="<?php echo site_url('mypage/resume/career/form'); ?>" class="btn">職務経歴書作成画面へ</a>
                <a href="<?php echo site_url('jobseeker/mypage/resume/career_pdf'); ?>" class="btn" target="_blank">確認してダウンロード</a>
            </div>
        </div>
        <p class="text">
            <span class="indent">●作成できる職務経歴書はA4用紙3枚です。</span>
            <span class="indent">●職務経歴には、経歴情報で入力した内容が入力されております。<br>これらを修正する場合は経歴情報から変更を行って下さい。</span>
            <span class="indent">●最終更新日付が入力されます。現在の日付で書類を作成したい場合は、<br>編集画面にて一度保存を行ってからダウンロードして下さい。</span>
        </p>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo site_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
