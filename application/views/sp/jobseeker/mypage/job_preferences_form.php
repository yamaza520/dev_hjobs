<div class="inner">
    <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
</div>
<h2 class="tit mgn10">希望条件の確認・編集</h2>
<?php if (isset($error) && $error) { ?>
    <dl class="validation">
        <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
        <dd><?php echo $error;?></dd>
    </dl>
<?php } ?>
<div class="form_tbl cf">
    <?php echo form_open('', array('method' => 'post'));?>
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
                            <?php echo form_checkbox('work_place[]', $id, in_array($id, $preferences['work_place'])); ?>
                            <label><?php echo $label; ?></label>
                        </li>
                    <?php endforeach ?>
                    </ul>
                    <?php $i++; ?>
                <?php endforeach ?>

                <?php
                    echo form_input(array(
                        'type'        => 'text',
                        'name'        => 'address',
                        'value'       => set_value('address', $preferences['address']),
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
                            <?php echo form_checkbox('job_category_s_id[]', $id, in_array($id, $preferences['job_category_s_id'])); ?>
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
                            <?php echo form_checkbox('employ_type_class[]', $value, in_array($value, $preferences['employ_type_class'])); ?>
                            <label><?php echo $label; ?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </dd>
        </dl>
        <dl class="slide_down_form">
            <dt class="tit">希望年収</dt>
            <dd>
                <?php echo form_dropdown('salary', $salaries, set_value('salary', $preferences['salary'])); ?>
            </dd>
        </dl>
        <dl class="slide_down_form">
            <dt class="tit">会社名</dt>
            <dd>
                <?php
                    echo form_input(array(
                        'type'        => 'text',
                        'name'        => 'company_name',
                        'value'       => set_value('company_name', $preferences['company_name']),
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
                        'type'        =>'text',
                        'name'        => 'keyword',
                        'value'       => set_value('keyword', $preferences['keyword']),
                        'id'          => 'keyword',
                        'class'       => 'form_size_full',
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
                            <?php echo form_checkbox('flag[' . $flag_field . ']', 1, array_key_exists($flag_field, $preferences['flag'])); ?>
                            <label><?php echo $flag_label; ?></label>
                        </li>
                    <?php endforeach ?>
                </ul>
                <div class="slide_down_box3">
                    <ul class="list cf w100p mgn10 nobdr">
                        <?php $more_job_flags = array_slice($job_flags, 9); ?>
                        <?php foreach ($more_job_flags as $flag_field => $flag_label): ?>
                            <li>
                                <?php echo form_checkbox('flag[' . $flag_field . ']', 1, array_key_exists($flag_field, $preferences['flag'])); ?>
                                <label><?php echo $flag_label; ?></label>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="btn_more3 btn_text"><span>もっと見る</span></div>
            </dd>
        </dl>
        <dl class="slide_down_form">
            <dt class="tit">いかせる資格</dt>
            <dd>
                <?php
                    echo form_input(array(
                        'type'        =>'text',
                        'name'        => 'qualification',
                        'value'       => set_value('qualification', $preferences['qualification']),
                        'placeholder' => '資格入力'
                    ));
                ?>
            </dd>
        </dl>
        <div class="form_btn_wrap">
            <div class="form_btn"><?php echo form_submit('submit', 'この条件で設定する'); ?></div>
        </div>
    <?php echo form_close(); ?>
</div>
<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
