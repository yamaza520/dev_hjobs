<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?php echo base_url('assets/common/css/jquery-ui.min.css'); ?>" rel="stylesheet">
<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- header tabs -->
                <?php $this->load->view('admin/blocks/jobseeker_edit_nav.php'); ?>
                <!-- form start -->
                <?php echo form_open();?>
                    <div class="box-body">
                        <?php if (validation_errors()): ?>
                            <div class="clearfix">
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="col-md-6">
                            <?php
                                echo form_input(array(
                                    'type'  => 'hidden',
                                    'class' => 'form-control',
                                    'id'    => 'id',
                                    'name'  => 'id',
                                    'value' => set_value('id', $result->id)
                                ));
                            ?>
                            <div class="form-group">
                                <?php echo form_label('姓', 'last_name'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'text',
                                        'class'    => 'form-control',
                                        'id'       => 'last_name',
                                        'name'     => 'last_name',
                                        'required' => 'required',
                                        'value'    => set_value('last_name', $result->last_name)
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('名', 'first_name'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'text',
                                        'class'    => 'form-control',
                                        'id'       => 'first_name',
                                        'name'     => 'first_name',
                                        'required' => 'required',
                                        'value'    => set_value('first_name', $result->first_name)
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('セイ', 'last_name_kana'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'text',
                                        'class'    => 'form-control',
                                        'id'       => 'last_name_kana',
                                        'name'     => 'last_name_kana',
                                        'required' => 'required',
                                        'value'    => set_value('last_name_kana', $result->last_name_kana)
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('メイ', 'first_name_kana'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'text',
                                        'class'    => 'form-control',
                                        'id'       => 'first_name_kana',
                                        'name'     => 'first_name_kana',
                                        'required' => 'required',
                                        'value'    => set_value('first_name_kana', $result->first_name_kana)
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('性別', 'gender'); ?>
                                <span class="text-red">*</span><br>
                                <label><?php echo form_radio('gender', 'f', isset($result->gender) && $result->gender == 'f'); ?> 女性</label>&emsp;
                                <label><?php echo form_radio('gender', 'm', isset($result->gender) && $result->gender == 'm'); ?> 男性</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('生年月日（年）', 'birth_year'); ?>
                                        <span class="text-red">*</span>
                                        <?php echo form_dropdown('birth_year', $byears, set_value('birth_year', $result->birth_year), array('id' => 'birth_year', 'class' => 'form-control', 'required' => 'required')); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php echo form_label('生年月日（月）', 'birth_month'); ?>
                                        <span class="text-red">*</span>
                                        <?php echo form_dropdown('birth_month', $bmonths, set_value('birth_month', $result->birth_month), array('id' => 'birth_month', 'class' => 'form-control', 'required' => 'required')); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php echo form_label('生年月日（日）', 'birth_day'); ?>
                                        <span class="text-red">*</span>
                                        <?php echo form_dropdown('birth_day', $bdays, set_value('birth_day',$result->birth_day), array('id' => 'birth_day', 'class' => 'form-control', 'required' => 'required')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('メールアドレス', 'email'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'email',
                                        'class'    => 'form-control',
                                        'name'     => 'email',
                                        'value'    => set_value('email', $result->email),
                                        'required' => 'required'
                                    ));
                                ?>
                            </div>
                            <?php
                            /*
                            <div class="form-group">
                                <?php echo form_label('パスワード：', 'password'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'password',
                                        'class'    => 'form-control',
                                        'name'     => 'password',
                                        'value'    => set_value('password', $result->password),
                                        'required' => 'required'
                                    ));
                                ?>
                                <p class="memo text-red">
                                    ※8文字以上で英字・数字どちらも必ず使用して下さい。<br>
                                    ※半角英数文字で入力してください。ハイフン[-]やアンダーバー[_]などの記号は使えません。<br>
                                    ※メールアドレスの@以前と同じパスワードは設定できません。<br>
                                    ※生年月日と同じパスワードは設定できません。
                                </p>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('パスワード（確認）：', 'password'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'password',
                                        'class'    => 'form-control',
                                        'name'     => 'confirm_password',
                                        'value'    => set_value('confirm_password', $result->password),
                                        'required' => 'required'
                                    ));
                                ?>
                            </div>
                            */?>
                            <div class="form-group">
                                <?php echo form_label('電話番号', 'phone'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'tel',
                                        'class'    => 'form-control',
                                        'name'     => 'phone',
                                        'value'    => set_value('phone', $result->phone),
                                        'required' => 'required'
                                    ));
                                ?>
                                <p class="memo text-red">※半角数字で入力して下さい。携帯番号を推奨しております。</p>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('住所'); ?>
                                <span class="text-red">*</span>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="left">〒</span>
                                        <?php
                                            echo form_input(array(
                                                'type'      => 'tel',
                                                'name'      => 'zip_code',
                                                'class'     => 'form-control',
                                                'value'     => set_value('zip_code', $result->zip_code),
                                                'maxlength' => 8,
                                            ));
                                        ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <span class="left">都道府県</span>
                                        <?php echo form_dropdown('pref_cd', $prefectures, set_value('pref_cd', $result->pref_cd), array('required' => 'required', 'class' => 'form-control')); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <span class="left">市区町村</span>
                                        <?php
                                            echo form_input(array(
                                                'type'     => 'text',
                                                'name'     => 'city',
                                                'class'    => 'form-control',
                                                'value'    => set_value('city', $result->city),
                                            ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('既婚 / 未婚', 'marital_status'); ?>
                                <span class="text-red">*</span><br>
                                <label><?php echo form_radio('marital_status', 'm', isset($result->marital_status) && $result->marital_status == 'm'); ?> 既婚</label>&emsp;
                                <label><?php echo form_radio('marital_status', 's', isset($result->marital_status) && $result->marital_status == 's'); ?> 未婚</label>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('メールマガジン', 'mail_magazine'); ?>
                                <span class="text-red">*</span><br>
                                <label><?php echo form_radio('mail_magazine_flag', 1, isset($result->mail_magazine_flag) && $result->mail_magazine_flag == 1); ?> 受け取る</label>&emsp;
                                <label><?php echo form_radio('mail_magazine_flag', 0, isset($result->mail_magazine_flag) && $result->mail_magazine_flag == 0); ?> 受け取らない</label>
                                <p class="memo text-red">※転職に役立つ情報を不定期でお届けいたします。</p>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('アラートメール', 'alert_mail'); ?>
                                <span class="text-red">*</span><br>
                                <label><?php echo form_radio('alert_mail_flag', 1, isset($result->alert_mail_flag) && $result->alert_mail_flag == 1); ?> 受け取る</label>&emsp;
                                <label><?php echo form_radio('alert_mail_flag', 0, isset($result->alert_mail_flag) && $result->alert_mail_flag == 0); ?> 受け取らない</label>
                                <p class="memo text-red">※ご希望の条件にあった求人情報を毎日お届けいたします。</p>
                            </div>
                            <h3>連絡先(現住所以外の連絡を希望する場合のみ記入)</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('住所'); ?>
                                    <!-- <span class="text-red">*</span> -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span class="left">〒</span>
                                            <?php
                                                echo form_input(array(
                                                    'type'      => 'tel',
                                                    'name'      => 'rel_zip_code',
                                                    'class'     => 'form-control',
                                                    'value'     => set_value('rel_zip_code', $result->rel_zip_code),
                                                    'maxlength' => 8,
                                                ));
                                            ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="left">都道府県</span>
                                            <?php echo form_dropdown('rel_pref_cd', $prefectures, set_value('rel_pref_cd', $result->rel_pref_cd), array('class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="left">市区町村</span>
                                            <?php
                                                echo form_input(array(
                                                    'type'     => 'text',
                                                    'name'     => 'rel_city',
                                                    'class'    => 'form-control',
                                                    'value'    => set_value('rel_city', $result->rel_city),
                                                ));
                                            ?>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <?php echo form_label('番地・建物名', 'rel_address'); ?>
                                        <!-- <span class="text-red">*</span> -->
                                        <?php
                                            echo form_input(array(
                                                'type'     => 'text',
                                                'class'    => 'form-control',
                                                'id'       => 'rel_address',
                                                'name'     => 'rel_address',
                                                'value'    => set_value('rel_address', $result->rel_address),
                                            ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <h3>最寄駅・配偶者の有無</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('最寄駅', 'nearest_station'); ?>
                                    <!-- <span class="text-red">*</span> -->
                                    <?php
                                        echo form_input(array(
                                            'type'     => 'text',
                                            'class'    => 'form-control',
                                            'id'       => 'nearest_station',
                                            'name'     => 'nearest_station',
                                            'value'    => set_value('nearest_station', $result->nearest_station),
                                            // 'required' => 'required'
                                        ));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('扶養家族の人数', 'dependents'); ?>
                                    <!-- <span class="text-red">*</span> -->
                                    <?php
                                        echo form_input(array(
                                            'type'     => 'text',
                                            'class'    => 'form-control',
                                            'id'       => 'dependents',
                                            'name'     => 'dependents',
                                            'value'    => set_value('dependents', $result->dependents),
                                            // 'required' => 'required'
                                        ));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('配偶者の扶養義務', 'spouse_support'); ?>
                                    <!-- <span class="text-red">*</span> --> <br>
                                    <label><?php echo form_radio('spouse_support', 1, isset($result->spouse_support) && $result->spouse_support == 1); ?> 扶養義務あり</label>&emsp;
                                    <label><?php echo form_radio('spouse_support', 2, isset($result->spouse_support) && $result->spouse_support == 2); ?> 扶養義務なし</label>
                                </div>
                            </div>
                            <h3>転職理由・自己PR</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('転職理由', 'reason_for_change_work'); ?>
                                    <!-- <span class="text-red">*</span><br> -->
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'reason_for_change_work',
                                            'id'          => 'reason_for_change_work',
                                            'rows'        => '5',
                                            'value'       => set_value('reason_for_change_work', $result->reason_for_change_work),
                                            // 'required'    => 'required',
                                            'minlength'   => '50',
                                            'maxlength'   => '300',
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※50文字以上500文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('自己PR', 'pr'); ?>
                                    <!-- <span class="text-red">*</span><br> -->
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'pr',
                                            'id'          => 'pr',
                                            'rows'        => '5',
                                            'value'       => set_value('pr', $result->pr),
                                            // 'required'    => 'required',
                                            'minlength'   => '50',
                                            'maxlength'   => '300',
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※1000文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>学歴情報</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('最終学歴', 'last_education_cd'); ?>
                                    <!-- <span class="text-red">*</span> --> <br>
                                    <?php echo form_dropdown('last_education_cd', $last_education_cd, set_value('last_education_cd', $result->last_education_cd), array('id' => 'last_education_cd', 'class' => 'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <?php echo form_label('卒業区分（年）', 'graduate_year'); ?>
                                            <!-- <span class="text-red">*</span> -->
                                            <?php echo form_dropdown('graduate_year', $years, set_value('graduate_year', $career_history['graduate_year']), array('id' => 'graduate_year', 'class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_label('卒業区分（月）', 'graduate_month'); ?>
                                            <!-- <span class="text-red">*</span> -->
                                            <?php echo form_dropdown('graduate_month', $months, set_value('graduate_month', $career_history['graduate_month']), array('id' => 'graduate_month' , 'class' => 'form-control')); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_label('卒業区分'); ?>
                                            <!-- <span class="text-red">*</span> -->
                                            <?php echo form_dropdown('graduate_cd', $degree_status, set_value('graduate_cd',$result->graduate_cd), array('id' => 'graduate_cd', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <?php echo form_label('文理区分', 'literature_type'); ?>
                                        <!-- <span class="text-red">*</span> -->
                                        <?php echo form_dropdown('literature_type', $literature_type, set_value('literature_type', $result->literature_type), array('id' => 'literature_type', 'class' => 'form-control')); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('学校名', 'school_name'); ?>
                                    <!-- <span class="text-red">*</span> -->
                                    <?php
                                        echo form_input(array(
                                            'type'     => 'text',
                                            'class'    => 'form-control',
                                            'id'       => 'school_name',
                                            'name'     => 'school_name',
                                            'value'    => set_value('school_name', $result->school_name),
                                            // 'required' => 'required'
                                        ));
                                    ?>
                                </div>
                            </div>
                            <h3>職務情報</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('現在の勤務状況', 'is_working'); ?>
                                    <!-- <span class="text-red">*</span> -->
                                    <br>
                                    <label><?php echo form_radio('is_working', 0, isset($result->is_working) && $result->is_working == 0); ?> 就業中</label>&emsp;
                                    <label><?php echo form_radio('is_working', 1, isset($result->is_working) && $result->is_working == 1); ?> 離職中</label>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('現在の職業', 'current_job'); ?>
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'current_job',
                                            'id'          => 'current_job',
                                            'rows'        => '3',
                                            'value'       => set_value('current_job', $result->current_job),
                                            'maxlength' => 60,
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※60文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('現在の職業', 'current_job'); ?>
                                    <span class="text-red">*</span><br>
                                    <div class="col-sm-4">
                                        <?php echo form_dropdown('change_work_count', $change_work_count, set_value('change_work_count', $result->change_work_count), array('id' => 'change_work_count', 'class' => 'form-control')); ?>
                                    </div>
                                    <span class="right">回</span>
                                </div>
                            </div>
                            <h3>経歴要約</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('経歴要約', 'summary'); ?>
                                    <!-- <span class="text-red">*</span> --> <br>
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'summary',
                                            'id'          => 'summary',
                                            'rows'        => '3',
                                            'value'       => set_value('summary', $result->summary),
                                            // 'required'    => 'required',
                                            'minlength'   => '50',
                                            'maxlength'   => '300',
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('活かせる経験・知識', 'summary'); ?>
                                    <!-- <span class="text-red">*</span> --> <br>
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'useful_knowledge',
                                            'id'          => 'useful_knowledge',
                                            'rows'        => '3',
                                            'value'       => set_value('useful_knowledge', $result->useful_knowledge),
                                            // 'required'    => 'required',
                                            'minlength'   => '50',
                                            'maxlength'   => '300',
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                </div>
                            </div>
                            <h3>語学力</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('語学英語レベル', 'english_level'); ?>
                                    <!-- <span class="text-red">*</span><br> -->
                                    <?php echo form_dropdown('english_level', $english_level, set_value('english_level', $result->english_level), array('id' => 'english_level', 'class' => 'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('TOEIC', 'toeic'); ?><br>
                                    <div class="col-sm-4">
                                        <?php
                                            echo form_input(array(
                                                'type'     => 'text',
                                                'class'    => 'form-control',
                                                'id'       => 'toeic',
                                                'name'     => 'toeic',
                                                // 'required' => 'required',
                                                'value'    => set_value('toeic', $result->toeic)
                                            ));
                                        ?>
                                    </div>
                                    <span class="right">点</span>
                                </div><br>
                                <div class="form-group">
                                    <?php echo form_label('その他外国語', 'other_language'); ?>
                                    <?php
                                        echo form_input(array(
                                            'type'     => 'text',
                                            'class'    => 'form-control',
                                            'id'       => 'other_language',
                                            'name'     => 'other_language',
                                            // 'required' => 'required',
                                            'value'    => set_value('other_language', $result->other_language)
                                        ));
                                    ?>
                                </div>
                            </div>
                            <h3>志望動機</h3>
                            <div class="subgroup">
                                <div class="form-group">
                                    <?php echo form_label('志望動機', 'motivation'); ?>
                                    <!-- <span class="text-red">*</span> --> <br>
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'motivation',
                                            'id'          => 'motivation',
                                            'rows'        => '3',
                                            'value'       => set_value('motivation', $result->motivation),
                                            // 'required'    => 'required',
                                            'minlength'   => '50',
                                            'maxlength'   => '300',
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('趣味・特技', 'hobby'); ?>
                                    <!-- <span class="text-red">*</span> --> <br>
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'hobby',
                                            'id'          => 'hobby',
                                            'rows'        => '3',
                                            'value'       => set_value('hobby', $result->hobby),
                                            // 'required'    => 'required',
                                            'minlength'   => '50',
                                            'maxlength'   => '300',
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('本人希望欄', 'request'); ?>
                                    <!-- <span class="text-red">*</span> --> <br>
                                    <?php
                                        echo form_textarea(array(
                                            'class'       => 'form-control type-counter',
                                            'name'        => 'request',
                                            'id'          => 'request',
                                            'rows'        => '3',
                                            'value'       => set_value('request', $result->request),
                                            // 'required'    => 'required',
                                            'minlength'   => '50',
                                            'maxlength'   => '300',
                                        ));
                                    ?>
                                    <p class="resume_form_text2 memo text-red">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
                                    <p class="resume_form_text2 memo text-red">※給料、職種、通勤時間、勤務地に希望があれば記入</p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo form_submit('submit', '変更', array('class' => 'btn btn-success btn-lg')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>
