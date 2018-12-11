<div id="contents" class="mypage setting recruit confirm">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit"><?php echo $page_title; ?></h2>
            <div class="sec_in cf">
                <?php echo form_open(); ?>
                    <table>
                        <tr>
                            <th class="tit t1">勤務地</th>
                            <td>
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
                            </td>
                        </tr>
                        <tr>
                            <th class="tit t2">職種</th>
                            <td>
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
                            </td>
                        </tr>
                        <tr>
                            <th>雇用形態</th>
                            <td>
                                <span class="input_text">
                                    <?php if ($job_preferences['employ_type_class']): ?>
                                        <?php foreach ($job_preferences['employ_type_class'] as $id): ?>
                                            <?php echo $employee_type_classes[$id]; ?>&emsp;
                                        <?php endforeach;?>
                                    <?php else: ?>
                                        -
                                    <?php endif ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>希望年収</th>
                            <td><span class="input_text"><?php echo $job_preferences['salary'] ? $salaries[$job_preferences['salary']] : '-'; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td><span class="input_text"><?php echo $job_preferences['company_name'] ?: '-'; ?></span></td>
                        </tr>
                        <tr>
                            <th>キーワード</th>
                            <td><span class="input_text"><?php echo $job_preferences['keyword'] ?: '-'; ?></span></td>
                        </tr>
                        <tr>
                            <th>こだわり</th>
                            <td>
                                <span class="input_text">
                                    <?php if ($job_preferences['flag']): ?>
                                        <?php foreach ($job_preferences['flag'] as $name => $value): ?>
                                            <?php echo $job_flags[$name]; ?>&emsp;
                                        <?php endforeach;?>
                                    <?php else: ?>
                                        -
                                    <?php endif ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>いかせる資格</th>
                            <td><span class="input_text"><?php echo $job_preferences['qualification'] ?: '-'; ?></span></td>
                        </tr>
                    </table>
                    <div class="form_btn"><?php echo form_submit('submit', 'この条件で設定する'); ?></div>
                <?php echo form_close(); ?>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div>
