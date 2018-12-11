<div id="container" class="mypage signup confirm">
    <div class="inner">
        <div class="member">
            <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
        </div>
    </div>

    <h2 class="tit mgn10"><?php echo $page_title; ?></h2>
    <div class="form_tbl sec_in">
        <?php echo form_open(); ?>
            <dl>
                <dt>勤務地</dt>
                <dd>
                    <span class="left">都道府県：</span>
                    <span class="input_text">
                        <?php if ($job_preferences['work_place']): ?>
                            <?php foreach ($job_preferences['work_place'] as $pref): ?>
                                <?php echo $prefecture[$pref]; ?>&emsp;
                            <?php endforeach;?>
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </span><br>
                    <span class="left">市区町村・駅名等：</span>
                    <span class="input_text"><?php echo $job_preferences['address'] ?: '-'; ?></span>
                </dd>
                <dt>職種</dt>
                <dd>
                    <?php $jcats = get_job_categories(); ?>
                    <span class="input_text">
                        <?php if ($job_preferences['job_category_s_id']): ?>
                            <?php foreach ($job_preferences['job_category_s_id'] as $id): ?>
                                <?php echo get_job_category_name($id); ?>&emsp;
                            <?php endforeach;?>
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </span>
                </dd>
                <dt>雇用形態</dt>
                <dd>
                    <span class="input_text">
                    <?php if ($job_preferences['employ_type_class']): ?>
                        <?php foreach ($job_preferences['employ_type_class'] as $id): ?>
                            <?php echo $employee_type_classes[$id]; ?>&emsp;
                        <?php endforeach;?>
                    <?php else: ?>
                        -
                    <?php endif ?>
                </span>
                </dd>
                <dt>希望年収</dt>
                <dd>
                    <span class="input_text"><?php echo $job_preferences['salary'] ? $salaries[$job_preferences['salary']] : '-'; ?></span>
                </dd>
                <dt>会社名</dt>
                <dd><span class="input_text"><?php echo $job_preferences['company_name'] ?: '-'; ?></span></dd>
                <dt>キーワード</dt>
                <dd><span class="input_text"><?php echo $job_preferences['keyword'] ?: '-'; ?></span></dd>
                <dt>こだわり</dt>
                <dd>
                    <span class="input_text">
                        <?php if ($job_preferences['flag']): ?>
                            <?php foreach ($job_preferences['flag'] as $name => $value): ?>
                                <?php echo $job_flags[$name]; ?>&emsp;
                            <?php endforeach;?>
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </span>
                </dd>
                <dt>いかせる資格</dt>
                <dd><span class="input_text"><?php echo $job_preferences['qualification'] ?: '-'; ?></span></dd>
            </dl>
            <div class="form_btn_wrap">
                <div class="form_btn"><?php echo form_submit('submit', 'この条件で設定する'); ?></div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
