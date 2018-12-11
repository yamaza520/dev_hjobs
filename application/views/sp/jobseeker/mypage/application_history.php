<div id="container" class="mypage signup setting">
    <div class="inner">
        <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
    </div>

    <h2 class="tit mgn10">応募履歴</h2>
    <div class="sec_in inner mgn30">
        <div class="tit_bar"><h3>求人応募履歴</h3></div>
        <?php if (count($hotelier)): ?>
            <?php foreach ($hotelier as $row) : ?>
                <dl class="history_tbl">
                    <dt class="cf">
                        <div>応募日<span class="s1"><?php echo date($this->config->item('date_format'), strtotime($row->created_at)); ?></span></div>
                    </dt>
                    <dd>
                        <a href="<?php echo site_url('job/detail/'.$row->job_id); ?>" target="_blank"><?php echo $row->company_name; ?></a>
                        <span class="s1"><?php echo $row->job_title; ?></span>
                        <div class="ta_r"><span>求人元</span>
                            <?php if ($row->media_logo_file): ?>
                                <img src="<?php echo base_url('assets/common/img/' . $row->media_logo_file); ?>" alt="">
                            <?php endif ?>
                        </div>
                    </dd>
                </dl>
            <?php endforeach ?>
        <?php else: ?>
            <dl class="history_tbl">
                <dd>結果はありません。</td>
            </dl>
        <?php endif ?>
    </div>

    <div class="sec_in inner">
        <div class="tit_bar"><h3>求人紹介サイト応募履歴</h3></div>
        <?php if (count($nohotelier)): ?>
            <?php foreach ($nohotelier as $row) : ?>
                <dl class="history_tbl">
                    <dt class="cf">
                        <div>応募日<span class="s1"><?php echo date($this->config->item('date_format'), strtotime($row->created_at)); ?></span></div>
                    </dt>
                    <dd>
                        <a href="<?php echo site_url('job/detail/'.$row->job_id); ?>" target="_blank"><?php echo $row->company_name; ?></a>
                        <span class="s1"><?php echo $row->job_title; ?></span>
                        <div class="ta_r"><span>求人元</span>
                            <?php if ($row->media_logo_file): ?>
                                <img src="<?php echo base_url('assets/common/img/' . $row->media_logo_file); ?>" alt="">
                            <?php endif ?>
                        </div>
                    </dd>
                </dl>
            <?php endforeach ?>
        <?php else: ?>
            <dl class="history_tbl">
                <dd>結果はありません。</td>
            </dl>
        <?php endif ?>
    </div>

    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
