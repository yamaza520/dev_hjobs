<h2 class="tit mgn10" id="page-top"><?php echo $page_title; ?></h2>
<div class="inner"><h3 class="tit_bdr01">検索条件</h3></div>
<?php echo form_open('jobs', array('method' => 'get', 'class' => 'form-instant-count')); ?>
    <input type="hidden" name="sh" value="1">
    <dl class="slide_down_form">
        <dt class="tit">勤務地</dt>
        <dd>
            <?php $prectures = get_prefectures(); ?>
            <select id="select_area" class="mgn10">
                <?php $i = 1; ?>
                <?php foreach ($prectures as $name => $prefs): ?>
                    <option name="area" value="<?php echo $name; ?>" data="box<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo $name; ?></option>
                    <?php $i++; ?>
                <?php endforeach ?>
            </select>
            <?php $i = 1; ?>
            <?php foreach ($prectures as $name => $prefs): ?>
                <ul id="box<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>" class="list cf check_wrap mgn10">
                    <?php foreach ($prefs as $id => $label): ?>
                        <li>
                            <?php echo form_checkbox('q[work_place][]', $id, isset($q['work_place']) && in_array($id, $q['work_place'])); ?>
                            <label><?php echo $label; ?></label>
                        </li>
                    <?php endforeach ?>
                </ul>
                <?php $i++; ?>
            <?php endforeach ?>
            <?php
                echo form_input(array(
                    'type'        => 'text',
                    'name'        => 'q[address]',
                    'value'       => set_value('address', isset($q['address']) ? $q['address'] : ''),
                    'placeholder' => '市区町村、駅などを入力'
                ));
            ?>
        </dd>
    </dl>
    <dl class="slide_down_form">
        <dt class="tit">職種</dt>
        <dd>
            <?php $jcats = get_job_categories(); ?>
            <select id="select_job" class="mgn10">
                <?php $i = 7; ?>
                <?php foreach ($jcats as $name => $cat): ?>
                    <option name="cat" value="<?php echo $name; ?>" data="box<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo $name; ?></option>
                <?php $i++; ?>
                <?php endforeach ?>
            </select>

            <?php $i = 7; ?>
            <?php foreach ($jcats as $name => $cat): ?>
                <ul id="box<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>" class="job_cat list w100p mgn10">
                    <?php foreach ($cat as $id => $label): ?>
                        <li>
                            <?php echo form_checkbox('q[job_category_s_id][]', $id, isset($q['job_category_s_id']) && in_array($id, $q['job_category_s_id'])); ?>
                            <label><?php echo $label; ?></label>
                        </li>
                    <?php endforeach ?>
                </ul>
                <?php $i++; ?>
            <?php endforeach ?>
        </dd>
    </dl>
    <dl class="slide_down_form">
        <dt class="tit">雇用形態</dt>
        <dd>
            <ul class="list cf mgn10">
                <?php foreach ($employee_type_classes as $value => $label): ?>
                    <li>
                        <?php echo form_checkbox('q[employ_type_class][]', $value, isset($q['employ_type_class']) && in_array($value, $q['employ_type_class'])); ?>
                        <label><?php echo $label; ?></label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </dd>
    </dl>
    <dl class="slide_down_form">
        <dt class="tit">希望年収</dt>
        <dd>
            <?php echo form_dropdown('q[salary]', $salaries, set_value('salary', isset($q['salary']) ? $q['salary'] : '')); ?>
        </dd>
    </dl>
    <dl class="slide_down_form">
        <dt class="tit">会社名</dt>
        <dd>
            <?php
                echo form_input(array(
                    'type'        => 'text',
                    'name'        => 'q[company_name]',
                    'value'       => set_value('company_name', isset($q['company_name']) ? $q['company_name'] : ''),
                    'placeholder' => '株式会社◯◯などを入力'
                ));
            ?>
        </dd>
    </dl>
    <dl class="slide_down_form">
        <dt class="tit">キーワード</dt>
        <dd>
            <?php
                echo form_input(array(
                    'type' =>'text',
                    'name' => 'q[keyword]',
                    'id' => 'keyword',
                    'class' => 'form_size_full',
                    'value' => set_value('q[keyword]', isset($q['keyword']) ? $q['keyword'] : ''),
                    'placeholder' => '職種/条件/こだわりなどを入力'
                ));
            ?>
        </dd>
    </dl>
    <dl class="slide_down_form">
        <dt class="tit">こだわり</dt>
        <dd>
            <ul class="list cf w100p">
                <?php $top_job_flags = array_slice($job_flags, 0, 9); ?>
                <?php foreach ($top_job_flags as $flag_field => $flag_label): ?>
                    <li>
                        <?php echo form_checkbox('q[' . $flag_field . ']', 1, isset($q[$flag_field])); ?>
                        <label><?php echo $flag_label; ?></label>
                    </li>
                <?php endforeach ?>
            </ul>
            <div class="slide_down_box">
                <ul class="list cf w100p mgn10 nobdr">
                    <?php $more_job_flags = array_slice($job_flags, 9); ?>
                    <?php foreach ($more_job_flags as $flag_field => $flag_label): ?>
                        <li>
                            <?php echo form_checkbox('q[' . $flag_field . '][]', 1, isset($q[$flag_field])); ?>
                            <label><?php echo $flag_label; ?></label>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="btn_more btn_text"><span>もっと見る</span></div>
        </dd>
    </dl>
    <!--
        <dl class="slide_down_form">
            <dt class="tit">いかせる資格</dt>
            <dd><input type="text" placeholder="資格入力"/></dd>
        </dl>
    -->
    <div class="form_btn_wrap">
        <div class="form_btn"><input type="submit" class="" value="この条件で検索(<?php echo $total_jobs; ?>件)"></div>
    </div>
<?php echo form_close(); ?>

<?php if (count($jobs)): ?>
    <div class="page-numbers_wrap">
        <?php if (count($jobs)): ?>
            <span class="current_page"><?php echo $paging_info ; ?></span>
            <div class="pager">
                <?php echo $pagination; ?>
            </div>
        <?php endif ?>
    </div>

    <?php foreach ($jobs as $job): ?>
        <div class="rec_box">
            <div class="cf">
                <?php echo (ab_is_new_job($job->created_at)) ? '<span class="cat s1">新着</span>' : ''; ?>
                <span class="cat s2">雇用形態／<?php echo display_employee_type($job->employ_type_class); ?></span>
                <span class="rec_id"><?php echo $job->job_code; ?></span>
            </div>
            <div class="cf">
                <div class="img_box">
                    <img src="<?php echo get_job_image_src($job); ?>"  width="150" />
                </div>
                <div class="right_box">
                    <span class="name"><?php echo $job->company_name; ?></span>
                    <a href="<?php echo site_url('job/detail/'.$job->id); ?>" class="chach" target="blank"><?php echo $job->job_title; ?></a>
                    <div class="publish cf">
                        <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                    </div>
                </div>
            </div>
            <dl class="rec_cont">
                <dt>求人の特徴</dt>
                <?php $flags = get_job_flags($job); ?>
                <?php if (count($flags)): ?>
                    <dd class="point">
                        <?php foreach ($flags as $flag): ?>
                            <span><?php echo $flag; ?></span>
                        <?php endforeach ?>
                    </dd>
                <?php endif ?>
                <dt>仕事内容</dt>
                <dd><?php echo $job->job_description; ?></dd>
                <dt>求めるスキル</dt>
                <dd><?php echo $job->requirement; ?></dd>
                <dt>給与</dt>
                <dd><?php echo display_job_salary($job); ?></dd>
                <!--<dt>勤務地</dt>
                <dd><?php echo $job->address1 .' '.$job->address2; ?></dd>-->
                <?php if (!empty($job->recurit_background)): ?>
                    <dt>募集背景</dt>
                    <dd><?php echo nl2br($job->recurit_background); ?></dd>
                <?php endif ?>
            </dl>
            <div class="btn_box cf">
                <a href="<?php echo site_url('job/detail/'.$job->id); ?>" target="_blank" class="l_btn">この求人の詳細を見る</a>
                <?php if (ab_is_favorite_job($job)): ?>
                    <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
                <?php else: ?>
                    <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
    <div class="page-numbers_wrap">
        <div class="page-numbers_wrap cf">
            <div class="pager">
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    データはありません。
<?php endif ?>

<a href="#page-top" class="btn_change">検索条件を変更する</a>

<?php $this->load->view('sp/blocks/subscribe_form'); ?>
<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
