<div id="contents" class="recruit detail">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url('jobs/'. $pref->slug) ;?>" itemprop="url"><span itemprop="title"><?php echo $pref->name; ?>の転職・求人一覧</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?php echo $job->job_title; ?> /<?php echo $job->company_name; ?></span></div>
        </div>

        <div class="sec_in">
            <div class="rec_box w100p">
                <div class="cf">
                    <div class="fl">
                        <?php echo (ab_is_new_job($job->created_at)) ? '<span class="cat s1">新着</span>' : ''; ?>
                        <span class="cat s2">雇用形態／<?php echo  display_employee_type($job->employ_type_class); ?></span>
                        <span class="rec_id">求人ID：<?php echo $job->job_code; ?></span>
                    </div>
                    <?php if ($job->media_logo_file): ?>
                        <div class="publish fr">
                            <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                        </div>
                    <?php endif ?>
                </div>
                <span class="name"><?php echo $job->company_name; ?></span>
                <span class="chach"><?php echo $job->job_title; ?></span>
                <?php $flags = get_job_flags($job); ?>
                <?php if (count($flags)): ?>
                    <div class="point">
                        <span class="tit">求人の特徴</span>
                        <?php foreach ($flags as $flag): ?>
                            <span><?php echo $flag; ?></span>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="btn_wrap">
                    <a href="#sec01">仕事内容</a>
                    <a href="#sec02">募集要項</a>
                    <a href="#sec03">応募方法</a>
                    <a href="#sec04">企業情報</a>
                </div>
                <div id="sec01" class="tit_bar">
                    <h2>仕事内容</h2>
                </div>
            </div>
            <div class="cf">
                <div class="rec_box">
                    <div class="text">
                        <?php echo nl2br($job->job_description); ?><br/>
                        <?php echo nl2br($job->job_detail); ?>
                    </div>
                </div>
                <div class="right_box">
                    <div class="box_in cf">
                        <div class="mainImg cf">
                            <img src="<?php echo get_job_image_src($job); ?>"/>
                        </div>
                    </div>
                    <?php if (count($job->images)): ?>
                        <div class="subImg cf">
                            <?php $upload_path = $this->config->item('upload_img_path'); ?>
                            <?php foreach ($job->images as $img): ?>
                                <?php $file_path = $upload_path . $img->url ; ?>
                                <?php if (is_file($file_path) && file_exists($file_path)): ?>
                                    <div class="img_box_sub"><img src="<?php echo base_url($file_path); ?>" alt=""></div>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            
            <?php if ($job->job_detail_title && $job->job_text): ?>            
            <div class="tit_bar">
                <h2><?php echo nl2br($job->job_detail_title); ?></h2>
            </div>
            <div class="cf">
                <div class="rec_box">
                    <div class="text">
                        <?php echo nl2br($job->job_text); ?>
                    </div>
                </div>
            </div>
            <?php endif ?>
        
        
        </div>
        <div class="btn_box cf inner">
            <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
            <?php if (ab_is_favorite_job($job)): ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
            <?php else: ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
            <?php endif ?>
        </div>

        <div class="sec_in">
            <div id="sec02" class="tit_bar">
                <h2>募集要項</h2></div>
            <div class="rec_tbl">
                <dl>
                    <dt>事業内容・募集背景</dt>
                    <dd>
                        <?php echo $job->recruit_background; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>対象となる方</dt>
                    <dd>
                        <?php echo $job->requirement; ?>
                        <?php echo $job->requirement_detail; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>選考のポイント</dt>
                    <dd>
                        <?php echo $job->selection_point; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>勤務地</dt>
                    <dd>
                        <?php echo $job->work_place2; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>募集職種</dt>
                    <dd>
                        <?php echo $job->jcat_l; ?>
                        <?php echo ($job->jcat_m) ? '> ' . $job->jcat_m : ''; ?>
                        <?php echo ($job->jcat_s) ? '> ' . $job->jcat_s : ''; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>雇用形態</dt>
                    <dd><?php echo  display_employee_type($job->employ_type_class); ?></dd>
                </dl>
                <dl>
                    <dt>勤務時間</dt>
                    <dd><?php echo $job->work_time; ?></dd>
                </dl>
                <dl>
                    <dt>交通</dt>
                    <dd><?php echo $job->traffic; ?></dd>
                </dl>
                <dl>
                    <dt>給与</dt>
                    <dd><?php echo $job->salary2; ?></dd>
                </dl>
                <dl>
                    <dt>給与例</dt>
                    <dd><?php echo $job->annual_income_example2; ?><br><?php echo $job->annual_income_example3; ?></dd>
                </dl>
                <dl>
                    <dt>昇給</dt>
                    <dd><?php echo $job->pay_rise; ?></dd>
                </dl>
                <dl>
                    <dt>賞与</dt>
                    <dd><?php echo $job->bonus; ?></dd>
                </dl>
                <dl>
                    <dt>待遇・福利厚生</dt>
                    <dd><?php echo $job->treatment; ?></dd>
                </dl>
                <dl>
                    <dt>休日・休暇</dt>
                    <dd><?php echo $job->holiday; ?></dd>
                </dl>
                <?php if ($job->free_space_title && $job->free_space_detail): ?>            
                <dl>
                    <dt><?php echo $job->free_space_title; ?></dt>
                    <dd><?php echo $job->free_space_detail; ?></dd>
                </dl>
                <?php endif ?>
            </div>
        </div>
        <div class="btn_box cf inner">
            <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
            <?php if (ab_is_favorite_job($job)): ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
            <?php else: ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
            <?php endif ?>
        </div>

        <div class="sec_in">
            <div id="sec03" class="tit_bar">
                <h2>応募方法</h2></div>
            <div class="rec_tbl">
                <dl>
                    <dt>応募資格</dt>
                    <dd>
                        <?php echo nl2br($job->requirement); ?><br>
                        <?php echo nl2br($job->requirement_detail); ?>
                    </dd>
                </dl>
                <dl>
                    <dt>応募方法</dt>
                    <dd><?php echo $job->application_method; ?></dd>
                </dl>
                <dl>
                    <dt>選考プロセス</dt>
                    <dd><?php echo nl2br($job->selection_process); ?></dd>
                </dl>
                <dl>
                    <dt>連絡先</dt>
                    <dd><?php echo $job->contact_info; ?></dd>
                </dl>
                <dl>
                    <dt>企業URL</dt>
                    <dd><?php echo $job->company_url; ?></dd>
                </dl>
            </div>
        </div>


        <div class="btn_box cf inner">
            <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
            <?php if (ab_is_favorite_job($job)): ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
            <?php else: ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
            <?php endif ?>
        </div>

        <div class="sec_in">
            <div id="sec04" class="tit_bar">
                <h2>企業情報</h2></div>
            <div class="rec_tbl">
                <dl>
                    <dt>会社名称</dt>
                    <dd><?php echo $job->company_name; ?></dd>
                </dl>
                <dl>
                    <dt>所在地</dt>
                    <dd><?php echo $job->address1 .' '. $job->address2; ?></dd>
                </dl>
                <dl>
                    <dt>事業内容</dt>
                    <dd>
                        <?php echo nl2br($job->company_description); ?>
                    </dd>
                </dl>
                <dl>
                    <dt>代表者</dt>
                    <dd><?php echo $job->representative; ?></dd>
                </dl>
                <dl>
                    <dt>設立</dt>
                    <dd><?php echo $job->establish_date; ?></dd>
                </dl>
                <dl>
                    <dt>資本金</dt>
                    <dd><?php echo $job->capital; ?></dd>
                </dl>
                <dl>
                    <dt>売上高</dt>
                    <dd><?php echo $job->earnings; ?></dd>
                </dl>
                <dl>
                    <dt>従業員数</dt>
                    <dd><?php echo $job->employee_count; ?></dd>
                </dl>
                <?php if ($job->search_company_name5): ?>
                <dl>
                    <dt>上場市場名</dt>
                    <dd><?php echo $job->search_company_name5; ?></dd>
                </dl>
                <?php endif ?>
                <dl>
                    <dt>平均年数</dt>
                    <dd><?php echo $job->average_age; ?></dd>
                </dl>
            </div>
        </div>
        <div class="btn_box cf inner">
            <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
            <?php if (ab_is_favorite_job($job)): ?>
                <a href="<?php echo site_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
            <?php else: ?>
                <a href="<?php echo site_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
            <?php endif ?>
        </div>

        <?php if (count($similar_jobs)): ?>
            <div class="sec_in cf">
                <div class="tit_bar">
                    <h2>あなたが探している求人と似ている求人</h2>
                </div>
                <?php foreach ($similar_jobs as $row): ?>
                    <dl class="recomend">
                        <dt>
                            <img src="<?php echo get_job_image_src($row); ?>" alt="">
                            <div class="bg cf">
                                <a href="<?php echo base_url($base_path.'job/detail/'.$row->id); ?>" target="_blank" class="left">詳細</a>
                                <?php if (ab_is_favorite_job($row)): ?>
                                    <a href="<?php echo site_url('favorite-jobs'); ?>" class="right fav-list">お気に入り求人</a>
                                <?php else: ?>
                                    <a href="<?php echo site_url('favorite-jobs'); ?>" class="right fav-add" rel="<?php echo $row->id; ?>">気になるリストに追加</a>
                                <?php endif ?>
                            </div>
                        </dt>
                        <dd>
                            <span class="tit"><?php echo $row->company_name; ?></span>
                            <a href="<?php echo base_url($base_path.'job/detail/'.$row->id); ?>" target="_blank" class="catch"><?php echo $row->job_title; ?></a>
                            <span class="salary"><?php echo display_job_salary($row); ?></span>
                            <!--<span class="add"><?php echo $row->address1; ?> <?php echo $row->address2; ?></span>-->
                        </dd>
                    </dl>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <?php if (count($faqs)): ?>
            <div class="sec_in">
                <div class="tit_bar">
                    <h2>応募に関するよくある質問</h2>
                </div>
                <div class="qa">
                    <?php foreach ($faqs as $row): ?>
                        <dl>
                            <dt><?php echo nl2br($row->question); ?></dt>
                            <dd><?php echo nl2br($row->answer); ?></dd>
                        </dl>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif ?>
        <?php $this->load->view('pc/blocks/subscribe_form'); ?>
    </div>
</div>
<!--/#contents-->
