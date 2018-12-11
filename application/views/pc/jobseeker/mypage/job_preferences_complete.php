<div id="contents" class="mypage">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <div class="inner cf">
                <div id="main">
                    <h2 class="tit"><?php echo $page_title; ?></h2>
                    <div class="sec_in cf">
                        <div class="thanks">
                            <p class="ta_c">希望条件の設定を変更いたしました。</p>
                            <a href="<?php echo site_url('mypage'); ?>" class="back_btn icon">マイページトップへ</a>
                        </div>
                    </div>
                </div><!--/#main-->
            </div>
        </div>
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div>
