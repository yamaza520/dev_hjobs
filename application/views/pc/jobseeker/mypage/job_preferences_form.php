<div id="contents" class="mypage setting recruit">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit"><?php echo $page_title; ?></h2>
            <?php if (isset($error) && $error) { ?>
                <dl class="validation">
                    <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                    <dd><?php echo $error;?></dd>
                </dl>
            <?php } ?>
            <div class="sec_in cf">
                <!-- form start -->
                <?php echo form_open('', array('method' => 'post'));?>
                    <table>
                        <tr>
                            <th class="tit t1">勤務地</th>
                            <td>
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
                                    <ul id="box<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>" class="cf check_wrap hide">
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
                            </td>
                        </tr>
                        <tr>
                            <th class="tit t2">職種</th>
                            <td>
                                <?php $jcats = get_job_categories(); ?>
                                <div id="radio_job_cat" class="cf">
                                    <?php $i = 7; ?>
                                    <?php foreach ($jcats as $name => $cat): ?>
                                        <label>
                                            <input type="radio" name="cat" value="<?php echo $name; ?>"
                                                data="box<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"
                                                <?php if ($i == 7) echo 'checked'; ?>/>
                                            <?php echo $name; ?>
                                        </label>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                </div>
                                <?php $i = 7; ?>
                                <?php foreach ($jcats as $name => $cat): ?>
                                    <ul id="box<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>" class="job_cat check_wrap hide">
                                    <?php foreach ($cat as $id => $label): ?>
                                        <li>
                                            <?php echo form_checkbox('job_category_s_id[]', $id, in_array($id, $preferences['job_category_s_id'])); ?>
                                            <label><?php echo $label; ?></label>
                                        </li>
                                    <?php endforeach ?>
                                    </ul>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </td>
                        </tr>
                        <tr>
                            <th>雇用形態</th>
                            <td>
                                <ul class="check_wrap cf">
                                    <?php foreach ($employee_type_classes as $value => $label): ?>
                                        <li>
                                            <?php echo form_checkbox('employ_type_class[]', $value, in_array($value, $preferences['employ_type_class'])); ?>
                                            <label><?php echo $label; ?></label>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>希望年収</th>
                            <td>
                                <?php echo form_dropdown('salary', $salaries, set_value('salary', $preferences['salary'])); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td>
                                <?php
                                    echo form_input(array(
                                        'type'        => 'text',
                                        'name'        => 'company_name',
                                        'value'       => set_value('company_name', $preferences['company_name']),
                                        'placeholder' => '株式会社◯◯などを入力'
                                    ));
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>キーワード</th>
                            <td>
                                <?php
                                    echo form_input(array(
                                        'type' =>'text',
                                        'name' => 'keyword',
                                        'value' => set_value('keyword', $preferences['keyword']),
                                        'id' => 'keyword',
                                        'class' => 'form_size_full',
                                        'placeholder' => '職種/条件/こだわりなどを入力'
                                    ));
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>こだわり</th>
                            <td>
                                <ul class="check_wrap cf">
                                    <?php $top_job_flags = array_slice($job_flags, 0, 9); ?>
                                    <?php foreach ($top_job_flags as $flag_field => $flag_label): ?>
                                        <li>
                                            <?php echo form_checkbox('flag[' . $flag_field . ']', 1, array_key_exists($flag_field, $preferences['flag'])); ?>
                                            <label><?php echo $flag_label; ?></label>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                                <div class="slide_down_box3">
                                    <ul class="check_wrap cf">
                                        <?php $more_job_flags = array_slice($job_flags, 9); ?>
                                        <?php foreach ($more_job_flags as $flag_field => $flag_label): ?>
                                            <li>
                                                <?php echo form_checkbox('flag[' . $flag_field . ']', 1, array_key_exists($flag_field, $preferences['flag'])); ?>
                                                <label><?php echo $flag_label; ?></label>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div class="btn_down1"><span>もっと見る</span></div>
                            </td>
                        </tr>
                        <tr>
                            <th>いかせる資格</th>
                            <td>
                                <?php
                                    echo form_input(array(
                                        'type'        =>'text',
                                        'name'        => 'qualification',
                                        'value'       => set_value('qualification', $preferences['qualification']),
                                        'placeholder' => '資格入力'
                                    ));
                                ?>
                            </td>
                        </tr>
                    </table>
                    <div class="form_btn"><?php echo form_submit('submit', 'この条件で設定する'); ?></div>
                <?php echo form_close(); ?>
            </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div>
