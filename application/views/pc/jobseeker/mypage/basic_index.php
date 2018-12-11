    <div id="contents" class="mypage">
        <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
        <div class="inner cf">
            <div id="main">
                <div class="sec_in">
                    <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
                    <ul class="btn_box cf">
                        <li><a href="#sec01">閲覧履歴を確認</a></li>
                        <li><a href="#sec02">気になるリストを確認</a></li>
                        <li><a href="#sec03">ご希望に合った求人一覧</a></li>
                    </ul>
                </div>
                <div class="sec_in">
                    <div class="tit"><h3>検索</h3></div>
                    <?php echo form_open('jobs', array('method' => 'get', 'class' => 'form-instant-count')); ?>
                        <div class="search_box cf">
                            <div class="search">
                                <select name="q[work_place]">
                                    <?php foreach ($prefectures as $pref_cd => $name): ?>
                                        <option value="<?php echo $pref_cd;?>"><?php echo $name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="search">
                                <select name="q[job_category_s_id]">
                                    <option value="">職種を選択</option>
                                    <option value="346">宿泊</option>
                                    <option value="342">婚礼</option>
                                    <option value="341">受付</option>
                                    <option value="347">葬祭</option>
                                    <option value="343">調理</option>
                                    <option value="344">レストランマネジメント</option>
                                    <option value="345">ウェイター／ウェイトレス</option>
                                    <option value="340">管理</option>
                                </select>
                            </div>
                            <div class="search">
                                <select name="q[employ_type_class]">
                                    <option value="">雇用形態を選択</option>
                                    <?php foreach ($employ_type_class as $value => $employ): ?>
                                        <option value="<?php echo $value;?>"><?php echo $employ; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <input type="text" name="q[keyword]" placeholder="こだわり・資格名などフリーワードを入力" />
                        <div class="keyword">
                            <p class="btn_more"><span>こだわり・資格選択</span></p>
                            <ul class="cf check_wrap">
                                <?php foreach ($job_flags as $flag_field => $flag_label): ?>
                                    <li>
                                        <?php echo form_checkbox('q[' . $flag_field . ']', 1); ?>
                                        <label><?php echo $flag_label; ?></label>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="form_btn">
                            <input type="submit" value="検索（0件）" />
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <h2 id="sec01" class="tit">閲覧履歴</h2>
                    <div class="sec_in pad_btm browsing_list">
                        <?php if (count($browsing_jobs)) : ?>
                            <?php foreach ($browsing_jobs as $job) : ?>
                                <dl class="list">
                                    <dt class="img_box">
                                        <img src="<?php echo get_job_image_src($job); ?>"  width="150" />
                                    </dt>
                                    <dd>
                                        <span class="tit"><?php echo $job->company_name; ?></span>
                                        <span class="catch"><?php echo $job->job_title; ?></span>
                                        <span class="id">求人ID：<?php echo $job->job_code; ?></span>
                                        <ul class="cf">
                                            <?php if ($job->media_logo_file): ?>
                                                <li>
                                                    <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                                                </li>
                                            <?php endif ?>
                                        </ul>
                                    </dd>
                                    <dd class="btn_more"><a href="<?php echo site_url($base_path.'job/detail/'.$job->id); ?>" target="_blank">詳細</a></dd>
                                </dl>
                            <?php endforeach ?>
                        <div class="btn_more"><span>すべて見る</span></div>
                        <?php else: ?>
                            閲覧履歴はありません。
                        <?php endif ?>
                    </div>
                <h2 id="sec02" class="tit">気になるリスト</h2>
                <div class="sec_in pad_btm fav_list">
                    <?php if (count($favorite_lists)) : ?>
                    <form method="post">
                        <div class="check_all cf">
                            <div class="left_box">
                                <span class="text01">チェックした求人をまとめて</span><input type="submit" value="応募する" />
                                <span class="text02">※チェックできない求人は、個別エントリーが必要です。</span>
                            </div>
                            <div class="right_box">
                                <span>現在検討中の求人<br>（<?php echo (count($favorite_lists)); ?>件）</span>
                            </div>
                        </div>
                        <ul class="list_favorite">
                            <?php foreach ($favorite_lists as $job) : ?>
                            <li class="list<?php if ($job->media_type == 'link') echo ' no-left-pad'; ?>">
                                <?php if ($job->media_type != 'link'): ?>
                                    <label>
                                        <input name="job[]" type="checkbox" checked="checked" class="form_parts_chekbox recommend_checkbox"  value="<?php echo $job->id; ?>" />
                                    </label>
                                <?php endif ?>
                                <div class="list_favorite_data">
                                    <dl class="list">
                                        <dt class="img_box">
                                            <img src="<?php echo get_job_image_src($job); ?>"  width="150" />
                                        </dt>
                                        <dd>
                                            <span class="tit"><?php echo $job->company_name; ?></span>
                                            <span class="catch"><?php echo $job->job_title; ?></span>
                                            <span class="id">求人ID：<?php echo $job->job_code; ?></span>
                                            <ul class="cf">
                                                <?php if ($job->media_logo_file): ?>
                                                    <li>
                                                        <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                                                    </li>
                                                <?php endif ?>
                                            </ul>
                                        </dd>
                                    </dl>
                                    <table>
                                        <tr>
                                            <th>仕事内容</th>
                                            <th>給与</th>
                                            <!--<th>勤務地</th>-->
                                        </tr>
                                        <tr>
                                            <td><?php echo $job->job_description; ?></td>
                                            <td><?php echo $job->salary; ?><?php echo $job->min_salary; ?>万円～<?php echo $job->max_salary; ?>万円（深夜手当・残業手当）※上記はあくまでも最低保証額です。経験...</td>
                                            <!--<td><?php echo $job->address1; ?> <?php echo $job->address2; ?></td>-->
                                        </tr>
                                    </table>
                                    <ul class="btn_box2">
                                        <li><a href="<?php echo site_url($base_path.'job/detail/'.$job->id); ?>" target="_blank">詳細</a></li>
                                        <li><a href="<?php echo site_url($base_path.'favorite-jobs'); ?>" class="r_btn fav-remove" rel="<?php echo $job->id; ?>">リスト削除</a></li>
                                        <li><a href="<?php echo site_url($base_path.'job/application/'.$job->id); ?>">応募する</a></li>
                                    </ul>
                                </div>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="check_all cf">
                            <div class="left_box">
                                <span class="text01">チェックした求人をまとめて</span><input type="submit" value="応募する" />
                                <span class="text02">※チェックできない求人は、個別エントリーが必要です。</span>
                            </div>
                            <div class="right_box">
                                <span>現在検討中の求人<br>（<?php echo (count($favorite_lists)); ?>件）</span>
                            </div>
                        </div>
                        <div class="btn_more2"><span>すべて見る</span></div>

                        <?php else: ?>
                        気になるリストはありません。
                    </form>
                    <?php endif ?>
                </div>
                <?php if (count($top_jobs)): ?>
                    <h2 id="sec03" class="tit">条件に合ったオススメ求人</h2>
                    <div class="sec_in cf">
                    <?php foreach ($top_jobs as $row): ?>
                        <dl class="recomend">
                            <dt>
                                <img src="<?php echo get_job_image_src($row); ?>" alt="">
                                <div class="bg cf">
                                    <a href="<?php echo site_url($base_path.'job/detail/'.$row->id); ?>" target="_blank" class="left">詳細</a>
                                    <?php if (ab_is_favorite_job($row)): ?>
                                        <a href="<?php echo site_url($base_path.'favorite-jobs'); ?>" class="right fav-list">お気に入り求人</a>
                                    <?php else: ?>
                                        <a href="<?php echo site_url($base_path.'favorite-jobs'); ?>" class="right fav-add" rel="<?php echo $row->id; ?>">気になるリストに追加</a>
                                    <?php endif ?>
                                </div>
                            </dt>
                            <dd>
                                <span class="tit"><?php echo $row->company_name; ?></span>
                                <a href="<?php echo base_url($base_path.'job/detail/'.$row->id); ?>" class="catch"><?php echo $row->job_title; ?></a>
                                <span class="salary"><?php echo display_job_salary($row); ?></span>
                                <!--<span class="add"><?php echo $row->address1; ?> <?php echo $row->address2; ?></span>-->
                            </dd>
                        </dl>
                    <?php endforeach ?>
                    </div>
                <?php endif ?>
            </div><!--/#main-->
            <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
        </div>
    </div><!--/#contents-->
