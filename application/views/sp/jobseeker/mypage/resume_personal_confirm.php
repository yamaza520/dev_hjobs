<div class="inner">
    <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
</div>

<h2 class="tit mgn10">履歴書入力・編集</h2>
<div class="tit_bar v2"><h3>写真の登録</h3></div>
<div class="inner">
    <div class="form_tbl bdr_box">
        <div id="previewer_box" class="img_box2 mgn20">
            <?php if ($resume_personal['photo']) : ?>
                <img src="<?php echo base_url($resume_personal['photo_url']); ?>" alt="">
            <?php else : ?>
                <img src="<?php echo base_url('assets/pc/img/img18.jpg'); ?>" alt="">
            <?php endif ?>
        </div>
    </div>
</div>
<div class="tit_bar v2"><h3>会員情報</h3></div>
<div class="info_tbl">
    <dl>
        <dt>お名前</dt>
        <dd><span class="input_text"><?php echo $job_seeker->last_name . ' ' . $job_seeker->first_name ; ?></span></dd>
    </dl>
    <dl>
        <dt>フリガナ</dt>
        <dd><span class="input_text"><?php echo $job_seeker->last_name_kana . ' ' . $job_seeker->first_name_kana ; ?></span></dd>
    </dl>
    <dl>
        <dt>性別</dt>
        <dd><span class="input_text"><?php echo $job_seeker->gender === 'm' ? '男性' : '女性' ; ?></span></dd>
    </dl>
    <dl>
        <dt>生年月日</dt>
        <dd>
            <span class="input_text"><?php echo $job_seeker->birth_year;?></span>
            <span class="right bb">年</span>
            <span class="input_text"><?php echo $job_seeker->birth_month;?></span>
            <span class="right bb">月</span>
            <span class="2"><?php echo $job_seeker->birth_day;?></span>
            <span class="right bb">日</span>
        </dd>
    </dl>
    <dl>
        <dt>メールアドレス</dt>
        <dd><span class="input_text"><?php echo $job_seeker->email;?></span></dd>
    </dl>
    <dl>
        <dt>電話番号</dt>
        <dd><span class="input_text"><?php echo $job_seeker->phone;?></span></dd>
    </dl>
    <dl>
        <dt>住所</dt>
        <dd>
            <div class="wrap_input">
                <span class="left bb">〒</span><span class="input_text"><?php echo $job_seeker->zip_code;?></span>&emsp;
                <span class="input_text"><?php echo $job_seeker->pref_name;?></span>
                <span class="input_text"><?php echo $job_seeker->city;?></span>
            </div>
            <span class="input_text"><?php echo $job_seeker->address;?></span>
        </dd>
    </dl>
    <dl>
        <dt>未婚/既婚</dt>
        <dd><span class="input_text"><?php echo $job_seeker->marital_status === 'm' ? '既婚' : '未婚' ; ?></span></dd>
    </dl>
    <p class="memo">※こちらの情報の編集は、マイページの基本情報から編集できます。</p>
</div>

<div class="tit_bar v2"><h3>連絡先<span class="sub">(現住所以外の連絡を希望する場合のみ記入)</span></h3></div>
<div class="sec_in form_tbl mgn30">
    <dl>
        <dt>住所<span class="must">必須</span></dt>
        <dd class="add">
            <div class="wrap_input">
                <span class="left">〒</span><span class="input_text"><?php echo $resume_personal['rel_zip_code'];?></span>&emsp;
                <span class="input_text"><?php echo $resume_personal['rel_pref_cd'];?></span>
                <span class="input_text"><?php echo $resume_personal['rel_city'];?></span>
            </div>
            <span class="input_text"><?php echo $resume_personal['rel_address'];?></span>
        </dd>
    </dl>
</div><!--/.form_tbl-->

<?php if (!empty($resume_personal['education_history'])): ?>
    <div class="tit_bar v2"><h3>学歴・職歴</h3></div>
    <div class="resume_form_tit">学歴</div>
    <div class="sec_in form_tbl">
        <p class="text">現在または直前の勤務先の職務経歴よりご記入下さい</p>
        <?php foreach($resume_personal['education_history'] as $edu): ?>
            <div class="resume_tbl ta_l">
                <div class="cf mgn05">
                    <span class="input_text"><?php echo $edu['from_year']; ?> 年</span>
                    <span class="input_text"><?php echo $edu['from_month']; ?> 月</span>
                </div>
                <span class="input_text"><?php echo $edu['description']; ?></span>
            </div><!--/.resume_tbl-->
        <?php endforeach ?>
    </div>
<?php endif ?><!-- /education history -->

<?php if (!empty($resume_personal['work_summary_history'])): ?>
    <div class="resume_form_tit">職歴</div>
    <div class="sec_in form_tbl mgn30">
        <p class="text">現在または直前の勤務先の職務経歴よりご記入下さい</p>
        <?php foreach($resume_personal['work_summary_history'] as $work): ?>
            <div class="resume_tbl ta_l">
                <div class="cf mgn05">
                    <span class="input_text"><?php echo $work['from_year']; ?> 年</span>
                    <span class="input_text"><?php echo $work['from_month']; ?> 月</span>
                </div>
                <span class="input_text"><?php echo $work['description']; ?></span>
            </div><!--/.resume_tbl-->
        <?php endforeach ?>
    </div>
<?php endif ?><!-- /working history -->

<?php if (!empty($resume_personal['certification_history'])): ?>
    <div class="tit_bar v2"><h3>免許・資格</h3></div>
    <div class="resume_form_tit">免許・資格</div>
    <div class="sec_in form_tbl mgn30">
        <?php foreach($resume_personal['certification_history'] as $certi): ?>
            <div class="resume_tbl ta_l">
                <div class="cf mgn05">
                    <span class="input_text"><?php echo $certi['from_year']; ?> 年</span>
                    <span class="input_text"><?php echo $certi['from_month']; ?> 月</span>
                </div>
                <span class="input_text"><?php echo $certi['description']; ?></span>
            </div><!--/.resume_tbl-->
        <?php endforeach ?>
    </div>
<?php endif ?>

<div class="tit_bar v2"><h3>志望動機</h3></div>
<div class="resume_form_tit">志望動機<span class="must">必須</span></div>
<div class="inner info_tbl mgn30 ta_l">
    <span class="input_text"><?php echo $resume_personal['motivation'];?></span>
</div>

<div class="resume_form_tit">趣味・特技<span class="must">必須</span></div>
<div class="inner info_tbl mgn30 ta_l">
    <span class="input_text"><?php echo $resume_personal['hobby'];?></span>
</div>

<div class="resume_form_tit">本人希望欄<span class="must">必須</span></div>
<div class="inner info_tbl mgn30 ta_l">
    <span class="input_text"><?php echo $resume_personal['request'];?></span>
</div>

<div class="tit_bar v2"><h3>最寄駅、配偶者の有無</h3></div>
<div class="resume_form_tit">最寄駅<span class="must">必須</span></div>
<div class="inner info_tbl ta_l">
    <span class="input_text"><?php echo $resume_personal['nearest_station'];?></span>
</div>

<div class="resume_form_tit">扶養家族の人数<span class="must">必須</span></div>
<div class="inner info_tbl ta_l">
    <span class="input_text"><?php echo $resume_personal['dependents'];?></span>
    <span class="right">人</span>
</div>

<div class="resume_form_tit nomgn">配偶者の扶養義務<span class="must">必須</span></div>
<div class="inner info_tbl ta_l mgn30">
    <span class="input_text"><?php echo $resume_personal['spouse_support'] == 1 ? '扶養義務あり' : '扶養義務なし' ; ?></span>
</div>

<div class="btn_box2 form_tbl cf">
    <?php echo form_open();?>
        <input type="hidden" name="id" value="123">
        <div class="back_btn"><input type="button" value="編集画面に戻る" onclick="location.href='<?php echo site_url('mypage/resume/personal/form?edit=1'); ?>';"/></div>
        <div class="form_btn"><input type="submit" value="履歴書を更新する" /></div>
    <?php echo form_close(); ?>
</div>
