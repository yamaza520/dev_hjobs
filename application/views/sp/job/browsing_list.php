<div id="container" class="recruit visited">
    <a href="<?php echo site_url('subscribe'); ?>" class="btn_ezine"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>
    <h2 class="tit mgn10">閲覧履歴</h2>
    <?php if (count($result)) : ?>
        <?php echo form_open(); ?>
            <?php foreach ($result as $job) : ?>
                <div class="inner">
                    <div class="rec_box">
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
                            <dt>仕事内容</dt>
                            <dd><?php echo nl2br($job->job_description); ?></dd>
                            <dt>給与</dt>
                            <dd><?php echo display_job_salary($job); ?></dd>
                            <!--<dt>勤務地</dt>
                            <dd><?php echo $job->address1; ?> <?php echo $job->address2; ?></dd>-->
                        </dl>
                        <div class="btn_box cf">
                            <a href="<?php echo site_url($base_path.'job/detail/'.$job->id); ?>" target="_blank" class="fl">詳細</a>
                            <a href="javascript:" class="fr btn-remove">リスト追加</a>
                            <a href="<?php echo site_url($base_path.'job/application/'.$job->id); ?>" class="full">応募する</a>
                        </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php echo form_hidden('id', $job->id);?>
        <?php echo form_close(); ?>
        <div class="page-numbers_wrap cf">
            <span class="current_page"><?php echo $paging_info ; ?></span>
            <?php echo $pagination; ?>
        </div>
    <?php else: ?>
        閲覧履歴はありません。
    <?php endif ?>

    <?php $this->load->view('sp/blocks/subscribe_form'); ?>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>

<script type="text/javascript">
    $(function() {
        $('.btn-remove').click(function()  {
            var $form = $(this).closest('form');
            $form.submit();
        });
    });
</script>
