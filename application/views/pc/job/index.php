<div id="contents" class="recruit">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">求人一覧</span></div>
        </div>
        <h2 class="tit mgn20"><?php echo $page_title; ?></h2>
        <div class="sec_in">
            <h3 class="tit">検索条件</h3>
            <?php echo form_open('jobs', array('method' => 'get', 'class' => 'form-instant-count')); ?>
                <input type="hidden" name="sh" value="1">
                <table>
                    <tr>
                        <th class="tit t1">勤務地</th>
                        <td class="prefByArea">
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
                        </td>
                    </tr>
                    <tr>
                        <th class="tit t2">職種</th>
                        <td class="jobCatByParent">
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
                                        <?php echo form_checkbox('q[job_category_s_id][]', $id, isset($q['job_category_s_id']) && in_array($id, $q['job_category_s_id'])); ?>
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
                                        <?php echo form_checkbox('q[employ_type_class][]', $value, isset($q['employ_type_class']) && in_array($value, $q['employ_type_class'])); ?>
                                        <label><?php echo $label; ?></label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>希望年収</th>
                        <td>
                            <?php echo form_dropdown('q[salary]', $salaries, set_value('salary', isset($q['salary']) ? $q['salary'] : '')); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>会社名</th>
                        <td>
                            <?php
                                echo form_input(array(
                                    'type'        => 'text',
                                    'name'        => 'q[company_name]',
                                    'value'       => set_value('company_name', isset($q['company_name']) ? $q['company_name'] : ''),
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
                                    'name' => 'q[keyword]',
                                    'id' => 'keyword',
                                    'class' => 'form_size_full',
                                    'value' => set_value('q[keyword]', isset($q['keyword']) ? $q['keyword'] : ''),
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
                                        <?php echo form_checkbox('q[' . $flag_field . ']', 1, isset($q[$flag_field])); ?>
                                        <label><?php echo $flag_label; ?></label>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                            <div class="slide_down_box">
                                <ul class="check_wrap cf">
                                    <?php $more_job_flags = array_slice($job_flags, 9); ?>
                                    <?php foreach ($more_job_flags as $flag_field => $flag_label): ?>
                                        <li>
                                            <?php echo form_checkbox('q[' . $flag_field . '][]', 1, isset($q[$flag_field])); ?>
                                            <label><?php echo $flag_label; ?></label>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="btn_more"><span>もっと見る</span></div>
                        </td>
                    </tr>
                    <?php
                    /*
                    <tr>
                        <th>いかせる資格</th>
                        <td>
                            <?php
                                echo form_input(array(
                                    'type'        =>'text',
                                    'name'        => 'q[qualification]',
                                    'value'       => set_value('qualification', isset($q['qualification']) ? $q['qualification'] : ''),
                                    'placeholder' => '資格入力'
                                ));
                            ?>
                        </td>
                    </tr>
                    */
                    ?>
                </table>
                <div class="form_btn_wrap">
                    <div class="form_btn"><input type="submit" class="" value="この条件で検索(<?php echo $total_jobs; ?>件)"></div>
                </div>
            <?php echo form_close(); ?>
        </div>
        <div class="page-numbers_wrap cf">
            <?php if (count($jobs)): ?>
                <span class="current_page"><?php echo $paging_info ; ?></span>
                <?php echo $pagination; ?>
            <?php endif ?>
        </div>

        <?php if (count($jobs)): ?>
            <?php foreach ($jobs as $job): ?>
                <div class="sec_in">
                    <div class="cf">
                        <div class="rec_box">
                            <div class="cf">
                                <?php echo (ab_is_new_job($job->created_at)) ? '<span class="cat s1">新着</span>' : ''; ?>
                                <span class="cat s2">雇用形態／<?php echo display_employee_type($job->employ_type_class); ?></span>
                                <span class="rec_id"><?php echo $job->job_code; ?></span>
                            </div>
                            <span class="name"><?php echo $job->company_name; ?></span>
                            <a href="<?php echo site_url('job/detail/'.$job->id); ?>" class="chach" target="blank"><?php echo $job->job_title; ?></a>
                            <?php $flags = get_job_flags($job); ?>
                            <?php if (count($flags)): ?>
                                <div class="point">
                                    <?php foreach ($flags as $flag): ?>
                                        <span><?php echo $flag; ?></span>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
                            <div class="text01"><?php echo nl2br($job->job_description); ?></div>
                            <div class="text02"><?php echo nl2br($job->requirement); ?></div>
                            <div class="text03"><?php echo display_job_salary($job); ?></div>
                            <!--<div class="text04">
                                ●<?php echo $job->address1 .' '.$job->address2; ?><br>
                                <?php echo nl2br($job->traffic); ?>
                            </div>-->
                        </div>
                        <div class="right_box">
                            <?php if ($job->media_logo_file): ?>
                                <div class="publish fr">
                                    <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                                </div>
                            <?php endif ?>
                            <div class="img_box"><img src="<?php echo get_job_image_src($job); ?>"  width="150" /></div>
                            <?php if (!empty($job->recurit_background)): ?>
                                <div class="text01">
                                    <?php
                                        echo $job->recurit_background;
                                    ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
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
            <div class="page-numbers_wrap cf">
                <?php echo $pagination; ?>
            </div>
        <?php else: ?>
            データはありません。
        <?php endif ?>
        <?php $this->load->view('pc/blocks/subscribe_form'); ?>
    </div>
</div><!--/#contents-->
