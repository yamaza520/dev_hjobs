<div id="contents" class="mypage setting signup">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit mgn20">登録履歴</h2>
            <div class="sec_in cf">
                <div class="tit_bar"><h3>求人サイト登録履歴</h3></div>
                <div class="history_tbl v2">
                    <table>
                        <tr class="nobdr">
                            <th>登録日</th>
                            <th>転職サイト名</th>
                            <th>登録状況</th>
                        </tr>
                        <tr>
                            <td>2017/00/11</td>
                            <td><img src="<?php echo base_url('assets/pc/img/corporate02.jpg'); ?>" alt="">リクナビNEXXT</td>
                            <td>成功</td>
                        </tr>
                        <tr>
                            <td>2017/00/11</td>
                            <td><img src="<?php echo base_url('assets/pc/img/corporate04.jpg'); ?>" alt="">アン</td>
                            <td>成功</td>
                        </tr>
                        <tr>
                            <td>2017/00/11</td>
                            <td><img src="<?php echo base_url('assets/pc/img/corporate05.jpg'); ?>" alt="">タウンワーク</td>
                            <td>成功</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="sec_in cf">
                <div class="tit_bar"><h3>求人紹介サイト登録履歴</h3></div>
                <div class="history_tbl v2">
                    <table>
                        <tr class="nobdr">
                            <th>登録日</th>
                            <th>転職サイト名</th>
                            <th>登録状況</th>
                        </tr>
                        <tr>
                            <td>2017/00/11</td>
                            <td><img src="<?php echo base_url('assets/pc/img/corporate01.jpg'); ?>" alt="">リクルートエージェンシー</td>
                            <td>成功</td>
                        </tr>
                        <tr>
                            <td>2017/00/11</td>
                            <td><img src="<?php echo base_url('assets/pc/img/corporate03.jpg'); ?>" alt="">デューダ</td>
                            <td>成功</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div>
