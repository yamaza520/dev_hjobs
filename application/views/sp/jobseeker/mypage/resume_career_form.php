<div class="inner">
    <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
</div>
<h2 class="tit mgn10">職務経歴書入力・編集</h2>
<?php if (isset($error) && $error) { ?>
    <dl class="validation">
        <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
        <?php echo $message;?>
    </dl>
<?php } ?>

<?php echo form_open(); ?>
    <div class="tit_bar v2">
        <h3>経歴要約</h3></div>
    <div class="resume_form_tit">経歴要約<span class="must">必須</span></div>
    <div class="inner info_tbl mgn30">
        <?php
        echo form_textarea(array(
            'name'  => 'summary',
            'id'    => 'summary',
            'rows'  => '3',
            'cols'  => '10',
            'class' => 'type-counter',
            'value' => set_value('summary',  $resume['summary']),
            'placeholder'   => 'こちらに入力してください。',
            'required' => 'required',
            'minlength' => '50',
            'maxlength' => '300',
        ));
        ?>
        <p class="resume_form_text2">※50文字以上300文字以内で入力してください。（現在：<span class="num">108</span>文字）</p>
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
                        <p>
                            <?php echo nl2br($row->job_description); ?>
                        </p>
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
    <div class="inner info_tbl mgn30">
        <?php echo form_textarea(array(
            'name'  => 'useful_knowledge',
            'id'    => 'useful_knowledge',
            'rows'  => '3',
            'cols'  => '10',
            'class' => 'type-counter',
            'value' => set_value('useful_knowledge', $resume['useful_knowledge']),
            'placeholder' => 'こちらに入力してください。',
            'required' => 'required',
            'minlength' => '50',
            'maxlength' => '300',
        ));
        ?>
        <p class="resume_form_text2">※50文字以上300文字以内で入力してください。（現在：<span class="num">108</span>文字）</p>
    </div>
    <div class="resume_form_tit v2">自己PR</div>
    <div class="inner mgn10">
        <p class="ta_l mgn30">
            <span class="input_text"><?php echo $job_seeker->pr ? nl2br($job_seeker->pr) : '-'; ?>
            </span>
        </p>
        <p class="memo_resume">※こちらの情報の編集は、マイページの経歴情報から編集できます。</p>
    </div>
    <div class="form_tbl ">
        <div class="form_btn">
            <?php echo form_submit('submit', '職務経歴書を確認する'); ?>
        </div>
    </div>
<?php echo form_close(); ?>
<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
