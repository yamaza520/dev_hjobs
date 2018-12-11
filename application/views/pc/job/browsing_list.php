<div id="contents" class="mypage visited">
    <div id="bread" class="cf inner">
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">閲覧履歴</span></div>
    </div>
    <div class="inner">
        <h2 class="tit mgn20">閲覧履歴</h2>
        <?php if (count($result)) : ?>
            <?php echo form_open(); ?>
            <ul class="list_favorite">
                <?php foreach ($result as $job) : ?>
                <li class="list">
                    <label>
                        <input name="job[]" type="checkbox" checked="checked" value="<?php echo $job->id; ?>" />
                    </label>
                    <div class="list_favorite_data">
                        <dl class="list">
                            <dt class="img_box">
                                <div class="img_box"><img src="<?php echo get_job_image_src($job); ?>"  width="150" /></div>
                            </dt>
                            <dd>
                                <span class="tit"><?php echo $job->company_name; ?></span>
                                <span class="catch"><?php echo $job->job_title; ?></span>
                                <span class="id">求人ID：<?php echo $job->job_code; ?></span>
                                <?php if ($job->media_logo_file): ?>
                                    <ul class="cf">
                                        <li><img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt=""></li>
                                    </ul>
                                <?php endif ?>
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
                                <td><?php echo display_job_salary($job); ?></td>
                                <!--<td><?php echo $job->address1; ?> <?php echo $job->address2; ?></td>-->
                            </tr>
                        </table>
                        <ul class="btn_box2">
                            <li><a href="<?php echo site_url($base_path.'job/detail/'.$job->id); ?>" target="_blank">詳細</a></li>
                            <li><a href="javascript:" class="r_btn btn-remove" >リスト削除</a>
                            </li>
                            <li><a href="<?php echo site_url($base_path.'job/application/'.$job->id); ?>">応募する</a></li>
                        </ul>
                    </div>
                </li>
                <?php endforeach ?>
            </ul>
            <?php echo form_hidden('id', $job->id);?>
            <?php echo form_close(); ?>
            <div class="page-numbers_wrap cf">
                <span class="current_page"><?php echo $paging_info ; ?></span>
                <?php echo $pagination; ?>
            </div>
        <?php else: ?>
            閲覧履歴はありません。
        <?php endif ?>
    </div>
    <?php $this->load->view('pc/blocks/subscribe_form'); ?>
</div>

<script type="text/javascript">
    $(function() {
        $('.btn-remove').click(function()  {
            var $form = $(this).closest('form');
            $form.submit();
        });
    });
</script>
