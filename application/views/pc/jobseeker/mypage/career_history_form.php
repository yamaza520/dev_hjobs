<div id="contents" class="mypage setting signup">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
                <h2 class="tit mgn20">経歴情報の確認・編集</h2>
                <?php if ($incomplete_profile_info) : ?>
                    <dl class="validation mgnT">
                        <dt><?php echo $incomplete_profile_info; ?></dt>
                    </dl>
                <?php endif ?>
                <?php if (isset($message) && $message) : ?>
                    <dl class="validation mgnT">
                        <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                        <?php echo $message;?>
                    </dl>
                <?php endif ?>
                <?php echo form_open('', array('method' => 'post'));?>
                    <div class="sec_in form_tbl">
                        <div class="tit_bar"><h3>学歴情報</h3></div>
                        <dl class="nobdr">
                            <dt>最終学歴<span class="must">必須</span></dt>
                            <dd class="select_wrap">
                                <?php echo form_dropdown('last_education_cd', $last_education_cd, set_value('last_education_cd', $career_history['last_education_cd']), array('required' => 'required')); ?>
                                <br>
                                <span class="left">卒業区分</span>
                                <?php echo form_dropdown('graduate_year', $years, set_value('graduate_year', $career_history['graduate_year']), array('required' => 'required')); ?>
                                <span class="right">年</span>&emsp;
                                <?php echo form_dropdown('graduate_month', $months, set_value('graduate_month', $career_history['graduate_month']), array('required' => 'required')); ?>
                                <span class="right">月</span>&emsp;
                                <?php echo form_dropdown('graduate_cd', $degree_status, set_value('graduate_cd', $career_history['graduate_cd']), array('required' => 'required')); ?>
                                <span class="left">文理区分</span>
                                <?php echo form_dropdown('literature_type', $literature_type, set_value('literature_type', $career_history['literature_type']), array('required' => 'required')); ?>
                                <br>
                                <span class="left">学校名</span>
                                <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'name'  => 'school_name',
                                        'value' => set_value('school_name', $career_history['school_name']),
                                        'placeholder' => 'こちらに入力してください。',
                                        'required' => 'required'
                                    ));
                                ?>
                            </dd>
                        </dl>
                    </div>
                    <div class="sec_in form_tbl">
                        <div class="tit_bar"><h3>職務情報</h3></div>
                        <dl>
                            <dt>現在の勤務状況<span class="must">必須</span></dt>
                            <dd>
                                <label><input type="radio" name="is_working" value="0" <?php echo set_radio('is_working', 0, (int) $career_history['is_working'] === 0 ? true : false);?> required/>就業中</label>
                                <label><input type="radio" name="is_working" value="1" <?php echo set_radio('is_working', 1, (int) $career_history['is_working'] === 1 ? true : false);?> required/>離職中</label>
                            </dd>
                        </dl>
                        <dl>
                            <dt>現在の職業</dt>
                            <dd>
                                <?php
                                echo form_textarea(array(
                                    'class' => 'form-control',
                                    'name'  => 'current_job',
                                    'rows'  => '4',
                                    'class' => 'type-counter',
                                    'value' => set_value('current_job', $career_history['current_job']),
                                    'placeholder' => 'こちらに入力してください。',
                                    'maxlength' => 60,
                                ));
                                ?>
                                <p class="resume_form_text2">※60文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>転職回数<span class="must">必須</span></dt>
                            <dd class="select_wrap">
                                <?php echo form_dropdown('change_work_count', $change_work_count, set_value('change_work_count', $career_history['change_work_count'] ), array('required' => 'required')); ?>
                                <span class="right">回</span>&emsp;
                            </dd>
                        </dl>

                        <div class="working_history">
                            <?php $work_i = 0; ?>
                            <?php if (!empty($career_history['working_history'])): ?>
                                <?php foreach($career_history['working_history'] as $work_i => $work): ?>
                                    <div id="working_<?php echo $work_i; ?>">
                                        <div class="tit_bg">
                                            <span>職務経歴-<?php echo $work_i + 1; ?></span>
                                            <a href="javascript:void(0)" class="delete_btn right" name='work_del[<?php echo $work_i;?>]'>× </a>
                                        </div>
                                        <?php
                                            echo form_input(array(
                                                'type'  => 'hidden',
                                                'name'  => 'work_id['. $work_i. ']',
                                                'value' => set_value('work_id['. $work_i. ']', isset($work['id']) ? $work['id']: 0),
                                                'placeholder' => 'こちらに入力してください。',
                                                'required' => 'required'
                                            ));
                                        ?>
                                        <dl>
                                            <dt>会社名<span class="must">必須</span></dt>
                                            <dd>
                                                <?php
                                                    echo form_input(array(
                                                        'type'  => 'text',
                                                        'name'  => 'company_name['. $work_i. ']',
                                                        'value' => set_value('company_name['. $work_i. ']', $work['company_name']),
                                                        'placeholder' => 'こちらに入力してください。',
                                                        'required' => 'required'
                                                    ));
                                                ?>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>在籍年月<span class="must">必須</span></dt>
                                            <dd>
                                                <span class="left">入社</span>
                                                <?php echo form_dropdown('from_year['. $work_i. ']', $years, set_value('from_year['. $work_i. ']', $work['from_year']), array('required' => 'required')); ?>
                                                <span class="right">年</span>&emsp;
                                                <?php echo form_dropdown('from_month['. $work_i. ']', $months, set_value('from_month['. $work_i. ']', $work['from_month']), array('required' => 'required')); ?>
                                                <span class="right">月</span>
                                                <span class="right">&emsp;～&emsp;</span>
                                                <?php if ($work_i == 0): ?>
                                                    <span class="right current">現在就業中</span>
                                                    <span class="resign">
                                                        <span class="left">退社</span>
                                                        <?php echo form_dropdown('to_year['. $work_i. ']', $years, set_value('to_year['. $work_i. ']', $work['to_year']), array('id' => 'to_year_'.$work_i)); ?>
                                                        <span class="right">年</span>&emsp;
                                                        <?php echo form_dropdown('to_month['. $work_i. ']', $months, set_value('to_month['. $work_i. ']', $work['to_year']), array('id' => 'to_month_'.$work_i)); ?>
                                                        <span class="right">月</span>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="resign">
                                                        <span class="left">退社</span>
                                                        <?php echo form_dropdown('to_year['. $work_i. ']', $years, set_value('to_year['. $work_i. ']', $work['to_year']), array('required' => 'required')); ?>
                                                        <span class="right">年</span>&emsp;
                                                        <?php echo form_dropdown('to_month['. $work_i. ']', $months, set_value('to_month['. $work_i. ']', $work['to_month']), array('required' => 'required')); ?>
                                                        <span class="right">月</span>
                                                    </span>
                                                <?php endif ?>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>雇用形態<span class="must">必須</span></dt>
                                            <dd>
                                                <?php echo form_dropdown('employ_type['. $work_i. ']', $employee_type_class, set_value('employ_type['. $work_i. ']', $work['employ_type']), array('required' => 'required')); ?>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>年収<span class="must">必須</span></dt>
                                            <dd class="income">
                                                <?php
                                                    echo form_input(array(
                                                        'type'  => 'text',
                                                        'name'  => 'annual_income['. $work_i. ']',
                                                        'value' => set_value('annual_income['. $work_i. ']', $work['annual_income']),
                                                        'placeholder' => 'こちらに入力してください。',
                                                        'required' => 'required'
                                                    ));
                                                ?>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>マネジメント経験<span class="must">必須</span></dt>
                                            <dd class="num">
                                                <label><input type="radio" name="management_exp[<?php echo $work_i; ?>]" value="1" <?php echo set_radio('management_exp['. $work_i. ']', 1, (int) $work['management_exp'] === 1 ? true : false);?>/>あり</label>
                                                <span class="left">（マネジメントした人数</span>
                                                <?php
                                                    echo form_input(array(
                                                        'type'  => 'text',
                                                        'name'  => 'manage_person_count['. $work_i. ']',
                                                        'value' => set_value('manage_person_count['. $work_i. ']', $work['manage_person_count']),
                                                        'placeholder' => 'こちらに入力してください。',
                                                    ));
                                                ?>
                                                <span class="right">人）</span><br>
                                                <label><input type="radio" name="management_exp[<?php echo $work_i; ?>]" value="0" <?php echo set_radio('management_exp['. $work_i. ']', 0, (int) $work['management_exp'] === 0 ? true : false);?>/>なし</label>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>業種<span class="must">必須</span></dt>
                                            <dd class="job_cat">
                                                <div>
                                                    <span class="left">大分類</span>
                                                    <?php echo form_dropdown('industory_l_id['. $work_i. ']', $industory_l, set_value('industory_l_id['. $work_i. ']', $work['industory_l_id']), array('required' => 'required', 'id' => 'industory_l_id_'. $work_i, 'class' => 'industory_l_id')); ?>
                                                </div>
                                                <div>
                                                    <span class="left">小分類</span>
                                                    <?php echo form_dropdown('industory_m_id['. $work_i. ']', '', set_value('industory_m_id['. $work_i. ']', $work['industory_m_id']), array('required' => 'required', 'id' => 'industory_m_id_'. $work_i)); ?>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>経験職種<span class="must">必須</span></dt>
                                            <dd class="job_cat">
                                                <div>
                                                    <span class="left">大分類</span>
                                                    <?php echo form_dropdown('job_category_l_id['. $work_i. ']', $job_category_l, set_value('job_category_l_id['. $work_i. ']', $work['job_category_l_id']), array('required' => 'required','id' => 'job_category_l_id_'. $work_i , 'class' => 'job_category_l_id')); ?>
                                                </div>
                                                <div>
                                                    <span class="left">中分類</span>
                                                    <?php echo form_dropdown('job_category_m_id['. $work_i. ']' , '', set_value('job_category_m_id['. $work_i. ']', $work['job_category_m_id']), array('required' => 'required','id' => 'job_category_m_id_'. $work_i, 'class' => 'job_category_m_id')); ?>
                                                </div>
                                                <div>
                                                    <span class="left">小分類</span>
                                                    <?php echo form_dropdown('job_category_s_id['. $work_i. ']' , '', set_value('job_category_s_id['. $work_i. ']', $work['job_category_s_id']), array('required' => 'required','id' => 'job_category_s_id_'. $work_i, 'class' => 'job_category_s_id')); ?>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt>経験年月<span class="must">必須</span></dt>
                                            <dd>
                                                <span class="left">開始</span>
                                                <?php echo form_dropdown('exp_from_year['. $work_i. ']', $years, set_value('exp_from_year['. $work_i. ']', $work['exp_from_year']), array('required' => 'required')); ?>
                                                <span class="right">年</span>&emsp;
                                                <?php echo form_dropdown('exp_from_month['. $work_i. ']', $months, set_value('exp_from_month['. $work_i. ']', $work['exp_from_month']), array('required' => 'required')); ?>
                                                <span class="right">月</span>
                                                <span class="right">&emsp;～&emsp;</span>
                                                <?php if ($work_i == 0): ?>
                                                    <span class="right current">現在</span>
                                                    <span class="resign">
                                                        <span class="left">退社</span>
                                                                <?php echo form_dropdown('exp_to_year['. $work_i. ']', $years, set_value('exp_to_year['. $work_i. ']', $work['exp_to_year']), array('id' => 'exp_to_year_'. $work_i)); ?>
                                                        <span class="right">年</span>&emsp;
                                                        <?php echo form_dropdown('exp_to_month['. $work_i. ']', $months, set_value('exp_to_month['. $work_i. ']', $work['exp_to_month']), array('id' => 'exp_to_month_'. $work_i)); ?>
                                                        <span class="right">月</span>
                                                    </span>
                                                <?php else : ?>
                                                    <span class="right">
                                                        <span class="left">退社</span>
                                                        <?php echo form_dropdown('exp_to_year['. $work_i. ']', $years, set_value('exp_to_year['. $work_i. ']', $work['exp_to_year'])); ?>
                                                        <span class="right">年</span>&emsp;
                                                        <?php echo form_dropdown('exp_to_month['. $work_i. ']', $months, set_value('exp_to_month['. $work_i. ']', $work['exp_to_month'])); ?>
                                                        <span class="right">月</span>
                                                    </span>
                                                <?php endif ?>
                                            </dd>
                                        </dl>
                                        <dl class="nobdr">
                                            <dt>職務内容<span class="must">必須</span></dt>
                                            <dd class="motive">
                                                <?php
                                                    echo form_textarea(array(
                                                        'name'  => 'job_description['. $work_i. ']',
                                                        'class' => 'type-counter',
                                                        'value' => set_value('job_description['. $work_i. ']', $work['job_description']),
                                                        'minlength' => 100,
                                                        'maxlength' => 950,
                                                        'placeholder' => 'こちらに入力してください。',
                                                        'required' => 'required',
                                                    ));
                                                ?>
                                                <p class="resume_form_text2">※100文字以上950文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                            </dd>
                                        </dl>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                        <p class="resume_form_text cf"><a href="#" class="add_btn">追加する</a></p>
                    </div>
                    <div class="sec_in form_tbl">
                        <div class="tit_bar"><h3>語学力</h3></div>
                        <dl>
                            <dt>語学英語レベル<span class="must">必須</span></dt>
                            <dd>
                                <?php echo form_dropdown('english_level', $english_level, set_value('english_level', $career_history['english_level']), array('required' => 'required')); ?>
                            </dd>
                        </dl>
                        <dl>
                            <dt>TOEIC<span class="must">必須</span></dt>
                            <dd class="income">
                                <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'name'  => 'toeic',
                                        'value' => set_value('toeic', $career_history['toeic']),
                                        'required' => 'required',
                                    ));
                                ?>
                                <span class="right">点</span>
                            </dd>
                        </dl>
                        <dl class="nobdr">
                            <dt>その他外国語<span class="must">必須</span></dt>
                            <dd class="w365">
                                <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'name'  => 'other_language',
                                        'value' => set_value('other_language', $career_history['other_language']),
                                        'placeholder' => 'こちらに入力してください。',
                                        'required' => 'required',
                                    ));
                                ?>
                            </dd>
                        </dl>
                    </div>
                    <div class="sec_in form_tbl">
                        <div class="tit_bar"><h3>転職理由・自己PR</h3></div>
                        <dl>
                            <dt>転職理由<span class="must">必須</span></dt>
                            <dd class="motive2">
                                <?php
                                    echo form_textarea(array(
                                        'class' => 'form-control',
                                        'name'  => 'reason_for_change_work',
                                        'rows'  => '4',
                                        'class' => 'type-counter',
                                        'value' => set_value('reason_for_change_work', $career_history['reason_for_change_work']),
                                        'minlength' => 50,
                                        'maxlength' => 500,
                                        'placeholder' => 'こちらに入力してください。',
                                        'required' => 'required',
                                    ));
                                ?>
                                <p class="resume_form_text2">※50文字以上500文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                            </dd>
                        </dl>
                        <dl class="nobdr">
                            <dt>自己PR<span class="must">必須</span></dt>
                            <dd class="motive2">
                                <?php
                                    echo form_textarea(array(
                                        'class' => 'type-counter',
                                        'name'  => 'pr',
                                        'rows'  => '4',
                                        'value' => set_value('pr', $career_history['pr']),
                                        'maxlength' => 1000,
                                        'placeholder' => 'こちらに入力してください。',
                                        'required' => 'required',
                                    ));
                                ?>
                                <p class="resume_form_text2">※1000文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                            </dd>
                        </dl>
                    </div>
                    <div class="resume_form_btn"><input type="submit" value="登録内容の確認へ" /><?php echo form_hidden('redirect', $redirect); ?></div>
                <?php echo form_close(); ?>
        </div><!--#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--#contents-->
<script type="text/javascript">
work_i = <?php echo $work_i; ?>;
work_data = <?php echo json_encode($career_history['working_history']); ?>;

    $(document).ready(function(){
        value = parseInt('<?php echo $career_history['is_working']; ?>');
        toogle_work_ym(value);
        $( ".job_category_m_id" ).each(function() {
            Application.TypeCounter();
        });

        var i = 0;
        $( ".industory_l_id" ).each(function() {
            $(this).change();
            var ind_m = work_data[i].industory_m_id;
            $('#industory_m_id_'+ i).val(ind_m);
            i = i + 1;
        });

        i = 0;
        $( ".job_category_l_id" ).each(function() {
            $(this).change();
            var job_m = work_data[i].job_category_m_id;
            $('#job_category_m_id_'+ i).val(job_m);
            i = i + 1;
        });

        i = 0;
        $( ".job_category_m_id" ).each(function() {
            $(this).change();
            var job_s = work_data[i].job_category_s_id;
            $('#job_category_s_id_'+ i).val(job_s);
            i = i + 1;
        });
    });

    $(document).on('change','.job_category_l_id', function() {
        Application.ChildSelectUpdater($(this), 'ajax/get_jobcategory_m');
    });

    $(document).on('change','.job_category_m_id', function() {
        Application.ChildSelectUpdater($(this), 'ajax/get_jobcategory_s');
    });

    $(document).on('change','.industory_l_id', function() {
        Application.ChildSelectUpdater($(this), 'ajax/get_industry_m');
    });
    $(document).on('click','.delete_btn', function() {
        var id = $(this).attr('name').match(/\d+/);
        if (id != 0) {
            $('#working_' + id).remove();
        }
    });

    $('input[name=is_working]').on('click', function(){
        toogle_work_ym($(this).val());
    });

    function toogle_work_ym($val) {
        if ($val == '0') {
            $('#working_0').find('#to_year_0').val('');
            $('#working_0').find('#to_month_0').val('');

            $('#working_0').find('#exp_to_year_0').val('');
            $('#working_0').find('#exp_to_month_0').val('');

            $('#working_0 .current').show();
            $('#working_0 .resign').hide();

        } else {
            $('#working_0 .current').hide();
            $('#working_0 .resign').show();
        }
    }
    $('.add_btn').on('click', function (e) {
        e.preventDefault();

        work_i = work_i  + 1;
        var html_string = '<div id="working_' + work_i + '">';
        html_string += '<div class="tit_bg"><span>職務経歴-' + (work_i + 1) + '</span>';
        html_string += '<a href="javascript:void(0)" class="delete_btn right" name="work_del[' + work_i + ']">× </a>';
        html_string += '</div>';
        html_string += '<dl><dt>会社名<span class="must">必須</span></dt><dd>';
        html_string += '<input type="text" name="company_name[' + work_i + ']" value="" placeholder="こちらに入力してください。" required';
        html_string += "</dd></dl><dl><dt>在籍年月<span class='must'>必須</span></dt><dd><span class='left'>入社</span>";
        // for from_year
        html_string += '<select name="from_year[' + work_i + ']" required>';
        <?php foreach ($years as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select> <span class="right">年</span>&emsp;';

        //for from month
        html_string += '<select name="from_month[' + work_i + ']" required>';
        <?php foreach ($months as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select><span class="right">月</span><span class="right">&emsp;～&emsp;</span><span class="resign"><span class="left">退社</span>';

        //for to year
        html_string += '<select name="to_year[' + work_i + ']" required>';
        <?php foreach ($years as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select> <span class="right">年</span>&emsp;';

        //for to month
        html_string += '<select name="to_month[' + work_i + ']" required>';
        <?php foreach ($months as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select><span class="right">月</span></span></dd></dl><dl><dt>雇用形態<span class="must">必須</span></dt><dd>';

        // for employee type
        html_string += '<select name= "employ_type[' + work_i + ']" required>';
        <?php foreach ($employee_type_class as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select></dd></dl><dl><dt>年収<span class="must">必須</span></dt><dd class="income">';
        html_string += '<input type="text" name="annual_income[' + work_i + ']" required >'
        html_string += '</dd> </dl> <dl> <dt>マネジメント経験<span class="must">必須</span></dt> <dd class="num"> <label>';
        html_string += '<input type="radio" name="management_exp[' + work_i + ']" value="1" />';
        html_string += 'あり</label><span class="left">（マネジメントした人数</span>';
        html_string += '<input type="text" name="manage_person_count[' + work_i + ']" /><span class="right">人）</span><br><label>';
        html_string += '<input type="radio" name="management_exp[' + work_i + ']" value="0" />なし</label>';
        html_string += '</dd></dl><dl><dt>業種<span class="must">必須</span></dt><dd class="job_cat"><div> <span class="left">大分類</span>';

        // for industry_l
        html_string += '<select name="industory_l_id[' + work_i + ']" required class="industory_l_id">';
        <?php foreach ($industory_l as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select></div><div><span class="left">小分類</span>';

        // for industry_s
        html_string += '<select name="industory_m_id[' + work_i + ']" required>';
        html_string += '</select></div></dd></dl><dl><dt>経験職種<span class="must">必須</span></dt><dd class="job_cat"> <div> <span class="left">大分類</span>';

        // for job_category_l
        html_string += '<select name="job_category_l_id[' + work_i + ']" required class="job_category_l_id">';
        <?php foreach ($job_category_l as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select></div><div><span class="left">中分類</span>';

        // for job_category_m
        html_string += '<select name="job_category_m_id[' + work_i + ']" class="job_category_m_id" required>';
        html_string += '</select></div><div><span class="left">小分類</span>';

        // for job_category_s
        html_string += '<select name="job_category_s_id[' + work_i + ']" class="job_category_s_id" required>';
        html_string += '</select></div></dd></dl><dl><dt>経験年月<span class="must">必須</span></dt><dd><span class="left">開始</span>';

        // for exp_from_year
        html_string += '<select name="exp_from_year[' + work_i + ']">';
        <?php foreach ($years as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select> <span class="right">年</span>&emsp;';

        //for from month
        html_string += '<select name="exp_from_month[' + work_i + ']">';
        <?php foreach ($months as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select><span class="right">月</span><span class="right">&emsp;～&emsp;</span><span class="resign"><span class="left">退社</span>';

        //for to year
        html_string += '<select name="exp_to_year[' + work_i + ']">';
        <?php foreach ($years as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select> <span class="right">年</span>&emsp;';

        //for to month
        html_string += '<select name="exp_to_month[' + work_i + ']">';
        <?php foreach ($months as $key => $value) : ?>
            html_string += '<option value="<?php echo $key;?>"> <?php echo $value;?></option>';
        <?php endforeach ?>
        html_string += '</select><span class="right">月</span></dd></dl><dl class="nobdr"><dt>職務内容<span class="must">必須</span></dt><dd class="motive">';
        html_string += '<textarea name="job_description['+ work_i + ']" class="type-counter" minlength="100" placeholder="こちらに入力してください。" maxlength="950"></textarea>'
        html_string += '<p class="resume_form_text2">※100文字以上950文字以内で入力してください。（現在：<span class="num">0</span>文字）</p></dd></dl>';
        // close
        html_string += '</div>';

        $( ".working_history" ).append(html_string);
    });

</script>
