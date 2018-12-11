<div id="container" class="mypage signup setting">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>

    <h2 class="tit mgn10">登録履歴</h2>
    <div class="sec_in inner mgn30">
        <div class="tit_bar"><h3>求人サイト登録履歴</h3></div>
        <div class="history_tbl v2">
            <table>
                <tr class="nobdr">
                    <th>登録日</th>
                    <th>登録状況</th>
                    <th>転職サイト名</th>
                </tr>
                <tr>
                    <td>2017/00/11</td>
                    <td>成功</td>
                    <td><img src="<?php echo base_url('assets/sp/img/corporate02.jpg'); ?>" alt="">リクナビNEXXT</td>
                </tr>
                <tr>
                    <td>2017/00/11</td>
                    <td>成功</td>
                    <td><img src="<?php echo base_url('assets/sp/img/corporate04.jpg'); ?>" alt="">アン</td>
                </tr>
                <tr>
                    <td>2017/00/11</td>
                    <td>成功</td>
                    <td><img src="<?php echo base_url('assets/sp/img/corporate05.jpg'); ?>" alt="">タウンワーク</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="sec_in inner">
        <div class="tit_bar"><h3>求人紹介サイト応募履歴</h3></div>
        <div class="history_tbl v2">
            <table>
                <tr class="nobdr">
                    <th>登録日</th>
                    <th>登録状況</th>
                    <th>転職サイト名</th>
                </tr>
                <tr>
                    <td>2017/00/11</td>
                    <td>成功</td>
                    <td><img src="<?php echo base_url('assets/sp/img/corporate01.jpg'); ?>" alt="">リクルートエージェンシー</td>
                </tr>
                <tr>
                    <td>2017/00/11</td>
                    <td>成功</td>
                    <td><img src="<?php echo base_url('assets/sp/img/corporate03.jpg'); ?>" alt="">デューダ</td>
                </tr>
            </table>
        </div>
    </div>

    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
