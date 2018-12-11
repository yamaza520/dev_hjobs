<div class="inner">
    <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
</div>

<h2 class="tit mgn10">職務経歴書入力・編集</h2>
<div class="tit_bar v2">
    <h3>経歴要約</h3>
</div>
<div class="resume_form_tit">経歴要約<span class="must">必須</span></div>
<div class="inner info_tbl mgn30 ta_l">
    <span class="input_text"><?php echo nl2br($resume['summary']); ?></span>
</div>

<div class="tit_bar v2">
    <h3>職務経歴</h3></div>
<div class="inner">
    <?php foreach ($result as $row) : ?>
        <div class="company_name"><span class="input_text"><?php echo $row->company_name; ?></span></div>
        <div class="career_tbl">
            <dl>
                <dt>期間</dt>
                <dd>
                    <span class="input_text"><?php echo $row->from_year; ?></span>
                    <span class="right">年</span>
                    <span class="input_text"><?php echo $row->from_month; ?></span>
                    <span class="right">月</span>
                    <span class="right">&emsp;～&emsp;</span>
                    <span class="input_text"><?php echo $row->to_year; ?></span>
                    <span class="right">年</span>
                    <span class="input_text"><?php echo $row->to_month; ?></span>
                    <span class="right">月</span>
                </dd>
            </dl>
            <dl>
                <dt>業種・経験職種</dt>
                <dd>
                    <span class="tit">［業種］</span>
                    <p>
                        <span class="input_text"><?php echo $row->industory_l; ?></span>
                        <span class="input_text"><?php echo $row->industory_m; ?></span>
                    </p>
                    <span class="tit">［経験職種］</span>
                    <p>
                        <span class="input_text"><?php echo $row->jcat_l; ?></span>
                        <span class="input_text"><?php echo $row->jcat_m; ?></span>
                        <span class="input_text"><?php echo $row->jcat_s; ?></span>
                    </p>
                </dd>
            </dl>
            <dl>
                <dt>職務内容</dt>
                <dd>
                    <span class="input_text">
                        <span class="tit">【職務内容】</span>
                        <p><?php echo nl2br($row->job_description); ?></p>
                    </span>
                </dd>
            </dl>
        </div>
    <?php endforeach ?>
    <p class="memo_resume">※こちらの情報の編集は、マイページの経歴情報から編集できます。</p>
</div>

<div class="tit_bar v2">
    <h3>自己PR・転職理由</h3></div>
<div class="resume_form_tit v2">転職理由</div>
<div class="inner mgn30">
    <p class="ta_l">
        <span class="input_text"><?php echo $job_seeker->reason_for_change_work ? nl2br($job_seeker->reason_for_change_work) : '-'; ?>
        </span>
    </p>
</div>
<div class="resume_form_tit">活かせる経験・知識<span class="must">必須</span></div>
<div class="inner info_tbl mgn30 ta_l">
    <span class="input_text"><?php echo nl2br($resume['useful_knowledge']); ?></span>
</div>
<div class="resume_form_tit v2">自己PR</div>
<div class="inner mgn10">
    <p class="ta_l mgn30">
        <span class="input_text"><?php echo $job_seeker->pr ? nl2br($job_seeker->pr) : '-'; ?></span>
    </p>
    <p class="memo_resume">※こちらの情報の編集は、マイページの経歴情報から編集できます。</p>
</div>
<div class="btn_box2 form_tbl cf">
    <?php echo form_open();?>
        <input type="hidden" name="id" value="<?php echo $job_seeker->id; ?>" />
        <div class="back_btn">
            <input type="button" value="編集画面に戻る" onclick="location.href='<?php echo site_url('mypage/resume/career/form?edit=1'); ?>';"/>
        </div>
        <div class="form_btn">
            <input type="submit" value="職務経歴書を更新する" />
        </div>
    <?php echo form_close();?>
</div>
<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
