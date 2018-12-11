<div id="contents" class="mypage checklist">
    <div id="bread" class="cf inner">
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">気になるリスト</span></div>
    </div>
    <div class="inner">
        <h2 class="tit mgn20">気になるリスト</h2>
        <div class="sec_in">
            <div class="tit_bdr">気になるリストの上手な使い方</div>
            <p class="ta_l">気になるリストは、ログインしなくても最大20件まで利用可能です。「パソコンで気になるリストに保存したものを、スマートフォンでも見たい！」という場合は、ログイン（会員登録【無料】）をすることをオススメします。ログイン前に気になるリストに保存したものも、ログインをするとパソコンでもスマートフォンでも確認することができます。</p>
        </div>
        <?php if (count($result)) : ?>
        <form method="post">
            <div class="check_all cf">
                <div class="left_box">
                    <span class="text01">チェックした求人をまとめて</span><input type="submit" value="応募する" />
                    <span class="text02">※チェックできない求人は、<br>個別エントリーが必要です。</span>
                </div>
                <div class="right_box">
                    <span>現在検討中の求人<br>（<?php echo count($result); ?>件）</span>
                </div>
            </div>

            <ul class="list_favorite">
                <?php foreach ($result as $job) : ?>
                <li class="list<?php if ($job->media_type == 'link') echo ' no-left-pad'; ?>">
                    <?php if ($job->media_type != 'link'): ?>
                        <label>
                            <input name="job[]" type="checkbox" checked="checked" value="<?php echo $job->id; ?>" />
                        </label>
                    <?php endif ?>
                    <div class="list_favorite_data">
                        <dl class="list">
                            <dt class="img_box">
                                <div class="img_box"><img src="<?php echo get_job_image_src($job); ?>" width="150" /></div>
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
                            <li><a href="<?php echo site_url($base_path.'job/detail/'.$job->id); ?>">詳細</a></li>
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
                    <span class="text02">※チェックできない求人は、<br>個別エントリーが必要です。</span>
                </div>
                <div class="right_box">
                    <span>現在検討中の求人<br>（<?php echo count($result); ?>件）</span>
                </div>
            </div>
        </form>

        <div class="page-numbers_wrap cf">
            <span class="current_page"><?php echo $paging_info ; ?></span>
            <?php echo $pagination; ?>
        </div>
        <?php else: ?>
            気になるリストはありません。
        <?php endif ?>
    </div>
    <?php $this->load->view('pc/blocks/subscribe_form'); ?>
</div>
