<div id="contents" class="mypage signup setting">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit"><?php echo $page_title; ?></h2>
            <?php if (isset($message) && $message) : ?>
                 <dl class="validation mgnT">
                     <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                     <?php echo $message;?>
                 </dl>
            <?php endif ?>
            <div class="sec_in form_tbl cf">
                <p class="text">以下のフォームにメールアドレス・パスワードを入力することで退会できます。</p>
                <!-- form start -->
                <?php echo form_open('', array('method' => 'post'));?>
                    <dl>
                        <dt>メールアドレス<span class="must">必須</span></dt>
                        <dd class="w3">
                            <?php
                                echo form_input(array(
                                    'type'  => 'email',
                                    'class' => 'w1',
                                    'name'  => 'email',
                                    'value' => set_value('email', $unsubscribe['email']),
                                    'placeholder' => 'abcdef@sample.jp',
                                    'required' => 'required'
                                ));
                            ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>パスワード<span class="must">必須</span></dt>
                        <dd class="w2">
                            <?php
                                echo form_input(array(
                                    'type'  => 'password',
                                    'class' => 'w1',
                                    'name'  => 'password',
                                    'placeholder' => 'abcde012345',
                                    'required' => 'required'
                                ));
                            ?>
                        </dd>
                    </dl>
                    <p class="memo2"><span>ご注意ください</span>
                        退会すると登録した情報や応募履歴、検討中リストに保存した求人情報がすべて削除されます。<br>
                        メールマガジンの配信も停止されます。
                    </p>
                    <div class="form_btn"><input type="submit" value="理解した上で退会する" /></div>
                <?php echo form_close(); ?>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->