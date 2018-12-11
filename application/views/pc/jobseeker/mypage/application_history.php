<div id="contents" class="mypage setting">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit mgn20">応募履歴</h2>
            <div class="sec_in cf">
                <div class="tit_bar">
                    <h3>求人応募履歴</h3>
                </div>
                <div class="history_tbl">
                    <table>
                        <tr class="nobdr">
                            <th>応募日</th>
                            <th>企業名</th>
                            <th>職種</th>
                            <th>求人元</th>
                        </tr>
                        <?php if (count($hotelier)): ?>
                            <?php foreach ($hotelier as $row) : ?>
                            <tr>
                                <td nowrap><?php echo date($this->config->item('date_format'), strtotime($row->created_at)); ?></td>
                                <td><a href="<?php echo site_url('job/detail/'.$row->job_id); ?>" target="_blank"><?php echo $row->company_name; ?></a></td>
                                <td><?php echo $row->job_title; ?></td>
                                <td>
                                <?php if ($row->media_logo_file): ?>
                                    <img src="<?php echo base_url('assets/common/img/' . $row->media_logo_file); ?>" alt="">
                                <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">結果はありません。</td>
                            </tr>
                        <?php endif ?>
                    </table>
                </div>
            </div>

            <div class="sec_in cf">
                <div class="tit_bar">
                    <h3>求人紹介サイト応募履歴</h3></div>
                <div class="history_tbl">
                    <table>
                        <tr class="nobdr">
                            <th>応募日</th>
                            <th>企業名</th>
                            <th>職種</th>
                            <th>求人元</th>
                        </tr>
                        <?php if (count($nohotelier)): ?>
                        <?php foreach ($nohotelier as $row) : ?>
                            <tr>
                                <td nowrap><?php echo date($this->config->item('date_format'), strtotime($row->created_at)); ?></td>
                                <td><a href="<?php echo site_url('job/detail/'.$row->job_id); ?>" target="_blank"><?php echo $row->company_name; ?></a></td>
                                <td><?php echo $row->job_title; ?></td>
                                <td>
                                <?php if ($row->media_logo_file): ?>
                                    <img src="<?php echo base_url('assets/common/img/' . $row->media_logo_file); ?>" alt="">
                                <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">結果はありません。</td>
                            </tr>
                        <?php endif ?>
                    </table>
                </div>
            </div>
        </div>
        <!--/#main-->
         <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
        <!--/#side-->
    </div>
</div>
<!--/#contents-->
