<div id="contents" class="mypage setting">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit mgn20">履歴書・職務経歴書印刷</h2>
            <div class="sec_in cf">
                <div class="left_box">
                    <p class="tit">履歴書・職務経歴書を簡単作成！</p>
                    <p class="text">
                    マイページに登録した情報をもとに、<br>
                    簡単に履歴書・職務経歴書を作成することができます。<br>
                    作成した履歴書・職務経歴書はPDFでダウンロードして<br>
                    ご利用ください。
                    </p>
                </div>
                <img src="<?php echo base_url('assets/pc/img/img15.png'); ?>" alt="" class="fr">
            </div>
            <div class="sec_in">
                <div class="tit_bar"><h3>履歴書</h3></div>
                <div class="cf mgn30">
                    <div class="img_box"><img src="<?php echo base_url('assets/pc/img/img16.png'); ?>" alt=""></div>
                    <div class="btn_box">
                        <a href="<?php echo site_url('mypage/resume/personal/form'); ?>" class="btn">履歴書作成画面へ</a>
                        <?php if ($login_user['profile_status'] != 0) { ?>
                        <a href="<?php echo site_url('jobseeker/mypage/resume/personal_pdf'); ?>" class="btn" target="_blank">確認してダウンロード</a>
                        <?php } else { ?>
                        <a href="<?php echo site_url('mypage/basic'); ?>" class="btn">基本情報を登録</a>
                        <?php } ?>
                    </div>
                </div>
                <p class="text">
                    <span class="indent">●作成できる履歴書はA4用紙2枚です。</span>
                    <span class="indent">●履歴書に必要な写真ファイルのご用意をお願いたします。</span>
                    <span class="indent">●氏名・性別・メールアドレス・住所等は、会員登録情報が入力されております。<br>これらを修正する場合は基本情報から変更を行って下さい。</span>
                    <span class="indent">●最終更新日付が入力されます。現在の日付で書類を作成したい場合は、<br>編集画面にて一度保存を行ってからダウンロードをして下さい。</span>
                </p>
                <div class="tit_bar"><h3>職務経歴書</h3></div>
                <div class="cf mgn30">
                    <div class="img_box"><img src="<?php echo base_url('assets/pc/img/img17.png'); ?>" alt=""></div>
                    <div class="btn_box">
                        <a href="<?php echo site_url('mypage/resume/career/form'); ?>" class="btn">職務経歴書作成画面へ</a>
                        <?php if ($login_user['profile_status'] == 2) { ?>
                        <a href="<?php echo site_url('jobseeker/mypage/resume/career_pdf'); ?>" class="btn" target="_blank">確認してダウンロード</a>
                        <?php } else { ?>
                        <a href="<?php echo site_url('mypage/career-history'); ?>" class="btn">経歴情報を登録</a>
                        <?php } ?>
                    </div>
                </div>
                <p class="text">
                    <span class="indent">●作成できる職務経歴書はA4用紙3枚です。</span>
                    <span class="indent">●職務経歴には、経歴情報で入力した内容が入力されております。<br>これらを修正する場合は経歴情報から変更を行って下さい。</span>
                    <span class="indent">●最終更新日付が入力されます。現在の日付で書類を作成したい場合は、<br>編集画面にて一度保存を行ってからダウンロードして下さい。</span>
                </p>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
