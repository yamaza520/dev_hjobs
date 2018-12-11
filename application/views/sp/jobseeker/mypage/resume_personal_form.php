<div class="inner">
    <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
</div>

<h2 class="tit mgn10">履歴書入力・編集</h2>
<?php if (isset($message) && $message) : ?>
    <dl class="validation mgnT">
        <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
        <?php echo $message;?>
    </dl>
<?php endif ?>
<div class="tit_bar v2"><h3>写真の登録</h3></div>
<?php echo form_open_multipart('', array('method' => 'post', 'id' => 'resume-personal'));?>
    <div class="inner">
        <div class="form_tbl bdr_box">
            <div id="previewer_box" class="img_box2 mgn20">
                <?php if ($resume_personal['photo']) : ?>
                    <img src="<?php echo base_url($resume_personal['photo_url']); ?>" alt="">
                <?php else : ?>
                    <img src="<?php echo base_url('assets/pc/img/img18.jpg'); ?>" alt="">
                <?php endif ?>
            </div>
            <div id="wrap_upload_btn">
                <input type="submit" class="btn_upload" id="btn_upload_avatar" value="写真を登録する">
                <input type="file" id="upload_cv_avatar" name="face_photo" accept="image/jpg, image/jpeg, image/png"/>
                <?php
                    echo form_input(array(
                        'type'  => 'hidden',
                        'name'  => 'photo',
                        'value' => set_value('photo', $resume_personal['photo']),
                    ));
                ?>
            </div>
            <dl>
                <dt class="tit">写真をアップロードして頂く上での注意点</dt>
                <dd class="no_pad">
                    <span class="indent">■アップロード可能な拡張子は(.jpg,.jpeg,.png)</span>
                    <span class="indent">■証明写真は日本語・全角(2バイト文字)を含まないファイル名のファイルをご利用下さい。</span>
                    <span class="indent">■写真はデータサイズが5MB以下のものをご利用下さい。</span>
                    <span class="indent">■アップロード時間が長い場合、自動的にアップロードが中断される可能性があります。</span>
                    <span class="indent">■写真を張り付けた履歴書は、PDF形式でご閲覧頂けます。</span>
                </dd>
            </dl>
        </div>
    </div>
    <div class="tit_bar v2"><h3>会員情報</h3></div>
    <div class="info_tbl">
        <dl>
            <dt>お名前</dt>
            <dd>
                <span class="input_text"><?php echo $job_seeker->last_name . ' ' . $job_seeker->first_name ; ?></span>
            </dd>
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


    <div class="tit_bar v2"><h3>連絡先<span class="sub">(現住所以外の連絡を希望する場合のみ記入)</span></h3></div>
    <div class="sec_in form_tbl">
        <dl>
            <dt>住所<span class="must">必須</span></dt>
            <dd class="add">
                <span class="left">〒</span>
                <?php
                    echo form_input(array(
                        'type'  => 'tel',
                        'name'  => 'rel_zip_code',
                        'value' => set_value('rel_zip_code', $resume_personal['rel_zip_code']),
                        'placeholder' => '000-0000',
                        'maxlength' => 8,
                    ));

                    echo form_dropdown('rel_pref_cd', $prefectures, set_value('rel_pref_cd', $resume_personal['rel_pref_cd']));

                    echo form_input(array(
                        'type'  => 'text',
                        'id'    => 'rel_city',
                        'name'  => 'rel_city',
                        'value' => set_value('rel_city', $resume_personal['rel_city']),
                    ));

                    echo form_input(array(
                        'type'  => 'text',
                        'id'    => 'rel_address',
                        'name'  => 'rel_address',
                        'value' => set_value('rel_address', $resume_personal['rel_address']),
                    ));
                ?>
            </dd>
        </dl>
    </div><!--/.form_tbl-->

    <div class="tit_bar v2"><h3>学歴・職歴</h3></div>
    <div class="resume_form_tit">学歴</div>
    <div class="sec_in form_tbl">
        <p class="text">現在または直前の勤務先の職務経歴よりご記入下さい</p>
        <div id="tbl-education">
            <?php $edu_i = 0; ?>
            <?php if (!empty($resume_personal['education_history'])): ?>
                <?php foreach($resume_personal['education_history'] as $edu_i => $edu): ?>
                    <div class="resume_tbl">
                        <div class="cf mgn05">
                            <div class="year">
                                <?php echo form_dropdown('edu_year['. $edu_i. ']', $years, set_value('edu_year['. $edu_i. ']', $edu['from_year'])); ?>
                            </div>
                            <div class="month">
                                <?php echo form_dropdown('edu_month['. $edu_i. ']', $months, set_value('edu_month['. $edu_i. ']', $edu['from_month'])); ?>
                            </div>
                        </div>
                        <div class="text_input">
                            <?php
                                echo form_input(array(
                                    'type'  => 'hidden',
                                    'name'  => 'edu_id['. $edu_i. ']',
                                    'value' => set_value('edu_id['. $edu_i. ']', isset($edu['id']) ? $edu['id']: 0),
                                ));
                            ?>
                            <?php
                                echo form_input(array(
                                    'type'  => 'text',
                                    'name'  => 'edu_description['. $edu_i. ']',
                                    'value' => set_value('edu_description['. $edu_i. ']', $edu['description']),
                                    'placeholder' => '学校名テキスト卒業',
                                    'maxlength' => 255,
                                ));
                            ?>
                        </div>
                        <div class="ta_r"><a href="" class="delete_btn" name='edu_del[<?php echo $edu_i;?>]'>削除 × </a></div>
                    </div><!--/.resume_tbl-->
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <a href="javascript:void(0)" id="add_education" class="add_btn">学歴を追加する</a>
    </div>

    <div class="resume_form_tit">職歴</div>
    <div class="sec_in form_tbl">
        <p class="text">現在または直前の勤務先の職務経歴よりご記入下さい</p>
        <div id="tbl-work">
            <?php $work_i = 0; ?>
            <?php if (!empty($resume_personal['work_summary_history'])): ?>
                <?php foreach($resume_personal['work_summary_history'] as $work_i => $work): ?>
                    <div class="resume_tbl">
                        <div class="cf mgn05">
                            <div class="year">
                                <?php echo form_dropdown('work_year['. $work_i .']', $years, set_value('work_year['. $work_i .']', $work['from_year'])); ?>
                            </div>
                            <div class="month">
                                <?php echo form_dropdown('work_month['. $work_i .']', $months, set_value('work_month['. $work_i .']', $work['from_month'])); ?>
                            </div>
                        </div>
                        <div class="text_input">
                            <?php
                                echo form_input(array(
                                    'type'  => 'hidden',
                                    'name'  => 'work_id['. $work_i. ']',
                                    'value' => set_value('work_id['. $work_i. ']', isset($work['id']) ? $work['id']: 0),
                                ));
                            ?>
                            <?php
                                echo form_input(array(
                                    'type'  => 'text',
                                    'name'  => 'work_description['. $work_i. ']',
                                    'value' => set_value('work_description['. $work_i. ']', $work['description']),
                                    'placeholder' => '会社名テキスト',
                                    'maxlength' => 255,
                                ));
                            ?>
                        </div>
                        <div class="ta_r"><a href="" class="delete_btn" name="work_del[<?php echo $work_i;?>]">削除 × </a></div>
                    </div><!--/.resume_tbl-->
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <a href="javascript:void(0)" id="add_work" class="add_btn">職歴を追加する</a>
    </div>

    <div class="tit_bar v2"><h3>免許・資格</h3></div>
    <div class="resume_form_tit">免許・資格</div>
        <div class="sec_in form_tbl">
            <div id="tbl-certi">
                <?php $certi_i = 0; ?>
                <?php if (!empty($resume_personal['certification_history'])): ?>
                    <?php foreach($resume_personal['certification_history'] as $certi_i => $certi): ?>
                        <div class="resume_tbl">
                            <div class="cf mgn05">
                                <div class="year">
                                    <?php echo form_dropdown('certi_year['. $certi_i. ']', $years, set_value('certi_year['. $certi_i. ']', $certi['from_year']) ); ?>
                                </div>
                                <div class="month">
                                    <?php echo form_dropdown('certi_month['. $certi_i. ']', $months, set_value('certi_month['. $certi_i. ']', $certi['from_month']) ); ?>
                                </div>
                            </div>
                            <div class="text_input">
                                <?php
                                    echo form_input(array(
                                        'type'  => 'hidden',
                                        'name'  => 'certi_id['. $certi_i. ']',
                                        'value' => set_value('certi_id['. $certi_i. ']', isset($certi['id']) ? $certi['id']: 0),
                                    ));
                                ?>
                                <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'name'  => 'certi_description['. $certi_i. ']',
                                        'value' => set_value('certi_description['. $certi_i. ']', $certi['description']),
                                        'placeholder' => 'こちらに入力してください。',
                                        'maxlength' => 255,
                                    ));
                                ?>
                            </div>
                            <div class="ta_r"><a href="" name="certi_del[<?php echo $certi_i;?>]" class="delete_btn">削除 × </a></div>
                        </div><!--/.resume_tbl-->
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <a href="" id="add_certi" class="add_btn">免許・資格を追加する</a>
        </div>
    </div>

    <div class="tit_bar v2"><h3>志望動機</h3></div>
    <div class="resume_form_tit">志望動機<span class="must">必須</span></div>
    <div class="inner info_tbl mgn30">
        <?php
            echo form_textarea(array(
                'class' => 'type-counter',
                'name'  => 'motivation',
                'rows'  => '4',
                'value' => set_value('motivation', $resume_personal['motivation']),
                'minlength' => 50,
                'maxlength' => 300,
                'placeholder' => 'こちらに入力してください。',
                'required' => 'required'
            ));
        ?>
        <p class="resume_form_text2">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
    </div>
    <div class="resume_form_tit">趣味・特技<span class="must">必須</span></div>
    <div class="inner info_tbl mgn20">
        <?php
            echo form_textarea(array(
                'class' => 'type-counter',
                'name'  => 'hobby',
                'rows'  => '4',
                'value' => set_value('hobby', $resume_personal['hobby']),
                'minlength' => 50,
                'maxlength' => 300,
                'placeholder' => 'こちらに入力してください。',
                'required' => 'required'
            ));
        ?>
        <p class="resume_form_text2">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
    </div>
    <div class="resume_form_tit">本人希望欄<span class="must">必須</span></div>
    <div class="inner info_tbl mgn30">
        <?php
            echo form_textarea(array(
                'class' => 'type-counter',
                'name'  => 'request',
                'rows'  => '4',
                'value' => set_value('request', $resume_personal['request']),
                'minlength' => 50,
                'maxlength' => 300,
                'placeholder' => 'こちらに入力してください。',
                'required' => 'required'
            ));
        ?>
        <p class="resume_form_text2">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
        <p class="resume_form_text2">※給料、職種、通勤時間、勤務地に希望があれば記入</p>
    </div>
    <div class="tit_bar v2"><h3>最寄駅、配偶者の有無</h3></div>
    <div class="resume_form_tit">最寄駅<span class="must">必須</span></div>
    <div class="inner info_tbl">
        <?php
            echo form_input(array(
                'type'  => 'text',
                'name'  => 'nearest_station',
                'value' => set_value('nearest_station', $resume_personal['nearest_station']),
                'placeholder' => 'こちらに入力してください。',
                'required' => 'required'
            ));
        ?>
    </div>
    <div class="resume_form_tit">扶養家族の人数<span class="must">必須</span></div>
    <div class="inner info_tbl ta_l">
        <?php
            echo form_input(array(
                'type'  => 'tel',
                'name'  => 'dependents',
                'value' => set_value('dependents', $resume_personal['dependents']),
                'placeholder' => 'こちらに入力してください。',
                'required' => 'required'
            ));
        ?>
        <span class="right">人</span>
    </div>
    <div class="resume_form_tit nomgn">配偶者の扶養義務<span class="must">必須</span></div>
    <div class="form_tbl ">
        <div class="info_tbl check mgn30">
            <ul class="cf">
            <li><input type="radio" name="spouse_support" value="1" <?php echo set_radio('spouse_support', 1, (int) $resume_personal['spouse_support'] == 1 ? true : false);?> required/><label>扶養義務あり</label></li>
            <li><input type="radio" name="spouse_support" value="2" <?php echo set_radio('spouse_support', 2, (int) $resume_personal['spouse_support'] == 2 ? true : false);?> required/><label>扶養義務なし</label></li>
            </ul>
        </div>
        <div class="form_btn"><input type="submit" value="履歴書を確認する" /></div>
    </div>
<?php echo form_close(); ?>

<script type="text/javascript">
    edu_id = <?php echo $edu_i; ?>;
    work_id = <?php echo $work_i; ?>;
    certi_id = <?php echo $certi_i; ?>;

    $('.add_btn').click(function (e) {
        e.preventDefault();

        if ($(this).attr('id') == 'add_education'){
            edu_id = edu_id  + 1;
            id = edu_id;
            table = 'tbl-education';
        } else if ($(this).attr('id') == 'add_work') {
            work_id = work_id  + 1;
            id = work_id;
            table = 'tbl-work';
        } else {
            certi_id = certi_id + 1;
            id = certi_id;
            table = 'tbl-certi';
        }

        $("#" + table + " .resume_tbl:last").clone().find("input, select, a").each(function() {
            $(this).attr({
                'name': function(_, name) {
                    console.log(name);
                    return name.replace(/\d+/, id);
                },
            });
            if (!$(this).is('a')) {
                $(this).val('');
            }

        }).end().appendTo("#" + table);
    });

    $(document).on('click','.delete_btn', function(e) {
        e.preventDefault();

        var id = $(this).attr('name').match(/\d+/);
        if (id != 0) {
            $($(this).closest(".resume_tbl")).remove();
        }
    });

    $('form').on('submit', function(event) {
        event.preventDefault();
        var $form = $('#resume-personal');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('jobseeker/mypage/resume/personal_set_session');?>',
            data: new FormData($form[0]),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                if (response.success) {
                    window.location.href = response.url;
                } else {
                    console.log(response.msg);
                }
            },
            fail: function (xhr, textStatus, errThrown) {
                console.log(textStatus);
            }
        });
    });

</script>
