<div id="container" class="recruit detail">
    <div class="rec_box">
        <div class="cf">
            <?php echo (ab_is_new_job($job->created_at)) ? '<span class="cat s1">新着</span>' : ''; ?>
            <span class="cat s2">雇用形態／<?php echo  display_employee_type($job->employ_type_class); ?></span>
            <span class="rec_id">求人ID：<?php echo $job->job_code; ?></span>
        </div>
        <div class="cf bdr">
            <div class="box_in cf">
                <div class="img_box2">
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
            <div <?php if (count($job->images)): ?> class="right_box" <?php endif ?>>
                <span class="name"><?php echo $job->company_name; ?></span>
                <a href="" class="chach"><?php echo $job->job_title; ?></a>
                <?php if ($job->media_logo_file): ?>
                    <div class="publish cf">
                        <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                    </div>
                <?php endif ?>
            </div>
        </div>
        <?php $flags = get_job_flags($job); ?>
        <?php if (count($flags)): ?>
            <div class="point">
                <span class="tit">求人の特徴</span>
                <?php foreach ($flags as $flag): ?>
                    <span><?php echo $flag; ?></span>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <div class="btn_box cf">
            <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
            <?php if (ab_is_favorite_job($job)): ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
            <?php else: ?>
                <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
            <?php endif ?>
        </div>
    </div>

    <div class="slide_wrap">
        <dl class="rec_slide_down">
            <dt>仕事内容</dt>
            <dd>
                <?php echo nl2br($job->job_description); ?><br/>
                <?php echo nl2br($job->job_detail); ?>
                <div class="btn_box cf">
                    <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
                    <?php if (ab_is_favorite_job($job)): ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
                    <?php else: ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
                    <?php endif ?>
                </div>
            </dd>
        </dl>
    </div>
    
    <?php if ($job->job_detail_title && $job->job_text): ?>            
    <div class="slide_wrap">
        <dl class="rec_slide_down">
            <dt><?php echo nl2br($job->job_detail_title); ?></dt>
            <dd>
                <?php echo nl2br($job->job_text); ?> ?>
                <div class="btn_box cf">
                    <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
                    <?php if (ab_is_favorite_job($job)): ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
                    <?php else: ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
                    <?php endif ?>
                </div>
            </dd>
        </dl>
    </div>
    <?php endif ?>


    <div class="slide_wrap">
        <dl class="rec_slide_down">
            <dt>募集要項</dt>
            <dd>
                <dl class="rec_cont">
                    <dt>事業内容・募集背景</dt>
                    <dd><?php echo $job->recruit_background; ?></dd>
                    <dt>対象となる方</dt>
                    <dd><?php echo $job->requirement; ?><br>
                        <?php echo $job->requirement_detail; ?>
                    </dd>
                    <dt>選考のポイント</dt>
                    <dd><?php echo $job->selection_point; ?></dd>
                    <dt>勤務地</dt>
                    <dd><?php echo $job->work_place2; ?></dd>
                    <dt>募集職種</dt>
                    <dd>
                        <?php echo $job->jcat_l; ?>
                        <?php echo ($job->jcat_m) ? '> ' . $job->jcat_m : ''; ?>
                        <?php echo ($job->jcat_s) ? '> ' . $job->jcat_s : ''; ?>
                    </dd>
                    <dt>雇用形態</dt>
                    <dd><?php echo  display_employee_type($job->employ_type_class); ?></dd>
                    <dt>勤務時間</dt>
                    <dd>
                        <?php echo $job->work_time; ?>
                    </dd>
                    <dt>交通</dt>
                    <dd><?php echo $job->traffic; ?></dd>
                    <dt>給与</dt>
                    <dd>
                        <?php echo $job->salary2; ?>
                    </dd>
                    <dt>給与例</dt>
                    <dd><?php echo $job->annual_income_example2; ?><br><?php echo $job->annual_income_example3; ?></dd>
                    <dt>昇給</dt>
                    <dd><?php echo $job->pay_rise; ?></dd>
                    <dt>賞与</dt>
                    <dd><?php echo $job->bonus; ?></dd>                    
                    <dt>待遇・福利厚生</dt>
                    <dd>
                        <?php echo $job->treatment; ?>
                    </dd>
                    <dt>休日・休暇</dt>
                    <dd><?php echo $job->holiday; ?></dd>
                    <?php if ($job->free_space_title && $job->free_space_detail): ?>            
                    <dt><?php echo $job->free_space_title; ?></dt>
                    <dd><?php echo $job->free_space_detail; ?></dd>
                    <?php endif ?>

                </dl>
                <div class="btn_box cf">
                    <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
                    <?php if (ab_is_favorite_job($job)): ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
                    <?php else: ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
                    <?php endif ?>
                </div>
            </dd>
        </dl>
    </div>
    <div class="slide_wrap">
        <dl class="rec_slide_down">
            <dt>応募方法</dt>
            <dd>
                <dl class="rec_cont">
                    <dt>応募資格</dt>
                    <dd>
                        <?php echo nl2br($job->requirement); ?><br>
                        <?php echo nl2br($job->requirement_detail); ?>
                    </dd>
                    <dt>応募方法</dt>
                    <dd><?php echo $job->application_method; ?></dd>
                    <dt>選考プロセス</dt>
                    <dd>
                        <?php echo nl2br($job->selection_process); ?>
                    </dd>
                    <dt>連絡先</dt>
                    <dd><?php echo $job->contact_info; ?></dd>
                    <dt>企業URL</dt>
                    <dd><?php echo $job->company_url; ?></dd>
                </dl>
                <div class="btn_box cf">
                    <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
                    <?php if (ab_is_favorite_job($job)): ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
                    <?php else: ?>
                        <a href="<?php echo base_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
                    <?php endif ?>
                </div>
            </dd>
        </dl>
    </div>
    <div class="slide_wrap">
        <dl class="rec_slide_down">
            <dt>企業情報</dt>
            <dd>
                <dl class="rec_cont">
                    <dt>会社名称</dt>
                    <dd><?php echo $job->company_name; ?></dd>
                    <dt>所在地</dt>
                    <dd><?php echo $job->address1 .' '. $job->address2; ?></dd>
                    <dt>事業内容</dt>
                    <dd>
                        <?php echo nl2br($job->company_description); ?>
                    </dd>
                    <dt>代表者</dt>
                    <dd><?php echo $job->representative; ?></dd>
                    <dt>設立</dt>
                    <dd><?php echo $job->establish_date; ?></dd>
                    <dt>資本金</dt>
                    <dd><?php echo $job->capital; ?></dd>
                    <dt>売上高</dt>
                    <dd><?php echo $job->earnings; ?></dd>                    
                    <dt>従業員数</dt>
                    <dd><?php echo $job->employee_count; ?></dd>
                    <?php if ($job->search_company_name5): ?>
                    <dt>上場市場名</dt>
                    <dd><?php echo $job->search_company_name5; ?></dd>
                    <?php endif ?>
                    <dt>平均年数</dt>
                    <dd><?php echo $job->average_age; ?></dd>
                </dl>
                <div class="btn_box cf">
                    <a href="<?php echo site_url('job/application/' . $job->id); ?>" class="l_btn">この求人に応募する</a>
                    <?php if (ab_is_favorite_job($job)): ?>
                        <a href="<?php echo site_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
                    <?php else: ?>
                        <a href="<?php echo site_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $job->id; ?>">気になるリストに追加</a>
                    <?php endif ?>
                </div>
            </dd>
        </dl>
    </div>

    <?php if (count($similar_jobs)): ?>
        <div class="inner">
            <h3 class="tit_bdr01">あなたが探している求人と似ている求人</h3>
        </div>
        <?php foreach ($similar_jobs as $row): ?>
            <div class="rec_box">
                <div class="cf">
                    <?php echo (ab_is_new_job($row->created_at)) ? '<span class="cat s1">新着</span>' : ''; ?>
                    <span class="cat s2">雇用形態／<?php echo  display_employee_type($row->employ_type_class); ?></span>
                    <span class="rec_id">求人ID：<?php echo $row->job_code; ?></span>
                </div>
                <div class="cf">
                    <div class="img_box"><img src="<?php echo get_job_image_src($row); ?>" alt=""></div>
                    <div class="right_box">
                        <span class="name"><?php echo $row->company_name; ?></span>
                        <a href="<?php echo site_url($base_path.'job/detail/'.$row->id); ?>" target="_blank" class="chach"><?php echo $row->job_title; ?></a>
                        <!--<span class="add"><?php echo $row->address1; ?> <?php echo $row->address2; ?></span>-->
                        <div class="publish cf">
                            <?php if ($row->media_logo_file): ?>
                                <img src="<?php echo base_url('assets/common/img/' . $row->media_logo_file); ?>" alt="">
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="salary"><?php echo display_job_salary($row); ?></div>
                <div class="btn_box cf">
                    <a href="<?php echo site_url($base_path.'job/detail/'.$row->id); ?>" target="_blank" class="detail_btn">この求人の詳細を見る</a>
                    <?php if (ab_is_favorite_job($row)): ?>
                        <a href="<?php echo site_url('favorite-jobs'); ?>" class="r_btn fav-list">お気に入り求人</a>
                    <?php else: ?>
                        <a href="<?php echo site_url('favorite-jobs'); ?>" class="r_btn fav-add" rel="<?php echo $row->id; ?>">気になるリストに追加</a>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <div class="inner">
        <h3 class="tit_bdr01">応募に関するよくある質問</h3></div>
    <div class="rec_box">
        <div class="qa">
            <?php foreach ($faqs as $row): ?>
                <dl>
                    <dt><?php echo nl2br($row->question); ?></dt>
                    <dd><?php echo nl2br($row->answer); ?></dd>
                </dl>
            <?php endforeach ?>
        </div>
    </div>

    <?php $this->load->view('sp/blocks/subscribe_form'); ?>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
