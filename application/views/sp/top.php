<?php if (!ab_is_jobseeker()): ?>
<a href="<?php echo site_url('subscribe'); ?>" class="btn_ezine"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>
<?php endif ?>
    <div class="mv">
        <span>全国のホテル・旅館・民泊業務の求人を掲載中！！</span>
    </div>

    <div id="sec01" class="sec inner">
        <img src="<?php echo base_url('assets/sp/img/tit01.png'); ?>" alt="条件から探す" class="tit">
        <?php echo form_open('jobs', array('method' => 'get')); ?>
            <ul class="menu cf">
                <li>
                    <a href="#content01" id="search01" ><img src="<?php echo base_url('assets/sp/img/search01.png'); ?>" alt="エリア" class="btn"></a>
                    <div id="content01">
                        <div class="cat_head">エリアから探す<span class="close-content01">×</span></div>
                        <div class="modal-content">
                            <dl class="cont">
                                <?php $prectures = get_prefectures(); ?>
                                <?php foreach ($prectures as $name => $prefs): ?>
                                    <dt><?php echo $name; ?></dt>
                                    <ul class="list cf">
                                    <?php foreach ($prefs as $id => $label): ?>
                                        <li>
                                            <?php echo form_checkbox('q[work_place][]', $id); ?>
                                            <label><?php echo $label; ?></label>
                                        </li>
                                    <?php endforeach ?>
                                    </ul>
                                <?php endforeach ?>
                            </dl>
                        </div>
                        <div class="cat_foot">
                            <div class="form_btn"><input type="submit" value="検索" /></div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#content02" id="search02" ><img src="<?php echo base_url('assets/sp/img/search02.png'); ?>" alt="職種" class="btn"></a>
                    <div id="content02">
                        <div class="cat_head">職種から探す<span class="close-content02">×</span></div>
                        <div class="modal-content">
                            <ul class="cont cf list">
                                <li><input type="checkbox" value="346" name="q[job_category_s_id][]"><label>宿泊</label></li>
                                <li><input type="checkbox" value="342" name="q[job_category_s_id][]"><label>婚礼</label></li>
                                <li><input type="checkbox" value="341" name="q[job_category_s_id][]"><label>受付</label></li>
                                <li><input type="checkbox" value="347" name="q[job_category_s_id][]"><label>葬祭</label></li>
                                <li><input type="checkbox" value="343" name="q[job_category_s_id][]"><label>調理</label></li>
                                <li><input type="checkbox" value="344" name="q[job_category_s_id][]"><label>レストランマネジメント</label></li>
                                <li><input type="checkbox" value="345" name="q[job_category_s_id][]"><label>ウェイター／ウェイトレス</label></li>
                                <li><input type="checkbox" value="340" name="q[job_category_s_id][]"><label>管理</label></li>
                            </ul>
                        </div>
                        <div class="cat_foot">
                            <div class="form_btn"><input type="submit" value="検索" /></div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#content03" id="search03" ><img src="<?php echo base_url('assets/sp/img/search03.png'); ?>" alt="雇用形態" class="btn last"></a>
                    <div id="content03">
                        <div class="cat_head">雇用形態から探す<span class="close-content03">×</span></div>
                        <div class="modal-content">
                            <ul class="cont cf list">
                                <?php foreach ($employ_type_class as $value => $employ): ?>
                                    <li>
                                        <?php echo form_checkbox('q[employ_type_class][]', $value); ?>
                                        <label><?php echo $employ;?></label>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="cat_foot">
                            <div class="form_btn"><input type="submit" value="検索" /></div>
                        </div>
                    </div>
                </li>
            </ul>
        <?php echo form_close(); ?>
    </div><!--/"sec01-->
    <div id="sec02" class="sec">
        <img src="<?php echo base_url('assets/sp/img/tit02.png'); ?>" alt="キーワードから探す" class="tit">
        <div class="keyword">
            <ul class="cf inner">
                <?php foreach ($top_job_flags as $top_job_flag): ?>
                    <li><a href="<?php echo site_url(sprintf('jobs/?q[%s]=1', $top_job_flag->code)); ?>"><?php echo $top_job_flag->name; ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div><!--/"sec02-->

    <div id="contents">
        <h2 class="tit">簡単！エリア検索／都道府県検索</h2>
        <?php echo form_open('jobs', array('method' => 'get')); ?>
            <ul class="serch_box area cf">
                <li>
                    <?php $prectures = get_prefectures(); ?>
                    <?php $i = 4; ?>
                    <?php foreach ($prectures as $name => $prefs): ?>
                        <a href="#content<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>" id="search<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>" ><?php echo $name; ?></a>
                        <div id="content<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>">
                            <div class="cat_head"><?php echo $name.'エリア'; ?><span class="close-content<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>">×</span></div>
                            <div class="modal-content">
                                <ul class="list cf cont">
                                    <?php foreach ($prefs as $id => $label): ?>
                                        <li>
                                            <?php echo form_checkbox('q[work_place][]', $id); ?>
                                            <label><?php echo $label; ?></label>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="cat_foot">
                                <div class="form_btn"><input type="submit" value="検索" /></div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </li>
            </ul>
        <?php echo form_close(); ?>
        <h2 class="tit">簡単！職種検索</h2>
        <dl class="serch_box job">
            <dt class="j01"><span>宿泊</span></dt>
            <dd class="cf">
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=346'); ?>" class="w100p">宿泊・ホテル・冠婚葬祭関連</a>
            </dd>
            <dt class="j02"><span>婚礼</span></dt>
            <dd class="cf">
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=342'); ?>" class="w100p">ブライダル・イベントコーディネーター</a>
            </dd>
            <dt class="j03"><span>受付</span></dt>
            <dd class="cf">
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=341'); ?>" class="w100p">フロント業務・予約受付</a>
            </dd>
            <dt class="j04"><span>葬祭</span></dt>
            <dd class="cf">
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=347'); ?>" class="w100p">葬儀関連</a>
            </dd>
            <dt class="j05"><span>レストラン</span></dt>
            <dd class="cf">
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=343'); ?>">調理</a>
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=344'); ?>">レストランマネジメント</a>
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=345'); ?>">ウェイター／ウェイトレス</a>
            </dd>
            <dt class="j06"><span>管理</span></dt>
            <dd class="cf">
                <a href="<?php echo site_url('jobs?q[job_category_s_id]=340'); ?>" class="w100p">施設管理・マネジメント</a>
            </dd>
        </dl>

        <?php if (count($top_jobs)): ?>
            <h2 class="tit">注目求人</h2>
            <div id="sec04" class="sec">
                <?php foreach ($top_jobs as $row): ?>
                    <a href="<?php echo site_url($base_path.'job/detail/'.$row->id); ?>" target="_blank">
                        <dl>
                            <dt>
                                <img src="<?php echo get_job_image_src($row); ?>"  width="150" />
                                <span class="salary"><?php echo display_job_salary($row); ?></span>
                            </dt>
                            <dd>
                                <span class="tit"><?php echo $row->company_name; ?></span>
                                <span class="catch"><?php echo $row->job_title; ?></span>
                                <!--<span class="add"><?php echo $row->address1; ?> <?php echo $row->address2; ?></span>-->
                            </dd>
                        </dl>
                    </a>
                <?php endforeach ?>
                <div class="inner"><a href="<?php echo site_url($base_path.'jobs'); ?>" class="more">さらに見る</a></div>
            </div>
        <?php endif ?>

        <?php if (count($new_arrival_jobs)): ?>
            <h2 class="tit">新着求人</h2>
            <div id="sec05" class="sec inner">
                <div class="cf">
                    <?php foreach ($new_arrival_jobs as $row ): ?>
                        <dl>
                            <a href="<?php echo site_url($base_path.'job/detail/'.$row->id); ?>" target="_blank">
                                <dt>
                                    <div class="img_box"><img src="<?php echo get_job_image_src($row); ?>"  width="150" /></div>
                                </dt>

                                <dd>
                                    <span class="catch"><?php echo $row->job_title; ?></span>
                                    <span class="salary"><?php echo $row->salary; ?><?php echo $row->min_salary; ?>万円～<?php echo $row->max_salary; ?>万円</span>
                                    <!--<span class="add"><?php echo $row->address1; ?> <?php echo $row->address2; ?></span>-->
                                </dd>
                            </a>
                        </dl>
                    <?php endforeach ?>
                </div>
                <div class="inner clr"><a href="<?php echo base_url($base_path.'jobs'); ?>" class="more">さらに見る</a></div>
            </div>
        <?php endif ?>

        <h2 class="tit">こだわり＆資格検索</h2>
        <div id="sec06" class="sec">
            <?php echo form_open(site_url('jobs'), array('method' => 'get')); ?>
                <h3 class="tit">会社・社風</h3>
                <div class="check_wrap">
                    <table>
                        <tr>
                            <td><input type="checkbox" name="q[average_age_flag]" value="1"><label><?php echo display_job_flag('average_age_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[mid_career_flag]" value="1"><label><?php echo display_job_flag('mid_career_flag'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[female_flag]" value="1"><label><?php echo display_job_flag('female_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[foreign_company_flag]" value="1"><label><?php echo display_job_flag('foreign_company_flag'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[market_id]" value="1"><label><?php echo display_job_flag('market_id'); ?></label></td>
                            <td class="empty"></td>
                        </tr>
                    </table>
                </div>
                <h3 class="tit">就業環境</h3>
                <div class="check_wrap">
                    <table>
                        <tr>
                            <td><input type="checkbox" name="q[flex_flag]" value="1"><label><?php echo display_job_flag('flex_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[cloth_free_flag]" value="1"><label><?php echo display_job_flag('cloth_free_flag'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[two_day_off_flag]" value="1"><label><?php echo display_job_flag('two_day_off_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[holiday_120]" value="1"><label><?php echo display_job_flag('holiday_120'); ?></label></td>
                        </tr>
                    </table>
                </div>
                <h3 class="tit">採用情報</h3>
                <div class="check_wrap">
                    <table>
                        <tr>
                            <td><input type="checkbox" name="q[second_graduate_flag]" value="1"><label><?php echo display_job_flag('second_graduate_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[any_education_flag]" value="1"><label><?php echo display_job_flag('any_education_flag'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[uturn_flag]" value="1"><label><?php echo display_job_flag('uturn_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[inexperienced_flag]" value="1"><label><?php echo display_job_flag('inexperienced_flag'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[no_relocation_flag]" value="1"><label><?php echo display_job_flag('no_relocation_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[work_abroad]" value="1"><label><?php echo display_job_flag('work_abroad'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[manager]" value="1"><label><?php echo display_job_flag('manager'); ?></label></td>
                            <td class="empty"></td>
                        </tr>
                    </table>
                </div>
                <h3 class="tit">福利厚生</h3>
                <div class="check_wrap">
                    <table>
                        <tr>
                            <td><input type="checkbox" name="q[company_house_flag]" value="1"><label><?php echo display_job_flag('company_house_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[child_care_flag]" value="1"><label><?php echo display_job_flag('child_care_flag'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[stock_holding_flag]" value="1"><label><?php echo display_job_flag('stock_holding_flag'); ?></label></td>
                            <td class="empty"></td>
                        </tr>
                    </table>
                </div>
                <h3 class="tit">キャリアアップ</h3>
                <div class="check_wrap">
                    <table>
                        <tr>
                            <td><input type="checkbox" name="q[training_flag]" value="1"><label><?php echo display_job_flag('training_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[qualification_flag]" value="1"><label><?php echo display_job_flag('qualification_flag'); ?></label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="q[internal_venture_flag]" value="1"><label><?php echo display_job_flag('internal_venture_flag'); ?></label></td>
                            <td><input type="checkbox" name="q[independent_support_flag]" value="1"><label><?php echo display_job_flag('independent_support_flag'); ?></label></td>
                        </tr>
                    </table>
                </div>
                <h3 class="tit">フリーワード検索</h3>
                <input type="text" name="keyword" placeholder="こだわり・資格名などフリーワード" />
                <div class="form_btn"><input type="submit" value="選択した条件で検索" /></div>
            <?php echo form_close(); ?>
        </div><!--/#sec06-->

        <h2 class="tit">コラム 転職サポート特集</h2>
        <div id="sec07" class="sec">
            <div class="tab_box2 cf bb">
                <?php foreach ($article_types as $key => $value): ?>
                    <a href="#support<?php echo $key; ?>">
                        <?php echo $value; ?>
                    </a>
                <?php endforeach ?>
            </div>

            <?php if (count($articles)): ?>
                <?php foreach ($article_types as $id => $value): ?>
                    <?php $articlesByType = $articles[$id]; ?>
                    <div id="support<?php echo $id; ?>" class="tab_slider2">
                        <div class="tab_in cf">
                        <?php foreach ($articlesByType as $article): ?>
                            <a href="<?php echo site_url('article/detail/' . $article->id); ?>">
                                <dl>
                                     <?php
                                        $file = $this->config->item('upload_article_img_path');
                                        $file_path = $file.''.$article->heading_image ;
                                        if (file_exists($file_path)): ?>
                                            <dt>
                                                <div class="img_box gg"><img src="<?php echo base_url($file_path ); ?>" alt=""></div>
                                            </dt>
                                    <?php endif ?>
                                    <dd>
                                        <span class="catch"><?php echo $article->title; ?></span>
                                    </dd>
                                </dl>
                            </a>
                        <?php endforeach ?>
                        <div class="inner"><a href="<?php echo site_url('articles/category/' . $id); ?>" class="more">さらに見る</a></div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

        </div>

        <?php if (!ab_is_jobseeker()): ?>
        <a href="<?php echo site_url('subscribe'); ?>"  class="btn_ezine v2"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>
        <?php endif ?>
        <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
