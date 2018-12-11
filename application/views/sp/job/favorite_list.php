<div id="container" class="recruit checklist">
    <a href="<?php echo site_url('subscribe'); ?>" class="btn_ezine"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>
    <h2 class="tit mgn10">気になるリスト</h2>
    <?php if (count($result)) : ?>
    <div class="inner">
        <div class="review_number">
            <span>現在検討中の求人（<?php echo count($result); ?>件）</span>
        </div>
        <div class="tit_bdr02">気になるリストの上手な使い方</div>
        <p class="ta_l mgn20">気になるリストは、ログインしなくても最大20件まで利用可能です。「パソコンで気になるリストに保存したものを、スマートフォンでも見たい！」という場合は、ログイン（会員登録【無料】）をすることをオススメします。ログイン前に気になるリストに保存したものも、ログインをするとパソコンでもスマートフォンでも確認することができます。</p>
        <div class="sec_in">
            <form method="post">
                <div class="check_all">
                    <span class="text01">チェックした求人をまとめて</span>
                    <div><input type="submit" value="応募する" /></div>
                    <span class="text02">※チェックできない求人は、個別エントリーが必要です。</span>
                </div>
                <ul class="list_favorite">
                    <?php foreach ($result as $job) : ?>
                        <li class="list<?php if ($job->media_type == 'link') echo ' no-left-pad'; ?>">
                        <?php if ($job->media_type != 'link'): ?>
                            <label>
                                <input name="job[]" type="checkbox" checked="checked" value="<?php echo $job->id; ?>" />
                            </label>
                        <?php endif ?>
                        <span class="id">求人ID：<?php echo $job->job_code; ?></span>
                        <div class="rec_box bg_w">
                            <div class="cf">
                                <?php echo (ab_is_new_job($job->created_at)) ? '<span class="cat s1">新着</span>' : ''; ?>
                                <span class="cat s2">雇用形態／<?php echo  display_employee_type($job->employ_type_class); ?></span>
                                <span class="rec_id">求人ID：<?php echo $job->job_code; ?></span>
                            </div>
                            <div class="cf">
                                <div class="img_box">
                                    <img src="<?php echo get_job_image_src($job); ?>"  width="150" />
                                </div>
                                <div class="right_box">
                                    <span class="name"><?php echo $job->company_name; ?></span>
                                    <a href="<?php echo site_url($base_path.'job/detail/'.$job->id); ?>" target="_blank" class="chach"><?php echo $job->job_title; ?></a>
                                    <div class="publish cf">
                                        <?php if ($job->media_logo_file): ?>
                                            <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <dl class="rec_cont">
                                <dt class="ta_c">仕事内容</dt>
                                <dd><?php echo nl2br($job->job_description); ?></dd>
                                <dt class="ta_c">給与</dt>
                                <dd><?php echo display_job_salary($job); ?></dd>
                                <!--<dt class="ta_c">勤務地</dt>
                                <dd><?php echo $job->address1; ?> <?php echo $job->address2; ?></dd>-->
                            </dl>
                            <div class="btn_box cf">
                                <a href="<?php echo site_url($base_path.'job/detail/'.$job->id); ?>" target="_blank">詳細</a>
                                <a href="<?php echo site_url($base_path.'favorite-jobs'); ?>" class="r_btn fav-remove" rel="<?php echo $job->id; ?>">リスト削除</a>
                                <a href="<?php echo site_url($base_path.'job/application/'.$job->id); ?>" class="full">応募する</a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach ?>
                </ul>
                <div class="check_all">
                    <span class="text01">チェックした求人をまとめて</span>
                    <div><input type="submit" value="応募する" /></div>
                    <span class="text02">※チェックできない求人は、個別エントリーが必要です。</span>
                </div>
                <div class="review_number">
                    <span>現在検討中の求人（<?php echo count($result); ?>件）</span>
                </div>
            </form>
        </div>

        <div class="page-numbers_wrap cf">
            <span class="current_page"><?php echo $paging_info ; ?></span>
            <?php echo $pagination; ?>
        </div>
        <?php else: ?>
            気になるリストはありません。
        <?php endif ?>
    </div>

    <?php $this->load->view('sp/blocks/subscribe_form'); ?>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
